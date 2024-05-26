<?php
$id = filter_var($_GET['id'], FILTER_VALIDATE_INT);
if(!$id) {
  header('Location: /');
}
require 'includes/config/database.php';

$db = connectDB();

$query = "SELECT * FROM properties WHERE id = $id";
$result = mysqli_query($db, $query);
if(!$result->num_rows) {
  header('Location: /');
}
$property = mysqli_fetch_assoc($result);


require 'includes/utils.php';
includeTemplate('header');


?>
<main class="container centered-content section">
  <h1><?php echo $property['title']?></h1>
  <img src="/images/<?php echo $property['image_url']?>" alt="apartment" loading="lazy">
  <div class="summary-propety ">
    <p class="price">$<?php echo $property['price']?></p>
    <ul class="icons-features">
      <li>
        <img src="/build/img/icono_wc.svg" alt="icon wc" loading="lazy">
        <p><?php echo $property['wc']?></p>
      </li>
      <li>
        <img src="/build/img/icono_estacionamiento.svg" alt="icon parking" loading="lazy">
        <p><?php echo $property['parkings']?></p>
      </li>
      <li>
        <img src="/build/img/icono_dormitorio.svg" alt="icon rooms" loading="lazy">
        <p><?php echo $property['rooms']?></p>
      </li>
    </ul>
    <p>
    <?php echo $property['details']?>
    </p>
  </div>
</main>
<?php
includeTemplate('footer');
mysqli_close($db);
?>