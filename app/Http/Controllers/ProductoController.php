<?php

namespace App\Http\Controllers;
use App\Models\Producto;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\PDF;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /* elocuente manualmente para las consultas trae todos los productos */
        $productos = Producto::all();
        /* return view('gestionProductos', compact('productos')); */
        return view('index') -> with('productos', $productos);

        /* return redirect()->route('productos.index'); */
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('gestionProductos');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

     /* campos que llegan desde el metodo este es para los form */
    public function store(Request $request)
    {
        $nombre = $request->input('nombre');
        $precio = $request->input('precio');
        $descripcion = $request->input('descripcion');

        $producto = new Producto();
        $producto->nombre = $nombre;
        $producto->precio = $precio;
        $producto->descripcion = $descripcion;
        $producto->save();

        /* return view('gestionProductos'); */
        /* aqui mando a la vista para la redireccion al index que es donde muestro la tabla */
        return redirect()->route('productos.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //consultar datos a editar
        $producto = Producto::find($id);
        return view('editar')-> with('productos', $producto); //enviar datos a la vista con productos y trae los id de los productos de la tabla
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $producto = Producto::find($id);
        $producto->nombre = $request->nom;
        $producto->precio = $request->preci;
        $producto->descripcion = $request->descri;
        $producto->save();

        return redirect()->route('productos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $producto = Producto::find($id);
        $producto->delete();
        return redirect()->route('productos.index');
    }

    public function generar_pdf(){
        /* en esta linea siguiente puede uno cambiar a la consulta personalizada que necesite */
        $productos = Producto::all();
        $pdf = PDF::loadView('generar_pdf', compact('productos'));
        /* nombre que tendra el archivo por defecto */
        return $pdf->download('listado_productos.pdf');
    }
}
