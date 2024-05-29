<?php include PATH . "client/partials/header.php" ?>

<style>
    table {
        border-radius: 20px;
        border-collapse: separate;
        border-spacing: 0 15px;
        width: 100%;
    }

    body {
        background-color: #f2f2f2;
    }

    th,
    td {
        padding: 10px;
    }

    thead {
        background-color: #e3e3e3;
    }

    tbody {
        background-color: white;
    }

    tbody tr {
        margin-bottom: 10px;
        border-radius: 20px;
    }

    .image-cell {
        border-top-left-radius: 20px;
        border-bottom-left-radius: 20px;
    }

    .action-cell {
        border-top-right-radius: 20px;
        border-bottom-right-radius: 20px;
    }

    thead tr:first-child {
        margin-top: 0;
    }
</style>

<div class="container mt-2">
    <div class="d-flex justify-content-end align-items-center">
        <a href="<?= ROOT ?>/client/book" class="btn btn-primary">Book</a>
    </div>
    <div class="overflow-auto" style="height: 75vh; scrollbar-width:none;">
        <table>
            <thead>
                <tr>
                    <th class="image-cell text-center">Image</th>
                    <th>Name</th>
                    <th>Booked on</th>
                    <th>Appointment date</th>
                    <th>Scheduled time</th>
                    <th>Price</th>
                    <th class="action-cell">Action</th>
                </tr>
            </thead>
            <?php if ($userBookings != null) { ?>
                <?php
                foreach ($userBookings as $item) {
                    $Date = $item->booked_date;
                    $formatDate = date('M, j Y \a\t g:iA', strtotime($Date));
                ?>
                    <tbody>
                        <tr>
                            <td class="image-cell"><?php if (!empty($item->book_image)) { ?>
                                    <div class="d-flex justify-content-center">
                                        <div style="width: 110px; height: 100px;">
                                            <img class="rounded" src="<?= ROOT . "/" . $item->book_image ?>" alt="Service Image" style="width: 100%; height: 100%; object-fit:cover; object-position: center;">
                                        </div>
                                    </div>
                                <?php } else { ?>
                                    <?= 'no image uploaded' ?>
                                <?php } ?>
                            </td>
                            <td><?= $item->book_name ?></td>
                            <td><?= $formatDate ?></td>
                            <td><?= date('M, j Y', strtotime($item->book_date)) ?></td>
                            <td><?= date("h:i A", strtotime($item->book_s_time)) ?> - <?= date("h:i A", strtotime($item->book_e_time)) ?></td>
                            <td>₱<?= $item->book_price ?></td>
                            <!-- edit -->
                            <td class="action-cell">
                                <form action="<?= ROOT ?>/client/details" name="details" method="post" class="me-2 my-2">
                                    <button type="submit" class="btn btn-primary" name="details">
                                        <input type="hidden" name="bookings_id" value="<?= $item->id ?>">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="1.2em" height="1.4em" viewBox="0 0 24 24">
                                            <path fill="currentColor" d="M2 8a1 1 0 0 1 1-1h18a1 1 0 1 1 0 2H3a1 1 0 0 1-1-1m0 4a1 1 0 0 1 1-1h18a1 1 0 1 1 0 2H3a1 1 0 0 1-1-1m1 3a1 1 0 1 0 0 2h12a1 1 0 1 0 0-2z" />
                                        </svg>
                                    </button>
                                </form>

                                <form action="<?= ROOT ?>/client/cancel" method="post" class="me-2 my-2">
                                    <button type="submit" class="btn btn-danger" name="cancel">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="1.2em" height="1.2em" viewBox="0 0 24 24">
                                            <g fill="none" stroke="currentColor" stroke-linecap="round" stroke-width="2">
                                                <path stroke-dasharray="60" stroke-dashoffset="60" d="M5.63604 5.63603C9.15076 2.12131 14.8492 2.12131 18.364 5.63603C21.8787 9.15075 21.8787 14.8492 18.364 18.364C14.8492 21.8787 9.15076 21.8787 5.63604 18.364C2.12132 14.8492 2.12132 9.15075 5.63604 5.63603Z">
                                                    <animate fill="freeze" attributeName="stroke-dashoffset" dur="0.5s" values="60;0" />
                                                </path>
                                                <path stroke-dasharray="18" stroke-dashoffset="18" d="M6 6L18 18">
                                                    <animate fill="freeze" attributeName="stroke-dashoffset" begin="0.6s" dur="0.2s" values="18;0" />
                                                </path>
                                            </g>
                                        </svg>
                                    </button>
                                    <input type="hidden" name="cancelid" value="<?= $item->id ?>">
                                    <input type="hidden" name="userid" value="<?= $item->user_id ?>">
                                </form>
                            </td>
                        </tr>
                    </tbody>
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

<?php include PATH . "client/partials/footer.php" ?>