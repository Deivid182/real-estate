<?php
use App\Property;
use Intervention\Image\ImageManager;

require '../../includes/app.php';
// isAuth();

$id = filter_var($_GET['id'], FILTER_VALIDATE_INT);

if (!$id) {
  header('Location: /admin');
}

$property = Property::findOne($id);

$errors = Property::getErrors(); 

includeTemplate('header', false, false);

if ($_SERVER['REQUEST_METHOD'] === "POST") {
  $property->sync($_POST['property']);

  if($_FILES['property']['tmp_name']['image_url']) {
    $uniqueName = md5(uniqid(rand(), true)) . "." . pathinfo($_FILES['property']['name']['image_url'], PATHINFO_EXTENSION);
    // resize to the image
    $manager = new ImageManager();
    // open an image file
    $image = $manager->make($_FILES['property']['tmp_name']['image_url'])->resize(800, 600);
    $property->setImage($uniqueName);
  }

  $errors = $property->validate();
  if (empty($errors)) {
    $image->save(FOLDER_IMAGES . $uniqueName);
    $result = $property->save();

    if($result) {
      header('Location: /admin');
    }
  }
}
?>
<main class="container">
  <h1>Edit Property</h1>
  <a href="/admin" class="btn btn-green">
    Go Back
  </a>
  <?php foreach ($errors as $error) : ?>
    <div class="alert error">
      <?php echo $error; ?>
    </div>
  <?php endforeach; ?>
  <form method="post" enctype="multipart/form-data" class="form">
    <?php include '../../includes/templates/form.php'; ?>
    <button type="submit" class="btn btn-green">
      Submit
    </button>
  </form>
</main>
<?php
includeTemplate('footer');
?>