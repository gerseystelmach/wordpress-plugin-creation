<?php

/**
 * Plugin Name: WP Best Redirection
 * Author: Gersey Franco Stelmach
 * Description: Plugin to create redirections of old urls to the new urls.
 * Text Domain: wp-best-redirection
 * License: MIT
 */

use WPBestRedirection\Controller\Admin\HookController;
use WPBestRedirection\Controller\Admin\Menu\MenuController;
use WPBestRedirection\Controller\Admin\Menu\RedirectionSubMenuController;

require __DIR__ . '/vendor/autoload.php';
const WP_BEST_REDIRECTION_FILE = __FILE__;

// Watch out the variables name, because there are variable already used by Wordpress, such as $menu.
$hookController = new HookController();
$hookController->register();

$menuController = new MenuController();
$menuController->create();

