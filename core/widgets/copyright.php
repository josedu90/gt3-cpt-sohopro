<?php

class copyright extends WP_Widget
{

    function __construct() {
        parent::__construct(false, 'Copyright (current theme)');
    }

    function widget($args, $instance)
    {
        extract($args);

        echo $before_widget;
        if ($instance['widget_title'] !== '') {
            echo $before_title;
            echo esc_attr($instance['widget_title']);
            echo $after_title;
        }

        echo '
			<div class="copyright">
				<img class="copyright_image" src="'. esc_url($instance['widget_img']) .'" alt=""/>
				<div class="copyright_text">
					'. esc_attr($instance['widget_copyright']) .'
				</div>
			</div>
		';
		
		#END OUTPUT

        echo $after_widget;
    }


    function update($new_instance, $old_instance)
    {
        $instance = $old_instance;

        $instance['widget_title'] = esc_attr($new_instance['widget_title']);
        $instance['widget_img'] = esc_url($new_instance['widget_img']);
		$instance['widget_copyright'] = esc_attr($new_instance['widget_copyright']);

        return $instance;
    }

    function form($instance)
    {
        $defaultValues = array(
            'widget_title' => '',
			'widget_img' => '',
            'widget_copyright' => '&copy; 2017 SOHO'
        );
        $instance = wp_parse_args((array)$instance, $defaultValues);
        ?>
        <table class="fullwidth">
            <tr>
                <td>Title:</td>
                <td><input type='text' class="fullwidth" name='<?php echo esc_attr($this->get_field_name('widget_title')); ?>'
                           value='<?php echo esc_attr($instance['widget_title']); ?>'/></td>
            </tr>
            <tr>
                <td>Image URL:</td>
                <td><input type='text' class="fullwidth" name='<?php echo esc_attr($this->get_field_name('widget_img')); ?>'
                           value='<?php echo esc_attr($instance['widget_img']); ?>'/></td>
            </tr>
            <tr>
                <td>Copyright Text:</td>
                <td><input type='text' class="fullwidth"
                           name='<?php echo esc_attr($this->get_field_name('widget_copyright')); ?>'
                           value='<?php echo esc_attr($instance['widget_copyright']); ?>'/></td>
            </tr>
        </table>
    <?php
    }
}

function copyright_register_widgets()
{
    register_widget('copyright');
}

add_action('widgets_init', 'copyright_register_widgets');

?>