<?php

add_shortcode('vis_modul', function ($atts) {

    $posts = get_posts([
        'posts_per_page'    => 1,
        'post_type'         => 'modul',
        'orderby'           => 'date',
        'order'             => 'DESC',
        'post__in'          => [$atts['modul']],
    ]);

    foreach($posts as $post) {
        $generate_shortcode .= $post->post_content;
    }

    return do_shortcode($generate_shortcode);
});

?>