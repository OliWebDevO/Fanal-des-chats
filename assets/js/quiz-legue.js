/**
 * Quiz Legs - JavaScript
 * Le Fanal des Chats
 */

(function($) {
    'use strict';

    // Configuration
    const TOTAL_QUESTIONS = 10;
    const TIME_LIMIT = 120; // secondes

    // Données des questions avec bonnes réponses et explications
    const QUESTIONS_DATA = {
        q1: {
            question: "Qu'est-ce qu'un legs ?",
            answers: {
                a: "Un don effectué de son vivant",
                b: "Une disposition testamentaire au profit d'un bénéficiaire",
                c: "Un contrat d'assurance-vie",
                d: "Un prêt à long terme"
            },
            correct: "b",
            explanation: "Un legs est une disposition prise dans un testament par laquelle une personne transmet tout ou partie de ses biens à un bénéficiaire après son décès."
        },
        q2: {
            question: "Quel document est nécessaire pour faire un legs ?",
            answers: {
                a: "Un acte notarié obligatoire",
                b: "Un testament (olographe ou notarié)",
                c: "Une simple déclaration orale",
                d: "Un courrier envoyé à l'association"
            },
            correct: "b",
            explanation: "Un testament est indispensable. Il peut être olographe (écrit à la main) ou notarié (rédigé par un notaire). Les deux ont une valeur légale en Belgique."
        },
        q3: {
            question: "Quels types de legs existent en Belgique ?",
            answers: {
                a: "Le legs universel (totalité du patrimoine)",
                b: "Le legs particulier (un bien ou une somme précise)",
                c: "Le legs à titre universel (une quote-part)",
                d: "Toutes ces réponses sont correctes"
            },
            correct: "d",
            explanation: "Il existe trois types de legs : le legs universel (totalité), le legs à titre universel (une fraction du patrimoine) et le legs particulier (un bien ou une somme déterminée)."
        },
        q4: {
            question: "Quel est le taux de droits de succession pour un legs à une ASBL ?",
            answers: {
                a: "25%",
                b: "7% en Wallonie et à Bruxelles",
                c: "0% partout en Belgique",
                d: "Le même taux que pour les héritiers directs"
            },
            correct: "b",
            explanation: "En Wallonie et à Bruxelles, le taux de droits de succession pour un legs à une ASBL est de 7%. En Flandre, ce taux est de 0%, ce qui rend le legs encore plus avantageux."
        },
        q5: {
            question: "Peut-on modifier ou annuler un testament ?",
            answers: {
                a: "Non, c'est irréversible",
                b: "Oui, à tout moment de son vivant",
                c: "Uniquement dans les 6 mois",
                d: "Seulement avec l'accord du bénéficiaire"
            },
            correct: "b",
            explanation: "Un testament est toujours révocable. Vous pouvez le modifier ou l'annuler à tout moment de votre vivant, sans avoir à justifier votre décision ni à en informer les bénéficiaires."
        },
        q6: {
            question: "Que se passe-t-il pour les héritiers légaux si l'on fait un legs ?",
            answers: {
                a: "Ils ne reçoivent rien",
                b: "Ils conservent leur part réservataire",
                c: "Ils doivent donner leur accord",
                d: "Le legs est automatiquement annulé"
            },
            correct: "b",
            explanation: "La loi belge protège les héritiers réservataires (enfants, conjoint survivant) en leur garantissant une part minimale de l'héritage. Le legs ne peut porter que sur la quotité disponible."
        },
        q7: {
            question: "Quelle est la condition pour qu'un testament olographe soit valide ?",
            answers: {
                a: "Entièrement rédigé, daté et signé de la main du testateur",
                b: "Tapé à l'ordinateur et signé",
                c: "Dicté par téléphone à un notaire",
                d: "Envoyé par e-mail"
            },
            correct: "a",
            explanation: "Un testament olographe doit être entièrement écrit à la main, daté et signé par le testateur. Un testament tapé à l'ordinateur, même signé, n'est pas valable."
        },
        q8: {
            question: "Une association de protection animale peut-elle recevoir un legs ?",
            answers: {
                a: "Non, seules les personnes physiques peuvent hériter",
                b: "Oui, les ASBL peuvent recevoir des legs",
                c: "Uniquement les fondations d'utilité publique",
                d: "Seulement avec une autorisation ministérielle"
            },
            correct: "b",
            explanation: "Les ASBL, comme Le Fanal des Chats, peuvent tout à fait recevoir des legs. C'est un moyen puissant de soutenir durablement la cause animale au-delà de sa propre vie."
        },
        q9: {
            question: "Qu'est-ce que le legs en duo ?",
            answers: {
                a: "Un legs où l'on partage entre l'association et ses héritiers",
                b: "Un legs fait par deux personnes en même temps",
                c: "Un legs qui double de valeur après le décès",
                d: "Un legs partagé entre deux associations"
            },
            correct: "a",
            explanation: "Le legs en duo permet de léguer à une association tout en avantageant ses héritiers. L'association reçoit le legs universel et prend en charge les droits de succession des héritiers particuliers, qui reçoivent ainsi un montant net plus élevé."
        },
        q10: {
            question: "À quoi sert concrètement un legs fait au Fanal des Chats ?",
            answers: {
                a: "Uniquement acheter de la nourriture",
                b: "Financer les soins vétérinaires et le fonctionnement du refuge",
                c: "Distribuer l'argent aux bénévoles",
                d: "Un legs n'a aucun impact concret"
            },
            correct: "b",
            explanation: "Un legs au Fanal des Chats finance directement les soins vétérinaires, la nourriture, l'entretien du refuge et toutes les actions nécessaires pour recueillir, soigner et faire adopter les chats abandonnés."
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
        $counterContainer.hide();
        $divs.hide().first().show();

        $startBtn.on('click', startQuiz);

        $('.option input').on('click', function() {
            $(this).closest('.options').find('.option').removeClass('selected');
            $(this).parent().addClass('selected');
        });

        $('.next').on('click', function() {
            const step = $(this).data('step');
            handleNext(step);
        });

        $('.prev').on('click', function() {
            handlePrev();
        });

        $submitBtn.on('click', function() {
            handleSubmit();
        });

        $('#seeErrorsBtn').on('click', function() {
            scrollToErrors();
        });
    }

    function startQuiz() {
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

                const offset = maxOffset - Math.floor((timeRemaining / initialTime) * maxOffset);
                $svgCircle.css('stroke-dashoffset', offset);

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

        if (!validateStep(stepNumber)) {
            showError('Veuillez sélectionner une réponse !');
            return;
        }

        const selectedValue = $(`#step${stepNumber} input:checked`).val();
        userAnswers[questionName] = selectedValue;

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
        if (!validateStep(TOTAL_QUESTIONS)) {
            showError('Veuillez sélectionner une réponse !');
            return;
        }

        const selectedValue = $(`#step${TOTAL_QUESTIONS} input:checked`).val();
        userAnswers['q' + TOTAL_QUESTIONS] = selectedValue;

        clearInterval(timerInterval);
        calculateAndShowResults();
    }

    function nextStep() {
        $divs.eq(currentStep).hide();
        currentStep++;
        if (currentStep < TOTAL_QUESTIONS) {
            $divs.eq(currentStep).show();
            updateProgressBar();

            $(`#step${currentStep + 1} .option`).addClass('animate').removeClass('animateReverse');
            $(`#step${currentStep + 1} .question h2`).addClass('animate').removeClass('animateReverse');
        }
    }

    function prevStep() {
        $divs.eq(currentStep).hide();
        currentStep--;
        $divs.eq(currentStep).show();
        updateProgressBar();

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
        $('.loadingresult').css('display', 'grid');

        setTimeout(function() {
            let correctCount = 0;

            for (const [question, answer] of Object.entries(userAnswers)) {
                if (QUESTIONS_DATA[question] && QUESTIONS_DATA[question].correct === answer) {
                    correctCount++;
                }
            }

            const percentage = Math.round((correctCount / TOTAL_QUESTIONS) * 100);
            displayResults(percentage, correctCount);
        }, 1500);
    }

    function displayResults(percentage, correctCount) {
        $('.u_prcnt').text(percentage + '%');

        setTimeout(function() {
            $('.prcnt_bar .fill').css('width', percentage + '%');
        }, 500);

        let level, color, message, advice;

        if (percentage < 50) {
            level = 'Novice';
            color = '#dc3545';
            message = 'À approfondir';
            advice = "Le sujet des legs et successions est complexe, et c'est tout à fait normal de ne pas tout connaître. Nous vous invitons à consulter notre page dédiée ou à nous contacter pour en savoir plus sur cette démarche solidaire et ses avantages.";
            $('.result_msg img').attr('src', $('.result_msg img').attr('src').replace('check.png', 'cross.png'));
        } else if (percentage < 80) {
            level = 'Informé';
            color = '#fd7e14';
            message = 'Bien informé !';
            advice = "Vous avez de bonnes connaissances sur le sujet des legs. Quelques précisions vous aideraient à mieux comprendre les subtilités juridiques et fiscales. N'hésitez pas à consulter un notaire pour toute démarche concrète.";
            $('.result_msg img').attr('src', $('.result_msg img').attr('src').replace('check.png', 'warning.png').replace('cross.png', 'warning.png'));
        } else {
            level = 'Expert';
            color = '#28a745';
            message = 'Excellent !';
            advice = "Félicitations ! Vous maîtrisez très bien le sujet des legs et successions. Si vous envisagez de faire un legs au Fanal des Chats, n'hésitez pas à nous contacter pour un entretien confidentiel et personnalisé.";
        }

        $('.u_prcnt, .prcnt_bar_lvl, .result_msg').css('color', color);
        $('.prcnt_bar .fill').css('background-color', color);
        $('.prcnt_bar_lvl').text(level);
        $('.result_msg_text').text(message);
        $('.advice_text').text(advice);

        displayAnswers();

        setTimeout(function() {
            $('.loadingresult').hide();
            $('.result_page').addClass('result_page_show');
        }, 500);
    }

    function displayAnswers() {
        const $errorsList = $('#errorsList');
        $errorsList.empty();

        $('#seeErrorsBtn').show();
        $('#errorsSection').show();

        for (let i = 1; i <= TOTAL_QUESTIONS; i++) {
            const questionKey = 'q' + i;
            const userAnswer = userAnswers[questionKey];
            const questionData = QUESTIONS_DATA[questionKey];

            if (userAnswer && questionData) {
                const isCorrect = userAnswer === questionData.correct;

                const answerHtml = `
                    <div class="error-item">
                        <div class="error-question-number">Question ${i}</div>
                        <div class="error-question-text">${questionData.question}</div>
                        <div class="error-answers">
                            <div class="${isCorrect ? 'error-correct-answer' : 'error-your-answer'}">
                                <i class="fas ${isCorrect ? 'fa-check' : 'fa-times'}"></i>
                                <span><strong>Votre réponse :</strong> ${questionData.answers[userAnswer]}</span>
                            </div>
                            ${!isCorrect ? `
                            <div class="error-correct-answer">
                                <i class="fas fa-check"></i>
                                <span><strong>Bonne réponse :</strong> ${questionData.answers[questionData.correct]}</span>
                            </div>
                            ` : ''}
                        </div>
                        <div class="error-explanation">
                            <strong><i class="fas fa-info-circle"></i> Explication :</strong> ${questionData.explanation}
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
