/**
 * Quiz Famille d'accueil - JavaScript
 * Le Fanal des Chats
 */

(function($) {
    'use strict';

    // Configuration
    const TOTAL_QUESTIONS = 10;
    const TIME_LIMIT = 120; // secondes

    // Données des questions avec points et explications
    const QUESTIONS_DATA = {
        q1: {
            question: "Quel type de logement occupez-vous ?",
            answers: {
                a: "Studio ou petit appartement",
                b: "Appartement avec plusieurs pièces",
                c: "Maison sans jardin",
                d: "Maison avec jardin sécurisé"
            },
            points: { a: 1, b: 2, c: 3, d: 4 },
            explanation: "Un espace suffisant est important pour le bien-être des chats accueillis. Une pièce dédiée est idéale pour les premiers jours d'adaptation."
        },
        q2: {
            question: "Combien de temps êtes-vous présent(e) à la maison chaque jour ?",
            answers: {
                a: "Absent(e) plus de 10 heures par jour",
                b: "Absent(e) 6 à 8 heures par jour",
                c: "Présent(e) une bonne partie de la journée",
                d: "Présent(e) quasi en permanence"
            },
            points: { a: 1, b: 2, c: 3, d: 4 },
            explanation: "Les mamans chattes et les chatons nécessitent une surveillance régulière, surtout les premières semaines. Une présence fréquente est un atout majeur."
        },
        q3: {
            question: "Quelle est votre expérience avec les chats ?",
            answers: {
                a: "Aucune expérience avec les chats",
                b: "J'ai côtoyé des chats chez des proches",
                c: "J'ai ou j'ai eu des chats",
                d: "Expérience avec des chatons ou chats nécessitant des soins"
            },
            points: { a: 1, b: 2, c: 3, d: 4 },
            explanation: "L'expérience est un plus mais n'est pas indispensable. Nous formons toutes nos familles d'accueil et restons disponibles à tout moment."
        },
        q4: {
            question: "Avez-vous d'autres animaux à la maison ?",
            answers: {
                a: "J'ai un chien non habitué aux chats",
                b: "J'ai d'autres animaux compatibles",
                c: "J'ai un chat sociable",
                d: "Aucun autre animal au foyer"
            },
            points: { a: 1, b: 3, c: 3, d: 4 },
            explanation: "La cohabitation avec d'autres animaux est possible mais doit être gérée avec précaution. L'absence d'autres animaux facilite l'accueil de mamans chattes stressées."
        },
        q5: {
            question: "Y a-t-il des enfants dans votre foyer ?",
            answers: {
                a: "Enfants en bas âge (moins de 3 ans)",
                b: "Enfants entre 3 et 10 ans",
                c: "Adolescents ou enfants sensibilisés",
                d: "Pas d'enfants au foyer"
            },
            points: { a: 1, b: 2, c: 3, d: 4 },
            explanation: "Les enfants peuvent cohabiter avec les chats accueillis, mais il faut veiller à ce que le calme soit respecté, surtout avec des chatons fragiles ou des mamans allaitantes."
        },
        q6: {
            question: "Combien de temps pourriez-vous accueillir un chat ou des chatons ?",
            answers: {
                a: "Quelques jours seulement",
                b: "1 à 2 semaines",
                c: "1 à 2 mois",
                d: "Jusqu'à 3 mois ou plus si nécessaire"
            },
            points: { a: 1, b: 2, c: 3, d: 4 },
            explanation: "L'accueil dure généralement de quelques semaines à 3 mois, le temps que les chatons soient sevrés et prêts à l'adoption."
        },
        q7: {
            question: "Êtes-vous à l'aise pour administrer des soins aux chats ?",
            answers: {
                a: "Je ne suis pas à l'aise avec les soins",
                b: "Je peux administrer des soins simples",
                c: "Je suis capable de donner des médicaments",
                d: "J'ai l'habitude des soins vétérinaires courants"
            },
            points: { a: 1, b: 2, c: 3, d: 4 },
            explanation: "Il peut être nécessaire de donner des vermifuges, des médicaments ou de surveiller la santé des chatons. Nous vous accompagnons dans ces démarches."
        },
        q8: {
            question: "Comment réagiriez-vous au moment de rendre le chat pour son adoption ?",
            answers: {
                a: "Cela serait très difficile pour moi",
                b: "J'aurais du mal mais je comprends la démarche",
                c: "Je sais que c'est pour leur bien",
                d: "J'ai déjà vécu ce type de séparation"
            },
            points: { a: 1, b: 2, c: 3, d: 4 },
            explanation: "La séparation fait partie du rôle de famille d'accueil. C'est un moment émouvant mais aussi une grande fierté de savoir que le chat a trouvé son foyer définitif."
        },
        q9: {
            question: "Disposez-vous d'une pièce calme pour accueillir le chat ?",
            answers: {
                a: "Non, pas de pièce disponible",
                b: "Un coin aménageable dans une pièce",
                c: "Une pièce pouvant être isolée temporairement",
                d: "Une pièce entièrement dédiée à l'accueil"
            },
            points: { a: 1, b: 2, c: 3, d: 4 },
            explanation: "Une pièce calme et sécurisée est essentielle pour les premiers jours. Elle permet au chat de s'adapter en toute tranquillité à son nouvel environnement temporaire."
        },
        q10: {
            question: "Quelle est votre principale motivation pour devenir famille d'accueil ?",
            answers: {
                a: "Par curiosité, pour voir si ça me plaît",
                b: "Pour aider ponctuellement en cas d'urgence",
                c: "Pour offrir un foyer temporaire aux chats dans le besoin",
                d: "C'est un engagement que je souhaite sur le long terme"
            },
            points: { a: 1, b: 2, c: 3, d: 4 },
            explanation: "La motivation est le moteur essentiel d'une famille d'accueil. Un engagement sincère et durable fait toute la différence pour les chats que nous sauvons."
        }
    };

    // Variables
    let currentStep = 0;
    let timeRemaining = TIME_LIMIT;
    let timerInterval = null;
    let userAnswers = {};

    // Éléments DOM
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
        // Cacher le compteur au début
        $counterContainer.hide();

        // Cacher toutes les questions sauf la première
        $divs.hide().first().show();

        // Event listeners
        $startBtn.on('click', startQuiz);

        // Sélection d'option
        $('.option input').on('click', function() {
            $(this).closest('.options').find('.option').removeClass('selected');
            $(this).parent().addClass('selected');
        });

        // Boutons suivant
        $('.next').on('click', function() {
            const step = $(this).data('step');
            handleNext(step);
        });

        // Boutons précédent
        $('.prev').on('click', function() {
            handlePrev();
        });

        // Bouton soumettre
        $submitBtn.on('click', function() {
            handleSubmit();
        });

        // Bouton voir réponses
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

                // Mettre à jour le cercle SVG
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
        showError('Temps écoulé !');
        setTimeout(function() {
            calculateAndShowResults();
        }, 1500);
    }

    function handleNext(stepNumber) {
        const questionName = 'q' + stepNumber;

        // Vérifier si une réponse est sélectionnée
        if (!validateStep(stepNumber)) {
            showError('Veuillez sélectionner une réponse !');
            return;
        }

        // Sauvegarder la réponse
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
        // Vérifier si la dernière question est répondue
        if (!validateStep(TOTAL_QUESTIONS)) {
            showError('Veuillez sélectionner une réponse !');
            return;
        }

        // Sauvegarder la dernière réponse
        const selectedValue = $(`#step${TOTAL_QUESTIONS} input:checked`).val();
        userAnswers['q' + TOTAL_QUESTIONS] = selectedValue;

        // Arrêter le timer
        clearInterval(timerInterval);

        // Calculer et afficher les résultats
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
            // Calculer le score (points accumulés)
            let totalPoints = 0;
            const maxPoints = TOTAL_QUESTIONS * 4; // 4 points max par question

            for (const [question, answer] of Object.entries(userAnswers)) {
                if (QUESTIONS_DATA[question] && QUESTIONS_DATA[question].points[answer]) {
                    totalPoints += QUESTIONS_DATA[question].points[answer];
                }
            }

            const percentage = Math.round((totalPoints / maxPoints) * 100);

            // Afficher les résultats
            displayResults(percentage, totalPoints);
        }, 1500);
    }

    function displayResults(percentage, totalPoints) {
        // Mettre à jour le pourcentage
        $('.u_prcnt').text(percentage + '%');

        // Animer la barre de progression
        setTimeout(function() {
            $('.prcnt_bar .fill').css('width', percentage + '%');
        }, 500);

        // Déterminer le niveau et les couleurs
        let level, color, message, advice;

        if (percentage < 50) {
            level = 'À préparer';
            color = '#dc3545';
            message = 'Profil à développer';
            advice = "Votre profil montre que quelques ajustements seraient nécessaires pour accueillir un chat en toute sérénité. Pas d'inquiétude, nous pouvons en discuter ensemble et trouver des solutions adaptées à votre situation. Contactez-nous pour en savoir plus !";
            $('.result_msg img').attr('src', $('.result_msg img').attr('src').replace('check.png', 'cross.png'));
        } else if (percentage < 80) {
            level = 'Prometteur';
            color = '#fd7e14';
            message = 'Bon profil !';
            advice = "Vous avez un bon profil de famille d'accueil avec de solides atouts. Quelques points peuvent encore être améliorés, mais vous êtes sur la bonne voie. Contactez-nous pour discuter de votre candidature et préparer votre premier accueil !";
            $('.result_msg img').attr('src', $('.result_msg img').attr('src').replace('check.png', 'warning.png').replace('cross.png', 'warning.png'));
        } else {
            level = 'Idéal';
            color = '#28a745';
            message = 'Profil idéal !';
            advice = "Félicitations ! Votre profil correspond parfaitement à ce que nous recherchons pour nos familles d'accueil. Votre logement, votre disponibilité et votre expérience sont des atouts précieux. Nous serions ravis de vous compter parmi nos familles d'accueil au Fanal des Chats !";
        }

        // Appliquer les couleurs
        $('.u_prcnt, .prcnt_bar_lvl, .result_msg').css('color', color);
        $('.prcnt_bar .fill').css('background-color', color);
        $('.prcnt_bar_lvl').text(level);
        $('.result_msg_text').text(message);
        $('.advice_text').text(advice);

        // Générer la liste des réponses
        displayAnswers();

        // Afficher la page de résultats
        setTimeout(function() {
            $('.loadingresult').hide();
            $('.result_page').addClass('result_page_show');
        }, 500);
    }

    function displayAnswers() {
        const $errorsList = $('#errorsList');
        $errorsList.empty();

        // Toujours afficher le bouton pour voir les réponses
        $('#seeErrorsBtn').show();
        $('#errorsSection').show();

        // Parcourir toutes les questions
        for (let i = 1; i <= TOTAL_QUESTIONS; i++) {
            const questionKey = 'q' + i;
            const userAnswer = userAnswers[questionKey];
            const questionData = QUESTIONS_DATA[questionKey];

            if (userAnswer && questionData) {
                const points = questionData.points[userAnswer];

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
                                <span><strong>Votre réponse :</strong> ${questionData.answers[userAnswer]}</span>
                            </div>
                        </div>
                        <div class="error-explanation">
                            <strong><i class="fas fa-info-circle"></i> À savoir :</strong> ${questionData.explanation}
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
