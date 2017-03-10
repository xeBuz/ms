<?php
// Composer loader
require_once __DIR__ . '/vendor/autoload.php';

// Timezone
date_default_timezone_set('Europe/Copenhagen');

// New application
$app =  require __DIR__ . '/app/app.php';

// Debug
$app['debug'] = true;

// Run app
$app->run();