<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use App\Models\User;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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

                $adminUser = 0;

                return view('solicitacoes', [
                    'solicitacoes' => $solicitacoes, 'adminUser' => $adminUser
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
                $adminUser = 1;

                return view('solicitacoes', [
                    'solicitacoes' => $solicitacoes, 'adminUser' => $adminUser
                ]);
            }
        } catch (Exception $e) {
            return $e;
        }
    }
    public function recusaServico(Pedido $id)
    {
        try {
            //não funcionou, rever a lógica
            DB::beginTransaction();

            $id->confirmado = 1;
            $id->save();

            DB::commit();

            return redirect('/solicitacoes');

        } catch (Exception $e) {
            return $e;
        }
    }
    public function aceitaServico(Pedido $id)
    {
        try {

            DB::beginTransaction();

            $id->confirmado = 0;
            $id->save();

            DB::commit();

            return redirect('/solicitacoes');
        } catch (Exception $e) {
            DB::rollBack();
            return $e;
        }
    }
}
