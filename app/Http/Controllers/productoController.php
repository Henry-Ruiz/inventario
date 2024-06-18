<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Categoria;
use Illuminate\Http\Request;

class productoController extends Controller
{
    //
    public function principal()
    {
        $producto = Producto::paginate(5);
        return view('productos.principal', ['prod' => $producto]);
    }

    public function crear()
    {
        return view('productos.crear');
    }

    public function mostrar($variable)
    {
        $producto = Producto::find($variable);

        $cat_id= $producto->categoria_id;

        $categoria=Categoria::find($cat_id);

        // return view('productos.mostrar', ['prod'=>$variable]);
        return view("productos.mostrar", compact('producto','categoria'));
    }

    public function store(Request $request)
    {
        $pro=new Producto();
        $pro->nombre=$request->nombre;
        $pro->precio=$request->precio;
        $pro->descripcion=$request->descripcion;
        $pro->categoria=$request->categoria;

        // return $request->all();
        $pro->save();

        // return redirect()->route('producto.principal');
        return redirect()->route('producto.mostrar', $pro->id);

    }

    public function editar(Producto $producto){
        // $producto=Producto::find($id);
        // return $producto;
        return view("productos.editar", compact('producto'));

    }


    public function update(Request $request, Producto $producto){
        
        $producto->nombre=$request->nombre;
        $producto->precio=$request->precio;
        $producto->descripcion=$request->descripcion;
        $producto->categoria=$request->categoria;

        $producto->save();
        return redirect()->route('producto.mostrar', $producto->id);

    }
    public function destroy(Producto $id) 
    { 
        $id->delete();//usamos el metodo delete para eliminar el objeto 
        return redirect()->Route('producto.principal');//redireccionamos a la 
        //vista index. 
    } 


} 
