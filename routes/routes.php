<?php

return $routes = array(

  "" => [
    "target" => "home@index",
    "middleware" => "IeBlocker",
    "method" => "get"
  ],
  "login/user/" => [
    "target" => ""
  ],
  "admin/panel/" => [
    "target" => "",
    "middleware" => "",
    "method" => ""
  ],
  "admin/login/" => [
    "target" => "home@index"
  ],
  "process/index/" => [
    "target" => "process@index",
    "method" => "get",
    "middleware" => "checkReferer"
  ],
);
