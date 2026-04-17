<?php get_template_part("partials/header"); ?>

        <!-- start of hero-section -->
        <section class="hero-section">
            <div class="hero-content">
                <div class="hero-text">
                    <?php
                    // Récupérer le contenu Titre & Texte du slider
                    $texte_query = new WP_Query(array(
                        'post_type' => 'slider',
                        'posts_per_page' => 1,
                        'meta_query' => array(
                            array(
                                'key' => 'slider_type',
                                'value' => 'texte',
                            ),
                        ),
                    ));
                    if ($texte_query->have_posts()) : while ($texte_query->have_posts()) : $texte_query->the_post();
                    ?>
                    <h3><?php the_field('slider_titre'); ?></h3>
                    <p><?php the_field('slider_texte'); ?></p>
                    <?php endwhile; endif; wp_reset_postdata(); ?>
                    <div class="hero-cta-row">
                        <a href="<?php echo home_url('/don'); ?>" class="theme-btn-s2">Faites un don</a>
                        <a href="#services" class="hero-scroll-arrow" aria-label="Défiler vers le bas">
                            <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                                <line x1="12" y1="5" x2="12" y2="19"></line>
                                <polyline points="19 12 12 19 5 12"></polyline>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
            <div class="hero-slider">
                <div class="hero-slider-main">
                    <?php
                    // Récupérer les images principales
                    $images_main_query = new WP_Query(array(
                        'post_type' => 'slider',
                        'posts_per_page' => 1,
                        'meta_query' => array(
                            array(
                                'key' => 'slider_type',
                                'value' => 'images_main',
                            ),
                        ),
                    ));
                    if ($images_main_query->have_posts()) : while ($images_main_query->have_posts()) : $images_main_query->the_post();
                        $images_main = get_field('slider_images_main');
                        if ($images_main) :
                            foreach ($images_main as $image) :
                    ?>
                    <div class="item">
                        <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>">
                    </div>
                    <?php
                            endforeach;
                        endif;
                    endwhile; endif; wp_reset_postdata();
                    ?>
                </div>
                <div class="hero-slider-thumb">
                    <?php
                    // Récupérer les images miniatures
                    $images_thumb_query = new WP_Query(array(
                        'post_type' => 'slider',
                        'posts_per_page' => 1,
                        'meta_query' => array(
                            array(
                                'key' => 'slider_type',
                                'value' => 'images_thumb',
                            ),
                        ),
                    ));
                    if ($images_thumb_query->have_posts()) : while ($images_thumb_query->have_posts()) : $images_thumb_query->the_post();
                        $images_thumb = get_field('slider_images_thumb');
                        if ($images_thumb) :
                            foreach ($images_thumb as $image) :
                    ?>
                    <div class="item">
                        <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>">
                    </div>
                    <?php
                            endforeach;
                        endif;
                    endwhile; endif; wp_reset_postdata();
                    ?>
                </div>
            </div>
            <div class="paw-1">
                <img src="<?php bloginfo('template_url'); ?>/assets/images/slider/shape-1.svg" alt="">
            </div>
            <div class="paw-2">
                <img src="<?php bloginfo('template_url'); ?>/assets/images/slider/shape-2.svg" alt="">
            </div>
            <div class="paw-3">
                <img src="<?php bloginfo('template_url'); ?>/assets/images/slider/shape-3.svg" alt="">
            </div>
            <div class="paw-4">
                <img src="<?php bloginfo('template_url'); ?>/assets/images/slider/shape-4.svg" alt="">
            </div>
        </section>

        <!-- start of services-section -->
        <section id="services" class="services-section section-padding">
            <div class="wraper">
                <?php
                // Récupérer le contenu Services de la page accueil
                $services_query = new WP_Query(array(
                    'post_type' => 'page_accueil',
                    'posts_per_page' => 1,
                    'meta_query' => array(
                        array(
                            'key' => 'accueil_type',
                            'value' => 'services',
                        ),
                    ),
                ));
                if ($services_query->have_posts()) : while ($services_query->have_posts()) : $services_query->the_post();
                    $icons = array('1.svg', '2.svg', '4.svg', '3.svg');
                    for ($i = 1; $i <= 4; $i++) :
                        $titre = get_field('services_titre_' . $i);
                        $texte = get_field('services_texte_' . $i);
                        if ($titre) :
                ?>
                <div class="col">
                    <div class="item">
                        <div class="icon">
                            <img src="<?php bloginfo('template_url'); ?>/assets/images/service/<?php echo $icons[$i-1]; ?>" alt="">
                        </div>
                        <div class="content">
                            <h2><a href="<?php echo home_url('/benevole'); ?>"><?php echo esc_html($titre); ?></a></h2>
                            <p><?php echo esc_html($texte); ?></p>
                        </div>
                    </div>
                </div>
                <?php
                        endif;
                    endfor;
                endwhile; endif; wp_reset_postdata();
                ?>
            </div>
        </section>

        <!-- start of about-section -->
        <section class="about-section section-padding pt-0 homepage-apropos">
            <?php
            // Récupérer le contenu A propos de la page accueil
            $apropos_query = new WP_Query(array(
                'post_type' => 'page_accueil',
                'posts_per_page' => 1,
                'meta_query' => array(
                    array(
                        'key' => 'accueil_type',
                        'value' => 'apropos',
                    ),
                ),
            ));
            if ($apropos_query->have_posts()) : while ($apropos_query->have_posts()) : $apropos_query->the_post();
            ?>
            <div class="wraper">
                <div class="left">
                    <div class="image">
                         <img src="<?php bloginfo('template_url'); ?>/assets/images/images/illustrations/20_tiger cat.png" alt="" >
                        <div class="shape">
                            <svg width="793" height="786" viewBox="0 0 793 786" fill="none">
                                <path
                                    d="M84.9007 505.664C-181.681 609.802 245.585 843.801 512.633 772.246C713.751 718.356 833.104 511.631 779.214 310.513C725.325 109.395 552.6 -41.9576 351.482 11.9319C150.364 65.8214 351.482 401.526 84.9007 505.664Z"
                                    fill="#FFEFEB" />
                            </svg>
                        </div>
                    </div>
                    <div class="about-video">
                        <div class="icon">
                            <img src="<?php bloginfo('template_url'); ?>/assets/images/ab-icon.png" alt="">
                        </div>
                        <h2><?php the_field('apropos_titre_encart'); ?></h2>
                        <p><?php the_field('apropos_texte_encart'); ?></p>
                        <?php $video_url = get_field('apropos_video_encart'); if ($video_url) : ?>
                        <div class="video-holder">
                            <a href="<?php echo esc_url($video_url); ?>" class="video-btn-link" target="_blank" rel="noopener">
                                <svg width="33" height="36" viewBox="0 0 33 36" fill="none">
                                    <path
                                        d="M30.5 13.6699C33.8333 15.5944 33.8333 20.4056 30.5 22.3301L8 35.3205C4.66667 37.245 0.499998 34.8394 0.499998 30.9904L0.499999 5.00962C0.5 1.16062 4.66667 -1.24501 8 0.679491L30.5 13.6699Z"
                                        fill="white" />
                                </svg>
                            </a>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="right">
                    <span>A Propos</span>
                    <h2><?php the_field('apropos_titre'); ?></h2>
                    <p><?php the_field('apropos_texte'); ?></p>

                    <div class="about-btn">
                        <a href="<?php echo home_url("/service-single2"); ?>" class="theme-btn-s2">Adoptez un chat</a>
                    </div>
                </div>
            </div>
            <div class="mobile-only-illustration">
                <div class="image">
                    <img src="<?php bloginfo('template_url'); ?>/assets/images/images/illustrations/20_tiger cat.png" alt="">
                    <div class="shape">
                        <svg width="793" height="786" viewBox="0 0 793 786" fill="none">
                            <path d="M84.9007 505.664C-181.681 609.802 245.585 843.801 512.633 772.246C713.751 718.356 833.104 511.631 779.214 310.513C725.325 109.395 552.6 -41.9576 351.482 11.9319C150.364 65.8214 351.482 401.526 84.9007 505.664Z" fill="#FFEFEB" />
                        </svg>
                    </div>
                </div>
            </div>
            <?php endwhile; endif; wp_reset_postdata(); ?>
            <div class="shape">
                <img src="<?php bloginfo('template_url'); ?>/assets/images/paws-6.png" alt="">
            </div>
            <div class="shape-2">
                <img src="<?php bloginfo('template_url'); ?>/assets/images/paws-7.png" alt="">
            </div>
        </section>

        <!-- start of engagement-section -->
        <section class="engagement-section section-padding">
            <div class="container">
                <?php
                // Récupérer le contenu Dons & Adoptions de la page accueil
                $dons_query = new WP_Query(array(
                    'post_type' => 'page_accueil',
                    'posts_per_page' => 1,
                    'meta_query' => array(
                        array(
                            'key' => 'accueil_type',
                            'value' => 'dons_adoptions',
                        ),
                    ),
                ));
                if ($dons_query->have_posts()) : while ($dons_query->have_posts()) : $dons_query->the_post();
                ?>
                <div class="row justify-content-center">
                    <div class="col-lg-6 col-12">
                        <div class="section-title">
                            <h3>Dons & Adoptions</h3>
                            <h2><?php the_field('dons_titre_section'); ?></h2>
                        </div>
                    </div>
                </div>
                <div class="engagement-cards row g-0 align-items-center">
                    <?php
                    $cards = array(
                        array('titre' => 'dons_titre_adoption', 'texte' => 'dons_texte_adoption', 'lien' => '/adoption', 'btn' => 'Adoptez un chat'),
                        array('titre' => 'dons_titre_don', 'texte' => 'dons_texte_don', 'lien' => '/don', 'btn' => 'Faites un don'),
                        array('titre' => 'dons_titre_benevole', 'texte' => 'dons_texte_benevole', 'lien' => '/benevole', 'btn' => 'Devenez bénévole'),
                    );
                    foreach ($cards as $card) :
                        $texte = get_field($card['texte']);
                        $lignes = preg_split('/\r\n|\r|\n/', $texte);
                        $lignes = array_filter(array_map('trim', $lignes), function($l) { return $l !== ''; });
                    ?>
                    <div class="col col-lg-4 col-md-6 col-12">
                        <div class="engagement-card">
                            <h2><?php the_field($card['titre']); ?></h2>
                            <div class="engagement-icon"></div>
                            <ul class="engagement-features">
                                <?php foreach ($lignes as $ligne) : ?>
                                <li><?php echo esc_html($ligne); ?></li>
                                <?php endforeach; ?>
                            </ul>
                            <a href="<?php echo home_url($card['lien']); ?>" class="theme-btn-s2"><?php echo $card['btn']; ?></a>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
                <?php endwhile; endif; wp_reset_postdata(); ?>
            </div>
        </section>

        <!-- start of temoignages-section -->
        <section class="temoignages-section section-padding">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6 col-12">
                        <div class="section-title">
                            <h2>Un mot de nos adoptants</h2>
                        </div>
                    </div>
                </div>
                <div class="row align-items-center">
                    <div class="col-lg-6 col-12">
                        <div class="temoignages-image">
                            <img src="<?php bloginfo('template_url'); ?>/assets/images/images/illustrations/10_naughty cat.png" alt="">
                            <div class="shape">
                                <svg viewBox="0 0 932 866" fill="none">
                                    <path
                                        d="M809.592 217.287C836.009 315.879 817.135 440.087 766.796 546.355C716.445 652.649 634.907 740.4 536.578 766.747C339.293 819.609 136.508 702.532 83.6458 505.246C57.2312 406.666 77.0482 320.935 128.016 253.209C179.036 185.413 261.413 135.488 360.331 108.983C459.684 82.3613 559.022 60.3667 640.086 69.6483C680.555 74.2818 716.32 86.6978 745.237 110.108C774.137 133.505 796.397 168.045 809.592 217.287Z"
                                        stroke="#FABE3D" stroke-width="5" />
                                    <path
                                        d="M772.667 241.253C819.838 417.297 705.161 683.804 529.117 730.975C353.074 778.146 172.122 673.674 124.952 497.63C77.7809 321.586 195.712 190.863 371.756 143.692C547.799 96.5215 725.496 65.2093 772.667 241.253Z"
                                        fill="#FFF7E5" />
                                    <mask id="mask0_1346_138" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="114"
                                        y="106" width="670" height="637">
                                        <path
                                            d="M772.667 241.253C819.838 417.297 705.161 683.804 529.117 730.975C353.074 778.146 172.122 673.674 124.952 497.63C77.7809 321.586 195.712 190.863 371.756 143.692C547.799 96.5215 725.496 65.2093 772.667 241.253Z"
                                            fill="#FFF7E5" />
                                    </mask>
                                    <g mask="url(#mask0_1346_138)">
                                    </g>
                                </svg>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-12">
                        <div class="temoignages-slider owl-carousel">
                            <?php
                            $temoignages_cpt = new WP_Query(array(
                                'post_type' => 'temoignage',
                                'posts_per_page' => -1,
                                'post_status' => 'publish',
                                'orderby' => 'date',
                                'order' => 'DESC',
                            ));
                            if ($temoignages_cpt->have_posts()) :
                                while ($temoignages_cpt->have_posts()) : $temoignages_cpt->the_post();
                                    $t_nom = get_field('temoignage_nom');
                                    $t_chat = get_field('temoignage_chat');
                                    $t_texte = get_the_content();
                            ?>
                            <div class="item">
                                <div class="icon">
                                    <img src="<?php bloginfo('template_url'); ?>/assets/images/testimonial-icon.svg" alt="">
                                </div>
                                <h3><?php echo esc_html($t_texte); ?></h3>
                                <div class="client-wrap">
                                    <div class="text">
                                        <h4><?php echo esc_html($t_nom); ?></h4>
                                        <span>A adopté <?php echo esc_html($t_chat); ?></span>
                                    </div>
                                </div>
                            </div>
                            <?php
                                endwhile;
                                wp_reset_postdata();
                            endif;
                            ?>
                        </div>
                    </div>
                    </div>
                </div>
                <style>
                    .temoignages-section .client-wrap .text { margin-left: 0 !important; }
                    .temoignages-section .client-wrap .text h4 { margin-top: 0 !important; }
                    .temoignages-section .owl-nav { margin-bottom: 90px; margin-top: 20px; }
                    .temoignages-section { padding-bottom: 0; }
                </style>
                <div class="row">
                    <div class="col-lg-6 col-12" style="margin-left: auto;">
                        <button class="theme-btn-s2" id="openTemoignageModal">Partagez votre témoignage</button>
                    </div>
                </div>
            </div>
            <div class="shape-1">
                <img src="<?php bloginfo('template_url'); ?>/assets/images/paws-7.png" alt="">
            </div>
            <div class="shape-2">
                <img src="<?php bloginfo('template_url'); ?>/assets/images/paws-6.png" alt="">
            </div>
        </section>

        <!-- Popup Témoignage -->
        <div class="temoignage-modal" id="temoignageModal">
            <div class="temoignage-modal__overlay"></div>
            <div class="temoignage-modal__content">
                <button class="temoignage-modal__close" aria-label="Fermer"><i class="fas fa-times"></i></button>
                <div id="temoignageIntro">
                    <h2>Partagez votre expérience</h2>
                    <p style="color: #666; margin-bottom: 24px;">Vous avez adopté un chat au Fanal des Chats ? Racontez-nous comment se passe la vie avec votre nouveau compagnon !</p>
                </div>
                <form id="temoignageForm">
                    <div class="temoignage-modal__field">
                        <label for="temoignage_nom">Votre nom *</label>
                        <input type="text" id="temoignage_nom" name="nom" required placeholder="Ex: Marie Dupont">
                    </div>
                    <div class="temoignage-modal__field">
                        <label for="temoignage_chat">Nom du chat adopté *</label>
                        <input type="text" id="temoignage_chat" name="chat" required placeholder="Ex: Moustache">
                    </div>
                    <div class="temoignage-modal__field">
                        <label for="temoignage_texte">Votre témoignage *</label>
                        <textarea id="temoignage_texte" name="texte" rows="5" required placeholder="Racontez votre expérience d'adoption..."></textarea>
                    </div>
                    <button type="submit" class="theme-btn-s2" id="submitTemoignage" style="width: 100%;">Envoyer mon témoignage</button>
                </form>
                <div id="temoignageSuccess" style="display: none; text-align: center; padding: 20px 0;">
                    <i class="fas fa-check-circle" style="font-size: 48px; color: #28a745; margin-bottom: 16px; display: block;"></i>
                    <h3 style="color: #070143;">Merci pour votre témoignage !</h3>
                    <p style="color: #666;">Votre message sera publié sur le site après validation par notre équipe.</p>
                    <p style="color: #666;">Nous vous souhaitons beaucoup de bonheur avec votre compagnon à quatre pattes. Prenez bien soin de lui !</p>
                </div>
            </div>
        </div>

        <style>
            /* Popup Témoignage */
            .temoignage-modal {
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
            .temoignage-modal.is-open {
                display: flex;
            }
            .temoignage-modal__overlay {
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background: rgba(0, 0, 0, 0.6);
                backdrop-filter: blur(4px);
            }
            .temoignage-modal__content {
                position: relative;
                background: #fff;
                border-radius: 16px;
                max-width: 500px;
                width: 90%;
                max-height: 90vh;
                overflow-y: auto;
                padding: 40px 32px;
                box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
                z-index: 1;
            }
            .temoignage-modal__content h2 {
                color: #070143;
                margin-bottom: 8px;
                font-size: 1.5rem;
            }
            .temoignage-modal__close {
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
            .temoignage-modal__close:hover {
                background: rgba(0, 0, 0, 0.12);
            }
            .temoignage-modal__field {
                margin-bottom: 16px;
            }
            .temoignage-modal__field label {
                display: block;
                font-weight: 600;
                color: #333;
                margin-bottom: 6px;
                font-size: 0.9rem;
            }
            .temoignage-modal__field input,
            .temoignage-modal__field textarea {
                width: 100%;
                padding: 10px 14px;
                border: 1px solid #ddd;
                border-radius: 8px;
                font-size: 0.95rem;
                font-family: inherit;
                transition: border-color 0.2s;
            }
            .temoignage-modal__field input:focus,
            .temoignage-modal__field textarea:focus {
                outline: none;
                border-color: #FF5B2E;
            }
            @media (max-width: 480px) {
                .temoignage-modal__content {
                    padding: 24px 16px;
                }
            }
        </style>

        <script>
        document.addEventListener('DOMContentLoaded', function() {
            var modal = document.getElementById('temoignageModal');
            var openBtn = document.getElementById('openTemoignageModal');

            // Ouvrir
            openBtn.addEventListener('click', function() {
                modal.classList.add('is-open');
                document.body.style.overflow = 'hidden';
            });

            // Fermer
            modal.querySelector('.temoignage-modal__overlay').addEventListener('click', closeModal);
            modal.querySelector('.temoignage-modal__close').addEventListener('click', closeModal);
            document.addEventListener('keydown', function(e) {
                if (e.key === 'Escape' && modal.classList.contains('is-open')) closeModal();
            });

            function closeModal() {
                modal.classList.remove('is-open');
                document.body.style.overflow = '';
            }

            // Soumission
            document.getElementById('temoignageForm').addEventListener('submit', function(e) {
                e.preventDefault();
                var btn = document.getElementById('submitTemoignage');
                btn.disabled = true;
                btn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Envoi en cours...';

                var formData = new FormData();
                formData.append('action', 'submit_temoignage');
                formData.append('nonce', '<?php echo wp_create_nonce("temoignage_nonce"); ?>');
                formData.append('nom', document.getElementById('temoignage_nom').value);
                formData.append('chat', document.getElementById('temoignage_chat').value);
                formData.append('texte', document.getElementById('temoignage_texte').value);

                fetch('<?php echo admin_url("admin-ajax.php"); ?>', {
                    method: 'POST',
                    body: formData
                })
                .then(function(r) { return r.json(); })
                .then(function(data) {
                    document.getElementById('temoignageIntro').style.display = 'none';
                    document.getElementById('temoignageForm').style.display = 'none';
                    document.getElementById('temoignageSuccess').style.display = 'block';
                })
                .catch(function() {
                    document.getElementById('temoignageIntro').style.display = 'none';
                    document.getElementById('temoignageForm').style.display = 'none';
                    document.getElementById('temoignageSuccess').style.display = 'block';
                });
            });
        });
        </script>

        <!-- start of newsletter-section -->
        <section class="newsletter-section">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8 col-12">
                        <h2>Inscrivez-vous à notre revue</h2>
                        <div class="newsletter-form">
                            <input type="email" placeholder="Votre mail">
                            <button>S'abonner</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="image">
                <!-- <img src="<?php bloginfo('template_url'); ?>/assets/images/cta.png" alt=""> -->
                <img src="<?php bloginfo('template_url'); ?>/assets/images/images/illustrations/1_meow cat.png" alt="">
            </div>
            <div class="shape">
                <img src="<?php bloginfo('template_url'); ?>/assets/images/paws-10.png" alt="">
            </div>
            <div class="shape-2">
                <img src="<?php bloginfo('template_url'); ?>/assets/images/paws-11.png" alt="">
            </div>
        </section>

        <!-- start of actualites-section -->
        <section class="actualites-section section-padding">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6 col-12">
                        <div class="section-title">
                            <h2>News</h2>
                        </div>
                    </div>
                </div>
                <div class="row actualites-grid">
                    <?php
                    $news_query = new WP_Query(array(
                        'post_type' => 'histoire',
                        'posts_per_page' => 3,
                        'orderby' => 'date',
                        'order' => 'DESC',
                    ));
                    if ($news_query->have_posts()) :
                        while ($news_query->have_posts()) : $news_query->the_post();
                            $categories = get_the_terms(get_the_ID(), 'categorie_histoire');
                            $cat_name = ($categories && !is_wp_error($categories)) ? $categories[0]->name : 'News';
                            $date = get_the_date('M d, Y');
                            $link = get_permalink();
                            $excerpt = get_the_excerpt();
                    ?>
                    <div class="col col-lg-4 col-md-6 col-12">
                        <div class="actualite-card">
                            <div class="image">
                                <a href="<?php echo esc_url($link); ?>">
                                    <?php if (has_post_thumbnail()) : ?>
                                        <?php the_post_thumbnail('medium_large', array('alt' => get_the_title())); ?>
                                    <?php else : ?>
                                        <img src="<?php bloginfo('template_url'); ?>/assets/images/images/illustrations/3_cute cat.png" alt="<?php the_title(); ?>">
                                    <?php endif; ?>
                                </a>
                            </div>
                            <div class="content">
                                <ul class="date">
                                    <li><?php echo esc_html($cat_name); ?></li>
                                    <li><?php echo esc_html($date); ?></li>
                                </ul>
                                <h2><a href="<?php echo esc_url($link); ?>"><?php the_title(); ?></a></h2>
                                <p><?php echo esc_html($excerpt); ?></p>
                            </div>
                        </div>
                    </div>
                    <?php
                        endwhile;
                        wp_reset_postdata();
                    endif;
                    ?>
                </div>
            </div>
        </section>

<?php get_template_part("partials/footer"); ?>
