<?php

use Mono\Controller\LanguageControllerProvider;
use Mono\Controller\ResellerControllerProvider;
use Mono\Controller\TextControllerProvider;
use Silex\Application;
use Silex\Provider\DoctrineServiceProvider;

const API_VERSION = 'v1.0';

$db   =  require __DIR__ . '/../config/db_mysql.php';
$conf =  require __DIR__ . '/../config/conf.php';


$app = new Application();


$app->register(new DoctrineServiceProvider(),
    $db
);

$app->mount(
    sprintf('/api/text', API_VERSION),
    new TextControllerProvider()
);

$app->mount(
    sprintf('/api/reseller', API_VERSION),
    new ResellerControllerProvider()
);

$app->mount(
    sprintf('/api/language', API_VERSION),
    new LanguageControllerProvider()
);
return $app;
