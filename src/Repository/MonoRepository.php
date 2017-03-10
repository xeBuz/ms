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
     * @param array $params
     * @return mixed
     */
    protected function fetch($sql, $params = []) {
        $statement = $this->db->executeQuery($sql, $params);
        return $statement->fetchAll();
    }

    /**
     * @param $sql
     * @param array $params
     * @return mixed
     */
    protected function fetchOne($sql, $params = []) {
        $fetch = $this->fetch($sql, $params);
        if (count($fetch) > 0) {
            return $fetch[0];
        } else {
            return null;
        }
    }
}