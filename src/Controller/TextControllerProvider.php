<?php

namespace Mono\Controller;

use Mono\Repository\ResellerRepository;
use Silex\Application;


class TextControllerProvider extends MonoController
{
    public function connect(Application $app)
    {
        $controllers = $app['controllers_factory'];

        $controllers->get('/', function (Application $app) {
            return 'YES';
        });

//        $controllers->get('/resellers', function (Application $app) {
//            $db = new ResellerRepository($app);
//            $resellers = $db->getAll();
//
//            $response = [];
//            foreach ($resellers as $reseller) {
//                $response['resellers'][] = $reseller->getResponse();
//            }
//
//            return $this->createResponse($response);
//        });


        return $controllers;
    }
}