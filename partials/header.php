<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/themify-icons.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/flaticon.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/animate.css">
    <link rel="stylesheet" href="<?php bloginfo("template_url")?>/assets/css/owl.carousel.css">
    <link rel="stylesheet" href="<?php bloginfo("template_url")?>/assets/css/owl.theme.css">
    <link rel="stylesheet" href="<?php bloginfo("template_url")?>/assets/css/slick.css">
    <link rel="stylesheet" href="<?php bloginfo("template_url")?>/assets/css/slick-theme.css">
    <link rel="stylesheet" href="<?php bloginfo("template_url")?>/assets/css/swiper.min.css">
    <link rel="stylesheet" href="<?php bloginfo("template_url")?>/assets/css/owl.transitions.css">
    <link rel="stylesheet" href="<?php bloginfo("template_url")?>/assets/css/jquery.fancybox.css">
    <link rel="stylesheet" href="<?php bloginfo("template_url")?>/assets/css/odometer-theme-default.css">
    <link rel="stylesheet" href="<?php bloginfo("template_url")?>/assets/sass/style.css">
      <!-- Google Web Fonts -->
      <link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
      <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&family=Playfair+Display:wght@600;700&display=swap" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Open+Sans:wght@300;400;500;600;700;800&family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap" rel="stylesheet"> 
      <!-- Font Awesome -->
      <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
      <!-- Swiper Js -->
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
      <!-- animate css -->
      <link rel="stylesheet" href="<?php bloginfo("template_url")?>/plugins/animate.css/animate.css">
      <link rel="stylesheet" href="<?php bloginfo("template_url")?>/plugins/simple-lightbox.min.css">
  	  <link rel="stylesheet" href="<?php bloginfo("template_url")?>/plugins/fashion-slider.css">
      <!-- Font Awesome -->
      <script src="https://kit.fontawesome.com/0144f75b4e.js" crossorigin="anonymous"></script>
   	<link rel="apple-touch-icon" sizes="180x180" href="<?php bloginfo("template_url")?>/img/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php bloginfo("template_url")?>/img/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php bloginfo("template_url")?>/img/favicon/favicon-16x16.png">
    <link rel="manifest" href="<?php bloginfo("template_url")?>/img/favicon/site.webmanifest">
    <link rel="mask-icon" href="<?php bloginfo("template_url")?>/img/favicon/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
  	<meta name="description" content="Le Fanal des Chats | Soins et Protection des Chats">
    <title><?php bloginfo("name")?></title>
    <?php wp_head(); ?>
</head>

<body>

    <!-- start page-wrapper -->
    <div class="page-wrapper">
        <!-- start preloader -->
        <div class="preloader">
            <div class="vertical-centered-box">
                <div class="content">
                    <div class="loader-circle"></div>
                    <div class="loader-line-mask">
                        <div class="loader-line"></div>
                    </div>
                    <img src="<?php bloginfo("template_url")?>/assets/images/preloader.png" alt="">
                </div>
            </div>
        </div>
        <!-- end preloader -->

        <!-- Start header -->
        <header id="header">
            <div class="wpo-site-header">
                <nav class="navigation navbar navbar-expand-lg navbar-light">
                    <div class="container-fluid">
                        <div class="row align-items-center">
                            <div class="col-lg-3 col-md-3 col-3 d-lg-none dl-block">
                                <div class="mobail-menu">
                                    <button type="button" class="navbar-toggler open-btn">
                                        <span class="sr-only">Toggle navigation</span>
                                        <span class="icon-bar first-angle"></span>
                                        <span class="icon-bar middle-angle"></span>
                                        <span class="icon-bar last-angle"></span>
                                    </button>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-6 col-6">
                                <div class="navbar-header">
                                    <a class="navbar-brand" href="<?php echo home_url('/'); ?>"><img src="<?php bloginfo("template_url")?>/assets/images/images/logo.gif"
                                            alt=""></a>
                                </div>
                            </div>
                            <div class="col-lg-7 col-md-1 col-1">
                                <div id="navbar" class="collapse navbar-collapse navigation-holder">
                                    <button class="menu-close"><i class="ti-close"></i></button>
                                    <ul class="nav navbar-nav mb-2 mb-lg-0">
                                        <li>
                                            <a href="<?php echo home_url('/about'); ?>">A Propos</a>
                                        </li>
                                        <li class="menu-item-has-children">
                                            <span class="nav-trigger">Adoption</span>
                                            <ul class="sub-menu">
                                                <li><a href="<?php echo home_url('/adoption'); ?>">Adoption</a></li>
                                                <li><a href="<?php echo home_url('/abandon'); ?>">Abandon</a></li>
                                                <li><a href="<?php echo home_url('/parrainer'); ?>">Parrainer un chat</a></li>
                                            </ul>
                                        </li>
                                        <li class="menu-item-has-children">
                                            <span class="nav-trigger">Don</span>
                                            <ul class="sub-menu">
                                                <li><a href="<?php echo home_url('/don'); ?>">Faire un don</a></li>
                                                <li><a href="<?php echo home_url('/leguer'); ?>">Faire un legs</a></li>
                                            </ul>
                                        </li>
                                        <li class="menu-item-has-children">
                                            <span class="nav-trigger">Participer</span>
                                            <ul class="sub-menu">
                                                <li><a href="<?php echo home_url('/benevole'); ?>">Devenir Bénévole</a></li>
                                                <!-- <li><a href="<?php echo home_url('/emploi'); ?>">Trouver un Emploi</a></li> -->
                                                <li><a href="<?php echo home_url('/stage'); ?>">Faire un Stage</a></li>
                                                <li><a href="<?php echo home_url('/famille-accueil'); ?>">Famille d'accueil</a></li>
                                            </ul>
                                        </li>
                                        <li class="menu-item-has-children">
                                            <span class="nav-trigger">News</span>
                                            <ul class="sub-menu">
                                                <li><a href="<?php echo home_url('/revue'); ?>">Revue</a></li>
                                                <li><a href="<?php echo home_url('/histoires'); ?>">Livre d'Or</a></li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="<?php echo home_url('/faq'); ?>">FAQ</a>
                                        </li>
                                        <li class="menu-item-has-children">
                                            <span class="nav-trigger">Rendez-Vous</span>
                                            <ul class="sub-menu">
                                                <li><a href="<?php echo home_url('/rdv-chat'); ?>">Adoption Chat</a></li>
                                                <li><a href="<?php echo home_url('/rdv-chaton'); ?>">Adoption Chaton</a></li>
                                            </ul>
                                        </li>
                                    </ul>

                                </div><!-- end of nav-collapse -->
                            </div>
                            <div class="col-lg-3 col-md-2 col-2">
                                <div class="header-right">
                                    <!-- <div class="header-search-form-wrapper">
                                        <div class="cart-search-contact">
                                            <button class="search-toggle-btn"><i class="fi flaticon-loupe"></i></button>
                                            <div class="header-search-form">
                                                <form>
                                                    <div>
                                                        <input type="text" class="form-control"
                                                            placeholder="Search here...">
                                                        <button type="submit"><i class="fi flaticon-loupe"></i></button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div> -->
                                    <div class="close-form">
                                        <a class="theme-btn-s2" href="<?php echo home_url('/contact'); ?>">Contactez nous</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- end of container -->
                </nav>
            </div>
        </header>
        <!-- end of header -->