<?php

namespace App\Http\Controllers;

use App\Http\Resources\AutoResource;
use App\Models\Auto;
use App\Models\AutoCategoria;
use App\Models\AutoMarca;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class AutoController extends Controller
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
            1 => "Marca",
            2 => "Modelo",
            3 => "Año",
            4 => "Base",
            5 => "Cilindraje",
            6 => "Combustion",
            7 => "Categoria",
        );

        $modulo = "Autos";
        $contador = count(Auto::where('id_estado', 1)->get());
        $contador = "$contador Autos en existencia";

        if ($request->has("query")) {
            $query =  $request->get("query");
            $data = AutoResource::collection(Auto::where("descripcion", "like", "$query%")->orWhere("modelo", "like", "$query%")->orWhere("base", "like", "$query%")->where('id_estado',1)->paginate(50));
            return Inertia::render('auto/index', compact('data', 'contador', 'tableHeaders','modulo'));
        } else {

            $data = AutoResource::collection(Auto::where('id_estado',1)->paginate(50));
            return Inertia::render('auto/index', compact('data', 'contador', 'tableHeaders','modulo'));
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $head = "Crear Auto";
        $categorias = AutoCategoria::where('id_estado', 1)->get();
        $marcas = AutoMarca::where('id_estado', 1)->get();
        $tracciones = collect(['4x2','4x4','AWD','FWD','RWD']);

        return Inertia::render('auto/create', compact('head', 'categorias','marcas','tracciones'));
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

        Auto::create([
            'id_marca' => $request->id_marca,
            'modelo' => $request->modelo,
            'year' => $request->year,
            'base' => "LX",
            'traccion' => $request->traccion,
            'cilindraje' => $request->cilindraje,
            'combustion' => $request->combustion,
            'id_categoria' => $request->id_categoria,
            'id_estado' => 1,
            'id_usuario' => $id_usuario,
        ]);

            return redirect()->route('auto.index')->with('message', 'Auto agregado con exito');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
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

        $head = "Editar Auto";
        $data = Auto::findOrFail($id);
        $categorias = AutoCategoria::where('id_estado', 1)->get();
        $marcas = AutoMarca::where('id_estado', 1)->get();
        $tracciones = collect(['4x2','4x4','AWD','FWD','RWD']);

        return Inertia::render('auto/edit', compact('data','head','categorias','marcas','tracciones'));

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
        $auto = Auto::findOrFail($id);

        $auto->update([
            'id_marca' => $request->id_marca,
            'modelo' => $request->modelo,
            'year' => $request->year,
            'base' => "LX",
            'traccion' => $request->traccion,
            'cilindraje' => $request->cilindraje,
            'combustion' => $request->combustion,
            'id_categoria' => $request->id_categoria,
            'id_estado' => 1,
            'id_usuario' => $id_usuario,
        ]);

        return redirect()->route('auto.index')->with('message', 'Auto actualizado con exito');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if(!Auth::check())
        {
            return redirect('/login');
        }

        $auto = Auto::findOrFail($id);
        $auto-> id_estado =2;
        $auto->save();

        $auto = Auto::findOrFail($id);
        $auto->delete();

        return redirect()->route('auto.index')->with('message','Auto eliminado con exito');
    }
}
