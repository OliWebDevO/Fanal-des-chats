<?php get_template_part("partials/header"); ?>
        <!-- start wpo-page-title -->
        <div class="space"></div>
        <section class="wpo-page-title orange">
            <div class="container">
                <div class="row">
                    <div class="col col-xs-12">
                        <div class="wpo-breadcumb-wrap">
                            <h2>Faire un legs</h2>
                            <ol class="wpo-breadcumb-wrap">
                                <li><a href="<?php echo home_url('/'); ?>">Accueil</a></li>
                                <li>Legs</li>
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
            'post_type' => 'page_legue',
            'posts_per_page' => 1,
            'meta_query' => array(array('key' => 'legue_type', 'value' => 'intro')),
        ));
        if ($intro_query->have_posts()) : while ($intro_query->have_posts()) : $intro_query->the_post();
        ?>
        <section class="about-section section-padding orange benevole-block">
            <div class="wraper">
                <div class="left">
                    <div class="image">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/images/illustrations/8_meaow.png" alt="">
                        <div class="shape">
                            <svg width="793" height="786" viewBox="0 0 793 786" fill="none">
                                <path d="M84.9007 505.664C-181.681 609.802 245.585 843.801 512.633 772.246C713.751 718.356 833.104 511.631 779.214 310.513C725.325 109.395 552.6 -41.9576 351.482 11.9319C150.364 65.8214 351.482 401.526 84.9007 505.664Z" fill="#FBDABF" />
                            </svg>
                        </div>
                    </div>
                </div>
                <div class="right">
                    <span class="section-label">Introduction</span>
                    <h2><?php the_field('legue_intro_titre'); ?></h2>
                    <?php if (get_field('legue_intro_paragraphe_1')) : ?>
                        <p><?php the_field('legue_intro_paragraphe_1'); ?></p>
                    <?php endif; ?>
                    <?php if (get_field('legue_intro_paragraphe_2')) : ?>
                        <p><?php the_field('legue_intro_paragraphe_2'); ?></p>
                    <?php endif; ?>
                    <div class="about-btn">
                        <a href="#cta" class="theme-btn-s2">Faites un legs</a>
                    </div>
                </div>
            </div>
        </section>
        <?php endwhile; endif; wp_reset_postdata(); ?>

        <!-- Section Avantages : texte gauche, image droite -->
        <?php
        $avantages_query = new WP_Query(array(
            'post_type' => 'page_legue',
            'posts_per_page' => 1,
            'meta_query' => array(array('key' => 'legue_type', 'value' => 'avantages')),
        ));
        if ($avantages_query->have_posts()) : while ($avantages_query->have_posts()) : $avantages_query->the_post();
            $liste = get_field('legue_avantages_liste');
            $lignes = preg_split('/\r\n|\r|\n/', $liste);
            $lignes = array_filter(array_map('trim', $lignes), function($l) { return $l !== ''; });
        ?>
        <section class="about-section section-padding benevole-block">
            <div class="wraper">
                <div class="right">
                    <span class="section-label">Avantages</span>
                    <h2><?php the_field('legue_avantages_titre'); ?></h2>
                    <ul class="benevole-list">
                        <?php foreach ($lignes as $ligne) : ?>
                        <li><?php echo esc_html($ligne); ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
                <div class="left">
                    <div class="image">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/images/illustrations/17_gray cat.png" alt="">
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

        <!-- Section Types de legs : image gauche, texte droite -->
        <?php
        $types_query = new WP_Query(array(
            'post_type' => 'page_legue',
            'posts_per_page' => 1,
            'meta_query' => array(array('key' => 'legue_type', 'value' => 'types')),
        ));
        if ($types_query->have_posts()) : while ($types_query->have_posts()) : $types_query->the_post();
            $liste = get_field('legue_types_liste');
            $lignes = preg_split('/\r\n|\r|\n/', $liste);
            $lignes = array_filter(array_map('trim', $lignes), function($l) { return $l !== ''; });
        ?>
        <section class="about-section section-padding orange benevole-block">
            <div class="wraper">
                <div class="left">
                    <div class="image">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/images/illustrations/15_tabby.png" alt="">
                        <div class="shape">
                            <svg width="793" height="786" viewBox="0 0 793 786" fill="none">
                                <path d="M84.9007 505.664C-181.681 609.802 245.585 843.801 512.633 772.246C713.751 718.356 833.104 511.631 779.214 310.513C725.325 109.395 552.6 -41.9576 351.482 11.9319C150.364 65.8214 351.482 401.526 84.9007 505.664Z" fill="#FBDABF" />
                            </svg>
                        </div>
                    </div>
                </div>
                <div class="right">
                    <span class="section-label">Types de legs</span>
                    <h2><?php the_field('legue_types_titre'); ?></h2>
                    <?php if (get_field('legue_types_texte')) : ?>
                        <p><?php the_field('legue_types_texte'); ?></p>
                    <?php endif; ?>
                    <ul class="benevole-list">
                        <?php foreach ($lignes as $ligne) : ?>
                        <li><?php echo esc_html($ligne); ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        </section>
        <?php endwhile; endif; wp_reset_postdata(); ?>

        <!-- Section Demarches : texte gauche, image droite -->
        <?php
        $demarches_query = new WP_Query(array(
            'post_type' => 'page_legue',
            'posts_per_page' => 1,
            'meta_query' => array(array('key' => 'legue_type', 'value' => 'demarches')),
        ));
        if ($demarches_query->have_posts()) : while ($demarches_query->have_posts()) : $demarches_query->the_post();
        ?>
        <section class="about-section section-padding benevole-block">
            <div class="wraper">
                <div class="right">
                    <span class="section-label">Démarches</span>
                    <h2><?php the_field('legue_demarches_titre'); ?></h2>
                    <p><?php the_field('legue_demarches_texte'); ?></p>
                </div>
                <div class="left">
                    <div class="image">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/images/illustrations/16_cat vector.png" alt="">
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
            'post_type' => 'page_legue',
            'posts_per_page' => 1,
            'meta_query' => array(array('key' => 'legue_type', 'value' => 'quiz')),
        ));
        if ($quiz_query->have_posts()) : while ($quiz_query->have_posts()) : $quiz_query->the_post();
        ?>
        <section class="about-section section-padding orange benevole-block">
            <div class="wraper">
                <div class="left">
                    <div class="image">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/images/illustrations/2_meow.png" alt="">
                        <div class="shape">
                            <svg width="793" height="786" viewBox="0 0 793 786" fill="none">
                                <path d="M84.9007 505.664C-181.681 609.802 245.585 843.801 512.633 772.246C713.751 718.356 833.104 511.631 779.214 310.513C725.325 109.395 552.6 -41.9576 351.482 11.9319C150.364 65.8214 351.482 401.526 84.9007 505.664Z" fill="#FBDABF" />
                            </svg>
                        </div>
                    </div>
                </div>
                <div class="right">
                    <span class="section-label">Quiz</span>
                    <h2><?php the_field('legue_quiz_titre'); ?></h2>
                    <p><?php the_field('legue_quiz_texte'); ?></p>
                    <div class="about-btn">
                        <a href="<?php echo home_url('/quiz-legs'); ?>" class="theme-btn-s2">Participez au Quiz</a>
                    </div>
                </div>
            </div>
        </section>
        <?php endwhile; endif; wp_reset_postdata(); ?>

        <!-- start wpo-faq-section -->
        <?php
        $faq_query = new WP_Query(array(
            'post_type' => 'page_legue',
            'posts_per_page' => 1,
            'meta_query' => array(array('key' => 'legue_type', 'value' => 'faq')),
        ));
        if ($faq_query->have_posts()) : while ($faq_query->have_posts()) : $faq_query->the_post();
        ?>
        <section class="wpo-faq-section section-padding">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-12">
                        <div class="section-title">
                            <h2><?php the_field('legue_faq_titre'); ?></h2>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="wpo-faq-section">
                            <div class="row">
                                <div class="col-lg-12 col-12">
                                    <div class="wpo-benefits-item">
                                        <div class="accordion" id="accordionLegue">
                                            <?php
                                            $faq_items = array(
                                                array('num' => 'One', 'index' => 1, 'expanded' => 'true', 'show' => ' show'),
                                                array('num' => 'Two', 'index' => 2, 'expanded' => 'false', 'show' => ''),
                                                array('num' => 'Three', 'index' => 3, 'expanded' => 'false', 'show' => ''),
                                                array('num' => 'Four', 'index' => 4, 'expanded' => 'false', 'show' => ''),
                                            );
                                            foreach ($faq_items as $item) :
                                                $question = get_field('legue_faq_question_' . $item['index']);
                                                $reponse = get_field('legue_faq_reponse_' . $item['index']);
                                                if ($question && $reponse) :
                                            ?>
                                            <div class="accordion-item">
                                                <h3 class="accordion-header" id="headingLegue<?php echo $item['num']; ?>">
                                                    <button class="accordion-button<?php echo $item['index'] > 1 ? ' collapsed' : ''; ?>" type="button"
                                                        data-bs-toggle="collapse" data-bs-target="#collapseLegue<?php echo $item['num']; ?>"
                                                        aria-expanded="<?php echo $item['expanded']; ?>" aria-controls="collapseLegue<?php echo $item['num']; ?>">
                                                        <?php echo esc_html($question); ?>
                                                    </button>
                                                </h3>
                                                <div id="collapseLegue<?php echo $item['num']; ?>" class="accordion-collapse collapse<?php echo $item['show']; ?>"
                                                    aria-labelledby="headingLegue<?php echo $item['num']; ?>" data-bs-parent="#accordionLegue">
                                                    <div class="accordion-body">
                                                        <p><?php echo esc_html($reponse); ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php endif; endforeach; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- end container -->
        </section>
        <?php endwhile; endif; wp_reset_postdata(); ?>

        <!-- CTA final -->
        <?php
        $cta_query = new WP_Query(array(
            'post_type' => 'page_legue',
            'posts_per_page' => 1,
            'meta_query' => array(array('key' => 'legue_type', 'value' => 'cta')),
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
                                        <h2><?php the_field('legue_cta_titre'); ?></h2>
                                        <p><?php the_field('legue_cta_sous_titre'); ?></p>
                                    </div>
                                    <div class="about-btn">
                                        <a href="<?php echo home_url('/quiz-legs'); ?>" class="theme-btn-s2">Faites le Quiz</a>
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
