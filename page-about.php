<?php get_template_part("partials/header"); ?>

        <!-- start wpo-page-title -->
        <div class="space"></div>
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
        <section class="about-section section-padding orange benevole-block">
            <?php
            // Récupérer le contenu Qui sommes-nous
            $qsn_query = new WP_Query(array(
                'post_type' => 'page_about',
                'posts_per_page' => 1,
                'meta_query' => array(
                    array(
                        'key' => 'about_type',
                        'value' => 'qui_sommes_nous',
                    ),
                ),
            ));
            if ($qsn_query->have_posts()) : while ($qsn_query->have_posts()) : $qsn_query->the_post();
            ?>
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
                    <h2><?php the_field('about_qsn_titre'); ?></h2>
                    <?php if (get_field('about_qsn_paragraphe_1')) : ?>
                        <p><?php the_field('about_qsn_paragraphe_1'); ?></p>
                    <?php endif; ?>
                    <?php if (get_field('about_qsn_paragraphe_2')) : ?>
                        <p><?php the_field('about_qsn_paragraphe_2'); ?></p>
                    <?php endif; ?>
                    <?php if (get_field('about_qsn_paragraphe_3')) : ?>
                        <p><?php the_field('about_qsn_paragraphe_3'); ?></p>
                    <?php endif; ?>

                    <div class="about-btn">
                        <a href="<?php echo home_url('/adoption'); ?>" class="theme-btn-s2">Adopter un chat</a>
                        <a href="<?php echo home_url('/don'); ?>" class="theme-btn-s2">Faire un don</a>
                    </div>
                </div>
            </div>
            <?php endwhile; endif; wp_reset_postdata(); ?>
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
                <img src="<?php bloginfo("template_url")?>/assets/images/images/home_banner.webp" alt="Nos chats">
            </div>
            <div class="container">
                <?php
                // Récupérer le contenu Statistiques
                $stats_query = new WP_Query(array(
                    'post_type' => 'page_about',
                    'posts_per_page' => 1,
                    'meta_query' => array(
                        array(
                            'key' => 'about_type',
                            'value' => 'statistiques',
                        ),
                    ),
                ));
                if ($stats_query->have_posts()) : while ($stats_query->have_posts()) : $stats_query->the_post();
                    $icons = array('1.svg', '2.svg', '3.svg', '4.svg');
                    $suffixes = array('+', '+', '+', '%');
                ?>
                <div class="row">
                    <?php for ($i = 1; $i <= 4; $i++) :
                        $titre = get_field('about_stats_titre_' . $i);
                        $nombre = get_field('about_stats_nombre_' . $i);
                        if ($titre && $nombre) :
                    ?>
                    <div class="col col-lg-3 col-md-6 col-12">
                        <div class="item">
                            <div class="icon">
                                <img src="<?php bloginfo("template_url")?>/assets/images/funfact/<?php echo $icons[$i-1]; ?>" alt="">
                            </div>
                            <h2><span class="odometer" data-count="<?php echo esc_attr($nombre); ?>">00</span> <span class="ico"><?php echo $suffixes[$i-1]; ?></span>
                            </h2>
                            <h3><?php echo esc_html($titre); ?></h3>
                        </div>
                    </div>
                    <?php endif; endfor; ?>
                </div>
                <?php endwhile; endif; wp_reset_postdata(); ?>
            </div>
        </section>

        <!-- start of missions-section -->
        <section class="engagement-section section-padding orange nos-missions">
            <div class="container">
                <?php
                // Récupérer le contenu Nos Missions
                $missions_query = new WP_Query(array(
                    'post_type' => 'page_about',
                    'posts_per_page' => 1,
                    'meta_query' => array(
                        array(
                            'key' => 'about_type',
                            'value' => 'nos_missions',
                        ),
                    ),
                ));
                if ($missions_query->have_posts()) : while ($missions_query->have_posts()) : $missions_query->the_post();
                    $icons = array('fa-hands-holding-child', 'fa-stethoscope', 'fa-home');
                    $links = array('/benevole', '/don', '/adoption');
                    $buttons = array('Devenir bénévole', 'Faire un don', 'Adopter un chat');
                ?>
                <div class="row justify-content-center">
                    <div class="col-lg-6 col-12">
                        <div class="section-title">
                            <h3 class="section-label">Nos Missions</h3>
                            <h2><?php the_field('about_missions_titre_section'); ?></h2>
                        </div>
                    </div>
                </div>
                <div class="engagement-cards row g-0 align-items-center">
                    <?php for ($i = 1; $i <= 3; $i++) :
                        $titre = get_field('about_missions_titre_' . $i);
                        $texte = get_field('about_missions_texte_' . $i);
                        if ($titre) :
                            $lignes = preg_split('/\r\n|\r|\n/', $texte);
                            $lignes = array_filter(array_map('trim', $lignes), function($l) { return $l !== ''; });
                    ?>
                    <div class="col col-lg-4 col-md-6 col-12">
                        <div class="engagement-card">
                            <h2><?php echo esc_html($titre); ?></h2>
                            <div class="engagement-icon"><i class="fas <?php echo $icons[$i-1]; ?> mission-icon"></i></div>
                            <ul class="engagement-features">
                                <?php foreach ($lignes as $ligne) : ?>
                                <li><?php echo esc_html($ligne); ?></li>
                                <?php endforeach; ?>
                            </ul>
                            <a href="<?php echo home_url($links[$i-1]); ?>" class="theme-btn-s2"><?php echo $buttons[$i-1]; ?></a>
                        </div>
                    </div>
                    <?php endif; endfor; ?>
                </div>
                <?php endwhile; endif; wp_reset_postdata(); ?>
            </div>
        </section>

        <!-- start of values-section -->
        <section class="about-section section-padding benevole-block">
            <?php
            // Récupérer le contenu Nos Valeurs
            $valeurs_query = new WP_Query(array(
                'post_type' => 'page_about',
                'posts_per_page' => 1,
                'meta_query' => array(
                    array(
                        'key' => 'about_type',
                        'value' => 'nos_valeurs',
                    ),
                ),
            ));
            if ($valeurs_query->have_posts()) : while ($valeurs_query->have_posts()) : $valeurs_query->the_post();
            ?>
            <div class="wraper">
                <div class="right">
                    <span class="section-label">Nos Valeurs</span>
                    <h2><?php the_field('about_valeurs_titre_section'); ?></h2>
                    <?php for ($i = 1; $i <= 4; $i++) :
                        $valeur = get_field('about_valeurs_valeur_' . $i);
                        if ($valeur) :
                            // Met en gras le texte avant les deux-points
                            if (strpos($valeur, ':') !== false) {
                                $parts = explode(':', $valeur, 2);
                                $valeur = '<strong>' . esc_html(trim($parts[0])) . ' :</strong>' . esc_html($parts[1]);
                            } else {
                                $valeur = esc_html($valeur);
                            }
                    ?>
                    <p><?php echo $valeur; ?></p>
                    <?php endif; endfor; ?>

                    <div class="about-btn">
                        <a href="<?php echo home_url('/benevole'); ?>" class="theme-btn-s2">Devenir bénévole</a>
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
            <?php endwhile; endif; wp_reset_postdata(); ?>
            <div class="shape">
                <img src="<?php bloginfo("template_url")?>/assets/images/paws-6.png" alt="">
            </div>
            <div class="shape-2">
                <img src="<?php bloginfo("template_url")?>/assets/images/paws-7.png" alt="">
            </div>
        </section>

<?php get_template_part("partials/footer"); ?>
