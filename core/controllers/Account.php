<?php

namespace core\controllers;

use core\classes\Store;
use core\models\Clients;
use core\classes\ConfirmMailer;

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
  public function verify()
  {
    $ctr = new Main();
    if (Store::isLogged()) {
      $ctr->notFound();
      return;
    }
    if ($_SERVER['REQUEST_METHOD'] != 'POST') {
      $ctr->notFound();
      return;
    }
    if ($_POST["t"] == "login") $this->signIn();
    elseif ($_POST["t"] == "register") $this->register();
  }
  private function register()
  {
    //?=========================
    $email = Clients::testInput($_POST['email']);
    $passwd = Clients::testInput($_POST['passwd']);

    // //*Validate email and passwd
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $_SESSION['error'] = "Invalid email format";
      $this->login();
      return;
    }
    if ($passwd !== Clients::testInput($_POST['confirm-passwd'])) {
      $_SESSION['error'] = 'Passwords are not the same';
      $this->login();
      return;
    }
    if (Clients::emailExists($email)) {
      $_SESSION['error'] = 'An account with this email already exists';
      $this->login();
      return;
    }

    $purl = Clients::createClient($email, $passwd);

    $res = ConfirmMailer::sendConfirmMail($email, $purl);

    if ($res === true) {
      $_SESSION['msg'] = 'Message has been sent to your email address';
      $this->confirm();
    } else {
      $_SESSION['msg'] = 'Message could not be sent';
      $this->login();
    }
  }
  public function confirm()
  {
    $data = [
      'title' => 'Confirm Account',
      'style' => 'confirm',
    ];
    Store::layout([
      'html/head', 'confirm', 'html/foot'
    ], $data);
  }
  private function signIn()
  {
    echo $_POST;
  }
  private function login()
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
