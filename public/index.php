<?php
require_once __DIR__ . '/../bootstrap.php';

use Symfony\Component\HttpFoundation\Response;

$response = new Response();

//  Definindo Rota do tipo GET
$app->get('/', function () use ($response) {

    // Trabalhando com Response
    $response->setContent('Olá Mundo');
    return $response;

});

$app->run();