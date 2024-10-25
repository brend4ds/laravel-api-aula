<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePeopleRequest;
use App\Models\People;
use Illuminate\Http\Request;

class PeopleController extends Controller
{
    public function list (Request $request){
        //return People::all(); //pegando todos os itens 
        return People::paginate(15); //colocando 10 por pag
    }

    public function store(StorePeopleRequest $people){
        return true;
    }
}
