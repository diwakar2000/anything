<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package butter
 */

get_header();
?>

	<main id="primary" class="site-main">
	<div class="section-lg m-top8">
    	<div class="container">
      <div class="row">
      <div class="col-md-9 left-padd0">
		<?php
		if ( have_posts() ) :

			if ( is_home() && ! is_front_page() ) :
				?>
				<header>
					<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
				</header>
				<?php
			endif;

			/* Start the Loop */
			while ( have_posts() ) :

				the_post();

				?>
				<div class="col-md-12">
					<?php
					if ( has_post_thumbnail() ) {
						the_post_thumbnail();
					}
					?>
					<h3 class="m-bottom2 m-top4 font-thin font30"><?php the_title(); ?></h3>
					<p><?php the_excerpt(); ?></p>
					<div class="post-info m-top2 m-bottom5"><i class="fa fa-user"></i> <a href="#">By John Doe</a> on 18 Nov 2015, 10:30AM <span class="pull-right"><i class="fa fa-comments"></i> <a href="#">2456</a> &nbsp;/&nbsp; <a href="#">Business</a> - <a href="#">UX</a> - <a href="#">Web Design</a> - <a href="#">UI</a> - <a href="#">Social Media</a></span> </div>
				</div>
				<?php

				/*
				 * Include the Post-Type-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
				 */
				// get_template_part( 'template-parts/content', get_post_type() );

			endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

		</div>
    </div>
  </div>
	</div>
	</main><!-- #main -->

<?php
get_sidebar();
get_footer();
