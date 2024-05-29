<?php include PATH . "admin/partials/header.php" ?>

<style>
    thead {
        position: sticky;
        top: 0px;
        z-index: 1;
    }
</style>

<div class="container mt-2">

    <div class="d-flex justify-content-between align-items-center">
        <h2>ADMINS</h2>
        <a href="<?= ROOT ?>/admin/admin_add" class="btn btn-primary">Add New</a>
    </div>
    <div class="overflow-auto" style="height: 75vh; scrollbar-width:none;">
        <table class="table">
            <thead class="table-light">
                <tr>
                    <th class="text-center">ID</th>
                    <th>USERNMAE</th>
                    <th>PASSWORD</th>
                    <th>Action</th>
                </tr>
            </thead>

            <?php if ($admins != null) { ?>
                <?php foreach ($admins as $item) { ?>
                    <tr>
                        <td class="text-center"><?= $item->id ?></td>
                        <td><?= $item->admin_name ?></td>
                        <td>******</td>
                        <!-- edit -->
                        <td class="d-flex">
                            <form action="<?= ROOT ?>/admin/admin_alter" method="post" class="me-2">
                                <button type="submit" class="btn btn-primary" name="btnedit">edit</button>
                                <input type="hidden" name="editid" value="<?= $item->id ?>">
                            </form>

                            <form action="<?= ROOT ?>/admin/admin_remove" method="post" class="me-2">
                                <button type="submit" class="btn btn-danger" name="remove">remove</button>
                                <input type="hidden" name="removeid" value="<?= $item->id ?>">
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