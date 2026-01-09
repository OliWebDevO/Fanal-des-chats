<?php
/**
 * Template Name: Formulaire Benevole
 * Description: Formulaire de candidature benevole multi-etapes
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Devenir Benevole - <?php bloginfo('name'); ?></title>

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
            <input type="hidden" name="action" value="submit_benevole_form">
            <?php wp_nonce_field('benevole_form_nonce', 'benevole_nonce'); ?>

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
                                    <p>Indiquez-nous quand vous seriez disponible pour nous aider.</p>

                                    <div class="step-illustration">
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/images/illustrations/13_sleeping cat.png" alt="">
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

                                    <div class="availability-section">
                                        <h3><i class="fas fa-hourglass-half"></i> Temps disponible par semaine</h3>
                                        <div class="form-group">
                                            <select name="heures_semaine" class="form-control">
                                                <option value="">Selectionnez...</option>
                                                <option value="1-2h">1 a 2 heures</option>
                                                <option value="3-5h">3 a 5 heures</option>
                                                <option value="6-10h">6 a 10 heures</option>
                                                <option value="10h+">Plus de 10 heures</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="availability-section">
                                        <h3><i class="fas fa-calendar-check"></i> Engagement souhaite</h3>
                                        <div class="form-group">
                                            <select name="duree_engagement" class="form-control">
                                                <option value="">Selectionnez...</option>
                                                <option value="ponctuel">Ponctuel (evenements)</option>
                                                <option value="1-3mois">1 a 3 mois</option>
                                                <option value="6mois">6 mois</option>
                                                <option value="1an">1 an ou plus</option>
                                                <option value="indefini">Sans limite de temps</option>
                                            </select>
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

                <!-- ETAPE 3: Experience -->
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

                                    <h2>Votre experience</h2>
                                    <p>Parlez-nous de votre experience avec les animaux et le benevolat.</p>

                                    <div class="step-illustration">
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/images/illustrations/3_cute cat.png" alt="">
                                    </div>

                                    <div class="experience-section">
                                        <h3><i class="fas fa-cat"></i> Experience avec les chats</h3>
                                        <div class="radio-group">
                                            <label class="radio-option">
                                                <input type="radio" name="experience_chats" value="aucune">
                                                <span class="radio-box">Aucune experience</span>
                                            </label>
                                            <label class="radio-option">
                                                <input type="radio" name="experience_chats" value="proprietaire">
                                                <span class="radio-box">J'ai/ai eu des chats</span>
                                            </label>
                                            <label class="radio-option">
                                                <input type="radio" name="experience_chats" value="professionnelle">
                                                <span class="radio-box">Experience professionnelle</span>
                                            </label>
                                            <label class="radio-option">
                                                <input type="radio" name="experience_chats" value="refuge">
                                                <span class="radio-box">Benevole dans un refuge</span>
                                            </label>
                                        </div>
                                    </div>

                                    <div class="experience-section">
                                        <h3><i class="fas fa-paw"></i> Autres animaux</h3>
                                        <div class="form-group">
                                            <label>Avez-vous de l'experience avec d'autres animaux ?</label>
                                            <textarea name="experience_autres_animaux" class="form-control" rows="3" placeholder="Decrivez votre experience avec d'autres animaux (chiens, NAC, etc.)"></textarea>
                                        </div>
                                    </div>

                                    <div class="experience-section">
                                        <h3><i class="fas fa-hands-helping"></i> Experience benevolat</h3>
                                        <div class="radio-group">
                                            <label class="radio-option">
                                                <input type="radio" name="experience_benevolat" value="aucune">
                                                <span class="radio-box">Premiere experience</span>
                                            </label>
                                            <label class="radio-option">
                                                <input type="radio" name="experience_benevolat" value="quelques">
                                                <span class="radio-box">Quelques experiences</span>
                                            </label>
                                            <label class="radio-option">
                                                <input type="radio" name="experience_benevolat" value="regulier">
                                                <span class="radio-box">Benevole regulier</span>
                                            </label>
                                        </div>
                                        <div class="form-group mt-3">
                                            <textarea name="details_benevolat" class="form-control" rows="3" placeholder="Decrivez vos experiences de benevolat precedentes (facultatif)"></textarea>
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

                <!-- ETAPE 4: Competences et preferences -->
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

                                    <h2>Competences et preferences</h2>
                                    <p>Quelles missions vous interessent le plus ?</p>

                                    <div class="step-illustration">
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/images/illustrations/4_playful cat.png" alt="">
                                    </div>

                                    <div class="skills-section">
                                        <h3><i class="fas fa-tasks"></i> Missions souhaitees</h3>
                                        <p class="hint">Selectionnez toutes les missions qui vous interessent</p>
                                        <div class="missions-grid">
                                            <label class="mission-option">
                                                <input type="checkbox" name="missions[]" value="soins">
                                                <span class="mission-box">
                                                    <i class="fas fa-heart"></i>
                                                    <strong>Soins aux chats</strong>
                                                    <small>Nourriture, litiere, caresses</small>
                                                </span>
                                            </label>
                                            <label class="mission-option">
                                                <input type="checkbox" name="missions[]" value="nettoyage">
                                                <span class="mission-box">
                                                    <i class="fas fa-broom"></i>
                                                    <strong>Entretien</strong>
                                                    <small>Nettoyage des locaux</small>
                                                </span>
                                            </label>
                                            <label class="mission-option">
                                                <input type="checkbox" name="missions[]" value="socialisation">
                                                <span class="mission-box">
                                                    <i class="fas fa-cat"></i>
                                                    <strong>Socialisation</strong>
                                                    <small>Jeux, education, habituation</small>
                                                </span>
                                            </label>
                                            <label class="mission-option">
                                                <input type="checkbox" name="missions[]" value="transport">
                                                <span class="mission-box">
                                                    <i class="fas fa-car"></i>
                                                    <strong>Transport</strong>
                                                    <small>Veterinaire, transferts</small>
                                                </span>
                                            </label>
                                            <label class="mission-option">
                                                <input type="checkbox" name="missions[]" value="accueil">
                                                <span class="mission-box">
                                                    <i class="fas fa-home"></i>
                                                    <strong>Famille d'accueil</strong>
                                                    <small>Accueillir temporairement</small>
                                                </span>
                                            </label>
                                            <label class="mission-option">
                                                <input type="checkbox" name="missions[]" value="evenements">
                                                <span class="mission-box">
                                                    <i class="fas fa-calendar-alt"></i>
                                                    <strong>Evenements</strong>
                                                    <small>Salons, journees adoption</small>
                                                </span>
                                            </label>
                                            <label class="mission-option">
                                                <input type="checkbox" name="missions[]" value="communication">
                                                <span class="mission-box">
                                                    <i class="fas fa-bullhorn"></i>
                                                    <strong>Communication</strong>
                                                    <small>Reseaux sociaux, photos</small>
                                                </span>
                                            </label>
                                            <label class="mission-option">
                                                <input type="checkbox" name="missions[]" value="administratif">
                                                <span class="mission-box">
                                                    <i class="fas fa-file-alt"></i>
                                                    <strong>Administratif</strong>
                                                    <small>Dossiers, suivi adoptions</small>
                                                </span>
                                            </label>
                                        </div>
                                    </div>

                                    <div class="skills-section">
                                        <h3><i class="fas fa-star"></i> Competences particulieres</h3>
                                        <div class="form-group">
                                            <textarea name="competences" class="form-control" rows="3" placeholder="Avez-vous des competences particulieres ? (photographie, veterinaire, graphisme, informatique, etc.)"></textarea>
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
                                    <p>Dites-nous pourquoi vous souhaitez rejoindre notre equipe !</p>

                                    <div class="step-illustration">
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/images/illustrations/14_orange cat.png" alt="">
                                    </div>

                                    <div class="motivation-section">
                                        <h3><i class="fas fa-lightbulb"></i> Pourquoi souhaitez-vous devenir benevole ?</h3>
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
                                        <h3><i class="fas fa-heart"></i> Qu'attendez-vous de cette experience ?</h3>
                                        <div class="form-group">
                                            <textarea name="attentes" class="form-control" rows="3" placeholder="Qu'esperez-vous retirer de cette experience de benevolat ?"></textarea>
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
                                            <span>J'accepte que mes donnees soient utilisees dans le cadre de ma candidature benevole au Fanal des Chats. *</span>
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
            <p>Nous avons bien recu votre demande pour devenir benevole au Fanal des Chats.</p>
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
