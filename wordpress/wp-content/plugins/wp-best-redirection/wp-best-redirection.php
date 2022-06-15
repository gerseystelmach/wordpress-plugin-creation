<?php

/**
 * Plugin Name: WP Best Redirection
 * Author: Gersey Franco Stelmach
 * Description: Plugin to create redirections of old urls to the new urls, created during the Wordpress Course with M2I.
 * Text Domain: wp-best-redirection
 * License: MIT
 */

use WPBestRedirection\Controller\Admin\HookController;
use WPBestRedirection\Controller\Admin\Menu\MenuController;
use WPBestRedirection\Controller\Admin\Menu\SubMenu\RedirectionSubMenuController;

require __DIR__ . '/vendor/autoload.php';
const WP_BEST_REDIRECTION_FILE = __FILE__;

// Watch out the variables name, because there are variable already used by Wordpress, such as $menu.
$hookController = new HookController();
$menuController = new MenuController();
$redirectionSubmenuController = new RedirectionSubMenuController();

$hookController->register();
$menuController->create();
// We need to indicate the slug of the MenuController 4th argument
$redirectionSubmenuController->create('wp_best_redirection');
