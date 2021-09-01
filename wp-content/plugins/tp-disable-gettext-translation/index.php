<?php
/*
Plugin Name: TranslatePress - Disable Gettext Translation
Plugin URI: https://translatepress.com/
Description: Disable Gettext Translation to reduce page load time.
Version: 1.0.1
Author: Cozmoslabs, Razvan Mocanu
Author URI: https://cozmoslabs.com/
License: GPL2
 */

add_action( 'trp_before_running_hooks', 'trpc_remove_hooks_to_disable_gettext_translation', 10, 1);
function trpc_remove_hooks_to_disable_gettext_translation( $trp_loader ){
	$trp                = TRP_Translate_Press::get_trp_instance();
	$translation_manager = $trp->get_component( 'translation_manager' );
	$trp_loader->remove_hook( 'init', 'create_gettext_translated_global', $translation_manager );
	$trp_loader->remove_hook( 'shutdown', 'machine_translate_gettext', $translation_manager );
}

add_filter( 'trp_skip_gettext_querying', 'trpc_skip_gettext_querying', 10, 4 );
function trpc_skip_gettext_querying( $skip, $translation, $text, $domain ){
	return true;
}

add_action( 'trp_head', 'trpc_add_message_in_editor_gettext_is_disabled', 20 );
function trpc_add_message_in_editor_gettext_is_disabled(){
	$css = "<style>#trp-preview.trp-still-loading-strings:before{
        content:'Translation of gettext strings is disabled.'!important;
	}</style>";
	echo $css;
}
