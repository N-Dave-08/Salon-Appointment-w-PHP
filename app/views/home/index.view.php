<?php include PATH . "home/partials/header.php" ?>
<style>
    * {
        font-family: "Poppins", sans-serif
    }

    #first-box {
        background-image: url('images/barber.jpg');
        background-size: cover;
        /* Adjust as needed */
        background-position: center;
        /* Adjust as needed */
    }

    #frame {
        border-radius: 16px;
        background: #e6e6e6;
        box-shadow: -5px 5px 12px #b6b6b6,
            5px -5px 12px #ffffff;
    }
</style>


<div class="container py-4 ">


    <div class="p-5 mb-5 rounded-3" id="first-box">
        <div class="container-fluid pt- text-white">
            <div>
                <h1 class="display-5 fw-semibold fs-1">Welcome to <p class="fw-bold">Hairnet Salon</p>
                </h1>
                <p class="col-md-8 fw-light fs-5">Where every strand tells a story of style, beauty, and confidence. Step into our sanctuary of self-expression, where talented stylists craft masterpieces tailored to your unique personality and vision. From classic cuts to daring transformations, we're here to elevate your look and empower your spirit.</p>
                <a href="<?= ROOT ?>/home/register" class="btn btn-primary btn-lg" type="button">Book Now</a>
            </div>
        </div>
    </div>


    <hr class="featurette-divider">

    <footer class="py-3 my-4">

        <p class="text-center">© 2024 Hairnet, Inc</p>
    </footer>

</div>


<?php include PATH . "home/partials/footer.php" ?>