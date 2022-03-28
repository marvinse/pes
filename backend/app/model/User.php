<?php
include_once "model/Connection.php";
/**
 * Manage the user information
 */
  class User {

    private $id;
    public $username;
    private $passsword;
    
    /**
     * Initial Values
     * @param String $username
     * @param String $password
     */
    public function __construct($username = "", $password = "", $id = 0) {
      if( $id ){
        $this->id = $id;
      }
      $this->username = $username;
      $this->password = $password;
    }
    
    /**
     * Try to login into the system
     * @return user list
     */
    public function login(){
      $query = "SELECT * FROM users where user = '$this->username' && password = '$this->password' ";
      $pdo  = new Connection();
      $pdo = $pdo->open();
      $results = $pdo->query($query);
      $rows = [];
      foreach($results->fetchAll() as $row){
        $rows[] = new User($row['username'], null, $row['id']);
      }
      return $rows;
    }

    /**
     * Get user(s) from database
     * @param integer $id
     * @return user list
     */
    static function select($id = 0){
      $query = "SELECT * FROM users where id = '$id' ";
      $pdo  = new Connection();
      $pdo = $pdo->open();
      $results = $pdo->query($query);
      $rows = [];
      foreach($results->fetchAll() as $row){
        $rows[] = new User($row['name'], $row['username'], null, $row['id']);
      }
      return $rows;
    }

    /**
     * Return the user id
     * @return number
     */
    public function getId(){
      return $this->id;
    }
  }
?>