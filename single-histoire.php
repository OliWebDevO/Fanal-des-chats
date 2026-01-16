<?php
/**
 * Template pour afficher une histoire d'adoption individuelle
 * CPT: histoire
 */
get_template_part("partials/header");

// Récupérer les champs ACF
$auteur = get_field('histoire_auteur');
$auteur_photo = get_field('histoire_auteur_photo');
$date_adoption = get_field('histoire_date_adoption');
$citation = get_field('histoire_citation');
$galerie = get_field('histoire_galerie');

// Récupérer les catégories
$categories = get_the_terms(get_the_ID(), 'categorie_histoire');
?>

    <!-- start wpo-page-title -->
    <div class="space"></div>
    <section class="wpo-page-title orange">
        <div class="container">
            <div class="row">
                <div class="col col-xs-12">
                    <div class="wpo-breadcumb-wrap">
                        <h2><?php the_title(); ?></h2>
                        <ol class="wpo-breadcumb-wrap">
                            <li><a href="<?php echo home_url('/'); ?>">Accueil</a></li>
                            <li><a href="<?php echo home_url('/histoires'); ?>">Histoires d'adoption</a></li>
                            <li><?php the_title(); ?></li>
                        </ol>
                    </div>
                </div>
            </div> <!-- end row -->
        </div> <!-- end container -->
    </section>
    <!-- end page-title -->

    <!-- start wpo-blog-pg-section -->
    <section class="wpo-blog-single-section section-padding orange">
        <div class="container">
            <div class="row">
                <div class="col col-lg-8 col-12">
                    <div class="wpo-blog-content">
                        <div class="post format-standard-image">
                            <?php if (has_post_thumbnail()) : ?>
                            <div class="entry-media">
                                <?php the_post_thumbnail('large', array('alt' => get_the_title())); ?>
                            </div>
                            <?php endif; ?>
                            <div class="entry-meta">
                                <ul>
                                    <?php if ($auteur) : ?>
                                    <li><i class="fi flaticon-user"></i> Par <a href="#"><?php echo esc_html($auteur); ?></a></li>
                                    <?php endif; ?>
                                    <li><i class="fi flaticon-comment-white-oval-bubble"></i> <?php comments_number('0 Commentaire', '1 Commentaire', '% Commentaires'); ?></li>
                                    <li><i class="fi flaticon-calendar"></i> <?php echo get_the_date('d M Y'); ?></li>
                                </ul>
                            </div>
                            <h2><?php the_title(); ?></h2>

                            <?php
                            // Afficher le contenu avant la citation
                            $content = get_the_content();

                            // Si une citation est définie, on l'affiche après le premier paragraphe
                            if ($citation) {
                                // Trouver la position après le premier </p>
                                $first_p_end = strpos($content, '</p>');
                                if ($first_p_end !== false) {
                                    $before_citation = substr($content, 0, $first_p_end + 4);
                                    $after_citation = substr($content, $first_p_end + 4);

                                    echo apply_filters('the_content', $before_citation);
                                    echo '<blockquote>' . esc_html($citation) . '</blockquote>';
                                    echo apply_filters('the_content', $after_citation);
                                } else {
                                    echo '<blockquote>' . esc_html($citation) . '</blockquote>';
                                    the_content();
                                }
                            } else {
                                the_content();
                            }
                            ?>

                            <?php if ($galerie && count($galerie) > 0) : ?>
                            <div class="gallery">
                                <?php foreach ($galerie as $image) : ?>
                                <div>
                                    <img src="<?php echo esc_url($image['sizes']['medium_large']); ?>" alt="<?php echo esc_attr($image['alt']); ?>">
                                </div>
                                <?php endforeach; ?>
                            </div>
                            <?php endif; ?>
                        </div>

                        <?php if ($categories && !is_wp_error($categories)) : ?>
                        <div class="tag-share clearfix">
                            <div class="tag">
                                <span>Catégories: </span>
                                <ul>
                                    <?php foreach ($categories as $cat) : ?>
                                    <li><a href="<?php echo get_term_link($cat); ?>"><?php echo esc_html($cat->name); ?></a></li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        </div> <!-- end tag-share -->
                        <?php endif; ?>

                        <div class="tag-share-s2 clearfix">
                            <div class="tag">
                                <span>Partager: </span>
                                <ul>
                                    <li><a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode(get_permalink()); ?>" target="_blank">facebook</a></li>
                                    <li><a href="https://twitter.com/intent/tweet?url=<?php echo urlencode(get_permalink()); ?>&text=<?php echo urlencode(get_the_title()); ?>" target="_blank">twitter</a></li>
                                    <li><a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo urlencode(get_permalink()); ?>" target="_blank">linkedin</a></li>
                                </ul>
                            </div>
                        </div> <!-- end tag-share -->

                        <?php if ($auteur) : ?>
                        <div class="author-box">
                            <div class="author-avatar">
                                <?php if ($auteur_photo) : ?>
                                    <img src="<?php echo esc_url($auteur_photo); ?>" alt="<?php echo esc_attr($auteur); ?>">
                                <?php else : ?>
                                    <img src="<?php bloginfo('template_url'); ?>/assets/images/images/illustrations/3_cute cat.png" alt="<?php echo esc_attr($auteur); ?>">
                                <?php endif; ?>
                            </div>
                            <div class="author-content">
                                <span class="author-name">Témoignage de <?php echo esc_html($auteur); ?></span>
                                <?php if (has_excerpt()) : ?>
                                <p><?php echo get_the_excerpt(); ?></p>
                                <?php endif; ?>
                            </div>
                        </div> <!-- end author-box -->
                        <?php endif; ?>

                        <div class="more-posts">
                            <?php
                            $prev_post = get_previous_post();
                            $next_post = get_next_post();
                            ?>
                            <div class="previous-post">
                                <?php if ($prev_post) : ?>
                                <a href="<?php echo get_permalink($prev_post->ID); ?>">
                                    <span class="post-control-link">Histoire précédente</span>
                                    <span class="post-name"><?php echo esc_html($prev_post->post_title); ?></span>
                                </a>
                                <?php else : ?>
                                <a href="<?php echo home_url('/histoires'); ?>">
                                    <span class="post-control-link">Retour</span>
                                    <span class="post-name">Toutes les histoires</span>
                                </a>
                                <?php endif; ?>
                            </div>
                            <div class="next-post">
                                <?php if ($next_post) : ?>
                                <a href="<?php echo get_permalink($next_post->ID); ?>">
                                    <span class="post-control-link">Histoire suivante</span>
                                    <span class="post-name"><?php echo esc_html($next_post->post_title); ?></span>
                                </a>
                                <?php else : ?>
                                <a href="<?php echo home_url('/histoires'); ?>">
                                    <span class="post-control-link">Retour</span>
                                    <span class="post-name">Toutes les histoires</span>
                                </a>
                                <?php endif; ?>
                            </div>
                        </div>

                        <?php
                        // Afficher les commentaires
                        if (comments_open() || get_comments_number()) :
                            comments_template();
                        endif;
                        ?>
                    </div>
                </div>
                <div class="col col-lg-4">
                    <div class="blog-sidebar">
                        <div class="widget about-widget">
                            <h3>Partagez votre histoire</h3>
                            <p>Vous avez adopté un chat au Fanal des Chats ? Nous serions ravis de publier son histoire et de montrer son évolution !</p>
                            <div class="about-btn" style="margin-top: 15px;">
                                <a href="<?php echo home_url('/contact'); ?>" class="theme-btn-s2">Nous contacter</a>
                            </div>
                        </div>
                        <div class="widget recent-post-widget">
                            <h3>Autres histoires</h3>
                            <div class="posts">
                                <?php
                                $autres_histoires = new WP_Query(array(
                                    'post_type' => 'histoire',
                                    'posts_per_page' => 3,
                                    'post__not_in' => array(get_the_ID()),
                                    'orderby' => 'date',
                                    'order' => 'DESC',
                                ));
                                if ($autres_histoires->have_posts()) :
                                    while ($autres_histoires->have_posts()) : $autres_histoires->the_post();
                                ?>
                                <div class="post">
                                    <div class="img-holder">
                                        <a href="<?php the_permalink(); ?>">
                                            <?php if (has_post_thumbnail()) : ?>
                                                <?php the_post_thumbnail('thumbnail'); ?>
                                            <?php else : ?>
                                                <img src="<?php bloginfo('template_url'); ?>/assets/images/images/illustrations/3_cute cat.png" alt="">
                                            <?php endif; ?>
                                        </a>
                                    </div>
                                    <div class="details">
                                        <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                                        <span class="date"><?php echo get_the_date('d M Y'); ?></span>
                                    </div>
                                </div>
                                <?php
                                    endwhile;
                                    wp_reset_postdata();
                                endif;
                                ?>
                                <div class="post">
                                    <div class="img-holder">
                                        <a href="<?php echo home_url('/histoires'); ?>"><img src="<?php bloginfo('template_url'); ?>/assets/images/images/illustrations/6_kitten.png" alt="Voir toutes les histoires"></a>
                                    </div>
                                    <div class="details">
                                        <h4><a href="<?php echo home_url('/histoires'); ?>">Voir toutes les histoires d'adoption</a></h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="widget wpo-instagram-widget">
                            <div class="widget-title">
                                <h3>Nos pensionnaires</h3>
                            </div>
                            <ul class="d-flex">
                                <li><a href="<?php echo home_url('/adoption'); ?>"><img src="<?php bloginfo('template_url'); ?>/assets/images/images/illustrations/3_cute cat.png" alt=""></a></li>
                                <li><a href="<?php echo home_url('/adoption'); ?>"><img src="<?php bloginfo('template_url'); ?>/assets/images/images/illustrations/6_kitten.png" alt=""></a></li>
                                <li><a href="<?php echo home_url('/adoption'); ?>"><img src="<?php bloginfo('template_url'); ?>/assets/images/images/illustrations/14_orange cat.png" alt=""></a></li>
                                <li><a href="<?php echo home_url('/adoption'); ?>"><img src="<?php bloginfo('template_url'); ?>/assets/images/images/illustrations/19_cute gray cat.png" alt=""></a></li>
                                <li><a href="<?php echo home_url('/adoption'); ?>"><img src="<?php bloginfo('template_url'); ?>/assets/images/images/illustrations/4_playful cat.png" alt=""></a></li>
                                <li><a href="<?php echo home_url('/adoption'); ?>"><img src="<?php bloginfo('template_url'); ?>/assets/images/images/illustrations/7_pretty cat.png" alt=""></a></li>
                            </ul>
                        </div>
                        <div class="widget tag-widget">
                            <h3>Catégories</h3>
                            <ul>
                                <?php
                                $all_categories = get_terms(array(
                                    'taxonomy' => 'categorie_histoire',
                                    'hide_empty' => false,
                                ));
                                if ($all_categories && !is_wp_error($all_categories)) :
                                    foreach ($all_categories as $cat) :
                                ?>
                                <li><a href="<?php echo get_term_link($cat); ?>"><?php echo esc_html($cat->name); ?></a></li>
                                <?php
                                    endforeach;
                                endif;
                                ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- end container -->
    </section>
    <!-- end wpo-blog-pg-section -->

<?php get_template_part("partials/footer"); ?>
