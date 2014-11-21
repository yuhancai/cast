<?php
/**
 * The development database settings. These get merged with the global settings.
 // PDO ドライバで PostgreSQL を使う設定
'production' => array(
    'type' => 'pdo',
    'connection' => array(
        'dsn' => 'pgsql:host=localhost;dbname=fuel_db',
        'username' => 'your_username',
        'password' => 'y0uR_p@ssW0rd',
        'persistent' => false,
        'compress' => false,
    ),
    'identifier' => '"',
    'table_prefix' => '',
    'charset' => 'utf8',
    'enable_cache' => true,
    'profiling' => false,
    'readonly' => array('slave1', 'slave2', 'slave3'),
),

'development' => array(
    'type' => 'mysqli',
    'connection' => array(
        'hostname' => 'localhost',
        'port' => '3306',
        'database' => 'fuel_dev',
        'username' => 'root',
        'password' => '123',
        'persistent' => false,
        'compress' => false,
    ),
    'identifier' => '`',
    'table_prefix' => '',
    'charset' => 'utf8',
    'enable_cache' => true,
    'profiling' => false,
    'readonly' => false,
),

 */

return array(
	'default' => array(
		'connection'  => array(
			'dsn'        => 'mysql:host=localhost;dbname=fuel_l',
			'username'   => 'root',
			'password'   => '123',
		),
	),
);
