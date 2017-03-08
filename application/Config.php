<?php

/*
 * -------------------------------------
 *  Config.php
 * -------------------------------------
 */
 

define('BASE_URL', 'http://'.$_SERVER['SERVER_NAME'].'/framephp_s4/');
define('DEFAULT_CONTROLLER', 'index'); //pagina que inicia al cargar la web
define('DEFAULT_LAYOUT', 'default');//para poder cargar por separado tanto el header como footer
 

define('DB_HOST', 'localhost'); //Especificamos los datos de conexion a nuestra bd
define('DB_USER', 'jesus'); //
define('DB_PASS', '12345');
define('DB_NAME', 'tiendavirtual');

define('LIMIT_REGXPAG',5);
define('LIMIT_PAGEVIEW',10);
define('DB_ENGINE','mysql');
define('DB_CHAR', 'utf8');

?>
