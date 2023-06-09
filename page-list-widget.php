<?php
/**
 * Plugin Name: Page List Widget
 * Description: A widget to display a list of pages.
 * Version: 1.0
 */

class Page_List_Widget extends WP_Widget {

    function __construct() {
        parent::__construct(
            'page_list_widget', // Widget ID
            __('Page List Widget', 'page_list_widget_domain'), // Widget Name
            array( 'description' => __( 'A widget to display a list of pages', 'page_list_widget_domain' ), ) // Widget Description
        );
    }

    public function widget( $args, $instance ) {
        echo $args['before_widget'];
        if ( ! empty( $instance['title'] ) ) {
            echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
        }

        // Display the page list
        $args = array(
            'depth'        => 0,
            'sort_column'  => 'menu_order, post_title',
            'echo'         => 1,
            'title_li'     => '',
            'exclude'      => '',
            'include'      => '',
            'link_before'  => '',
            'link_after'   => '',
            'post_type'    => 'page',
            'post_status'  => 'publish',
            'show_date'    => '',
            'date_format'  => get_option('date_format'),
            'child_of'     => 0,
            'parent'       => -1,
            'exclude_tree' => ''
        );

        wp_list_pages( $args );

        echo $args['after_widget'];
    }

    public function form( $instance ) {
        $title = ! empty( $instance['title'] ) ? $instance['title'] : __( 'New title', 'page_list_widget_domain' );
        ?>
        <p>
            <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
        </p>
        <?php
    }

    public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
        return $instance;
    }
}

function register_page_list_widget() {
    register_widget( 'Page_List_Widget' );
}

add_action( 'widgets_init', 'register_page_list_widget' );
