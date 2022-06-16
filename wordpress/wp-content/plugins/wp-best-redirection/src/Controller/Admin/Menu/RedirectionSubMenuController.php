<?php

namespace WPBestRedirection\Controller\Admin\Menu;

use WPBestRedirection\Controller\Controller;
use WPBestRedirection\Controller\Admin\Menu\RedirectionFormController;

class RedirectionSubMenuController extends Controller {

	public function create( string $pageSlug, string $parentSlug ) {
		// Création sous-menu
		add_action( 'admin_menu', function () use ( $pageSlug, $parentSlug ) {
			add_submenu_page(
				$parentSlug,
				'WP Best Redirection Manage',
				'Redirection',
				'manage_options',
				$pageSlug,
				function () use ( $pageSlug, $parentSlug ) {
					echo $this->show( $pageSlug, $parentSlug );
				}
			);
		} );

		$redirectionFormController = new RedirectionFormController();
		$redirectionFormController->create($pageSlug);
	}


	public function show(string $pageSlug, string $parentSlug)
	{
		return $this->render('admin/submenu/redirection-show.html.php', [
			'pageSlug' => $pageSlug,
			'parentSlug' => $parentSlug
		]);
	}
}