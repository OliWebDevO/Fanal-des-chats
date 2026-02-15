<?php
$adoption_form_done = isset($_COOKIE['adoption_form_done']) && $_COOKIE['adoption_form_done'] === '1';
?>
<?php get_template_part("partials/header"); ?>

        <!-- start wpo-page-title -->
        <div class="space"></div>
        <section class="wpo-page-title orange">
            <div class="container">
                <div class="row">
                    <div class="col col-xs-12">
                        <div class="wpo-breadcumb-wrap">
                            <h2>Rendez-vous</h2>
                            <ol class="wpo-breadcumb-wrap">
                                <li><a href="<?php echo home_url('/'); ?>">Accueil</a></li>
                                <li>Rendez-vous</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- end page-title -->

        <style>
            .rdv-buttons {
                display: flex;
                flex-wrap: wrap;
                gap: 12px;
                margin: 20px 0 30px;
            }
            .rdv-buttons .theme-btn-s2 {
                font-size: 14px;
            }
            .rdv-calendar {
                margin-top: 10px;
            }
            .rdv-locked {
                background: #fff3e0;
                border: 2px dashed #FF5B2E;
                border-radius: 12px;
                padding: 30px;
                text-align: center;
                margin-top: 10px;
            }
            .rdv-locked i {
                font-size: 40px;
                color: #FF5B2E;
                margin-bottom: 15px;
            }
            .rdv-locked p {
                font-size: 16px;
                color: #333;
                margin-bottom: 20px;
            }
        </style>

        <!-- Intro section : texte gauche, illustration droite -->
        <section class="about-section section-padding orange benevole-block">
            <div class="wraper">
                <div class="right">
                    <span class="section-label">Rendez-vous</span>
                    <h2>Prendre rendez-vous pour une adoption</h2>
                    <p>Choisissez le type d'adoption qui vous correspond et réservez un créneau pour rencontrer nos pensionnaires.</p>
                    <p>Nous proposons deux types de rendez-vous :</p>
                    <ul class="benevole-list">
                        <li><strong>Adoption Chat</strong> (30 min) — Pour rencontrer un chat adulte. Ce créneau vous permet de faire connaissance avec le chat, d'échanger avec notre équipe sur son caractère et ses besoins.</li>
                        <li><strong>Adoption Chaton</strong> (45 min) — Pour rencontrer un chaton. Le créneau est un peu plus long car les chatons demandent davantage de conseils sur l'éducation, l'alimentation et l'adaptation à leur nouveau foyer.</li>
                    </ul>
                </div>
                <div class="left">
                    <div class="image">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/images/illustrations/14_orange cat.png" alt="Chat du refuge">
                        <div class="shape">
                            <svg width="793" height="786" viewBox="0 0 793 786" fill="none">
                                <path d="M84.9007 505.664C-181.681 609.802 245.585 843.801 512.633 772.246C713.751 718.356 833.104 511.631 779.214 310.513C725.325 109.395 552.6 -41.9576 351.482 11.9319C150.364 65.8214 351.482 401.526 84.9007 505.664Z" fill="#FBDABF" />
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- start accordeons rendez-vous -->
        <section class="wpo-faq-section section-padding orange">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-12">
                        <div class="wpo-faq-section">
                            <div class="row">
                                <div class="col-lg-12 col-12">
                                    <div class="wpo-benefits-item">
                                        <div class="accordion" id="accordionRDV">

                                            <!-- Adoption Chat -->
                                            <div class="accordion-item">
                                                <h3 class="accordion-header" id="headingRdvChat">
                                                    <button class="accordion-button" type="button"
                                                        data-bs-toggle="collapse" data-bs-target="#rdvChat"
                                                        aria-expanded="true" aria-controls="rdvChat">
                                                        Adoption Chat
                                                    </button>
                                                </h3>
                                                <div id="rdvChat" class="accordion-collapse collapse show"
                                                    aria-labelledby="headingRdvChat" data-bs-parent="#accordionRDV">
                                                    <div class="accordion-body">
                                                        <p>Avant de prendre rendez-vous, assurez-vous d'avoir rempli le formulaire d'adoption. Le formulaire est obligatoire pour toute demande de rencontre avec nos chats.</p>
                                                        <div class="rdv-buttons">
                                                            <a href="<?php echo home_url('/formulaire-adoption'); ?>" class="theme-btn-s2">Formulaire d'adoption</a>
                                                            <a href="<?php echo home_url('/quiz-adoption'); ?>" class="theme-btn-s2">Quiz Adoption</a>
                                                            <a href="<?php echo home_url('/adoption'); ?>" class="theme-btn-s2">Page Adoption</a>
                                                        </div>
                                                        <?php if ($adoption_form_done) : ?>
                                                        <div class="rdv-calendar">
                                                            <!-- Calendly inline widget - Adoption Chat -->
                                                            <div class="calendly-inline-widget" data-url="https://calendly.com/oliver-vdb/30min?locale=fr" style="min-width:320px;height:700px;"></div>
                                                        </div>
                                                        <?php else : ?>
                                                        <div class="rdv-locked">
                                                            <i class="fas fa-lock"></i>
                                                            <p>Vous devez d'abord remplir le <strong>formulaire d'adoption</strong> avant de pouvoir prendre rendez-vous.</p>
                                                            <p>Lorsque vous aurez complété le formulaire, le calendrier des rendez-vous apparaîtra juste ici.</p>
                                                            <a href="<?php echo home_url('/formulaire-adoption'); ?>" class="theme-btn-s2">Remplir le formulaire</a>
                                                        </div>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Adoption Chaton -->
                                            <div class="accordion-item">
                                                <h3 class="accordion-header" id="headingRdvChaton">
                                                    <button class="accordion-button collapsed" type="button"
                                                        data-bs-toggle="collapse" data-bs-target="#rdvChaton"
                                                        aria-expanded="false" aria-controls="rdvChaton">
                                                        Adoption Chaton
                                                    </button>
                                                </h3>
                                                <div id="rdvChaton" class="accordion-collapse collapse"
                                                    aria-labelledby="headingRdvChaton" data-bs-parent="#accordionRDV">
                                                    <div class="accordion-body">
                                                        <p>Avant de prendre rendez-vous, assurez-vous d'avoir rempli le formulaire d'adoption. Le formulaire est obligatoire pour toute demande de rencontre avec nos chatons.</p>
                                                        <div class="rdv-buttons">
                                                            <a href="<?php echo home_url('/formulaire-adoption'); ?>" class="theme-btn-s2">Formulaire d'adoption</a>
                                                            <a href="<?php echo home_url('/quiz-adoption'); ?>" class="theme-btn-s2">Quiz Adoption</a>
                                                            <a href="<?php echo home_url('/adoption'); ?>" class="theme-btn-s2">Page Adoption</a>
                                                        </div>
                                                        <?php if ($adoption_form_done) : ?>
                                                        <div class="rdv-calendar">
                                                            <!-- Calendly inline widget - Adoption Chaton -->
                                                            <div class="calendly-inline-widget" data-url="https://calendly.com/oliver-vdb/30min?locale=fr" style="min-width:320px;height:700px;"></div>
                                                        </div>
                                                        <?php else : ?>
                                                        <div class="rdv-locked">
                                                            <i class="fas fa-lock"></i>
                                                            <p>Vous devez d'abord remplir le <strong>formulaire d'adoption</strong> avant de pouvoir prendre rendez-vous.</p>
                                                            <p>Lorsque vous aurez complété le formulaire, le calendrier des rendez-vous apparaîtra juste ici.</p>
                                                            <a href="<?php echo home_url('/formulaire-adoption'); ?>" class="theme-btn-s2">Remplir le formulaire</a>
                                                        </div>
                                                        <?php endif; ?>
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
            </div>
        </section>
        <!-- end accordeons rendez-vous -->

        <!-- Calendly script -->
        <script type="text/javascript" src="https://assets.calendly.com/assets/external/widget.js" async></script>

<?php get_template_part("partials/footer"); ?>
