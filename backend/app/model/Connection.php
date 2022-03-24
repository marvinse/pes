<?php

include "model/config.php";

/**
 * Description of Connection
 */
class Connection {

  private $str;
  
  /**
   * initial values
   */
  public function __construct() {
    $this->str = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME.";charset=utf8";
  }
  
  /**
   * Open DB connection, usign PDO object
   * @return \PDO open conexion
   */
  public function open() {
    try {
      return new PDO($this->str, DB_USER, DB_PASSWORD);
    } catch (PDOException $ex) {
      error_log("ERROR EN " . __FILE__ . " EN LA LINEA" . __LINE__ . " EL ERROR :" . $ex->getMessage());
      return NULL;
    }
  }

}
