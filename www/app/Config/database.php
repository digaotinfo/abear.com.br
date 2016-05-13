<?php

class DATABASE_CONFIG {

//     ///===> PRODUCAO
// 	public $default = array(
// 		'datasource' => 'Database/Mysql',
// 		'persistent' => false,
// 		'host' => '186.202.123.135',
// 		'login' => 'abear_2014',
// 		'password' => 'zpass2010',
// 		'database' => 'abear_2014',
// 		'prefix' => '',
// 		'encoding' => 'utf8',
// 	);



	///===> Homologação Jelastic
	/*
	public $default = array(
        'datasource' => 'Database/Mysql',
        'persistent' => false,
        'host' => 'mysql-zoio-bancos.jelastic.websolute.net.br',
        'login' => 'root',
        'password' => 'y8TF4Va1P2',
        'database' => 'abear_2014',
        'prefix' => '',
        'encoding' => 'utf8',
    );
	*/


	///===> SERVER ZOIO
	public $test = array(
		'datasource' => 'Database/Mysql',
		'persistent' => false,
		'host' => '127.0.0.1',
		'login' => 'root',
		'password' => 'mysql',
		'database' => 'abear_2014',
		'prefix' => '',
		'encoding' => 'utf8',
	);



}
