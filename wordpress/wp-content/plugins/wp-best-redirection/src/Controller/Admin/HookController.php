<?php

namespace WPBestRedirection\Controller\Admin;

use WPBestRedirection\Controller\Controller;

class HookController extends Controller
{
    function register()
    {
        register_activation_hook(WP_BEST_REDIRECTION_FILE, [$this, 'activate']);
        register_deactivation_hook(WP_BEST_REDIRECTION_FILE, [$this, 'deactivate']);
    }

    function activate()
    {
        // Stopping the plugin if the version of the user is inferior to 7.4
        $phpVersion = (float)phpversion();
        if ($phpVersion < 7.4) {
            // It is a die() version of WP that shows a page for this error instead of a fatal error.
            wp_die($this->show($phpVersion));
        }
        flush_rewrite_rules();
    }

    function deactivate()
    {
        flush_rewrite_rules();
    }

    function show(float $phpVersion)
    {
        return $this->render('admin/hook/show.html.php', ['phpVersion' => $phpVersion]);
    }
}