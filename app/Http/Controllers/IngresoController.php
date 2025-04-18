<?php

namespace App\Http\Controllers;

use App\Http\Resources\IngresoResource;
use App\Models\Auto;
use App\Models\AutoMarca;
use App\Models\Cliente;
use App\Models\Ingreso;
use App\Models\IngresoCategoria;
use App\Models\IngresoServicio;
use App\Models\PagoCategoria;
use App\Models\Servicio;
use App\Models\ServicioCategoria;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;

class IngresoController extends Controller
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
            1 => "Fecha",
            2 => "Descripcion",
            3 => "Categoria",
            4 => "Total",
        );


        $modulo = "Ingresos";
        $head = "Ingresos";
        $contador = count(Ingreso::where('id_estado', 1)->get());
        $contador = "$contador Ingresos en existencia";

        if ($request->has("query")) {
            $query =  $request->get("query");
            $data = IngresoResource::collection(Ingreso::where("descripcion", "like", "$query%")->orWhere("total", "like", "$query%")->orWhere("fecha", "like", "$query%")->where('id_estado',1)->orderBy('fecha','desc')->paginate(50));
            return Inertia::render('ingreso/index', compact('data', 'contador', 'tableHeaders','modulo'));
        } else {

            $data = IngresoResource::collection(Ingreso::where('id_estado',1)->orderBy('fecha','desc')->paginate(50));
            return Inertia::render('ingreso/index', compact('data', 'contador', 'tableHeaders','modulo','head'));
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

        $head = "Crear Ingreso";
        $categorias = IngresoCategoria::where('id','!=',1)->where('id','!=',2)->where('id','!=',3)->where('id_estado',1)->get();
        $servicios = ServicioCategoria::where('id_estado',1)->get();
        $autos = Auto::with('marcas')->where('id_estado',1)->get();
        $clientes = Cliente::where('id_estado',1)->get();
        $pagos_categorias = PagoCategoria::where('id_estado',1)->get();

        $colores = collect(['Aluminio', 'Aguacate','Almendra','Amarillo','AAmbar','Anaranjado','Arena',
        'Azul','Azul Celeste','Azul Marino','Blanco','Blanco Hueso','Cafe','Carmesi','Chocolate',
        'Corinto','Durazno','Escarlata','Fucsia','Gris','Hielo','Indigo','Iris','Jazmin','Lavanda','Laton',
        'Magenta','Marmol','Marron','Morado','Mostaza','Menta','Melocoton','Naranja','Negro','negro Mate','Nogal',
        'Ocre','Oliva','Perla','Porcelana','Purpura','Rojo','Rubi','Salmon','Tomate','Trigo','Turquesa',
        'Uva','Verde','verde Oliva','Yema','Zanahoria','Zfiro']);


        return Inertia::render('ingreso/create', compact('head','categorias','servicios','autos','clientes','pagos_categorias','colores'));
    }

    public function createServicio()
    {
        if(!Auth::check())
        {
            return redirect('/login');
        }

        $head = "Crear Ingreso";
        $categorias = IngresoCategoria::where('id','!=',3)->where('id','!=',4)->where('id','!=',5)->where('id','!=',6)->where('id','!=',7)->where('id_estado',1)->get();
        $servicios = ServicioCategoria::where('id_estado',1)->get();
        $autos = Auto::with('marcas')->where('id_estado',1)->get();
        $clientes = Cliente::where('id_estado',1)->get();
        $pagos_categorias = PagoCategoria::where('id_estado',1)->get();
        $colores = collect(['Aluminio', 'Aguacate','Almendra','Amarillo','AAmbar','Anaranjado','Arena',
        'Azul','Azul Celeste','Azul Marino','Blanco','Blanco Hueso','Cafe','Carmesi','Chocolate',
        'Corinto','Durazno','Escarlata','Fucsia','Gris','Hielo','Indigo','Iris','Jazmin','Lavanda','Laton',
        'Magenta','Marmol','Marron','Morado','Mostaza','Menta','Melocoton','Naranja','Negro','negro Mate','Nogal',
        'Ocre','Oliva','Perla','Porcelana','Purpura','Rojo','Rubi','Salmon','Tomate','Trigo','Turquesa',
        'Uva','Verde','verde Oliva','Yema','Zanahoria','Zfiro']);

        return Inertia::render('ingreso/create-servicio', compact('head','categorias','servicios','autos','clientes','pagos_categorias','colores'));
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
        $categoriaSeleccionada = $request->id_categoria;

        $ingreso = Ingreso::create([
            'descripcion' => $request->descripcion,
            'fecha' => $request->fecha,
            'id_categoria' => $request->id_categoria,
            'total' => $request->total,
            'id_estado' => 1,
            'id_usuario' => $id_usuario,
          ]);

          $id_ingreso = $ingreso->id;


        if ( $categoriaSeleccionada ==1 ||$categoriaSeleccionada ==2 || $categoriaSeleccionada ==3 ) {
            $servicio = Servicio::create([
                'descripcion' => $request->descripcion,
                'id_cliente' => $request->id_cliente,
                'id_auto' => $request->id_auto,
                'id_categoria' => $request->id_categoria_servicio,
                'color' => $request->color,
                'placa' => $request->placa,
                'id_pago_categoria' => $request->id_pago_categoria,
                'id_estado' => 1,
                'id_usuario' => $id_usuario,
              ]);

              $id_servicio = $servicio->id;


              IngresoServicio::create([
                'id_ingreso' => $id_ingreso,
                'id_servicio' => $id_servicio,
                'id_estado' => 1,
              ]);

              return redirect()->route('ingreso.index')->with('message','Ingreso con Servicio agregado con exito');

        }

         return redirect()->route('ingreso.index')->with('message','Ingreso agregado con exito');


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

        if (IngresoServicio::where('id_ingreso', $id)->exists()) {

            $ingresoServicio = IngresoServicio::where('id_ingreso',$id)->first();
            $id_servicio = $ingresoServicio->id_servicio;

            $data = Ingreso::findOrFail($id);
            $dataServicio = Servicio::findOrFail($id_servicio);
            $head = "Editar Ingreso con Servicio";
            $categorias = IngresoCategoria::where('id_estado',1)->get();
            $servicios = ServicioCategoria::where('id_estado',1)->get();
            $autos = Auto::with('marcas')->where('id_estado',1)->get();
            $clientes = Cliente::where('id_estado',1)->get();
            $pagos_categorias = PagoCategoria::where('id_estado',1)->get();

            return Inertia::render('ingreso/edit-servicio', compact('head','categorias','servicios','autos','clientes','pagos_categorias','data','dataServicio'));

         }else{

            $head = "Editar Ingreso sin Servicio";
            $categorias = IngresoCategoria::where('id_estado',1)->get();
            $data = Ingreso::findOrFail($id);

            return Inertia::render('ingreso/edit', compact('head','categorias','data'));

         }



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

        $categoriaSeleccionada = $request->id_categoria;

        $ingreso= Ingreso::findOrFail($id);
        $ingreso->update([
            'descripcion' => $request->descripcion,
            'fecha' => $request->fecha,
            'id_categoria' => $request->id_categoria,
            'total' => $request->total,
          ]);

          $id_ingreso = $ingreso->id;


        if ( $categoriaSeleccionada ==1 ||$categoriaSeleccionada ==2 || $categoriaSeleccionada ==3 ) {

            $ingresoServicio = IngresoServicio::where('id_ingreso',$id_ingreso)->first();
            $id_servicio = $ingresoServicio->id_servicio;
            $id_servicio_ingreso = $ingresoServicio->id;

            $servicio= Servicio::findOrFail($id_servicio);
            $servicio->update([
                'descripcion' => $request->descripcion,
                'id_cliente' => $request->id_cliente,
                'id_auto' => $request->id_auto,
                'id_categoria' => $request->id_categoria_servicio,
                'color' => $request->color,
                'placa' => $request->placa,
                'id_pago_categoria' => $request->id_pago_categoria,
              ]);

              $id_servicio = $servicio->id;

              $ingreso_servicio= IngresoServicio::findOrFail($id_servicio_ingreso);
              $ingreso_servicio->update([
                'id_ingreso' => $id_ingreso,
                'id_servicio' => $id_servicio,
                'id_estado' => 1,
              ]);

              return redirect()->route('ingreso.index')->with('message','Ingreso con Servicio agregado con exito');

        }

         return redirect()->route('ingreso.index')->with('message','Ingreso agregado con exito');
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

        $ingreso = Ingreso::findOrFail($id);
        $ingreso-> id_estado =2;
        $ingreso->save();

        $id_ingreso = $ingreso ->id;

        if (IngresoServicio::where('id_ingreso', $id_ingreso)->exists()) {

            $ingreso_servicio=IngresoServicio::where('id_ingreso',$id_ingreso)->first();
            $id_ingreso_servicio = $ingreso_servicio->id;
            $id_servicio =  $ingreso_servicio->id_servicio;

            $ingresoServicio = IngresoServicio::findOrFail($id_ingreso_servicio);
            $ingresoServicio-> id_estado =2;
            $ingresoServicio->save();

            $servicio = Servicio::findOrFail($id_servicio);
            $servicio-> id_estado =2;
            $servicio->save();



        }


        $ingreso = Ingreso::findOrFail($id);
        $ingreso->delete();

        return redirect()->route('compra.index')->with('message','Compra eliminada con exito');


    }
}
