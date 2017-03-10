<?php

namespace Mono;

use Silex\Application;
use Silex\Api\ControllerProviderInterface;


class TextControllerProvider implements ControllerProviderInterface
{
    public function connect(Application $app)
    {
        $controllers = $app['controllers_factory'];

        $controllers->get('/', function (Application $app) {
            return 'YES';
        });

        $controllers->get('/resellers', function (Application $app) {
            $db = new ResellerRepository($app);
            $resellers = $db->getAll();

            var_dump($resellers);
        });

        return $controllers;
    }
}