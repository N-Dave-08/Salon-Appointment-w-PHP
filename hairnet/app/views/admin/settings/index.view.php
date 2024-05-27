<?php include PATH . "admin/partials/header.php" ?>

<div class="container rounded w-50 mt-1" style="background-color: #e1e1e1;">

    <div class="py-5">

        <div class="mx-auto" style="height: 220px; width: 220px">
            <?php if (!empty($picture)) { ?>
                <img class="rounded-circle" src="<?= ROOT . "/" . $picture ?>" alt="" srcset="" style="width: 100%; height: 100%; object-fit:cover; object-position: center;">
            <?php } else { ?>
                <img class="rounded-circle" src="<?= ROOT ?>/profiles/default.jpg" alt="" srcset="" style="width: 100%; height: 100%; object-fit:cover; object-position: center;">
            <?php } ?>
        </div>

        <div class="text-center mt-3">
            <div class="fw-medium">Admin ID</div>
            <div><?= $admin_id ?></div>
        </div>

        <div class="text-center mt-3">
            <div class="fw-medium">USERNAME</div>
            <div><?= $username ?></div>
        </div>

        <div class="text-center mt-3">
            <div class="fw-medium">PASSWORD</div>
            <div><?= $password ?></div>
        </div>

    </div>
    <form action="<?= ROOT ?>/admin/admin_edit" enctype="multipart/form-data" method="post" class="py-3 d-flex justify-content-center">
        <input type="hidden" name="username" value="<?= $username ?>">
        <input type="hidden" name="picture" value="<?= $picture ?>">
        <input type="hidden" name="password" value="<?= $password ?>">
        <input type="hidden" name="admin_id" value="<?= $adminId ?>">
        <button class="btn btn-primary" type="submit" name="edit">edit</button>
        <a href="<?= ROOT ?>/admin/admin_table" class="btn btn-info ms-2">admins</a>
    </form>
</div>


<?php include PATH . "admin/partials/footer.php" ?>