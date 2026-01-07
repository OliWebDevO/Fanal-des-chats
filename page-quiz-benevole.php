<?php
/**
 * Template Name: Quiz Benevole
 * Description: Quiz pour les candidats benevoles
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz Benevole - <?php bloginfo('name'); ?></title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700&family=Open+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/bootstrap.min.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <!-- Quiz Styles (meme design que quiz adoption) -->
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
            <a href="<?php echo home_url('/service-single'); ?>" class="btn-back">
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
                    <h1>Quiz Benevole</h1>
                    <p class="lead">Evaluez votre profil de benevole pour rejoindre notre equipe au Fanal des Chats !</p>
                    <p>Ce quiz de 10 questions evaluera :</p>
                    <ul class="intro-list">
                        <li><i class="fas fa-heart"></i> Votre motivation</li>
                        <li><i class="fas fa-clock"></i> Vos disponibilites</li>
                        <li><i class="fas fa-paw"></i> Votre experience</li>
                        <li><i class="fas fa-hands-helping"></i> Vos aptitudes</li>
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

                <!-- Question 1: Experience avec les animaux -->
                <fieldset id="step1">
                    <div class="slide-illustration">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/images/illustrations/3_cute cat.png" alt="" aria-hidden="true">
                    </div>
                    <div class="question-number">Question 1/10</div>
                    <div class="d-flex flex-wrap options">
                        <div class="option animate">
                            <input type="radio" name="q1" value="a">
                            <label>Aucune experience</label>
                        </div>
                        <div class="option animate delay-100">
                            <input type="radio" name="q1" value="b">
                            <label>J'ai eu des animaux de compagnie</label>
                        </div>
                        <div class="option animate delay-200">
                            <input type="radio" name="q1" value="c">
                            <label>Experience en refuge ou association</label>
                        </div>
                        <div class="option animate delay-300">
                            <input type="radio" name="q1" value="d">
                            <label>Formation professionnelle animaliere</label>
                        </div>
                    </div>
                    <div class="question">
                        <h2 class="animate">Quelle est votre experience avec les animaux ?</h2>
                        <div class="nextPrev">
                            <button class="prev" type="button"><i class="fa-solid fa-arrow-left"></i></button>
                            <button class="next" type="button" data-step="1"><i class="fa-solid fa-arrow-right"></i></button>
                        </div>
                        <div class="fill"></div>
                    </div>
                </fieldset>

                <!-- Question 2: Disponibilites -->
                <fieldset id="step2">
                    <div class="slide-illustration">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/images/illustrations/4_playful cat.png" alt="" aria-hidden="true">
                    </div>
                    <div class="question-number">Question 2/10</div>
                    <div class="d-flex flex-wrap options">
                        <div class="option animate">
                            <input type="radio" name="q2" value="a">
                            <label>Moins de 2 heures par semaine</label>
                        </div>
                        <div class="option animate delay-100">
                            <input type="radio" name="q2" value="b">
                            <label>2 a 4 heures par semaine</label>
                        </div>
                        <div class="option animate delay-200">
                            <input type="radio" name="q2" value="c">
                            <label>4 a 8 heures par semaine</label>
                        </div>
                        <div class="option animate delay-300">
                            <input type="radio" name="q2" value="d">
                            <label>Plus de 8 heures par semaine</label>
                        </div>
                    </div>
                    <div class="question">
                        <h2 class="animate">Combien de temps pouvez-vous consacrer au benevolat ?</h2>
                        <div class="nextPrev">
                            <button class="prev" type="button"><i class="fa-solid fa-arrow-left"></i></button>
                            <button class="next" type="button" data-step="2"><i class="fa-solid fa-arrow-right"></i></button>
                        </div>
                        <div class="fill"></div>
                    </div>
                </fieldset>

                <!-- Question 3: Capacites physiques -->
                <fieldset id="step3">
                    <div class="slide-illustration">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/images/illustrations/5_little cat.png" alt="" aria-hidden="true">
                    </div>
                    <div class="question-number">Question 3/10</div>
                    <div class="d-flex flex-wrap options">
                        <div class="option animate">
                            <input type="radio" name="q3" value="a">
                            <label>Je prefere les taches legeres</label>
                        </div>
                        <div class="option animate delay-100">
                            <input type="radio" name="q3" value="b">
                            <label>Je peux faire des efforts moderes</label>
                        </div>
                        <div class="option animate delay-200">
                            <input type="radio" name="q3" value="c">
                            <label>Bonne condition physique</label>
                        </div>
                        <div class="option animate delay-300">
                            <input type="radio" name="q3" value="d">
                            <label>Tres bonne endurance</label>
                        </div>
                    </div>
                    <div class="question">
                        <h2 class="animate">Comment evaluez-vous vos capacites physiques pour le travail au refuge ?</h2>
                        <div class="nextPrev">
                            <button class="prev" type="button"><i class="fa-solid fa-arrow-left"></i></button>
                            <button class="next" type="button" data-step="3"><i class="fa-solid fa-arrow-right"></i></button>
                        </div>
                        <div class="fill"></div>
                    </div>
                </fieldset>

                <!-- Question 4: Situation professionnelle -->
                <fieldset id="step4">
                    <div class="slide-illustration">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/images/illustrations/6_kitten.png" alt="" aria-hidden="true">
                    </div>
                    <div class="question-number">Question 4/10</div>
                    <div class="d-flex flex-wrap options">
                        <div class="option animate">
                            <input type="radio" name="q4" value="a">
                            <label>En activite professionnelle</label>
                        </div>
                        <div class="option animate delay-100">
                            <input type="radio" name="q4" value="b">
                            <label>Etudiant(e)</label>
                        </div>
                        <div class="option animate delay-200">
                            <input type="radio" name="q4" value="c">
                            <label>Retraite(e)</label>
                        </div>
                        <div class="option animate delay-300">
                            <input type="radio" name="q4" value="d">
                            <label>Sans emploi / En recherche</label>
                        </div>
                    </div>
                    <div class="question">
                        <h2 class="animate">Quelle est votre situation actuelle ?</h2>
                        <div class="nextPrev">
                            <button class="prev" type="button"><i class="fa-solid fa-arrow-left"></i></button>
                            <button class="next" type="button" data-step="4"><i class="fa-solid fa-arrow-right"></i></button>
                        </div>
                        <div class="fill"></div>
                    </div>
                </fieldset>

                <!-- Question 5: Animaux malades -->
                <fieldset id="step5">
                    <div class="slide-illustration">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/images/illustrations/7_pretty cat.png" alt="" aria-hidden="true">
                    </div>
                    <div class="question-number">Question 5/10</div>
                    <div class="d-flex flex-wrap options">
                        <div class="option animate">
                            <input type="radio" name="q5" value="a">
                            <label>Je prefere eviter cette situation</label>
                        </div>
                        <div class="option animate delay-100">
                            <input type="radio" name="q5" value="b">
                            <label>Je peux le faire avec accompagnement</label>
                        </div>
                        <div class="option animate delay-200">
                            <input type="radio" name="q5" value="c">
                            <label>Je suis a l'aise avec ca</label>
                        </div>
                        <div class="option animate delay-300">
                            <input type="radio" name="q5" value="d">
                            <label>J'ai deja de l'experience dans ce domaine</label>
                        </div>
                    </div>
                    <div class="question">
                        <h2 class="animate">Comment reagiriez-vous face a un animal malade ou blesse ?</h2>
                        <div class="nextPrev">
                            <button class="prev" type="button"><i class="fa-solid fa-arrow-left"></i></button>
                            <button class="next" type="button" data-step="5"><i class="fa-solid fa-arrow-right"></i></button>
                        </div>
                        <div class="fill"></div>
                    </div>
                </fieldset>

                <!-- Question 6: Type de taches -->
                <fieldset id="step6">
                    <div class="slide-illustration">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/images/illustrations/8_meaow.png" alt="" aria-hidden="true">
                    </div>
                    <div class="question-number">Question 6/10</div>
                    <div class="d-flex flex-wrap options">
                        <div class="option animate">
                            <input type="radio" name="q6" value="a">
                            <label>Soins et nourrissage des chats</label>
                        </div>
                        <div class="option animate delay-100">
                            <input type="radio" name="q6" value="b">
                            <label>Nettoyage et entretien</label>
                        </div>
                        <div class="option animate delay-200">
                            <input type="radio" name="q6" value="c">
                            <label>Accueil et communication</label>
                        </div>
                        <div class="option animate delay-300">
                            <input type="radio" name="q6" value="d">
                            <label>Toutes les taches m'interessent</label>
                        </div>
                    </div>
                    <div class="question">
                        <h2 class="animate">Quel type de taches vous interesse le plus ?</h2>
                        <div class="nextPrev">
                            <button class="prev" type="button"><i class="fa-solid fa-arrow-left"></i></button>
                            <button class="next" type="button" data-step="6"><i class="fa-solid fa-arrow-right"></i></button>
                        </div>
                        <div class="fill"></div>
                    </div>
                </fieldset>

                <!-- Question 7: Travail en equipe -->
                <fieldset id="step7">
                    <div class="slide-illustration">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/images/illustrations/9_shocked cat.png" alt="" aria-hidden="true">
                    </div>
                    <div class="question-number">Question 7/10</div>
                    <div class="d-flex flex-wrap options">
                        <div class="option animate">
                            <input type="radio" name="q7" value="a">
                            <label>Je prefere travailler seul(e)</label>
                        </div>
                        <div class="option animate delay-100">
                            <input type="radio" name="q7" value="b">
                            <label>En petit groupe de 2-3 personnes</label>
                        </div>
                        <div class="option animate delay-200">
                            <input type="radio" name="q7" value="c">
                            <label>En equipe plus large</label>
                        </div>
                        <div class="option animate delay-300">
                            <input type="radio" name="q7" value="d">
                            <label>Je m'adapte a toutes les situations</label>
                        </div>
                    </div>
                    <div class="question">
                        <h2 class="animate">Comment preferez-vous travailler ?</h2>
                        <div class="nextPrev">
                            <button class="prev" type="button"><i class="fa-solid fa-arrow-left"></i></button>
                            <button class="next" type="button" data-step="7"><i class="fa-solid fa-arrow-right"></i></button>
                        </div>
                        <div class="fill"></div>
                    </div>
                </fieldset>

                <!-- Question 8: Motivation -->
                <fieldset id="step8">
                    <div class="slide-illustration">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/images/illustrations/13_sleeping cat.png" alt="" aria-hidden="true">
                    </div>
                    <div class="question-number">Question 8/10</div>
                    <div class="d-flex flex-wrap options">
                        <div class="option animate">
                            <input type="radio" name="q8" value="a">
                            <label>Occuper mon temps libre</label>
                        </div>
                        <div class="option animate delay-100">
                            <input type="radio" name="q8" value="b">
                            <label>Acquerir de l'experience</label>
                        </div>
                        <div class="option animate delay-200">
                            <input type="radio" name="q8" value="c">
                            <label>Amour des animaux</label>
                        </div>
                        <div class="option animate delay-300">
                            <input type="radio" name="q8" value="d">
                            <label>M'engager pour une cause</label>
                        </div>
                    </div>
                    <div class="question">
                        <h2 class="animate">Quelle est votre principale motivation pour devenir benevole ?</h2>
                        <div class="nextPrev">
                            <button class="prev" type="button"><i class="fa-solid fa-arrow-left"></i></button>
                            <button class="next" type="button" data-step="8"><i class="fa-solid fa-arrow-right"></i></button>
                        </div>
                        <div class="fill"></div>
                    </div>
                </fieldset>

                <!-- Question 9: Situations difficiles -->
                <fieldset id="step9">
                    <div class="slide-illustration">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/images/illustrations/10_naughty cat.png" alt="" aria-hidden="true">
                    </div>
                    <div class="question-number">Question 9/10</div>
                    <div class="d-flex flex-wrap options">
                        <div class="option animate">
                            <input type="radio" name="q9" value="a">
                            <label>Cela serait tres difficile pour moi</label>
                        </div>
                        <div class="option animate delay-100">
                            <input type="radio" name="q9" value="b">
                            <label>J'aurais besoin de soutien</label>
                        </div>
                        <div class="option animate delay-200">
                            <input type="radio" name="q9" value="c">
                            <label>Je peux gerer mes emotions</label>
                        </div>
                        <div class="option animate delay-300">
                            <input type="radio" name="q9" value="d">
                            <label>J'ai deja vecu ce type de situation</label>
                        </div>
                    </div>
                    <div class="question">
                        <h2 class="animate">Comment gerer la fin de vie ou le deces d'un animal du refuge ?</h2>
                        <div class="nextPrev">
                            <button class="prev" type="button"><i class="fa-solid fa-arrow-left"></i></button>
                            <button class="next" type="button" data-step="9"><i class="fa-solid fa-arrow-right"></i></button>
                        </div>
                        <div class="fill"></div>
                    </div>
                </fieldset>

                <!-- Question 10: Engagement -->
                <fieldset id="step10">
                    <div class="slide-illustration">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/images/illustrations/14_orange cat.png" alt="" aria-hidden="true">
                    </div>
                    <div class="question-number">Question 10/10</div>
                    <div class="d-flex flex-wrap options">
                        <div class="option animate">
                            <input type="radio" name="q10" value="a">
                            <label>Quelques semaines pour essayer</label>
                        </div>
                        <div class="option animate delay-100">
                            <input type="radio" name="q10" value="b">
                            <label>Quelques mois</label>
                        </div>
                        <div class="option animate delay-200">
                            <input type="radio" name="q10" value="c">
                            <label>Au moins un an</label>
                        </div>
                        <div class="option animate delay-300">
                            <input type="radio" name="q10" value="d">
                            <label>Le plus longtemps possible</label>
                        </div>
                    </div>
                    <div class="question">
                        <h2 class="animate">Sur quelle duree envisagez-vous de vous engager ?</h2>
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
            <p>Analyse de votre profil...</p>
        </div>
    </div>

    <!-- Page de resultats -->
    <div class="result_page">
        <div class="result_inner">
            <!-- Partie gauche - Score -->
            <div class="result_content">
                <header class="resultheader">
                    <i class="fas fa-user-check"></i>
                    Votre Profil
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
                        <div class="lvl-name">Motive<br><small>50-79%</small></div>
                    </div>
                    <div class="lvl-single">
                        <div class="lvl-color high"></div>
                        <div class="lvl-name">Ideal<br><small>80-100%</small></div>
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
                    <a href="<?php echo home_url('/service-single'); ?>" class="btn-adopt">
                        <i class="fas fa-arrow-left"></i> Retour
                    </a>
                    <button type="button" class="btn-see-errors" id="seeErrorsBtn" style="display: none;">
                        <i class="fas fa-arrow-down"></i> Voir mes reponses
                    </button>
                    <button type="button" class="btn-retry" onclick="location.reload()">
                        <i class="fas fa-redo"></i> Refaire le quiz
                    </button>
                </footer>
            </div>
        </div>

        <!-- Section reponses -->
        <div class="errors-section" id="errorsSection">
            <h2 class="errors-title"><i class="fas fa-clipboard-list"></i> Vos reponses</h2>
            <div class="errors-list" id="errorsList">
                <!-- Les reponses seront ajoutees dynamiquement par JS -->
            </div>
        </div>
    </div>

    <div id="error"></div>

    <!-- Scripts -->
    <script src="<?php echo get_template_directory_uri(); ?>/assets/js/jquery.min.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/assets/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/assets/js/quiz-benevole.js"></script>

    <?php wp_footer(); ?>
</body>
</html>
