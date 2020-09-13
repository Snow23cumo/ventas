<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use App\Http\Requests\ArticuloFormRequest;
use App\models\Articulo;

use Illuminate\Support\Facades\DB;
class ArticuloController extends Controller
{
    public function __construct()
    {
        // Evitar que se ingrese ingresando la ruta en la url
        //$this->middleware('auth');
    }


    public function index(Request $request)
    {
        if ($request) {

            $query = trim($request->get('searchText'));
            $articulos = DB::table('articulo as a')
            ->join('categoria as c','a.idcategoria','=','c.idcategoria')
            ->select('a.idarticulo','a.nombre','a.codigo','a.stock','c.nombre as categoria','a.descripcion','a.imagen','a.estado')
            ->where('a.nombre', 'LIKE', '%' . $query . '%')
            ->orwhere('a.codigo', 'LIKE', '%' . $query . '%')
                ->orderBy('a.idcategoria', 'asc')
                ->paginate(7);
            return view('almacen.articulo.index', ["articulos" => $articulos, "searchTex" => $query]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // listado de las categorias
        $categorias = DB::table('categoria')->where('condicion','=','1')->get();

        return view("almacen.articulo.create",["categorias"=>$categorias] );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArticuloFormRequest $request)
    {
       $articulo = new Articulo;
       $articulo->idcategoria = $request->get('idcategoria');
       $articulo->codigo = $request->get('codigo');
       $articulo->nombre = $request->get('nombre');
       $articulo->stock = $request->get('stock');
       $articulo->descripcion = $request->get('descripcion');
       $articulo->estado = 'Activo';

       // cargar la imagen
       if(Input::hasFile('imagen')){
           $file=Input::file('imagen');
           // mover la imagen a un directorio en la carpeta public de nuestro proyecto
           $file->move(public_path().'/imagenes/articulos/',$file->getClientOriginalName());

           $articulo->imagen=$file->getClientOriginalName();

       }
       $articulo->save();
        // redirige al listado de todos los articulos
        return Redirect::to('almacen/articulo');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view("almacen.articulo.show", ["articulo" => Articulo::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // para seleccionar un articulo especifico
        $articulo = Articulo::findOrFail($id);
        // me retorna las categorias cuya condicion es igual a 1
        $categorias = DB::table('categoria')->where('condicion','=','1')->get();

        return view("almacen.articulo.edit", ["articulo" =>$articulo,"categorias"=>$categorias]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update( ArticuloFormRequest $request, $id)
    {
        $articulo = Articulo::findOrFail($id);
        $articulo->idcategoria = $request->get('idcategoria');
        $articulo->codigo = $request->get('codigo');
        $articulo->nombre = $request->get('nombre');
        $articulo->stock = $request->get('stock');
        $articulo->descripcion = $request->get('descripcion');
        $articulo->estado = 'Activo';
 
        // cargar la imagen
        if(Input::hasFile('imagen')){
            $file=Input::file('imagen');
            // mover la imagen a un directorio en la carpeta public de nuestro proyecto
            $file->move(public_path().'/imagenes/articulos/',$file->getClientOriginalName());
 
            $articulo->imagen=$file->getClientOriginalName();
 
        }
        $articulo->update();
        return Redirect::to('almacen/articulo');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $articulo = Articulo::findOrFail($id);

        $articulo->estado = 'Inactivo';
        $articulo->update();

        return Redirect::to('almacen/articulo');
    }
}
