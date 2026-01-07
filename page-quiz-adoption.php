<?php
/**
 * Template Name: Quiz Adoption
 * Description: Quiz pour les futurs adoptants de chat
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz Adoption - <?php bloginfo('name'); ?></title>

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
            <span id="countdown-timer">90</span>
        </div>

        <!-- Introduction -->
        <section class="quiz-intro" id="quizIntro">
            <div class="container text-center">
                <div class="intro-content">
                    <div class="slide-illustration">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/images/illustrations/1_meow cat.png" alt="" aria-hidden="true">
                    </div>
                    <h1>Quiz Adoption</h1>
                    <p class="lead">Testez vos connaissances sur le bien-etre felin avant d'adopter votre futur compagnon !</p>
                    <p>Ce quiz de 10 questions evaluera vos connaissances sur :</p>
                    <ul class="intro-list">
                        <li><i class="fas fa-heart"></i> Le bien-etre des chats</li>
                        <li><i class="fas fa-home"></i> Leurs besoins quotidiens</li>
                        <li><i class="fas fa-utensils"></i> Leur alimentation</li>
                        <li><i class="fas fa-stethoscope"></i> Leur sante</li>
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

                <!-- Question 1: Alimentation -->
                <fieldset id="step1">
                    <div class="slide-illustration">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/images/illustrations/3_cute cat.png" alt="" aria-hidden="true">
                    </div>
                    <div class="question-number">Question 1/10</div>
                    <div class="d-flex flex-wrap options">
                        <div class="option animate">
                            <input type="radio" name="q1" value="a">
                            <label>Une fois par jour</label>
                        </div>
                        <div class="option animate delay-100">
                            <input type="radio" name="q1" value="b">
                            <label>Deux fois par jour</label>
                        </div>
                        <div class="option animate delay-200">
                            <input type="radio" name="q1" value="c">
                            <label>A volonte en permanence</label>
                        </div>
                        <div class="option animate delay-300">
                            <input type="radio" name="q1" value="d">
                            <label>Trois fois par semaine</label>
                        </div>
                    </div>
                    <div class="question">
                        <h2 class="animate">A quelle frequence doit-on nourrir un chat adulte ?</h2>
                        <div class="nextPrev">
                            <button class="prev" type="button"><i class="fa-solid fa-arrow-left"></i></button>
                            <button class="next" type="button" data-step="1"><i class="fa-solid fa-arrow-right"></i></button>
                        </div>
                        <div class="fill"></div>
                    </div>
                </fieldset>

                <!-- Question 2: Eau -->
                <fieldset id="step2">
                    <div class="slide-illustration">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/images/illustrations/4_playful cat.png" alt="" aria-hidden="true">
                    </div>
                    <div class="question-number">Question 2/10</div>
                    <div class="d-flex flex-wrap options">
                        <div class="option animate">
                            <input type="radio" name="q2" value="a">
                            <label>Une fois par semaine</label>
                        </div>
                        <div class="option animate delay-100">
                            <input type="radio" name="q2" value="b">
                            <label>Tous les jours</label>
                        </div>
                        <div class="option animate delay-200">
                            <input type="radio" name="q2" value="c">
                            <label>Quand elle est vide</label>
                        </div>
                        <div class="option animate delay-300">
                            <input type="radio" name="q2" value="d">
                            <label>Une fois par mois</label>
                        </div>
                    </div>
                    <div class="question">
                        <h2 class="animate">A quelle frequence faut-il changer l'eau d'un chat ?</h2>
                        <div class="nextPrev">
                            <button class="prev" type="button"><i class="fa-solid fa-arrow-left"></i></button>
                            <button class="next" type="button" data-step="2"><i class="fa-solid fa-arrow-right"></i></button>
                        </div>
                        <div class="fill"></div>
                    </div>
                </fieldset>

                <!-- Question 3: Litiere -->
                <fieldset id="step3">
                    <div class="slide-illustration">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/images/illustrations/5_little cat.png" alt="" aria-hidden="true">
                    </div>
                    <div class="question-number">Question 3/10</div>
                    <div class="d-flex flex-wrap options">
                        <div class="option animate">
                            <input type="radio" name="q3" value="a">
                            <label>Dans un coin isole et calme</label>
                        </div>
                        <div class="option animate delay-100">
                            <input type="radio" name="q3" value="b">
                            <label>Pres de sa gamelle</label>
                        </div>
                        <div class="option animate delay-200">
                            <input type="radio" name="q3" value="c">
                            <label>Dans un lieu de passage</label>
                        </div>
                        <div class="option animate delay-300">
                            <input type="radio" name="q3" value="d">
                            <label>Dehors uniquement</label>
                        </div>
                    </div>
                    <div class="question">
                        <h2 class="animate">Ou doit-on placer la litiere d'un chat ?</h2>
                        <div class="nextPrev">
                            <button class="prev" type="button"><i class="fa-solid fa-arrow-left"></i></button>
                            <button class="next" type="button" data-step="3"><i class="fa-solid fa-arrow-right"></i></button>
                        </div>
                        <div class="fill"></div>
                    </div>
                </fieldset>

                <!-- Question 4: Veterinaire -->
                <fieldset id="step4">
                    <div class="slide-illustration">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/images/illustrations/6_kitten.png" alt="" aria-hidden="true">
                    </div>
                    <div class="question-number">Question 4/10</div>
                    <div class="d-flex flex-wrap options">
                        <div class="option animate">
                            <input type="radio" name="q4" value="a">
                            <label>Uniquement s'il est malade</label>
                        </div>
                        <div class="option animate delay-100">
                            <input type="radio" name="q4" value="b">
                            <label>Jamais si bien nourri</label>
                        </div>
                        <div class="option animate delay-200">
                            <input type="radio" name="q4" value="c">
                            <label>Au moins une fois par an</label>
                        </div>
                        <div class="option animate delay-300">
                            <input type="radio" name="q4" value="d">
                            <label>Tous les mois</label>
                        </div>
                    </div>
                    <div class="question">
                        <h2 class="animate">A quelle frequence un chat doit-il voir le veterinaire ?</h2>
                        <div class="nextPrev">
                            <button class="prev" type="button"><i class="fa-solid fa-arrow-left"></i></button>
                            <button class="next" type="button" data-step="4"><i class="fa-solid fa-arrow-right"></i></button>
                        </div>
                        <div class="fill"></div>
                    </div>
                </fieldset>

                <!-- Question 5: Sterilisation -->
                <fieldset id="step5">
                    <div class="slide-illustration">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/images/illustrations/7_pretty cat.png" alt="" aria-hidden="true">
                    </div>
                    <div class="question-number">Question 5/10</div>
                    <div class="d-flex flex-wrap options">
                        <div class="option animate">
                            <input type="radio" name="q5" value="a">
                            <label>Evite les portees non desirees et problemes de sante</label>
                        </div>
                        <div class="option animate delay-100">
                            <input type="radio" name="q5" value="b">
                            <label>Rend le chat triste</label>
                        </div>
                        <div class="option animate delay-200">
                            <input type="radio" name="q5" value="c">
                            <label>N'a aucun interet</label>
                        </div>
                        <div class="option animate delay-300">
                            <input type="radio" name="q5" value="d">
                            <label>Fait grossir automatiquement</label>
                        </div>
                    </div>
                    <div class="question">
                        <h2 class="animate">Quel est l'interet principal de la sterilisation ?</h2>
                        <div class="nextPrev">
                            <button class="prev" type="button"><i class="fa-solid fa-arrow-left"></i></button>
                            <button class="next" type="button" data-step="5"><i class="fa-solid fa-arrow-right"></i></button>
                        </div>
                        <div class="fill"></div>
                    </div>
                </fieldset>

                <!-- Question 6: Aliments toxiques -->
                <fieldset id="step6">
                    <div class="slide-illustration">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/images/illustrations/8_meaow.png" alt="" aria-hidden="true">
                    </div>
                    <div class="question-number">Question 6/10</div>
                    <div class="d-flex flex-wrap options">
                        <div class="option animate">
                            <input type="radio" name="q6" value="a">
                            <label>Poulet cuit</label>
                        </div>
                        <div class="option animate delay-100">
                            <input type="radio" name="q6" value="b">
                            <label>Chocolat</label>
                        </div>
                        <div class="option animate delay-200">
                            <input type="radio" name="q6" value="c">
                            <label>Croquettes pour chat</label>
                        </div>
                        <div class="option animate delay-300">
                            <input type="radio" name="q6" value="d">
                            <label>Courgette cuite</label>
                        </div>
                    </div>
                    <div class="question">
                        <h2 class="animate">Quel aliment est toxique pour les chats ?</h2>
                        <div class="nextPrev">
                            <button class="prev" type="button"><i class="fa-solid fa-arrow-left"></i></button>
                            <button class="next" type="button" data-step="6"><i class="fa-solid fa-arrow-right"></i></button>
                        </div>
                        <div class="fill"></div>
                    </div>
                </fieldset>

                <!-- Question 7: Griffoir -->
                <fieldset id="step7">
                    <div class="slide-illustration">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/images/illustrations/9_shocked cat.png" alt="" aria-hidden="true">
                    </div>
                    <div class="question-number">Question 7/10</div>
                    <div class="d-flex flex-wrap options">
                        <div class="option animate">
                            <input type="radio" name="q7" value="a">
                            <label>Pour l'occuper uniquement</label>
                        </div>
                        <div class="option animate delay-100">
                            <input type="radio" name="q7" value="b">
                            <label>Pour entretenir ses griffes et marquer son territoire</label>
                        </div>
                        <div class="option animate delay-200">
                            <input type="radio" name="q7" value="c">
                            <label>Ce n'est pas necessaire</label>
                        </div>
                        <div class="option animate delay-300">
                            <input type="radio" name="q7" value="d">
                            <label>Pour le punir</label>
                        </div>
                    </div>
                    <div class="question">
                        <h2 class="animate">Pourquoi un chat a-t-il besoin d'un griffoir ?</h2>
                        <div class="nextPrev">
                            <button class="prev" type="button"><i class="fa-solid fa-arrow-left"></i></button>
                            <button class="next" type="button" data-step="7"><i class="fa-solid fa-arrow-right"></i></button>
                        </div>
                        <div class="fill"></div>
                    </div>
                </fieldset>

                <!-- Question 8: Sommeil -->
                <fieldset id="step8">
                    <div class="slide-illustration">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/images/illustrations/13_sleeping cat.png" alt="" aria-hidden="true">
                    </div>
                    <div class="question-number">Question 8/10</div>
                    <div class="d-flex flex-wrap options">
                        <div class="option animate">
                            <input type="radio" name="q8" value="a">
                            <label>4 a 6 heures</label>
                        </div>
                        <div class="option animate delay-100">
                            <input type="radio" name="q8" value="b">
                            <label>8 a 10 heures</label>
                        </div>
                        <div class="option animate delay-200">
                            <input type="radio" name="q8" value="c">
                            <label>12 a 16 heures</label>
                        </div>
                        <div class="option animate delay-300">
                            <input type="radio" name="q8" value="d">
                            <label>20 a 24 heures</label>
                        </div>
                    </div>
                    <div class="question">
                        <h2 class="animate">Combien d'heures par jour un chat adulte dort-il en moyenne ?</h2>
                        <div class="nextPrev">
                            <button class="prev" type="button"><i class="fa-solid fa-arrow-left"></i></button>
                            <button class="next" type="button" data-step="8"><i class="fa-solid fa-arrow-right"></i></button>
                        </div>
                        <div class="fill"></div>
                    </div>
                </fieldset>

                <!-- Question 9: Signes de stress -->
                <fieldset id="step9">
                    <div class="slide-illustration">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/images/illustrations/10_naughty cat.png" alt="" aria-hidden="true">
                    </div>
                    <div class="question-number">Question 9/10</div>
                    <div class="d-flex flex-wrap options">
                        <div class="option animate">
                            <input type="radio" name="q9" value="a">
                            <label>Ronronnement constant</label>
                        </div>
                        <div class="option animate delay-100">
                            <input type="radio" name="q9" value="b">
                            <label>Lechage excessif ou perte d'appetit</label>
                        </div>
                        <div class="option animate delay-200">
                            <input type="radio" name="q9" value="c">
                            <label>Jouer activement</label>
                        </div>
                        <div class="option animate delay-300">
                            <input type="radio" name="q9" value="d">
                            <label>Dormir normalement</label>
                        </div>
                    </div>
                    <div class="question">
                        <h2 class="animate">Quel comportement peut indiquer qu'un chat est stresse ?</h2>
                        <div class="nextPrev">
                            <button class="prev" type="button"><i class="fa-solid fa-arrow-left"></i></button>
                            <button class="next" type="button" data-step="9"><i class="fa-solid fa-arrow-right"></i></button>
                        </div>
                        <div class="fill"></div>
                    </div>
                </fieldset>

                <!-- Question 10: Adoption -->
                <fieldset id="step10">
                    <div class="slide-illustration">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/images/illustrations/14_orange cat.png" alt="" aria-hidden="true">
                    </div>
                    <div class="question-number">Question 10/10</div>
                    <div class="d-flex flex-wrap options">
                        <div class="option animate">
                            <input type="radio" name="q10" value="a">
                            <label>Le forcer a explorer</label>
                        </div>
                        <div class="option animate delay-100">
                            <input type="radio" name="q10" value="b">
                            <label>L'isoler completement</label>
                        </div>
                        <div class="option animate delay-200">
                            <input type="radio" name="q10" value="c">
                            <label>Lui laisser du temps dans un espace securise</label>
                        </div>
                        <div class="option animate delay-300">
                            <input type="radio" name="q10" value="d">
                            <label>Inviter beaucoup de monde</label>
                        </div>
                    </div>
                    <div class="question">
                        <h2 class="animate">Comment accueillir un nouveau chat a la maison ?</h2>
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
            <p>Calcul de vos resultats...</p>
        </div>
    </div>

    <!-- Page de resultats - Format paysage -->
    <div class="result_page">
        <div class="result_inner">
            <!-- Partie gauche - Score -->
            <div class="result_content">
                <header class="resultheader">
                    <i class="fas fa-trophy"></i>
                    Vos Resultats
                </header>

                <div class="result_msg">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/quiz/check.png" alt="succes">
                    <span class="result_msg_text">Felicitations !</span>
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
                        <div class="lvl-name">Debutant<br><small>0-49%</small></div>
                    </div>
                    <div class="lvl-single">
                        <div class="lvl-color medium"></div>
                        <div class="lvl-name">Bon<br><small>50-79%</small></div>
                    </div>
                    <div class="lvl-single">
                        <div class="lvl-color high"></div>
                        <div class="lvl-name">Expert<br><small>80-100%</small></div>
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

    <!-- Scripts -->
    <script src="<?php echo get_template_directory_uri(); ?>/assets/js/jquery.min.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/assets/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/assets/js/quiz-adoption.js"></script>

    <?php wp_footer(); ?>
</body>
</html>
