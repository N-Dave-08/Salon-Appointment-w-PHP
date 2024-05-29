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
        font-weight: 750;
        color: black;
    }
</style>
<div>

</div>
<header class="container mx-auto p-3 shadow bg-white m-2 rounded-pill">
    <div class="container" id="side_nav">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <svg xmlns="http://www.w3.org/2000/svg" width="2em" height="3em" viewBox="0 0 36 36">
                <path fill="#3b88c3" d="M36 32a4 4 0 0 1-4 4H4a4 4 0 0 1-4-4V4a4 4 0 0 1 4-4h28a4 4 0 0 1 4 4z" />
                <path fill="#fff" d="M25.5 7A2.5 2.5 0 0 0 23 9.5V15H13V9.5a2.5 2.5 0 1 0-5 0v17a2.5 2.5 0 1 0 5 0V20h10v6.5a2.5 2.5 0 1 0 5 0v-17A2.5 2.5 0 0 0 25.5 7" />
            </svg>


            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 mx-5 justify-content-center mb-md-0">
                <li><a href="<?= ROOT ?>/client" class="client nav-link px-3 mx-1">Home</a></li>
                <li><a href="<?= ROOT ?>/client/reviews" class="reviews nav-link px-3 mx-1">Reviews</a></li>
                <li><a href="<?= ROOT ?>/client/book" class="book nav-link px-3 mx-1">Services</a></li>
                <li><a href="<?= ROOT ?>/client/mybookings" class="mybookings nav-link px-3 mx-1">Bookings</a></li>
                <li><a href="<?= ROOT ?>/client/calendar" class="calendar nav-link px-3 mx-1">Calendar</a></li>
            </ul>

            <div class="d-flex text-end">
                <div class="dropdown">
                    <button class="btn btn-outline-dark dropdown-toggle d-flex align-items-center rounded-pill" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <div class="me-3" style="height: 30px; width: 30px">
                            <?php if (!empty($picture)) { ?>
                                <img class="rounded-circle" src="<?= ROOT . "/" . $picture ?>" alt="" srcset="" style="width: 100%; height: 100%; object-fit:cover; object-position: center;">
                            <?php } else { ?>
                                <img class="rounded-circle" src="<?= ROOT ?>/profiles/default.jpg" alt="" srcset="" style="width: 100%; height: 100%; object-fit:cover; object-position: center;">
                            <?php } ?>
                        </div>
                        <div><?= $firstname ?></div>
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="<?= ROOT ?>/client/profile">Account</a></li>
                        <li>
                            <form action="<?= ROOT ?>/logout" method="post" class="text-end mt-5 me-2">
                                <button type="submit" class="btn btn-outline-dark">
                                    <div class="d-flex align-items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="1.2em" height="1.2em" viewBox="0 0 24 24" class="me-2">
                                            <path fill="currentColor" d="m21.207 11.793l-5.914 5.914l-1.414-1.414l3.5-3.5H7.793v-2h9.586l-3.5-3.5l1.414-1.414zm-11.414-7.5h-5v15h5v2h-7v-19h7z" />
                                        </svg>Logout
                                    </div>
                                </button>
                            </form>
                        </li>
                    </ul>
                </div>

            </div>
        </div>
    </div>
</header>