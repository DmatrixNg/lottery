<?php

define('dir', 'http://localhost/lottery/');

 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Lottery System</title>
    <link rel="stylesheet" href="<?php echo dir; ?>css/bootstrap.min.css">
<style media="screen">
.nv {
  height: 100px;
  padding: 20px;
  background:  #005;
  color: white;
}
.nav li
{
  padding: 5px;
}
.btn{
  border-radius: 0px;
}
</style>

  </head>
  <body style="background-color: #000055; color:white;">
    <div class="container-fluid">

<header>
<div class="nav nv">
  <div class="row" style="width:100%">
    <div class="col">

  <div class="brand" style="text-align:center">
    <h1 style="font-size:23px"><a href="<?php echo dir; ?>">Visa</a></h1>
  </div>
</div>
<div class="col-auto col-8">

  <div class="nav p2" style="float:right">
    <li><a href="<?php echo dir; ?>">
      Home
    </a>
    </li>
    <li><a href="<?php echo dir; ?>dashboard.php">
    Application Status
  </a>
  </li>
    <li><a href="<?php echo dir; ?>about">
    About
  </a>
  </li>

</div>
  </div>
</div>
</div>
</header>
