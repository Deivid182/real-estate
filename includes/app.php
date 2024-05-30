<?php

require "utils.php";
require "config/database.php";
require __DIR__ . "/../vendor/autoload.php";
define('TEMPLATES_URL', __DIR__ . '/templates');

use App\Property;
$property = new Property;

$db = connectDB();
Property::setDB($db);

?>