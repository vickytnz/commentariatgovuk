<?php
/**
 * The Template for displaying all single posts.
 *
 * @package WordPress
 * @subpackage Starkers
 * @since Starkers 3.0
 */

get_header(); ?>

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

		<div class="row">

				<div class="eightcol" id='content'>
					<h1><?php the_title(); ?></h1>

					<p class='postmeta'><?php twentyten_posted_on(); ?></p>

					<?php the_content(); ?>

					<?php if ( (comments_open() || have_comments()) && $commentariatGOVUK_options['radio_commentlayout_input'] == "traditional") : ?>
						<div id='comments'>
							<?php comments_template( '', true ); ?>
						</div>						
					<?php endif; ?>
				
				</div>
				
				<div class="fourcol last" id='sidebar'>

						<ul class="xoxo">

						<?php if ( (comments_open() || have_comments()) && $commentariatGOVUK_options['radio_commentlayout_input'] == "sidebar") : ?>
						<li>
	
							<div id='comments'>
								<?php comments_template( '', true ); ?>
							</div>
						
						</li>
						<?php endif; ?>

							<?php if (is_home() || is_front_page()) : ?>
								<?php dynamic_sidebar( 'home-sidebar-widget-area' ); ?>
							<?php else : ?>
								<?php dynamic_sidebar( 'inside-sidebar-widget-area' ); ?>
							<?php endif; ?>
						</ul>
	
				</div>
	
	</div>


<?php endwhile; // end of the loop. ?>

<?php get_footer(); ?>