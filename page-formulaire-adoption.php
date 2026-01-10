<?php
/**
 * Template Name: Formulaire Adoption
 * Description: Formulaire de demande d'adoption multi-étapes complet
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Demande d'adoption - <?php bloginfo('name'); ?></title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,100..1000;1,9..40,100..1000&family=Fredoka+One&display=swap" rel="stylesheet">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/bootstrap.min.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <!-- Formulaire Styles -->
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/formulaire-adoption.css">

    <?php wp_head(); ?>
</head>
<body class="formulaire-adoption-page">

    <div class="wrapper">
        <!-- Sidebar avec image et étapes -->
        <div class="steps-area steps-area-fixed">
            <div class="image-holder">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/images/illustrations/3_cute cat.png" alt="Chat du refuge">
            </div>
            <div class="steps clearfix">
                <ul class="tablist multisteps-form__progress">
                    <li class="multisteps-form__progress-btn js-active current" data-step="1">
                        <span>1</span>
                        <span class="step-label">Identité</span>
                    </li>
                    <li class="multisteps-form__progress-btn" data-step="2">
                        <span>2</span>
                        <span class="step-label">Expérience</span>
                    </li>
                    <li class="multisteps-form__progress-btn" data-step="3">
                        <span>3</span>
                        <span class="step-label">Conditions</span>
                    </li>
                    <li class="multisteps-form__progress-btn" data-step="4">
                        <span>4</span>
                        <span class="step-label">Sécurité</span>
                    </li>
                    <li class="multisteps-form__progress-btn" data-step="5">
                        <span>5</span>
                        <span class="step-label">Engagement</span>
                    </li>
                    <li class="multisteps-form__progress-btn" data-step="6">
                        <span>6</span>
                        <span class="step-label">Motivations</span>
                    </li>
                    <li class="multisteps-form__progress-btn last" data-step="7">
                        <span>7</span>
                        <span class="step-label">Budget</span>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Formulaire -->
        <form class="multisteps-form__form" action="<?php echo admin_url('admin-post.php'); ?>" id="wizard" method="POST">
            <input type="hidden" name="action" value="submit_adoption_form">
            <?php wp_nonce_field('adoption_form_nonce', 'adoption_nonce'); ?>

            <div class="form-area position-relative">

                <!-- ÉTAPE 1: Identité & Disponibilité -->
                <div class="multisteps-form__panel js-active" data-animation="slideHorz">
                    <div class="wizard-forms">
                        <div class="inner pb-100 clearfix">
                            <div class="form-content pera-content">
                                <div class="step-inner-content">
                                    <span class="step-no">Étape 1</span>
                                    <h2>Identité & Disponibilité</h2>
                                    <p class="form-intro">Ce formulaire est obligatoire avant toute rencontre. Il nous permet de garantir des adoptions responsables, durables et sécurisées pour les chats.</p>

                                    <div class="step-illustration">
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/images/illustrations/1_meow cat.png" alt="">
                                    </div>

                                    <div class="form-inner-area">
                                        <h3><i class="fas fa-user"></i> Informations personnelles</h3>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="nom_prenom">Nom & Prénom *</label>
                                                    <input type="text" name="nom_prenom" id="nom_prenom" class="form-control required" placeholder="Votre nom et prénom" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="age">Age *</label>
                                                    <input type="number" name="age" id="age" class="form-control required" placeholder="Votre age" min="18" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <label for="adresse">Adresse *</label>
                                                    <input type="text" name="adresse" id="adresse" class="form-control required" placeholder="Rue et numero" required>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="code_postal">Code postal *</label>
                                                    <input type="text" name="code_postal" id="code_postal" class="form-control required" placeholder="1000" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="commune">Commune *</label>
                                                    <input type="text" name="commune" id="commune" class="form-control required" placeholder="Votre commune" required>
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
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="email">Email *</label>
                                                    <input type="email" name="email" id="email" class="form-control required" placeholder="votre@email.com" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Comment pouvons-nous vous contacter ?</label>
                                                    <div class="checkbox-group-inline">
                                                        <label class="checkbox-option"><input type="checkbox" name="contact_preference[]" value="appel"> <span>Appel</span></label>
                                                        <label class="checkbox-option"><input type="checkbox" name="contact_preference[]" value="sms"> <span>SMS</span></label>
                                                        <label class="checkbox-option"><input type="checkbox" name="contact_preference[]" value="whatsapp"> <span>WhatsApp</span></label>
                                                        <label class="checkbox-option"><input type="checkbox" name="contact_preference[]" value="email"> <span>E-mail</span></label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <h3><i class="fas fa-briefcase"></i> Profession / Activité principale</h3>
                                        <div class="checkbox-group">
                                            <label class="checkbox-option"><input type="checkbox" name="profession[]" value="temps_plein"> <span>Temps plein</span></label>
                                            <label class="checkbox-option"><input type="checkbox" name="profession[]" value="temps_partiel"> <span>Temps partiel</span></label>
                                            <label class="checkbox-option"><input type="checkbox" name="profession[]" value="teletravail"> <span>Télé-travail</span></label>
                                            <label class="checkbox-option"><input type="checkbox" name="profession[]" value="etudiant"> <span>Étudiant</span></label>
                                            <label class="checkbox-option"><input type="checkbox" name="profession[]" value="sans_emploi"> <span>Sans emploi</span></label>
                                            <label class="checkbox-option"><input type="checkbox" name="profession[]" value="retraite"> <span>Retraité</span></label>
                                            <label class="checkbox-option"><input type="checkbox" name="profession[]" value="autre"> <span>Autre</span></label>
                                        </div>

                                        <h3><i class="fas fa-clock"></i> Disponibilité</h3>
                                        <div class="form-group">
                                            <label>Que faites-vous et où êtes-vous les week-ends ou lors de vos jours de repos ?</label>
                                            <textarea name="activite_weekend" class="form-control" rows="2" placeholder="Décrivez vos activités habituelles..."></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Combien d'heures le chat sera-t-il seul par jour en moyenne ?</label>
                                            <div class="radio-group-horizontal">
                                                <label class="radio-option-h"><input type="radio" name="heures_seul" value="0-2h"> <span>0-2h</span></label>
                                                <label class="radio-option-h"><input type="radio" name="heures_seul" value="2-5h"> <span>2-5h</span></label>
                                                <label class="radio-option-h"><input type="radio" name="heures_seul" value="5-10h"> <span>5-10h</span></label>
                                                <label class="radio-option-h"><input type="radio" name="heures_seul" value="10-12h"> <span>10-12h</span></label>
                                                <label class="radio-option-h"><input type="radio" name="heures_seul" value="+12h"> <span>+12h</span></label>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label>Qui s'occupe du/des chat(s) en cas d'absence longue (week-end / vacances) ?</label>
                                            <div class="checkbox-group">
                                                <label class="checkbox-option"><input type="checkbox" name="garde_absence[]" value="famille_amis"> <span>Il va dans la famille ou chez des amis</span></label>
                                                <label class="checkbox-option"><input type="checkbox" name="garde_absence[]" value="pet_sitter"> <span>Un pet-sitter passe le voir</span></label>
                                                <label class="checkbox-option"><input type="checkbox" name="garde_absence[]" value="pension"> <span>Pension</span></label>
                                                <label class="checkbox-option"><input type="checkbox" name="garde_absence[]" value="autre"> <span>Autre</span></label>
                                                <label class="checkbox-option"><input type="checkbox" name="garde_absence[]" value="personne"> <span>Personne, un chat est autonome</span></label>
                                                <label class="checkbox-option"><input type="checkbox" name="garde_absence[]" value="ne_sait_pas"> <span>Je ne sais pas encore</span></label>
                                            </div>
                                        </div>

                                        <h3><i class="fas fa-users"></i> Composition du foyer</h3>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Nombre d'adultes au domicile</label>
                                                    <input type="number" name="nb_adultes" class="form-control" min="1" value="1">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Nombre d'enfants</label>
                                                    <input type="number" name="nb_enfants" class="form-control" min="0" value="0">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Age des enfants</label>
                                                    <input type="text" name="age_enfants" class="form-control" placeholder="Ex: 5 ans, 8 ans">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Nombre d'animaux et quels animaux ?</label>
                                            <input type="text" name="animaux_foyer" class="form-control" placeholder="Ex: 1 chien, 2 chats...">
                                        </div>
                                        <div class="form-group">
                                            <label>Tous les membres du foyer sont-ils d'accord pour l'adoption ?</label>
                                            <div class="radio-group-horizontal">
                                                <label class="radio-option-h"><input type="radio" name="accord_foyer" value="oui"> <span>Oui</span></label>
                                                <label class="radio-option-h"><input type="radio" name="accord_foyer" value="non"> <span>Non</span></label>
                                                <label class="radio-option-h"><input type="radio" name="accord_foyer" value="pas_encore"> <span>Pas encore</span></label>
                                            </div>
                                            <input type="text" name="accord_foyer_explication" class="form-control mt-2" placeholder="Si 'Pas encore', expliquez...">
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

                <!-- ÉTAPE 2: Expérience avec les chats -->
                <div class="multisteps-form__panel" data-animation="slideHorz">
                    <div class="wizard-forms">
                        <div class="inner pb-100 clearfix">
                            <div class="form-content pera-content">
                                <div class="step-inner-content">
                                    <span class="step-no bottom-line">Étape 2</span>
                                    <div class="step-progress float-right">
                                        <span>2 sur 7</span>
                                        <div class="step-progress-bar">
                                            <div class="progress">
                                                <div class="progress-bar" style="width:28%"></div>
                                            </div>
                                        </div>
                                    </div>

                                    <h2>Expérience avec les chats</h2>
                                    <p>L'expérience de l'enfance ne remplace pas une expérience adulte mais vous pouvez en parler si vous le souhaitez.</p>

                                    <div class="step-illustration">
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/images/illustrations/13_sleeping cat.png" alt="">
                                    </div>

                                    <div class="form-inner-area">
                                        <div class="form-group">
                                            <label>Avez-vous déjà vécu avec un chat en tant qu'adulte ?</label>
                                            <div class="radio-group-horizontal">
                                                <label class="radio-option-h"><input type="radio" name="experience_adulte" value="oui"> <span>Oui</span></label>
                                                <label class="radio-option-h"><input type="radio" name="experience_adulte" value="non"> <span>Non</span></label>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label>Si OUI, quels types de chats avez-vous eus ? (cochez tout ce qui s'applique)</label>
                                            <div class="checkbox-group">
                                                <label class="checkbox-option"><input type="checkbox" name="type_experience[]" value="peureux"> <span>Un chat peureux</span></label>
                                                <label class="checkbox-option"><input type="checkbox" name="type_experience[]" value="agressif"> <span>Un chat agressif</span></label>
                                                <label class="checkbox-option"><input type="checkbox" name="type_experience[]" value="timide"> <span>Un chat timide</span></label>
                                                <label class="checkbox-option"><input type="checkbox" name="type_experience[]" value="chaton"> <span>Un chaton</span></label>
                                                <label class="checkbox-option"><input type="checkbox" name="type_experience[]" value="avenant"> <span>Un chat avenant</span></label>
                                                <label class="checkbox-option"><input type="checkbox" name="type_experience[]" value="pot_de_colle"> <span>Un chat pot-de-colle</span></label>
                                                <label class="checkbox-option"><input type="checkbox" name="type_experience[]" value="observateur"> <span>Un chat observateur</span></label>
                                                <label class="checkbox-option"><input type="checkbox" name="type_experience[]" value="problemes_proprete"> <span>Problèmes de propreté</span></label>
                                                <label class="checkbox-option"><input type="checkbox" name="type_experience[]" value="maladie_chronique"> <span>Maladie chronique</span></label>
                                                <label class="checkbox-option"><input type="checkbox" name="type_experience[]" value="traitement_quotidien"> <span>Traitement quotidien</span></label>
                                                <label class="checkbox-option"><input type="checkbox" name="type_experience[]" value="fin_de_vie"> <span>Fin de vie / euthanasie</span></label>
                                                <label class="checkbox-option"><input type="checkbox" name="type_experience[]" value="autre"> <span>Autre</span></label>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Combien de chats avez-vous eu ?</label>
                                                    <input type="number" name="nb_chats_eus" class="form-control" min="0">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Âge à l'adoption ?</label>
                                                    <input type="text" name="age_adoption_chats" class="form-control" placeholder="Ex: 2 mois, 3 ans...">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Combien de temps avec vous ?</label>
                                                    <input type="text" name="duree_vie_chats" class="form-control" placeholder="Ex: 5 ans, 12 ans...">
                                                </div>
                                            </div>
                                        </div>

                                        <h3><i class="fas fa-heart-broken"></i> Si un ou plusieurs chats sont décédés</h3>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Âge du décès</label>
                                                    <input type="text" name="age_deces_chat" class="form-control" placeholder="Ex: 15 ans">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Cause du décès</label>
                                                    <select name="cause_deces" class="form-control">
                                                        <option value="">Sélectionnez...</option>
                                                        <option value="cause_naturelle">Cause naturelle</option>
                                                        <option value="maladie_infectieuse">Maladie infectieuse</option>
                                                        <option value="maladie_chronique">Maladie chronique</option>
                                                        <option value="cancer">Cancer / tumeur</option>
                                                        <option value="mici">MICI / troubles digestifs graves</option>
                                                        <option value="hyperthyroidie">Hyperthyroïdie décompensée</option>
                                                        <option value="insuffisance_renale">Insuffisance rénale</option>
                                                        <option value="probleme_cardiaque">Problème cardiaque</option>
                                                        <option value="diabete">Diabète sucré</option>
                                                        <option value="neurologique">Problèmes neurologiques / épilepsie</option>
                                                        <option value="paralysie">Paralysie / myélopathie</option>
                                                        <option value="pif">PIF (péritonite infectieuse féline)</option>
                                                        <option value="fiv">FIV (sida du chat)</option>
                                                        <option value="felv">FeLV (leucose féline)</option>
                                                        <option value="vieillesse">Vieillesse</option>
                                                        <option value="accident">Accident</option>
                                                        <option value="euthanasie">Euthanasie</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Si euthanasie, pour quelle raison ?</label>
                                            <input type="text" name="raison_euthanasie" class="form-control" placeholder="Expliquez si applicable...">
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

                <!-- ÉTAPE 3: Alimentation, Soins & Conditions de vie -->
                <div class="multisteps-form__panel" data-animation="slideHorz">
                    <div class="wizard-forms">
                        <div class="inner pb-100 clearfix">
                            <div class="form-content pera-content">
                                <div class="step-inner-content">
                                    <span class="step-no bottom-line">Étape 3</span>
                                    <div class="step-progress float-right">
                                        <span>3 sur 7</span>
                                        <div class="step-progress-bar">
                                            <div class="progress">
                                                <div class="progress-bar" style="width:42%"></div>
                                            </div>
                                        </div>
                                    </div>

                                    <h2>Alimentation, Soins & Conditions de vie</h2>
                                    <p>Parlez-nous de l'alimentation prévue et de votre logement.</p>

                                    <div class="step-illustration">
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/images/illustrations/9_shocked cat.png" alt="">
                                    </div>

                                    <div class="form-inner-area">
                                        <h3><i class="fas fa-utensils"></i> Alimentation & Soins</h3>
                                        <div class="form-group">
                                            <label>Que mange (ou mangera) votre chat ?</label>
                                            <div class="checkbox-group-inline">
                                                <label class="checkbox-option"><input type="checkbox" name="alimentation[]" value="croquettes"> <span>Croquettes</span></label>
                                                <label class="checkbox-option"><input type="checkbox" name="alimentation[]" value="patee"> <span>Pâtée</span></label>
                                                <label class="checkbox-option"><input type="checkbox" name="alimentation[]" value="melange"> <span>Mélange des deux</span></label>
                                                <label class="checkbox-option"><input type="checkbox" name="alimentation[]" value="ne_sait_pas"> <span>Je ne sais pas</span></label>
                                                <label class="checkbox-option"><input type="checkbox" name="alimentation[]" value="autre"> <span>Autre</span></label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Quelles marques sont envisagées et pourquoi ce choix ?</label>
                                            <textarea name="marques_alimentation" class="form-control" rows="2" placeholder="Marques et raisons de votre choix..."></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>À quelle fréquence comptez-vous consulter un vétérinaire ?</label>
                                            <div class="radio-group">
                                                <label class="radio-option"><input type="radio" name="frequence_veto" value="annuel"> <span class="radio-box">Une fois par an minimum</span></label>
                                                <label class="radio-option"><input type="radio" name="frequence_veto" value="probleme"> <span class="radio-box">Uniquement en cas de problème</span></label>
                                                <label class="radio-option"><input type="radio" name="frequence_veto" value="ne_sait_pas"> <span class="radio-box">Je ne sais pas encore</span></label>
                                                <label class="radio-option"><input type="radio" name="frequence_veto" value="jamais"> <span class="radio-box">Jamais</span></label>
                                            </div>
                                        </div>

                                        <h3><i class="fas fa-home"></i> Conditions de vie du chat</h3>
                                        <div class="form-group">
                                            <label>Type de logement</label>
                                            <div class="radio-group-horizontal">
                                                <label class="radio-option-h"><input type="radio" name="type_logement" value="appartement"> <span>Appartement</span></label>
                                                <label class="radio-option-h"><input type="radio" name="type_logement" value="maison"> <span>Maison</span></label>
                                                <label class="radio-option-h"><input type="radio" name="type_logement" value="autre"> <span>Autre</span></label>
                                            </div>
                                        </div>

                                        <!-- Si appartement -->
                                        <div class="conditional-section" id="section-appartement">
                                            <h4>Détails appartement</h4>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Superficie (en m²)</label>
                                                        <input type="number" name="superficie" class="form-control" placeholder="Ex: 60">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Étage</label>
                                                        <input type="text" name="etage" class="form-control" placeholder="Ex: 3ème">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Balcon/terrasse ?</label>
                                                        <div class="radio-group-horizontal">
                                                            <label class="radio-option-h"><input type="radio" name="balcon" value="oui"> <span>Oui</span></label>
                                                            <label class="radio-option-h"><input type="radio" name="balcon" value="non"> <span>Non</span></label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>Si balcon/terrasse, est-il sécurisé ?</label>
                                                <div class="radio-group-horizontal">
                                                    <label class="radio-option-h"><input type="radio" name="balcon_securise" value="oui"> <span>Oui</span></label>
                                                    <label class="radio-option-h"><input type="radio" name="balcon_securise" value="non"> <span>Non</span></label>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Si maison -->
                                        <div class="conditional-section" id="section-maison">
                                            <h4>Détails maison</h4>
                                            <div class="form-group">
                                                <label>Nombre de facades</label>
                                                <div class="radio-group-horizontal">
                                                    <label class="radio-option-h"><input type="radio" name="facades" value="2"> <span>2</span></label>
                                                    <label class="radio-option-h"><input type="radio" name="facades" value="3"> <span>3</span></label>
                                                    <label class="radio-option-h"><input type="radio" name="facades" value="4"> <span>4</span></label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label>Type d'extérieur</label>
                                            <div class="checkbox-group-inline">
                                                <label class="checkbox-option"><input type="checkbox" name="type_exterieur[]" value="jardin_clos"> <span>Jardin clos</span></label>
                                                <label class="checkbox-option"><input type="checkbox" name="type_exterieur[]" value="jardin_non_clos"> <span>Jardin non clos</span></label>
                                                <label class="checkbox-option"><input type="checkbox" name="type_exterieur[]" value="cour"> <span>Cour</span></label>
                                                <label class="checkbox-option"><input type="checkbox" name="type_exterieur[]" value="pas_exterieur"> <span>Pas d'extérieur</span></label>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label>Le chat pourra-t-il sortir ?</label>
                                            <div class="radio-group-horizontal">
                                                <label class="radio-option-h"><input type="radio" name="chat_sortir" value="oui"> <span>Oui</span></label>
                                                <label class="radio-option-h"><input type="radio" name="chat_sortir" value="non"> <span>Non</span></label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Si oui, expliquez comment et pourquoi</label>
                                            <textarea name="explication_sortie" class="form-control" rows="2" placeholder="Expliquez..."></textarea>
                                        </div>

                                        <div class="form-group">
                                            <label>Le logement est proche de :</label>
                                            <div class="checkbox-group">
                                                <label class="checkbox-option"><input type="checkbox" name="proximite[]" value="rue_passante"> <span>Rue passante</span></label>
                                                <label class="checkbox-option"><input type="checkbox" name="proximite[]" value="route_chaussee"> <span>Route/chaussée/avenue</span></label>
                                                <label class="checkbox-option"><input type="checkbox" name="proximite[]" value="autoroute"> <span>Auto-route</span></label>
                                                <label class="checkbox-option"><input type="checkbox" name="proximite[]" value="gare"> <span>Gare</span></label>
                                                <label class="checkbox-option"><input type="checkbox" name="proximite[]" value="champs"> <span>Champs</span></label>
                                                <label class="checkbox-option"><input type="checkbox" name="proximite[]" value="foret"> <span>Forêt</span></label>
                                                <label class="checkbox-option"><input type="checkbox" name="proximite[]" value="autre"> <span>Autre</span></label>
                                            </div>
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

                <!-- ÉTAPE 4: Sécurité & Prévention -->
                <div class="multisteps-form__panel" data-animation="slideHorz">
                    <div class="wizard-forms">
                        <div class="inner pb-100 clearfix">
                            <div class="form-content pera-content">
                                <div class="step-inner-content">
                                    <span class="step-no bottom-line">Étape 4</span>
                                    <div class="step-progress float-right">
                                        <span>4 sur 7</span>
                                        <div class="step-progress-bar">
                                            <div class="progress">
                                                <div class="progress-bar" style="width:57%"></div>
                                            </div>
                                        </div>
                                    </div>

                                    <h2>Sécurité & Prévention</h2>
                                    <p>La sécurité de nos chats est primordiale. Aidez-nous à comprendre les mesures que vous prendrez.</p>

                                    <div class="step-illustration">
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/images/illustrations/4_playful cat.png" alt="">
                                    </div>

                                    <div class="form-inner-area">
                                        <div class="form-group">
                                            <label>Comment comptez-vous éviter les accidents (route, chutes, fugue) ?</label>
                                            <textarea name="prevention_accidents" class="form-control" rows="2" placeholder="Décrivez vos mesures..."></textarea>
                                        </div>

                                        <div class="form-group">
                                            <label>Mesures concrètes prévues (cochez)</label>
                                            <div class="checkbox-group">
                                                <label class="checkbox-option"><input type="checkbox" name="mesures_securite[]" value="filets"> <span>Filets / sécurisation balcon/fenêtres</span></label>
                                                <label class="checkbox-option"><input type="checkbox" name="mesures_securite[]" value="harnais"> <span>Harnais + sorties encadrées</span></label>
                                                <label class="checkbox-option"><input type="checkbox" name="mesures_securite[]" value="enclos"> <span>Enclos / catio</span></label>
                                                <label class="checkbox-option"><input type="checkbox" name="mesures_securite[]" value="jardin_cloture"> <span>Jardin clôturé + système anti-fugue</span></label>
                                                <label class="checkbox-option"><input type="checkbox" name="mesures_securite[]" value="pas_sorties"> <span>Pas de sorties avant adaptation (minimum 12 semaines)</span></label>
                                                <label class="checkbox-option"><input type="checkbox" name="mesures_securite[]" value="identification"> <span>Identification + médaille + téléphone</span></label>
                                                <label class="checkbox-option"><input type="checkbox" name="mesures_securite[]" value="gps"> <span>Suivi GPS</span></label>
                                                <label class="checkbox-option"><input type="checkbox" name="mesures_securite[]" value="autre"> <span>Autre</span></label>
                                            </div>
                                        </div>

                                        <h3><i class="fas fa-window-maximize"></i> Fenêtres oscillo-battantes</h3>
                                        <div class="alert alert-warning">
                                            <i class="fas fa-exclamation-triangle"></i> Les fenêtres oscillo-battantes représentent un danger grave et fréquent pour les chats (risque de coincement, paralysie, décès).
                                        </div>
                                        <div class="form-group">
                                            <label>Votre logement comporte-t-il des fenêtres oscillo-battantes ?</label>
                                            <div class="radio-group-horizontal">
                                                <label class="radio-option-h"><input type="radio" name="oscillo_battant" value="oui"> <span>Oui</span></label>
                                                <label class="radio-option-h"><input type="radio" name="oscillo_battant" value="non"> <span>Non</span></label>
                                                <label class="radio-option-h"><input type="radio" name="oscillo_battant" value="ne_sait_pas"> <span>Je ne sais pas</span></label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Connaissez-vous ce risque ?</label>
                                            <div class="radio-group-horizontal">
                                                <label class="radio-option-h"><input type="radio" name="connaissance_risque_oscillo" value="oui"> <span>Oui, je connais</span></label>
                                                <label class="radio-option-h"><input type="radio" name="connaissance_risque_oscillo" value="entendu_parler"> <span>J'en ai entendu parler</span></label>
                                                <label class="radio-option-h"><input type="radio" name="connaissance_risque_oscillo" value="non"> <span>Non, je ne savais pas</span></label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Quelles mesures concrètes allez-vous mettre en place AVANT l'arrivée du chat ?</label>
                                            <div class="checkbox-group">
                                                <label class="checkbox-option"><input type="checkbox" name="mesures_oscillo[]" value="protection"> <span>Protection spéciale oscillo-battant (grille / filet adapté)</span></label>
                                                <label class="checkbox-option"><input type="checkbox" name="mesures_oscillo[]" value="blocage"> <span>Blocage de l'ouverture en position basculante</span></label>
                                                <label class="checkbox-option"><input type="checkbox" name="mesures_oscillo[]" value="ouverture_totale"> <span>Ouverture uniquement en position totalement fermée ou totalement ouverte + sécurisée</span></label>
                                                <label class="checkbox-option"><input type="checkbox" name="mesures_oscillo[]" value="moustiquaires"> <span>Pose de moustiquaires renforcées adaptées aux chats</span></label>
                                                <label class="checkbox-option"><input type="checkbox" name="mesures_oscillo[]" value="interdiction_acces"> <span>Interdiction d'accès aux pièces concernées</span></label>
                                                <label class="checkbox-option"><input type="checkbox" name="mesures_oscillo[]" value="aeration_presence"> <span>Modification des habitudes d'aération (ouvrir uniquement en votre présence)</span></label>
                                                <label class="checkbox-option"><input type="checkbox" name="mesures_oscillo[]" value="ne_sait_pas"> <span>Je ne sais pas encore</span></label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Si "je ne sais pas encore", expliquez pourquoi et sous quel délai vous comptez agir</label>
                                            <textarea name="explication_oscillo" class="form-control" rows="2" placeholder="Réponse obligatoire si applicable..."></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Qui s'engage à vérifier régulièrement que les protections sont en place et fonctionnelles ?</label>
                                            <div class="radio-group-horizontal">
                                                <label class="radio-option-h"><input type="radio" name="verification_protections" value="moi"> <span>Moi</span></label>
                                                <label class="radio-option-h"><input type="radio" name="verification_protections" value="autre_adulte"> <span>Autre adulte du foyer</span></label>
                                                <label class="radio-option-h"><input type="radio" name="verification_protections" value="personne"> <span>Personne</span></label>
                                            </div>
                                        </div>

                                        <h3><i class="fas fa-search"></i> Si votre chat disparaît</h3>
                                        <div class="form-group">
                                            <label>Que ferez-vous ? (cochez les différentes cases applicables)</label>
                                            <div class="checkbox-group">
                                                <label class="checkbox-option"><input type="checkbox" name="action_disparition[]" value="chercher_immediatement"> <span>Chercher immédiatement de jour et de nuit</span></label>
                                                <label class="checkbox-option"><input type="checkbox" name="action_disparition[]" value="affiches"> <span>Affiches dans le quartier</span></label>
                                                <label class="checkbox-option"><input type="checkbox" name="action_disparition[]" value="contacter_veto_refuges"> <span>Contacter vétérinaires / refuges / communes</span></label>
                                                <label class="checkbox-option"><input type="checkbox" name="action_disparition[]" value="reseaux_sociaux"> <span>Réseaux sociaux et groupes locaux</span></label>
                                                <label class="checkbox-option"><input type="checkbox" name="action_disparition[]" value="catid"> <span>Contacter service d'identification (CatID)</span></label>
                                                <label class="checkbox-option"><input type="checkbox" name="action_disparition[]" value="declaration_officielle"> <span>Déclarer officiellement perdu</span></label>
                                                <label class="checkbox-option"><input type="checkbox" name="action_disparition[]" value="nourriture_odeurs"> <span>Mettre nourriture/odeurs au point de fugue</span></label>
                                                <label class="checkbox-option"><input type="checkbox" name="action_disparition[]" value="pieges"> <span>Pièges cage si nécessaire</span></label>
                                                <label class="checkbox-option"><input type="checkbox" name="action_disparition[]" value="ne_sait_pas"> <span>Je ne sais pas</span></label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Combien de temps chercheriez-vous activement ?</label>
                                            <div class="radio-group-horizontal">
                                                <label class="radio-option-h"><input type="radio" name="duree_recherche" value="24-48h"> <span>24-48h</span></label>
                                                <label class="radio-option-h"><input type="radio" name="duree_recherche" value="1_semaine"> <span>1 semaine</span></label>
                                                <label class="radio-option-h"><input type="radio" name="duree_recherche" value="1_mois"> <span>1 mois</span></label>
                                                <label class="radio-option-h"><input type="radio" name="duree_recherche" value="toujours"> <span>Aussi longtemps qu'il est perdu</span></label>
                                            </div>
                                        </div>

                                        <h3><i class="fas fa-cat"></i> Comportement - Que feriez-vous si votre chat...</h3>
                                        <div class="form-group">
                                            <label>Si le chat urine hors de sa litière :</label>
                                            <div class="checkbox-group">
                                                <label class="checkbox-option"><input type="checkbox" name="reaction_urine[]" value="veto"> <span>Je consulte d'abord un vétérinaire</span></label>
                                                <label class="checkbox-option"><input type="checkbox" name="reaction_urine[]" value="change_litiere"> <span>Je change de litière / l'emplacement / ajout d'une litière</span></label>
                                                <label class="checkbox-option"><input type="checkbox" name="reaction_urine[]" value="punis"> <span>Je punis</span></label>
                                                <label class="checkbox-option"><input type="checkbox" name="reaction_urine[]" value="aide_naturel"> <span>Je lui donne de l'aide naturelle (Zylkène, fleurs de Bach, Feliway...)</span></label>
                                                <label class="checkbox-option"><input type="checkbox" name="reaction_urine[]" value="ne_sait_pas"> <span>Je ne sais pas</span></label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>S'il griffe les meubles :</label>
                                            <div class="checkbox-group">
                                                <label class="checkbox-option"><input type="checkbox" name="reaction_griffes[]" value="griffoirs"> <span>J'installe arbres à chat/griffoirs + redirection</span></label>
                                                <label class="checkbox-option"><input type="checkbox" name="reaction_griffes[]" value="coupe_griffes"> <span>Je coupe les griffes en prenant soin de ne pas aller dans la pulpe</span></label>
                                                <label class="checkbox-option"><input type="checkbox" name="reaction_griffes[]" value="punis"> <span>Je punis</span></label>
                                                <label class="checkbox-option"><input type="checkbox" name="reaction_griffes[]" value="degriffage"> <span>J'arrache ses griffes</span></label>
                                                <label class="checkbox-option"><input type="checkbox" name="reaction_griffes[]" value="ne_sait_pas"> <span>Je ne sais pas</span></label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>S'il est craintif / se cache :</label>
                                            <div class="checkbox-group">
                                                <label class="checkbox-option"><input type="checkbox" name="reaction_craintif[]" value="temps_cachettes"> <span>Je lui laisse du temps + cachettes + routine</span></label>
                                                <label class="checkbox-option"><input type="checkbox" name="reaction_craintif[]" value="force_contact"> <span>Je force le contact</span></label>
                                                <label class="checkbox-option"><input type="checkbox" name="reaction_craintif[]" value="parle_doucement"> <span>Je lui parle doucement et prends de ses nouvelles</span></label>
                                                <label class="checkbox-option"><input type="checkbox" name="reaction_craintif[]" value="ne_sait_pas"> <span>Je ne sais pas</span></label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>En cas de problème, seriez-vous prêt à travailler avec :</label>
                                            <div class="checkbox-group">
                                                <label class="checkbox-option"><input type="checkbox" name="aide_probleme[]" value="comportementaliste"> <span>Un comportementaliste / association</span></label>
                                                <label class="checkbox-option"><input type="checkbox" name="aide_probleme[]" value="veto_specialise"> <span>Un vétérinaire spécialisé</span></label>
                                                <label class="checkbox-option"><input type="checkbox" name="aide_probleme[]" value="conseils_suivis"> <span>Des conseils suivis pendant plusieurs semaines/mois</span></label>
                                                <label class="checkbox-option"><input type="checkbox" name="aide_probleme[]" value="non"> <span>Non</span></label>
                                            </div>
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

                <!-- ÉTAPE 5: Engagement à long terme -->
                <div class="multisteps-form__panel" data-animation="slideHorz">
                    <div class="wizard-forms">
                        <div class="inner pb-100 clearfix">
                            <div class="form-content pera-content">
                                <div class="step-inner-content">
                                    <span class="step-no bottom-line">Étape 5</span>
                                    <div class="step-progress float-right">
                                        <span>5 sur 7</span>
                                        <div class="step-progress-bar">
                                            <div class="progress">
                                                <div class="progress-bar" style="width:71%"></div>
                                            </div>
                                        </div>
                                    </div>

                                    <h2>Engagement à long terme</h2>
                                    <p>Un chat peut vivre jusqu'à 30 ans (moyenne d'âge 14/18 ans). Comment imaginez-vous sa place dans votre vie ?</p>

                                    <div class="step-illustration">
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/images/illustrations/14_orange cat.png" alt="">
                                    </div>

                                    <div class="form-inner-area">
                                        <div class="form-group">
                                            <label>Comment imaginez-vous la place du chat dans votre vie sur le long terme ?</label>
                                            <textarea name="vision_long_terme" class="form-control" rows="3" placeholder="Décrivez votre vision..."></textarea>
                                        </div>

                                        <div class="form-group">
                                            <label>En cas de déménagement, séparation, naissance, difficulté financière : que feriez-vous avec votre chat ?</label>
                                            <textarea name="situation_difficile" class="form-control" rows="2" placeholder="Expliquez..."></textarea>
                                        </div>

                                        <div class="form-group">
                                            <label>Dans quelles situations envisageriez-vous de vous séparer d'un chat ?</label>
                                            <div class="checkbox-group">
                                                <label class="checkbox-option"><input type="checkbox" name="separation[]" value="jamais"> <span>Jamais, quoi qu'il arrive</span></label>
                                                <label class="checkbox-option"><input type="checkbox" name="separation[]" value="allergie"> <span>Allergie</span></label>
                                                <label class="checkbox-option"><input type="checkbox" name="separation[]" value="demenagement"> <span>Déménagement</span></label>
                                                <label class="checkbox-option"><input type="checkbox" name="separation[]" value="separation_couple"> <span>Séparation</span></label>
                                                <label class="checkbox-option"><input type="checkbox" name="separation[]" value="problemes_financiers"> <span>Problèmes financiers</span></label>
                                                <label class="checkbox-option"><input type="checkbox" name="separation[]" value="comportement"> <span>Problèmes de comportement</span></label>
                                                <label class="checkbox-option"><input type="checkbox" name="separation[]" value="bebe_enfants"> <span>Bébé / enfants</span></label>
                                                <label class="checkbox-option"><input type="checkbox" name="separation[]" value="autre"> <span>Autre</span></label>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label>Si difficulté, êtes-vous prêt à :</label>
                                            <div class="checkbox-group">
                                                <label class="checkbox-option"><input type="checkbox" name="pret_difficulte[]" value="demander_aide"> <span>Demander de l'aide et chercher des solutions</span></label>
                                                <label class="checkbox-option"><input type="checkbox" name="pret_difficulte[]" value="temps_energie"> <span>Mettre du temps et de l'énergie pendant plusieurs semaines/mois</span></label>
                                                <label class="checkbox-option"><input type="checkbox" name="pret_difficulte[]" value="concessions"> <span>Faire des concessions dans l'organisation du foyer</span></label>
                                                <label class="checkbox-option"><input type="checkbox" name="pret_difficulte[]" value="non"> <span>Non</span></label>
                                            </div>
                                        </div>

                                        <h3><i class="fas fa-baby"></i> Toxoplasmose & Grossesse</h3>
                                        <div class="form-group">
                                            <label>Connaissez-vous la toxoplasmose ?</label>
                                            <div class="radio-group">
                                                <label class="radio-option"><input type="radio" name="connaissance_toxoplasmose" value="oui"> <span class="radio-box">Oui, je connais les précautions</span></label>
                                                <label class="radio-option"><input type="radio" name="connaissance_toxoplasmose" value="entendu_parler"> <span class="radio-box">J'en ai entendu parler mais je ne sais pas exactement</span></label>
                                                <label class="radio-option"><input type="radio" name="connaissance_toxoplasmose" value="non"> <span class="radio-box">Non</span></label>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label>Si grossesse ou bébé au foyer, êtes-vous prêt à mettre en place les mesures suivantes ?</label>
                                            <div class="checkbox-group">
                                                <label class="checkbox-option"><input type="checkbox" name="mesures_grossesse[]" value="hygiene_litiere"> <span>Hygiène litière (gants, lavage mains)</span></label>
                                                <label class="checkbox-option"><input type="checkbox" name="mesures_grossesse[]" value="autre_personne_litiere"> <span>Faire nettoyer la litière par une autre personne si possible</span></label>
                                                <label class="checkbox-option"><input type="checkbox" name="mesures_grossesse[]" value="cadre_stable"> <span>Maintenir le chat dans un cadre stable</span></label>
                                                <label class="checkbox-option"><input type="checkbox" name="mesures_grossesse[]" value="zones_refuges"> <span>Donner au chat des zones refuges hors bébé</span></label>
                                                <label class="checkbox-option"><input type="checkbox" name="mesures_grossesse[]" value="habituation"> <span>Travail progressif d'habituation (temps/patience)</span></label>
                                                <label class="checkbox-option"><input type="checkbox" name="mesures_grossesse[]" value="demander_aide"> <span>Demander de l'aide si le chat change de comportement</span></label>
                                                <label class="checkbox-option"><input type="checkbox" name="mesures_grossesse[]" value="non"> <span>Non / je ne veux pas "prendre le risque"</span></label>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label>Scénario : "Bébé arrive, le chat est stressé, se cache, grogne, semble avoir peur." Que faites-vous concrètement ? (5 phrases max)</label>
                                            <textarea name="scenario_bebe" class="form-control" rows="3" placeholder="Décrivez votre réaction..."></textarea>
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

                <!-- ÉTAPE 6: Motivations -->
                <div class="multisteps-form__panel" data-animation="slideHorz">
                    <div class="wizard-forms">
                        <div class="inner pb-100 clearfix">
                            <div class="form-content pera-content">
                                <div class="step-inner-content">
                                    <span class="step-no bottom-line">Étape 6</span>
                                    <div class="step-progress float-right">
                                        <span>6 sur 7</span>
                                        <div class="step-progress-bar">
                                            <div class="progress">
                                                <div class="progress-bar" style="width:85%"></div>
                                            </div>
                                        </div>
                                    </div>

                                    <h2>Motivations</h2>
                                    <p>Parlez-nous de vos motivations et du chat que vous recherchez.</p>

                                    <div class="step-illustration">
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/images/illustrations/6_kitten.png" alt="">
                                    </div>

                                    <div class="form-inner-area">
                                        <div class="form-group">
                                            <label>Pourquoi souhaitez-vous adopter spécifiquement au Fanal des Chats ?</label>
                                            <div class="checkbox-group">
                                                <label class="checkbox-option"><input type="checkbox" name="pourquoi_fanal[]" value="proximite"> <span>Proximité</span></label>
                                                <label class="checkbox-option"><input type="checkbox" name="pourquoi_fanal[]" value="recommandation"> <span>Recommandation</span></label>
                                                <label class="checkbox-option"><input type="checkbox" name="pourquoi_fanal[]" value="connait_refuge"> <span>Vous connaissez le refuge</span></label>
                                                <label class="checkbox-option"><input type="checkbox" name="pourquoi_fanal[]" value="chat_precis"> <span>Vous avez vu un chat précis</span></label>
                                                <label class="checkbox-option"><input type="checkbox" name="pourquoi_fanal[]" value="pas_ailleurs"> <span>Vous n'avez pas pu adopter ailleurs</span></label>
                                                <label class="checkbox-option"><input type="checkbox" name="pourquoi_fanal[]" value="valeurs"> <span>Vous partagez nos valeurs</span></label>
                                                <label class="checkbox-option"><input type="checkbox" name="pourquoi_fanal[]" value="autre"> <span>Autre</span></label>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label>Avez-vous déjà visité d'autres refuges ?</label>
                                            <div class="radio-group-horizontal">
                                                <label class="radio-option-h"><input type="radio" name="autres_refuges" value="non"> <span>Non</span></label>
                                                <label class="radio-option-h"><input type="radio" name="autres_refuges" value="oui"> <span>Oui</span></label>
                                            </div>
                                            <input type="text" name="quels_refuges" class="form-control mt-2" placeholder="Si oui, lequel/lesquels ?">
                                        </div>

                                        <div class="form-group">
                                            <label>Si refus dans un autre refuge, pour quelle(s) raison(s) ?</label>
                                            <div class="checkbox-group">
                                                <label class="checkbox-option"><input type="checkbox" name="raison_refus[]" value="logement"> <span>Refus logement / sécurité</span></label>
                                                <label class="checkbox-option"><input type="checkbox" name="raison_refus[]" value="enfants"> <span>Refus enfants</span></label>
                                                <label class="checkbox-option"><input type="checkbox" name="raison_refus[]" value="autres_animaux"> <span>Refus autres animaux</span></label>
                                                <label class="checkbox-option"><input type="checkbox" name="raison_refus[]" value="presence"> <span>Refus manque de présence</span></label>
                                                <label class="checkbox-option"><input type="checkbox" name="raison_refus[]" value="budget"> <span>Refus budget</span></label>
                                                <label class="checkbox-option"><input type="checkbox" name="raison_refus[]" value="incoherence"> <span>Refus incohérence / manque d'engagement</span></label>
                                                <label class="checkbox-option"><input type="checkbox" name="raison_refus[]" value="autre"> <span>Refus autre</span></label>
                                            </div>
                                            <textarea name="explication_refus" class="form-control mt-2" rows="2" placeholder="Expliquez si applicable..."></textarea>
                                        </div>

                                        <div class="form-group">
                                            <label>Qu'attendez-vous de cette adoption ?</label>
                                            <textarea name="attentes_adoption" class="form-control" rows="2" placeholder="Vos attentes..."></textarea>
                                        </div>

                                        <h3><i class="fas fa-cat"></i> Le chat que vous recherchez</h3>
                                        <div class="form-group">
                                            <label>Vous souhaitez adopter :</label>
                                            <div class="radio-group-horizontal">
                                                <label class="radio-option-h"><input type="radio" name="nb_chats_adopter" value="1"> <span>1 chat</span></label>
                                                <label class="radio-option-h"><input type="radio" name="nb_chats_adopter" value="2"> <span>2 chats (binôme)</span></label>
                                                <label class="radio-option-h"><input type="radio" name="nb_chats_adopter" value="ne_sait_pas"> <span>Je ne sais pas encore</span></label>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label>Vous préférez :</label>
                                            <div class="checkbox-group-inline">
                                                <label class="checkbox-option"><input type="checkbox" name="age_prefere[]" value="chaton"> <span>Chaton</span></label>
                                                <label class="checkbox-option"><input type="checkbox" name="age_prefere[]" value="jeune"> <span>Jeune chat (2 ans et -)</span></label>
                                                <label class="checkbox-option"><input type="checkbox" name="age_prefere[]" value="adulte_2_6"> <span>Adulte +2</span></label>
                                                <label class="checkbox-option"><input type="checkbox" name="age_prefere[]" value="adulte_6_plus"> <span>Adulte +6</span></label>
                                                <label class="checkbox-option"><input type="checkbox" name="age_prefere[]" value="senior"> <span>Senior</span></label>
                                                <label class="checkbox-option"><input type="checkbox" name="age_prefere[]" value="peu_importe"> <span>Peu importe</span></label>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label>Profil souhaité :</label>
                                            <div class="checkbox-group">
                                                <label class="checkbox-option"><input type="checkbox" name="profil_souhaite[]" value="tres_calin"> <span>Très câlin</span></label>
                                                <label class="checkbox-option"><input type="checkbox" name="profil_souhaite[]" value="pleine_sante"> <span>En pleine santé</span></label>
                                                <label class="checkbox-option"><input type="checkbox" name="profil_souhaite[]" value="a_decouvrir"> <span>Qu'il faut découvrir</span></label>
                                                <label class="checkbox-option"><input type="checkbox" name="profil_souhaite[]" value="independant"> <span>Indépendant</span></label>
                                                <label class="checkbox-option"><input type="checkbox" name="profil_souhaite[]" value="chat_genoux"> <span>Un chat de genoux</span></label>
                                                <label class="checkbox-option"><input type="checkbox" name="profil_souhaite[]" value="calme"> <span>Calme</span></label>
                                                <label class="checkbox-option"><input type="checkbox" name="profil_souhaite[]" value="joueur"> <span>Joueur</span></label>
                                                <label class="checkbox-option"><input type="checkbox" name="profil_souhaite[]" value="ok_enfants"> <span>OK enfants</span></label>
                                                <label class="checkbox-option"><input type="checkbox" name="profil_souhaite[]" value="ok_chats"> <span>OK autres chats</span></label>
                                                <label class="checkbox-option"><input type="checkbox" name="profil_souhaite[]" value="ok_chien"> <span>OK chien</span></label>
                                                <label class="checkbox-option"><input type="checkbox" name="profil_souhaite[]" value="peu_importe"> <span>Peu importe / je m'adapte</span></label>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label>Pourquoi souhaitez-vous adopter un chat ? (cochez tout ce qui s'applique)</label>
                                            <div class="checkbox-group">
                                                <label class="checkbox-option"><input type="checkbox" name="motivation_adoption[]" value="compagnie_moi"> <span>Compagnie pour moi</span></label>
                                                <label class="checkbox-option"><input type="checkbox" name="motivation_adoption[]" value="compagnie_enfants"> <span>Compagnie pour les enfants</span></label>
                                                <label class="checkbox-option"><input type="checkbox" name="motivation_adoption[]" value="compagnie_personne_agee"> <span>Compagnie pour une personne âgée</span></label>
                                                <label class="checkbox-option"><input type="checkbox" name="motivation_adoption[]" value="passion"> <span>J'aime les chats, c'est une passion</span></label>
                                                <label class="checkbox-option"><input type="checkbox" name="motivation_adoption[]" value="grandi_animaux"> <span>J'ai grandi avec les animaux</span></label>
                                                <label class="checkbox-option"><input type="checkbox" name="motivation_adoption[]" value="ancien_chat_manque"> <span>Mon ancien chat me manque</span></label>
                                                <label class="checkbox-option"><input type="checkbox" name="motivation_adoption[]" value="remplacer_decede"> <span>Remplacer un chat décédé récemment</span></label>
                                                <label class="checkbox-option"><input type="checkbox" name="motivation_adoption[]" value="ami_chat_actuel"> <span>Offrir un ami à mon chat actuel</span></label>
                                                <label class="checkbox-option"><input type="checkbox" name="motivation_adoption[]" value="reduire_solitude"> <span>Réduire la solitude / remonter le moral</span></label>
                                                <label class="checkbox-option"><input type="checkbox" name="motivation_adoption[]" value="reduire_stress"> <span>Réduire le stress / apaiser l'anxiété</span></label>
                                                <label class="checkbox-option"><input type="checkbox" name="motivation_adoption[]" value="logement_adapte"> <span>Parce que j'ai enfin un logement adapté</span></label>
                                                <label class="checkbox-option"><input type="checkbox" name="motivation_adoption[]" value="presence_maison"> <span>Avoir une présence à la maison</span></label>
                                                <label class="checkbox-option"><input type="checkbox" name="motivation_adoption[]" value="vie_maison"> <span>Pour "mettre de la vie" à la maison</span></label>
                                                <label class="checkbox-option"><input type="checkbox" name="motivation_adoption[]" value="responsabilite_enfants"> <span>Pour "apprendre la responsabilité" aux enfants</span></label>
                                                <label class="checkbox-option"><input type="checkbox" name="motivation_adoption[]" value="cadeau"> <span>Pour faire plaisir à quelqu'un (cadeau)</span></label>
                                                <label class="checkbox-option"><input type="checkbox" name="motivation_adoption[]" value="sauver_chat"> <span>Pour "sauver" un chat / démarche de protection animale</span></label>
                                                <label class="checkbox-option"><input type="checkbox" name="motivation_adoption[]" value="adopter_pas_acheter"> <span>Pour adopter plutôt qu'acheter</span></label>
                                                <label class="checkbox-option"><input type="checkbox" name="motivation_adoption[]" value="temps"> <span>Parce que j'ai du temps en ce moment</span></label>
                                                <label class="checkbox-option"><input type="checkbox" name="motivation_adoption[]" value="teletravail"> <span>Parce que je suis souvent à la maison (télétravail, etc...)</span></label>
                                                <label class="checkbox-option"><input type="checkbox" name="motivation_adoption[]" value="animal_facile"> <span>Parce que je veux un animal "facile"</span></label>
                                                <label class="checkbox-option"><input type="checkbox" name="motivation_adoption[]" value="pas_chien"> <span>Parce que je ne veux pas de chien (trop contraignant)</span></label>
                                                <label class="checkbox-option"><input type="checkbox" name="motivation_adoption[]" value="chasser_rongeurs"> <span>Pour chasser les rongeurs</span></label>
                                                <label class="checkbox-option"><input type="checkbox" name="motivation_adoption[]" value="garder_maison"> <span>Pour "garder la maison" (présence dissuasive)</span></label>
                                                <label class="checkbox-option"><input type="checkbox" name="motivation_adoption[]" value="enfants_insistent"> <span>Parce que mes enfants insistent</span></label>
                                                <label class="checkbox-option"><input type="checkbox" name="motivation_adoption[]" value="partenaire_veut"> <span>Parce que mon/ma partenaire en veut un</span></label>
                                                <label class="checkbox-option"><input type="checkbox" name="motivation_adoption[]" value="periode_difficile"> <span>Parce que je traverse une période difficile</span></label>
                                                <label class="checkbox-option"><input type="checkbox" name="motivation_adoption[]" value="tester"> <span>Parce que je veux "tester" avant de m'engager plus</span></label>
                                                <label class="checkbox-option"><input type="checkbox" name="motivation_adoption[]" value="autre"> <span>Autre</span></label>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label>Parmi les motivations cochées, quelle est la principale ? (1 phrase)</label>
                                            <input type="text" name="motivation_principale" class="form-control" placeholder="Votre motivation principale...">
                                        </div>

                                        <div class="form-group">
                                            <label>Depuis quand pensez-vous à adopter ?</label>
                                            <div class="radio-group-horizontal">
                                                <label class="radio-option-h"><input type="radio" name="duree_reflexion" value="moins_1_mois"> <span>Moins d'1 mois</span></label>
                                                <label class="radio-option-h"><input type="radio" name="duree_reflexion" value="1-3_mois"> <span>1-3 mois</span></label>
                                                <label class="radio-option-h"><input type="radio" name="duree_reflexion" value="3-12_mois"> <span>3-12 mois</span></label>
                                                <label class="radio-option-h"><input type="radio" name="duree_reflexion" value="plus_1_an"> <span>+1 an</span></label>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label>Pour vous, un chat est avant tout :</label>
                                            <div class="radio-group">
                                                <label class="radio-option"><input type="radio" name="definition_chat" value="animal_compagnie"> <span class="radio-box">Un animal de compagnie</span></label>
                                                <label class="radio-option"><input type="radio" name="definition_chat" value="membre_famille"> <span class="radio-box">Un membre de la famille</span></label>
                                                <label class="radio-option"><input type="radio" name="definition_chat" value="ami"> <span class="radio-box">Un ami</span></label>
                                                <label class="radio-option"><input type="radio" name="definition_chat" value="independant"> <span class="radio-box">Un animal indépendant</span></label>
                                                <label class="radio-option"><input type="radio" name="definition_chat" value="utile"> <span class="radio-box">Un animal utile (chasse, présence, ...)</span></label>
                                                <label class="radio-option"><input type="radio" name="definition_chat" value="autre"> <span class="radio-box">Autre</span></label>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label>Vous êtes plutôt :</label>
                                            <div class="radio-group">
                                                <label class="radio-option"><input type="radio" name="adaptabilite" value="adapte"> <span class="radio-box">Je m'adapte au caractère du chat</span></label>
                                                <label class="radio-option"><input type="radio" name="adaptabilite" value="attentes_precises"> <span class="radio-box">J'ai des attentes précises</span></label>
                                            </div>
                                            <input type="text" name="attentes_precises_detail" class="form-control mt-2" placeholder="Si attentes précises, expliquez lesquelles...">
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

                <!-- ÉTAPE 7: Budget & Qualité de vie -->
                <div class="multisteps-form__panel" data-animation="slideHorz">
                    <div class="wizard-forms">
                        <div class="inner pb-100 clearfix">
                            <div class="form-content pera-content">
                                <div class="step-inner-content">
                                    <span class="step-no bottom-line">Étape 7</span>
                                    <div class="step-progress float-right">
                                        <span>7 sur 7</span>
                                        <div class="step-progress-bar">
                                            <div class="progress">
                                                <div class="progress-bar" style="width:100%"></div>
                                            </div>
                                        </div>
                                    </div>

                                    <h2>Budget & Qualité de vie</h2>
                                    <p>Dernière étape ! Parlons budget et bien-être du chat.</p>

                                    <div class="step-illustration">
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/images/illustrations/5_little cat.png" alt="">
                                    </div>

                                    <div class="form-inner-area">
                                        <h3><i class="fas fa-euro-sign"></i> Budget & Capacité financière</h3>
                                        <div class="form-group">
                                            <label>Quel budget mensuel prévoyez-vous pour votre chat (hors urgences) ?</label>
                                            <div class="radio-group-horizontal">
                                                <label class="radio-option-h"><input type="radio" name="budget_mensuel" value="moins_20"> <span>&lt; 20€</span></label>
                                                <label class="radio-option-h"><input type="radio" name="budget_mensuel" value="20-50"> <span>20-50€</span></label>
                                                <label class="radio-option-h"><input type="radio" name="budget_mensuel" value="50-100"> <span>50-100€</span></label>
                                                <label class="radio-option-h"><input type="radio" name="budget_mensuel" value="100-500"> <span>100-500€</span></label>
                                                <label class="radio-option-h"><input type="radio" name="budget_mensuel" value="500_plus"> <span>500€ et +</span></label>
                                                <label class="radio-option-h"><input type="radio" name="budget_mensuel" value="ne_sait_pas"> <span>Je ne sais pas</span></label>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label>Si "je ne sais pas", pourquoi ?</label>
                                            <div class="checkbox-group-inline">
                                                <label class="checkbox-option"><input type="checkbox" name="pourquoi_ne_sait_pas_budget[]" value="jamais_eu"> <span>Je n'ai jamais eu de chat</span></label>
                                                <label class="checkbox-option"><input type="checkbox" name="pourquoi_ne_sait_pas_budget[]" value="pas_reflechi"> <span>Je n'ai pas réfléchi aux coûts</span></label>
                                                <label class="checkbox-option"><input type="checkbox" name="pourquoi_ne_sait_pas_budget[]" value="coute_peu"> <span>Je pense que ça coûte peu</span></label>
                                                <label class="checkbox-option"><input type="checkbox" name="pourquoi_ne_sait_pas_budget[]" value="besoin_infos"> <span>J'ai besoin d'informations</span></label>
                                                <label class="checkbox-option"><input type="checkbox" name="pourquoi_ne_sait_pas_budget[]" value="autre"> <span>Autre</span></label>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label>Si vous avez un budget, il comprend quoi ? (cochez)</label>
                                            <div class="checkbox-group-inline">
                                                <label class="checkbox-option"><input type="checkbox" name="budget_comprend[]" value="alimentation"> <span>Alimentation</span></label>
                                                <label class="checkbox-option"><input type="checkbox" name="budget_comprend[]" value="litiere"> <span>Litière</span></label>
                                                <label class="checkbox-option"><input type="checkbox" name="budget_comprend[]" value="antiparasitaires"> <span>Antiparasitaires</span></label>
                                                <label class="checkbox-option"><input type="checkbox" name="budget_comprend[]" value="veto_annuel"> <span>Vétérinaire annuel</span></label>
                                                <label class="checkbox-option"><input type="checkbox" name="budget_comprend[]" value="assurance"> <span>Assurance</span></label>
                                                <label class="checkbox-option"><input type="checkbox" name="budget_comprend[]" value="jouets"> <span>Jouets / enrichissement</span></label>
                                                <label class="checkbox-option"><input type="checkbox" name="budget_comprend[]" value="autre"> <span>Autre</span></label>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label>En cas de frais vétérinaires imprévus (ex : 800€) :</label>
                                            <div class="radio-group">
                                                <label class="radio-option"><input type="radio" name="frais_imprevus" value="peut_assumer"> <span class="radio-box">Je peux assumer</span></label>
                                                <label class="radio-option"><input type="radio" name="frais_imprevus" value="difficile_possible"> <span class="radio-box">Difficile mais possible</span></label>
                                                <label class="radio-option"><input type="radio" name="frais_imprevus" value="tres_complique"> <span class="radio-box">Très compliqué</span></label>
                                                <label class="radio-option"><input type="radio" name="frais_imprevus" value="impossible"> <span class="radio-box">Impossible</span></label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Que feriez-vous si c'est "très compliqué ou impossible" ?</label>
                                            <textarea name="solution_frais_imprevus" class="form-control" rows="2" placeholder="Expliquez..."></textarea>
                                        </div>

                                        <h3><i class="fas fa-gamepad"></i> Jeu / Stimulation / Qualité de vie</h3>
                                        <div class="form-group">
                                            <label>Combien de temps de jeu/interaction active par jour prévoyez-vous ?</label>
                                            <div class="radio-group-horizontal">
                                                <label class="radio-option-h"><input type="radio" name="temps_jeu" value="0-5min"> <span>0-5 min</span></label>
                                                <label class="radio-option-h"><input type="radio" name="temps_jeu" value="5-15min"> <span>5-15 min</span></label>
                                                <label class="radio-option-h"><input type="radio" name="temps_jeu" value="15-30min"> <span>15-30 min</span></label>
                                                <label class="radio-option-h"><input type="radio" name="temps_jeu" value="30-60min"> <span>30-60 min</span></label>
                                                <label class="radio-option-h"><input type="radio" name="temps_jeu" value="60min_plus"> <span>+60 min</span></label>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label>Quelles activités pensez-vous proposer ? (cochez)</label>
                                            <div class="checkbox-group">
                                                <label class="checkbox-option"><input type="checkbox" name="activites[]" value="canne_peche"> <span>Canne à pêche / jouets interactifs</span></label>
                                                <label class="checkbox-option"><input type="checkbox" name="activites[]" value="cache_cache"> <span>Cache-cache / course poursuite</span></label>
                                                <label class="checkbox-option"><input type="checkbox" name="activites[]" value="arbres_griffoirs"> <span>Arbres à chat / griffoirs</span></label>
                                                <label class="checkbox-option"><input type="checkbox" name="activites[]" value="promenade"> <span>Promenade</span></label>
                                                <label class="checkbox-option"><input type="checkbox" name="activites[]" value="enfants_gerent"> <span>Ce sont les enfants qui gèrent cela</span></label>
                                                <label class="checkbox-option"><input type="checkbox" name="activites[]" value="aucune"> <span>Aucune, un chat est autonome</span></label>
                                                <label class="checkbox-option"><input type="checkbox" name="activites[]" value="enrichissement"> <span>Enrichissement (friandises cachées, puzzles)</span></label>
                                                <label class="checkbox-option"><input type="checkbox" name="activites[]" value="temps_calme"> <span>Temps calme (présence, brossage si apprécié)</span></label>
                                                <label class="checkbox-option"><input type="checkbox" name="activites[]" value="ne_sait_pas"> <span>Je ne sais pas</span></label>
                                            </div>
                                        </div>

                                        <h3><i class="fas fa-comments"></i> Pour terminer</h3>
                                        <div class="form-group">
                                            <label>Qu'est-ce qu'un "bon adoptant" selon vous ?</label>
                                            <textarea name="bon_adoptant" class="form-control" rows="2" placeholder="Votre définition..."></textarea>
                                        </div>

                                        <div class="form-group">
                                            <label>Qu'est-ce que vous attendez du refuge ?</label>
                                            <textarea name="attentes_refuge" class="form-control" rows="2" placeholder="Vos attentes..."></textarea>
                                        </div>

                                        <div class="form-group">
                                            <label>Avez-vous quelque chose prochainement qui pourrait compliquer une adoption (travaux, déménagement, voyage, etc...) ?</label>
                                            <textarea name="complications_futures" class="form-control" rows="2" placeholder="Si applicable..."></textarea>
                                        </div>

                                        <div class="consent-section">
                                            <label class="consent-option">
                                                <input type="checkbox" name="visite_pre_adoption" value="oui" required>
                                                <span>J'accepte qu'une visite de pré-adoption soit effectuée à mon domicile. *</span>
                                            </label>
                                            <label class="consent-option">
                                                <input type="checkbox" name="suivi_post_adoption" value="oui" required>
                                                <span>J'accepte de donner des nouvelles régulières après l'adoption. *</span>
                                            </label>
                                            <label class="consent-option">
                                                <input type="checkbox" name="rgpd" value="oui" required>
                                                <span>J'accepte que mes données soient utilisées dans le cadre de ma demande d'adoption. *</span>
                                            </label>
                                            <label class="consent-option">
                                                <input type="checkbox" name="informations_vraies" value="oui" required>
                                                <span>Je certifie que toutes les informations fournies sont vraies et complètes. *</span>
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
                                <li><button type="submit" title="Envoyer" id="submitBtn"><i class="fas fa-paper-plane"></i> Envoyer ma demande</button></li>
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
            <h2>Demande envoyée !</h2>
            <p>Nous avons bien reçu votre demande d'adoption.</p>
            <p>Notre équipe examinera votre dossier et vous contactera dans les plus brefs délais pour convenir d'une rencontre.</p>
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/images/illustrations/5_little cat.png" alt="" class="success-cat">
            <a href="<?php echo home_url('/'); ?>" class="btn-home">
                <i class="fas fa-home"></i> Retour à l'accueil
            </a>
        </div>
    </div>

    <!-- Scripts -->
    <script src="<?php echo get_template_directory_uri(); ?>/assets/js/jquery.min.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/assets/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/assets/js/formulaire-adoption.js"></script>

    <?php wp_footer(); ?>
</body>
</html>
