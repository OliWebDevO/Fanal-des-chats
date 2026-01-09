<?php get_template_part("partials/header"); ?>

        <!-- start wpo-page-title -->
        <section class="wpo-page-title orange">
            <div class="container">
                <div class="row">
                    <div class="col col-xs-12">
                        <div class="wpo-breadcumb-wrap">
                            <h2>Services</h2>
                            <ol class="wpo-breadcumb-wrap">
                                <li><a href="<?php echo home_url('/'); ?>">Accueil</a></li>
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
                            <h2><a href="<?php echo home_url('/benevole'); ?>">Accueil</a></h2>
                            <p>Nous accueillons les chats errants et abandonnés dans un environnement sûr et bienveillant.</p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="item">
                        <div class="icon">
                            <img src="<?php bloginfo("template_url")?>/assets/images/service/2.svg" alt="">
                        </div>
                        <div class="content">
                            <h2><a href="<?php echo home_url('/benevole'); ?>">Soins Vétérinaires</a></h2>
                            <p>Nos chats reçoivent tous les soins médicaux nécessaires pour retrouver la santé.</p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="item">
                        <div class="icon">
                            <img src="<?php bloginfo("template_url")?>/assets/images/service/4.svg" alt="">
                        </div>
                        <div class="content">
                            <h2><a href="<?php echo home_url('/benevole'); ?>">Stérilisation & Vaccin</a></h2>
                            <p>Programme de stérilisation et de vaccination pour le bien-être de nos pensionnaires.</p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="item">
                        <div class="icon">
                            <img src="<?php bloginfo("template_url")?>/assets/images/service/3.svg" alt="">
                        </div>
                        <div class="content">
                            <h2><a href="<?php echo home_url('/benevole'); ?>">Adoptions</a></h2>
                            <p>Nous trouvons des familles aimantes pour nos chats prêts à être adoptés.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

<?php get_template_part("partials/footer"); ?>
