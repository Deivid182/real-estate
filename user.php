<?php
require "includes/app.php";

$db = connectDB();

$email = "davejs@gmail.com";
$password = "password";

$hashedPassword = password_hash($password, PASSWORD_BCRYPT);

var_dump($hashedPassword);

$query  = "INSERT INTO users (email, password) VALUES ('$email', '$hashedPassword');";

mysqli_query($db, $query);

?>