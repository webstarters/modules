<?php

namespace Webstarters\Modules;

use WP_Widget;

class Widget extends WP_Widget
{
    public function __construct()
    {
        parent::__construct(
            'ws_module_widget',
            'Module',
            [
                'classname' => 'ws-module-widget',
                'description' => 'Reusable components for use when page-building',
            ]
        );
    }

    public function widget($atts, $instance)
    {
        $posts = get_posts([
            'posts_per_page'    => -1,
            'order'             => 'DESC',
            'orderby'           => 'menu_order',
            'post__in'          => explode(',', $atts['id']),
            'post_type'         => PostType::POST_TYPE,
        ]);

        $content = '';

        foreach ($posts as $post) {
            $content .= $post->post_content;
        }

        return do_shortcode($content);
    }

    public function form($instance)
    {
        $instance = wp_parse_args((array) $instance, ['title' => '']);

        $modules = get_posts([
            'posts_per_page'    => -1,
            'post_type'         => PostType::POST_TYPE,
            'orderby'           => 'date',
            'order'             => 'DESC',
        ]);

        ?>
            <p>
                <label style="display: block;" for="<?php echo $this->get_field_id('module'); ?>">
                    <?php echo __('Choose module:', 'webstarters'); ?>
                </label>
                <select type="text" name="<?php echo $this->get_field_name('module'); ?>" id="<?php echo $this->get_field_id('module'); ?>">
                    <?php foreach ($modules as $module): ?>
                        <option value="<?php echo $module->ID ?>" <?php selected($instance['module'], $module->ID); ?>>
                            <?php echo $module->post_title ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </p>
        <?php
    }

    public function update($newInstance, $oldInstance)
    {
        $instance = $oldInstance;

        $instance['module'] = $newInstance['module'];

        return $instance;
    }
}
