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
        return $this->generateResponse($array, $status);
    }


    /**
     * Return a JSON response for 404 Not Found
     *
     * @param $notFound
     * @return JsonResponse
     */
    protected function createResponse404($notFound = null) {
        return $this->generateResponse(
            trim(sprintf('Not Found %s', $notFound)),
            Response::HTTP_NOT_FOUND
        );
    }


    /**
     * Return a JSON response for 500 Server Error
     *
     * @param null $error
     * @return JsonResponse
     */
    protected function createResponse500($error = null) {

        return $this->generateResponse(
            trim(sprintf('Internal Server Error %s', $error)),
            Response::HTTP_INTERNAL_SERVER_ERROR
        );
    }


    /**
     * Generic API response
     *
     * @param $data
     * @param $code
     * @return JsonResponse
     */
    private function generateResponse($data, $code) {
        $json = new JsonResponse();
        $response = [];

        if ($code === Response::HTTP_OK) {
            $response['data'] = $data;
        } else {
            $response['errors'] = [
                'message' => $data
            ];
        }

        $response['status'] = [
            'code' => $code,
        ];

        return $json->setData($response)->setStatusCode($code)->setEncodingOptions(JSON_NUMERIC_CHECK);
    }
}