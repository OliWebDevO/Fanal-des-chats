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

        <!-- Intro section -->
        <div class="wpo-service-single-area section-padding orange">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-12">
                        <div class="wpo-service-single-wrap">
                            <div class="wpo-service-single-item">
                                <div class="wpo-service-single-title">
                                    <h3>Offrez votre soutien à un chat du refuge</h3>
                                </div>
                                <p>En parrainant un chat du Fanal des Chats, vous contribuez directement à ses soins quotidiens, sa nourriture et ses frais vétérinaires. Chaque parrainage fait une réelle différence dans la vie de nos pensionnaires.</p>
                                <p>Parcourez les profils de nos chats ci-dessous et cliquez sur celui que vous souhaitez parrainer pour effectuer un don en son nom.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

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
                            $age = get_field('parrainage_age');
                            $lien_don = get_field('parrainage_lien_don');
                            if (empty($lien_don)) {
                                $lien_don = home_url('/don');
                            }
                    ?>
                    <div class="col-lg-4 col-md-6 col-12 mb-4">
                        <a href="<?php echo esc_url($lien_don); ?>" class="parrainage-card-link" style="text-decoration: none; color: inherit;">
                            <div class="wpo-team-wrap" style="cursor: pointer; transition: transform 0.3s ease, box-shadow 0.3s ease;">
                                <div class="wpo-team-img">
                                    <?php if (has_post_thumbnail()) : ?>
                                        <?php the_post_thumbnail('medium_large', array('style' => 'width: 100%; height: 300px; object-fit: contain; padding: 15px;')); ?>
                                    <?php else : ?>
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/images/illustrations/3_cute cat.png" alt="<?php the_title(); ?>" style="width: 100%; height: 300px; object-fit: contain; padding: 15px;">
                                    <?php endif; ?>
                                </div>
                                <div class="wpo-team-text" style="padding: 20px; text-align: center;">
                                    <h3 style="margin-bottom: 5px;"><?php the_title(); ?></h3>
                                    <?php if ($age) : ?>
                                        <span style="color: #e8804c; font-weight: 600; display: block; margin-bottom: 10px;"><?php echo esc_html($age); ?></span>
                                    <?php endif; ?>
                                    <?php if ($description) : ?>
                                        <p style="font-size: 14px; color: #666; margin-bottom: 15px;"><?php echo esc_html($description); ?></p>
                                    <?php endif; ?>
                                    <span class="theme-btn-s2" style="display: inline-block; padding: 8px 25px; font-size: 14px;">Parrainer <i class="fas fa-heart"></i></span>
                                </div>
                            </div>
                        </a>
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
                                <a href="<?php echo home_url('/don'); ?>" class="theme-btn-s2">Faire un don général</a>
                            </div>
                        </div>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </section>

        <style>
            .parrainage-card-link:hover .wpo-team-wrap {
                transform: translateY(-5px);
                box-shadow: 0 10px 30px rgba(0,0,0,0.15);
            }
            .wpo-team-wrap {
                border-radius: 10px;
                overflow: hidden;
                box-shadow: 0 2px 15px rgba(0,0,0,0.08);
                background: #fff;
            }
            .wpo-team-img {
                background: #f8f4f0;
            }
        </style>

<?php get_template_part("partials/footer"); ?>
