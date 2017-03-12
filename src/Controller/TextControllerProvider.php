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
use Symfony\Component\HttpFoundation\Request;


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

        $controllers->post('/', function (Application $app, Request $request) {
            $key = $request->get('key');
            $value = $request->get('value');
            $language_code = $request->get('language_code');
            $reseller_id = $request->get('reseller_id');

            $conn_text     = new TextRepository($app);
            $conn_reseller = new ResellerRepository($app);
            $conn_lang     = new LanguageRepository($app);


            if (empty($reseller_id)) {
                return $this->createResponse500('Invalid reseller_id');
            }
            if (empty($language_code)) {
                return $this->createResponse500('Invalid language_code');
            }

            $reseller = $conn_reseller->getById($reseller_id);
            $reseller['default_language'] = Language::createFromArray(
                $conn_lang->getById($reseller['default_language_id'])
            );

            $reseller = Reseller::createFromArray($reseller);
            if (empty($reseller)) {
                return $this->createResponse500('Invalid reseller_id');
            }

            $language = Language::createFromArray(
                $conn_lang->getByCode($language_code)
            );
            if (empty($language)) {
                return $this->createResponse500('Invalid language_code');
            }

            if (empty(trim($value))) {
                return $this->createResponse500('value can not be empty');
            }

            if (empty(trim($key))) {
                return $this->createResponse500('key can not be empty');
            }

            try {
                $exist = $conn_text->getByKeyAndResellerAndLanguage(
                  $key, $reseller, $language, false
                );

                // If the key already exist, prevent duplication
                if (!empty($exist)) {
                    throw new Exception('Key already exist');
                }


                // If the key in the default language didn't exist, prevent saving.
                // You need always the default language first, to allow the fallback
                if ($reseller->getDefaultLanguage()->getId() !== $language->getId()) {
                    $exist = $conn_text->getByKeyAndResellerByDefault($key, $reseller);

                    if (empty($exist)) {
                        throw new Exception('You need to add the `default_language` first');
                    }
                }

                $conn_text->addNew(
                    $key, $value, $reseller, $language
                );

            } catch (Exception $e) {
                return $this->createResponse500($e->getMessage());
            }


            return $this->createResponse201();
        });

        return $controllers;
    }
}