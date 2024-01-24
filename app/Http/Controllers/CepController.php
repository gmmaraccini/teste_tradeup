<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CepController extends Controller
{
    public function getEndereco($cep)
    {
        //$cep = $request->input('cep');
        //return $cep;
        $response = Http::get("https://viacep.com.br/ws/{$cep}/json/");
        return $response;
    }



}
