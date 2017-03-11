<?php


namespace Mono\Entity;


interface MonoEntity
{

    /**
     * Create an Entity with an Associative Array
     *
     * @param $array
     * @return mixed
     */
    public static function createFromArray($array);

    /**
     * Get the object as an associative array, to return it later as a JSON object
     *
     * @return mixed
     */
    public function getResponse();

}