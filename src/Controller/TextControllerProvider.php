<?php

namespace Mono\Controller;

use Mono\Repository\LanguageRepository;
use Mono\Repository\ResellerRepository;
use Mono\Repository\TextRepository;
use Silex\Application;


class TextControllerProvider extends MonoController
{
    public function connect(Application $app)
    {
        $controllers = $app['controllers_factory'];

        $controllers->get('/{reseller_id}/{key}/{language_code}', function(Application $app, $reseller_id, $key, $language_code) {
            $response = [];

            $conn_text = new TextRepository($app);
            $conn_reseller = new ResellerRepository($app);
            $conn_lang = new LanguageRepository($app);

            $reseller = $conn_reseller->getById($reseller_id);
            if (empty($reseller)) {
                $response = $this->createResponse404();
            }

            $language = $conn_lang->getByCode($language_code);
            if (empty($language)) {
                $response = $this->createResponse404();
            }

            $text = $conn_text->getByKeyAndResellerAndLanguage($key, $reseller, $language);

            if (!empty($text)) {
                $response['text']  = $text->getResponse();
            }

            return $this->createResponse($response);
        });

        return $controllers;
    }
}