<?php
/**
 * Temporary script to inject hardcoded form data into ACF fields.
 * Execute via browser: http://your-site.local/wp-content/themes/WP%20Fanal%20des%20chats/inject-form-data.php
 *
 * WARNING: Run once, then delete this file.
 */

// Load WordPress
require_once __DIR__ . '/../../../wp-load.php';

if ( php_sapi_name() === 'cli' ) {
    // CLI mode: set admin user
    wp_set_current_user( 1 );
} elseif ( ! current_user_can( 'manage_options' ) ) {
    wp_die( 'You must be logged in as an administrator to run this script.' );
}

if ( ! function_exists( 'update_field' ) ) {
    wp_die( 'ACF plugin must be active.' );
}

header( 'Content-Type: text/html; charset=utf-8' );
echo '<html><head><title>Inject Form Data</title><style>body{font-family:monospace;padding:20px;background:#1e1e1e;color:#0f0;}h2{color:#0ff;}h3{color:#ff0;}.warn{color:#f90;}.error{color:#f00;}.ok{color:#0f0;}</style></head><body>';
echo '<h1>Inject Form Data into ACF Fields</h1>';

$summary = [];

// ─────────────────────────────────────────────
// Helper: find post by meta
// ─────────────────────────────────────────────
function find_form_post( $prefix ) {
    $cpt_map = [
        'adoption' => 'page_adoption',
        'abandon'  => 'page_abandon',
        'benevole' => 'page_benevole',
        'emploi'   => 'page_emploi',
        'stage'    => 'page_stage',
        'famille'  => 'page_famille_accueil',
    ];
    $post_type = isset($cpt_map[$prefix]) ? $cpt_map[$prefix] : 'any';
    $query = new WP_Query([
        'post_type'      => $post_type,
        'posts_per_page' => 1,
        'meta_key'       => $prefix . '_type',
        'meta_value'     => 'formulaire',
        'post_status'    => 'any',
    ]);
    if ( $query->have_posts() ) {
        return $query->posts[0]->ID;
    }
    return false;
}

// ─────────────────────────────────────────────
// Helper: inject a full form
// ─────────────────────────────────────────────
function inject_form( $prefix, $data ) {
    global $summary;

    $post_id = find_form_post( $prefix );
    if ( ! $post_id ) {
        echo '<p class="error">&#10007; Post not found for prefix "' . esc_html( $prefix ) . '" (meta: ' . esc_html( $prefix ) . '_type = formulaire). Skipping.</p>';
        $summary[] = $prefix . ': SKIPPED (post not found)';
        return;
    }

    echo '<h2>Form: ' . esc_html( $prefix ) . ' (Post ID: ' . $post_id . ')</h2>';
    $count = 0;

    // Number of steps
    update_field( $prefix . '_form_nb_etapes', $data['nb_etapes'], $post_id );
    $count++;

    // Action name
    update_field( $prefix . '_form_action_name', $data['action_name'], $post_id );
    $count++;

    // Success
    update_field( $prefix . '_form_success_titre', $data['success_titre'], $post_id );
    $count++;
    update_field( $prefix . '_form_success_message', $data['success_message'], $post_id );
    $count++;

    // Steps
    foreach ( $data['etapes'] as $i => $etape ) {
        $n = $i + 1;
        update_field( $prefix . '_form_etape_' . $n . '_titre', $etape['titre'], $post_id );
        $count++;
        if ( isset( $etape['description'] ) ) {
            update_field( $prefix . '_form_etape_' . $n . '_description', $etape['description'], $post_id );
            $count++;
        }
        update_field( $prefix . '_form_etape_' . $n . '_sidebar_label', $etape['sidebar_label'], $post_id );
        $count++;
    }

    // Questions
    foreach ( $data['questions'] as $q ) {
        $n = $q['num'];
        $base = $prefix . '_form_q' . $n;

        // Etape (default 1)
        update_field( $base . '_etape', isset( $q['etape'] ) ? $q['etape'] : 1, $post_id );
        $count++;

        // Label
        update_field( $base . '_label', $q['label'], $post_id );
        $count++;

        // Type
        update_field( $base . '_type', $q['type'], $post_id );
        $count++;

        // Options
        if ( isset( $q['options'] ) ) {
            update_field( $base . '_options', $q['options'], $post_id );
            $count++;
        }

        // Disposition
        if ( isset( $q['disposition'] ) ) {
            update_field( $base . '_disposition', $q['disposition'], $post_id );
            $count++;
        }

        // Placeholder
        if ( isset( $q['placeholder'] ) ) {
            update_field( $base . '_placeholder', $q['placeholder'], $post_id );
            $count++;
        }

        // Largeur
        if ( isset( $q['largeur'] ) ) {
            update_field( $base . '_largeur', $q['largeur'], $post_id );
            $count++;
        }

        // Required
        update_field( $base . '_required', isset( $q['required'] ) && $q['required'] ? 'true' : 'false', $post_id );
        $count++;

        // Correct answers
        if ( isset( $q['correct'] ) ) {
            update_field( $base . '_correct', $q['correct'], $post_id );
            $count++;
        }

        // Section titre
        if ( isset( $q['section_titre'] ) ) {
            update_field( $base . '_section_titre', $q['section_titre'], $post_id );
            $count++;
        }

        // Section icone
        if ( isset( $q['section_icone'] ) ) {
            update_field( $base . '_section_icone', $q['section_icone'], $post_id );
            $count++;
        }
    }

    // Consents
    if ( isset( $data['consents'] ) ) {
        foreach ( $data['consents'] as $i => $consent ) {
            $n = $i + 1;
            update_field( $prefix . '_form_consent_' . $n . '_label', $consent['label'], $post_id );
            $count++;
            update_field( $prefix . '_form_consent_' . $n . '_required', $consent['required'] ? 'true' : 'false', $post_id );
            $count++;
        }
    }

    echo '<p class="ok">&#10003; Injected ' . $count . ' fields.</p>';
    $summary[] = $prefix . ': ' . $count . ' fields injected (Post ID ' . $post_id . ')';
}


// ═══════════════════════════════════════════════════════════
// FORM 1: ADOPTION
// ═══════════════════════════════════════════════════════════
inject_form( 'adoption', [
    'nb_etapes'    => 7,
    'action_name'  => 'submit_adoption_form',
    'success_titre'   => 'Demande envoyée !',
    'success_message' => "Nous avons bien reçu votre demande d'adoption.\nNotre équipe examinera votre dossier et vous contactera dans les plus brefs délais pour convenir d'une rencontre.",
    'etapes' => [
        [ 'titre' => 'Identité & Disponibilité', 'sidebar_label' => 'Identité', 'description' => 'Ce formulaire est obligatoire avant toute rencontre. Il nous permet de garantir des adoptions responsables, durables et sécurisées pour les chats.' ],
        [ 'titre' => 'Expérience avec les chats', 'sidebar_label' => 'Expérience', 'description' => "L'expérience de l'enfance ne remplace pas une expérience adulte mais vous pouvez en parler si vous le souhaitez." ],
        [ 'titre' => 'Alimentation, Soins & Conditions de vie', 'sidebar_label' => 'Conditions', 'description' => "Parlez-nous de l'alimentation prévue et de votre logement." ],
        [ 'titre' => 'Sécurité & Prévention', 'sidebar_label' => 'Sécurité', 'description' => 'La sécurité de nos chats est primordiale. Aidez-nous à comprendre les mesures que vous prendrez.' ],
        [ 'titre' => 'Engagement à long terme', 'sidebar_label' => 'Engagement', 'description' => "Un chat peut vivre jusqu'à 30 ans (moyenne d'âge 14/18 ans). Comment imaginez-vous sa place dans votre vie ?" ],
        [ 'titre' => 'Motivations', 'sidebar_label' => 'Motivations', 'description' => 'Parlez-nous de vos motivations et du chat que vous recherchez.' ],
        [ 'titre' => 'Budget & Qualité de vie', 'sidebar_label' => 'Budget', 'description' => 'Dernière étape ! Parlons budget et bien-être du chat.' ],
    ],
    'questions' => [
        // ── Step 1: Identité ──
        [ 'num' => 1, 'etape' => 1, 'label' => 'Nom & Prénom', 'type' => 'text', 'largeur' => 6, 'required' => true, 'placeholder' => 'Votre nom et prénom', 'section_titre' => 'Informations personnelles', 'section_icone' => 'fas fa-user' ],
        [ 'num' => 2, 'etape' => 1, 'label' => 'Age', 'type' => 'number', 'largeur' => 6, 'required' => true, 'placeholder' => 'Votre age' ],
        [ 'num' => 3, 'etape' => 1, 'label' => 'Adresse', 'type' => 'text', 'largeur' => 8, 'required' => true, 'placeholder' => 'Rue et numero' ],
        [ 'num' => 4, 'etape' => 1, 'label' => 'Code postal', 'type' => 'text', 'largeur' => 4, 'required' => true, 'placeholder' => '1000' ],
        [ 'num' => 5, 'etape' => 1, 'label' => 'Commune', 'type' => 'text', 'largeur' => 6, 'required' => true, 'placeholder' => 'Votre commune' ],
        [ 'num' => 6, 'etape' => 1, 'label' => 'Téléphone', 'type' => 'tel', 'largeur' => 6, 'required' => true, 'placeholder' => '0470 00 00 00' ],
        [ 'num' => 7, 'etape' => 1, 'label' => 'Email', 'type' => 'email', 'largeur' => 6, 'required' => true, 'placeholder' => 'votre@email.com' ],
        [ 'num' => 8, 'etape' => 1, 'label' => 'Comment pouvons-nous vous contacter ?', 'type' => 'checkbox', 'largeur' => 6, 'disposition' => 'inline', 'options' => "appel|Appel\nsms|SMS\nwhatsapp|WhatsApp\nemail|E-mail" ],
        [ 'num' => 9, 'etape' => 1, 'label' => 'Profession / Activité principale', 'type' => 'checkbox', 'disposition' => 'stacked', 'section_titre' => 'Profession / Activité principale', 'section_icone' => 'fas fa-briefcase', 'options' => "temps_plein|Temps plein\ntemps_partiel|Temps partiel\nteletravail|Télé-travail\netudiant|Étudiant\nsans_emploi|Sans emploi\nretraite|Retraité\nautre|Autre" ],
        [ 'num' => 10, 'etape' => 1, 'label' => 'Que faites-vous et où êtes-vous les week-ends ou lors de vos jours de repos ?', 'type' => 'textarea', 'section_titre' => 'Disponibilité', 'section_icone' => 'fas fa-clock', 'placeholder' => 'Décrivez vos activités habituelles...' ],
        [ 'num' => 11, 'etape' => 1, 'label' => "Combien d'heures le chat sera-t-il seul par jour en moyenne ?", 'type' => 'radio', 'disposition' => 'inline', 'options' => "0-2h|0-2h\n2-5h|2-5h\n5-10h|5-10h\n10-12h|10-12h\n+12h|+12h", 'correct' => "0-2h\n2-5h" ],
        [ 'num' => 12, 'etape' => 1, 'label' => "Qui s'occupe du/des chat(s) en cas d'absence longue (week-end / vacances) ?", 'type' => 'checkbox', 'disposition' => 'stacked', 'options' => "famille_amis|Il va dans la famille ou chez des amis\npet_sitter|Un pet-sitter passe le voir\npension|Pension\nautre|Autre\npersonne|Personne, un chat est autonome\nne_sait_pas|Je ne sais pas encore" ],
        [ 'num' => 13, 'etape' => 1, 'label' => "Nombre d'adultes au domicile", 'type' => 'number', 'largeur' => 4, 'section_titre' => 'Composition du foyer', 'section_icone' => 'fas fa-users' ],
        [ 'num' => 14, 'etape' => 1, 'label' => "Nombre d'enfants", 'type' => 'number', 'largeur' => 4 ],
        [ 'num' => 15, 'etape' => 1, 'label' => 'Age des enfants', 'type' => 'text', 'largeur' => 4, 'placeholder' => 'Ex: 5 ans, 8 ans' ],
        [ 'num' => 16, 'etape' => 1, 'label' => "Nombre d'animaux et quels animaux ?", 'type' => 'text', 'placeholder' => 'Ex: 1 chien, 2 chats...' ],
        [ 'num' => 17, 'etape' => 1, 'label' => "Tous les membres du foyer sont-ils d'accord pour l'adoption ?", 'type' => 'radio', 'disposition' => 'inline', 'options' => "oui|Oui\nnon|Non\npas_encore|Pas encore", 'correct' => 'oui' ],

        // ── Step 2: Expérience ──
        [ 'num' => 18, 'etape' => 2, 'label' => "Avez-vous déjà vécu avec un chat en tant qu'adulte ?", 'type' => 'radio', 'disposition' => 'inline', 'options' => "oui|Oui\nnon|Non" ],
        [ 'num' => 19, 'etape' => 2, 'label' => 'Si OUI, quels types de chats avez-vous eus ?', 'type' => 'checkbox', 'disposition' => 'stacked', 'options' => "peureux|Un chat peureux\nagressif|Un chat agressif\ntimide|Un chat timide\nchaton|Un chaton\navenant|Un chat avenant\npot_de_colle|Un chat pot-de-colle\nobservateur|Un chat observateur\nproblemes_proprete|Problèmes de propreté\nmaladie_chronique|Maladie chronique\ntraitement_quotidien|Traitement quotidien\nfin_de_vie|Fin de vie / euthanasie\nautre|Autre" ],
        [ 'num' => 20, 'etape' => 2, 'label' => 'Combien de chats avez-vous eu ?', 'type' => 'number', 'largeur' => 4 ],
        [ 'num' => 21, 'etape' => 2, 'label' => "Âge à l'adoption ?", 'type' => 'text', 'largeur' => 4, 'placeholder' => 'Ex: 2 mois, 3 ans...' ],
        [ 'num' => 22, 'etape' => 2, 'label' => 'Combien de temps avec vous ?', 'type' => 'text', 'largeur' => 4, 'placeholder' => 'Ex: 5 ans, 12 ans...' ],
        [ 'num' => 23, 'etape' => 2, 'label' => 'Âge du décès', 'type' => 'text', 'largeur' => 6, 'placeholder' => 'Ex: 15 ans', 'section_titre' => 'Si un ou plusieurs chats sont décédés', 'section_icone' => 'fas fa-heart-broken' ],
        [ 'num' => 24, 'etape' => 2, 'label' => 'Cause du décès', 'type' => 'select', 'largeur' => 6, 'options' => "cause_naturelle|Cause naturelle\nmaladie_infectieuse|Maladie infectieuse\nmaladie_chronique|Maladie chronique\ncancer|Cancer / tumeur\nmici|MICI / troubles digestifs graves\nhyperthyroidie|Hyperthyroïdie décompensée\ninsuffisance_renale|Insuffisance rénale\nprobleme_cardiaque|Problème cardiaque\ndiabete|Diabète sucré\nneurologique|Problèmes neurologiques / épilepsie\nparalysie|Paralysie / myélopathie\npif|PIF (péritonite infectieuse féline)\nfiv|FIV (sida du chat)\nfelv|FeLV (leucose féline)\nvieillesse|Vieillesse\naccident|Accident\neuthanasie|Euthanasie" ],
        [ 'num' => 25, 'etape' => 2, 'label' => 'Si euthanasie, pour quelle raison ?', 'type' => 'text', 'placeholder' => 'Expliquez si applicable...' ],

        // ── Step 3: Conditions de vie ──
        [ 'num' => 26, 'etape' => 3, 'label' => 'Que mange (ou mangera) votre chat ?', 'type' => 'checkbox', 'disposition' => 'inline', 'section_titre' => 'Alimentation & Soins', 'section_icone' => 'fas fa-utensils', 'options' => "croquettes|Croquettes\npatee|Pâtée\nmelange|Mélange des deux\nne_sait_pas|Je ne sais pas\nautre|Autre" ],
        [ 'num' => 27, 'etape' => 3, 'label' => 'Quelles marques sont envisagées et pourquoi ce choix ?', 'type' => 'textarea', 'placeholder' => 'Marques et raisons de votre choix...' ],
        [ 'num' => 28, 'etape' => 3, 'label' => 'À quelle fréquence comptez-vous consulter un vétérinaire ?', 'type' => 'radio', 'disposition' => 'stacked', 'options' => "annuel|Une fois par an minimum\nprobleme|Uniquement en cas de problème\nne_sait_pas|Je ne sais pas encore\njamais|Jamais", 'correct' => 'annuel' ],
        [ 'num' => 29, 'etape' => 3, 'label' => 'Type de logement', 'type' => 'radio', 'disposition' => 'inline', 'section_titre' => 'Conditions de vie du chat', 'section_icone' => 'fas fa-home', 'options' => "appartement|Appartement\nmaison|Maison\nautre|Autre" ],
        [ 'num' => 30, 'etape' => 3, 'label' => 'Superficie (en m²)', 'type' => 'number', 'largeur' => 4, 'placeholder' => 'Ex: 60' ],
        [ 'num' => 31, 'etape' => 3, 'label' => 'Étage', 'type' => 'text', 'largeur' => 4, 'placeholder' => 'Ex: 3ème' ],
        [ 'num' => 32, 'etape' => 3, 'label' => 'Balcon/terrasse ?', 'type' => 'radio', 'largeur' => 4, 'disposition' => 'inline', 'options' => "oui|Oui\nnon|Non" ],
        [ 'num' => 33, 'etape' => 3, 'label' => 'Si balcon/terrasse, est-il sécurisé ?', 'type' => 'radio', 'disposition' => 'inline', 'options' => "oui|Oui\nnon|Non" ],
        [ 'num' => 34, 'etape' => 3, 'label' => 'Nombre de facades', 'type' => 'radio', 'disposition' => 'inline', 'options' => "2|2\n3|3\n4|4" ],
        [ 'num' => 35, 'etape' => 3, 'label' => "Type d'extérieur", 'type' => 'checkbox', 'disposition' => 'inline', 'options' => "jardin_clos|Jardin clos\njardin_non_clos|Jardin non clos\ncour|Cour\npas_exterieur|Pas d'extérieur" ],
        [ 'num' => 36, 'etape' => 3, 'label' => 'Le chat pourra-t-il sortir ?', 'type' => 'radio', 'disposition' => 'inline', 'options' => "oui|Oui\nnon|Non" ],
        [ 'num' => 37, 'etape' => 3, 'label' => 'Si oui, expliquez comment et pourquoi', 'type' => 'textarea', 'placeholder' => 'Expliquez...' ],
        [ 'num' => 38, 'etape' => 3, 'label' => 'Le logement est proche de :', 'type' => 'checkbox', 'disposition' => 'stacked', 'options' => "rue_passante|Rue passante\nroute_chaussee|Route/chaussée/avenue\nautoroute|Auto-route\ngare|Gare\nchamps|Champs\nforet|Forêt\nautre|Autre" ],

        // ── Step 4: Sécurité ──
        [ 'num' => 39, 'etape' => 4, 'label' => 'Comment comptez-vous éviter les accidents ?', 'type' => 'textarea', 'placeholder' => 'Décrivez vos mesures...' ],
        [ 'num' => 40, 'etape' => 4, 'label' => 'Mesures concrètes prévues', 'type' => 'checkbox', 'disposition' => 'stacked', 'options' => "filets|Filets / sécurisation balcon/fenêtres\nharnais|Harnais + sorties encadrées\nenclos|Enclos / catio\njardin_cloture|Jardin clôturé + système anti-fugue\npas_sorties|Pas de sorties avant adaptation (minimum 12 semaines)\nidentification|Identification + médaille + téléphone\ngps|Suivi GPS\nautre|Autre" ],
        [ 'num' => 41, 'etape' => 4, 'label' => 'Votre logement comporte-t-il des fenêtres oscillo-battantes ?', 'type' => 'radio', 'disposition' => 'inline', 'section_titre' => 'Fenêtres oscillo-battantes', 'section_icone' => 'fas fa-window-maximize', 'options' => "oui|Oui\nnon|Non\nne_sait_pas|Je ne sais pas" ],
        [ 'num' => 42, 'etape' => 4, 'label' => 'Connaissez-vous ce risque ?', 'type' => 'radio', 'disposition' => 'inline', 'options' => "oui|Oui, je connais\nentendu_parler|J'en ai entendu parler\nnon|Non, je ne savais pas" ],
        [ 'num' => 43, 'etape' => 4, 'label' => "Quelles mesures concrètes allez-vous mettre en place AVANT l'arrivée du chat ?", 'type' => 'checkbox', 'disposition' => 'stacked', 'options' => "protection|Protection spéciale oscillo-battant (grille / filet adapté)\nblocage|Blocage de l'ouverture en position basculante\nouverture_totale|Ouverture uniquement en position totalement fermée ou totalement ouverte + sécurisée\nmoustiquaires|Pose de moustiquaires renforcées adaptées aux chats\ninterdiction_acces|Interdiction d'accès aux pièces concernées\naeration_presence|Modification des habitudes d'aération (ouvrir uniquement en votre présence)\nne_sait_pas|Je ne sais pas encore" ],
        [ 'num' => 44, 'etape' => 4, 'label' => '"je ne sais pas encore", expliquez pourquoi et sous quel délai vous comptez agir', 'type' => 'textarea', 'placeholder' => 'Réponse obligatoire si applicable...' ],
        [ 'num' => 45, 'etape' => 4, 'label' => "Qui s'engage à vérifier régulièrement que les protections sont en place et fonctionnelles ?", 'type' => 'radio', 'disposition' => 'inline', 'options' => "moi|Moi\nautre_adulte|Autre adulte du foyer\npersonne|Personne", 'correct' => "moi\nautre_adulte" ],
        [ 'num' => 46, 'etape' => 4, 'label' => 'Que ferez-vous ?', 'type' => 'checkbox', 'disposition' => 'stacked', 'section_titre' => 'Si votre chat disparaît', 'section_icone' => 'fas fa-search', 'options' => "chercher_immediatement|Chercher immédiatement de jour et de nuit\naffiches|Affiches dans le quartier\ncontacter_veto_refuges|Contacter vétérinaires / refuges / communes\nreseaux_sociaux|Réseaux sociaux et groupes locaux\ncatid|Contacter service d'identification (CatID)\ndeclaration_officielle|Déclarer officiellement perdu\nnourriture_odeurs|Mettre nourriture/odeurs au point de fugue\npieges|Pièges cage si nécessaire\nne_sait_pas|Je ne sais pas" ],
        [ 'num' => 47, 'etape' => 4, 'label' => 'Combien de temps chercheriez-vous activement ?', 'type' => 'radio', 'disposition' => 'inline', 'options' => "24-48h|24-48h\n1_semaine|1 semaine\n1_mois|1 mois\ntoujours|Aussi longtemps qu'il est perdu", 'correct' => 'toujours' ],
        [ 'num' => 48, 'etape' => 4, 'label' => 'Si le chat urine hors de sa litière :', 'type' => 'checkbox', 'disposition' => 'stacked', 'section_titre' => 'Comportement - Que feriez-vous si votre chat...', 'section_icone' => 'fas fa-cat', 'options' => "veto|Je consulte d'abord un vétérinaire\nchange_litiere|Je change de litière / l'emplacement / ajout d'une litière\npunis|Je punis\naide_naturel|Je lui donne de l'aide naturelle (Zylkène, fleurs de Bach, Feliway...)\nne_sait_pas|Je ne sais pas", 'correct' => "veto\nchange_litiere\naide_naturel" ],
        [ 'num' => 49, 'etape' => 4, 'label' => "S'il griffe les meubles :", 'type' => 'checkbox', 'disposition' => 'stacked', 'options' => "griffoirs|J'installe arbres à chat/griffoirs + redirection\ncoupe_griffes|Je coupe les griffes en prenant soin de ne pas aller dans la pulpe\npunis|Je punis\ndegriffage|J'arrache ses griffes\nne_sait_pas|Je ne sais pas", 'correct' => "griffoirs\ncoupe_griffes" ],
        [ 'num' => 50, 'etape' => 4, 'label' => "S'il est craintif / se cache :", 'type' => 'checkbox', 'disposition' => 'stacked', 'options' => "temps_cachettes|Je lui laisse du temps + cachettes + routine\nforce_contact|Je force le contact\nparle_doucement|Je lui parle doucement et prends de ses nouvelles\nne_sait_pas|Je ne sais pas", 'correct' => "temps_cachettes\nparle_doucement" ],
        [ 'num' => 51, 'etape' => 4, 'label' => 'En cas de problème, seriez-vous prêt à travailler avec :', 'type' => 'checkbox', 'disposition' => 'stacked', 'options' => "comportementaliste|Un comportementaliste / association\nveto_specialise|Un vétérinaire spécialisé\nconseils_suivis|Des conseils suivis pendant plusieurs semaines/mois\nnon|Non" ],

        // ── Step 5: Engagement ──
        [ 'num' => 52, 'etape' => 5, 'label' => 'Comment imaginez-vous la place du chat dans votre vie sur le long terme ?', 'type' => 'textarea', 'placeholder' => 'Décrivez votre vision...' ],
        [ 'num' => 53, 'etape' => 5, 'label' => 'En cas de déménagement, séparation, naissance, difficulté financière : que feriez-vous avec votre chat ?', 'type' => 'textarea', 'placeholder' => 'Expliquez...' ],
        [ 'num' => 54, 'etape' => 5, 'label' => "Dans quelles situations envisageriez-vous de vous séparer d'un chat ?", 'type' => 'checkbox', 'disposition' => 'stacked', 'options' => "jamais|Jamais, quoi qu'il arrive\nallergie|Allergie\ndemenagement|Déménagement\nseparation_couple|Séparation\nproblemes_financiers|Problèmes financiers\ncomportement|Problèmes de comportement\nbebe_enfants|Bébé / enfants\nautre|Autre", 'correct' => 'jamais' ],
        [ 'num' => 55, 'etape' => 5, 'label' => 'Si difficulté, êtes-vous prêt à :', 'type' => 'checkbox', 'disposition' => 'stacked', 'options' => "demander_aide|Demander de l'aide et chercher des solutions\ntemps_energie|Mettre du temps et de l'énergie pendant plusieurs semaines/mois\nconcessions|Faire des concessions dans l'organisation du foyer\nnon|Non" ],
        [ 'num' => 56, 'etape' => 5, 'label' => 'Connaissez-vous la toxoplasmose ?', 'type' => 'radio', 'disposition' => 'stacked', 'section_titre' => 'Toxoplasmose & Grossesse', 'section_icone' => 'fas fa-baby', 'options' => "oui|Oui, je connais les précautions\nentendu_parler|J'en ai entendu parler mais je ne sais pas exactement\nnon|Non" ],
        [ 'num' => 57, 'etape' => 5, 'label' => 'Si grossesse ou bébé au foyer, êtes-vous prêt à mettre en place les mesures suivantes ?', 'type' => 'checkbox', 'disposition' => 'stacked', 'options' => "hygiene_litiere|Hygiène litière (gants, lavage mains)\nautre_personne_litiere|Faire nettoyer la litière par une autre personne si possible\ncadre_stable|Maintenir le chat dans un cadre stable\nzones_refuges|Donner au chat des zones refuges hors bébé\nhabituation|Travail progressif d'habituation (temps/patience)\ndemander_aide|Demander de l'aide si le chat change de comportement\nnon|Non / je ne veux pas \"prendre le risque\"" ],
        [ 'num' => 58, 'etape' => 5, 'label' => 'Scénario : Bébé arrive, le chat est stressé, se cache, grogne, semble avoir peur. Que faites-vous concrètement ?', 'type' => 'textarea', 'placeholder' => 'Décrivez votre réaction...' ],

        // ── Step 6: Motivations ──
        [ 'num' => 59, 'etape' => 6, 'label' => 'Pourquoi souhaitez-vous adopter spécifiquement au Fanal des Chats ?', 'type' => 'checkbox', 'disposition' => 'stacked', 'options' => "proximite|Proximité\nrecommandation|Recommandation\nconnait_refuge|Vous connaissez le refuge\nchat_precis|Vous avez vu un chat précis\npas_ailleurs|Vous n'avez pas pu adopter ailleurs\nvaleurs|Vous partagez nos valeurs\nautre|Autre" ],
        [ 'num' => 60, 'etape' => 6, 'label' => "Avez-vous déjà visité d'autres refuges ?", 'type' => 'radio', 'disposition' => 'inline', 'options' => "non|Non\noui|Oui" ],
    ],
    'consents' => [
        [ 'label' => "J'accepte qu'une visite de pré-adoption soit effectuée à mon domicile.", 'required' => true ],
        [ 'label' => "J'accepte de donner des nouvelles régulières après l'adoption.", 'required' => true ],
        [ 'label' => "J'accepte que mes données soient utilisées dans le cadre de ma demande d'adoption.", 'required' => true ],
        [ 'label' => 'Je certifie que toutes les informations fournies sont vraies et complètes.', 'required' => true ],
    ],
]);


// ═══════════════════════════════════════════════════════════
// FORM 2: BENEVOLE
// ═══════════════════════════════════════════════════════════
inject_form( 'benevole', [
    'nb_etapes'    => 5,
    'action_name'  => 'submit_benevole_form',
    'success_titre'   => 'Merci pour votre candidature !',
    'success_message' => "Nous avons bien recu votre demande pour devenir benevole au Fanal des Chats.\nNotre equipe examinera votre candidature et vous recontactera dans les plus brefs delais.",
    'etapes' => [
        [ 'titre' => 'Vos informations personnelles', 'sidebar_label' => 'Informations', 'description' => 'Nous avons besoin de quelques informations pour mieux vous connaitre.' ],
        [ 'titre' => 'Vos disponibilites', 'sidebar_label' => 'Disponibilites', 'description' => 'Indiquez-nous quand vous seriez disponible pour nous aider.' ],
        [ 'titre' => 'Votre experience', 'sidebar_label' => 'Experience', 'description' => 'Parlez-nous de votre experience avec les animaux et le benevolat.' ],
        [ 'titre' => 'Competences et preferences', 'sidebar_label' => 'Competences', 'description' => 'Quelles missions vous interessent le plus ?' ],
        [ 'titre' => 'Votre motivation', 'sidebar_label' => 'Motivation', 'description' => 'Dites-nous pourquoi vous souhaitez rejoindre notre equipe !' ],
    ],
    'questions' => [
        // ── Step 1: Informations ──
        [ 'num' => 1, 'etape' => 1, 'label' => 'Prenom', 'type' => 'text', 'largeur' => 6, 'required' => true, 'placeholder' => 'Votre prenom' ],
        [ 'num' => 2, 'etape' => 1, 'label' => 'Nom', 'type' => 'text', 'largeur' => 6, 'required' => true, 'placeholder' => 'Votre nom' ],
        [ 'num' => 3, 'etape' => 1, 'label' => 'Email', 'type' => 'email', 'largeur' => 6, 'required' => true, 'placeholder' => 'votre@email.com' ],
        [ 'num' => 4, 'etape' => 1, 'label' => 'Telephone', 'type' => 'tel', 'largeur' => 6, 'required' => true, 'placeholder' => '0470 00 00 00' ],
        [ 'num' => 5, 'etape' => 1, 'label' => 'Adresse', 'type' => 'text', 'largeur' => 8, 'placeholder' => 'Rue et numero' ],
        [ 'num' => 6, 'etape' => 1, 'label' => 'Code postal', 'type' => 'text', 'largeur' => 4, 'placeholder' => '1000' ],
        [ 'num' => 7, 'etape' => 1, 'label' => 'Ville', 'type' => 'text', 'largeur' => 6, 'placeholder' => 'Votre ville' ],
        [ 'num' => 8, 'etape' => 1, 'label' => 'Date de naissance', 'type' => 'date', 'largeur' => 6 ],

        // ── Step 2: Disponibilites ──
        [ 'num' => 9, 'etape' => 2, 'label' => 'Jours disponibles', 'type' => 'checkbox', 'disposition' => 'stacked', 'section_titre' => 'Jours disponibles', 'section_icone' => 'fas fa-calendar-alt', 'options' => "lundi|Lundi\nmardi|Mardi\nmercredi|Mercredi\njeudi|Jeudi\nvendredi|Vendredi\nsamedi|Samedi\ndimanche|Dimanche" ],
        [ 'num' => 10, 'etape' => 2, 'label' => 'Creneaux horaires preferes', 'type' => 'checkbox', 'disposition' => 'stacked', 'section_titre' => 'Creneaux horaires preferes', 'section_icone' => 'fas fa-clock', 'options' => "matin|Matin (8h-12h)\napres-midi|Apres-midi (12h-18h)\nsoir|Soir (18h-21h)" ],
        [ 'num' => 11, 'etape' => 2, 'label' => 'Temps disponible par semaine', 'type' => 'select', 'section_titre' => 'Temps disponible par semaine', 'section_icone' => 'fas fa-hourglass-half', 'options' => "1-2h|1 a 2 heures\n3-5h|3 a 5 heures\n6-10h|6 a 10 heures\n10h+|Plus de 10 heures" ],
        [ 'num' => 12, 'etape' => 2, 'label' => 'Engagement souhaite', 'type' => 'select', 'section_titre' => 'Engagement souhaite', 'section_icone' => 'fas fa-calendar-check', 'options' => "ponctuel|Ponctuel (evenements)\n1-3mois|1 a 3 mois\n6mois|6 mois\n1an|1 an ou plus\nindéfini|Sans limite de temps" ],

        // ── Step 3: Experience ──
        [ 'num' => 13, 'etape' => 3, 'label' => 'Experience avec les chats', 'type' => 'radio', 'disposition' => 'stacked', 'section_titre' => 'Experience avec les chats', 'section_icone' => 'fas fa-cat', 'options' => "aucune|Aucune experience\nproprietaire|J'ai/ai eu des chats\nprofessionnelle|Experience professionnelle\nrefuge|Benevole dans un refuge" ],
        [ 'num' => 14, 'etape' => 3, 'label' => "Avez-vous de l'experience avec d'autres animaux ?", 'type' => 'textarea', 'section_titre' => 'Autres animaux', 'section_icone' => 'fas fa-paw', 'placeholder' => "Decrivez votre experience avec d'autres animaux (chiens, NAC, etc.)" ],
        [ 'num' => 15, 'etape' => 3, 'label' => 'Experience en benevolat', 'type' => 'radio', 'disposition' => 'stacked', 'section_titre' => 'Experience benevolat', 'section_icone' => 'fas fa-hands-helping', 'options' => "aucune|Premiere experience\nquelques|Quelques experiences\nregulier|Benevole regulier" ],
        [ 'num' => 16, 'etape' => 3, 'label' => 'Details de vos experiences de benevolat', 'type' => 'textarea', 'placeholder' => 'Decrivez vos experiences de benevolat precedentes (facultatif)' ],

        // ── Step 4: Competences ──
        [ 'num' => 17, 'etape' => 4, 'label' => 'Missions souhaitees', 'type' => 'checkbox', 'disposition' => 'stacked', 'section_titre' => 'Missions souhaitees', 'section_icone' => 'fas fa-tasks', 'options' => "soins|Soins aux chats\nnettoyage|Entretien\nsocialisation|Socialisation\ntransport|Transport\naccueil|Famille d'accueil\nevenements|Evenements\ncommunication|Communication\nadministratif|Administratif" ],
        [ 'num' => 18, 'etape' => 4, 'label' => 'Competences particulieres', 'type' => 'textarea', 'section_titre' => 'Competences particulieres', 'section_icone' => 'fas fa-star', 'placeholder' => 'Avez-vous des competences particulieres ? (photographie, veterinaire, graphisme, informatique, etc.)' ],
        [ 'num' => 19, 'etape' => 4, 'label' => 'Permis de conduire', 'type' => 'radio', 'disposition' => 'inline', 'section_titre' => 'Mobilite', 'section_icone' => 'fas fa-car', 'options' => "oui|J'ai le permis de conduire\nnon|Je n'ai pas le permis" ],
        [ 'num' => 20, 'etape' => 4, 'label' => 'Vehicule', 'type' => 'radio', 'disposition' => 'inline', 'options' => "oui|J'ai un vehicule\nnon|Je n'ai pas de vehicule" ],

        // ── Step 5: Motivation ──
        [ 'num' => 21, 'etape' => 5, 'label' => 'Pourquoi souhaitez-vous devenir benevole ?', 'type' => 'textarea', 'required' => true, 'section_titre' => 'Motivation', 'section_icone' => 'fas fa-lightbulb', 'placeholder' => 'Partagez vos motivations...' ],
        [ 'num' => 22, 'etape' => 5, 'label' => 'Comment avez-vous connu Le Fanal des Chats ?', 'type' => 'select', 'section_titre' => 'Comment nous avez-vous connu', 'section_icone' => 'fas fa-question-circle', 'options' => "reseaux_sociaux|Reseaux sociaux (Facebook, Instagram)\nbouche_a_oreille|Bouche a oreille\nrecherche_internet|Recherche internet\nevenement|Evenement / Salon\nadoption|Via une adoption\nautre|Autre" ],
        [ 'num' => 23, 'etape' => 5, 'label' => "Qu'attendez-vous de cette experience ?", 'type' => 'textarea', 'section_titre' => 'Attentes', 'section_icone' => 'fas fa-heart', 'placeholder' => "Qu'esperez-vous retirer de cette experience de benevolat ?" ],
        [ 'num' => 24, 'etape' => 5, 'label' => 'Informations complementaires', 'type' => 'textarea', 'section_titre' => 'Informations complementaires', 'section_icone' => 'fas fa-comment-alt', 'placeholder' => "Y a-t-il autre chose que vous aimeriez nous dire ?" ],
    ],
    'consents' => [
        [ 'label' => "J'accepte que mes donnees soient utilisees dans le cadre de ma candidature benevole au Fanal des Chats.", 'required' => true ],
        [ 'label' => 'Je souhaite recevoir la newsletter du refuge.', 'required' => false ],
    ],
]);


// ═══════════════════════════════════════════════════════════
// FORM 3: ABANDON
// ═══════════════════════════════════════════════════════════
inject_form( 'abandon', [
    'nb_etapes'    => 5,
    'action_name'  => 'submit_abandon_form',
    'success_titre'   => 'Votre demande a bien ete envoyee',
    'success_message' => "Nous avons bien recu votre demande de prise en charge. Notre equipe examinera votre dossier et vous recontactera dans les meilleurs delais.\nNous ferons tout notre possible pour offrir a votre chat les meilleurs soins et lui trouver un foyer aimant.",
    'etapes' => [
        [ 'titre' => 'Vos informations', 'sidebar_label' => 'Identite', 'description' => 'Ce formulaire nous permet de mieux comprendre votre situation et de preparer l\'accueil de votre chat dans les meilleures conditions.' ],
        [ 'titre' => 'Votre chat', 'sidebar_label' => 'Votre chat', 'description' => 'Parlez-nous de votre compagnon pour que nous puissions preparer au mieux son accueil.' ],
        [ 'titre' => 'Comportement', 'sidebar_label' => 'Comportement', 'description' => 'Ces informations sont essentielles pour trouver la meilleure famille pour votre chat.' ],
        [ 'titre' => 'Votre situation', 'sidebar_label' => 'Situation', 'description' => 'Comprendre votre situation nous aide a mieux vous accompagner.' ],
        [ 'titre' => 'Confirmation', 'sidebar_label' => 'Confirmation', 'description' => "Merci de confirmer les informations suivantes avant d'envoyer votre demande." ],
    ],
    'questions' => [
        // ── Step 1: Identite ──
        [ 'num' => 1, 'etape' => 1, 'label' => 'Nom & Prenom', 'type' => 'text', 'largeur' => 6, 'required' => true, 'placeholder' => 'Votre nom et prenom' ],
        [ 'num' => 2, 'etape' => 1, 'label' => 'Age', 'type' => 'number', 'largeur' => 6, 'required' => true, 'placeholder' => 'Votre age' ],
        [ 'num' => 3, 'etape' => 1, 'label' => 'Adresse', 'type' => 'text', 'largeur' => 8, 'required' => true, 'placeholder' => 'Rue et numero' ],
        [ 'num' => 4, 'etape' => 1, 'label' => 'Code postal', 'type' => 'text', 'largeur' => 4, 'required' => true, 'placeholder' => '1000' ],
        [ 'num' => 5, 'etape' => 1, 'label' => 'Commune', 'type' => 'text', 'largeur' => 6, 'required' => true, 'placeholder' => 'Votre commune' ],
        [ 'num' => 6, 'etape' => 1, 'label' => 'Telephone', 'type' => 'tel', 'largeur' => 6, 'required' => true, 'placeholder' => '0470 00 00 00' ],
        [ 'num' => 7, 'etape' => 1, 'label' => 'Email', 'type' => 'email', 'largeur' => 6, 'required' => true, 'placeholder' => 'votre@email.com' ],
        [ 'num' => 8, 'etape' => 1, 'label' => 'Comment pouvons-nous vous contacter ?', 'type' => 'checkbox', 'largeur' => 6, 'disposition' => 'inline', 'options' => "appel|Appel\nsms|SMS\nwhatsapp|WhatsApp\nemail|E-mail" ],

        // ── Step 2: Votre chat ──
        [ 'num' => 9, 'etape' => 2, 'label' => 'Nom du chat', 'type' => 'text', 'largeur' => 6, 'required' => true, 'placeholder' => 'Nom de votre chat' ],
        [ 'num' => 10, 'etape' => 2, 'label' => 'Age du chat', 'type' => 'text', 'largeur' => 6, 'placeholder' => 'Ex: 3 ans, 6 mois' ],
        [ 'num' => 11, 'etape' => 2, 'label' => 'Sexe', 'type' => 'radio', 'disposition' => 'inline', 'options' => "male|Male\nfemelle|Femelle\nne_sait_pas|Je ne sais pas" ],
        [ 'num' => 12, 'etape' => 2, 'label' => 'Race', 'type' => 'text', 'largeur' => 6, 'placeholder' => 'Ex: Europeen, Siamois, Persan...' ],
        [ 'num' => 13, 'etape' => 2, 'label' => 'Couleur / Robe', 'type' => 'text', 'largeur' => 6, 'placeholder' => 'Couleur ou type de robe' ],
        [ 'num' => 14, 'etape' => 2, 'label' => 'Le chat est-il sterilise ?', 'type' => 'radio', 'disposition' => 'inline', 'options' => "oui|Oui\nnon|Non\nne_sait_pas|Je ne sais pas" ],
        [ 'num' => 15, 'etape' => 2, 'label' => 'Le chat est-il identifie (puce electronique) ?', 'type' => 'radio', 'disposition' => 'inline', 'options' => "oui|Oui\nnon|Non\nne_sait_pas|Je ne sais pas" ],
        [ 'num' => 16, 'etape' => 2, 'label' => 'Le chat est-il vaccine ?', 'type' => 'radio', 'disposition' => 'inline', 'options' => "oui|Oui\nnon|Non\nne_sait_pas|Je ne sais pas" ],
        [ 'num' => 17, 'etape' => 2, 'label' => 'Problemes de sante connus ?', 'type' => 'textarea', 'placeholder' => 'Decrivez les problemes de sante connus, traitements en cours, allergies...' ],
        [ 'num' => 18, 'etape' => 2, 'label' => 'Alimentation actuelle', 'type' => 'text', 'placeholder' => 'Marque de croquettes, nourriture humide, etc.' ],

        // ── Step 3: Comportement ──
        [ 'num' => 19, 'etape' => 3, 'label' => 'Le chat est-il sociable avec les humains ?', 'type' => 'radio', 'disposition' => 'inline', 'options' => "tres_sociable|Tres sociable\nsociable|Sociable\ncraintif|Craintif\nagressif|Agressif" ],
        [ 'num' => 20, 'etape' => 3, 'label' => "Le chat s'entend-il avec d'autres chats ?", 'type' => 'radio', 'disposition' => 'inline', 'options' => "oui|Oui\nnon|Non\njamais_teste|Jamais teste\nca_depend|Ca depend" ],
        [ 'num' => 21, 'etape' => 3, 'label' => "Le chat s'entend-il avec les chiens ?", 'type' => 'radio', 'disposition' => 'inline', 'options' => "oui|Oui\nnon|Non\njamais_teste|Jamais teste" ],
        [ 'num' => 22, 'etape' => 3, 'label' => 'Le chat est-il habitue aux enfants ?', 'type' => 'radio', 'disposition' => 'inline', 'options' => "oui|Oui\nnon|Non\njamais_teste|Jamais teste" ],
        [ 'num' => 23, 'etape' => 3, 'label' => "Le chat va-t-il a l'exterieur ?", 'type' => 'radio', 'disposition' => 'inline', 'options' => "interieur|Chat d'interieur uniquement\nacces_exterieur|Acces a l'exterieur\nchat_libre|Chat libre" ],
        [ 'num' => 24, 'etape' => 3, 'label' => 'Le chat utilise-t-il la litiere correctement ?', 'type' => 'radio', 'disposition' => 'inline', 'options' => "oui_toujours|Oui toujours\nparfois_accidents|Parfois des accidents\nnon|Non" ],
        [ 'num' => 25, 'etape' => 3, 'label' => 'Habitudes particulieres', 'type' => 'textarea', 'placeholder' => 'Decrivez les habitudes, preferences ou particularites de votre chat' ],

        // ── Step 4: Situation ──
        [ 'num' => 26, 'etape' => 4, 'label' => "Raison principale de l'abandon", 'type' => 'select', 'required' => true, 'options' => "demenagement|Demenagement\nallergie|Allergie\ncomportement|Probleme de comportement\nfinancieres|Raisons financieres\nseparation|Separation/divorce\ndeces|Deces du proprietaire\nnaissance|Naissance d'un enfant\ntrop_animaux|Trop d'animaux\nsante_proprietaire|Probleme de sante du proprietaire\nautre|Autre" ],
        [ 'num' => 27, 'etape' => 4, 'label' => 'Si Autre, precisez', 'type' => 'text', 'placeholder' => 'Precisez la raison...' ],
        [ 'num' => 28, 'etape' => 4, 'label' => 'Depuis combien de temps avez-vous ce chat ?', 'type' => 'text', 'placeholder' => 'Ex: 3 ans' ],
        [ 'num' => 29, 'etape' => 4, 'label' => 'Avez-vous deja consulte un veterinaire pour ce probleme ?', 'type' => 'radio', 'disposition' => 'inline', 'options' => "oui|Oui\nnon|Non\npas_applicable|Pas applicable" ],
        [ 'num' => 30, 'etape' => 4, 'label' => 'Avez-vous contacte un comportementaliste ?', 'type' => 'radio', 'disposition' => 'inline', 'options' => "oui|Oui\nnon|Non\npas_applicable|Pas applicable" ],
        [ 'num' => 31, 'etape' => 4, 'label' => 'Avez-vous cherche des solutions dans votre entourage ?', 'type' => 'radio', 'disposition' => 'inline', 'options' => "oui_personne|Oui personne ne peut\nnon_pas_encore|Non pas encore\nen_cours|En cours" ],
        [ 'num' => 32, 'etape' => 4, 'label' => 'Delai souhaite pour la prise en charge', 'type' => 'select', 'options' => "le_plus_vite|Le plus vite possible\ndans_la_semaine|Dans la semaine\ndans_le_mois|Dans le mois\npas_urgence|Pas d'urgence" ],
        [ 'num' => 33, 'etape' => 4, 'label' => 'Informations complementaires sur votre situation', 'type' => 'textarea', 'placeholder' => 'Tout ce que vous jugez utile de nous communiquer...' ],

        // ── Step 5: Confirmation ──
        [ 'num' => 34, 'etape' => 5, 'label' => 'Documents disponibles', 'type' => 'checkbox', 'disposition' => 'stacked', 'options' => "passeport_carnet|Passeport/carnet de sante\npreuve_identification|Preuve d'identification (puce)\ncarnet_vaccination|Carnet de vaccination\naucun|Aucun document" ],
        [ 'num' => 35, 'etape' => 5, 'label' => "Une participation aux frais d'accueil est demandee. Etes-vous informe(e) ?", 'type' => 'radio', 'disposition' => 'inline', 'options' => "oui|Oui\nnon|Non" ],
        [ 'num' => 36, 'etape' => 5, 'label' => 'Derniers mots pour votre chat', 'type' => 'textarea', 'placeholder' => 'Souhaitez-vous laisser un message pour la future famille de votre chat ?' ],
    ],
    'consents' => [
        [ 'label' => "J'accepte que mes donnees soient utilisees dans le cadre de cette demande de prise en charge par Le Fanal des Chats.", 'required' => true ],
        [ 'label' => 'Je comprends que cette demarche est definitive et que je cede la propriete de mon chat au refuge.', 'required' => false ],
    ],
]);


// ═══════════════════════════════════════════════════════════
// FORM 4: EMPLOI
// ═══════════════════════════════════════════════════════════
inject_form( 'emploi', [
    'nb_etapes'    => 5,
    'action_name'  => 'submit_emploi_form',
    'success_titre'   => 'Merci pour votre candidature !',
    'success_message' => "Nous avons bien recu votre demande d'emploi au Fanal des Chats.\nNotre equipe examinera votre candidature et vous recontactera dans les plus brefs delais.",
    'etapes' => [
        [ 'titre' => 'Vos informations personnelles', 'sidebar_label' => 'Informations', 'description' => 'Nous avons besoin de quelques informations pour mieux vous connaitre.' ],
        [ 'titre' => 'Vos disponibilites', 'sidebar_label' => 'Disponibilites', 'description' => 'Indiquez-nous vos preferences en termes de contrat et de disponibilite.' ],
        [ 'titre' => 'Votre experience professionnelle', 'sidebar_label' => 'Experience', 'description' => 'Parlez-nous de votre parcours et de votre experience avec les animaux.' ],
        [ 'titre' => 'Competences et poste souhaite', 'sidebar_label' => 'Competences', 'description' => 'Quel poste vous interesse et quelles sont vos competences ?' ],
        [ 'titre' => 'Votre motivation', 'sidebar_label' => 'Motivation', 'description' => 'Dites-nous pourquoi vous souhaitez travailler au Fanal des Chats !' ],
    ],
    'questions' => [
        // ── Step 1: Informations ──
        [ 'num' => 1, 'etape' => 1, 'label' => 'Prenom', 'type' => 'text', 'largeur' => 6, 'required' => true, 'placeholder' => 'Votre prenom' ],
        [ 'num' => 2, 'etape' => 1, 'label' => 'Nom', 'type' => 'text', 'largeur' => 6, 'required' => true, 'placeholder' => 'Votre nom' ],
        [ 'num' => 3, 'etape' => 1, 'label' => 'Email', 'type' => 'email', 'largeur' => 6, 'required' => true, 'placeholder' => 'votre@email.com' ],
        [ 'num' => 4, 'etape' => 1, 'label' => 'Telephone', 'type' => 'tel', 'largeur' => 6, 'required' => true, 'placeholder' => '0470 00 00 00' ],
        [ 'num' => 5, 'etape' => 1, 'label' => 'Adresse', 'type' => 'text', 'largeur' => 8, 'placeholder' => 'Rue et numero' ],
        [ 'num' => 6, 'etape' => 1, 'label' => 'Code postal', 'type' => 'text', 'largeur' => 4, 'placeholder' => '1000' ],
        [ 'num' => 7, 'etape' => 1, 'label' => 'Ville', 'type' => 'text', 'largeur' => 6, 'placeholder' => 'Votre ville' ],
        [ 'num' => 8, 'etape' => 1, 'label' => 'Date de naissance', 'type' => 'date', 'largeur' => 6 ],

        // ── Step 2: Disponibilites ──
        [ 'num' => 9, 'etape' => 2, 'label' => 'Type de contrat souhaite', 'type' => 'select', 'section_titre' => 'Type de contrat souhaite', 'section_icone' => 'fas fa-file-contract', 'options' => "temps_plein|Temps plein\ntemps_partiel|Temps partiel\ncdd|CDD\ncdi|CDI\ninterim|Interim" ],
        [ 'num' => 10, 'etape' => 2, 'label' => 'Date de disponibilite', 'type' => 'date', 'section_titre' => 'Date de disponibilite', 'section_icone' => 'fas fa-calendar-check' ],
        [ 'num' => 11, 'etape' => 2, 'label' => 'Jours disponibles', 'type' => 'checkbox', 'disposition' => 'stacked', 'section_titre' => 'Jours disponibles', 'section_icone' => 'fas fa-calendar-alt', 'options' => "lundi|Lundi\nmardi|Mardi\nmercredi|Mercredi\njeudi|Jeudi\nvendredi|Vendredi\nsamedi|Samedi\ndimanche|Dimanche" ],
        [ 'num' => 12, 'etape' => 2, 'label' => 'Creneaux horaires preferes', 'type' => 'checkbox', 'disposition' => 'stacked', 'section_titre' => 'Creneaux horaires preferes', 'section_icone' => 'fas fa-clock', 'options' => "matin|Matin (8h-12h)\napres-midi|Apres-midi (12h-18h)\nsoir|Soir (18h-21h)" ],

        // ── Step 3: Experience ──
        [ 'num' => 13, 'etape' => 3, 'label' => 'Dernier diplome obtenu', 'type' => 'text', 'section_titre' => 'Dernier diplome obtenu', 'section_icone' => 'fas fa-graduation-cap', 'placeholder' => 'Ex: Bac+3 en soins animaliers, Certificat veterinaire...' ],
        [ 'num' => 14, 'etape' => 3, 'label' => 'Experience avec les animaux', 'type' => 'radio', 'disposition' => 'stacked', 'section_titre' => 'Experience avec les animaux', 'section_icone' => 'fas fa-cat', 'options' => "aucune|Aucune experience\nproprietaire|Proprietaire d'animaux\nprofessionnelle|Experience professionnelle\nrefuge|Experience en refuge" ],
        [ 'num' => 15, 'etape' => 3, 'label' => 'Experience professionnelle generale', 'type' => 'textarea', 'section_titre' => 'Experience professionnelle generale', 'section_icone' => 'fas fa-briefcase', 'placeholder' => 'Decrivez votre parcours professionnel, vos postes precedents...' ],
        [ 'num' => 16, 'etape' => 3, 'label' => 'Experience en refuge ou association', 'type' => 'textarea', 'section_titre' => 'Experience en refuge ou association', 'section_icone' => 'fas fa-hands-helping', 'placeholder' => 'Avez-vous deja travaille ou ete benevole dans un refuge ou une association animale ?' ],

        // ── Step 4: Competences ──
        [ 'num' => 17, 'etape' => 4, 'label' => 'Poste souhaite', 'type' => 'checkbox', 'disposition' => 'stacked', 'section_titre' => 'Poste souhaite', 'section_icone' => 'fas fa-tasks', 'options' => "soigneur_animalier|Soigneur animalier\nassistant_veterinaire|Assistant veterinaire\nresponsable_adoptions|Responsable adoptions\ncharge_communication|Charge de communication\nagent_entretien|Agent d'entretien\ncoordinateur_logistique|Coordinateur logistique\nautre|Autre" ],
        [ 'num' => 18, 'etape' => 4, 'label' => 'Competences particulieres', 'type' => 'textarea', 'section_titre' => 'Competences particulieres', 'section_icone' => 'fas fa-star', 'placeholder' => 'Avez-vous des competences particulieres ?' ],
        [ 'num' => 19, 'etape' => 4, 'label' => 'Permis de conduire', 'type' => 'radio', 'disposition' => 'inline', 'section_titre' => 'Mobilite', 'section_icone' => 'fas fa-car', 'options' => "oui|J'ai le permis de conduire\nnon|Je n'ai pas le permis" ],
        [ 'num' => 20, 'etape' => 4, 'label' => 'Vehicule', 'type' => 'radio', 'disposition' => 'inline', 'options' => "oui|J'ai un vehicule\nnon|Je n'ai pas de vehicule" ],

        // ── Step 5: Motivation ──
        [ 'num' => 21, 'etape' => 5, 'label' => 'Pourquoi souhaitez-vous travailler au Fanal des Chats ?', 'type' => 'textarea', 'required' => true, 'section_titre' => 'Motivation', 'section_icone' => 'fas fa-lightbulb', 'placeholder' => 'Partagez vos motivations...' ],
        [ 'num' => 22, 'etape' => 5, 'label' => 'Comment avez-vous connu Le Fanal des Chats ?', 'type' => 'select', 'section_titre' => 'Comment nous avez-vous connu', 'section_icone' => 'fas fa-question-circle', 'options' => "reseaux_sociaux|Reseaux sociaux (Facebook, Instagram)\nbouche_a_oreille|Bouche a oreille\nrecherche_internet|Recherche internet\nevenement|Evenement / Salon\nadoption|Via une adoption\nautre|Autre" ],
        [ 'num' => 23, 'etape' => 5, 'label' => "Qu'attendez-vous de ce poste ?", 'type' => 'textarea', 'section_titre' => 'Attentes', 'section_icone' => 'fas fa-heart', 'placeholder' => "Qu'esperez-vous retirer de ce poste ?" ],
        [ 'num' => 24, 'etape' => 5, 'label' => 'Informations complementaires', 'type' => 'textarea', 'section_titre' => 'Informations complementaires', 'section_icone' => 'fas fa-comment-alt', 'placeholder' => "Y a-t-il autre chose que vous aimeriez nous dire ?" ],
    ],
    'consents' => [
        [ 'label' => "J'accepte que mes donnees soient utilisees dans le cadre de ma candidature au Fanal des Chats.", 'required' => true ],
        [ 'label' => 'Je souhaite recevoir la newsletter du refuge.', 'required' => false ],
    ],
]);


// ═══════════════════════════════════════════════════════════
// FORM 5: STAGE
// ═══════════════════════════════════════════════════════════
inject_form( 'stage', [
    'nb_etapes'    => 5,
    'action_name'  => 'submit_stage_form',
    'success_titre'   => 'Merci pour votre candidature !',
    'success_message' => "Nous avons bien recu votre demande de stage au Fanal des Chats.\nNotre equipe examinera votre candidature et vous recontactera dans les plus brefs delais.",
    'etapes' => [
        [ 'titre' => 'Vos informations personnelles', 'sidebar_label' => 'Informations', 'description' => 'Nous avons besoin de quelques informations pour mieux vous connaitre.' ],
        [ 'titre' => 'Votre formation', 'sidebar_label' => 'Formation', 'description' => 'Indiquez-nous vos preferences en termes de stage et de disponibilite.' ],
        [ 'titre' => 'Votre stage', 'sidebar_label' => 'Stage', 'description' => 'Parlez-nous de votre parcours et de votre experience avec les animaux.' ],
        [ 'titre' => 'Competences et poste souhaite', 'sidebar_label' => 'Competences', 'description' => 'Quel poste vous interesse et quelles sont vos competences ?' ],
        [ 'titre' => 'Votre motivation', 'sidebar_label' => 'Motivation', 'description' => 'Dites-nous pourquoi vous souhaitez effectuer un stage au Fanal des Chats !' ],
    ],
    'questions' => [
        // ── Step 1: Informations ──
        [ 'num' => 1, 'etape' => 1, 'label' => 'Prenom', 'type' => 'text', 'largeur' => 6, 'required' => true, 'placeholder' => 'Votre prenom' ],
        [ 'num' => 2, 'etape' => 1, 'label' => 'Nom', 'type' => 'text', 'largeur' => 6, 'required' => true, 'placeholder' => 'Votre nom' ],
        [ 'num' => 3, 'etape' => 1, 'label' => 'Email', 'type' => 'email', 'largeur' => 6, 'required' => true, 'placeholder' => 'votre@email.com' ],
        [ 'num' => 4, 'etape' => 1, 'label' => 'Telephone', 'type' => 'tel', 'largeur' => 6, 'required' => true, 'placeholder' => '0470 00 00 00' ],
        [ 'num' => 5, 'etape' => 1, 'label' => 'Adresse', 'type' => 'text', 'largeur' => 8, 'placeholder' => 'Rue et numero' ],
        [ 'num' => 6, 'etape' => 1, 'label' => 'Code postal', 'type' => 'text', 'largeur' => 4, 'placeholder' => '1000' ],
        [ 'num' => 7, 'etape' => 1, 'label' => 'Ville', 'type' => 'text', 'largeur' => 6, 'placeholder' => 'Votre ville' ],
        [ 'num' => 8, 'etape' => 1, 'label' => 'Date de naissance', 'type' => 'date', 'largeur' => 6 ],

        // ── Step 2: Formation ──
        [ 'num' => 9, 'etape' => 2, 'label' => 'Type de stage souhaite', 'type' => 'select', 'section_titre' => 'Type de stage souhaite', 'section_icone' => 'fas fa-file-contract', 'options' => "observation|Stage d'observation\nimmersion|Stage d'immersion\nconventionne|Stage conventionne\nformation|Stage de formation" ],
        [ 'num' => 10, 'etape' => 2, 'label' => 'Date de debut souhaitee', 'type' => 'date', 'section_titre' => 'Date de debut souhaitee', 'section_icone' => 'fas fa-calendar-check' ],
        [ 'num' => 11, 'etape' => 2, 'label' => 'Jours disponibles', 'type' => 'checkbox', 'disposition' => 'stacked', 'section_titre' => 'Jours disponibles', 'section_icone' => 'fas fa-calendar-alt', 'options' => "lundi|Lundi\nmardi|Mardi\nmercredi|Mercredi\njeudi|Jeudi\nvendredi|Vendredi\nsamedi|Samedi\ndimanche|Dimanche" ],
        [ 'num' => 12, 'etape' => 2, 'label' => 'Duree du stage souhaitee', 'type' => 'select', 'section_titre' => 'Duree du stage', 'section_icone' => 'fas fa-clock', 'options' => "1_semaine|1 semaine\n2_semaines|2 semaines\n1_mois|1 mois\n2_mois|2 mois\n3_mois|3 mois ou plus" ],

        // ── Step 3: Stage ──
        [ 'num' => 13, 'etape' => 3, 'label' => 'Formation actuelle ou dernier diplome', 'type' => 'text', 'section_titre' => 'Formation actuelle', 'section_icone' => 'fas fa-graduation-cap', 'placeholder' => 'Ex: BTS Soins animaliers, Licence Biologie...' ],
        [ 'num' => 14, 'etape' => 3, 'label' => 'Experience avec les animaux', 'type' => 'radio', 'disposition' => 'stacked', 'section_titre' => 'Experience avec les animaux', 'section_icone' => 'fas fa-cat', 'options' => "aucune|Aucune experience\nproprietaire|Proprietaire d'animaux\nprofessionnelle|Experience professionnelle\nrefuge|Experience en refuge" ],
        [ 'num' => 15, 'etape' => 3, 'label' => 'Experience de stage ou benevolat', 'type' => 'textarea', 'section_titre' => 'Experience de stage ou benevolat', 'section_icone' => 'fas fa-briefcase', 'placeholder' => 'Decrivez vos experiences de stages ou benevolat precedents...' ],
        [ 'num' => 16, 'etape' => 3, 'label' => 'Experience en refuge ou association', 'type' => 'textarea', 'section_titre' => 'Experience en refuge ou association', 'section_icone' => 'fas fa-hands-helping', 'placeholder' => 'Avez-vous deja effectue un stage ou ete benevole dans un refuge ou une association animale ?' ],

        // ── Step 4: Competences ──
        [ 'num' => 17, 'etape' => 4, 'label' => 'Domaine de stage souhaite', 'type' => 'checkbox', 'disposition' => 'stacked', 'section_titre' => 'Domaine de stage souhaite', 'section_icone' => 'fas fa-tasks', 'options' => "soins|Soins aux chats\nnettoyage|Entretien\nsocialisation|Socialisation\ntransport|Transport\naccueil|Famille d'accueil\nevenements|Evenements\ncommunication|Communication\nadministratif|Administratif" ],
        [ 'num' => 18, 'etape' => 4, 'label' => 'Competences particulieres', 'type' => 'textarea', 'section_titre' => 'Competences particulieres', 'section_icone' => 'fas fa-star', 'placeholder' => 'Avez-vous des competences particulieres ?' ],
        [ 'num' => 19, 'etape' => 4, 'label' => 'Permis de conduire', 'type' => 'radio', 'disposition' => 'inline', 'section_titre' => 'Mobilite', 'section_icone' => 'fas fa-car', 'options' => "oui|J'ai le permis de conduire\nnon|Je n'ai pas le permis" ],
        [ 'num' => 20, 'etape' => 4, 'label' => 'Vehicule', 'type' => 'radio', 'disposition' => 'inline', 'options' => "oui|J'ai un vehicule\nnon|Je n'ai pas de vehicule" ],

        // ── Step 5: Motivation ──
        [ 'num' => 21, 'etape' => 5, 'label' => 'Pourquoi souhaitez-vous effectuer un stage au Fanal des Chats ?', 'type' => 'textarea', 'required' => true, 'section_titre' => 'Motivation', 'section_icone' => 'fas fa-lightbulb', 'placeholder' => 'Partagez vos motivations...' ],
        [ 'num' => 22, 'etape' => 5, 'label' => 'Comment avez-vous connu Le Fanal des Chats ?', 'type' => 'select', 'section_titre' => 'Comment nous avez-vous connu', 'section_icone' => 'fas fa-question-circle', 'options' => "reseaux_sociaux|Reseaux sociaux (Facebook, Instagram)\nbouche_a_oreille|Bouche a oreille\nrecherche_internet|Recherche internet\nevenement|Evenement / Salon\nadoption|Via une adoption\nautre|Autre" ],
        [ 'num' => 23, 'etape' => 5, 'label' => "Qu'attendez-vous de ce stage ?", 'type' => 'textarea', 'section_titre' => 'Attentes', 'section_icone' => 'fas fa-heart', 'placeholder' => "Qu'esperez-vous retirer de cette experience de stage ?" ],
        [ 'num' => 24, 'etape' => 5, 'label' => 'Informations complementaires', 'type' => 'textarea', 'section_titre' => 'Informations complementaires', 'section_icone' => 'fas fa-comment-alt', 'placeholder' => "Y a-t-il autre chose que vous aimeriez nous dire ?" ],
    ],
    'consents' => [
        [ 'label' => "J'accepte que mes donnees soient utilisees dans le cadre de ma candidature de stage au Fanal des Chats.", 'required' => true ],
        [ 'label' => 'Je souhaite recevoir la newsletter du refuge.', 'required' => false ],
    ],
]);


// ═══════════════════════════════════════════════════════════
// FORM 6: FAMILLE D'ACCUEIL
// ═══════════════════════════════════════════════════════════
inject_form( 'famille', [
    'nb_etapes'    => 5,
    'action_name'  => 'submit_famille_accueil_form',
    'success_titre'   => 'Merci pour votre candidature !',
    'success_message' => "Nous avons bien recu votre demande pour devenir famille d'accueil au Fanal des Chats.\nNotre equipe examinera votre candidature et vous recontactera dans les plus brefs delais.",
    'etapes' => [
        [ 'titre' => 'Vos informations', 'sidebar_label' => 'Information', 'description' => 'Nous avons besoin de quelques informations pour mieux vous connaitre.' ],
        [ 'titre' => 'Votre logement', 'sidebar_label' => 'Logement', 'description' => 'Parlez-nous de votre logement et de votre environnement.' ],
        [ 'titre' => 'Vos disponibilités', 'sidebar_label' => 'Disponibilités', 'description' => 'Indiquez-nous quand vous seriez disponible pour accueillir un chat.' ],
        [ 'titre' => 'Votre expérience', 'sidebar_label' => 'Expérience', 'description' => 'Parlez-nous de votre experience avec les animaux.' ],
        [ 'titre' => 'Votre motivation', 'sidebar_label' => 'Motivation', 'description' => 'Dites-nous pourquoi vous souhaitez devenir famille d\'accueil !' ],
    ],
    'questions' => [
        // ── Step 1: Informations ──
        [ 'num' => 1, 'etape' => 1, 'label' => 'Prenom', 'type' => 'text', 'largeur' => 6, 'required' => true, 'placeholder' => 'Votre prenom' ],
        [ 'num' => 2, 'etape' => 1, 'label' => 'Nom', 'type' => 'text', 'largeur' => 6, 'required' => true, 'placeholder' => 'Votre nom' ],
        [ 'num' => 3, 'etape' => 1, 'label' => 'Email', 'type' => 'email', 'largeur' => 6, 'required' => true, 'placeholder' => 'votre@email.com' ],
        [ 'num' => 4, 'etape' => 1, 'label' => 'Telephone', 'type' => 'tel', 'largeur' => 6, 'required' => true, 'placeholder' => '0470 00 00 00' ],
        [ 'num' => 5, 'etape' => 1, 'label' => 'Adresse', 'type' => 'text', 'largeur' => 8, 'placeholder' => 'Rue et numero' ],
        [ 'num' => 6, 'etape' => 1, 'label' => 'Code postal', 'type' => 'text', 'largeur' => 4, 'placeholder' => '1000' ],
        [ 'num' => 7, 'etape' => 1, 'label' => 'Ville', 'type' => 'text', 'largeur' => 6, 'placeholder' => 'Votre ville' ],
        [ 'num' => 8, 'etape' => 1, 'label' => 'Date de naissance', 'type' => 'date', 'largeur' => 6 ],

        // ── Step 2: Logement ──
        [ 'num' => 9, 'etape' => 2, 'label' => 'Type de logement', 'type' => 'radio', 'disposition' => 'inline', 'section_titre' => 'Type de logement', 'section_icone' => 'fas fa-home', 'options' => "appartement|Appartement\nmaison|Maison\nautre|Autre" ],
        [ 'num' => 10, 'etape' => 2, 'label' => 'Superficie (en m²)', 'type' => 'number', 'largeur' => 6, 'placeholder' => 'Ex: 60' ],
        [ 'num' => 11, 'etape' => 2, 'label' => 'Avez-vous un balcon ou une terrasse ?', 'type' => 'radio', 'disposition' => 'inline', 'options' => "oui|Oui\nnon|Non" ],
        [ 'num' => 12, 'etape' => 2, 'label' => 'Si oui, est-il securise ?', 'type' => 'radio', 'disposition' => 'inline', 'options' => "oui|Oui\nnon|Non\npas_applicable|Pas applicable" ],
        [ 'num' => 13, 'etape' => 2, 'label' => 'Avez-vous d\'autres animaux ?', 'type' => 'radio', 'disposition' => 'inline', 'section_titre' => 'Autres animaux', 'section_icone' => 'fas fa-paw', 'options' => "oui|Oui\nnon|Non" ],
        [ 'num' => 14, 'etape' => 2, 'label' => 'Si oui, lesquels ?', 'type' => 'text', 'placeholder' => 'Ex: 1 chien, 2 chats...' ],
        [ 'num' => 15, 'etape' => 2, 'label' => 'Nombre de personnes au foyer', 'type' => 'number', 'largeur' => 6, 'section_titre' => 'Composition du foyer', 'section_icone' => 'fas fa-users' ],
        [ 'num' => 16, 'etape' => 2, 'label' => 'Y a-t-il des enfants ? Si oui, quel age ?', 'type' => 'text', 'largeur' => 6, 'placeholder' => 'Ex: Oui, 5 ans et 8 ans' ],

        // ── Step 3: Disponibilites ──
        [ 'num' => 17, 'etape' => 3, 'label' => 'Combien de temps pouvez-vous accueillir un chat ?', 'type' => 'select', 'section_titre' => 'Duree d\'accueil', 'section_icone' => 'fas fa-calendar-alt', 'options' => "quelques_jours|Quelques jours\n1-2_semaines|1 a 2 semaines\n1_mois|1 mois\n2-3_mois|2 a 3 mois\nplus_3_mois|Plus de 3 mois\nindetermine|Pas de limite" ],
        [ 'num' => 18, 'etape' => 3, 'label' => 'A partir de quand etes-vous disponible ?', 'type' => 'date', 'section_titre' => 'Date de disponibilite', 'section_icone' => 'fas fa-calendar-check' ],
        [ 'num' => 19, 'etape' => 3, 'label' => 'Quel type de chat pouvez-vous accueillir ?', 'type' => 'checkbox', 'disposition' => 'stacked', 'section_titre' => 'Type de chat', 'section_icone' => 'fas fa-cat', 'options' => "chaton|Chaton (biberon/sevrage)\njeune|Jeune chat\nadulte|Chat adulte\nsenior|Chat senior\nmalade|Chat malade/convalescent\ncraintif|Chat craintif/traumatise\nmere_chatons|Mere avec chatons\ntous|Tous types" ],
        [ 'num' => 20, 'etape' => 3, 'label' => 'Combien de chats pouvez-vous accueillir en meme temps ?', 'type' => 'number', 'largeur' => 6 ],
        [ 'num' => 21, 'etape' => 3, 'label' => 'Pouvez-vous administrer des medicaments ?', 'type' => 'radio', 'disposition' => 'inline', 'options' => "oui|Oui\nnon|Non" ],
        [ 'num' => 22, 'etape' => 3, 'label' => 'Pouvez-vous assurer les visites veterinaires ?', 'type' => 'radio', 'disposition' => 'inline', 'options' => "oui|Oui\nnon|Non" ],

        // ── Step 4: Experience ──
        [ 'num' => 23, 'etape' => 4, 'label' => 'Experience avec les chats', 'type' => 'radio', 'disposition' => 'stacked', 'section_titre' => 'Experience avec les chats', 'section_icone' => 'fas fa-cat', 'options' => "aucune|Aucune experience\nproprietaire|J'ai/ai eu des chats\nprofessionnelle|Experience professionnelle\nrefuge|Benevole/FA dans un refuge" ],
        [ 'num' => 24, 'etape' => 4, 'label' => 'Avez-vous deja ete famille d\'accueil ?', 'type' => 'radio', 'disposition' => 'inline', 'section_titre' => 'Experience famille d\'accueil', 'section_icone' => 'fas fa-hands-helping', 'options' => "oui|Oui\nnon|Non" ],
        [ 'num' => 25, 'etape' => 4, 'label' => 'Si oui, decrivez votre experience', 'type' => 'textarea', 'placeholder' => 'Pour quelle association, combien de chats, quelle duree...' ],
        [ 'num' => 26, 'etape' => 4, 'label' => 'Etes-vous a l\'aise avec les soins de base ? (litiere, alimentation, hygiene)', 'type' => 'radio', 'disposition' => 'inline', 'options' => "oui|Oui\nnon|Non\na_apprendre|Je suis pret(e) a apprendre" ],

        // ── Step 5: Motivation ──
        [ 'num' => 27, 'etape' => 5, 'label' => 'Pourquoi souhaitez-vous devenir famille d\'accueil ?', 'type' => 'textarea', 'required' => true, 'section_titre' => 'Motivation', 'section_icone' => 'fas fa-lightbulb', 'placeholder' => 'Partagez vos motivations...' ],
        [ 'num' => 28, 'etape' => 5, 'label' => 'Comment avez-vous connu Le Fanal des Chats ?', 'type' => 'select', 'section_titre' => 'Comment nous avez-vous connu', 'section_icone' => 'fas fa-question-circle', 'options' => "reseaux_sociaux|Reseaux sociaux (Facebook, Instagram)\nbouche_a_oreille|Bouche a oreille\nrecherche_internet|Recherche internet\nevenement|Evenement / Salon\nadoption|Via une adoption\nautre|Autre" ],
        [ 'num' => 29, 'etape' => 5, 'label' => 'Seriez-vous pret(e) a ne pas vous attacher et laisser partir le chat une fois adopte ?', 'type' => 'radio', 'disposition' => 'inline', 'section_titre' => 'Engagement', 'section_icone' => 'fas fa-heart', 'options' => "oui|Oui, je comprends\ndifficile|Ce sera difficile mais je comprends\nnon|Non" ],
        [ 'num' => 30, 'etape' => 5, 'label' => 'Informations complementaires', 'type' => 'textarea', 'section_titre' => 'Informations complementaires', 'section_icone' => 'fas fa-comment-alt', 'placeholder' => "Y a-t-il autre chose que vous aimeriez nous dire ?" ],
    ],
    'consents' => [
        [ 'label' => "J'accepte que mes donnees soient utilisees dans le cadre de ma candidature comme famille d'accueil au Fanal des Chats.", 'required' => true ],
        [ 'label' => "J'accepte qu'une visite a mon domicile soit effectuee avant l'accueil d'un chat.", 'required' => true ],
        [ 'label' => 'Je souhaite recevoir la newsletter du refuge.', 'required' => false ],
    ],
]);


// ═══════════════════════════════════════════════════════════
// SUMMARY
// ═══════════════════════════════════════════════════════════
echo '<hr><h2>Summary</h2><ul>';
foreach ( $summary as $line ) {
    $class = strpos( $line, 'SKIPPED' ) !== false ? 'error' : 'ok';
    echo '<li class="' . $class . '">' . esc_html( $line ) . '</li>';
}
echo '</ul>';
echo '<p style="color:#888;margin-top:30px;">Script completed at ' . date( 'Y-m-d H:i:s' ) . '. <strong>Delete this file after use.</strong></p>';
echo '</body></html>';
