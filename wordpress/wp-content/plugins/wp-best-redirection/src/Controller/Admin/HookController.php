<?php

namespace WPBestRedirection\Controller\Admin;

use WPBestRedirection\Controller\Controller;

class HookController extends Controller
{
	public function register()
	{
		register_activation_hook(WP_BEST_REDIRECTION_FILE, [$this, 'activate']);
		register_deactivation_hook(WP_BEST_REDIRECTION_FILE, [$this, 'deactivate']);
	}

	public function activate()
	{
		// Stopping the plugin if the version of the user is inferior to 7.4
		$phpversion = (float) phpversion();
		if ($phpversion < 7.4) {
			// It is a die() version of WP that shows a page for this error instead of a fatal error.
			wp_die($this->show($phpversion));
		}
		// Recommendation de Wordpress
		flush_rewrite_rules();
	}

	public function deactivate()
	{
		// Recommendation de Wordpress
		flush_rewrite_rules();
	}

	public function show(float $phpversion)
	{
		return $this->render('admin/hook/show.html.php', [
			'phpversion' => $phpversion
		]);
	}

}