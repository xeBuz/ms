<?php

namespace Mono\Repository;


class ResellerRepository  extends MonoRepository
{

    public function getAll($justEnabled = false) {

        return [1, 2, 3];
    }


    /**
     * @param $id
     */
    public function getById($id) {

    }

    /**
     * @param $name
     */
    public function getByName($name) {

    }
}