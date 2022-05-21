<?php

namespace core\controllers;

use core\classes\Functions;

class Main
{
  public function home()
  {
    $data = [
      'title' => 'Home',
    ];

    Functions::layout([
      'html/head', 'home', 'html/foot'
    ], $data);
  }
  public function store()
  {
    echo "Store";
  }
  public function blog()
  {
    echo "Blog";
  }
  public function ourStory()
  {
    echo "Our store";
  }
  public function account()
  {
    echo "Account";
  }
  public function notFound()
  {
    echo "404";
  }
}
