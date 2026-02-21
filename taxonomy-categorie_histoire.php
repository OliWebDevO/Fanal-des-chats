<?php
/**
 * Template pour afficher les archives d'une catégorie d'histoires
 * Taxonomy: categorie_histoire
 */
get_template_part("partials/header");

// Récupérer la catégorie courante
$current_term = get_queried_object();

// Pagination
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

// Query pour les histoires de cette catégorie
$histoires_query = new WP_Query(array(
    'post_type' => 'histoire',
    'posts_per_page' => 6,
    'paged' => $paged,
    'orderby' => 'date',
    'order' => 'DESC',
    'tax_query' => array(
        array(
            'taxonomy' => 'categorie_histoire',
            'field'    => 'term_id',
            'terms'    => $current_term->term_id,
        ),
    ),
));
?>

    <!-- start wpo-page-title -->
    <div class="space"></div>
    <section class="wpo-page-title orange">
        <div class="container">
            <div class="row">
                <div class="col col-xs-12">
                    <div class="wpo-breadcumb-wrap">
                        <h2><?php echo esc_html($current_term->name); ?></h2>
                        <ol class="wpo-breadcumb-wrap">
                            <li><a href="<?php echo home_url('/'); ?>">Accueil</a></li>
                            <li><a href="<?php echo home_url('/histoires'); ?>">Histoires d'adoption</a></li>
                            <li><?php echo esc_html($current_term->name); ?></li>
                        </ol>
                    </div>
                </div>
            </div> <!-- end row -->
        </div> <!-- end container -->
    </section>
    <!-- end page-title -->

    <!-- start wpo-blog-pg-section -->
    <section class="wpo-blog-pg-section section-padding orange">
        <div class="container">
            <div class="row">
                <div class="col col-lg-8 col-12">
                    <div class="wpo-blog-content">
                        <?php if ($current_term->description) : ?>
                        <div class="category-description" style="margin-bottom: 30px;">
                            <p><?php echo esc_html($current_term->description); ?></p>
                        </div>
                        <?php endif; ?>

                        <?php if ($histoires_query->have_posts()) : ?>
                            <?php while ($histoires_query->have_posts()) : $histoires_query->the_post(); ?>
                                <?php
                                // Récupérer les champs ACF
                                $auteur = get_field('histoire_auteur');
                                ?>
                                <div class="post format-standard-image">
                                    <?php if (has_post_thumbnail()) : ?>
                                    <div class="entry-media">
                                        <a href="<?php the_permalink(); ?>">
                                            <?php the_post_thumbnail('large', array('alt' => get_the_title())); ?>
                                        </a>
                                    </div>
                                    <?php endif; ?>
                                    <div class="entry-meta">
                                        <ul>
                                            <?php if ($auteur) : ?>
                                            <li><i class="fi flaticon-user"></i> Par <a href="#"><?php echo esc_html($auteur); ?></a></li>
                                            <?php endif; ?>
                                            <li><i class="fi flaticon-calendar-1"></i> <?php echo get_the_date('d M Y'); ?></li>
                                        </ul>
                                    </div>
                                    <div class="entry-details">
                                        <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                        <?php if (has_excerpt()) : ?>
                                            <p><?php echo get_the_excerpt(); ?></p>
                                        <?php else : ?>
                                            <p><?php echo wp_trim_words(get_the_content(), 40, '...'); ?></p>
                                        <?php endif; ?>
                                        <a href="<?php the_permalink(); ?>" class="read-more">LIRE SON HISTOIRE...</a>
                                    </div>
                                </div>
                            <?php endwhile; ?>

                            <?php
                            // Pagination
                            $total_pages = $histoires_query->max_num_pages;
                            if ($total_pages > 1) :
                            ?>
                            <div class="pagination-wrapper pagination-wrapper-left">
                                <?php
                                echo paginate_links(array(
                                    'total' => $total_pages,
                                    'current' => $paged,
                                    'prev_text' => '<i class="fi ti-angle-left"></i>',
                                    'next_text' => '<i class="fi ti-angle-right"></i>',
                                    'type' => 'list',
                                ));
                                ?>
                            </div>
                            <?php endif; ?>

                            <?php wp_reset_postdata(); ?>
                        <?php else : ?>
                            <div class="no-posts">
                                <p>Aucune histoire dans cette catégorie pour le moment.</p>
                                <p><a href="<?php echo home_url('/histoires'); ?>">Voir toutes les histoires d'adoption</a></p>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col col-lg-4 col-12">
                    <div class="blog-sidebar">
                        <div class="widget about-widget">
                            <h3>Partagez votre histoire</h3>
                            <p>Vous avez adopté un chat au Fanal des Chats ? Nous serions ravis de publier son histoire et de montrer son évolution !</p>
                            <div class="about-btn" style="margin-top: 15px;">
                                <a href="<?php echo home_url('/contact'); ?>" class="theme-btn-s2">Contactez-nous</a>
                            </div>
                        </div>
                        <div class="widget recent-post-widget">
                            <h3>Dernières histoires</h3>
                            <div class="posts">
                                <?php
                                $recent_histoires = new WP_Query(array(
                                    'post_type' => 'histoire',
                                    'posts_per_page' => 3,
                                    'orderby' => 'date',
                                    'order' => 'DESC',
                                ));
                                if ($recent_histoires->have_posts()) :
                                    while ($recent_histoires->have_posts()) : $recent_histoires->the_post();
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
                            </div>
                        </div>
                        <div class="widget tag-widget">
                            <h3>Catégories</h3>
                            <ul>
                                <?php
                                $categories = get_terms(array(
                                    'taxonomy' => 'categorie_histoire',
                                    'hide_empty' => false,
                                ));
                                if ($categories && !is_wp_error($categories)) :
                                    foreach ($categories as $cat) :
                                        $active_class = ($cat->term_id === $current_term->term_id) ? ' class="active"' : '';
                                ?>
                                <li<?php echo $active_class; ?>><a href="<?php echo get_term_link($cat); ?>"><?php echo esc_html($cat->name); ?></a></li>
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
