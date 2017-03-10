<?php

namespace Mono\Controller;

use Mono\Repository\ResellerRepository;
use Silex\Application;
use Silex\Api\ControllerProviderInterface;
use Symfony\Component\HttpFoundation\Response;


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

            return Response::create($resellers);
            // var_dump($resellers);
        });

        return $controllers;
    }
}