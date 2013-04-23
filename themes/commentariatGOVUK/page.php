<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the wordpress construct of pages
 * and that other 'pages' on your wordpress site will use a
 * different template.
 *
 * @package WordPress
 * @subpackage Starkers
 * @since Starkers 3.0
 */

get_header(); 
global $commentariatGOVUK_options;
?>

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

				<div class="row">

					<div class="twocol" id='toc'>

						<ul class="xoxo">
						<?php dynamic_sidebar('toc-widget-area');  ?>
						</ul>
						
					</div>

					<div class="sixcol" id='content'>

						<?php if ( ! is_front_page() ) { ?>
							<h1><?php the_title(); ?></h1>
						<?php } ?>				
							
							<?php if (comments_open()) : ?>
								<p class='jumptocomments'>So far, <?php comments_number( 'there are no comments', 'there is one comment', 'there are % comments' ); ?> on this section. <a href='#comments'>Jump to comments</a></p>
							<?php endif; ?>
							
							<?php the_content(); ?>
	
							<p class='printfriendly'>This page reformats automatically when printed. <a href='#' onclick='window.print();'>Print this section</a></p>

							<?php if ( (comments_open() || have_comments()) && $commentariatGOVUK_options['radio_commentlayout_input'] == "traditional") : ?>
								<div id='comments'>
									<?php comments_template( '', true ); ?>
								</div>						
							<?php endif; ?>
	
					</div>

					<div class="fourcol last clearfix" id='sidebar'>

						<ul class="xoxo">

							<?php if ( (comments_open() || have_comments()) && $commentariatGOVUK_options['radio_commentlayout_input'] == "sidebar") : ?>
							<li>
		
								<div id='comments'>
									<?php comments_template( '', true ); ?>
								</div>
							
							</li>
							<?php endif; ?>
							
						<?php dynamic_sidebar('inside-sidebar-widget-area');  ?>
						</ul>
						
					</div>

				</div>

<?php endwhile; ?>

<?php get_footer(); ?>