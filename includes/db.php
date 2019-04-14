<?php

//database credentials
define('DBHOST','localhost');
define('DBUSER','root');
define('DBPASS','okoelibas26');
define('DBNAME','lottery');

$db = new PDO("mysql:host=".DBHOST.";dbname=".DBNAME, DBUSER, DBPASS);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

 ?>
