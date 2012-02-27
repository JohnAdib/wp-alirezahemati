<?php 

include ( 'aq_resizer.php' );
include ( 'service-widget.php' );



/* Load scripts */

function lod_scripts() {
	global $post;

	wp_enqueue_style( 'style', get_stylesheet_uri() );
	//wp_enqueue_style( 'flexslider', get_template_directory_uri() . '/flexslider.css' );
	
	//wp_enqueue_script( 'carousal', get_template_directory_uri() . '/js/jquery.carouFredSel-5.6.1-packed.js', array( 'jquery' ), '20120206', true );
	//wp_enqueue_script( 'flex-slider', get_template_directory_uri() . '/js/jquery.flexslider-min.js', array( 'jquery' ), '20120206', true );
	//wp_enqueue_script( 'superfish', get_template_directory_uri() . '/js/superfish.js', array( 'jquery' ), '20120206', true );
	wp_enqueue_script( 'custom', get_template_directory_uri() . '/js/custom.js', array( 'jquery' ),  true );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}


}
add_action( 'wp_enqueue_scripts', 'lod_scripts' );


/* Set content width */

if ( ! isset( $content_width ) )
	$content_width = 640; /* pixels */


/**
 * Add default posts and comments RSS feed links to head
*/
 
add_theme_support( 'automatic-feed-links' );
	
	
/* SIDEBARS */
if ( function_exists('register_sidebar') )


	register_sidebar(array(
	'name' => 'Services',
	'description' => 'یک کادر سه بخشی در زیر اسلایدر صفحه اول. لطفا فقط از سه ابزارک سه بخشی استفاده کنید',
	'before_widget' => '<div class="service-widget %2$s">',
	'after_widget' => '</div>',
	'before_title' => '<h2 class="service-head">',
	'after_title' => '</h2>',
	));		


	register_sidebar(array(
	'name' => 'Sidebar',
	'description' => 'نوار کناری که در وب سایر صفحات بجز صفحه اول نمایش داده می شود',
    'before_widget' => '<li class="sidebox %2$s">',
    'after_widget' => '</li>',
	'before_title' => '<h3 class="sidetitl">',
    'after_title' => '</h3>',
	));

	register_sidebar(array(
	'name' => 'Footer',
	'description' => 'نوار پایینی که در تمامی صفحات قابل نمایش است. بهتر است از 4 کادر استفاده شود.',
	'before_widget' => '<li class="botwid %2$s">',
	'after_widget' => '</li>',
	'before_title' => '<h3 class="bothead">',
	'after_title' => '</h3>',
	));		



if ( ! function_exists( 'web2feel_comment' ) ) :
/**
 * Template for comments and pingbacks.
 *
 * Used as a callback by wp_list_comments() for displaying the comments.
 *
 * @since web2feel 1.0
 */
function web2feel_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case 'pingback' :
		case 'trackback' :
	?>
	<li class="post pingback">
		<p><?php _e( 'بازخورد', 'web2feel' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( '(ویرایش)', ' ' ); ?></p>
	<?php
			break;
		default :
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<article id="comment-<?php comment_ID(); ?>" class="comment">
			<footer>
				<div class="comment-author vcard">
					<?php echo get_avatar( $comment, 80 ); ?>
					<?php printf( '%s <span class="says">گفته:</span>', sprintf( '<cite class="fn">%s</cite>', get_comment_author_link() ) ); ?>
				</div><!-- .comment-author .vcard -->
				
				<?php if ( $comment->comment_approved == '0' ) : ?>
					<em>دیدگاه شما در انتظار تایید است</em>
				<?php endif; ?>

				<div class="comment-meta commentmetadata">
					
					<a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>"><time pubdate datetime="<?php comment_time( 'c' ); ?>">
					<?php
						/* translators: 1: date, 2: time */
						printf( __( '%1$s در ساعت %2$s', 'web2feel' ), get_comment_date(), get_comment_time() ); ?>
					</time></a>
					<?php edit_comment_link( '(ویرایش)', ' ' );
					?>
				</div><!-- .comment-meta .commentmetadata -->
			</footer>

			<div class="comment-content cf">
				<?php comment_text(); ?>
				<div class="reply">
					<?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
				</div><!-- .reply -->
			</div>

			
			<div class="space"></div>
		</article><!-- #comment-## -->

	<?php
			break;
	endswitch;
}
endif; // ends check for web2feel_comment()

	


/* CUSTOM MENUS */	

register_nav_menus( array(
		'primary' => __( 'Primary Navigation', '' ),
	) );

function fallbackmenu(){ ?>
			<div id="submenu">
				<ul><li>با استفاده از بخش فهرست موجود در بخش نمایش، فهرست ایجاد شده خودتان را تنظیم کنید..</li></ul>
			</div>
<?php }	


/* FEATURED THUMBNAILS */

if ( function_exists( 'add_theme_support' ) ) { // Added in 2.9
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'top_feature', 700, 400, true );
	add_image_size( 'index_box', 200, 200, true );

}



/* PAGE NAVIGATION */

function getpagenavi(){
	?>
	<div id="navigation" class="clearfix">
	<?php if(function_exists('wp_pagenavi')) : ?>
	<?php wp_pagenavi() ?>
	<?php else : ?>
	        <div class="alignright"><?php next_posts_link('&laquo; مطالب قدیمی تر') ?></div>
	        <div class="alignleft"><?php previous_posts_link('مطالب جدیدتر &raquo;') ?></div>
	        <div class="clear"></div>
	<?php endif; ?>

	</div>

	<?php
	}
	

/* Excerpt length	 */
	
function wpe_excerptlength_archive($length) {
    return 60;
}
function wpe_excerptlength_index($length) {
    return 40;
}

function wpe_excerptmore($more) {
return '...';
}

function wpe_excerpt($length_callback='', $more_callback='') {
    global $post;
    if(function_exists($length_callback)){
        add_filter('excerpt_length', $length_callback);
    }
    if(function_exists($more_callback)){
        add_filter('excerpt_more', $more_callback);
    }
    $output = get_the_excerpt();
    $output = apply_filters('wptexturize', $output);
    $output = apply_filters('convert_chars', $output);
    $output = '<p>'.$output.'</p>';
    echo $output;
}


/*-----------------------------------------------------------------------------Dashboard Settings------------------------- */
// show theme information on dashboard
function wpc_dashboard_widget_function() {
	echo "<ul>
	<li>زمان انتشار: اردیبهشت ماه 1392</li>
	<li>نام طرح: <a href='http://www.Mixa.ir/tani' title='Tani'>تانی</a></li>
	<li>طراح پوسته: <a href='http://www.Mixa.ir' title='Mixa Group'>تیم میکسا</a></li>
	<li>پشتیبان هاست: <a href='http://www.Mixa.ir' title='گروه هاستینگ میکسا'>Mixa Server</a></li>
	</ul>";
}
function wpc_add_dashboard_widgets() {
	wp_add_dashboard_widget('wp_dashboard_widget', 'اطلاعات فنی پوسته', 'wpc_dashboard_widget_function');
}
add_action('wp_dashboard_setup', 'wpc_add_dashboard_widgets' );

// hide unused metabox from wordpress dashboard
function wpc_dashboard_widgets() {
	global $wp_meta_boxes;

// Remove the quickpress widget
	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_quick_press']);
// Incoming links
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_incoming_links']);
// Plugins
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins']);
// Right Now
	//unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_right_now']);
// recent drafts
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_drafts']);
// recent comments
	//unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_comments']);
// Wordpress News	
	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']);
// Wordpress weblog
	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary']);
	
}
add_action('wp_dashboard_setup', 'wpc_dashboard_widgets');