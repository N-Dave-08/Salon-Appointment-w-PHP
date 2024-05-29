<?php include PATH . "admin/partials/header.php" ?>

<div class="container bg-white p-3 rounded mt-5">

    <form action="" method="POST" class="w-50 mx-auto">
        <h2>Modify Status</h2>
        <?php if ($bookings != null) { ?>
            <?php foreach ($bookings as $item) { ?>

                <div class="mb-2">
                    <label class="fw-semibold" for="">Service:</label>
                    <div><?= $item->book_name ?></div>
                </div>

                <div class="mb-2">
                    <label class="fw-semibold" for="">Client:</label>
                    <div><?= $item->firstname ?></div>
                </div>

                <div class="mb-2">
                    <label class="fw-semibold" for="">Price:</label>
                    <div>₱ <?= $item->book_price ?></div>
                </div>

                <div class="mb-2">
                    <label class="fw-semibold" for="">Scheduled Date:</label>
                    <div><?= $item->book_date ?></div>
                </div>

                <div class="mb-2">
                    <label class="fw-semibold" for="">Payment Method:</label>
                    <div><?= $item->book_payment ?></div>
                </div>

                <div class="mb-2">
                    <label class="fw-semibold" for="">Transaction:</label>
                    <div class="d-flex">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="transaction" id="not_paid" value="Not Paid" <?= ($item->book_transaction === 'Not Paid') ? 'checked' : '' ?>>
                            <label class="form-check-label" for="Not Paid">
                                Not Paid
                            </label>
                        </div>
                        <div class="form-check mx-3">
                            <input class="form-check-input" type="radio" name="transaction" id="paid" value="Paid" <?= ($item->book_transaction === 'Paid') ? 'checked' : '' ?>>
                            <label class="form-check-label" for="Paid">
                                Paid
                            </label>
                        </div>
                    </div>
                </div>

                <div class="mb-2">
                    <label class="fw-semibold" for="">Status:</label>
                    <div class="d-flex">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="status" id="done" value="Pending" <?= ($item->book_status === 'Pending') ? 'checked' : '' ?>>
                            <label class="form-check-label" for="Pending">
                                Pending
                            </label>
                        </div>
                        <div class="form-check mx-3">
                            <input class="form-check-input" type="radio" name="status" id="done" value="Done" <?= ($item->book_status === 'Done') ? 'checked' : '' ?>>
                            <label class="form-check-label" for="Done">
                                Done
                            </label>
                        </div>
                    </div>
                </div>

                <button name="btnmodify" type="submit" class="btn btn-primary">update</button>
                <a class="btn btn-danger" href="<?= ROOT ?>/admin/bookings">Back</a>
                <input type="hidden" name="bookings_id" value="<?= $item->id ?>">
            <?php } ?>
        <?php } ?>
    </form>
</div>

<?php include PATH . "admin/partials/footer.php" ?>