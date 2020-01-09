<?php

namespace Webstarters\Modules;

class Toolbar
{
    public function __invoke($adminBar)
    {
        $adminBar->add_node([
            'id'    => 'webstarters-module-toolbar',
            'title' => _x('Modules', 'Post Type General Name', 'webstarters'),
            'href'  => admin_url('edit.php?post_type='.PostType::POST_TYPE),
        ]);
    }
}
