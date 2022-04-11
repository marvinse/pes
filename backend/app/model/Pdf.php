<?php
include_once "model/Connection.php";

  class Pdf {

    public function __construct() {
    
    }

    static function add($name, $path, $clientId){
      $pdo  = new Connection();
      $pdo = $pdo->open();
      $query = "INSERT INTO proposals (name, url, client_id)"
             . " VALUES ('$name', '$path', '$clientId')";
      $result = $pdo->prepare($query);
      return $result->execute();
    }

    static function delete($id){
      $query = "DELETE FROM proposals WHERE client_id = '$id'";
      $pdo = new Connection();
      $results = $pdo->open()->prepare($query);
      return $results->execute();
    }

    static function update($name, $path, $client_id){
      $query = "UPDATE proposals set name='$name', url='$path' WHERE client_id='$client_id'"; 
      $pdo = new Connection();
      $results = $pdo->open()->prepare($query);
      return $results->execute();
    }

  }
?>