<?php

namespace core\controllers;

use core\classes\Store;

class Account
{
  public function account()
  {
    $data = [
      'title' => 'Not Found',
    ];

    Store::layout([
      'html/head', 'account', 'html/foot'
    ], $data);
  }
  public function wishList()
  {
    $data = [
      'title' => 'Not Found',
    ];

    Store::layout([
      'html/head', 'wishlist', 'html/foot'
    ], $data);
  }
  public function login()
  {
    $data = [
      'title' => 'login',
    ];

    Store::layout([
      'html/head', '404', 'html/foot'
    ], $data);
  }
}
