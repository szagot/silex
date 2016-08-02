<?php

use App\Entity\Cliente;
use App\Entity\Produto;
use App\Mapper\ClienteMapper;
use App\Mapper\ProdutoMapper;
use App\Service\ClienteService;
use App\Service\ProdutoService;

require_once __DIR__ . '/../bootstrap.php';

// Service Manager: Cliente
$app[ 'clienteService' ] = function () {
    $cliente = new Cliente();
    $clienteMapper = new ClienteMapper();

    $clienteService = new ClienteService($cliente, $clienteMapper);

    return $clienteService;
};

// Service Manager: Produto
$app[ 'produtoService' ] = function () {
    $produto = new Produto();
    $produtoMapper = new ProdutoMapper();

    $produtoService = new ProdutoService($produto, $produtoMapper);

    return $produtoService;
};

//  Definindo Rota do tipo GET
$app->get('/', function () use ($app) {

    // Trabalhando com twig
    return $app[ 'twig' ]->render('home.html.twig', []);

})->bind('index');

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
    })
    // Nomeando rota
    ->bind('ola');

## FIM EXEMPLOS ##

$app->get('/clientes', function () use ($app) {

    // Pegando dados do Cliente
    $dados = $app[ 'clienteService' ]->fetchAll();

    // Mostrando com HTML
    return $app[ 'twig' ]->render('clientes.html.twig', ['clientes' => $dados]);

})->bind('clientes');

// Preparando o ambiente para recepção de clientes
$app->get('/cliente', function () use ($app) {

    $dados[ 'nome' ] = 'Daniel Bispo';
    $dados[ 'email' ] = 'szagot@gmail.com';

    $result = $app[ 'clienteService' ]->insert($dados);

    return $app->json($result);

})->bind('cliente');

$app->get('/produtos', function () use ($app) {

    // Pegando dados do Cliente
    $dados = $app[ 'produtoService' ]->fetchAll();

    // Mostrando com HTML
    return $app[ 'twig' ]->render('produtos.html.twig', ['produtos' => $dados]);

})->bind('produtos');

// Preparando o ambiente para recepção de clientes
$app->get('/produto', function () use ($app) {

    $dados = [
        'id'        => 1,
        'nome'      => 'iPhone 6',
        'descricao' => 'Cuidado! Produto Apple. Delicado e de Mente fechada',
        'valor'     => 99999.99
    ];

    $result = $app[ 'produtoService' ]->insert($dados);

    return $app->json($result);

})->bind('produto');

// Rodando Aplicação
$app->run();