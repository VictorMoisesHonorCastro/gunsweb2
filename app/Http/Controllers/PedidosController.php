<?php

namespace App\Http\Controllers;

use App\Models\pedidos;
use Illuminate\Http\Request;

class PedidosController extends Controller
{
    public function index(){
        $pedidos=pedidos::all();
        return $pedidos;
    }
    public function createpe(Request $request)
    {
        $request->validate([
        'metodo_paga',
        'id_punto_entrega',
        'id_material',
        'id_usuario',
        'total',
        'estado'
        ]);
        $pedidos=new pedidos();
        $pedidos->metodo_paga=$request->metodo_paga;
        $pedidos->id_punto_entrega=$request->id_punto_entrega;
        $pedidos->id_material=$request->id_material;
        $pedidos->id_usuario=$request->id_usuario;
        $pedidos->total=$request->total;
        $pedidos->estado=$request->estado;
        $pedidos->save();
        return Response()->json([
            'message'=> 'Successfull crerated pedido'
        ]);
    }
    public function readpe(Request $request)
    {

    }
    public function updatepe(Request $request)
    {
        $pedidos=pedidos::findOrFail($request->id);
        $pedidos->metodo_paga=$request->metodo_paga;
        $pedidos->id_punto_entrega=$request->id_punto_entrega;
        $pedidos->id_material=$request->id_material;
        $pedidos->id_usuario=$request->id_usuario;
        $pedidos->total=$request->total;
        $pedidos->estado=$request->estado;
        $pedidos->save();
        return $pedidos;
    }
    public function deletepe(Request $request)
    {
        pedidos::destroy($request->id);
    }
}
