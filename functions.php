<?php

define( 'xray_VERSION', 1.0 ); // Define the version so we can easily replace it throughout the theme

$SiteName = 'Site';
$settingslink = 'site-settings';
/*-----------------------------------------------------------------------------------*/
/* Remove the auto p tag removal
/*-----------------------------------------------------------------------------------*/

remove_filter( 'the_content', 'wpautop' );
remove_filter( 'the_excerpt', 'wpautop' );


/*-----------------------------------------------------------------------------------*/
/* Set Theme Supports
/*-----------------------------------------------------------------------------------*/
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'menus' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'editor-styles' ); 
	add_editor_style( 'style-editor.css' );

	// Woocomerce Support For the image gallerys and sliders
	add_theme_support( 'wc-product-gallery-zoom' );
    add_theme_support( 'wc-product-gallery-lightbox' );
    add_theme_support( 'wc-product-gallery-slider' );

	function xray_add_woocommerce_support() {
		add_theme_support( 'woocommerce' );
	}
	add_action( 'after_setup_theme', 'xray_add_woocommerce_support' );  

if ( function_exists( 'add_theme_support' ) ) {
	add_theme_support( 'post-thumbnails' );
}

//* Add new image size
add_image_size( 'category-thumb', 313, 380, true );

function post_image_sizes($sizes){
	$custom_sizes = array(
		'category-thumb' => 'Category Thumb'
	);
	return array_merge( $sizes, $custom_sizes );
}
add_filter('image_size_names_choose', 'post_image_sizes');


/*-----------------------------------------------------------------------------------*/
/* WordPress Clean Ups
/*-----------------------------------------------------------------------------------*/
		function website_remove_version() { return ''; }

		remove_action('wp_head', 'rest_output_link_wp_head', 10);
		remove_action('wp_head', 'wp_oembed_add_discovery_links', 10);
		remove_action('template_redirect', 'rest_output_link_header', 11, 0);
		remove_action ('wp_head', 'rsd_link');
		remove_action( 'wp_head', 'wlwmanifest_link');
		remove_action( 'wp_head', 'wp_shortlink_wp_head');

		add_filter('the_generator', 'website_remove_version');
		add_filter( 'tiny_mce_plugins', 'disable_emojis_tinymce' );
		add_filter( 'rank_math/frontend/remove_credit_notice', '__return_true' );
		add_filter( 'script_loader_src', 'website_cleanup_query_string', 15, 1 ); 
		add_filter( 'style_loader_src', 'website_cleanup_query_string', 15, 1 );

		function website_cleanup_query_string( $src ){ 
			$parts = explode( '?', $src ); 
			return $parts[0]; 
		}  
		function remove_jquery_migrate($scripts)
		{
			if (!is_admin() && isset($scripts->registered['jquery'])) {
				$script = $scripts->registered['jquery'];
				
				if ($script->deps) { // Check whether the script has any dependencies
					$script->deps = array_diff($script->deps, array(
						'jquery-migrate'
					));
				}
			}
		}
		add_action('wp_default_scripts', 'remove_jquery_migrate');

		function disable_emojis() {
			remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
			remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
			remove_action( 'wp_print_styles', 'print_emoji_styles' );
			remove_action( 'admin_print_styles', 'print_emoji_styles' ); 
			remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
			remove_filter( 'comment_text_rss', 'wp_staticize_emoji' ); 
			remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
			add_filter( 'tiny_mce_plugins', 'disable_emojis_tinymce' );
			add_filter( 'wp_resource_hints', 'disable_emojis_remove_dns_prefetch', 10, 2 );
		}
		add_action( 'init', 'disable_emojis' );
		
		function disable_emojis_tinymce( $plugins ) {
			if ( is_array( $plugins ) ) {
			return array_diff( $plugins, array( 'wpemoji' ) );
			} else {
			return array();
			}
		}
		
		function disable_emojis_remove_dns_prefetch( $urls, $relation_type ) {
			if ( 'dns-prefetch' == $relation_type ) {
			$emoji_svg_url = apply_filters( 'emoji_svg_url', 'https://s.w.org/images/core/emoji/2/svg/' );
		
		$urls = array_diff( $urls, array( $emoji_svg_url ) );
			}
		
		return $urls;
		}
		
		
		remove_action( 'wp_enqueue_scripts', 'wp_enqueue_global_styles' );
		remove_action( 'wp_footer', 'wp_enqueue_global_styles', 1 );
		

		
/*-----------------------------------------------------------------------------------*/
/* Menu Registration and Tidy Up
/*-----------------------------------------------------------------------------------*/
	register_nav_menus( array( 'primary'	=>	__( 'Primary Menu', 'xray' ), ));


	function wp_nav_menu_remove($var) {
		return is_array($var) ? array_intersect($var, array('current-menu-item','menu-item-has-children','current-menu-parent')) : '';
	}
	add_filter('page_css_class', 'wp_nav_menu_remove', 100, 1);
	add_filter('nav_menu_item_id', 'wp_nav_menu_remove', 100, 1);
	add_filter('nav_menu_css_class', 'wp_nav_menu_remove', 100, 1);

/*-----------------------------------------------------------------------------------*/
/* Enqueue Styles and Scripts
/*-----------------------------------------------------------------------------------*/
	function xray_scripts()  { 
		// get the theme directory style.css and link to it in the header
		wp_enqueue_style('custom_font', '//use.typekit.net/rir5arn.css');
		wp_enqueue_style('style.css', get_stylesheet_directory_uri() . '/style.css?v='.rand(111,999));
		
		
		
		wp_enqueue_script( 'xray-modern', get_template_directory_uri() . '/assets/js/modern.js','','',true);
		wp_enqueue_script( 'jquery-core' );
		
		wp_enqueue_script( 'xray-custom', get_template_directory_uri() . '/assets/js/script.js','','',true);
		
		


		wp_dequeue_style( 'wp-block-library' );
		wp_dequeue_style('hoverIntent');
	}
	add_action( 'wp_enqueue_scripts', 'xray_scripts' ); 

	
	remove_action( 'wp_enqueue_scripts', 'wp_enqueue_global_styles' );
	remove_action( 'wp_footer', 'wp_enqueue_global_styles', 1 );


/*-----------------------------------------------------------------------------------*/
/* Add Custom Theme Section (For Use With ACF)
/*-----------------------------------------------------------------------------------*/
if( function_exists('acf_add_options_page') ) {
		acf_add_options_page(array(
			'page_title' 	=> $SiteName.' General Settings',
			'menu_title'	=> $SiteName.' Settings',
			'menu_slug' 	=> $settingslink,
			'capability'	=> 'edit_posts',
			'position'      => 1,
			'redirect'		=> false
		));	
		acf_add_options_page(array(
			'page_title' 	=> 'Property Settings',
			'menu_title'	=> 'Property Settings',
			'menu_slug' 	=> 'property-includes',
			'capability'	=> 'edit_posts',
			'position'      => 1,
			'redirect'		=> false
		));	
};




/*-----------------------------------------------------------------------------------*/
/* Woocom Extra Categories
/*-----------------------------------------------------------------------------------*/


// Register Custom Post Type
function custom_post_type_local__attractions() {

	$labels = array(
		'name'                  => _x( 'Local Attractions', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'Local Attraction', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Local Attractions', 'text_domain' ),
		'name_admin_bar'        => __( 'Local Attractions', 'text_domain' ),
		'archives'              => __( 'Item Archives', 'text_domain' ),
		'attributes'            => __( 'Item Attributes', 'text_domain' ),
		'parent_item_colon'     => __( 'Parent Item:', 'text_domain' ),
		'all_items'             => __( 'All Items', 'text_domain' ),
		'add_new_item'          => __( 'Add New Item', 'text_domain' ),
		'add_new'               => __( 'Add New', 'text_domain' ),
		'new_item'              => __( 'New Item', 'text_domain' ),
		'edit_item'             => __( 'Edit Item', 'text_domain' ),
		'update_item'           => __( 'Update Item', 'text_domain' ),
		'view_item'             => __( 'View Item', 'text_domain' ),
		'view_items'            => __( 'View Items', 'text_domain' ),
		'search_items'          => __( 'Search Item', 'text_domain' ),
		'not_found'             => __( 'Not found', 'text_domain' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
		'featured_image'        => __( 'Featured Image', 'text_domain' ),
		'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
		'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
		'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
		'insert_into_item'      => __( 'Insert into item', 'text_domain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'text_domain' ),
		'items_list'            => __( 'Items list', 'text_domain' ),
		'items_list_navigation' => __( 'Items list navigation', 'text_domain' ),
		'filter_items_list'     => __( 'Filter items list', 'text_domain' ),
	);
	$args = array(
		'label'                 => __( 'Local Attraction', 'text_domain' ),
		'description'           => __( 'Local Attractions', 'text_domain' ),
		'labels'                => $labels,
		'supports'              => array( 'title','editor','thumbnail' ),
		'taxonomies'            => array( 'category', 'post_tag' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'local_attraction', $args );

}
add_action( 'init', 'custom_post_type_local__attractions', 0 );


/*-----------------------------------------------------------------------------------*/
/* Add Custom Blocks
/*-----------------------------------------------------------------------------------*/

/* Custom block category's */
add_action('acf/init', 'xray_customblocks');
function xray_customblocks() {
	  // Get an array of theme PHP templates
	  $theme = wp_get_theme();
	  $files = $theme->get_files('php', 2, false);
	
	  // Iterate over and ignore non-block templates
	  foreach ($files as $filename => $filepath) {
		if (preg_match('#^template-parts/(block|container)s?/#', $filename, $matches) !== 1) {
		  continue;
		}
		// Read the PHP comment meta data for the block
		$meta = get_file_data($filepath, array(
		  'name'        => 'Block Name',
		  'description' => 'Block Description',
		  'post_types'  => 'Post Types',
		  'mode'        => 'Block Mode',
		  'svg' 		=> 'Block SVG',
		  'category' 	=> 'Block Category'
		));
		// Skip template if a name is not provided
		if (empty($meta['name'])) {
		  continue;
		}
		// Convert the post types to an array (or use defaults)
		$post_types = array_filter(
		  array_map('trim', explode(',', $meta['post_types']))
		);
		if (empty($post_types)) {
		  $post_types = array('page', 'post');
		}
		// Register the ACF block using the meta data
		acf_register_block_type(array(
		  'name'              => "{$matches[1]}_" . sanitize_title($meta['name']),
		  'title'             => $meta['name'],
		  'description'       => $meta['description'],
		  'post_types'        => $post_types,
		  'render_template'   => $filepath,
		  'category'          => $meta['category'], 
		  'icon'            => file_get_contents(get_template_directory().'/template-parts/svg-icons/'.$meta['svg'] ),
		  'supports'		=> [
			  		'mode'				=> true,
			  		'align'				=> false,
			  		'anchor'			=> true,
			  		'customClassName'	=> true,
					'jsx' => true,
		  ],
		  'example'  => array(
			  'attributes' => array(
				  'mode' => 'preview',
				  'data' => ['_is_preview' => true],
			  )
		  ),
		));
	  }
	}

function example_block_category( $categories, $post ) {
		return array_merge(
			$categories,
			array(
				array(
					'slug' => 's9blocks',
					'title' => 'Strength 9',
				),
			/*	array(
					'slug' => 'wcpauto',
					'title' => 'Wellington AutoFill',
				), */
			)
		);
	}
	add_filter( 'block_categories_all', 'example_block_category', 10, 2);


function xray_block_scripts()  { 
	// get the theme directory style.css and link to it in the header
	wp_enqueue_script( 'xray-2', get_template_directory_uri() . '/assets/js/slider.js');
}
add_action( 'wp_enqueue_scripts', 'xray_block_scripts' ); 


function random_str(
	int $length = 64,
	string $keyspace = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'): string {
	if ($length < 1) {
		throw new \RangeException("Length must be a positive integer");
	}
	$pieces = [];
	$max = mb_strlen($keyspace, '8bit') - 1;
	for ($i = 0; $i < $length; ++$i) {
		$pieces []= $keyspace[random_int(0, $max)];
	}
	return implode('', $pieces);
};


add_action('admin_menu', 'remove_posts_menu');
function remove_posts_menu() 
{
	remove_menu_page('edit.php');
}

/**
	 * Font Awesome Kit Setup
	 * 
	 * This will add your Font Awesome Kit to the front-end, the admin back-end,
	 * and the login screen area.*/
	 
	if (! function_exists('fa_custom_setup_kit') ) {
	  function fa_custom_setup_kit($kit_url = '') {
		foreach ( [ 'wp_enqueue_scripts', 'admin_enqueue_scripts', 'login_enqueue_scripts' ] as $action ) {
		  add_action(
			$action,
			function () use ( $kit_url ) {
			  wp_enqueue_script( 'font-awesome-kit', $kit_url, [], null );
			}
		  );
		}
	  }
	}
fa_custom_setup_kit('https://kit.fontawesome.com/1db850bdc9.js');		


/*
	 * Google Fonts */
	 
function wpb_add_google_fonts() {
	wp_enqueue_style( 'wpb-google-fonts', 'https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,200;0,300;0,400;0,900;1,100;1,300;1,400&family=Open+Sans:wght@300', false ); 
}
 
add_action( 'wp_enqueue_scripts', 'wpb_add_google_fonts' );


/**
	 * Favicons*/
	 
add_action( 'wp_head', 'ilc_favicon');
function ilc_favicon(){
	echo '<link rel="apple-touch-icon" sizes="180x180" href="/wp-content/themes/cynynion-uchaf/assets/img/fav/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="/wp-content/themes/cynynion-uchaf/assets/img/fav/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="/wp-content/themes/cynynion-uchaf/assets/img/fav/favicon-16x16.png">
	<link rel="manifest" href="/wp-content/themes/cynynion-uchaf/assets/img/fav/site.webmanifest">
	<link rel="mask-icon" href="/wp-content/themes/cynynion-uchaf/assets/img/fav/safari-pinned-tab.svg" color="#5bbad5">
	<link rel="shortcut icon" href="/wp-content/themes/cynynion-uchaf/assets/img/fav/favicon.ico">
	<meta name="msapplication-TileColor" content="#da532c">
	<meta name="msapplication-config" content="/wp-content/themes/cynynion-uchaf/assets/img/fav/browserconfig.xml">
	<meta name="theme-color" content="#ffffff">';
};


function wpf_limit_date_picker() {
	?>
	<script type="text/javascript">
		console.log ("Dave");

			var disabledDays = [
			   "20-10-2022", "22-10-2022", "25-10-2022"
			];
		
		   //replace these with the id's of your datepickers
		   jQuery("#datepicker").datepicker({
			  dateFormat: 'dd-mm-yy',
			  beforeShowDay: function(date){
				 var day = date.getDay();
				 var string = jQuery.datepicker.formatDate('dd-mm-yy', date);
				 var isDisabled = ($.inArray(string, disabledDays) != -1);
		
				 //day != 0 disables all Sundays
				 return [!isDisabled];
			  },
			  
			  onClose: function() {
				 
				  
					  $('#wpforms-37-field_3').val($(this).val());
				
			  }
		   });

	

	</script>
	<?php
}
add_action( 'wpforms_wp_footer_end', 'wpf_limit_date_picker', 10 );


