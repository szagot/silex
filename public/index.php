<?php
require_once __DIR__ . '/../bootstrap.php';

//  Definindo Rota do tipo GET
$app->get('/', function () {

    // Trabalhando de maneira direta
    return 'Olá Mundo';

});

$app->run();