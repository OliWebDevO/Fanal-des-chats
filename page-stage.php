<?php get_template_part("partials/header"); ?>

        <!-- start wpo-page-title -->
        <div class="space"></div>
        <section class="wpo-page-title orange">
            <div class="container">
                <div class="row">
                    <div class="col col-xs-12">
                        <div class="wpo-breadcumb-wrap">
                            <h2>Faire un stage</h2>
                            <ol class="wpo-breadcumb-wrap">
                                <li><a href="<?php echo home_url('/'); ?>">Accueil</a></li>
                                <li>Faire un stage</li>
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

                            <!-- Section Mission -->
                            <?php
                            $mission_query = new WP_Query(array(
                                'post_type' => 'page_stage',
                                'posts_per_page' => 1,
                                'meta_query' => array(
                                    array(
                                        'key' => 'stage_type',
                                        'value' => 'mission',
                                    ),
                                ),
                            ));
                            if ($mission_query->have_posts()) : while ($mission_query->have_posts()) : $mission_query->the_post();
                            ?>
                            <div class="wpo-service-single-item">
                                <div class="wpo-service-single-title">
                                    <h3><?php the_field('stage_mission_titre'); ?></h3>
                                </div>
                                <?php if (get_field('stage_mission_paragraphe_1')) : ?>
                                    <p><?php the_field('stage_mission_paragraphe_1'); ?></p>
                                <?php endif; ?>
                                <?php if (get_field('stage_mission_paragraphe_2')) : ?>
                                    <p><?php the_field('stage_mission_paragraphe_2'); ?></p>
                                <?php endif; ?>
                            </div>
                            <?php endwhile; endif; wp_reset_postdata(); ?>

                            <!-- Section Besoins -->
                            <?php
                            $besoins_query = new WP_Query(array(
                                'post_type' => 'page_stage',
                                'posts_per_page' => 1,
                                'meta_query' => array(
                                    array(
                                        'key' => 'stage_type',
                                        'value' => 'besoins',
                                    ),
                                ),
                            ));
                            if ($besoins_query->have_posts()) : while ($besoins_query->have_posts()) : $besoins_query->the_post();
                                $liste = get_field('stage_besoins_liste');
                                $lignes = preg_split('/\r\n|\r|\n/', $liste);
                                $lignes = array_filter(array_map('trim', $lignes), function($l) { return $l !== ''; });
                            ?>
                            <div class="wpo-service-single-item">
                                <div class="wpo-service-single-title">
                                    <h3><?php the_field('stage_besoins_titre'); ?></h3>
                                </div>
                                <?php if (get_field('stage_besoins_texte')) : ?>
                                    <p><?php the_field('stage_besoins_texte'); ?></p>
                                <?php endif; ?>
                            </div>
                            <div class="wpo-service-single-item list-widget">
                                <ul>
                                    <?php foreach ($lignes as $ligne) : ?>
                                    <li><?php echo esc_html($ligne); ?></li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                            <?php endwhile; endif; wp_reset_postdata(); ?>

                            <!-- Section Approche -->
                            <?php
                            $approche_query = new WP_Query(array(
                                'post_type' => 'page_stage',
                                'posts_per_page' => 1,
                                'meta_query' => array(
                                    array(
                                        'key' => 'stage_type',
                                        'value' => 'approche',
                                    ),
                                ),
                            ));
                            if ($approche_query->have_posts()) : while ($approche_query->have_posts()) : $approche_query->the_post();
                            ?>
                            <div class="wpo-service-single-item">
                                <div class="wpo-service-single-title">
                                    <h3><?php the_field('stage_approche_titre'); ?></h3>
                                </div>
                                <p><?php the_field('stage_approche_texte'); ?></p>
                            </div>
                            <?php endwhile; endif; wp_reset_postdata(); ?>

                            <!-- Section Quotidien -->
                            <?php
                            $quotidien_query = new WP_Query(array(
                                'post_type' => 'page_stage',
                                'posts_per_page' => 1,
                                'meta_query' => array(
                                    array(
                                        'key' => 'stage_type',
                                        'value' => 'quotidien',
                                    ),
                                ),
                            ));
                            if ($quotidien_query->have_posts()) : while ($quotidien_query->have_posts()) : $quotidien_query->the_post();
                                $liste = get_field('stage_quotidien_liste');
                                $lignes = preg_split('/\r\n|\r|\n/', $liste);
                                $lignes = array_filter(array_map('trim', $lignes), function($l) { return $l !== ''; });
                            ?>
                            <div class="wpo-service-single-item list-widget">
                                <div class="wpo-service-single-title">
                                    <h3><?php the_field('stage_quotidien_titre'); ?></h3>
                                </div>
                                <ul>
                                    <?php foreach ($lignes as $ligne) : ?>
                                    <li><?php echo esc_html($ligne); ?></li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                            <?php endwhile; endif; wp_reset_postdata(); ?>

                            <!-- Section Quiz -->
                            <?php
                            $quiz_query = new WP_Query(array(
                                'post_type' => 'page_stage',
                                'posts_per_page' => 1,
                                'meta_query' => array(
                                    array(
                                        'key' => 'stage_type',
                                        'value' => 'quiz',
                                    ),
                                ),
                            ));
                            if ($quiz_query->have_posts()) : while ($quiz_query->have_posts()) : $quiz_query->the_post();
                            ?>
                            <div class="wpo-service-single-item">
                                <div class="wpo-service-single-title">
                                    <h3><?php the_field('stage_quiz_titre'); ?></h3>
                                </div>
                                <p><?php the_field('stage_quiz_texte'); ?></p>
                                <div class="about-btn">
                                    <a href="<?php echo home_url('/quiz-stage'); ?>" class="theme-btn-s2">Participez au Quiz</a>
                                </div>
                            </div>
                            <?php endwhile; endif; wp_reset_postdata(); ?>

                            <!-- Section Formulaire -->
                            <?php
                            $formulaire_query = new WP_Query(array(
                                'post_type' => 'page_stage',
                                'posts_per_page' => 1,
                                'meta_query' => array(
                                    array(
                                        'key' => 'stage_type',
                                        'value' => 'formulaire',
                                    ),
                                ),
                            ));
                            if ($formulaire_query->have_posts()) : while ($formulaire_query->have_posts()) : $formulaire_query->the_post();
                            ?>
                            <div class="wpo-service-single-item">
                                <div class="wpo-service-single-title">
                                    <h3><?php the_field('stage_formulaire_titre'); ?></h3>
                                </div>
                                <p><?php the_field('stage_formulaire_texte'); ?></p>
                                <div class="about-btn">
                                    <a href="<?php echo home_url('/formulaire-stage'); ?>" class="theme-btn-s2">Postuler pour un stage</a>
                                </div>
                            </div>
                            <?php endwhile; endif; wp_reset_postdata(); ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- service-single-area end -->

        <!-- start wpo-faq-section -->
        <?php
        $faq_query = new WP_Query(array(
            'post_type' => 'page_stage',
            'posts_per_page' => 1,
            'meta_query' => array(
                array(
                    'key' => 'stage_type',
                    'value' => 'faq',
                ),
            ),
        ));
        if ($faq_query->have_posts()) : while ($faq_query->have_posts()) : $faq_query->the_post();
        ?>
        <section class="wpo-faq-section section-padding">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-12">
                        <div class="section-title">
                            <h2><?php the_field('stage_faq_titre'); ?></h2>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="wpo-faq-section">
                            <div class="row">
                                <div class="col-lg-12 col-12">
                                    <div class="wpo-benefits-item">
                                        <div class="accordion" id="accordionExample">
                                            <?php
                                            $faq_items = array(
                                                array('num' => 'One', 'index' => 1, 'expanded' => 'true', 'show' => ' show'),
                                                array('num' => 'Two', 'index' => 2, 'expanded' => 'false', 'show' => ''),
                                                array('num' => 'Three', 'index' => 3, 'expanded' => 'false', 'show' => ''),
                                                array('num' => 'Four', 'index' => 4, 'expanded' => 'false', 'show' => ''),
                                            );
                                            foreach ($faq_items as $item) :
                                                $question = get_field('stage_faq_question_' . $item['index']);
                                                $reponse = get_field('stage_faq_reponse_' . $item['index']);
                                                if ($question && $reponse) :
                                            ?>
                                            <div class="accordion-item">
                                                <h3 class="accordion-header" id="heading<?php echo $item['num']; ?>">
                                                    <button class="accordion-button<?php echo $item['index'] > 1 ? ' collapsed' : ''; ?>" type="button"
                                                        data-bs-toggle="collapse" data-bs-target="#collapse<?php echo $item['num']; ?>"
                                                        aria-expanded="<?php echo $item['expanded']; ?>" aria-controls="collapse<?php echo $item['num']; ?>">
                                                        <?php echo esc_html($question); ?>
                                                    </button>
                                                </h3>
                                                <div id="collapse<?php echo $item['num']; ?>" class="accordion-collapse collapse<?php echo $item['show']; ?>"
                                                    aria-labelledby="heading<?php echo $item['num']; ?>" data-bs-parent="#accordionExample">
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
        <!-- end faq-section -->

        <!-- service contact area start -->
        <?php
        $cta_query = new WP_Query(array(
            'post_type' => 'page_stage',
            'posts_per_page' => 1,
            'meta_query' => array(
                array(
                    'key' => 'stage_type',
                    'value' => 'cta',
                ),
            ),
        ));
        if ($cta_query->have_posts()) : while ($cta_query->have_posts()) : $cta_query->the_post();
        ?>
        <div class="wpo-service-single-area section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-12">
                        <div class="wpo-service-single-wrap">
                            <div class="wpo-service-single-item">
                                <div class="wpo-service-contact-area">
                                    <div class="wpo-contact-title">
                                        <h2><?php the_field('stage_cta_titre'); ?></h2>
                                        <p><?php the_field('stage_cta_sous_titre'); ?></p>
                                    </div>
                                    <div class="about-btn">
                                        <a href="<?php echo home_url('/quiz-stage'); ?>" class="theme-btn-s2">Faire le Quiz</a>
                                        <a href="<?php echo home_url('/formulaire-stage'); ?>" class="theme-btn-s2">Postuler pour un stage</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php endwhile; endif; wp_reset_postdata(); ?>
        <!-- service-single-area end -->

<?php get_template_part("partials/footer"); ?>
