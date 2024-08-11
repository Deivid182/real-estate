<?php
function includeTemplate(string $name, bool $index = false, $showNav = true) {
  include TEMPLATES_URL . "/{$name}.php";
}

function isAuth() {

  session_start();

  $auth = $_SESSION['login'];

  if(!$auth) {
    header("Location: /");
  }
}

function debugCode($value) {
  echo "<pre>";
  var_dump($value);
  echo "<pre>";
  exit;
}
// purify html
function purify($value) {
  return htmlspecialchars($value);
}