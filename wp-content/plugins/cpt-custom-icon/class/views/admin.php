<?php
/**
 * Represents the view for the administration dashboard.
 *
 * This includes the header, options, and other information that should provide
 * The User Interface to the end user.
 *
 * @package   FSCPTCustomIcon
 * @author    Firdaus Zahari <firdaus@fsylum.net>
 * @license   GPL-2.0+
 * @link      http://fsylum.net
 * @copyright 2014 Firdaus Zahari
 */
?>

<div class="wrap">
	<h2><?php echo esc_html( get_admin_page_title() ); ?></h2>

    <?php if( ! $this->get_post_types() ): ?>
        <p>No custom post types found. Please register at least one custom post type in order to use this plugin.</p>
    <?php else: ?>
        <form action="options.php" method="post">
            <?php settings_fields( $this->settings_name ); ?>
            <?php do_settings_sections( $this->plugin_slug ); ?>
            <p class="submit">
                <input type="submit" name="submit" class="button-primary" value="Save Changes">
            </p>
        </form>
    <?php endif; ?>
</div>
