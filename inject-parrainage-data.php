<?php
/**
 * Script temporaire - Peupler les champs ACF parrainage
 * Exécuter une seule fois en visitant : /wp-content/themes/WP Fanal des chats/inject-parrainage-data.php
 * SUPPRIMER après exécution
 */
require_once dirname(__FILE__) . '/../../../wp-load.php';

if (!current_user_can('manage_options')) {
    die('Accès refusé. Connectez-vous en tant qu\'admin.');
}

// Supprimer les anciennes catégories d'histoires
$old_cats = array('Chats craintifs', 'Chats seniors', 'Duos inséparables', 'Transformations');
foreach ($old_cats as $old_cat) {
    $term = get_term_by('name', $old_cat, 'categorie_histoire');
    if ($term) {
        wp_delete_term($term->term_id, 'categorie_histoire');
        echo "<p>Catégorie supprimée : $old_cat</p>";
    }
}
echo '<hr>';

$impact_text = "Votre parrainage couvre les frais de nourriture, les soins vétérinaires et les traitements dont nos chats ont besoin. Quelle que soit la somme, votre geste contribue directement à leur bien-être au Fanal des Chats.";

// Descriptions longues par nom de chat
$descriptions_longues = array(
    'Bijou' => "Bijou est arrivée au refuge après avoir été retrouvée errante à Bruxelles. Malgré les épreuves, elle a gardé un caractère affectueux et paisible. Elle adore se blottir sur les genoux et ronronner pendant des heures.",
    'Lapin' => "Lapin doit son nom à ses grandes oreilles dressées qui lui donnent un air espiègle. Chat joueur et curieux, il adore explorer chaque recoin du refuge et se percher en hauteur pour observer le monde.",
    'Moustache' => "Moustache est un véritable gentleman, reconnaissable à ses magnifiques moustaches blanches. Arrivé au refuge suite à la perte de son propriétaire, c'est un chat posé qui apprécie les moments de tranquillité et les séances de brossage.",
    'Caramel' => "Caramel porte bien son nom avec son pelage roux doré. Recueilli après plusieurs mois en extérieur, il a appris à faire confiance aux humains. Une fois adopté, il devient le plus fidèle des compagnons.",
    'Luna' => "Luna est une chatte au pelage noir avec de grands yeux verts envoûtants. Trouvée seule sous une voiture un soir d'hiver, elle a grandi au refuge et développé une personnalité à la fois indépendante et câline.",
    'Tigrou' => "Tigrou est un chat tigré au caractère affirmé. Ancien chat de ferme, il a gardé un esprit aventurier et un instinct de chasseur. Au refuge, il est devenu le leader naturel du groupe.",
    'Noisette' => "Noisette est une petite chatte au pelage brun tacheté, aussi douce que la gourmandise dont elle porte le nom. Discrète mais attachante, elle surprend les bénévoles avec de petits miaulements tendres.",
    'Félix' => "Félix est le doyen du refuge, un chat noir et blanc au regard sage. Son calme et sa patience en font un pilier du Fanal des Chats. Il accueille chaque nouveau chat avec bienveillance.",
);

$chats = get_posts(array(
    'post_type' => 'chat_parrainage',
    'posts_per_page' => -1,
    'post_status' => 'any',
));

if (empty($chats)) {
    die('Aucun chat trouvé.');
}

// Description longue générique pour les chats non listés
$default_desc = "Ce chat fait partie des pensionnaires du Fanal des Chats. Recueilli par notre équipe, il bénéficie chaque jour de soins attentifs et de beaucoup d'amour de la part de nos bénévoles.";

echo '<h2>Mise à jour des champs parrainage</h2>';

foreach ($chats as $chat) {
    $name = $chat->post_title;
    $id = $chat->ID;

    // Description longue (force overwrite)
    $text = isset($descriptions_longues[$name]) ? $descriptions_longues[$name] : $default_desc;
    update_field('parrainage_description_longue', $text, $id);
    echo "<p>[$name] Description longue mise à jour</p>";

    // Impact du parrainage (force overwrite)
    update_field('parrainage_impact', $impact_text, $id);
    echo "<p>[$name] Impact mis à jour</p>";
}

// ============================================================
// INJECTION DES NEWS (articles)
// ============================================================
echo '<hr><h2>Mise à jour des articles News</h2>';

// S'assurer que les catégories existent
$cat_activite = term_exists('Événements', 'categorie_histoire');
if (!$cat_activite) {
    $cat_activite = wp_insert_term('Événements', 'categorie_histoire');
}
$cat_activite_id = is_array($cat_activite) ? $cat_activite['term_id'] : $cat_activite;

$cat_news = term_exists('Bien-être animal', 'categorie_histoire');
if (!$cat_news) {
    $cat_news = wp_insert_term('Bien-être animal', 'categorie_histoire');
}
$cat_news_id = is_array($cat_news) ? $cat_news['term_id'] : $cat_news;

$cat_conseils = term_exists('Conseils', 'categorie_histoire');
if (!$cat_conseils) {
    $cat_conseils = wp_insert_term('Conseils', 'categorie_histoire');
}
$cat_conseils_id = is_array($cat_conseils) ? $cat_conseils['term_id'] : $cat_conseils;

// Les 3 articles basés sur le contenu hardcodé de la page d'accueil
$articles = array(
    array(
        'title'    => 'Cours de taichi pour chat',
        'excerpt'  => 'Venez découvrir les bienfaits du taichi pour votre chat. Découvrez notre offre dès aujourd\'hui.',
        'content'  => '<p>Le Fanal des Chats est fier de vous présenter une nouvelle activité originale : des cours de taichi spécialement adaptés pour nos amis félins !</p>
<p>Le taichi pour chat, c\'est quoi ? Il s\'agit de séances de relaxation guidées où vous et votre chat pratiquez ensemble des mouvements doux et apaisants. Les bienfaits sont nombreux : réduction du stress, amélioration de la souplesse et renforcement du lien entre le chat et son humain.</p>
<p>Nos séances ont lieu chaque samedi matin au refuge. Que votre chat soit un adepte du canapé ou un aventurier des toits, il trouvera son équilibre grâce au taichi. Les places sont limitées, alors n\'hésitez pas à nous contacter pour réserver votre créneau.</p>
<p>Venez découvrir cette expérience unique et repartez avec un chat zen et détendu !</p>',
        'date'     => '2025-09-03 10:00:00',
        'category' => $cat_activite_id,
        'auteur'   => 'Le Fanal des Chats',
    ),
    array(
        'title'    => 'Ces jouets peuvent être mauvais pour votre animal',
        'excerpt'  => 'Des promenades énergisantes pour garder votre chien préféré actif, en bonne santé et heureux.',
        'content'  => '<p>Tous les jouets ne sont pas sans danger pour nos compagnons à quatre pattes. Certains accessoires vendus en animalerie peuvent présenter des risques pour la santé de votre chat ou de votre chien.</p>
<p>Les jouets contenant de petites pièces détachables sont particulièrement dangereux : votre animal pourrait les avaler et s\'étouffer. Les ficelles et rubans, bien que très appréciés des chats, peuvent causer des occlusions intestinales s\'ils sont ingérés.</p>
<p>Méfiez-vous également des jouets en plastique bon marché qui peuvent contenir des substances toxiques. Privilégiez les jouets certifiés, fabriqués avec des matériaux naturels et adaptés à la taille de votre animal.</p>
<p>Au Fanal des Chats, nous recommandons toujours de surveiller votre animal pendant qu\'il joue et de remplacer les jouets dès qu\'ils montrent des signes d\'usure.</p>',
        'date'     => '2025-09-03 09:00:00',
        'category' => $cat_news_id,
        'auteur'   => 'Le Fanal des Chats',
    ),
    array(
        'title'    => 'Un endroit sûr et confortable pour votre chat',
        'excerpt'  => 'Un endroit sûr et confortable pour que votre chat se repose et se sente chez lui.',
        'content'  => '<p>Chaque chat a besoin d\'un espace bien à lui pour se sentir en sécurité. Que vous viviez en appartement ou en maison, aménager un coin dédié à votre félin est essentiel pour son bien-être.</p>
<p>Choisissez un endroit calme, à l\'abri des courants d\'air et du passage. Un panier douillet, une couverture moelleuse ou un arbre à chat avec une cachette en hauteur feront le bonheur de votre compagnon.</p>
<p>Les chats aiment observer leur environnement depuis un point élevé. Un perchoir près d\'une fenêtre leur permettra de surveiller les oiseaux tout en se prélassant au soleil. Pensez aussi à placer sa litière loin de son coin repas et de son espace de repos.</p>
<p>Au Fanal des Chats, chaque pensionnaire dispose de son propre espace de confort. C\'est un élément clé pour leur épanouissement au quotidien.</p>',
        'date'     => '2025-09-03 08:00:00',
        'category' => $cat_conseils_id,
        'auteur'   => 'Le Fanal des Chats',
    ),
);

// Supprimer les anciens articles existants et créer les nouveaux
$existing = get_posts(array(
    'post_type' => 'histoire',
    'posts_per_page' => -1,
    'post_status' => 'any',
));

// Supprimer les anciens articles
foreach ($existing as $old_post) {
    wp_delete_post($old_post->ID, true);
    echo "<p>Article supprimé : " . $old_post->post_title . "</p>";
}

// Créer les nouveaux articles
foreach ($articles as $article) {
    $post_id = wp_insert_post(array(
        'post_type'    => 'histoire',
        'post_title'   => $article['title'],
        'post_content' => $article['content'],
        'post_excerpt' => $article['excerpt'],
        'post_status'  => 'publish',
        'post_date'    => $article['date'],
    ));

    if ($post_id && !is_wp_error($post_id)) {
        // Assigner la catégorie
        wp_set_object_terms($post_id, array(intval($article['category'])), 'categorie_histoire');
        // Définir l'auteur ACF
        update_field('histoire_auteur', $article['auteur'], $post_id);
        echo "<p>Article créé : " . $article['title'] . " (ID: $post_id)</p>";
    } else {
        echo "<p>Erreur pour : " . $article['title'] . "</p>";
    }
}

// ============================================================
// INJECTION DES TÉMOIGNAGES
// ============================================================
echo '<hr><h2>Création des témoignages</h2>';

$temoignages = array(
    array(
        'nom'   => 'Sophie Martin',
        'chat'  => 'Filou',
        'texte' => 'Adopter Filou au Fanal des Chats a été la meilleure décision de notre vie. Il a transformé notre quotidien avec sa joie de vivre et ses ronronnements. L\'équipe nous a parfaitement guidés dans le processus d\'adoption.',
    ),
    array(
        'nom'   => 'Jean-Pierre Leroy',
        'chat'  => 'Caline',
        'texte' => 'Caline était très craintive à son arrivée chez nous, mais grâce aux conseils de l\'équipe du Fanal des Chats, elle s\'est rapidement adaptée. Aujourd\'hui elle dort sur notre lit toutes les nuits et nous accueille à la porte chaque soir.',
    ),
    array(
        'nom'   => 'Isabelle Dupont',
        'chat'  => 'Oscar',
        'texte' => 'Oscar est un chat extraordinaire. Malgré son âge avancé, il déborde d\'énergie et d\'affection. Merci au Fanal des Chats de nous avoir permis de rencontrer ce compagnon exceptionnel. Adopter un chat senior, c\'est offrir une seconde chance.',
    ),
);

// Ne créer que si aucun témoignage n'existe
$existing_temoignages = get_posts(array(
    'post_type' => 'temoignage',
    'posts_per_page' => 1,
    'post_status' => 'any',
));

if (empty($existing_temoignages)) {
    foreach ($temoignages as $t) {
        $post_id = wp_insert_post(array(
            'post_type'    => 'temoignage',
            'post_title'   => 'Témoignage de ' . $t['nom'] . ' — ' . $t['chat'],
            'post_content' => $t['texte'],
            'post_status'  => 'publish',
        ));

        if ($post_id && !is_wp_error($post_id)) {
            update_field('temoignage_nom', $t['nom'], $post_id);
            update_field('temoignage_chat', $t['chat'], $post_id);
            echo "<p>Témoignage créé : " . $t['nom'] . " — " . $t['chat'] . "</p>";
        }
    }
} else {
    echo "<p>Des témoignages existent déjà, injection ignorée.</p>";
}

echo '<h3>Terminé ! Supprimez ce fichier.</h3>';
