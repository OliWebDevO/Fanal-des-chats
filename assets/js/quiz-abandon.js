/**
 * Quiz Abandon - JavaScript
 * Le Fanal des Chats
 * Accompagnement bienveillant des personnes envisageant l'abandon
 */

(function($) {
    'use strict';

    // Configuration
    const TOTAL_QUESTIONS = 10;
    const TIME_LIMIT = 120; // secondes

    // Donnees des questions avec reponses et explications bienveillantes
    const QUESTIONS_DATA = {
        q1: {
            question: "Quelle est la raison principale de votre decision ?",
            correct: 'a',
            answers: {
                a: "Un demenagement",
                b: "Des allergies",
                c: "Des problemes de comportement",
                d: "Des difficultes financieres"
            },
            explanation: "Quelle que soit la raison, sachez que des solutions existent pour chacune de ces situations. Pour un demenagement, de nombreux logements acceptent les animaux et des associations peuvent vous aider dans vos recherches. Pour les allergies, des traitements et amenagements sont possibles. Les problemes de comportement se resolvent souvent avec l'aide d'un professionnel. Et pour les difficultes financieres, des aides existent. Vous n'etes pas seul(e)."
        },
        q2: {
            question: "Avez-vous consulte un veterinaire recemment ?",
            correct: 'a',
            answers: {
                a: "Oui, pour un bilan complet",
                b: "Oui, mais il y a longtemps",
                c: "Non, pas encore",
                d: "Non, ce n'est pas une question de sante"
            },
            explanation: "Un bilan veterinaire complet est souvent revelateur. De nombreux problemes de comportement (agressivite, malproprete, miaulements excessifs) ont en realite une cause medicale traitable : douleurs dentaires, infections urinaires, hyperthyroidie... Une fois la cause identifiee et traitee, le comportement s'ameliore considerablement."
        },
        q3: {
            question: "Un comportementaliste felin a-t-il ete consulte ?",
            correct: 'a',
            answers: {
                a: "Oui, et cela a aide",
                b: "Oui, mais sans resultat",
                c: "Non, je ne savais pas que ca existait",
                d: "Non, le probleme n'est pas comportemental"
            },
            explanation: "Les comportementalistes felins sont des specialistes qui resolvent environ 80% des problemes de comportement. Griffures, malproprete, agressivite, stress : ces professionnels analysent l'environnement et les habitudes pour proposer des solutions concretes et souvent simples. Une seule consultation peut parfois tout changer."
        },
        q4: {
            question: "Avez-vous explore des solutions dans votre entourage ?",
            correct: 'a',
            answers: {
                a: "Oui, famille ou amis pourraient aider",
                b: "J'y ai pense mais pas encore demande",
                c: "Non, personne ne peut m'aider",
                d: "Je n'ai pas ose en parler"
            },
            explanation: "Parler de votre situation a vos proches peut ouvrir des portes inattendues. Un membre de la famille ou un ami pourrait accueillir votre chat temporairement, vous aider avec les frais veterinaires, ou simplement vous soutenir dans cette periode difficile. Beaucoup de gens sont prets a aider quand on leur explique la situation."
        },
        q5: {
            question: "Votre situation est-elle temporaire ou definitive ?",
            correct: 'a',
            answers: {
                a: "Temporaire (quelques semaines ou mois)",
                b: "Je ne sais pas encore",
                c: "Definitive, mais recente",
                d: "Definitive et de longue date"
            },
            explanation: "Si votre situation est temporaire, sachez que des familles d'accueil benevoles peuvent prendre soin de votre chat le temps que les choses se stabilisent. C'est une alternative formidable qui evite le stress du refuge a votre compagnon. Meme les situations qui semblent definitives peuvent parfois evoluer avec le temps et le bon accompagnement."
        },
        q6: {
            question: "Connaissez-vous les aides financieres disponibles ?",
            correct: 'a',
            answers: {
                a: "Oui, associations et CPAS peuvent aider",
                b: "J'en ai entendu parler sans plus",
                c: "Non, je ne savais pas",
                d: "Ce n'est pas une question d'argent"
            },
            explanation: "Plusieurs ressources financieres existent pour les proprietaires d'animaux en difficulte : le CPAS peut intervenir dans certains cas, des associations proposent des bons pour soins veterinaires, certains veterinaires offrent des plans de paiement, et des banques alimentaires pour animaux fournissent de la nourriture. N'hesitez pas a nous contacter pour connaitre les aides disponibles dans votre region."
        },
        q7: {
            question: "Depuis combien de temps vivez-vous cette situation ?",
            correct: 'a',
            answers: {
                a: "Moins de 6 mois",
                b: "Entre 6 mois et 1 an",
                c: "Plus d'un an",
                d: "La situation vient de commencer"
            },
            explanation: "Beaucoup de situations difficiles evoluent avec le temps. Si votre situation est recente, une periode d'adaptation est souvent necessaire, tant pour vous que pour votre chat. Les chats sont des animaux resilients qui s'adaptent progressivement aux changements. Accordez-vous du temps et n'hesitez pas a demander de l'aide pour traverser cette periode."
        },
        q8: {
            question: "Avez-vous envisage une famille d'accueil temporaire ?",
            correct: 'a',
            answers: {
                a: "Oui, c'est une bonne idee",
                b: "Non, je ne connaissais pas cette option",
                c: "Non, je ne pense pas que ce soit adapte",
                d: "Je ne sais pas comment faire"
            },
            explanation: "Le systeme de famille d'accueil temporaire est une alternative precieuse. Des benevoles accueillent votre chat chez eux le temps necessaire, que ce soit pour quelques semaines ou quelques mois. Votre chat reste dans un environnement familial chaleureux, et vous gardez la possibilite de le retrouver quand votre situation s'ameliore. Contactez-nous pour en savoir plus."
        },
        q9: {
            question: "Comment reagit votre chat face a cette situation ?",
            correct: 'd',
            answers: {
                a: "Il semble stresse ou anxieux",
                b: "Son comportement a change recemment",
                c: "Il est agressif ou destructeur",
                d: "Il va bien, c'est ma situation qui a change"
            },
            explanation: "Comprendre le comportement de votre chat est essentiel. Un chat stresse, anxieux ou agressif exprime souvent un mal-etre qui peut etre traite. Des solutions comme les diffuseurs de pheromones, l'amenagement de l'espace, ou un suivi comportemental peuvent transformer la situation. Si votre chat va bien, c'est un signe positif que la cohabitation peut continuer avec les bons ajustements."
        },
        q10: {
            question: "Etes-vous pret(e) a essayer une derniere alternative ?",
            correct: 'a',
            answers: {
                a: "Oui, je suis ouvert(e) a toute aide",
                b: "Peut-etre, si on me guide",
                c: "J'ai deja tout essaye",
                d: "Je ne sais plus quoi faire"
            },
            explanation: "Votre ouverture a explorer d'autres pistes est admirable. Chaque situation a ses particularites, et notre equipe est la pour vous accompagner de maniere personnalisee. Ensemble, nous pouvons examiner votre situation et trouver la meilleure solution, que ce soit garder votre chat avec un soutien adapte, ou lui trouver un nouveau foyer dans les meilleures conditions possibles."
        }
    };

    const CORRECT_ANSWERS = {
        q1: 'a',
        q2: 'a',
        q3: 'a',
        q4: 'a',
        q5: 'a',
        q6: 'a',
        q7: 'a',
        q8: 'a',
        q9: 'd',
        q10: 'a'
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

        // Bouton voir alternatives
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
            showError('Veuillez selectionner une reponse.');
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
            showError('Veuillez selectionner une reponse.');
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
            level = 'Situation complexe';
            color = '#6c5ce7';
            message = 'Nous sommes la pour vous';
            advice = "Votre situation semble difficile et nous comprenons. Sachez que des solutions existent. Contactez-nous, nous pouvons vous orienter vers les bonnes ressources. Chaque situation est unique et merite une attention particuliere. Notre equipe est formee pour vous accompagner avec bienveillance.";
            $('.result_msg img').attr('src', $('.result_msg img').attr('src').replace('check.png', 'cross.png'));
        } else if (percentage < 80) {
            level = 'Quelques pistes';
            color = '#fd7e14';
            message = 'Des pistes a explorer';
            advice = "Plusieurs alternatives existent que vous n'avez peut-etre pas encore explorees. Avant de prendre votre decision, contactez-nous pour en discuter. Un simple echange telephonique peut parfois reveler des solutions auxquelles on n'avait pas pense.";
            $('.result_msg img').attr('src', $('.result_msg img').attr('src').replace('check.png', 'warning.png').replace('cross.png', 'warning.png'));
        } else {
            level = "Beaucoup d'alternatives";
            color = '#28a745';
            message = 'De nombreuses options';
            advice = "Vous connaissez bien les alternatives ! Contactez-nous pour en discuter, nous pouvons probablement vous aider a garder votre chat. Avec les bonnes ressources et un accompagnement adapte, beaucoup de situations trouvent une issue positive.";
        }

        // Appliquer les couleurs
        $('.u_prcnt, .prcnt_bar_lvl, .result_msg').css('color', color);
        $('.prcnt_bar .fill').css('background-color', color);
        $('.prcnt_bar_lvl').text(level);
        $('.result_msg_text').text(message);
        $('.advice_text').text(advice);

        // Generer la liste des alternatives a explorer
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

        // Parcourir toutes les questions pour trouver les reponses non optimales
        for (let i = 1; i <= TOTAL_QUESTIONS; i++) {
            const questionKey = 'q' + i;
            const userAnswer = userAnswers[questionKey];
            const questionData = QUESTIONS_DATA[questionKey];

            // Si la reponse n'est pas la reponse ideale
            if (userAnswer && userAnswer !== questionData.correct) {
                errorCount++;

                const errorHtml = `
                    <div class="error-item">
                        <div class="error-question-number">Question ${i}</div>
                        <div class="error-question-text">${questionData.question}</div>
                        <div class="error-answers">
                            <div class="error-your-answer">
                                <i class="fas fa-comment"></i>
                                <span><strong>Votre reponse :</strong> ${questionData.answers[userAnswer]}</span>
                            </div>
                            <div class="error-correct-answer">
                                <i class="fas fa-lightbulb"></i>
                                <span><strong>A savoir :</strong> ${questionData.answers[questionData.correct]}</span>
                            </div>
                        </div>
                        <div class="error-explanation">
                            <strong><i class="fas fa-heart"></i> Conseil :</strong> ${questionData.explanation}
                        </div>
                    </div>
                `;

                $errorsList.append(errorHtml);
            }
        }

        // Afficher ou cacher le bouton selon le nombre d'alternatives
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
