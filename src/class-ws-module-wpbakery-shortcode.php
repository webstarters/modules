<?php

namespace Webstarters\Modules;

use WPBakeryShortCode as WPBakeryShortCodeBase;

class WPBakeryShortcode extends WPBakeryShortCodeBase
{
    /**
     * Register action and shortcode.
     */
    public function __construct()
    {
        add_action('init', [$this, 'register']);
        add_shortcode('ws_vc_module', [$this, 'handle']);
    }

    /**
     * Register the Visual Composer element.
     *
     * @return void
     */
    public function register()
    {
        if (! defined('WPB_VC_VERSION')) {
            return;
        }

        $posts = get_posts([
            'posts_per_page'    => -1,
            'post_type'         => PostType::POST_TYPE,
            'orderby'           => 'date',
            'order'             => 'DESC',
        ]);

        $modules = [];

        foreach ($posts as $post) {
            $modules['id-'. (string) $post->ID] = $post->post_title;
        }

        vc_map([
            'name'              => __('Module', 'webstarters'),
            'base'              => 'ws_vc_module',
            'description'       => __('Insert module', 'webstarters'),
            'category'          => __('Webstarters', 'webstarters'),
            'icon'              => WS_MODULE_DIR.'/assets/img/module_512x512.png',
            'params'            => [
                [
                    'type'          => 'dropdown',
                    'heading'       => __('module', 'webstarters'),
                    'description'   => __('Choose module', 'webstarters'),
                    'param_name'    => 'module_id',
                    'holder'        => 'p',
                    'value'         => array_flip($modules),
                    'std'           => 'No module has been chosen',
                ],
            ],
        ]);
    }

    /**
     * Execute the shortcode.
     *
     * @param  array    $atts
     *
     * @return string
     */
    public function handle($atts)
    {
        extract(shortcode_atts([
            'module_id' => 'X',
        ], $atts));

        $id = str_replace('id-', '', $module_id);

        return do_shortcode('['.Shortcode::TAG.' id="'. $id .'"]');
    }
}
