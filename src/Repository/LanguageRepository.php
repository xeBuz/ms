<?php

namespace Mono\Repository;


use Mono\Entity\Language;

class LanguageRepository extends MonoRepository
{

    /**
     * @return array
     */
    public function getAll() {
        $data = [];

        $sql = "SELECT id, `code`, `name` FROM languages";
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
        $sql = "SELECT id, `code`, `name` FROM languages WHERE `code` LIKE ?";
        $language = $this->fetchOne($sql, [(string) $code]);

        if (empty($language)) {
            return $language;
        }

        return Language::createFromArray($language);
    }


    /**
     * @param $id
     * @return mixed|Language
     */
    public function getById($id) {
        $sql = "SELECT id, `code`, `name` FROM languages WHERE id = ?";
        $language = $this->fetchOne($sql, [(integer) $id]);

        if (empty($language)) {
            return $language;
        }

        return Language::createFromArray($language);
    }

}