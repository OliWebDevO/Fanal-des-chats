<?php
/**
 * Template Name: Formulaire Adoption
 * Description: Formulaire de demande d'adoption multi-etapes
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
        <!-- Sidebar avec image et etapes -->
        <div class="steps-area steps-area-fixed">
            <div class="image-holder">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/images/illustrations/3_cute cat.png" alt="Chat du refuge">
            </div>
            <div class="steps clearfix">
                <ul class="tablist multisteps-form__progress">
                    <li class="multisteps-form__progress-btn js-active current" data-step="1">
                        <span>1</span>
                        <span class="step-label">Informations</span>
                    </li>
                    <li class="multisteps-form__progress-btn" data-step="2">
                        <span>2</span>
                        <span class="step-label">Environnement</span>
                    </li>
                    <li class="multisteps-form__progress-btn" data-step="3">
                        <span>3</span>
                        <span class="step-label">Connaissances</span>
                    </li>
                    <li class="multisteps-form__progress-btn" data-step="4">
                        <span>4</span>
                        <span class="step-label">Experience</span>
                    </li>
                    <li class="multisteps-form__progress-btn last" data-step="5">
                        <span>5</span>
                        <span class="step-label">Engagement</span>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Formulaire -->
        <form class="multisteps-form__form" action="<?php echo admin_url('admin-post.php'); ?>" id="wizard" method="POST">
            <input type="hidden" name="action" value="submit_adoption_form">
            <?php wp_nonce_field('adoption_form_nonce', 'adoption_nonce'); ?>

            <div class="form-area position-relative">

                <!-- ETAPE 1: Informations personnelles -->
                <div class="multisteps-form__panel js-active" data-animation="slideHorz">
                    <div class="wizard-forms">
                        <div class="inner pb-100 clearfix">
                            <div class="form-content pera-content">
                                <div class="step-inner-content">
                                    <span class="step-no">Etape 1</span>
                                    <h2>Vos informations personnelles</h2>
                                    <p>Afin de traiter votre demande d'adoption, nous avons besoin de quelques informations.</p>

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
                                                    <label for="ville">Ville *</label>
                                                    <input type="text" name="ville" id="ville" class="form-control required" placeholder="Votre ville" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="date_naissance">Date de naissance *</label>
                                                    <input type="date" name="date_naissance" id="date_naissance" class="form-control required" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="profession">Profession</label>
                                                    <input type="text" name="profession" id="profession" class="form-control" placeholder="Votre profession">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="situation">Situation familiale</label>
                                                    <select name="situation" id="situation" class="form-control">
                                                        <option value="">Selectionnez...</option>
                                                        <option value="seul">Seul(e)</option>
                                                        <option value="couple">En couple</option>
                                                        <option value="famille">Famille avec enfants</option>
                                                        <option value="colocation">Colocation</option>
                                                    </select>
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

                <!-- ETAPE 2: Environnement d'accueil -->
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

                                    <h2>Votre environnement d'accueil</h2>
                                    <p>Aidez-nous a comprendre l'environnement dans lequel vivra le chat.</p>

                                    <div class="step-illustration">
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/images/illustrations/13_sleeping cat.png" alt="">
                                    </div>

                                    <div class="environment-section">
                                        <h3><i class="fas fa-home"></i> Type de logement</h3>
                                        <div class="housing-grid">
                                            <label class="housing-option">
                                                <input type="radio" name="type_logement" value="appartement" required>
                                                <span class="housing-box">
                                                    <i class="fas fa-building"></i>
                                                    <strong>Appartement</strong>
                                                </span>
                                            </label>
                                            <label class="housing-option">
                                                <input type="radio" name="type_logement" value="maison_jardin">
                                                <span class="housing-box">
                                                    <i class="fas fa-home"></i>
                                                    <strong>Maison avec jardin</strong>
                                                </span>
                                            </label>
                                            <label class="housing-option">
                                                <input type="radio" name="type_logement" value="maison_sans_jardin">
                                                <span class="housing-box">
                                                    <i class="fas fa-house-user"></i>
                                                    <strong>Maison sans jardin</strong>
                                                </span>
                                            </label>
                                        </div>
                                    </div>

                                    <div class="environment-section">
                                        <h3><i class="fas fa-key"></i> Statut d'occupation</h3>
                                        <div class="radio-group">
                                            <label class="radio-option">
                                                <input type="radio" name="statut_logement" value="proprietaire">
                                                <span class="radio-box">Proprietaire</span>
                                            </label>
                                            <label class="radio-option">
                                                <input type="radio" name="statut_logement" value="locataire">
                                                <span class="radio-box">Locataire</span>
                                            </label>
                                        </div>
                                        <div class="form-group mt-3 conditional-field" id="autorisation-field" style="display:none;">
                                            <label>Si locataire, avez-vous l'autorisation du proprietaire pour avoir un animal ?</label>
                                            <div class="radio-group-horizontal">
                                                <label class="radio-option-h">
                                                    <input type="radio" name="autorisation_proprio" value="oui">
                                                    <span>Oui</span>
                                                </label>
                                                <label class="radio-option-h">
                                                    <input type="radio" name="autorisation_proprio" value="non">
                                                    <span>Non</span>
                                                </label>
                                                <label class="radio-option-h">
                                                    <input type="radio" name="autorisation_proprio" value="en_cours">
                                                    <span>En cours de demande</span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="environment-section">
                                        <h3><i class="fas fa-door-open"></i> Acces exterieur</h3>
                                        <div class="radio-group">
                                            <label class="radio-option">
                                                <input type="radio" name="acces_exterieur" value="interieur_strict">
                                                <span class="radio-box">Chat d'interieur uniquement</span>
                                            </label>
                                            <label class="radio-option">
                                                <input type="radio" name="acces_exterieur" value="balcon_securise">
                                                <span class="radio-box">Balcon/terrasse securise(e)</span>
                                            </label>
                                            <label class="radio-option">
                                                <input type="radio" name="acces_exterieur" value="jardin_clos">
                                                <span class="radio-box">Jardin clos et securise</span>
                                            </label>
                                            <label class="radio-option">
                                                <input type="radio" name="acces_exterieur" value="libre">
                                                <span class="radio-box">Acces libre a l'exterieur</span>
                                            </label>
                                        </div>
                                    </div>

                                    <div class="environment-section">
                                        <h3><i class="fas fa-users"></i> Composition du foyer</h3>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Nombre d'adultes dans le foyer</label>
                                                    <select name="nb_adultes" class="form-control">
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4+">4 ou plus</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Nombre d'enfants</label>
                                                    <select name="nb_enfants" class="form-control">
                                                        <option value="0">Aucun</option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3+">3 ou plus</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Si enfants, quel age ont-ils ?</label>
                                            <input type="text" name="age_enfants" class="form-control" placeholder="Ex: 5 ans et 8 ans">
                                        </div>
                                    </div>

                                    <div class="environment-section">
                                        <h3><i class="fas fa-paw"></i> Autres animaux au foyer</h3>
                                        <div class="radio-group-horizontal">
                                            <label class="radio-option-h">
                                                <input type="radio" name="autres_animaux" value="oui">
                                                <span>Oui, j'ai d'autres animaux</span>
                                            </label>
                                            <label class="radio-option-h">
                                                <input type="radio" name="autres_animaux" value="non">
                                                <span>Non, pas d'autres animaux</span>
                                            </label>
                                        </div>
                                        <div class="form-group mt-3">
                                            <textarea name="details_animaux" class="form-control" rows="2" placeholder="Si oui, precisez : espece, age, caractere, sterilise ?"></textarea>
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

                <!-- ETAPE 3: Connaissances sur les chats -->
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

                                    <h2>Connaissances sur les chats</h2>
                                    <p>Quelques questions pour evaluer vos connaissances sur le bien-etre felin.</p>

                                    <div class="step-illustration">
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/images/illustrations/9_shocked cat.png" alt="">
                                    </div>

                                    <div class="knowledge-section">
                                        <h3><i class="fas fa-utensils"></i> Alimentation</h3>
                                        <div class="form-group">
                                            <label>Quel type d'alimentation prevoyez-vous pour votre chat ?</label>
                                            <div class="checkbox-group">
                                                <label class="checkbox-option">
                                                    <input type="checkbox" name="alimentation[]" value="croquettes_premium">
                                                    <span>Croquettes premium/veterinaire</span>
                                                </label>
                                                <label class="checkbox-option">
                                                    <input type="checkbox" name="alimentation[]" value="croquettes_supermarche">
                                                    <span>Croquettes de supermarche</span>
                                                </label>
                                                <label class="checkbox-option">
                                                    <input type="checkbox" name="alimentation[]" value="patee">
                                                    <span>Patee/nourriture humide</span>
                                                </label>
                                                <label class="checkbox-option">
                                                    <input type="checkbox" name="alimentation[]" value="raw_barf">
                                                    <span>Alimentation crue (BARF/raw)</span>
                                                </label>
                                                <label class="checkbox-option">
                                                    <input type="checkbox" name="alimentation[]" value="fait_maison">
                                                    <span>Fait maison</span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="knowledge-section">
                                        <h3><i class="fas fa-stethoscope"></i> Soins veterinaires</h3>
                                        <div class="form-group">
                                            <label>Avez-vous deja un veterinaire ?</label>
                                            <div class="radio-group-horizontal">
                                                <label class="radio-option-h">
                                                    <input type="radio" name="veterinaire" value="oui">
                                                    <span>Oui</span>
                                                </label>
                                                <label class="radio-option-h">
                                                    <input type="radio" name="veterinaire" value="non">
                                                    <span>Non, mais j'en chercherai un</span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Selon vous, a quelle frequence un chat doit-il voir le veterinaire (hors urgence) ?</label>
                                            <select name="frequence_veto" class="form-control">
                                                <option value="">Selectionnez...</option>
                                                <option value="jamais">Seulement en cas de maladie</option>
                                                <option value="2ans">Tous les 2 ans</option>
                                                <option value="annuel">1 fois par an (rappel vaccins, bilan)</option>
                                                <option value="bisannuel">2 fois par an</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="knowledge-section">
                                        <h3><i class="fas fa-cat"></i> Comportement felin</h3>
                                        <div class="form-group">
                                            <label>Un chat qui fait ses griffes sur le canape, comment reagissez-vous ?</label>
                                            <div class="radio-group">
                                                <label class="radio-option">
                                                    <input type="radio" name="griffes_reaction" value="punition">
                                                    <span class="radio-box">Je le punis pour lui apprendre</span>
                                                </label>
                                                <label class="radio-option">
                                                    <input type="radio" name="griffes_reaction" value="griffoir">
                                                    <span class="radio-box">Je lui propose un griffoir adapte</span>
                                                </label>
                                                <label class="radio-option">
                                                    <input type="radio" name="griffes_reaction" value="degriffage">
                                                    <span class="radio-box">Je pense au degriffage</span>
                                                </label>
                                                <label class="radio-option">
                                                    <input type="radio" name="griffes_reaction" value="accepter">
                                                    <span class="radio-box">C'est normal, je l'accepte</span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Connaissez-vous les besoins essentiels d'un chat ?</label>
                                            <p class="hint">Cochez tout ce que vous considerez comme essentiel</p>
                                            <div class="checkbox-group">
                                                <label class="checkbox-option">
                                                    <input type="checkbox" name="besoins[]" value="litiere">
                                                    <span>Litiere propre (nettoyee quotidiennement)</span>
                                                </label>
                                                <label class="checkbox-option">
                                                    <input type="checkbox" name="besoins[]" value="eau_fraiche">
                                                    <span>Eau fraiche en permanence</span>
                                                </label>
                                                <label class="checkbox-option">
                                                    <input type="checkbox" name="besoins[]" value="griffoir">
                                                    <span>Griffoir(s)</span>
                                                </label>
                                                <label class="checkbox-option">
                                                    <input type="checkbox" name="besoins[]" value="cachettes">
                                                    <span>Cachettes et points en hauteur</span>
                                                </label>
                                                <label class="checkbox-option">
                                                    <input type="checkbox" name="besoins[]" value="jeux">
                                                    <span>Temps de jeu quotidien</span>
                                                </label>
                                                <label class="checkbox-option">
                                                    <input type="checkbox" name="besoins[]" value="calins">
                                                    <span>Affection et attention</span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="knowledge-section">
                                        <h3><i class="fas fa-question-circle"></i> Sterilisation</h3>
                                        <div class="form-group">
                                            <label>Que pensez-vous de la sterilisation des chats ?</label>
                                            <div class="radio-group">
                                                <label class="radio-option">
                                                    <input type="radio" name="avis_sterilisation" value="indispensable">
                                                    <span class="radio-box">Indispensable pour la sante et le bien-etre</span>
                                                </label>
                                                <label class="radio-option">
                                                    <input type="radio" name="avis_sterilisation" value="si_sort">
                                                    <span class="radio-box">Necessaire seulement si le chat sort</span>
                                                </label>
                                                <label class="radio-option">
                                                    <input type="radio" name="avis_sterilisation" value="contre">
                                                    <span class="radio-box">Contre, c'est contre nature</span>
                                                </label>
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

                <!-- ETAPE 4: Experience et attentes -->
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

                                    <h2>Experience et attentes</h2>
                                    <p>Parlez-nous de votre experience avec les animaux et du chat que vous recherchez.</p>

                                    <div class="step-illustration">
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/images/illustrations/4_playful cat.png" alt="">
                                    </div>

                                    <div class="experience-section">
                                        <h3><i class="fas fa-history"></i> Votre experience</h3>
                                        <div class="form-group">
                                            <label>Avez-vous deja eu des chats ?</label>
                                            <div class="radio-group">
                                                <label class="radio-option">
                                                    <input type="radio" name="experience_chats" value="jamais">
                                                    <span class="radio-box">Non, ce sera mon premier</span>
                                                </label>
                                                <label class="radio-option">
                                                    <input type="radio" name="experience_chats" value="enfance">
                                                    <span class="radio-box">Oui, dans mon enfance</span>
                                                </label>
                                                <label class="radio-option">
                                                    <input type="radio" name="experience_chats" value="adulte">
                                                    <span class="radio-box">Oui, en tant qu'adulte</span>
                                                </label>
                                                <label class="radio-option">
                                                    <input type="radio" name="experience_chats" value="actuel">
                                                    <span class="radio-box">Oui, j'en ai actuellement</span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Si vous avez eu des chats, que sont-ils devenus ?</label>
                                            <textarea name="historique_chats" class="form-control" rows="2" placeholder="Decede de vieillesse, toujours present, donne, perdu..."></textarea>
                                        </div>
                                    </div>

                                    <div class="experience-section">
                                        <h3><i class="fas fa-search"></i> Le chat que vous recherchez</h3>
                                        <div class="form-group">
                                            <label>Quel type de chat recherchez-vous ?</label>
                                            <div class="cat-type-grid">
                                                <label class="cat-type-option">
                                                    <input type="checkbox" name="type_chat[]" value="chaton">
                                                    <span class="cat-type-box">
                                                        <i class="fas fa-baby"></i>
                                                        <strong>Chaton</strong>
                                                        <small>Moins d'1 an</small>
                                                    </span>
                                                </label>
                                                <label class="cat-type-option">
                                                    <input type="checkbox" name="type_chat[]" value="adulte">
                                                    <span class="cat-type-box">
                                                        <i class="fas fa-cat"></i>
                                                        <strong>Adulte</strong>
                                                        <small>1 a 7 ans</small>
                                                    </span>
                                                </label>
                                                <label class="cat-type-option">
                                                    <input type="checkbox" name="type_chat[]" value="senior">
                                                    <span class="cat-type-box">
                                                        <i class="fas fa-heart"></i>
                                                        <strong>Senior</strong>
                                                        <small>Plus de 7 ans</small>
                                                    </span>
                                                </label>
                                                <label class="cat-type-option">
                                                    <input type="checkbox" name="type_chat[]" value="peu_importe">
                                                    <span class="cat-type-box">
                                                        <i class="fas fa-paw"></i>
                                                        <strong>Peu importe</strong>
                                                        <small>Coup de coeur</small>
                                                    </span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Quel caractere recherchez-vous ?</label>
                                            <div class="checkbox-group">
                                                <label class="checkbox-option">
                                                    <input type="checkbox" name="caractere[]" value="calin">
                                                    <span>Calin et pot de colle</span>
                                                </label>
                                                <label class="checkbox-option">
                                                    <input type="checkbox" name="caractere[]" value="independant">
                                                    <span>Independant et tranquille</span>
                                                </label>
                                                <label class="checkbox-option">
                                                    <input type="checkbox" name="caractere[]" value="joueur">
                                                    <span>Joueur et energique</span>
                                                </label>
                                                <label class="checkbox-option">
                                                    <input type="checkbox" name="caractere[]" value="timide">
                                                    <span>Timide (besoin de patience)</span>
                                                </label>
                                                <label class="checkbox-option">
                                                    <input type="checkbox" name="caractere[]" value="sociable">
                                                    <span>Sociable avec autres animaux</span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Avez-vous deja un chat en vue au Fanal des Chats ?</label>
                                            <input type="text" name="chat_en_vue" class="form-control" placeholder="Nom du chat si vous l'avez repere">
                                        </div>
                                    </div>

                                    <div class="experience-section">
                                        <h3><i class="fas fa-exclamation-triangle"></i> Accepteriez-vous un chat...</h3>
                                        <div class="checkbox-group">
                                            <label class="checkbox-option">
                                                <input type="checkbox" name="accepte[]" value="fiv">
                                                <span>Positif FIV (virus immunodeficience)</span>
                                            </label>
                                            <label class="checkbox-option">
                                                <input type="checkbox" name="accepte[]" value="felv">
                                                <span>Positif FeLV (leucose)</span>
                                            </label>
                                            <label class="checkbox-option">
                                                <input type="checkbox" name="accepte[]" value="handicap">
                                                <span>Avec un handicap physique</span>
                                            </label>
                                            <label class="checkbox-option">
                                                <input type="checkbox" name="accepte[]" value="traitement">
                                                <span>Necessitant un traitement a vie</span>
                                            </label>
                                            <label class="checkbox-option">
                                                <input type="checkbox" name="accepte[]" value="duo">
                                                <span>A adopter en duo (inséparable)</span>
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

                <!-- ETAPE 5: Engagement et motivation -->
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

                                    <h2>Engagement et motivation</h2>
                                    <p>Derniere etape ! Parlez-nous de votre motivation et de votre engagement.</p>

                                    <div class="step-illustration">
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/images/illustrations/14_orange cat.png" alt="">
                                    </div>

                                    <div class="commitment-section">
                                        <h3><i class="fas fa-clock"></i> Disponibilite</h3>
                                        <div class="form-group">
                                            <label>Combien de temps le chat sera-t-il seul en moyenne par jour ?</label>
                                            <select name="temps_seul" class="form-control">
                                                <option value="">Selectionnez...</option>
                                                <option value="0-4h">Moins de 4 heures</option>
                                                <option value="4-8h">4 a 8 heures</option>
                                                <option value="8-10h">8 a 10 heures</option>
                                                <option value="10h+">Plus de 10 heures</option>
                                                <option value="teletravail">Teletravail/presence continue</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Que ferez-vous du chat pendant vos vacances ?</label>
                                            <select name="vacances" class="form-control">
                                                <option value="">Selectionnez...</option>
                                                <option value="emmene">Je l'emmenerai avec moi</option>
                                                <option value="famille">Famille/amis s'en occuperont</option>
                                                <option value="pet_sitter">Pet-sitter a domicile</option>
                                                <option value="pension">Pension pour chats</option>
                                                <option value="pas_vacances">Je ne pars jamais en vacances</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="commitment-section">
                                        <h3><i class="fas fa-euro-sign"></i> Budget</h3>
                                        <div class="form-group">
                                            <label>Etes-vous conscient des couts lies a un chat ? (alimentation, veterinaire, accessoires...)</label>
                                            <div class="radio-group-horizontal">
                                                <label class="radio-option-h">
                                                    <input type="radio" name="conscience_couts" value="oui">
                                                    <span>Oui, j'ai prevu un budget</span>
                                                </label>
                                                <label class="radio-option-h">
                                                    <input type="radio" name="conscience_couts" value="plus_ou_moins">
                                                    <span>Plus ou moins</span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>En cas de probleme de sante couteux, que feriez-vous ?</label>
                                            <div class="radio-group">
                                                <label class="radio-option">
                                                    <input type="radio" name="probleme_sante" value="soins">
                                                    <span class="radio-box">Je ferai tout pour le soigner</span>
                                                </label>
                                                <label class="radio-option">
                                                    <input type="radio" name="probleme_sante" value="limite">
                                                    <span class="radio-box">J'ai une limite budgetaire</span>
                                                </label>
                                                <label class="radio-option">
                                                    <input type="radio" name="probleme_sante" value="abandon">
                                                    <span class="radio-box">Je le rendrai au refuge</span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="commitment-section">
                                        <h3><i class="fas fa-heart"></i> Motivation</h3>
                                        <div class="form-group">
                                            <label>Pourquoi souhaitez-vous adopter un chat ? *</label>
                                            <textarea name="motivation" class="form-control required" rows="4" placeholder="Expliquez-nous vos motivations..." required></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Comment avez-vous connu Le Fanal des Chats ?</label>
                                            <select name="source" class="form-control">
                                                <option value="">Selectionnez...</option>
                                                <option value="reseaux_sociaux">Reseaux sociaux</option>
                                                <option value="bouche_a_oreille">Bouche a oreille</option>
                                                <option value="recherche_internet">Recherche internet</option>
                                                <option value="evenement">Evenement/Salon</option>
                                                <option value="passe_devant">Je suis passe devant</option>
                                                <option value="autre">Autre</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="commitment-section">
                                        <h3><i class="fas fa-comment-alt"></i> Informations complementaires</h3>
                                        <div class="form-group">
                                            <textarea name="infos_complementaires" class="form-control" rows="3" placeholder="Y a-t-il autre chose que vous aimeriez nous dire ? (allergies, questions, situations particulieres...)"></textarea>
                                        </div>
                                    </div>

                                    <div class="consent-section">
                                        <label class="consent-option">
                                            <input type="checkbox" name="visite_pre_adoption" value="oui" required>
                                            <span>J'accepte qu'une visite de pre-adoption soit effectuee a mon domicile. *</span>
                                        </label>
                                        <label class="consent-option">
                                            <input type="checkbox" name="suivi_post_adoption" value="oui" required>
                                            <span>J'accepte de donner des nouvelles regulieres apres l'adoption. *</span>
                                        </label>
                                        <label class="consent-option">
                                            <input type="checkbox" name="rgpd" value="oui" required>
                                            <span>J'accepte que mes donnees soient utilisees dans le cadre de ma demande d'adoption. *</span>
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
            <h2>Demande envoyee !</h2>
            <p>Nous avons bien recu votre demande d'adoption.</p>
            <p>Notre equipe examinera votre dossier et vous contactera dans les plus brefs delais pour convenir d'une rencontre.</p>
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
