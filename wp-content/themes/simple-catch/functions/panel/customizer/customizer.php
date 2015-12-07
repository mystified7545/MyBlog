<?php
/**
 * Simple Catch Customizer/Theme Options
 *
 * @package Catch Themes
 * @subpackage Simple Catch
 * @since Simple Catch 3.0
 */

/**
 * Implements Simple Catch theme options into Theme Customizer.
 *
 * @param $wp_customize Theme Customizer object
 * @return void
 *
 * @since Simple Catch 3.0
 */
function simplecatch_customize_register( $wp_customize ) {
	global $simplecatch_options_settings, $simplecatch_options_defaults;
    
    $options = $simplecatch_options_settings;

	$defaults = $simplecatch_options_defaults;

	//Custom Controls
	require get_template_directory() . '/functions/panel/customizer/customizer-custom-controls.php';

	$theme_slug = 'simplecatch_';
	
	$settings_page_tabs = array(
		'theme_options' => array(
			'id' 			=> 'theme_options',
			'title' 		=> __( 'Theme Options', 'simple-catch' ),
			'description' 	=> __( 'Basic theme Options', 'simple-catch' ),
			'sections' 		=> array(
				'favicon' => array(
					'id' 			=> 'favicon',
					'title' 		=> __( 'Favicon', 'simple-catch' ),
					'description' 	=> '',
				),
				'web_clip_icon_options' => array(
					'id' 			=> 'web_clip_icon_options',
					'title' 		=> __( 'Webclip Icon Options', 'simple-catch' ),
					'description' 	=> __( 'Web Clip Icon for Apple devices. Recommended Size - Width 144px and Height 144px height, which will support High Resolution Devices like iPad Retina', 'simple-catch' )
				),
				'default_layout' => array(
					'id' 			=> 'default_layout',
					'title' 		=> __( 'Default Layout', 'simple-catch' ),
					'description' 	=> '',
				),	
				'homepage_frontpage_settings' => array(
					'id' 			=> 'homepage_frontpage_settings',
					'title' 		=> __( 'Homepage / Frontpage Category Setting', 'simple-catch' ),
					'description' 	=> '',
				),
				'search_text_settings' => array(
					'id' 			=> 'search_text_settings',
					'title' 		=> __( 'Search Text Settings', 'simple-catch' ),
					'description' 	=> '',
				),
				'excerpt_more_tag_settings' => array(
					'id' 			=> 'excerpt_more_tag_settings',
					'title' 		=> __( 'Excerpt / More Tag Settings', 'simple-catch' ),
					'description' 	=> '',
				),
				'feed_redirect' => array(
					'id' 			=> 'feed_redirect',
					'title' 		=> __( 'Feed Redirect', 'simple-catch' ),
					'description' 	=> '',
				),	
				'custom_css' => array(
					'id' 			=> 'custom_css',
					'title' 		=> __( 'Custom CSS', 'simple-catch' ),
					'description' 	=> '',
				),

			),
		),

		'featured_post_slider' => array(
			'id' 			=> 'featured_post_slider',
			'title' 		=> __( 'Featured Post Slider', 'simple-catch' ),
			'description' 	=> __( 'Featured Post Slider', 'simple-catch' ),
			'sections' 		=> array(
				'add_slider_options' => array(
					'id' 			=> 'add_slider_options',
					'title' 		=> __( 'Add Slider Options', 'simple-catch' ),
					'description' 	=> '',
				),
				'slider_effect_options' => array(
					'id' 			=> 'slider_effect_options',
					'title' 		=> __( 'Slider Effect Options', 'simple-catch' ),
					'description' 	=> '',
				),
			)
		),
	);

	//Add Panels and sections
	foreach ( $settings_page_tabs as $panel ) {
		$wp_customize->add_panel(
			$theme_slug . $panel['id'], 
			array(
				'priority' 		=> 200,
				'capability' 	=> 'edit_theme_options',
				'title' 		=> $panel['title'],
				'description' 	=> $panel['description'],
			) 
		);

		// Loop through tabs for sections
		foreach ( $panel['sections'] as $section ) {
			$params = array(
								'title'			=> $section['title'],
								'description'	=> $section['description'],
								'panel'			=> $theme_slug . $panel['id']
							);

			if ( isset( $section['active_callback'] ) ) {
				$params['active_callback'] = $section['active_callback'];
			}

			$wp_customize->add_section(
				// $id
				$theme_slug . $section['id'],
				// parameters
				$params
				
			);
		}
	}

	$wp_customize->add_section(
		// $id
		$theme_slug . 'social_links',
		// parameters
		array(
			'priority'	=> 201,
			'title' => __( 'Social Links', 'simple-catch' ),
		)
		
	);

	$wp_customize->add_section(
		// $id
		$theme_slug . 'webmaster_tools',
		// parameters
		array(
			'priority'	=> 202,
			'title' 		=> __( 'Webmaster Tools', 'simple-catch' ),
			'description' 	=>  sprintf( __( 'Webmaster Tools falls under Plugins Territory according to Theme Review Guidelines in WordPress.org. This feature will be depreciated in future versions from Catch Box free version. If you want this feature, then you can add <a target="_blank" href="%s">Catch Web Tools</a>  plugin.', 'simple-catch' ), esc_url( 'https://wordpress.org/plugins/catch-web-tools/' ) ),
		)
		
	);

	$settings_parameters = array(
		//Header Logo Options
		'featured_logo_header' => array(
			'id' 				=> 'featured_logo_header',
			'title' 			=> __( 'Header Logo', 'simple-catch' ),
			'description'		=> '',
			'field_type' 		=> 'image',
			'sanitize' 			=> 'simplecatch_sanitize_image',
			'section' 			=> 'title_tagline',
			'default' 			=> $defaults['featured_logo_header'],
		),
		'remove_header_logo' => array(
			'id' 				=> 'remove_header_logo',
			'title' 			=> __( 'Check to Disable Site Title', 'simple-catch' ),
			'description'		=> '',
			'field_type' 		=> 'checkbox',
			'sanitize' 			=> 'simplecatch_sanitize_checkbox',
			'section' 			=> 'title_tagline',
			'default' 			=> $defaults['remove_header_logo'],
		),
		'remove_site_title' => array(
			'id' 				=> 'remove_site_title',
			'title' 			=> __( 'Check to Disable Header Logo', 'simple-catch' ),
			'description'		=> '',
			'field_type' 		=> 'checkbox',
			'sanitize' 			=> 'simplecatch_sanitize_checkbox',
			'section' 			=> 'title_tagline',
			'default' 			=> $defaults['remove_site_title'],
		),
		'remove_site_description' => array(
			'id' 				=> 'remove_site_description',
			'title' 			=> __( 'Check to Disable Site Description', 'simple-catch' ),
			'description'		=> '',
			'field_type' 		=> 'checkbox',
			'sanitize' 			=> 'simplecatch_sanitize_checkbox',
			'section' 			=> 'title_tagline',
			'default' 			=> $defaults['remove_site_description'],
		),
		'featured_logo_footer' => array(
			'id' 				=> 'featured_logo_footer',
			'title' 			=> __( 'Footer Logo', 'simple-catch' ),
			'description'		=> '',
			'field_type' 		=> 'image',
			'sanitize' 			=> 'simplecatch_sanitize_image',
			'section' 			=> 'title_tagline',
			'default' 			=> $defaults['featured_logo_footer'],
		),
		'remove_footer_logo' => array(
			'id' 				=> 'remove_footer_logo',
			'title' 			=> __( 'Check to Disable Footer Logo', 'simple-catch' ),
			'description'		=> '',
			'field_type' 		=> 'checkbox',
			'sanitize' 			=> 'simplecatch_sanitize_checkbox',
			'section' 			=> 'title_tagline',
			'default' 			=> $defaults['remove_footer_logo'],
		),

		//Color Scheme
		'color_scheme' => array(
			'id' 			=> 'color_scheme',
			'title' 		=> __( 'Default Color Scheme', 'simple-catch' ),
			'description'	=> '',
			'field_type' 	=> 'radio',
			'sanitize' 		=> 'simplecatch_sanitize_select',
			'section' 		=> 'colors',
			'default' 		=> $defaults['color_scheme'],
			'choices'		=> simplecatch_color_schemes(),
		),
		'heading_color' => array(
			'id' 			=> 'heading_color',
			'title' 		=> __( 'Heading Color', 'simple-catch' ),
			'description'	=> '',
			'field_type' 	=> 'color',
			'sanitize' 		=> 'sanitize_hex_color',
			'section' 		=> 'colors',
			'default' 		=> $defaults['heading_color'],
		),
		'meta_color' => array(
			'id' 			=> 'meta_color',
			'title' 		=> __( 'Meta Description Color', 'simple-catch' ),
			'description'	=> '',
			'field_type' 	=> 'color',
			'sanitize' 		=> 'sanitize_hex_color',
			'section' 		=> 'colors',
			'default' 		=> $defaults['meta_color'],
		),
		'text_color' => array(
			'id' 			=> 'text_color',
			'title' 		=> __( 'Text Color', 'simple-catch' ),
			'description'	=> '',
			'field_type' 	=> 'color',
			'sanitize' 		=> 'sanitize_hex_color',
			'section' 		=> 'colors',
			'default' 		=> $defaults['text_color'],
		),
		'link_color' => array(
			'id' 			=> 'link_color',
			'title' 		=> __( 'Link Color', 'simple-catch' ),
			'description'	=> '',
			'field_type' 	=> 'color',
			'sanitize' 		=> 'sanitize_hex_color',
			'section' 		=> 'colors',
			'default' 		=> $defaults['link_color'],
		),
		'widget_heading_color' => array(
			'id' 			=> 'widget_heading_color',
			'title' 		=> __( 'Sidebar Widget Heading Color', 'simple-catch' ),
			'description'	=> '',
			'field_type' 	=> 'color',
			'sanitize' 		=> 'sanitize_hex_color',
			'section' 		=> 'colors',
			'default' 		=> $defaults['widget_heading_color'],
		),
		'widget_text_color' => array(
			'id' 			=> 'widget_text_color',
			'title' 		=> __( 'Sidebar Widget Text Color', 'simple-catch' ),
			'description'	=> '',
			'field_type' 	=> 'color',
			'sanitize' 		=> 'sanitize_hex_color',
			'section' 		=> 'colors',
			'default' 		=> $defaults['widget_text_color'],
		),
		'reset_color' => array(
			'id' 			=> 'reset_color',
			'title' 		=> __( 'Check to Reset Color', 'simple-catch' ),
			'description'	=> __( 'Please refresh the customizer after saving if reset option is used', 'simple-catch' ),
			'field_type' 	=> 'checkbox',
			'sanitize' 		=> 'simplecatch_sanitize_reset_color',
			'section' 		=> 'colors',
			'default' 		=> $defaults['reset_color']
		),
		


		//Favicon
		'remove_fav_icon' => array(
			'id' 				=> 'remove_fav_icon',
			'title' 			=> __( 'Check to Disable Favicon', 'simple-catch' ),
			'description'		=> '',
			'field_type' 		=> 'checkbox',
			'sanitize' 			=> 'simplecatch_sanitize_checkbox',
			'panel' 			=> 'theme_options',
			'section' 			=> 'favicon',
			'default' 			=> $defaults['remove_fav_icon'],
			'active_callback'	=> 'simplecatch_is_site_icon_active'
		),
		'fav_icon' => array(
			'id' 				=> 'fav_icon',
			'title' 			=> __( 'Fav Icon', 'simple-catch' ),
			'description'		=> '',
			'field_type' 		=> 'image',
			'sanitize' 			=> 'simplecatch_sanitize_image',
			'panel' 			=> 'theme_options',
			'section' 			=> 'favicon',
			'default' 			=> $defaults['fav_icon'],
			'active_callback'	=> 'simplecatch_is_site_icon_active'
		),

		//Web Clip Icon
		'web_clip' => array(
			'id' 				=> 'web_clip',
			'title' 			=> __( 'Web Clip Icon', 'simple-catch' ),
			'description'		=> '',
			'field_type' 		=> 'image',
			'sanitize' 			=> 'simplecatch_sanitize_image',
			'panel' 			=> 'theme_options',
			'section' 			=> 'web_clip_icon_options',
			'default' 			=> $defaults['web_clip'],
			'active_callback'	=> 'simplecatch_is_site_icon_active'
		),

		//Layout Options
		'sidebar_layout' => array(
			'id' 			=> 'sidebar_layout',
			'title' 		=> __( 'Default Layout', 'simple-catch' ),
			'description'	=> '',
			'field_type' 	=> 'select',
			'sanitize' 		=> 'simplecatch_sanitize_select',
			'panel' 		=> 'theme_options',
			'section' 		=> 'default_layout',
			'default' 		=> $defaults['sidebar_layout'],
			'choices'		=> simplecatch_sidebar_layout_options(),
		),
		
		//Homepage/Frontpage Settings
		'front_page_category' => array(
			'id' 			=> 'front_page_category',
			'title' 		=> __( 'Front page posts categories:', 'simple-catch' ),
			'description'	=> __( 'Only posts that belong to the categories selected here will be displayed on the front page', 'simple-catch' ),
			'field_type' 	=> 'category-multiple',
			'sanitize' 		=> 'simplecatch_sanitize_category_list',
			'panel' 		=> 'theme_options',
			'section' 		=> 'homepage_frontpage_settings',
			'default' 		=> $defaults['front_page_category']
		),

		//Search Settings
		'search_display_text' => array(
			'id' 			=> 'search_display_text',
			'title' 		=> __( 'Default Display Text in Search', 'simple-catch' ),
			'description'	=> '',
			'field_type' 	=> 'text',
			'sanitize' 		=> 'sanitize_text_field',
			'panel' 		=> 'theme_options',
			'section' 		=> 'search_text_settings',
			'default' 		=> $defaults['search_display_text']
		),
		'search_button_text' => array(
			'id' 			=> 'search_button_text',
			'title' 		=> __( 'Search Button\'s text', 'simple-catch' ),
			'description'	=> '',
			'field_type' 	=> 'text',
			'sanitize' 		=> 'sanitize_text_field',
			'panel' 		=> 'theme_options',
			'section' 		=> 'search_text_settings',
			'default' 		=> $defaults['search_button_text']
		),

		//Excerpt More Settings
		'more_tag_text' => array(
			'id' 			=> 'more_tag_text',
			'title' 		=> __( 'More Tag Text', 'simple-catch' ),
			'description'	=> '',
			'field_type' 	=> 'text',
			'sanitize' 		=> 'sanitize_text_field',
			'panel' 		=> 'theme_options',
			'section' 		=> 'excerpt_more_tag_settings',
			'default' 		=> $defaults['more_tag_text']
		),
		'excerpt_length' => array(
			'id' 			=> 'excerpt_length',
			'title' 		=> __( 'Excerpt length(words)', 'simple-catch' ),
			'description'	=> '',
			'field_type' 	=> 'number',
			'sanitize' 		=> 'simplecatch_sanitize_number_range',
			'panel' 		=> 'theme_options',
			'section' 		=> 'excerpt_more_tag_settings',
			'default' 		=> $defaults['excerpt_length'],
			'input_attrs' 	=> array(
					            'style' => 'width: 45px;',
					            'min'   => 0,
					            'max'   => 999999,
					            'step'  => 1,
					        	)
		),
		'feed_url' => array(
			'id' 				=> 'feed_url',
			'title' 			=> __( 'Feed Redirect URL', 'simple-catch' ),
			'description' 		=> __( ' Add in the Feedburner URL', 'simple-catch' ),
			'field_type' 		=> 'url',
			'sanitize' 			=> 'esc_url_raw',
			'panel' 			=> 'theme_options',
			'section' 			=> 'feed_redirect',
			'default' 			=> $defaults['feed_url'],
			'active_callback'	=> 'simplecatch_is_feed_url_present'
		),

		//Custom Css
		'custom_css' => array(
			'id' 			=> 'custom_css',
			'title' 		=> __( 'Enter your custom CSS styles', 'simple-catch' ),
			'description' 	=> '',
			'field_type' 	=> 'textarea',
			'sanitize' 		=> 'simplecatch_sanitize_custom_css',
			'panel' 		=> 'theme_options',
			'section' 		=> 'custom_css',
			'default' 		=> $defaults['custom_css']
		),

		//Featured Post Slider
		'exclude_slider_post' => array(
			'id' 				=> 'exclude_slider_post',
			'title' 			=> __( 'Check to Exclude Slider posts from Homepage posts', 'simple-catch' ),
			'description'		=> '',
			'field_type' 		=> 'checkbox',
			'sanitize' 			=> 'simplecatch_sanitize_checkbox',
			'panel' 			=> 'featured_post_slider',
			'section' 			=> 'add_slider_options',
			'default' 			=> $defaults['exclude_slider_post'],
		),
		'slider_qty' => array(
			'id' 				=> 'slider_qty',
			'title' 			=> __( 'Number of Slides', 'simple-catch' ),
			'description'		=> __( 'Customizer page needs to be refreshed after saving if number of slides is changed', 'simple-catch' ),
			'field_type' 		=> 'number',
			'sanitize' 			=> 'simplecatch_sanitize_number_range',
			'panel' 			=> 'featured_post_slider',
			'section' 			=> 'add_slider_options',
			'default' 			=> $defaults['slider_qty'],
			'input_attrs' 		=> array(
						            'style' => 'width: 45px;',
						            'min'   => 0,
						            'max'   => 20,
						            'step'  => 1,
						        	)
		),

		'remove_noise_effect' => array(
			'id' 				=> 'remove_noise_effect',
			'title' 			=> __( 'Check to Disable Slider Background Effect', 'simple-catch' ),
			'description'		=> '',
			'field_type' 		=> 'checkbox',
			'sanitize' 			=> 'simplecatch_sanitize_checkbox',
			'panel' 			=> 'featured_post_slider',
			'section' 			=> 'slider_effect_options',
			'default' 			=> $defaults['remove_noise_effect'],
		),
		'transition_effect' => array(
			'id' 				=> 'transition_effect',
			'title' 			=> __( 'Transition Effect', 'simple-catch' ),
			'description'		=> '',
			'field_type' 		=> 'select',
			'sanitize' 			=> 'simplecatch_sanitize_select',
			'panel' 			=> 'featured_post_slider',
			'section' 			=> 'slider_effect_options',
			'default' 			=> $defaults['transition_effect'],
			'choices'			=> simplecatch_transition_effects(),
		),
		'transition_delay' => array(
			'id' 				=> 'transition_delay',
			'title' 			=> __( 'Transition Delay', 'simple-catch' ),
			'description'		=> '',
			'field_type' 		=> 'number',
			'sanitize' 			=> 'simplecatch_sanitize_number_range',
			'panel' 			=> 'featured_post_slider',
			'section' 			=> 'slider_effect_options',
			'default' 			=> $defaults['transition_delay'],
			'input_attrs' 		=> array(
						            'style' => 'width: 45px;',
						            'min'   => 0,
						            'max'   => 999999999,
						            'step'  => 1,
						        	)
		),
		'transition_duration' => array(
			'id' 				=> 'transition_duration',
			'title' 			=> __( 'Transition Length', 'simple-catch' ),
			'description'		=> '',
			'field_type' 		=> 'number',
			'sanitize' 			=> 'simplecatch_sanitize_number_range',
			'panel' 			=> 'featured_post_slider',
			'section' 			=> 'slider_effect_options',
			'default' 			=> $defaults['transition_duration'],
			'input_attrs' 		=> array(
						            'style' => 'width: 45px;',
						            'min'   => 0,
						            'max'   => 999999999,
						            'step'  => 1,
						        	)
		),
		

		//Social Links
		'social_facebook' => array(
			'id' 			=> 'social_facebook',
			'title' 		=> __( 'Facebook', 'simple-catch' ),
			'description'	=> '',
			'field_type' 	=> 'url',
			'sanitize' 		=> 'esc_url_raw',
			'section' 		=> 'social_links',
			'default' 		=> $defaults['social_facebook']
		),
		'social_twitter' => array(
			'id' 			=> 'social_twitter',
			'title' 		=> __( 'Twitter', 'simple-catch' ),
			'description'	=> '',
			'field_type' 	=> 'url',
			'sanitize' 		=> 'esc_url_raw',
			'section' 		=> 'social_links',
			'default' 		=> $defaults['social_twitter']
		),
		'social_googleplus' => array(
			'id' 			=> 'social_googleplus',
			'title' 		=> __( 'Google+', 'simple-catch' ),
			'description'	=> '',
			'field_type' 	=> 'url',
			'sanitize' 		=> 'esc_url_raw',
			'section' 		=> 'social_links',
			'default' 		=> $defaults['social_googleplus']
		),
		'social_pinterest' => array(
			'id' 			=> 'social_pinterest',
			'title' 		=> __( 'Pinterest', 'simple-catch' ),
			'description'	=> '',
			'field_type' 	=> 'url',
			'sanitize' 		=> 'esc_url_raw',
			'section' 		=> 'social_links',
			'default' 		=> $defaults['social_pinterest']
		),
		'social_youtube' => array(
			'id' 			=> 'social_youtube',
			'title' 		=> __( 'Youtube', 'simple-catch' ),
			'description'	=> '',
			'field_type' 	=> 'url',
			'sanitize' 		=> 'esc_url_raw',
			'section' 		=> 'social_links',
			'default' 		=> $defaults['social_youtube']
		),
		'social_vimeo' => array(
			'id' 			=> 'social_vimeo',
			'title' 		=> __( 'Vimeo', 'simple-catch' ),
			'description'	=> '',
			'field_type' 	=> 'url',
			'sanitize' 		=> 'esc_url_raw',
			'section' 		=> 'social_links',
			'default' 		=> $defaults['social_vimeo']
		),
		'social_linkedin' => array(
			'id' 			=> 'social_linkedin',
			'title' 		=> __( 'LinkedIn', 'simple-catch' ),
			'description'	=> '',
			'field_type' 	=> 'url',
			'sanitize' 		=> 'esc_url_raw',
			'section' 		=> 'social_links',
			'default' 		=> $defaults['social_linkedin']
		),
		'social_slideshare' => array(
			'id' 			=> 'social_slideshare',
			'title' 		=> __( 'Slideshare', 'simple-catch' ),
			'description'	=> '',
			'field_type' 	=> 'url',
			'sanitize' 		=> 'esc_url_raw',
			'section' 		=> 'social_links',
			'default' 		=> $defaults['social_slideshare']
		),
		'social_foursquare' => array(
			'id' 			=> 'social_foursquare',
			'title' 		=> __( 'Foursquare', 'simple-catch' ),
			'description'	=> '',
			'field_type' 	=> 'url',
			'sanitize' 		=> 'esc_url_raw',
			'section' 		=> 'social_links',
			'default' 		=> $defaults['social_foursquare']
		),
		'social_flickr' => array(
			'id' 			=> 'social_flickr',
			'title' 		=> __( 'Flickr', 'simple-catch' ),
			'description'	=> '',
			'field_type' 	=> 'url',
			'sanitize' 		=> 'esc_url_raw',
			'section' 		=> 'social_links',
			'default' 		=> $defaults['social_flickr']
		),
		'social_tumblr' => array(
			'id' 			=> 'social_tumblr',
			'title' 		=> __( 'Tumblr', 'simple-catch' ),
			'description'	=> '',
			'field_type' 	=> 'url',
			'sanitize' 		=> 'esc_url_raw',
			'section' 		=> 'social_links',
			'default' 		=> $defaults['social_tumblr']
		),
		'social_deviantart' => array(
			'id' 			=> 'social_deviantart',
			'title' 		=> __( 'deviantART', 'simple-catch' ),
			'description'	=> '',
			'field_type' 	=> 'url',
			'sanitize' 		=> 'esc_url_raw',
			'section' 		=> 'social_links',
			'default' 		=> $defaults['social_deviantart']
		),
		'social_dribbble' => array(
			'id' 			=> 'social_dribbble',
			'title' 		=> __( 'Dribbble', 'simple-catch' ),
			'description'	=> '',
			'field_type' 	=> 'url',
			'sanitize' 		=> 'esc_url_raw',
			'section' 		=> 'social_links',
			'default' 		=> $defaults['social_dribbble']
		),
		'social_myspace' => array(
			'id' 			=> 'social_myspace',
			'title' 		=> __( 'MySpace', 'simple-catch' ),
			'description'	=> '',
			'field_type' 	=> 'url',
			'sanitize' 		=> 'esc_url_raw',
			'section' 		=> 'social_links',
			'default' 		=> $defaults['social_myspace']
		),
		'social_wordpress' => array(
			'id' 			=> 'social_wordpress',
			'title' 		=> __( 'WordPress', 'simple-catch' ),
			'description'	=> '',
			'field_type' 	=> 'url',
			'sanitize' 		=> 'esc_url_raw',
			'section' 		=> 'social_links',
			'default' 		=> $defaults['social_wordpress']
		),
		'social_rss' => array(
			'id' 			=> 'social_rss',
			'title' 		=> __( 'RSS', 'simple-catch' ),
			'description'	=> '',
			'field_type' 	=> 'url',
			'sanitize' 		=> 'esc_url_raw',
			'section' 		=> 'social_links',
			'default' 		=> $defaults['social_rss']
		),
		'social_delicious' => array(
			'id' 			=> 'social_delicious',
			'title' 		=> __( 'Delicious', 'simple-catch' ),
			'description'	=> '',
			'field_type' 	=> 'url',
			'sanitize' 		=> 'esc_url_raw',
			'section' 		=> 'social_links',
			'default' 		=> $defaults['social_delicious']
		),
		'social_lastfm' => array(
			'id' 			=> 'social_lastfm',
			'title' 		=> __( 'Last.fm', 'simple-catch' ),
			'description'	=> '',
			'field_type' 	=> 'url',
			'sanitize' 		=> 'esc_url_raw',
			'section' 		=> 'social_links',
			'default' 		=> $defaults['social_lastfm']
		),
		'social_instagram' => array(
			'id' 			=> 'social_instagram',
			'title' 		=> __( 'Instagram', 'simple-catch' ),
			'description'	=> '',
			'field_type' 	=> 'url',
			'sanitize' 		=> 'esc_url_raw',
			'section' 		=> 'social_links',
			'default' 		=> $defaults['social_instagram']
		),
		'social_github' => array(
			'id' 			=> 'social_github',
			'title' 		=> __( 'GitHub', 'simple-catch' ),
			'description'	=> '',
			'field_type' 	=> 'url',
			'sanitize' 		=> 'esc_url_raw',
			'section' 		=> 'social_links',
			'default' 		=> $defaults['social_github']
		),
		'social_vkontakte' => array(
			'id' 			=> 'social_vkontakte',
			'title' 		=> __( 'Vkontakte', 'simple-catch' ),
			'description'	=> '',
			'field_type' 	=> 'url',
			'sanitize' 		=> 'esc_url_raw',
			'section' 		=> 'social_links',
			'default' 		=> $defaults['social_vkontakte']
		),
		'social_myworld' => array(
			'id' 			=> 'social_myworld',
			'title' 		=> __( 'My World', 'simple-catch' ),
			'description'	=> '',
			'field_type' 	=> 'url',
			'sanitize' 		=> 'esc_url_raw',
			'section' 		=> 'social_links',
			'default' 		=> $defaults['social_myworld']
		),
		'social_odnoklassniki' => array(
			'id' 			=> 'social_odnoklassniki',
			'title' 		=> __( 'Odnoklassniki', 'simple-catch' ),
			'description'	=> '',
			'field_type' 	=> 'url',
			'sanitize' 		=> 'esc_url_raw',
			'section' 		=> 'social_links',
			'default' 		=> $defaults['social_odnoklassniki']
		),
		'social_goodreads' => array(
			'id' 			=> 'social_goodreads',
			'title' 		=> __( 'Goodreads', 'simple-catch' ),
			'description'	=> '',
			'field_type' 	=> 'url',
			'sanitize' 		=> 'esc_url_raw',
			'section' 		=> 'social_links',
			'default' 		=> $defaults['social_goodreads']
		),
		'social_skype' => array(
			'id' 			=> 'social_skype',
			'title' 		=> __( 'Skype', 'simple-catch' ),
			'description'	=> '',
			'field_type' 	=> 'url',
			'sanitize' 		=> 'sanitize_text_field',
			'section' 		=> 'social_links',
			'default' 		=> $defaults['social_skype']
		),
		'social_soundcloud' => array(
			'id' 			=> 'social_soundcloud',
			'title' 		=> __( 'Soundcloud', 'simple-catch' ),
			'description'	=> '',
			'field_type' 	=> 'url',
			'sanitize' 		=> 'esc_url_raw',
			'section' 		=> 'social_links',
			'default' 		=> $defaults['social_soundcloud']
		),
		'social_email' => array(
			'id' 			=> 'social_email',
			'title' 		=> __( 'Email', 'simple-catch' ),
			'description'	=> '',
			'field_type' 	=> 'url',
			'sanitize' 		=> 'sanitize_email',
			'section' 		=> 'social_links',
			'default' 		=> $defaults['social_email']
		),

		//Webmaster Tools
		'analytic_header' => array(
			'id' 				=> 'analytic_header',
			'title' 			=> __( 'Code to display on Header', 'simple-catch' ),
			'description' 		=> __( 'Here you can put scripts from Google, Facebook, Twitter, Add This etc. which will load on Header', 'simple-catch' ),
			'field_type' 		=> 'textarea',
			'sanitize' 			=> 'wp_kses_stripslashes',
			'section' 			=> 'webmaster_tools',
			'active_callback'	=> 'simplecatch_is_header_code_present',
			'default' 			=> ''
		),
		'analytic_footer' => array(
			'id' 				=> 'analytic_footer',
			'title' 			=> __( 'Code to display on Footer', 'simple-catch' ),
			'description' 		=> __( 'Here you can put scripts from Google, Facebook, Twitter, Add This etc. which will load on footer', 'simple-catch' ),
			'field_type' 		=> 'textarea',
			'sanitize' 			=> 'wp_kses_stripslashes',
			'section' 			=> 'webmaster_tools',
			'active_callback'	=> 'simplecatch_is_footer_code_present',
			'default' 		=> ''
		),
	);

	foreach ( $settings_parameters as $option ) {
		if( 'image' == $option['field_type'] ) {
			$wp_customize->add_setting(
				// $id
				$theme_slug . 'options[' . $option['id'] . ']',
				// parameters array
				array(
					'type'				=> 'option',
					'sanitize_callback'	=> $option['sanitize'],
					'default'			=> $option['default']
				)
			);

			$params = array(
						'label'		=> $option['title'],
						'settings'  => $theme_slug . 'options[' . $option['id'] . ']',
					);
			
			if ( 'title_tagline' == $option['section'] ){
				$params['section'] = $option['section'];
			}
			else {
				$params['section']	= $theme_slug . $option['section'];
			}

			if ( isset( $option['active_callback']  ) ){
				$params['active_callback'] = $option['active_callback'];
			}

			$wp_customize->add_control( 
				new WP_Customize_Image_Control( 
					$wp_customize,$theme_slug . 'options[' . $option['id'] . ']',
					$params
				) 
			);
		}
		else if ('checkbox' == $option['field_type'] ) {
			$wp_customize->add_setting(
				// $id
				$theme_slug . 'options[' . $option['id'] . ']',
				// parameters array
				array(
					'type'				=> 'option',
					'sanitize_callback'	=> $option['sanitize'],
					'default'			=> $option['default'],				)
			);

			$params = array(
						'label'		=> $option['title'],
						'settings'  => $theme_slug . 'options[' . $option['id'] . ']',
						'name'  	=> $theme_slug . 'options[' . $option['id'] . ']',
					);
			
			if ( isset( $option['active_callback']  ) ){
				$params['active_callback'] = $option['active_callback'];
			}

			if ( 'colors' == $option['section'] || 'title_tagline' == $option['section'] ){
				$params['section'] = $option['section'];
			}
			else {
				$params['section']	= $theme_slug . $option['section'];
			}

			$wp_customize->add_control( 
				new Simple_Catch_Customize_Checkbox( 
					$wp_customize,$theme_slug . 'options[' . $option['id'] . ']',
					$params	
				) 
			);
		}
		else if ('category-multiple' == $option['field_type'] ) {
			$wp_customize->add_setting(
				// $id
				$theme_slug . 'options[' . $option['id'] . ']',
				// parameters array
				array(
					'type'				=> 'option',
					'sanitize_callback'	=> $option['sanitize'],
					'default'			=> $option['default']
				)
			);

			$params = array(
						'label'			=> $option['title'],
						'section'		=> $theme_slug . $option['section'],
						'settings'		=> $theme_slug . 'options[' . $option['id'] . ']',
						'description'	=> $option['description'],
						'name'	 		=> $theme_slug . 'options[' . $option['id'] . ']',
					);
			
			if ( isset( $option['active_callback']  ) ){
				$params['active_callback'] = $option['active_callback'];
			}

			$wp_customize->add_control( 
				new Simple_Catch_Customize_Dropdown_Categories_Control ( 
					$wp_customize,
					$theme_slug . 'options[' . $option['id'] . ']',
					$params
				)
			);
		}
		else {
			//Normal Loop
			$wp_customize->add_setting(
				// $id
				$theme_slug . 'options[' . $option['id'] . ']',
				// parameters array
				array(
					'default'			=> $option['default'],
					'type'				=> 'option',
					'sanitize_callback'	=> $option['sanitize']
				)
			);

			// Add setting control
			$params = array(
					'label'			=> $option['title'],
					'settings'		=> $theme_slug . 'options[' . $option['id'] . ']',
					'type'			=> $option['field_type'],
					'description'   => $option['description'],
				) ;

			if ( isset( $option['choices']  ) ){
				$params['choices'] = $option['choices'];
			}

			if ( isset( $option['active_callback']  ) ){
				$params['active_callback'] = $option['active_callback'];
			}

			if ( isset( $option['input_attrs']  ) ){
				$params['input_attrs'] = $option['input_attrs'];
			}

			if ( 'colors' == $option['section'] ){
				$params['section'] = $option['section'];
			}
			else {
				$params['section']	= $theme_slug . $option['section'];
			}

			$wp_customize->add_control(
				// $id
				$theme_slug . 'options[' . $option['id'] . ']',
				$params			
			);
		}
	}

	//Add featured post elements with respect to no of featured sliders
	for ( $i = 1; $i <= $options[ 'slider_qty' ]; $i++ ) {
		$wp_customize->add_setting(
			// $id
			$theme_slug . 'options[featured_slider][' . $i . ']',
			// parameters array
			array(
				'type'				=> 'option',
				'sanitize_callback'	=> 'simplecatch_sanitize_post_id'
			)
		);

		$wp_customize->add_control( 
			$theme_slug . 'options[featured_slider][' . $i . ']',
			array(
				'label'		=> sprintf( __( '#%s Featured Post ID', 'simple-catch' ), $i ),
				'section'   => $theme_slug .'add_slider_options',
				'settings'  => $theme_slug . 'options[featured_slider][' . $i . ']',
				'type'		=> 'text',
					'input_attrs' => array(
	        		'style' => 'width: 100px;'
	    		),
			)
		);
	}


	// Reset all settings to default
	$wp_customize->add_section( 'simplecatch_reset_all_settings', array(
		'description'	=> __( 'Caution: Reset all settings to default. Refresh the page after save to view full effects.', 'simple-catch' ),
		'priority' 		=> 700,
		'title'    		=> __( 'Reset all settings', 'simple-catch' ),
	) );

	$wp_customize->add_setting( 'simplecatch_options[reset_all_settings]', array(
		'capability'		=> 'edit_theme_options',
		'sanitize_callback' => 'simplecatch_reset_all_settings',
		'transport'			=> 'postMessage',
	) );

	$wp_customize->add_control( 'simplecatch_options[reset_all_settings]', array(
		'label'    => __( 'Check to reset all settings to default', 'simple-catch' ),
		'section'  => 'simplecatch_reset_all_settings',
		'settings' => 'simplecatch_options[reset_all_settings]',
		'type'     => 'checkbox'
	) );
	// Reset all settings to default end

	//Important Links
	$wp_customize->add_section( 'important_links', array(
		'priority' 		=> 999,
		'title'   	 	=> __( 'Important Links', 'simple-catch' ),
	) );

	/**
	 * Has dummy Sanitizaition function as it contains no value to be sanitized
	 */
	$wp_customize->add_setting( 'important_links', array(
		'sanitize_callback'	=> 'simplecatch_sanitize_important_link',
	) );

	$wp_customize->add_control( new Simple_Catch_Important_Links( $wp_customize, 'important_links', array(
        'label'   	=> __( 'Important Links', 'simple-catch' ),
        'section'  	=> 'important_links',
        'settings' 	=> 'important_links',
        'type'     	=> 'important_links',
    ) ) );  
    //Important Links End
}
add_action( 'customize_register', 'simplecatch_customize_register' );


/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously for simplecatch.
 * And flushes out all transient data on preview
 *
 * @since Simple Catch 1.6.3
 */
function simplecatch_customize_preview() {
	//Remove transients on preview
	simplecatch_themeoption_invalidate_caches();

	global $simplecatch_options_defaults ,$simplecatch_options_settings;

	$simplecatch_options_settings = simplecatch_options_set_defaults( $simplecatch_options_defaults );
}
add_action( 'customize_preview_init', 'simplecatch_customize_preview' );
add_action( 'customize_save', 'simplecatch_customize_preview' );


/**
 * Custom scripts and styles on Customizer for Simple Catch
 *
 * @since Simple Catch 1.4
 */
function simplecatch_customize_scripts() {
	wp_register_script( 'simplecatch_customizer_custom', get_template_directory_uri() . '/functions/panel/customizer-custom-scripts.js', array( 'jquery' ), '20140108', true );

    $simplecatch_misc_links = array(
							'upgrade_link' 				=> esc_url( 'http://catchthemes.com/themes/simple-catch-pro/' ),
							'upgrade_text'	 			=> __( 'Upgrade To Pro &raquo;', 'simple-catch' ),
		);

    //Add More Theme Options Button
    wp_localize_script( 'simplecatch_customizer_custom', 'simplecatch_misc_links', $simplecatch_misc_links );

    wp_enqueue_script( 'simplecatch_customizer_custom' );

    wp_enqueue_style( 'simplecatch_customizer_custom', get_template_directory_uri() . '/functions/panel/customizer.css');
}
add_action( 'customize_controls_enqueue_scripts', 'simplecatch_customize_scripts' );


//Active callbacks for customizer
require get_template_directory() . '/functions/panel/customizer/customizer-active-callbacks.php';

//Sanitize functions for customizer
require get_template_directory() . '/functions/panel/customizer/customizer-sanitize-functions.php';