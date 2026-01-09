/**
 * Quiz Don - JavaScript
 * Le Fanal des Chats
 * Quiz informatif sur les dons aux ASBL en Belgique
 */

(function($) {
    'use strict';

    // Configuration
    const TOTAL_QUESTIONS = 10;
    const TIME_LIMIT = 120; // secondes

    // Donnees des questions avec bonnes reponses et explications
    const QUESTIONS_DATA = {
        q1: {
            question: "Quel pourcentage de reduction d'impot un particulier obtient-il pour un don a une ASBL agreee en Belgique ?",
            answers: {
                a: "25% du montant du don",
                b: "45% du montant du don",
                c: "66% du montant du don",
                d: "100% du montant du don"
            },
            correct: "b",
            explanation: "En Belgique, les dons a des ASBL agreees donnent droit a une reduction d'impot de 45% du montant donne. C'est un avantage fiscal significatif qui encourage la generosite !"
        },
        q2: {
            question: "Quel est le montant minimum de don pour beneficier d'une attestation fiscale en Belgique ?",
            answers: {
                a: "Aucun montant minimum",
                b: "40 euros minimum par an",
                c: "100 euros minimum par an",
                d: "250 euros minimum par an"
            },
            correct: "b",
            explanation: "Le montant minimum est de 40 euros par an et par institution pour recevoir une attestation fiscale. Les dons peuvent etre cumules sur l'annee pour atteindre ce seuil."
        },
        q3: {
            question: "Jusqu'a quel pourcentage du revenu net imposable les dons sont-ils deductibles en Belgique ?",
            answers: {
                a: "5% du revenu net imposable",
                b: "10% du revenu net imposable",
                c: "20% du revenu net imposable",
                d: "Aucun plafond"
            },
            correct: "b",
            explanation: "Les dons sont deductibles jusqu'a 10% du revenu net imposable, avec un maximum de 397.850 euros (montant indexe pour 2024). C'est une limite genereuse qui permet des dons importants."
        },
        q4: {
            question: "Une entreprise belge peut-elle beneficier d'avantages fiscaux pour ses dons a une ASBL agreee ?",
            answers: {
                a: "Non, seuls les particuliers peuvent deduire",
                b: "Oui, les dons sont deductibles comme charges",
                c: "Uniquement les grandes entreprises",
                d: "Seulement avec un accord prealable du fisc"
            },
            correct: "b",
            explanation: "Les entreprises peuvent deduire leurs dons comme charges professionnelles dans les memes limites que les particuliers. C'est un excellent moyen de soutenir des causes tout en optimisant sa fiscalite."
        },
        q5: {
            question: "Quelles ASBL permettent de beneficier d'une reduction d'impot pour les dons ?",
            answers: {
                a: "Toutes les ASBL donnent droit a une deduction",
                b: "Seules les ASBL agreees par le SPF Finances",
                c: "Uniquement les ASBL de plus de 10 ans",
                d: "Seulement les ASBL internationales"
            },
            correct: "b",
            explanation: "Seules les ASBL agreees par le SPF Finances peuvent delivrer des attestations fiscales. Le Fanal des Chats est une ASBL agreee, vos dons sont donc deductibles !"
        },
        q6: {
            question: "Comment fonctionne l'attestation fiscale pour les dons en Belgique ?",
            answers: {
                a: "C'est au donateur de la demander au fisc",
                b: "L'ASBL l'envoie automatiquement via Tax-on-web",
                c: "Elle n'est plus necessaire depuis 2020",
                d: "Seule la banque peut l'emettre"
            },
            correct: "b",
            explanation: "Depuis 2021, les ASBL agreees transmettent automatiquement les attestations fiscales au SPF Finances. Vos dons apparaissent pre-remplis dans Tax-on-web, facilitant votre declaration !"
        },
        q7: {
            question: "Quels types de dons donnent droit a une attestation fiscale ?",
            answers: {
                a: "Uniquement les dons en especes/virements",
                b: "Dons en argent et en nature (materiel, etc.)",
                c: "Seulement les dons superieurs a 1000 euros",
                d: "Uniquement les dons mensuels reguliers"
            },
            correct: "a",
            explanation: "Seuls les dons en argent (virements, cheques) donnent droit a une attestation fiscale. Les dons en nature (nourriture, materiel) sont tres apprecies mais ne sont pas fiscalement deductibles."
        },
        q8: {
            question: "Outre la deduction fiscale, quel autre avantage une entreprise tire-t-elle du mecenat ?",
            answers: {
                a: "Aucun avantage supplementaire",
                b: "Amelioration de l'image et RSE",
                c: "Reduction des cotisations sociales",
                d: "Exemption de TVA totale"
            },
            correct: "b",
            explanation: "Le mecenat ameliore l'image de l'entreprise et renforce sa Responsabilite Societale (RSE). C'est un atout pour attirer clients et talents sensibles aux valeurs ethiques et environnementales."
        },
        q9: {
            question: "Comment declarer vos dons dans votre declaration fiscale belge ?",
            answers: {
                a: "Les renseigner manuellement dans la declaration",
                b: "Ils apparaissent automatiquement dans Tax-on-web",
                c: "Envoyer les preuves par courrier au fisc",
                d: "Aucune demarche, c'est automatique sans rien verifier"
            },
            correct: "b",
            explanation: "Les dons aux ASBL agreees apparaissent automatiquement pre-remplis dans Tax-on-web. Il suffit de verifier les montants et de valider. Gardez vos preuves de paiement en cas de controle."
        },
        q10: {
            question: "Comment les ASBL agreees garantissent-elles la transparence sur l'utilisation des dons ?",
            answers: {
                a: "Elles n'ont aucune obligation de transparence",
                b: "Seul un rapport interne suffit",
                c: "Publication des comptes annuels et rapport d'activites",
                d: "Un simple remerciement au donateur"
            },
            correct: "c",
            explanation: "Les ASBL agreees doivent publier leurs comptes annuels et sont controlees. Au Fanal des Chats, nous communiquons regulierement sur l'utilisation des dons pour une transparence totale."
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
            // Calculer le score (bonnes reponses)
            let correctAnswers = 0;

            for (const [question, answer] of Object.entries(userAnswers)) {
                if (QUESTIONS_DATA[question] && QUESTIONS_DATA[question].correct === answer) {
                    correctAnswers++;
                }
            }

            const percentage = Math.round((correctAnswers / TOTAL_QUESTIONS) * 100);

            // Afficher les resultats
            displayResults(percentage, correctAnswers);
        }, 1500);
    }

    function displayResults(percentage, correctAnswers) {
        // Mettre a jour le pourcentage
        $('.u_prcnt').text(percentage + '%');

        // Animer la barre de progression
        setTimeout(function() {
            $('.prcnt_bar .fill').css('width', percentage + '%');
        }, 500);

        // Determiner le niveau et les couleurs
        let level, color, message, advice;

        if (percentage < 50) {
            level = 'Novice';
            color = '#dc3545';
            message = 'A approfondir';
            advice = "Vous decouvrez les avantages fiscaux des dons en Belgique ! Sachez que vos dons au Fanal des Chats vous permettent une reduction d'impot de 45% (minimum 40 euros/an). Consultez les bonnes reponses pour en apprendre plus sur cette legislation avantageuse.";
            $('.result_msg img').attr('src', $('.result_msg img').attr('src').replace('check.png', 'cross.png'));
        } else if (percentage < 80) {
            level = 'Informe';
            color = '#fd7e14';
            message = 'Bonne connaissance !';
            advice = "Vous connaissez bien les bases de la fiscalite des dons en Belgique. Rappel : vos dons au Fanal des Chats sont deductibles a 45% et l'attestation est envoyee automatiquement au fisc. Parcourez les reponses pour completer vos connaissances !";
            $('.result_msg img').attr('src', $('.result_msg img').attr('src').replace('check.png', 'warning.png').replace('cross.png', 'warning.png'));
        } else {
            level = 'Expert';
            color = '#28a745';
            message = 'Excellent !';
            advice = "Vous maitrisez parfaitement la legislation belge sur les dons aux ASBL ! Vous savez que le Fanal des Chats est une ASBL agreee et que vos dons sont deductibles. Partagez ces connaissances autour de vous pour encourager la generosite !";
        }

        // Appliquer les couleurs
        $('.u_prcnt, .prcnt_bar_lvl, .result_msg').css('color', color);
        $('.prcnt_bar .fill').css('background-color', color);
        $('.prcnt_bar_lvl').text(level);
        $('.result_msg_text').text(message);
        $('.advice_text').text(advice);

        // Generer la liste des reponses
        displayAllAnswers();

        // Afficher la page de resultats
        setTimeout(function() {
            $('.loadingresult').hide();
            $('.result_page').addClass('result_page_show');
        }, 500);
    }

    function displayAllAnswers() {
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

            if (questionData) {
                const isCorrect = userAnswer === questionData.correct;
                const correctAnswer = questionData.answers[questionData.correct];
                const userAnswerText = userAnswer ? questionData.answers[userAnswer] : 'Non repondu';

                let answerHtml = `
                    <div class="error-item">
                        <div class="error-question-number">Question ${i}</div>
                        <div class="error-question-text">${questionData.question}</div>
                        <div class="error-answers">
                `;

                if (isCorrect) {
                    answerHtml += `
                            <div class="error-correct-answer">
                                <i class="fas fa-check"></i>
                                <span><strong>Votre reponse :</strong> ${userAnswerText}</span>
                            </div>
                    `;
                } else {
                    answerHtml += `
                            <div class="error-your-answer">
                                <i class="fas fa-times"></i>
                                <span><strong>Votre reponse :</strong> ${userAnswerText}</span>
                            </div>
                            <div class="error-correct-answer">
                                <i class="fas fa-check"></i>
                                <span><strong>Bonne reponse :</strong> ${correctAnswer}</span>
                            </div>
                    `;
                }

                answerHtml += `
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
