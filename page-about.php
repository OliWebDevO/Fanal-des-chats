<?php get_template_part("partials/header"); ?>

        <!-- start wpo-page-title -->
        <section class="wpo-page-title orange">
            <div class="container">
                <div class="row">
                    <div class="col col-xs-12">
                        <div class="wpo-breadcumb-wrap">
                            <h2>A Propos</h2>
                            <ol class="wpo-breadcumb-wrap">
                                <li><a href="<?php echo home_url('/'); ?>">Accueil</a></li>
                                <li>A Propos</li>
                            </ol>
                        </div>
                    </div>
                </div> <!-- end row -->
            </div> <!-- end container -->
        </section>
        <!-- end page-title -->

        <!-- start of about-section -->
        <section class="about-section section-padding orange qui-sommes-nous">
            <div class="wraper">
                <div class="left">
                    <div class="image">
                        <img src="<?php bloginfo("template_url")?>/assets/images/images/illustrations/7_pretty cat.png" alt="Le Fanal des Chats">
                        <div class="shape">
                            <svg width="793" height="786" viewBox="0 0 793 786" fill="none">
                                <path
                                    d="M84.9007 505.664C-181.681 609.802 245.585 843.801 512.633 772.246C713.751 718.356 833.104 511.631 779.214 310.513C725.325 109.395 552.6 -41.9576 351.482 11.9319C150.364 65.8214 351.482 401.526 84.9007 505.664Z"
                                    fill="#FBDABF" />
                            </svg>
                        </div>
                    </div>
                </div>
                <div class="right">
                    <span class="section-label">Qui sommes-nous ?</span>
                    <h2>Le Fanal des Chats, un refuge au grand coeur.</h2>
                    <p>Le Fanal des Chats est une ASBL dediee a la protection et au bien-etre des chats abandonnes.
                       Notre mission est simple mais essentielle : recueillir, nourrir, soigner et offrir une seconde
                       chance a tous les felins qui croisent notre chemin.</p>
                    <p>Chaque jour, notre equipe de benevoles passionnes s'engage pour offrir aux chats abandonnes
                       l'amour et les soins qu'ils meritent. Nous assurons leur sterilisation, leurs soins veterinaires
                       et nous les preparons a rejoindre une nouvelle famille aimante.</p>

                    <div class="about-btn">
                        <a href="<?php echo home_url('/adoption'); ?>" class="theme-btn-s2">Adopter un chat</a>
                    </div>
                </div>
            </div>
            <div class="shape">
                <img src="<?php bloginfo("template_url")?>/assets/images/paws-6.png" alt="">
            </div>
            <div class="shape-2">
                <img src="<?php bloginfo("template_url")?>/assets/images/paws-7.png" alt="">
            </div>
        </section>


        <!-- start of funfact-section -->
        <section class="funfact-section about-funfact">
            <div class="section-top-image">
                <img src="<?php bloginfo("template_url")?>/assets/images/images/Les-chats-a-adopter.jpg" alt="Nos chats">
            </div>
            <div class="container">
                <div class="row">
                    <div class="col col-lg-3 col-md-6 col-12">
                        <div class="item">
                            <div class="icon">
                                <img src="<?php bloginfo("template_url")?>/assets/images/funfact/1.svg" alt="">
                            </div>
                            <h2><span class="odometer" data-count="150">00</span> <span class="ico">+</span>
                            </h2>
                            <h3>Chats adoptes</h3>
                        </div>
                    </div>
                    <div class="col col-lg-3 col-md-6 col-12">
                        <div class="item">
                            <div class="icon">
                                <img src="<?php bloginfo("template_url")?>/assets/images/funfact/2.svg" alt="">
                            </div>
                            <h2><span class="odometer" data-count="200">00</span> <span class="ico">+</span>
                            </h2>
                            <h3>Chats sterilises</h3>
                        </div>
                    </div>
                    <div class="col col-lg-3 col-md-6 col-12">
                        <div class="item">
                            <div class="icon">
                                <img src="<?php bloginfo("template_url")?>/assets/images/funfact/3.svg" alt="">
                            </div>
                            <h2><span class="odometer" data-count="25">00</span> <span class="ico">+</span>
                            </h2>
                            <h3>Benevoles actifs</h3>
                        </div>
                    </div>
                    <div class="col col-lg-3 col-md-6 col-12">
                        <div class="item">
                            <div class="icon">
                                <img src="<?php bloginfo("template_url")?>/assets/images/funfact/4.svg" alt="">
                            </div>
                            <h2><span class="odometer" data-count="100">00</span> <span class="ico">%</span>
                            </h2>
                            <h3>Devouement</h3>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- start of missions-section -->
        <section class="pricing-section section-padding orange nos-missions">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6 col-12">
                        <div class="section-title">
                            <h3 class="section-label">Nos Missions</h3>
                            <h2>Ce que nous faisons au quotidien</h2>
                        </div>
                    </div>
                </div>
                <div class="pricing-wrap row g-0 align-items-center">
                    <div class="col col-lg-4 col-md-6 col-12">
                        <div class="pricing-card">
                            <h2>Recueillir</h2>
                            <div class="price"><i class="fas fa-hands-holding-child mission-icon"></i></div>
                            <ul class="features">
                                <li>Accueil des chats abandonnes</li>
                                <li>Prise en charge des chats errants</li>
                                <li>Sauvetage d'urgence</li>
                                <li>Refuge temporaire securise</li>
                                <li>Evaluation du comportement</li>
                            </ul>
                            <a href="<?php echo home_url('/benevole'); ?>" class="theme-btn-s2">Devenir benevole</a>
                        </div>
                    </div>
                    <div class="col col-lg-4 col-md-6 col-12">
                        <div class="pricing-card">
                            <h2>Soigner</h2>
                            <div class="price"><i class="fas fa-stethoscope mission-icon"></i></div>
                            <ul class="features">
                                <li>Soins veterinaires complets</li>
                                <li>Sterilisation systematique</li>
                                <li>Vaccination et vermifugation</li>
                                <li>Identification par puce</li>
                                <li>Suivi medical personnalise</li>
                                <li>Alimentation adaptee</li>
                                <li>Traitement antiparasitaire</li>
                                <li>Rehabilitation comportementale</li>
                            </ul>
                            <a href="<?php echo home_url('/don'); ?>" class="theme-btn-s2">Faire un don</a>
                        </div>
                    </div>
                    <div class="col col-lg-4 col-md-6 col-12">
                        <div class="pricing-card">
                            <h2>Adopter</h2>
                            <div class="price"><i class="fas fa-home mission-icon"></i></div>
                            <ul class="features">
                                <li>Recherche de familles aimantes</li>
                                <li>Processus d'adoption encadre</li>
                                <li>Conseils personnalises</li>
                                <li>Suivi post-adoption</li>
                                <li>Support continu</li>
                            </ul>
                            <a href="<?php echo home_url('/adoption'); ?>" class="theme-btn-s2">Adopter un chat</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- start of values-section -->
        <section class="about-section section-padding nos-valeurs">
            <div class="wraper">
                <div class="right">
                    <span class="section-label">Nos Valeurs</span>
                    <h2>Un engagement sincere pour les felins.</h2>
                    <p><strong>Bienveillance :</strong> Chaque chat merite d'etre traite avec amour et respect,
                       peu importe son passe ou son etat de sante.</p>
                    <p><strong>Responsabilite :</strong> Nous nous engageons a assurer le bien-etre de chaque animal
                       jusqu'a ce qu'il trouve sa famille pour la vie.</p>
                    <p><strong>Transparence :</strong> Nous informons nos adoptants et donateurs de maniere honnete
                       sur l'utilisation des fonds et l'etat de sante des chats.</p>
                    <p><strong>Communaute :</strong> Ensemble, benevoles, adoptants et donateurs, nous formons une
                       grande famille unie par l'amour des chats.</p>

                    <div class="about-btn">
                        <a href="<?php echo home_url('/benevole'); ?>" class="theme-btn-s2">Devenir benevole</a>
                    </div>
                </div>
                <div class="left">
                    <div class="image">
                        <img src="<?php bloginfo("template_url")?>/assets/images/images/illustrations/3_cute cat.png" alt="Chat mignon">
                        <div class="shape">
                            <svg width="793" height="786" viewBox="0 0 793 786" fill="none">
                                <path
                                    d="M84.9007 505.664C-181.681 609.802 245.585 843.801 512.633 772.246C713.751 718.356 833.104 511.631 779.214 310.513C725.325 109.395 552.6 -41.9576 351.482 11.9319C150.364 65.8214 351.482 401.526 84.9007 505.664Z"
                                    fill="#FFEFEB" />
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
            <div class="shape">
                <img src="<?php bloginfo("template_url")?>/assets/images/paws-6.png" alt="">
            </div>
            <div class="shape-2">
                <img src="<?php bloginfo("template_url")?>/assets/images/paws-7.png" alt="">
            </div>
        </section>

<?php get_template_part("partials/footer"); ?>
