<fieldset>
  <legend>General Information</legend>

  <label for="title">Title:</label>
  <input type="text" id="title" name="property[title]" value="<?php echo purify($property->title) ?? ''; ?>">

  <label for="price">Price:</label>
  <input type="number" id="price" name="property[price]" value="<?php echo purify($property->price) ?? ''; ?>">

  <label for="image-url">Image:</label>
  <input type="file" accept="image/jpeg, image/png" id="image-url" name="property[image_url]">

  <?php if($property->image_url) { ?>
    <img src="/images/<?php echo $property->image_url;?>" alt="Property Image" class="image-small">
  <?php } ?>

  <label for="details">Details:</label>
  <textarea name="property[details]" id="details"><?php echo purify($property->details); ?></textarea>
</fieldset>

<fieldset>
  <legend>Property Details</legend>

  <label for="rooms">Rooms:</label>
  <input type="number" id="rooms" name="property[rooms]" min="1" max="9" value="<?php echo purify($property->rooms) ?? ''; ?>">

  <label for="wc">WC:</label>
  <input type="number" id="wc" name="property[wc]" min="1" max="9" value="<?php echo purify($property->wc) ?? ''; ?>">

  <label for="parkings">Parkings:</label>
  <input type="number" id="parkings" name="property[parkings]" min="1" max="9" value="<?php echo purify($property->parkings) ?? ''; ?>">

</fieldset>
<fieldset>
  <legend>Seller</legend>
  <select name="seller" id="seller">
    <option value=""> -- Select -- </option>
    <option value="1">Dave</option>
    <option value="2">Ana</option>
  </select>
</fieldset>