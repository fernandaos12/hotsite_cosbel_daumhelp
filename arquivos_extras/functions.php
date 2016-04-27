<?php

require_once( dirname( __FILE__ ) . '/include/common.php' );

// Backwards compatibility for older than PHP 5.3.0
if ( !defined( '__DIR__' ) ) { define( '__DIR__', dirname(__FILE__) ); }

/* Include Admin */
require_once( dirname( __FILE__ ) . '/admin/inc.php' );

if( ! is_admin() ) {
	/* Include Front-end */
	require_once( dirname( __FILE__ ) . '/include/inc.php' );
}

/**
 * Set up the content width value based on the theme's design.
 *
 * @see master_content_width()
 *
 * @since master 1.0
 */
if ( ! isset( $content_width ) ) { $content_width = 474; }

/**
 * Adjust content_width value for image attachment template.
 *
 * @since master 1.0
 */
function master_content_width() {
	if ( is_attachment() && wp_attachment_is_image() ) { $GLOBALS['content_width'] = 810; }
}
add_action( 'template_redirect', 'master_content_width' );



/**************************************************************************/

/**
 * Theme setup.
 *
 * Set up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support post thumbnails.
 *
 * @since master 1.0
 */
add_action('wp_enqueue_scripts', 'wpmidia_enqueue_masked_input');
function wpmidia_enqueue_masked_input(){

     wp_enqueue_script('masked-input', get_template_directory_uri().'/js/jquery.maskedinput.min.js', array('jquery'));

}
add_action('wp_footer', 'wpmidia_activate_masked_input');

function wpmidia_activate_masked_input(){
   if( is_page() ){ //mais uma vez, feito isso, o script abaixo só aparecerá na página Contato.
?>

         <script type="text/javascript">

                jQuery( function($){

                     $(".data").mask("99/99/9999");
                     $(".celular").mask("(99) 99999-9999");
                     $(".fixo").mask("(99) 9999-9999");
                     $(".cpf").mask("999.999.999-99");
                     $(".cep").mask("99.999-999");
                     $(".cnpj").mask("99.999.999/9999-99");

                });

         </script>

<?php 
   }
}


// Pagination
function wp_pagination($pages = '', $range = 9)
{  
    global $wp_query, $wp_rewrite;  
    $wp_query->query_vars['paged'] > 1 ? $current = $wp_query->query_vars['paged'] : $current = 1;  
    $pagination = array(  
        'base' => @add_query_arg('page','%#%'),  
        'format' => '',  
        'total' => $wp_query->max_num_pages,  
        'current' => $current,  
        'show_all' => true,  
        'type' => 'plain'  
    );  
    if ( $wp_rewrite->using_permalinks() ) $pagination['base'] = user_trailingslashit( trailingslashit( remove_query_arg( 's', get_pagenum_link( 1 ) ) ) . 'page/%#%/', 'paged' );  
    if ( !empty($wp_query->query_vars['s']) ) $pagination['add_args'] = array( 's' => get_query_var( 's' ) );  
    echo '<div class="wp_pagination">'.paginate_links( $pagination ).'</div>';
}



function master_theme_setup() {

	// This theme styles the visual editor to resemble the theme style.
	add_editor_style( array( 'css/editor-style.css' ) );

	add_theme_support( "title-tag" );

	// Add RSS feed links to <head> for posts and comments.
	add_theme_support( 'automatic-feed-links' );

	// Enable support for Post Thumbnails, and declare two sizes.
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'woocommerce' );

	/* Master Images Size */
	add_image_size( 'thumb-1920-1020', 1920, 1020, true ); // Slider Image
	add_image_size( 'thumb-450-450', 450, 450, true ); // Service Image
	add_image_size( 'thumb-280-590', 280, 590, true ); // Feature Image
	add_image_size( 'thumb-847-351', 847, 351, true ); // Blog Full
	add_image_size( 'thumb-300-210', 300, 210, true ); // Blog Thumbnails
	add_image_size( 'thumb-617-1244', 617, 1244, true ); // Application Image
	add_image_size( 'thumb-480-400', 380, 300, true ); // Team Image
	add_image_size( 'thumb-867-1000', 867, 1000, true ); // About Image
	/* Master Images Size /- */

	set_post_thumbnail_size( 672, 372, true );
	
	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'primary'   => __( 'Primary menu', TXT_DOMAIN ),
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	/*
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'audio', 'quote', 'link', 'gallery',
	) );
	*/

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
	) );
}
add_action( 'after_setup_theme', 'master_theme_setup' );

/**************************************************************************/

/**
 * Enqueue scripts and styles for the front end.
 *
 * @since master 1.0
 */
function master_enqueue_scripts()
{
	// load the Internet Explorer specific stylesheet.
	wp_enqueue_style( 'ie-css', get_template_directory_uri() . '/css/ie.css' , '20131205' );
	wp_style_add_data( 'ie-css', 'conditional', 'lt IE 9' );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	/* load fonts */
	wp_enqueue_style( 'Raleway', '//fonts.googleapis.com/css?family=Raleway:400,100,200,300,500,600,700,800,900', array(), null, 'screen' );
	wp_enqueue_style( 'Montserrat', '//fonts.googleapis.com/css?family=Montserrat:400,700', array(), null, 'screen' );
	wp_enqueue_style( 'Roboto', '//fonts.googleapis.com/css?family=Roboto:400,300italic,300,100italic,100,400italic,500,500italic,700,700italic,900,900italic', array(), null, 'screen' );
	wp_enqueue_style( 'font-awesome-min', get_template_directory_uri() . '/libraries/fonts/font-awesome.min.css', array(), null );
	wp_enqueue_style( 'elegant-icon', get_template_directory_uri() . '/libraries/fonts/elegant/elegant-icon.css', array(), null );

	wp_enqueue_style( 'bootstrap-min', get_template_directory_uri() . '/libraries/bootstrap/bootstrap.min.css', array(), null );
	wp_enqueue_script( 'bootstrap-min', get_template_directory_uri() . '/libraries/bootstrap/bootstrap.min.js', array( 'jquery' ),  null, true );

	/* Theme CSS */
	wp_enqueue_style( 'components', get_template_directory_uri() . '/css/components.css', array(), null );
	wp_enqueue_style( 'header', get_template_directory_uri() . '/css/header.css', array(), null );

	wp_enqueue_style( 'master-stylesheet', get_stylesheet_uri(), null );	

	wp_enqueue_style( 'master-theme', get_template_directory_uri() . '/css/theme.css', array(), null );
	wp_enqueue_style( 'responsive-media', get_template_directory_uri() . '/css/media.css', array(), null );
	wp_enqueue_style( 'animate-min', get_template_directory_uri() . '/libraries/animate/animate.min.css', array(), null );

	global $master_option;

	if( IsNullOrEmptyString( $master_option['opt_select_stylesheet'] ) ) : 
		$current_style = $master_option['opt_select_stylesheet'];
	else :
		$current_style = 'default';
	endif;
	wp_enqueue_style( 'master-theme-color', get_template_directory_uri() . '/css/color-schemes/'.$current_style.'.css', array(), '3.2' );

	wp_enqueue_script( 'jquery-appear', get_template_directory_uri() . '/libraries/jquery.appear.js', array( 'jquery' ),  null, true );
	wp_enqueue_script( 'modernizr-custom', get_template_directory_uri() . '/libraries/modernizr/modernizr.custom.13711.js', array( 'jquery' ),  null, true );
	wp_enqueue_script( 'jquery-easing-min', get_template_directory_uri() . '/libraries/jquery.easing.min.js', array( 'jquery' ),  null, true );

	/* theme js */
	wp_enqueue_script( 'master-functions', get_template_directory_uri() . '/js/functions.js', array( 'jquery' ),  null, true );
}
add_action( 'wp_enqueue_scripts', 'master_enqueue_scripts' );

// IE8
function master_ie_scripts() {
	?>
	<!--[if lt IE 9]>
		<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/html5/html5shiv.js"></script>
		<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/html5/respond.min.js"></script>
	<![endif]-->

	<script type="text/javascript">
		var templateUrl = '<?php echo esc_url( get_template_directory_uri() ); ?>';
	</script>
	<?php
}
add_action( 'wp_head', 'master_ie_scripts' );

/**************************************************************************/



/**************************************************************************/

/**
 * Enqueue scripts and styles for the admin
 *
 * @since master 1.0
 */
function master_admin_scripts() {
	wp_enqueue_style( 'wp-admin-style', get_template_directory_uri() . '/admin/assets/css/admin.css', array(), null );
}
add_action( 'admin_enqueue_scripts', 'master_admin_scripts' );

/**************************************************************************/

if ( ! function_exists( 'master_comment_nav' ) ) :
/**
 * Display navigation to next/previous comments when applicable.
 *
 * @since Master 1.0
 */
function master_comment_nav()
{
	// Are there comments to navigate through?
	if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
	?>
	<nav class="navigation comment-navigation" role="navigation">
		<!-- h2 class="screen-reader-text"><?php _e( 'Comment navigation', TXT_DOMAIN ); ?></h2 -->
		<div class="nav-links">
			<?php
				if ( $prev_link = get_previous_comments_link( __( 'Older Comments', TXT_DOMAIN ) ) ) :
					printf( '<div class="nav-previous">%s</div>', $prev_link );
				endif;

				if ( $next_link = get_next_comments_link( __( 'Newer Comments', TXT_DOMAIN ) ) ) :
					printf( '<div class="nav-next">%s</div>', $next_link );
				endif;
			?>
		</div><!-- .nav-links -->
	</nav><!-- .comment-navigation -->
	<?php
	endif;
}
endif;

/**************************************************************************/

/**
 * Extend the default WordPress body classes.
 *
 * @since master 1.0
 *
 * @param array $classes A list of existing body class values.
 * @return array The filtered body class list.
 */
function master_body_classes( $classes )
{
	if ( is_singular() && ! is_front_page() ) {
		$classes[] = 'singular';
	}

	return $classes;
}
add_filter( 'body_class', 'master_body_classes' );


/**
 * Extend the default WordPress post classes.
 *
 * Adds a post class to denote:
 * Non-password protected page with a post thumbnail.
 *
 * @since master 1.0
 *
 * @param array $classes A list of existing post class values.
 * @return array The filtered post class list.
 */
function master_post_classes( $classes )
{
	if ( ! is_attachment() && has_post_thumbnail() ) { $classes[] = 'has-post-thumbnail'; }
	return $classes;
}
add_filter( 'post_class', 'master_post_classes' );

if ( ! function_exists( 'master_paging_nav' ) ) :
/**
 * Display navigation to next/previous set of posts when applicable.
 *
 * @since master 1.0
 */
function master_paging_nav() {
	// Don't print empty markup if there's only one page.
	if ( $GLOBALS['wp_query']->max_num_pages < 2 ) {
		return;
	}

	$paged        = get_query_var( 'paged' ) ? intval( get_query_var( 'paged' ) ) : 1;
	$pagenum_link = html_entity_decode( get_pagenum_link() );
	$query_args   = array();
	$url_parts    = explode( '?', $pagenum_link );

	if ( isset( $url_parts[1] ) ) {
		wp_parse_str( $url_parts[1], $query_args );
	}

	$pagenum_link = remove_query_arg( array_keys( $query_args ), $pagenum_link );
	$pagenum_link = trailingslashit( $pagenum_link ) . '%_%';

	$format  = $GLOBALS['wp_rewrite']->using_index_permalinks() && ! strpos( $pagenum_link, 'index.php' ) ? 'index.php/' : '';
	$format .= $GLOBALS['wp_rewrite']->using_permalinks() ? user_trailingslashit( 'page/%#%', 'paged' ) : '?paged=%#%';

	// Set up paginated links.
	$links = paginate_links( array(
		'base'     => $pagenum_link,
		'format'   => $format,
		'total'    => $GLOBALS['wp_query']->max_num_pages,
		'current'  => $paged,
		'mid_size' => 1,
		'add_args' => array_map( 'urlencode', $query_args ),
		'prev_text' => __( '&larr; Previous', TXT_DOMAIN ),
		'next_text' => __( 'Next &rarr;', TXT_DOMAIN ),
	) );

	if ( $links ) :

	?>
	<nav class="navigation paging-navigation" role="navigation">
		<!--h1 class="screen-reader-text"><?php // _e( 'Posts navigation', TXT_DOMAIN ); ?></h1-->
		<div class="pagination loop-pagination">
			<ul class="pagination">
				<li> <?php echo html_entity_decode( $links ); ?> </li>
			</ul>
		</div><!-- .pagination -->
	</nav><!-- .navigation -->
	<?php
	endif;
}
endif;

if ( ! function_exists( 'master_posted_on' ) ) :
/**
 * Print HTML with meta information for the current post-date/time and author.
 *
 * @since master 1.0
 */
function master_posted_on() {

	// Set up and print post meta information.
	printf( '<span class="entry-date"><a href="%1$s" rel="bookmark"><time class="post-date updated entry-date" datetime="%2$s"><i></i>%3$s</time></a></span> <span class="byline"><i></i><span class="vcard author post-author"><a class="url fn n" href="%4$s" rel="author">%5$s</a></span></span>',
		esc_url( get_permalink() ),
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
		get_the_author()
	);
}
endif;

/**
 * Display an optional post thumbnail.
 *
 * Wraps the post thumbnail in an anchor element on index
 * views, or a div element when on single views.
 *
 * @since master 1.0
 */
function master_post_thumbnail() {
	if ( is_attachment() || ! has_post_thumbnail() ) {
		return;
	}

	if ( is_singular() ) :
	?>

	<div class="post-thumbnail">
		<?php the_post_thumbnail(); ?>
	</div>

	<?php else : ?>

	<a class="post-thumbnail" href="<?php the_permalink(); ?>">
		<?php the_post_thumbnail(); ?>
	</a>

	<?php endif; // End is_singular()
}

/* ************************************************************************ */

if( ! function_exists('ow_comment_form') ) {

/**
 * Comment form
 */

function ow_comment_form($args = array(), $post_id = null )
{
    if ( null === $post_id )
	{
        $post_id = get_the_ID();
	}
    else
	{
        $id = $post_id;
	}

    $commenter = wp_get_current_commenter();
    $user = wp_get_current_user();
    $user_identity = $user->exists() ? $user->display_name : '';

    if ( ! isset( $args['format'] ) )
        $args['format'] = current_theme_supports( 'html5', 'comment-form' ) ? 'html5' : 'xhtml';
		$req	=	get_option( 'require_name_email' );
		$aria_req	=	( $req ? " aria-required='true'" : '' );
		$html5	=	'html5' === $args['format'];
		$fields = array(
			'author' => '<div class="form-group"><div class="col-sm-6 comment-form-author"><input class="form-control"  id="author" placeholder="' . __( 'Name', TXT_DOMAIN ) . '" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" ' . $aria_req . ' /></div>',
			'email'  => '<div class="col-sm-6 comment-form-email"><input id="email" class="form-control" name="email" placeholder="' . __( 'Email', TXT_DOMAIN ) . '" ' . ( $html5 ? 'type="email"' : 'type="text"' ) . ' value="' . esc_attr(  $commenter['comment_author_email'] ) . '" ' . $aria_req . ' required /></div></div>',
			'url'    => '<div class="form-group"><div class=" col-sm-12 comment-form-url">' . '<input class="form-control" placeholder="'. __( 'Website', TXT_DOMAIN ) .'"  id="url" name="url" ' . ( $html5 ? 'type="url"' : 'type="text"' ) . ' value="' . esc_attr( $commenter['comment_author_url'] ) . '" /></div></div>',
        );
		$required_text = sprintf( ' ' . __('Required fields are marked %s', TXT_DOMAIN ), '<span class="required">*</span>' );
		$defaults = array(
			'fields'               => apply_filters( 'comment_form_default_fields', $fields ),
			'comment_field'        => '<div class="form-group comment-form-comment"><div class="col-sm-12"><textarea class="form-control" id="comment" name="comment" placeholder="' . _x( 'Comment', 'noun', TXT_DOMAIN ) . '" rows="8" aria-required="true"></textarea></div></div>',
			'must_log_in'          => '<div class="alert alert-danger must-log-in">' . sprintf( __( 'You must be <a href="%s">logged in</a> to post a comment.' ), wp_login_url( apply_filters( 'the_permalink', get_permalink( $post_id ) ) ) ) . '</div>',
			'logged_in_as'         => '<div class="alert alert-info logged-in-as">' . sprintf( __( 'Logged in as <a href="%1$s">%2$s</a>. <a href="%3$s" title="Log out of this account">Log out?</a>', TXT_DOMAIN ), get_edit_user_link(), $user_identity, wp_logout_url( apply_filters( 'the_permalink', get_permalink( $post_id ) ) ) ) . '</div>',
			'comment_notes_before' => '<div class="alert alert-info comment-notes">' . __( 'Your email address will not be published.', TXT_DOMAIN ) . ( $req ? $required_text : '' ) . '</div>',
			'comment_notes_after'  => '<div class="form-allowed-tags">' . sprintf( __( 'You may use these <abbr title="HyperText Markup Language">HTML</abbr> tags and attributes: %s', TXT_DOMAIN ), ' <code>' . allowed_tags() . '</code>' ) . '</div>',
			'id_form'              => 'commentform',
			'id_submit'            => 'submit',
			'title_reply'          => __( 'Leave a Reply', TXT_DOMAIN ),
			'title_reply_to'       => __( 'Leave a Reply to %s', TXT_DOMAIN ),
			'cancel_reply_link'    => __( 'Cancel reply', TXT_DOMAIN ),
			'label_submit'         => __( 'Post Comment', TXT_DOMAIN ),
			'format'               => 'xhtml',
		);

		$args = wp_parse_args( $args, apply_filters( 'comment_form_defaults', $defaults ) );

		if ( comments_open( $post_id ) )
		{
			do_action( 'comment_form_before' ); ?>

			<div id="respond" class="comment-respond">
				<h3 id="reply-title" class="comment-reply-title">
					<?php comment_form_title( $args['title_reply'], $args['title_reply_to'] ); ?> 
					<small><?php cancel_comment_reply_link( $args['cancel_reply_link'] ); ?></small>
				</h3>
				<?php
				if ( get_option( 'comment_registration' ) && !is_user_logged_in() )
				{
					echo html_entity_decode( $args['must_log_in'] );
					do_action( 'comment_form_must_log_in_after' );
				}
				else
				{
					?>
					<form action="<?php echo site_url( '/wp-comments-post.php' ); ?>" method="post" id="<?php echo esc_attr( $args['id_form'] ); ?>" class="form-horizontal comment-form"<?php echo esc_attr( $html5 ) ? ' novalidate' : ''; ?> role="form">
						<?php
						do_action( 'comment_form_top' );

						if ( is_user_logged_in() )
						{
							echo apply_filters( 'comment_form_logged_in', $args['logged_in_as'], $commenter, $user_identity );
							do_action( 'comment_form_logged_in_after', $commenter, $user_identity );
						}
						else
						{
							echo html_entity_decode( $args['comment_notes_before'] );

							do_action( 'comment_form_before_fields' );

							foreach ( (array) $args['fields'] as $name => $field )
							{
								echo apply_filters( "comment_form_field_{$name}", $field ) . "\n";
							}

							do_action( 'comment_form_after_fields' );
						}

						echo apply_filters( 'comment_form_field_comment', $args['comment_field'] ); 

						echo html_entity_decode( $args['comment_notes_after'] ); ?>

						<div class="form-submit">
							<input class="btn btn-danger btn-lg" name="submit" type="submit" id="<?php echo esc_attr( $args['id_submit'] ); ?>" value="<?php echo esc_attr( $args['label_submit'] ); ?>" />
							<?php comment_id_fields( $post_id ); ?>
						</div>
						<?php do_action( 'comment_form', $post_id ); ?>
					</form>
					<?php
				}
				?>
			</div><!-- #respond -->
			<?php
			do_action( 'comment_form_after' );
		}
		else
		{
			do_action( 'comment_form_comments_closed' );
		}
	}
}
