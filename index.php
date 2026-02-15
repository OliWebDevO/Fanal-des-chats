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
                    <a href="<?php echo home_url('/don'); ?>" class="theme-btn-s2">Faire un don</a>
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
        <section class="services-section section-padding">
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
                            <a href="<?php echo esc_url(convert_youtube_to_embed($video_url)); ?>" class="video-btn" data-type="iframe">
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
            <?php endwhile; endif; wp_reset_postdata(); ?>
            <div class="shape">
                <img src="<?php bloginfo('template_url'); ?>/assets/images/paws-6.png" alt="">
            </div>
            <div class="shape-2">
                <img src="<?php bloginfo('template_url'); ?>/assets/images/paws-7.png" alt="">
            </div>
        </section>

        <!-- start of funfact-section -->
        <!-- <section class="funfact-section">
            <div class="section-top-image">
                <img src="assets/images/funfact/top-image.jpg" alt="">
            </div>
            <div class="container">
                <div class="row">
                    <div class="col col-lg-3 col-md-6 col-12">
                        <div class="item">
                            <div class="icon">
                                <img src="assets/images/funfact/1.svg" alt="">
                            </div>
                            <h2><span class="odometer" data-count="105">00</span> <span class="ico">+</span>
                            </h2>
                            <h3>Award Winning</h3>
                        </div>
                    </div>
                    <div class="col col-lg-3 col-md-6 col-12">
                        <div class="item">
                            <div class="icon">
                                <img src="assets/images/funfact/2.svg" alt="">
                            </div>
                            <h2><span class="odometer" data-count="50">00</span> <span class="ico">k</span>
                            </h2>
                            <h3>Happy Client</h3>
                        </div>
                    </div>
                    <div class="col col-lg-3 col-md-6 col-12">
                        <div class="item">
                            <div class="icon">
                                <img src="assets/images/funfact/3.svg" alt="">
                            </div>
                            <h2><span class="odometer" data-count="35">00</span> <span class="ico">+</span>
                            </h2>
                            <h3>Team Member</h3>
                        </div>
                    </div>
                    <div class="col col-lg-3 col-md-6 col-12">
                        <div class="item">
                            <div class="icon">
                                <img src="assets/images/funfact/4.svg" alt="">
                            </div>
                            <h2><span class="odometer" data-count="99">00</span> <span class="ico">%</span>
                            </h2>
                            <h3>Protection</h3>
                        </div>
                    </div>
                </div>
            </div>
        </section> -->

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
                        array('titre' => 'dons_titre_adoption', 'texte' => 'dons_texte_adoption', 'lien' => '/adoption', 'btn' => 'Adopter un chat'),
                        array('titre' => 'dons_titre_don', 'texte' => 'dons_texte_don', 'lien' => '/don', 'btn' => 'Faire un don'),
                        array('titre' => 'dons_titre_benevole', 'texte' => 'dons_texte_benevole', 'lien' => '/benevole', 'btn' => 'Devenir bénévole'),
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
                <?php
                // Récupérer le contenu Témoignages de la page accueil
                $temoignages_query = new WP_Query(array(
                    'post_type' => 'page_accueil',
                    'posts_per_page' => 1,
                    'meta_query' => array(
                        array(
                            'key' => 'accueil_type',
                            'value' => 'temoignages',
                        ),
                    ),
                ));
                if ($temoignages_query->have_posts()) : while ($temoignages_query->have_posts()) : $temoignages_query->the_post();
                ?>
                <div class="row justify-content-center">
                    <div class="col-lg-6 col-12">
                        <div class="section-title">
                            <h2><?php the_field('temoignages_titre'); ?></h2>
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
                            for ($i = 1; $i <= 5; $i++) :
                                $nom = get_field('temoignages_nom_' . $i);
                                $profession = get_field('temoignages_profession_' . $i);
                                $texte = get_field('temoignages_texte_' . $i);
                                $photo = get_field('temoignages_photo_' . $i);
                                if ($texte) :
                            ?>
                            <div class="item">
                                <div class="icon">
                                    <img src="<?php bloginfo('template_url'); ?>/assets/images/testimonial-icon.svg" alt="">
                                </div>
                                <h3><?php echo esc_html($texte); ?></h3>
                                <div class="client-wrap">
                                    <div class="image">
                                        <?php if ($photo) : ?>
                                        <img src="<?php echo esc_url($photo); ?>" alt="<?php echo esc_attr($nom); ?>">
                                        <?php else : ?>
                                        <img src="<?php bloginfo('template_url'); ?>/assets/images/images/portrait.avif" alt="">
                                        <?php endif; ?>
                                    </div>
                                    <div class="text">
                                        <h4><?php echo esc_html($nom); ?></h4>
                                        <span><?php echo esc_html($profession); ?></span>
                                    </div>
                                </div>
                            </div>
                            <?php
                                endif;
                            endfor;
                            ?>
                        </div>
                    </div>
                </div>
                <?php endwhile; endif; wp_reset_postdata(); ?>
            </div>
            <div class="shape-1">
                <img src="<?php bloginfo('template_url'); ?>/assets/images/paws-7.png" alt="">
            </div>
            <div class="shape-2">
                <img src="<?php bloginfo('template_url'); ?>/assets/images/paws-6.png" alt="">
            </div>
        </section>

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
                            <h2>Histoires d'adoption</h2>
                        </div>
                    </div>
                </div>
                <div class="row actualites-grid">
                    <div class="col col-lg-4 col-md-6 col-12">
                        <div class="actualite-card">
                            <div class="image">
                                <a href="<?php echo home_url('/histoires'); ?>">
                                    <img src="<?php bloginfo('template_url'); ?>/assets/images/images/taichi.png" alt="">
                                </a>
                            </div>
                            <div class="content">
                                <ul class="date">
                                    <li>Activité</li>
                                    <li>Sep 03, 2025</li>
                                </ul>
                                <h2><a href="<?php echo home_url('/histoires'); ?>"> Cours de taichi pour chat</a></h2>
                                <p>Venez découvrir les bienfaits du taichi pour votre chat. Découvrez notre offre  dès aujourd'hui.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col col-lg-4 col-md-6 col-12">
                        <div class="actualite-card">
                            <div class="image">
                                <a href="<?php echo home_url('/histoires'); ?>">
                                    <img src="<?php bloginfo('template_url'); ?>/assets/images/images/jouets.jpg" alt="">
                                </a>
                            </div>
                            <div class="content">
                                <ul class="date">
                                    <li>News </li>
                                    <li>Sep 03, 2025</li>
                                </ul>
                                <h2><a href="<?php echo home_url('/histoires'); ?>">Ces jouets peuvent être mauvais pour votre animal.</a></h2>
                                <p>Des promenades énergisantes pour garder votre chien préféré actif, en bonne santé et heureux....</p>
                            </div>
                        </div>
                    </div>
                    <div class="col col-lg-4 col-md-6 col-12">
                        <div class="actualite-card">
                            <div class="image">
                                <a href="<?php echo home_url('/histoires'); ?>">
                                    <img src="<?php bloginfo('template_url'); ?>/assets/images/images/confortable.jpeg" alt="">
                                </a>
                            </div>
                            <div class="content">
                                <ul class="date">
                                    <li>News</li>
                                    <li>Sep 03, 2025</li>
                                </ul>
                                <h2><a href="<?php echo home_url('/histoires'); ?>">Un endroit sûr et confortable pour votre chat.</a></h2>
                                <p>Un endroit sûr et confortable pour que votre chat se repose et se sente chez lui.</p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>

<?php get_template_part("partials/footer"); ?>