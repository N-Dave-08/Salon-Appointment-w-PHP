<?php include PATH . "admin/partials/header.php" ?>

<style>
        thead {
                position: sticky;
                top: 0px;
                z-index: 1;
        }
</style>


<div class="container px-4" style="overflow-y: auto; height: 90vh; scrollbar-width:none;">
        <div class="row gap-3">


                <div class="col-8 my-3">
                        <div class="row gap-3">

                                <!-- NUMBER OF CLIENTS -->
                                <div class="col bg-white rounded shadow mb-3">
                                        <div style="overflow-y: auto;">
                                                <div class="fw-bold">Number of Clients: <?= count($users) ?></div>
                                                <?php if ($users != null) { ?>
                                                        <?php foreach ($users as $item) { ?>
                                                                <div><?= $item->firstname ?> <?= $item->lastname ?></div>
                                                        <?php } ?>
                                                <?php } ?>
                                        </div>
                                </div>
                                <!-- RATINGS -->
                                <div class="col bg-white rounded shadow mb-3">
                                        <div style="overflow-y: auto;">
                                                <div class="fw-bold">
                                                        <?php
                                                        $totalRating = 0;
                                                        $totalReviews = count($reviews);

                                                        foreach ($reviews as $item) {
                                                                $totalRating += $item->rating;
                                                        }

                                                        if ($totalReviews > 0) {
                                                                $averageRating = $totalRating / $totalReviews;
                                                        } else {
                                                                $averageRating = 0; 
                                                        }

                                                        echo "Average Rating: " . number_format($averageRating, 1); // Format to one decimal place
                                                        ?>
                                                </div>
                                                <?php if ($reviews != null) { ?>
                                                        <?php foreach ($reviews as $item) { ?>
                                                                <div class="d-flex">
                                                                        <div class="mr-1">
                                                                                <?= $item->email ?>
                                                                                <?php
                                                                                for ($i = 1; $i <= 5; $i++) {
                                                                                        if ($i <= $item->rating) {
                                                                                                echo '<span class = "filled-star" >&#9733;</span>'; // Filled star
                                                                                        } else {
                                                                                                echo '&#9734;'; // Empty star
                                                                                        }
                                                                                }
                                                                                ?>
                                                                        </div>
                                                                </div>
                                                        <?php } ?>
                                                <?php } ?>
                                        </div>
                                </div>
                        </div>
                        <div class="row bg-white rounded shadow" style="height: 360px;">
                                <canvas id="myChart"></canvas>
                        </div>

                </div>

                <!-- TRANSACTIONs -->
                <div class="col bg-white rounded shadow my-3" style="height: 85vh;">
                        <?php if (!empty($allbookings)) { ?>
                                <div class="fw-bold">Transactions</div>
                                <div style="height:72vh; overflow-y: auto;">
                                        <table class="table table-striped-columns">
                                                <thead>
                                                        <tr>
                                                                <th>Service</th>
                                                                <th>Price</th>
                                                                <th>Status</th>
                                                        </tr>
                                                </thead>
                                                <?php foreach ($allbookings as $item) { ?>
                                                        <tbody>
                                                                <tr>
                                                                        <td><?= $item->book_name ?></td>
                                                                        <td>₱ <?= $item->book_price ?></td>
                                                                        <td><?= $item->book_transaction ?></td>
                                                                </tr>
                                                        </tbody>
                                                <?php } ?>
                                        <?php } else { ?>
                                                <div class="fw-semibold" style="display: flex; justify-content:center;">NO TRANSACTIONS</div>
                                                <?php } ?>
                                        </table>
                                </div>
                                <?php
                                $paidincome = 0;
                                $income = 0;
                                foreach ($allbookings as $item) {
                                        if ($item->book_transaction === 'Paid') {
                                                $paidincome += $item->book_price;
                                        }
                                        if (!empty($item->book_price)) {
                                                $income += $item->book_price;
                                        }
                                } ?>
                                <div class="mt-auto">
                                        <div class="d-flex">
                                                <div class="me-3">
                                                        Total Prossible income:
                                                </div>
                                                <div class="fw-semibold"> ₱<?= $income ?></div>
                                        </div>
                                        <div class="d-flex">
                                                <div class="me-3">
                                                        Total Paid income:
                                                </div>
                                                <div class="fw-semibold"> ₱<?= $paidincome ?></div>
                                        </div>
                                </div>
                </div>
        </div>
</div>




<?php include PATH . "admin/partials/footer.php" ?>