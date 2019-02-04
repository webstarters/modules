<?php

if (class_exists('WPBakeryShortCode')) {
    class ModulWPBakeryShortCode extends WPBakeryShortCode {
        function __construct() {
            add_action('init', array($this, 'modul_shortcode_mapping'));
            add_shortcode('modul', array($this, 'modul_shortcode_html'));
        }

        public function modul_shortcode_mapping() {
            if (! defined('WPB_VC_VERSION')) {
                return;
            }

            $posts = get_posts([
                'posts_per_page'    => -1,
                'post_type'         => 'modul',
                'orderby'           => 'date',
                'order'             => 'DESC',
            ]);

            $moduler = [];
            foreach($posts as $post) {
                $moduler['id-'. (string) $post->ID] = $post->post_title;
            }

            vc_map([
                'name'              => __('Modul', 'webstarters'),
                'base'              => 'modul',
                'description'       => __('Indsæt et modul', 'webstarters'),
                'category'          => __('Webstarters', 'webstarters'),
                "icon"              => MODUL_DIR . "/assets/img/modul_512x512.png",
                'params'            => [
                    [
                        'type'          => 'dropdown',
                        'heading'       => __( 'Modul', 'webstarters'),
                        'description'   => __('Vælg et modul', 'webstarters'),
                        'param_name'    => 'modul',
                        'holder'        => 'p',
                        'value'         => array_flip($moduler),
                        'std'           => 'Intet valgt',
                    ],
                ],
            ]);
        }

        public function modul_shortcode_html($atts) {

            extract(
                shortcode_atts(
                    [
                        'modul' => 'X',
                    ],
                    $atts
                )
            );

            $modul = str_replace('id-', '', $modul);

            return do_shortcode('[vis_modul modul="'. $modul .'"]');
        }
    }
}

?>