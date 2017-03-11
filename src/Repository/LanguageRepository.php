<?php

namespace Mono\Repository;


use Mono\Entity\Language;

class LanguageRepository extends MonoRepository
{

    /**
     * @return array
     */
    public function getAll() {
        $sql = "SELECT id, `code`, `name` FROM languages";

        return $this->fetch($sql);
    }

    /**
     * @param $code
     * @return Language
     */
    public function getByCode($code) {
        $sql = "SELECT id, `code`, `name` FROM languages WHERE `code` LIKE ?";

        return $this->fetchOne($sql, [(string) $code]);
    }


    /**
     * @param $id
     * @return mixed|Language
     */
    public function getById($id) {
        $sql = "SELECT id, `code`, `name` FROM languages WHERE id = ?";

        return $this->fetchOne($sql, [(integer) $id]);
    }

}