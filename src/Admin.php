<?php
namespace Jankx\Admin;

use Jankx\GlobalVariables;
use Jankx\Option\Framework;

class Admin
{
    public function __construct()
    {
        add_action('after_setup_theme', array($this, 'setup_admin'), 16);
        add_action('admin_init', array($this, 'init'));
    }

    private function define($name, $value)
    {
        if (!defined($name)) {
            define($name, $value);
        }
    }

    public function setup_admin()
    {
        $menu_title = apply_filters(
            'jankx_admin_menu_title',
            sprintf('%s %s', GlobalVariables::get('theme.short_name'), __('Options', 'jankx'))
        );
        $display_name = apply_filters(
            'jankx_admin_menu_display_name',
            GlobalVariables::get('theme.name')
        );

        $option_framework = Framework::getActiveFramework();
        if ($option_framework) {
            $option_framework->register_admin_menu($menu_title, $display_name);
        }
    }

    public function init()
    {
    }
}
