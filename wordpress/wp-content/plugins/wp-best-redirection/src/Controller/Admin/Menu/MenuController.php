<?php

namespace WPBestRedirection\Controller\Admin\Menu;

use WPBestRedirection\Controller\Controller;
use WPBestRedirection\Controller\Admin\Menu\RedirectionSubMenuController;

class MenuController extends Controller
{
	private string $parentSlug;
	private string $manageSlug;

	public function __construct()
	{
		$this->parentSlug = 'wp_best_redirection';
		$this->manageSlug = 'wp_best_redirection_manage';
	}

	public function create()
	{
		// Création menu
		add_action('admin_menu', function () {
			add_menu_page(
				'WpBestRedirection',
				'WpBestRedirection Options',
				'manage_options',
				$this->parentSlug,
				function () {
					echo $this->show();
				},
				'dashicons-admin-links'
			);
		});

		// Création sous-menu
		$redirectionSubMenu = new RedirectionSubMenuController();
		$redirectionSubMenu->create($this->manageSlug, $this->parentSlug);
	}

	public function show()
	{
		return $this->render('admin/menu/show.html.php', [
			'manageSlug' => $this->manageSlug
		]);
	}
}
