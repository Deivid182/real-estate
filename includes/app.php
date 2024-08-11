<?php

require "utils.php";
require "config/database.php";
require __DIR__ . "/../vendor/autoload.php";
define('TEMPLATES_URL', __DIR__ . '/templates');
define('FOLDER_IMAGES', __DIR__ . '/../images/');

use App\Property;
$property = new Property;

$db = connectDB();
Property::setDB($db);

?>