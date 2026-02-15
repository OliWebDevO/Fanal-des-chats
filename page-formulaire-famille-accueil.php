<?php
/**
 * Template Name: Formulaire Famille Accueil
 * Description: Formulaire de candidature famille d'accueil multi-étapes
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Devenir famille d'accueil - <?php bloginfo('name'); ?></title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,100..1000;1,9..40,100..1000&family=Fredoka+One&display=swap" rel="stylesheet">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/bootstrap.min.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <!-- Formulaire Styles -->
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/formulaire-benevole.css">

    <?php wp_head(); ?>
</head>
<body class="formulaire-benevole-page">

    <div class="wrapper">
        <!-- Sidebar avec image et étapes -->
        <div class="steps-area steps-area-fixed">
            <div class="image-holder">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/images/illustrations/6_kitten.png" alt="Chaton">
            </div>
            <div class="steps clearfix">
                <ul class="tablist multisteps-form__progress">
                    <li class="multisteps-form__progress-btn js-active current" data-step="1">
                        <span>1</span>
                        <span class="step-label">Informations</span>
                    </li>
                    <li class="multisteps-form__progress-btn" data-step="2">
                        <span>2</span>
                        <span class="step-label">Logement</span>
                    </li>
                    <li class="multisteps-form__progress-btn" data-step="3">
                        <span>3</span>
                        <span class="step-label">Disponibilités</span>
                    </li>
                    <li class="multisteps-form__progress-btn" data-step="4">
                        <span>4</span>
                        <span class="step-label">Expérience</span>
                    </li>
                    <li class="multisteps-form__progress-btn last" data-step="5">
                        <span>5</span>
                        <span class="step-label">Motivation</span>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Formulaire -->
        <form class="multisteps-form__form" action="<?php echo admin_url('admin-post.php'); ?>" id="wizard" method="POST">
            <input type="hidden" name="action" value="submit_famille_accueil_form">
            <?php wp_nonce_field('famille_accueil_form_nonce', 'famille_accueil_nonce'); ?>

            <div class="form-area position-relative">

                <!-- ÉTAPE 1: Informations personnelles -->
                <div class="multisteps-form__panel js-active" data-animation="slideHorz">
                    <div class="wizard-forms">
                        <div class="inner pb-100 clearfix">
                            <div class="form-content pera-content">
                                <div class="step-inner-content">
                                    <span class="step-no">Étape 1</span>
                                    <h2>Vos informations personnelles</h2>
                                    <p>Nous avons besoin de quelques informations pour mieux vous connaître.</p>

                                    <div class="step-illustration">
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/images/illustrations/1_meow cat.png" alt="">
                                    </div>

                                    <div class="form-inner-area">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="prenom">Prénom *</label>
                                                    <input type="text" name="prenom" id="prenom" class="form-control required" placeholder="Votre prénom" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="nom">Nom *</label>
                                                    <input type="text" name="nom" id="nom" class="form-control required" placeholder="Votre nom" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="email">Email *</label>
                                                    <input type="email" name="email" id="email" class="form-control required" placeholder="votre@email.com" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="telephone">Téléphone *</label>
                                                    <input type="tel" name="telephone" id="telephone" class="form-control required" placeholder="0470 00 00 00" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <label for="adresse">Adresse</label>
                                                    <input type="text" name="adresse" id="adresse" class="form-control" placeholder="Rue et numéro">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="code_postal">Code postal</label>
                                                    <input type="text" name="code_postal" id="code_postal" class="form-control" placeholder="1000">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="ville">Ville</label>
                                                    <input type="text" name="ville" id="ville" class="form-control" placeholder="Votre ville">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="date_naissance">Date de naissance</label>
                                                    <input type="date" name="date_naissance" id="date_naissance" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="actions">
                            <a href="<?php echo home_url('/'); ?>" class="btn-back-site"><i class="fa fa-times"></i> Retour au site</a>
                            <ul class="nav-buttons">
                                <li class="disable" aria-disabled="true"><span class="js-btn-prev" title="Retour">Retour <i class="fa fa-arrow-left"></i></span></li>
                                <li><span class="js-btn-next" title="Suivant">Suivant <i class="fa fa-arrow-right"></i></span></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- ÉTAPE 2: Logement -->
                <div class="multisteps-form__panel" data-animation="slideHorz">
                    <div class="wizard-forms">
                        <div class="inner pb-100 clearfix">
                            <div class="form-content pera-content">
                                <div class="step-inner-content">
                                    <span class="step-no bottom-line">Étape 2</span>
                                    <div class="step-progress float-right">
                                        <span>2 sur 5</span>
                                        <div class="step-progress-bar">
                                            <div class="progress">
                                                <div class="progress-bar" style="width:40%"></div>
                                            </div>
                                        </div>
                                    </div>

                                    <h2>Votre logement</h2>
                                    <p>Décrivez-nous votre logement pour que nous puissions évaluer les conditions d'accueil.</p>

                                    <div class="step-illustration">
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/images/illustrations/13_sleeping cat.png" alt="">
                                    </div>

                                    <div class="availability-section">
                                        <h3><i class="fas fa-home"></i> Type de logement</h3>
                                        <div class="radio-group">
                                            <label class="radio-option">
                                                <input type="radio" name="type_logement" value="studio">
                                                <span class="radio-box">Studio</span>
                                            </label>
                                            <label class="radio-option">
                                                <input type="radio" name="type_logement" value="appartement">
                                                <span class="radio-box">Appartement</span>
                                            </label>
                                            <label class="radio-option">
                                                <input type="radio" name="type_logement" value="maison">
                                                <span class="radio-box">Maison</span>
                                            </label>
                                        </div>
                                    </div>

                                    <div class="availability-section">
                                        <h3><i class="fas fa-ruler-combined"></i> Surface approximative</h3>
                                        <div class="form-group">
                                            <select name="surface" class="form-control">
                                                <option value="">Sélectionnez...</option>
                                                <option value="moins-40">Moins de 40 m²</option>
                                                <option value="40-70">40 à 70 m²</option>
                                                <option value="70-100">70 à 100 m²</option>
                                                <option value="plus-100">Plus de 100 m²</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="availability-section">
                                        <h3><i class="fas fa-tree"></i> Espace extérieur</h3>
                                        <div class="radio-group">
                                            <label class="radio-option">
                                                <input type="radio" name="exterieur" value="aucun">
                                                <span class="radio-box">Aucun</span>
                                            </label>
                                            <label class="radio-option">
                                                <input type="radio" name="exterieur" value="balcon">
                                                <span class="radio-box">Balcon / Terrasse</span>
                                            </label>
                                            <label class="radio-option">
                                                <input type="radio" name="exterieur" value="jardin">
                                                <span class="radio-box">Jardin</span>
                                            </label>
                                            <label class="radio-option">
                                                <input type="radio" name="exterieur" value="jardin-securise">
                                                <span class="radio-box">Jardin sécurisé (clôturé)</span>
                                            </label>
                                        </div>
                                    </div>

                                    <div class="availability-section">
                                        <h3><i class="fas fa-door-open"></i> Pièce dédiée disponible ?</h3>
                                        <div class="radio-group-horizontal">
                                            <label class="radio-option-h">
                                                <input type="radio" name="piece_dediee" value="oui">
                                                <span>Oui, j'ai une pièce disponible</span>
                                            </label>
                                            <label class="radio-option-h">
                                                <input type="radio" name="piece_dediee" value="non">
                                                <span>Non, mais je peux aménager un espace</span>
                                            </label>
                                        </div>
                                    </div>

                                    <div class="availability-section">
                                        <h3><i class="fas fa-paw"></i> Autres animaux au foyer</h3>
                                        <div class="form-group">
                                            <textarea name="autres_animaux" class="form-control" rows="3" placeholder="Décrivez les animaux présents dans votre foyer (espèce, âge, caractère). Indiquez 'Aucun' si vous n'avez pas d'animaux."></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="actions">
                            <a href="<?php echo home_url('/'); ?>" class="btn-back-site"><i class="fa fa-times"></i> Retour au site</a>
                            <ul class="nav-buttons">
                                <li><span class="js-btn-prev" title="Retour"><i class="fa fa-arrow-left"></i> Retour</span></li>
                                <li><span class="js-btn-next" title="Suivant">Suivant <i class="fa fa-arrow-right"></i></span></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- ÉTAPE 3: Disponibilités -->
                <div class="multisteps-form__panel" data-animation="slideHorz">
                    <div class="wizard-forms">
                        <div class="inner pb-100 clearfix">
                            <div class="form-content pera-content">
                                <div class="step-inner-content">
                                    <span class="step-no bottom-line">Étape 3</span>
                                    <div class="step-progress float-right">
                                        <span>3 sur 5</span>
                                        <div class="step-progress-bar">
                                            <div class="progress">
                                                <div class="progress-bar" style="width:60%"></div>
                                            </div>
                                        </div>
                                    </div>

                                    <h2>Vos disponibilités</h2>
                                    <p>Indiquez-nous votre disponibilité pour accueillir un chat.</p>

                                    <div class="step-illustration">
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/images/illustrations/3_cute cat.png" alt="">
                                    </div>

                                    <div class="availability-section">
                                        <h3><i class="fas fa-calendar-check"></i> Durée d'accueil possible</h3>
                                        <div class="form-group">
                                            <select name="duree_accueil" class="form-control">
                                                <option value="">Sélectionnez...</option>
                                                <option value="quelques-jours">Quelques jours (dépannage)</option>
                                                <option value="1-2-semaines">1 à 2 semaines</option>
                                                <option value="1-2-mois">1 à 2 mois</option>
                                                <option value="3-mois">Jusqu'à 3 mois</option>
                                                <option value="plus-3-mois">Plus de 3 mois si nécessaire</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="availability-section">
                                        <h3><i class="fas fa-clock"></i> Présence quotidienne</h3>
                                        <div class="form-group">
                                            <select name="presence_quotidienne" class="form-control">
                                                <option value="">Sélectionnez...</option>
                                                <option value="toujours">Présent(e) en permanence (télétravail, retraité...)</option>
                                                <option value="demi-journee">Absent(e) une demi-journée</option>
                                                <option value="journee">Absent(e) la journée (retour le soir)</option>
                                                <option value="variable">Horaires variables</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="availability-section">
                                        <h3><i class="fas fa-calendar-alt"></i> Disponibilité pour les visites vétérinaires</h3>
                                        <div class="radio-group-horizontal">
                                            <label class="radio-option-h">
                                                <input type="radio" name="dispo_veterinaire" value="oui">
                                                <span>Oui, je peux m'organiser facilement</span>
                                            </label>
                                            <label class="radio-option-h">
                                                <input type="radio" name="dispo_veterinaire" value="difficilement">
                                                <span>Difficilement, j'aurais besoin d'aide</span>
                                            </label>
                                        </div>
                                    </div>

                                    <div class="availability-section">
                                        <h3><i class="fas fa-plane"></i> Absences prévues</h3>
                                        <div class="form-group">
                                            <textarea name="absences_prevues" class="form-control" rows="2" placeholder="Avez-vous des vacances ou absences prévues dans les prochains mois ?"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="actions">
                            <a href="<?php echo home_url('/'); ?>" class="btn-back-site"><i class="fa fa-times"></i> Retour au site</a>
                            <ul class="nav-buttons">
                                <li><span class="js-btn-prev" title="Retour"><i class="fa fa-arrow-left"></i> Retour</span></li>
                                <li><span class="js-btn-next" title="Suivant">Suivant <i class="fa fa-arrow-right"></i></span></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- ÉTAPE 4: Expérience -->
                <div class="multisteps-form__panel" data-animation="slideHorz">
                    <div class="wizard-forms">
                        <div class="inner pb-100 clearfix">
                            <div class="form-content pera-content">
                                <div class="step-inner-content">
                                    <span class="step-no bottom-line">Étape 4</span>
                                    <div class="step-progress float-right">
                                        <span>4 sur 5</span>
                                        <div class="step-progress-bar">
                                            <div class="progress">
                                                <div class="progress-bar" style="width:80%"></div>
                                            </div>
                                        </div>
                                    </div>

                                    <h2>Votre expérience</h2>
                                    <p>Parlez-nous de votre expérience avec les animaux.</p>

                                    <div class="step-illustration">
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/images/illustrations/4_playful cat.png" alt="">
                                    </div>

                                    <div class="experience-section">
                                        <h3><i class="fas fa-cat"></i> Expérience avec les chats</h3>
                                        <div class="radio-group">
                                            <label class="radio-option">
                                                <input type="radio" name="experience_chats" value="aucune">
                                                <span class="radio-box">Aucune expérience</span>
                                            </label>
                                            <label class="radio-option">
                                                <input type="radio" name="experience_chats" value="proprietaire">
                                                <span class="radio-box">J'ai ou j'ai eu des chats</span>
                                            </label>
                                            <label class="radio-option">
                                                <input type="radio" name="experience_chats" value="chatons">
                                                <span class="radio-box">Expérience avec des chatons</span>
                                            </label>
                                            <label class="radio-option">
                                                <input type="radio" name="experience_chats" value="famille-accueil">
                                                <span class="radio-box">Déjà famille d'accueil</span>
                                            </label>
                                        </div>
                                    </div>

                                    <div class="experience-section">
                                        <h3><i class="fas fa-medkit"></i> Soins aux animaux</h3>
                                        <div class="radio-group">
                                            <label class="radio-option">
                                                <input type="radio" name="experience_soins" value="aucune">
                                                <span class="radio-box">Aucune expérience en soins</span>
                                            </label>
                                            <label class="radio-option">
                                                <input type="radio" name="experience_soins" value="basique">
                                                <span class="radio-box">Soins basiques (nourriture, litière)</span>
                                            </label>
                                            <label class="radio-option">
                                                <input type="radio" name="experience_soins" value="medicaments">
                                                <span class="radio-box">Administration de médicaments</span>
                                            </label>
                                            <label class="radio-option">
                                                <input type="radio" name="experience_soins" value="avancee">
                                                <span class="radio-box">Expérience avancée (biberonnage, soins spéciaux)</span>
                                            </label>
                                        </div>
                                    </div>

                                    <div class="experience-section">
                                        <h3><i class="fas fa-baby-carriage"></i> Expérience avec les chatons</h3>
                                        <div class="form-group">
                                            <textarea name="experience_chatons" class="form-control" rows="3" placeholder="Avez-vous déjà eu des chatons ? Si oui, décrivez votre expérience (biberonnage, sevrage, socialisation...)."></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="actions">
                            <a href="<?php echo home_url('/'); ?>" class="btn-back-site"><i class="fa fa-times"></i> Retour au site</a>
                            <ul class="nav-buttons">
                                <li><span class="js-btn-prev" title="Retour"><i class="fa fa-arrow-left"></i> Retour</span></li>
                                <li><span class="js-btn-next" title="Suivant">Suivant <i class="fa fa-arrow-right"></i></span></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- ÉTAPE 5: Motivation -->
                <div class="multisteps-form__panel" data-animation="slideHorz">
                    <div class="wizard-forms">
                        <div class="inner pb-100 clearfix">
                            <div class="form-content pera-content">
                                <div class="step-inner-content">
                                    <span class="step-no bottom-line">Étape 5</span>
                                    <div class="step-progress float-right">
                                        <span>5 sur 5</span>
                                        <div class="step-progress-bar">
                                            <div class="progress">
                                                <div class="progress-bar" style="width:100%"></div>
                                            </div>
                                        </div>
                                    </div>

                                    <h2>Votre motivation</h2>
                                    <p>Dites-nous pourquoi vous souhaitez devenir famille d'accueil !</p>

                                    <div class="step-illustration">
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/images/illustrations/14_orange cat.png" alt="">
                                    </div>

                                    <div class="motivation-section">
                                        <h3><i class="fas fa-lightbulb"></i> Pourquoi souhaitez-vous devenir famille d'accueil ?</h3>
                                        <div class="form-group">
                                            <textarea name="motivation" class="form-control" rows="4" placeholder="Partagez vos motivations..." required></textarea>
                                        </div>
                                    </div>

                                    <div class="motivation-section">
                                        <h3><i class="fas fa-cat"></i> Quel type d'accueil vous intéresse ?</h3>
                                        <p class="hint">Sélectionnez tout ce qui vous intéresse</p>
                                        <div class="missions-grid">
                                            <label class="mission-option">
                                                <input type="checkbox" name="type_accueil[]" value="maman-chatons">
                                                <span class="mission-box">
                                                    <i class="fas fa-heart"></i>
                                                    <strong>Maman et chatons</strong>
                                                    <small>Accueillir une chatte et sa portée</small>
                                                </span>
                                            </label>
                                            <label class="mission-option">
                                                <input type="checkbox" name="type_accueil[]" value="chatons-orphelins">
                                                <span class="mission-box">
                                                    <i class="fas fa-baby"></i>
                                                    <strong>Chatons orphelins</strong>
                                                    <small>Biberonnage et sevrage</small>
                                                </span>
                                            </label>
                                            <label class="mission-option">
                                                <input type="checkbox" name="type_accueil[]" value="chat-convalescent">
                                                <span class="mission-box">
                                                    <i class="fas fa-medkit"></i>
                                                    <strong>Chat convalescent</strong>
                                                    <small>Repos post-opératoire ou maladie</small>
                                                </span>
                                            </label>
                                            <label class="mission-option">
                                                <input type="checkbox" name="type_accueil[]" value="chat-socialisation">
                                                <span class="mission-box">
                                                    <i class="fas fa-hands-helping"></i>
                                                    <strong>Chat à socialiser</strong>
                                                    <small>Chat craintif à apprivoiser</small>
                                                </span>
                                            </label>
                                        </div>
                                    </div>

                                    <div class="motivation-section">
                                        <h3><i class="fas fa-question-circle"></i> Comment avez-vous connu Le Fanal des Chats ?</h3>
                                        <div class="form-group">
                                            <select name="source" class="form-control">
                                                <option value="">Sélectionnez...</option>
                                                <option value="reseaux_sociaux">Réseaux sociaux (Facebook, Instagram)</option>
                                                <option value="bouche_a_oreille">Bouche à oreille</option>
                                                <option value="recherche_internet">Recherche internet</option>
                                                <option value="evenement">Événement / Salon</option>
                                                <option value="adoption">Via une adoption</option>
                                                <option value="autre">Autre</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="motivation-section">
                                        <h3><i class="fas fa-comment-alt"></i> Informations complémentaires</h3>
                                        <div class="form-group">
                                            <textarea name="infos_complementaires" class="form-control" rows="3" placeholder="Y a-t-il autre chose que vous aimeriez nous dire ? (allergies, contraintes, questions...)"></textarea>
                                        </div>
                                    </div>

                                    <div class="consent-section">
                                        <label class="consent-option">
                                            <input type="checkbox" name="rgpd" value="oui" required>
                                            <span>J'accepte que mes données soient utilisées dans le cadre de ma candidature comme famille d'accueil au Fanal des Chats. *</span>
                                        </label>
                                        <label class="consent-option">
                                            <input type="checkbox" name="newsletter" value="oui">
                                            <span>Je souhaite recevoir la newsletter du refuge.</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="actions">
                            <a href="<?php echo home_url('/'); ?>" class="btn-back-site"><i class="fa fa-times"></i> Retour au site</a>
                            <ul class="nav-buttons">
                                <li><span class="js-btn-prev" title="Retour"><i class="fa fa-arrow-left"></i> Retour</span></li>
                                <li><button type="submit" title="Envoyer" id="submitBtn"><i class="fas fa-paper-plane"></i> Envoyer ma candidature</button></li>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>
        </form>
    </div>

    <!-- Modal de confirmation -->
    <div class="success-modal" id="successModal">
        <div class="success-content">
            <div class="success-icon">
                <i class="fas fa-check-circle"></i>
            </div>
            <h2>Merci pour votre candidature !</h2>
            <p>Nous avons bien reçu votre demande pour devenir famille d'accueil au Fanal des Chats.</p>
            <p>Notre équipe examinera votre candidature et vous recontactera dans les plus brefs délais.</p>
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/images/illustrations/5_little cat.png" alt="" class="success-cat">
            <a href="<?php echo home_url('/'); ?>" class="btn-home">
                <i class="fas fa-home"></i> Retour à l'accueil
            </a>
        </div>
    </div>

    <!-- Scripts -->
    <script src="<?php echo get_template_directory_uri(); ?>/assets/js/jquery.min.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/assets/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/assets/js/formulaire-benevole.js"></script>

    <?php wp_footer(); ?>
</body>
</html>
