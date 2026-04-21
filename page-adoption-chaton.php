<?php get_template_part("partials/header"); ?>
        <!-- start wpo-page-title -->
        <div class="space"></div>
        <section class="wpo-page-title orange">
            <div class="container">
                <div class="row">
                    <div class="col col-xs-12">
                        <div class="wpo-breadcumb-wrap">
                            <h2>Adoption <br class="mobile-br"> Chaton</h2>
                            <ol class="wpo-breadcumb-wrap">
                                <li><a href="<?php echo home_url('/'); ?>">Accueil</a></li>
                                <li>Adoption Chaton</li>
                            </ol>
                        </div>
                    </div>
                </div> <!-- end row -->
            </div> <!-- end container -->
        </section>
        <!-- end page-title -->

        <!-- Section Intro : image gauche, texte droite -->
        <?php
        $intro_query = new WP_Query(array(
            'post_type' => 'page_adopt_chaton',
            'posts_per_page' => 1,
            'meta_query' => array(array('key' => 'adopt_chaton_type', 'value' => 'intro')),
        ));
        if ($intro_query->have_posts()) : while ($intro_query->have_posts()) : $intro_query->the_post();
        ?>
        <section class="about-section section-padding orange benevole-block">
            <div class="wraper">
                <div class="left">
                    <div class="image">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/images/illustrations/6_kitten.png" alt="">
                        <div class="shape">
                            <svg width="793" height="786" viewBox="0 0 793 786" fill="none">
                                <path d="M84.9007 505.664C-181.681 609.802 245.585 843.801 512.633 772.246C713.751 718.356 833.104 511.631 779.214 310.513C725.325 109.395 552.6 -41.9576 351.482 11.9319C150.364 65.8214 351.482 401.526 84.9007 505.664Z" fill="#FBDABF" />
                            </svg>
                        </div>
                    </div>
                </div>
                <div class="right">
                    <span class="section-label">Introduction</span>
                    <h2><?php the_field('adopt_chaton_intro_titre'); ?></h2>
                    <?php if (get_field('adopt_chaton_intro_paragraphe_1')) : ?>
                        <p><?php the_field('adopt_chaton_intro_paragraphe_1'); ?></p>
                    <?php endif; ?>
                    <?php if (get_field('adopt_chaton_intro_paragraphe_2')) : ?>
                        <p><?php the_field('adopt_chaton_intro_paragraphe_2'); ?></p>
                    <?php endif; ?>
                    <div class="about-btn">
                        <a href="#cta" class="theme-btn-s2">Adoptez</a>
                    </div>
                </div>
            </div>
        </section>
        <?php endwhile; endif; wp_reset_postdata(); ?>

        <!-- Section Criteres : texte gauche, image droite -->
        <?php
        $criteres_query = new WP_Query(array(
            'post_type' => 'page_adopt_chaton',
            'posts_per_page' => 1,
            'meta_query' => array(array('key' => 'adopt_chaton_type', 'value' => 'criteres')),
        ));
        if ($criteres_query->have_posts()) : while ($criteres_query->have_posts()) : $criteres_query->the_post();
            $liste = get_field('adopt_chaton_criteres_liste');
            $lignes = preg_split('/\r\n|\r|\n/', $liste);
            $lignes = array_filter(array_map('trim', $lignes), function($l) { return $l !== ''; });
        ?>
        <section class="about-section section-padding benevole-block">
            <div class="wraper">
                <div class="right">
                    <span class="section-label">Critères</span>
                    <h2><?php the_field('adopt_chaton_criteres_titre'); ?></h2>
                    <?php if (get_field('adopt_chaton_criteres_texte')) : ?>
                        <p><?php the_field('adopt_chaton_criteres_texte'); ?></p>
                    <?php endif; ?>
                    <ul class="benevole-list">
                        <?php foreach ($lignes as $ligne) : ?>
                        <li><?php echo esc_html($ligne); ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
                <div class="left">
                    <div class="image">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/images/illustrations/4_playful cat.png" alt="">
                        <div class="shape">
                            <svg width="793" height="786" viewBox="0 0 793 786" fill="none">
                                <path d="M84.9007 505.664C-181.681 609.802 245.585 843.801 512.633 772.246C713.751 718.356 833.104 511.631 779.214 310.513C725.325 109.395 552.6 -41.9576 351.482 11.9319C150.364 65.8214 351.482 401.526 84.9007 505.664Z" fill="#FFEFEB" />
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php endwhile; endif; wp_reset_postdata(); ?>

        <!-- Section Processus : image gauche, texte droite -->
        <?php
        $processus_query = new WP_Query(array(
            'post_type' => 'page_adopt_chaton',
            'posts_per_page' => 1,
            'meta_query' => array(array('key' => 'adopt_chaton_type', 'value' => 'processus')),
        ));
        if ($processus_query->have_posts()) : while ($processus_query->have_posts()) : $processus_query->the_post();
        ?>
        <section class="about-section section-padding orange benevole-block">
            <div class="wraper">
                <div class="left">
                    <div class="image">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/images/illustrations/3_cute cat.png" alt="">
                        <div class="shape">
                            <svg width="793" height="786" viewBox="0 0 793 786" fill="none">
                                <path d="M84.9007 505.664C-181.681 609.802 245.585 843.801 512.633 772.246C713.751 718.356 833.104 511.631 779.214 310.513C725.325 109.395 552.6 -41.9576 351.482 11.9319C150.364 65.8214 351.482 401.526 84.9007 505.664Z" fill="#FBDABF" />
                            </svg>
                        </div>
                    </div>
                </div>
                <div class="right">
                    <span class="section-label">Processus</span>
                    <h2><?php the_field('adopt_chaton_processus_titre'); ?></h2>
                    <p><?php the_field('adopt_chaton_processus_texte'); ?></p>
                </div>
            </div>
        </section>
        <?php endwhile; endif; wp_reset_postdata(); ?>

        <!-- Section Etapes : texte gauche, image droite -->
        <?php
        $etapes_query = new WP_Query(array(
            'post_type' => 'page_adopt_chaton',
            'posts_per_page' => 1,
            'meta_query' => array(array('key' => 'adopt_chaton_type', 'value' => 'etapes')),
        ));
        if ($etapes_query->have_posts()) : while ($etapes_query->have_posts()) : $etapes_query->the_post();
            $liste = get_field('adopt_chaton_etapes_liste');
            $lignes = preg_split('/\r\n|\r|\n/', $liste);
            $lignes = array_filter(array_map('trim', $lignes), function($l) { return $l !== ''; });
        ?>
        <section class="about-section section-padding benevole-block">
            <div class="wraper">
                <div class="right">
                    <span class="section-label">Étapes</span>
                    <h2><?php the_field('adopt_chaton_etapes_titre'); ?></h2>
                    <ul class="benevole-list">
                        <?php foreach ($lignes as $ligne) : ?>
                        <li><?php echo esc_html($ligne); ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
                <div class="left">
                    <div class="image">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/images/illustrations/12_cat girl.png" alt="">
                        <div class="shape">
                            <svg width="793" height="786" viewBox="0 0 793 786" fill="none">
                                <path d="M84.9007 505.664C-181.681 609.802 245.585 843.801 512.633 772.246C713.751 718.356 833.104 511.631 779.214 310.513C725.325 109.395 552.6 -41.9576 351.482 11.9319C150.364 65.8214 351.482 401.526 84.9007 505.664Z" fill="#FFEFEB" />
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php endwhile; endif; wp_reset_postdata(); ?>

        <!-- Section Quiz : image gauche, texte droite -->
        <?php
        $quiz_query = new WP_Query(array(
            'post_type' => 'page_adopt_chaton',
            'posts_per_page' => 1,
            'meta_query' => array(array('key' => 'adopt_chaton_type', 'value' => 'quiz')),
        ));
        if ($quiz_query->have_posts()) : while ($quiz_query->have_posts()) : $quiz_query->the_post();
        ?>
        <section class="about-section section-padding orange benevole-block">
            <div class="wraper">
                <div class="left">
                    <div class="image">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/images/illustrations/10_naughty cat.png" alt="">
                        <div class="shape">
                            <svg width="793" height="786" viewBox="0 0 793 786" fill="none">
                                <path d="M84.9007 505.664C-181.681 609.802 245.585 843.801 512.633 772.246C713.751 718.356 833.104 511.631 779.214 310.513C725.325 109.395 552.6 -41.9576 351.482 11.9319C150.364 65.8214 351.482 401.526 84.9007 505.664Z" fill="#FBDABF" />
                            </svg>
                        </div>
                    </div>
                </div>
                <div class="right">
                    <span class="section-label">Quiz</span>
                    <h2><?php the_field('adopt_chaton_quiz_titre'); ?></h2>
                    <p><?php the_field('adopt_chaton_quiz_texte'); ?></p>
                    <div class="about-btn">
                        <a href="<?php echo home_url('/quiz-adoption-chaton'); ?>" class="theme-btn-s2">Participez au Quiz</a>
                    </div>
                </div>
            </div>
        </section>
        <?php endwhile; endif; wp_reset_postdata(); ?>

        <!-- Section Formulaire : texte gauche, image droite -->
        <?php
        $formulaire_query = new WP_Query(array(
            'post_type' => 'page_adopt_chaton',
            'posts_per_page' => 1,
            'meta_query' => array(array('key' => 'adopt_chaton_type', 'value' => 'formulaire')),
        ));
        if ($formulaire_query->have_posts()) : while ($formulaire_query->have_posts()) : $formulaire_query->the_post();
        ?>
        <section class="about-section section-padding benevole-block">
            <div class="wraper">
                <div class="right">
                    <span class="section-label">Formulaire</span>
                    <h2><?php the_field('adopt_chaton_formulaire_titre'); ?></h2>
                    <p><?php the_field('adopt_chaton_formulaire_texte'); ?></p>
                    <div class="about-btn">
                        <a href="<?php echo home_url('/formulaire-adoption?type=chaton'); ?>" class="theme-btn-s2">Remplissez le formulaire</a>
                    </div>
                </div>
                <div class="left">
                    <div class="image">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/images/illustrations/11_fat cat.png" alt="">
                        <div class="shape">
                            <svg width="793" height="786" viewBox="0 0 793 786" fill="none">
                                <path d="M84.9007 505.664C-181.681 609.802 245.585 843.801 512.633 772.246C713.751 718.356 833.104 511.631 779.214 310.513C725.325 109.395 552.6 -41.9576 351.482 11.9319C150.364 65.8214 351.482 401.526 84.9007 505.664Z" fill="#FFEFEB" />
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php endwhile; endif; wp_reset_postdata(); ?>

        <!-- start wpo-faq-section -->
        <?php
        $faq_query = new WP_Query(array(
            'post_type' => 'page_adopt_chaton',
            'posts_per_page' => 1,
            'meta_query' => array(array('key' => 'adopt_chaton_type', 'value' => 'faq')),
        ));
        if ($faq_query->have_posts()) : while ($faq_query->have_posts()) : $faq_query->the_post();
        ?>
        <section class="wpo-faq-section section-padding orange">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-12">
                        <div class="section-title">
                            <h2><?php the_field('adopt_chaton_faq_titre'); ?></h2>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="wpo-faq-section">
                            <div class="row">
                                <div class="col-lg-12 col-12">
                                    <div class="wpo-benefits-item">
                                        <div class="accordion" id="accordionChaton">
                                            <?php
                                            $faq_items_data = get_field('adopt_chaton_faq_items');
                                            if ($faq_items_data) :
                                                foreach ($faq_items_data as $faq_idx => $faq_row) :
                                                    $faq_q = isset($faq_row['question']) ? $faq_row['question'] : '';
                                                    $faq_r = isset($faq_row['reponse']) ? $faq_row['reponse'] : '';
                                                    if (!$faq_q || !$faq_r) continue;
                                                    $faq_num = 'Item' . ($faq_idx + 1);
                                                    $faq_first = ($faq_idx === 0);
                                            ?>
                                            <div class="accordion-item">
                                                <h3 class="accordion-header" id="heading<?php echo $faq_num; ?>">
                                                    <button class="accordion-button<?php echo !$faq_first ? ' collapsed' : ''; ?>" type="button"
                                                        data-bs-toggle="collapse" data-bs-target="#collapse<?php echo $faq_num; ?>"
                                                        aria-expanded="<?php echo $faq_first ? 'true' : 'false'; ?>" aria-controls="collapse<?php echo $faq_num; ?>">
                                                        <?php echo esc_html($faq_q); ?>
                                                    </button>
                                                </h3>
                                                <div id="collapse<?php echo $faq_num; ?>" class="accordion-collapse collapse<?php echo $faq_first ? ' show' : ''; ?>"
                                                    aria-labelledby="heading<?php echo $faq_num; ?>" data-bs-parent="#accordionChaton">
                                                    <div class="accordion-body">
                                                        <p><?php echo esc_html($faq_r); ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php endforeach; endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php endwhile; endif; wp_reset_postdata(); ?>

        <!-- CTA final -->
        <?php
        $cta_query = new WP_Query(array(
            'post_type' => 'page_adopt_chaton',
            'posts_per_page' => 1,
            'meta_query' => array(array('key' => 'adopt_chaton_type', 'value' => 'cta')),
        ));
        if ($cta_query->have_posts()) : while ($cta_query->have_posts()) : $cta_query->the_post();
        ?>
        <div id="cta" class="wpo-service-single-area section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-12">
                        <div class="wpo-service-single-wrap">
                            <div class="wpo-service-single-item">
                                <div class="wpo-service-contact-area">
                                    <div class="wpo-contact-title">
                                        <h2><?php the_field('adopt_chaton_cta_titre'); ?></h2>
                                        <p><?php the_field('adopt_chaton_cta_sous_titre'); ?></p>
                                        <p style="margin-top: 10px; font-size: 15px; color: #666;"><i class="fas fa-info-circle" style="color: #FF5B2E;"></i> Remplissez le formulaire d'adoption chaton pour accéder à la prise de rendez-vous.</p>
                                    </div>
                                    <div class="about-btn">
                                        <a href="<?php echo home_url('/quiz-adoption-chaton'); ?>" class="theme-btn-s2">Faites le Quiz</a>
                                        <a href="<?php echo home_url('/formulaire-adoption?type=chaton'); ?>" class="theme-btn-s2">Remplissez le formulaire</a>
                                        <a href="<?php echo home_url('/contact'); ?>" class="theme-btn-s2">Contactez-nous</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php endwhile; endif; wp_reset_postdata(); ?>

<?php get_template_part("partials/footer"); ?>
