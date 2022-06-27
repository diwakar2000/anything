<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package butter
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'butter' ); ?></a>

	<header class="header headr-style-2"> 
    	<!-- Menu -->
		<div class="navbar yamm navbar-default">
		<div class="container">
			<div class="navbar-header">
			<button type="button" data-toggle="collapse" data-target="#navbar-collapse-1" class="navbar-toggle"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
			<a href="/" class="navbar-brand logo"></a> </div>

			<div id="navbar-collapse-1" class="navbar-collapse collapse pull-right dark-color nopadding">
			<?php
				wp_nav_menu( array(
					'theme_location' => 'menu-1',
					'container' => 'nav',
					'menu_class' => 'nav navbar-nav',
					'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
				) ); 
			?>
			<div class="search-box no-display-phone">
				<form class="navbar-form" role="search">
				<div class="input-group">
					<input type="text" class="form-control" placeholder="Search here...!">
					<span class="input-group-btn">
					<button type="reset" class="btn btn-default"><span class="fa fa-close"> <span class="sr-only">Close</span></span></button>
					<button type="submit" class="btn btn-default"><span class="fa fa-search"> <span class="sr-only">Search here...!</span></span></button>
					</span></div>
				</form>
			</div>
			</div>
		</div>
		</div>
	</header>
  <!-- end Header --> 

  	<?php if(is_home()): ?>
		<div class="page-header four">
			<div class="container">
			<div class="col-md-6 left-padd0">
				<h3 class="font45 font-white uppercase">Blog Standard</h3>
				<h4 class="font18 font-white font-thin m-top1">News and Events</h4>
			</div>
			<div class="col-md-6">
				<div class="breadcrumbs"><a href="index.html">Home</a> <i>/</i> Blog</div>
			</div>
			</div>
		</div>
		<?php endif ?>
