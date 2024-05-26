<?php
require 'includes/config/database.php';

$db = connectDB();

$query = "SELECT * FROM properties";
$result = mysqli_query($db, $query);

?>

<div class="container-advertisements">
  <?php while($property = mysqli_fetch_assoc($result)) : ?>
  <div class="advertisement">
    <img src="/images/<?php echo $property['image_url']; ?>" alt="apartment" loading="lazy">
    <div class="advertisement-content">
      <h3><?php echo $property['title']; ?></h3>
      <p>
      <?php echo $property['details']; ?>
      </p>
      <p class="price">$<?php echo $property['price']; ?></p>
      <ul class="icons-features">
        <li>
          <img src="/build/img/icono_wc.svg" alt="icon wc" loading="lazy">
          <p><?php echo $property['wc']; ?></p>
        </li>
        <li>
          <img src="/build/img/icono_estacionamiento.svg" alt="icon parking" loading="lazy">
          <p><?php echo $property['parkings']; ?></p>
        </li>
        <li>
          <img src="/build/img/icono_dormitorio.svg" alt="icon rooms" loading="lazy">
          <p><?php echo $property['rooms']; ?></p>
        </li>
      </ul>
      <a href="advertisement.php?id=<?php echo $property['id']; ?>" class="btn-yellow-block">See more</a>
    </div>
  </div>
  <?php endwhile; ?>
</div>

<?php
mysqli_close($db);

?>