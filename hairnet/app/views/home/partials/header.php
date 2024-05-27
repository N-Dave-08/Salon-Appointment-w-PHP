<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- assets -->
    <?php include "../public/links/cdn.php" ?>
    <title><?= APP_NAME ?></title>
</head>

<style>
    * {
        font-family: "Poppins", sans-serif;
        font-weight: 600;
    }

    body {
        background-color: #f6f6f6;
    }

    header {
        position: sticky;
        top: 0;
        z-index: 999;
    }

    .dropdown-menu {
        position: absolute;
        z-index: 999;
    }

    ::-webkit-scrollbar {
        display: none;
    }

    .nav li .nav-link {
        color: #bdbdbd;
    }

    .nav li .nav-link:hover {
        color: black;
    }

    .nav li .active {
        font-weight: 700;
        color: black;
    }
</style>

<header class="container mx-auto p-3 shadow bg-white m-2 rounded-pill">
    <div class="container" id="side_nav">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                <svg xmlns="http://www.w3.org/2000/svg" width="2em" height="3em" viewBox="0 0 36 36">
                    <path fill="#3b88c3" d="M36 32a4 4 0 0 1-4 4H4a4 4 0 0 1-4-4V4a4 4 0 0 1 4-4h28a4 4 0 0 1 4 4z" />
                    <path fill="#fff" d="M25.5 7A2.5 2.5 0 0 0 23 9.5V15H13V9.5a2.5 2.5 0 1 0-5 0v17a2.5 2.5 0 1 0 5 0V20h10v6.5a2.5 2.5 0 1 0 5 0v-17A2.5 2.5 0 0 0 25.5 7" />
                </svg>
           

            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 mx-5 justify-content-center mb-md-0">
                <li><a href="<?= ROOT ?>/home" class="home nav-link px-3 mx-1">Home</a></li>
                <li><a href="<?= ROOT ?>/home/reviews" class="reviews nav-link px-3 mx-1">Reviews</a></li>
            </ul>

            <div class="text-end d-flex">
                <div class="dropdown">
                    <a class="btn btn-outline-dark rounded-pill me-2 dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Login
                    </a>

                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="<?= ROOT ?>/home/login">Customer</a></li>
                        <li><a class="dropdown-item" href="<?= ROOT ?>/home/asAdmin">Admin</a></li>
                    </ul>
                </div>

                <a href="<?= ROOT ?>/home/register" type="button" class="btn btn-warning rounded-pill">Sign-up</a>
            </div>
        </div>
    </div>
</header>