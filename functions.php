<?php

  if (!function_exists('twentyseventeenchild_setup')) {
   /**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
    function twentyseventeenchild_setup() {
      /**
      * Enqueues parent theme stylesheet
      */
      function twentyseventeenchild_enqueue_parent_styles() {
        wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css');
      }

      // Enqueue parent theme stylesheet
      add_action('wp_enqueue_scripts', 'twentyseventeenchild_enqueue_parent_styles');


      /**
      * For Theme Settings
      *
      * Creates a settings page for the theme in the WordPress Admin panel
      */

      // The Theme Settings page layout
      function twentyseventeenchild_add_theme_settings() {
        ?>
        <div class="container">
          <h1>Theme Settings</h1>
          <?php settings_errors(); ?>
          <form action="options.php" method="post">
            <?php

            settings_fields('footer_text');
            do_settings_sections('theme-settings');
            submit_button();

            ?>
          </form>
        </div>
        <?php
      }

      // Creates the Theme Settings menu item
      function twentyseventeenchild_create_theme_settings_menu() {
        add_menu_page('Theme Settings', 'Theme Settings', 'manage_options', 'theme-settings', 'twentyseventeenchild_add_theme_settings', 'dashicons-admin-generic', 61);
      }

      add_action('admin_menu', 'twentyseventeenchild_create_theme_settings_menu');

      // Custom footer text field
      function twentyseventeenchild_custom_footer_text_field() {
        ?>
        <input type="text" name="custom_footer_text" class="regular-text ltr" id="custom-footer-text" value="<?php echo esc_attr(get_option('custom_footer_text')); ?>" placeholder="<?php printf( __( 'Proudly powered by %s', 'twentyseventeen' ), 'WordPress' ); ?>">
        <?php
      }

      // Adds the settings section of Theme Settings page
      function twentyseventeenchild_add_theme_settings_section() {
        add_settings_section('footer_text', 'Footer Text', null, 'theme-settings');

        register_setting('footer_text', 'custom_footer_text');

        add_settings_field('custom-footer-text', 'Custom Footer Text', 'twentyseventeenchild_custom_footer_text_field', 'theme-settings', 'footer_text');
      }

      add_action('admin_init', 'twentyseventeenchild_add_theme_settings_section');
    }

    add_action('after_setup_theme', 'twentyseventeenchild_setup');
  }

?>
