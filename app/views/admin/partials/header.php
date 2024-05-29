<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <?php include "../public/links/cdn.php" ?>

  <title><?= APP_NAME ?></title>
</head>
<style>
  * {
    font-family: "Poppins", sans-serif;
    font-weight: 500;
  }

  body {
    background: #ececec;
  }

  .sidebar {
    z-index: 999 !important;
  }

  #side_nav {
    background: #19529c;
    min-width: 250px;
    max-width: 250px;
    transition: all 0.3s;
  }

  ul li {
    margin-top: 5px;
    margin-bottom: 5px;
  }

  ul li:hover {
    background-color: #3067b0;
    border-radius: 8px;
  }

  .content {
    min-height: 100vh;
    width: 100%;
  }

  nav {
    height: 60px;
  }

  hr.h-color {
    background: #eee;
  }

  .sidebar li.active {
    background: #eee;
    border-radius: 8px;
  }

  .sidebar li.active a,
  .sidebar li.active a:hover {
    color: #19529c;
    font-weight: 700;
  }

  .sidebar li a {
    color: #fff;
  }

  ::-webkit-scrollbar {
    display: none;
  }

  .image-wrapper {
    width: 40px;
    height: 40px;
    position: relative;
  }

  .image-wrapper img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    border-radius: 50%;
  }

  @media(max-width: 767px) {
    #side_nav {
      margin-left: -250px;
      position: absolute;
      min-height: 100vh;
      z-index: 1;

    }

    #side_nav.active {
      margin-left: 0;
    }
  }
</style>

<body>

  <div class="main-container d-flex">
    <!-- navbar -->
    <div class="sidebar d-flex flex-column" id="side_nav" style="height: 100vh;">
      <div class="header-box p-2 d-flex justify-content-between rounded m-3" style="background-color: #3e679c;">
        <div class="mx-3 d-flex align-items-center">
          <div class="image-wrapper me-3">
            <?php if (!empty($picture)) { ?>
              <img class="rounded-circle" src="<?= ROOT . "/" . $picture ?>" alt="" srcset="">
            <?php } else { ?>
              <img class="rounded-circle" src="<?= ROOT ?>/profiles/default.jpg" alt="" srcset="">
            <?php } ?>
          </div>
          <h1>
            <span class="fs-6">
              <div style="color: #d1d1d1;">Welcome,</div>
              <div class="fs-4 text-white"><?= $uname ?></div>
            </span>
          </h1>
        </div>
        <button class="btn d-md-none d-block close-btn px-1 py-0 text-white"><i class="fa-solid fa-bars"></i></button>
      </div>

      <ul class="list-unstyled px-2">
        <li class="dashboard">
          <a href="<?= ROOT ?>/admin/dashboard" class="text-decoration-none px-3 py-2 d-flex align-items-center">
            <svg xmlns="http://www.w3.org/2000/svg" width="1.2em" height="1.2em" viewBox="0 0 24 24" class="me-2" style="vertical-align: middle;">
              <g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                <path d="M10 13a2 2 0 1 0 4 0a2 2 0 1 0-4 0m3.45-1.45L15.5 9.5" />
                <path d="M6.4 20a9 9 0 1 1 11.2 0z" />
              </g>
            </svg>
            Dashboard
          </a>
        </li>
        <li class="services">
          <a href="<?= ROOT ?>/admin/services" class="text-decoration-none px-3 py-2 d-flex align-items-center">
            <svg xmlns="http://www.w3.org/2000/svg" width="1.2em" height="1.2em" viewBox="0 0 1024 1024" class="me-2" style="vertical-align: middle;">
              <path fill="currentColor" d="M912 192H328c-4.4 0-8 3.6-8 8v56c0 4.4 3.6 8 8 8h584c4.4 0 8-3.6 8-8v-56c0-4.4-3.6-8-8-8m0 284H328c-4.4 0-8 3.6-8 8v56c0 4.4 3.6 8 8 8h584c4.4 0 8-3.6 8-8v-56c0-4.4-3.6-8-8-8m0 284H328c-4.4 0-8 3.6-8 8v56c0 4.4 3.6 8 8 8h584c4.4 0 8-3.6 8-8v-56c0-4.4-3.6-8-8-8M104 228a56 56 0 1 0 112 0a56 56 0 1 0-112 0m0 284a56 56 0 1 0 112 0a56 56 0 1 0-112 0m0 284a56 56 0 1 0 112 0a56 56 0 1 0-112 0" />
            </svg>
            Services
          </a>
        </li>
        <li class="bookings">
          <a href="<?= ROOT ?>/admin/bookings" class="text-decoration-none px-3 py-2 d-flex align-items-center">
            <svg xmlns="http://www.w3.org/2000/svg" width="1.2em" height="1.2em" viewBox="0 0 256 256" class="me-2" style="vertical-align: middle;">
              <g fill="currentColor">
                <path d="m224 96l-78.55 56h-34.9L32 96l96-64Z" opacity="0.2" />
                <path d="m228.44 89.34l-96-64a8 8 0 0 0-8.88 0l-96 64A8 8 0 0 0 24 96v104a16 16 0 0 0 16 16h176a16 16 0 0 0 16-16V96a8 8 0 0 0-3.56-6.66M128 41.61l81.91 54.61l-67 47.78h-29.8l-67-47.78ZM40 200v-88.47l65.9 47a8 8 0 0 0 4.65 1.49h34.9a8 8 0 0 0 4.65-1.49l65.9-47V200Z" />
              </g>
            </svg>
            Bookings
          </a>
        </li>
        <li class="customers">
          <a href="<?= ROOT ?>/admin/users" class="text-decoration-none px-3 py-2 d-flex align-items-center">
            <svg xmlns="http://www.w3.org/2000/svg" width="1.2em" height="1.2em" viewBox="0 0 24 24" class="me-2" style="vertical-align: middle;">
              <g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                <path d="M18 21a8 8 0 0 0-16 0" />
                <circle cx="10" cy="8" r="5" />
                <path d="M22 20c0-3.37-2-6.5-4-8a5 5 0 0 0-.45-8.3" />
              </g>
            </svg>
            Customers
          </a>
        </li>
      </ul>
      <hr class="h-color mx-2">

      <ul class="list-unstyled px-2">
        <li class="settings">
          <a href="<?= ROOT ?>/admin/settings" class="text-decoration-none px-3 py-2 d-block">
            <!-- icon here -->

            Settings
          </a>
        </li>
      </ul>
      <div class="container-fluid mt-auto mb-3 text-end">
        <form action="<?= ROOT ?>/logout" method="post">
          <button type="submit" class="btn btn-light">
            <div class="d-flex align-items-center">
              <svg xmlns="http://www.w3.org/2000/svg" width="1.2em" height="1.2em" viewBox="0 0 24 24" class="me-2">
                <path fill="currentColor" d="m21.207 11.793l-5.914 5.914l-1.414-1.414l3.5-3.5H7.793v-2h9.586l-3.5-3.5l1.414-1.414zm-11.414-7.5h-5v15h5v2h-7v-19h7z" />
              </svg>Logout
            </div>
          </button>
        </form>
      </div>
    </div>

    <div class="content">
      <nav class="navbar navbar-expand-md navbar-light bg-light">
        <div class="container-fluid">
          <div class="d-flex justify-content-between d-md-none d-block">
            <button class="btn px-1 py-0 open-btn me-2"><i class="fa-solid fa-bars"></i></button>
            <a class="navbar-brand fs-4" href="#"><span class="rounded px-2 py-0 text-white" style="background-color: #19529c;">admin</span></a>

          </div>
          <button class="navbar-toggler p-0 border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="bi bi-grid"></i>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">


          </div>
        </div>
      </nav>