<?php

namespace Mono\Repository;


use Mono\Entity\Reseller;

class ResellerRepository extends MonoRepository
{

    /**
     * @return array
     */
    public function getAll() {
        $sql = "SELECT id, `name`, default_language_id, address, phone, enabled FROM resellers";

        return $this->fetch($sql);
    }


    /**
     * @param $id
     * @return mixed|Reseller
     */
    public function getById($id) {
        $sql = "SELECT id, `name`, default_language_id, address, phone, enabled FROM resellers WHERE id = ?";

        return $this->fetchOne($sql, [(integer) $id]);
    }
}