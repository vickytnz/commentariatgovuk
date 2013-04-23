<?php
/* Template name: No sidebar */

get_header(); ?>

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

				<div class="row">

					<div class="twocol" id='toc'>

						<ul class="xoxo">
						<?php dynamic_sidebar('toc-widget-area');  ?>
						</ul>
						
					</div>

					<div class="tencol last" id='content'>

						<?php if ( ! is_front_page() ) { ?>
							<h1><?php the_title(); ?></h1>
						<?php } ?>				
							
							<?php if (comments_open()) : ?>
								<p class='jumptocomments'>So far, <?php comments_number( 'there are no comments', 'there is one comment', 'there are % comments' ); ?> on this section. <a href='#comments'>Jump to comments</a></p>
							<?php endif; ?>
							
							<?php the_content(); ?>
	
							<p class='printfriendly'>This page reformats automatically when printed. <a href='#' onclick='window.print();'>Print this section</a></p>
	
							<?php if ( (comments_open() || have_comments()) ) : ?>
								<div id='comments'>
									<?php comments_template( '', true ); ?>
								</div>						
							<?php endif; ?>

					</div>

				</div>

<?php endwhile; ?>

<?php get_footer(); ?>