<?php include PATH . "admin/partials/header.php" ?>

<div class="container mt-5">

  <form action="" method="POST" class="w-50 mx-auto" enctype="multipart/form-data">
    <h2>Add a Service</h2>

    <div class="mb-2">
      <label for="">Name</label>
      <input name="name" type="text" class="form-control" required>
    </div>

    <div class="mb-2">
      <label for="">Image</label>
      <input name="image" type="file" class="form-control">
    </div>

    <div class="mb-2">
      <label for="">Description</label>
      <textarea name="desc" class="form-control" cols="10" rows="5" required></textarea>
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
        <input type="number" class="form-control" name="price" required>

      </div>
    </div>
    
    <button name="add" type="submit" class="btn btn-primary">Create</button>
    <a class="btn btn-danger" href="<?= ROOT ?>/admin/services">Back</a>

  </form>
</div>

<?php include PATH . "admin/partials/footer.php" ?>