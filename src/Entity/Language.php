<?php

namespace Mono\Entity;


class Language implements MonoEntity
{
    private $id;
    private $name;
    private $code;

    /**
     * Reseller constructor.
     *
     * @param $id
     * @param $name
     * @param $code
     */
    public function __construct($id, $name, $code) {
        $this->id   = $id;
        $this->name = $name;
        $this->code = $code;
    }


    /**
     * Create an Entity with an Associative Array
     *
     * @param $array
     * @return Language
     */
    public static function createFromArray($array) {

        if (isset($array['id'])) {
            $id = $array['id'];
        } else {
            throw new \InvalidArgumentException('Missing field "id"');
        }

        if (isset($array['name'])) {
            $name = $array['name'];
        } else {
            throw new \InvalidArgumentException('Missing field "name"');
        }

        if (isset($array['code'])) {
            $code = $array['code'];
        } else {
            throw new \InvalidArgumentException('Missing field "code"');
        }


        return new Language($id, $name, $code);
    }

    /**
     * Get the object as an associative array, to return it later as a JSON object
     *
     * @return mixed
     */
    public function getResponse()
    {
        return [
            'id'   => $this->getId(),
            'name' => $this->getName(),
            'code' => $this->getCode()
        ];
    }


    /**
     * @return int
     */
    public function getId()
    {
        return (integer) $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }


    /**
     * @return string
     */
    public function getName()
    {
        return (string) $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getCode()
    {
        return (string) $this->code;
    }

    /**
     * @param mixed $code
     */
    public function setCode($code)
    {
        $this->code = $code;
    }
}