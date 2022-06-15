<?php

namespace WPBestRedirection\Controller\Admin\Menu;

use WPBestRedirection\Controller\Controller;

class MenuController extends Controller
{
    public function create()
    {
        // Creation of admin menu
        // I cannot call the add_menu_page() direct, so I create an anonymous function
        // In the argument of callback, I also need to add a function
        add_action('admin_menu', function() {
            add_menu_page(
                'WPBestRedirection',
                'WP Best Redirection Options',
                'manage_options',
                'wp_best_redirection',
                function() {
                  echo $this->show();
                },
                'dashicons-admin-links',
                1
            );
        });

    }

// Render of HTML for the menu
    public function show()
    {
        return $this->render('admin/menu/show.html.php');
    }
}