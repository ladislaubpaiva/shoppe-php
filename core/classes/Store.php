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
}
