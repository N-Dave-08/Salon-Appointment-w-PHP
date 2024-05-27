<?php include PATH . "admin/partials/header.php" ?>

<style>
    thead {
        position: sticky;
        top: 0px;
        z-index: 1;
    }
</style>

<div class="container mt-2">

    <div class="d-flex justify-content-between align-items-center">
        <h2>List Of Bookings</h2>
    </div>
    <div class="overflow-auto" style="height: 75vh; scrollbar-width:none;">
        <table class="table">
            <thead class="table-light">
                <tr>
                    <th>Service</th>
                    <th>Price</th>
                    <th>Scheduled Date</th>
                    <th>Scheduled Time</th>
                    <th>Client</th>
                    <th>Phone</th>
                    <th>Payment Method</th>
                    <th>Transaction</th>
                    <th>Status</th>
                    <th>Update</th>
                </tr>
            </thead>

            <?php if ($bookings != null) { ?>
                <?php foreach ($bookings as $item) { ?>
                    <tr>
                        <td><?= $item->book_name ?></td>
                        <td>₱ <?= $item->book_price ?></td>
                        <td><?= $item->book_date ?></td>
                        <td><?= date("h:i A", strtotime($item->book_s_time))?> - <?= date("h:i A", strtotime($item->book_e_time))?></td>
                        <td><?= $item->firstname ?></td>
                        <td><?= $item->number ?></td>
                        <td class="text-center"><?= $item->book_payment ?></td>
                        <?php if (!empty($item->book_transaction)) { ?>
                            <td class="text-center"><?= $item->book_transaction ?></td>
                        <?php } else { ?>
                            <td class="text-center">Not Paid</td>
                        <?php } ?>
                        <?php if (!empty($item->book_status)) { ?>
                            <td><?= $item->book_status ?></td>
                        <?php } else { ?>
                            <td>Pending</td>
                        <?php } ?>
                        <!-- edit -->
                        <td class="d-flex">
                            <form action="<?= ROOT ?>/admin/modify" method="post" class="me-2">
                                <button type="submit" class="btn btn-success" name="modify">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="1.4em" height="1.4em" viewBox="0 0 24 24">
                                        <path fill="white" d="M4 20q-.825 0-1.412-.587T2 18V6q0-.825.588-1.412T4 4h5v2H4v12h16V6h-5V4h5q.825 0 1.413.588T22 6v12q0 .825-.587 1.413T20 20zm8-4.6l-5-5L8.4 9l2.6 2.6V4h2v7.6L15.6 9l1.4 1.4z" />
                                    </svg>
                                </button>
                                <input type="hidden" name="bookings_id" value="<?= $item->id ?>">
                                <input type="hidden" name="name" value="<?= $item->book_name ?>">
                                <input type="hidden" name="price" value="<?= $item->book_price ?>">
                                <input type="hidden" name="date" value="<?= $item->book_date ?>">
                                <input type="hidden" name="time" value="<?= $item->book_time ?>">
                                <input type="hidden" name="payment" value="<?= $item->book_payment ?>">
                                <input type="hidden" name="firstname" value="<?= $item->firstname ?>">
                                <input type="hidden" name="email" value="<?= $item->email ?>">
                                <input type="hidden" name="status" value="<?= $item->transaction ?>">
                                <input type="hidden" name="status" value="<?= $item->book_status ?>">
                            </form>
                        </td>

                    </tr>
                <?php } ?>
            <?php } else { ?>
                <tr>
                    <td colspan="3">
                        <h2>No bookings yet.</h2>
                    </td>
                </tr>
            <?php } ?>
        </table>
    </div>


</div>

<?php include PATH . "admin/partials/footer.php" ?>