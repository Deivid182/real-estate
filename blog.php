<?php
require 'includes/utils.php';
includeTemplate('header');
?>
<main class="container section centered-content">
  <section class="blog">
    <h3>Our blog</h3>
    <article class="entry-blog">
      <div class="img">
        <picture>
          <source srcset="/build/img/blog1.webp" type="image/webp">
          <source srcset="/build/img/blog1.jpg" type="image/jpeg">
          <img src="/build/img/blog1.jpg" alt="entry blog">
        </picture>
      </div>
      <div class="text-entry">
        <a href="entry.php">
          <h4>Terrace on the roof of your house</h4>
          <p>Posted on: <span>01/01/2021</span> by: <span>Admin</span></p>
          <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Beatae magnam tempore sint, aliquid eveniet perspiciatis quod non aut minus nesciunt!
          </p>
        </a>
      </div>
    </article>
    <article class="entry-blog">
      <div class="img">
        <picture>
          <source srcset="/build/img/blog1.webp" type="image/webp">
          <source srcset="/build/img/blog1.jpg" type="image/jpeg">
          <img src="/build/img/blog1.jpg" alt="entry blog">
        </picture>
      </div>
      <div class="text-entry">
        <a href="entry.php">
          <h4>Terrace on the roof of your house</h4>
          <p>Posted on: <span>01/01/2021</span> by: <span>Admin</span></p>
          <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Beatae magnam tempore sint, aliquid eveniet perspiciatis quod non aut minus nesciunt!
          </p>
        </a>
      </div>
    </article>
  </section>
</main>
<?php
includeTemplate('footer');
?>