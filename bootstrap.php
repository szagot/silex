<?php
require_once 'vendor/autoload.php';

$app = new \Silex\Application();

// Modo de Debug ativo
$app[ 'debug' ] = true;

// Registrando Twig
$app->register(new \Silex\Provider\TwigServiceProvider(), [
    'twig.path' => __DIR__ . '/template'
]);

// Registrando URL Generator Provider
$app->register(new \Silex\Provider\UrlGeneratorServiceProvider());