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

  public static function setDB($databse)
  {
    self::$db = $databse;
  }

  public function __construct($args = [])
  {
    $this->title = $args["title"] ?? "";
    $this->details = $args["details"] ?? "";
    $this->price = $args["price"] ?? "";
    $this->image_url = $args["image_url"] ?? "image.jpg";
    $this->rooms = $args["rooms"] ?? "";
    $this->wc = $args["wc"] ?? "";
    $this->parkings = $args["parkings"] ?? "";
    $this->created_at = $args["created_at"] ?? date("Y/m/d");
    $this->seller_id = $args["seller_id"] ?? 1;
  }

  public function save()
  {

    $this->cleanData();

    $query = "INSERT INTO properties (title, price, image_url, details, rooms, wc, parkings, created_at, seller_id) VALUES ('$this->title', '$this->price', '$this->image_url', '$this->details', $this->rooms, $this->wc, $this->parkings, '$this->created_at', $this->seller_id)";

    $result = self::$db->query($query);
    debugCode($result);
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
    debugCode($cleaned);
  }
}
