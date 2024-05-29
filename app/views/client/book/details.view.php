<?php include PATH . "client/partials/header.php" ?>
<style>
    
</style>
<div class="container bg-white p-3 rounded mt-5 w-50">

    <h2>Booking Details</h2>
    <?php if (!empty($bookings) && is_array($bookings)) { ?>
        <?php foreach ($bookings as $item) { ?>
            <div class="mb-2 text-center">
                <label class="fw-semibold" for="">booking ID: </label>
                <div><?= $item->id ?></div>
            </div>

            <div class="mb-2 d-flex">
                <div><?= $item->firstname ?> <?= $item->lastname ?></div>
            </div>

            <div class="d-flex justify-content-between">
                <div class="mb-2">
                    <div><?= $item->book_name ?></div>
                </div>

                <div class="mb-2">
                    <div>₱ <?= $item->book_price ?></div>
                </div>
            </div>

            <div class="mb-2 d-flex justify-content-between">
                <label class="fw-medium" for="">Scheduled Date:</label>
                <div><?= $item->book_date ?></div>
            </div>

            <div class="mb-2 d-flex justify-content-between">
                <label class="fw-medium" for="">Scheduled Time:</label>
                <div><?= date("h:i A", strtotime($item->book_s_time))?> - <?= date("h:i A", strtotime($item->book_e_time))?></div>
            </div>

            <div class="mb-2 d-flex justify-content-between">
                <label class="fw-medium" for="">Payment Method:</label>
                <div><?= $item->book_payment ?></div>
            </div>

            <hr>

            <div class="mb-2 d-flex justify-content-between">
                <label class="fw-medium" for="">Total Amount:</label>
                <div>₱ <?= $item->book_price ?></div>
            </div>

            <a class="btn btn-secondary" href="<?= ROOT ?>/client/mybookings">OK</a>
            <input type="hidden" name="bookings_id" value="<?= $item->id ?>">
        <?php } ?>
    <?php } ?>
</div>

<?php include PATH . "client/partials/footer.php" ?>