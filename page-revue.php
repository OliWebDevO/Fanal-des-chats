<?php get_template_part("partials/header"); ?>
       <!-- start wpo-page-title -->
        <div class="space"></div>
        <section class="wpo-page-title orange">
            <div class="container">
                <div class="row">
                    <div class="col col-xs-12">
                        <div class="wpo-breadcumb-wrap">
                            <h2>Revue</h2>
                            <ol class="wpo-breadcumb-wrap">
                                <li><a href="<?php echo home_url(); ?>">Accueil</a></li>
                                <li>Revue</li>
                            </ol>
                        </div>
                    </div>
                </div> <!-- end row -->
            </div> <!-- end container -->
        </section>
        <!-- end page-title -->

        <!-- start revues-section -->
        <section class="revues-section section-padding orange">
            <div class="container">
                <div class="row">
                    <div class="col col-xs-12">
                        <div class="revues-grid clearfix">
                            <?php
                            $revues_query = new WP_Query(array(
                                'post_type' => 'revue',
                                'posts_per_page' => -1,
                                'orderby' => 'date',
                                'order' => 'DESC',
                            ));
                            if ($revues_query->have_posts()) : while ($revues_query->have_posts()) : $revues_query->the_post();
                                $date_publication = get_field('revue_date');
                                $lien_pdf = get_field('revue_lien');
                            ?>
                            <div class="revue-card">
                                <div class="img-holder">
                                    <?php if (has_post_thumbnail()) : ?>
                                        <?php the_post_thumbnail('medium'); ?>
                                    <?php else : ?>
                                        <img src="<?php bloginfo("template_url")?>/assets/images/images/journal.png" alt="">
                                    <?php endif; ?>
                                </div>
                                <div class="details">
                                    <h3><?php the_title(); ?></h3>
                                    <span><?php echo esc_html($date_publication); ?></span>
                                    <div class="revue-action">
                                        <a href="<?php echo esc_url($lien_pdf); ?>" target="_blank">Obtenir la revue</a>
                                    </div>
                                </div>
                            </div>
                            <?php endwhile; endif; wp_reset_postdata(); ?>
                        </div>
                    </div>
                </div>
            </div> <!-- end container -->
        </section>
        <!-- end revues-section -->

<?php get_template_part("partials/footer"); ?>
