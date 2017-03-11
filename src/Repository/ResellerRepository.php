<?php

namespace Mono\Repository;


use Mono\Entity\Reseller;

class ResellerRepository extends MonoRepository
{

    /**
     * Fetch all Resellers from the Database
     *
     * @return array
     */
    public function getAll() {
        $sql = "SELECT id, `name`, default_language_id, address, phone, enabled FROM resellers";

        return $this->fetch($sql);
    }


    /**
     * Fetch one Resellers from the Database by Id
     *
     * @param $id
     * @return mixed|Reseller
     */
    public function getById($id) {
        $sql = "SELECT id, `name`, default_language_id, address, phone, enabled FROM resellers WHERE id = ?";

        return $this->fetchOne($sql, [(integer) $id]);
    }
}