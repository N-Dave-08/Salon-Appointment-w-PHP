<?php include PATH . "admin/partials/header.php" ?>

<div class="container bg-white rounded shadow w-50 my-5 h-50">

    <div class="py-5">
        <form action="" method="post">
            <div class="text-center mt-3">
                <div class="fw-medium">USERNAME</div>
                <div><input type="text" class="form-control w-50 mx-auto" name="username" id="" required></div>
            </div>

            <div class="text-center">
                <label for="exampleInputPassword1" class="form-label fw-medium">PASSWORD</label>
                <div class="form-group input-group w-50 mx-auto">
                    <input type="password" class="form-control" id="exampleInputPassword1" name="password" required>
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
        <button class="btn btn-primary" type="submit" name="add_admin">ADD</button>
        <a href="<?= ROOT ?>/admin/admin_table" class="btn btn-info ms-2">cancel</a>
    </div>

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