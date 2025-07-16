<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Planilla;
use App\Models\Empleado;
use App\Models\GastoPlanilla;
use App\Models\PlanillaCategoria;
use App\Models\Gasto;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use App\Http\Resources\PlanillaResource;
use Illuminate\Support\Facades\Log;

class PlanillaController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index(Request $request)
    {
        if (!Auth::check()) {
            return redirect('/login');
        }

        $tableHeaders = array(
            1 => "Fecha",
            2 => "Descripcion",
            2 => "Categoria",
            3 => "Empleado",
            4 => "Total",
        );


        $modulo = "Planillas";
        $head = "Planillas";
        $contador = count(Planilla::where('id_estado', 1)->get());
        $contador = "$contador Pagos de Planilla en existencia";

        if ($request->has("query")) {
            $query =  $request->get("query");
            $data = PlanillaResource::collection(Planilla::where("descripcion", "like", "$query%")->orWhere("total", "like", "$query%")->orWhere("fecha", "like", "$query%")->where('id_estado', 1)->orderBy('fecha', 'desc')->paginate(50));
            return Inertia::render('planilla/index', compact('data', 'contador', 'tableHeaders', 'modulo'));
        } else {

            $data = PlanillaResource::collection(Planilla::where('id_estado', 1)->orderBy('fecha', 'desc')->paginate(50));
            return Inertia::render('planilla/index', compact('data', 'contador', 'tableHeaders', 'modulo', 'head'));
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (!Auth::check()) {
            return redirect('/login');
        }
        $head = "Crear Pago de Planilla";
        $empleados = Empleado::where('id_estado', 1)->get();
        $categorias = PlanillaCategoria::where('id_estado', 1)->get();

        return Inertia::render('planilla/create', compact('head', 'empleados', 'categorias'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (!Auth::check()) {
            return redirect('/login');
        }
        
        try {
            $id_usuario = Auth::id();

            $planilla = Planilla::create([
                'fecha' => $request->fecha,
                'descripcion' => $request->descripcion,
                'id_categoria' => $request->id_categoria,
                'id_empleado' => $request->id_empleado,
                'total' => $request->total,
                'id_estado' => 1,
                'id_usuario' => $id_usuario,
            ]);

            $id_planilla = $planilla->id;

            $id_empleado = $request->id_empleado;
            $empleado = Empleado::findOrFail($id_empleado);
            $nombreEmpleado = $empleado->descripcion;
            $descripcion = "Pago de Planilla a $nombreEmpleado";
            $num = rand(10000, 1000000);
            $codigo_gasto = "GP$num";

            $gasto = Gasto::create([
                'codigo_gasto' => $codigo_gasto,
                'fecha' => $request->fecha,
                'descripcion' => $descripcion,
                'id_categoria' => 1,
                'total' => $request->total,
                'id_estado' => 1,
                'id_usuario' => $id_usuario,
            ]);

            $id_gasto = $gasto->id; // FIX: usar $gasto->id en lugar de $planilla->id

            GastoPlanilla::create([
                'id_gasto' => $id_gasto,
                'id_planilla' => $id_planilla,
                'id_estado' => 1,
            ]);

            return redirect()->route('planilla.index')->with('message', 'Pago de Planilla agregado con exito');
        } catch (\Throwable $th) {
            Log::error('Error guardando planilla: ' . $th->getMessage());
            return redirect()->route('planilla.index')->with('error', 'Error al guardar la planilla: ' . $th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        if (!Auth::check()) {
            return redirect('/login');
        }

        $empleados = Empleado::where('id_estado', 1)->get();
        $data = Planilla::findOrFail($id);
        $categorias = PlanillaCategoria::where('id_estado', 1)->get();
        $head = "Editar Pago de Planilla";

        return Inertia::render('planilla/edit', compact('data', 'head', 'empleados', 'categorias'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if (!Auth::check()) {
            return redirect('/login');
        }

        $id_usuario = Auth::id();

        try {
            $planilla = Planilla::findOrFail($id);

            $planilla->update([
                'fecha' => $request->fecha,
                'descripcion' => $request->descripcion,
                'id_categoria' => $request->id_categoria,
                'id_empleado' => $request->id_empleado,
                'total' => $request->total,
                'id_estado' => 1,
                'id_usuario' => $id_usuario,
            ]);

            $id_planilla = $planilla->id;
            $gastoPlanilla = GastoPlanilla::where("id_planilla", "$id_planilla")->first();
            // Verificar que existe el registro antes de continuar
            if (!$gastoPlanilla) {
                return redirect()->route('planilla.index')->with('error', 'No se encontró el gasto asociado a esta planilla');
            }
            $id_gasto = $gastoPlanilla->id_gasto;
            $gasto = Gasto::findOrFail($id_gasto);

            $id_empleado = $request->id_empleado;
            $empleado = Empleado::findOrFail($id_empleado);
            $nombreEmpleado = $empleado->descripcion;
            $descripcion = "Pago de Planilla a $nombreEmpleado";
            $gasto->update([
                'fecha' => $request->fecha,
                'descripcion' => $descripcion,
                'total' => $request->total,
                'id_usuario' => $id_usuario,
            ]);

            return redirect()->route('planilla.index')->with('message', 'Pago de Planilla actualizado con exito');
        } catch (\Throwable $th) {
            Log::error('Error actualizando planilla: ' . $th->getMessage());

            return redirect()->route('planilla.index')->with('error', 'Error al actualizar la planilla: ' . $th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if (!Auth::check()) {
            return redirect('/login');
        }

        $gastoPlanilla = GastoPlanilla::where("id_planilla", $id)->first();
        $id_gasto = $gastoPlanilla->id_gasto;
        $gastoPlanilla->id_estado = 2;
        $gastoPlanilla->save();

        $gastoPlanilla = GastoPlanilla::where("id_planilla", $id)->first();
        $gastoPlanilla->delete();

        $gasto = Gasto::findOrFail($id_gasto);
        $gasto->id_estado = 2;
        $gasto->save();

        $gasto = Gasto::findOrFail($id_gasto);
        $gasto->delete();

        $planilla = Planilla::findOrFail($id);
        $planilla->id_estado = 2;
        $planilla->save();

        $planilla = Planilla::findOrFail($id);
        $planilla->delete();

        return redirect()->route('planilla.index')->with('message', 'Planilla eliminada con exito');
    }
}
