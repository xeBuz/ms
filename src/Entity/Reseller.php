<?php

namespace Mono;


class Reseller
{
    private $id;
    private $name;
    private $address;
    private $phone;
    private $enabled;

    /**
     * Reseller constructor.
     *
     * @param $id
     * @param $name
     * @param $address
     * @param $phone
     * @param $enabled
     */
    public function __construct($id, $name, $address, $phone, $enabled) {
        $this->id = $id;
        $this->name = $name;
        $this->address = $address;
        $this->phone = $phone;
        $this->enabled = $enabled;
    }


    /**
     * @param $array
     * @return Reseller
     */
    public static function createFromArray($array) {
        $address = null;
        $phone = null;
        $enabled = true;

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

        if (isset($array['address'])) {
            $address = $array['address'];
        }

        if (isset($array['phone'])) {
            $phone = $array['phone'];
        }

        if (isset($array['enabled'])) {
            $enabled = $array['enabled'];
        }

        return new Reseller($id, $name, $address, $phone, $enabled);
    }


    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
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
    public function getName()
    {
        return $this->name;
    }


    /**
     * @param $address
     */
    public function setAddress($address)
    {
        $this->address = $address;
    }

    /**
     * @return mixed
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param mixed $phone
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
    }

    /**
     * @return mixed
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @param mixed $enabled
     */
    public function setEnabled($enabled)
    {
        $this->enabled = $enabled;
    }

    /**
     * @return mixed
     */
    public function getEnabled()
    {
        return $this->enabled;
    }
}