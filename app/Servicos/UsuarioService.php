<?php

namespace App\Servicos;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class UsuarioService
{
    public function salvarUsuario(User $user)
    {
        try {
            $dbUsuario = User::where("login", $user->login)->first();
            if ($dbUsuario) {
                return ['status' => 'err', 'message' => 'Perfil já cadastrado.'];
            }
            DB::beginTransaction();
            $user->save();
            DB::commit();

            return ['status' => 'ok', 'message' => 'Perfil criado com sucesso.'];
        } catch (\Exception $e) {
            Log::error("ERRO", ['file' => 'UsuarioService.salvarUsuario', 'message' => $e->getMessage()]);

            DB::rollback();
            return ['status' => 'ok', 'message' => 'Não foi possível cadastrar o Perfil.'];
        }
    }
}
