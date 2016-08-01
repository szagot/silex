<?php
require_once __DIR__ . '/../bootstrap.php';

//  Definindo Rota do tipo GET
$app->get('/', function () {

    // Trabalhando de maneira direta
    return 'Olá Mundo';

});

// Definindo Rota com parametros
$app->get('/ola/{nome}', function ($nome) {

    return 'Olá ' . $nome;

});

// Preparando o ambiente para recepção de clientes
$app->get('/clientes', function () {

    $response = new \Symfony\Component\HttpFoundation\JsonResponse();

    $response->setData([
        'name'     => 'Daniel Bispo',
        'email'    => 'szagot@gmail.com',
        'document' => [
            'type'   => 'CPF',
            'number' => '304.714.108-88'
        ]
    ]);

    // Simulando exibção em JSon
    return $response;

});

$app->run();