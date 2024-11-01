<?php

use App\Http\Controllers\PeopleController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return response()->json([
        'message' => 'OK'
    ]);
});

Route::get('/somar', function (Request $request) {
    //nao esta chegando nada pela request
    if (count($request->all()) < 1) {
        return response()->json([
            'message' => 'Não há valores para somar.'
        ], 406);
    }

    $soma = array_sum($request->all());
    return response()->json([
        'message' => 'somando com sucesso', //opcional
        'sum' => $soma,
    ]);
    
});

Route::prefix('/people')->group(function () {
        Route::get('/list', [PeopleController::class, 'list']);

        Route::post('/store', [PeopleController::class, 'store']);//StorePeopleRequest

        Route::post('/storeInterest', [PeopleController::class, 'storeInterest']);
    });

