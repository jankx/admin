<?php
namespace Jankx\Admin;

class Admin
{
    public function __construct()
    {
        add_action('init', array($this, 'init'));
    }

    public function init()
    {
        new AdminMenus();
    }
}
