<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use App\Models\User;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AgendamentosController extends Controller
{
    public function index()
    {
        try {
            $userId = Auth::user()->id;
            $verificaAdmin = User::where('id', $userId)
                ->select('admin')
                ->first()->admin;

            if ($verificaAdmin == false) {

                $solicitacoes = Pedido::where('usuario_id', $userId)->where('confirmado', null)
                    ->leftJoin('users', 'users.id', 'pedidos.usuario_id')
                    ->select(
                        'pedidos.id as pedido_id',
                        'nome_servico',
                        'data',
                        'horario',
                        'users.name as usuario_id',
                        'users.admin'
                    )
                    ->orderBy('pedidos.id', 'desc')
                    ->get();

                foreach ($solicitacoes as $key => &$pedido) {

                    $pedido->data = Carbon::parse($pedido->data)->format('d/m/Y');
                }

                return view('solicitacoes', [
                    'solicitacoes' => $solicitacoes
                ]);
            } else if ($verificaAdmin == true) {
                $solicitacoes = Pedido::where('confirmado', null)
                    ->leftJoin('users', 'users.id', 'pedidos.usuario_id')
                    ->select(
                        'pedidos.id as pedido_id',
                        'nome_servico',
                        'data',
                        'horario',
                        'users.name as usuario_id',
                        'users.admin'
                    )
                    ->orderBy('pedidos.id', 'desc')
                    ->get();

                foreach ($solicitacoes as $key => &$pedido) {

                    $pedido->data = Carbon::parse($pedido->data)->format('d/m/Y');
                }

                return view('solicitacoes', [
                    'solicitacoes' => $solicitacoes
                ]);
            }
        } catch (Exception $e) {
            return $e;
        }
    }
    public function recusaServico(Request $request)
    {
        try {
            //não funcionou, rever a lógica
            // return 'chegou';

            $data = $request->all();
            $id = array_shift($data);
            Pedido::where('id', $id)->update(['confirmado' => 1]);

            return redirect('/solicitacoes');

        } catch (Exception $e) {
            return $e;
        }
    }
    public function aceitaServico(Request $request)
    {
        try {
            //não funcionou, rever a lógica
            $data = $request->all();
            $id = array_shift($data);
            Pedido::where('id', $id)->update(['confirmado' => 0]);

            return redirect('/solicitacoes');
        } catch (Exception $e) {
            return $e;
        }
    }
}