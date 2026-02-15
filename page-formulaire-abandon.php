<?php
/**
 * Template Name: Formulaire Abandon
 * Description: Formulaire de demande de prise en charge (abandon) multi-etapes complet
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Demande de prise en charge - <?php bloginfo('name'); ?></title>

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
<body class="formulaire-abandon-page">

    <div class="wrapper">
        <!-- Sidebar avec image et etapes -->
        <div class="steps-area steps-area-fixed">
            <div class="image-holder">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/images/illustrations/3_cute cat.png" alt="Chat du refuge">
            </div>
            <div class="steps clearfix">
                <ul class="tablist multisteps-form__progress">
                    <li class="multisteps-form__progress-btn js-active current" data-step="1">
                        <span>1</span>
                        <span class="step-label">Identite</span>
                    </li>
                    <li class="multisteps-form__progress-btn" data-step="2">
                        <span>2</span>
                        <span class="step-label">Votre chat</span>
                    </li>
                    <li class="multisteps-form__progress-btn" data-step="3">
                        <span>3</span>
                        <span class="step-label">Comportement</span>
                    </li>
                    <li class="multisteps-form__progress-btn" data-step="4">
                        <span>4</span>
                        <span class="step-label">Situation</span>
                    </li>
                    <li class="multisteps-form__progress-btn last" data-step="5">
                        <span>5</span>
                        <span class="step-label">Confirmation</span>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Formulaire -->
        <form class="multisteps-form__form" action="<?php echo admin_url('admin-post.php'); ?>" id="wizard" method="POST">
            <input type="hidden" name="action" value="submit_abandon_form">
            <?php wp_nonce_field('abandon_form_nonce', 'abandon_nonce'); ?>

            <div class="form-area position-relative">

                <!-- ETAPE 1: Identite -->
                <div class="multisteps-form__panel js-active" data-animation="slideHorz">
                    <div class="wizard-forms">
                        <div class="inner pb-100 clearfix">
                            <div class="form-content pera-content">
                                <div class="step-inner-content">
                                    <span class="step-no">Etape 1</span>
                                    <h2>Vos informations</h2>
                                    <p class="form-intro">Ce formulaire nous permet de mieux comprendre votre situation et de preparer l'accueil de votre chat dans les meilleures conditions.</p>

                                    <div class="step-illustration">
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/images/illustrations/1_meow cat.png" alt="">
                                    </div>

                                    <div class="form-inner-area">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="nom_prenom">Nom & Prenom *</label>
                                                    <input type="text" name="nom_prenom" id="nom_prenom" class="form-control required" placeholder="Votre nom et prenom" required>
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
                                                    <label for="telephone">Telephone *</label>
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

                <!-- ETAPE 2: Informations sur votre chat -->
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
                                                <div class="progress-bar" style="width:20%"></div>
                                            </div>
                                        </div>
                                    </div>

                                    <h2>Votre chat</h2>
                                    <p>Parlez-nous de votre compagnon pour que nous puissions preparer au mieux son accueil.</p>

                                    <div class="step-illustration">
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/images/illustrations/6_kitten.png" alt="">
                                    </div>

                                    <div class="form-inner-area">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="nom_chat">Nom du chat *</label>
                                                    <input type="text" name="nom_chat" id="nom_chat" class="form-control required" placeholder="Nom de votre chat" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="age_chat">Age du chat</label>
                                                    <input type="text" name="age_chat" id="age_chat" class="form-control" placeholder="Ex: 3 ans, 6 mois">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label>Sexe</label>
                                            <div class="radio-group-horizontal">
                                                <label class="radio-option-h"><input type="radio" name="sexe_chat" value="male"> <span>Male</span></label>
                                                <label class="radio-option-h"><input type="radio" name="sexe_chat" value="femelle"> <span>Femelle</span></label>
                                                <label class="radio-option-h"><input type="radio" name="sexe_chat" value="ne_sait_pas"> <span>Je ne sais pas</span></label>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="race_chat">Race</label>
                                                    <input type="text" name="race_chat" id="race_chat" class="form-control" placeholder="Ex: Europeen, Siamois, Persan...">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="couleur_chat">Couleur / Robe</label>
                                                    <input type="text" name="couleur_chat" id="couleur_chat" class="form-control" placeholder="Couleur ou type de robe">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label>Le chat est-il sterilise ?</label>
                                            <div class="radio-group-horizontal">
                                                <label class="radio-option-h"><input type="radio" name="sterilise" value="oui"> <span>Oui</span></label>
                                                <label class="radio-option-h"><input type="radio" name="sterilise" value="non"> <span>Non</span></label>
                                                <label class="radio-option-h"><input type="radio" name="sterilise" value="ne_sait_pas"> <span>Je ne sais pas</span></label>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label>Le chat est-il identifie (puce electronique) ?</label>
                                            <div class="radio-group-horizontal">
                                                <label class="radio-option-h"><input type="radio" name="identifie" value="oui"> <span>Oui</span></label>
                                                <label class="radio-option-h"><input type="radio" name="identifie" value="non"> <span>Non</span></label>
                                                <label class="radio-option-h"><input type="radio" name="identifie" value="ne_sait_pas"> <span>Je ne sais pas</span></label>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label>Le chat est-il vaccine ?</label>
                                            <div class="radio-group-horizontal">
                                                <label class="radio-option-h"><input type="radio" name="vaccine" value="oui"> <span>Oui</span></label>
                                                <label class="radio-option-h"><input type="radio" name="vaccine" value="non"> <span>Non</span></label>
                                                <label class="radio-option-h"><input type="radio" name="vaccine" value="ne_sait_pas"> <span>Je ne sais pas</span></label>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="problemes_sante">Problemes de sante connus ?</label>
                                            <textarea name="problemes_sante" id="problemes_sante" class="form-control" rows="3" placeholder="Decrivez les problemes de sante connus, traitements en cours, allergies..."></textarea>
                                        </div>

                                        <div class="form-group">
                                            <label for="alimentation_actuelle">Alimentation actuelle</label>
                                            <input type="text" name="alimentation_actuelle" id="alimentation_actuelle" class="form-control" placeholder="Marque de croquettes, nourriture humide, etc.">
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

                <!-- ETAPE 3: Comportement du chat -->
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
                                                <div class="progress-bar" style="width:40%"></div>
                                            </div>
                                        </div>
                                    </div>

                                    <h2>Comportement</h2>
                                    <p>Ces informations sont essentielles pour trouver la meilleure famille pour votre chat.</p>

                                    <div class="step-illustration">
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/images/illustrations/9_shocked cat.png" alt="">
                                    </div>

                                    <div class="form-inner-area">
                                        <div class="form-group">
                                            <label>Le chat est-il sociable avec les humains ?</label>
                                            <div class="radio-group-horizontal">
                                                <label class="radio-option-h"><input type="radio" name="sociable_humains" value="tres_sociable"> <span>Tres sociable</span></label>
                                                <label class="radio-option-h"><input type="radio" name="sociable_humains" value="sociable"> <span>Sociable</span></label>
                                                <label class="radio-option-h"><input type="radio" name="sociable_humains" value="craintif"> <span>Craintif</span></label>
                                                <label class="radio-option-h"><input type="radio" name="sociable_humains" value="agressif"> <span>Agressif</span></label>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label>Le chat s'entend-il avec d'autres chats ?</label>
                                            <div class="radio-group-horizontal">
                                                <label class="radio-option-h"><input type="radio" name="entente_chats" value="oui"> <span>Oui</span></label>
                                                <label class="radio-option-h"><input type="radio" name="entente_chats" value="non"> <span>Non</span></label>
                                                <label class="radio-option-h"><input type="radio" name="entente_chats" value="jamais_teste"> <span>Jamais teste</span></label>
                                                <label class="radio-option-h"><input type="radio" name="entente_chats" value="ca_depend"> <span>Ca depend</span></label>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label>Le chat s'entend-il avec les chiens ?</label>
                                            <div class="radio-group-horizontal">
                                                <label class="radio-option-h"><input type="radio" name="entente_chiens" value="oui"> <span>Oui</span></label>
                                                <label class="radio-option-h"><input type="radio" name="entente_chiens" value="non"> <span>Non</span></label>
                                                <label class="radio-option-h"><input type="radio" name="entente_chiens" value="jamais_teste"> <span>Jamais teste</span></label>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label>Le chat est-il habitue aux enfants ?</label>
                                            <div class="radio-group-horizontal">
                                                <label class="radio-option-h"><input type="radio" name="habitue_enfants" value="oui"> <span>Oui</span></label>
                                                <label class="radio-option-h"><input type="radio" name="habitue_enfants" value="non"> <span>Non</span></label>
                                                <label class="radio-option-h"><input type="radio" name="habitue_enfants" value="jamais_teste"> <span>Jamais teste</span></label>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label>Le chat va-t-il a l'exterieur ?</label>
                                            <div class="radio-group-horizontal">
                                                <label class="radio-option-h"><input type="radio" name="acces_exterieur" value="interieur"> <span>Chat d'interieur uniquement</span></label>
                                                <label class="radio-option-h"><input type="radio" name="acces_exterieur" value="acces_exterieur"> <span>Acces a l'exterieur</span></label>
                                                <label class="radio-option-h"><input type="radio" name="acces_exterieur" value="chat_libre"> <span>Chat libre</span></label>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label>Le chat utilise-t-il la litiere correctement ?</label>
                                            <div class="radio-group-horizontal">
                                                <label class="radio-option-h"><input type="radio" name="litiere" value="oui_toujours"> <span>Oui toujours</span></label>
                                                <label class="radio-option-h"><input type="radio" name="litiere" value="parfois_accidents"> <span>Parfois des accidents</span></label>
                                                <label class="radio-option-h"><input type="radio" name="litiere" value="non"> <span>Non</span></label>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="habitudes_particulieres">Habitudes particulieres</label>
                                            <textarea name="habitudes_particulieres" id="habitudes_particulieres" class="form-control" rows="3" placeholder="Decrivez les habitudes, preferences ou particularites de votre chat"></textarea>
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

                <!-- ETAPE 4: Votre situation -->
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
                                                <div class="progress-bar" style="width:60%"></div>
                                            </div>
                                        </div>
                                    </div>

                                    <h2>Votre situation</h2>
                                    <p>Comprendre votre situation nous aide a mieux vous accompagner.</p>

                                    <div class="step-illustration">
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/images/illustrations/13_sleeping cat.png" alt="">
                                    </div>

                                    <div class="form-inner-area">
                                        <div class="form-group">
                                            <label for="raison_abandon">Raison principale de l'abandon *</label>
                                            <select name="raison_abandon" id="raison_abandon" class="form-control required" required>
                                                <option value="">Selectionnez...</option>
                                                <option value="demenagement">Demenagement</option>
                                                <option value="allergie">Allergie</option>
                                                <option value="comportement">Probleme de comportement</option>
                                                <option value="financieres">Raisons financieres</option>
                                                <option value="separation">Separation/divorce</option>
                                                <option value="deces">Deces du proprietaire</option>
                                                <option value="naissance">Naissance d'un enfant</option>
                                                <option value="trop_animaux">Trop d'animaux</option>
                                                <option value="sante_proprietaire">Probleme de sante du proprietaire</option>
                                                <option value="autre">Autre</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="raison_autre">Si "Autre", precisez</label>
                                            <input type="text" name="raison_autre" id="raison_autre" class="form-control" placeholder="Precisez la raison...">
                                        </div>

                                        <div class="form-group">
                                            <label for="duree_possession">Depuis combien de temps avez-vous ce chat ?</label>
                                            <input type="text" name="duree_possession" id="duree_possession" class="form-control" placeholder="Ex: 3 ans">
                                        </div>

                                        <div class="form-group">
                                            <label>Avez-vous deja consulte un veterinaire pour ce probleme ?</label>
                                            <div class="radio-group-horizontal">
                                                <label class="radio-option-h"><input type="radio" name="consulte_veterinaire" value="oui"> <span>Oui</span></label>
                                                <label class="radio-option-h"><input type="radio" name="consulte_veterinaire" value="non"> <span>Non</span></label>
                                                <label class="radio-option-h"><input type="radio" name="consulte_veterinaire" value="pas_applicable"> <span>Pas applicable</span></label>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label>Avez-vous contacte un comportementaliste ?</label>
                                            <div class="radio-group-horizontal">
                                                <label class="radio-option-h"><input type="radio" name="contacte_comportementaliste" value="oui"> <span>Oui</span></label>
                                                <label class="radio-option-h"><input type="radio" name="contacte_comportementaliste" value="non"> <span>Non</span></label>
                                                <label class="radio-option-h"><input type="radio" name="contacte_comportementaliste" value="pas_applicable"> <span>Pas applicable</span></label>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label>Avez-vous cherche des solutions dans votre entourage ?</label>
                                            <div class="radio-group-horizontal">
                                                <label class="radio-option-h"><input type="radio" name="solutions_entourage" value="oui_personne"> <span>Oui personne ne peut</span></label>
                                                <label class="radio-option-h"><input type="radio" name="solutions_entourage" value="non_pas_encore"> <span>Non pas encore</span></label>
                                                <label class="radio-option-h"><input type="radio" name="solutions_entourage" value="en_cours"> <span>En cours</span></label>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="delai_prise_en_charge">Delai souhaite pour la prise en charge</label>
                                            <select name="delai_prise_en_charge" id="delai_prise_en_charge" class="form-control">
                                                <option value="">Selectionnez...</option>
                                                <option value="le_plus_vite">Le plus vite possible</option>
                                                <option value="dans_la_semaine">Dans la semaine</option>
                                                <option value="dans_le_mois">Dans le mois</option>
                                                <option value="pas_urgence">Pas d'urgence</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="informations_complementaires">Informations complementaires sur votre situation</label>
                                            <textarea name="informations_complementaires" id="informations_complementaires" class="form-control" rows="3" placeholder="Tout ce que vous jugez utile de nous communiquer..."></textarea>
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

                <!-- ETAPE 5: Confirmation -->
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
                                                <div class="progress-bar" style="width:80%"></div>
                                            </div>
                                        </div>
                                    </div>

                                    <h2>Confirmation</h2>
                                    <p>Merci de confirmer les informations suivantes avant d'envoyer votre demande.</p>

                                    <div class="step-illustration">
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/images/illustrations/14_orange cat.png" alt="">
                                    </div>

                                    <div class="form-inner-area">
                                        <div class="form-group">
                                            <label>Documents disponibles</label>
                                            <div class="checkbox-group">
                                                <label class="checkbox-option"><input type="checkbox" name="documents[]" value="passeport_carnet"> <span>Passeport/carnet de sante</span></label>
                                                <label class="checkbox-option"><input type="checkbox" name="documents[]" value="preuve_identification"> <span>Preuve d'identification (puce)</span></label>
                                                <label class="checkbox-option"><input type="checkbox" name="documents[]" value="carnet_vaccination"> <span>Carnet de vaccination</span></label>
                                                <label class="checkbox-option"><input type="checkbox" name="documents[]" value="aucun"> <span>Aucun document</span></label>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label>Une participation aux frais d'accueil est demandee. Etes-vous informe(e) ?</label>
                                            <div class="radio-group-horizontal">
                                                <label class="radio-option-h"><input type="radio" name="participation_financiere" value="oui"> <span>Oui</span></label>
                                                <label class="radio-option-h"><input type="radio" name="participation_financiere" value="non"> <span>Non</span></label>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="derniers_mots">Derniers mots pour votre chat</label>
                                            <textarea name="derniers_mots" id="derniers_mots" class="form-control" rows="3" placeholder="Souhaitez-vous laisser un message pour la future famille de votre chat ?"></textarea>
                                        </div>

                                        <div class="consent-section">
                                            <label class="consent-option">
                                                <input type="checkbox" name="rgpd" value="oui" required>
                                                <span>J'accepte que mes donnees soient utilisees dans le cadre de cette demande de prise en charge par Le Fanal des Chats. *</span>
                                            </label>
                                            <label class="consent-option">
                                                <input type="checkbox" name="cession_propriete" value="oui">
                                                <span>Je comprends que cette demarche est definitive et que je cede la propriete de mon chat au refuge.</span>
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
            <h2>Votre demande a bien ete envoyee</h2>
            <p>Nous avons bien recu votre demande de prise en charge. Notre equipe examinera votre dossier et vous recontactera dans les meilleurs delais.</p>
            <p>Nous ferons tout notre possible pour offrir a votre chat les meilleurs soins et lui trouver un foyer aimant.</p>
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/images/illustrations/5_little cat.png" alt="" class="success-cat">
            <a href="<?php echo home_url('/'); ?>" class="btn-home">
                <i class="fas fa-home"></i> Retour a l'accueil
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
