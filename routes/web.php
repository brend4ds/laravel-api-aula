<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return response()->json([
        'message' => 'OK'
    ]);
});

Route::get('/somar', function(Request $request){
    //nao esta chegando nada pela request
    if(count($request->all()) < 1 ){
        return response()->json([
            'message' => 'Não há valores para somar.'
        ], 406 );
    }

    $soma = array_sum($request -> all());
    return response()->json([
        'message' => 'somando com sucesso', //opcional
        'sum' => $soma,
    ]);
});
