<?php
/**
 * The template for displaying header.
 *
 * @package HelloElementor
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
$site_name = get_bloginfo( 'name' );
$tagline   = get_bloginfo( 'description', 'display' );
$header_shadow = get_query_var( 'header' )? get_query_var( 'header' ): ['header_shadow'=>false];

$is_header_shadow = $header_shadow['header_shadow']?' header-shadow':'';

?>
<a class="skip-link screen-reader-text" href="#content">
	<?php _e( 'Skip to content', 'hello-elementor' ); ?></a>

<header id="site-header-top" class="thinkus-site-header top-header" role="banner">
    <div class="header-wrapper">

		<div class="site-branding">
			<?php
		if ( has_custom_logo() ) {
			the_custom_logo();
		} elseif ( $site_name ) {
			?>
			<h1 class="site-title">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php esc_attr_e( 'Home', 'hello-elementor' ); ?>" rel="home">
					<?php echo esc_html( $site_name ); ?>
				</a>
			</h1>
			<p class="site-description">
				<?php
				if ( $tagline ) {
					echo esc_html( $tagline );
				}
				?>
			</p>
		<?php } ?>
	</div>

	
	<?php
	get_template_part( 'includes/templates-parts/header/navigation' );
	?>
	</div>
</header>
<header id="site-header" class="thinkus-site-header header<?php echo $is_header_shadow; ?>" role="banner">
<div class="header-wrapper">
	<div class="site-branding">
		<?php
		if ( has_custom_logo() ) {
			the_custom_logo();
		} elseif ( $site_name ) {
			?>
			<h1 class="site-title">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php esc_attr_e( 'Home', 'hello-elementor' ); ?>" rel="home">
					<?php echo esc_html( $site_name ); ?>
				</a>
			</h1>
			<p class="site-description">
				<?php
				if ( $tagline ) {
					echo esc_html( $tagline );
				}
				?>
			</p>
		<?php } ?>
	</div>

	<?php
	get_template_part( 'includes/templates-parts/header/navigation' );
	?>
	</div>
</header>

