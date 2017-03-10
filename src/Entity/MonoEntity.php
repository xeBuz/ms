<?php


namespace Mono\Entity;


interface MonoEntity
{

    /**
     * @param $array
     * @return mixed
     */
    public static function createFromArray($array);

    /**
     * @return mixed
     */
    public function getResponse();

}