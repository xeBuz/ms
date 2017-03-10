<?php

use Silex\Application;
use Silex\Provider\DoctrineServiceProvider;
use Mono\TextControllerProvider;

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

return $app;
