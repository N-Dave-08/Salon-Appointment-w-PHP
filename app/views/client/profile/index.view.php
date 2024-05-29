<?php include PATH . "client/partials/header.php" ?>

<style>
    .base {
        width: 100%;
        max-width: 100%;
    }

    @media (min-width: 540px) {
        .base {
            width: 500px;
        }
    }
</style>

<div class="base my-4 mx-auto rounded" style="background-color: #e6e6e6;">

    <div class="p-4 mx-auto">


        <!-- IMAGE -->
        <div class="mx-auto" style="height: 220px; width: 220px">
            <?php if (!empty($picture)) { ?>
                <img class="rounded-circle" src="<?= ROOT . "/" . $picture ?>" alt="" srcset="" style="width: 100%; height: 100%; object-fit:cover; object-position: center;">
            <?php } else { ?>
                <img class="rounded-circle" src="<?= ROOT ?>/profiles/default.jpg" alt="" srcset="" style="width: 100%; height: 100%; object-fit:cover; object-position: center;">
            <?php } ?>
        </div>

        <div class="text-center">
            <div class="mt-3 fw-medium fs-5"><?= $firstname ?> <?= $lastname ?></div>
            <div class="fs-6">ID: <?= $userId ?></div>
        </div>
        <div class="container-md mx-auto">
            <div class="row fs-6 mt-4">
                <div class="col text-end">
                    <div>Phone:</div>
                </div>
                <div class="col">
                    <div><?= $number ?></div>
                </div>
            </div>
            <div class="row fs-6 mt-4">
                <div class="col text-end">
                    <div>Gmail:</div>
                </div>
                <div class="col">
                    <div><?= $email ?></div>
                </div>
            </div>

            <div class="d-flex justify-content-between mt-4">
                <form action="<?= ROOT ?>/client/password" method="post">
                    <div class="col">
                        <div><button type="submit" name="change_pass" class="btn btn-success">change password</button></div>
                        <input type="hidden" name="image" value="<?= $picture ?>">
                        <input type="hidden" name="firstname" value="<?= $firstname ?>">
                        <input type="hidden" name="lastname" value="<?= $lastname ?>">
                        <input type="hidden" name="password" value="<?= $password ?>">
                    </div>
                </form>

                <form action="<?= ROOT ?>/client/edit_profile" method="post" enctype="multipart/form-data">
                    <!-- HIDDEN -->
                    <input type="hidden" name="user_id" value="<?= $userId ?>">
                    <input type="hidden" name="image" value="<?= $picture ?>">
                    <input type="hidden" name="firstname" value="<?= $firstname ?>">
                    <input type="hidden" name="lastname" value="<?= $lastname ?>">
                    <input type="hidden" name="number" value="<?= $number ?>">
                    <input type="hidden" name="email" value="<?= $email ?>">
                    <div>
                        <button type="submit" name="edit_profile" class="btn btn-primary">edit</button>
                        <a href="<?= ROOT ?>/client" class="btn btn-danger">back</a>
                    </div>
                </form>
            </div>

        </div>
    </div>

</div>


<?php include PATH . "client/partials/footer.php" ?>