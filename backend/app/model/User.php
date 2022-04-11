<?php
include_once "model/Connection.php";

  class User {

    private $id;
    public $username;
    public $email;
    private $passsword;
    private $isAdmin;
    
 
    public function __construct($username = "", $password = "", $id = 0, $isAdmin = 0, $email = "") {
      if( $id ){
        $this->id = $id;
      }
      $this->username = $username;
      $this->password = $password;
      $this->isAdmin = $isAdmin;
      $this->email = $email;
    }
    
    public function login(){
      $query = "SELECT * FROM users where user = '".addslashes($this->username)."' && password = '".addslashes($this->password)."' ";
      $pdo  = new Connection();
      $pdo = $pdo->open();
      $results = $pdo->query($query);
      $rows = [];
      foreach($results->fetchAll() as $row){
        $rows[] = new User($row['user'], null, $row['id'], $row['isAdmin']);
      }
      return $rows;
    }

    static function selectAll(){
      $query = "SELECT * FROM users";
      $pdo  = new Connection();
      $pdo = $pdo->open();
      $results = $pdo->query($query);
      $rows = [];
      foreach($results->fetchAll() as $row){
        $rows[] = new User($row['user'], null, $row['id'], $row['isAdmin'], $row['email'] );
      }
      return $rows;
    }

    static function select($id){
      $query = "SELECT * FROM users where id = '$id'";
      $pdo  = new Connection();
      $pdo = $pdo->open();
      $results = $pdo->query($query);
      $rows = [];
      foreach($results->fetchAll() as $row){
        $rows[] = new User($row['user'], null, $row['id'], $row['isAdmin'], $row['email'] );
      }
      return $rows;
    }

    static function add($user, $email, $password, $isAdmin){
      $pdo  = new Connection();
      $pdo = $pdo->open();
      $query = "INSERT INTO users (user, email, password, isAdmin)"
             . " VALUES ('".addslashes($user)."', '".addslashes($email)."', '".addslashes($password)."', '$isAdmin')";
      $result = $pdo->prepare($query);
      return $result->execute();
    }

    static function changepassword($newpassword, $userid){
      $query = "UPDATE users set password='".addslashes($newpassword)."' WHERE id='$userid'"; 
      $pdo = new Connection();
      $results = $pdo->open()->prepare($query);
      return $results->execute();
    }

    static function update($id, $username, $email, $isAdmin){
      $query = "UPDATE users set user='".addslashes($username)."', email='".addslashes($email)."', isAdmin='$isAdmin' WHERE id='$id'"; 
      $pdo = new Connection();
      $results = $pdo->open()->prepare($query);
      return $results->execute();
    }

    static function delete($id){
      $query = "DELETE FROM users WHERE id = '$id'";
      $pdo = new Connection();
      $results = $pdo->open()->prepare($query);
      return $results->execute();
    }

    public function getId(){
      return $this->id;
    }

    public function getIsAdmin(){
      return $this->isAdmin;
    }
  }
?>