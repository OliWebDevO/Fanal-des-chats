<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="wpOceans">
    <link rel="shortcut icon" type="image/png" href="assets/images/favicon.png">
    <title>Petlox | Pet Care & Veterinary HTML5 Template</title>
    <link href="assets/css/themify-icons.css" rel="stylesheet">
    <link href="assets/css/flaticon.css" rel="stylesheet">
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/animate.css" rel="stylesheet">
    <link href="assets/css/owl.carousel.css" rel="stylesheet">
    <link href="assets/css/owl.theme.css" rel="stylesheet">
    <link href="assets/css/slick.css" rel="stylesheet">
    <link href="assets/css/slick-theme.css" rel="stylesheet">
    <link href="assets/css/swiper.min.css" rel="stylesheet">
    <link href="assets/css/owl.transitions.css" rel="stylesheet">
    <link href="assets/css/jquery.fancybox.css" rel="stylesheet">
    <link href="assets/css/odometer-theme-default.css" rel="stylesheet">
    <link href="assets/sass/style.css" rel="stylesheet">
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
                    <img src="assets/images/preloader.png" alt="">
                </div>
            </div>
        </div>
        <!-- end preloader -->

        <!-- Start header -->
        <header id="header">
            <div class="wpo-site-header wpo-site-header-s2 orange">
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
                                    <a class="navbar-brand" href="<?php echo home_url('/'); ?>"><img src="assets/images/images/logo.gif"
                                            alt=""></a>
                                </div>
                            </div>
                            <div class="col-lg-7 col-md-1 col-1">
                                <div id="navbar" class="collapse navbar-collapse navigation-holder">
                                    <button class="menu-close"><i class="ti-close"></i></button>
                                    <ul class="nav navbar-nav mb-2 mb-lg-0">
                                        <li class="menu-item-has-children">
                                            <a href="#">Accueil</a>
                                            <ul class="sub-menu">
                                                <li><a href="<?php echo home_url('/'); ?>">Home style 1</a></li>
                                                <li><a href="<?php echo home_url('/index-2'); ?>">Home style 2</a></li>
                                            </ul>
                                        </li>
                                        <li class="menu-item-has-children">
                                            <a href="#">A Propos</a>
                                            <ul class="sub-menu">
                                                <li><a href="<?php echo home_url('/about'); ?>">About</a></li>
                                                <li><a href="<?php echo home_url('/pricing'); ?>">Pricing</a></li>
                                                <li><a href="<?php echo home_url('/faq'); ?>">Faq</a></li>
                                                <li><a href="<?php echo home_url('/404'); ?>">404</a></li>
                                            </ul>
                                        </li>
                                        <li class="menu-item-has-children">
                                            <a href="<?php echo home_url('/service'); ?>">Participer</a>
                                            <ul class="sub-menu">
                                                <!-- <li><a href="<?php echo home_url('/service'); ?>">Services</a></li> -->
                                                <li><a href="<?php echo home_url('/benevole'); ?>">Devenir Bénévole</a></li>
                                                <li><a href="<?php echo home_url('/adoption'); ?>">Adopter un Chat</a></li>
                                                <li><a href="<?php echo home_url('/don'); ?>">Faire un don</a></li>
                                            </ul>
                                        </li>
                                        <li class="menu-item-has-children">
                                            <a href="#">Revue</a>
                                            <ul class="sub-menu">
                                                <li><a href="<?php echo home_url('/revue'); ?>">Revue</a></li>
                                                <li><a href="<?php echo home_url('/revue-single'); ?>">Revue Single</a></li>
                                                <!-- <li><a href="<?php echo home_url('/cart'); ?>">Cart</a></li>
                                                <li><a href="<?php echo home_url('/checkout'); ?>">Checkout</a></li> -->
                                            </ul>
                                        </li>
                                        <li class="menu-item-has-children">
                                            <a href="#">News</a>
                                            <ul class="sub-menu">
                                                <li><a href="<?php echo home_url('/news'); ?>">News</a></li>
                                                <li><a href="<?php echo home_url('/news-single'); ?>">News Single</a>
                                            </ul>
                                        </li>
                                    </ul>

                                </div><!-- end of nav-collapse -->
                            </div>
                            <div class="col-lg-3 col-md-2 col-2">
                                <div class="header-right">
                                    <div class="mini-cart">
                                        <button class="cart-toggle-btn"> <i class="fi flaticon-shopping-cart"></i> <span
                                                class="cart-count">2</span></button>
                                        <div class="mini-cart-content">
                                            <button class="mini-cart-close"><i class="ti-close"></i></button>
                                            <div class="mini-cart-items">
                                                <div class="mini-cart-item clearfix">
                                                    <div class="mini-cart-item-image">
                                                        <a href="<?php echo home_url('/revue'); ?>"><img
                                                                src="assets/images/shop/mini-cart/img-1.jpg" alt></a>
                                                    </div>
                                                    <div class="mini-cart-item-des">
                                                        <a href="<?php echo home_url('/revue'); ?>">Procan Adult Dog Food</a>
                                                        <span class="mini-cart-item-price">$20.15 x 1</span>
                                                        <span class="mini-cart-item-quantity"><a href="#"><i
                                                                    class="ti-close"></i></a></span>
                                                    </div>
                                                </div>
                                                <div class="mini-cart-item clearfix">
                                                    <div class="mini-cart-item-image">
                                                        <a href="<?php echo home_url('/revue'); ?>"><img
                                                                src="assets/images/shop/mini-cart/img-2.jpg" alt></a>
                                                    </div>
                                                    <div class="mini-cart-item-des">
                                                        <a href="<?php echo home_url('/revue'); ?>">Bonnie Cat Food Chicken</a>
                                                        <span class="mini-cart-item-price">$13.25 x 2</span>
                                                        <span class="mini-cart-item-quantity"><a href="#"><i
                                                                    class="ti-close"></i></a></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mini-cart-action clearfix">
                                                <span class="mini-checkout-price">Subtotal: <span>$215.14</span></span>
                                                <div class="mini-btn">
                                                    <a href="<?php echo home_url('/checkout'); ?>" class="view-cart-btn s1">Checkout</a>
                                                    <a href="<?php echo home_url('/cart'); ?>" class="view-cart-btn">View Cart</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="close-form">
                                        <a class="theme-btn" href="<?php echo home_url('/contact'); ?>">Contactez nous</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- end of container -->
                </nav>
            </div>
        </header>
        <!-- end of header -->

        <!-- start wpo-page-title -->
        <div class="space"></div>
        <section class="wpo-page-title orange">
            <div class="container">
                <div class="row">
                    <div class="col col-xs-12">
                        <div class="wpo-breadcumb-wrap">
                            <h2>Cart</h2>
                            <ol class="wpo-breadcumb-wrap">
                                <li><a href="<?php echo home_url('/'); ?>">Home</a></li>
                                <li>Cart</li>
                            </ol>
                        </div>
                    </div>
                </div> <!-- end row -->
            </div> <!-- end container -->
        </section>
        <!-- end page-title -->

        <!-- cart-area start -->
        <div class="cart-area section-padding orange">
            <div class="container">
                <div class="row">
                    <div class="cart-wrapper">
                        <div class="row">
                            <div class="col-12">
                                <form action="cart">
                                    <table class="table-responsive cart-wrap">
                                        <thead>
                                            <tr>
                                                <th class="images images-b">Image</th>
                                                <th class="product-2">Product Name</th>
                                                <th class="pr">Quantity</th>
                                                <th class="ptice">Price</th>
                                                <th class="stock">Total Price</th>
                                                <th class="remove remove-b">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="images"><img src="assets/images/cart/1.jpg" alt=""></td>
                                                <td class="product">
                                                    <ul>
                                                        <li class="first-cart">Procan Adult Dog Food</li>
                                                        <li>Brand : Humanscale</li>
                                                    </ul>
                                                </td>
                                                <td class="stock">
                                                    <ul class="input-style">
                                                        <li class="quantity cart-plus-minus">
                                                            <input type="text" value="1" />
                                                        </li>
                                                    </ul>
                                                </td>
                                                <td class="ptice">$ 250</td>
                                                <td class="stock">$ 250</td>
                                                <td class="action">
                                                    <ul>
                                                        <li class="w-btn"><a data-bs-toggle="tooltip"
                                                                data-bs-html="true" title="Remove from Cart" href="#"><i
                                                                    class="fi ti-trash"></i></a></li>
                                                    </ul>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="images"><img src="assets/images/cart/2.jpg" alt=""></td>
                                                <td class="product">
                                                    <ul>
                                                        <li class="first-cart">Bonnie Adult Cat Food Chicken</li>
                                                        <li>Brand : Amia</li>
                                                    </ul>
                                                </td>
                                                <td class="stock">
                                                    <ul class="input-style">
                                                        <li class="quantity cart-plus-minus">
                                                            <input type="text" value="1" />
                                                        </li>
                                                    </ul>
                                                </td>
                                                <td class="ptice">$ 350</td>
                                                <td class="stock">$ 350</td>
                                                <td class="action">
                                                    <ul>
                                                        <li class="w-btn"><a data-bs-toggle="tooltip"
                                                                data-bs-html="true" title="Remove to Cart" href="#"><i
                                                                    class="fi ti-trash"></i></a></li>
                                                    </ul>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </form>
                                <div class="submit-btn-area">
                                    <ul>
                                        <li><a class="theme-btn" href="<?php echo home_url('/revue'); ?>">Continue Shopping <i
                                                    class="fa fa-angle-double-right"></i></a></li>
                                        <li><button type="submit">Update Cart</button></li>
                                    </ul>
                                </div>
                                <div class="cart-product-list">
                                    <ul>
                                        <li>Total product<span>( 05 )</span></li>
                                        <li>Sub Price<span>$2250</span></li>
                                        <li>Vat<span>$50</span></li>
                                        <li>Eco Tax<span>$100</span></li>
                                        <li>Delivery Charge<span>$100</span></li>
                                        <li class="cart-b">Total Price<span>$2500</span></li>
                                    </ul>
                                </div>

                                <div class="submit-btn-area">
                                    <ul>
                                        <li><a class="theme-btn" href="<?php echo home_url('/checkout'); ?>">Proceed to Checkout <i
                                                    class="fa fa-angle-double-right"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- cart-area end -->

        <!-- start of wpo-site-footer-section -->
        <footer class="wpo-site-footer">
            <div class="wpo-upper-footer">
                <div class="container">
                    <div class="row">
                        <div class="col col-lg-6 col-md-6 col-sm-12 col-12">
                            <div class="widget about-widget">
                                 
                                <div class="widget-title">
                                    <a class="footer-logo" href="<?php echo home_url('/'); ?>"><img src="assets/images/images/logo.gif"
                                            alt=""></a>
                                    <h2>Le Fanal des Chats</h2>
                                </div>
                                <div class="social-widget">
                                    <ul>
                                        <li><a href="#"><i class="ti-facebook"></i></a></li>
                                        <li><a href="#"><i class="ti-twitter-alt"></i></a></li>
                                        <li><a href="#"><i class="ti-linkedin"></i></a></li>
                                        <li><a href="#"><i class="ti-instagram"></i></a></li>
                                    </ul>
                                </div>

                            </div>
                        </div>
                        <div class="col col-lg-3 col-md-6 col-sm-12 col-12">
                            <div class="widget contact-widget">
                                <div class="widget-title">
                                    <h3>Contact</h3>
                                </div>
                                <ul>
                                    <li>Le Fanal des Chats asbl</li>
                                    <li>16 avenue Emile Max, 1030 Bruxelles</li>
                                    <li>lefanaldeschats@proximus.be</li>
                                    <li>02/734.60.29</li>
                                </ul>
                            </div>
                        </div>
                        <div class="col col-lg-3 col-md-6 col-sm-12 col-12">
                            <div class="widget link-widget">
                                <div class="widget-title">
                                    <h3>Menu</h3>
                                </div>
                                <ul>
                                    <li><a href="<?php echo home_url('/about'); ?>">A Propos</a></li>
                                    <li><a href="<?php echo home_url('/service'); ?>">Services</a></li>
                                    <li><a href="<?php echo home_url('/pricing'); ?>">Réseau</a></li>
                                    <li><a href="<?php echo home_url('/news'); ?>">News</a></li>
                                    <li><a href="<?php echo home_url('/contact'); ?>">Contact</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div> <!-- end container -->
            </div>
            <div class="wpo-lower-footer">
                <div class="container-fluid">
                    <div class="row g-0">
                        <div class="col col-lg-6 col-12">
                            <p class="copyright"> Copyright &copy; 2025 Le Fanal des Chats Asbl. All
                                Rights Reserved.</p>
                        </div>
                        <div class="col col-lg-6 col-12">
                            <ul class="right">
                                <li><a href="<?php echo home_url('/privace'); ?>"><span class="rolling-text">Confidentialité</span> </a></li>
                                <li><a href="<?php echo home_url('/terms'); ?>"><span class="rolling-text">Conditions</span></a></li>
                                <li><a href="<?php echo home_url('/about'); ?>"><span class="rolling-text">A Propos</span></a></li>
                                <li><a href="<?php echo home_url('/faq'); ?>"><span class="rolling-text">FAQ</span></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </footer>

        <!-- end of wpo-site-footer-section -->


    </div>
    <!-- end of page-wrapper -->

    <!-- All JavaScript files
    ================================================== -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <!-- Plugins for this template -->
    <script src="assets/js/modernizr.custom.js"></script>
    <script src="assets/js/jquery-plugin-collection.js"></script>
    <!-- Custom script for this template -->
    <script src="assets/js/script.js"></script>
</body>

</html>