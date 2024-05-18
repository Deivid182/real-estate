<?php
function connectDB(): mysqli {
  $db = mysqli_connect('localhost', 'davejs', 'davejs21', 'real-estate');
  if(!$db) {
    echo "Error: No se pudo conectar a MySQL.";
    exit();
  }
  return $db;
}