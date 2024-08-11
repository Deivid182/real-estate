<?php
require '../../includes/app.php';
includeTemplate('header', false, false);

use App\Property;
use Intervention\Image\ImageManager;
// isAuth();
$db = connectDB();
$property = new Property;

$errors = Property::getErrors();
if ($_SERVER['REQUEST_METHOD'] === "POST") {
  
  $property = new Property($_POST['property']);
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
    if(!is_dir(FOLDER_IMAGES)){
      mkdir(FOLDER_IMAGES);
    }
    $image->save(FOLDER_IMAGES . $uniqueName);
    $result = $property->save();
    
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
    <?php include '../../includes/templates/form.php';?>  
    <button type="submit" class="btn btn-green">
      Submit
    </button>
  </form>
</main>
<?php
includeTemplate('footer');
?>