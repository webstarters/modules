<?php

namespace Webstarters\Modules;

class Shortcode
{
    const TAG = 'ws_module';

    /**
     * Execute the shortcode.
     *
     * @param  array  $atts
     * @param  string $content
     *
     * @return string
     */
    public function __invoke($atts = [], $content = '')
    {
        $posts = get_posts([
            'posts_per_page'    => -1,
            'order'             => 'DESC',
            'orderby'           => 'menu_order',
            'post__in'          => explode(',', $atts['id']),
            'post_type'         => PostType::POST_TYPE,
        ]);

        foreach ($posts as $post) {
            $content .= $post->post_content;
        }

        return do_shortcode($content);
    }
}
