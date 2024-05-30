<?php

declare(strict_types=1);
require 'includes/app.php';
includeTemplate('header', $index = true);
?>
<main class="container section">
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
</main>
<section class="section container">
  <h1>Houses and apartments for sale</h1>
    <?php include 'includes/templates/advertisements.php';?>
  <div class="align-right">
    <a href="advertisement.php" class="btn-green">See all</a>
  </div>
</section>
<section class="img-contact">
  <h2>Find the house of your dreams</h2>
  <p>
    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Velit laboriosam, non similique nam ullam minima beatae iusto dolorem nesciunt ipsum, illo nostrum repellendus! Sed, totam?
  </p>
  <a href="contact.php" class="btn-yellow">Contact us</a>
</section>
<div class="container section-below">
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
          <p class="info-meta">Posted on: <span>01/01/2021</span> by: <span>Admin</span></p>
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
          <h4 class="info-meta">Terrace on the roof of your house</h4>
          <p>Posted on: <span>01/01/2021</span> by: <span>Admin</span></p>
          <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Beatae magnam tempore sint, aliquid eveniet perspiciatis quod non aut minus nesciunt!
          </p>
        </a>
      </div>
    </article>
  </section>
  <section class="testimonials">
    <h4>Testimonials</h4>
    <div class="testimonial">
      <blockquote>
        Lorem ipsum dolor sit, amet consectetur adipisicing elit. A quis, illo natus est eius suscipit voluptatem deserunt, impedit, odit sed mollitia. Vitae ut consequatur unde magni aspernatur. Libero, excepturi sed.
      </blockquote>
      <p>- John Doe</p>
    </div>
  </section>
</div>
<?php
includeTemplate('footer');
?>