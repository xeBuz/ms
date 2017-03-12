<?php

use Mono\Controller\LanguageControllerProvider;
use Mono\Controller\ResellerControllerProvider;
use Mono\Controller\TextControllerProvider;
use Silex\Application;
use Silex\Provider\DoctrineServiceProvider;

const API_VERSION = 'v1.0';

$db   =  require __DIR__ . '/../config/db.php';

$app = new Application();

// Register Doctrine to interact with the DB
$app->register(new DoctrineServiceProvider(),
    $db
);

// Mount the Controllers
$app->mount(
    sprintf('/api/%s/text', API_VERSION),
    new TextControllerProvider()
);

$app->mount(
    sprintf('/api/%s/reseller', API_VERSION),
    new ResellerControllerProvider()
);

$app->mount(
    sprintf('/api/%s/language', API_VERSION),
    new LanguageControllerProvider()
);


return $app;
