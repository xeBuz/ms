<?php

return [
    'dbs.options' => [
        'mysql_read' => [
            'driver'    => 'pdo_mysql',
            'host'      => '127.0.0.1',
            'dbname'    => 'text_system',
            'user'      => 'mono',
            'password'  => '4LQxcGHh',
            'charset'   => 'utf8mb4',
        ],
        'mysql_write' => [
            'driver'    => 'pdo_mysql',
            'host'      => '127.0.0.1',
            'dbname'    => 'text_system',
            'user'      => 'mono_write',
            'password'  => 'MC2TjLuF',
            'charset'   => 'utf8mb4',
        ],
    ]
];