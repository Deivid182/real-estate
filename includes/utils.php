<?php
require 'app.php';
function includeTemplate(string $name, bool $index = false, $showNav = true) {
  include TEMPLATES_URL . "/{$name}.php";
}