<?php
//include config
require_once('includes/db.php');

//log user out
$user->logout();



header('Location: /');

?>
