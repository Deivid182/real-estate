<?php
require '../includes/app.php';
// isAuth();


$db = connectDB();
$query = "SELECT * FROM properties";

$result = mysqli_query($db, $query);

includeTemplate('header', false, false);

$resultQuery = intval($_GET['success']) ?? null;

if($_SERVER['REQUEST_METHOD'] === 'POST') {
  $id = filter_var($_POST['id'], FILTER_VALIDATE_INT);
  // var_dump($id);
  if($id) {

    $query = "SELECT image_url from properties where id = $id";
    $result = mysqli_query($db, $query);
    $property = mysqli_fetch_assoc($result);
    
    unlink('../images/' .  $property['image_url']);

    $query = "DELETE FROM properties WHERE id = $id";
    $result = mysqli_query($db, $query);
    if($result) {
      header('Location: /admin');
    }
  }
}

?>
<main class="container section">
  <?php if ($resultQuery === 1) : ?>
    <div class="alert success">
      Property added successfully
    </div>
    <?php elseif ($resultQuery === 2) : ?>
      <div class="alert success">
        Property updated successfully
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
            <form method="post">
              <input type="hidden" name="id" value="<?php echo $property['id'];?>">
              <input type="submit" class="btn-red w-full" value="Delete">
            </form>
            <a href="/admin/properties/update.php?id=<?php echo $property['id'] ;?>" class="btn-green-block">
              Edit
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