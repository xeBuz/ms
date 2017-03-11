<?php

namespace Mono\Entity;


class Text implements MonoEntity
{
    private $id;
    private $key;
    private $value;
    private $reseller;
    private $language;


    /**
     * Text constructor.
     *
     * @param $id
     * @param $key
     * @param $value
     * @param Reseller $reseller
     * @param Language $language
     */
    public function __construct($id, $key, $value, Reseller $reseller, Language $language) {
        $this->id       = $id;
        $this->key      = $key;
        $this->value    = $value;
        $this->reseller = $reseller;
        $this->language = $language;
    }


    /**
     * Create an Entity with an Associative Array
     *
     * @param $array
     * @return Text
     */
    public static function createFromArray($array)
    {
        if (isset($array['id'])) {
            $id = $array['id'];
        } else {
            throw new \InvalidArgumentException('Missing field "id"');
        }

        if (isset($array['key'])) {
            $key = $array['key'];
        } else {
            throw new \InvalidArgumentException('Missing field "key"');
        }

        if (isset($array['value'])) {
            $value = $array['value'];
        } else {
            throw new \InvalidArgumentException('Missing field "value"');
        }

        if (isset($array['reseller'])) {
            $reseller = $array['reseller'];
        } else {
            throw new \InvalidArgumentException('Missing field "reseller"');
        }

        if (isset($array['language'])) {
            $language = $array['language'];
        } else {
            throw new \InvalidArgumentException('Missing field "language"');
        }

        return new Text($id, $key, $value, $reseller, $language);
    }

    /**
     * Get the object as an associative array, to return it later as a JSON object
     *
     * @return mixed
     */
    public function getResponse()
    {
        return [
            'id'       => $this->getId(),
            'key'      => $this->getKey(),
            'value'    => $this->getValue(),
            'reseller' => $this->getReseller()->getName(),
            'language' => $this->getLanguage()->getCode()
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
     * @return string
     */
    public function getKey()
    {
        return (string) $this->key;
    }

    /**
     * @param mixed $key
     */
    public function setKey($key)
    {
        $this->key = $key;
    }

    /**
     * @return string
     */
    public function getValue()
    {
        return (string) $this->value;
    }

    /**
     * @param mixed $value
     */
    public function setValue($value)
    {
        $this->value = $value;
    }

    /**
     * @return Reseller
     */
    public function getReseller()
    {
        return $this->reseller;
    }

    /**
     * @param Reseller $reseller
     */
    public function setReseller(Reseller $reseller)
    {
        $this->reseller = $reseller;
    }

    /**
     * @return Language
     */
    public function getLanguage()
    {
        return $this->language;
    }

    /**
     * @param Language $language
     */
    public function setLanguage(Language $language)
    {
        $this->language = $language;
    }

}