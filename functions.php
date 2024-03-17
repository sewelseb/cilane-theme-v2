<?php

add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );
function my_theme_enqueue_styles() {
    $parenthandle = 'parent-style'; 
    $theme = wp_get_theme();
    wp_enqueue_style( $parenthandle, get_template_directory_uri() . '/style.css', 
        array(),  
        $theme->parent()->get('Version')
    );
    wp_enqueue_style( 'child-style', get_stylesheet_uri(),
        array( $parenthandle ),
        $theme->get('Version') 
    );
}


/**
 * Register sidebar areas.
 *
 * @link  http://codex.wordpress.org/Function_Reference/register_sidebar
 * @since 1.0.0
 */
function primer_child_register_sidebars() {

	/**
	 * Filter registered sidebars areas.
	 *
	 * @since 1.0.0
	 *
	 * @var array
	 */
	$sidebars = (array) apply_filters(
		'primer_sidebars',
		array(
            'sidebar-what-is-cilane-contextual' => array(
              'name'          => esc_html__( 'Contextual What is cilane Sidebar', 'primer' ),
              'description'   => esc_html__( 'for ...', 'primer' ),
              'before_widget' => '<aside id="%1$s" class="widget %2$s">',
              'after_widget'  => '</aside>',
              'before_title'  => '<h4 class="widget-title">',
              'after_title'   => '</h4>',
            ),

            'sidebar-associations-contextual' => array(
                'name'          => esc_html__( 'Contextual Associations Sidebar', 'primer' ),
                'description'   => esc_html__( 'for ...', 'primer' ),
                'before_widget' => '<aside id="%1$s" class="widget %2$s">',
                'after_widget'  => '</aside>',
                'before_title'  => '<h4 class="widget-title">',
                'after_title'   => '</h4>',
            ),

            'sidebar-archives-contextual' => array(
                'name'          => esc_html__( 'Contextual Archives Sidebar', 'primer' ),
                'description'   => esc_html__( 'for ...', 'primer' ),
                'before_widget' => '<aside id="%1$s" class="widget %2$s">',
                'after_widget'  => '</aside>',
                'before_title'  => '<h4 class="widget-title">',
                'after_title'   => '</h4>',
            ),

			'sidebar-congres-contextual' => array(
                'name'          => esc_html__( 'Contextual Congres Sidebar', 'primer' ),
                'description'   => esc_html__( 'for ...', 'primer' ),
                'before_widget' => '<aside id="%1$s" class="widget %2$s">',
                'after_widget'  => '</aside>',
                'before_title'  => '<h4 class="widget-title">',
                'after_title'   => '</h4>',
            ),

            'sidebar-articles-contextual' => array(
                'id'            => "sidebar-articles-contextual",
                'name'          => esc_html__( 'Contextual Articles Sidebar', 'primer' ),
                'description'   => esc_html__( 'for ...', 'primer' ),
                'before_widget' => '<aside id="%1$s" class="widget %2$s">',
                'after_widget'  => '</aside>',
                'before_title'  => '<h4 class="widget-title">',
                'after_title'   => '</h4>',
            ),

            'sidebar-who-is-who-contextual' => array(
                'name'          => esc_html__( 'Contextual Who\'s Who Sidebar', 'primer' ),
                'description'   => esc_html__( 'for ...', 'primer' ),
                'before_widget' => '<aside id="%1$s" class="widget %2$s">',
                'after_widget'  => '</aside>',
                'before_title'  => '<h4 class="widget-title">',
                'after_title'   => '</h4>',
            ),
			
            'sidebar-jugendaustausch-contextual' => array(
              'id'            => "sidebar-jugendaustausch-contextual",
              'name'          => esc_html__( 'Contextual Jugendaustausch Sidebar', 'primer' ),
              'description'   => esc_html__( 'add a menu here', 'primer' ),
              'before_widget' => '<aside id="%1$s" class="widget %2$s">',
              'after_widget'  => '</aside>',
              'before_title'  => '<h4 class="widget-title">',
              'after_title'   => '</h4>',
          )
		)
	);


	foreach ( $sidebars as $id => $args ) {

		register_sidebar( array_merge( array( 'id' => $id ), $args ) );

	}

}
add_action( 'widgets_init', 'primer_child_register_sidebars' );





/**
 * Events
 */
/*
add_filter( 'tribe_events_pre_get_posts', 'redirect_from_events' );
function redirect_from_events( $query ) {
  if ( is_user_logged_in() )
    return;
 
  if ( ! $query->is_main_query() || ! $query->get( 'eventDisplay' ) )
    return;
 
  // Look for a page with a slug of "logged-in-users-only".
  $target_page = get_posts( [
    'post_type' => 'page',
    'name' => 'logged-in-users-only'
   ] );
 
  // Use the target page URL if found, else use the home page URL.
  if ( empty( $target_page ) ) {
    $url = get_home_url();
  } else {
    $target_page = current( $target_page );
    $url = get_permalink( $target_page->ID );
  }
   
  // Redirect!
  wp_safe_redirect( $url );
  exit;
}

add_filter( 'posts_where', 'restrict_events', 100 );
function restrict_events( $where_sql ) {
  global $wpdb;
  if ( is_user_logged_in() || ! class_exists( 'Tribe__Events__Main' ) ) {
    return $where_sql;
  }
  return $wpdb->prepare( " $where_sql AND $wpdb->posts.post_type <> %s ", Tribe__Events__Main::POSTTYPE );
}

*/

  //remove Archive mention https://theeventscalendar.com/knowledgebase/k/remove-archives-from-calendar-page-title/
add_filter( 'get_the_archive_title', function ( $title ) {
  if ( is_post_type_archive( 'tribe_events' ) ) {
    $title = sprintf( __( '%s' ), post_type_archive_title( '', false ) );
  }
  return $title;    
});

function redirect_to_login() {
    if ( ! is_user_logged_in() && ( is_singular( 'tribe_events' ) || is_post_type_archive( 'tribe_events' ) ) ) {
        wp_redirect( home_url( '/index.php/login/?redirect_to=' . urlencode( get_permalink() ) ) );
        exit;
    }
}
add_action( 'template_redirect', 'redirect_to_login' );



/**
 * Add a list of clickable category links below the event
 * search bar.
 * https://theeventscalendar.com/knowledgebase/add-a-list-of-category-links-below-the-search-bar-2/
 *
 * Can be easily styled using the following selector:
 *
 * .the-events-calendar-category-list
 */
add_action(
    'tribe_template_after_include:events/v2/components/events-bar',
    function() {
        $terms = get_terms( [ 'taxonomy' => Tribe__Events__Main::TAXONOMY ] );
 
        if ( empty( $terms ) || is_wp_error( $terms ) ) {
            return;
        }
 
        echo '<div class="the-events-calendar-category-list"><ol>';
 
        foreach ( $terms as $single_term ) {
            $url  = esc_url( get_term_link( $single_term ) );
            $name = esc_html( get_term_field( 'name', $single_term ) );
 
            echo "<li><a href='$url'>$name</a> </li>";
        }
 
        echo '</ol></div>';
    }
);


/**
 * end Events
 */

/**
 * WooCommerce redirect
 */

function redirect_wc_to_login() {
    if ( ! is_user_logged_in() && ( is_woocommerce() || is_shop() || is_cart() || is_checkout() || is_product() ) ) {
        wp_redirect( home_url( '/index.php/login/?redirect_to=' . urlencode( get_permalink() ) ) );
        exit;
    }
}
add_action( 'template_redirect', 'redirect_wc_to_login' );

/**
 * end WooCommerce
 */

/**
 * KnowledgeBase redirect
 */

function redirect_kb_to_login() {
    if( !is_user_logged_in() && strpos( $_SERVER['REQUEST_URI'], '/index.php/documents/' ) !== false ) {
        wp_redirect( home_url( '/index.php/login/?redirect_to=' . urlencode( $_SERVER['REQUEST_URI'] ) ) );
        exit;
    }
}
add_action( 'template_redirect', 'redirect_kb_to_login' );

/**
 *end KnowledgeBase
 */


 //no author in posts
// function twentyten_posted_on() {
//   printf( __( '<span class="%1$s">Posted on</span> %2$s <span class="meta-sep">', 'twentyten' ),
//     'meta-prep meta-prep-author',
//     sprintf( '<a href="%1$s" title="%2$s" rel="bookmark"><span class="entry-date">%3$s</span></a>',
//       get_permalink(),
//       esc_attr( get_the_time() ),
//       get_the_date()
//     )
//   );
// }

