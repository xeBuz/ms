<?php

namespace Mono\Entity;


class Reseller implements MonoEntity
{
    private $id;
    private $name;
    private $address;
    private $phone;
    private $active;

    /**
     * Reseller constructor.
     *
     * @param $id
     * @param $name
     * @param $address
     * @param $phone
     * @param $active
     */
    public function __construct($id, $name, $address, $phone, $active) {
        $this->id = $id;
        $this->name = $name;
        $this->address = $address;
        $this->phone = $phone;
        $this->active = $active;
    }


    /**
     * @param $array
     * @return Reseller
     */
    public static function createFromArray($array) {
        $address = null;
        $phone = null;
        $active = true;

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

        if (isset($array['active'])) {
            $active = $array['active'];
        }

        return new Reseller($id, $name, $address, $phone, $active);
    }


    public function getResponse()
    {
        return [
            'id'      => $this->getId(),
            'name'    => $this->getName(),
            'address' => $this->getAddress(),
            'phone'   => $this->getPhone(),
            'active'  => $this->getActive()
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
     * @return mixed
     */
    public function getActive()
    {
        return (bool) $this->active;
    }

    /**
     * @param mixed $active
     */
    public function setActive($active)
    {
        $this->active = $active;
    }
}