<?php
/**
 * Template Name: Formulaire Stage
 * Description: Formulaire de demande de stage multi-etapes
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Demande de Stage - <?php bloginfo('name'); ?></title>

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
<body class="formulaire-stage-page">

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
                        <span class="step-label">Formation</span>
                    </li>
                    <li class="multisteps-form__progress-btn" data-step="3">
                        <span>3</span>
                        <span class="step-label">Stage</span>
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
            <input type="hidden" name="action" value="submit_stage_form">
            <?php wp_nonce_field('stage_form_nonce', 'stage_nonce'); ?>

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

                <!-- ETAPE 2: Formation -->
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

                                    <h2>Votre formation</h2>
                                    <p>Parlez-nous de votre parcours scolaire ou universitaire.</p>

                                    <div class="step-illustration">
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/images/illustrations/13_sleeping cat.png" alt="">
                                    </div>

                                    <div class="experience-section">
                                        <h3><i class="fas fa-university"></i> Etablissement scolaire/universitaire</h3>
                                        <div class="form-group">
                                            <input type="text" name="etablissement" id="etablissement" class="form-control" placeholder="Nom de votre etablissement">
                                        </div>
                                    </div>

                                    <div class="experience-section">
                                        <h3><i class="fas fa-book"></i> Formation/filiere actuelle</h3>
                                        <div class="form-group">
                                            <input type="text" name="formation" id="formation" class="form-control" placeholder="Ex: Licence Biologie, BTS Animalier...">
                                        </div>
                                    </div>

                                    <div class="experience-section">
                                        <h3><i class="fas fa-graduation-cap"></i> Annee d'etudes</h3>
                                        <div class="form-group">
                                            <select name="annee_etudes" class="form-control">
                                                <option value="">Selectionnez...</option>
                                                <option value="1ere">1ere annee</option>
                                                <option value="2eme">2eme annee</option>
                                                <option value="3eme">3eme annee</option>
                                                <option value="master1">Master 1</option>
                                                <option value="master2">Master 2</option>
                                                <option value="autre">Autre</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="experience-section">
                                        <h3><i class="fas fa-file-signature"></i> Convention de stage disponible</h3>
                                        <div class="radio-group">
                                            <label class="radio-option">
                                                <input type="radio" name="convention_stage" value="oui">
                                                <span class="radio-box">Oui</span>
                                            </label>
                                            <label class="radio-option">
                                                <input type="radio" name="convention_stage" value="non">
                                                <span class="radio-box">Non</span>
                                            </label>
                                            <label class="radio-option">
                                                <input type="radio" name="convention_stage" value="en_cours">
                                                <span class="radio-box">En cours</span>
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

                <!-- ETAPE 3: Details du stage -->
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

                                    <h2>Details du stage</h2>
                                    <p>Precisez le type de stage et vos disponibilites.</p>

                                    <div class="step-illustration">
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/images/illustrations/3_cute cat.png" alt="">
                                    </div>

                                    <div class="skills-section">
                                        <h3><i class="fas fa-tasks"></i> Type de stage souhaite</h3>
                                        <p class="hint">Selectionnez tous les domaines qui vous interessent</p>
                                        <div class="missions-grid">
                                            <label class="mission-option">
                                                <input type="checkbox" name="type_stage[]" value="soins_animaliers">
                                                <span class="mission-box">
                                                    <i class="fas fa-heart"></i>
                                                    <strong>Soins animaliers</strong>
                                                    <small>Soins quotidiens aux chats</small>
                                                </span>
                                            </label>
                                            <label class="mission-option">
                                                <input type="checkbox" name="type_stage[]" value="veterinaire">
                                                <span class="mission-box">
                                                    <i class="fas fa-stethoscope"></i>
                                                    <strong>Veterinaire</strong>
                                                    <small>Assistance aux soins veterinaires</small>
                                                </span>
                                            </label>
                                            <label class="mission-option">
                                                <input type="checkbox" name="type_stage[]" value="communication">
                                                <span class="mission-box">
                                                    <i class="fas fa-bullhorn"></i>
                                                    <strong>Communication</strong>
                                                    <small>Reseaux sociaux, medias</small>
                                                </span>
                                            </label>
                                            <label class="mission-option">
                                                <input type="checkbox" name="type_stage[]" value="gestion_administration">
                                                <span class="mission-box">
                                                    <i class="fas fa-file-alt"></i>
                                                    <strong>Gestion et administration</strong>
                                                    <small>Dossiers, organisation</small>
                                                </span>
                                            </label>
                                            <label class="mission-option">
                                                <input type="checkbox" name="type_stage[]" value="education_sensibilisation">
                                                <span class="mission-box">
                                                    <i class="fas fa-chalkboard-teacher"></i>
                                                    <strong>Education et sensibilisation</strong>
                                                    <small>Ateliers, animations</small>
                                                </span>
                                            </label>
                                            <label class="mission-option">
                                                <input type="checkbox" name="type_stage[]" value="observation">
                                                <span class="mission-box">
                                                    <i class="fas fa-eye"></i>
                                                    <strong>Observation</strong>
                                                    <small>Stage d'observation</small>
                                                </span>
                                            </label>
                                        </div>
                                    </div>

                                    <div class="availability-section">
                                        <h3><i class="fas fa-calendar-alt"></i> Periode souhaitee</h3>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="date_debut">Date de debut</label>
                                                    <input type="date" name="date_debut" id="date_debut" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="date_fin">Date de fin</label>
                                                    <input type="date" name="date_fin" id="date_fin" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="availability-section">
                                        <h3><i class="fas fa-hourglass-half"></i> Duree du stage</h3>
                                        <div class="form-group">
                                            <select name="duree_stage" class="form-control">
                                                <option value="">Selectionnez...</option>
                                                <option value="1_semaine">1 semaine</option>
                                                <option value="2_semaines">2 semaines</option>
                                                <option value="1_mois">1 mois</option>
                                                <option value="2_mois">2 mois</option>
                                                <option value="3_mois">3 mois</option>
                                                <option value="plus_3_mois">Plus de 3 mois</option>
                                            </select>
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

                <!-- ETAPE 4: Experience et competences -->
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

                                    <h2>Experience et competences</h2>
                                    <p>Parlez-nous de votre experience et de vos competences.</p>

                                    <div class="step-illustration">
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/images/illustrations/4_playful cat.png" alt="">
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
                                        <h3><i class="fas fa-clipboard-list"></i> Stages precedents</h3>
                                        <div class="form-group">
                                            <textarea name="stages_precedents" class="form-control" rows="3" placeholder="Decrivez vos stages precedents (lieu, duree, missions...)"></textarea>
                                        </div>
                                    </div>

                                    <div class="skills-section">
                                        <h3><i class="fas fa-star"></i> Competences particulieres</h3>
                                        <div class="form-group">
                                            <textarea name="competences" class="form-control" rows="3" placeholder="Avez-vous des competences particulieres ? (soins animaliers, informatique, langues, etc.)"></textarea>
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
                                    <p>Dites-nous pourquoi vous souhaitez faire un stage au Fanal des Chats !</p>

                                    <div class="step-illustration">
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/images/illustrations/14_orange cat.png" alt="">
                                    </div>

                                    <div class="motivation-section">
                                        <h3><i class="fas fa-lightbulb"></i> Pourquoi souhaitez-vous faire un stage au Fanal des Chats ?</h3>
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
                                        <h3><i class="fas fa-heart"></i> Qu'attendez-vous de ce stage ?</h3>
                                        <div class="form-group">
                                            <textarea name="attentes" class="form-control" rows="3" placeholder="Qu'esperez-vous retirer de cette experience de stage ?"></textarea>
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
                                            <span>J'accepte que mes donnees soient utilisees dans le cadre de ma demande de stage au Fanal des Chats. *</span>
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
                                <li><button type="submit" title="Envoyer" id="submitBtn"><i class="fas fa-paper-plane"></i> Envoyer ma demande de stage</button></li>
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
            <h2>Merci pour votre demande !</h2>
            <p>Nous avons bien recu votre demande de stage au Fanal des Chats.</p>
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
