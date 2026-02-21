<?php get_template_part("partials/header"); ?>

        <!-- start wpo-page-title -->
        <div class="space"></div>
        <section class="wpo-page-title orange">
            <div class="container">
                <div class="row">
                    <div class="col col-xs-12">
                        <div class="wpo-breadcumb-wrap">
                            <h2>Foire Aux Questions</h2>
                            <ol class="wpo-breadcumb-wrap">
                                <li><a href="<?php echo home_url('/'); ?>">Accueil</a></li>
                                <li>FAQ</li>
                            </ol>
                        </div>
                    </div>
                </div> <!-- end row -->
            </div> <!-- end container -->
        </section>
        <!-- end page-title -->

        <style>
            .faq-global-page .section-title h2 {
                font-size: 28px;
            }
        </style>

        <?php
        // Configuration des sections FAQ
        $faq_sections = array(
            array(
                'post_type'    => 'page_adoption',
                'meta_key'     => 'adoption_type',
                'prefix'       => 'adoption',
                'accordion_id' => 'accordionAdoption',
                'titre'        => "Questions fréquentes sur l'adoption",
                'page_slug'    => 'adoption',
            ),
            array(
                'post_type'    => 'page_famille_accueil',
                'meta_key'     => 'famille_type',
                'prefix'       => 'famille',
                'accordion_id' => 'accordionFamille',
                'titre'        => "Questions fréquentes sur les familles d'accueil",
                'page_slug'    => 'famille-accueil',
            ),
            array(
                'post_type'    => 'page_abandon',
                'meta_key'     => 'abandon_type',
                'prefix'       => 'abandon',
                'accordion_id' => 'accordionAbandon',
                'titre'        => "Questions fréquentes sur l'abandon",
                'page_slug'    => 'abandon',
            ),
            array(
                'post_type'    => 'page_don',
                'meta_key'     => 'don_type',
                'prefix'       => 'don',
                'accordion_id' => 'accordionDon',
                'titre'        => 'Questions fréquentes sur les dons',
                'page_slug'    => 'don',
            ),
            array(
                'post_type'    => 'page_legue',
                'meta_key'     => 'legue_type',
                'prefix'       => 'legue',
                'accordion_id' => 'accordionLegue',
                'titre'        => 'Questions fréquentes sur les legs',
                'page_slug'    => 'leguer',
            ),
            array(
                'post_type'    => 'page_emploi',
                'meta_key'     => 'emploi_type',
                'prefix'       => 'emploi',
                'accordion_id' => 'accordionEmploi',
                'titre'        => "Questions fréquentes sur l'emploi",
                'page_slug'    => 'emploi',
            ),
            array(
                'post_type'    => 'page_benevole',
                'meta_key'     => 'benevole_type',
                'prefix'       => 'benevole',
                'accordion_id' => 'accordionBenevole',
                'titre'        => 'Questions fréquentes sur le bénévolat',
                'page_slug'    => 'benevole',
            ),
            array(
                'post_type'    => 'page_stage',
                'meta_key'     => 'stage_type',
                'prefix'       => 'stage',
                'accordion_id' => 'accordionStage',
                'titre'        => 'Questions fréquentes sur le stage',
                'page_slug'    => 'stage',
            ),
        );

        $faq_nums = array(
            array('num' => 'One',   'index' => 1, 'expanded' => 'true',  'show' => ' show'),
            array('num' => 'Two',   'index' => 2, 'expanded' => 'false', 'show' => ''),
            array('num' => 'Three', 'index' => 3, 'expanded' => 'false', 'show' => ''),
            array('num' => 'Four',  'index' => 4, 'expanded' => 'false', 'show' => ''),
        );

        foreach ($faq_sections as $section) :
            $faq_query = new WP_Query(array(
                'post_type'      => $section['post_type'],
                'posts_per_page' => 1,
                'meta_query'     => array(
                    array(
                        'key'   => $section['meta_key'],
                        'value' => 'faq',
                    ),
                ),
            ));

            if ($faq_query->have_posts()) : while ($faq_query->have_posts()) : $faq_query->the_post();
        ?>
        <!-- start wpo-faq-section <?php echo $section['prefix']; ?> -->
        <section class="wpo-faq-section section-padding orange faq-global-page">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-12">
                        <div class="section-title">
                            <h2><?php echo esc_html($section['titre']); ?></h2>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="wpo-faq-inner">
                            <div class="row">
                                <div class="col-lg-12 col-12">
                                    <div class="wpo-benefits-item">
                                        <div class="accordion" id="<?php echo $section['accordion_id']; ?>">
                                            <?php
                                            foreach ($faq_nums as $item) :
                                                $question = get_field($section['prefix'] . '_faq_question_' . $item['index']);
                                                $reponse  = get_field($section['prefix'] . '_faq_reponse_' . $item['index']);
                                                $uid = $section['prefix'] . $item['num'];
                                                if ($question && $reponse) :
                                            ?>
                                            <div class="accordion-item">
                                                <h3 class="accordion-header" id="heading<?php echo $uid; ?>">
                                                    <button class="accordion-button<?php echo $item['index'] > 1 ? ' collapsed' : ''; ?>" type="button"
                                                        data-bs-toggle="collapse" data-bs-target="#collapse<?php echo $uid; ?>"
                                                        aria-expanded="<?php echo $item['expanded']; ?>" aria-controls="collapse<?php echo $uid; ?>">
                                                        <?php echo esc_html($question); ?>
                                                    </button>
                                                </h3>
                                                <div id="collapse<?php echo $uid; ?>" class="accordion-collapse collapse<?php echo $item['show']; ?>"
                                                    aria-labelledby="heading<?php echo $uid; ?>" data-bs-parent="#<?php echo $section['accordion_id']; ?>">
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
                    <div class="col-lg-12 text-center" style="margin-top: 30px;">
                        <a href="<?php echo home_url('/' . $section['page_slug']); ?>" class="theme-btn-s2">En Savoir Plus</a>
                    </div>
                </div>
            </div> <!-- end container -->
        </section>
        <?php endwhile; endif; wp_reset_postdata(); ?>
        <!-- end faq-section <?php echo $section['prefix']; ?> -->

        <?php endforeach; ?>

<?php get_template_part("partials/footer"); ?>
