<?php include PATH . "admin/partials/header.php" ?>

<div class="container mt-5">

  <form action="" method="POST" class="w-50 mx-auto">
    <h2>Edit Information</h2>
    <?php
    if ($users != null) { ?>
    
    <?php
        foreach ($users as $item) {
    ?>
    
    <div class="mb-2">
      <label for="">First Name</label>
      <input name="firstname" type="text" class="form-control" value="<?=$item->firstname ?>">
    </div>

    <div class="mb-2">
      <label for="">Last Name</label>
      <input name="lastname" type="text" class="form-control" value="<?=$item->lastname ?>">
    </div>

    <div class="mb-2">
      <label for="">Phone</label>
      <input name="phone" type="tel" class="form-control" value="<?=$item->number ?>">
    </div>

    <div class="mb-2">
      <label for="">Email</label>
      <input name="email" type="email" class="form-control" value="<?=$item->email ?>">
    </div>

    <div class="mb-2">
      <label for="">Password</label>
      <input name="password" type="text" class="form-control" value="<?=$item->password ?>">
    </div>

    <button name="update" type="submit" class="btn btn-primary">update</button>
    <a class="btn btn-danger" href="<?= ROOT ?>/admin/users">Back</a>
    <input type="hidden" name="id" value="<?=$item->id ?>">
        <?php } ?>
    <?php } ?>
  </form>
</div>

<?php include PATH . "admin/partials/footer.php" ?>