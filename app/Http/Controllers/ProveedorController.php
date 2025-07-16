<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProveedorResource;
use App\Models\Proveedor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use Illuminate\Support\Facades\Log;

class ProveedorController extends Controller
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
            1 => "RTN Proveedor",
            2 => "Descripcion",
            3 => "Categoria",
            4 => "Contacto",
            5 => "Telefono",
        );

        $modulo = "Proveedores";
        $head = "Proveedores";
        $contador = count(Proveedor::where('id_estado', 1)->get());
        $contador = "$contador Categorias en existencia";

        if ($request->has("query")) {
            $query =  $request->get("query");
            $data = ProveedorResource::collection(Proveedor::where("descripcion", "like", "$query%")->orWhere("codigo_proveedor", "like", "$query%")->orWhere("contacto", "like", "$query%")->where('id_estado', 1)->paginate(50));
            return Inertia::render('proveedor/index', compact('data', 'contador', 'tableHeaders', 'modulo'));
        } else {

            $data = ProveedorResource::collection(Proveedor::where('id_estado', 1)->paginate(50));
            return Inertia::render('proveedor/index', compact('data', 'contador', 'tableHeaders', 'modulo', 'head'));
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
        $head = "Crear Proveedor";
        $categorias = collect([
            'Accesorios',
            'Accesorios y Repuestos Varios',
            'Electricidad',
            'Llanteria',
            'Pintura Automotriz',
            'Materiales Automotriz',
            'Repuestos y Refracciones',
            'Refrigeracion',
            'Tornilleria'
        ]);

        return Inertia::render('proveedor/create', compact('head', 'categorias'));
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
            $registro = now();

            $codigo = $request->codigo_proveedor;

            if (Proveedor::where('codigo_proveedor', $codigo)->exists()) {
                return redirect()->route('proveedor.index')->with('message', 'Proveedor NO guardado - RTN ya existe');
            }

            Proveedor::create([
                'codigo_proveedor' => $request->codigo_proveedor,
                'descripcion' => $request->descripcion,
                'categoria' => $request->categoria,
                'contacto' => $request->contacto,
                'telefono' => $request->telefono,
                'id_estado' =>  1,
                'id_usuario' =>  $id_usuario,
            ]);

            return redirect()->route('proveedor.index')->with('message', 'Proveedor agregado con exito');
        } catch (\Throwable $th) {
            Log::error('Error guardando proveedor: ' . $th->getMessage());
            return redirect()->route('proveedor.index')->with('error', 'Error al guardar el proveedor: ' . $th->getMessage());
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

        $data = Proveedor::findOrFail($id);
        $head = "Editar Proveedor";
        $categorias = collect([
            'Accesorios',
            'Accesorios y Repuestos Varios',
            'Electricidad',
            'Llanteria',
            'Pintura Automotriz',
            'Materiales Automotriz',
            'Repuestos y Refracciones',
            'Refrigeracion',
            'Tornilleria'
        ]);

        return Inertia::render('proveedor/edit', compact('data', 'head', 'categorias'));
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
            $registro = now();

            $proveedor = Proveedor::findOrFail($id);
            $proveedor->update([
                'codigo_proveedor' => $request->codigo_proveedor,
                'descripcion' => $request->descripcion,
                'categoria' => $request->categoria,
                'contacto' => $request->contacto,
                'telefono' => $request->telefono,
                'id_usuario' =>  $id_usuario,
            ]);

            return redirect()->route('proveedor.index')->with('message', 'Proveedor actualizado con exito');
        } catch (\Throwable $th) {
            Log::error('Error actualizando proveedor: ' . $th->getMessage());
            return redirect()->route('proveedor.index')->with('error', 'Error al actualizar el proveedor: ' . $th->getMessage());
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


        $proveedor = Proveedor::findOrFail($id);
        $proveedor->id_estado = 2;
        $proveedor->save();

        $proveedor = Proveedor::findOrFail($id);
        $proveedor->delete();

        return redirect()->route('proveedor.index')->with('message', 'Proveedor eliminado con exito');
    }

    public function import(Request $request)
    {
        if (!Auth::check()) {
            return redirect('/login');
        }

        $file = $request->file('file');
        $fileContents = file($file->getPathname());

        foreach ($fileContents as $line) {
            $data = str_getcsv($line);

            Proveedor::create([
                'id' => $data[0],
                'codigo_proveedor' => $data[1],
                'descripcion' => $data[2],
                'categoria' => $data[3],
                'contacto' => $data[4],
                'telefono' => $data[5],
                'id_estado' => $data[6],
                'id_usuario' => $data[7],
                'created_at' => $data[8],
                'updated_at' => $data[9],
                // Add more fields as needed
            ]);
        }

        return redirect()->route('proveedor.index')->with('message', 'Proveedores guardados con exito');
    }
}
