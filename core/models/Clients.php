<?php

namespace core\models;

use core\classes\Database;
use core\classes\Store;
use core\controllers\Main;

class Clients
{
  public static function testInput($input)
  {
    $input = trim($input);
    $input = strtolower($input);
    $input = stripslashes($input);
    $input = htmlspecialchars($input);
    return $input;
  }
  public static function emailExists($email)
  {
    $db = new Database();
    $params = [':email' => $email];
    $res = $db->select("SELECT email FROM clients WHERE email = :email", $params);
    if (count($res) != 0) {
      return true;
    }
    return false;
  }
  public static function createClient($email, $passwd)
  {
    $db = new Database();

    $purl = Store::hashGenerator();

    $params = [
      ":email" => $email,
      ":passwd" => password_hash($passwd, PASSWORD_DEFAULT),
      ":purl" => $purl,
    ];
    $db->insert('INSERT INTO clients (email, passwd, purl) VALUES (:email, :passwd, :purl)', $params);

    return $purl;
  }
  public static function validateEmail($purl)
  {
    $db = new Database();
    $params = [
      ':purl' => $purl,
    ];

    $res = $db->select('SELECT * FROM clients WHERE purl = :purl', $params);

    if (count($res) != 1) {
      return false;
    }

    $params = [
      ':id' => $res[0]->id,
      ':purl' => NULL,
      ':active' => 1,
    ];

    $db->update('UPDATE clients SET purl = :purl, active = :active, updated_at = NOW() WHERE id = :id', $params);

    return true;
  }
}
