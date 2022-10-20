<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AgendarController extends Controller
{
    public function store(Request $request){
        $data = $request->nome;
        return $data;
    }
}
