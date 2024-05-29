<?php include PATH . "admin/partials/header.php" ?>

<div class="container">

  <form action="" method="POST" class="w-50 mx-auto" enctype="multipart/form-data">
    <h2>Edit Service</h2>
    <?php
    if ($services != null) {
    ?>
      <?php
      foreach ($services as $item) {
      ?>
        <div class="mb-2">
          <label for="">Current Image</label>
          <div class="input-group">

          <!-- HIDDEN -->
            <input type="hidden" name="remove_picture" value="1">
            <input type="hidden" name="image" value="<?= $item->image ?>">

            <?php if (!empty($item->image)) { ?>
              <div style="width: 100px; height: 100px;">
                <img id="serviceImage" src="<?= ROOT . "/" . $item->image ?>" alt="Service Image" style="width: 100%; height: 100%; object-fit:cover; object-position: center;">
              </div>
            <?php } else { ?>
              <div style="width: 100px; height: 100px;">
                <img id="serviceImage" src="<?= ROOT ?>/images/default.jpg" alt="Service Image" style="width: 100%; height: 100%; object-fit:cover; object-position: center;">
              </div>
            <?php } ?>
          </div>
        </div>
        <div class="mb-2">
          <div class="mx-auto mt-2">
            <label class="btn btn-primary fs-6">
              Change Picture
              <input class="form-control" type="file" name="picture" style="display: none;" onchange="displayFileName(this)">
            </label>
            <button type="button" class="btn btn-danger" name="remove_picture" onclick="removePicture()">Remove Picture</button>
            <div id="fileNameDisplay"></div>
            <div id="removeMessage" class="text-danger"></div>
          </div>

        </div>
        <div class="mb-2">
          <label for="">Name</label>
          <input name="name" type="text" class="form-control" value="<?= $item->name ?>">
        </div>

        <div class="mb-2">
          <label for="">Description</label>
          <textarea name="desc" class="form-control" cols="10" rows="5" required><?= $item->description ?></textarea>
        </div>

        <div class="mb-2">
          <label for="">Price</label>
          <div class="form-group input-group">
            <div class="input-group-prepend">
              <div class="input-group-text">
                <div class="text-dark">
                  ₱
                </div>
              </div>
            </div>
            <input type="number" class="form-control" name="price" value="<?= $item->price ?>">

          </div>
        </div>

        <button name="alter" type="submit" class="btn btn-primary">update</button>
        <a class="btn btn-danger" href="<?= ROOT ?>/admin/services">Back</a>
        <input type="hidden" name="id" value="<?= $item->id ?>">
      <?php } ?>
    <?php } ?>
  </form>
</div>

<script>
  function displayFileName(input) {
    const fileNameDisplay = document.getElementById('fileNameDisplay');
    if (input.files.length > 0) {
      fileNameDisplay.innerText = `Selected picture: ${input.files[0].name}`;
    } else {
      fileNameDisplay.innerText = '';
    }
  }

  function removePicture() {
    const profileImage = document.getElementById('serviceImage');
    const removeMessage = document.getElementById('removeMessage');
    const defaultImagePath = '<?= ROOT ?>/images/default.jpg';

    profileImage.src = defaultImagePath;

    removeMessage.innerText = `Picture has been removed.`;

    const pictureInput = document.querySelector('input[name="image"]');
    pictureInput.value = '';
  }
</script>

<?php include PATH . "admin/partials/footer.php" ?>