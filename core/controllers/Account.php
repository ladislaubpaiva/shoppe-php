<?php

namespace core\controllers;

use core\classes\Store;

class Account
{
  public function account()
  {
    if (!Store::isLogged()) {
      $this->login();
      return;
    }
    $data = [
      'title' => 'My Account',
      'style' => 'account',
    ];

    Store::layout([
      'html/head', 'account', 'html/foot'
    ], $data);
  }
  public function wishList()
  {
    if (!Store::isLogged()) {
      $this->login();
      return;
    }
    $data = [
      'title' => 'Wish List',
      'style' => 'wishlist',
    ];

    Store::layout([
      'html/head', 'wishlist', 'html/foot'
    ], $data);
  }
  protected function login()
  {
    $data = [
      'title' => 'My Account',
      'style' => 'login',
    ];

    Store::layout([
      'html/head', 'login', 'html/foot'
    ], $data);
  }
}
