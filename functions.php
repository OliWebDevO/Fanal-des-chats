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

// CPT: Page Accueil
function register_cpt_page_accueil() {
    $labels = array(
        'name'               => 'Page Accueil',
        'singular_name'      => 'Contenu Accueil',
        'menu_name'          => 'Page Accueil',
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

// CPT: Actualités (reste séparé car c'est du contenu indépendant)
function register_cpt_actualite() {
    $labels = array(
        'name'               => 'Actualités',
        'singular_name'      => 'Actualité',
        'menu_name'          => 'Actualités',
        'add_new'            => 'Ajouter',
        'add_new_item'       => 'Ajouter une actualité',
        'edit_item'          => 'Modifier l\'actualité',
        'new_item'           => 'Nouvelle actualité',
        'view_item'          => 'Voir l\'actualité',
        'search_items'       => 'Rechercher',
        'not_found'          => 'Aucune actualité trouvée',
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'menu_position'      => 6,
        'menu_icon'          => 'dashicons-megaphone',
        'supports'           => array('title', 'thumbnail', 'editor'),
        'has_archive'        => true,
        'rewrite'            => array('slug' => 'actualites'),
    );

    register_post_type('actualite', $args);
}
add_action('init', 'register_cpt_actualite');


/*--------------------------------------------------------------
# Groupes de champs ACF/SCF
--------------------------------------------------------------*/

if( function_exists('acf_add_local_field_group') ) {

    // ============================================================
    // GROUPE RÉUTILISABLE: Textes
    // Peut être lié à plusieurs CPTs
    // ============================================================
    acf_add_local_field_group(array(
        'key' => 'group_textes',
        'title' => 'Textes',
        'fields' => array(
            array(
                'key' => 'field_titre',
                'label' => 'Titre',
                'name' => 'titre',
                'type' => 'text',
            ),
            array(
                'key' => 'field_sous_titre',
                'label' => 'Sous-titre',
                'name' => 'sous_titre',
                'type' => 'text',
            ),
            array(
                'key' => 'field_paragraphe_1',
                'label' => 'Paragraphe 1',
                'name' => 'paragraphe_1',
                'type' => 'textarea',
                'rows' => 3,
            ),
            array(
                'key' => 'field_paragraphe_2',
                'label' => 'Paragraphe 2',
                'name' => 'paragraphe_2',
                'type' => 'textarea',
                'rows' => 3,
            ),
            array(
                'key' => 'field_paragraphe_3',
                'label' => 'Paragraphe 3',
                'name' => 'paragraphe_3',
                'type' => 'textarea',
                'rows' => 3,
            ),
            array(
                'key' => 'field_paragraphe_4',
                'label' => 'Paragraphe 4',
                'name' => 'paragraphe_4',
                'type' => 'textarea',
                'rows' => 3,
            ),
            array(
                'key' => 'field_paragraphe_5',
                'label' => 'Paragraphe 5',
                'name' => 'paragraphe_5',
                'type' => 'textarea',
                'rows' => 3,
            ),
        ),
        'location' => array(
            // Actualités
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'actualite',
                ),
            ),
        ),
        'menu_order' => 0,
    ));

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
                'rows' => 3,
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
                'rows' => 3,
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
                'rows' => 3,
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
    // GROUPE: Actualités - Champs spécifiques
    // ============================================================
    acf_add_local_field_group(array(
        'key' => 'group_actualite',
        'title' => 'Détails de l\'actualité',
        'fields' => array(
            array(
                'key' => 'field_actualite_categorie',
                'label' => 'Catégorie',
                'name' => 'actualite_categorie',
                'type' => 'text',
                'instructions' => 'Ex: News, Activité, Événement',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'actualite',
                ),
            ),
        ),
        'menu_order' => 1,
    ));

}