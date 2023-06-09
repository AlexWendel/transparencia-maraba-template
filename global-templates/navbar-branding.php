<?php
/**
 * Navbar branding
 *
 * @package Understrap
 * @since 1.2.0
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

?>
<h1 class="navbar-brand mb-0">
	<a rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>" itemprop="url" style="display:flex"></a>
	<div id="wrapper" style="display:flex;gap:10px; align-items:center">
		<div>
			<?php
				$custom_logo_id = get_theme_mod( 'custom_logo' );
				$image = wp_get_attachment_image_src( $custom_logo_id , 'thumbnail' );
			?>			
			<img class="website-logo" src="<?php echo $image[0] ?>" alt="Início">
		</div>
		<div>
			<h2 class="h4" style="font-weight:bold; margin:0;"><?php bloginfo( 'name' ); ?></h2>
			<h1 class="h5"><?php bloginfo( 'description' ); ?></h1>
		</div>
	</div>
</h1>