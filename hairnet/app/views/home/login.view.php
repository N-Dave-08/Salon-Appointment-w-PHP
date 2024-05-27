<!doctype html>
<html lang="en" data-bs-theme="auto">

<head>
    <!-- assets -->
    <?php include "../public/links/cdn.php" ?>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.122.0">
    <title><?= APP_NAME ?></title>

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

                <!-- EMAIL -->
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email address or Phone number</label>
                    <input type="text" class="form-control" value="<?= get_var('fill-up') ?>" name="fill-up">
                    <div id="emailHelp" class="form-text"></div>
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
                </div>

                <button type="submit" class="btn btn-primary" name="login">LOG IN</button>
                <a class="btn btn-danger" href="<?= ROOT ?>/home">Back</a>

            </form>
        </div>
    </main>

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

            // Hide error alert after 2 seconds
            var errorAlert = $('#error-alert');
            if (errorAlert.length > 0) {
                setTimeout(function() {
                    errorAlert.fadeOut('slow');
                }, 2000);
            }
        });
    </script>


</body>

</html>