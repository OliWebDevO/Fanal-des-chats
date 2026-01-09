/**
 * Formulaire Adoption - JavaScript
 * Le Fanal des Chats
 * Navigation multi-etapes et validation
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

    // Initialize
    $(document).ready(function() {
        init();
    });

    function init() {
        // Set initial form height
        setFormHeight();

        // Navigation events
        if (DOMstrings.stepsForm) {
            DOMstrings.stepsForm.addEventListener('click', handleNavigation);
        }

        // Window resize
        window.addEventListener('resize', setFormHeight, true);

        // Form submission
        $('#wizard').on('submit', handleSubmit);

        // Checkbox/Radio interactions for styled elements
        initStyledInputs();
    }

    // Remove class from elements
    function removeClasses(elemSet, className) {
        elemSet.forEach(elem => {
            elem.classList.remove(className);
        });
    }

    // Find parent with class
    function findParent(elem, parentClass) {
        let currentNode = elem;
        while (currentNode && !currentNode.classList.contains(parentClass)) {
            currentNode = currentNode.parentNode;
        }
        return currentNode;
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

        // Update sidebar image based on step
        updateSidebarImage(activeStepNum);
    }

    // Update sidebar image based on current step
    function updateSidebarImage(stepNum) {
        const images = [
            'assets/images/images/illustrations/3_cute cat.png',
            'assets/images/images/illustrations/14_orange cat.png',
            'assets/images/images/illustrations/13_sleeping cat.png',
            'assets/images/images/illustrations/4_playful cat.png',
            'assets/images/images/illustrations/7_pretty cat.png'
        ];

        const $imageHolder = $('.image-holder img');
        if ($imageHolder.length && images[stepNum]) {
            const baseUrl = $imageHolder.attr('src').split('assets/')[0];
            $imageHolder.attr('src', baseUrl + images[stepNum]);
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

        // Scroll to top
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

        // Check if clicked on prev or next button (or their icons)
        const prevBtn = eventTarget.closest(`.${DOMstrings.stepPrevBtnClass}`);
        const nextBtn = eventTarget.closest(`.${DOMstrings.stepNextBtnClass}`);

        if (!prevBtn && !nextBtn) {
            return;
        }

        // Find active panel
        const activePanel = getActivePanel();
        let activePanelNum = Array.from(DOMstrings.stepFormPanels).indexOf(activePanel);

        if (prevBtn) {
            // Go to previous step
            activePanelNum--;
            setActiveStep(activePanelNum);
            setActivePanel(activePanelNum);
        } else if (nextBtn) {
            // Validate current step before proceeding
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

        // Validate radio groups if required
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
            // Shake animation on first invalid field
            const firstInvalid = activePanel.querySelector('.is-invalid');
            if (firstInvalid) {
                firstInvalid.focus();
                $(firstInvalid).effect && $(firstInvalid).effect('shake', { times: 2, distance: 5 }, 300);
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
        // Housing options click effect
        $('.housing-option, .checkbox-option, .character-option, .age-option').on('click', function() {
            const $input = $(this).find('input');
            if ($input.is(':checkbox')) {
                // Toggle is handled by browser
            }
        });

        // Radio options
        $('.radio-option input[type="radio"]').on('change', function() {
            const name = $(this).attr('name');
            $(`.radio-option input[name="${name}"]`).closest('.radio-option').removeClass('active');
            $(this).closest('.radio-option').addClass('active');
        });
    }

    // Handle form submission
    function handleSubmit(e) {
        e.preventDefault();

        // Validate last step
        const lastStepIndex = DOMstrings.stepFormPanels.length - 1;
        if (!validateStep(lastStepIndex)) {
            return;
        }

        // Check RGPD consent
        if (!$('input[name="rgpd"]').is(':checked')) {
            alert('Veuillez accepter le traitement de vos donnees personnelles.');
            return;
        }

        // Disable submit button
        const $submitBtn = $('#submitBtn');
        $submitBtn.prop('disabled', true).html('<i class="fas fa-spinner fa-spin"></i> Envoi en cours...');

        // Collect form data
        const formData = new FormData(document.getElementById('wizard'));

        // Send via AJAX
        $.ajax({
            url: $('#wizard').attr('action'),
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                // Show success modal
                $('#successModal').addClass('show');
            },
            error: function(xhr, status, error) {
                // Still show success (for demo purposes without backend)
                $('#successModal').addClass('show');
            }
        });

        // For demo without backend - show success after delay
        setTimeout(function() {
            $('#successModal').addClass('show');
        }, 1500);
    }

})(jQuery);
