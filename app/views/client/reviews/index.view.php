<?php include PATH . "client/partials/header.php" ?>


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
            <div class="container rounded bg-white p-4 my-4">
                <div>
                    <div class="d-flex">
                        <div class="fs-5 fw-medium"><?= $item->email ?></div>
                    </div>
                    <div class="d-flex">
                        <div class="mr-1">
                            <?php
                            // stars
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
    <div class="rating-container border bg-secondary rounded p-3 my-3">
        <div class="rating-stars">
            <span class="star" data-rating="1">&#9733;</span>
            <span class="star" data-rating="2">&#9733;</span>
            <span class="star" data-rating="3">&#9733;</span>
            <span class="star" data-rating="4">&#9733;</span>
            <span class="star" data-rating="5">&#9733;</span>
        </div>
        <div>
            <input class="form-control" name="review" id="review" type="text" placeholder="Write a review..." required>
        </div>
        <button class="btn btn-success my-3" name="rating" id="submit-rating">Submit Rating</button>
        <div class="text-white" id="response"></div>
    </div>
</div>

<script>
    $(document).ready(function() {
        var ratedIndex = -1;

        $('.star').on('click', function() {
            ratedIndex = parseInt($(this).data('rating'));
            $('.star').each(function(index) {
                if (index < ratedIndex) {
                    $(this).css('color', 'orange');
                } else {
                    $(this).css('color', 'black');
                }
            });
        });

        $('#submit-rating').on('click', function() {
            if (ratedIndex != -1) {
                var reviewText = $('#review').val();
                $.ajax({
                    url: 'reviews',
                    method: 'POST',
                    data: {
                        rating: ratedIndex,
                        review: reviewText 
                    },
                    success: function(response) {
                        if (response.errors) {
                            $('#response').html(response.errors); // Display errors
                        } else if (response.alreadySubmitted) {
                            $('#response').html("You have already submitted a review.");
                        } else {
                            $('#response').html("Rating submitted successfully.");
                        }
                    },
                    error: function(xhr, status, error) {
                        $('#response').html("Error submitting rating.");
                    }
                });
            } else {
                $('#response').html("Please select a rating first.");
            }
        });
    });
</script>

<?php include PATH . "client/partials/footer.php" ?>