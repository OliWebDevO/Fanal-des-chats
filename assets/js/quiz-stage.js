/**
 * Quiz Stage - JavaScript
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
            question: "Quel est votre domaine d'etudes actuel ?",
            answers: {
                a: "Sans lien avec les animaux",
                b: "Communication, gestion ou administration",
                c: "Biologie, environnement ou sciences",
                d: "Veterinaire, soins animaliers ou auxiliaire"
            },
            points: { a: 1, b: 2, c: 3, d: 4 },
            explanation: "Tous les profils sont les bienvenus ! Un stage au refuge est enrichissant quel que soit votre domaine d'etudes."
        },
        q2: {
            question: "Quelle duree de stage souhaitez-vous effectuer ?",
            answers: {
                a: "Moins de 2 semaines",
                b: "2 a 4 semaines",
                c: "1 a 3 mois",
                d: "Plus de 3 mois"
            },
            points: { a: 1, b: 2, c: 3, d: 4 },
            explanation: "Un stage plus long permet une meilleure immersion et un apprentissage approfondi du fonctionnement du refuge."
        },
        q3: {
            question: "Quelle est votre experience prealable avec les animaux ?",
            answers: {
                a: "Aucune experience avec les animaux",
                b: "J'ai eu des animaux de compagnie",
                c: "Benevolat ou stage en lien avec les animaux",
                d: "Formation ou experience professionnelle animaliere"
            },
            points: { a: 1, b: 2, c: 3, d: 4 },
            explanation: "L'experience prealable est un atout, mais nous formons tous nos stagiaires sur le terrain."
        },
        q4: {
            question: "Quel type de missions preferez-vous durant votre stage ?",
            answers: {
                a: "Observation uniquement",
                b: "Administratif et communication",
                c: "Soins quotidiens et entretien",
                d: "Toutes les missions m'interessent"
            },
            points: { a: 1, b: 3, c: 3, d: 4 },
            explanation: "La polyvalence est un atout majeur en refuge. Chaque mission contribue au bien-etre des chats."
        },
        q5: {
            question: "Comment reagiriez-vous face a un animal craintif ?",
            answers: {
                a: "Je ne saurais pas comment reagir",
                b: "Je demanderais conseil a l'equipe",
                c: "Je lui laisserais du temps et de l'espace",
                d: "Je connais les techniques d'approche adaptees"
            },
            points: { a: 1, b: 2, c: 3, d: 4 },
            explanation: "Savoir aborder un animal craintif est essentiel. La patience et la douceur sont les cles pour gagner sa confiance."
        },
        q6: {
            question: "Comment preferez-vous travailler : en equipe ou en autonomie ?",
            answers: {
                a: "Je prefere etre guide(e) en permanence",
                b: "Je travaille mieux seul(e)",
                c: "J'aime collaborer en equipe",
                d: "Je m'adapte selon les besoins"
            },
            points: { a: 2, b: 2, c: 3, d: 4 },
            explanation: "Au refuge, le travail en equipe est quotidien. L'adaptabilite est une qualite tres appreciee chez nos stagiaires."
        },
        q7: {
            question: "Quel est votre objectif principal pour ce stage ?",
            answers: {
                a: "Valider une obligation scolaire",
                b: "Decouvrir le milieu associatif",
                c: "Acquerir des competences professionnelles",
                d: "Confirmer mon projet professionnel avec les animaux"
            },
            points: { a: 1, b: 2, c: 3, d: 4 },
            explanation: "Quelle que soit votre motivation initiale, un stage au Fanal des Chats est une experience formatrice et humaine."
        },
        q8: {
            question: "Comment evaluez-vous votre capacite physique pour le travail au refuge ?",
            answers: {
                a: "Je prefere les taches legeres",
                b: "Je peux faire des efforts moderes",
                c: "Bonne condition physique",
                d: "Tres bonne endurance, pret(e) pour tout"
            },
            points: { a: 2, b: 3, c: 3, d: 4 },
            explanation: "Le quotidien au refuge peut etre physique (nettoyage, port de litiere). Des taches adaptees existent pour tous les profils."
        },
        q9: {
            question: "Comment geriez-vous une situation emotionnellement difficile au refuge ?",
            answers: {
                a: "Cela serait tres difficile pour moi",
                b: "J'aurais besoin d'etre accompagne(e)",
                c: "Je peux gerer mes emotions",
                d: "J'ai deja vecu ce type de situation"
            },
            points: { a: 1, b: 2, c: 3, d: 4 },
            explanation: "La realite du refuge inclut des moments difficiles. Notre equipe est la pour accompagner les stagiaires dans ces situations."
        },
        q10: {
            question: "Comment decrivez-vous votre engagement et votre ponctualite ?",
            answers: {
                a: "J'ai parfois du mal a respecter les horaires",
                b: "Je suis generalement ponctuel(le)",
                c: "Je suis toujours ponctuel(le) et fiable",
                d: "La ponctualite et l'engagement sont mes priorites"
            },
            points: { a: 1, b: 2, c: 3, d: 4 },
            explanation: "La ponctualite et la fiabilite sont essentielles : les chats comptent sur nous chaque jour a heure fixe."
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
            advice = "Votre profil montre que vous debutez dans le domaine animalier, et c'est tout a fait normal ! Nous accueillons les stagiaires de tous niveaux. Une formation et un encadrement personnalise vous seront proposes pour vous accompagner tout au long de votre stage. N'hesitez pas a postuler, c'est en pratiquant qu'on apprend !";
            $('.result_msg img').attr('src', $('.result_msg img').attr('src').replace('check.png', 'cross.png'));
        } else if (percentage < 80) {
            level = 'Motive';
            color = '#fd7e14';
            message = 'Profil prometteur !';
            advice = "Vous presentez un profil de stagiaire prometteur ! Votre motivation et vos competences sont de bons atouts pour integrer notre equipe. Quelques aspects peuvent encore etre renforces durant le stage, mais vous avez les bases necessaires pour une experience enrichissante au Fanal des Chats.";
            $('.result_msg img').attr('src', $('.result_msg img').attr('src').replace('check.png', 'warning.png').replace('cross.png', 'warning.png'));
        } else {
            level = 'Ideal';
            color = '#28a745';
            message = 'Candidat(e) ideal(e) !';
            advice = "Felicitations ! Votre profil correspond parfaitement a ce que nous recherchons chez un(e) stagiaire. Votre formation, votre experience et votre motivation font de vous un(e) candidat(e) ideal(e). Nous serions ravis de vous accueillir au Fanal des Chats pour un stage enrichissant et formateur !";
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
