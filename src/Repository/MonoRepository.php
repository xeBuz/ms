<?php

namespace Mono\Repository;


use Silex\Application;

class MonoRepository
{
    private $db;


    /**
     * Bootstraps the application.
     *
     * @param Application $app
     */
    public function __construct(Application $app)
    {
        $this->db = $app['db'];
    }

    /**
     * Generic method to query the Database with a custom SQL query and the parameters
     *
     * @param $sql
     * @param array $params
     * @return mixed
     */
    protected function fetch($sql, $params = []) {
        $statement = $this->db->executeQuery($sql, $params);

        return $statement->fetchAll();
    }

    /**
     * Generic method to query the Database with a custom SQL query and the parameters. This method will obtain
     * just the first element in the response
     *
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