<?php
/**
 * Template Name: Formulaire Emploi
 * Description: Formulaire de candidature emploi multi-etapes
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Candidature Emploi - <?php bloginfo('name'); ?></title>

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
<body class="formulaire-emploi-page">

    <div class="wrapper">
        <!-- Sidebar avec image et etapes -->
        <div class="steps-area steps-area-fixed">
            <div class="image-holder">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/images/illustrations/7_pretty cat.png" alt="Chat du refuge">
            </div>
            <div class="steps clearfix">
                <ul class="tablist multisteps-form__progress">
                    <li class="multisteps-form__progress-btn js-active current" data-step="1">
                        <span>1</span>
                        <span class="step-label">Informations</span>
                    </li>
                    <li class="multisteps-form__progress-btn" data-step="2">
                        <span>2</span>
                        <span class="step-label">Disponibilites</span>
                    </li>
                    <li class="multisteps-form__progress-btn" data-step="3">
                        <span>3</span>
                        <span class="step-label">Experience</span>
                    </li>
                    <li class="multisteps-form__progress-btn" data-step="4">
                        <span>4</span>
                        <span class="step-label">Competences</span>
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
            <input type="hidden" name="action" value="submit_emploi_form">
            <?php wp_nonce_field('emploi_form_nonce', 'emploi_nonce'); ?>

            <div class="form-area position-relative">

                <!-- ETAPE 1: Informations personnelles -->
                <div class="multisteps-form__panel js-active" data-animation="slideHorz">
                    <div class="wizard-forms">
                        <div class="inner pb-100 clearfix">
                            <div class="form-content pera-content">
                                <div class="step-inner-content">
                                    <span class="step-no">Etape 1</span>
                                    <h2>Vos informations personnelles</h2>
                                    <p>Nous avons besoin de quelques informations pour mieux vous connaitre.</p>

                                    <div class="step-illustration">
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/images/illustrations/1_meow cat.png" alt="">
                                    </div>

                                    <div class="form-inner-area">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="prenom">Prenom *</label>
                                                    <input type="text" name="prenom" id="prenom" class="form-control required" placeholder="Votre prenom" required>
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
                                                    <label for="telephone">Telephone *</label>
                                                    <input type="tel" name="telephone" id="telephone" class="form-control required" placeholder="0470 00 00 00" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <label for="adresse">Adresse</label>
                                                    <input type="text" name="adresse" id="adresse" class="form-control" placeholder="Rue et numero">
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

                <!-- ETAPE 2: Disponibilites -->
                <div class="multisteps-form__panel" data-animation="slideHorz">
                    <div class="wizard-forms">
                        <div class="inner pb-100 clearfix">
                            <div class="form-content pera-content">
                                <div class="step-inner-content">
                                    <span class="step-no bottom-line">Etape 2</span>
                                    <div class="step-progress float-right">
                                        <span>2 sur 5</span>
                                        <div class="step-progress-bar">
                                            <div class="progress">
                                                <div class="progress-bar" style="width:40%"></div>
                                            </div>
                                        </div>
                                    </div>

                                    <h2>Vos disponibilites</h2>
                                    <p>Indiquez-nous vos preferences en termes de contrat et de disponibilite.</p>

                                    <div class="step-illustration">
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/images/illustrations/13_sleeping cat.png" alt="">
                                    </div>

                                    <div class="availability-section">
                                        <h3><i class="fas fa-file-contract"></i> Type de contrat souhaite</h3>
                                        <div class="form-group">
                                            <select name="type_contrat" class="form-control">
                                                <option value="">Selectionnez...</option>
                                                <option value="temps_plein">Temps plein</option>
                                                <option value="temps_partiel">Temps partiel</option>
                                                <option value="cdd">CDD</option>
                                                <option value="cdi">CDI</option>
                                                <option value="interim">Interim</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="availability-section">
                                        <h3><i class="fas fa-calendar-check"></i> Date de disponibilite</h3>
                                        <div class="form-group">
                                            <input type="date" name="date_disponibilite" id="date_disponibilite" class="form-control">
                                        </div>
                                    </div>

                                    <div class="availability-section">
                                        <h3><i class="fas fa-calendar-alt"></i> Jours disponibles</h3>
                                        <div class="days-grid">
                                            <label class="day-option">
                                                <input type="checkbox" name="jours[]" value="lundi">
                                                <span class="day-box">Lundi</span>
                                            </label>
                                            <label class="day-option">
                                                <input type="checkbox" name="jours[]" value="mardi">
                                                <span class="day-box">Mardi</span>
                                            </label>
                                            <label class="day-option">
                                                <input type="checkbox" name="jours[]" value="mercredi">
                                                <span class="day-box">Mercredi</span>
                                            </label>
                                            <label class="day-option">
                                                <input type="checkbox" name="jours[]" value="jeudi">
                                                <span class="day-box">Jeudi</span>
                                            </label>
                                            <label class="day-option">
                                                <input type="checkbox" name="jours[]" value="vendredi">
                                                <span class="day-box">Vendredi</span>
                                            </label>
                                            <label class="day-option">
                                                <input type="checkbox" name="jours[]" value="samedi">
                                                <span class="day-box">Samedi</span>
                                            </label>
                                            <label class="day-option">
                                                <input type="checkbox" name="jours[]" value="dimanche">
                                                <span class="day-box">Dimanche</span>
                                            </label>
                                        </div>
                                    </div>

                                    <div class="availability-section">
                                        <h3><i class="fas fa-clock"></i> Creneaux horaires preferes</h3>
                                        <div class="time-grid">
                                            <label class="time-option">
                                                <input type="checkbox" name="horaires[]" value="matin">
                                                <span class="time-box"><i class="fas fa-sun"></i> Matin (8h-12h)</span>
                                            </label>
                                            <label class="time-option">
                                                <input type="checkbox" name="horaires[]" value="apres-midi">
                                                <span class="time-box"><i class="fas fa-cloud-sun"></i> Apres-midi (12h-18h)</span>
                                            </label>
                                            <label class="time-option">
                                                <input type="checkbox" name="horaires[]" value="soir">
                                                <span class="time-box"><i class="fas fa-moon"></i> Soir (18h-21h)</span>
                                            </label>
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

                <!-- ETAPE 3: Experience professionnelle -->
                <div class="multisteps-form__panel" data-animation="slideHorz">
                    <div class="wizard-forms">
                        <div class="inner pb-100 clearfix">
                            <div class="form-content pera-content">
                                <div class="step-inner-content">
                                    <span class="step-no bottom-line">Etape 3</span>
                                    <div class="step-progress float-right">
                                        <span>3 sur 5</span>
                                        <div class="step-progress-bar">
                                            <div class="progress">
                                                <div class="progress-bar" style="width:60%"></div>
                                            </div>
                                        </div>
                                    </div>

                                    <h2>Votre experience professionnelle</h2>
                                    <p>Parlez-nous de votre parcours et de votre experience avec les animaux.</p>

                                    <div class="step-illustration">
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/images/illustrations/3_cute cat.png" alt="">
                                    </div>

                                    <div class="experience-section">
                                        <h3><i class="fas fa-graduation-cap"></i> Dernier diplome obtenu</h3>
                                        <div class="form-group">
                                            <input type="text" name="diplome" id="diplome" class="form-control" placeholder="Ex: Bac+3 en soins animaliers, Certificat veterinaire...">
                                        </div>
                                    </div>

                                    <div class="experience-section">
                                        <h3><i class="fas fa-cat"></i> Experience avec les animaux</h3>
                                        <div class="radio-group">
                                            <label class="radio-option">
                                                <input type="radio" name="experience_animaux" value="aucune">
                                                <span class="radio-box">Aucune experience</span>
                                            </label>
                                            <label class="radio-option">
                                                <input type="radio" name="experience_animaux" value="proprietaire">
                                                <span class="radio-box">Proprietaire d'animaux</span>
                                            </label>
                                            <label class="radio-option">
                                                <input type="radio" name="experience_animaux" value="professionnelle">
                                                <span class="radio-box">Experience professionnelle</span>
                                            </label>
                                            <label class="radio-option">
                                                <input type="radio" name="experience_animaux" value="refuge">
                                                <span class="radio-box">Experience en refuge</span>
                                            </label>
                                        </div>
                                    </div>

                                    <div class="experience-section">
                                        <h3><i class="fas fa-briefcase"></i> Experience professionnelle generale</h3>
                                        <div class="form-group">
                                            <textarea name="experience_professionnelle" class="form-control" rows="4" placeholder="Decrivez votre parcours professionnel, vos postes precedents..."></textarea>
                                        </div>
                                    </div>

                                    <div class="experience-section">
                                        <h3><i class="fas fa-hands-helping"></i> Experience en refuge ou association</h3>
                                        <div class="form-group">
                                            <textarea name="experience_refuge" class="form-control" rows="3" placeholder="Avez-vous deja travaille ou ete benevole dans un refuge ou une association animale ?"></textarea>
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

                <!-- ETAPE 4: Competences et poste souhaite -->
                <div class="multisteps-form__panel" data-animation="slideHorz">
                    <div class="wizard-forms">
                        <div class="inner pb-100 clearfix">
                            <div class="form-content pera-content">
                                <div class="step-inner-content">
                                    <span class="step-no bottom-line">Etape 4</span>
                                    <div class="step-progress float-right">
                                        <span>4 sur 5</span>
                                        <div class="step-progress-bar">
                                            <div class="progress">
                                                <div class="progress-bar" style="width:80%"></div>
                                            </div>
                                        </div>
                                    </div>

                                    <h2>Competences et poste souhaite</h2>
                                    <p>Quel poste vous interesse et quelles sont vos competences ?</p>

                                    <div class="step-illustration">
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/images/illustrations/4_playful cat.png" alt="">
                                    </div>

                                    <div class="skills-section">
                                        <h3><i class="fas fa-tasks"></i> Poste souhaite</h3>
                                        <p class="hint">Selectionnez tous les postes qui vous interessent</p>
                                        <div class="missions-grid">
                                            <label class="mission-option">
                                                <input type="checkbox" name="postes[]" value="soigneur_animalier">
                                                <span class="mission-box">
                                                    <i class="fas fa-heart"></i>
                                                    <strong>Soigneur animalier</strong>
                                                    <small>Soins quotidiens aux animaux</small>
                                                </span>
                                            </label>
                                            <label class="mission-option">
                                                <input type="checkbox" name="postes[]" value="assistant_veterinaire">
                                                <span class="mission-box">
                                                    <i class="fas fa-stethoscope"></i>
                                                    <strong>Assistant veterinaire</strong>
                                                    <small>Aide aux soins veterinaires</small>
                                                </span>
                                            </label>
                                            <label class="mission-option">
                                                <input type="checkbox" name="postes[]" value="responsable_adoptions">
                                                <span class="mission-box">
                                                    <i class="fas fa-home"></i>
                                                    <strong>Responsable adoptions</strong>
                                                    <small>Gestion des adoptions</small>
                                                </span>
                                            </label>
                                            <label class="mission-option">
                                                <input type="checkbox" name="postes[]" value="charge_communication">
                                                <span class="mission-box">
                                                    <i class="fas fa-bullhorn"></i>
                                                    <strong>Charge de communication</strong>
                                                    <small>Reseaux sociaux, medias</small>
                                                </span>
                                            </label>
                                            <label class="mission-option">
                                                <input type="checkbox" name="postes[]" value="agent_entretien">
                                                <span class="mission-box">
                                                    <i class="fas fa-broom"></i>
                                                    <strong>Agent d'entretien</strong>
                                                    <small>Entretien des locaux</small>
                                                </span>
                                            </label>
                                            <label class="mission-option">
                                                <input type="checkbox" name="postes[]" value="coordinateur_logistique">
                                                <span class="mission-box">
                                                    <i class="fas fa-boxes"></i>
                                                    <strong>Coordinateur logistique</strong>
                                                    <small>Organisation et logistique</small>
                                                </span>
                                            </label>
                                            <label class="mission-option">
                                                <input type="checkbox" name="postes[]" value="autre">
                                                <span class="mission-box">
                                                    <i class="fas fa-plus-circle"></i>
                                                    <strong>Autre</strong>
                                                    <small>Precisez dans les competences</small>
                                                </span>
                                            </label>
                                        </div>
                                    </div>

                                    <div class="skills-section">
                                        <h3><i class="fas fa-star"></i> Competences particulieres</h3>
                                        <div class="form-group">
                                            <textarea name="competences" class="form-control" rows="3" placeholder="Avez-vous des competences particulieres ? (soins animaliers, gestion, communication, informatique, etc.)"></textarea>
                                        </div>
                                    </div>

                                    <div class="skills-section">
                                        <h3><i class="fas fa-car"></i> Mobilite</h3>
                                        <div class="radio-group-horizontal">
                                            <label class="radio-option-h">
                                                <input type="radio" name="permis" value="oui">
                                                <span>J'ai le permis de conduire</span>
                                            </label>
                                            <label class="radio-option-h">
                                                <input type="radio" name="permis" value="non">
                                                <span>Je n'ai pas le permis</span>
                                            </label>
                                        </div>
                                        <div class="radio-group-horizontal mt-2">
                                            <label class="radio-option-h">
                                                <input type="radio" name="vehicule" value="oui">
                                                <span>J'ai un vehicule</span>
                                            </label>
                                            <label class="radio-option-h">
                                                <input type="radio" name="vehicule" value="non">
                                                <span>Je n'ai pas de vehicule</span>
                                            </label>
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

                <!-- ETAPE 5: Motivation -->
                <div class="multisteps-form__panel" data-animation="slideHorz">
                    <div class="wizard-forms">
                        <div class="inner pb-100 clearfix">
                            <div class="form-content pera-content">
                                <div class="step-inner-content">
                                    <span class="step-no bottom-line">Etape 5</span>
                                    <div class="step-progress float-right">
                                        <span>5 sur 5</span>
                                        <div class="step-progress-bar">
                                            <div class="progress">
                                                <div class="progress-bar" style="width:100%"></div>
                                            </div>
                                        </div>
                                    </div>

                                    <h2>Votre motivation</h2>
                                    <p>Dites-nous pourquoi vous souhaitez travailler au Fanal des Chats !</p>

                                    <div class="step-illustration">
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/images/illustrations/14_orange cat.png" alt="">
                                    </div>

                                    <div class="motivation-section">
                                        <h3><i class="fas fa-lightbulb"></i> Pourquoi souhaitez-vous travailler au Fanal des Chats ?</h3>
                                        <div class="form-group">
                                            <textarea name="motivation" class="form-control" rows="4" placeholder="Partagez vos motivations..." required></textarea>
                                        </div>
                                    </div>

                                    <div class="motivation-section">
                                        <h3><i class="fas fa-question-circle"></i> Comment avez-vous connu Le Fanal des Chats ?</h3>
                                        <div class="form-group">
                                            <select name="source" class="form-control">
                                                <option value="">Selectionnez...</option>
                                                <option value="reseaux_sociaux">Reseaux sociaux (Facebook, Instagram)</option>
                                                <option value="bouche_a_oreille">Bouche a oreille</option>
                                                <option value="recherche_internet">Recherche internet</option>
                                                <option value="evenement">Evenement / Salon</option>
                                                <option value="adoption">Via une adoption</option>
                                                <option value="autre">Autre</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="motivation-section">
                                        <h3><i class="fas fa-heart"></i> Qu'attendez-vous de ce poste ?</h3>
                                        <div class="form-group">
                                            <textarea name="attentes" class="form-control" rows="3" placeholder="Qu'esperez-vous retirer de ce poste ?"></textarea>
                                        </div>
                                    </div>

                                    <div class="motivation-section">
                                        <h3><i class="fas fa-comment-alt"></i> Informations complementaires</h3>
                                        <div class="form-group">
                                            <textarea name="infos_complementaires" class="form-control" rows="3" placeholder="Y a-t-il autre chose que vous aimeriez nous dire ? (allergies, contraintes, questions...)"></textarea>
                                        </div>
                                    </div>

                                    <div class="consent-section">
                                        <label class="consent-option">
                                            <input type="checkbox" name="rgpd" value="oui" required>
                                            <span>J'accepte que mes donnees soient utilisees dans le cadre de ma candidature au Fanal des Chats. *</span>
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
            <p>Nous avons bien recu votre demande d'emploi au Fanal des Chats.</p>
            <p>Notre equipe examinera votre candidature et vous recontactera dans les plus brefs delais.</p>
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/images/illustrations/5_little cat.png" alt="" class="success-cat">
            <a href="<?php echo home_url('/'); ?>" class="btn-home">
                <i class="fas fa-home"></i> Retour a l'accueil
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
