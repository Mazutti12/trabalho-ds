<?php

namespace App\Http\Controllers;

use App\Mail\MailNotify;
use App\Models\Pedido;
use App\Models\User;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

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
    public function recusaServico(Request $request)
    {
        try {
            //não funcionou, rever a lógica
            // Pedido::where('id', $id)->update(['confirmado' => 0]);

            $msg = [
                "subject"=>"Agendamento Recusado",
                "body"=>"Seu Agendamento foi recusado!"
                ];
              // MailNotify class that is extend from Mailable class.
          
            Mail::to('bernardobola300@gmail.com')->send(new MailNotify($msg));
            return response()->json(['Great! Successfully send in your mail']);
            return redirect('/solicitacoes');

        } catch (Exception $e) {
            return $e;
        }
    }
    public function aceitaServico(Request $request, Pedido $id)
    {
        try {
            //não funcionou, rever a lógica
            Pedido::where('id', $id)->update(['confirmado' => 0]);

            $msg = [
                "subject"=>"Agendamento Confirmado",
                "body"=>"Seu Agendamento foi enviado!"
                ];
              // MailNotify class that is extend from Mailable class.
          
            Mail::to('bernardobola300@gmail.com')->send(new MailNotify($msg));
            return response()->json(['Great! Successfully send in your mail']);
    
            return redirect('/solicitacoes');
        } catch (Exception $e) {
            return $e;
        }
    }
}
