<?php
require 'includes/utils.php';
includeTemplate('header');
?>
<main class="container centered-content section">
  <h1>Houses for sale in front the forest</h1>
  <picture>
    <source src="/build/img/destacada.webp" type="image/webp">
    <source src="/build/img/destacada.jpg" type="image/jpeg">
    <img src="/build/img/destacada.jpg" alt="apartment" loading="lazy">
  </picture>
  <div class="summary-propety ">
    <p class="price">$ 1,000,000</p>
    <ul class="icons-features">
      <li>
        <img src="/build/img/icono_wc.svg" alt="icon wc" loading="lazy">
        <p>3</p>
      </li>
      <li>
        <img src="/build/img/icono_estacionamiento.svg" alt="icon parking" loading="lazy">
        <p>3</p>
      </li>
      <li>
        <img src="/build/img/icono_dormitorio.svg" alt="icon rooms" loading="lazy">
        <p>3</p>
      </li>
    </ul>
    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Eligendi, ea sint reiciendis, quaerat natus, minima sed doloribus sapiente a nobis similique? Repellat, debitis totam nesciunt optio iste labore! Fugiat dolores amet quibusdam eos. Cum tempore numquam aut, commodi sequi accusamus!</p>
  </div>
</main>
<?php
includeTemplate('footer');
?>