<?php
/**
 * Template pour l'affichage des commentaires
 *
 * Ce template gère l'affichage des commentaires et du formulaire de commentaire
 * pour les histoires d'adoption du Fanal des Chats.
 */

// Ne pas afficher si le fichier est accédé directement
if (!defined('ABSPATH')) {
    exit;
}

// Ne pas afficher si l'article est protégé par mot de passe
if (post_password_required()) {
    return;
}
?>

<div class="comments-area">
    <?php if (have_comments()) : ?>
        <div class="comments-section">
            <h3 class="comments-title">
                <?php
                $comment_count = get_comments_number();
                if ($comment_count == 1) {
                    echo '1 Commentaire';
                } else {
                    echo $comment_count . ' Commentaires';
                }
                ?>
            </h3>

            <ol class="comments">
                <?php
                wp_list_comments(array(
                    'style'       => 'ol',
                    'short_ping'  => true,
                    'avatar_size' => 80,
                    'callback'    => 'fanal_custom_comment_callback',
                    'max_depth'   => 3,
                ));
                ?>
            </ol>

            <?php if (get_comment_pages_count() > 1 && get_option('page_comments')) : ?>
                <nav class="comment-navigation">
                    <div class="nav-previous"><?php previous_comments_link('&larr; Commentaires précédents'); ?></div>
                    <div class="nav-next"><?php next_comments_link('Commentaires suivants &rarr;'); ?></div>
                </nav>
            <?php endif; ?>

        </div> <!-- end comments-section -->
    <?php endif; ?>

    <?php if (!comments_open() && get_comments_number() && post_type_supports(get_post_type(), 'comments')) : ?>
        <p class="no-comments">Les commentaires sont fermés pour cette histoire.</p>
    <?php endif; ?>

    <?php if (comments_open()) : ?>
        <div class="comment-respond">
            <?php
            $commenter = wp_get_current_commenter();
            comment_form(array(
                'class_form'           => 'comment-form',
                'title_reply'          => 'Laisser un commentaire',
                'title_reply_to'       => 'Répondre à %s',
                'title_reply_before'   => '<h3 id="reply-title" class="comment-reply-title">',
                'title_reply_after'    => '</h3>',
                'cancel_reply_before'  => ' <small>',
                'cancel_reply_after'   => '</small>',
                'cancel_reply_link'    => 'Annuler la réponse',
                'label_submit'         => 'Publier le commentaire',
                'submit_button'        => '<input name="%1$s" type="submit" id="%2$s" class="%3$s" value="%4$s" />',
                'submit_field'         => '<div class="form-submit">%1$s %2$s</div>',
                'comment_notes_before' => '',
                'comment_notes_after'  => '',
                'logged_in_as'         => '',
                'comment_field'        => '<div class="form-textarea"><textarea id="comment" name="comment" placeholder="Partagez votre expérience ou encouragez la famille..." required></textarea></div>',
                'fields'               => array(
                    'author' => '<div class="form-inputs"><input id="author" name="author" type="text" placeholder="Nom *" value="' . esc_attr($commenter['comment_author'] ?? '') . '" required />',
                    'email'  => '<input id="email" name="email" type="email" placeholder="Email *" value="' . esc_attr($commenter['comment_author_email'] ?? '') . '" required /></div>',
                ),
            ));
            ?>
        </div>
    <?php endif; ?>
</div> <!-- end comments-area -->

<?php
/**
 * Callback personnalisé pour l'affichage de chaque commentaire
 * Reproduit le design existant du thème
 */
function fanal_custom_comment_callback($comment, $args, $depth) {
    $GLOBALS['comment'] = $comment;
    $comment_class = implode(' ', get_comment_class(empty($args['has_children']) ? '' : 'parent', $comment));
    $is_reply = $depth > 1;
    $reply_class = $is_reply ? ' comment-reply depth-' . $depth : '';
    $avatar_size = $is_reply ? 60 : 80;
    ?>
    <li class="<?php echo $comment_class . $reply_class; ?>" id="comment-<?php comment_ID(); ?>"<?php if ($is_reply) echo ' style="margin-left: 50px; padding-left: 20px; border-left: 3px solid #FF5B2E;"'; ?>>
        <div id="div-comment-<?php comment_ID(); ?>">
            <div class="comment-theme">
                <div class="comment-image">
                    <?php echo get_avatar($comment, $avatar_size, '', get_comment_author()); ?>
                </div>
            </div>
            <div class="comment-main-area">
                <div class="comment-wrapper">
                    <div class="comments-meta">
                        <h4>
                            <?php echo get_comment_author(); ?>
                            <span class="comments-date">
                                dit le <?php echo get_comment_date('d M Y'); ?> à <?php echo get_comment_time('H:i'); ?>
                            </span>
                        </h4>
                    </div>
                    <div class="comment-area">
                        <?php if ($comment->comment_approved == '0') : ?>
                            <p class="comment-awaiting-moderation"><em>Votre commentaire est en attente de modération.</em></p>
                        <?php else : ?>
                            <?php comment_text(); ?>
                        <?php endif; ?>

                        <div class="comments-reply">
                            <?php
                            comment_reply_link(array_merge($args, array(
                                'reply_text' => '<span>Répondre</span>',
                                'depth'      => $depth,
                                'max_depth'  => $args['max_depth'],
                                'before'     => '',
                                'after'      => '',
                            )));
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php
    // Note: WordPress ferme automatiquement le </li> et gère les <ul class="children">
}
