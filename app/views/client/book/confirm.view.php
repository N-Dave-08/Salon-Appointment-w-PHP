<?php include PATH . "client/partials/header.php" ?>
<script type="text/javascript" src="https://cdn.emailjs.com/dist/email.min.js"></script>

<form action="" method="post">
    <!-- HIDDEN -->
    <input type="hidden" id="image" name="image" value="<?= $booking_data['image'] ?>">
    <input type="hidden" id="service_name" name="name" value="<?= $booking_data['name'] ?>">
    <input type="hidden" id="price" name="price" value="<?= $booking_data['price'] ?>">
    <input type="hidden" id="date" name="date" value="<?= $booking_data['date'] ?>">
    <input type="hidden" id="time" name="time" value="<?= $booking_data['time'] ?>">
    <input type="hidden" id="payment" name="payment" value="<?= $booking_data['payment'] ?>">
    <input type="hidden" id="email" name="email" value="<?= $email ?>">
    <input type="hidden" id="client_name" value="<?= $firstname ?> <?= $lastname ?>">

    <div class="container bg-white p-3 rounded mt-5 w-50">

        <?php if (!empty($errors)) : ?>
            <div class="alert alert-danger  alert-dismissible">
                <div class="d-flex align-items-center justify-content-between">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    <div>
                        <?= $errors ?>
                    </div>
                    <div>
                        <a class="btn btn-primary" href="<?= ROOT ?>/client/book">book</a>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <?php if (!empty($success)) : ?>
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                <?= $success ?>
            </div>
        <?php endif; ?>

        <h2>Confirm Details</h2>
        <div class="mb-2 d-flex">
            <div><?= $firstname ?> <?= $lastname ?></div>
        </div>

        <div class="d-flex justify-content-between">
            <div class="mb-2">
                <div><?= $booking_data['name'] ?></div>
            </div>

            <div class="mb-2">
                <div>₱ <?= $booking_data['price'] ?></div>
            </div>
        </div>

        <div class="mb-2 d-flex justify-content-between">
            <label class="fw-medium" for="">Scheduled Date:</label>
            <div><?= $booking_data['date'] ?></div>
        </div>

        <div class="mb-2 d-flex justify-content-between">
            <label class="fw-medium" for="">Scheduled Time:</label>
            <div><?= $start ?> - <?= $end ?></div>
        </div>

        <div class="mb-2 d-flex justify-content-between">
            <label class="fw-medium" for="">Payment Method:</label>
            <div><?= $booking_data['payment'] ?></div>
        </div>

        <hr>

        <div class="mb-2 d-flex justify-content-between">
            <label class="fw-medium" for="">Total Amount:</label>
            <div>₱ <?= $booking_data['price'] ?></div>
        </div>

        <?php if (empty($errors || $success)) : ?>
            <button class="btn btn-primary" type="submit" name="confirm">confirm</button>
        <?php endif; ?>
        <?php if (!empty($success)) : ?>
            <button class="btn btn-secondary" type="button" onclick="sendEmail()">Send Confirmation Email</button>
        <?php endif; ?>

        <a class="btn btn-danger" href="<?= ROOT ?>/client/book">cancel</a>

    </div>
</form>



<script type="text/javascript">
    function sendEmail() {
        (function() {
            emailjs.init("7SW6pVQ3feC85d8uY");
        })();

        var params = {
            email: document.getElementById('email').value,
            client_name: document.getElementById('client_name').value,
            date: document.getElementById('date').value,
            time: document.getElementById('time').value,
            service_name: document.getElementById('service_name').value,
            price: document.getElementById('price').value,
            payment: document.getElementById('payment').value,
        }

        emailjs.send("service_rhthfvz", "template_hlvv6sc", params).then(function(res) {
            window.location.href = "<?= ROOT ?>/client/success";
        })
    }
</script>

<?php include PATH . "client/partials/footer.php" ?>