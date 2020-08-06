<?php
require "../bootstrap/init.php";

$request = new \app\services\request\request();
$router = new \app\services\router\router($request);

$router->start();