<?php
/**
 * Created by PhpStorm.
 * User: jesus
 * Date: 3/10/17
 * Time: 5:43 PM
 */

namespace Mono\Controller;


use Silex\Api\ControllerProviderInterface;
use Silex\Application;
use Silex\ControllerCollection;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class MonoController implements ControllerProviderInterface
{

    /**
     * Returns routes to connect to the given application.
     *
     * @param Application $app An Application instance
     *
     * @return ControllerCollection A ControllerCollection instance
     */
    public function connect(Application $app) {
    }


    /**
     * Return a JSON response, with a specified body and status code
     *
     * @param $array
     * @param int $status
     * @return JsonResponse
     */
    protected function createResponse($array, $status = Response::HTTP_OK) {
        $response = new JsonResponse();

        return $response->setData($array)->setStatusCode($status)->setEncodingOptions(JSON_NUMERIC_CHECK);
    }


    /**
     * Return a JSON response for 404 Not Found
     *
     * @return JsonResponse
     */
    protected function createResponse404() {
        $response = new JsonResponse();
        return $response->setData('Not Found')->setStatusCode(Response::HTTP_NOT_FOUND)->setEncodingOptions(JSON_NUMERIC_CHECK);
    }
}