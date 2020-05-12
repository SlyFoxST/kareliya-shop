<?php
/**
 * corporates functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package corporates
 */

function my_acf_google_map_api($api){	
	$api['key'] = 'AIzaSyAfb5zjZrMY-38hJL-rB3HX1OVWev_cwK8';	
	return $api;
}

add_filter('acf/fields/google_map/api', 'my_acf_google_map_api');
add_filter('acf/settings/remove_wp_meta_box', '__return_false');

define('PATH','http://coder.cx.ua/coder.sub/');
if ( ! function_exists( 'corporates_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function corporates_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on corporates, use a find and replace
		 * to change 'corporates' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'corporates', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'corporates' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'corporates_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'corporates_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function corporates_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'corporates_content_width', 640 );
}
add_action( 'after_setup_theme', 'corporates_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function corporates_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'corporates' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'corporates' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'corporates_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function corporates_scripts() {
	wp_enqueue_style( 'corporates-style', get_stylesheet_uri() );
	wp_deregister_script('jquery');
	wp_register_script( 'jquery', get_template_directory_uri().'/js/jquery-3.2.1.min.js',false, null, true);
	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'core', get_template_directory_uri().'/js/script.core.js', array('jquery'), false, true);
	wp_enqueue_script( 'pjax', get_template_directory_uri().'/js/jquery.pjax.js', array('jquery'), false, true);
	wp_enqueue_script( 'owl', get_template_directory_uri().'/plugins/owl.carousel/owl.carousel.js', array('jquery'), false, true);
	wp_enqueue_script( 'fancybox', get_template_directory_uri().'/plugins/fancybox-master/dist/jquery.fancybox.js', array('jquery'), false, true);	
	wp_enqueue_script( 'lazyload', get_template_directory_uri().'/plugins/lazyload/jquery.lazy.js', array('jquery'), false, true);	
	wp_enqueue_script( 'slick', get_template_directory_uri().'/js/slick.min.js', array('jquery'), false, true);	

	wp_enqueue_style( 'reset', get_template_directory_uri() . '/css/reset.css');
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.css');
	wp_enqueue_style( 'style-shop', get_template_directory_uri() . '/css/style-shop.css');
	wp_enqueue_style( 'responsive', get_template_directory_uri() . '/css/responsive.css');
	wp_enqueue_style( 'slick', get_template_directory_uri() . '/css/slick.css');
	wp_enqueue_style( 'owl', get_template_directory_uri() . '/plugins/owl.carousel/assets/owl.carousel.min.css');
	wp_enqueue_style( 'fancybox', get_template_directory_uri() . '/plugins/fancybox-master/dist/jquery.fancybox.min.css');
	wp_enqueue_style( 'owl-theme', get_template_directory_uri() . '/plugins/owl.carousel/assets/owl.theme.default.min.css');
	wp_enqueue_style( 'owl-theme-green', get_template_directory_uri() . '/plugins/owl.carousel/assets/owl.theme.green.min.css');
}
add_action( 'wp_enqueue_scripts', 'corporates_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}


function register_my_session()
{
	if( !session_id() )
	{
		session_start();
	}
}

add_action('init', 'register_my_session');

function resultCaptcha(){
	$a = rand(1,10);
	$b = rand(1,10);
	return $res = $_SESSION['res'] = $a + $b;
}




add_action( 'wp_enqueue_scripts', 'my_enqueue' );
function my_enqueue() {
	wp_enqueue_script( 'ajax-script', get_template_directory_uri() . '/js/script.init.js', array('jquery') );
	wp_localize_script( 'ajax-script', 'my_ajax_object',
		array( 'ajax_url' => admin_url( 'admin-ajax.php' ) ) );
}

add_action('wp_ajax_footer_form', 'footer_form');
add_action('wp_ajax_nopriv_footer_form', 'footer_form');
function footer_form(){
	$name = trim(htmlspecialchars($_POST['name']));
	$phone = trim(htmlspecialchars($_POST['phone']));
	$email = trim(htmlspecialchars($_POST['email']));
	$msg   = trim(htmlspecialchars($_POST['msg']));
	$mail_to = get_bloginfo("admin_email");
	$thm  = 'Пользователь заказал консультацию';
	$thm  = "=?utf-8?b?". base64_encode($thm) ."?=";
	$headers = "Content-Type: text/html; charset=utf-8\n";
	$headers .= 'From: Разработка сайтов' . "\r\n";
	$content = "Имя: " . $name . '<br />';
	$content .= "E-mail: " . $email . '<br />';
	$content .= "Телефон: " . $phone . '<br />';
	$content .= "Сообщение: " . $msg . '<br />';
	$title  = 'Пользователь заказал консультацию';
	if(mail($mail_to, $thm, $msg, $headers)){
		$data =  pll__('Спасибо за Ваше сообщение! Наш менеджер вскоре с Вами свяжется!');	
		
	}else
	$data = pll__('Что-то пошло не так! Попробуйте еще, отправить сообщение');


	if ( defined( 'DOING_AJAX' ) && DOING_AJAX ){
		echo $data;
		wp_die();
	}
}



if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
		'page_title' 	=> 'Theme General Settings',
		'menu_title'	=> 'Theme Settings',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
	
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Контакты',
		'menu_title'	=> 'Контакты',
		'parent_slug'	=> 'theme-general-settings',
	));
	
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Всплывающие окна',
		'menu_title'	=> 'Всплывающие окна',
		'parent_slug'	=> 'theme-general-settings',
	));
	
}



// `Disable Emojis` Plugin Version: 1.7.2
if( 'Отключаем Emojis в WordPress' ){

	/**
	 * Disable the emoji's
	 */
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

	/**
	 * Filter function used to remove the tinymce emoji plugin.
	 * 
	 * @param    array  $plugins  
	 * @return   array             Difference betwen the two arrays
	 */
	function disable_emojis_tinymce( $plugins ) {
		if ( is_array( $plugins ) ) {
			return array_diff( $plugins, array( 'wpemoji' ) );
		}

		return array();
	}

	/**
	 * Remove emoji CDN hostname from DNS prefetching hints.
	 *
	 * @param  array  $urls          URLs to print for resource hints.
	 * @param  string $relation_type The relation type the URLs are printed for.
	 * @return array                 Difference betwen the two arrays.
	 */
	function disable_emojis_remove_dns_prefetch( $urls, $relation_type ) {

		if ( 'dns-prefetch' == $relation_type ) {

			// Strip out any URLs referencing the WordPress.org emoji location
			$emoji_svg_url_bit = 'https://s.w.org/images/core/emoji/';
			foreach ( $urls as $key => $url ) {
				if ( strpos( $url, $emoji_svg_url_bit ) !== false ) {
					unset( $urls[$key] );
				}
			}

		}

		return $urls;
	}

}
function itsme_disable_feed() {
	wp_die( __( 'No feed available, please visit the <a href="'. esc_url( home_url( '/' ) ) .'">homepage</a>!' ) );
}
function my_deregister_scripts(){
	wp_deregister_script( 'wp-embed' );
}
add_action( 'wp_footer', 'my_deregister_scripts' );
add_action('do_feed', 'itsme_disable_feed', 1);
add_action('do_feed_rdf', 'itsme_disable_feed', 1);
add_action('do_feed_rss', 'itsme_disable_feed', 1);
add_action('do_feed_rss2', 'itsme_disable_feed', 1);
add_action('do_feed_atom', 'itsme_disable_feed', 1);
add_action('do_feed_rss2_comments', 'itsme_disable_feed', 1);
add_action('do_feed_atom_comments', 'itsme_disable_feed', 1);
remove_action( 'wp_head', 'feed_links_extra', 3 );
remove_action( 'wp_head', 'feed_links', 2 );

remove_action( 'wp_head', 'wlwmanifest_link');

function crunchify_cleanup_query_string( $src ){ 
	$parts = explode( '?', $src ); 
	return $parts[0]; 
} 
add_filter( 'script_loader_src', 'crunchify_cleanup_query_string', 15, 1 ); 
add_filter( 'style_loader_src', 'crunchify_cleanup_query_string', 15, 1 );
remove_action('wp_head', 'rest_output_link_wp_head', 10);
remove_action('wp_head', 'wp_oembed_add_discovery_links', 10);
remove_action('template_redirect', 'rest_output_link_header', 11, 0);
remove_action ('wp_head', 'rsd_link');
define('IMG_SIZE', [
	'programming' => [
		'width' => 244,
		'height' => 244,
		'crop' => true
	],
	'event-thumbnail' => [
		'width' => 370,
		'height' => 220,
		'crop' => true
	],
	'carousel' => [
		'width' => 229,
		'height' => 420,
		'crop' => true
	],
	'product' => [
		'width' => 385,
		'height' => 230,
		'crop'  => true
	],
	'icon' => [
		'width' => 90,
		'height' => 90,
		'crop'  => true,
	],
	'slider-big' => [
		'width' => 930,
		'height' => 660,
		'crop'  => true,
	]
]);
function wp_img_resize( $url, $size = '') {

	if(!$url OR !$size) return $url;

	$url = str_replace('https:', 'http:', $url);
	if(mb_strpos($url, '-150x150.') !== false){

		$url = str_replace('-150x150.', '.', $url);
	}

	if(is_array($size)){
		$size_data = $size;
	}
	else{
		$size_data = IMG_SIZE[$size] ?? [];
	}

	if(!$size_data || !isset($size_data['width']) || !$size_data['width'] || mb_strpos(basename($url), '.svg') !== false) return $url;


	$width = (int)$size_data['width'];
	$height = isset($size_data['height']) ? $size_data['height'] : null;
	$crop = isset($size_data['crop']) ? $size_data['crop'] : null;
	$single = isset($size_data['crop']) ? $size_data['crop'] : true;

	$upload_info = wp_upload_dir();
	$upload_dir = $upload_info['basedir'];
	$upload_url = str_replace('https:', 'http:', $upload_info['baseurl']);



	if(mb_strpos( $url, $upload_url ) === false) return false;

	$rel_path = str_replace( $upload_url, '', $url);
	$img_path = $upload_dir . $rel_path;

	if( !file_exists($img_path) OR !getimagesize($img_path) ) return false;

	$info = pathinfo($img_path);
	$ext = $info['extension'];
	list($orig_w,$orig_h) = getimagesize($img_path);

	$dims = image_resize_dimensions($orig_w, $orig_h, $width, $height, $crop);
	$dst_w = $dims[4];
	$dst_h = $dims[5];

	$suffix = "{$dst_w}x{$dst_h}";
	$dst_rel_path = str_replace( '.'.$ext, '', $rel_path);
	$destfilename = "{$upload_dir}{$dst_rel_path}-{$suffix}.{$ext}";

	if(!$dst_h) {
		$img_url = $url;
		$dst_w = $orig_w;
		$dst_h = $orig_h;
	} elseif(file_exists($destfilename) && getimagesize($destfilename)) {
		$img_url = "{$upload_url}{$dst_rel_path}-{$suffix}.{$ext}";
	} else {
		$resized_img_path = image_resize( $img_path, $width, $height, $crop );
		if(!is_wp_error($resized_img_path)) {
			$resized_rel_path = str_replace( $upload_dir, '', $resized_img_path);
			$img_url = $upload_url . $resized_rel_path;
		} else {
			return false;
		}
	}
	if($single) {
		$image = $img_url;
	} else {
		$image = array (
			0 => $img_url,
			1 => $dst_w,
			2 => $dst_h
		);
	}

    /*if($size == 'thumb-max'){
        global $post;
        print_array_server_die(wp_get_attachment_image_url(get_post_meta($post->ID,'thumb_max',true)));
    }*/


    return $image;
}

/*  WOOCOMMERCE  */
add_action( 'after_setup_theme', 'woocommerce_support' );
function woocommerce_support() {
	add_theme_support('woocommerce');
}
add_filter( 'request', 'change_requerst_vars_for_product_cat' );
add_filter( 'term_link', 'term_link_filter', 10, 3 );
add_filter( 'post_type_link', 'wpp_remove_slug', 10, 3 );
add_action( 'pre_get_posts', 'wpp_change_request' );

function change_requerst_vars_for_product_cat($vars) {

	global $wpdb;
	if ( ! empty( $vars[ 'pagename' ] ) || ! empty( $vars[ 'category_name' ] ) || ! empty( $vars[ 'name' ] ) || ! empty( $vars[ 'attachment' ] ) ) {
		$slug   = ! empty( $vars[ 'pagename' ] ) ? $vars[ 'pagename' ] : ( ! empty( $vars[ 'name' ] ) ? $vars[ 'name' ] : ( ! empty( $vars[ 'category_name' ] ) ? $vars[ 'category_name' ] : $vars[ 'attachment' ] ) );
		$exists = $wpdb->get_var( $wpdb->prepare( "SELECT t.term_id FROM $wpdb->terms t LEFT JOIN $wpdb->term_taxonomy tt ON tt.term_id = t.term_id WHERE tt.taxonomy = 'product_cat' AND t.slug = %s", array( $slug ) ) );
		if ( $exists ) {
			$old_vars = $vars;
			$vars     = array( 'product_cat' => $slug );
			if ( ! empty( $old_vars[ 'paged' ] ) || ! empty( $old_vars[ 'page' ] ) ) {
				$vars[ 'paged' ] = ! empty( $old_vars[ 'paged' ] ) ? $old_vars[ 'paged' ] : $old_vars[ 'page' ];
			}
			if ( ! empty( $old_vars[ 'orderby' ] ) ) {
				$vars[ 'orderby' ] = $old_vars[ 'orderby' ];
			}
			if ( ! empty( $old_vars[ 'order' ] ) ) {
				$vars[ 'order' ] = $old_vars[ 'order' ];
			}
		}
	}

	return $vars;

}

function term_link_filter( $url, $term, $taxonomy ) {

	$url = str_replace( "/product-category/", "/", $url );
	return $url;

}

function wpp_remove_slug( $post_link, $post, $name ) {

	if ( 'product' != $post->post_type || 'publish' != $post->post_status ) {
		return $post_link;
	}
	$post_link = str_replace( '/' . $post->post_type . '/', '/', $post_link );

	return $post_link;

}

function wpp_change_request( $query ) {

	if ( ! $query->is_main_query() || 2 != count( $query->query ) || ! isset( $query->query[ 'page' ] ) ) {
		return;
	}
	if ( ! empty( $query->query[ 'name' ] ) ) {
		$query->set( 'post_type', array( 'post', 'product', 'page' ) );
	}

}

add_action('wp_ajax_filter_price', 'filter_price');
add_action('wp_ajax_nopriv_filter_price', 'filter_price');
function filter_price(){
	$term = $_POST['term'];
	$max  = $_POST['max'];
	$min  = $_POST['min'];
	$query = new WP_Query(array(
		'post_type' => 'product',
		'tax_query' => array(
			array(
				'taxonomy' => 'product_cat',
				'field'    => 'id',
				'terms'    => $term,
			)
		),
		'meta_query' => array(
			'_price'=>array(
				'key' => '_price',
				'value' => array($min, $max),
				'compare' => 'BETWEEN',
				'type' => 'NUMERIC',
			),
			'orderby' => '_price',
			'order'   => 'ASC',
		)
	));
	if($query->have_posts()){

		while ( $query->have_posts() ) {
			$query->the_post();
			wc_get_template_part( 'content', 'product' );
		}
	}
	else{
		echo '<p class="woocommerce-info">Товаров, соответствующих вашему запросу, не обнаружено.</p>';
	}
	wp_die();


}



add_filter('woocommerce_currency_symbol','change_rub_currency_symbol',10,2);
function change_rub_currency_symbol( $currency_symbol, $currency ) {
	switch( $currency ) {case'RUB':$currency_symbol=' р.'; break;}
	return $currency_symbol;
}

add_filter( 'woocommerce_cart_needs_shipping', 'filter_woocommerce_cart_needs_shipping_new');
function filter_woocommerce_cart_needs_shipping_new($needs_shipping) {
	if (is_cart()) return false;
	return true;
}

add_action( 'wp_footer', 'cart_refresh_update_qty', 100 );

function cart_refresh_update_qty() {
	if ( is_cart() ) {
		?>
		<script type="text/javascript">
			jQuery('div.woocommerce').on('change', 'input.qty', function(){
				setTimeout(function() {
					jQuery('[name="update_cart"]').trigger('click');
				}, 100 );
			});
		</script>
		<?php
	}
}

add_filter( 'woocommerce_checkout_fields' , 'customize_checkout_fields' );

function customize_checkout_fields( $fields ) {
	unset($fields['order']['order_comments']);
	return $fields;
}



