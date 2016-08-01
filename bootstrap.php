<?php
require_once 'vendor/autoload.php';

$app = new \Silex\Application();

// Modo de Debug ativo
$app['debug'] = true;