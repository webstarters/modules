<?php

// create category list widget
class modulWidget extends WP_Widget {

	/**
	 * [__construct description]
	 */
	function __construct() {
		parent::__construct(
			'ws_modul_widget',
			'Modul',
			[
				'classname' => 'ws-modul-widget',
				'description' => 'Vis et modul.'
			]
		);
	}

	/**
	 * [widget description]
	 * @param  array $args     widget input
	 * @param  array $instance data input
	 * @return
	 */
	function widget($args, $instance) {
		// echo $args['before_widget'];

        $posts = get_posts([
            'posts_per_page'    => 1,
            'post_type'         => 'modul',
            'orderby'           => 'date',
            'order'             => 'DESC',
            'post__in'          => [$instance['modul']],
        ]);
		
	$shortcode = '';

        foreach($posts as $post) {
            $shortcode .= $post->post_content;
        }

        echo do_shortcode($shortcode);

		// echo $args['after_widget'];
	}

	/**
	 * [form description]
	 * @param  [type] $instance [description]
	 * @return [type]           [description]
	 */
	function form($instance) {

		$instance = wp_parse_args((array) $instance, ['title' => '']); // not sure if this is needed REFACTOR ME

        $moduler = get_posts([
            'posts_per_page'    => -1,
            'post_type'         => 'modul',
            'orderby'           => 'date',
            'order'             => 'DESC',
        ]);

		?>
			<p>
				<label style="display: block;" for="<?php echo $this->get_field_id('modul'); ?>"><?php echo __('Vælg modul:', 'webstarters'); ?></label>
				<select type="text" name="<?php echo $this->get_field_name('modul'); ?>" id="<?php echo $this->get_field_id('modul'); ?>">
					<?php foreach ($moduler as $modul): ?>
						<option value="<?php echo $modul->ID ?>" <?php selected($instance['modul'], $modul->ID); ?>><?php echo $modul->post_title ?></option>
					<?php endforeach; ?>
				</select>
			</p>
		<?php
	}

	/**
	 * [update description]
	 * @param  [type] $new_instance [description]
	 * @param  [type] $old_instance [description]
	 * @return [type]               [description]
	 */
	function update($new_instance, $old_instance) {
		$instance = $old_instance;

		$instance['modul'] = $new_instance['modul'];

		return $instance;
	}
}



?>
