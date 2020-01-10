<?php

namespace Webstarters\Modules;

class Toolbar
{
    /**
     * Register the menu item.
     *
     * @param  object $adminBar
     *
     * @return void
     */
    public function __invoke($adminBar)
    {
        $adminBar->add_node([
            'id'    => 'webstarters-module-toolbar',
            'title' => _x('Modules', 'Post Type General Name', 'webstarters'),
            'href'  => admin_url('edit.php?post_type='.PostType::POST_TYPE),
        ]);
    }
}
