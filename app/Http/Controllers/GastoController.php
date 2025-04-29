<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gasto;
use App\Models\GastoCategoria;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use App\Http\Resources\GastoResource;
use Exception;

class GastoController extends Controller
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
            1 => "Codigo Gasto",
            2 => "Fecha",
            3 => "Descripcion",
            4 => "Categoria",
            5 => "Total",
        );


        $modulo = "Gastos";
        $head = "Gastos";
        $contador = count(Gasto::where('id_estado', 1)->get());
        $contador = "$contador Gastos en existencia";

        if ($request->has("query")) {
            $query =  $request->get("query");
            $data = GastoResource::collection(Gasto::where("descripcion", "like", "$query%")->orWhere("codigo_gasto", "like", "$query%")->orWhere("fecha", "like", "$query%")->where('id_estado', 1)->where('id_categoria', '!=', 1)->orderBy('fecha', 'desc')->paginate(50));
            return Inertia::render('gasto/index', compact('data', 'contador', 'tableHeaders', 'modulo'));
        } else {

            $data = GastoResource::collection(Gasto::where('id_estado', 1)->where('id_categoria', '!=', 1)->orderBy('fecha', 'desc')->paginate(50));
            return Inertia::render('gasto/index', compact('data', 'contador', 'tableHeaders', 'modulo', 'head'));
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

        $head = "Crear Gasto";
        $categorias = GastoCategoria::where('id_estado', 1)->get();

        return Inertia::render('gasto/create', compact('head', 'categorias'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (!Auth::check()) {
            return redirect('/login');
        }

        $id_usuario = Auth::id();

        try {
            Gasto::create([
                'codigo_gasto' => $request->codigo_gasto,
                'fecha' => $request->fecha,
                'descripcion' => $request->descripcion,
                'id_categoria' => $request->id_categoria,
                'total' => $request->total,
                'id_estado' => 1,
                'id_usuario' => $id_usuario,
            ]);

            return redirect()->route('gasto.index')->with('message', 'Gasto agregado con exito');
        } catch (Exception $e) {
            return redirect()->route('users.create')
                ->with('error', 'Operacion fallida: ' . $e->getMessage());
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

        $data = Gasto::findOrFail($id);
        $head = "Editar Gasto";
        $categorias = GastoCategoria::where('id_estado', 1)->get();
        return Inertia::render('gasto/edit', compact('data', 'head', 'categorias'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if (!Auth::check()) {
            return redirect('/login');
        }

        try {
            $id_usuario = Auth::id();
            $gasto = Gasto::findOrFail($id);

            $gasto->update([
                'codigo_gasto' => $request->codigo_gasto,
                'fecha' => $request->fecha,
                'descripcion' => $request->descripcion,
                'id_categoria' => $request->id_categoria,
                'total' => $request->total,
                'id_estado' => 1,
                'id_usuario' => $id_usuario,
            ]);
        } catch (Exception $e) {
            return redirect()->route('users.create')
                ->with('error', 'Operacion Fallida: ' . $e->getMessage());
        }




        return redirect()->route('gasto.index')->with('message', 'Gasto actualizado con exito');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $gasto = Gasto::findOrFail($id);
        $gasto->id_estado = 2;
        $gasto->save();

        $gasto = Gasto::findOrFail($id);
        $gasto->delete();

        return redirect()->route('gasto.index')->with('message', 'Gasto eliminado con exito');
    }
}
