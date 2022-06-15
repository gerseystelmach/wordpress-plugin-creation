<?php

namespace WPBestRedirection\Controller\Admin\Menu\SubMenu;

use WPBestRedirection\Controller\Controller;

class RedirectionSubMenuController extends Controller
{
    public function create(string $parentSlug)
    {
        add_action('admin_menu', function() use ($parentSlug) {
            add_submenu_page(
                $parentSlug,
                'WP Best Redirection SubMenu',
                'Redirection Options',
                'manage_options',
                'Redirection',
                function() {
                    echo $this->show();
                }
            );
        });
    }

    public function show()
    {
        return $this->render('admin/submenu/redirection-show.html.php');

    }
}