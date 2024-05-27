<!doctype html>
<html lang="en" data-bs-theme="auto">

<head>
    <!-- assets -->
    <?php include "../public/links/cdn.php" ?>

    <title><?= APP_NAME ?></title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/sign-in/">



    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">

    <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        html,
        body {
            height: 100%;
        }

        .form-signin {
            max-width: 330px;
            padding: 1rem;
        }

        .form-signin .form-floating:focus-within {
            z-index: 2;
        }

        .form-signin input[type="email"] {
            margin-bottom: -1px;
            border-bottom-right-radius: 0;
            border-bottom-left-radius: 0;
        }

        .form-signin input[type="password"] {
            margin-bottom: 10px;
            border-top-left-radius: 0;
            border-top-right-radius: 0;
        }


        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }

        .b-example-divider {
            width: 100%;
            height: 3rem;
            background-color: rgba(0, 0, 0, .1);
            border: solid rgba(0, 0, 0, .15);
            border-width: 1px 0;
            box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
        }

        .b-example-vr {
            flex-shrink: 0;
            width: 1.5rem;
            height: 100vh;
        }

        .bi {
            vertical-align: -.125em;
            fill: currentColor;
        }

        .nav-scroller {
            position: relative;
            z-index: 2;
            height: 2.75rem;
            overflow-y: hidden;
        }

        .nav-scroller .nav {
            display: flex;
            flex-wrap: nowrap;
            padding-bottom: 1rem;
            margin-top: -1px;
            overflow-x: auto;
            text-align: center;
            white-space: nowrap;
            -webkit-overflow-scrolling: touch;
        }

        .btn-bd-primary {
            --bd-violet-bg: #712cf9;
            --bd-violet-rgb: 112.520718, 44.062154, 249.437846;

            --bs-btn-font-weight: 600;
            --bs-btn-color: var(--bs-white);
            --bs-btn-bg: var(--bd-violet-bg);
            --bs-btn-border-color: var(--bd-violet-bg);
            --bs-btn-hover-color: var(--bs-white);
            --bs-btn-hover-bg: #6528e0;
            --bs-btn-hover-border-color: #6528e0;
            --bs-btn-focus-shadow-rgb: var(--bd-violet-rgb);
            --bs-btn-active-color: var(--bs-btn-hover-color);
            --bs-btn-active-bg: #5a23c8;
            --bs-btn-active-border-color: #5a23c8;
        }

        .bd-mode-toggle {
            z-index: 1500;
        }

        .bd-mode-toggle .dropdown-menu .active .bi {
            display: block !important;
        }

        #Form {
            box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px;
        }
    </style>


    <!-- Custom styles for this template -->
    <link href="sign-in.css" rel="stylesheet">
</head>

<body class="d-flex align-items-center py-4 bg-body-tertiary">

    <main class="m-auto" id="Form">
        <div class="p-4 border rounded" style="background-color: #e3e3e3;">
            <form action="" method="post">

                <!-- ALERT -->
                <?php if (!empty($errors)) : ?>

                    <div class="alert alert-dark alert-dismissible">
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        <?php foreach ($errors as $error) : ?>
                            <?= "<br>" . $error ?>
                        <?php endforeach; ?>
                    </div>

                <?php endif; ?>

                <div class="row">
                    <div class="col">
                        <!-- FIRSTNAME -->
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Firstname</label>
                            <input type="text" class="form-control" value="<?= get_var('firstname') ?>" name="firstname">
                        </div>
                    </div>
                    <div class="col">
                        <!-- LASTNAME -->
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Lastname</label>
                            <input type="text" class="form-control" value="<?= get_var('lastname') ?> " name="lastname">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <!-- NUMBER -->
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Phone Number:</label>
                            <input type="tel" class="form-control" value="<?= get_var('phone') ?>" name="phone" pattern="[0-9]{11}" placeholder="09*********">
                            <div class="form-text">must be 11 digit phone number starting with 09</div>
                        </div>
                    </div>

                    <div class="col">
                        <!-- EMAIL -->
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Email address</label>
                            <input type="text" class="form-control" value="<?= get_var('email') ?>" name="email" placeholder="text@gmail.com">
                            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                        </div>
                    </div>
                </div>

                <!-- PASSWORD -->
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <div class="form-group input-group">
                        <input type="password" class="form-control" id="exampleInputPassword1" name="password">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <a href="#" class="text-dark" id="icon-click">
                                    <i class="fa-solid fa-eye-slash" id="icon"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="form-text">Password must be at least 8 characters, one uppercase, one lowercase, one number.</div>
                </div>
                
                <!-- CONFIRM PASSWORD -->
                <div class="mb-3">
                    <label for="exampleInputPassword2" class="form-label">Confirm Password</label>
                    <div class="form-group input-group">
                        <input type="password" class="form-control" id="exampleInputPassword2" name="conpass">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <a href="#" class="text-dark" id="icon-click1">
                                    <i class="fa-solid fa-eye-slash" id="icon1"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary" name="register">Register</button>
                <a class="btn btn-danger" href="<?= ROOT ?>/home">Back</a>
        </div>

        </form>

    </main>
    <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>

</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="../assets/dist/js/bootstrap.bundle.min.js"></script>
<script>
    $(document).ready(function() {
        $("#icon-click").click(function() {
            var icon = $("#icon");
            var input = $('#exampleInputPassword1');

            if (input.attr("type") === "password") {
                input.attr("type", "text");
                icon.removeClass("fa-solid fa-eye-slash").addClass("fa-solid fa-eye");
            } else {
                input.attr("type", "password");
                icon.removeClass("fa-solid fa-eye").addClass("fa-solid fa-eye-slash");
            }
        });
    });

    $(document).ready(function() {
        $("#icon-click1").click(function() {
            var icon = $("#icon1");
            var input = $('#exampleInputPassword2');

            if (input.attr("type") === "password") {
                input.attr("type", "text");
                icon.removeClass("fa-solid fa-eye-slash").addClass("fa-solid fa-eye");
            } else {
                input.attr("type", "password");
                icon.removeClass("fa-solid fa-eye").addClass("fa-solid fa-eye-slash");
            }
        });
    });
</script>

</html>