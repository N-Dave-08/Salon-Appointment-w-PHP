<?php include PATH . "client/partials/header.php" ?>

<div class="container my-5">
    <div class="card text-center">
        <div class="card-body">
            <h5 class="card-title d-flex align-items-center justify-content-center">
                <div>Booking Successful! </div>
                <svg xmlns="http://www.w3.org/2000/svg" width="1.2em" height="1.2em" viewBox="0 0 48 48">
                    <g fill="none" stroke-linejoin="round" stroke-width="4">
                        <path fill="#2f88ff" stroke="#000" d="M24 44C29.5228 44 34.5228 41.7614 38.1421 38.1421C41.7614 34.5228 44 29.5228 44 24C44 18.4772 41.7614 13.4772 38.1421 9.85786C34.5228 6.23858 29.5228 4 24 4C18.4772 4 13.4772 6.23858 9.85786 9.85786C6.23858 13.4772 4 18.4772 4 24C4 29.5228 6.23858 34.5228 9.85786 38.1421C13.4772 41.7614 18.4772 44 24 44Z" />
                        <path stroke="#fff" stroke-linecap="round" d="M16 24L22 30L34 18" />
                    </g>
                </svg>
            </h5>
            <p class="card-text"> Appointment details have been sent to your email</p>
            <a href="<?= ROOT ?>/client/mybookings" class="btn btn-primary">OK</a>
        </div>
    </div>
</div>

<?php include PATH . "client/partials/footer.php" ?>