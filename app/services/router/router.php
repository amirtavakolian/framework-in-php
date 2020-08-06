<?php

namespace app\services\router;

class router
{
  // Routes table:
  private $routes;

  // Users's request:
  private $request;

  const MIDDLEWARE_NAMESPACE = "\\app\\middleware\\";
  const CONTROLLER_NAMESPACE = "\\app\\controller\\";

  public function __construct($request)
  {
    $this->routes = \app\utilities\routerUtilities::getRoutes();
    $this->request = $request;
  }

  // start router:
  public function start()
  {
    // Check if user's route available or not:
    if (!$this->routeAvailable()) {
      \app\view\view::load("errors.404");
    }

    // Check the method which user's request is came with::
    if (!$this->request->checkMethod($this->routes)) {
      \app\view\view::load("errors.403");
    }

    // Check if middleware is available or not:
    if ($this->hasMiddleware()) {
      $middle = $this->getMiddlewares();
      foreach ($middle as $midd) {
        $middle = self::MIDDLEWARE_NAMESPACE . $midd;
        if(!class_exists($middle)){
          \app\view\view::load("notFound.classNotfound", ["msg", "Middleware class not founded"]);
          die();
        }
        $middleware = new $middle();
        $middleware->target($this->request);
      }
    }

    // Check controller & action are avilable:
    $this->checkTarget();
    
    // Get controller & action:
    $target = $this->getControllerAction();
    
    list($controller, $action) = explode("@", $target);
    $controller = SELF::CONTROLLER_NAMESPACE . $controller;

    // If controller class not exist
    if(!class_exists($controller)){ 
      \app\utilities\message::controllerEmpty();
      die();
    }

      $obj = new $controller();

      if (!method_exists($obj, $action)){
        \app\utilities\message::actionEmpty();

      }
      
      $obj->$action();
  }


  /* ======= Methods ======== */

  // Check if user's route available or not:
  public function routeAvailable()
  {
    return array_key_exists($this->request->uri, $this->routes);
  }

  // Check if middleware available or not:
  public function hasMiddleware()
  {
    return array_key_exists("middleware", $this->routes[$this->request->uri]);
  }

  // Check if middleware available or not:
  public function getMiddlewares()
  {
    $midds = $this->routes[$this->request->uri]["middleware"];
    if (!empty($midds)) {
      return explode("@", $midds);
    } else {
      \app\utilities\message::middlewareEmpty();
    }
  }

  public function checkTarget()
  {
    if (!array_key_exists("target", $this->routes[$this->request->uri]) || empty($this->routes[$this->request->uri]["target"])) {
      \app\utilities\message::targetError();
    }
  }

  public function getControllerAction() {
    return $this->routes[$this->request->uri]["target"];
  }
}
