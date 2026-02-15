<?php
/**
 * Template Name: Quiz Emploi
 * Description: Quiz sur l'emploi dans les associations félines
 */

// Charger le post ACF du quiz
$quiz_post = null;
$quiz_query = new WP_Query(array(
    'post_type' => 'page_emploi',
    'meta_key' => 'emploi_type',
    'meta_value' => 'quiz',
    'posts_per_page' => 1,
));
if ($quiz_query->have_posts()) {
    $quiz_query->the_post();
    $quiz_post = get_the_ID();
}
wp_reset_postdata();

// Illustrations par question (hardcodées)
$illustrations = array(
    0 => '1_meow cat.png',         // intro
    1 => '3_cute cat.png',
    2 => '4_playful cat.png',
    3 => '5_little cat.png',
    4 => '6_kitten.png',
    5 => '7_pretty cat.png',
    6 => '8_meaow.png',
    7 => '9_shocked cat.png',
    8 => '13_sleeping cat.png',
    9 => '10_naughty cat.png',
    10 => '14_orange cat.png',
);

// Charger les données ACF
$prefix = 'emploi';
$timer = get_field($prefix . '_quiz_timer', $quiz_post) ?: 120;
$intro_desc = get_field($prefix . '_quiz_intro_description', $quiz_post) ?: 'Testez vos connaissances sur les métiers et emplois dans le domaine félin.';
$intro_liste_raw = get_field($prefix . '_quiz_intro_liste', $quiz_post) ?: '';
$intro_liste = array_filter(array_map('trim', explode("\n", $intro_liste_raw)));

// Charger les questions
$questions = array();
$questions_js = array();
$lettres = array('a', 'b', 'c', 'd');

for ($i = 1; $i <= 10; $i++) {
    $q_text = get_field($prefix . '_quiz_q' . $i . '_question', $quiz_post);
    if (empty($q_text)) continue;

    $reponses = array();
    $correct = array();
    foreach ($lettres as $l) {
        $reponses[$l] = get_field($prefix . '_quiz_q' . $i . '_reponse_' . $l, $quiz_post) ?: '';
        if (get_field($prefix . '_quiz_q' . $i . '_correct_' . $l, $quiz_post)) {
            $correct[] = $l;
        }
    }

    $explication = get_field($prefix . '_quiz_q' . $i . '_explication', $quiz_post) ?: '';

    $questions[] = array(
        'num' => $i,
        'question' => $q_text,
        'reponses' => $reponses,
        'correct' => $correct,
        'explication' => $explication,
    );

    $questions_js[] = array(
        'question' => $q_text,
        'answers' => $reponses,
        'correct' => $correct,
        'explanation' => $explication,
    );
}

$total_questions = count($questions);

// Messages de résultat
$results = array();
foreach (array('low', 'mid', 'high') as $level) {
    $results[$level] = array(
        'label' => get_field($prefix . '_quiz_result_' . $level . '_label', $quiz_post) ?: '',
        'message' => get_field($prefix . '_quiz_result_' . $level . '_message', $quiz_post) ?: '',
        'advice' => get_field($prefix . '_quiz_result_' . $level . '_advice', $quiz_post) ?: '',
    );
}

// Données pour le JS
$quiz_data = array(
    'totalQuestions' => $total_questions,
    'timeLimit' => (int) $timer,
    'questions' => $questions_js,
    'results' => $results,
    'scoringMode' => 'correct',
);
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz Emploi - <?php bloginfo('name'); ?></title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700&family=Open+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/bootstrap.min.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <!-- Quiz Styles -->
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/quiz-adoption.css">

    <?php wp_head(); ?>
</head>
<body class="quiz-adoption-page">

    <!-- Header simplifie -->
    <header class="quiz-header">
        <div class="container">
            <a href="<?php echo home_url('/'); ?>" class="quiz-logo">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/images/logo.gif" alt="<?php bloginfo('name'); ?>">
            </a>
            <a href="<?php echo home_url('/'); ?>" class="btn-back">
                <i class="fas fa-arrow-left"></i> Retour au site
            </a>
        </div>
    </header>

    <main class="quiz-main overflow-hidden">
        <!-- Compteur -->
        <div class="counterContainer">
            <svg class="counter">
                <circle cx="50%" cy="50%" r="70" />
            </svg>
            <span id="countdown-timer"><?php echo (int) $timer; ?></span>
        </div>

        <!-- Introduction -->
        <section class="quiz-intro" id="quizIntro">
            <div class="container text-center">
                <div class="intro-content">
                    <div class="slide-illustration">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/images/illustrations/<?php echo esc_attr($illustrations[0]); ?>" alt="" aria-hidden="true">
                    </div>
                    <h1>Quiz Emploi</h1>
                    <p class="lead"><?php echo esc_html($intro_desc); ?></p>
                    <?php if (!empty($intro_liste)) : ?>
                    <p>Ce quiz de <?php echo $total_questions; ?> questions évaluera vos connaissances sur :</p>
                    <ul class="intro-list">
                        <?php
                        $icons = array('fa-heart', 'fa-home', 'fa-utensils', 'fa-stethoscope', 'fa-paw', 'fa-cat', 'fa-shield-cat', 'fa-hand-holding-heart');
                        foreach ($intro_liste as $idx => $item) :
                            $icon = $icons[$idx % count($icons)];
                        ?>
                        <li><i class="fas <?php echo $icon; ?>"></i> <?php echo esc_html($item); ?></li>
                        <?php endforeach; ?>
                    </ul>
                    <?php endif; ?>
                    <button type="button" class="btn-start" id="startQuiz">
                        Commencer le quiz <i class="fas fa-arrow-right"></i>
                    </button>
                </div>
            </div>
        </section>

        <!-- Questions du Quiz -->
        <section class="steps" id="quizSteps" style="display: none;">
            <form novalidate onsubmit="return false" id="stepForm" class="show-section">

                <?php foreach ($questions as $index => $q) :
                    $step_num = $index + 1;
                    $is_last = ($step_num === $total_questions);
                    $illus = isset($illustrations[$step_num]) ? $illustrations[$step_num] : $illustrations[1];
                    $delay_classes = array('', 'delay-100', 'delay-200', 'delay-300');
                ?>
                <fieldset id="step<?php echo $step_num; ?>">
                    <div class="slide-illustration">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/images/illustrations/<?php echo esc_attr($illus); ?>" alt="" aria-hidden="true">
                    </div>
                    <div class="question-number">Question <?php echo $step_num; ?>/<?php echo $total_questions; ?></div>
                    <div class="d-flex flex-wrap options">
                        <?php foreach ($lettres as $li => $l) :
                            if (empty($q['reponses'][$l])) continue;
                        ?>
                        <div class="option animate <?php echo $delay_classes[$li]; ?>">
                            <input type="radio" name="q<?php echo $step_num; ?>" value="<?php echo $l; ?>">
                            <label><?php echo esc_html($q['reponses'][$l]); ?></label>
                        </div>
                        <?php endforeach; ?>
                    </div>
                    <div class="question">
                        <h2 class="animate"><?php echo esc_html($q['question']); ?></h2>
                        <div class="nextPrev">
                            <button class="prev" type="button"><i class="fa-solid fa-arrow-left"></i></button>
                            <?php if ($is_last) : ?>
                            <button class="apply" type="button" id="submitQuiz"><i class="fa-solid fa-check"></i></button>
                            <?php else : ?>
                            <button class="next" type="button" data-step="<?php echo $step_num; ?>"><i class="fa-solid fa-arrow-right"></i></button>
                            <?php endif; ?>
                        </div>
                        <div class="fill"></div>
                    </div>
                </fieldset>
                <?php endforeach; ?>

            </form>
        </section>
    </main>

    <!-- Ecran de chargement resultat -->
    <div class="loadingresult">
        <div class="loading-content">
            <div class="loading-cat">
                <i class="fas fa-cat"></i>
            </div>
            <p>Calcul de vos résultats...</p>
        </div>
    </div>

    <!-- Page de resultats - Format paysage -->
    <div class="result_page">
        <div class="result_inner">
            <!-- Partie gauche - Score -->
            <div class="result_content">
                <header class="resultheader">
                    <i class="fas fa-trophy"></i>
                    Vos Résultats
                </header>

                <div class="result_msg">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/quiz/check.png" alt="succes">
                    <span class="result_msg_text">Félicitations !</span>
                </div>

                <span class="score-label">Votre score</span>
                <div class="u_prcnt">0%</div>

                <div class="prcnt_bar">
                    <div class="fill"></div>
                </div>
                <div class="prcnt_bar_lvl">-</div>

                <div class="lvl_overview">
                    <div class="lvl-single">
                        <div class="lvl-color low"></div>
                        <div class="lvl-name"><?php echo esc_html($results['low']['label'] ?: 'Débutant'); ?><br><small>0-49%</small></div>
                    </div>
                    <div class="lvl-single">
                        <div class="lvl-color medium"></div>
                        <div class="lvl-name"><?php echo esc_html($results['mid']['label'] ?: 'Bon'); ?><br><small>50-79%</small></div>
                    </div>
                    <div class="lvl-single">
                        <div class="lvl-color high"></div>
                        <div class="lvl-name"><?php echo esc_html($results['high']['label'] ?: 'Expert'); ?><br><small>80-100%</small></div>
                    </div>
                </div>
            </div>

            <!-- Partie droite - Conseil et boutons -->
            <div class="result_right">
                <div class="result_advice">
                    <h3><i class="fas fa-lightbulb"></i> Conseil</h3>
                    <p class="advice_text"></p>
                </div>

                <footer class="resultfooter">
                    <a href="<?php echo home_url('/'); ?>" class="btn-adopt">
                        <i class="fas fa-home"></i> Retour au site
                    </a>
                    <button type="button" class="btn-see-errors" id="seeErrorsBtn" style="display: none;">
                        <i class="fas fa-arrow-down"></i> Voir mes erreurs
                    </button>
                    <button type="button" class="btn-retry" onclick="location.reload()">
                        <i class="fas fa-redo"></i> Refaire le quiz
                    </button>
                </footer>
            </div>
        </div>

        <!-- Section erreurs -->
        <div class="errors-section" id="errorsSection">
            <h2 class="errors-title"><i class="fas fa-times-circle"></i> Vos erreurs</h2>
            <div class="errors-list" id="errorsList">
                <!-- Les erreurs seront ajoutees dynamiquement par JS -->
            </div>
        </div>
    </div>

    <div id="error"></div>

    <!-- Quiz Data -->
    <script>
        window.quizData = <?php echo wp_json_encode($quiz_data); ?>;
    </script>

    <!-- Scripts -->
    <script src="<?php echo get_template_directory_uri(); ?>/assets/js/jquery.min.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/assets/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/assets/js/quiz-generic.js"></script>

    <?php wp_footer(); ?>
</body>
</html>
