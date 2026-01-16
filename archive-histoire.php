<?php
/**
 * Template pour afficher les archives du CPT histoire
 * Redirection vers la page histoires
 */

// Rediriger vers la page histoires principale
wp_redirect(home_url('/histoires'), 301);
exit;
