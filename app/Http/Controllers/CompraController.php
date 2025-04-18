<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Compra;
use App\Models\CompraCategoria;
use App\Models\Proveedor;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use App\Http\Resources\CompraResource;


class CompraController extends Controller
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
            1 => "Codigo Factura",
            2 => "Fecha",
            3 => "Descripcion",
            4 => "Categoria",
            5 => "Proveedor",
            6 => "Total",
        );


        $modulo = "Compras";
        $head = "Compras";
        $contador = count(Compra::where('id_estado', 1)->get());
        $contador = "$contador Compras en existencia";

        if ($request->has("query")) {
            $query =  $request->get("query");
            $data = CompraResource::collection(Compra::where("fecha", "like", "$query%")->orWhere("codigo_compra)", "like", "$query%")->orWhere("descripcion", "like", "$query%")->where('id_estado',1)->orderBy('fecha','desc')->paginate(50));
            return Inertia::render('compra/index', compact('data', 'contador', 'tableHeaders','modulo'));
        } else {

            $data = CompraResource::collection(Compra::where('id_estado',1)->orderBy('fecha','desc')->paginate(50));
            return Inertia::render('compra/index', compact('data', 'contador', 'tableHeaders','modulo','head'));
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

        $head = "Crear Compra";
        $proveedores = Proveedor::where('id_estado',1)->get();
        $categorias = CompraCategoria::where('id_estado',1)->get();

        return Inertia::render('compra/create', compact('head','proveedores','categorias'));
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

        $id_usuario= Auth::id();
        $codigo= $request->codigo_compra;
        $total = $request->total;
        $isv15= $total/1.15;
        $gravado15 = $total = $isv15;
        $isv15 = number_format($isv15, 2, '.', '');
        $gravado15 = number_format($gravado15, 2, '.', '');

        if (Compra::where('codigo_compra', $codigo)->exists()) {
            return redirect()->route('compra.index')->with('message','Compra NO guardada - Codigo Factura ya existe');
         }

         Compra::create([
            'codigo_compra' => $request->codigo_compra,
            'fecha' => $request->fecha,
            'descripcion' => $request->descripcion,
            'id_categoria' => $request->id_categoria,
            'id_proveedor' => $request->id_proveedor,
            'id_tipo_cuenta' => 1,
            'id_estado_cuenta' => 1,
            'fecha_pago' => $request->fecha,
            'gravado15' => $gravado15,
            'gravado18' => '0',
            'impuesto15' => $isv15,
            'impuesto18' => '0',
            'exento' => '0',
            'exonerado' => '0',
            'total' => $request->total,
            'id_estado' =>  1,
            'id_usuario' =>  $id_usuario,
          ]);

          return redirect()->route('compra.index')->with('message','Compra agregada con exito');
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

        $data = Compra::findOrFail($id);
        $head = "Editar Compra";
        $proveedores = Proveedor::where('id_estado',1)->get();
        $categorias = CompraCategoria::where('id_estado',1)->get();
        return Inertia::render('compra/edit', compact('data','head','proveedores','categorias'));
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

        $id_usuario= Auth::id();
        $compra= Compra::findOrFail($id);
        $total = $request->total;
        $isv15= $total/1.15;
        $gravado15 = $total = $isv15;
        $isv15 = number_format($isv15, 2, '.', '');
        $gravado15 = number_format($gravado15, 2, '.', '');

         $compra->update([
            'codigo_compra' => $request->codigo_compra,
            'fecha' => $request->fecha,
            'descripcion' => $request->descripcion,
            'id_categoria' => $request->id_categoria,
            'id_proveedor' => $request->id_proveedor,
            'id_tipo_cuenta' => 1,
            'id_estado_cuenta' => 1,
            'fecha_pago' => $request->fecha,
            'gravado15' => $gravado15,
            'gravado18' => '0',
            'impuesto15' => $isv15,
            'impuesto18' => '0',
            'exento' => '0',
            'exonerado' => '0',
            'total' => $request->total,
            'id_estado' =>  1,
            'id_usuario' =>  $id_usuario,
          ]);

          return redirect()->route('compra.index')->with('message','Compra actualizada con exito');
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

        $compra = Compra::findOrFail($id);
        $compra-> id_estado =2;
        $compra->save();

        $compra = Compra::findOrFail($id);
        $compra->delete();

        return redirect()->route('compra.index')->with('message','Compra eliminada con exito');
    }

    public function import(Request $request)
    {
        if(!Auth::check())
        {
            return redirect('/login');
        }
        $file = $request->file('file');
        $fileContents = file($file->getPathname());

        foreach ($fileContents as $line) {
            $data = str_getcsv($line);

            Compra::create([
                'id' => $data[0],
                'codigo_compra' => $data[1],
                'fecha' => $data[2],
                'descripcion' => $data[3],
                'id_categoria' => $data[4],
                'id_proveedor' => $data[5],
                'id_tipo_cuenta' => $data[6],
                'id_estado_cuenta' => $data[7],
                'fecha_pago' => $data[8],
                'gravado15' => $data[9],
                'gravado18' => $data[10],
                'impuesto15' => $data[11],
                'impuesto18' => $data[12],
                'exento' => $data[13],
                'exonerado' => $data[14],
                'total' => $data[15],
                'id_estado' => $data[16],
                'id_usuario' => $data[17],
                'created_at' => $data[18],
                'updated_at' => $data[19],
                // Add more fields as needed
            ]);
        }

        return redirect()->route('compra.index')->with('message', 'Compras guardados con exito');
    }
}
