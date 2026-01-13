<?php get_template_part("partials/header"); ?>
        <!-- start wpo-page-title -->
        <div class="space"></div>
        <section class="wpo-page-title orange">
            <div class="container">
                <div class="row">
                    <div class="col col-xs-12">
                        <div class="wpo-breadcumb-wrap">
                            <h2>Faire un don</h2>
                            <ol class="wpo-breadcumb-wrap">
                                <li><a href="<?php echo home_url('/'); ?>">Accueil</a></li>
                                <li>Faire un don</li>
                            </ol>
                        </div>
                    </div>
                </div> <!-- end row -->
            </div> <!-- end container -->
        </section>
        <!-- end page-title -->

        <!-- service-single-area start -->
        <div class="wpo-service-single-area section-padding orange">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-12">
                        <div class="wpo-service-single-wrap">
                            <div class="wpo-service-single-item">
                                <!-- <div class="wpo-service-single-main-img">
                                    <img src="<?php bloginfo("template_url")?>/assets/images/images/illustrations/3_cute cat.png" alt="">
                                </div> -->
                                <div class="wpo-service-single-title">
                                    <h3>Pourquoi faire un don ?</h3>
                                </div>
                                <p>Votre générosité fait toute la différence dans la vie de nos pensionnaires félins. Chaque don, qu'il soit ponctuel ou régulier, nous permet de continuer notre mission de sauvetage, de soins et de réhabilitation des chats abandonnés ou maltraités. Grâce à votre soutien, nous pouvons offrir des soins vétérinaires, une alimentation de qualité et un environnement sécurisé.</p>
                                <p>Le Fanal des Chats fonctionne uniquement grâce aux dons et à l'engagement de nos bénévoles. Chaque euro compte et contribue directement au bien-être de nos compagnons à quatre pattes en attente d'une famille aimante.</p>
                                <!-- <div class="row mt-4">
                                    <div class="col-md-6 col-sm-6 col-12">
                                        <div class="wpo-p-details-img">
                                            <img src="<?php bloginfo("template_url")?>/assets/images/service-single/2.jpg" alt="">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-12">
                                        <div class="wpo-p-details-img">
                                            <img src="<?php bloginfo("template_url")?>/assets/images/service-single/3.jpg" alt="">
                                        </div>
                                    </div>
                                </div> -->
                            </div>
                            <div class="wpo-service-single-item list-widget">
                                <div class="wpo-service-single-title">
                                    <h3>À quoi servent vos dons ?</h3>
                                </div>
                                <p>Transparence et responsabilité sont nos maîtres mots. Voici comment nous utilisons chaque euro de vos précieux dons :</p>
                                <ul>
                                    <li>Soins vétérinaires : vaccinations, stérilisations, traitements médicaux</li>
                                    <li>Alimentation de qualité adaptée à chaque âge et état de santé</li>
                                    <li>Entretien et amélioration des infrastructures du refuge</li>
                                    <li>Matériel et équipements pour le bien-être des chats</li>
                                    <li>Campagnes de sensibilisation et événements d'adoption</li>
                                </ul>
                            </div>
                            <div class="wpo-service-single-item">
                                <div class="wpo-service-single-title">
                                    <h3>Comment faire un don ?</h3>
                                </div>
                                <p>Plusieurs modalités s'offrent à vous pour soutenir notre action. Que vous préfériez un don ponctuel ou un soutien régulier, chaque geste compte. Vous pouvez effectuer un virement bancaire, nous envoyer un chèque ou même faire un don en nature (nourriture, litière, jouets). Tous les dons donnent droit à une déduction fiscale selon la législation en vigueur.</p>
                            </div>
                            <div class="wpo-service-single-item list-widget">
                                <div class="wpo-service-single-title">
                                    <h3>Avantages fiscaux en Belgique</h3>
                                </div>
                                <ul>
                                    <li>Reduction d'impot de 45% du montant de votre don</li>
                                    <li>Attestation fiscale transmise automatiquement au SPF Finances</li>
                                    <li>Dons deductibles jusqu'a 10% du revenu net imposable</li>
                                    <li>Montant minimum de 40 euros par an pour l'attestation</li>
                                    <li>Avantages pour les particuliers ET les entreprises</li>
                                </ul>
                            </div>
                            <div class="wpo-service-single-item">
                                <div class="wpo-service-single-title">
                                    <h3>Testez vos connaissances sur les dons</h3>
                                </div>
                                <p>Connaissez-vous les avantages fiscaux des dons aux ASBL agreees en Belgique ? Participez a notre quiz pour decouvrir comment optimiser votre generosite tout en beneficiant d'avantages fiscaux, que vous soyez un particulier ou une entreprise.</p>
                                <div class="about-btn">
                                    <a href="<?php echo home_url('/quiz-don'); ?>" class="theme-btn-s2">Participez au Quiz</a>
                                </div>
                                <div class="givewp-form-container">
                                    <?php echo do_shortcode('[give_form id="43"]'); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- service-single-area end -->

        <!-- start wpo-faq-section -->
        <section class="wpo-faq-section section-padding">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-12">
                        <div class="section-title">
                            <h2>Questions fréquentes</h2>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="wpo-faq-section">
                            <div class="row">
                                <div class="col-lg-12 col-12">
                                    <div class="wpo-benefits-item">
                                        <div class="accordion" id="accordionExample">
                                            <div class="accordion-item">
                                                <h3 class="accordion-header" id="headingOne">
                                                    <button class="accordion-button" type="button"
                                                        data-bs-toggle="collapse" data-bs-target="#collapseOne"
                                                        aria-expanded="true" aria-controls="collapseOne">
                                                        Quel est le montant minimum pour faire un don ?
                                                    </button>
                                                </h3>
                                                <div id="collapseOne" class="accordion-collapse collapse show"
                                                    aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                                    <div class="accordion-body">
                                                        <p>Il n'y a pas de montant minimum ! Chaque don, même le plus modeste, fait la différence. Que ce soit 5€ ou 500€, votre générosité contribue directement au bien-être de nos pensionnaires félins.</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="accordion-item">
                                                <h3 class="accordion-header" id="headingTwo">
                                                    <button class="accordion-button collapsed" type="button"
                                                        data-bs-toggle="collapse" data-bs-target="#collapseTwo"
                                                        aria-expanded="false" aria-controls="collapseTwo">
                                                        Mon don est-il déductible des impôts ?
                                                    </button>
                                                </h3>
                                                <div id="collapseTwo" class="accordion-collapse collapse"
                                                    aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                                    <div class="accordion-body">
                                                        <p>Oui ! En tant qu'ASBL agreee par le SPF Finances, vos dons au Fanal des Chats donnent droit a une reduction d'impot de 45% de leur montant (minimum 40 euros/an). L'attestation fiscale est transmise automatiquement via Tax-on-web.</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="accordion-item">
                                                <h3 class="accordion-header" id="headingThree">
                                                    <button class="accordion-button collapsed" type="button"
                                                        data-bs-toggle="collapse" data-bs-target="#collapseThree"
                                                        aria-expanded="false" aria-controls="collapseThree">
                                                        Puis-je faire un don en nature ?
                                                    </button>
                                                </h3>
                                                <div id="collapseThree" class="accordion-collapse collapse"
                                                    aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                                    <div class="accordion-body">
                                                        <p>Absolument ! Nous acceptons les dons de nourriture, litière, jouets, couvertures, matériel vétérinaire. Contactez-nous avant pour connaître nos besoins prioritaires du moment.</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="accordion-item">
                                                <h3 class="accordion-header" id="headingFour">
                                                    <button class="accordion-button collapsed" type="button"
                                                        data-bs-toggle="collapse" data-bs-target="#collapseFour"
                                                        aria-expanded="false" aria-controls="collapseFour">
                                                        Puis-je mettre en place un don régulier ?
                                                    </button>
                                                </h3>
                                                <div id="collapseFour" class="accordion-collapse collapse"
                                                    aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                                                    <div class="accordion-body">
                                                        <p>Oui, et c'est très apprécié ! Un don mensuel, même modest, nous aide à planifier nos actions et garantit une stabilité financière. Vous pouvez modifier ou arrêter votre don à tout moment.</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- end container -->
        </section>
        <!-- end faq-section -->

        <!-- service contact area start -->
        <div class="wpo-service-single-area section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-12">
                        <div class="wpo-service-single-wrap">
                            <div class="wpo-service-single-item">
                                <div class="wpo-service-contact-area">
                                    <div class="wpo-contact-title">
                                        <h2>Prêt à nous soutenir ?</h2>
                                        <p>Testez vos connaissances sur les dons ou faites un don directement</p>
                                    </div>
                                    <div class="about-btn">
                                        <a href="<?php echo home_url('/quiz-don'); ?>" class="theme-btn-s2">Faire le Quiz</a>
                                    </div>
                                    <div class="givewp-form-container">
                                        <?php echo do_shortcode('[give_form id="43"]'); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- service-single-area end -->
        
<?php get_template_part("partials/footer"); ?>
