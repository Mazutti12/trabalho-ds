<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AgendarController extends Controller
{
    public function store(Request $request)
    {

        try {

            $data = $request->all();

            $data['usuario_id'] = Auth::user()->id;

            $dataPedido = Pedido::where('data', $request->data)->where('horario', $request->horario)->first();
            if($dataPedido){
                return view('home', ['erro' => "Data e hora já marcada.!"]);
            }

            Pedido::create($data);

            return view('home');
        } catch (\Exception $e) {
            DB::rollback();
            return $e;
        }
    }
    public function index()
    {
        try {
            $userId = Auth::user()->id;
            $verificaAdmin = User::where('id', $userId)
            ->select('admin')
            ->first()->admin;

            if($verificaAdmin == false){
            //refazer a pesquisa de confirmado
            $pedidos = Pedido::leftJoin('users','users.id', 'pedidos.usuario_id')->where('confirmado', 1)
            ->where('usuario_id', $userId)
            ->select(
                'pedidos.id',
                'nome_servico',
                'data',
                'horario',
                'users.name as usuario_id',
                DB::raw('(
                    CASE
                        WHEN pedidos.confirmado = 1 THEN "Recusado"
                        ELSE "Aceito"
                    END
                    ) AS status')
            )
            ->orderBy('id', 'desc')
            ->get();

            foreach ($pedidos as $key => &$pedido) {

                $pedido->data = Carbon::parse($pedido->data)->format('d/m/Y');

            }

            return view('pedidos', [
                'pedidos' => $pedidos
            ]);
        }else if($verificaAdmin == true){
            //refazer a pesquisa de confirmado
            $pedidos = Pedido::leftJoin('users','users.id', 'pedidos.usuario_id')->where('confirmado', 1)
            ->select(
                'pedidos.id',
                'nome_servico',
                'data',
                'horario',
                'users.name as usuario_id',
                DB::raw('(
                    CASE
                        WHEN pedidos.confirmado = 1 THEN "Recusado"
                        ELSE "Aceito"
                    END
                    ) AS status')
            )
            ->orderBy('id', 'desc')
            ->get();

            foreach ($pedidos as $key => &$pedido) {

                $pedido->data = Carbon::parse($pedido->data)->format('d/m/Y');

            }

            return view('pedidos', [
                'pedidos' => $pedidos
            ]);
        }
        } catch (\Exception $e) {
            DB::rollback();
            return $e;
        }
    }
}
