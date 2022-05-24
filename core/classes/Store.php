<?php

namespace core\classes;

use Exception;

class Store
{
  public static function layout($structures, $data = null)
  {
    if (!is_array($structures))
      throw new Exception('Invalid structure');
    if (!empty($data) && is_array($data)) extract($data);
    //Show View
    foreach ($structures as $structure) include("../core/views/$structure.php");
  }
  public static function isLogged()
  {
    return isset($_SESSION['client']);
  }
  public static function hashGenerator($numCharacters = 12)
  {
    //Create Hash
    $chars = '01234567890123456789abcdefghijklmnopqrstuvwxyzabcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZABCDEFGHIJKLMNOPQRSTUVWXYZ';
    return substr(str_shuffle($chars), 0, $numCharacters);
  }
  public static function redirect($route = '')
  {
    header('Location: ' . APP_HOSTNAME . '?page=' . $route);
  }
}
