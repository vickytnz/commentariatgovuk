<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content
 * after.  Calls sidebar-footer.php for bottom widgets.
 *
 * @package WordPress
 * @subpackage Starkers
 * @since Starkers 3.0
 */
?>

			</div><!-- container -->

			<div class="row" id='footer'>

				<div class='container'>
				
					<div class="eightcol">
	
						<ul class="xoxo">
							<?php dynamic_sidebar( 'left-footer-widget-area' ); ?>
						</ul>
											
					</div>
				
					<div class="fourcol last">
	
						<ul class="xoxo">
							<?php dynamic_sidebar( 'right-footer-widget-area' ); ?>
						</ul>
											
					</div>
				
				</div>
				

			</div>

<!--  other analytics code -->

<?php
	global $commentariatGOVUK_options;
	echo $commentariatGOVUK_options['analyticscode'];
?>
<!--  end other analytics code -->

<script type="text/javascript">

</s

<!-- design & implementation by Helpful Technology http://www.helpfultechnology.com using WordPress -->

<?php
	wp_footer();
?>

<!--[if IE 6]> 
</div>
<![endif]--> 
<!--[if IE 7]> 
</div>
<![endif]--> 
<!--[if IE 8]> 
</div>
<![endif]--> 
<!--[if IE 9]> 
</div>
<![endif]--> 

</body>
</html>