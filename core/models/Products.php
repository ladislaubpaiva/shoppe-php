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
  public static function searchAvailableProducts($name = null)
  {
    $db = new Database();

    if (!$name == null) {
      $products = $db->select("SELECT * FROM products where visible = 1 AND `name` like '%$name%'");
    } else {
      $products = $db->select('SELECT * FROM products where visible = 1');
    }
    return $products;
  }
  public static function listFiltersProducts($color, $category, $sort)
  {
    $db = new Database();

    if (!$category == null) {
      $params = [':category' => $category];
      $products = $db->select('SELECT * FROM products where visible = 1 AND category = :category', $params);
    }
    return $products;
  }
}
