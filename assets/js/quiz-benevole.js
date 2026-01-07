/**
 * Quiz Benevole - JavaScript
 * Le Fanal des Chats
 */

(function($) {
    'use strict';

    // Configuration
    const TOTAL_QUESTIONS = 10;
    const TIME_LIMIT = 120; // secondes

    // Donnees des questions avec points et explications
    const QUESTIONS_DATA = {
        q1: {
            question: "Quelle est votre experience avec les animaux ?",
            answers: {
                a: "Aucune experience",
                b: "J'ai eu des animaux de compagnie",
                c: "Experience en refuge ou association",
                d: "Formation professionnelle animaliere"
            },
            points: { a: 1, b: 2, c: 3, d: 4 },
            explanation: "Toute experience est valorisee ! Nous formons tous nos benevoles, quelle que soit leur experience initiale."
        },
        q2: {
            question: "Combien de temps pouvez-vous consacrer au benevolat ?",
            answers: {
                a: "Moins de 2 heures par semaine",
                b: "2 a 4 heures par semaine",
                c: "4 a 8 heures par semaine",
                d: "Plus de 8 heures par semaine"
            },
            points: { a: 1, b: 2, c: 3, d: 4 },
            explanation: "Nous demandons un minimum de 4 heures par semaine pour assurer une continuite dans le suivi des chats."
        },
        q3: {
            question: "Comment evaluez-vous vos capacites physiques pour le travail au refuge ?",
            answers: {
                a: "Je prefere les taches legeres",
                b: "Je peux faire des efforts moderes",
                c: "Bonne condition physique",
                d: "Tres bonne endurance"
            },
            points: { a: 2, b: 3, c: 3, d: 4 },
            explanation: "Le travail au refuge peut etre physique (nettoyage, port de charges). Des taches adaptees existent pour tous les profils."
        },
        q4: {
            question: "Quelle est votre situation actuelle ?",
            answers: {
                a: "En activite professionnelle",
                b: "Etudiant(e)",
                c: "Retraite(e)",
                d: "Sans emploi / En recherche"
            },
            points: { a: 3, b: 3, c: 4, d: 3 },
            explanation: "Toutes les situations sont bienvenues ! L'important est votre disponibilite et votre engagement."
        },
        q5: {
            question: "Comment reagiriez-vous face a un animal malade ou blesse ?",
            answers: {
                a: "Je prefere eviter cette situation",
                b: "Je peux le faire avec accompagnement",
                c: "Je suis a l'aise avec ca",
                d: "J'ai deja de l'experience dans ce domaine"
            },
            points: { a: 1, b: 2, c: 3, d: 4 },
            explanation: "Prendre soin d'animaux malades fait partie du quotidien au refuge. Nous vous accompagnerons dans cette demarche."
        },
        q6: {
            question: "Quel type de taches vous interesse le plus ?",
            answers: {
                a: "Soins et nourrissage des chats",
                b: "Nettoyage et entretien",
                c: "Accueil et communication",
                d: "Toutes les taches m'interessent"
            },
            points: { a: 3, b: 3, c: 3, d: 4 },
            explanation: "La polyvalence est appreciee, mais chacun peut aussi se specialiser selon ses affinites."
        },
        q7: {
            question: "Comment preferez-vous travailler ?",
            answers: {
                a: "Je prefere travailler seul(e)",
                b: "En petit groupe de 2-3 personnes",
                c: "En equipe plus large",
                d: "Je m'adapte a toutes les situations"
            },
            points: { a: 2, b: 3, c: 3, d: 4 },
            explanation: "Le travail en equipe est essentiel au refuge pour assurer une bonne coordination des soins."
        },
        q8: {
            question: "Quelle est votre principale motivation pour devenir benevole ?",
            answers: {
                a: "Occuper mon temps libre",
                b: "Acquerir de l'experience",
                c: "Amour des animaux",
                d: "M'engager pour une cause"
            },
            points: { a: 2, b: 3, c: 4, d: 4 },
            explanation: "La passion pour les animaux et l'engagement sont les moteurs de notre equipe de benevoles."
        },
        q9: {
            question: "Comment gerer la fin de vie ou le deces d'un animal du refuge ?",
            answers: {
                a: "Cela serait tres difficile pour moi",
                b: "J'aurais besoin de soutien",
                c: "Je peux gerer mes emotions",
                d: "J'ai deja vecu ce type de situation"
            },
            points: { a: 1, b: 2, c: 3, d: 4 },
            explanation: "Ces moments difficiles font partie de la realite du refuge. Notre equipe se soutient mutuellement."
        },
        q10: {
            question: "Sur quelle duree envisagez-vous de vous engager ?",
            answers: {
                a: "Quelques semaines pour essayer",
                b: "Quelques mois",
                c: "Au moins un an",
                d: "Le plus longtemps possible"
            },
            points: { a: 1, b: 2, c: 3, d: 4 },
            explanation: "Un engagement durable permet de creer des liens forts avec les chats et l'equipe."
        }
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

        // Bouton voir reponses
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
            // Calculer le score (points accumules)
            let totalPoints = 0;
            const maxPoints = TOTAL_QUESTIONS * 4; // 4 points max par question

            for (const [question, answer] of Object.entries(userAnswers)) {
                if (QUESTIONS_DATA[question] && QUESTIONS_DATA[question].points[answer]) {
                    totalPoints += QUESTIONS_DATA[question].points[answer];
                }
            }

            const percentage = Math.round((totalPoints / maxPoints) * 100);

            // Afficher les resultats
            displayResults(percentage, totalPoints);
        }, 1500);
    }

    function displayResults(percentage, totalPoints) {
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
            message = 'Profil a developper';
            advice = "Votre profil montre que le benevolat en refuge serait une nouvelle experience pour vous. C'est tout a fait normal ! Nous vous proposons de commencer par des taches simples et de vous former progressivement. Contactez-nous pour discuter de vos possibilites.";
            $('.result_msg img').attr('src', $('.result_msg img').attr('src').replace('check.png', 'cross.png'));
        } else if (percentage < 80) {
            level = 'Motive';
            color = '#fd7e14';
            message = 'Bon profil !';
            advice = "Vous avez un bon profil de benevole avec de la motivation et des disponibilites interessantes. Quelques aspects peuvent encore etre renforces, mais vous etes pret(e) a rejoindre notre equipe. Contactez-nous pour planifier votre integration !";
            $('.result_msg img').attr('src', $('.result_msg img').attr('src').replace('check.png', 'warning.png').replace('cross.png', 'warning.png'));
        } else {
            level = 'Ideal';
            color = '#28a745';
            message = 'Profil ideal !';
            advice = "Felicitations ! Votre profil correspond parfaitement a ce que nous recherchons. Votre experience, votre disponibilite et votre motivation font de vous un(e) candidat(e) ideal(e). Nous serions ravis de vous accueillir au Fanal des Chats !";
        }

        // Appliquer les couleurs
        $('.u_prcnt, .prcnt_bar_lvl, .result_msg').css('color', color);
        $('.prcnt_bar .fill').css('background-color', color);
        $('.prcnt_bar_lvl').text(level);
        $('.result_msg_text').text(message);
        $('.advice_text').text(advice);

        // Generer la liste des reponses
        displayAnswers();

        // Afficher la page de resultats
        setTimeout(function() {
            $('.loadingresult').hide();
            $('.result_page').addClass('result_page_show');
        }, 500);
    }

    function displayAnswers() {
        const $errorsList = $('#errorsList');
        $errorsList.empty();

        // Toujours afficher le bouton pour voir les reponses
        $('#seeErrorsBtn').show();
        $('#errorsSection').show();

        // Parcourir toutes les questions
        for (let i = 1; i <= TOTAL_QUESTIONS; i++) {
            const questionKey = 'q' + i;
            const userAnswer = userAnswers[questionKey];
            const questionData = QUESTIONS_DATA[questionKey];

            if (userAnswer && questionData) {
                const points = questionData.points[userAnswer];
                const maxPoints = 4;

                let pointsClass = 'error-your-answer';
                let pointsIcon = 'fa-circle';

                if (points >= 3) {
                    pointsClass = 'error-correct-answer';
                    pointsIcon = 'fa-check';
                } else if (points === 2) {
                    pointsClass = 'error-your-answer';
                    pointsIcon = 'fa-minus';
                }

                const answerHtml = `
                    <div class="error-item">
                        <div class="error-question-number">Question ${i}</div>
                        <div class="error-question-text">${questionData.question}</div>
                        <div class="error-answers">
                            <div class="${pointsClass}">
                                <i class="fas ${pointsIcon}"></i>
                                <span><strong>Votre reponse :</strong> ${questionData.answers[userAnswer]}</span>
                            </div>
                        </div>
                        <div class="error-explanation">
                            <strong><i class="fas fa-info-circle"></i> A savoir :</strong> ${questionData.explanation}
                        </div>
                    </div>
                `;

                $errorsList.append(answerHtml);
            }
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
