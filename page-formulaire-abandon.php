<?php
/**
 * Template Name: Formulaire Abandon
 * Description: Formulaire de demande de prise en charge (abandon) multi-étapes (dynamique ACF)
 */
$form_post = null;
$form_query = new WP_Query(array(
    'post_type' => 'page_abandon',
    'meta_key' => 'abandon_type',
    'meta_value' => 'formulaire',
    'posts_per_page' => 1,
));
if ($form_query->have_posts()) {
    $form_query->the_post();
    $form_post = get_the_ID();
}
wp_reset_postdata();

$form_prefix = 'abandon';
$form_post_id = $form_post;
$form_css = 'formulaire-adoption.css';
$form_body_class = 'formulaire-abandon-page';
include(get_template_directory() . '/partials/formulaire-generic.php');
