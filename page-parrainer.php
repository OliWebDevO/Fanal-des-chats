<?php get_template_part("partials/header"); ?>

        <!-- start wpo-page-title -->
        <div class="space"></div>
        <section class="wpo-page-title orange">
            <div class="container">
                <div class="row">
                    <div class="col col-xs-12">
                        <div class="wpo-breadcumb-wrap">
                            <h2>Parrainer un chat</h2>
                            <ol class="wpo-breadcumb-wrap">
                                <li><a href="<?php echo home_url('/'); ?>">Accueil</a></li>
                                <li>Parrainer un chat</li>
                            </ol>
                        </div>
                    </div>
                </div> <!-- end row -->
            </div> <!-- end container -->
        </section>
        <!-- end page-title -->

        <!-- Intro section : texte gauche, illustration droite -->
        <section class="about-section section-padding orange benevole-block">
            <div class="wraper">
                <div class="right">
                    <span class="section-label">Parrainage</span>
                    <h2>Offrez votre soutien à un chat du refuge</h2>
                    <p>En parrainant un chat du Fanal des Chats, vous contribuez directement à ses soins quotidiens, sa nourriture et ses frais vétérinaires. Chaque parrainage fait une réelle différence dans la vie de nos pensionnaires.</p>
                    <p>Parcourez les profils de nos chats ci-dessous et cliquez sur celui que vous souhaitez parrainer pour effectuer un don en son nom.</p>
                </div>
                <div class="left">
                    <div class="image">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/images/illustrations/7_pretty cat.png" alt="Chat du refuge">
                        <div class="shape">
                            <svg width="793" height="786" viewBox="0 0 793 786" fill="none">
                                <path d="M84.9007 505.664C-181.681 609.802 245.585 843.801 512.633 772.246C713.751 718.356 833.104 511.631 779.214 310.513C725.325 109.395 552.6 -41.9576 351.482 11.9319C150.364 65.8214 351.482 401.526 84.9007 505.664Z" fill="#FBDABF" />
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Galerie des chats à parrainer -->
        <section class="wpo-team-section section-padding orange">
            <div class="container">
                <div class="row">
                    <?php
                    $chats_query = new WP_Query(array(
                        'post_type' => 'chat_parrainage',
                        'posts_per_page' => -1,
                        'orderby' => 'date',
                        'order' => 'DESC',
                    ));

                    if ($chats_query->have_posts()) :
                        while ($chats_query->have_posts()) : $chats_query->the_post();
                            $description = get_field('parrainage_description');
                            $description_longue = get_field('parrainage_description_longue');
                            $sexe = get_field('parrainage_sexe');
                            $age = get_field('parrainage_age');
                            $impact = get_field('parrainage_impact');
                            $chat_name = get_the_title();
                            $chat_id = get_the_ID();
                    ?>
                    <div class="col-lg-4 col-md-6 col-12 mb-4">
                        <div class="parrainage-card-link" data-chat="<?php echo $chat_id; ?>" style="cursor: pointer;">
                            <div class="wpo-team-wrap">
                                <div class="wpo-team-img">
                                    <?php if (has_post_thumbnail()) : ?>
                                        <?php the_post_thumbnail('medium_large', array('style' => 'width: 100%; height: 300px; object-fit: contain; padding: 15px;')); ?>
                                    <?php else : ?>
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/images/illustrations/3_cute cat.png" alt="<?php the_title(); ?>" style="width: 100%; height: 300px; object-fit: contain; padding: 15px;">
                                    <?php endif; ?>
                                </div>
                                <div class="wpo-team-text" style="padding: 20px; text-align: center;">
                                    <h3 style="margin-bottom: 5px;"><?php the_title(); ?></h3>
                                    <?php if ($sexe) : ?>
                                        <span style="color: #FF5B2E; font-size: 18px; font-weight: 700; display: inline-block; margin-bottom: 5px;"><?php echo $sexe === 'male' ? '<i class="fas fa-mars"></i>' : '<i class="fas fa-venus"></i>'; ?></span>
                                    <?php endif; ?>
                                    <?php if ($age) : ?>
                                        <span style="color: #e8804c; font-weight: 600; display: block; margin-bottom: 10px;"><?php echo esc_html($age); ?></span>
                                    <?php endif; ?>
                                    <?php if ($description) : ?>
                                        <p style="font-size: 14px; color: #666; margin-bottom: 15px;"><?php echo esc_html($description); ?></p>
                                    <?php endif; ?>
                                    <span class="theme-btn-s2" style="display: inline-block; padding: 8px 25px; font-size: 14px;">Parrainer <i class="fas fa-heart"></i></span>
                                </div>
                            </div>
                        </div>

                        <!-- Popup pour ce chat -->
                        <div class="parrainage-modal" id="modal-<?php echo $chat_id; ?>">
                            <div class="parrainage-modal__overlay"></div>
                            <div class="parrainage-modal__content">
                                <button class="parrainage-modal__close" aria-label="Fermer"><i class="fas fa-times"></i></button>
                                <div class="parrainage-modal__body">
                                    <div class="parrainage-modal__image">
                                        <?php if (has_post_thumbnail()) : ?>
                                            <?php the_post_thumbnail('large', array('alt' => esc_attr($chat_name))); ?>
                                        <?php else : ?>
                                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/images/illustrations/3_cute cat.png" alt="<?php echo esc_attr($chat_name); ?>">
                                        <?php endif; ?>
                                    </div>
                                    <div class="parrainage-modal__info">
                                        <h2><?php echo esc_html($chat_name); ?></h2>
                                        <?php if ($age) : ?>
                                            <span class="parrainage-modal__age"><?php echo esc_html($age); ?></span>
                                        <?php endif; ?>

                                        <?php if ($description_longue) : ?>
                                            <div class="parrainage-modal__section">
                                                <h3><i class="fas fa-cat"></i> Qui est <?php echo esc_html($chat_name); ?> ?</h3>
                                                <p><?php echo nl2br(esc_html($description_longue)); ?></p>
                                            </div>
                                        <?php endif; ?>

                                        <?php if ($impact) : ?>
                                            <div class="parrainage-modal__section">
                                                <h3><i class="fas fa-heart"></i> L'impact de votre parrainage</h3>
                                                <p><?php echo nl2br(esc_html($impact)); ?></p>
                                            </div>
                                        <?php endif; ?>

                                        <div class="parrainage-modal__section parrainage-modal__how">
                                            <h3><i class="fas fa-info-circle"></i> Comment parrainer <?php echo esc_html($chat_name); ?> ?</h3>
                                            <p>Le parrainage se fait via un <strong>ordre permanent</strong> du montant de votre choix vers le compte du Fanal des Chats :</p>
                                            <div class="parrainage-modal__bank">
                                                <p><strong>Le Fanal des Chats ASBL</strong></p>
                                                <p><strong>IBAN :</strong> BE16 0682 0580 9674</p>
                                                <p><strong>BIC :</strong> GKCCBEBB</p>
                                                <p><strong>Communication :</strong> Parrainage <?php echo esc_html($chat_name); ?></p>
                                            </div>
                                            <p>Si la situation de <?php echo esc_html($chat_name); ?> venait à changer (adoption, décès), votre parrainage serait automatiquement redirigé vers un autre pensionnaire du refuge qui en a besoin.</p>
                                            <p class="parrainage-modal__note" style="margin-top: 12px;">Chaque euro compte. Merci pour votre soutien <i class="fas fa-paw"></i></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                        endwhile;
                        wp_reset_postdata();
                    else :
                    ?>
                    <div class="col-12 text-center">
                        <div class="wpo-service-single-item">
                            <p>Aucun chat n'est disponible au parrainage pour le moment. Revenez bientôt !</p>
                            <div class="about-btn">
                                <a href="<?php echo home_url('/don'); ?>" class="theme-btn-s2">Faites un don général</a>
                            </div>
                        </div>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </section>

        <style>
            /* Cards */
            .parrainage-card-link:hover .wpo-team-wrap {
                transform: translateY(-5px);
                box-shadow: 0 10px 30px rgba(0,0,0,0.15);
            }
            .wpo-team-wrap {
                border-radius: 10px;
                overflow: hidden;
                box-shadow: 0 2px 15px rgba(0,0,0,0.08);
                background: #fff;
                transition: transform 0.3s ease, box-shadow 0.3s ease;
            }
            .wpo-team-img {
                background: #f8f4f0;
            }

            /* Modal overlay */
            .parrainage-modal {
                display: none;
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                z-index: 99999;
                align-items: center;
                justify-content: center;
            }
            .parrainage-modal.is-open {
                display: flex;
            }
            .parrainage-modal__overlay {
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background: rgba(0, 0, 0, 0.6);
                backdrop-filter: blur(4px);
            }

            /* Modal content */
            .parrainage-modal__content {
                position: relative;
                background: #fff;
                border-radius: 16px;
                max-width: 800px;
                width: 90%;
                max-height: 90vh;
                overflow-y: auto;
                box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
                z-index: 1;
            }
            .parrainage-modal__close {
                position: absolute;
                top: 16px;
                right: 16px;
                background: rgba(0, 0, 0, 0.06);
                border: none;
                width: 40px;
                height: 40px;
                border-radius: 50%;
                font-size: 18px;
                cursor: pointer;
                z-index: 2;
                display: flex;
                align-items: center;
                justify-content: center;
                color: #333;
                transition: background 0.2s;
            }
            .parrainage-modal__close:hover {
                background: rgba(0, 0, 0, 0.12);
            }

            /* Modal body */
            .parrainage-modal__body {
                display: flex;
                gap: 0;
            }
            .parrainage-modal__image {
                flex: 0 0 40%;
                background: #f8f4f0;
                display: flex;
                align-items: flex-start;
                justify-content: center;
                border-radius: 16px 0 0 16px;
                overflow: hidden;
            }
            .parrainage-modal__image img {
                width: 100%;
                height: 100%;
                object-fit: contain;
                object-position: center 10%;
                padding: 20px;
            }
            .parrainage-modal__info {
                flex: 1;
                padding: 40px 32px;
            }
            .parrainage-modal__info h2 {
                font-size: 1.75rem;
                color: #333;
                margin-bottom: 4px;
            }
            .parrainage-modal__age {
                color: #e8804c;
                font-weight: 600;
                font-size: 0.95rem;
                display: block;
                margin-bottom: 32px;
            }

            /* Sections */
            .parrainage-modal__section {
                margin-bottom: 32px;
            }
            .parrainage-modal__section h3 {
                font-size: 1rem;
                color: #333;
                margin-bottom: 8px;
            }
            .parrainage-modal__section h3 i {
                color: #FF5B2E;
                margin-right: 8px;
            }
            .parrainage-modal__section p {
                font-size: 0.9rem;
                color: #555;
                line-height: 1.6;
                margin: 0;
            }

            /* Bank info box */
            .parrainage-modal__bank {
                background: #FFF5EF;
                border-left: 4px solid #FF5B2E;
                padding: 16px 20px;
                border-radius: 0 8px 8px 0;
                margin: 12px 0;
            }
            .parrainage-modal__bank p {
                margin: 4px 0;
                font-size: 0.9rem;
                color: #333;
            }
            .parrainage-modal__note {
                margin-top: 24px;
                font-style: italic;
                color: #888 !important;
                font-size: 0.85rem !important;
            }

            /* Responsive: tablet */
            @media (max-width: 768px) {
                .parrainage-modal__body {
                    flex-direction: column;
                }
                .parrainage-modal__image {
                    flex: none;
                    height: 250px;
                    border-radius: 16px 16px 0 0;
                }
                .parrainage-modal__info {
                    padding: 24px 20px;
                }
                .parrainage-modal__content {
                    width: 95%;
                    max-height: 85vh;
                }
            }

            /* Responsive: mobile */
            @media (max-width: 480px) {
                .parrainage-modal__image {
                    height: 200px;
                }
                .parrainage-modal__info {
                    padding: 20px 16px;
                }
                .parrainage-modal__info h2 {
                    font-size: 1.4rem;
                }
            }
        </style>

        <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Open modal on card click
            document.querySelectorAll('.parrainage-card-link').forEach(function(card) {
                card.addEventListener('click', function() {
                    var chatId = this.getAttribute('data-chat');
                    var modal = document.getElementById('modal-' + chatId);
                    if (modal) {
                        modal.classList.add('is-open');
                        document.body.style.overflow = 'hidden';
                    }
                });
            });

            // Close modal on overlay click or close button
            document.querySelectorAll('.parrainage-modal__overlay, .parrainage-modal__close').forEach(function(el) {
                el.addEventListener('click', function() {
                    var modal = this.closest('.parrainage-modal');
                    modal.classList.remove('is-open');
                    document.body.style.overflow = '';
                });
            });

            // Close modal on Escape key
            document.addEventListener('keydown', function(e) {
                if (e.key === 'Escape') {
                    var openModal = document.querySelector('.parrainage-modal.is-open');
                    if (openModal) {
                        openModal.classList.remove('is-open');
                        document.body.style.overflow = '';
                    }
                }
            });
        });
        </script>

<?php get_template_part("partials/footer"); ?>
