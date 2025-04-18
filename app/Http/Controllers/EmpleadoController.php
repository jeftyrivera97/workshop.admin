<?php

namespace App\Http\Controllers;

use App\Http\Resources\EmpleadoResource;
use App\Models\Empleado;
use App\Models\EmpleadoCategoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if(!Auth::check())
        {
            return redirect('/login');
        }

        $tableHeaders = array(
            1 => "Codigo Empleado",
            2 => "Descripcion",
            3 => "Puesto",
            4 => "Telefono",
        );


        $modulo = "Empleados";
        $head = "Empleados";
        $contador = count(Empleado::where('id_estado', 1)->get());
        $contador = "$contador Empleados en existencia";

        if ($request->has("query")) {
            $query =  $request->get("query");
            $data = EmpleadoResource::collection(Empleado::where("descripcion", "like", "$query%")->orWhere("codigo_empleado", "like", "$query%")->orWhere("telefono", "like", "$query%")->where('id_estado', 1)->paginate(50));
            return Inertia::render('empleado/index', compact('data', 'contador', 'tableHeaders', 'modulo'));
        } else {

            $data = EmpleadoResource::collection(Empleado::where('id_estado', 1)->where('id_categoria', '!=', 1)->paginate(50));
            return Inertia::render('empleado/index', compact('data', 'contador', 'tableHeaders', 'modulo', 'head'));
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if(!Auth::check())
        {
            return redirect('/login');
        }

        $head = "Crear Empleado";
        $categorias = EmpleadoCategoria::where('id_estado', 1)->get();

        return Inertia::render('empleado/create', compact('head', 'categorias'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if(!Auth::check())
        {
            return redirect('/login');
        }

        $id_usuario = Auth::id();
        $codigo = $request->codigo_empleado;

        if (Empleado::where('codigo_empleado', $codigo)->exists()) {

            return redirect()->route('empleado.index')->with('message', 'Empleado NO guardado - Empleado ya existe');

        } else {
            Empleado::create([
                'codigo_empleado' => $request->codigo_empleado,
                'descripcion' => $request->descripcion,
                'id_categoria' => $request->id_categoria,
                'telefono' => $request->telefono,
                'id_estado' => 1,
                'id_usuario' => $id_usuario,
            ]);

            return redirect()->route('empleado.index')->with('message', 'Empleado agregado con exito');
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
        if(!Auth::check())
        {
            return redirect('/login');
        }

        $head = "Editar Empleado";
        $data = Empleado::findOrFail($id);
        $categorias = EmpleadoCategoria::where('id_estado', 1)->get();

        return Inertia::render('empleado/edit', compact('data', 'head', 'categorias'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if(!Auth::check())
        {
            return redirect('/login');
        }
        
        $id_usuario = Auth::id();
        $empleado = Empleado::findOrFail($id);

        $empleado->update([
            'codigo_empleado' => $request->codigo_empleado,
            'descripcion' => $request->descripcion,
            'id_categoria' => $request->id_categoria,
            'telefono' => $request->telefono,
            'id_usuario' => $id_usuario,
        ]);

        return redirect()->route('empleado.index')->with('message', 'Empleado actualizado con exito');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $empleado = Empleado::findOrFail($id);
        $empleado-> id_estado =2;
        $empleado->save();

        $empleado = Empleado::findOrFail($id);
        $empleado->delete();

        return redirect()->route('empleado.index')->with('message','Empleado eliminado con exito');
    }
}
