<?php
/**
 * Template Name: Quiz Abandon
 * Description: Quiz pour accompagner les personnes envisageant l'abandon de leur chat
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz Abandon - <?php bloginfo('name'); ?></title>

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
            <a href="<?php echo home_url('/abandon'); ?>" class="btn-back">
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
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/images/illustrations/19_cute gray cat.png" alt="" aria-hidden="true">
                    </div>
                    <h1>L'abandon est-il la seule solution ?</h1>
                    <p class="lead">Ce questionnaire vous aidera a explorer toutes les options avant de prendre votre decision.</p>
                    <p>En 10 questions, nous allons parcourir ensemble :</p>
                    <ul class="intro-list">
                        <li><i class="fas fa-search"></i> Votre situation actuelle</li>
                        <li><i class="fas fa-lightbulb"></i> Les alternatives possibles</li>
                        <li><i class="fas fa-heart"></i> Le bien-etre de votre chat</li>
                        <li><i class="fas fa-hands-helping"></i> Les aides disponibles</li>
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

                <!-- Question 1: Raison principale -->
                <fieldset id="step1">
                    <div class="slide-illustration">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/images/illustrations/3_cute cat.png" alt="" aria-hidden="true">
                    </div>
                    <div class="question-number">Question 1/10</div>
                    <div class="d-flex flex-wrap options">
                        <div class="option animate">
                            <input type="radio" name="q1" value="a">
                            <label>Un demenagement</label>
                        </div>
                        <div class="option animate delay-100">
                            <input type="radio" name="q1" value="b">
                            <label>Des allergies</label>
                        </div>
                        <div class="option animate delay-200">
                            <input type="radio" name="q1" value="c">
                            <label>Des problemes de comportement</label>
                        </div>
                        <div class="option animate delay-300">
                            <input type="radio" name="q1" value="d">
                            <label>Des difficultes financieres</label>
                        </div>
                    </div>
                    <div class="question">
                        <h2 class="animate">Quelle est la raison principale de votre decision ?</h2>
                        <div class="nextPrev">
                            <button class="prev" type="button"><i class="fa-solid fa-arrow-left"></i></button>
                            <button class="next" type="button" data-step="1"><i class="fa-solid fa-arrow-right"></i></button>
                        </div>
                        <div class="fill"></div>
                    </div>
                </fieldset>

                <!-- Question 2: Veterinaire -->
                <fieldset id="step2">
                    <div class="slide-illustration">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/images/illustrations/6_kitten.png" alt="" aria-hidden="true">
                    </div>
                    <div class="question-number">Question 2/10</div>
                    <div class="d-flex flex-wrap options">
                        <div class="option animate">
                            <input type="radio" name="q2" value="a">
                            <label>Oui, pour un bilan complet</label>
                        </div>
                        <div class="option animate delay-100">
                            <input type="radio" name="q2" value="b">
                            <label>Oui, mais il y a longtemps</label>
                        </div>
                        <div class="option animate delay-200">
                            <input type="radio" name="q2" value="c">
                            <label>Non, pas encore</label>
                        </div>
                        <div class="option animate delay-300">
                            <input type="radio" name="q2" value="d">
                            <label>Non, ce n'est pas une question de sante</label>
                        </div>
                    </div>
                    <div class="question">
                        <h2 class="animate">Avez-vous consulte un veterinaire recemment ?</h2>
                        <div class="nextPrev">
                            <button class="prev" type="button"><i class="fa-solid fa-arrow-left"></i></button>
                            <button class="next" type="button" data-step="2"><i class="fa-solid fa-arrow-right"></i></button>
                        </div>
                        <div class="fill"></div>
                    </div>
                </fieldset>

                <!-- Question 3: Comportementaliste -->
                <fieldset id="step3">
                    <div class="slide-illustration">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/images/illustrations/4_playful cat.png" alt="" aria-hidden="true">
                    </div>
                    <div class="question-number">Question 3/10</div>
                    <div class="d-flex flex-wrap options">
                        <div class="option animate">
                            <input type="radio" name="q3" value="a">
                            <label>Oui, et cela a aide</label>
                        </div>
                        <div class="option animate delay-100">
                            <input type="radio" name="q3" value="b">
                            <label>Oui, mais sans resultat</label>
                        </div>
                        <div class="option animate delay-200">
                            <input type="radio" name="q3" value="c">
                            <label>Non, je ne savais pas que ca existait</label>
                        </div>
                        <div class="option animate delay-300">
                            <input type="radio" name="q3" value="d">
                            <label>Non, le probleme n'est pas comportemental</label>
                        </div>
                    </div>
                    <div class="question">
                        <h2 class="animate">Un comportementaliste felin a-t-il ete consulte ?</h2>
                        <div class="nextPrev">
                            <button class="prev" type="button"><i class="fa-solid fa-arrow-left"></i></button>
                            <button class="next" type="button" data-step="3"><i class="fa-solid fa-arrow-right"></i></button>
                        </div>
                        <div class="fill"></div>
                    </div>
                </fieldset>

                <!-- Question 4: Entourage -->
                <fieldset id="step4">
                    <div class="slide-illustration">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/images/illustrations/7_pretty cat.png" alt="" aria-hidden="true">
                    </div>
                    <div class="question-number">Question 4/10</div>
                    <div class="d-flex flex-wrap options">
                        <div class="option animate">
                            <input type="radio" name="q4" value="a">
                            <label>Oui, famille ou amis pourraient aider</label>
                        </div>
                        <div class="option animate delay-100">
                            <input type="radio" name="q4" value="b">
                            <label>J'y ai pense mais pas encore demande</label>
                        </div>
                        <div class="option animate delay-200">
                            <input type="radio" name="q4" value="c">
                            <label>Non, personne ne peut m'aider</label>
                        </div>
                        <div class="option animate delay-300">
                            <input type="radio" name="q4" value="d">
                            <label>Je n'ai pas ose en parler</label>
                        </div>
                    </div>
                    <div class="question">
                        <h2 class="animate">Avez-vous explore des solutions dans votre entourage ?</h2>
                        <div class="nextPrev">
                            <button class="prev" type="button"><i class="fa-solid fa-arrow-left"></i></button>
                            <button class="next" type="button" data-step="4"><i class="fa-solid fa-arrow-right"></i></button>
                        </div>
                        <div class="fill"></div>
                    </div>
                </fieldset>

                <!-- Question 5: Temporaire ou definitif -->
                <fieldset id="step5">
                    <div class="slide-illustration">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/images/illustrations/5_little cat.png" alt="" aria-hidden="true">
                    </div>
                    <div class="question-number">Question 5/10</div>
                    <div class="d-flex flex-wrap options">
                        <div class="option animate">
                            <input type="radio" name="q5" value="a">
                            <label>Temporaire (quelques semaines ou mois)</label>
                        </div>
                        <div class="option animate delay-100">
                            <input type="radio" name="q5" value="b">
                            <label>Je ne sais pas encore</label>
                        </div>
                        <div class="option animate delay-200">
                            <input type="radio" name="q5" value="c">
                            <label>Definitive, mais recente</label>
                        </div>
                        <div class="option animate delay-300">
                            <input type="radio" name="q5" value="d">
                            <label>Definitive et de longue date</label>
                        </div>
                    </div>
                    <div class="question">
                        <h2 class="animate">Votre situation est-elle temporaire ou definitive ?</h2>
                        <div class="nextPrev">
                            <button class="prev" type="button"><i class="fa-solid fa-arrow-left"></i></button>
                            <button class="next" type="button" data-step="5"><i class="fa-solid fa-arrow-right"></i></button>
                        </div>
                        <div class="fill"></div>
                    </div>
                </fieldset>

                <!-- Question 6: Aides financieres -->
                <fieldset id="step6">
                    <div class="slide-illustration">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/images/illustrations/8_meaow.png" alt="" aria-hidden="true">
                    </div>
                    <div class="question-number">Question 6/10</div>
                    <div class="d-flex flex-wrap options">
                        <div class="option animate">
                            <input type="radio" name="q6" value="a">
                            <label>Oui, associations et CPAS peuvent aider</label>
                        </div>
                        <div class="option animate delay-100">
                            <input type="radio" name="q6" value="b">
                            <label>J'en ai entendu parler sans plus</label>
                        </div>
                        <div class="option animate delay-200">
                            <input type="radio" name="q6" value="c">
                            <label>Non, je ne savais pas</label>
                        </div>
                        <div class="option animate delay-300">
                            <input type="radio" name="q6" value="d">
                            <label>Ce n'est pas une question d'argent</label>
                        </div>
                    </div>
                    <div class="question">
                        <h2 class="animate">Connaissez-vous les aides financieres disponibles ?</h2>
                        <div class="nextPrev">
                            <button class="prev" type="button"><i class="fa-solid fa-arrow-left"></i></button>
                            <button class="next" type="button" data-step="6"><i class="fa-solid fa-arrow-right"></i></button>
                        </div>
                        <div class="fill"></div>
                    </div>
                </fieldset>

                <!-- Question 7: Duree de la situation -->
                <fieldset id="step7">
                    <div class="slide-illustration">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/images/illustrations/13_sleeping cat.png" alt="" aria-hidden="true">
                    </div>
                    <div class="question-number">Question 7/10</div>
                    <div class="d-flex flex-wrap options">
                        <div class="option animate">
                            <input type="radio" name="q7" value="a">
                            <label>Moins de 6 mois</label>
                        </div>
                        <div class="option animate delay-100">
                            <input type="radio" name="q7" value="b">
                            <label>Entre 6 mois et 1 an</label>
                        </div>
                        <div class="option animate delay-200">
                            <input type="radio" name="q7" value="c">
                            <label>Plus d'un an</label>
                        </div>
                        <div class="option animate delay-300">
                            <input type="radio" name="q7" value="d">
                            <label>La situation vient de commencer</label>
                        </div>
                    </div>
                    <div class="question">
                        <h2 class="animate">Depuis combien de temps vivez-vous cette situation ?</h2>
                        <div class="nextPrev">
                            <button class="prev" type="button"><i class="fa-solid fa-arrow-left"></i></button>
                            <button class="next" type="button" data-step="7"><i class="fa-solid fa-arrow-right"></i></button>
                        </div>
                        <div class="fill"></div>
                    </div>
                </fieldset>

                <!-- Question 8: Famille d'accueil -->
                <fieldset id="step8">
                    <div class="slide-illustration">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/images/illustrations/15_tabby.png" alt="" aria-hidden="true">
                    </div>
                    <div class="question-number">Question 8/10</div>
                    <div class="d-flex flex-wrap options">
                        <div class="option animate">
                            <input type="radio" name="q8" value="a">
                            <label>Oui, c'est une bonne idee</label>
                        </div>
                        <div class="option animate delay-100">
                            <input type="radio" name="q8" value="b">
                            <label>Non, je ne connaissais pas cette option</label>
                        </div>
                        <div class="option animate delay-200">
                            <input type="radio" name="q8" value="c">
                            <label>Non, je ne pense pas que ce soit adapte</label>
                        </div>
                        <div class="option animate delay-300">
                            <input type="radio" name="q8" value="d">
                            <label>Je ne sais pas comment faire</label>
                        </div>
                    </div>
                    <div class="question">
                        <h2 class="animate">Avez-vous envisage une famille d'accueil temporaire ?</h2>
                        <div class="nextPrev">
                            <button class="prev" type="button"><i class="fa-solid fa-arrow-left"></i></button>
                            <button class="next" type="button" data-step="8"><i class="fa-solid fa-arrow-right"></i></button>
                        </div>
                        <div class="fill"></div>
                    </div>
                </fieldset>

                <!-- Question 9: Reaction du chat -->
                <fieldset id="step9">
                    <div class="slide-illustration">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/images/illustrations/9_shocked cat.png" alt="" aria-hidden="true">
                    </div>
                    <div class="question-number">Question 9/10</div>
                    <div class="d-flex flex-wrap options">
                        <div class="option animate">
                            <input type="radio" name="q9" value="a">
                            <label>Il semble stresse ou anxieux</label>
                        </div>
                        <div class="option animate delay-100">
                            <input type="radio" name="q9" value="b">
                            <label>Son comportement a change recemment</label>
                        </div>
                        <div class="option animate delay-200">
                            <input type="radio" name="q9" value="c">
                            <label>Il est agressif ou destructeur</label>
                        </div>
                        <div class="option animate delay-300">
                            <input type="radio" name="q9" value="d">
                            <label>Il va bien, c'est ma situation qui a change</label>
                        </div>
                    </div>
                    <div class="question">
                        <h2 class="animate">Comment reagit votre chat face a cette situation ?</h2>
                        <div class="nextPrev">
                            <button class="prev" type="button"><i class="fa-solid fa-arrow-left"></i></button>
                            <button class="next" type="button" data-step="9"><i class="fa-solid fa-arrow-right"></i></button>
                        </div>
                        <div class="fill"></div>
                    </div>
                </fieldset>

                <!-- Question 10: Derniere alternative -->
                <fieldset id="step10">
                    <div class="slide-illustration">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/images/illustrations/14_orange cat.png" alt="" aria-hidden="true">
                    </div>
                    <div class="question-number">Question 10/10</div>
                    <div class="d-flex flex-wrap options">
                        <div class="option animate">
                            <input type="radio" name="q10" value="a">
                            <label>Oui, je suis ouvert(e) a toute aide</label>
                        </div>
                        <div class="option animate delay-100">
                            <input type="radio" name="q10" value="b">
                            <label>Peut-etre, si on me guide</label>
                        </div>
                        <div class="option animate delay-200">
                            <input type="radio" name="q10" value="c">
                            <label>J'ai deja tout essaye</label>
                        </div>
                        <div class="option animate delay-300">
                            <input type="radio" name="q10" value="d">
                            <label>Je ne sais plus quoi faire</label>
                        </div>
                    </div>
                    <div class="question">
                        <h2 class="animate">Etes-vous pret(e) a essayer une derniere alternative ?</h2>
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

    <!-- Ecran de chargement resultat -->
    <div class="loadingresult">
        <div class="loading-content">
            <div class="loading-cat">
                <i class="fas fa-cat"></i>
            </div>
            <p>Analyse de votre situation...</p>
        </div>
    </div>

    <!-- Page de resultats - Format paysage -->
    <div class="result_page">
        <div class="result_inner">
            <!-- Partie gauche - Score -->
            <div class="result_content">
                <header class="resultheader">
                    <i class="fas fa-heart"></i>
                    Bilan de votre situation
                </header>

                <div class="result_msg">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/quiz/check.png" alt="resultat">
                    <span class="result_msg_text">Des solutions existent</span>
                </div>

                <span class="score-label">Alternatives identifiees</span>
                <div class="u_prcnt">0%</div>

                <div class="prcnt_bar">
                    <div class="fill"></div>
                </div>
                <div class="prcnt_bar_lvl">-</div>

                <div class="lvl_overview">
                    <div class="lvl-single">
                        <div class="lvl-color low"></div>
                        <div class="lvl-name">Situation complexe<br><small>0-49%</small></div>
                    </div>
                    <div class="lvl-single">
                        <div class="lvl-color medium"></div>
                        <div class="lvl-name">Quelques pistes<br><small>50-79%</small></div>
                    </div>
                    <div class="lvl-single">
                        <div class="lvl-color high"></div>
                        <div class="lvl-name">Beaucoup d'alternatives<br><small>80-100%</small></div>
                    </div>
                </div>
            </div>

            <!-- Partie droite - Conseil et boutons -->
            <div class="result_right">
                <div class="result_advice">
                    <h3><i class="fas fa-lightbulb"></i> Notre conseil</h3>
                    <p class="advice_text"></p>
                </div>

                <footer class="resultfooter">
                    <a href="<?php echo home_url('/abandon'); ?>" class="btn-adopt">
                        <i class="fas fa-arrow-left"></i> Retour
                    </a>
                    <button type="button" class="btn-see-errors" id="seeErrorsBtn" style="display: none;">
                        <i class="fas fa-arrow-down"></i> Voir les alternatives
                    </button>
                    <button type="button" class="btn-retry" onclick="location.reload()">
                        <i class="fas fa-redo"></i> Refaire le quiz
                    </button>
                </footer>
            </div>
        </div>

        <!-- Section erreurs -->
        <div class="errors-section" id="errorsSection">
            <h2 class="errors-title"><i class="fas fa-lightbulb"></i> Alternatives a explorer</h2>
            <div class="errors-list" id="errorsList">
                <!-- Les alternatives seront ajoutees dynamiquement par JS -->
            </div>
        </div>
    </div>

    <div id="error"></div>

    <!-- Scripts -->
    <script src="<?php echo get_template_directory_uri(); ?>/assets/js/jquery.min.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/assets/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/assets/js/quiz-abandon.js"></script>

    <?php wp_footer(); ?>
</body>
</html>
