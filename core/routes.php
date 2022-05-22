<?php

$routes = [
  'home' => 'main@home',
  'shop' => 'main@shop',
  'blog' => 'main@blog',
  'our-story' => 'main@ourStory',
  '404' => 'main@notFound',
  'cart' => 'main@cart',
  //Account
  'account' => 'account@account',
  'wishlist' => 'account@wishList',
  'login' => 'account@account',
  'logout' => 'account@wishList',
];

$page = 'home';

if (isset($_GET['page'])) {
  $page = !key_exists($_GET['page'], $routes) ? '404' : $_GET['page'];
}

$parts = explode('@', $routes[$page]);
$controller = 'core\\controllers\\' . ucfirst($parts[0]);
$method = $parts[1];
$ctr = new $controller();
$ctr->$method();
