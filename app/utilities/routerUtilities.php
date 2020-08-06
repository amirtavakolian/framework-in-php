<?php
namespace app\utilities;

class routerUtilities{

  public static function getRoutes() {
    return include BASE_PATH . "routes/routes.php";
  }
}