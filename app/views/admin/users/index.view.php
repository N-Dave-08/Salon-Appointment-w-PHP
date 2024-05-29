<?php include PATH . "admin/partials/header.php" ?>

<style>
  thead {
    position: sticky;
    top: 0px;
    z-index: 1;
  }

  thead tr th {
    font-weight: 600;
  }
</style>

<div class="container mt-2">

  <div class="d-flex justify-content-between align-items-center">
    <h2>List Of Users</h2>
    <a href="<?= ROOT ?>/admin/create" class="btn btn-primary">Add New</a>
  </div>
  <div class="overflow-auto" style="height: 75vh; scrollbar-width:none;">
    <table class="table">
      <thead class="table-light">
        <tr>
          <th class="text-center">ID</th>
          <th>First Name</th>
          <th>Last Name</th>
          <th>Phone</th>
          <th>Email</th>
          <th>Password</th>
          <th>Action</th>
        </tr>
      </thead>

      <?php if ($users != null) { ?>
        <?php foreach ($users as $item) { ?>
          <tr>
            <td class="text-center"><?= $item->id ?></td>
            <td><?= $item->firstname ?></td>
            <td><?= $item->lastname ?></td>
            <td><?= $item->number ?></td>
            <td><?= $item->email ?></td>
            <td>******</td>
            <!-- edit -->
            <td class="d-flex">
              <form action="<?= ROOT ?>/admin/edit" method="post" class="me-2">
                <button type="submit" class="btn btn-primary" name="btnedit">edit</button>
                <input type="hidden" name="editid" value="<?= $item->id ?>">

              </form>

              <form action="<?= ROOT ?>/admin/remove" method="post" class="me-2">
                <button type="submit" class="btn btn-danger" name="delete">remove</button>
                <input type="hidden" name="deleteid" value="<?= $item->id ?>">
              </form>
            </td>

          </tr>
        <?php } ?>
      <?php } else { ?>
        <tr>
          <td colspan="3">
            <h2>No record found.</h2>
          </td>
        </tr>
      <?php } ?>
    </table>
  </div>


</div>


<?php include PATH . "admin/partials/footer.php" ?>