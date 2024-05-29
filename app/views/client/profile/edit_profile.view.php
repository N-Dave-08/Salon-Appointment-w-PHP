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
            <input type="hidden" name="remove_picture" value="1">
            <input type="hidden" name="image" value="<?= $picture ?>">

            <!-- IMAGE -->
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
                <div class="fs-6 mt-3">ID: <?= $userId ?></div>
            </div>
            <div class="container-md mx-auto">
                <div class="row fs-6 mt-4">
                    <div class="col text-end">
                        <div>Firstname:</div>
                    </div>
                    <div class="col">
                        <div>
                            <div><input type="text" name="firstname" class="form-control" value="<?= $firstname ?>"></div>
                        </div>
                    </div>
                </div>
                <div class="row fs-6 mt-4">
                    <div class="col text-end">
                        <div>Lastname:</div>
                    </div>
                    <div class="col">
                        <div>
                            <div><input type="text" name="lastname" class="form-control" value="<?= $lastname ?>"></div>
                        </div>
                    </div>
                </div>
                <div class="row fs-6 mt-4">
                    <div class="col text-end">
                        <div>Phone:</div>
                    </div>
                    <div class="col">
                        <div>
                            <div><input type="text" name="number" class="form-control" value="<?= $number ?>"></div>
                        </div>
                    </div>
                </div>
                <div class="row fs-6 mt-4">
                    <div class="col text-end">
                        <div>Gmail:</div>
                    </div>
                    <div class="col">
                        <div><input type="text" name="email" class="form-control" value="<?= $email ?>"></div>
                    </div>
                </div>
                <div class="text-end mt-4">
                    <button type="submit" name="update_profile" class="btn btn-primary mx-1">update</button>
                    <a href="<?= ROOT ?>/client/profile" class="btn btn-danger">back</a>
                    <input type="hidden" name="user_id" value="<?= $userId ?>">
                </div>
            </div>

        </form>

    </div>

</div>

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

        const pictureInput = document.querySelector('input[name="image"]');
        pictureInput.value = '';
    }
</script>

<?php include PATH . "client/partials/footer.php" ?>