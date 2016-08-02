<?php

use App\Entity\Cliente;
use App\Mapper\ClienteMapper;
use App\Service\ClienteService;

require_once __DIR__ . '/../bootstrap.php';

// Service Manager: Cliente
$app[ 'clienteService' ] = function () {
    $cliente = new Cliente();
    $clienteMapper = new ClienteMapper();

    $clienteService = new ClienteService($cliente, $clienteMapper);

    return $clienteService;
};

//  Definindo Rota do tipo GET
$app->get('/', function () use ($app) {

    // Trabalhando com twig
    return $app[ 'twig' ]->render('home.html.twig', []);

});

// Definindo Rota com parametros
$app->get('/ola/{nome}', function ($nome) use ($app) {

    // Trabalhando com twig passando parametros
    return $app[ 'twig' ]->render('ola.html.twig', ['nome' => $nome]);

})
    // Valor padrão pra nome
    ->value('nome', 'ser inonimado')
    // Garante que o nome será uma string
    ->convert('nome', function ($nome) {
        return ucwords(strtolower((string)$nome));
    });

// Preparando o ambiente para recepção de clientes
$app->get('/cliente', function () use ($app) {
    $dados[ 'nome' ] = 'Daniel Bispo';
    $dados[ 'email' ] = 'szagot@gmail.com';

    $result = $app[ 'clienteService' ]->insert($dados);

    return $app->json($result);
});

$app->run();