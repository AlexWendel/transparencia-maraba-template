<?php
/**
 * Post rendering content according to caller of get_template_part
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<div class="card">
	<div class="card-body text-center">
		<p><?php $post_id = get_the_ID(); get_post_meta( $post_id ); ?></p>
		<p><?php get_post_custom_values('icon'); ?></p>
		<h5 class="card-title"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h5>			  
	</div>
</div>