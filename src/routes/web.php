<?php

use App\Http\Middleware\VerificaTokenMiddleware;

$router->get('/', function () use ($router) {
    return view('welcome');
});

// Api
$router->post('/login', 'UsuarioController@login');

$router->get('/contato', [
    'middleware'    => 'verificaToken', 
    'uses'          => 'ContatoController@index'
]);

$router->delete('/contato/{contato}', [
    'middleware'    => 'verificaToken', 
    'uses'          => 'ContatoController@delete'
]);

$router->get('/contato/{contato}', [
    'middleware'    => 'verificaToken', 
    'uses'          => 'ContatoController@edit'
]);

$router->put('/contato/{contato}', [
    'middleware'    => 'verificaToken', 
    'uses'          => 'ContatoController@update'
]);

$router->post('/contato', [
    'middleware'    => 'verificaToken', 
    'uses'          => 'ContatoController@create'
]);