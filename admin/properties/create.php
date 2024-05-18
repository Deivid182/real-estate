<?php

require '../../includes/config/database.php';
$db = connectDB();

require '../../includes/utils.php';
includeTemplate('header', false, false);

$errors = [];

$title = '';
$price = '';
$description = '';
$rooms = '';
$wc = '';
$parkings = '';
$image = '';
$seller_id = 1;
$created_at = date('Y/m/d');
if ($_SERVER['REQUEST_METHOD'] === "POST") {
  $title = mysqli_real_escape_string($db, $_POST['title']);
  $price = mysqli_real_escape_string($db, $_POST['price']);
  $description = mysqli_real_escape_string($db, $_POST['description']);
  $rooms = mysqli_real_escape_string($db, $_POST['rooms']);
  $wc = mysqli_real_escape_string($db, $_POST['wc']);
  $parkings = mysqli_real_escape_string($db, $_POST['parkings']);
  // echo '<pre>';
  // print_r($_FILES);
  // echo '</pre>';
  $image = $_FILES['image'];
  if (!$title) {
    $errors[] = 'The title is required';
  }
  if (!$price) {
    $errors[] = 'The price is required';
  }
  if (strlen($description) < 10) {
    $errors[] = 'The description is required';
  }
  if (!$rooms) {
    $errors[] = 'The rooms quantity is required';
  }
  if (!$wc) {
    $errors[] = 'The wc quantity is required';
  }
  if (!$parkings) {
    $errors[] = 'The parkings quantity is required';
  }
  if (!$image['name']) {
    $errors[] = 'The image is required';
  }
  $maxSize = 1024 * 1024;
  if ($image['size'] > $maxSize) {
    $errors[] = 'The image is too large';
  }
  if (empty($errors)) {

    $folderImages = "../../images";
    if(!is_dir($folderImages)){
      mkdir($folderImages);
    }
    $uniqueName = md5(uniqid(rand(), true)) . "." . pathinfo($image['name'], PATHINFO_EXTENSION);

    move_uploaded_file($image['tmp_name'], $folderImages . "/" . $uniqueName);
    $query = "INSERT INTO properties (title, price, imageUrl, description, rooms, wc, parkings, seller_id, created_at) VALUES ('$title', '$price', '$uniqueName', '$description', '$rooms', '$wc', '$parkings', '$seller_id', '$created_at')";
    $result = mysqli_query($db, $query);

    if ($result) {
      header('Location: /admin?success=1');
    }
  }
}
?>
<main class="container">
  <h1>New Property</h1>
  <a href="/admin" class="btn btn-green">
    Go Back
  </a>
  <?php foreach ($errors as $error) : ?>
    <div class="alert error">
      <?php echo $error; ?>
    </div>
  <?php endforeach; ?>
  <form method="post" action="/admin/properties/create.php" enctype="multipart/form-data" class="form">
    <fieldset>
      <legend>General Information</legend>

      <label for="title">Title:</label>
      <input type="text" id="title" name="title" value="<?php echo $title ?? ''; ?>">

      <label for="price">Price:</label>
      <input type="number" id="price" name="price" value="<?php echo $price ?? ''; ?>">

      <label for="image">Image:</label>
      <input type="file" accept="image/jpeg, image/png" id="image" name="image">

      <label for="description">Description:</label>
      <textarea name="description" id="description"><?php echo $description ?? ''; ?></textarea>
    </fieldset>

    <fieldset>
      <legend>Property Details</legend>

      <label for="rooms">Rooms:</label>
      <input type="number" id="rooms" name="rooms" min="1" max="9" value="<?php echo $rooms ?? ''; ?>">

      <label for="wc">WC:</label>
      <input type="number" id="wc" name="wc" min="1" max="9" value="<?php echo $wc ?? ''; ?>">

      <label for="parkings">Parkings:</label>
      <input type="number" id="parkings" name="parkings" min="1" max="9" value="<?php echo $parkings ?? ''; ?>">

    </fieldset>
    <fieldset>
      <legend>Seller</legend>
      <select name="seller" id="seller">
        <option value=""> -- Select -- </option>
        <option value="1">Dave</option>
        <option value="2">Ana</option>
      </select>
    </fieldset>
    <button type="submit" class="btn btn-green">
      Submit
    </button>
  </form>
</main>
<?php
includeTemplate('footer');
?>