<?php

namespace Mono\Entity;


use Mono\Repository\LanguageRepository;

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
     * Create an Entity with an Associative Array
     *
     * @param $array
     * @return Reseller
     */
    public static function createFromArray($array) {
        $address = null;
        $phone   = null;
        $active  = true;

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
     * Get the object as an associative array, to return it later as a JSON object
     *
     * @return array
     */
    public function getResponse()
    {
        return [
            'id'               => $this->getId(),
            'name'             => $this->getName(),
            'default_language' => $this->getDefaultLanguage()->getCode(),
            'address'          => $this->getAddress(),
            'phone'            => $this->getPhone(),
            'active'           => $this->getActive()
        ];
    }

    /**
     * @return integer
     */
    public function getId()
    {
        return (integer) $this->id;
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
    public function getName()
    {
        return (string) $this->name;
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