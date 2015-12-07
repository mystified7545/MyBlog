<?php
/**
* @package Catch Themes
* @subpackage Simple Catch
* @since Simple Catch 3.0
*/


//Custom control for category multiple select
class Simple_Catch_Customize_Dropdown_Categories_Control extends WP_Customize_Control {
	public $type = 'dropdown-categories';

	public $name;

	public $descripton;

	public function render_content() {
		$dropdown = wp_dropdown_categories(
			array(
				'name'             => $this->name,
				'echo'             => 0,
				'hide_empty'       => false,
				'show_option_none' => false,
				'hide_if_empty'    => false,
			)
		);

		$dropdown = str_replace('<select', '<select multiple = "multiple" style = "height:95px;" ' . $this->get_link(), $dropdown );

		echo '<p class="description">'.  $this->description . '</p>';

		printf(
			'<label class="customize-control-select"><span class="customize-control-title">%s</span> %s</label>',
			$this->label,
			$dropdown
		);

		echo '<p class="description">'. __( 'Hold down the Ctrl (windows) / Command (Mac) button to select multiple options.', 'simple-catch' ) . '</p>';
	}
}

//Custom control for important link
class Simple_Catch_Important_Links extends WP_Customize_Control {
    public $type = 'important-links'; 
    
    public function render_content() {
    	//Add Theme instruction, Support Forum, Changelog, Donate link, Review, Facebook, Twitter, Google+, Pinterest links
        $important_links = array(
						'theme_instructions' => array( 
							'link'	=> esc_url( 'http://catchthemes.com/theme-instructions/catcheverest/' ),
							'text' 	=> __( 'Theme Instructions', 'simple-catch' ),
							),
						'support' => array( 
							'link'	=> esc_url( 'http://catchthemes.com/support/' ),
							'text' 	=> __( 'Support', 'simple-catch' ),
							),
						'changelog' => array( 
							'link'	=> esc_url( 'http://catchthemes.com/changelogs/catcheverest-theme/' ),
							'text' 	=> __( 'Changelog', 'simple-catch' ),
							),
						'donate' => array( 
							'link'	=> esc_url( 'http://catchthemes.com/donate/' ),
							'text' 	=> __( 'Donate Now', 'simple-catch' ),
							),
						'review' => array( 
							'link'	=> esc_url( 'https://wordpress.org/support/view/theme-reviews/catcheverest' ),
							'text' 	=> __( 'Review', 'simple-catch' ),
							),
						);
		foreach ( $important_links as $important_link) {
			echo '<p><a target="_blank" href="' . $important_link['link'] .'" >' . esc_attr( $important_link['text'] ) .' </a></p>';
		}
    }
}


/**
  * Custom control for checkbox
  * This class adds a custom-checkbox. The value is stored in the hidden field. This is due to the fact that
  * our theme previously stored 1 and 0 strings as checkbox values
  */
class Simple_Catch_Customize_Checkbox extends WP_Customize_Control {
	public $type = 'simplecatch_custom_checkbox';

	public $name;

	public $descripton;

	public $settings;

	public $default;

	public function render_content() {
		$this->value();
		$this->default;
		?>
		<label>
	        <input type="checkbox" <?php checked( '1', $this->value() ); ?>  /> <?php echo esc_html ( $this->label ); ?>

	        <input type="hidden" <?php $this->link(); ?> value="1" />
        </label>
         <?php if ( !empty( $this->description ) ) : ?>
            <span class="description customize-control-description"><?php echo esc_html( $this->description ); ?></span>
        <?php endif; ?>	        
    <?php }
}