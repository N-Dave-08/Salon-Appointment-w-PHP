<?php include PATH . "admin/partials/header.php" ?>

<div class="container mt-5">

  <form action="" method="POST" class="w-50 mx-auto">
    <h2>Add User</h2>

    <div class="mb-2">
      <label for="">First Name</label>
      <input name="firstname" type="text" class="form-control">
    </div>

    <div class="mb-2">
      <label for="">Last Name</label>
      <input name="lastname" type="text" class="form-control">
    </div>

    <div class="mb-2">
      <label for="exampleInputEmail1" class="form-label">Phone Number:</label>
      <input type="tel" class="form-control" name="phone" pattern="[0-9]{11}" placeholder="09*********" required>
    </div>

    <div class="mb-2">
      <label for="">Email</label>
      <input name="email" type="email" class="form-control">
    </div>

    <div class="mb-2">
      <label for="">Password</label>
      <input name="password" type="text" class="form-control">
    </div>

    <button name="create" type="submit" class="btn btn-primary">Create</button>
    <a class="btn btn-danger" href="<?= ROOT ?>/admin/users">Back</a>

  </form>
</div>

<?php include PATH . "admin/partials/footer.php" ?>