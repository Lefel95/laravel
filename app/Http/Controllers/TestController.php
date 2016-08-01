<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class TestController extends Controller
{
    public function index($nome)
    {

        return view('test.index', ['nome'=> $nome]);
    }
    public function notas()
    {


        $notas= [
                0=> 'Anotacao1',
                1=> 'Anotacao2',
                2=> 'Anotacao3',
                3=> 'Anotacao4',
                4=> 'Anotacao5'

        ];
        return view ('test.notas', compact('notas'));
    }
}
