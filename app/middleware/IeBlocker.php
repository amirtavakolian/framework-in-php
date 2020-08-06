<?php

namespace app\middleware;

class IeBlocker extends \app\middleware\contract\middleware
{
  public function target($request)
  {
    $token = strtok($request->agent, " ");
  
    while ($token != false){
        
      if(strpos($request->agent, "Trident") != false){
        die("Sorry, IE is not supported :D ");
      }
      $token = strtok(" ");
    }
  }
}

