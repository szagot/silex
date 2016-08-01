<?php
use App\Entity\Cliente;
use App\Mapper\ClienteMapper;

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
    $cliente = new Cliente();
    $cliente->setNome('Daniel Bispo');
    $cliente->setEmail('daniel@tmw.com.br');

    $mapper = new ClienteMapper();
    $result = $mapper->insert($cliente);

    return $app->json($result);
});

$app->run();