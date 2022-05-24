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
      Store::redirect('account');
      return;
    }
    if ($passwd !== Clients::testInput($_POST['confirm-passwd'])) {
      $_SESSION['error'] = 'Passwords are not the same';
      Store::redirect('account');
      return;
    }
    if (Clients::emailExists($email)) {
      $_SESSION['error'] = 'An account with this email already exists';
      Store::redirect('account');
      return;
    }

    //*Create Personal URL for confirm email

    $purl = Clients::createClient($email, $passwd);

    $res = ConfirmMailer::sendConfirmMail($email, $purl);

    if ($res === true) {
      $_SESSION['msg'] = 'A confirmation email has been sent to your email address';
      Store::redirect('account');
    } else {
      $_SESSION['error'] = 'A confirmation email could not be sent to your email address';
      Store::redirect('account');
    }
  }
  public function confirm()
  {
    $ctr = new Main();
    if (Store::isLogged()) {
      $ctr->notFound();
      return;
    }
    if (!$_GET['purl']) {
      $ctr->notFound();
      return;
    }

    $purl = $_GET['purl'];

    if (strlen($purl) != 12) {
      $ctr->notFound();
      return;
    }

    $res = Clients::validateEmail($purl);

    if ($res === true) {
      $_SESSION['info'] = 'Account has been successfully confirmed';
    } else {
      $_SESSION['error'] = 'Link invalid or has already been confirmed';
    }

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
