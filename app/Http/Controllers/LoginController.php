<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Servicos\UsuarioService as ServicosUsuarioService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    // Ações de login
    public function login(Request $form)
    {
        // Está enviando o formulário
        if ($form->isMethod('POST')) {
            // Se um dos campos não for preenchidos, nem tenta o login
            //e volta
            // para a página anterior
            $credenciais = $form->validate([
                'login' => ['required'],
                'password' => ['required'],
            ]);
            // Tenta o login
            if (Auth::attempt($credenciais)) {
                session()->regenerate();
                return redirect()->route('home');
            } else {
                return redirect()
                    ->route('login')
                    ->with('erro', 'Usuário ou senha inválidos.');
            }
        }
        return view('login');
    }
    public function logout()
    {
        Auth::logout();
        return redirect('login');
    }

    public function index(Request $request)
    {
        $data = [];

        return view("cadastro", $data);
    }
    public function cadastro(Request $form)
    {

        $values = $form->all();
        $usuario = new User();

        $usuario->fill($values);
        $usuario->login = $form->input("login", "");

        $senha = $form->input("password", "");
        $usuario->password = Hash::make($senha);

        $clienteServico = new ServicosUsuarioService();
        $result = $clienteServico->salvarUsuario($usuario);

        $message = $result["message"];
        $status = $result["status"];

        session()->flash($status, $message);

        return redirect()->route('login');
    }
}
