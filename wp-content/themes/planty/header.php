<?php
/**
 * The Header for our theme.
 *
 * @package OceanWP WordPress theme
 */

?>
<!DOCTYPE html>
<html class="<?php echo esc_attr( oceanwp_html_classes() ); ?>" <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?> <?php oceanwp_schema_markup( 'html' ); ?>>

	<?php wp_body_open(); ?>

	<?php do_action( 'ocean_before_outer_wrap' ); ?>

	<div id="outer-wrap" class="site clr">

		<a class="skip-link screen-reader-text" href="#main"><?php echo esc_html( oceanwp_theme_strings( 'owp-string-header-skip-link', false ) ); ?></a>

		<?php do_action( 'ocean_before_wrap' ); ?>

		<div id="wrap" class="clr">

			<?php do_action( 'ocean_top_bar' ); ?>

			<?php do_action( 'ocean_header' ); ?>

			<?php do_action( 'ocean_before_main' ); ?>

			<main id="main" class="site-main clr"<?php oceanwp_schema_markup( 'main' ); ?> role="main">

				<?php /* do_action( 'ocean_page_header' ); */ ?>


				<div id="site-logo" class="<?php echo esc_attr( oceanwp_header_logo_classes() ); ?>"<?php oceanwp_schema_markup( 'logo' ); ?> >
				
		<div id="site-logo-inner" class="clr" >
			<?php the_custom_logo(); ?>
</div>
		</div>

	<?php
  		wp_nav_menu(array(
    	'theme_location' => 'primary',
    	'container' => 'nav',
    	'container_class' => 'main-menu',
    	'menu_class' => 'nav-menu',
  ));
?>

