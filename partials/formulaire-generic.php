<?php
/**
 * Template partiel : Formulaire générique multi-étapes
 * Génère le HTML complet d'un formulaire à partir des champs ACF.
 *
 * Variables attendues :
 * - $form_prefix   (string) ex: 'adoption'
 * - $form_post_id  (int)    ID du post contenant les champs ACF
 * - $form_css      (string) ex: 'formulaire-adoption.css'
 * - $form_body_class (string) ex: 'formulaire-adoption-page'
 */

if (!$form_post_id) {
    echo '<p>Formulaire non configuré.</p>';
    return;
}

// === Lecture des champs ACF ===
$nb_etapes      = intval(get_field($form_prefix . '_form_nb_etapes', $form_post_id)) ?: 5;
$action_name    = get_field($form_prefix . '_form_action_name', $form_post_id) ?: 'submit_' . $form_prefix . '_form';
$success_titre  = get_field($form_prefix . '_form_success_titre', $form_post_id) ?: 'Demande envoyée !';
$success_message = get_field($form_prefix . '_form_success_message', $form_post_id) ?: 'Nous avons bien reçu votre demande.';

// Étapes
$etapes = array();
for ($n = 1; $n <= $nb_etapes; $n++) {
    $etapes[$n] = array(
        'titre'        => get_field($form_prefix . '_form_etape_' . $n . '_titre', $form_post_id) ?: 'Étape ' . $n,
        'description'  => get_field($form_prefix . '_form_etape_' . $n . '_description', $form_post_id) ?: '',
        'sidebar_label' => get_field($form_prefix . '_form_etape_' . $n . '_sidebar_label', $form_post_id) ?: 'Étape ' . $n,
    );
}

// Questions (jusqu'à 60)
$questions = array();
for ($q = 1; $q <= 60; $q++) {
    $etape = intval(get_field($form_prefix . '_form_q' . $q . '_etape', $form_post_id));
    $label = get_field($form_prefix . '_form_q' . $q . '_label', $form_post_id);
    if (!$etape || !$label) continue;

    $questions[$q] = array(
        'etape'         => $etape,
        'label'         => $label,
        'type'          => get_field($form_prefix . '_form_q' . $q . '_type', $form_post_id) ?: 'text',
        'options'       => get_field($form_prefix . '_form_q' . $q . '_options', $form_post_id) ?: '',
        'disposition'   => get_field($form_prefix . '_form_q' . $q . '_disposition', $form_post_id) ?: 'stacked',
        'placeholder'   => get_field($form_prefix . '_form_q' . $q . '_placeholder', $form_post_id) ?: '',
        'largeur'       => get_field($form_prefix . '_form_q' . $q . '_largeur', $form_post_id) ?: '12',
        'required'      => get_field($form_prefix . '_form_q' . $q . '_required', $form_post_id) ? true : false,
        'correct'       => get_field($form_prefix . '_form_q' . $q . '_correct', $form_post_id) ?: '',
        'section_titre' => get_field($form_prefix . '_form_q' . $q . '_section_titre', $form_post_id) ?: '',
        'section_icone' => get_field($form_prefix . '_form_q' . $q . '_section_icone', $form_post_id) ?: '',
    );
}

// Grouper les questions par étape
$questions_by_etape = array();
foreach ($questions as $qid => $q) {
    $questions_by_etape[$q['etape']][$qid] = $q;
}

// Consentements (jusqu'à 5)
$consents = array();
for ($c = 1; $c <= 5; $c++) {
    $consent_label = get_field($form_prefix . '_form_consent_' . $c . '_label', $form_post_id);
    if (!$consent_label) continue;
    $consents[$c] = array(
        'label'    => $consent_label,
        'required' => get_field($form_prefix . '_form_consent_' . $c . '_required', $form_post_id) ? true : false,
    );
}

// Préparer les données pour le JS (questions importantes)
$form_data_js = array();
foreach ($questions as $qid => $q) {
    $form_data_js['q' . $qid] = array(
        'label'   => $q['label'],
        'correct' => $q['correct'],
        'type'    => $q['type'],
    );
}

$template_dir = get_template_directory_uri();
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo esc_html($etapes[1]['titre']); ?> - <?php bloginfo('name'); ?></title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,100..1000;1,9..40,100..1000&family=Fredoka+One&display=swap" rel="stylesheet">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="<?php echo $template_dir; ?>/assets/css/bootstrap.min.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <!-- Formulaire Styles -->
    <link rel="stylesheet" href="<?php echo $template_dir; ?>/assets/css/<?php echo esc_attr($form_css); ?>">

    <?php wp_head(); ?>
</head>
<body class="<?php echo esc_attr($form_body_class); ?>">

    <div class="wrapper">
        <!-- Sidebar avec image et étapes -->
        <div class="steps-area steps-area-fixed">
            <div class="image-holder">
                <img src="<?php echo $template_dir; ?>/assets/images/images/illustrations/3_cute cat.png" alt="Chat du refuge">
            </div>
            <div class="steps clearfix">
                <ul class="tablist multisteps-form__progress">
                    <?php for ($n = 1; $n <= $nb_etapes; $n++): ?>
                    <li class="multisteps-form__progress-btn<?php echo $n === 1 ? ' js-active current' : ''; ?><?php echo $n === $nb_etapes ? ' last' : ''; ?>" data-step="<?php echo $n; ?>">
                        <span><?php echo $n; ?></span>
                        <span class="step-label"><?php echo esc_html($etapes[$n]['sidebar_label']); ?></span>
                    </li>
                    <?php endfor; ?>
                </ul>
            </div>
        </div>

        <!-- Formulaire -->
        <form class="multisteps-form__form" action="<?php echo admin_url('admin-post.php'); ?>" id="wizard" method="POST">
            <input type="hidden" name="action" value="<?php echo esc_attr($action_name); ?>">
            <input type="hidden" name="form_prefix" value="<?php echo esc_attr($form_prefix); ?>">
            <input type="hidden" name="form_post_id" value="<?php echo esc_attr($form_post_id); ?>">
            <?php wp_nonce_field($form_prefix . '_form_nonce', $form_prefix . '_nonce'); ?>

            <div class="form-area position-relative">

                <?php for ($n = 1; $n <= $nb_etapes; $n++):
                    $is_first = ($n === 1);
                    $is_last = ($n === $nb_etapes);
                    $progress_pct = round(($n / $nb_etapes) * 100);
                    $step_questions = isset($questions_by_etape[$n]) ? $questions_by_etape[$n] : array();
                ?>
                <div class="multisteps-form__panel<?php echo $is_first ? ' js-active' : ''; ?>" data-animation="slideHorz">
                    <div class="wizard-forms">
                        <div class="inner pb-100 clearfix">
                            <div class="form-content pera-content">
                                <div class="step-inner-content">
                                    <span class="step-no<?php echo !$is_first ? ' bottom-line' : ''; ?>">Étape <?php echo $n; ?></span>
                                    <?php if (!$is_first): ?>
                                    <div class="step-progress float-right">
                                        <span><?php echo $n; ?> sur <?php echo $nb_etapes; ?></span>
                                        <div class="step-progress-bar">
                                            <div class="progress">
                                                <div class="progress-bar" style="width:<?php echo $progress_pct; ?>%"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php endif; ?>

                                    <h2><?php echo esc_html($etapes[$n]['titre']); ?></h2>
                                    <?php if ($etapes[$n]['description']): ?>
                                    <p class="form-intro"><?php echo esc_html($etapes[$n]['description']); ?></p>
                                    <?php endif; ?>

                                    <div class="step-illustration">
                                        <img src="<?php echo $template_dir; ?>/assets/images/images/illustrations/3_cute cat.png" alt="">
                                    </div>

                                    <div class="form-inner-area">
                                        <?php
                                        $col_count = 0;
                                        $row_open = false;

                                        foreach ($step_questions as $qid => $q):
                                            $field_name = 'q' . $qid;
                                            $largeur = intval($q['largeur']) ?: 12;
                                            $req_class = $q['required'] ? ' required' : '';
                                            $req_star = $q['required'] ? ' *' : '';
                                            $req_attr = $q['required'] ? ' required' : '';

                                            // Section titre avant ce champ
                                            if ($q['section_titre']):
                                                // Fermer la row ouverte
                                                if ($row_open) {
                                                    echo '</div>'; // close .row
                                                    $row_open = false;
                                                    $col_count = 0;
                                                }
                                        ?>
                                        <h3><?php if ($q['section_icone']): ?><i class="<?php echo esc_attr($q['section_icone']); ?>"></i> <?php endif; ?><?php echo esc_html($q['section_titre']); ?></h3>
                                        <?php
                                            endif;

                                            // Gestion des rows Bootstrap
                                            if ($largeur < 12):
                                                if (!$row_open || ($col_count + $largeur > 12)):
                                                    if ($row_open) {
                                                        echo '</div>'; // close previous .row
                                                    }
                                                    echo '<div class="row">';
                                                    $row_open = true;
                                                    $col_count = 0;
                                                endif;
                                                $col_count += $largeur;
                                                echo '<div class="col-md-' . $largeur . '">';
                                            else:
                                                if ($row_open) {
                                                    echo '</div>'; // close .row
                                                    $row_open = false;
                                                    $col_count = 0;
                                                }
                                            endif;

                                            // Rendu du champ selon le type
                                            switch ($q['type']):
                                                case 'text':
                                                case 'email':
                                                case 'tel':
                                                case 'number':
                                                case 'date':
                                        ?>
                                        <div class="form-group">
                                            <label for="<?php echo esc_attr($field_name); ?>"><?php echo esc_html($q['label'] . $req_star); ?></label>
                                            <input type="<?php echo esc_attr($q['type']); ?>" name="<?php echo esc_attr($field_name); ?>" id="<?php echo esc_attr($field_name); ?>" class="form-control<?php echo $req_class; ?>" placeholder="<?php echo esc_attr($q['placeholder']); ?>"<?php echo $req_attr; ?><?php echo $q['type'] === 'number' ? ' min="0"' : ''; ?>>
                                        </div>
                                        <?php
                                                    break;

                                                case 'textarea':
                                        ?>
                                        <div class="form-group">
                                            <label for="<?php echo esc_attr($field_name); ?>"><?php echo esc_html($q['label'] . $req_star); ?></label>
                                            <textarea name="<?php echo esc_attr($field_name); ?>" id="<?php echo esc_attr($field_name); ?>" class="form-control<?php echo $req_class; ?>" rows="2" placeholder="<?php echo esc_attr($q['placeholder']); ?>"<?php echo $req_attr; ?>></textarea>
                                        </div>
                                        <?php
                                                    break;

                                                case 'radio':
                                                    $options = array_filter(array_map('trim', explode("\n", $q['options'])));
                                                    $is_inline = ($q['disposition'] === 'inline');
                                                    $group_class = $is_inline ? 'radio-group-horizontal' : 'radio-group';
                                                    $option_class = $is_inline ? 'radio-option-h' : 'radio-option';
                                                    $span_extra = $is_inline ? '' : ' class="radio-box"';
                                        ?>
                                        <div class="form-group">
                                            <label><?php echo esc_html($q['label'] . $req_star); ?></label>
                                            <div class="<?php echo $group_class; ?>">
                                                <?php foreach ($options as $opt):
                                                    $parts = explode('|', $opt, 2);
                                                    $val = trim($parts[0]);
                                                    $lbl = isset($parts[1]) ? trim($parts[1]) : $val;
                                                ?>
                                                <label class="<?php echo $option_class; ?>"><input type="radio" name="<?php echo esc_attr($field_name); ?>" value="<?php echo esc_attr($val); ?>"> <span<?php echo $span_extra; ?>><?php echo esc_html($lbl); ?></span></label>
                                                <?php endforeach; ?>
                                            </div>
                                        </div>
                                        <?php
                                                    break;

                                                case 'checkbox':
                                                    $options = array_filter(array_map('trim', explode("\n", $q['options'])));
                                                    $is_inline = ($q['disposition'] === 'inline');
                                                    $group_class = $is_inline ? 'checkbox-group-inline' : 'checkbox-group';
                                        ?>
                                        <div class="form-group">
                                            <label><?php echo esc_html($q['label'] . $req_star); ?></label>
                                            <div class="<?php echo $group_class; ?>">
                                                <?php foreach ($options as $opt):
                                                    $parts = explode('|', $opt, 2);
                                                    $val = trim($parts[0]);
                                                    $lbl = isset($parts[1]) ? trim($parts[1]) : $val;
                                                ?>
                                                <label class="checkbox-option"><input type="checkbox" name="<?php echo esc_attr($field_name); ?>[]" value="<?php echo esc_attr($val); ?>"> <span><?php echo esc_html($lbl); ?></span></label>
                                                <?php endforeach; ?>
                                            </div>
                                        </div>
                                        <?php
                                                    break;

                                                case 'select':
                                                    $options = array_filter(array_map('trim', explode("\n", $q['options'])));
                                        ?>
                                        <div class="form-group">
                                            <label for="<?php echo esc_attr($field_name); ?>"><?php echo esc_html($q['label'] . $req_star); ?></label>
                                            <select name="<?php echo esc_attr($field_name); ?>" id="<?php echo esc_attr($field_name); ?>" class="form-control<?php echo $req_class; ?>"<?php echo $req_attr; ?>>
                                                <option value="">Sélectionnez...</option>
                                                <?php foreach ($options as $opt):
                                                    $parts = explode('|', $opt, 2);
                                                    $val = trim($parts[0]);
                                                    $lbl = isset($parts[1]) ? trim($parts[1]) : $val;
                                                ?>
                                                <option value="<?php echo esc_attr($val); ?>"><?php echo esc_html($lbl); ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <?php
                                                    break;
                                            endswitch;

                                            // Fermer la colonne si on est dans une row
                                            if ($largeur < 12):
                                                echo '</div>'; // close .col-md-X
                                            endif;

                                        endforeach;

                                        // Fermer la dernière row si ouverte
                                        if ($row_open) {
                                            echo '</div>';
                                        }

                                        // Consentements sur la dernière étape
                                        if ($is_last && !empty($consents)):
                                        ?>
                                        <div class="consent-section">
                                            <?php foreach ($consents as $cid => $consent): ?>
                                            <label class="consent-option">
                                                <input type="checkbox" name="consent_<?php echo $cid; ?>" value="oui"<?php echo $consent['required'] ? ' required' : ''; ?>>
                                                <span><?php echo esc_html($consent['label']); ?><?php echo $consent['required'] ? ' *' : ''; ?></span>
                                            </label>
                                            <?php endforeach; ?>
                                        </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="actions">
                            <a href="<?php echo home_url('/'); ?>" class="btn-back-site"><i class="fa fa-times"></i> Retour au site</a>
                            <ul class="nav-buttons">
                                <?php if ($is_first): ?>
                                <li class="disable" aria-disabled="true"><span class="js-btn-prev" title="Retour">Retour <i class="fa fa-arrow-left"></i></span></li>
                                <li><span class="js-btn-next" title="Suivant">Suivant <i class="fa fa-arrow-right"></i></span></li>
                                <?php elseif ($is_last): ?>
                                <li><span class="js-btn-prev" title="Retour"><i class="fa fa-arrow-left"></i> Retour</span></li>
                                <li><button type="submit" title="Envoyer" id="submitBtn"><i class="fas fa-paper-plane"></i> Envoyer ma demande</button></li>
                                <?php else: ?>
                                <li><span class="js-btn-prev" title="Retour"><i class="fa fa-arrow-left"></i> Retour</span></li>
                                <li><span class="js-btn-next" title="Suivant">Suivant <i class="fa fa-arrow-right"></i></span></li>
                                <?php endif; ?>
                            </ul>
                        </div>
                    </div>
                </div>
                <?php endfor; ?>

            </div>
        </form>
    </div>

    <!-- Modal de confirmation -->
    <div class="success-modal" id="successModal">
        <div class="success-content">
            <div class="success-icon">
                <i class="fas fa-check-circle"></i>
            </div>
            <h2><?php echo esc_html($success_titre); ?></h2>
            <p><?php echo nl2br(esc_html($success_message)); ?></p>
            <div id="importantSummary"></div>
            <img src="<?php echo $template_dir; ?>/assets/images/images/illustrations/5_little cat.png" alt="" class="success-cat">
            <a href="<?php echo home_url('/'); ?>" class="btn-home">
                <i class="fas fa-home"></i> Retour à l'accueil
            </a>
        </div>
    </div>

    <!-- Form Data pour JS -->
    <script>
        window.formData = <?php echo json_encode($form_data_js, JSON_UNESCAPED_UNICODE); ?>;
    </script>

    <!-- Scripts -->
    <script src="<?php echo $template_dir; ?>/assets/js/jquery.min.js"></script>
    <script src="<?php echo $template_dir; ?>/assets/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo $template_dir; ?>/assets/js/formulaire-generic.js"></script>

    <?php wp_footer(); ?>
</body>
</html>
