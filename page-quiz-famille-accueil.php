<?php
/**
 * Template Name: Quiz Famille Accueil
 * Description: Quiz pour les candidats famille d'accueil
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz Famille d'accueil - <?php bloginfo('name'); ?></title>

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

    <!-- Header simplifié -->
    <header class="quiz-header">
        <div class="container">
            <a href="<?php echo home_url('/'); ?>" class="quiz-logo">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/images/logo.gif" alt="<?php bloginfo('name'); ?>">
            </a>
            <a href="<?php echo home_url('/famille-accueil'); ?>" class="btn-back">
                <i class="fas fa-arrow-left"></i> Retour
            </a>
        </div>
    </header>

    <main class="quiz-main overflow-hidden">
        <!-- Compteur -->
        <div class="counterContainer">
            <svg class="counter">
                <circle cx="50%" cy="50%" r="70" />
            </svg>
            <span id="countdown-timer">120</span>
        </div>

        <!-- Introduction -->
        <section class="quiz-intro" id="quizIntro">
            <div class="container text-center">
                <div class="intro-content">
                    <div class="slide-illustration">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/images/illustrations/1_meow cat.png" alt="" aria-hidden="true">
                    </div>
                    <h1>Quiz Famille d'accueil</h1>
                    <p class="lead">Évaluez votre profil pour devenir famille d'accueil au Fanal des Chats !</p>
                    <p>Ce quiz de 10 questions évaluera :</p>
                    <ul class="intro-list">
                        <li><i class="fas fa-home"></i> Votre logement</li>
                        <li><i class="fas fa-clock"></i> Vos disponibilités</li>
                        <li><i class="fas fa-paw"></i> Votre expérience avec les animaux</li>
                        <li><i class="fas fa-heart"></i> Votre motivation</li>
                    </ul>
                    <button type="button" class="btn-start" id="startQuiz">
                        Commencer le quiz <i class="fas fa-arrow-right"></i>
                    </button>
                </div>
            </div>
        </section>

        <!-- Questions du Quiz -->
        <section class="steps" id="quizSteps" style="display: none;">
            <form novalidate onsubmit="return false" id="stepForm" class="show-section">

                <!-- Question 1: Logement -->
                <fieldset id="step1">
                    <div class="slide-illustration">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/images/illustrations/3_cute cat.png" alt="" aria-hidden="true">
                    </div>
                    <div class="question-number">Question 1/10</div>
                    <div class="d-flex flex-wrap options">
                        <div class="option animate">
                            <input type="radio" name="q1" value="a">
                            <label>Studio ou petit appartement</label>
                        </div>
                        <div class="option animate delay-100">
                            <input type="radio" name="q1" value="b">
                            <label>Appartement avec plusieurs pièces</label>
                        </div>
                        <div class="option animate delay-200">
                            <input type="radio" name="q1" value="c">
                            <label>Maison sans jardin</label>
                        </div>
                        <div class="option animate delay-300">
                            <input type="radio" name="q1" value="d">
                            <label>Maison avec jardin sécurisé</label>
                        </div>
                    </div>
                    <div class="question">
                        <h2 class="animate">Quel type de logement occupez-vous ?</h2>
                        <div class="nextPrev">
                            <button class="prev" type="button"><i class="fa-solid fa-arrow-left"></i></button>
                            <button class="next" type="button" data-step="1"><i class="fa-solid fa-arrow-right"></i></button>
                        </div>
                        <div class="fill"></div>
                    </div>
                </fieldset>

                <!-- Question 2: Disponibilité quotidienne -->
                <fieldset id="step2">
                    <div class="slide-illustration">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/images/illustrations/4_playful cat.png" alt="" aria-hidden="true">
                    </div>
                    <div class="question-number">Question 2/10</div>
                    <div class="d-flex flex-wrap options">
                        <div class="option animate">
                            <input type="radio" name="q2" value="a">
                            <label>Absent(e) plus de 10 heures par jour</label>
                        </div>
                        <div class="option animate delay-100">
                            <input type="radio" name="q2" value="b">
                            <label>Absent(e) 6 à 8 heures par jour</label>
                        </div>
                        <div class="option animate delay-200">
                            <input type="radio" name="q2" value="c">
                            <label>Présent(e) une bonne partie de la journée</label>
                        </div>
                        <div class="option animate delay-300">
                            <input type="radio" name="q2" value="d">
                            <label>Présent(e) quasi en permanence</label>
                        </div>
                    </div>
                    <div class="question">
                        <h2 class="animate">Combien de temps êtes-vous présent(e) à la maison chaque jour ?</h2>
                        <div class="nextPrev">
                            <button class="prev" type="button"><i class="fa-solid fa-arrow-left"></i></button>
                            <button class="next" type="button" data-step="2"><i class="fa-solid fa-arrow-right"></i></button>
                        </div>
                        <div class="fill"></div>
                    </div>
                </fieldset>

                <!-- Question 3: Expérience avec les chats -->
                <fieldset id="step3">
                    <div class="slide-illustration">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/images/illustrations/5_little cat.png" alt="" aria-hidden="true">
                    </div>
                    <div class="question-number">Question 3/10</div>
                    <div class="d-flex flex-wrap options">
                        <div class="option animate">
                            <input type="radio" name="q3" value="a">
                            <label>Aucune expérience avec les chats</label>
                        </div>
                        <div class="option animate delay-100">
                            <input type="radio" name="q3" value="b">
                            <label>J'ai côtoyé des chats chez des proches</label>
                        </div>
                        <div class="option animate delay-200">
                            <input type="radio" name="q3" value="c">
                            <label>J'ai ou j'ai eu des chats</label>
                        </div>
                        <div class="option animate delay-300">
                            <input type="radio" name="q3" value="d">
                            <label>Expérience avec des chatons ou chats nécessitant des soins</label>
                        </div>
                    </div>
                    <div class="question">
                        <h2 class="animate">Quelle est votre expérience avec les chats ?</h2>
                        <div class="nextPrev">
                            <button class="prev" type="button"><i class="fa-solid fa-arrow-left"></i></button>
                            <button class="next" type="button" data-step="3"><i class="fa-solid fa-arrow-right"></i></button>
                        </div>
                        <div class="fill"></div>
                    </div>
                </fieldset>

                <!-- Question 4: Autres animaux au foyer -->
                <fieldset id="step4">
                    <div class="slide-illustration">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/images/illustrations/6_kitten.png" alt="" aria-hidden="true">
                    </div>
                    <div class="question-number">Question 4/10</div>
                    <div class="d-flex flex-wrap options">
                        <div class="option animate">
                            <input type="radio" name="q4" value="a">
                            <label>J'ai un chien non habitué aux chats</label>
                        </div>
                        <div class="option animate delay-100">
                            <input type="radio" name="q4" value="b">
                            <label>J'ai d'autres animaux compatibles</label>
                        </div>
                        <div class="option animate delay-200">
                            <input type="radio" name="q4" value="c">
                            <label>J'ai un chat sociable</label>
                        </div>
                        <div class="option animate delay-300">
                            <input type="radio" name="q4" value="d">
                            <label>Aucun autre animal au foyer</label>
                        </div>
                    </div>
                    <div class="question">
                        <h2 class="animate">Avez-vous d'autres animaux à la maison ?</h2>
                        <div class="nextPrev">
                            <button class="prev" type="button"><i class="fa-solid fa-arrow-left"></i></button>
                            <button class="next" type="button" data-step="4"><i class="fa-solid fa-arrow-right"></i></button>
                        </div>
                        <div class="fill"></div>
                    </div>
                </fieldset>

                <!-- Question 5: Enfants -->
                <fieldset id="step5">
                    <div class="slide-illustration">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/images/illustrations/7_pretty cat.png" alt="" aria-hidden="true">
                    </div>
                    <div class="question-number">Question 5/10</div>
                    <div class="d-flex flex-wrap options">
                        <div class="option animate">
                            <input type="radio" name="q5" value="a">
                            <label>Enfants en bas âge (moins de 3 ans)</label>
                        </div>
                        <div class="option animate delay-100">
                            <input type="radio" name="q5" value="b">
                            <label>Enfants entre 3 et 10 ans</label>
                        </div>
                        <div class="option animate delay-200">
                            <input type="radio" name="q5" value="c">
                            <label>Adolescents ou enfants sensibilisés</label>
                        </div>
                        <div class="option animate delay-300">
                            <input type="radio" name="q5" value="d">
                            <label>Pas d'enfants au foyer</label>
                        </div>
                    </div>
                    <div class="question">
                        <h2 class="animate">Y a-t-il des enfants dans votre foyer ?</h2>
                        <div class="nextPrev">
                            <button class="prev" type="button"><i class="fa-solid fa-arrow-left"></i></button>
                            <button class="next" type="button" data-step="5"><i class="fa-solid fa-arrow-right"></i></button>
                        </div>
                        <div class="fill"></div>
                    </div>
                </fieldset>

                <!-- Question 6: Durée d'accueil -->
                <fieldset id="step6">
                    <div class="slide-illustration">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/images/illustrations/8_meaow.png" alt="" aria-hidden="true">
                    </div>
                    <div class="question-number">Question 6/10</div>
                    <div class="d-flex flex-wrap options">
                        <div class="option animate">
                            <input type="radio" name="q6" value="a">
                            <label>Quelques jours seulement</label>
                        </div>
                        <div class="option animate delay-100">
                            <input type="radio" name="q6" value="b">
                            <label>1 à 2 semaines</label>
                        </div>
                        <div class="option animate delay-200">
                            <input type="radio" name="q6" value="c">
                            <label>1 à 2 mois</label>
                        </div>
                        <div class="option animate delay-300">
                            <input type="radio" name="q6" value="d">
                            <label>Jusqu'à 3 mois ou plus si nécessaire</label>
                        </div>
                    </div>
                    <div class="question">
                        <h2 class="animate">Combien de temps pourriez-vous accueillir un chat ou des chatons ?</h2>
                        <div class="nextPrev">
                            <button class="prev" type="button"><i class="fa-solid fa-arrow-left"></i></button>
                            <button class="next" type="button" data-step="6"><i class="fa-solid fa-arrow-right"></i></button>
                        </div>
                        <div class="fill"></div>
                    </div>
                </fieldset>

                <!-- Question 7: Soins médicaux -->
                <fieldset id="step7">
                    <div class="slide-illustration">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/images/illustrations/9_shocked cat.png" alt="" aria-hidden="true">
                    </div>
                    <div class="question-number">Question 7/10</div>
                    <div class="d-flex flex-wrap options">
                        <div class="option animate">
                            <input type="radio" name="q7" value="a">
                            <label>Je ne suis pas à l'aise avec les soins</label>
                        </div>
                        <div class="option animate delay-100">
                            <input type="radio" name="q7" value="b">
                            <label>Je peux administrer des soins simples</label>
                        </div>
                        <div class="option animate delay-200">
                            <input type="radio" name="q7" value="c">
                            <label>Je suis capable de donner des médicaments</label>
                        </div>
                        <div class="option animate delay-300">
                            <input type="radio" name="q7" value="d">
                            <label>J'ai l'habitude des soins vétérinaires courants</label>
                        </div>
                    </div>
                    <div class="question">
                        <h2 class="animate">Êtes-vous à l'aise pour administrer des soins aux chats ?</h2>
                        <div class="nextPrev">
                            <button class="prev" type="button"><i class="fa-solid fa-arrow-left"></i></button>
                            <button class="next" type="button" data-step="7"><i class="fa-solid fa-arrow-right"></i></button>
                        </div>
                        <div class="fill"></div>
                    </div>
                </fieldset>

                <!-- Question 8: Séparation -->
                <fieldset id="step8">
                    <div class="slide-illustration">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/images/illustrations/13_sleeping cat.png" alt="" aria-hidden="true">
                    </div>
                    <div class="question-number">Question 8/10</div>
                    <div class="d-flex flex-wrap options">
                        <div class="option animate">
                            <input type="radio" name="q8" value="a">
                            <label>Cela serait très difficile pour moi</label>
                        </div>
                        <div class="option animate delay-100">
                            <input type="radio" name="q8" value="b">
                            <label>J'aurais du mal mais je comprends la démarche</label>
                        </div>
                        <div class="option animate delay-200">
                            <input type="radio" name="q8" value="c">
                            <label>Je sais que c'est pour leur bien</label>
                        </div>
                        <div class="option animate delay-300">
                            <input type="radio" name="q8" value="d">
                            <label>J'ai déjà vécu ce type de séparation</label>
                        </div>
                    </div>
                    <div class="question">
                        <h2 class="animate">Comment réagiriez-vous au moment de rendre le chat pour son adoption ?</h2>
                        <div class="nextPrev">
                            <button class="prev" type="button"><i class="fa-solid fa-arrow-left"></i></button>
                            <button class="next" type="button" data-step="8"><i class="fa-solid fa-arrow-right"></i></button>
                        </div>
                        <div class="fill"></div>
                    </div>
                </fieldset>

                <!-- Question 9: Pièce dédiée -->
                <fieldset id="step9">
                    <div class="slide-illustration">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/images/illustrations/10_naughty cat.png" alt="" aria-hidden="true">
                    </div>
                    <div class="question-number">Question 9/10</div>
                    <div class="d-flex flex-wrap options">
                        <div class="option animate">
                            <input type="radio" name="q9" value="a">
                            <label>Non, pas de pièce disponible</label>
                        </div>
                        <div class="option animate delay-100">
                            <input type="radio" name="q9" value="b">
                            <label>Un coin aménageable dans une pièce</label>
                        </div>
                        <div class="option animate delay-200">
                            <input type="radio" name="q9" value="c">
                            <label>Une pièce pouvant être isolée temporairement</label>
                        </div>
                        <div class="option animate delay-300">
                            <input type="radio" name="q9" value="d">
                            <label>Une pièce entièrement dédiée à l'accueil</label>
                        </div>
                    </div>
                    <div class="question">
                        <h2 class="animate">Disposez-vous d'une pièce calme pour accueillir le chat ?</h2>
                        <div class="nextPrev">
                            <button class="prev" type="button"><i class="fa-solid fa-arrow-left"></i></button>
                            <button class="next" type="button" data-step="9"><i class="fa-solid fa-arrow-right"></i></button>
                        </div>
                        <div class="fill"></div>
                    </div>
                </fieldset>

                <!-- Question 10: Motivation -->
                <fieldset id="step10">
                    <div class="slide-illustration">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/images/illustrations/14_orange cat.png" alt="" aria-hidden="true">
                    </div>
                    <div class="question-number">Question 10/10</div>
                    <div class="d-flex flex-wrap options">
                        <div class="option animate">
                            <input type="radio" name="q10" value="a">
                            <label>Par curiosité, pour voir si ça me plaît</label>
                        </div>
                        <div class="option animate delay-100">
                            <input type="radio" name="q10" value="b">
                            <label>Pour aider ponctuellement en cas d'urgence</label>
                        </div>
                        <div class="option animate delay-200">
                            <input type="radio" name="q10" value="c">
                            <label>Pour offrir un foyer temporaire aux chats dans le besoin</label>
                        </div>
                        <div class="option animate delay-300">
                            <input type="radio" name="q10" value="d">
                            <label>C'est un engagement que je souhaite sur le long terme</label>
                        </div>
                    </div>
                    <div class="question">
                        <h2 class="animate">Quelle est votre principale motivation pour devenir famille d'accueil ?</h2>
                        <div class="nextPrev">
                            <button class="prev" type="button"><i class="fa-solid fa-arrow-left"></i></button>
                            <button class="apply" type="button" id="submitQuiz"><i class="fa-solid fa-check"></i></button>
                        </div>
                        <div class="fill"></div>
                    </div>
                </fieldset>

            </form>
        </section>
    </main>

    <!-- Écran de chargement résultat -->
    <div class="loadingresult">
        <div class="loading-content">
            <div class="loading-cat">
                <i class="fas fa-cat"></i>
            </div>
            <p>Analyse de votre profil...</p>
        </div>
    </div>

    <!-- Page de résultats -->
    <div class="result_page">
        <div class="result_inner">
            <!-- Partie gauche - Score -->
            <div class="result_content">
                <header class="resultheader">
                    <i class="fas fa-home"></i>
                    Votre Profil
                </header>

                <div class="result_msg">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/quiz/check.png" alt="succès">
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
                        <div class="lvl-name">À préparer<br><small>0-49%</small></div>
                    </div>
                    <div class="lvl-single">
                        <div class="lvl-color medium"></div>
                        <div class="lvl-name">Prometteur<br><small>50-79%</small></div>
                    </div>
                    <div class="lvl-single">
                        <div class="lvl-color high"></div>
                        <div class="lvl-name">Idéal<br><small>80-100%</small></div>
                    </div>
                </div>
            </div>

            <!-- Partie droite - Conseil et boutons -->
            <div class="result_right">
                <div class="result_advice">
                    <h3><i class="fas fa-lightbulb"></i> Notre avis</h3>
                    <p class="advice_text"></p>
                </div>

                <footer class="resultfooter">
                    <a href="<?php echo home_url('/famille-accueil'); ?>" class="btn-adopt">
                        <i class="fas fa-arrow-left"></i> Retour
                    </a>
                    <button type="button" class="btn-see-errors" id="seeErrorsBtn" style="display: none;">
                        <i class="fas fa-arrow-down"></i> Voir mes réponses
                    </button>
                    <button type="button" class="btn-retry" onclick="location.reload()">
                        <i class="fas fa-redo"></i> Refaire le quiz
                    </button>
                </footer>
            </div>
        </div>

        <!-- Section réponses -->
        <div class="errors-section" id="errorsSection">
            <h2 class="errors-title"><i class="fas fa-clipboard-list"></i> Vos réponses</h2>
            <div class="errors-list" id="errorsList">
            </div>
        </div>
    </div>

    <div id="error"></div>

    <!-- Scripts -->
    <script src="<?php echo get_template_directory_uri(); ?>/assets/js/jquery.min.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/assets/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/assets/js/quiz-famille-accueil.js"></script>

    <?php wp_footer(); ?>
</body>
</html>
