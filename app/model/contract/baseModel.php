<?php

namespace app\model\contract;

interface baseModel
{
  public function create();
  public function read();
  public function update();
  public function delete();
}
