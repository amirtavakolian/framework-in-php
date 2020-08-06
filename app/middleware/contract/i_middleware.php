<?php
namespace app\middleware\contract;

use app\services\request\request;

interface i_middleware{
  public function target(request $request);
}