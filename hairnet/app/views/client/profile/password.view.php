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
        <form action="" method="post" enctype="multipart/form-data">

            <!-- ALERT -->
            <?php if (!empty($errors)) : ?>
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    <?php foreach ($errors as $error) : ?>
                        <?= "<br>" . $error ?>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
            <?php if (!empty($success)) : ?>
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    <?php foreach ($success as $succes) : ?>
                        <?= "<br>" . $succes ?>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>

            <!-- IMAGE -->
            <div class="mx-auto" style="height: 220px; width: 220px">
                <?php if (!empty($picture)) { ?>
                    <img id="profileImage" class="rounded-circle" src="<?= ROOT . "/" . $picture ?>" alt="" srcset="" style="width: 100%; height: 100%; object-fit:cover; object-position: center;">
                <?php } else { ?>
                    <img id="profileImage" class="rounded-circle" src="<?= ROOT ?>/profiles/default.jpg" alt="" srcset="" style="width: 100%; height: 100%; object-fit:cover; object-position: center;">
                <?php } ?>
            </div>
            <div class="text-center my-3"><?= $firstname ?> <?= $lastname ?></div>
            <div class="container-md mx-auto">
                <div class="row fs-6 mt-4">
                    <label for="exampleInputPassword2" class="form-label">Current Password</label>
                    <div class="form-group input-group">
                        <input type="password" class="form-control" id="exampleInputPassword1" value="<?= get_var('current_pass') ?>" name="current_pass">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <a class="text-dark btn" id="icon-click1">
                                    <i class="fa-solid fa-eye-slash" id="icon1"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row fs-6 mt-4">
                    <label for="exampleInputPassword1" class="form-label">New Password</label>
                    <div class="form-group input-group">
                        <input type="password" class="form-control" id="exampleInputPassword2" name="new_pass">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <a class="text-dark btn" id="icon-click2">
                                    <i class="fa-solid fa-eye-slash" id="icon2"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row fs-6 mt-4">
                    <label for="exampleInputPassword3" class="form-label">Re-try Password</label>
                    <div class="form-group input-group">
                        <input type="password" class="form-control" id="exampleInputPassword3" name="retry_pass">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <a class="text-dark btn" id="icon-click3">
                                    <i class="fa-solid fa-eye-slash" id="icon3"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="text-end my-3">
                    <button type="submit" name="update_pass" class="btn btn-primary mx-1">confirm</button>
                    <a href="<?= ROOT ?>/client/profile" class="btn btn-danger">cancel</a>
                    <input type="hidden" name="user_id" value="<?= $userId ?>">
                </div>
            </div>

        </form>

    </div>

</div>

<script>
    $(document).ready(function() {
        $("#icon-click1").click(function() {
            var icon = $("#icon1");
            var input = $('#exampleInputPassword1');

            if (input.attr("type") === "password") {
                input.attr("type", "text");
                icon.removeClass("fa-solid fa-eye-slash").addClass("fa-solid fa-eye");
            } else {
                input.attr("type", "password");
                icon.removeClass("fa-solid fa-eye").addClass("fa-solid fa-eye-slash");
            }
        });
    });

    $(document).ready(function() {
        $("#icon-click2").click(function() {
            var icon = $("#icon2");
            var input = $('#exampleInputPassword2');

            if (input.attr("type") === "password") {
                input.attr("type", "text");
                icon.removeClass("fa-solid fa-eye-slash").addClass("fa-solid fa-eye");
            } else {
                input.attr("type", "password");
                icon.removeClass("fa-solid fa-eye").addClass("fa-solid fa-eye-slash");
            }
        });
    });

    $(document).ready(function() {
        $("#icon-click3").click(function() {
            var icon = $("#icon3");
            var input = $('#exampleInputPassword3');

            if (input.attr("type") === "password") {
                input.attr("type", "text");
                icon.removeClass("fa-solid fa-eye-slash").addClass("fa-solid fa-eye");
            } else {
                input.attr("type", "password");
                icon.removeClass("fa-solid fa-eye").addClass("fa-solid fa-eye-slash");
            }
        });
    });
</script>


<?php include PATH . "client/partials/footer.php" ?>