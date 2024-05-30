<?php
require 'includes/app.php';
includeTemplate('header');
?>
<main class="container">
  <h1>Contact</h1>
  <picture>
    <source srcset="/build/img/destacada2.webp" type="image/webp" />
    <source srcset="/build/img/destacada2.jpg" type="image/jpeg" />
    <img src="/build/img/destacada2.jpg" alt="apartment" loading="lazy" />
  </picture>
  <h2>Fill out the form below</h2>
  <form class="form">
    <fieldset>
      <legend>Personal information</legend>
      <label for="name">Full Name</label>
      <input type="text" id="name" />

      <label for="email">E-mail</label>
      <input type="email" id="email" />

      <label for="phone">Phone</label>
      <input type="tel" id="phone" />

      <label for="message">Message</label>
      <textarea name="message" id="message"></textarea>
    </fieldset>

    <fieldset>
      <legend>Property information</legend>
      <label for="options">Sell or purchase</label>
      <select name="options" id="options">
        <option value="" disabled selected>Choose</option>
        <option value="sell">Sell</option>
        <option value="purchase">Purchase</option>
      </select>

      <label for="budget">Price or budget</label>
      <input type="number" id="budget" />
    </fieldset>
    <fieldset>
      <legend>Contact options</legend>
      <p>How would you like to be contacted?</p>
      <div class="contact-options">
        <label for="contact-email">E-mail </label>
        <input type="radio" name="contact" id="contact-email" />
        <label for="contact-phone">Phone </label>
        <input type="radio" name="contact" id="contact-phone" />
      </div>
      <p>If you chose phone, specify time and date</p>
      <label for="date"> Date </label>
      <input type="date" name="date" id="date" />

      <label for="time"> Time </label>
      <input type="time" name="time" id="time" />
    </fieldset>
    <button class="btn-green" type="submit">Submit</button>
  </form>
</main>
<?php
includeTemplate('footer');
?>