<?php

namespace core\classes;

use PDO;
use PDOException;
use Exception;

class Database
{
  private $connection;
  //Connect with PDO to the database
  private function turnOn()
  {
    $this->connection = new PDO(
      'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=' . DB_CHARSET,
      DB_USER,
      DB_PWD,
      array(PDO::ATTR_PERSISTENT => true)
    );
    //debug
    $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
  }
  //Disconnect with PDO to the database
  private function turnOff()
  {
    $this->connection =  null;
  }
  //Verify Query
  private function invalidCRUDQuery($cmd, $query)
  {
    if (!preg_match('/^' . $cmd . '/i', $query)) {
      throw new Exception("Invalid $cmd query");
    }
  }
  //CRUD functions
  public function insert($sql, $params = null)
  {
    $this->invalidCRUDQuery('INSERT', $sql);

    $this->turnOn();

    try {
      $execute = $this->connection->prepare($sql);

      if (!empty($params))
        $execute->execute($params);
      else
        $execute->execute();
    } catch (PDOException $e) {
      return false;
    }

    $this->turnOff();
  }
  public function select($sql, $params = null)
  {
    $this->invalidCRUDQuery('SELECT', $sql);
    $result = null;
    $this->turnOn();
    try {
      $execute = $this->connection->prepare($sql);
      if (!empty($params)) {
        $execute->execute($params);
      } else {
        $execute->execute();
      }
      $result = $execute->fetchAll(PDO::FETCH_CLASS);
    } catch (PDOException $e) {
      return false;
    }
    $this->turnOff();
    return $result;
  }
  public function update($sql, $params = null)
  {
    $this->invalidCRUDQuery('UPDATE', $sql);
    $this->turnOn();
    try {
      $execute = $this->connection->prepare($sql);

      if (!empty($params))
        $execute->execute($params);
      else
        $execute->execute();
    } catch (PDOException $e) {
      return false;
    }
    $this->turnOff();
  }
  public function delete($sql, $params = null)
  {
    $this->invalidCRUDQuery('DELETE', $sql);
    $this->turnOn();
    try {
      $execute = $this->connection->prepare($sql);

      if (!empty($params))
        $execute->execute($params);
      else
        $execute->execute();
    } catch (PDOException $e) {
      return false;
    }
    $this->turnOff();
  }
  public function generic($sql, $params = null)
  {
    if (preg_match('/^(INSERT|SELECT|UPDATE|DELETE)/i', $sql)) {
      throw new Exception("Invalid Generic query");
    }
    $this->turnOn();
    try {
      $execute = $this->connection->prepare($sql);

      if (!empty($params))
        $execute->execute($params);
      else
        $execute->execute();
    } catch (PDOException $e) {
      return false;
    }
    $this->turnOff();
  }
}
