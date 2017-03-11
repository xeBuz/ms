<?php

namespace Mono\Controller;

use Mono\Entity\Language;
use Mono\Entity\Reseller;
use Mono\Repository\LanguageRepository;
use Mono\Repository\ResellerRepository;
use Silex\Application;


class ResellerControllerProvider extends MonoController
{
    public function connect(Application $app)
    {
        $controllers = $app['controllers_factory'];

        $controllers->get('/', function (Application $app) {
            $response = [];

            $conn_reseller = new ResellerRepository($app);
            $conn_language = new LanguageRepository($app);

            $resellers = $conn_reseller->getAll();

            foreach ($resellers as $reseller) {
                $reseller['default_language'] = Language::createFromArray(
                    $conn_language->getById($reseller['default_language_id'])
                );

                $reseller = Reseller::createFromArray($reseller);

                $response['resellers'][] = $reseller->getResponse();
            }

            return $this->createResponse($response);
        });


        return $controllers;
    }
}