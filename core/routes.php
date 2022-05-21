<?php

$routes = [
  'home' => 'main@home',
  'store' => 'main@store',
  'blog' => 'main@blog',
  'our-story' => 'main@ourStory',
  '404' => 'main@notFound',
  'account' => 'main@account',
  'cart' => 'store@cart',
  'wishlist' => 'store@wishList',
];

$page = 'home';

if (isset($_GET['page'])) {
  $page = !key_exists($_GET['page'], $routes) ? 'home' : $_GET['page'];
}

$parts = explode('@', $routes[$page]);
$controller = 'core\\controllers\\' . ucfirst($parts[0]);
$method = $parts[1];
$ctr = new $controller();
$ctr->$method();
