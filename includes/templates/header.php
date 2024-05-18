<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>EliteEstate Solutions</title>
  <link rel="stylesheet" href="/build/css/app.css">
</head>

<body>
  <header class="header <?php echo $index ? 'index' : ''; ?>">
    <div class="container header-content">
      <div class="bar">
        <a href="/">
          <img src="/build/img/logo.svg" alt="logo EliteEstate">
        </a>
        <div class="mobile-menu">
          <img src="/build/img/barras.svg" alt="menu icon" width="30" height="30">
        </div>
        <?php if ($showNav) { ?>
        <nav class="nav">
          <a href="about.php" class="nav-link">About us</a>
          <a href="advertisements.php" class="nav-link">Advertisements</a>
          <a href="blog.php" class="nav-link">Blog</a>
          <a href="contact.php" class="nav-link">Contact</a>
        </nav>
        <?php } ?>
      </div>
      <?php if ($index) { ?>
        <h1>Sale of luxury apartments and houses</h1>
      <?php } ?>
    </div>
  </header>