<?php

add_action( 'admin_init', 'theme_options_init' );
add_action( 'admin_menu', 'theme_options_add_page' );

/**
 * Init plugin options to white list our options
 */
function theme_options_init(){
	register_setting( 'commentariatGOVUK_options', 'commentariatGOVUK_theme_options', 'theme_options_validate' );
}

/**
 * Load up the menu page
 */
function theme_options_add_page() {
	add_theme_page( __( 'Commentariat Options' ), __( 'Commentariat Options' ), 'edit_theme_options', 'theme_options', 'theme_options_do_page' );
}

/**
 * Create arrays for our select and radio options
 */

$radio_commentlayout_options = array(
	'traditional' => array(
		'value' => 'traditional',
		'label' => __( 'Traditional (comment form under main text at the bottom of the page)' )
	),
	'sidebar' => array(
		'value' => 'sidebar',
		'label' => __( 'Sidebar (comment form in sidebar of page)' )
	)
);

/**
 * Create the options page
 */
function theme_options_do_page() {
	global $radio_commentlayout_options; // comment layout

	if ( ! isset( $_REQUEST['updated'] ) )
		$_REQUEST['updated'] = false;

	?>
	<div class="wrap">
		<?php screen_icon(); echo "<h2>CommentariatGOVUK" . __( ' Options' ) . "</h2>"; ?>

		<?php if ( false !== $_REQUEST['settings-updated'] ) : ?>
		<div class="updated fade"><p><strong><?php _e( 'Options saved' ); ?></strong></p></div>
		<?php endif; ?>

		<script type="text/javascript" src='http://www.helpfultechnology.com/assets/jscolor/jscolor.js'></script>
		
		<form method="post" action="options.php">
			<?php settings_fields( 'commentariatGOVUK_options' ); ?>
			<?php $options = get_option( 'commentariatGOVUK_theme_options' ); ?>

			<table class="form-table">

				<!-- comment layout options floating v traditional -->

				<tr valign="top"><th scope="row"><?php _e( 'Comment form layout' ); ?></th>
					<td>
						<fieldset><legend class="screen-reader-text"><span><?php _e( 'Comment form layout' ); ?></span></legend>
						<?php
							$checked = null;
							if ( ! isset( $checked ) )
								$checked = '';
							foreach ( $radio_commentlayout_options as $option ) {
								$radio_setting = $options['radio_commentlayout_input'];

								if ( '' != $radio_setting ) {
									if ( $options['radio_commentlayout_input'] == $option['value'] ) {
										$checked = "checked=\"checked\"";
									} else {
										$checked = '';
									}
								}
								?>
								<label class="description"><input type="radio" name="commentariatGOVUK_theme_options[radio_commentlayout_input]" value="<?php esc_attr_e( $option['value'] ); ?>" <?php echo $checked; ?> /> <?php echo $option['label']; ?></label><br />
								<?php
							}
						?>
						</fieldset>
					</td>
				</tr>

				<!-- -->

				<!-- shaded box background colour -->

				<tr valign="top"><th scope="row"><?php _e( 'Shaded box colour' ); ?></th>
					<td>
						<input id="commentariatGOVUK_theme_options[boxcolour]" class="regular-text color {adjust:false}" type="text" name="commentariatGOVUK_theme_options[boxcolour]" value="<?php esc_attr_e( $options['boxcolour'] ); ?>" />
						<label class="description" for="commentariatGOVUK_theme_options[boxcolour]"><?php _e( 'Background colour for shaded boxes' ); ?></label>
					</td>
				</tr>
				
				<!-- -->

				<!-- header text and bold line colour -->

				<tr valign="top"><th scope="row"><?php _e( 'Header text and bold line colour' ); ?></th>
					<td>
						<input id="commentariatGOVUK_theme_options[headercolour]" class="regular-text color {adjust:false}" type="text" name="commentariatGOVUK_theme_options[headercolour]" value="<?php esc_attr_e( $options['headercolour'] ); ?>" />
						<label class="description" for="commentariatGOVUK_theme_options[headercolour]"><?php _e( 'Header text and bold line colour' ); ?></label>
					</td>
				</tr>
				
				<!-- -->

				<!-- organisation name -->

				<tr valign="top"><th scope="row"><?php _e( 'Organisation name' ); ?></th>
					<td>
						<input id="commentariatGOVUK_theme_options[organisation_name]" class="regular-text" type="text" name="commentariatGOVUK_theme_options[organisation_name]" value="<?php esc_attr_e( $options['organisation_name'] ); ?>" />
						<label class="description" for="commentariatGOVUK_theme_options[organisation_name]"><?php _e( 'Organisation name (shown alongside coat of arms' ); ?></label>
					</td>
				</tr>
				
				<!-- -->

				<!-- URL to organisation (link from organisation name) -->

				<tr valign="top"><th scope="row"><?php _e( 'Organisation URL' ); ?></th>
					<td>
						<input id="commentariatGOVUK_theme_options[organisation_url]" class="regular-text" type="text" name="commentariatGOVUK_theme_options[organisation_url]" value="<?php esc_attr_e( $options['organisation_url'] ); ?>" />
						<label class="description" for="commentariatGOVUK_theme_options[organisation_url]"><?php _e( 'Link destination from organisation name' ); ?></label>
					</td>
				</tr>
				
				<!-- -->

				<!-- title label for comment form -->

				<tr valign="top"><th scope="row"><?php _e( 'Label for Comment form' ); ?></th>
					<td>
						<input id="commentariatGOVUK_theme_options[comment_form_label]" class="regular-text" type="text" name="commentariatGOVUK_theme_options[comment_form_label]" value="<?php esc_attr_e( $options['comment_form_label'] ); ?>" />
						<label class="description" for="commentariatGOVUK_theme_options[comment_form_label]"><?php _e( 'Title shown above Comment form' ); ?></label>
					</td>
				</tr>
				
				<!-- -->

				<!-- 	Google Analytics tracking code -->
	
				<tr valign="top"><th scope="row"><?php _e( 'Google Analytics tracking code' ); ?></th>
					<td>
						<textarea id="commentariatGOVUK_theme_options[analyticscode]" class="large-text" cols="50" rows="10" name="commentariatGOVUK_theme_options[analyticscode]"><?php echo stripslashes( $options['analyticscode'] ); ?></textarea>
						<label class="description" for="commentariatGOVUK_theme_options[analyticscode]"><?php _e( 'Tracking code for analytics' ); ?></label>
					</td>
				</tr>

				<!-- -->

				<!-- 	Custom CSS  -->
	
				<tr valign="top"><th scope="row"><?php _e( 'Advanced: custom CSS rules' ); ?></th>
					<td>
						<textarea id="commentariatGOVUK_theme_options[customcss]" class="large-text" cols="50" rows="10" name="commentariatGOVUK_theme_options[customcss]"><?php echo stripslashes( $options['customcss'] ); ?></textarea>
						<label class="description" for="commentariatGOVUK_theme_options[customcss]"><?php _e( 'Custom CSS rules (advanced users only)' ); ?></label>
					</td>
				</tr>

				<!-- -->

			</table>

			<p class="submit">
				<input type="submit" class="button-primary" value="<?php _e( 'Save Options' ); ?>" />
			</p>
		</form>
	</div>
	<?php
}

/**
 * Sanitize and validate input. Accepts an array, return a sanitized array.
 */
function theme_options_validate( $input ) {
	global $radio_commentlayout_options; // comment layout

	// Our radio option must actually be in our array of radio options
	if ( ! isset( $input['radio_commentlayout_input'] ) )
		$input['radio_commentlayout_input'] = null;
	if ( ! array_key_exists( $input['radio_commentlayout_input'], $radio_commentlayout_options ) )
		$input['radio_commentlayout_input'] = null;


	// Say our textarea option must be safe text with the allowed tags for posts
	// $input['analyticscode'] = wp_filter_post_kses( $input['analyticscode'] ); // disabled, as we want to allow any code there

	return $input;
}

// adapted from http://planetozh.com/blog/2009/05/handling-plugins-options-in-wordpress-28-with-register_setting/