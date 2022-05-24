<?php

namespace core\models;

use core\classes\Database;
use core\classes\Store;

class Products
{
  public static function listAvailableProducts()
  {
    $db = new Database();
    $products = $db->select('SELECT * FROM products where visible = 1');

    return $products;
  }
}
