<?php
/**
 * Headerdata of Theme options.
 * @package GalaNight
 * @since GalaNight 1.0.0
*/  

// additional css
if(	!is_admin()){
function galanight_fonts_include () {
global $galanight_options_db;
// Google Fonts
$bodyfont = $galanight_options_db['galanight_body_google_fonts'];
$headingfont = $galanight_options_db['galanight_headings_google_fonts'];
$headlinefont = $galanight_options_db['galanight_headline_google_fonts'];
$postentryfont = $galanight_options_db['galanight_postentry_google_fonts'];
$sidebarfont = $galanight_options_db['galanight_sidebar_google_fonts'];
$menufont = $galanight_options_db['galanight_menu_google_fonts'];

$fonturl = "//fonts.googleapis.com/css?family=";

$bodyfonturl = $fonturl.$bodyfont;
$headingfonturl = $fonturl.$headingfont;
$headlinefonturl = $fonturl.$headlinefont;
$postentryfonturl = $fonturl.$postentryfont;
$sidebarfonturl = $fonturl.$sidebarfont;
$menufonturl = $fonturl.$menufont;
	// Google Fonts
     if ($bodyfont != 'default' && $bodyfont != ''){
      wp_enqueue_style('galanight-google-font1', $bodyfonturl); 
		 }
     if ($headingfont != 'default' && $headingfont != ''){
      wp_enqueue_style('galanight-google-font2', $headingfonturl);
		 }
     if ($headlinefont != 'default' && $headlinefont != ''){
      wp_enqueue_style('galanight-google-font4', $headlinefonturl); 
		 }
     if ($postentryfont != 'default' && $postentryfont != ''){
      wp_enqueue_style('galanight-google-font5', $postentryfonturl); 
		 }
     if ($sidebarfont != 'default' && $sidebarfont != ''){
      wp_enqueue_style('galanight-google-font6', $sidebarfonturl);
		 }
     if ($menufont != 'default' && $menufont != ''){
      wp_enqueue_style('galanight-google-font8', $menufonturl);
		 }
}
add_action( 'wp_enqueue_scripts', 'galanight_fonts_include' );
}

// additional css
function galanight_css_include () {
global $galanight_options_db;
    if ($galanight_options_db['galanight_layout_width'] == 'Boxed' ){
			wp_enqueue_style('galanight-boxed-layout', get_template_directory_uri().'/css/boxed-layout.css');
		}
    
    if ($galanight_options_db['galanight_css'] == 'Blue' ){
			wp_enqueue_style('galanight-style-blue', get_template_directory_uri().'/css/colors/blue.css');
		}

		if ($galanight_options_db['galanight_css'] == 'Red' ){
			wp_enqueue_style('galanight-style-red', get_template_directory_uri().'/css/colors/red.css');
		}
}
add_action( 'wp_enqueue_scripts', 'galanight_css_include' );	

// Outputs additional CSS based on the Theme Options panel custom settings.
function galanight_styles_method() {
  global $galanight_options_db;
	wp_enqueue_style( 'galanight-style', get_stylesheet_uri() );
        $background_pattern_opacity = $galanight_options_db['galanight_background_pattern_opacity'];
        $display_sidebar = $galanight_options_db['galanight_display_sidebar'];
        $display_sidebar_archives = $galanight_options_db['galanight_display_sidebar_archives'];
        $header_layout = $galanight_options_db['galanight_header_layout'];
        $page_title_width = $galanight_options_db['galanight_page_title_width'];
        $header_menu_width = $galanight_options_db['galanight_header_menu_width'];
        $featured_image_size = $galanight_options_db['galanight_featured_image_size'];
        $display_meta_post_entry = $galanight_options_db['galanight_display_meta_post_entry'];
        $bodyfont = $galanight_options_db['galanight_body_google_fonts'];
        $headingfont = $galanight_options_db['galanight_headings_google_fonts'];
        $headlinefont = $galanight_options_db['galanight_headline_google_fonts'];
        $postentryfont = $galanight_options_db['galanight_postentry_google_fonts'];
        $sidebarfont = $galanight_options_db['galanight_sidebar_google_fonts'];
        $menufont = $galanight_options_db['galanight_menu_google_fonts'];
        $own_css = $galanight_options_db['galanight_own_css']; 

// User defined Custom CSS
if ($own_css != '') {
        $own_css_custom_css = esc_attr($own_css);
        wp_add_inline_style( 'galanight-style', $own_css_custom_css );
}

// Background Pattern Opacity
if ($background_pattern_opacity != '' && $background_pattern_opacity != '100' && $background_pattern_opacity != 'Default') {
        $background_pattern_opacity_custom_css = "#wrapper .pattern { opacity: 0.$background_pattern_opacity; filter: alpha(opacity=$background_pattern_opacity); }";
        wp_add_inline_style( 'galanight-style', $background_pattern_opacity_custom_css );
}
elseif ($background_pattern_opacity == '100') {
        $background_pattern_opacity_custom_css = "#wrapper .pattern { opacity: 1; filter: alpha(opacity=100); }";
        wp_add_inline_style( 'galanight-style', $background_pattern_opacity_custom_css );
}

// Display Sidebar on Posts/Pages
if ($display_sidebar == 'Hide') {
        $display_sidebar_custom_css = ".single .container #main-content, .page .container #main-content, .error404 .container #main-content, .tribe-events-page-template .container #main-content { width: 100%; }";
        wp_add_inline_style( 'galanight-style', $display_sidebar_custom_css );
}

// Display Sidebar on Archives
if ($display_sidebar_archives == 'Hide') {
        $display_sidebar_archives_custom_css = ".blog .container #main-content, .archive .container #main-content, .search .container #main-content { width: 100%; } .archive #sidebar { display: none; }";
        wp_add_inline_style( 'galanight-style', $display_sidebar_archives_custom_css );
}

// Header Layout - Wide
if ($header_layout != 'Centered') {
        $header_layout_custom_css = "#wrapper-header .site-title { text-align: left; } #wrapper-header .header-logo { margin-left: 0; } .rtl #wrapper-header .site-title { text-align: right; } @media screen and (max-width: 990px) { html #wrapper #wrapper-header .header-content .site-title, html #wrapper #wrapper-header .header-content .header-logo { margin-bottom: 0 !important; } }";
        wp_add_inline_style( 'galanight-style', $header_layout_custom_css );
}

// Title Box width
if ($page_title_width != '' && $header_layout != 'Centered') {
        $page_title_width_custom_css = "#wrapper #wrapper-header .title-box { width: $page_title_width; }";
        wp_add_inline_style( 'galanight-style', $page_title_width_custom_css );
}
elseif ($page_title_width == '' && $header_layout != 'Centered') {
        $page_title_width_custom_css = "#wrapper #wrapper-header .title-box { width: 50%; }";
        wp_add_inline_style( 'galanight-style', $page_title_width_custom_css );
}

// Menu Box width
if ($header_menu_width != '' && $header_layout != 'Centered') {
        $header_menu_width_custom_css = "#wrapper #wrapper-header .menu-box { width: $header_menu_width; }";
        wp_add_inline_style( 'galanight-style', $header_menu_width_custom_css );
}
elseif ($header_menu_width == '' && $header_layout != 'Centered') {
        $header_menu_width_custom_css = "#wrapper #wrapper-header .menu-box { width: 50%; }";
        wp_add_inline_style( 'galanight-style', $header_menu_width_custom_css );
}

// Featured Images Size
if ($featured_image_size == 'Large') {
        $featured_image_size_custom_css = ".post-entry .attachment-post-thumbnail { margin: 0 0 10px; max-width: 100%; clear: both; float: none; }";
        wp_add_inline_style( 'galanight-style', $featured_image_size_custom_css );
}

// Display Meta Box - post entries styling
if ($display_meta_post_entry == 'Hide') {
        $display_meta_post_entry_custom_css = "body #main-content .post-entry .post-entry-headline { margin-bottom: 10px; }";
        wp_add_inline_style( 'galanight-style', $display_meta_post_entry_custom_css );
}

// Body font
if ($bodyfont != 'default' && $bodyfont != '') {
        $bodyfont_custom_css = "html body, #wrapper blockquote, #wrapper q, #wrapper .container #comments .comment, #wrapper .container #comments .comment time, #wrapper .container #commentform .form-allowed-tags, #wrapper .container #commentform p, #wrapper input, #wrapper button, #wrapper textarea, #wrapper select, #wrapper #main-content .post-meta, html #wrapper .tribe-events-schedule h3, html #wrapper .tribe-events-schedule span, #wrapper #tribe-events-content .tribe-events-calendar .tribe-events-month-event-title { font-family: $bodyfont, Arial, Helvetica, sans-serif; }";
        wp_add_inline_style( 'galanight-style', $bodyfont_custom_css );
}

// Site title font
if ($headingfont != 'default' && $headingfont != '') {
        $headingfont_custom_css = "#wrapper #wrapper-header .site-title { font-family: $headingfont, Arial, Helvetica, sans-serif; }";
        wp_add_inline_style( 'galanight-style', $headingfont_custom_css );
}

// Page/post headlines font
if ($headlinefont != 'default' && $headlinefont != '') {
        $headlinefont_custom_css = "#wrapper h1, #wrapper h2, #wrapper h3, #wrapper h4, #wrapper h5, #wrapper h6, #wrapper .container .navigation .section-heading, #wrapper #comments .entry-headline, #wrapper .header-image .header-image-text .header-image-headline { font-family: $headlinefont, Arial, Helvetica, sans-serif; }";
        wp_add_inline_style( 'galanight-style', $headlinefont_custom_css );
}

// Post entry headline font
if ($postentryfont != 'default' && $postentryfont != '') {
        $postentryfont_custom_css = "#wrapper #main-content .post-entry .post-entry-headline, html #wrapper #main-content .tribe-events-list-event-title { font-family: $postentryfont, Arial, Helvetica, sans-serif; }";
        wp_add_inline_style( 'galanight-style', $postentryfont_custom_css );
}

// Sidebar and Footer widget headlines font
if ($sidebarfont != 'default' && $sidebarfont != '') {
        $sidebarfont_custom_css = "#wrapper .container #sidebar .sidebar-widget .sidebar-headline, #wrapper #wrapper-footer #footer .footer-widget .footer-headline { font-family: $sidebarfont, Arial, Helvetica, sans-serif; }";
        wp_add_inline_style( 'galanight-style', $sidebarfont_custom_css );
}

// Main Header menu font
if ($menufont != 'default' && $menufont != '') {
        $menufont_custom_css = "#wrapper #wrapper-header .menu-box ul li a, #wrapper #wrapper-header .menu-panel ul li a { font-family: $menufont, Arial, Helvetica, sans-serif; }";
        wp_add_inline_style( 'galanight-style', $menufont_custom_css );
}

}
add_action( 'wp_enqueue_scripts', 'galanight_styles_method' );
?>