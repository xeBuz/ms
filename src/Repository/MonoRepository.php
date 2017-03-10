<?php

namespace Mono\Repository;

use Silex\Application;

class MonoRepository
{
    private $db;

    public function __construct(Application $app) {
        $this->db = $app['db'];
    }

    /**
     * @param $sql
     * @return mixed
     */
    private function getAll($sql) {
        return $this->db->fetchAll($sql);
    }

    /**
     * @param $sql
     * @return mixed
     */
    private function getOne($sql) {
        return $this->db->fetch($sql);
    }

}