<?php

namespace Mono\Repository;


use Mono\Entity\Language;

class LanguageRepository extends MonoRepository
{

    /**
     * @return array
     */
    public function getAll() {
        $response = [];

        $sql = "SELECT * FROM languages";
        $languages = $this->fetch($sql);

        foreach ($languages as $language) {
            $data[] = Language::createFromArray($language);
        }

        return $data;
    }

    /**
     * @param $code
     * @return Language
     */
    public function getByCode($code) {
        $sql = "SELECT * FROM languages WHERE code LIKE ?";
        $language = $this->fetchOne($sql, [(string) $code]);

        if (empty($language)) {
            return $language;
        }

        return Language::createFromArray($language);
    }

}