<?php get_template_part("partials/header"); ?>

        <!-- start wpo-page-title -->
        <section class="wpo-page-title orange">
            <div class="container">
                <div class="row">
                    <div class="col col-xs-12">
                        <div class="wpo-breadcumb-wrap">
                            <h2>Services</h2>
                            <ol class="wpo-breadcumb-wrap">
                                <li><a href="<?php echo home_url('/'); ?>">Home</a></li>
                                <li>Services</li>
                            </ol>
                        </div>
                    </div>
                </div> <!-- end row -->
            </div> <!-- end container -->
        </section>
        <!-- end page-title -->

        <!-- start of service-section -->
        <section class="service-section-s2 section-padding">
            <div class="wraper">
                <div class="col">
                    <div class="item">
                        <div class="icon">
                            <img src="<?php bloginfo("template_url")?>/assets/images/service/1.svg" alt="">
                        </div>
                        <div class="content">
                            <h2><a href="'<?php echo home_url("/service-single"); ?>'">Over Night Care</a></h2>
                            <p>If you are away for the night, we can keep your favorite pet happy and safe. </p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="item">
                        <div class="icon">
                            <img src="<?php bloginfo("template_url")?>/assets/images/service/2.svg" alt="">
                        </div>
                        <div class="content">
                            <h2><a href="'<?php echo home_url("/service-single"); ?>'">Pet Walking</a></h2>
                            <p>If you are away for the night, we can keep your favorite pet happy and safe. </p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="item">
                        <div class="icon">
                            <img src="<?php bloginfo("template_url")?>/assets/images/service/3.svg" alt="">
                        </div>
                        <div class="content">
                            <h2><a href="'<?php echo home_url("/service-single"); ?>'">Pet Grooming</a></h2>
                            <p>If you are away for the night, we can keep your favorite pet happy and safe. </p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="item">
                        <div class="icon">
                            <img src="<?php bloginfo("template_url")?>/assets/images/service/4.svg" alt="">
                        </div>
                        <div class="content">
                            <h2><a href="'<?php echo home_url("/service-single"); ?>'">Vaccination</a></h2>
                            <p>If you are away for the night, we can keep your favorite pet happy and safe. </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

<?php get_template_part("partials/footer"); ?>
