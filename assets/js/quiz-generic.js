/**
 * Quiz Generique - JavaScript
 * Le Fanal des Chats
 *
 * Lit window.quizData pour fonctionner avec n'importe quel quiz ACF.
 * Supporte deux modes de scoring :
 *   - "correct" : compare la reponse au tableau correct[] (1 ou plusieurs bonnes reponses)
 *   - "points"  : additionne les points de chaque reponse (pour quiz benevole)
 */

(function($) {
    'use strict';

    // Donnees injectees par PHP
    var data = window.quizData;
    if (!data) return;

    var TOTAL_QUESTIONS = data.totalQuestions;
    var TIME_LIMIT = data.timeLimit || 90;
    var QUESTIONS = data.questions;       // tableau [{question, answers, correct, explanation}]
    var RESULTS = data.results;           // {low, mid, high} avec label, message, advice
    var SCORING_MODE = data.scoringMode || 'correct';

    // Variables
    var currentStep = 0;
    var timeRemaining = TIME_LIMIT;
    var timerInterval = null;
    var userAnswers = {};

    // Elements DOM
    var $intro = $('#quizIntro');
    var $steps = $('#quizSteps');
    var $startBtn = $('#startQuiz');
    var $submitBtn = $('#submitQuiz');
    var $counterContainer = $('.counterContainer');
    var $countdownTimer = $('#countdown-timer');
    var $svgCircle = $('.counter circle');
    var $divs = $('#stepForm fieldset');

    // Initialisation
    $(document).ready(function() {
        init();
    });

    function init() {
        $counterContainer.hide();
        $divs.hide().first().show();

        $startBtn.on('click', startQuiz);

        // Selection d'option
        $('.option input').on('click', function() {
            $(this).closest('.options').find('.option').removeClass('selected');
            $(this).parent().addClass('selected');
        });

        // Boutons suivant
        $('.next').on('click', function() {
            var step = $(this).data('step');
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
        $intro.fadeOut(500, function() {
            $steps.fadeIn(500);
            $counterContainer.fadeIn(500);
            startTimer();
        });
    }

    function startTimer() {
        var maxOffset = 440;
        var initialTime = TIME_LIMIT;

        timerInterval = setInterval(function() {
            if (timeRemaining <= 0) {
                clearInterval(timerInterval);
                handleTimeUp();
            } else {
                timeRemaining--;
                $countdownTimer.text(timeRemaining);

                var offset = maxOffset - Math.floor((timeRemaining / initialTime) * maxOffset);
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
        if (!validateStep(stepNumber)) {
            showError('Veuillez sélectionner une réponse !');
            return;
        }

        var selectedValue = $('#step' + stepNumber + ' input:checked').val();
        userAnswers['q' + stepNumber] = selectedValue;

        $('#step' + stepNumber + ' .option').removeClass('animate').addClass('animateReverse');
        $('#step' + stepNumber + ' .question h2').removeClass('animate').addClass('animateReverse');

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

        var selectedValue = $('#step' + TOTAL_QUESTIONS + ' input:checked').val();
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

            $('#step' + (currentStep + 1) + ' .option').addClass('animate').removeClass('animateReverse');
            $('#step' + (currentStep + 1) + ' .question h2').addClass('animate').removeClass('animateReverse');
        }
    }

    function prevStep() {
        $divs.eq(currentStep).hide();
        currentStep--;
        $divs.eq(currentStep).show();
        updateProgressBar();

        $('#step' + (currentStep + 1) + ' .option').addClass('animate').removeClass('animateReverse');
        $('#step' + (currentStep + 1) + ' .question h2').addClass('animate').removeClass('animateReverse');
    }

    function validateStep(stepNumber) {
        return $('#step' + stepNumber + ' input:checked').length > 0;
    }

    function updateProgressBar() {
        var progress = (currentStep / TOTAL_QUESTIONS) * 100;
        $('.question .fill').css('height', progress + '%');
    }

    function calculateAndShowResults() {
        $('.loadingresult').css('display', 'grid');

        setTimeout(function() {
            var percentage;

            if (SCORING_MODE === 'points') {
                // Mode points (benevole) : additionner les points
                var totalPoints = 0;
                var maxPoints = TOTAL_QUESTIONS * 4;
                for (var key in userAnswers) {
                    var qIndex = parseInt(key.replace('q', '')) - 1;
                    var qData = QUESTIONS[qIndex];
                    if (qData && qData.points && qData.points[userAnswers[key]]) {
                        totalPoints += qData.points[userAnswers[key]];
                    }
                }
                percentage = Math.round((totalPoints / maxPoints) * 100);
            } else {
                // Mode correct : comparer avec le tableau correct[]
                var correctCount = 0;
                for (var i = 1; i <= TOTAL_QUESTIONS; i++) {
                    var answer = userAnswers['q' + i];
                    var questionData = QUESTIONS[i - 1];
                    if (questionData && questionData.correct) {
                        // Supporte correct comme tableau ou string
                        var correctAnswers = questionData.correct;
                        if (typeof correctAnswers === 'string') {
                            correctAnswers = [correctAnswers];
                        }
                        if (correctAnswers.indexOf(answer) !== -1) {
                            correctCount++;
                        }
                    }
                }
                percentage = Math.round((correctCount / TOTAL_QUESTIONS) * 100);
            }

            displayResults(percentage);
        }, 1500);
    }

    function displayResults(percentage) {
        $('.u_prcnt').text(percentage + '%');

        setTimeout(function() {
            $('.prcnt_bar .fill').css('width', percentage + '%');
        }, 500);

        var level, color, message, advice;

        if (percentage < 50) {
            level = RESULTS.low.label || 'Débutant';
            color = '#dc3545';
            message = RESULTS.low.message || 'Continuez à apprendre !';
            advice = RESULTS.low.advice || '';
            $('.result_msg img').attr('src', $('.result_msg img').attr('src').replace('check.png', 'cross.png'));
        } else if (percentage < 80) {
            level = RESULTS.mid.label || 'Bon';
            color = '#fd7e14';
            message = RESULTS.mid.message || 'Bien joué !';
            advice = RESULTS.mid.advice || '';
            $('.result_msg img').attr('src', $('.result_msg img').attr('src').replace('check.png', 'warning.png').replace('cross.png', 'warning.png'));
        } else {
            level = RESULTS.high.label || 'Expert';
            color = '#28a745';
            message = RESULTS.high.message || 'Félicitations !';
            advice = RESULTS.high.advice || '';
        }

        $('.u_prcnt, .prcnt_bar_lvl, .result_msg').css('color', color);
        $('.prcnt_bar .fill').css('background-color', color);
        $('.prcnt_bar_lvl').text(level);
        $('.result_msg_text').text(message);
        $('.advice_text').text(advice);

        displayErrors();

        setTimeout(function() {
            $('.loadingresult').hide();
            $('.result_page').addClass('result_page_show');
        }, 500);
    }

    function displayErrors() {
        if (SCORING_MODE === 'points') return; // Pas d'erreurs en mode points

        var $errorsList = $('#errorsList');
        $errorsList.empty();

        var errorCount = 0;

        for (var i = 1; i <= TOTAL_QUESTIONS; i++) {
            var userAnswer = userAnswers['q' + i];
            var questionData = QUESTIONS[i - 1];
            if (!questionData) continue;

            var correctAnswers = questionData.correct;
            if (typeof correctAnswers === 'string') {
                correctAnswers = [correctAnswers];
            }

            // Si pas de reponse ou reponse incorrecte
            if (!userAnswer || correctAnswers.indexOf(userAnswer) === -1) {
                errorCount++;

                var correctLabels = [];
                for (var c = 0; c < correctAnswers.length; c++) {
                    correctLabels.push(questionData.answers[correctAnswers[c]]);
                }

                var userLabel = userAnswer ? questionData.answers[userAnswer] : 'Pas de réponse';

                var errorHtml = '<div class="error-item">' +
                    '<div class="error-question-number">Question ' + i + '</div>' +
                    '<div class="error-question-text">' + escapeHtml(questionData.question) + '</div>' +
                    '<div class="error-answers">' +
                        '<div class="error-your-answer">' +
                            '<i class="fas fa-times"></i>' +
                            '<span><strong>Votre réponse :</strong> ' + escapeHtml(userLabel) + '</span>' +
                        '</div>' +
                        '<div class="error-correct-answer">' +
                            '<i class="fas fa-check"></i>' +
                            '<span><strong>Bonne(s) réponse(s) :</strong> ' + escapeHtml(correctLabels.join(', ')) + '</span>' +
                        '</div>' +
                    '</div>' +
                    '<div class="error-explanation">' +
                        '<strong><i class="fas fa-info-circle"></i> Explication :</strong> ' + escapeHtml(questionData.explanation) +
                    '</div>' +
                '</div>';

                $errorsList.append(errorHtml);
            }
        }

        if (errorCount > 0) {
            $('#seeErrorsBtn').show();
            $('#errorsSection').show();
        } else {
            $('#seeErrorsBtn').hide();
            $('#errorsSection').hide();
        }
    }

    function scrollToErrors() {
        var errorsSection = document.getElementById('errorsSection');
        if (errorsSection) {
            errorsSection.scrollIntoView({ behavior: 'smooth' });
        }
    }

    function showError(message) {
        var $error = $('<div class="alert alert-danger reveal">' + escapeHtml(message) + '</div>');
        $('#error').append($error);

        setTimeout(function() {
            $error.fadeOut(300, function() {
                $(this).remove();
            });
        }, 3000);
    }

    function escapeHtml(text) {
        if (!text) return '';
        var div = document.createElement('div');
        div.appendChild(document.createTextNode(text));
        return div.innerHTML;
    }

})(jQuery);
