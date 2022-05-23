<?php

namespace core\controllers;

use core\classes\Database;
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
    function testInput($d)
    {
      $d = trim($d);
      $d = strtolower($d);
      $d = stripslashes($d);
      $d = htmlspecialchars($d);
      return $d;
    }
    $email = testInput($_POST['email']);
    $passwd = testInput($_POST['passwd']);
    //*Validate email and passwd
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $_SESSION['error'] = "Invalid email format";
      $this->login();
      return;
    }
    if ($passwd !== testInput($_POST['confirm-passwd'])) {
      $_SESSION['error'] = 'Passwords are not the same';
      $this->login();
      return;
    }
    //?=========================
    $db = new Database();
    $params = [
      ':email' => $email
      // ':passwd' => $passwd,
    ];
    $res = $db->select("SELECT email FROM clients WHERE email = :email", $params);
    if (count($res) != 0) {
      $_SESSION['error'] = 'An account with this email already exists';
      $this->login();
      return;
    }
    $purl = Store::hashGenerator();

    $params = [
      ":email" => $email,
      ":passwd" => password_hash($passwd, PASSWORD_DEFAULT),
      ":purl" => $purl,
    ];
    echo $_SERVER["HTTP_ORIGIN"] . "/public?page=confirm&purl=" . $purl;
    $db->insert('INSERT INTO clients (email, passwd, purl) VALUES (:email, :passwd, :purl)', $params);
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
