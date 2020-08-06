<?php

namespace app\controller;

class home
{
  public function index()
  {
    \app\view\view::load("forms.form");
  }
}

