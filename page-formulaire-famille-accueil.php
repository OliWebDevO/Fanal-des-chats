<?php
/**
 * Template Name: Formulaire Famille Accueil
 * Description: Formulaire de candidature famille d'accueil multi-étapes (dynamique ACF)
 */
$form_post = null;
$form_query = new WP_Query(array(
    'post_type' => 'page_famille_accueil',
    'meta_key' => 'famille_type',
    'meta_value' => 'formulaire',
    'posts_per_page' => 1,
));
if ($form_query->have_posts()) {
    $form_query->the_post();
    $form_post = get_the_ID();
}
wp_reset_postdata();

$form_prefix = 'famille';
$form_post_id = $form_post;
$form_css = 'formulaire-benevole.css';
$form_body_class = 'formulaire-benevole-page';
include(get_template_directory() . '/partials/formulaire-generic.php');
