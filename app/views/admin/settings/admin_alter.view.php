<?php include PATH . "admin/partials/header.php" ?>

<div class="container bg-white rounded shadow w-50 my-5 h-50">
    <form action="" method="post">
        <div class="py-5">

            <div class="text-center">
                <div class="fw-medium">ID</div>
                <div><?= $admin_id ?></div>
            </div>

            <div class="text-center mt-3">
                <div class="fw-medium">USERNAME</div>
                <div><input type="text" class="form-control w-50 mx-auto" name="username" id="" value="<?= $username ?>" required></div>
            </div>

            <div class="text-center">
                <label for="exampleInputPassword1" class="form-label fw-medium">PASSWORD</label>
                <div class="form-group input-group w-50 mx-auto">
                    <input type="password" class="form-control" id="exampleInputPassword1" name="password" value="<?= $password ?>" required>
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <a href="#" class="text-dark" id="icon-click">
                                <i class="fa-solid fa-eye-slash" id="icon"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="my-auto d-flex justify-content-center">
            <button class="btn btn-success" type="submit" name="updateadmin">update</button>
            <a href="<?= ROOT ?>/admin/admin_table" class="btn btn-danger mx-1">cancel</a>
        </div>
        <input type="hidden" name="admin_id" value="<?=$admin_id?>">
    </form>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $("#icon-click").click(function() {
            var icon = $("#icon");
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
</script>

<?php include PATH . "admin/partials/footer.php" ?>