<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <?php wp_head(); ?>
</head>
<body <?php body_class() ?>>
<div class="container">

    <div class="containerDark col-md-8">

        <nav class="navbar navbar-expand-lg navMenu">
<!--            <div class="container-fluid">-->
                <!--        <a class="navbar-brand" href="#"> --><?php //bloginfo('name'); ?><!-- </a>-->
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">

                    <?php wp_nav_menu([
                        'theme_location' => 'header',
                        'container' => false,
                        'menu_class' => 'navbar-nav me-auto',
                    ]) ?>
                    <!--
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Link</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                               data-bs-toggle="dropdown" aria-expanded="false">
                                Dropdown
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#">Action</a></li>
                                <li><a class="dropdown-item" href="#">Another action</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="#">Something else here</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                        </li>
                    </ul>
                     -->
                    <?= get_search_form() ?>
<!--                </div>-->
            </div>
        </nav>

        <script>
            $(document).ready(function () {
                $("ul.navbar-nav > li").click(function (e) {
                    $("ul.navbar-nav > li").removeClass("active");
                    $(this).addClass("active");
                });

                // $("li.menu-item-98").addClass("dropdown");
                // $("ul.sub-menu").addClass("dropdown-menu");
                // $("li.dropdown a").addClass("dropdown-toggle").attr('role', 'button').attr('data-toggle', 'dropdown').attr('aria-expanded', 'false');
                // $("ul.sub-menu li a").removeClass("dropdown-toggle");
                // $('.navbar .dropdown-toggle').append('');
                // $('ul.dropdown-menu ul').addClass("dropdown-item");
            });

        </script>
