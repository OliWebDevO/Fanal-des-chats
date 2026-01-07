/**
 * Quiz Adoption - JavaScript
 * Le Fanal des Chats
 */

(function($) {
    'use strict';

    // Configuration
    const TOTAL_QUESTIONS = 10;
    const TIME_LIMIT = 90; // secondes

    // Donnees des questions avec reponses et explications
    const QUESTIONS_DATA = {
        q1: {
            question: "A quelle frequence doit-on nourrir un chat adulte ?",
            correct: 'b',
            answers: {
                a: "Une fois par jour",
                b: "Deux fois par jour",
                c: "A volonte en permanence",
                d: "Trois fois par semaine"
            },
            explanation: "Un chat adulte doit etre nourri deux fois par jour, matin et soir. Cela permet de reguler son alimentation et d'eviter le surpoids tout en respectant son rythme naturel de predateur."
        },
        q2: {
            question: "A quelle frequence faut-il changer l'eau d'un chat ?",
            correct: 'b',
            answers: {
                a: "Une fois par semaine",
                b: "Tous les jours",
                c: "Quand elle est vide",
                d: "Une fois par mois"
            },
            explanation: "L'eau doit etre changee tous les jours pour rester fraiche et propre. Les chats sont tres sensibles a la qualite de l'eau et boiront davantage si elle est fraiche, ce qui est essentiel pour leur sante renale."
        },
        q3: {
            question: "Ou doit-on placer la litiere d'un chat ?",
            correct: 'a',
            answers: {
                a: "Dans un coin isole et calme",
                b: "Pres de sa gamelle",
                c: "Dans un lieu de passage",
                d: "Dehors uniquement"
            },
            explanation: "La litiere doit etre placee dans un endroit calme et accessible, loin de la nourriture. Les chats ont besoin d'intimite pour faire leurs besoins et n'aiment pas etre deranges."
        },
        q4: {
            question: "A quelle frequence un chat doit-il voir le veterinaire ?",
            correct: 'c',
            answers: {
                a: "Uniquement s'il est malade",
                b: "Jamais si bien nourri",
                c: "Au moins une fois par an",
                d: "Tous les mois"
            },
            explanation: "Un chat doit voir le veterinaire au moins une fois par an pour un bilan de sante et les rappels de vaccins. Les visites regulieres permettent de detecter precocement d'eventuels problemes de sante."
        },
        q5: {
            question: "Quel est l'interet principal de la sterilisation ?",
            correct: 'a',
            answers: {
                a: "Evite les portees non desirees et problemes de sante",
                b: "Rend le chat triste",
                c: "N'a aucun interet",
                d: "Fait grossir automatiquement"
            },
            explanation: "La sterilisation previent les portees non desirees et reduit les risques de certains cancers et infections. Elle contribue aussi a diminuer les comportements indesirables comme le marquage urinaire."
        },
        q6: {
            question: "Quel aliment est toxique pour les chats ?",
            correct: 'b',
            answers: {
                a: "Poulet cuit",
                b: "Chocolat",
                c: "Croquettes pour chat",
                d: "Courgette cuite"
            },
            explanation: "Le chocolat contient de la theobromine, une substance tres toxique pour les chats pouvant provoquer des troubles cardiaques et neurologiques graves, voire mortels."
        },
        q7: {
            question: "Pourquoi un chat a-t-il besoin d'un griffoir ?",
            correct: 'b',
            answers: {
                a: "Pour l'occuper uniquement",
                b: "Pour entretenir ses griffes et marquer son territoire",
                c: "Ce n'est pas necessaire",
                d: "Pour le punir"
            },
            explanation: "Le griffoir permet au chat d'entretenir ses griffes naturellement et de marquer son territoire visuellement et olfactivement. Sans griffoir, il utilisera vos meubles !"
        },
        q8: {
            question: "Combien d'heures par jour un chat adulte dort-il en moyenne ?",
            correct: 'c',
            answers: {
                a: "4 a 6 heures",
                b: "8 a 10 heures",
                c: "12 a 16 heures",
                d: "20 a 24 heures"
            },
            explanation: "Un chat adulte dort en moyenne 12 a 16 heures par jour. C'est un comportement naturel herite de leurs ancetres predateurs qui economisaient leur energie entre les chasses."
        },
        q9: {
            question: "Quel comportement peut indiquer qu'un chat est stresse ?",
            correct: 'b',
            answers: {
                a: "Ronronnement constant",
                b: "Lechage excessif ou perte d'appetit",
                c: "Jouer activement",
                d: "Dormir normalement"
            },
            explanation: "Le lechage excessif, la perte d'appetit, le fait de se cacher ou des changements de comportement peuvent indiquer un stress. Il est important d'identifier la cause et de consulter si necessaire."
        },
        q10: {
            question: "Comment accueillir un nouveau chat a la maison ?",
            correct: 'c',
            answers: {
                a: "Le forcer a explorer",
                b: "L'isoler completement",
                c: "Lui laisser du temps dans un espace securise",
                d: "Inviter beaucoup de monde"
            },
            explanation: "Un nouveau chat a besoin de temps pour s'adapter. Preparez une piece calme avec tout le necessaire et laissez-le explorer a son rythme. La patience est la cle d'une adoption reussie !"
        }
    };

    const CORRECT_ANSWERS = {
        q1: 'b',
        q2: 'b',
        q3: 'a',
        q4: 'c',
        q5: 'a',
        q6: 'b',
        q7: 'b',
        q8: 'c',
        q9: 'b',
        q10: 'c'
    };

    // Variables
    let currentStep = 0;
    let timeRemaining = TIME_LIMIT;
    let timerInterval = null;
    let userAnswers = {};

    // Elements DOM
    const $intro = $('#quizIntro');
    const $steps = $('#quizSteps');
    const $startBtn = $('#startQuiz');
    const $submitBtn = $('#submitQuiz');
    const $counterContainer = $('.counterContainer');
    const $countdownTimer = $('#countdown-timer');
    const $svgCircle = $('.counter circle');
    const $divs = $('#stepForm fieldset');

    // Initialisation
    $(document).ready(function() {
        init();
    });

    function init() {
        // Cacher le compteur au debut
        $counterContainer.hide();

        // Cacher toutes les questions sauf la premiere
        $divs.hide().first().show();

        // Event listeners
        $startBtn.on('click', startQuiz);

        // Selection d'option
        $('.option input').on('click', function() {
            $(this).closest('.options').find('.option').removeClass('selected');
            $(this).parent().addClass('selected');
        });

        // Boutons suivant
        $('.next').on('click', function() {
            const step = $(this).data('step');
            handleNext(step);
        });

        // Boutons precedent
        $('.prev').on('click', function() {
            handlePrev();
        });

        // Bouton soumettre
        $submitBtn.on('click', function() {
            handleSubmit();
        });

        // Bouton voir erreurs
        $('#seeErrorsBtn').on('click', function() {
            scrollToErrors();
        });
    }

    function startQuiz() {
        // Animation de sortie de l'intro
        $intro.fadeOut(500, function() {
            $steps.fadeIn(500);
            $counterContainer.fadeIn(500);
            startTimer();
        });
    }

    function startTimer() {
        const maxOffset = 440;
        const initialTime = TIME_LIMIT;

        timerInterval = setInterval(function() {
            if (timeRemaining <= 0) {
                clearInterval(timerInterval);
                handleTimeUp();
            } else {
                timeRemaining--;
                $countdownTimer.text(timeRemaining);

                // Mettre a jour le cercle SVG
                const offset = maxOffset - Math.floor((timeRemaining / initialTime) * maxOffset);
                $svgCircle.css('stroke-dashoffset', offset);

                // Changer la couleur si peu de temps restant
                if (timeRemaining <= 30) {
                    $svgCircle.css('stroke', '#fd7e14');
                }
                if (timeRemaining <= 10) {
                    $svgCircle.css('stroke', '#dc3545');
                }
            }
        }, 1000);
    }

    function handleTimeUp() {
        showError('Temps ecoule !');
        setTimeout(function() {
            calculateAndShowResults();
        }, 1500);
    }

    function handleNext(stepNumber) {
        const questionName = 'q' + stepNumber;

        // Verifier si une reponse est selectionnee
        if (!validateStep(stepNumber)) {
            showError('Veuillez selectionner une reponse !');
            return;
        }

        // Sauvegarder la reponse
        const selectedValue = $(`#step${stepNumber} input:checked`).val();
        userAnswers[questionName] = selectedValue;

        // Animation de sortie
        $(`#step${stepNumber} .option`).removeClass('animate').addClass('animateReverse');
        $(`#step${stepNumber} .question h2`).removeClass('animate').addClass('animateReverse');

        setTimeout(function() {
            nextStep();
        }, 400);
    }

    function handlePrev() {
        if (currentStep > 0) {
            prevStep();
        }
    }

    function handleSubmit() {
        // Verifier si la derniere question est repondue
        if (!validateStep(TOTAL_QUESTIONS)) {
            showError('Veuillez selectionner une reponse !');
            return;
        }

        // Sauvegarder la derniere reponse
        const selectedValue = $(`#step${TOTAL_QUESTIONS} input:checked`).val();
        userAnswers['q' + TOTAL_QUESTIONS] = selectedValue;

        // Arreter le timer
        clearInterval(timerInterval);

        // Calculer et afficher les resultats
        calculateAndShowResults();
    }

    function nextStep() {
        $divs.eq(currentStep).hide();
        currentStep++;
        if (currentStep < TOTAL_QUESTIONS) {
            $divs.eq(currentStep).show();
            updateProgressBar();

            // Ajouter les animations
            $(`#step${currentStep + 1} .option`).addClass('animate').removeClass('animateReverse');
            $(`#step${currentStep + 1} .question h2`).addClass('animate').removeClass('animateReverse');
        }
    }

    function prevStep() {
        $divs.eq(currentStep).hide();
        currentStep--;
        $divs.eq(currentStep).show();
        updateProgressBar();

        // Ajouter les animations
        $(`#step${currentStep + 1} .option`).addClass('animate').removeClass('animateReverse');
        $(`#step${currentStep + 1} .question h2`).addClass('animate').removeClass('animateReverse');
    }

    function validateStep(stepNumber) {
        return $(`#step${stepNumber} input:checked`).length > 0;
    }

    function updateProgressBar() {
        const progress = (currentStep / TOTAL_QUESTIONS) * 100;
        $('.question .fill').css('height', progress + '%');
    }

    function calculateAndShowResults() {
        // Afficher le loading
        $('.loadingresult').css('display', 'grid');

        setTimeout(function() {
            // Calculer le score
            let correctCount = 0;

            for (const [question, answer] of Object.entries(userAnswers)) {
                if (CORRECT_ANSWERS[question] === answer) {
                    correctCount++;
                }
            }

            const percentage = Math.round((correctCount / TOTAL_QUESTIONS) * 100);

            // Afficher les resultats
            displayResults(percentage, correctCount);
        }, 1500);
    }

    function displayResults(percentage, correctCount) {
        // Mettre a jour le pourcentage
        $('.u_prcnt').text(percentage + '%');

        // Animer la barre de progression
        setTimeout(function() {
            $('.prcnt_bar .fill').css('width', percentage + '%');
        }, 500);

        // Determiner le niveau et les couleurs
        let level, color, message, advice;

        if (percentage < 50) {
            level = 'Debutant';
            color = '#dc3545';
            message = 'Continuez a apprendre !';
            advice = "Pas de souci ! Prendre soin d'un chat demande des connaissances que vous pouvez facilement acquerir. Nous vous recommandons de discuter avec notre equipe qui pourra vous guider et repondre a toutes vos questions avant l'adoption.";
            $('.result_msg img').attr('src', $('.result_msg img').attr('src').replace('check.png', 'cross.png'));
        } else if (percentage < 80) {
            level = 'Bon';
            color = '#fd7e14';
            message = 'Bien joue !';
            advice = "Vous avez de bonnes bases ! Quelques points restent a approfondir, mais vous etes sur la bonne voie. Notre equipe sera ravie de completer vos connaissances lors de votre visite au refuge.";
            $('.result_msg img').attr('src', $('.result_msg img').attr('src').replace('check.png', 'warning.png').replace('cross.png', 'warning.png'));
        } else {
            level = 'Expert';
            color = '#28a745';
            message = 'Felicitations !';
            advice = "Excellent ! Vous avez d'excellentes connaissances sur le bien-etre felin. Vous etes pret(e) a accueillir un nouveau compagnon. Venez nous rendre visite pour rencontrer nos chats en attente d'adoption !";
        }

        // Appliquer les couleurs
        $('.u_prcnt, .prcnt_bar_lvl, .result_msg').css('color', color);
        $('.prcnt_bar .fill').css('background-color', color);
        $('.prcnt_bar_lvl').text(level);
        $('.result_msg_text').text(message);
        $('.advice_text').text(advice);

        // Generer la liste des erreurs
        displayErrors();

        // Afficher la page de resultats
        setTimeout(function() {
            $('.loadingresult').hide();
            $('.result_page').addClass('result_page_show');
        }, 500);
    }

    function displayErrors() {
        const $errorsList = $('#errorsList');
        $errorsList.empty();

        let errorCount = 0;

        // Parcourir toutes les questions pour trouver les erreurs
        for (let i = 1; i <= TOTAL_QUESTIONS; i++) {
            const questionKey = 'q' + i;
            const userAnswer = userAnswers[questionKey];
            const questionData = QUESTIONS_DATA[questionKey];

            // Si la reponse est incorrecte
            if (userAnswer && userAnswer !== questionData.correct) {
                errorCount++;

                const errorHtml = `
                    <div class="error-item">
                        <div class="error-question-number">Question ${i}</div>
                        <div class="error-question-text">${questionData.question}</div>
                        <div class="error-answers">
                            <div class="error-your-answer">
                                <i class="fas fa-times"></i>
                                <span><strong>Votre reponse :</strong> ${questionData.answers[userAnswer]}</span>
                            </div>
                            <div class="error-correct-answer">
                                <i class="fas fa-check"></i>
                                <span><strong>Bonne reponse :</strong> ${questionData.answers[questionData.correct]}</span>
                            </div>
                        </div>
                        <div class="error-explanation">
                            <strong><i class="fas fa-info-circle"></i> Explication :</strong> ${questionData.explanation}
                        </div>
                    </div>
                `;

                $errorsList.append(errorHtml);
            }
        }

        // Afficher ou cacher le bouton "Voir mes erreurs" selon le nombre d'erreurs
        if (errorCount > 0) {
            $('#seeErrorsBtn').show();
            $('#errorsSection').show();
        } else {
            $('#seeErrorsBtn').hide();
            $('#errorsSection').hide();
        }
    }

    function scrollToErrors() {
        const errorsSection = document.getElementById('errorsSection');
        if (errorsSection) {
            errorsSection.scrollIntoView({ behavior: 'smooth' });
        }
    }

    function showError(message) {
        const $error = $('<div class="alert alert-danger reveal">' + message + '</div>');
        $('#error').append($error);

        setTimeout(function() {
            $error.fadeOut(300, function() {
                $(this).remove();
            });
        }, 3000);
    }

})(jQuery);
