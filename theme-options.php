<?php

add_action( 'admin_init', 'ors_theme_options_init' );
add_action( 'admin_menu', 'ors_theme_options_add_page' );

/**
 * Init plugin options to white list our options
 */
function ors_theme_options_init() {
	register_setting( 'ors_options', 'ors_theme_options', 'ors_theme_options_validate' );
}

/**
 * Load up the menu page
 */
function ors_theme_options_add_page() {
	add_theme_page( __( 'Theme Options', 'orstheme' ), __( 'Theme Options', 'orstheme' ), 'edit_theme_options', 'theme_options', 'theme_options_do_page' );
}

/**
 * Create arrays for our select and radio options
 */
$select_options = array(
	'2' => array(
		'value' => '2',
		'label' => __( 'Two', 'orstheme' )
	),
	'3' => array(
		'value' => '3',
		'label' => __( 'Three', 'orstheme' )
	),
	'4' => array(
		'value' => '4',
		'label' => __( 'Four', 'orstheme' )
	),
	'5' => array(
		'value' => '5',
		'label' => __( 'Five', 'orstheme' )
	)
);

$radio_options = array(
	'yes' => array(
		'value' => 'yes',
		'label' => __( 'Yes', 'orstheme' )
	),
	'no' => array(
		'value' => 'no',
		'label' => __( 'No', 'orstheme' )
	)
);

/**
 * Create the options page
 */
function theme_options_do_page() {
	global $select_options, $radio_options;

	if ( ! isset( $_REQUEST['settings-updated'] ) )
		$_REQUEST['settings-updated'] = false;

	?>
	<div class="wrap">
		<?php screen_icon(); echo "<h2>" . get_current_theme() . __( ' Theme Options', 'orstheme' ) . "</h2>"; ?>

		<?php if ( false !== $_REQUEST['settings-updated'] ) : ?>
		<div class="updated fade"><p><strong><?php _e( 'Options saved', 'orstheme' ); ?></strong></p></div>
		<?php endif; ?>

		<form method="post" action="options.php">
			<?php settings_fields( 'ors_options' ); ?>
			<?php $options = get_option( 'ors_theme_options' ); ?>

			<table class="form-table">

				<?php
				/**
				 * A ors checkbox option
				 */
				?>
				<tr valign="top"><th scope="row"><?php _e( 'Use Excerpts in Blog', 'orstheme' ); ?></th>
					<td>
						<input id="ors_theme_options[use_excerpts]" name="ors_theme_options[use_excerpts]" type="checkbox" value="1" <?php checked( '1', $options['use_excerpts'] ); ?> /> Enabled
					</td>
				</tr>

				<?php
				/**
				 * A ors select input option
				 */
				?>
				<tr valign="top"><th scope="row"><?php _e( 'Sidebar Grid Size', 'orstheme' ); ?></th>
					<td>
						<select name="ors_theme_options[grid_size]">
							<?php
								$selected = $options['grid_size'];
								$p = '';
								$r = '';

								foreach ( $select_options as $option ) {
									$label = $option['label'];
									if ( $selected == $option['value'] ) // Make default first in list
										$p = "\n\t<option style=\"padding-right: 10px;\" selected='selected' value='" . esc_attr( $option['value'] ) . "'>$label</option>";
									else
										$r .= "\n\t<option style=\"padding-right: 10px;\" value='" . esc_attr( $option['value'] ) . "'>$label</option>";
								}
								echo $p . $r;
							?>
						</select>
					</td>
				</tr>
			</table>
			<p class="submit">
				<input type="submit" class="button-primary" value="<?php _e( 'Save Options', 'orstheme' ); ?>" />
			</p>
		</form>
	</div>
<?php
}

/**
 * Sanitize and validate input. Accepts an array, return a sanitized array.
 */
function ors_theme_options_validate( $input ) {
	global $select_options, $radio_options;

	// Our checkbox value is either 0 or 1
	if ( ! isset( $input['use_excerpts'] ) )
		$input['use_excerpts'] = null;
	$input['use_excerpts'] = ( $input['use_excerpts'] == 1 ? 1 : 0 );

	// Our select option must actually be in our array of select options
	if ( ! array_key_exists( $input['grid_size'], $select_options ) )
		$input['grid_size'] = null;

	return $input;
}
