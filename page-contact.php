<?php get_template_part("partials/header"); ?>

        <!-- start wpo-page-title -->
        <div class="space"></div>
        <section class="wpo-page-title orange">
            <div class="container">
                <div class="row">
                    <div class="col col-xs-12">
                        <div class="wpo-breadcumb-wrap">
                            <h2>Contact</h2>
                            <ol class="wpo-breadcumb-wrap">
                                <li><a href="<?php echo home_url('/'); ?>">Accueil</a></li>
                                <li>Contact</li>
                            </ol>
                        </div>
                    </div>
                </div> <!-- end row -->
            </div> <!-- end container -->
        </section>
        <!-- end page-title -->

        <!-- start wpo-contact-pg-section -->
        <section class="wpo-contact-pg-section section-padding orange">
            <div class="container">
                <div class="row">
                    <div class="col col-lg-10 offset-lg-1">
                        <div class="row justify-content-center">
                            <div class="col-lg-6 col-12">
                                <div class="section-title">
                                    <h2>Nous contacter</h2>
                                </div>
                            </div>
                        </div>
                        <div class="office-info">
                            <div class="row">
                                <div class="col col-xl-4 col-lg-6 col-md-6 col-12">
                                    <a href="https://www.google.com/maps/search/?api=1&query=Le+Fanal+des+Chats+Bruxelles" target="_blank" class="office-info-link">
                                        <div class="office-info-item">
                                            <div class="office-info-icon">
                                                <div class="icon">
                                                    <i class="fi flaticon-placeholder"></i>
                                                </div>
                                            </div>
                                            <div class="office-info-text">
                                                <h2>Adresse</h2>
                                                <p>16 avenue Emile Max, 1030 Bruxelles</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col col-xl-4 col-lg-6 col-md-6 col-12">
                                    <a href="mailto:lefanaldeschats@proximus.be" class="office-info-link">
                                        <div class="office-info-item">
                                            <div class="office-info-icon">
                                                <div class="icon">
                                                    <i class="fi flaticon-email"></i>
                                                </div>
                                            </div>
                                            <div class="office-info-text">
                                                <h2>Email</h2>
                                                <p>lefanaldeschats@proximus.be</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col col-xl-4 col-lg-6 col-md-6 col-12">
                                    <a href="tel:+3227346029" class="office-info-link">
                                        <div class="office-info-item">
                                            <div class="office-info-icon">
                                                <div class="icon">
                                                    <i class="fi flaticon-phone-call"></i>
                                                </div>
                                            </div>
                                            <div class="office-info-text">
                                                <h2>Téléphone</h2>
                                                <p>02/734.60.29</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- end container -->
        </section>
        <!-- end wpo-contact-pg-section -->
        
        <!-- start of pricing-section -->
        <section class="pricing-section section-padding orange">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6 col-12">
                        <div class="section-title">
                            <h2>Participer à notre mission</h2>
                        </div>
                    </div>
                </div>
                <div class="pricing-wrap row g-0 align-items-center">
                    <div class="col col-lg-4 col-md-6 col-12">
                        <div class="pricing-card">
                            <h2>Adoptez un Chat</h2>
                            <div class="price"></div>
                            <ul class="features">
                                <li>Vaccinations</li>
                                <li>Stérilisation</li>
                                <li>Soins et suivi</li>
                            </ul>
                            <a href="<?php echo home_url('/adoption'); ?>" class="theme-btn-s2">Adopter un chat</a>
                        </div>
                    </div>
                    <div class="col col-lg-4 col-md-6 col-12">
                        <div class="pricing-card">
                            <h2>Faites un Don</h2>
                            <div class="price"></div>
                            <ul class="features">
                                <li>Soins vétérinaires</li>
                                <li>Médicaments et vaccins</li>
                                <li>Nourriture de qualité</li>
                                <li>Litière et produits d'hygiène</li>
                                <li>Chauffage et climatisation</li>
                                <li>Jouets et accessoires</li>
                            </ul>
                            <a href="<?php echo home_url('/don'); ?>" class="theme-btn-s2">Faire un don</a>
                        </div>
                    </div>
                    <div class="col col-lg-4 col-md-6 col-12">
                        <div class="pricing-card">
                            <h2>Devenez Bénévole</h2>
                            <div class="price"></div>
                            <ul class="features">
                                <li>Nourrir et soigner les chats</li>
                                <li>Socialiser les félins</li>
                                <li>Entretien des installations</li>
                                <li>Sensibilisation du public</li>
                            </ul>
                            <a href="<?php echo home_url('/benevole'); ?>" class="theme-btn-s2">Devenir bénévole</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

<?php get_template_part("partials/footer"); ?>