<?php
require '../includes/utils.php';
includeTemplate('header', false, false);

$result = intval($_GET['success']) ?? null;
?>
<main class="container section">
  <?php if ($result === 1) : ?>
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
      <tr>
        <td>1</td>
        <td>Property 1</td>
        <td>
          <img src="/build/img/anuncio1.webp" class="property-image" alt="Property 1">
        </td>
        <td>$ 1,000,000</td>
        <td>
          <a href="/admin/properties/update.php" class="btn btn-green">
            Edit
          </a>
          <a href="/admin/properties/delete.php" class="btn btn-red">
            Delete
          </a>  
        </td>
      </tr>
    </tbody>
  </table>
</main>
<?php
includeTemplate('footer');
?>