<?php
/**
 * Displays footer site info
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since Twenty Seventeen 1.0
 * @version 1.0
 */

?>
<div class="site-info">
	<?php
	if ( function_exists( 'the_privacy_policy_link' ) ) {
		the_privacy_policy_link( '', '<span role="separator" aria-hidden="true"></span>' );
	}

	// The custom footer text set by the website admin in the Theme Settings page
	$custom_footer_text = get_option('custom_footer_text');

	/**
	* Displays the custom footer text set by the website admin in the website footer.
	*
	* If no custom footer text is set, the theme's default footer text is displayed instead
	*/
	if (strlen($custom_footer_text) > 0) {
		echo '<span class="imprint">' . get_option('custom_footer_text') . '</span>';
	} else {
		?>
		<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'twentyseventeen' ) ); ?>" class="imprint">
			<?php
			/* translators: %s: WordPress */
			printf( __( 'Proudly powered by %s', 'twentyseventeen' ), 'WordPress' );
			?>
		</a>
		<?php
	}
	?>
</div><!-- .site-info -->
