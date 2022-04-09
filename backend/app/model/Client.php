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
    public $responsible_name;
    
    public function __construct($id = 0, $type, $entity_name, $name, $phone, $email, $direction, $date, $activity_date,
        $topic, $price, $notes, $modified_date, $status, $responsible_id, $responsible_name) {

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
        $this->responsible_name = $responsible_name;
    }

    static function add ($type, $entity, $contactname, $phone, $email, $direction,
      $date, $activity_date, $topic, $price, $notes, $modified_date, $status, $responsible){
        $pdo  = new Connection();
        $pdo = $pdo->open();
        $query = "INSERT INTO clients (type, entity_name, name, phone, email, direction, date, activity_date,
        topic, price, notes, modified_date, status, responsible_id)"
              . " VALUES ('$type', '$entity', '$contactname', '$phone', '$email', '$direction',
              '$date', '$activity_date', '$topic', '$price', '$notes', '$modified_date', '$status', '$responsible')";
        $result = $pdo->prepare($query);
        return $result->execute();
    }

    static function update($id, $type, $entity, $contactname, $phone, $email, $direction,
    $date, $activity_date, $topic, $price, $notes, $modified_date, $status, $responsible){
      $query = "UPDATE clients set type='$type', entity_name='$entity', name='$contactname',
        phone='$phone', email='$email', direction='$direction', date='$date', activity_date='$activity_date',
        topic='$topic', price='$price', notes='$notes', modified_date='$modified_date', status='$status',
        responsible_id='$responsible'
       WHERE id='$id'"; 
      $pdo = new Connection();
      $results = $pdo->open()->prepare($query);
      return $results->execute();
    }

    static function search($searchTerm){
      $query = "SELECT c.*, u.user as responsible_name FROM clients c JOIN users u on (c.responsible_id = u.id) where c.entity_name like '%$searchTerm%' or
      c.name like '%$searchTerm%' or c.email like '%$searchTerm%'";
      $pdo  = new Connection();
      $pdo = $pdo->open();
      $results = $pdo->query($query);
      $rows = [];
      foreach($results->fetchAll() as $row){
        $rows[] = new Client($row['id'],$row['type'], $row['entity_name'], $row['name'], $row['phone'],
        $row['email'], $row['direction'], $row['date'], $row['activity_date'], $row['topic'], $row['price'],
        $row['notes'], $row['modified_date'], $row['status'], $row['responsible_id'], $row['responsible_name']);
      }
      return $rows;
    }

    static function advancedsearch($queryTerm){
      if($queryTerm!=""){
        $query = "SELECT c.*, u.user as responsible_name FROM clients c JOIN users u on (c.responsible_id = u.id) where ".$queryTerm;
        $pdo  = new Connection();
        $pdo = $pdo->open();
        $results = $pdo->query($query);
        $rows = [];
        foreach($results->fetchAll() as $row){
          $rows[] = new Client($row['id'],$row['type'], $row['entity_name'], $row['name'], $row['phone'],
          $row['email'], $row['direction'], $row['date'], $row['activity_date'], $row['topic'], $row['price'],
          $row['notes'], $row['modified_date'], $row['status'], $row['responsible_id'], $row['responsible_name']);
        }
      }else{
        $rows = [];
      }
      return $rows;
    }

    static function select($id){
      $query = "SELECT c.*, u.user as responsible_name FROM clients c JOIN users u on (c.responsible_id = u.id) where c.id = '$id'";
      $pdo  = new Connection();
      $pdo = $pdo->open();
      $results = $pdo->query($query);
      $rows = [];
      foreach($results->fetchAll() as $row){
        $rows[] = new Client($row['id'],$row['type'], $row['entity_name'], $row['name'], $row['phone'],
        $row['email'], $row['direction'], $row['date'], $row['activity_date'], $row['topic'], $row['price'],
        $row['notes'], $row['modified_date'], $row['status'], $row['responsible_id'], $row['responsible_name']);
      }
      return $rows;
    }

    static function getTotalClients(){
      $queryTotal = "SELECT COUNT(id) AS totalClients FROM clients"; //get total of clients
      $pdo  = new Connection();
      $pdo = $pdo->open();
      $totalClients = 0;
      foreach($pdo->query($queryTotal)->fetchAll() as $queryResult){
        $totalClients = $queryResult["totalClients"];
      }
      return $totalClients;
    }

    static function selectAll($resultsPerPage, $pageNumber = 1){
      $totalClients = Client::getTotalClients();
      
      $pdo  = new Connection();
      $pdo = $pdo->open();

      $offsetValue = ($pageNumber-1) * $resultsPerPage;

      $query = "SELECT c.*, u.user as responsible_name FROM clients c JOIN users u on (c.responsible_id = u.id)
      LIMIT ".$resultsPerPage." OFFSET ".$offsetValue;

      $results = $pdo->query($query);
      $rows = [];
      foreach($results->fetchAll() as $row){
        $rows[] = new Client($row['id'],$row['type'], $row['entity_name'], $row['name'], $row['phone'],
        $row['email'], $row['direction'], $row['date'], $row['activity_date'], $row['topic'], $row['price'],
        $row['notes'], $row['modified_date'], $row['status'], $row['responsible_id'], $row['responsible_name']);
      }
      return $rows;
    }

    static function delete($id){
      $query = "DELETE FROM clients WHERE id = '$id'";
      $pdo = new Connection();
      $results = $pdo->open()->prepare($query);
      return $results->execute();
    }

  }
?>