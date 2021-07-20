<?php
namespace Jankx\Admin;

class Admin
{
    public function __construct()
    {
        add_action('admin_init', array($this, 'init'));
    }

    private function define($name, $value)
    {
        if (!defined($name)) {
            define($name, $value);
        }
    }

    public function init()
    {
        new AdminMenus();
    }
}
