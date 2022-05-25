<?php

namespace core\controllers;

use core\classes\Store;
use core\models\Products;

class Main
{
  public function home()
  {
    $data = [
      'title' => 'Home',
      'style' => 'home',
    ];

    Store::layout([
      'html/head', 'home', 'html/foot'
    ], $data);
  }
  public function shop()
  {
    if (isset($_POST['q'])) {
      $productsList = Products::searchAvailableProducts($_POST['q']);
    } else {
      $productsList = Products::listAvailableProducts();
    }
    //todo Query the products list by filters
    // if (isset($_POST['filters'])) {
    //   $color = $_POST['color'];
    //   $category = $_POST['category'];
    //   $sort = $_POST['sort'];
    //   if (!empty($color) || !empty($category) || !empty($sort))
    //     $productsList = Products::listFiltersProducts($color, $category, $sort);
    // } else {
    //   $productsList = Products::listAvailableProducts();
    // }

    $data = [
      'title' => 'Shop The Latest',
      'style' => 'shop',
      'products' => $productsList,
    ];

    Store::layout([
      'html/head', 'shop', 'html/foot'
    ], $data);
  }
  public function blog()
  {
    $data = [
      'title' => 'Blog',
      'style' => 'blog',
    ];

    Store::layout([
      'html/head', 'blog', 'html/foot'
    ], $data);
  }
  public function ourStory()
  {
    $data = [
      'title' => 'Our Story',
      'style' => 'our-story',
    ];

    Store::layout([
      'html/head', 'our-story', 'html/foot'
    ], $data);
  }
  public function cart()
  {
    $data = [
      'title' => 'Cart',
      'style' => 'cart',
    ];

    Store::layout([
      'html/head', 'cart', 'html/foot'
    ], $data);
  }
  public function notFound()
  {
    $data = [
      'title' => 'Not Found',
      'style' => '404',
    ];

    Store::layout([
      'html/head', '404', 'html/foot'
    ], $data);
  }
}
