<?php
require '../includes/config/database.php';
$db = connectDB();

$query = "SELECT * FROM properties";

$result = mysqli_query($db, $query);

require '../includes/utils.php';
includeTemplate('header', false, false);

$resultQuery = intval($_GET['success']) ?? null;
?>
<main class="container section">
  <?php if ($resultQuery === 1) : ?>
    <div class="alert success">
      Property added successfully
    </div>
  <?php endif; ?>
  <h1>Real Estate Manager</h1>
  <a href="/admin/properties/create.php" class="btn btn-green">
    Add Property
  </a>
  <table class="properties">
    <thead>
      <tr>
        <th>ID</th>
        <th>Title</th>
        <th>Image</th>
        <th>Price</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      <?php while ($property = mysqli_fetch_assoc($result)) : ?>
        <tr>
          <td><?php echo $property['id'] ?></td>
          <td><?php echo $property['title'] ?></td>
          <td>
            <img src="/images/<?php echo $property['image_url'] ?>" class="property-image" alt="Property 1">
          </td>
          <td><?php echo $property['price'] ?></td>
          <td>
            <a href="/admin/properties/update.php" class="btn-green-block">
              Edit
            </a>
            <a href="/admin/properties/delete.php" class="btn-red-block">
              Delete
            </a>
          </td>
        </tr>
      <?php endwhile; ?>
    </tbody>
  </table>
</main>
<?php

mysqli_close($db);

includeTemplate('footer');
?>