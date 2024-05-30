<?php
require 'includes/app.php';
$db = connectDB();

$errors = [];

if($_SERVER["REQUEST_METHOD"] === "POST") {
  $email = mysqli_real_escape_string($db, filter_var($_POST["email"], FILTER_VALIDATE_EMAIL));
  $password = mysqli_real_escape_string($db, $_POST["password"]);

  if(!$email) {
    $errors[] = 'The email is required';
  }
  if(!$password) {
    $errors[] = 'The password is required';    
  }

  if(empty($errors)) {
    $query = "SELECT * FROM users WHERE email = '$email'";

    $result = mysqli_query($db, $query);

    if($result->num_rows) {
      
      $user = mysqli_fetch_assoc($result);

      $auth = password_verify($password, $user['password']);

      if($auth) {
        session_start();
        //add credentials to the session
        $_SESSION['email'] = $user['email'];
        $_SESSION['login'] = true;

        header("Location: /admin");
      } else {
        $errors[] = "Invalid credentials";
      }
    } else {
      $errors[] = "Invalid credentials";
    }
  }
}

includeTemplate('header');

?>
<main class="container">
  <h1>Sign in</h1>
  <?php foreach($errors as $error): ?>
    <div class="error alert">
      <?php echo $error; ?>
    </div>
  <?php endforeach; ?>
  <form method="post" class="form">
    <fieldset>
      <legend>Credentials</legend>
      <label for="email">E-mail</label>
      <input type="email" name="email" id="email" required/>

      <label for="password">Password</label>
      <input type="password" name="password" id="password" required/>

    </fieldset>
    <button class="btn-green" type="submit">Submit</button>
  </form>
</main>
<?php
includeTemplate('footer');
?>