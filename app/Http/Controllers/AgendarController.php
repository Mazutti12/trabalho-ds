<?php

namespace App\Http\Controllers;

use App\Models\Agendamento;
use Carbon\Carbon;
use Carbon\CarbonImmutable;
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


            //modal e banco foram exlcuidos, refazer
            $agendamento = new Agendamento();
            DB::beginTransaction();
            $agendamento->fill($data);
            $agendamento->save();
            DB::commit();

            return 'cadastro realizado com sucesso!';

        } catch (\Exception $e) {
            DB::rollback();
            return $e;
        }
    }
}
