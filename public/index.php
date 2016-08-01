<?php

use App\Entity\Cliente;
use App\Mapper\ClienteMapper;
use App\Service\ClienteService;

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
$app->get('/cliente', function () use ($app) {
    $dados[ 'nome' ] = 'Daniel Bispo';
    $dados[ 'email' ] = 'szagot@gmail.com';

    $cliente = new Cliente();
    $clienteMapper = new ClienteMapper();

    $clienteService = new ClienteService($cliente, $clienteMapper);
    $result = $clienteService->insert($dados);

    return $app->json($result);
});

$app->run();