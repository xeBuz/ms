<?php

namespace Mono\Repository;


use Mono\Entity\Reseller;

class ResellerRepository extends MonoRepository
{

    /**
     * @return array
     */
    public function getAll() {
        $sql = "SELECT * FROM resellers";
        $resellers = $this->fetch($sql);

        $data = [];

        foreach ($resellers as $reseller) {
            $data[] = Reseller::createFromArray($reseller);
        }

        return $data;
    }


    /**
     * @param $id
     * @return mixed|Reseller
     */
    public function getById($id) {
        $sql = "SELECT * FROM reseller WHERE id = ?";
        $reseller = $this->fetchOne($sql, [(integer) $id]);

        if (empty($reseller)) {
            return $reseller;
        }

        return Reseller::createFromArray($reseller);
    }
}