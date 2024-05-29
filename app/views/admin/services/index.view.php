<?php include PATH . "admin/partials/header.php" ?>

<style>
  table {
    border-radius: 20px;
    border-collapse: separate;
    border-spacing: 0 15px;
    width: 100%;
  }

  th,
  td {
    padding: 10px;
  }

  thead {
    position: sticky;
    top: 0;
    background-color: #f7f7f7;
    z-index: 1;
  }

  thead tr th {
    font-weight: 700;
  }

  tbody {
    background-color: white;
  }

  tbody tr {
    margin-bottom: 10px;
    border-radius: 20px;
  }

  .image-cell {
    border-top-left-radius: 20px;
    border-bottom-left-radius: 20px;
  }

  .action-cell {
    border-top-right-radius: 20px;
    border-bottom-right-radius: 20px;
  }

  thead tr:first-child {
    margin-top: 0;
    /* Set margin-top to 0 for the first tr in the thead */
  }
</style>

<div class="container mt-2">
  <div class="d-flex justify-content-between align-items-center">
    <h2>List Of Services</h2>
    <a href="<?= ROOT ?>/admin/add" class="btn btn-primary">Add New</a>
  </div>
  <div class="overflow-auto" style="height: 80vh; scrollbar-width:none;">
    <table>
      <thead>
        <tr>
          <th class="image-cell text-center">Image</th>
          <th class="text-center">Name</th>
          <th>Description</th>
          <th>Price</th>
          <th class="action-cell">Action</th>
        </tr>
      </thead>
      <?php if ($services != null) { ?>
        <?php foreach ($services as $item) { ?>
          <tbody>
            <tr>
              <td class="image-cell"><?php if (!empty($item->image)) { ?>
                  <div class="d-flex justify-content-center">
                    <div style="width: 110px; height: 100px;">
                      <img class="rounded" src="<?= ROOT . "/" . $item->image ?>" alt="Service Image" style="width: 100%; height: 100%; object-fit:cover; object-position: center;">
                    </div>
                  </div>
                <?php } else { ?>
                  <div style="width: 100px; height: 100px;">
                    <img class="rounded" id="serviceImage" src="<?= ROOT ?>/images/default.jpg" alt="Service Image" style="width: 100%; height: 100%; object-fit:cover; object-position: center;">
                  </div>
                <?php } ?>
              </td>
              <td class="text-center"><?= $item->name ?></td>
              <td><?= $item->description ?></td>
              <td>₱<?= $item->price ?></td>
              <!-- edit -->
              <td class="action-cell">
                <form action="<?= ROOT ?>/admin/alter" method="post" class="me-2 my-2">
                  <button type="submit" class="btn btn-primary" name="btnalter"><svg xmlns="http://www.w3.org/2000/svg" width="1.2em" height="1.2em" viewBox="0 0 16 16">
                      <path fill="currentColor" fill-rule="evenodd" d="M6.169 6.331a3 3 0 0 0-.833 1.6l-.338 1.912a1 1 0 0 0 1.159 1.159l1.912-.338a3 3 0 0 0 1.6-.833l3.07-3.07l2-2A.894.894 0 0 0 15 4.13A3.13 3.13 0 0 0 11.87 1a.894.894 0 0 0-.632.262l-2 2l-3.07 3.07Zm3.936-1.814L7.229 7.392a1.5 1.5 0 0 0-.416.8L6.6 9.4l1.208-.213l.057-.01a1.5 1.5 0 0 0 .743-.406l2.875-2.876a1.63 1.63 0 0 0-1.378-1.378m2.558.199a3.143 3.143 0 0 0-1.379-1.38l.82-.82a1.63 1.63 0 0 1 1.38 1.38l-.82.82ZM8 2.25a.75.75 0 0 0-.75-.75H4.5a3 3 0 0 0-3 3v7a3 3 0 0 0 3 3h7a3 3 0 0 0 3-3V8.75a.75.75 0 0 0-1.5 0v2.75a1.5 1.5 0 0 1-1.5 1.5h-7A1.5 1.5 0 0 1 3 11.5v-7A1.5 1.5 0 0 1 4.5 3h2.75A.75.75 0 0 0 8 2.25" clip-rule="evenodd" />
                    </svg></button>
                  <input type="hidden" name="editid" value="<?= $item->id ?>">
                </form>

                <form action="<?= ROOT ?>/admin/erase" method="post" class="me-2 my-2">
                  <button type="submit" class="btn btn-danger" name="erase"><svg xmlns="http://www.w3.org/2000/svg" width="1.2em" height="1.2em" viewBox="0 0 16 16">
                      <path fill="currentColor" d="M11 1.75V3h2.25a.75.75 0 0 1 0 1.5H2.75a.75.75 0 0 1 0-1.5H5V1.75C5 .784 5.784 0 6.75 0h2.5C10.216 0 11 .784 11 1.75M4.496 6.675l.66 6.6a.25.25 0 0 0 .249.225h5.19a.25.25 0 0 0 .249-.225l.66-6.6a.75.75 0 0 1 1.492.149l-.66 6.6A1.75 1.75 0 0 1 10.595 15h-5.19a1.75 1.75 0 0 1-1.741-1.575l-.66-6.6a.75.75 0 1 1 1.492-.15M6.5 1.75V3h3V1.75a.25.25 0 0 0-.25-.25h-2.5a.25.25 0 0 0-.25.25" />
                    </svg></button>
                  <input type="hidden" name="eraseid" value="<?= $item->id ?>">
                </form>
              </td>
            </tr>
          </tbody>
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