<?php
namespace App;

class Property
{

  protected static $db;
  protected static $colsDB = [
    "id",
    "title",
    "details",
    "price",
    "image_url",
    "rooms",
    "wc",
    "parkings",
    "created_at",
    "seller_id",
  ];

  public $id;
  public $title;
  public $details;
  public $price;
  public $image_url;
  public $rooms;
  public $wc;
  public $parkings;
  public $created_at;
  public $seller_id;

  protected static $errors = [];

  public static function setDB($database)
  {
    self::$db = $database;
  }

  public function __construct($args = [])
  {
    $this->title = $args["title"] ?? null;
    $this->details = $args["details"] ?? "";
    $this->price = $args["price"] ?? "";
    $this->image_url = $args["image_url"] ?? "";
    $this->rooms = $args["rooms"] ?? "";
    $this->wc = $args["wc"] ?? "";
    $this->parkings = $args["parkings"] ?? "";
    $this->created_at = $args["created_at"] ?? date("Y/m/d");
    $this->seller_id = $args["seller_id"] ?? 1;
  }

  public function save() {
    if(!is_null($this->id)){
      $this->update();
      header('Location: /admin?success=2');
    } else {
      $this->create();
    }
  }

  public function update() {
    $attributes = $this->cleanData();
    $values = [];
    foreach($attributes as $key => $value){
      $values[] = $key. "='". $value."'"; 
    }

    $query = "UPDATE properties SET ";
    $query .= join(', ', $values);
    $query .= " WHERE id = " . self::$db->escape_string($this->id) . " LIMIT 1";
    $result = self::$db->query($query);

    if($result) {
      header('Location: /admin?success=2');
    }
  }

  public function create()
  {

    $attributes = $this->cleanData();

    $query = " INSERT INTO properties ( ";
    $query .= join(', ', array_keys($attributes));
    $query .= " ) VALUES (' ";
    $query .= join("', '", array_values($attributes));
    $query .= " ') ";


    $result = self::$db->query($query);

    if ($result) {
      header('Location: /admin?success=1');
    }
  }

  public function deleteOne() {
    $query = "DELETE FROM properties where id = " . self::$db->escape_string($this->id) . " LIMIT 1";

    $result = self::$db->query($query);

    if($result) {
      $this->deleteImage(); 
      header('Location: /admin?success=3');
    }
  }

  public static function findAll() {
    $query = "SELECT * FROM properties";

    $result = self::readSQL($query);

    return $result;
  }

  public static function findOne($id) {
    $query = "SELECT * FROM properties WHERE id = $id";

    $res = self::readSQL($query);

    return $res[0];
  }

  public function attributes()
  {
    $attributes = [];
    foreach(self::$colsDB as $col) {
      if($col === "id") continue;
      $attributes[$col] = $this->$col;
    }
    return $attributes;
  }

  public function cleanData()
  {
    $attributes = $this->attributes();
    $cleaned = [];

    foreach($attributes as $key => $value) {
      $cleaned[$key] = self::$db->escape_string($value);
    }
    return $cleaned;
  }

  public function setImage($image_url) {
    $this->deleteImage();

    if($image_url) {
      $this->image_url = $image_url;
    }
  }

  public function deleteImage() {
    if(!is_null($this->id) && file_exists(FOLDER_IMAGES . $this->image_url)) {
      unlink(FOLDER_IMAGES . $this->image_url);
    }
  }

  public static function getErrors() {
    return self::$errors;
  }

  public function validate() {
    if (!$this->title) {
      self::$errors[] = 'The title is required';
    }
    if (!$this->price) {
      self::$errors[] = 'The price is required';
    }
    if (strlen($this->details) < 10) {
      self::$errors[] = 'The details field is required';
    }
    if (!$this->rooms) {
      self::$errors[] = 'The rooms quantity is required';
    }
    if (!$this->wc) {
      self::$errors[] = 'The wc quantity is required';
    }
    if (!$this->parkings) {
      self::$errors[] = 'The parkings quantity is required';
    }
    if (!$this->image_url) {
      self::$errors[] = 'The image is required';
    }
    return self::$errors;
  }

  public static function readSQL($query) {
    // read the database
    $res = self::$db->query($query);
    //iterate the res
    $array = [];

    while ($row = $res->fetch_assoc()) {
      $array[] = self::makeObject($row);
    }
    //clean memory
    $res->free();

    //return result
    return $array;
  }

  protected static function makeObject($row) {
    $object = new self();

    foreach ($row as $key => $value) {
      if(property_exists($object, $key)) {
        $object->$key = $value;
      }
    }
    return $object;
  }

  public function sync ($args = []) {
    foreach($args as $key => $value) {
      if(property_exists($this, $key) && !is_null($value)) {
        $this->$key = $value;
      }
    }
  }
}