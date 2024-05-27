<?php include PATH . "home/partials/header.php" ?>


<style>
    .rating-stars:hover {
        cursor: pointer;
    }

    .filled-star {
        color: #77abbf;
    }
</style>

<div class="container my-4">
    <h2>
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
    </h2>
    <?php if ($reviews != null) { ?>
        <?php foreach ($reviews as $item) { ?>
            <div class="container rounded shadow bg-white p-4 my-4">
                <div>
                    <div class="d-flex">
                        <div class="fs-5 fw-medium"><?= $item->email ?></div>
                    </div>
                    <div class="d-flex">
                        <div class="mr-1">
                            <?php
                            // Convert to stars
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
                    <?= $item->review ?>
                </div>
            </div>
        <?php } ?>
    <?php } ?>

</div>


<?php include PATH . "home/partials/footer.php" ?>