<?php

namespace app\services\request;

class request
{
  public $uri;
  public $agent;
  public $data;
  public $method;
  public $ip;
  public $referer;

  public function __construct()
  {
    $this->uri = str_replace(URI, "", $_SERVER['REDIRECT_URL']);
    $this->agent = $_SERVER['HTTP_USER_AGENT'];
    $this->data = $_REQUEST;
    $this->method = strtolower($_SERVER['REQUEST_METHOD']);
    $this->ip = $_SERVER['REMOTE_ADDR'];
    $this->referer = $_SERVER['HTTP_REFERER'] ?? '';
  }

  // Check the method which user's request is came with::
  public function checkMethod($routes){
    if ($this->methodIndexExist($routes)){
      $methods = explode("@", $routes[$this->uri]["method"]);
      return in_array($this->method, $methods);
    }
    return true;
  }
  public function methodIndexExist($routes){
    return array_key_exists("method", $routes[$this->uri]);
  }
}
