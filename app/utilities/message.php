<?php

namespace app\utilities;

class message
{
  public static function targetError()
  {
    if (IS_DEV_MODE) {
      \app\view\view::load("errors.targetError", ["target" => "Target not founded or empty"]);
    } else {
      \app\view\view::load("errors.targetError", ["target" => "Sorry... please try again later"]);
    }
    die();
  }

  public static function middlewareEmpty()
  {
    if (IS_DEV_MODE) {
      \app\view\view::load("errors.empty", ["target" => "Middleware is empty"]);
    } else {
      \app\view\view::load("errors.empty", ["target" => "Sorry... please try again later"]);
    }
    die();
  }

  
  public static function controllerEmpty()
  {
    if (IS_DEV_MODE) {
      \app\view\view::load("errors.empty", ["target" => "Controller is empty"]);
    } else {
      \app\view\view::load("errors.empty", ["target" => "Sorry... please try again later"]);
    }
    die();
  }

  public static function actionEmpty()
  {
    if (IS_DEV_MODE) {
      \app\view\view::load("errors.empty", ["target" => "Action is not avialble"]);
    } else {
      \app\view\view::load("errors.empty", ["target" => "Sorry... please try again later"]);
    }
    die();
  }
 
}
