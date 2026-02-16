<?php get_template_part("partials/header"); ?>

        <!-- start wpo-page-title -->
        <div class="space"></div>
        <section class="wpo-page-title orange">
            <div class="container">
                <div class="row">
                    <div class="col col-xs-12">
                        <div class="wpo-breadcumb-wrap">
                            <h2>Devenir famille d'accueil</h2>
                            <ol class="wpo-breadcumb-wrap">
                                <li><a href="<?php echo home_url('/'); ?>">Accueil</a></li>
                                <li>Famille d'accueil</li>
                            </ol>
                        </div>
                    </div>
                </div> <!-- end row -->
            </div> <!-- end container -->
        </section>
        <!-- end page-title -->

        <!-- Section Mission : image gauche, texte droite -->
        <?php
        $mission_query = new WP_Query(array(
            'post_type' => 'page_famille_accueil',
            'posts_per_page' => 1,
            'meta_query' => array(array('key' => 'famille_type', 'value' => 'mission')),
        ));
        if ($mission_query->have_posts()) : while ($mission_query->have_posts()) : $mission_query->the_post();
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
                    <span class="section-label">Notre mission</span>
                    <h2><?php the_field('famille_mission_titre'); ?></h2>
                    <?php if (get_field('famille_mission_paragraphe_1')) : ?>
                        <p><?php the_field('famille_mission_paragraphe_1'); ?></p>
                    <?php endif; ?>
                    <?php if (get_field('famille_mission_paragraphe_2')) : ?>
                        <p><?php the_field('famille_mission_paragraphe_2'); ?></p>
                    <?php endif; ?>
                    <div class="about-btn">
                        <a href="#cta" class="theme-btn-s2">Devenir Famille d'accueil</a>
                    </div>
                </div>
            </div>
        </section>
        <?php endwhile; endif; wp_reset_postdata(); ?>

        <!-- Section Besoins : texte gauche, image droite -->
        <?php
        $besoins_query = new WP_Query(array(
            'post_type' => 'page_famille_accueil',
            'posts_per_page' => 1,
            'meta_query' => array(array('key' => 'famille_type', 'value' => 'besoins')),
        ));
        if ($besoins_query->have_posts()) : while ($besoins_query->have_posts()) : $besoins_query->the_post();
            $liste = get_field('famille_besoins_liste');
            $lignes = preg_split('/\r\n|\r|\n/', $liste);
            $lignes = array_filter(array_map('trim', $lignes), function($l) { return $l !== ''; });
        ?>
        <section class="about-section section-padding benevole-block">
            <div class="wraper">
                <div class="right">
                    <span class="section-label">Nos besoins</span>
                    <h2><?php the_field('famille_besoins_titre'); ?></h2>
                    <?php if (get_field('famille_besoins_texte')) : ?>
                        <p><?php the_field('famille_besoins_texte'); ?></p>
                    <?php endif; ?>
                    <ul class="benevole-list">
                        <?php foreach ($lignes as $ligne) : ?>
                        <li><?php echo esc_html($ligne); ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
                <div class="left">
                    <div class="image">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/images/illustrations/19_cute gray cat.png" alt="">
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

        <!-- Section Approche : image gauche, texte droite -->
        <?php
        $approche_query = new WP_Query(array(
            'post_type' => 'page_famille_accueil',
            'posts_per_page' => 1,
            'meta_query' => array(array('key' => 'famille_type', 'value' => 'approche')),
        ));
        if ($approche_query->have_posts()) : while ($approche_query->have_posts()) : $approche_query->the_post();
        ?>
        <section class="about-section section-padding orange benevole-block">
            <div class="wraper">
                <div class="left">
                    <div class="image">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/images/illustrations/22_cartoon cat.png" alt="">
                        <div class="shape">
                            <svg width="793" height="786" viewBox="0 0 793 786" fill="none">
                                <path d="M84.9007 505.664C-181.681 609.802 245.585 843.801 512.633 772.246C713.751 718.356 833.104 511.631 779.214 310.513C725.325 109.395 552.6 -41.9576 351.482 11.9319C150.364 65.8214 351.482 401.526 84.9007 505.664Z" fill="#FBDABF" />
                            </svg>
                        </div>
                    </div>
                </div>
                <div class="right">
                    <span class="section-label">Notre approche</span>
                    <h2><?php the_field('famille_approche_titre'); ?></h2>
                    <p><?php the_field('famille_approche_texte'); ?></p>
                </div>
            </div>
        </section>
        <?php endwhile; endif; wp_reset_postdata(); ?>

        <!-- Section Quotidien : texte gauche, image droite -->
        <?php
        $quotidien_query = new WP_Query(array(
            'post_type' => 'page_famille_accueil',
            'posts_per_page' => 1,
            'meta_query' => array(array('key' => 'famille_type', 'value' => 'quotidien')),
        ));
        if ($quotidien_query->have_posts()) : while ($quotidien_query->have_posts()) : $quotidien_query->the_post();
            $liste = get_field('famille_quotidien_liste');
            $lignes = preg_split('/\r\n|\r|\n/', $liste);
            $lignes = array_filter(array_map('trim', $lignes), function($l) { return $l !== ''; });
        ?>
        <section class="about-section section-padding benevole-block">
            <div class="wraper">
                <div class="right">
                    <span class="section-label">Au quotidien</span>
                    <h2><?php the_field('famille_quotidien_titre'); ?></h2>
                    <ul class="benevole-list">
                        <?php foreach ($lignes as $ligne) : ?>
                        <li><?php echo esc_html($ligne); ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
                <div class="left">
                    <div class="image">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/images/illustrations/23_cute cat illustration.png" alt="">
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
            'post_type' => 'page_famille_accueil',
            'posts_per_page' => 1,
            'meta_query' => array(array('key' => 'famille_type', 'value' => 'quiz')),
        ));
        if ($quiz_query->have_posts()) : while ($quiz_query->have_posts()) : $quiz_query->the_post();
        ?>
        <section class="about-section section-padding orange benevole-block">
            <div class="wraper">
                <div class="left">
                    <div class="image">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/images/illustrations/24_cat illustration.png" alt="">
                        <div class="shape">
                            <svg width="793" height="786" viewBox="0 0 793 786" fill="none">
                                <path d="M84.9007 505.664C-181.681 609.802 245.585 843.801 512.633 772.246C713.751 718.356 833.104 511.631 779.214 310.513C725.325 109.395 552.6 -41.9576 351.482 11.9319C150.364 65.8214 351.482 401.526 84.9007 505.664Z" fill="#FBDABF" />
                            </svg>
                        </div>
                    </div>
                </div>
                <div class="right">
                    <span class="section-label">Quiz</span>
                    <h2><?php the_field('famille_quiz_titre'); ?></h2>
                    <p><?php the_field('famille_quiz_texte'); ?></p>
                    <div class="about-btn">
                        <a href="<?php echo home_url('/quiz-famille-accueil'); ?>" class="theme-btn-s2">Participez au Quiz</a>
                    </div>
                </div>
            </div>
        </section>
        <?php endwhile; endif; wp_reset_postdata(); ?>

        <!-- Section Formulaire : texte gauche, image droite -->
        <?php
        $formulaire_query = new WP_Query(array(
            'post_type' => 'page_famille_accueil',
            'posts_per_page' => 1,
            'meta_query' => array(array('key' => 'famille_type', 'value' => 'formulaire')),
        ));
        if ($formulaire_query->have_posts()) : while ($formulaire_query->have_posts()) : $formulaire_query->the_post();
        ?>
        <section class="about-section section-padding benevole-block">
            <div class="wraper">
                <div class="right">
                    <span class="section-label">Candidature</span>
                    <h2><?php the_field('famille_formulaire_titre'); ?></h2>
                    <p><?php the_field('famille_formulaire_texte'); ?></p>
                    <div class="about-btn">
                        <a href="<?php echo home_url('/formulaire-famille-accueil'); ?>" class="theme-btn-s2">Remplir le formulaire</a>
                    </div>
                </div>
                <div class="left">
                    <div class="image">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/images/illustrations/25_furry cat.png" alt="">
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
            'post_type' => 'page_famille_accueil',
            'posts_per_page' => 1,
            'meta_query' => array(array('key' => 'famille_type', 'value' => 'faq')),
        ));
        if ($faq_query->have_posts()) : while ($faq_query->have_posts()) : $faq_query->the_post();
        ?>
        <section class="wpo-faq-section section-padding orange">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-12">
                        <div class="section-title">
                            <h2><?php the_field('famille_faq_titre'); ?></h2>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="wpo-faq-section">
                            <div class="row">
                                <div class="col-lg-12 col-12">
                                    <div class="wpo-benefits-item">
                                        <div class="accordion" id="accordionFamille">
                                            <?php
                                            $faq_items = array(
                                                array('num' => 'One', 'index' => 1, 'expanded' => 'true', 'show' => ' show'),
                                                array('num' => 'Two', 'index' => 2, 'expanded' => 'false', 'show' => ''),
                                                array('num' => 'Three', 'index' => 3, 'expanded' => 'false', 'show' => ''),
                                                array('num' => 'Four', 'index' => 4, 'expanded' => 'false', 'show' => ''),
                                            );
                                            foreach ($faq_items as $item) :
                                                $question = get_field('famille_faq_question_' . $item['index']);
                                                $reponse = get_field('famille_faq_reponse_' . $item['index']);
                                                if ($question && $reponse) :
                                            ?>
                                            <div class="accordion-item">
                                                <h3 class="accordion-header" id="headingFamille<?php echo $item['num']; ?>">
                                                    <button class="accordion-button<?php echo $item['index'] > 1 ? ' collapsed' : ''; ?>" type="button"
                                                        data-bs-toggle="collapse" data-bs-target="#collapseFamille<?php echo $item['num']; ?>"
                                                        aria-expanded="<?php echo $item['expanded']; ?>" aria-controls="collapseFamille<?php echo $item['num']; ?>">
                                                        <?php echo esc_html($question); ?>
                                                    </button>
                                                </h3>
                                                <div id="collapseFamille<?php echo $item['num']; ?>" class="accordion-collapse collapse<?php echo $item['show']; ?>"
                                                    aria-labelledby="headingFamille<?php echo $item['num']; ?>" data-bs-parent="#accordionFamille">
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
            </div>
        </section>
        <?php endwhile; endif; wp_reset_postdata(); ?>

        <!-- CTA final -->
        <?php
        $cta_query = new WP_Query(array(
            'post_type' => 'page_famille_accueil',
            'posts_per_page' => 1,
            'meta_query' => array(array('key' => 'famille_type', 'value' => 'cta')),
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
                                        <h2><?php the_field('famille_cta_titre'); ?></h2>
                                        <p><?php the_field('famille_cta_sous_titre'); ?></p>
                                    </div>
                                    <div class="about-btn">
                                        <a href="<?php echo home_url('/quiz-famille-accueil'); ?>" class="theme-btn-s2">Faire le Quiz</a>
                                        <a href="<?php echo home_url('/formulaire-famille-accueil'); ?>" class="theme-btn-s2">Formulaire de candidature</a>
                                        <a href="<?php echo home_url('/contact'); ?>" class="theme-btn-s2">Nous contacter</a>
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
