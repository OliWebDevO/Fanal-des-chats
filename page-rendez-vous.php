<?php
/**
 * Page /rendez-vous — redirection permanente vers /rdv-chat.
 *
 * Cette page groupait autrefois les deux calendriers (chat adulte et chaton).
 * Elle a été remplacée le 25/04/2026 par les pages distinctes /rdv-chat et
 * /rdv-chaton, qui pointent chacune vers le bon compte Calendly. Le fichier
 * d'origine avait alors été supprimé, puis réintroduit involontairement par une
 * migration All-in-One WP Migration (l'outil ne supprime pas les fichiers
 * absents de l'archive). Ses deux widgets Calendly pointaient vers des comptes
 * obsolètes.
 *
 * Une redirection est conservée plutôt qu'une simple suppression : la page
 * WordPress correspondante existe toujours en base, et sans ce fichier
 * WordPress servirait /rendez-vous avec le template par défaut, soit une page
 * vide. Elle protège aussi les éventuels liens externes ou favoris.
 *
 * Ce fichier devient inutile le jour où la page WordPress est supprimée.
 */

wp_redirect(home_url('/rdv-chat'), 301);
exit;
