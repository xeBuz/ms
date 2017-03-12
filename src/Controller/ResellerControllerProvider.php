<?php

namespace Mono\Controller;

use Exception;
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

        // Base endpoint, return all the resellers
        $controllers->get('/', function (Application $app) {
            $response = [];

            $conn_reseller = new ResellerRepository($app);
            $conn_language = new LanguageRepository($app);

            $resellers = $conn_reseller->getAll();

            try {
                foreach ($resellers as $reseller) {
                    $reseller['default_language'] = Language::createFromArray(
                        $conn_language->getById($reseller['default_language_id'])
                    );

                    $reseller = Reseller::createFromArray($reseller);

                    $response['resellers'][] = $reseller->getResponse();
                }

            } catch (Exception $e) {
                return $this->createResponse500($e->getMessage());
            }

            return $this->createResponse($response);
        });


        return $controllers;
    }
}