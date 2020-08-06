<?php

namespace app\middleware;

class checkReferer extends \app\middleware\contract\middleware
{
  public function target($request)
  {
    if (($request->referer == "")) {
      header("location:" . BASE_URL);
    }
  }
}
