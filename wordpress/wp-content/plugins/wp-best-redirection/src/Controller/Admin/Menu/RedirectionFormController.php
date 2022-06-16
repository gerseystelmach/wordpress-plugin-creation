<?php

namespace WPBestRedirection\Controller\Admin\Menu;

use WPBestRedirection\Controller\Controller;

class RedirectionFormController extends Controller {
	public function create( string $menuSlug ) {

		$this->createAjax();

		add_action( 'admin_init', function () use ( $menuSlug ) {
			add_settings_section(
				'wp_best_redirection_manage_section',
				'Redirection Section',
				function () {
					echo $this->showSection();
				},
				$menuSlug
			);
			register_setting( $menuSlug, 'wp_best_redirection_manage_setting' );
			add_settings_field(
				'wp_best_redirection_manage_field',
				'Redirection',
				function () {
					echo $this->showField();
				},
				$menuSlug,
				'wp_best_redirection_manage_section'
			);
		} );
	}

	// Creating function ajax to delete the inputs of redirection/slug
	public function createAjax() {
		$scriptId = 'wp_best_redirection_manage_field';
		// Loading the script of redirection
		add_action( 'admin_enqueue_scripts', function () use ( $scriptId ) {
			wp_enqueue_script(
				$scriptId,
				plugins_url( 'assets/js/redirection-field.js', WP_BEST_REDIRECTION_FILE ),
				array( 'jquery' )
			);
			// Steps by the argument : Find a script, create a global variable called $scriptId, create an object, authorize the acces to ajax and create a security token
			$token = wp_create_nonce( $scriptId );
			wp_localize_script(
				$scriptId,
				$scriptId,
				[
					'ajax_url' => admin_url( 'admin-ajax.php' ),
					'nonce'    => $token
				]
			);
		} );
		// Attention : When calling the action, we DO NOT NEED to call the prefix 'wp_ajax_'
		add_action( 'wp_ajax_' . $scriptId . '_delete', function () use ( $scriptId ) {
			$this->delete( $scriptId );
		} );
	}

	// Function to delete each redirection field from redirection list
	public function delete( $scriptId ) {
		check_ajax_referer( $scriptId );
		$id              = filter_input( INPUT_POST, 'id' ); // recovering id of each redirection input
		$redirectionList = get_option( 'wp_best_redirection_manage_setting' );
		// deleting the element from the array of redirection list
		$redirectionListToUpdate = [];
		foreach ( $redirectionList as $key => $redirection ) {
			if ( $key != $id ) {
				$redirectionListToUpdate[ $key ] = $redirection;
			}
		}
		update_option('wp_best_redirection_manage_setting', $redirectionListToUpdate);
		wp_die(); // all ajax handlers must  die when finished
	}

	// It renders the input for each redirection and return an array with all the redirections
	public function showField() {
		$redirectionList = get_option( 'wp_best_redirection_manage_setting' );

		// var_dump( $redirectionList );

		return $this->render( 'admin/menu/redirection_form/show_field.html.php', [
			'redirection_list' => $redirectionList
		] );
	}

	public function showSection() {
		// Creating a flash message with the hour date of the last modification
		if ( filter_input( INPUT_GET, "settings-updated" ) ) {
			set_transient( 'wp_best_redirection_last_updated', date( 'H:i:s' ), 60 * 60 );
		}

		return $this->render( 'admin/menu/redirection_form/show_section.html.php', [
			'last_updated' => get_transient( 'wp_best_redirection_last_updated' )
		] );
	}


}