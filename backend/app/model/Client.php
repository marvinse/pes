<?php
include_once "model/Connection.php";

  class Client {

    public $id;
    public $type;
    public $entity_name;
    public $name;
    public $phone;
    public $email;
    public $direction;
    public $date;
    public $activity_date;
    public $topic;
    public $price;
    public $notes;
    public $modified_date;
    public $status;
    public $responsible_id;
    
    public function __construct($id = 0, $type, $entity_name, $name, $phone, $email, $direction, $date, $activity_date,
        $topic, $price, $notes, $modified_date, $status, $responsible_id) {

        if( $id ){
            $this->id = $id;
        }
        $this->type = $type;
        $this->entity_name = $entity_name;
        $this->name = $name;
        $this->phone = $phone;
        $this->email = $email;
        $this->direction = $direction;
        $this->date = $date;
        $this->activity_date = $activity_date;
        $this->topic = $topic;
        $this->price = $price;
        $this->notes = $notes;
        $this->modified_date = $modified_date;
        $this->status = $status;
        $this->responsible_id = $responsible_id;
    }
    
    /*public function login(){
      $query = "SELECT * FROM users where user = '$this->username' && password = '$this->password' ";
      $pdo  = new Connection();
      $pdo = $pdo->open();
      $results = $pdo->query($query);
      $rows = [];
      foreach($results->fetchAll() as $row){
        $rows[] = new User($row['user'], null, $row['id'], $row['isAdmin']);
      }
      return $rows;
    }*/

    static function search($searchTerm){
      $query = "SELECT * FROM clients where entity_name like '%$searchTerm%' or
      name like '%$searchTerm%' or email like '%$searchTerm%'";
      $pdo  = new Connection();
      $pdo = $pdo->open();
      $results = $pdo->query($query);
      $rows = [];
      foreach($results->fetchAll() as $row){
        $rows[] = new Client($row['id'],$row['type'], $row['entity_name'], $row['name'], $row['phone'],
        $row['email'], $row['direction'], $row['date'], $row['activity_date'], $row['topic'], $row['price'],
        $row['notes'], $row['modified_date'], $row['status'], $row['responsible_id']);
      }
      return $rows;
    }

    static function selectAll(){
      $query = "SELECT * FROM clients";
      $pdo  = new Connection();
      $pdo = $pdo->open();
      $results = $pdo->query($query);
      $rows = [];
      foreach($results->fetchAll() as $row){
        $rows[] = new Client($row['id'],$row['type'], $row['entity_name'], $row['name'], $row['phone'],
        $row['email'], $row['direction'], $row['date'], $row['activity_date'], $row['topic'], $row['price'],
        $row['notes'], $row['modified_date'], $row['status'], $row['responsible_id']);
      }
      return $rows;
    }

  }
?>