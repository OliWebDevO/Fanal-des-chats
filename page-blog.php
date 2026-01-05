<?php get_template_part("partials/header"); ?>

     <!-- start wpo-page-title -->
        <section class="wpo-page-title orange">
            <div class="container">
                <div class="row">
                    <div class="col col-xs-12">
                        <div class="wpo-breadcumb-wrap">
                            <h2>News</h2>
                            <ol class="wpo-breadcumb-wrap">
                                <li><a href="'<?php echo home_url("/"); ?>'">Accueil</a></li>
                                <li>News</li>
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
                    <div class="col col-lg-8">
                        <div class="wpo-blog-content">
                            <div class="post format-standard-image">
                                <div class="entry-media">
                                    <img src="<?php bloginfo("template_url")?>/assets/images/images/taichi.png" alt="">
                                </div>
                                <div class="entry-meta">
                                    <ul>
                                        <li><i class="fi flaticon-user"></i> Par <a href="#">Équipe du Fanal</a> </li>
                                        <li><i class="fi flaticon-comment-white-oval-bubble"></i> Commentaires 12 </li>
                                        <li><i class="fi flaticon-calendar-1"></i> 03 Sep 2025</li>
                                    </ul>
                                </div>
                                <div class="entry-details">
                                    <h3><a href="'<?php echo home_url("/blog-single"); ?>'">Cours de taichi pour chat</a></h3>
                                    <p>Venez découvrir les bienfaits du taichi pour votre chat. Cette pratique millénaire adaptée aux félins permet de réduire le stress et d'améliorer leur bien-être général. Découvrez notre offre dès aujourd'hui.</p>
                                    <a href="'<?php echo home_url("/blog-single"); ?>'" class="read-more">LIRE PLUS...</a>
                                </div>
                            </div>
                            <div class="post format-standard-image">
                                <div class="entry-media">
                                    <img src="<?php bloginfo("template_url")?>/assets/images/images/jouets.jpg" alt="">
                                </div>
                                <div class="entry-meta">
                                    <ul>
                                        <li><i class="fi flaticon-user"></i> Par <a href="#">Équipe du Fanal</a> </li>
                                        <li><i class="fi flaticon-comment-white-oval-bubble"></i> Commentaires 8 </li>
                                        <li><i class="fi flaticon-calendar-1"></i> 03 Sep 2025</li>
                                    </ul>
                                </div>
                                <div class="entry-details">
                                    <h3><a href="'<?php echo home_url("/blog-single"); ?>'">Ces jouets peuvent être mauvais pour votre animal</a>
                                    </h3>
                                    <p>Tous les jouets ne sont pas adaptés à nos compagnons félins. Découvrez quels jouets éviter pour protéger la santé et la sécurité de votre chat. Nos conseils pour faire les bons choix.</p>
                                    <a href="'<?php echo home_url("/blog-single"); ?>'" class="read-more">LIRE PLUS...</a>
                                </div>
                            </div>

                            <div class="post format-standard-image">
                                <div class="entry-media">
                                    <img src="<?php bloginfo("template_url")?>/assets/images/images/confortable.jpeg" alt="">
                                </div>
                                <div class="entry-meta">
                                    <ul>
                                        <li><i class="fi flaticon-user"></i> Par <a href="#">Équipe du Fanal</a> </li>
                                        <li><i class="fi flaticon-comment-white-oval-bubble"></i> Commentaires 15 </li>
                                        <li><i class="fi flaticon-calendar-1"></i> 03 Sep 2025</li>
                                    </ul>
                                </div>
                                <div class="entry-details">
                                    <h3><a href="'<?php echo home_url("/blog-single"); ?>'">Un endroit sûr et confortable pour votre chat</a></h3>
                                    <p>Un endroit sûr et confortable pour que votre chat se repose et se sente chez lui. Découvrez comment aménager l'espace idéal pour le bien-être de votre compagnon félin au quotidien.</p>
                                    <a href="'<?php echo home_url("/blog-single"); ?>'" class="read-more">LIRE PLUS...</a>
                                </div>
                            </div>

                            <div class="pagination-wrapper pagination-wrapper-left">
                                <ul class="pg-pagination">
                                    <li>
                                        <a href="#" aria-label="Previous">
                                            <i class="fi ti-angle-left"></i>
                                        </a>
                                    </li>
                                    <li class="active"><a href="#">1</a></li>
                                    <li><a href="#">2</a></li>
                                    <li><a href="#">3</a></li>
                                    <li>
                                        <a href="#" aria-label="Next">
                                            <i class="fi ti-angle-right"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col col-lg-4">
                        <div class="blog-sidebar">
                            <div class="widget search-widget">
                                <form>
                                    <div>
                                        <input type="text" class="form-control" placeholder="Rechercher un article...">
                                        <button type="submit"><i class="ti-search"></i></button>
                                    </div>
                                </form>
                            </div>
                            <div class="widget recent-post-widget">
                                <h3>Articles connexes</h3>
                                <div class="posts">
                                    <div class="post">
                                        <div class="img-holder">
                                            <img src="<?php bloginfo("template_url")?>/assets/images/recent-posts/img-1.jpg" alt="">
                                        </div>
                                        <div class="details">
                                            <h4><a href="'<?php echo home_url("/blog-single"); ?>'">La méditation féline au refuge</a>
                                            </h4>
                                            <span class="date">19 Jun 2025 </span>
                                        </div>
                                    </div>
                                    <div class="post">
                                        <div class="img-holder">
                                            <img src="<?php bloginfo("template_url")?>/assets/images/recent-posts/img-2.jpg" alt="">
                                        </div>
                                        <div class="details">
                                            <h4><a href="'<?php echo home_url("/blog-single"); ?>'">Les chats ont-ils des émotions ?</a></h4>
                                            <span class="date">22 May 2025 </span>
                                        </div>
                                    </div>
                                    <div class="post">
                                        <div class="img-holder">
                                            <img src="<?php bloginfo("template_url")?>/assets/images/recent-posts/img-3.jpg" alt="">
                                        </div>
                                        <div class="details">
                                            <h4><a href="'<?php echo home_url("/blog-single"); ?>'">Comment adopter un chat du refuge</a>
                                            </h4>
                                            <span class="date">12 Apr 2025 </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="widget wpo-instagram-widget">
                                <div class="widget-title">
                                    <h3>Instagram</h3>
                                </div>
                                <ul class="d-flex">
                                    <li><a href="'<?php echo home_url("/service-single"); ?>'"><img src="<?php bloginfo("template_url")?>/assets/images/instragram/7.jpg"
                                                alt=""></a></li>
                                    <li><a href="'<?php echo home_url("/service-single"); ?>'"><img src="<?php bloginfo("template_url")?>/assets/images/instragram/8.jpg"
                                                alt=""></a></li>
                                    <li><a href="'<?php echo home_url("/service-single"); ?>'"><img src="<?php bloginfo("template_url")?>/assets/images/instragram/9.jpg"
                                                alt=""></a></li>
                                    <li><a href="'<?php echo home_url("/service-single"); ?>'"><img src="<?php bloginfo("template_url")?>/assets/images/instragram/10.jpg"
                                                alt=""></a></li>
                                    <li><a href="'<?php echo home_url("/service-single"); ?>'"><img src="<?php bloginfo("template_url")?>/assets/images/instragram/11.jpg"
                                                alt=""></a></li>
                                    <li><a href="'<?php echo home_url("/service-single"); ?>'"><img src="<?php bloginfo("template_url")?>/assets/images/instragram/12.jpg"
                                                alt=""></a></li>
                                </ul>
                            </div>
                            <div class="widget tag-widget">
                                <h3>Mots-clés</h3>
                                <ul>
                                    <li><a href="#">Chats</a></li>
                                    <li><a href="#">Bien-être félin</a></li>
                                    <li><a href="#">Taichi</a></li>
                                    <li><a href="#">Refuge</a></li>
                                    <li><a href="#">Adoption</a></li>
                                    <li><a href="#">Bénévolat</a></li>
                                    <li><a href="#">Sécurité</a></li>
                                    <li><a href="#">Confort</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- end container -->
        </section>
        <!-- end wpo-blog-pg-section -->

<?php get_template_part("partials/footer"); ?>