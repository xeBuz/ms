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
     * @param $array
     * @return mixed
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
     * @return mixed
     */
    public function getResponse()
    {
        return [
            'id'       => $this->getId(),
            'key'      => $this->getKey(),
            'value'    => $this->getValue(),
            'reseller' => $this->getReseller()->getResponse(),
            'language' => $this->getLanguage()->getResponse()
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
     * @return mixed
     */
    public function getKey()
    {
        return $this->key;
    }

    /**
     * @param mixed $key
     */
    public function setKey($key)
    {
        $this->key = $key;
    }

    /**
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
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