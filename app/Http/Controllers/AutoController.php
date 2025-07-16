<?php

namespace App\Http\Controllers;

use App\Http\Resources\AutoResource;
use App\Models\Auto;
use App\Models\AutoCategoria;
use App\Models\AutoMarca;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use Illuminate\Support\Facades\Log;

class AutoController extends Controller
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
            $query = $request->get("query");
            $data = AutoResource::collection(
                Auto::where('id_estado', 1)
                    ->where(function ($q) use ($query) {
                        $q->where("modelo", "like", "%$query%")
                            ->orWhere("base", "like", "%$query%")
                            ->orWhereHas('marca', function ($subQ) use ($query) {
                                $subQ->where('descripcion', 'like', "%$query%");
                            });
                    })
                    ->paginate(50)
            );
            return Inertia::render('auto/index', compact('data', 'contador', 'tableHeaders', 'modulo'));
        } else {

            $data = AutoResource::collection(Auto::where('id_estado', 1)->paginate(50));
            return Inertia::render('auto/index', compact('data', 'contador', 'tableHeaders', 'modulo'));
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
        $tracciones = collect(['4x2', '4x4', 'AWD', 'FWD', 'RWD']);

        return Inertia::render('auto/create', compact('head', 'categorias', 'marcas', 'tracciones'));
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
        } catch (\Throwable $th) {
            Log::error('Error guardando el auto: ' . $th->getMessage());
            return redirect()->route('auto.index')->with('error', 'Error al guardar el auto: ' . $th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id) {}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        if (!Auth::check()) {
            return redirect('/login');
        }

        $head = "Editar Auto";
        $data = Auto::findOrFail($id);
        $categorias = AutoCategoria::where('id_estado', 1)->get();
        $marcas = AutoMarca::where('id_estado', 1)->get();
        $tracciones = collect(['4x2', '4x4', 'AWD', 'FWD', 'RWD']);

        return Inertia::render('auto/edit', compact('data', 'head', 'categorias', 'marcas', 'tracciones'));
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
        } catch (\Throwable $th) {
            Log::error('Error actualizando el auto: ' . $th->getMessage());
            return redirect()->route('auto.index')->with('error', 'Error al actualizar el auto: ' . $th->getMessage());
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

        $auto = Auto::findOrFail($id);
        $auto->id_estado = 2;
        $auto->save();

        // No es necesario hacer delete() después de cambiar el estado
        // El soft delete ya se maneja con id_estado

        return redirect()->route('auto.index')->with('message', 'Auto eliminado con exito');
    }
}
