<?php

namespace Mono\Repository;


use Mono\Entity\Language;

class LanguageRepository extends MonoRepository
{

    /**
     * Fetch all Languages from the Database
     *
     * @return array
     */
    public function getAll() {
        $sql = "SELECT id, `code`, `name` FROM languages";

        return $this->fetch($sql);
    }

    /**
     * Fetch one Language from the Database by by ISO 639-1 Code
     *
     * @param $code
     * @return Language
     */
    public function getByCode($code) {
        $sql = "SELECT id, `code`, `name` FROM languages WHERE `code` LIKE ?";

        return $this->fetchOne($sql, [(string) $code]);
    }


    /**
     * Fetch one Language from the Database by Id
     *
     * @param $id
     * @return mixed|Language
     */
    public function getById($id) {
        $sql = "SELECT id, `code`, `name` FROM languages WHERE id = ?";

        return $this->fetchOne($sql, [(integer) $id]);
    }

}