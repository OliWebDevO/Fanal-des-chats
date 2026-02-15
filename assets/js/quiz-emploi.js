/**
 * Quiz Emploi - JavaScript
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
            question: "Quelle est votre experience professionnelle avec les animaux ?",
            answers: {
                a: "Aucune experience professionnelle avec les animaux",
                b: "Experience personnelle (animaux de compagnie)",
                c: "Experience en refuge, association ou animalerie",
                d: "Formation veterinaire ou animaliere diplomante"
            },
            points: { a: 1, b: 2, c: 3, d: 4 },
            explanation: "L'experience professionnelle avec les animaux est un atout, mais nous assurons une formation complete a chaque nouvel employe."
        },
        q2: {
            question: "Quelle est votre disponibilite horaire ?",
            answers: {
                a: "Quelques heures par semaine uniquement",
                b: "Temps partiel (mi-temps)",
                c: "Temps plein en horaires fixes",
                d: "Temps plein avec flexibilite (week-ends, jours feries)"
            },
            points: { a: 1, b: 2, c: 3, d: 4 },
            explanation: "Le refuge fonctionne 7 jours sur 7. La flexibilite horaire est un avantage important pour les postes proposes."
        },
        q3: {
            question: "Comment evaluez-vous votre capacite a travailler en equipe ?",
            answers: {
                a: "Je prefere travailler seul(e)",
                b: "Je peux travailler en equipe si necessaire",
                c: "J'aime travailler en equipe",
                d: "J'ai l'habitude de coordonner et animer une equipe"
            },
            points: { a: 1, b: 2, c: 3, d: 4 },
            explanation: "Le travail en equipe est essentiel au refuge. Salaries, benevoles et veterinaires collaborent quotidiennement pour le bien-etre des animaux."
        },
        q4: {
            question: "Quelle est votre formation ou vos diplomes ?",
            answers: {
                a: "Pas de diplome particulier",
                b: "Formation generale (bac, BEP, CAP)",
                c: "Formation liee aux animaux ou au social",
                d: "Diplome veterinaire, ASV ou equivalent"
            },
            points: { a: 1, b: 2, c: 3, d: 4 },
            explanation: "Une formation specialisee est un plus, mais la motivation et l'engagement comptent tout autant. Des formations internes sont prevues."
        },
        q5: {
            question: "Comment reagiriez-vous face a un animal malade ou blesse au refuge ?",
            answers: {
                a: "Je serais desoriente(e) et aurais du mal a reagir",
                b: "Je suivrais les consignes d'un collegue plus experimente",
                c: "Je connais les gestes de premiers secours animaliers",
                d: "J'ai gere ce type de situation en milieu professionnel"
            },
            points: { a: 1, b: 2, c: 3, d: 4 },
            explanation: "Savoir reagir face a un animal en detresse fait partie du quotidien au refuge. Une formation aux premiers secours animaliers est dispensee a l'embauche."
        },
        q6: {
            question: "Quel type de poste souhaiteriez-vous occuper ?",
            answers: {
                a: "Entretien et nettoyage des locaux",
                b: "Accueil du public et gestion des adoptions",
                c: "Soins aux animaux et suivi veterinaire",
                d: "Polyvalent, tous les postes m'interessent"
            },
            points: { a: 3, b: 3, c: 3, d: 4 },
            explanation: "Tous les postes sont essentiels au bon fonctionnement du refuge. La polyvalence est particulierement appreciee dans notre structure."
        },
        q7: {
            question: "Comment gerez-vous le stress dans un environnement de travail exigeant ?",
            answers: {
                a: "Le stress me paralyse facilement",
                b: "Je gere le stress mais j'ai besoin de temps",
                c: "Je reste calme et je priorise les taches",
                d: "Je suis efficace sous pression et je rassure l'equipe"
            },
            points: { a: 1, b: 2, c: 3, d: 4 },
            explanation: "Le travail en refuge peut etre stressant (urgences, surpopulation, situations emotionnelles). Savoir garder son calme est une qualite precieuse."
        },
        q8: {
            question: "Quelle est votre motivation principale pour travailler au refuge ?",
            answers: {
                a: "Trouver un emploi stable",
                b: "Travailler au contact des animaux",
                c: "Contribuer a la protection animale",
                d: "Combiner ma passion et ma carriere professionnelle"
            },
            points: { a: 2, b: 3, c: 4, d: 4 },
            explanation: "La passion pour la cause animale et l'envie de s'investir durablement sont des moteurs essentiels pour s'epanouir dans ce metier."
        },
        q9: {
            question: "Comment gerez-vous les situations emotionnellement difficiles (euthanasie, abandon) ?",
            answers: {
                a: "Cela serait tres eprouvant pour moi",
                b: "J'aurais besoin du soutien de l'equipe",
                c: "Je sais separer mes emotions de mon travail",
                d: "J'ai l'experience professionnelle de ces situations"
            },
            points: { a: 1, b: 2, c: 3, d: 4 },
            explanation: "Ces moments difficiles font partie de la realite du metier. Notre equipe beneficie d'un accompagnement et d'un soutien psychologique."
        },
        q10: {
            question: "Sur quelle duree envisagez-vous votre engagement professionnel ?",
            answers: {
                a: "Je cherche une mission temporaire (CDD, stage)",
                b: "Je suis ouvert(e) a un poste de quelques mois",
                c: "Je souhaite un engagement d'au moins un an",
                d: "Je vise un poste durable et une carriere au refuge"
            },
            points: { a: 1, b: 2, c: 3, d: 4 },
            explanation: "Un engagement sur la duree permet de developper une vraie expertise et de tisser des liens de confiance avec les animaux et l'equipe."
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
            advice = "Votre profil montre que vous debutez dans le domaine animalier, mais ne vous decouragez pas ! Le Fanal des Chats propose des formations internes pour accompagner ses nouveaux employes. N'hesitez pas a postuler : votre motivation et votre envie d'apprendre sont des qualites que nous valorisons.";
            $('.result_msg img').attr('src', $('.result_msg img').attr('src').replace('check.png', 'cross.png'));
        } else if (percentage < 80) {
            level = 'Prometteur';
            color = '#fd7e14';
            message = 'Bon profil !';
            advice = "Vous presentez un bon profil de candidat avec des competences et une motivation interessantes. Certains aspects peuvent encore etre renforces, notamment par la formation continue que nous proposons. Votre candidature a de bonnes chances d'etre retenue. Contactez-nous pour echanger sur les postes disponibles !";
            $('.result_msg img').attr('src', $('.result_msg img').attr('src').replace('check.png', 'warning.png').replace('cross.png', 'warning.png'));
        } else {
            level = 'Ideal';
            color = '#28a745';
            message = 'Profil ideal !';
            advice = "Felicitations ! Votre profil professionnel correspond parfaitement a ce que nous recherchons. Votre experience, vos competences et votre engagement font de vous un(e) candidat(e) ideal(e) pour rejoindre l'equipe du Fanal des Chats. Nous serions ravis de recevoir votre candidature !";
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
