<?php
require 'includes/utils.php';
includeTemplate('header');
?>
<main class="container section">
  <h1>Know more about us</h1>
  <div class="about-content">
    <div class="img">
      <picture>
        <source srcset="/build/img/nosotros.webp" type="image/webp">
        <source srcset="/build/img/nosotros.jpg" type="image/jpeg">
        <img loading="lazy" src="/build/img/nosotros.jpg" alt="About us">
      </picture>
    </div>
    <div class="text-about">
      <blockquote>
        25 years of experience
      </blockquote>
      <p>
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatem expedita itaque dignissimos rerum non animi reprehenderit numquam! Pariatur consequatur a accusamus non esse reprehenderit asperiores quasi repudiandae modi dignissimos distinctio maiores voluptatem dolorum, sapiente quod unde veniam fugiat autem quisquam!
      </p>
      <p>
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatem expedita itaque dignissimos rerum non animi reprehenderit numquam! Pariatur consequatur a accusamus non esse reprehenderit asperiores quasi repudiandae modi dignissimos distinctio maiores voluptatem dolorum, sapiente quod unde veniam fugiat autem quisquam!
      </p>
    </div>
  </div>
</main>
<section class="container section">
  <h1>More about us</h1>
  <div class="about-icons">
    <div class="icon">
      <img src="/build/img/icono1.svg" alt="icon security" loading="lazy">
      <h3>
        Security
      </h3>
      <p>
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Beatae magnam tempore sint, aliquid eveniet perspiciatis quod non aut minus nesciunt!
      </p>
    </div>
    <div class="icon">
      <img src="/build/img/icono2.svg" alt="icon price" loading="lazy">
      <h3>
        Price
      </h3>
      <p>
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Beatae magnam tempore sint, aliquid eveniet perspiciatis quod non aut minus nesciunt!
      </p>
    </div>
    <div class="icon">
      <img src="/build/img/icono3.svg" alt="icon time" loading="lazy">
      <h3>
        Time
      </h3>
      <p>
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Beatae magnam tempore sint, aliquid eveniet perspiciatis quod non aut minus nesciunt!
      </p>
    </div>
  </div>
</section>
<?php
includeTemplate('footer');
?>