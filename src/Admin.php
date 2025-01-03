<?php

namespace Jankx\Admin;

use Jankx\GlobalConfigs;
use Jankx\Adapter\Options\Framework;
use Jankx\Adapter\Options\OptionsReader;

class Admin
{
    protected $optionFramework;

    public function __construct()
    {
        add_action('after_setup_theme', array($this, 'setup'), 15);
        add_action('after_setup_theme', array($this, 'init_theme_options'), 30);
    }

    public function setup()
    {
        $menu_title = apply_filters(
            'jankx_admin_menu_title',
            sprintf('%s %s', GlobalConfigs::get('theme.shortName'), __('Options', 'jankx'))
        );
        $display_name = apply_filters(
            'jankx_admin_menu_display_name',
            GlobalConfigs::get('theme.name')
        );

        $this->optionFramework = Framework::getActiveFramework();
        if ($this->optionFramework) {
            $this->optionFramework->register_admin_menu($menu_title, $display_name);
        }

        add_action('admin_init', array($this, 'setup_admin'));
    }

    public function init_theme_options()
    {
        // Setup theme options
        if ($this->optionFramework) {
            $optionReaders = new OptionsReader();
            $options = $optionReaders->readAllOptions();
            $this->optionFramework->createSections($options);
        }
    }

    public function setup_admin()
    {
    }
}
