<?php

namespace Mono\Controller;

use Exception;
use Mono\Entity\Language;
use Mono\Entity\Reseller;
use Mono\Entity\Text;
use Mono\Repository\LanguageRepository;
use Mono\Repository\ResellerRepository;
use Mono\Repository\TextRepository;
use Silex\Application;


class TextControllerProvider extends MonoController
{
    public function connect(Application $app)
    {
        $controllers = $app['controllers_factory'];

        // Get one Text in the specific Language, for a particular Reseller.
        // The first values is the Reseller, then the key to obtain and the Language
        // If the Language isn't available, the endpoint will return the default language (by Reseller)
        $controllers->get('/{reseller_id}/{key}/{language_code}', function(Application $app, $reseller_id, $key, $language_code) {
            $response = [];

            $conn_text     = new TextRepository($app);
            $conn_reseller = new ResellerRepository($app);
            $conn_lang     = new LanguageRepository($app);

            $reseller = $conn_reseller->getById($reseller_id);
            if (empty($reseller)) {
                return $this->createResponse404('Reseller');
            }

            $reseller['default_language'] = Language::createFromArray(
                $conn_lang->getById($reseller['default_language_id'])
            );
            $reseller = Reseller::createFromArray($reseller);


            $language = $conn_lang->getByCode($language_code);
            if (empty($language)) {
                return $this->createResponse500('Invalid Language Code');
            }
            $language = Language::createFromArray($language);
            $text = $conn_text->getByKeyAndResellerAndLanguage($key, $reseller, $language);

            if (!empty($text)) {
                try {
                    // I need to query again, because it could be the fallback language, not the originally requested
                    $text['language'] = Language::createFromArray(
                        $conn_lang->getById($text['language_id'])
                    );
                    $text['reseller'] = $reseller;

                    $response['text'] = Text::createFromArray($text)->getResponse();

                } catch (Exception $e) {
                    return $this->createResponse500($e->getMessage());
                }
            }

            return $this->createResponse($response);
        });

        return $controllers;
    }
}