<?php

namespace Mono\Controller;

use Mono\Repository\ResellerRepository;
use Silex\Application;


class ResellerControllerProvider extends MonoController
{
    public function connect(Application $app)
    {
        $controllers = $app['controllers_factory'];

        $controllers->get('/', function (Application $app) {
            $response = [];

            $db = new ResellerRepository($app);
            $resellers = $db->getAll();

            foreach ($resellers as $reseller) {
                $response['resellers'][] = $reseller->getResponse();
            }

            return $this->createResponse($response);
        });


        return $controllers;
    }
}