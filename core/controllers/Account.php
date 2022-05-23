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
  private function register()
  {
    if ($_SERVER['REQUEST_METHOD'] != 'POST') {
      $this->login();
    }
    echo "registo";
  }
  private function signIn()
  {
    if ($_SERVER['REQUEST_METHOD'] != 'POST') {
      $this->login();
    }
    echo "login";
  }
  private function verify()
  {
    if (!isset($_POST["t"])) {
      return false;
    }
    if ($_POST["t"] == "login") $this->signIn();
    elseif ($_POST["t"] == "register") $this->register();
    else return false;
  }
  private function login()
  {
    if ($this->verify() === false) {
      $data = [
        'title' => 'My Account',
        'style' => 'login',
      ];

      Store::layout([
        'html/head', 'login', 'html/foot'
      ], $data);
    }
  }
}
