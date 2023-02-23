<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class ApiChucknorrisController extends Controller
{
    public function getJokes()
    {
        $array = [];

        for ($i=0; $i <=25 ; $i++) { 
            $response = Http::get('https://api.chucknorris.io/jokes/random');
            $res = $response->json();
            
            if (array_key_exists($res['id'], $array)) {
                $i = --$i;
            } else {
                $array[$res['id']] = $res;
            }

        }
        return response()->json($array);
    }
}
