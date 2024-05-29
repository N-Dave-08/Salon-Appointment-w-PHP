<?php include PATH . "admin/partials/header.php" ?>

<div class="container rounded w-50 mt-1" style="background-color: #e1e1e1;">
    <form action="" method="post" enctype="multipart/form-data">
        <input type="hidden" name="remove_picture" value="1">
        <input type="hidden" name="picture" value="<?= $picture ?>">

        <div class="py-5">

            <div class="mx-auto" style="height: 220px; width: 220px">
                <?php if (!empty($picture)) { ?>
                    <img id="profileImage" class="rounded-circle" src="<?= ROOT . "/" . $picture ?>" alt="" srcset="" style="width: 100%; height: 100%; object-fit:cover; object-position: center;">
                <?php } else { ?>
                    <img id="profileImage" class="rounded-circle" src="<?= ROOT ?>/profiles/default.jpg" alt="" srcset="" style="width: 100%; height: 100%; object-fit:cover; object-position: center;">
                <?php } ?>
            </div>

            <div class="text-center">
                <div class="mx-auto mt-2">
                    <label class="btn btn-primary fs-6">
                        Change Picture
                        <input class="form-control" type="file" name="picture" style="display: none;" onchange="displayFileName(this)">
                    </label>
                    <button type="button" class="btn btn-danger" name="remove_picture" onclick="removePicture()">Remove Picture</button>
                    <div id="fileNameDisplay"></div>
                    <div id="removeMessage" class="text-danger"></div>
                </div>
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
        <div class="my-auto d-flex pb-3 justify-content-center">
            <button class="btn btn-success" type="submit" name="update">update</button>
            <a href="<?= ROOT ?>/admin/settings" class="btn btn-danger mx-1">cancel</a>
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
<script>
    function displayFileName(input) {
        const fileNameDisplay = document.getElementById('fileNameDisplay');
        if (input.files.length > 0) {
            fileNameDisplay.innerText = `Selected picture: ${input.files[0].name}`;
        } else {
            fileNameDisplay.innerText = '';
        }
    }

    function removePicture() {
        const profileImage = document.getElementById('profileImage');
        const removeMessage = document.getElementById('removeMessage');
        const defaultImagePath = '<?= ROOT ?>/profiles/default.jpg';

        profileImage.src = defaultImagePath;

        removeMessage.innerText = `Picture has been removed.`;

        const pictureInput = document.querySelector('input[name="picture"]');
        pictureInput.value = '';
    }
</script>

<?php include PATH . "admin/partials/footer.php" ?>