<?php

add_action('admin_bar_menu', function($wp_admin_bar) {
    $wp_admin_bar->add_node([
        'id'    => 'webstartersModulerToolbar',
        'title' => __('Moduler', 'webstarters'),
        'href'  => admin_url('edit.php?post_type=modul'),
    ]);
}, 999);

?>