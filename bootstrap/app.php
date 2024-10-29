<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {//qnd for rodar, que faca essa validacao
        $middleware->validateCsrfTokens(
            //lista de coisas para nao rodar
            except:[
                '*' //nao é pra proteger nenhuma rota 
                //exemplo pra destaivar uma rota em especifica
                //'api/*'
                //'pagina-desprovtegida/action*'
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
