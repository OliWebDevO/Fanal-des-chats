/**
 * Formulaire Generique - JavaScript
 * Le Fanal des Chats
 * Navigation multi-etapes, validation et sommaire des questions importantes
 * Remplace formulaire-adoption.js et formulaire-benevole.js
 */

(function($) {
    'use strict';

    // DOM Elements
    const DOMstrings = {
        stepsBtnClass: 'multisteps-form__progress-btn',
        stepsBtns: document.querySelectorAll('.multisteps-form__progress-btn'),
        stepsForm: document.querySelector('.multisteps-form__form'),
        stepFormPanelClass: 'multisteps-form__panel',
        stepFormPanels: document.querySelectorAll('.multisteps-form__panel'),
        stepPrevBtnClass: 'js-btn-prev',
        stepNextBtnClass: 'js-btn-next'
    };

    // Sidebar images cycle
    const sidebarImages = [
        'assets/images/images/illustrations/3_cute cat.png',
        'assets/images/images/illustrations/14_orange cat.png',
        'assets/images/images/illustrations/13_sleeping cat.png',
        'assets/images/images/illustrations/4_playful cat.png',
        'assets/images/images/illustrations/7_pretty cat.png',
        'assets/images/images/illustrations/9_shocked cat.png',
        'assets/images/images/illustrations/1_meow cat.png'
    ];

    // Initialize
    $(document).ready(function() {
        init();
    });

    function init() {
        setFormHeight();

        if (DOMstrings.stepsForm) {
            DOMstrings.stepsForm.addEventListener('click', handleNavigation);
        }

        window.addEventListener('resize', setFormHeight, true);

        $('#wizard').on('submit', handleSubmit);

        initStyledInputs();
    }

    // Remove class from elements
    function removeClasses(elemSet, className) {
        elemSet.forEach(elem => {
            elem.classList.remove(className);
        });
    }

    // Get active step number
    function getActiveStep(elem) {
        return Array.from(DOMstrings.stepsBtns).indexOf(elem);
    }

    // Set active step in sidebar
    function setActiveStep(activeStepNum) {
        removeClasses(DOMstrings.stepsBtns, 'js-active');
        removeClasses(DOMstrings.stepsBtns, 'current');

        DOMstrings.stepsBtns.forEach((elem, index) => {
            if (index <= activeStepNum) {
                elem.classList.add('js-active');
            }
            if (index === activeStepNum) {
                elem.classList.add('current');
            }
        });

        updateSidebarImage(activeStepNum);
    }

    // Update sidebar image based on current step
    function updateSidebarImage(stepNum) {
        const $imageHolder = $('.image-holder img');
        if ($imageHolder.length && sidebarImages[stepNum]) {
            const src = $imageHolder.attr('src');
            const baseUrl = src.substring(0, src.indexOf('assets/'));
            $imageHolder.attr('src', baseUrl + sidebarImages[stepNum]);
        }
    }

    // Get active panel
    function getActivePanel() {
        let activePanel = null;
        DOMstrings.stepFormPanels.forEach(elem => {
            if (elem.classList.contains('js-active')) {
                activePanel = elem;
            }
        });
        return activePanel;
    }

    // Set active panel
    function setActivePanel(activePanelNum) {
        removeClasses(DOMstrings.stepFormPanels, 'js-active');

        DOMstrings.stepFormPanels.forEach((elem, index) => {
            if (index === activePanelNum) {
                elem.classList.add('js-active');
                setFormHeight(elem);
            }
        });

        $('html, body').animate({ scrollTop: 0 }, 400);
    }

    // Set form height
    function setFormHeight(activePanel) {
        if (!activePanel) {
            activePanel = getActivePanel();
        }
        if (activePanel && DOMstrings.stepsForm) {
            const activePanelHeight = activePanel.offsetHeight;
            DOMstrings.stepsForm.style.minHeight = `${activePanelHeight}px`;
        }
    }

    // Handle navigation clicks
    function handleNavigation(e) {
        const eventTarget = e.target;

        const prevBtn = eventTarget.closest(`.${DOMstrings.stepPrevBtnClass}`);
        const nextBtn = eventTarget.closest(`.${DOMstrings.stepNextBtnClass}`);

        if (!prevBtn && !nextBtn) {
            return;
        }

        const activePanel = getActivePanel();
        let activePanelNum = Array.from(DOMstrings.stepFormPanels).indexOf(activePanel);

        if (prevBtn) {
            activePanelNum--;
            setActiveStep(activePanelNum);
            setActivePanel(activePanelNum);
        } else if (nextBtn) {
            if (validateStep(activePanelNum)) {
                activePanelNum++;
                setActiveStep(activePanelNum);
                setActivePanel(activePanelNum);
            }
        }
    }

    // Validate current step
    function validateStep(stepNum) {
        const activePanel = DOMstrings.stepFormPanels[stepNum];
        const requiredFields = activePanel.querySelectorAll('.required');
        let isValid = true;

        // Remove previous error states
        activePanel.querySelectorAll('.is-invalid').forEach(el => {
            el.classList.remove('is-invalid');
        });
        activePanel.querySelectorAll('.error-message').forEach(el => {
            el.remove();
        });

        // Check required fields
        requiredFields.forEach(field => {
            if (!field.value || field.value.trim() === '') {
                isValid = false;
                field.classList.add('is-invalid');
                showFieldError(field, 'Ce champ est requis');
            } else if (field.type === 'email' && !isValidEmail(field.value)) {
                isValid = false;
                field.classList.add('is-invalid');
                showFieldError(field, 'Veuillez entrer un email valide');
            } else if (field.type === 'tel' && !isValidPhone(field.value)) {
                isValid = false;
                field.classList.add('is-invalid');
                showFieldError(field, 'Veuillez entrer un numero valide');
            }
        });

        // Validate required radio groups
        const requiredRadioGroups = activePanel.querySelectorAll('.radio-group-required');
        requiredRadioGroups.forEach(group => {
            const groupName = group.dataset.name;
            const checkedRadio = activePanel.querySelector(`input[name="${groupName}"]:checked`);
            if (!checkedRadio) {
                isValid = false;
                group.classList.add('is-invalid');
                showFieldError(group, 'Veuillez faire un choix');
            }
        });

        if (!isValid) {
            const firstInvalid = activePanel.querySelector('.is-invalid');
            if (firstInvalid) {
                firstInvalid.focus();
            }
        }

        return isValid;
    }

    // Show field error
    function showFieldError(field, message) {
        const errorDiv = document.createElement('div');
        errorDiv.className = 'error-message';
        errorDiv.textContent = message;
        field.parentNode.appendChild(errorDiv);
    }

    // Validate email
    function isValidEmail(email) {
        const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return re.test(email);
    }

    // Validate phone
    function isValidPhone(phone) {
        const cleaned = phone.replace(/\s/g, '');
        return cleaned.length >= 9;
    }

    // Initialize styled inputs (checkboxes, radios)
    function initStyledInputs() {
        $('.housing-option, .checkbox-option, .character-option, .age-option, .mission-option, .day-option, .time-option').on('click', function() {
            // Toggle is handled by browser
        });

        $('.radio-option input[type="radio"]').on('change', function() {
            const name = $(this).attr('name');
            $(`.radio-option input[name="${name}"]`).closest('.radio-option').removeClass('active');
            $(this).closest('.radio-option').addClass('active');
        });
    }

    // Build important questions summary
    function buildImportantSummary() {
        const formData = window.formData || {};
        const summary = [];

        Object.keys(formData).forEach(function(qKey) {
            const q = formData[qKey];
            if (!q.correct || q.correct.trim() === '') return;

            const correctAnswers = q.correct.split('\n').map(s => s.trim().toLowerCase()).filter(s => s);
            if (correctAnswers.length === 0) return;

            // Get the user's answer
            let userAnswer = '';
            const fieldName = qKey;

            if (q.type === 'checkbox') {
                const checked = [];
                $(`input[name="${fieldName}[]"]:checked`).each(function() {
                    checked.push($(this).val());
                });
                userAnswer = checked.join(', ');
            } else if (q.type === 'radio') {
                const checked = $(`input[name="${fieldName}"]:checked`);
                userAnswer = checked.length ? checked.val() : '';
            } else {
                const field = $(`[name="${fieldName}"]`);
                userAnswer = field.length ? field.val() : '';
            }

            const userAnswerLower = (userAnswer || '').toLowerCase().trim();
            const isCorrect = correctAnswers.some(ans => userAnswerLower.indexOf(ans) !== -1) ||
                              correctAnswers.some(ans => ans.indexOf(userAnswerLower) !== -1 && userAnswerLower !== '');

            summary.push({
                label: q.label,
                answer: userAnswer || '(non renseigne)',
                correct: q.correct,
                isCorrect: isCorrect
            });
        });

        return summary;
    }

    // Display summary in success modal
    function displaySummary(summary) {
        const $container = $('#importantSummary');
        if (!$container.length || summary.length === 0) return;

        let html = '<div class="important-summary"><h3><i class="fas fa-clipboard-check"></i> Questions importantes</h3><ul>';

        summary.forEach(function(item) {
            const icon = item.isCorrect ? '<i class="fas fa-check-circle" style="color:#28a745"></i>' : '<i class="fas fa-times-circle" style="color:#dc3545"></i>';
            const style = item.isCorrect ? 'color:#28a745' : 'color:#dc3545; font-weight:bold';
            html += `<li style="${style}">${icon} <strong>${item.label}</strong>: ${item.answer}</li>`;
        });

        html += '</ul></div>';
        $container.html(html);
    }

    // Handle form submission
    function handleSubmit(e) {
        e.preventDefault();

        // Validate last step
        const lastStepIndex = DOMstrings.stepFormPanels.length - 1;
        if (!validateStep(lastStepIndex)) {
            return;
        }

        // Check required consents
        const requiredConsents = $('input[name^="consent_"][required]');
        let allConsented = true;
        requiredConsents.each(function() {
            if (!$(this).is(':checked')) {
                allConsented = false;
            }
        });
        if (!allConsented) {
            alert('Veuillez accepter tous les consentements obligatoires.');
            return;
        }

        // Build important summary
        const summary = buildImportantSummary();

        // Disable submit button
        const $submitBtn = $('#submitBtn');
        $submitBtn.prop('disabled', true).html('<i class="fas fa-spinner fa-spin"></i> Envoi en cours...');

        // Collect form data
        const formDataObj = new FormData(document.getElementById('wizard'));

        // Add important summary as hidden JSON
        formDataObj.append('important_summary', JSON.stringify(summary));

        // Send via AJAX
        $.ajax({
            url: $('#wizard').attr('action'),
            type: 'POST',
            data: formDataObj,
            processData: false,
            contentType: false,
            success: function(response) {
                displaySummary(summary);
                $('#successModal').addClass('show');
            },
            error: function(xhr, status, error) {
                // Show success anyway (graceful degradation)
                displaySummary(summary);
                $('#successModal').addClass('show');
            }
        });

        // Fallback: show success after delay
        setTimeout(function() {
            displaySummary(summary);
            $('#successModal').addClass('show');
        }, 1500);
    }

})(jQuery);
