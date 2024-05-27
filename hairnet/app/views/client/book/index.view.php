<?php include PATH . "client/partials/header.php" ?>


<style>
.card {
    border: none !important;
}
</style>

<body>
    <main class="bg-white">
        <section class="py-4 text-center container">
            <div class="row py-lg-4">
                <div class="col-lg-6 col-md-8 mx-auto">
                    <h1 class="fw-medium">Our Services</h1>
                    <p class="lead text-body-secondary">Unlock your perfect style with our diverse range of expert hair services listed below, tailored to unleash your inner confidence and beauty.</p>
                </div>
            </div>
        </section>

        <div class="py-5" style="background-color: #f6f6f6;;">
            <div class="container">
                <div class="row">

                    <?php
                    if ($services != null) {
                    ?>
                        <?php
                        foreach ($services as $item) {
                        ?>

                            <div class="col" style="margin-bottom: 20px;">
                                <div class="card bg-white" style="width: 19rem; border-radius: 23px;">
                                    <div style="height: 220px">
                                        <img src="<?= ROOT . "/" . $item->image ?>" alt="" srcset="" style="width: 100%; height: 100%; object-fit:cover; object-position: center; border-radius: 23px 23px 0px 0px">
                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-title">
                                            <div class="mb-3"><?= $item->name ?></div>
                                            <div>₱<?= $item->price ?></div>
                                        </h5>
                                        <div class="my-2" style="height:80px; ;width: 18rem; overflow: auto; scrollbar-width:none;">
                                            <div>
                                                <p class="card-text fw-light fs-6 pe-3"><?= $item->description ?></p>
                                            </div>
                                        </div>

                                        <form action="<?= ROOT ?>/client/schedule" method="post" enctype="multipart/form-data">

                                            <!-- BOOK -->
                                            <button type="submit" class="btn btn-primary">
                                                Book
                                            </button>

                                            <!-- HIDDEN -->
                                            <input type="hidden" name="selected_service_id" value="<?= $item->id ?>">
                                            <input type="hidden" name="image" value="<?= $item->image ?>">
                                            <input type="hidden" name="name" value="<?= $item->name ?>">
                                            <input type="hidden" name="price" value="<?= $item->price ?>">
                                        </form>

                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    <?php } ?>
                </div>

            </div>

        </div>
    </main>


    <?php include PATH . "client/partials/footer.php" ?>