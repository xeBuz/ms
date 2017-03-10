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
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @param mixed $code
     */
    public function setCode($code)
    {
        $this->code = $code;
    }
}