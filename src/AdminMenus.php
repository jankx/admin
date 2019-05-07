<?php

namespace Jankx\Admin;

class AdminMenus
{
    public function __construct()
    {
        add_action('admin_menu', array($this, 'registerAdminMenus'));
    }

    public function registerAdminMenus()
    {
        $main_menu_title = apply_filters('jankx_menu_title', __('Jankx Settings', 'jankx'));
        $main_menu_label = apply_filters('jankx_menu_label', __('Jankx', 'jankx'));

        add_menu_page($main_menu_title, $main_menu_label, 'manage_options', 'jankx', null, null, 65);
    }
}
