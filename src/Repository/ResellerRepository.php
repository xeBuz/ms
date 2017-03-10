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
}