<?php

namespace Mono\Entity;


class Reseller implements MonoEntity
{
    private $id;
    private $name;
    private $default_language;
    private $address;
    private $phone;
    private $active;

    /**
     * Reseller constructor.
     *
     * @param integer $id
     * @param string $name
     * @param Language $default_language
     * @param string $address
     * @param string $phone
     * @param boolean $active
     */
    public function __construct($id, $name, Language $default_language, $address, $phone, $active) {
        $this->id = $id;
        $this->name = $name;
        $this->default_language = $default_language;
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

        if (isset($array['default_language'])) {
            $default_language = $array['default_language'];
        } else {
            throw new \InvalidArgumentException('Missing field "default_language"');
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

        return new Reseller($id, $name, $default_language, $address, $phone, $active);
    }


    /**
     * @return array
     */
    public function getResponse()
    {
        return [
            'id'               => $this->getId(),
            'name'             => $this->getName(),
            'default_language' => $this->getDefaultLanguage()->getResponse(),
            'address'          => $this->getAddress(),
            'phone'            => $this->getPhone(),
            'active'           => $this->getActive()
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

    /**
     * @return mixed
     */
    public function getDefaultLanguage()
    {
        return $this->default_language;
    }

    /**
     * @param mixed $default_language
     */
    public function setDefaultLanguage(Language $default_language)
    {
        $this->default_language = $default_language;
    }
}