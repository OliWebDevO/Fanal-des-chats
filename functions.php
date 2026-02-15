<?php

// Activer les images a la une sur tous les types de contenu

add_theme_support('post-thumbnails');
add_theme_support( 'custom-header' );


// Enlever la hauteur et la largeur des images injectées dans WordPress
add_filter( 'post_thumbnail_html', 'remove_width_attribute', 10 );
add_filter( 'image_send_to_editor', 'remove_width_attribute', 10 );

function remove_width_attribute( $html ) {
   $html = preg_replace( '/(width|height)="\d*"\s/', "", $html );
   return $html;
}

// Convertir n'importe quelle URL YouTube en format embed
function convert_youtube_to_embed($url) {
    if (empty($url)) return '';

    $video_id = '';

    // Format: https://www.youtube.com/watch?v=VIDEO_ID
    if (preg_match('/youtube\.com\/watch\?v=([a-zA-Z0-9_-]+)/', $url, $matches)) {
        $video_id = $matches[1];
    }
    // Format: https://youtu.be/VIDEO_ID
    elseif (preg_match('/youtu\.be\/([a-zA-Z0-9_-]+)/', $url, $matches)) {
        $video_id = $matches[1];
    }
    // Format: https://www.youtube.com/embed/VIDEO_ID (déjà bon)
    elseif (preg_match('/youtube\.com\/embed\/([a-zA-Z0-9_-]+)/', $url, $matches)) {
        $video_id = $matches[1];
    }

    if ($video_id) {
        return 'https://www.youtube.com/embed/' . $video_id;
    }

    return $url;
}


/*--------------------------------------------------------------
# Custom Post Types - Une page = Un CPT
--------------------------------------------------------------*/

// CPT: Accueil
function register_cpt_page_accueil() {
    $labels = array(
        'name'               => 'Accueil',
        'singular_name'      => 'Contenu Accueil',
        'menu_name'          => 'Accueil',
        'add_new'            => 'Ajouter du contenu',
        'add_new_item'       => 'Ajouter du contenu',
        'edit_item'          => 'Modifier le contenu',
        'new_item'           => 'Nouveau contenu',
        'view_item'          => 'Voir le contenu',
        'search_items'       => 'Rechercher',
        'not_found'          => 'Aucun contenu trouvé',
    );

    $args = array(
        'labels'             => $labels,
        'public'             => false,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'menu_position'      => 5,
        'menu_icon'          => 'dashicons-admin-home',
        'supports'           => array('title'),
        'has_archive'        => false,
    );

    register_post_type('page_accueil', $args);
}
add_action('init', 'register_cpt_page_accueil');

// CPT: Slider
function register_cpt_slider() {
    $labels = array(
        'name'               => 'Slider',
        'singular_name'      => 'Contenu Slider',
        'menu_name'          => 'Slider',
        'add_new'            => 'Ajouter du contenu',
        'add_new_item'       => 'Ajouter du contenu',
        'edit_item'          => 'Modifier le contenu',
        'new_item'           => 'Nouveau contenu',
        'view_item'          => 'Voir le contenu',
        'search_items'       => 'Rechercher',
        'not_found'          => 'Aucun contenu trouvé',
    );

    $args = array(
        'labels'             => $labels,
        'public'             => false,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'menu_position'      => 4,
        'menu_icon'          => 'dashicons-images-alt2',
        'supports'           => array('title'),
        'has_archive'        => false,
    );

    register_post_type('slider', $args);
}
add_action('init', 'register_cpt_slider');

// CPT: A Propos
function register_cpt_page_about() {
    $labels = array(
        'name'               => 'A Propos',
        'singular_name'      => 'Contenu A Propos',
        'menu_name'          => 'A Propos',
        'add_new'            => 'Ajouter du contenu',
        'add_new_item'       => 'Ajouter du contenu',
        'edit_item'          => 'Modifier le contenu',
        'new_item'           => 'Nouveau contenu',
        'view_item'          => 'Voir le contenu',
        'search_items'       => 'Rechercher',
        'not_found'          => 'Aucun contenu trouvé',
    );

    $args = array(
        'labels'             => $labels,
        'public'             => false,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'menu_position'      => 6,
        'menu_icon'          => 'dashicons-info',
        'supports'           => array('title'),
        'has_archive'        => false,
    );

    register_post_type('page_about', $args);
}
add_action('init', 'register_cpt_page_about');

// CPT: Adoption
function register_cpt_page_adoption() {
    $labels = array(
        'name'               => 'Adoption',
        'singular_name'      => 'Contenu Adoption',
        'menu_name'          => 'Adoption',
        'add_new'            => 'Ajouter du contenu',
        'add_new_item'       => 'Ajouter du contenu',
        'edit_item'          => 'Modifier le contenu',
        'new_item'           => 'Nouveau contenu',
        'view_item'          => 'Voir le contenu',
        'search_items'       => 'Rechercher',
        'not_found'          => 'Aucun contenu trouvé',
    );

    $args = array(
        'labels'             => $labels,
        'public'             => false,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'menu_position'      => 7,
        'menu_icon'          => 'dashicons-heart',
        'supports'           => array('title'),
        'has_archive'        => false,
    );

    register_post_type('page_adoption', $args);
}
add_action('init', 'register_cpt_page_adoption');

// CPT: Abandon
function register_cpt_page_abandon() {
    $labels = array(
        'name'               => 'Abandon',
        'singular_name'      => 'Contenu Abandon',
        'menu_name'          => 'Abandon',
        'add_new'            => 'Ajouter du contenu',
        'add_new_item'       => 'Ajouter du contenu',
        'edit_item'          => 'Modifier le contenu',
        'new_item'           => 'Nouveau contenu',
        'view_item'          => 'Voir le contenu',
        'search_items'       => 'Rechercher',
        'not_found'          => 'Aucun contenu trouvé',
    );

    $args = array(
        'labels'             => $labels,
        'public'             => false,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'menu_position'      => 8,
        'menu_icon'          => 'dashicons-dismiss',
        'supports'           => array('title'),
        'has_archive'        => false,
    );

    register_post_type('page_abandon', $args);
}
add_action('init', 'register_cpt_page_abandon');

// CPT: Don
function register_cpt_page_don() {
    $labels = array(
        'name'               => 'Don',
        'singular_name'      => 'Contenu Don',
        'menu_name'          => 'Don',
        'add_new'            => 'Ajouter du contenu',
        'add_new_item'       => 'Ajouter du contenu',
        'edit_item'          => 'Modifier le contenu',
        'new_item'           => 'Nouveau contenu',
        'view_item'          => 'Voir le contenu',
        'search_items'       => 'Rechercher',
        'not_found'          => 'Aucun contenu trouvé',
    );

    $args = array(
        'labels'             => $labels,
        'public'             => false,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'menu_position'      => 9,
        'menu_icon'          => 'dashicons-money-alt',
        'supports'           => array('title'),
        'has_archive'        => false,
    );

    register_post_type('page_don', $args);
}
add_action('init', 'register_cpt_page_don');

// CPT: Bénévole
function register_cpt_page_benevole() {
    $labels = array(
        'name'               => 'Bénévole',
        'singular_name'      => 'Contenu Bénévole',
        'menu_name'          => 'Bénévole',
        'add_new'            => 'Ajouter du contenu',
        'add_new_item'       => 'Ajouter du contenu',
        'edit_item'          => 'Modifier le contenu',
        'new_item'           => 'Nouveau contenu',
        'view_item'          => 'Voir le contenu',
        'search_items'       => 'Rechercher',
        'not_found'          => 'Aucun contenu trouvé',
    );

    $args = array(
        'labels'             => $labels,
        'public'             => false,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'menu_position'      => 10,
        'menu_icon'          => 'dashicons-groups',
        'supports'           => array('title'),
        'has_archive'        => false,
    );

    register_post_type('page_benevole', $args);
}
add_action('init', 'register_cpt_page_benevole');

// CPT: Emploi
function register_cpt_page_emploi() {
    $labels = array(
        'name'               => 'Emploi',
        'singular_name'      => 'Contenu Emploi',
        'menu_name'          => 'Emploi',
        'add_new'            => 'Ajouter du contenu',
        'add_new_item'       => 'Ajouter du contenu',
        'edit_item'          => 'Modifier le contenu',
        'new_item'           => 'Nouveau contenu',
        'view_item'          => 'Voir le contenu',
        'search_items'       => 'Rechercher',
        'not_found'          => 'Aucun contenu trouvé',
    );

    $args = array(
        'labels'             => $labels,
        'public'             => false,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'menu_position'      => 11,
        'menu_icon'          => 'dashicons-businessman',
        'supports'           => array('title'),
        'has_archive'        => false,
    );

    register_post_type('page_emploi', $args);
}
add_action('init', 'register_cpt_page_emploi');

// CPT: Stage
function register_cpt_page_stage() {
    $labels = array(
        'name'               => 'Stage',
        'singular_name'      => 'Contenu Stage',
        'menu_name'          => 'Stage',
        'add_new'            => 'Ajouter du contenu',
        'add_new_item'       => 'Ajouter du contenu',
        'edit_item'          => 'Modifier le contenu',
        'new_item'           => 'Nouveau contenu',
        'view_item'          => 'Voir le contenu',
        'search_items'       => 'Rechercher',
        'not_found'          => 'Aucun contenu trouvé',
    );

    $args = array(
        'labels'             => $labels,
        'public'             => false,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'menu_position'      => 12,
        'menu_icon'          => 'dashicons-welcome-learn-more',
        'supports'           => array('title'),
        'has_archive'        => false,
    );

    register_post_type('page_stage', $args);
}
add_action('init', 'register_cpt_page_stage');

// CPT: Famille d'accueil
function register_cpt_page_famille_accueil() {
    $labels = array(
        'name'               => 'Famille d\'accueil',
        'singular_name'      => 'Contenu Famille d\'accueil',
        'menu_name'          => 'Famille d\'accueil',
        'add_new'            => 'Ajouter du contenu',
        'add_new_item'       => 'Ajouter du contenu',
        'edit_item'          => 'Modifier le contenu',
        'new_item'           => 'Nouveau contenu',
        'view_item'          => 'Voir le contenu',
        'search_items'       => 'Rechercher',
        'not_found'          => 'Aucun contenu trouvé',
    );

    $args = array(
        'labels'             => $labels,
        'public'             => false,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'menu_position'      => 13,
        'menu_icon'          => 'dashicons-heart',
        'supports'           => array('title'),
        'has_archive'        => false,
    );

    register_post_type('page_famille_accueil', $args);
}
add_action('init', 'register_cpt_page_famille_accueil');

// CPT: Chats à parrainer
function register_cpt_chat_parrainage() {
    $labels = array(
        'name'               => 'Parrainer un chat',
        'singular_name'      => 'Chat à parrainer',
        'menu_name'          => 'Parrainer un chat',
        'add_new'            => 'Ajouter un chat',
        'add_new_item'       => 'Ajouter un chat à parrainer',
        'edit_item'          => 'Modifier le chat',
        'new_item'           => 'Nouveau chat',
        'view_item'          => 'Voir le chat',
        'search_items'       => 'Rechercher',
        'not_found'          => 'Aucun chat trouvé',
    );

    $args = array(
        'labels'             => $labels,
        'public'             => false,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'menu_position'      => 14,
        'menu_icon'          => 'dashicons-pets',
        'supports'           => array('title', 'thumbnail'),
        'has_archive'        => false,
    );

    register_post_type('chat_parrainage', $args);
}
add_action('init', 'register_cpt_chat_parrainage');

// CPT: Lègue
function register_cpt_page_legue() {
    $labels = array(
        'name'               => 'Lègue',
        'singular_name'      => 'Contenu Lègue',
        'menu_name'          => 'Lègue',
        'add_new'            => 'Ajouter du contenu',
        'add_new_item'       => 'Ajouter du contenu',
        'edit_item'          => 'Modifier le contenu',
        'new_item'           => 'Nouveau contenu',
        'view_item'          => 'Voir le contenu',
        'search_items'       => 'Rechercher',
        'not_found'          => 'Aucun contenu trouvé',
    );

    $args = array(
        'labels'             => $labels,
        'public'             => false,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'menu_position'      => 10,
        'menu_icon'          => 'dashicons-portfolio',
        'supports'           => array('title'),
        'has_archive'        => false,
    );

    register_post_type('page_legue', $args);
}
add_action('init', 'register_cpt_page_legue');

// CPT: Revues
function register_cpt_revue() {
    $labels = array(
        'name'               => 'Revues',
        'singular_name'      => 'Revue',
        'menu_name'          => 'Revues',
        'add_new'            => 'Ajouter',
        'add_new_item'       => 'Ajouter une revue',
        'edit_item'          => 'Modifier la revue',
        'new_item'           => 'Nouvelle revue',
        'view_item'          => 'Voir la revue',
        'search_items'       => 'Rechercher',
        'not_found'          => 'Aucune revue trouvée',
    );

    $args = array(
        'labels'             => $labels,
        'public'             => false,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'menu_position'      => 15,
        'menu_icon'          => 'dashicons-book-alt',
        'supports'           => array('title', 'thumbnail'),
        'has_archive'        => false,
    );

    register_post_type('revue', $args);
}
add_action('init', 'register_cpt_revue');


/*--------------------------------------------------------------
# Groupes de champs ACF/SCF
--------------------------------------------------------------*/

if( function_exists('acf_add_local_field_group') ) {

    // ============================================================
    // GROUPE: Slider - Contenu spécifique
    // ============================================================
    acf_add_local_field_group(array(
        'key' => 'group_slider',
        'title' => 'Contenu spécifique',
        'fields' => array(
            // Type de contenu slider
            array(
                'key' => 'field_slider_type',
                'label' => 'Type de contenu',
                'name' => 'slider_type',
                'type' => 'select',
                'instructions' => 'Sélectionnez le type de contenu',
                'required' => 1,
                'choices' => array(
                    'texte' => 'Titre & Texte',
                    'images_main' => 'Images principales (grandes)',
                    'images_thumb' => 'Images miniatures (petites)',
                ),
                'default_value' => 'texte',
            ),
            // Titre (pour type texte)
            array(
                'key' => 'field_slider_titre',
                'label' => 'Titre',
                'name' => 'slider_titre',
                'type' => 'text',
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_slider_type',
                            'operator' => '==',
                            'value' => 'texte',
                        ),
                    ),
                ),
            ),
            // Texte (pour type texte)
            array(
                'key' => 'field_slider_texte',
                'label' => 'Texte',
                'name' => 'slider_texte',
                'type' => 'textarea',
                'rows' => 4,
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_slider_type',
                            'operator' => '==',
                            'value' => 'texte',
                        ),
                    ),
                ),
            ),
            // Galerie images principales
            array(
                'key' => 'field_slider_images_main',
                'label' => 'Images principales',
                'name' => 'slider_images_main',
                'type' => 'gallery',
                'return_format' => 'array',
                'preview_size' => 'medium',
                'library' => 'all',
                'min' => 1,
                'max' => 10,
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_slider_type',
                            'operator' => '==',
                            'value' => 'images_main',
                        ),
                    ),
                ),
            ),
            // Galerie images miniatures
            array(
                'key' => 'field_slider_images_thumb',
                'label' => 'Images miniatures',
                'name' => 'slider_images_thumb',
                'type' => 'gallery',
                'return_format' => 'array',
                'preview_size' => 'thumbnail',
                'library' => 'all',
                'min' => 1,
                'max' => 10,
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_slider_type',
                            'operator' => '==',
                            'value' => 'images_thumb',
                        ),
                    ),
                ),
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'slider',
                ),
            ),
        ),
        'menu_order' => 1,
    ));

    // ============================================================
    // GROUPE: Contenu spécifique Page Accueil
    // ============================================================
    acf_add_local_field_group(array(
        'key' => 'group_page_accueil',
        'title' => 'Contenu spécifique',
        'fields' => array(
            // Type de contenu
            array(
                'key' => 'field_accueil_type',
                'label' => 'Type de contenu',
                'name' => 'accueil_type',
                'type' => 'select',
                'instructions' => 'Sélectionnez le type de contenu',
                'required' => 1,
                'choices' => array(
                    'services' => 'Services',
                    'apropos' => 'A propos',
                    'dons_adoptions' => 'Dons & Adoptions',
                    'temoignages' => 'Témoignages',
                ),
                'default_value' => 'services',
            ),

            // === CHAMPS SERVICES ===
            // Service 1
            array(
                'key' => 'field_services_titre_1',
                'label' => 'Titre 1',
                'name' => 'services_titre_1',
                'type' => 'text',
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_accueil_type',
                            'operator' => '==',
                            'value' => 'services',
                        ),
                    ),
                ),
            ),
            array(
                'key' => 'field_services_texte_1',
                'label' => 'Texte 1',
                'name' => 'services_texte_1',
                'type' => 'textarea',
                'rows' => 3,
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_accueil_type',
                            'operator' => '==',
                            'value' => 'services',
                        ),
                    ),
                ),
            ),
            // Service 2
            array(
                'key' => 'field_services_titre_2',
                'label' => 'Titre 2',
                'name' => 'services_titre_2',
                'type' => 'text',
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_accueil_type',
                            'operator' => '==',
                            'value' => 'services',
                        ),
                    ),
                ),
            ),
            array(
                'key' => 'field_services_texte_2',
                'label' => 'Texte 2',
                'name' => 'services_texte_2',
                'type' => 'textarea',
                'rows' => 3,
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_accueil_type',
                            'operator' => '==',
                            'value' => 'services',
                        ),
                    ),
                ),
            ),
            // Service 3
            array(
                'key' => 'field_services_titre_3',
                'label' => 'Titre 3',
                'name' => 'services_titre_3',
                'type' => 'text',
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_accueil_type',
                            'operator' => '==',
                            'value' => 'services',
                        ),
                    ),
                ),
            ),
            array(
                'key' => 'field_services_texte_3',
                'label' => 'Texte 3',
                'name' => 'services_texte_3',
                'type' => 'textarea',
                'rows' => 3,
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_accueil_type',
                            'operator' => '==',
                            'value' => 'services',
                        ),
                    ),
                ),
            ),
            // Service 4
            array(
                'key' => 'field_services_titre_4',
                'label' => 'Titre 4',
                'name' => 'services_titre_4',
                'type' => 'text',
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_accueil_type',
                            'operator' => '==',
                            'value' => 'services',
                        ),
                    ),
                ),
            ),
            array(
                'key' => 'field_services_texte_4',
                'label' => 'Texte 4',
                'name' => 'services_texte_4',
                'type' => 'textarea',
                'rows' => 3,
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_accueil_type',
                            'operator' => '==',
                            'value' => 'services',
                        ),
                    ),
                ),
            ),

            // === CHAMPS A PROPOS ===
            array(
                'key' => 'field_apropos_titre',
                'label' => 'Titre Section',
                'name' => 'apropos_titre',
                'type' => 'text',
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_accueil_type',
                            'operator' => '==',
                            'value' => 'apropos',
                        ),
                    ),
                ),
            ),
            array(
                'key' => 'field_apropos_texte',
                'label' => 'Texte',
                'name' => 'apropos_texte',
                'type' => 'textarea',
                'rows' => 4,
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_accueil_type',
                            'operator' => '==',
                            'value' => 'apropos',
                        ),
                    ),
                ),
            ),
            array(
                'key' => 'field_apropos_titre_encart',
                'label' => 'Titre Encart',
                'name' => 'apropos_titre_encart',
                'type' => 'text',
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_accueil_type',
                            'operator' => '==',
                            'value' => 'apropos',
                        ),
                    ),
                ),
            ),
            array(
                'key' => 'field_apropos_texte_encart',
                'label' => 'Texte Encart',
                'name' => 'apropos_texte_encart',
                'type' => 'textarea',
                'rows' => 3,
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_accueil_type',
                            'operator' => '==',
                            'value' => 'apropos',
                        ),
                    ),
                ),
            ),
            array(
                'key' => 'field_apropos_video_encart',
                'label' => 'Vidéo Encart',
                'name' => 'apropos_video_encart',
                'type' => 'url',
                'instructions' => 'URL de la vidéo YouTube',
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_accueil_type',
                            'operator' => '==',
                            'value' => 'apropos',
                        ),
                    ),
                ),
            ),

            // === CHAMPS DONS & ADOPTIONS ===
            array(
                'key' => 'field_dons_titre_section',
                'label' => 'Titre Section',
                'name' => 'dons_titre_section',
                'type' => 'text',
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_accueil_type',
                            'operator' => '==',
                            'value' => 'dons_adoptions',
                        ),
                    ),
                ),
            ),
            array(
                'key' => 'field_dons_titre_adoption',
                'label' => 'Titre Adoption',
                'name' => 'dons_titre_adoption',
                'type' => 'text',
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_accueil_type',
                            'operator' => '==',
                            'value' => 'dons_adoptions',
                        ),
                    ),
                ),
            ),
            array(
                'key' => 'field_dons_texte_adoption',
                'label' => 'Texte Adoption',
                'name' => 'dons_texte_adoption',
                'type' => 'textarea',
                'rows' => 5,
                'instructions' => 'Chaque élément doit être sur une nouvelle ligne (touche Entrée entre chaque point).',
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_accueil_type',
                            'operator' => '==',
                            'value' => 'dons_adoptions',
                        ),
                    ),
                ),
            ),
            array(
                'key' => 'field_dons_titre_don',
                'label' => 'Titre Don',
                'name' => 'dons_titre_don',
                'type' => 'text',
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_accueil_type',
                            'operator' => '==',
                            'value' => 'dons_adoptions',
                        ),
                    ),
                ),
            ),
            array(
                'key' => 'field_dons_texte_don',
                'label' => 'Texte Don',
                'name' => 'dons_texte_don',
                'type' => 'textarea',
                'rows' => 5,
                'instructions' => 'Chaque élément doit être sur une nouvelle ligne (touche Entrée entre chaque point).',
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_accueil_type',
                            'operator' => '==',
                            'value' => 'dons_adoptions',
                        ),
                    ),
                ),
            ),
            array(
                'key' => 'field_dons_titre_benevole',
                'label' => 'Titre Bénévole',
                'name' => 'dons_titre_benevole',
                'type' => 'text',
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_accueil_type',
                            'operator' => '==',
                            'value' => 'dons_adoptions',
                        ),
                    ),
                ),
            ),
            array(
                'key' => 'field_dons_texte_benevole',
                'label' => 'Texte Bénévole',
                'name' => 'dons_texte_benevole',
                'type' => 'textarea',
                'rows' => 5,
                'instructions' => 'Chaque élément doit être sur une nouvelle ligne (touche Entrée entre chaque point).',
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_accueil_type',
                            'operator' => '==',
                            'value' => 'dons_adoptions',
                        ),
                    ),
                ),
            ),

            // === CHAMPS TEMOIGNAGES ===
            array(
                'key' => 'field_temoignages_titre',
                'label' => 'Titre Section',
                'name' => 'temoignages_titre',
                'type' => 'text',
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_accueil_type',
                            'operator' => '==',
                            'value' => 'temoignages',
                        ),
                    ),
                ),
            ),
            // Témoignage 1
            array(
                'key' => 'field_temoignages_nom_1',
                'label' => 'Nom Personne 1',
                'name' => 'temoignages_nom_1',
                'type' => 'text',
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_accueil_type',
                            'operator' => '==',
                            'value' => 'temoignages',
                        ),
                    ),
                ),
            ),
            array(
                'key' => 'field_temoignages_profession_1',
                'label' => 'Profession Personne 1',
                'name' => 'temoignages_profession_1',
                'type' => 'text',
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_accueil_type',
                            'operator' => '==',
                            'value' => 'temoignages',
                        ),
                    ),
                ),
            ),
            array(
                'key' => 'field_temoignages_texte_1',
                'label' => 'Texte témoignage 1',
                'name' => 'temoignages_texte_1',
                'type' => 'textarea',
                'rows' => 2,
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_accueil_type',
                            'operator' => '==',
                            'value' => 'temoignages',
                        ),
                    ),
                ),
            ),
            array(
                'key' => 'field_temoignages_photo_1',
                'label' => 'Photo Témoignage 1',
                'name' => 'temoignages_photo_1',
                'type' => 'image',
                'return_format' => 'url',
                'preview_size' => 'thumbnail',
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_accueil_type',
                            'operator' => '==',
                            'value' => 'temoignages',
                        ),
                    ),
                ),
            ),
            // Témoignage 2
            array(
                'key' => 'field_temoignages_nom_2',
                'label' => 'Nom Personne 2',
                'name' => 'temoignages_nom_2',
                'type' => 'text',
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_accueil_type',
                            'operator' => '==',
                            'value' => 'temoignages',
                        ),
                    ),
                ),
            ),
            array(
                'key' => 'field_temoignages_profession_2',
                'label' => 'Profession Personne 2',
                'name' => 'temoignages_profession_2',
                'type' => 'text',
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_accueil_type',
                            'operator' => '==',
                            'value' => 'temoignages',
                        ),
                    ),
                ),
            ),
            array(
                'key' => 'field_temoignages_texte_2',
                'label' => 'Texte témoignage 2',
                'name' => 'temoignages_texte_2',
                'type' => 'textarea',
                'rows' => 2,
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_accueil_type',
                            'operator' => '==',
                            'value' => 'temoignages',
                        ),
                    ),
                ),
            ),
            array(
                'key' => 'field_temoignages_photo_2',
                'label' => 'Photo Témoignage 2',
                'name' => 'temoignages_photo_2',
                'type' => 'image',
                'return_format' => 'url',
                'preview_size' => 'thumbnail',
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_accueil_type',
                            'operator' => '==',
                            'value' => 'temoignages',
                        ),
                    ),
                ),
            ),
            // Témoignage 3
            array(
                'key' => 'field_temoignages_nom_3',
                'label' => 'Nom Personne 3',
                'name' => 'temoignages_nom_3',
                'type' => 'text',
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_accueil_type',
                            'operator' => '==',
                            'value' => 'temoignages',
                        ),
                    ),
                ),
            ),
            array(
                'key' => 'field_temoignages_profession_3',
                'label' => 'Profession Personne 3',
                'name' => 'temoignages_profession_3',
                'type' => 'text',
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_accueil_type',
                            'operator' => '==',
                            'value' => 'temoignages',
                        ),
                    ),
                ),
            ),
            array(
                'key' => 'field_temoignages_texte_3',
                'label' => 'Texte témoignage 3',
                'name' => 'temoignages_texte_3',
                'type' => 'textarea',
                'rows' => 2,
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_accueil_type',
                            'operator' => '==',
                            'value' => 'temoignages',
                        ),
                    ),
                ),
            ),
            array(
                'key' => 'field_temoignages_photo_3',
                'label' => 'Photo Témoignage 3',
                'name' => 'temoignages_photo_3',
                'type' => 'image',
                'return_format' => 'url',
                'preview_size' => 'thumbnail',
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_accueil_type',
                            'operator' => '==',
                            'value' => 'temoignages',
                        ),
                    ),
                ),
            ),
            // Témoignage 4
            array(
                'key' => 'field_temoignages_nom_4',
                'label' => 'Nom Personne 4',
                'name' => 'temoignages_nom_4',
                'type' => 'text',
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_accueil_type',
                            'operator' => '==',
                            'value' => 'temoignages',
                        ),
                    ),
                ),
            ),
            array(
                'key' => 'field_temoignages_profession_4',
                'label' => 'Profession Personne 4',
                'name' => 'temoignages_profession_4',
                'type' => 'text',
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_accueil_type',
                            'operator' => '==',
                            'value' => 'temoignages',
                        ),
                    ),
                ),
            ),
            array(
                'key' => 'field_temoignages_texte_4',
                'label' => 'Texte témoignage 4',
                'name' => 'temoignages_texte_4',
                'type' => 'textarea',
                'rows' => 2,
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_accueil_type',
                            'operator' => '==',
                            'value' => 'temoignages',
                        ),
                    ),
                ),
            ),
            array(
                'key' => 'field_temoignages_photo_4',
                'label' => 'Photo Témoignage 4',
                'name' => 'temoignages_photo_4',
                'type' => 'image',
                'return_format' => 'url',
                'preview_size' => 'thumbnail',
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_accueil_type',
                            'operator' => '==',
                            'value' => 'temoignages',
                        ),
                    ),
                ),
            ),
            // Témoignage 5
            array(
                'key' => 'field_temoignages_nom_5',
                'label' => 'Nom Personne 5',
                'name' => 'temoignages_nom_5',
                'type' => 'text',
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_accueil_type',
                            'operator' => '==',
                            'value' => 'temoignages',
                        ),
                    ),
                ),
            ),
            array(
                'key' => 'field_temoignages_profession_5',
                'label' => 'Profession Personne 5',
                'name' => 'temoignages_profession_5',
                'type' => 'text',
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_accueil_type',
                            'operator' => '==',
                            'value' => 'temoignages',
                        ),
                    ),
                ),
            ),
            array(
                'key' => 'field_temoignages_texte_5',
                'label' => 'Texte témoignage 5',
                'name' => 'temoignages_texte_5',
                'type' => 'textarea',
                'rows' => 2,
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_accueil_type',
                            'operator' => '==',
                            'value' => 'temoignages',
                        ),
                    ),
                ),
            ),
            array(
                'key' => 'field_temoignages_photo_5',
                'label' => 'Photo Témoignage 5',
                'name' => 'temoignages_photo_5',
                'type' => 'image',
                'return_format' => 'url',
                'preview_size' => 'thumbnail',
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_accueil_type',
                            'operator' => '==',
                            'value' => 'temoignages',
                        ),
                    ),
                ),
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'page_accueil',
                ),
            ),
        ),
        'menu_order' => 0,
    ));

    // ============================================================
    // GROUPE: Contenu spécifique Page A Propos
    // ============================================================
    acf_add_local_field_group(array(
        'key' => 'group_page_about',
        'title' => 'Contenu spécifique',
        'fields' => array(
            // Type de contenu
            array(
                'key' => 'field_about_type',
                'label' => 'Type de contenu',
                'name' => 'about_type',
                'type' => 'select',
                'instructions' => 'Sélectionnez le type de contenu',
                'required' => 1,
                'choices' => array(
                    'qui_sommes_nous' => 'Qui sommes-nous ?',
                    'statistiques' => 'Statistiques',
                    'nos_missions' => 'Nos Missions',
                    'nos_valeurs' => 'Nos Valeurs',
                ),
                'default_value' => 'qui_sommes_nous',
            ),

            // === CHAMPS QUI SOMMES-NOUS ===
            array(
                'key' => 'field_about_qsn_titre',
                'label' => 'Titre Section',
                'name' => 'about_qsn_titre',
                'type' => 'text',
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_about_type',
                            'operator' => '==',
                            'value' => 'qui_sommes_nous',
                        ),
                    ),
                ),
            ),
            array(
                'key' => 'field_about_qsn_paragraphe_1',
                'label' => 'Paragraphe 1',
                'name' => 'about_qsn_paragraphe_1',
                'type' => 'textarea',
                'rows' => 3,
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_about_type',
                            'operator' => '==',
                            'value' => 'qui_sommes_nous',
                        ),
                    ),
                ),
            ),
            array(
                'key' => 'field_about_qsn_paragraphe_2',
                'label' => 'Paragraphe 2',
                'name' => 'about_qsn_paragraphe_2',
                'type' => 'textarea',
                'rows' => 3,
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_about_type',
                            'operator' => '==',
                            'value' => 'qui_sommes_nous',
                        ),
                    ),
                ),
            ),
            array(
                'key' => 'field_about_qsn_paragraphe_3',
                'label' => 'Paragraphe 3',
                'name' => 'about_qsn_paragraphe_3',
                'type' => 'textarea',
                'rows' => 3,
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_about_type',
                            'operator' => '==',
                            'value' => 'qui_sommes_nous',
                        ),
                    ),
                ),
            ),

            // === CHAMPS STATISTIQUES ===
            array(
                'key' => 'field_about_stats_titre_1',
                'label' => 'Titre 1',
                'name' => 'about_stats_titre_1',
                'type' => 'text',
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_about_type',
                            'operator' => '==',
                            'value' => 'statistiques',
                        ),
                    ),
                ),
            ),
            array(
                'key' => 'field_about_stats_nombre_1',
                'label' => 'Statistique 1',
                'name' => 'about_stats_nombre_1',
                'type' => 'number',
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_about_type',
                            'operator' => '==',
                            'value' => 'statistiques',
                        ),
                    ),
                ),
            ),
            array(
                'key' => 'field_about_stats_titre_2',
                'label' => 'Titre 2',
                'name' => 'about_stats_titre_2',
                'type' => 'text',
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_about_type',
                            'operator' => '==',
                            'value' => 'statistiques',
                        ),
                    ),
                ),
            ),
            array(
                'key' => 'field_about_stats_nombre_2',
                'label' => 'Statistique 2',
                'name' => 'about_stats_nombre_2',
                'type' => 'number',
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_about_type',
                            'operator' => '==',
                            'value' => 'statistiques',
                        ),
                    ),
                ),
            ),
            array(
                'key' => 'field_about_stats_titre_3',
                'label' => 'Titre 3',
                'name' => 'about_stats_titre_3',
                'type' => 'text',
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_about_type',
                            'operator' => '==',
                            'value' => 'statistiques',
                        ),
                    ),
                ),
            ),
            array(
                'key' => 'field_about_stats_nombre_3',
                'label' => 'Statistique 3',
                'name' => 'about_stats_nombre_3',
                'type' => 'number',
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_about_type',
                            'operator' => '==',
                            'value' => 'statistiques',
                        ),
                    ),
                ),
            ),
            array(
                'key' => 'field_about_stats_titre_4',
                'label' => 'Titre 4',
                'name' => 'about_stats_titre_4',
                'type' => 'text',
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_about_type',
                            'operator' => '==',
                            'value' => 'statistiques',
                        ),
                    ),
                ),
            ),
            array(
                'key' => 'field_about_stats_nombre_4',
                'label' => 'Statistique 4',
                'name' => 'about_stats_nombre_4',
                'type' => 'number',
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_about_type',
                            'operator' => '==',
                            'value' => 'statistiques',
                        ),
                    ),
                ),
            ),

            // === CHAMPS NOS MISSIONS ===
            array(
                'key' => 'field_about_missions_titre_section',
                'label' => 'Titre Section',
                'name' => 'about_missions_titre_section',
                'type' => 'text',
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_about_type',
                            'operator' => '==',
                            'value' => 'nos_missions',
                        ),
                    ),
                ),
            ),
            array(
                'key' => 'field_about_missions_titre_1',
                'label' => 'Titre 1',
                'name' => 'about_missions_titre_1',
                'type' => 'text',
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_about_type',
                            'operator' => '==',
                            'value' => 'nos_missions',
                        ),
                    ),
                ),
            ),
            array(
                'key' => 'field_about_missions_texte_1',
                'label' => 'Texte 1',
                'name' => 'about_missions_texte_1',
                'type' => 'textarea',
                'rows' => 5,
                'instructions' => 'Chaque élément doit être sur une nouvelle ligne (touche Entrée entre chaque point).',
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_about_type',
                            'operator' => '==',
                            'value' => 'nos_missions',
                        ),
                    ),
                ),
            ),
            array(
                'key' => 'field_about_missions_titre_2',
                'label' => 'Titre 2',
                'name' => 'about_missions_titre_2',
                'type' => 'text',
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_about_type',
                            'operator' => '==',
                            'value' => 'nos_missions',
                        ),
                    ),
                ),
            ),
            array(
                'key' => 'field_about_missions_texte_2',
                'label' => 'Texte 2',
                'name' => 'about_missions_texte_2',
                'type' => 'textarea',
                'rows' => 5,
                'instructions' => 'Chaque élément doit être sur une nouvelle ligne (touche Entrée entre chaque point).',
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_about_type',
                            'operator' => '==',
                            'value' => 'nos_missions',
                        ),
                    ),
                ),
            ),
            array(
                'key' => 'field_about_missions_titre_3',
                'label' => 'Titre 3',
                'name' => 'about_missions_titre_3',
                'type' => 'text',
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_about_type',
                            'operator' => '==',
                            'value' => 'nos_missions',
                        ),
                    ),
                ),
            ),
            array(
                'key' => 'field_about_missions_texte_3',
                'label' => 'Texte 3',
                'name' => 'about_missions_texte_3',
                'type' => 'textarea',
                'rows' => 5,
                'instructions' => 'Chaque élément doit être sur une nouvelle ligne (touche Entrée entre chaque point).',
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_about_type',
                            'operator' => '==',
                            'value' => 'nos_missions',
                        ),
                    ),
                ),
            ),

            // === CHAMPS NOS VALEURS ===
            array(
                'key' => 'field_about_valeurs_titre_section',
                'label' => 'Titre Section',
                'name' => 'about_valeurs_titre_section',
                'type' => 'text',
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_about_type',
                            'operator' => '==',
                            'value' => 'nos_valeurs',
                        ),
                    ),
                ),
            ),
            array(
                'key' => 'field_about_valeurs_valeur_1',
                'label' => 'Valeur 1',
                'name' => 'about_valeurs_valeur_1',
                'type' => 'textarea',
                'rows' => 2,
                'instructions' => 'Le texte avant les deux-points sera automatiquement mis en gras. Ex: Bienveillance : Chaque chat mérite...',
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_about_type',
                            'operator' => '==',
                            'value' => 'nos_valeurs',
                        ),
                    ),
                ),
            ),
            array(
                'key' => 'field_about_valeurs_valeur_2',
                'label' => 'Valeur 2',
                'name' => 'about_valeurs_valeur_2',
                'type' => 'textarea',
                'rows' => 2,
                'instructions' => 'Le texte avant les deux-points sera automatiquement mis en gras.',
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_about_type',
                            'operator' => '==',
                            'value' => 'nos_valeurs',
                        ),
                    ),
                ),
            ),
            array(
                'key' => 'field_about_valeurs_valeur_3',
                'label' => 'Valeur 3',
                'name' => 'about_valeurs_valeur_3',
                'type' => 'textarea',
                'rows' => 2,
                'instructions' => 'Le texte avant les deux-points sera automatiquement mis en gras.',
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_about_type',
                            'operator' => '==',
                            'value' => 'nos_valeurs',
                        ),
                    ),
                ),
            ),
            array(
                'key' => 'field_about_valeurs_valeur_4',
                'label' => 'Valeur 4',
                'name' => 'about_valeurs_valeur_4',
                'type' => 'textarea',
                'rows' => 2,
                'instructions' => 'Le texte avant les deux-points sera automatiquement mis en gras.',
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_about_type',
                            'operator' => '==',
                            'value' => 'nos_valeurs',
                        ),
                    ),
                ),
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'page_about',
                ),
            ),
        ),
        'menu_order' => 0,
    ));

    // ============================================================
    // GROUPE: Contenu spécifique Page Adoption
    // ============================================================
    acf_add_local_field_group(array(
        'key' => 'group_page_adoption',
        'title' => 'Contenu spécifique',
        'fields' => array(
            // Type de contenu
            array(
                'key' => 'field_adoption_type',
                'label' => 'Type de contenu',
                'name' => 'adoption_type',
                'type' => 'select',
                'instructions' => 'Sélectionnez le type de contenu',
                'required' => 1,
                'choices' => array(
                    'intro' => 'Introduction',
                    'criteres' => 'Critères d\'adoption',
                    'processus' => 'Processus d\'adoption',
                    'etapes' => 'Étapes d\'adoption',
                    'quiz' => 'Quiz',
                    'formulaire' => 'Formulaire',
                    'faq' => 'FAQ',
                    'cta' => 'Call-to-Action Final',
                ),
                'default_value' => 'intro',
            ),

            // === CHAMPS INTRO ===
            array(
                'key' => 'field_adoption_intro_titre',
                'label' => 'Titre Section',
                'name' => 'adoption_intro_titre',
                'type' => 'text',
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_adoption_type',
                            'operator' => '==',
                            'value' => 'intro',
                        ),
                    ),
                ),
            ),
            array(
                'key' => 'field_adoption_intro_paragraphe_1',
                'label' => 'Paragraphe 1',
                'name' => 'adoption_intro_paragraphe_1',
                'type' => 'textarea',
                'rows' => 3,
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_adoption_type',
                            'operator' => '==',
                            'value' => 'intro',
                        ),
                    ),
                ),
            ),
            array(
                'key' => 'field_adoption_intro_paragraphe_2',
                'label' => 'Paragraphe 2',
                'name' => 'adoption_intro_paragraphe_2',
                'type' => 'textarea',
                'rows' => 3,
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_adoption_type',
                            'operator' => '==',
                            'value' => 'intro',
                        ),
                    ),
                ),
            ),

            // === CHAMPS CRITÈRES ===
            array(
                'key' => 'field_adoption_criteres_titre',
                'label' => 'Titre Section',
                'name' => 'adoption_criteres_titre',
                'type' => 'text',
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_adoption_type',
                            'operator' => '==',
                            'value' => 'criteres',
                        ),
                    ),
                ),
            ),
            array(
                'key' => 'field_adoption_criteres_texte',
                'label' => 'Texte introduction',
                'name' => 'adoption_criteres_texte',
                'type' => 'textarea',
                'rows' => 2,
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_adoption_type',
                            'operator' => '==',
                            'value' => 'criteres',
                        ),
                    ),
                ),
            ),
            array(
                'key' => 'field_adoption_criteres_liste',
                'label' => 'Liste des critères',
                'name' => 'adoption_criteres_liste',
                'type' => 'textarea',
                'rows' => 5,
                'instructions' => 'Chaque élément doit être sur une nouvelle ligne (touche Entrée entre chaque point).',
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_adoption_type',
                            'operator' => '==',
                            'value' => 'criteres',
                        ),
                    ),
                ),
            ),

            // === CHAMPS PROCESSUS ===
            array(
                'key' => 'field_adoption_processus_titre',
                'label' => 'Titre Section',
                'name' => 'adoption_processus_titre',
                'type' => 'text',
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_adoption_type',
                            'operator' => '==',
                            'value' => 'processus',
                        ),
                    ),
                ),
            ),
            array(
                'key' => 'field_adoption_processus_texte',
                'label' => 'Texte',
                'name' => 'adoption_processus_texte',
                'type' => 'textarea',
                'rows' => 3,
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_adoption_type',
                            'operator' => '==',
                            'value' => 'processus',
                        ),
                    ),
                ),
            ),

            // === CHAMPS ÉTAPES ===
            array(
                'key' => 'field_adoption_etapes_titre',
                'label' => 'Titre Section',
                'name' => 'adoption_etapes_titre',
                'type' => 'text',
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_adoption_type',
                            'operator' => '==',
                            'value' => 'etapes',
                        ),
                    ),
                ),
            ),
            array(
                'key' => 'field_adoption_etapes_liste',
                'label' => 'Liste des étapes',
                'name' => 'adoption_etapes_liste',
                'type' => 'textarea',
                'rows' => 5,
                'instructions' => 'Chaque élément doit être sur une nouvelle ligne (touche Entrée entre chaque point).',
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_adoption_type',
                            'operator' => '==',
                            'value' => 'etapes',
                        ),
                    ),
                ),
            ),

            // === CHAMPS QUIZ ===
            array(
                'key' => 'field_adoption_quiz_titre',
                'label' => 'Titre Section',
                'name' => 'adoption_quiz_titre',
                'type' => 'text',
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_adoption_type',
                            'operator' => '==',
                            'value' => 'quiz',
                        ),
                    ),
                ),
            ),
            array(
                'key' => 'field_adoption_quiz_texte',
                'label' => 'Texte',
                'name' => 'adoption_quiz_texte',
                'type' => 'textarea',
                'rows' => 3,
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_adoption_type',
                            'operator' => '==',
                            'value' => 'quiz',
                        ),
                    ),
                ),
            ),

            // === CHAMPS FORMULAIRE ===
            array(
                'key' => 'field_adoption_formulaire_titre',
                'label' => 'Titre Section',
                'name' => 'adoption_formulaire_titre',
                'type' => 'text',
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_adoption_type',
                            'operator' => '==',
                            'value' => 'formulaire',
                        ),
                    ),
                ),
            ),
            array(
                'key' => 'field_adoption_formulaire_texte',
                'label' => 'Texte',
                'name' => 'adoption_formulaire_texte',
                'type' => 'textarea',
                'rows' => 3,
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_adoption_type',
                            'operator' => '==',
                            'value' => 'formulaire',
                        ),
                    ),
                ),
            ),

            // === CHAMPS FAQ ===
            array(
                'key' => 'field_adoption_faq_titre',
                'label' => 'Titre Section',
                'name' => 'adoption_faq_titre',
                'type' => 'text',
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_adoption_type',
                            'operator' => '==',
                            'value' => 'faq',
                        ),
                    ),
                ),
            ),
            array(
                'key' => 'field_adoption_faq_question_1',
                'label' => 'Question 1',
                'name' => 'adoption_faq_question_1',
                'type' => 'text',
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_adoption_type',
                            'operator' => '==',
                            'value' => 'faq',
                        ),
                    ),
                ),
            ),
            array(
                'key' => 'field_adoption_faq_reponse_1',
                'label' => 'Réponse 1',
                'name' => 'adoption_faq_reponse_1',
                'type' => 'textarea',
                'rows' => 3,
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_adoption_type',
                            'operator' => '==',
                            'value' => 'faq',
                        ),
                    ),
                ),
            ),
            array(
                'key' => 'field_adoption_faq_question_2',
                'label' => 'Question 2',
                'name' => 'adoption_faq_question_2',
                'type' => 'text',
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_adoption_type',
                            'operator' => '==',
                            'value' => 'faq',
                        ),
                    ),
                ),
            ),
            array(
                'key' => 'field_adoption_faq_reponse_2',
                'label' => 'Réponse 2',
                'name' => 'adoption_faq_reponse_2',
                'type' => 'textarea',
                'rows' => 3,
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_adoption_type',
                            'operator' => '==',
                            'value' => 'faq',
                        ),
                    ),
                ),
            ),
            array(
                'key' => 'field_adoption_faq_question_3',
                'label' => 'Question 3',
                'name' => 'adoption_faq_question_3',
                'type' => 'text',
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_adoption_type',
                            'operator' => '==',
                            'value' => 'faq',
                        ),
                    ),
                ),
            ),
            array(
                'key' => 'field_adoption_faq_reponse_3',
                'label' => 'Réponse 3',
                'name' => 'adoption_faq_reponse_3',
                'type' => 'textarea',
                'rows' => 3,
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_adoption_type',
                            'operator' => '==',
                            'value' => 'faq',
                        ),
                    ),
                ),
            ),
            array(
                'key' => 'field_adoption_faq_question_4',
                'label' => 'Question 4',
                'name' => 'adoption_faq_question_4',
                'type' => 'text',
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_adoption_type',
                            'operator' => '==',
                            'value' => 'faq',
                        ),
                    ),
                ),
            ),
            array(
                'key' => 'field_adoption_faq_reponse_4',
                'label' => 'Réponse 4',
                'name' => 'adoption_faq_reponse_4',
                'type' => 'textarea',
                'rows' => 3,
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_adoption_type',
                            'operator' => '==',
                            'value' => 'faq',
                        ),
                    ),
                ),
            ),

            // === CHAMPS CTA ===
            array(
                'key' => 'field_adoption_cta_titre',
                'label' => 'Titre',
                'name' => 'adoption_cta_titre',
                'type' => 'text',
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_adoption_type',
                            'operator' => '==',
                            'value' => 'cta',
                        ),
                    ),
                ),
            ),
            array(
                'key' => 'field_adoption_cta_sous_titre',
                'label' => 'Sous-titre',
                'name' => 'adoption_cta_sous_titre',
                'type' => 'text',
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_adoption_type',
                            'operator' => '==',
                            'value' => 'cta',
                        ),
                    ),
                ),
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'page_adoption',
                ),
            ),
        ),
        'menu_order' => 0,
    ));

    // ============================================================
    // GROUPE: Contenu spécifique Page Abandon
    // ============================================================
    acf_add_local_field_group(array(
        'key' => 'group_page_abandon',
        'title' => 'Contenu spécifique',
        'fields' => array(
            // Type de contenu
            array(
                'key' => 'field_abandon_type',
                'label' => 'Type de contenu',
                'name' => 'abandon_type',
                'type' => 'select',
                'instructions' => 'Sélectionnez le type de contenu',
                'required' => 1,
                'choices' => array(
                    'intro' => 'Introduction',
                    'criteres' => 'Alternatives à l\'abandon',
                    'processus' => 'Processus d\'abandon',
                    'etapes' => 'Étapes de la prise en charge',
                    'quiz' => 'Quiz',
                    'formulaire' => 'Formulaire',
                    'faq' => 'FAQ',
                    'cta' => 'Call-to-Action Final',
                ),
                'default_value' => 'intro',
            ),

            // === CHAMPS INTRO ===
            array(
                'key' => 'field_abandon_intro_titre',
                'label' => 'Titre Section',
                'name' => 'abandon_intro_titre',
                'type' => 'text',
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_abandon_type',
                            'operator' => '==',
                            'value' => 'intro',
                        ),
                    ),
                ),
            ),
            array(
                'key' => 'field_abandon_intro_paragraphe_1',
                'label' => 'Paragraphe 1',
                'name' => 'abandon_intro_paragraphe_1',
                'type' => 'textarea',
                'rows' => 3,
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_abandon_type',
                            'operator' => '==',
                            'value' => 'intro',
                        ),
                    ),
                ),
            ),
            array(
                'key' => 'field_abandon_intro_paragraphe_2',
                'label' => 'Paragraphe 2',
                'name' => 'abandon_intro_paragraphe_2',
                'type' => 'textarea',
                'rows' => 3,
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_abandon_type',
                            'operator' => '==',
                            'value' => 'intro',
                        ),
                    ),
                ),
            ),

            // === CHAMPS CRITÈRES (Alternatives) ===
            array(
                'key' => 'field_abandon_criteres_titre',
                'label' => 'Titre Section',
                'name' => 'abandon_criteres_titre',
                'type' => 'text',
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_abandon_type',
                            'operator' => '==',
                            'value' => 'criteres',
                        ),
                    ),
                ),
            ),
            array(
                'key' => 'field_abandon_criteres_texte',
                'label' => 'Texte introduction',
                'name' => 'abandon_criteres_texte',
                'type' => 'textarea',
                'rows' => 2,
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_abandon_type',
                            'operator' => '==',
                            'value' => 'criteres',
                        ),
                    ),
                ),
            ),
            array(
                'key' => 'field_abandon_criteres_liste',
                'label' => 'Liste des alternatives',
                'name' => 'abandon_criteres_liste',
                'type' => 'textarea',
                'rows' => 5,
                'instructions' => 'Chaque élément doit être sur une nouvelle ligne (touche Entrée entre chaque point).',
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_abandon_type',
                            'operator' => '==',
                            'value' => 'criteres',
                        ),
                    ),
                ),
            ),

            // === CHAMPS PROCESSUS ===
            array(
                'key' => 'field_abandon_processus_titre',
                'label' => 'Titre Section',
                'name' => 'abandon_processus_titre',
                'type' => 'text',
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_abandon_type',
                            'operator' => '==',
                            'value' => 'processus',
                        ),
                    ),
                ),
            ),
            array(
                'key' => 'field_abandon_processus_texte',
                'label' => 'Texte',
                'name' => 'abandon_processus_texte',
                'type' => 'textarea',
                'rows' => 3,
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_abandon_type',
                            'operator' => '==',
                            'value' => 'processus',
                        ),
                    ),
                ),
            ),

            // === CHAMPS ÉTAPES ===
            array(
                'key' => 'field_abandon_etapes_titre',
                'label' => 'Titre Section',
                'name' => 'abandon_etapes_titre',
                'type' => 'text',
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_abandon_type',
                            'operator' => '==',
                            'value' => 'etapes',
                        ),
                    ),
                ),
            ),
            array(
                'key' => 'field_abandon_etapes_liste',
                'label' => 'Liste des étapes',
                'name' => 'abandon_etapes_liste',
                'type' => 'textarea',
                'rows' => 5,
                'instructions' => 'Chaque élément doit être sur une nouvelle ligne (touche Entrée entre chaque point).',
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_abandon_type',
                            'operator' => '==',
                            'value' => 'etapes',
                        ),
                    ),
                ),
            ),

            // === CHAMPS QUIZ ===
            array(
                'key' => 'field_abandon_quiz_titre',
                'label' => 'Titre Section',
                'name' => 'abandon_quiz_titre',
                'type' => 'text',
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_abandon_type',
                            'operator' => '==',
                            'value' => 'quiz',
                        ),
                    ),
                ),
            ),
            array(
                'key' => 'field_abandon_quiz_texte',
                'label' => 'Texte',
                'name' => 'abandon_quiz_texte',
                'type' => 'textarea',
                'rows' => 3,
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_abandon_type',
                            'operator' => '==',
                            'value' => 'quiz',
                        ),
                    ),
                ),
            ),

            // === CHAMPS FORMULAIRE ===
            array(
                'key' => 'field_abandon_formulaire_titre',
                'label' => 'Titre Section',
                'name' => 'abandon_formulaire_titre',
                'type' => 'text',
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_abandon_type',
                            'operator' => '==',
                            'value' => 'formulaire',
                        ),
                    ),
                ),
            ),
            array(
                'key' => 'field_abandon_formulaire_texte',
                'label' => 'Texte',
                'name' => 'abandon_formulaire_texte',
                'type' => 'textarea',
                'rows' => 3,
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_abandon_type',
                            'operator' => '==',
                            'value' => 'formulaire',
                        ),
                    ),
                ),
            ),

            // === CHAMPS FAQ ===
            array(
                'key' => 'field_abandon_faq_titre',
                'label' => 'Titre Section',
                'name' => 'abandon_faq_titre',
                'type' => 'text',
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_abandon_type',
                            'operator' => '==',
                            'value' => 'faq',
                        ),
                    ),
                ),
            ),
            array(
                'key' => 'field_abandon_faq_question_1',
                'label' => 'Question 1',
                'name' => 'abandon_faq_question_1',
                'type' => 'text',
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_abandon_type',
                            'operator' => '==',
                            'value' => 'faq',
                        ),
                    ),
                ),
            ),
            array(
                'key' => 'field_abandon_faq_reponse_1',
                'label' => 'Réponse 1',
                'name' => 'abandon_faq_reponse_1',
                'type' => 'textarea',
                'rows' => 3,
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_abandon_type',
                            'operator' => '==',
                            'value' => 'faq',
                        ),
                    ),
                ),
            ),
            array(
                'key' => 'field_abandon_faq_question_2',
                'label' => 'Question 2',
                'name' => 'abandon_faq_question_2',
                'type' => 'text',
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_abandon_type',
                            'operator' => '==',
                            'value' => 'faq',
                        ),
                    ),
                ),
            ),
            array(
                'key' => 'field_abandon_faq_reponse_2',
                'label' => 'Réponse 2',
                'name' => 'abandon_faq_reponse_2',
                'type' => 'textarea',
                'rows' => 3,
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_abandon_type',
                            'operator' => '==',
                            'value' => 'faq',
                        ),
                    ),
                ),
            ),
            array(
                'key' => 'field_abandon_faq_question_3',
                'label' => 'Question 3',
                'name' => 'abandon_faq_question_3',
                'type' => 'text',
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_abandon_type',
                            'operator' => '==',
                            'value' => 'faq',
                        ),
                    ),
                ),
            ),
            array(
                'key' => 'field_abandon_faq_reponse_3',
                'label' => 'Réponse 3',
                'name' => 'abandon_faq_reponse_3',
                'type' => 'textarea',
                'rows' => 3,
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_abandon_type',
                            'operator' => '==',
                            'value' => 'faq',
                        ),
                    ),
                ),
            ),
            array(
                'key' => 'field_abandon_faq_question_4',
                'label' => 'Question 4',
                'name' => 'abandon_faq_question_4',
                'type' => 'text',
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_abandon_type',
                            'operator' => '==',
                            'value' => 'faq',
                        ),
                    ),
                ),
            ),
            array(
                'key' => 'field_abandon_faq_reponse_4',
                'label' => 'Réponse 4',
                'name' => 'abandon_faq_reponse_4',
                'type' => 'textarea',
                'rows' => 3,
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_abandon_type',
                            'operator' => '==',
                            'value' => 'faq',
                        ),
                    ),
                ),
            ),

            // === CHAMPS CTA ===
            array(
                'key' => 'field_abandon_cta_titre',
                'label' => 'Titre',
                'name' => 'abandon_cta_titre',
                'type' => 'text',
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_abandon_type',
                            'operator' => '==',
                            'value' => 'cta',
                        ),
                    ),
                ),
            ),
            array(
                'key' => 'field_abandon_cta_sous_titre',
                'label' => 'Sous-titre',
                'name' => 'abandon_cta_sous_titre',
                'type' => 'text',
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_abandon_type',
                            'operator' => '==',
                            'value' => 'cta',
                        ),
                    ),
                ),
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'page_abandon',
                ),
            ),
        ),
        'menu_order' => 0,
    ));

    // ============================================================
    // GROUPE: Contenu spécifique Page Don
    // ============================================================
    acf_add_local_field_group(array(
        'key' => 'group_page_don',
        'title' => 'Contenu spécifique',
        'fields' => array(
            // Type de contenu
            array(
                'key' => 'field_don_type',
                'label' => 'Type de contenu',
                'name' => 'don_type',
                'type' => 'select',
                'instructions' => 'Sélectionnez le type de contenu',
                'required' => 1,
                'choices' => array(
                    'intro' => 'Introduction',
                    'utilisation' => 'À quoi servent vos dons',
                    'comment' => 'Comment faire un don',
                    'avantages' => 'Avantages fiscaux',
                    'quiz' => 'Quiz',
                    'faq' => 'FAQ',
                    'cta' => 'Call-to-Action Final',
                ),
                'default_value' => 'intro',
            ),

            // === CHAMPS INTRO ===
            array(
                'key' => 'field_don_intro_titre',
                'label' => 'Titre Section',
                'name' => 'don_intro_titre',
                'type' => 'text',
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_don_type',
                            'operator' => '==',
                            'value' => 'intro',
                        ),
                    ),
                ),
            ),
            array(
                'key' => 'field_don_intro_paragraphe_1',
                'label' => 'Paragraphe 1',
                'name' => 'don_intro_paragraphe_1',
                'type' => 'textarea',
                'rows' => 3,
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_don_type',
                            'operator' => '==',
                            'value' => 'intro',
                        ),
                    ),
                ),
            ),
            array(
                'key' => 'field_don_intro_paragraphe_2',
                'label' => 'Paragraphe 2',
                'name' => 'don_intro_paragraphe_2',
                'type' => 'textarea',
                'rows' => 3,
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_don_type',
                            'operator' => '==',
                            'value' => 'intro',
                        ),
                    ),
                ),
            ),

            // === CHAMPS UTILISATION ===
            array(
                'key' => 'field_don_utilisation_titre',
                'label' => 'Titre Section',
                'name' => 'don_utilisation_titre',
                'type' => 'text',
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_don_type',
                            'operator' => '==',
                            'value' => 'utilisation',
                        ),
                    ),
                ),
            ),
            array(
                'key' => 'field_don_utilisation_texte',
                'label' => 'Texte introduction',
                'name' => 'don_utilisation_texte',
                'type' => 'textarea',
                'rows' => 2,
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_don_type',
                            'operator' => '==',
                            'value' => 'utilisation',
                        ),
                    ),
                ),
            ),
            array(
                'key' => 'field_don_utilisation_liste',
                'label' => 'Liste',
                'name' => 'don_utilisation_liste',
                'type' => 'textarea',
                'rows' => 5,
                'instructions' => 'Chaque élément doit être sur une nouvelle ligne (touche Entrée entre chaque point).',
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_don_type',
                            'operator' => '==',
                            'value' => 'utilisation',
                        ),
                    ),
                ),
            ),

            // === CHAMPS COMMENT ===
            array(
                'key' => 'field_don_comment_titre',
                'label' => 'Titre Section',
                'name' => 'don_comment_titre',
                'type' => 'text',
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_don_type',
                            'operator' => '==',
                            'value' => 'comment',
                        ),
                    ),
                ),
            ),
            array(
                'key' => 'field_don_comment_texte',
                'label' => 'Texte',
                'name' => 'don_comment_texte',
                'type' => 'textarea',
                'rows' => 3,
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_don_type',
                            'operator' => '==',
                            'value' => 'comment',
                        ),
                    ),
                ),
            ),

            // === CHAMPS AVANTAGES ===
            array(
                'key' => 'field_don_avantages_titre',
                'label' => 'Titre Section',
                'name' => 'don_avantages_titre',
                'type' => 'text',
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_don_type',
                            'operator' => '==',
                            'value' => 'avantages',
                        ),
                    ),
                ),
            ),
            array(
                'key' => 'field_don_avantages_liste',
                'label' => 'Liste des avantages',
                'name' => 'don_avantages_liste',
                'type' => 'textarea',
                'rows' => 5,
                'instructions' => 'Chaque élément doit être sur une nouvelle ligne (touche Entrée entre chaque point).',
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_don_type',
                            'operator' => '==',
                            'value' => 'avantages',
                        ),
                    ),
                ),
            ),

            // === CHAMPS QUIZ ===
            array(
                'key' => 'field_don_quiz_titre',
                'label' => 'Titre Section',
                'name' => 'don_quiz_titre',
                'type' => 'text',
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_don_type',
                            'operator' => '==',
                            'value' => 'quiz',
                        ),
                    ),
                ),
            ),
            array(
                'key' => 'field_don_quiz_texte',
                'label' => 'Texte',
                'name' => 'don_quiz_texte',
                'type' => 'textarea',
                'rows' => 3,
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_don_type',
                            'operator' => '==',
                            'value' => 'quiz',
                        ),
                    ),
                ),
            ),

            // === CHAMPS FAQ ===
            array(
                'key' => 'field_don_faq_titre',
                'label' => 'Titre Section',
                'name' => 'don_faq_titre',
                'type' => 'text',
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_don_type',
                            'operator' => '==',
                            'value' => 'faq',
                        ),
                    ),
                ),
            ),
            array(
                'key' => 'field_don_faq_question_1',
                'label' => 'Question 1',
                'name' => 'don_faq_question_1',
                'type' => 'text',
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_don_type',
                            'operator' => '==',
                            'value' => 'faq',
                        ),
                    ),
                ),
            ),
            array(
                'key' => 'field_don_faq_reponse_1',
                'label' => 'Réponse 1',
                'name' => 'don_faq_reponse_1',
                'type' => 'textarea',
                'rows' => 3,
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_don_type',
                            'operator' => '==',
                            'value' => 'faq',
                        ),
                    ),
                ),
            ),
            array(
                'key' => 'field_don_faq_question_2',
                'label' => 'Question 2',
                'name' => 'don_faq_question_2',
                'type' => 'text',
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_don_type',
                            'operator' => '==',
                            'value' => 'faq',
                        ),
                    ),
                ),
            ),
            array(
                'key' => 'field_don_faq_reponse_2',
                'label' => 'Réponse 2',
                'name' => 'don_faq_reponse_2',
                'type' => 'textarea',
                'rows' => 3,
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_don_type',
                            'operator' => '==',
                            'value' => 'faq',
                        ),
                    ),
                ),
            ),
            array(
                'key' => 'field_don_faq_question_3',
                'label' => 'Question 3',
                'name' => 'don_faq_question_3',
                'type' => 'text',
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_don_type',
                            'operator' => '==',
                            'value' => 'faq',
                        ),
                    ),
                ),
            ),
            array(
                'key' => 'field_don_faq_reponse_3',
                'label' => 'Réponse 3',
                'name' => 'don_faq_reponse_3',
                'type' => 'textarea',
                'rows' => 3,
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_don_type',
                            'operator' => '==',
                            'value' => 'faq',
                        ),
                    ),
                ),
            ),
            array(
                'key' => 'field_don_faq_question_4',
                'label' => 'Question 4',
                'name' => 'don_faq_question_4',
                'type' => 'text',
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_don_type',
                            'operator' => '==',
                            'value' => 'faq',
                        ),
                    ),
                ),
            ),
            array(
                'key' => 'field_don_faq_reponse_4',
                'label' => 'Réponse 4',
                'name' => 'don_faq_reponse_4',
                'type' => 'textarea',
                'rows' => 3,
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_don_type',
                            'operator' => '==',
                            'value' => 'faq',
                        ),
                    ),
                ),
            ),

            // === CHAMPS CTA ===
            array(
                'key' => 'field_don_cta_titre',
                'label' => 'Titre',
                'name' => 'don_cta_titre',
                'type' => 'text',
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_don_type',
                            'operator' => '==',
                            'value' => 'cta',
                        ),
                    ),
                ),
            ),
            array(
                'key' => 'field_don_cta_sous_titre',
                'label' => 'Sous-titre',
                'name' => 'don_cta_sous_titre',
                'type' => 'text',
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_don_type',
                            'operator' => '==',
                            'value' => 'cta',
                        ),
                    ),
                ),
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'page_don',
                ),
            ),
        ),
        'menu_order' => 0,
    ));

    // ============================================================
    // GROUPE: Contenu spécifique Page Bénévole
    // ============================================================
    acf_add_local_field_group(array(
        'key' => 'group_page_benevole',
        'title' => 'Contenu spécifique',
        'fields' => array(
            // Type de contenu
            array(
                'key' => 'field_benevole_type',
                'label' => 'Type de contenu',
                'name' => 'benevole_type',
                'type' => 'select',
                'instructions' => 'Sélectionnez le type de contenu',
                'required' => 1,
                'choices' => array(
                    'mission' => 'Notre mission',
                    'besoins' => 'Nos besoins',
                    'approche' => 'Notre approche',
                    'quotidien' => 'Le quotidien au Fanal',
                    'quiz' => 'Quiz',
                    'formulaire' => 'Formulaire',
                    'faq' => 'FAQ',
                    'cta' => 'Call-to-Action Final',
                ),
                'default_value' => 'mission',
            ),

            // === CHAMPS MISSION ===
            array(
                'key' => 'field_benevole_mission_titre',
                'label' => 'Titre Section',
                'name' => 'benevole_mission_titre',
                'type' => 'text',
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_benevole_type',
                            'operator' => '==',
                            'value' => 'mission',
                        ),
                    ),
                ),
            ),
            array(
                'key' => 'field_benevole_mission_paragraphe_1',
                'label' => 'Paragraphe 1',
                'name' => 'benevole_mission_paragraphe_1',
                'type' => 'textarea',
                'rows' => 3,
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_benevole_type',
                            'operator' => '==',
                            'value' => 'mission',
                        ),
                    ),
                ),
            ),
            array(
                'key' => 'field_benevole_mission_paragraphe_2',
                'label' => 'Paragraphe 2',
                'name' => 'benevole_mission_paragraphe_2',
                'type' => 'textarea',
                'rows' => 3,
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_benevole_type',
                            'operator' => '==',
                            'value' => 'mission',
                        ),
                    ),
                ),
            ),

            // === CHAMPS BESOINS ===
            array(
                'key' => 'field_benevole_besoins_titre',
                'label' => 'Titre Section',
                'name' => 'benevole_besoins_titre',
                'type' => 'text',
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_benevole_type',
                            'operator' => '==',
                            'value' => 'besoins',
                        ),
                    ),
                ),
            ),
            array(
                'key' => 'field_benevole_besoins_texte',
                'label' => 'Texte introduction',
                'name' => 'benevole_besoins_texte',
                'type' => 'textarea',
                'rows' => 2,
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_benevole_type',
                            'operator' => '==',
                            'value' => 'besoins',
                        ),
                    ),
                ),
            ),
            array(
                'key' => 'field_benevole_besoins_liste',
                'label' => 'Liste',
                'name' => 'benevole_besoins_liste',
                'type' => 'textarea',
                'rows' => 5,
                'instructions' => 'Chaque élément doit être sur une nouvelle ligne (touche Entrée entre chaque point).',
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_benevole_type',
                            'operator' => '==',
                            'value' => 'besoins',
                        ),
                    ),
                ),
            ),

            // === CHAMPS APPROCHE ===
            array(
                'key' => 'field_benevole_approche_titre',
                'label' => 'Titre Section',
                'name' => 'benevole_approche_titre',
                'type' => 'text',
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_benevole_type',
                            'operator' => '==',
                            'value' => 'approche',
                        ),
                    ),
                ),
            ),
            array(
                'key' => 'field_benevole_approche_texte',
                'label' => 'Texte',
                'name' => 'benevole_approche_texte',
                'type' => 'textarea',
                'rows' => 3,
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_benevole_type',
                            'operator' => '==',
                            'value' => 'approche',
                        ),
                    ),
                ),
            ),

            // === CHAMPS QUOTIDIEN ===
            array(
                'key' => 'field_benevole_quotidien_titre',
                'label' => 'Titre Section',
                'name' => 'benevole_quotidien_titre',
                'type' => 'text',
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_benevole_type',
                            'operator' => '==',
                            'value' => 'quotidien',
                        ),
                    ),
                ),
            ),
            array(
                'key' => 'field_benevole_quotidien_liste',
                'label' => 'Liste',
                'name' => 'benevole_quotidien_liste',
                'type' => 'textarea',
                'rows' => 5,
                'instructions' => 'Chaque élément doit être sur une nouvelle ligne (touche Entrée entre chaque point).',
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_benevole_type',
                            'operator' => '==',
                            'value' => 'quotidien',
                        ),
                    ),
                ),
            ),

            // === CHAMPS QUIZ ===
            array(
                'key' => 'field_benevole_quiz_titre',
                'label' => 'Titre Section',
                'name' => 'benevole_quiz_titre',
                'type' => 'text',
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_benevole_type',
                            'operator' => '==',
                            'value' => 'quiz',
                        ),
                    ),
                ),
            ),
            array(
                'key' => 'field_benevole_quiz_texte',
                'label' => 'Texte',
                'name' => 'benevole_quiz_texte',
                'type' => 'textarea',
                'rows' => 3,
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_benevole_type',
                            'operator' => '==',
                            'value' => 'quiz',
                        ),
                    ),
                ),
            ),

            // === CHAMPS FORMULAIRE ===
            array(
                'key' => 'field_benevole_formulaire_titre',
                'label' => 'Titre Section',
                'name' => 'benevole_formulaire_titre',
                'type' => 'text',
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_benevole_type',
                            'operator' => '==',
                            'value' => 'formulaire',
                        ),
                    ),
                ),
            ),
            array(
                'key' => 'field_benevole_formulaire_texte',
                'label' => 'Texte',
                'name' => 'benevole_formulaire_texte',
                'type' => 'textarea',
                'rows' => 3,
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_benevole_type',
                            'operator' => '==',
                            'value' => 'formulaire',
                        ),
                    ),
                ),
            ),

            // === CHAMPS FAQ ===
            array(
                'key' => 'field_benevole_faq_titre',
                'label' => 'Titre Section',
                'name' => 'benevole_faq_titre',
                'type' => 'text',
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_benevole_type',
                            'operator' => '==',
                            'value' => 'faq',
                        ),
                    ),
                ),
            ),
            array(
                'key' => 'field_benevole_faq_question_1',
                'label' => 'Question 1',
                'name' => 'benevole_faq_question_1',
                'type' => 'text',
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_benevole_type',
                            'operator' => '==',
                            'value' => 'faq',
                        ),
                    ),
                ),
            ),
            array(
                'key' => 'field_benevole_faq_reponse_1',
                'label' => 'Réponse 1',
                'name' => 'benevole_faq_reponse_1',
                'type' => 'textarea',
                'rows' => 3,
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_benevole_type',
                            'operator' => '==',
                            'value' => 'faq',
                        ),
                    ),
                ),
            ),
            array(
                'key' => 'field_benevole_faq_question_2',
                'label' => 'Question 2',
                'name' => 'benevole_faq_question_2',
                'type' => 'text',
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_benevole_type',
                            'operator' => '==',
                            'value' => 'faq',
                        ),
                    ),
                ),
            ),
            array(
                'key' => 'field_benevole_faq_reponse_2',
                'label' => 'Réponse 2',
                'name' => 'benevole_faq_reponse_2',
                'type' => 'textarea',
                'rows' => 3,
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_benevole_type',
                            'operator' => '==',
                            'value' => 'faq',
                        ),
                    ),
                ),
            ),
            array(
                'key' => 'field_benevole_faq_question_3',
                'label' => 'Question 3',
                'name' => 'benevole_faq_question_3',
                'type' => 'text',
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_benevole_type',
                            'operator' => '==',
                            'value' => 'faq',
                        ),
                    ),
                ),
            ),
            array(
                'key' => 'field_benevole_faq_reponse_3',
                'label' => 'Réponse 3',
                'name' => 'benevole_faq_reponse_3',
                'type' => 'textarea',
                'rows' => 3,
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_benevole_type',
                            'operator' => '==',
                            'value' => 'faq',
                        ),
                    ),
                ),
            ),
            array(
                'key' => 'field_benevole_faq_question_4',
                'label' => 'Question 4',
                'name' => 'benevole_faq_question_4',
                'type' => 'text',
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_benevole_type',
                            'operator' => '==',
                            'value' => 'faq',
                        ),
                    ),
                ),
            ),
            array(
                'key' => 'field_benevole_faq_reponse_4',
                'label' => 'Réponse 4',
                'name' => 'benevole_faq_reponse_4',
                'type' => 'textarea',
                'rows' => 3,
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_benevole_type',
                            'operator' => '==',
                            'value' => 'faq',
                        ),
                    ),
                ),
            ),

            // === CHAMPS CTA ===
            array(
                'key' => 'field_benevole_cta_titre',
                'label' => 'Titre',
                'name' => 'benevole_cta_titre',
                'type' => 'text',
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_benevole_type',
                            'operator' => '==',
                            'value' => 'cta',
                        ),
                    ),
                ),
            ),
            array(
                'key' => 'field_benevole_cta_sous_titre',
                'label' => 'Sous-titre',
                'name' => 'benevole_cta_sous_titre',
                'type' => 'text',
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_benevole_type',
                            'operator' => '==',
                            'value' => 'cta',
                        ),
                    ),
                ),
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'page_benevole',
                ),
            ),
        ),
        'menu_order' => 0,
    ));

    // ============================================================
    // GROUPE: Contenu spécifique Page Emploi
    // ============================================================
    acf_add_local_field_group(array(
        'key' => 'group_page_emploi',
        'title' => 'Contenu spécifique',
        'fields' => array(
            // Type de contenu
            array(
                'key' => 'field_emploi_type',
                'label' => 'Type de contenu',
                'name' => 'emploi_type',
                'type' => 'select',
                'instructions' => 'Sélectionnez le type de contenu',
                'required' => 1,
                'choices' => array(
                    'mission' => 'Notre mission',
                    'besoins' => 'Nos besoins',
                    'approche' => 'Notre approche',
                    'quotidien' => 'Le quotidien au Fanal',
                    'quiz' => 'Quiz',
                    'formulaire' => 'Formulaire',
                    'faq' => 'FAQ',
                    'cta' => 'Call-to-Action Final',
                ),
                'default_value' => 'mission',
            ),

            // === CHAMPS MISSION ===
            array(
                'key' => 'field_emploi_mission_titre',
                'label' => 'Titre Section',
                'name' => 'emploi_mission_titre',
                'type' => 'text',
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_emploi_type',
                            'operator' => '==',
                            'value' => 'mission',
                        ),
                    ),
                ),
            ),
            array(
                'key' => 'field_emploi_mission_paragraphe_1',
                'label' => 'Paragraphe 1',
                'name' => 'emploi_mission_paragraphe_1',
                'type' => 'textarea',
                'rows' => 3,
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_emploi_type',
                            'operator' => '==',
                            'value' => 'mission',
                        ),
                    ),
                ),
            ),
            array(
                'key' => 'field_emploi_mission_paragraphe_2',
                'label' => 'Paragraphe 2',
                'name' => 'emploi_mission_paragraphe_2',
                'type' => 'textarea',
                'rows' => 3,
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_emploi_type',
                            'operator' => '==',
                            'value' => 'mission',
                        ),
                    ),
                ),
            ),

            // === CHAMPS BESOINS ===
            array(
                'key' => 'field_emploi_besoins_titre',
                'label' => 'Titre Section',
                'name' => 'emploi_besoins_titre',
                'type' => 'text',
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_emploi_type',
                            'operator' => '==',
                            'value' => 'besoins',
                        ),
                    ),
                ),
            ),
            array(
                'key' => 'field_emploi_besoins_texte',
                'label' => 'Texte introduction',
                'name' => 'emploi_besoins_texte',
                'type' => 'textarea',
                'rows' => 2,
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_emploi_type',
                            'operator' => '==',
                            'value' => 'besoins',
                        ),
                    ),
                ),
            ),
            array(
                'key' => 'field_emploi_besoins_liste',
                'label' => 'Liste',
                'name' => 'emploi_besoins_liste',
                'type' => 'textarea',
                'rows' => 5,
                'instructions' => 'Chaque élément doit être sur une nouvelle ligne (touche Entrée entre chaque point).',
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_emploi_type',
                            'operator' => '==',
                            'value' => 'besoins',
                        ),
                    ),
                ),
            ),

            // === CHAMPS APPROCHE ===
            array(
                'key' => 'field_emploi_approche_titre',
                'label' => 'Titre Section',
                'name' => 'emploi_approche_titre',
                'type' => 'text',
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_emploi_type',
                            'operator' => '==',
                            'value' => 'approche',
                        ),
                    ),
                ),
            ),
            array(
                'key' => 'field_emploi_approche_texte',
                'label' => 'Texte',
                'name' => 'emploi_approche_texte',
                'type' => 'textarea',
                'rows' => 3,
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_emploi_type',
                            'operator' => '==',
                            'value' => 'approche',
                        ),
                    ),
                ),
            ),

            // === CHAMPS QUOTIDIEN ===
            array(
                'key' => 'field_emploi_quotidien_titre',
                'label' => 'Titre Section',
                'name' => 'emploi_quotidien_titre',
                'type' => 'text',
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_emploi_type',
                            'operator' => '==',
                            'value' => 'quotidien',
                        ),
                    ),
                ),
            ),
            array(
                'key' => 'field_emploi_quotidien_liste',
                'label' => 'Liste',
                'name' => 'emploi_quotidien_liste',
                'type' => 'textarea',
                'rows' => 5,
                'instructions' => 'Chaque élément doit être sur une nouvelle ligne (touche Entrée entre chaque point).',
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_emploi_type',
                            'operator' => '==',
                            'value' => 'quotidien',
                        ),
                    ),
                ),
            ),

            // === CHAMPS QUIZ ===
            array(
                'key' => 'field_emploi_quiz_titre',
                'label' => 'Titre Section',
                'name' => 'emploi_quiz_titre',
                'type' => 'text',
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_emploi_type',
                            'operator' => '==',
                            'value' => 'quiz',
                        ),
                    ),
                ),
            ),
            array(
                'key' => 'field_emploi_quiz_texte',
                'label' => 'Texte',
                'name' => 'emploi_quiz_texte',
                'type' => 'textarea',
                'rows' => 3,
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_emploi_type',
                            'operator' => '==',
                            'value' => 'quiz',
                        ),
                    ),
                ),
            ),

            // === CHAMPS FORMULAIRE ===
            array(
                'key' => 'field_emploi_formulaire_titre',
                'label' => 'Titre Section',
                'name' => 'emploi_formulaire_titre',
                'type' => 'text',
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_emploi_type',
                            'operator' => '==',
                            'value' => 'formulaire',
                        ),
                    ),
                ),
            ),
            array(
                'key' => 'field_emploi_formulaire_texte',
                'label' => 'Texte',
                'name' => 'emploi_formulaire_texte',
                'type' => 'textarea',
                'rows' => 3,
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_emploi_type',
                            'operator' => '==',
                            'value' => 'formulaire',
                        ),
                    ),
                ),
            ),

            // === CHAMPS FAQ ===
            array(
                'key' => 'field_emploi_faq_titre',
                'label' => 'Titre Section',
                'name' => 'emploi_faq_titre',
                'type' => 'text',
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_emploi_type',
                            'operator' => '==',
                            'value' => 'faq',
                        ),
                    ),
                ),
            ),
            array(
                'key' => 'field_emploi_faq_question_1',
                'label' => 'Question 1',
                'name' => 'emploi_faq_question_1',
                'type' => 'text',
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_emploi_type',
                            'operator' => '==',
                            'value' => 'faq',
                        ),
                    ),
                ),
            ),
            array(
                'key' => 'field_emploi_faq_reponse_1',
                'label' => 'Réponse 1',
                'name' => 'emploi_faq_reponse_1',
                'type' => 'textarea',
                'rows' => 3,
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_emploi_type',
                            'operator' => '==',
                            'value' => 'faq',
                        ),
                    ),
                ),
            ),
            array(
                'key' => 'field_emploi_faq_question_2',
                'label' => 'Question 2',
                'name' => 'emploi_faq_question_2',
                'type' => 'text',
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_emploi_type',
                            'operator' => '==',
                            'value' => 'faq',
                        ),
                    ),
                ),
            ),
            array(
                'key' => 'field_emploi_faq_reponse_2',
                'label' => 'Réponse 2',
                'name' => 'emploi_faq_reponse_2',
                'type' => 'textarea',
                'rows' => 3,
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_emploi_type',
                            'operator' => '==',
                            'value' => 'faq',
                        ),
                    ),
                ),
            ),
            array(
                'key' => 'field_emploi_faq_question_3',
                'label' => 'Question 3',
                'name' => 'emploi_faq_question_3',
                'type' => 'text',
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_emploi_type',
                            'operator' => '==',
                            'value' => 'faq',
                        ),
                    ),
                ),
            ),
            array(
                'key' => 'field_emploi_faq_reponse_3',
                'label' => 'Réponse 3',
                'name' => 'emploi_faq_reponse_3',
                'type' => 'textarea',
                'rows' => 3,
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_emploi_type',
                            'operator' => '==',
                            'value' => 'faq',
                        ),
                    ),
                ),
            ),
            array(
                'key' => 'field_emploi_faq_question_4',
                'label' => 'Question 4',
                'name' => 'emploi_faq_question_4',
                'type' => 'text',
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_emploi_type',
                            'operator' => '==',
                            'value' => 'faq',
                        ),
                    ),
                ),
            ),
            array(
                'key' => 'field_emploi_faq_reponse_4',
                'label' => 'Réponse 4',
                'name' => 'emploi_faq_reponse_4',
                'type' => 'textarea',
                'rows' => 3,
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_emploi_type',
                            'operator' => '==',
                            'value' => 'faq',
                        ),
                    ),
                ),
            ),

            // === CHAMPS CTA ===
            array(
                'key' => 'field_emploi_cta_titre',
                'label' => 'Titre',
                'name' => 'emploi_cta_titre',
                'type' => 'text',
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_emploi_type',
                            'operator' => '==',
                            'value' => 'cta',
                        ),
                    ),
                ),
            ),
            array(
                'key' => 'field_emploi_cta_sous_titre',
                'label' => 'Sous-titre',
                'name' => 'emploi_cta_sous_titre',
                'type' => 'text',
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_emploi_type',
                            'operator' => '==',
                            'value' => 'cta',
                        ),
                    ),
                ),
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'page_emploi',
                ),
            ),
        ),
        'menu_order' => 0,
    ));

    // ============================================================
    // GROUPE: Contenu spécifique Page Stage
    // ============================================================
    acf_add_local_field_group(array(
        'key' => 'group_page_stage',
        'title' => 'Contenu spécifique',
        'fields' => array(
            // Type de contenu
            array(
                'key' => 'field_stage_type',
                'label' => 'Type de contenu',
                'name' => 'stage_type',
                'type' => 'select',
                'instructions' => 'Sélectionnez le type de contenu',
                'required' => 1,
                'choices' => array(
                    'mission' => 'Notre mission',
                    'besoins' => 'Nos besoins',
                    'approche' => 'Notre approche',
                    'quotidien' => 'Le quotidien au Fanal',
                    'quiz' => 'Quiz',
                    'formulaire' => 'Formulaire',
                    'faq' => 'FAQ',
                    'cta' => 'Call-to-Action Final',
                ),
                'default_value' => 'mission',
            ),

            // === CHAMPS MISSION ===
            array(
                'key' => 'field_stage_mission_titre',
                'label' => 'Titre Section',
                'name' => 'stage_mission_titre',
                'type' => 'text',
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_stage_type',
                            'operator' => '==',
                            'value' => 'mission',
                        ),
                    ),
                ),
            ),
            array(
                'key' => 'field_stage_mission_paragraphe_1',
                'label' => 'Paragraphe 1',
                'name' => 'stage_mission_paragraphe_1',
                'type' => 'textarea',
                'rows' => 3,
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_stage_type',
                            'operator' => '==',
                            'value' => 'mission',
                        ),
                    ),
                ),
            ),
            array(
                'key' => 'field_stage_mission_paragraphe_2',
                'label' => 'Paragraphe 2',
                'name' => 'stage_mission_paragraphe_2',
                'type' => 'textarea',
                'rows' => 3,
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_stage_type',
                            'operator' => '==',
                            'value' => 'mission',
                        ),
                    ),
                ),
            ),

            // === CHAMPS BESOINS ===
            array(
                'key' => 'field_stage_besoins_titre',
                'label' => 'Titre Section',
                'name' => 'stage_besoins_titre',
                'type' => 'text',
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_stage_type',
                            'operator' => '==',
                            'value' => 'besoins',
                        ),
                    ),
                ),
            ),
            array(
                'key' => 'field_stage_besoins_texte',
                'label' => 'Texte introduction',
                'name' => 'stage_besoins_texte',
                'type' => 'textarea',
                'rows' => 2,
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_stage_type',
                            'operator' => '==',
                            'value' => 'besoins',
                        ),
                    ),
                ),
            ),
            array(
                'key' => 'field_stage_besoins_liste',
                'label' => 'Liste',
                'name' => 'stage_besoins_liste',
                'type' => 'textarea',
                'rows' => 5,
                'instructions' => 'Chaque élément doit être sur une nouvelle ligne (touche Entrée entre chaque point).',
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_stage_type',
                            'operator' => '==',
                            'value' => 'besoins',
                        ),
                    ),
                ),
            ),

            // === CHAMPS APPROCHE ===
            array(
                'key' => 'field_stage_approche_titre',
                'label' => 'Titre Section',
                'name' => 'stage_approche_titre',
                'type' => 'text',
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_stage_type',
                            'operator' => '==',
                            'value' => 'approche',
                        ),
                    ),
                ),
            ),
            array(
                'key' => 'field_stage_approche_texte',
                'label' => 'Texte',
                'name' => 'stage_approche_texte',
                'type' => 'textarea',
                'rows' => 3,
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_stage_type',
                            'operator' => '==',
                            'value' => 'approche',
                        ),
                    ),
                ),
            ),

            // === CHAMPS QUOTIDIEN ===
            array(
                'key' => 'field_stage_quotidien_titre',
                'label' => 'Titre Section',
                'name' => 'stage_quotidien_titre',
                'type' => 'text',
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_stage_type',
                            'operator' => '==',
                            'value' => 'quotidien',
                        ),
                    ),
                ),
            ),
            array(
                'key' => 'field_stage_quotidien_liste',
                'label' => 'Liste',
                'name' => 'stage_quotidien_liste',
                'type' => 'textarea',
                'rows' => 5,
                'instructions' => 'Chaque élément doit être sur une nouvelle ligne (touche Entrée entre chaque point).',
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_stage_type',
                            'operator' => '==',
                            'value' => 'quotidien',
                        ),
                    ),
                ),
            ),

            // === CHAMPS QUIZ ===
            array(
                'key' => 'field_stage_quiz_titre',
                'label' => 'Titre Section',
                'name' => 'stage_quiz_titre',
                'type' => 'text',
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_stage_type',
                            'operator' => '==',
                            'value' => 'quiz',
                        ),
                    ),
                ),
            ),
            array(
                'key' => 'field_stage_quiz_texte',
                'label' => 'Texte',
                'name' => 'stage_quiz_texte',
                'type' => 'textarea',
                'rows' => 3,
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_stage_type',
                            'operator' => '==',
                            'value' => 'quiz',
                        ),
                    ),
                ),
            ),

            // === CHAMPS FORMULAIRE ===
            array(
                'key' => 'field_stage_formulaire_titre',
                'label' => 'Titre Section',
                'name' => 'stage_formulaire_titre',
                'type' => 'text',
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_stage_type',
                            'operator' => '==',
                            'value' => 'formulaire',
                        ),
                    ),
                ),
            ),
            array(
                'key' => 'field_stage_formulaire_texte',
                'label' => 'Texte',
                'name' => 'stage_formulaire_texte',
                'type' => 'textarea',
                'rows' => 3,
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_stage_type',
                            'operator' => '==',
                            'value' => 'formulaire',
                        ),
                    ),
                ),
            ),

            // === CHAMPS FAQ ===
            array(
                'key' => 'field_stage_faq_titre',
                'label' => 'Titre Section',
                'name' => 'stage_faq_titre',
                'type' => 'text',
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_stage_type',
                            'operator' => '==',
                            'value' => 'faq',
                        ),
                    ),
                ),
            ),
            array(
                'key' => 'field_stage_faq_question_1',
                'label' => 'Question 1',
                'name' => 'stage_faq_question_1',
                'type' => 'text',
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_stage_type',
                            'operator' => '==',
                            'value' => 'faq',
                        ),
                    ),
                ),
            ),
            array(
                'key' => 'field_stage_faq_reponse_1',
                'label' => 'Réponse 1',
                'name' => 'stage_faq_reponse_1',
                'type' => 'textarea',
                'rows' => 3,
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_stage_type',
                            'operator' => '==',
                            'value' => 'faq',
                        ),
                    ),
                ),
            ),
            array(
                'key' => 'field_stage_faq_question_2',
                'label' => 'Question 2',
                'name' => 'stage_faq_question_2',
                'type' => 'text',
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_stage_type',
                            'operator' => '==',
                            'value' => 'faq',
                        ),
                    ),
                ),
            ),
            array(
                'key' => 'field_stage_faq_reponse_2',
                'label' => 'Réponse 2',
                'name' => 'stage_faq_reponse_2',
                'type' => 'textarea',
                'rows' => 3,
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_stage_type',
                            'operator' => '==',
                            'value' => 'faq',
                        ),
                    ),
                ),
            ),
            array(
                'key' => 'field_stage_faq_question_3',
                'label' => 'Question 3',
                'name' => 'stage_faq_question_3',
                'type' => 'text',
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_stage_type',
                            'operator' => '==',
                            'value' => 'faq',
                        ),
                    ),
                ),
            ),
            array(
                'key' => 'field_stage_faq_reponse_3',
                'label' => 'Réponse 3',
                'name' => 'stage_faq_reponse_3',
                'type' => 'textarea',
                'rows' => 3,
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_stage_type',
                            'operator' => '==',
                            'value' => 'faq',
                        ),
                    ),
                ),
            ),
            array(
                'key' => 'field_stage_faq_question_4',
                'label' => 'Question 4',
                'name' => 'stage_faq_question_4',
                'type' => 'text',
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_stage_type',
                            'operator' => '==',
                            'value' => 'faq',
                        ),
                    ),
                ),
            ),
            array(
                'key' => 'field_stage_faq_reponse_4',
                'label' => 'Réponse 4',
                'name' => 'stage_faq_reponse_4',
                'type' => 'textarea',
                'rows' => 3,
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_stage_type',
                            'operator' => '==',
                            'value' => 'faq',
                        ),
                    ),
                ),
            ),

            // === CHAMPS CTA ===
            array(
                'key' => 'field_stage_cta_titre',
                'label' => 'Titre',
                'name' => 'stage_cta_titre',
                'type' => 'text',
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_stage_type',
                            'operator' => '==',
                            'value' => 'cta',
                        ),
                    ),
                ),
            ),
            array(
                'key' => 'field_stage_cta_sous_titre',
                'label' => 'Sous-titre',
                'name' => 'stage_cta_sous_titre',
                'type' => 'text',
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_stage_type',
                            'operator' => '==',
                            'value' => 'cta',
                        ),
                    ),
                ),
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'page_stage',
                ),
            ),
        ),
        'menu_order' => 0,
    ));

    // ============================================================
    // GROUPE: Champs Revue
    // ============================================================
    acf_add_local_field_group(array(
        'key' => 'group_revue',
        'title' => 'Informations de la revue',
        'fields' => array(
            array(
                'key' => 'field_revue_date',
                'label' => 'Date de publication',
                'name' => 'revue_date',
                'type' => 'text',
                'instructions' => 'Ex: Décembre 2025',
                'required' => 1,
            ),
            array(
                'key' => 'field_revue_lien',
                'label' => 'Lien PDF',
                'name' => 'revue_lien',
                'type' => 'url',
                'instructions' => 'URL vers le fichier PDF ou la page de la revue',
                'required' => 1,
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'revue',
                ),
            ),
        ),
        'menu_order' => 0,
    ));

    // ============================================================
    // GROUPE: Contenu spécifique Page Famille d'accueil
    // ============================================================
    acf_add_local_field_group(array(
        'key' => 'group_page_famille_accueil',
        'title' => 'Contenu spécifique',
        'fields' => array(
            // Type de contenu
            array(
                'key' => 'field_famille_type',
                'label' => 'Type de contenu',
                'name' => 'famille_type',
                'type' => 'select',
                'instructions' => 'Sélectionnez le type de contenu',
                'required' => 1,
                'choices' => array(
                    'mission' => 'Notre mission',
                    'besoins' => 'Nos besoins',
                    'approche' => 'Notre approche',
                    'quotidien' => 'Le quotidien en famille d\'accueil',
                    'quiz' => 'Quiz',
                    'formulaire' => 'Formulaire',
                    'faq' => 'FAQ',
                    'cta' => 'Call-to-Action Final',
                ),
                'default_value' => 'mission',
            ),

            // === CHAMPS MISSION ===
            array(
                'key' => 'field_famille_mission_titre',
                'label' => 'Titre Section',
                'name' => 'famille_mission_titre',
                'type' => 'text',
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_famille_type',
                            'operator' => '==',
                            'value' => 'mission',
                        ),
                    ),
                ),
            ),
            array(
                'key' => 'field_famille_mission_paragraphe_1',
                'label' => 'Paragraphe 1',
                'name' => 'famille_mission_paragraphe_1',
                'type' => 'textarea',
                'rows' => 3,
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_famille_type',
                            'operator' => '==',
                            'value' => 'mission',
                        ),
                    ),
                ),
            ),
            array(
                'key' => 'field_famille_mission_paragraphe_2',
                'label' => 'Paragraphe 2',
                'name' => 'famille_mission_paragraphe_2',
                'type' => 'textarea',
                'rows' => 3,
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_famille_type',
                            'operator' => '==',
                            'value' => 'mission',
                        ),
                    ),
                ),
            ),

            // === CHAMPS BESOINS ===
            array(
                'key' => 'field_famille_besoins_titre',
                'label' => 'Titre Section',
                'name' => 'famille_besoins_titre',
                'type' => 'text',
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_famille_type',
                            'operator' => '==',
                            'value' => 'besoins',
                        ),
                    ),
                ),
            ),
            array(
                'key' => 'field_famille_besoins_texte',
                'label' => 'Texte introduction',
                'name' => 'famille_besoins_texte',
                'type' => 'textarea',
                'rows' => 2,
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_famille_type',
                            'operator' => '==',
                            'value' => 'besoins',
                        ),
                    ),
                ),
            ),
            array(
                'key' => 'field_famille_besoins_liste',
                'label' => 'Liste',
                'name' => 'famille_besoins_liste',
                'type' => 'textarea',
                'rows' => 5,
                'instructions' => 'Chaque élément doit être sur une nouvelle ligne (touche Entrée entre chaque point).',
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_famille_type',
                            'operator' => '==',
                            'value' => 'besoins',
                        ),
                    ),
                ),
            ),

            // === CHAMPS APPROCHE ===
            array(
                'key' => 'field_famille_approche_titre',
                'label' => 'Titre Section',
                'name' => 'famille_approche_titre',
                'type' => 'text',
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_famille_type',
                            'operator' => '==',
                            'value' => 'approche',
                        ),
                    ),
                ),
            ),
            array(
                'key' => 'field_famille_approche_texte',
                'label' => 'Texte',
                'name' => 'famille_approche_texte',
                'type' => 'textarea',
                'rows' => 3,
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_famille_type',
                            'operator' => '==',
                            'value' => 'approche',
                        ),
                    ),
                ),
            ),

            // === CHAMPS QUOTIDIEN ===
            array(
                'key' => 'field_famille_quotidien_titre',
                'label' => 'Titre Section',
                'name' => 'famille_quotidien_titre',
                'type' => 'text',
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_famille_type',
                            'operator' => '==',
                            'value' => 'quotidien',
                        ),
                    ),
                ),
            ),
            array(
                'key' => 'field_famille_quotidien_liste',
                'label' => 'Liste',
                'name' => 'famille_quotidien_liste',
                'type' => 'textarea',
                'rows' => 5,
                'instructions' => 'Chaque élément doit être sur une nouvelle ligne (touche Entrée entre chaque point).',
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_famille_type',
                            'operator' => '==',
                            'value' => 'quotidien',
                        ),
                    ),
                ),
            ),

            // === CHAMPS QUIZ ===
            array(
                'key' => 'field_famille_quiz_titre',
                'label' => 'Titre Section',
                'name' => 'famille_quiz_titre',
                'type' => 'text',
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_famille_type',
                            'operator' => '==',
                            'value' => 'quiz',
                        ),
                    ),
                ),
            ),
            array(
                'key' => 'field_famille_quiz_texte',
                'label' => 'Texte',
                'name' => 'famille_quiz_texte',
                'type' => 'textarea',
                'rows' => 3,
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_famille_type',
                            'operator' => '==',
                            'value' => 'quiz',
                        ),
                    ),
                ),
            ),

            // === CHAMPS FORMULAIRE ===
            array(
                'key' => 'field_famille_formulaire_titre',
                'label' => 'Titre Section',
                'name' => 'famille_formulaire_titre',
                'type' => 'text',
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_famille_type',
                            'operator' => '==',
                            'value' => 'formulaire',
                        ),
                    ),
                ),
            ),
            array(
                'key' => 'field_famille_formulaire_texte',
                'label' => 'Texte',
                'name' => 'famille_formulaire_texte',
                'type' => 'textarea',
                'rows' => 3,
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_famille_type',
                            'operator' => '==',
                            'value' => 'formulaire',
                        ),
                    ),
                ),
            ),

            // === CHAMPS FAQ ===
            array(
                'key' => 'field_famille_faq_titre',
                'label' => 'Titre Section',
                'name' => 'famille_faq_titre',
                'type' => 'text',
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_famille_type',
                            'operator' => '==',
                            'value' => 'faq',
                        ),
                    ),
                ),
            ),
            array(
                'key' => 'field_famille_faq_question_1',
                'label' => 'Question 1',
                'name' => 'famille_faq_question_1',
                'type' => 'text',
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_famille_type',
                            'operator' => '==',
                            'value' => 'faq',
                        ),
                    ),
                ),
            ),
            array(
                'key' => 'field_famille_faq_reponse_1',
                'label' => 'Réponse 1',
                'name' => 'famille_faq_reponse_1',
                'type' => 'textarea',
                'rows' => 3,
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_famille_type',
                            'operator' => '==',
                            'value' => 'faq',
                        ),
                    ),
                ),
            ),
            array(
                'key' => 'field_famille_faq_question_2',
                'label' => 'Question 2',
                'name' => 'famille_faq_question_2',
                'type' => 'text',
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_famille_type',
                            'operator' => '==',
                            'value' => 'faq',
                        ),
                    ),
                ),
            ),
            array(
                'key' => 'field_famille_faq_reponse_2',
                'label' => 'Réponse 2',
                'name' => 'famille_faq_reponse_2',
                'type' => 'textarea',
                'rows' => 3,
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_famille_type',
                            'operator' => '==',
                            'value' => 'faq',
                        ),
                    ),
                ),
            ),
            array(
                'key' => 'field_famille_faq_question_3',
                'label' => 'Question 3',
                'name' => 'famille_faq_question_3',
                'type' => 'text',
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_famille_type',
                            'operator' => '==',
                            'value' => 'faq',
                        ),
                    ),
                ),
            ),
            array(
                'key' => 'field_famille_faq_reponse_3',
                'label' => 'Réponse 3',
                'name' => 'famille_faq_reponse_3',
                'type' => 'textarea',
                'rows' => 3,
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_famille_type',
                            'operator' => '==',
                            'value' => 'faq',
                        ),
                    ),
                ),
            ),
            array(
                'key' => 'field_famille_faq_question_4',
                'label' => 'Question 4',
                'name' => 'famille_faq_question_4',
                'type' => 'text',
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_famille_type',
                            'operator' => '==',
                            'value' => 'faq',
                        ),
                    ),
                ),
            ),
            array(
                'key' => 'field_famille_faq_reponse_4',
                'label' => 'Réponse 4',
                'name' => 'famille_faq_reponse_4',
                'type' => 'textarea',
                'rows' => 3,
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_famille_type',
                            'operator' => '==',
                            'value' => 'faq',
                        ),
                    ),
                ),
            ),

            // === CHAMPS CTA ===
            array(
                'key' => 'field_famille_cta_titre',
                'label' => 'Titre',
                'name' => 'famille_cta_titre',
                'type' => 'text',
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_famille_type',
                            'operator' => '==',
                            'value' => 'cta',
                        ),
                    ),
                ),
            ),
            array(
                'key' => 'field_famille_cta_sous_titre',
                'label' => 'Sous-titre',
                'name' => 'famille_cta_sous_titre',
                'type' => 'text',
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_famille_type',
                            'operator' => '==',
                            'value' => 'cta',
                        ),
                    ),
                ),
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'page_famille_accueil',
                ),
            ),
        ),
        'menu_order' => 0,
    ));

    // ============================================================
    // GROUPE: Champs Chat à parrainer
    // ============================================================
    acf_add_local_field_group(array(
        'key' => 'group_chat_parrainage',
        'title' => 'Informations du chat',
        'fields' => array(
            array(
                'key' => 'field_parrainage_description',
                'label' => 'Description courte',
                'name' => 'parrainage_description',
                'type' => 'textarea',
                'rows' => 3,
                'instructions' => 'Courte description du chat (personnalité, histoire...)',
                'required' => 1,
            ),
            array(
                'key' => 'field_parrainage_age',
                'label' => 'Âge',
                'name' => 'parrainage_age',
                'type' => 'text',
                'instructions' => 'Ex: 3 ans, 6 mois',
            ),
            array(
                'key' => 'field_parrainage_lien_don',
                'label' => 'Lien don',
                'name' => 'parrainage_lien_don',
                'type' => 'url',
                'instructions' => 'URL personnalisée vers la page de don (par défaut /don)',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'chat_parrainage',
                ),
            ),
        ),
        'menu_order' => 0,
    ));

    // ============================================================
    // GROUPE: Contenu spécifique Page Lègue
    // ============================================================
    acf_add_local_field_group(array(
        'key' => 'group_page_legue',
        'title' => 'Contenu spécifique',
        'fields' => array(
            // Type de contenu
            array(
                'key' => 'field_legue_type',
                'label' => 'Type de contenu',
                'name' => 'legue_type',
                'type' => 'select',
                'instructions' => 'Sélectionnez le type de contenu',
                'required' => 1,
                'choices' => array(
                    'intro' => 'Introduction',
                    'types' => 'Types de legs',
                    'demarches' => 'Comment léguer',
                    'avantages' => 'Avantages fiscaux',
                    'quiz' => 'Quiz',
                    'faq' => 'FAQ',
                    'cta' => 'Call-to-Action Final',
                ),
                'default_value' => 'intro',
            ),

            // === CHAMPS INTRO ===
            array(
                'key' => 'field_legue_intro_titre',
                'label' => 'Titre Section',
                'name' => 'legue_intro_titre',
                'type' => 'text',
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_legue_type',
                            'operator' => '==',
                            'value' => 'intro',
                        ),
                    ),
                ),
            ),
            array(
                'key' => 'field_legue_intro_paragraphe_1',
                'label' => 'Paragraphe 1',
                'name' => 'legue_intro_paragraphe_1',
                'type' => 'textarea',
                'rows' => 3,
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_legue_type',
                            'operator' => '==',
                            'value' => 'intro',
                        ),
                    ),
                ),
            ),
            array(
                'key' => 'field_legue_intro_paragraphe_2',
                'label' => 'Paragraphe 2',
                'name' => 'legue_intro_paragraphe_2',
                'type' => 'textarea',
                'rows' => 3,
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_legue_type',
                            'operator' => '==',
                            'value' => 'intro',
                        ),
                    ),
                ),
            ),

            // === CHAMPS TYPES DE LEGS ===
            array(
                'key' => 'field_legue_types_titre',
                'label' => 'Titre Section',
                'name' => 'legue_types_titre',
                'type' => 'text',
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_legue_type',
                            'operator' => '==',
                            'value' => 'types',
                        ),
                    ),
                ),
            ),
            array(
                'key' => 'field_legue_types_texte',
                'label' => 'Texte introduction',
                'name' => 'legue_types_texte',
                'type' => 'textarea',
                'rows' => 2,
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_legue_type',
                            'operator' => '==',
                            'value' => 'types',
                        ),
                    ),
                ),
            ),
            array(
                'key' => 'field_legue_types_liste',
                'label' => 'Liste des types',
                'name' => 'legue_types_liste',
                'type' => 'textarea',
                'rows' => 5,
                'instructions' => 'Chaque élément doit être sur une nouvelle ligne (touche Entrée entre chaque point).',
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_legue_type',
                            'operator' => '==',
                            'value' => 'types',
                        ),
                    ),
                ),
            ),

            // === CHAMPS DEMARCHES ===
            array(
                'key' => 'field_legue_demarches_titre',
                'label' => 'Titre Section',
                'name' => 'legue_demarches_titre',
                'type' => 'text',
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_legue_type',
                            'operator' => '==',
                            'value' => 'demarches',
                        ),
                    ),
                ),
            ),
            array(
                'key' => 'field_legue_demarches_texte',
                'label' => 'Texte',
                'name' => 'legue_demarches_texte',
                'type' => 'textarea',
                'rows' => 3,
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_legue_type',
                            'operator' => '==',
                            'value' => 'demarches',
                        ),
                    ),
                ),
            ),

            // === CHAMPS AVANTAGES ===
            array(
                'key' => 'field_legue_avantages_titre',
                'label' => 'Titre Section',
                'name' => 'legue_avantages_titre',
                'type' => 'text',
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_legue_type',
                            'operator' => '==',
                            'value' => 'avantages',
                        ),
                    ),
                ),
            ),
            array(
                'key' => 'field_legue_avantages_liste',
                'label' => 'Liste des avantages',
                'name' => 'legue_avantages_liste',
                'type' => 'textarea',
                'rows' => 5,
                'instructions' => 'Chaque élément doit être sur une nouvelle ligne (touche Entrée entre chaque point).',
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_legue_type',
                            'operator' => '==',
                            'value' => 'avantages',
                        ),
                    ),
                ),
            ),

            // === CHAMPS QUIZ ===
            array(
                'key' => 'field_legue_quiz_titre',
                'label' => 'Titre Section',
                'name' => 'legue_quiz_titre',
                'type' => 'text',
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_legue_type',
                            'operator' => '==',
                            'value' => 'quiz',
                        ),
                    ),
                ),
            ),
            array(
                'key' => 'field_legue_quiz_texte',
                'label' => 'Texte',
                'name' => 'legue_quiz_texte',
                'type' => 'textarea',
                'rows' => 3,
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_legue_type',
                            'operator' => '==',
                            'value' => 'quiz',
                        ),
                    ),
                ),
            ),

            // === CHAMPS FAQ ===
            array(
                'key' => 'field_legue_faq_titre',
                'label' => 'Titre Section',
                'name' => 'legue_faq_titre',
                'type' => 'text',
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_legue_type',
                            'operator' => '==',
                            'value' => 'faq',
                        ),
                    ),
                ),
            ),
            array(
                'key' => 'field_legue_faq_question_1',
                'label' => 'Question 1',
                'name' => 'legue_faq_question_1',
                'type' => 'text',
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_legue_type',
                            'operator' => '==',
                            'value' => 'faq',
                        ),
                    ),
                ),
            ),
            array(
                'key' => 'field_legue_faq_reponse_1',
                'label' => 'Réponse 1',
                'name' => 'legue_faq_reponse_1',
                'type' => 'textarea',
                'rows' => 3,
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_legue_type',
                            'operator' => '==',
                            'value' => 'faq',
                        ),
                    ),
                ),
            ),
            array(
                'key' => 'field_legue_faq_question_2',
                'label' => 'Question 2',
                'name' => 'legue_faq_question_2',
                'type' => 'text',
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_legue_type',
                            'operator' => '==',
                            'value' => 'faq',
                        ),
                    ),
                ),
            ),
            array(
                'key' => 'field_legue_faq_reponse_2',
                'label' => 'Réponse 2',
                'name' => 'legue_faq_reponse_2',
                'type' => 'textarea',
                'rows' => 3,
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_legue_type',
                            'operator' => '==',
                            'value' => 'faq',
                        ),
                    ),
                ),
            ),
            array(
                'key' => 'field_legue_faq_question_3',
                'label' => 'Question 3',
                'name' => 'legue_faq_question_3',
                'type' => 'text',
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_legue_type',
                            'operator' => '==',
                            'value' => 'faq',
                        ),
                    ),
                ),
            ),
            array(
                'key' => 'field_legue_faq_reponse_3',
                'label' => 'Réponse 3',
                'name' => 'legue_faq_reponse_3',
                'type' => 'textarea',
                'rows' => 3,
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_legue_type',
                            'operator' => '==',
                            'value' => 'faq',
                        ),
                    ),
                ),
            ),
            array(
                'key' => 'field_legue_faq_question_4',
                'label' => 'Question 4',
                'name' => 'legue_faq_question_4',
                'type' => 'text',
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_legue_type',
                            'operator' => '==',
                            'value' => 'faq',
                        ),
                    ),
                ),
            ),
            array(
                'key' => 'field_legue_faq_reponse_4',
                'label' => 'Réponse 4',
                'name' => 'legue_faq_reponse_4',
                'type' => 'textarea',
                'rows' => 3,
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_legue_type',
                            'operator' => '==',
                            'value' => 'faq',
                        ),
                    ),
                ),
            ),

            // === CHAMPS CTA ===
            array(
                'key' => 'field_legue_cta_titre',
                'label' => 'Titre',
                'name' => 'legue_cta_titre',
                'type' => 'text',
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_legue_type',
                            'operator' => '==',
                            'value' => 'cta',
                        ),
                    ),
                ),
            ),
            array(
                'key' => 'field_legue_cta_sous_titre',
                'label' => 'Sous-titre',
                'name' => 'legue_cta_sous_titre',
                'type' => 'text',
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_legue_type',
                            'operator' => '==',
                            'value' => 'cta',
                        ),
                    ),
                ),
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'page_legue',
                ),
            ),
        ),
        'menu_order' => 0,
    ));

}

// ============================================================================
// CPT: Histoires d'adoption
// ============================================================================
function register_cpt_histoire() {
    $labels = array(
        'name'               => 'Histoires',
        'singular_name'      => 'Histoire',
        'menu_name'          => 'Histoires',
        'add_new'            => 'Ajouter',
        'add_new_item'       => 'Ajouter une histoire',
        'edit_item'          => 'Modifier l\'histoire',
        'new_item'           => 'Nouvelle histoire',
        'view_item'          => 'Voir l\'histoire',
        'search_items'       => 'Rechercher une histoire',
        'not_found'          => 'Aucune histoire trouvée',
        'not_found_in_trash' => 'Aucune histoire dans la corbeille',
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array('slug' => 'histoire'),
        'capability_type'    => 'post',
        'has_archive'        => false,
        'hierarchical'       => false,
        'menu_position'      => 5,
        'menu_icon'          => 'dashicons-heart',
        'supports'           => array('title', 'editor', 'thumbnail', 'excerpt', 'comments'),
    );

    register_post_type('histoire', $args);
}
add_action('init', 'register_cpt_histoire');

// ============================================================================
// Taxonomie: Catégories d'histoires
// ============================================================================
function register_taxonomy_categorie_histoire() {
    $labels = array(
        'name'              => 'Catégories d\'histoires',
        'singular_name'     => 'Catégorie d\'histoire',
        'search_items'      => 'Rechercher une catégorie',
        'all_items'         => 'Toutes les catégories',
        'parent_item'       => 'Catégorie parente',
        'parent_item_colon' => 'Catégorie parente :',
        'edit_item'         => 'Modifier la catégorie',
        'update_item'       => 'Mettre à jour la catégorie',
        'add_new_item'      => 'Ajouter une catégorie',
        'new_item_name'     => 'Nom de la nouvelle catégorie',
        'menu_name'         => 'Catégories',
    );

    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array('slug' => 'categorie-histoire'),
    );

    register_taxonomy('categorie_histoire', array('histoire'), $args);
}
add_action('init', 'register_taxonomy_categorie_histoire');

// Ajouter les catégories par défaut lors de l'activation du thème
function add_default_histoire_categories() {
    $categories = array(
        'Chats craintifs',
        'Chats seniors',
        'Duos inséparables',
        'Transformations',
    );

    foreach ($categories as $cat) {
        if (!term_exists($cat, 'categorie_histoire')) {
            wp_insert_term($cat, 'categorie_histoire');
        }
    }
}
add_action('after_switch_theme', 'add_default_histoire_categories');
// Exécuter aussi maintenant pour les thèmes déjà actifs
add_action('init', 'add_default_histoire_categories', 20);

// ============================================================================
// ACF: Champs pour Histoires
// ============================================================================
add_action('acf/init', 'register_acf_histoire_fields');
function register_acf_histoire_fields() {
    if (!function_exists('acf_add_local_field_group')) {
        return;
    }

    acf_add_local_field_group(array(
        'key' => 'group_histoire',
        'title' => 'Informations de l\'histoire',
        'fields' => array(
            array(
                'key' => 'field_histoire_auteur',
                'label' => 'Nom de la famille / auteur',
                'name' => 'histoire_auteur',
                'type' => 'text',
                'instructions' => 'Ex: Famille Dubois, Marie-Claire L.',
                'required' => 1,
                'placeholder' => 'Famille Dupont',
            ),
            array(
                'key' => 'field_histoire_auteur_photo',
                'label' => 'Photo de l\'auteur',
                'name' => 'histoire_auteur_photo',
                'type' => 'image',
                'instructions' => 'Photo ronde affichée à côté du témoignage (optionnel). Format carré recommandé.',
                'required' => 0,
                'return_format' => 'url',
                'preview_size' => 'thumbnail',
                'library' => 'all',
            ),
            array(
                'key' => 'field_histoire_date_adoption',
                'label' => 'Date d\'adoption',
                'name' => 'histoire_date_adoption',
                'type' => 'date_picker',
                'instructions' => 'Date à laquelle le chat a été adopté',
                'required' => 0,
                'display_format' => 'd/m/Y',
                'return_format' => 'd/m/Y',
                'first_day' => 1,
            ),
            array(
                'key' => 'field_histoire_citation',
                'label' => 'Citation mise en avant',
                'name' => 'histoire_citation',
                'type' => 'textarea',
                'instructions' => 'Une citation marquante de l\'histoire (optionnel)',
                'required' => 0,
                'rows' => 3,
            ),
            array(
                'key' => 'field_histoire_galerie',
                'label' => 'Galerie photos',
                'name' => 'histoire_galerie',
                'type' => 'gallery',
                'instructions' => 'Photos supplémentaires pour illustrer l\'histoire (optionnel)',
                'required' => 0,
                'return_format' => 'array',
                'preview_size' => 'medium',
                'library' => 'all',
                'min' => 0,
                'max' => 10,
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'histoire',
                ),
            ),
        ),
        'menu_order' => 0,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'top',
    ));
}

// ============================================================================
// Configuration des commentaires pour les Histoires
// ============================================================================

// Personnaliser le formulaire de commentaires (retirer le champ site web)
function custom_comment_form_fields($fields) {
    // Supprimer le champ URL/site web
    if (isset($fields['url'])) {
        unset($fields['url']);
    }
    return $fields;
}
add_filter('comment_form_default_fields', 'custom_comment_form_fields');

// Personnaliser les textes du formulaire de commentaires
function custom_comment_form_defaults($defaults) {
    $defaults['title_reply'] = 'Laisser un commentaire';
    $defaults['title_reply_to'] = 'Répondre à %s';
    $defaults['cancel_reply_link'] = 'Annuler la réponse';
    $defaults['label_submit'] = 'Publier le commentaire';
    $defaults['comment_notes_before'] = '';
    $defaults['comment_notes_after'] = '';

    return $defaults;
}
add_filter('comment_form_defaults', 'custom_comment_form_defaults');

// Activer les commentaires imbriqués (réponses)
function enable_threaded_comments() {
    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'enable_threaded_comments');