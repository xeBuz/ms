<?php

namespace Mono\Controller;

use Mono\Entity\Language;
use Mono\Repository\LanguageRepository;
use Silex\Application;


class LanguageControllerProvider extends MonoController
{
    /**
     * @param Application $app
     * @return mixed
     */
    public function connect(Application $app)
    {
        $controllers = $app['controllers_factory'];

        // Base endpoint, return all the languages available
        $controllers->get('/', function (Application $app) {
            $response = [];

            $db = new LanguageRepository($app);
            $languages = $db->getAll();

            foreach ($languages as $language) {
                $response['languages'][] = Language::createFromArray($language)->getResponse();
            }

            return $this->createResponse($response);
        });

        // Return a specific language, by ISO 639-1 Code (e.g: en, da, fi)
        $controllers->get('/{code}', function(Application $app, $code) {
            $db = new LanguageRepository($app);
            $language = $db->getByCode($code);

            if (empty($language)) {
                $response = $this->createResponse404(
                    sprintf('Language Code: %s', $code)
                );
            } else {
                $response = $this->createResponse(
                    Language::createFromArray($language)->getResponse()
                );
            }

            return $response;
        });


        return $controllers;
    }
}