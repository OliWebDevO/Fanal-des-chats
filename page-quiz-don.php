<?php
/**
 * Template Name: Quiz Don
 * Description: Quiz informatif sur les dons aux ASBL en Belgique
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz Don - <?php bloginfo('name'); ?></title>

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
            <a href="<?php echo home_url('/don'); ?>" class="btn-back">
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
                    <h1>Quiz Don</h1>
                    <p class="lead">Testez vos connaissances sur les dons aux ASBL en Belgique !</p>
                    <p>Ce quiz de 10 questions vous informera sur :</p>
                    <ul class="intro-list">
                        <li><i class="fas fa-hand-holding-heart"></i> Les avantages fiscaux pour particuliers</li>
                        <li><i class="fas fa-building"></i> Les avantages pour les entreprises</li>
                        <li><i class="fas fa-balance-scale"></i> La legislation belge</li>
                        <li><i class="fas fa-certificate"></i> Les ASBL agreees</li>
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

                <!-- Question 1: Deduction fiscale particuliers -->
                <fieldset id="step1">
                    <div class="slide-illustration">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/images/illustrations/3_cute cat.png" alt="" aria-hidden="true">
                    </div>
                    <div class="question-number">Question 1/10</div>
                    <div class="d-flex flex-wrap options">
                        <div class="option animate">
                            <input type="radio" name="q1" value="a">
                            <label>25% du montant du don</label>
                        </div>
                        <div class="option animate delay-100">
                            <input type="radio" name="q1" value="b">
                            <label>45% du montant du don</label>
                        </div>
                        <div class="option animate delay-200">
                            <input type="radio" name="q1" value="c">
                            <label>66% du montant du don</label>
                        </div>
                        <div class="option animate delay-300">
                            <input type="radio" name="q1" value="d">
                            <label>100% du montant du don</label>
                        </div>
                    </div>
                    <div class="question">
                        <h2 class="animate">Quel pourcentage de reduction d'impot un particulier obtient-il pour un don a une ASBL agreee en Belgique ?</h2>
                        <div class="nextPrev">
                            <button class="prev" type="button"><i class="fa-solid fa-arrow-left"></i></button>
                            <button class="next" type="button" data-step="1"><i class="fa-solid fa-arrow-right"></i></button>
                        </div>
                        <div class="fill"></div>
                    </div>
                </fieldset>

                <!-- Question 2: Montant minimum -->
                <fieldset id="step2">
                    <div class="slide-illustration">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/images/illustrations/4_playful cat.png" alt="" aria-hidden="true">
                    </div>
                    <div class="question-number">Question 2/10</div>
                    <div class="d-flex flex-wrap options">
                        <div class="option animate">
                            <input type="radio" name="q2" value="a">
                            <label>Aucun montant minimum</label>
                        </div>
                        <div class="option animate delay-100">
                            <input type="radio" name="q2" value="b">
                            <label>40 euros minimum par an</label>
                        </div>
                        <div class="option animate delay-200">
                            <input type="radio" name="q2" value="c">
                            <label>100 euros minimum par an</label>
                        </div>
                        <div class="option animate delay-300">
                            <input type="radio" name="q2" value="d">
                            <label>250 euros minimum par an</label>
                        </div>
                    </div>
                    <div class="question">
                        <h2 class="animate">Quel est le montant minimum de don pour beneficier d'une attestation fiscale en Belgique ?</h2>
                        <div class="nextPrev">
                            <button class="prev" type="button"><i class="fa-solid fa-arrow-left"></i></button>
                            <button class="next" type="button" data-step="2"><i class="fa-solid fa-arrow-right"></i></button>
                        </div>
                        <div class="fill"></div>
                    </div>
                </fieldset>

                <!-- Question 3: Plafond deductible -->
                <fieldset id="step3">
                    <div class="slide-illustration">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/images/illustrations/5_little cat.png" alt="" aria-hidden="true">
                    </div>
                    <div class="question-number">Question 3/10</div>
                    <div class="d-flex flex-wrap options">
                        <div class="option animate">
                            <input type="radio" name="q3" value="a">
                            <label>5% du revenu net imposable</label>
                        </div>
                        <div class="option animate delay-100">
                            <input type="radio" name="q3" value="b">
                            <label>10% du revenu net imposable</label>
                        </div>
                        <div class="option animate delay-200">
                            <input type="radio" name="q3" value="c">
                            <label>20% du revenu net imposable</label>
                        </div>
                        <div class="option animate delay-300">
                            <input type="radio" name="q3" value="d">
                            <label>Aucun plafond</label>
                        </div>
                    </div>
                    <div class="question">
                        <h2 class="animate">Jusqu'a quel pourcentage du revenu net imposable les dons sont-ils deductibles en Belgique ?</h2>
                        <div class="nextPrev">
                            <button class="prev" type="button"><i class="fa-solid fa-arrow-left"></i></button>
                            <button class="next" type="button" data-step="3"><i class="fa-solid fa-arrow-right"></i></button>
                        </div>
                        <div class="fill"></div>
                    </div>
                </fieldset>

                <!-- Question 4: Entreprises -->
                <fieldset id="step4">
                    <div class="slide-illustration">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/images/illustrations/6_kitten.png" alt="" aria-hidden="true">
                    </div>
                    <div class="question-number">Question 4/10</div>
                    <div class="d-flex flex-wrap options">
                        <div class="option animate">
                            <input type="radio" name="q4" value="a">
                            <label>Non, seuls les particuliers peuvent deduire</label>
                        </div>
                        <div class="option animate delay-100">
                            <input type="radio" name="q4" value="b">
                            <label>Oui, les dons sont deductibles comme charges</label>
                        </div>
                        <div class="option animate delay-200">
                            <input type="radio" name="q4" value="c">
                            <label>Uniquement les grandes entreprises</label>
                        </div>
                        <div class="option animate delay-300">
                            <input type="radio" name="q4" value="d">
                            <label>Seulement avec un accord prealable du fisc</label>
                        </div>
                    </div>
                    <div class="question">
                        <h2 class="animate">Une entreprise belge peut-elle beneficier d'avantages fiscaux pour ses dons a une ASBL agreee ?</h2>
                        <div class="nextPrev">
                            <button class="prev" type="button"><i class="fa-solid fa-arrow-left"></i></button>
                            <button class="next" type="button" data-step="4"><i class="fa-solid fa-arrow-right"></i></button>
                        </div>
                        <div class="fill"></div>
                    </div>
                </fieldset>

                <!-- Question 5: ASBL agreee -->
                <fieldset id="step5">
                    <div class="slide-illustration">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/images/illustrations/7_pretty cat.png" alt="" aria-hidden="true">
                    </div>
                    <div class="question-number">Question 5/10</div>
                    <div class="d-flex flex-wrap options">
                        <div class="option animate">
                            <input type="radio" name="q5" value="a">
                            <label>Toutes les ASBL donnent droit a une deduction</label>
                        </div>
                        <div class="option animate delay-100">
                            <input type="radio" name="q5" value="b">
                            <label>Seules les ASBL agreees par le SPF Finances</label>
                        </div>
                        <div class="option animate delay-200">
                            <input type="radio" name="q5" value="c">
                            <label>Uniquement les ASBL de plus de 10 ans</label>
                        </div>
                        <div class="option animate delay-300">
                            <input type="radio" name="q5" value="d">
                            <label>Seulement les ASBL internationales</label>
                        </div>
                    </div>
                    <div class="question">
                        <h2 class="animate">Quelles ASBL permettent de beneficier d'une reduction d'impot pour les dons ?</h2>
                        <div class="nextPrev">
                            <button class="prev" type="button"><i class="fa-solid fa-arrow-left"></i></button>
                            <button class="next" type="button" data-step="5"><i class="fa-solid fa-arrow-right"></i></button>
                        </div>
                        <div class="fill"></div>
                    </div>
                </fieldset>

                <!-- Question 6: Attestation fiscale -->
                <fieldset id="step6">
                    <div class="slide-illustration">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/images/illustrations/8_meaow.png" alt="" aria-hidden="true">
                    </div>
                    <div class="question-number">Question 6/10</div>
                    <div class="d-flex flex-wrap options">
                        <div class="option animate">
                            <input type="radio" name="q6" value="a">
                            <label>C'est au donateur de la demander au fisc</label>
                        </div>
                        <div class="option animate delay-100">
                            <input type="radio" name="q6" value="b">
                            <label>L'ASBL l'envoie automatiquement via Tax-on-web</label>
                        </div>
                        <div class="option animate delay-200">
                            <input type="radio" name="q6" value="c">
                            <label>Elle n'est plus necessaire depuis 2020</label>
                        </div>
                        <div class="option animate delay-300">
                            <input type="radio" name="q6" value="d">
                            <label>Seule la banque peut l'emettre</label>
                        </div>
                    </div>
                    <div class="question">
                        <h2 class="animate">Comment fonctionne l'attestation fiscale pour les dons en Belgique ?</h2>
                        <div class="nextPrev">
                            <button class="prev" type="button"><i class="fa-solid fa-arrow-left"></i></button>
                            <button class="next" type="button" data-step="6"><i class="fa-solid fa-arrow-right"></i></button>
                        </div>
                        <div class="fill"></div>
                    </div>
                </fieldset>

                <!-- Question 7: Types de dons -->
                <fieldset id="step7">
                    <div class="slide-illustration">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/images/illustrations/9_shocked cat.png" alt="" aria-hidden="true">
                    </div>
                    <div class="question-number">Question 7/10</div>
                    <div class="d-flex flex-wrap options">
                        <div class="option animate">
                            <input type="radio" name="q7" value="a">
                            <label>Uniquement les dons en especes/virements</label>
                        </div>
                        <div class="option animate delay-100">
                            <input type="radio" name="q7" value="b">
                            <label>Dons en argent et en nature (materiel, etc.)</label>
                        </div>
                        <div class="option animate delay-200">
                            <input type="radio" name="q7" value="c">
                            <label>Seulement les dons superieurs a 1000 euros</label>
                        </div>
                        <div class="option animate delay-300">
                            <input type="radio" name="q7" value="d">
                            <label>Uniquement les dons mensuels reguliers</label>
                        </div>
                    </div>
                    <div class="question">
                        <h2 class="animate">Quels types de dons donnent droit a une attestation fiscale ?</h2>
                        <div class="nextPrev">
                            <button class="prev" type="button"><i class="fa-solid fa-arrow-left"></i></button>
                            <button class="next" type="button" data-step="7"><i class="fa-solid fa-arrow-right"></i></button>
                        </div>
                        <div class="fill"></div>
                    </div>
                </fieldset>

                <!-- Question 8: Mecenat entreprise -->
                <fieldset id="step8">
                    <div class="slide-illustration">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/images/illustrations/13_sleeping cat.png" alt="" aria-hidden="true">
                    </div>
                    <div class="question-number">Question 8/10</div>
                    <div class="d-flex flex-wrap options">
                        <div class="option animate">
                            <input type="radio" name="q8" value="a">
                            <label>Aucun avantage supplementaire</label>
                        </div>
                        <div class="option animate delay-100">
                            <input type="radio" name="q8" value="b">
                            <label>Amelioration de l'image et RSE</label>
                        </div>
                        <div class="option animate delay-200">
                            <input type="radio" name="q8" value="c">
                            <label>Reduction des cotisations sociales</label>
                        </div>
                        <div class="option animate delay-300">
                            <input type="radio" name="q8" value="d">
                            <label>Exemption de TVA totale</label>
                        </div>
                    </div>
                    <div class="question">
                        <h2 class="animate">Outre la deduction fiscale, quel autre avantage une entreprise tire-t-elle du mecenat ?</h2>
                        <div class="nextPrev">
                            <button class="prev" type="button"><i class="fa-solid fa-arrow-left"></i></button>
                            <button class="next" type="button" data-step="8"><i class="fa-solid fa-arrow-right"></i></button>
                        </div>
                        <div class="fill"></div>
                    </div>
                </fieldset>

                <!-- Question 9: Declaration fiscale -->
                <fieldset id="step9">
                    <div class="slide-illustration">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/images/illustrations/10_naughty cat.png" alt="" aria-hidden="true">
                    </div>
                    <div class="question-number">Question 9/10</div>
                    <div class="d-flex flex-wrap options">
                        <div class="option animate">
                            <input type="radio" name="q9" value="a">
                            <label>Les renseigner manuellement dans la declaration</label>
                        </div>
                        <div class="option animate delay-100">
                            <input type="radio" name="q9" value="b">
                            <label>Ils apparaissent automatiquement dans Tax-on-web</label>
                        </div>
                        <div class="option animate delay-200">
                            <input type="radio" name="q9" value="c">
                            <label>Envoyer les preuves par courrier au fisc</label>
                        </div>
                        <div class="option animate delay-300">
                            <input type="radio" name="q9" value="d">
                            <label>Aucune demarche, c'est automatique sans rien verifier</label>
                        </div>
                    </div>
                    <div class="question">
                        <h2 class="animate">Comment declarer vos dons dans votre declaration fiscale belge ?</h2>
                        <div class="nextPrev">
                            <button class="prev" type="button"><i class="fa-solid fa-arrow-left"></i></button>
                            <button class="next" type="button" data-step="9"><i class="fa-solid fa-arrow-right"></i></button>
                        </div>
                        <div class="fill"></div>
                    </div>
                </fieldset>

                <!-- Question 10: Impact des dons -->
                <fieldset id="step10">
                    <div class="slide-illustration">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/images/illustrations/14_orange cat.png" alt="" aria-hidden="true">
                    </div>
                    <div class="question-number">Question 10/10</div>
                    <div class="d-flex flex-wrap options">
                        <div class="option animate">
                            <input type="radio" name="q10" value="a">
                            <label>Elles n'ont aucune obligation de transparence</label>
                        </div>
                        <div class="option animate delay-100">
                            <input type="radio" name="q10" value="b">
                            <label>Seul un rapport interne suffit</label>
                        </div>
                        <div class="option animate delay-200">
                            <input type="radio" name="q10" value="c">
                            <label>Publication des comptes annuels et rapport d'activites</label>
                        </div>
                        <div class="option animate delay-300">
                            <input type="radio" name="q10" value="d">
                            <label>Un simple remerciement au donateur</label>
                        </div>
                    </div>
                    <div class="question">
                        <h2 class="animate">Comment les ASBL agreees garantissent-elles la transparence sur l'utilisation des dons ?</h2>
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

    <!-- Page de resultats -->
    <div class="result_page">
        <div class="result_inner">
            <!-- Partie gauche - Score -->
            <div class="result_content">
                <header class="resultheader">
                    <i class="fas fa-hand-holding-heart"></i>
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
                        <div class="lvl-name">Novice<br><small>0-49%</small></div>
                    </div>
                    <div class="lvl-single">
                        <div class="lvl-color medium"></div>
                        <div class="lvl-name">Informe<br><small>50-79%</small></div>
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
                    <h3><i class="fas fa-lightbulb"></i> A retenir</h3>
                    <p class="advice_text"></p>
                </div>

                <footer class="resultfooter">
                    <a href="<?php echo home_url('/don'); ?>" class="btn-adopt">
                        <i class="fas fa-arrow-left"></i> Retour aux dons
                    </a>
                    <button type="button" class="btn-see-errors" id="seeErrorsBtn" style="display: none;">
                        <i class="fas fa-arrow-down"></i> Voir les reponses
                    </button>
                    <button type="button" class="btn-retry" onclick="location.reload()">
                        <i class="fas fa-redo"></i> Refaire le quiz
                    </button>
                </footer>
            </div>
        </div>

        <!-- Section reponses -->
        <div class="errors-section" id="errorsSection">
            <h2 class="errors-title"><i class="fas fa-clipboard-list"></i> Toutes les reponses</h2>
            <div class="errors-list" id="errorsList">
                <!-- Les reponses seront ajoutees dynamiquement par JS -->
            </div>
        </div>
    </div>

    <div id="error"></div>

    <!-- Scripts -->
    <script src="<?php echo get_template_directory_uri(); ?>/assets/js/jquery.min.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/assets/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/assets/js/quiz-don.js"></script>

    <?php wp_footer(); ?>
</body>
</html>
