<?php
/* Template name: Simple page */

get_header(); ?>

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

				<div class="row">

					<div class="eightcol" id='content'>

						<?php if ( ! is_front_page() ) { ?>
							<h1><?php the_title(); ?></h1>
						<?php } ?>				
							
							<?php the_content(); ?>
	
							<?php if ( (comments_open() || have_comments()) && $commentariatGOVUK_options['radio_commentlayout_input'] == "traditional") : ?>
								<div id='comments'>
									<?php comments_template( '', true ); ?>
								</div>						
							<?php endif; ?>

					</div>

					<div class="fourcol last clearfix" id='sidebar'>

							<?php if ( (comments_open() || have_comments()) && $commentariatGOVUK_options['radio_commentlayout_input'] == "sidebar") : ?>
							<li>
		
								<div id='comments'>
									<?php comments_template( '', true ); ?>
								</div>
							
							</li>
							<?php endif; ?>
							
							<ul class="xoxo">
							<?php if (is_home() || is_front_page()) : ?>
								<?php dynamic_sidebar( 'home-sidebar-widget-area' ); ?>
							<?php else : ?>
								<?php dynamic_sidebar( 'inside-sidebar-widget-area' ); ?>
							<?php endif; ?>
						</ul>
						
					</div>

				</div>

<?php endwhile; ?>

<?php get_footer(); ?>