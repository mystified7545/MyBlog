<?php
/**
 * CPT Custom Icon.
 *
 * @package   FSCPTCustomIcon_Admin
 * @author    Firdaus Zahari <firdaus@fsylum.net>
 * @license   GPL-2.0+
 * @link      http://fsylum.net
 * @copyright 2014 Firdaus Zahari
 */

class FSCPTCustomIcon_Admin {

    /**
     * Plugin version, used for cache-busting of style and script file references.
     *
     * @since   1.0.0
     *
     * @var     string
     */
    const VERSION = '1.0.0';

    /**
     * The variable name is used as the text domain when internationalizing strings
     * of text. Its value should match the Text Domain file header in the main
     * plugin file.
     *
     * @since    1.0.0
     *
     * @var      string
     */
    protected $plugin_slug = 'fs-cpt-custom-icon';

	/**
	 * Instance of this class.
	 *
	 * @since    1.0.0
	 *
	 * @var      object
	 */
	protected static $instance = null;

	/**
	 * Slug of the plugin screen.
	 *
	 * @since    1.0.0
	 *
	 * @var      string
	 */
	protected $plugin_screen_hook_suffix = null;

    /**
     * Stored options for this plugin.
     *
     * @since    1.0.0
     *
     * @var      array
     */
    protected $options;

    /**
     * Slug of the plugin options name.
     *
     * @since    1.0.0
     *
     * @var      string
     */
    protected $options_name = 'fs-cpt-custom-icon-opts';

    /**
     * Slug of the plugin settings name.
     *
     * @since    1.0.0
     *
     * @var      string
     */
    protected $settings_name = 'fs-cpt-custom-icon-settings';

	/**
	 * Initialize the plugin by loading admin scripts & styles and adding a
	 * settings page and menu.
	 *
	 * @since     1.0.0
	 */
	private function __construct() {

        // Get existing option if any
        $this->options = get_option( $this->options_name );

        // Activate plugin when new blog is added
        add_action( 'wpmu_new_blog', array( $this, 'activate_new_site' ) );

		// Load admin style sheet and JavaScript.
		add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_admin_styles' ) );
		add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_admin_scripts' ) );

		// Add the options page and menu item.
        add_action( 'admin_menu', array( $this, 'add_plugin_admin_menu' ) );

        // Register settings
		add_action( 'admin_init', array( $this, 'register_settings' ) );

		// Add an action link pointing to the options page.
		$plugin_basename = plugin_basename( plugin_dir_path( __DIR__ ) . $this->plugin_slug . '.php' );
		add_filter( 'plugin_action_links_' . $plugin_basename, array( $this, 'add_action_links' ) );

        // Modify the post type arguments
		add_action( 'registered_post_type', array( $this, 'registered_post_type' ), 10, 2 );
	}

	/**
	 * Return an instance of this class.
	 *
	 * @since     1.0.0
	 *
	 * @return    object    A single instance of this class.
	 */
	public static function get_instance() {

		// If the single instance hasn't been set, set it now.
		if ( null == self::$instance ) {
			self::$instance = new self;
		}

		return self::$instance;
	}

    /**
     * Fired when the plugin is activated.
     *
     * @since    1.0.0
     *
     * @param    boolean    $network_wide    True if WPMU superadmin uses
     *                                       "Network Activate" action, false if
     *                                       WPMU is disabled or plugin is
     *                                       activated on an individual blog.
     */
    public static function activate( $network_wide ) {

        if ( function_exists( 'is_multisite' ) && is_multisite() ) {

            if ( $network_wide  ) {

                // Get all blog ids
                $blog_ids = self::get_blog_ids();

                foreach ( $blog_ids as $blog_id ) {

                    switch_to_blog( $blog_id );
                    self::single_activate();
                }

                restore_current_blog();

            } else {
                self::single_activate();
            }

        } else {
            self::single_activate();
        }

    }

    /**
     * Fired when the plugin is deactivated.
     *
     * @since    1.0.0
     *
     * @param    boolean    $network_wide    True if WPMU superadmin uses
     *                                       "Network Deactivate" action, false if
     *                                       WPMU is disabled or plugin is
     *                                       deactivated on an individual blog.
     */
    public static function deactivate( $network_wide ) {

        if ( function_exists( 'is_multisite' ) && is_multisite() ) {

            if ( $network_wide ) {

                // Get all blog ids
                $blog_ids = self::get_blog_ids();

                foreach ( $blog_ids as $blog_id ) {

                    switch_to_blog( $blog_id );
                    self::single_deactivate();

                }

                restore_current_blog();

            } else {
                self::single_deactivate();
            }

        } else {
            self::single_deactivate();
        }

    }

    /**
     * Fired when a new site is activated with a WPMU environment.
     *
     * @since    1.0.0
     *
     * @param    int    $blog_id    ID of the new blog.
     */
    public function activate_new_site( $blog_id ) {

        if ( 1 !== did_action( 'wpmu_new_blog' ) ) {
            return;
        }

        switch_to_blog( $blog_id );
        self::single_activate();
        restore_current_blog();

    }

    /**
     * Get all blog ids of blogs in the current network that are:
     * - not archived
     * - not spam
     * - not deleted
     *
     * @since    1.0.0
     *
     * @return   array|false    The blog ids, false if no matches.
     */
    private static function get_blog_ids() {

        global $wpdb;

        // get an array of blog ids
        $sql = "SELECT blog_id FROM $wpdb->blogs
            WHERE archived = '0' AND spam = '0'
            AND deleted = '0'";

        return $wpdb->get_col( $sql );

    }

    /**
     * Fired for each blog when the plugin is activated.
     *
     * @since    1.0.0
     */
    private static function single_activate() {}

    /**
     * Fired for each blog when the plugin is deactivated.
     *
     * @since    1.0.0
     */
    private static function single_deactivate() {}

	/**
	 * Register and enqueue admin-specific style sheet.
	 *
	 * @since     1.0.0
	 *
	 * @return    null    Return early if no settings page is registered.
	 */
	public function enqueue_admin_styles() {

		if ( ! isset( $this->plugin_screen_hook_suffix ) ) {
			return;
		}

		$screen = get_current_screen();
		if ( $this->plugin_screen_hook_suffix == $screen->id ) {
			wp_enqueue_style( $this->plugin_slug .'-admin-styles', plugins_url( 'assets/css/dashicons-picker.css', __FILE__ ), array(), self::VERSION );
		}

	}

	/**
	 * Register and enqueue admin-specific JavaScript.
	 *
	 * @since     1.0.0
	 *
	 * @return    null    Return early if no settings page is registered.
	 */
	public function enqueue_admin_scripts() {

		if ( ! isset( $this->plugin_screen_hook_suffix ) ) {
			return;
		}

		$screen = get_current_screen();
		if ( $this->plugin_screen_hook_suffix == $screen->id ) {
			wp_enqueue_script( $this->plugin_slug . '-admin-script', plugins_url( 'assets/js/dashicons-picker.js', __FILE__ ), array( 'jquery' ), self::VERSION );
		}

	}

	/**
	 * Register the administration menu for this plugin into the WordPress Dashboard menu.
	 *
	 * @since    1.0.0
	 */
	public function add_plugin_admin_menu() {

		/*
		 * Add a settings page for this plugin to the Settings menu.
		 *
		 * NOTE:  Alternative menu locations are available via WordPress administration menu functions.
		 *
		 *        Administration Menus: http://codex.wordpress.org/Administration_Menus
		 */
		$this->plugin_screen_hook_suffix = add_options_page(
			__( 'CPT Custom Icon Settings', $this->plugin_slug ),
			__( 'CPT Custom Icon Settings', $this->plugin_slug ),
			'manage_options',
			$this->plugin_slug,
			array( $this, 'display_plugin_admin_page' )
		);

	}

	/**
	 * Render the settings page for this plugin.
	 *
	 * @since    1.0.0
	 */
	public function display_plugin_admin_page() {
		include_once( 'views/admin.php' );
	}

	/**
	 * Add settings action link to the plugins page.
	 *
	 * @since    1.0.0
	 */
	public function add_action_links( $links ) {

		return array_merge(
			array(
				'settings' => '<a href="' . admin_url( 'options-general.php?page=' . $this->plugin_slug ) . '">' . __( 'Settings', $this->plugin_slug ) . '</a>'
			),
			$links
		);

	}

    /**
     * Register all plugin settings
     * @return null
     */
    public function register_settings() {

        register_setting( $this->settings_name, $this->options_name );
        add_settings_section( $this->settings_name . '-main', '', array( $this, 'add_settings_section_main_cb' ), $this->plugin_slug );

        $post_types = $this->get_post_types();

        foreach( $post_types as $post_type ) {

            $post_obj = get_post_type_object( $post_type );
            $args['post_type'] = $post_type;

            if( ! $this->options ) {
                $args['old_icon'] = $post_obj->menu_icon;
            }

            add_settings_field( $this->settings_name . '-' . $post_type, $post_obj->labels->name, array( $this, 'settings_field_cb' ), $this->plugin_slug, $this->settings_name . '-main', $args );
        }
    }

    /**
     * Callback function for `add_settings_section`
     * @return null
     */
    public function add_settings_section_main_cb() {}

    /**
     * Callback functions for `add_settings_field`
     * @param  array $args Callback arguments
     * @return null
     */
    public function settings_field_cb( $args ) {

        extract( $args );

        $field_value = ( isset( $this->options[ $post_type ]['new_icon'] ) ) ? $this->options[ $post_type ]['new_icon'] : '';

        echo "<input type='text' id='dashicons_picker_{$post_type}' name='{$this->options_name}[{$post_type}][new_icon]' value='{$field_value}'>";
        echo "<input type='button' data-target='#dashicons_picker_{$post_type}' class='button dashicons-picker' value='Choose Icon'>";

        if( ! $this->options ) {
            echo "<input type='hidden' name='{$this->options_name}[{$post_type}][old_icon]' value='$old_icon'>";
        }
    }

    /**
     * Get all post types excluding the builtin
     * @return array Post types
     */
    public function get_post_types() {
        $post_types = get_post_types( array( '_builtin' => false ) );
        return $post_types;
    }

    /**
     * Run on `registered_post_type` hook
     * @param  string $post_type Post type
     * @param  object $args      Post type args
     * @return null
     */
    public function registered_post_type( $post_type, $args ) {

        if( ! $this->options ) {
            return;
        }

        $post_types = $this->get_post_types();

        if( in_array( $post_type, $post_types ) && ! empty( $this->options[ $post_type ]['new_icon'] ) ) {
            global $wp_post_types;
            $args->menu_icon = $this->options[ $post_type ]['new_icon'];
            $wp_post_types[ $post_type ] = $args;
        }
    }
}