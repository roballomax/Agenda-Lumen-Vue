<?php

$router->get('/', function () use ($router) {
    return view('welcome');
});
