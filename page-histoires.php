<?php get_template_part("partials/header"); ?>

     <!-- start wpo-page-title -->
        <div class="space"></div>
        <section class="wpo-page-title orange">
            <div class="container">
                <div class="row">
                    <div class="col col-xs-12">
                        <div class="wpo-breadcumb-wrap">
                            <h2>Histoires d'adoption</h2>
                            <ol class="wpo-breadcumb-wrap">
                                <li><a href="<?php echo home_url('/'); ?>">Accueil</a></li>
                                <li>Histoires d'adoption</li>
                            </ol>
                        </div>
                    </div>
                </div> <!-- end row -->
            </div> <!-- end container -->
        </section>
        <!-- end page-title -->

        <!-- start wpo-blog-pg-section -->
        <section class="wpo-blog-pg-section section-padding orange">
            <div class="container">
                <div class="row">
                    <div class="col col-lg-8 col-12">
                        <div class="wpo-blog-content">
                            <!-- Histoire 1 : Caramel -->
                            <div class="post format-standard-image">
                                <div class="entry-media">
                                    <a href="<?php echo home_url('/histoire-single'); ?>">
                                        <img src="<?php bloginfo("template_url")?>/assets/images/images/taichi.png" alt="Caramel le chat roux">
                                    </a>
                                </div>
                                <div class="entry-meta">
                                    <ul>
                                        <li><i class="fi flaticon-user"></i> Par <a href="#">Famille Dubois</a></li>
                                        <li><i class="fi flaticon-calendar-1"></i> 15 Nov 2025</li>
                                    </ul>
                                </div>
                                <div class="entry-details">
                                    <h3><a href="<?php echo home_url('/histoire-single'); ?>">Caramel : du chat craintif au roi du salon</a></h3>
                                    <p>Quand nous avons adopté Caramel au Fanal des Chats, il se cachait sous les meubles et refusait tout contact. Aujourd'hui, six mois plus tard, c'est lui qui vient réclamer ses câlins chaque soir sur le canapé. Une transformation incroyable qui nous remplit de bonheur.</p>
                                    <a href="<?php echo home_url('/histoire-single'); ?>" class="read-more">LIRE SON HISTOIRE...</a>
                                </div>
                            </div>

                            <!-- Histoire 2 : Luna et Stella -->
                            <div class="post format-standard-image">
                                <div class="entry-media">
                                    <a href="<?php echo home_url('/histoire-single'); ?>">
                                        <img src="<?php bloginfo("template_url")?>/assets/images/images/jouets.jpg" alt="Luna et Stella">
                                    </a>
                                </div>
                                <div class="entry-meta">
                                    <ul>
                                        <li><i class="fi flaticon-user"></i> Par <a href="#">Marie-Claire L.</a></li>
                                        <li><i class="fi flaticon-calendar-1"></i> 28 Oct 2025</li>
                                    </ul>
                                </div>
                                <div class="entry-details">
                                    <h3><a href="<?php echo home_url('/histoire-single'); ?>">Luna et Stella : les inséparables ont trouvé leur foyer</a></h3>
                                    <p>Ces deux soeurs étaient arrivées au refuge après l'abandon de leur famille. Le Fanal des Chats a insisté pour qu'elles soient adoptées ensemble. Aujourd'hui, elles dorment toujours l'une contre l'autre et illuminent notre maison de leur complicité.</p>
                                    <a href="<?php echo home_url('/histoire-single'); ?>" class="read-more">LIRE LEUR HISTOIRE...</a>
                                </div>
                            </div>

                            <!-- Histoire 3 : Papy Moustache -->
                            <div class="post format-standard-image">
                                <div class="entry-media">
                                    <a href="<?php echo home_url('/histoire-single'); ?>">
                                        <img src="<?php bloginfo("template_url")?>/assets/images/images/confortable.jpeg" alt="Papy Moustache">
                                    </a>
                                </div>
                                <div class="entry-meta">
                                    <ul>
                                        <li><i class="fi flaticon-user"></i> Par <a href="#">Jean-Pierre M.</a></li>
                                        <li><i class="fi flaticon-calendar-1"></i> 10 Sep 2025</li>
                                    </ul>
                                </div>
                                <div class="entry-details">
                                    <h3><a href="<?php echo home_url('/histoire-single'); ?>">Papy Moustache : à 12 ans, il a enfin trouvé sa famille</a></h3>
                                    <p>Personne ne voulait adopter ce vieux chat de 12 ans. Pourtant, quand je l'ai vu au Fanal des Chats, j'ai su que c'était lui. Trois ans plus tard, Moustache est le compagnon le plus doux et reconnaissant qu'on puisse imaginer. Les seniors méritent aussi une seconde chance.</p>
                                    <a href="<?php echo home_url('/histoire-single'); ?>" class="read-more">LIRE SON HISTOIRE...</a>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col col-lg-4 col-12">
                        <div class="blog-sidebar">
                            <div class="widget about-widget">
                                <h3>Partagez votre histoire</h3>
                                <p>Vous avez adopté un chat au Fanal des Chats ? Nous serions ravis de publier son histoire et de montrer son évolution. Contactez-nous avec vos photos et témoignages !</p>
                                <div class="about-btn" style="margin-top: 15px;">
                                    <a href="<?php echo home_url('/contact'); ?>" class="theme-btn-s2">Nous contacter</a>
                                </div>
                            </div>
                            <div class="widget recent-post-widget">
                                <h3>Dernières histoires</h3>
                                <div class="posts">
                                    <div class="post">
                                        <div class="img-holder">
                                            <a href="<?php echo home_url('/histoire-single'); ?>"><img src="<?php bloginfo("template_url")?>/assets/images/images/taichi.png" alt=""></a>
                                        </div>
                                        <div class="details">
                                            <h4><a href="<?php echo home_url('/histoire-single'); ?>">Caramel : du chat craintif au roi du salon</a></h4>
                                            <span class="date">15 Nov 2025</span>
                                        </div>
                                    </div>
                                    <div class="post">
                                        <div class="img-holder">
                                            <a href="<?php echo home_url('/histoire-single'); ?>"><img src="<?php bloginfo("template_url")?>/assets/images/images/jouets.jpg" alt=""></a>
                                        </div>
                                        <div class="details">
                                            <h4><a href="<?php echo home_url('/histoire-single'); ?>">Luna et Stella : les inséparables</a></h4>
                                            <span class="date">28 Oct 2025</span>
                                        </div>
                                    </div>
                                    <div class="post">
                                        <div class="img-holder">
                                            <a href="<?php echo home_url('/histoire-single'); ?>"><img src="<?php bloginfo("template_url")?>/assets/images/images/confortable.jpeg" alt=""></a>
                                        </div>
                                        <div class="details">
                                            <h4><a href="<?php echo home_url('/histoire-single'); ?>">Papy Moustache : une seconde chance à 12 ans</a></h4>
                                            <span class="date">10 Sep 2025</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="widget tag-widget">
                                <h3>Mots-clés</h3>
                                <ul>
                                    <li><a href="#">Adoption</a></li>
                                    <li><a href="#">Témoignages</a></li>
                                    <li><a href="#">Chats seniors</a></li>
                                    <li><a href="#">Transformation</a></li>
                                    <li><a href="#">Famille</a></li>
                                    <li><a href="#">Bonheur</a></li>
                                    <li><a href="#">Seconde chance</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- end container -->
        </section>
        <!-- end wpo-blog-pg-section -->

<?php get_template_part("partials/footer"); ?>
