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

$app->run();