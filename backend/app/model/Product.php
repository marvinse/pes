<?php
include_once "model/Connection.php";
/**
 * Manage the products information
 */
class Product {

  private $id;
  public $name;
  public $price;
  public $image;
  public $description;
  
  /**
   * Initial Values
   * @param String $name
   * @param String $price
   * @param String $image
   * @param String $description
   */
  public function __construct($name = "", $price = "", $image = "", $description = "", $id = 0) {
    if( $id ){
      $this->id = $id;
    }
    $this->name = $name;
    $this->price = $price;
    $this->image = $image;
    $this->description = $description;
  }

  /**
   * Return the product id
   * @return number
   */
  public function getId(){
    return $this->id;
  }
  
  /**
   * Insert into the database
   * @return boolean
   */
  public function insert(){
    $pdo  = new Connection();
    $pdo = $pdo->open();
    $query = "INSERT INTO products (name, price, image, description)"
           . " VALUES ('{$this->name}', '{$this->price}', '{$this->image}', '{$this->description}')";
    $result = $pdo->prepare($query);
    return $result->execute();
  }
  
  /**
   * Get product(s) from database
   * @param integer $id
   * @return product list
   */
  public function select($id = 0, $filter = null){
    $query = "SELECT * FROM products";
    if($id){
      $query .= " where id = '$id'";
    }else{
      if($filter){
        $query .= " where name like '%$filter%'";
      }
    }
    $pdo  = new Connection();
    $pdo = $pdo->open();
    $results = $pdo->query($query);
    $rows = [];
    foreach($results->fetchAll() as $row){
      $rows[] = new Product($row['name'], $row['price'], $row['image'], $row['description'], $row['id']);
    }
    return $rows;
  }

  /**
   * Get product(s) from database
   * @param string $idList (separed by comma)
   * @return product list
   */
  static function selectRange($idList){
    $query = "SELECT * FROM products where id in ($idList)";
    $pdo  = new Connection();
    $pdo = $pdo->open();
    $results = $pdo->query($query);
    $rows = [];
    if($results){
      foreach($results->fetchAll() as $row){
        $rows[] = new Product($row['name'], $row['price'], $row['image'], $row['description'], $row['id']);
      }
    }
    return $rows;
  }

  /**
   * delete product
   * @param integer $id
   * @return boolean
   */
  static function delete($id){
    $query = "DELETE FROM products WHERE id = '$id'";
    $pdo = new Connection();
    $results = $pdo->open()->prepare($query);
    return $results->execute();
  }

  /**
   * update product
   * @param integer $id
   * @param string $name
   * @param integer $price
   * @param string $image
   * @param string $description
   * @return boolean
   */
  static function update($id, $name, $price, $image, $description){
    $query = "UPDATE products set name='{$name}', price='{$price}', image='{$image}', description='{$description}' WHERE id='{$id}'"; 
    $pdo = new Connection();
    $results = $pdo->open()->prepare($query);
    return $results->execute();
  }

}
