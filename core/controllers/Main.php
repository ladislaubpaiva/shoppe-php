<?php

namespace core\controllers;

use core\classes\Store;

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
    $data = [
      'title' => 'Shop',
      'style' => 'shop',
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
