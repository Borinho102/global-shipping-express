<?php

/*-----------------------------------------------------------------------------------*/
/* Enqueue script and styles */
/*-----------------------------------------------------------------------------------*/

function logistic_cargo_trucking_enqueue_google_fonts() {

	require_once get_theme_file_path( 'core/includes/wptt-webfont-loader.php' );

	wp_enqueue_style(
		'google-fonts-poppins',
		wptt_get_webfont_url( 'https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap' ),
		array(),
		'1.0'
	);
}
add_action( 'wp_enqueue_scripts', 'logistic_cargo_trucking_enqueue_google_fonts' );


if (!function_exists('logistic_cargo_trucking_enqueue_scripts')) {

	function logistic_cargo_trucking_enqueue_scripts() {

		wp_enqueue_style(
			'bootstrap-css', get_template_directory_uri() . '/css/bootstrap.css',
			array(),'4.5.0'
		);

		wp_enqueue_style(
			'fontawesome-css', get_template_directory_uri() . '/css/fontawesome-all.css',
			array(),'4.5.0'
		);

		wp_enqueue_style(
			'owl.carousel-css', get_template_directory_uri() . '/css/owl.carousel.css',
			array(),'2.3.4'
		);

		wp_enqueue_style('logistic-cargo-trucking-style', get_stylesheet_uri(), array() );

		wp_style_add_data('logistic-cargo-trucking-style', 'rtl', 'replace');

		wp_enqueue_style(
			'logistic-cargo-trucking-media-css', get_template_directory_uri() . '/css/media.css',
			array(),'2.3.4'
		);

		wp_enqueue_style(
			'dashicons',
			get_template_directory_uri(),
			array(),'2.3.4'
		);

		wp_enqueue_style(
			'logistic-cargo-trucking-woocommerce-css', get_template_directory_uri() . '/css/woocommerce.css',
			array(),'2.3.4'
		);

		wp_enqueue_script(
			'logistic-cargo-trucking-navigation', get_template_directory_uri() . '/js/navigation.js',
			FALSE,
			'1.0',
			TRUE
		);

		wp_enqueue_script(
			'owl.carousel-js', get_template_directory_uri() . '/js/owl.carousel.js',
			array('jquery'),
			'2.3.4',
			TRUE
		);

		wp_enqueue_script(
			'logistic-cargo-trucking-script', get_template_directory_uri() . '/js/script.js',
			array('jquery'),
			'1.0',
			TRUE
		);

		if ( is_singular() ) wp_enqueue_script( 'comment-reply' );

		$logistic_cargo_trucking_css = '';

		if ( get_header_image() ) :

			$logistic_cargo_trucking_css .=  '
				header.header {
					background-image: url('.esc_url(get_header_image()).');
					-webkit-background-size: cover !important;
					-moz-background-size: cover !important;
					-o-background-size: cover !important;
					background-size: cover !important;
				}';

		endif;

		wp_add_inline_style( 'logistic-cargo-trucking-style', $logistic_cargo_trucking_css );

		// Theme Customize CSS.
		require get_template_directory(). '/core/includes/inline.php';
		wp_add_inline_style( 'logistic-cargo-trucking-style',$logistic_cargo_trucking_custom_css );

	}

	add_action( 'wp_enqueue_scripts', 'logistic_cargo_trucking_enqueue_scripts' );

}

/**------------------------------------------------------------------------------------------
 * Enqueue theme logo style.
 */
function logistic_cargo_trucking_logo_resizer() {

    $logistic_cargo_trucking_theme_logo_size_css = '';
    $logistic_cargo_trucking_logo_resizer = get_theme_mod('logistic_cargo_trucking_logo_resizer');

	$logistic_cargo_trucking_theme_logo_size_css = '
		.custom-logo{
			height: '.esc_attr($logistic_cargo_trucking_logo_resizer).'px !important;
			width: '.esc_attr($logistic_cargo_trucking_logo_resizer).'px !important;
		}
	';
    wp_add_inline_style( 'logistic-cargo-trucking-style',$logistic_cargo_trucking_theme_logo_size_css );

}
add_action( 'wp_enqueue_scripts', 'logistic_cargo_trucking_logo_resizer' );

/*-----------------------------------------------------------------------------------*/
/* Enqueue Global color style */
/*-----------------------------------------------------------------------------------*/
function logistic_cargo_trucking_global_color() {

    $logistic_cargo_trucking_theme_color_css = '';
    $logistic_cargo_trucking_global_color = get_theme_mod('logistic_cargo_trucking_global_color');
    $logistic_cargo_trucking_global_color_2 = get_theme_mod('logistic_cargo_trucking_global_color_2');
    $logistic_cargo_trucking_copyright_bg = get_theme_mod('logistic_cargo_trucking_copyright_bg');

	$logistic_cargo_trucking_theme_color_css = '
		.button-box,#main-menu ul.children li a:hover,#main-menu ul.sub-menu li a:hover,p.slider_btn a,.slider .owl-nav button,.pagination .nav-links a:hover,.pagination .nav-links a:focus,.pagination .nav-links span.current,.logistic-cargo-trucking-pagination span.current,.logistic-cargo-trucking-pagination span.current:hover,.logistic-cargo-trucking-pagination span.current:focus,.logistic-cargo-trucking-pagination a span:hover,.logistic-cargo-trucking-pagination a span:focus,.comment-respond input#submit,.comment-reply a,.sidebar-area .tagcloud a:hover,.searchform input[type=submit],.searchform input[type=submit]:hover ,.searchform input[type=submit]:focus,.menu-toggle,.dropdown-toggle,.scroll-up a,nav.woocommerce-MyAccount-navigation ul li,.woocommerce .woocommerce-info .button, .woocommerce .woocommerce-message .button,.woocommerce-page .woocommerce-info .button, .woocommerce-page .woocommerce-message .button,.woocommerce button.button,.woocommerce a.button,.woocommerce a.button.alt,.woocommerce a.button,.sidebar-area h4.title,.sidebar-area .tagcloud a,.woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, .woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce a.added_to_cart,  p.wp-block-tag-cloud a,.sidebar-area h4.title, .sidebar-area h1.wp-block-heading, .sidebar-area h2.wp-block-heading, .sidebar-area h3.wp-block-heading, .sidebar-area h4.wp-block-heading, .sidebar-area h5.wp-block-heading, .sidebar-area h6.wp-block-heading, .sidebar-area .wp-block-search__label,.searchform input[type=submit], .sidebar-area .wp-block-search__button {
			background: '.esc_attr($logistic_cargo_trucking_global_color).';
		}
		a:hover,a:focus,.logo a:hover,.logo a:focus,.header p i,.social-links a,#main-menu a:hover,#main-menu ul li a:hover,#main-menu li:hover > a,#main-menu a:focus,#main-menu ul li a:focus,#main-menu li.focus > a,#main-menu li:focus > a,#main-menu ul li.current-menu-item > a,#main-menu ul li.current_page_item > a,#main-menu ul li.current-menu-parent > a,#main-menu ul li.current_page_ancestor > a,#main-menu ul li.current-menu-ancestor > a,.post-meta i,.logo a:hover,.logo a:focus,.header p span,.woocommerce ul.products li.product .price, .woocommerce div.product p.price, .woocommerce div.product span.price {
			color: '.esc_attr($logistic_cargo_trucking_global_color).';
		}
		#main-menu a:hover,#main-menu ul li a:hover,#main-menu li:hover > a,#main-menu a:focus,#main-menu ul li a:focus,#main-menu li.focus > a,#main-menu li:focus > a,#main-menu ul li.current-menu-item > a,#main-menu ul li.current_page_item > a,#main-menu ul li.current-menu-parent > a,.section_two .owl-carousel button.owl-dot.active,.slider .owl-carousel button.owl-dot.active,#main-menu a:hover,#main-menu ul li.current_page_ancestor > a,#main-menu ul li.current-menu-ancestor > a, .sh2, .sidebar-area h4.title {
			border-color: '.esc_attr($logistic_cargo_trucking_global_color).';
		}
		p.slider_btn a,.slider .owl-nav button {
			background: '.esc_attr($logistic_cargo_trucking_global_color).' !important;
		}
		.menu-block,footer,.scroll-up a:hover,.wp-playlist-dark,nav.woocommerce-MyAccount-navigation ul li:hover,.woocommerce #respond input#submit.alt:hover, .woocommerce a.button.alt:hover, .woocommerce button.button.alt:hover, .woocommerce input.button.alt:hover,.woocommerce #respond input#submit:hover, .woocommerce a.button:hover, .woocommerce button.button:hover, .woocommerce input.button:hover,.woocommerce a.added_to_cart:hover,.woocommerce ul.products li.product .onsale,.woocommerce span.onsale {
			background: '.esc_attr($logistic_cargo_trucking_global_color_2).';
		}
		p.slider_btn a:hover,.comment-respond input#submit:hover,.comment-reply a:hover {
			background: '.esc_attr($logistic_cargo_trucking_global_color_2).'!important;
		}
		a,h1,h2,h3,h4,h5,h6,.header p,.logo a,.logo span,.social-links a:hover,.top-header p,#main-menu ul.children li a ,#main-menu ul.sub-menu li a,pre,.woocommerce ul.products li.product .price,.woocommerce div.product p.price, .woocommerce div.product span.price{
			color: '.esc_attr($logistic_cargo_trucking_global_color_2).';
		}
		.slider .owl-nav button,.sidebar-area .tagcloud a{
			color: '.esc_attr($logistic_cargo_trucking_global_color_2).'!important;
		}
		.section_two .owl-carousel button.owl-dot{
			border-color: '.esc_attr($logistic_cargo_trucking_global_color_2).';
		}
		  .copyright {
			background: '.esc_attr($logistic_cargo_trucking_copyright_bg).';
		}
	}
	';
    wp_add_inline_style( 'logistic-cargo-trucking-style',$logistic_cargo_trucking_theme_color_css );
    wp_add_inline_style( 'logistic-cargo-trucking-woocommerce-css',$logistic_cargo_trucking_theme_color_css );

}
add_action( 'wp_enqueue_scripts', 'logistic_cargo_trucking_global_color' );

/*-----------------------------------------------------------------------------------*/
/* Setup theme */
/*-----------------------------------------------------------------------------------*/

if (!function_exists('logistic_cargo_trucking_after_setup_theme')) {

	function logistic_cargo_trucking_after_setup_theme() {

		if ( ! isset( $logistic_cargo_trucking_content_width ) ) $logistic_cargo_trucking_content_width = 900;

		register_nav_menus( array(
			'main-menu' => esc_html__( 'Main menu', 'logistic-cargo-trucking' ),
		));

		add_theme_support( 'responsive-embeds' );
		add_theme_support( 'align-wide' );
		add_theme_support('title-tag');
		add_theme_support('automatic-feed-links');
		add_theme_support('post-thumbnails');
		add_theme_support( 'wp-block-styles' );
		add_theme_support( 'woocommerce' );
		add_theme_support( 'custom-background', array(
		  'default-color' => 'f3f3f3'
		));

		add_theme_support( 'custom-logo', array(
			'height'      => 70,
			'width'       => 70,
		) );

		add_theme_support( 'custom-header', array(
			'header-text' => false,
			'width' => 1920,
			'height' => 100,
			'flex-width' => true,
			'flex-height' => true,
		));
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		add_theme_support( 'post-formats', array('image','video','gallery','audio',) );

		add_editor_style( array( '/css/editor-style.css' ) );
	}

	add_action( 'after_setup_theme', 'logistic_cargo_trucking_after_setup_theme', 999 );

}

require get_template_directory() .'/core/includes/main.php';
require get_template_directory() .'/core/includes/tgm.php';
require get_template_directory() . '/core/includes/customizer.php';
load_template( trailingslashit( get_template_directory() ) . '/core/includes/class-upgrade-pro.php' );

/*-----------------------------------------------------------------------------------*/
/* Get post comments */
/*-----------------------------------------------------------------------------------*/

if (!function_exists('logistic_cargo_trucking_comment')) :
    /**
     * Template for comments and pingbacks.
     *
     * Used as a callback by wp_list_comments() for displaying the comments.
     */
    function logistic_cargo_trucking_comment($comment, $args, $depth){

        if ('pingback' == $comment->comment_type || 'trackback' == $comment->comment_type) : ?>

            <li id="comment-<?php comment_ID(); ?>" <?php comment_class('media'); ?>>
            <div class="comment-body">
                <?php esc_html_e('Pingback:', 'logistic-cargo-trucking');
                comment_author_link(); ?><?php edit_comment_link(__('Edit', 'logistic-cargo-trucking'), '<span class="edit-link">', '</span>'); ?>
            </div>

        <?php else : ?>

        <li id="comment-<?php comment_ID(); ?>" <?php comment_class(empty($args['has_children']) ? '' : 'parent'); ?>>
            <article id="div-comment-<?php comment_ID(); ?>" class="comment-body media mb-4">
                <a class="pull-left" href="#">
                    <?php if (0 != $args['avatar_size']) echo get_avatar($comment, $args['avatar_size']); ?>
                </a>
                <div class="media-body">
                    <div class="media-body-wrap card">
                        <div class="card-header">
                            <h5 class="mt-0"><?php /* translators: %s: author */ printf('<cite class="fn">%s</cite>', get_comment_author_link() ); ?></h5>
                            <div class="comment-meta">
                                <a href="<?php echo esc_url(get_comment_link($comment->comment_ID)); ?>">
                                    <time datetime="<?php comment_time('c'); ?>">
                                        <?php /* translators: %s: Date */ printf( esc_attr('%1$s at %2$s', '1: date, 2: time', 'logistic-cargo-trucking'), esc_attr( get_comment_date() ), esc_attr( get_comment_time() ) ); ?>
                                    </time>
                                </a>
                                <?php edit_comment_link( __( 'Edit', 'logistic-cargo-trucking' ), '<span class="edit-link">', '</span>' ); ?>
                            </div>
                        </div>

                        <?php if ('0' == $comment->comment_approved) : ?>
                            <p class="comment-awaiting-moderation"><?php esc_html_e('Your comment is awaiting moderation.', 'logistic-cargo-trucking'); ?></p>
                        <?php endif; ?>

                        <div class="comment-content card-block">
                            <?php comment_text(); ?>
                        </div>

                        <?php comment_reply_link(
                            array_merge(
                                $args, array(
                                    'add_below' => 'div-comment',
                                    'depth' => $depth,
                                    'max_depth' => $args['max_depth'],
                                    'before' => '<footer class="reply comment-reply card-footer">',
                                    'after' => '</footer><!-- .reply -->'
                                )
                            )
                        ); ?>
                    </div>
                </div>
            </article>

            <?php
        endif;
    }
endif; // ends check for logistic_cargo_trucking_comment()

if (!function_exists('logistic_cargo_trucking_widgets_init')) {

	function logistic_cargo_trucking_widgets_init() {

		register_sidebar(array(

			'name' => esc_html__('Sidebar','logistic-cargo-trucking'),
			'id'   => 'logistic-cargo-trucking-sidebar',
			'description'   => esc_html__('This sidebar will be shown next to the content.', 'logistic-cargo-trucking'),
			'before_widget' => '<div id="%1$s" class="sidebar-widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4 class="title">',
			'after_title'   => '</h4>'

		));

		register_sidebar(array(

			'name' => esc_html__('Footer sidebar','logistic-cargo-trucking'),
			'id'   => 'logistic-cargo-trucking-footer-sidebar',
			'description'   => esc_html__('This sidebar will be shown next at the bottom of your content.', 'logistic-cargo-trucking'),
			'before_widget' => '<div id="%1$s" class="col-lg-3 col-md-3 %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4 class="title">',
			'after_title'   => '</h4>'

		));

	}

	add_action( 'widgets_init', 'logistic_cargo_trucking_widgets_init' );

}

function logistic_cargo_trucking_get_categories_select() {
	$logistic_cargo_trucking_teh_cats = get_categories();
	$results;
	$logistic_cargo_trucking_count = count($logistic_cargo_trucking_teh_cats);
	for ($i=0; $i < $logistic_cargo_trucking_count; $i++) {
	if (isset($logistic_cargo_trucking_teh_cats[$i]))
  		$results[$logistic_cargo_trucking_teh_cats[$i]->slug] = $logistic_cargo_trucking_teh_cats[$i]->name;
	else
  		$logistic_cargo_trucking_count++;
	}
	return $results;
}

 // Change number or products per row to 3
add_filter('loop_shop_columns', 'logistic_cargo_trucking_loop_columns');
if (!function_exists('logistic_cargo_trucking_loop_columns')) {
	function logistic_cargo_trucking_loop_columns() {
		$columns = get_theme_mod( 'logistic_cargo_trucking_per_columns', 3 );
		return $columns;
	}
}

//Change number of products that are displayed per page (shop page)
add_filter( 'loop_shop_per_page', 'logistic_cargo_trucking_per_page', 20 );
function logistic_cargo_trucking_per_page( $cols ) {
  	$cols = get_theme_mod( 'logistic_cargo_trucking_product_per_page', 9 );
	return $cols;
}

//redirect
Function logistic_cargo_trucking_notice(){
    global $pagenow;
    if ( is_admin() && ('themes.php' == $pagenow) && isset( $_GET['activated'] ) ) {
   		wp_safe_redirect( admin_url("themes.php?page=logistic-cargo-trucking-guide-page") );
   	}
}
add_action('after_setup_theme', 'logistic_cargo_trucking_notice');


?>
