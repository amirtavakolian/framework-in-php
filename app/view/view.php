<?php

namespace app\view;

class view
{

  // Load view file from views directory:
  public static function load($file, $data = [])
  {
    $addr = str_replace(".", DIRECTORY_SEPARATOR, $file);

    // if view file is not exist in views directory:
    if (!file_exists(BASE_PATH ."views/".  $addr . ".php")) {

      // if it was on developer mode:
      if (IS_DEV_MODE) {
        echo __FILE__ . " view file not founded";
        die();
      } else {
        die("Something is wrong please try later...");
      }
    }
    // file existed so require it :D 
    require BASE_PATH ."views/". $addr . ".php";

  }
}
