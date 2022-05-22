<?php

namespace core\controllers;

use core\classes\Store;

class Account
{
  public function account()
  {
    $data = [
      'title' => 'Account',
      'style' => 'account',
    ];

    Store::layout([
      'html/head', 'account', 'html/foot'
    ], $data);
  }
  public function wishList()
  {
    $data = [
      'title' => 'Wish List',
      'style' => 'wishlist',
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
      'html/head', 'login', 'html/foot'
    ], $data);
  }
}
