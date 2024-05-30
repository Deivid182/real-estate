<?php
require 'includes/app.php';
includeTemplate('header');
?>
<main class="container">
  <h1>Houses and apartments for sale</h1>
  <?php include 'includes/templates/advertisements.php';?>
</main>
<?php
includeTemplate('footer');
?>