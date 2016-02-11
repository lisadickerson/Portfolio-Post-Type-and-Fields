<?php

/**
 * @link              aliaslead.com
 * @since             1.0.0
 * @package           Portfolio_Post_Type_And_Fields
 *
 * @wordpress-plugin
 * Plugin Name:       Portfolio Post Type and Fields
 * Plugin URI:        aliaslead.com
 * Description:       This plugin creates a custom post type for portfolio items with custom display fields.
 * Version:           1.0.0
 * Author:            Lisa E. A. Dickerson
 * Author URI:        aliaslead.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       portfolio-post-type-and-fields
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/*--------------------------------------------*
 * Create Custom Post type with Custom Fields
 *--------------------------------------------*/

add_action( 'init', 'register_cpt_portfolio_item' );

function register_cpt_portfolio_item() {

	 /*--------------------------------------------*
	 * Labels
	 *--------------------------------------------*/

    $labels = array(
    'name' => _x( 'Portfolio items', 'portfolio_item' ),
    'singular_name' => _x( 'Portfolio item', 'portfolio_item' ),
    'add_new' => _x( 'Add New', 'portfolio_item' ),
    'add_new_item' => _x( 'Add New Portfolio item', 'portfolio_item' ),
    'edit_item' => _x( 'Edit Portfolio item', 'portfolio_item' ),
    'new_item' => _x( 'New Portfolio item', 'portfolio_item' ),
    'view_item' => _x( 'View Portfolio item', 'portfolio_item' ),
    'search_items' => _x( 'Search Portfolio items', 'portfolio_item' ),
    'not_found' => _x( 'No portfolio items found', 'portfolio_item' ),
    'not_found_in_trash' => _x( 'No portfolio items found in Trash', 'portfolio_item' ),
    );

	 /*--------------------------------------------*
	 * Supports
	 *--------------------------------------------*/
	$supports = array(
	'title',
	 'editor',
	  'author',
	   'thumbnail',
	    'trackbacks',
	     'custom-fields',
	      'comments',
	       'page-attributes'
	       );
	 /*--------------------------------------------*
	 * Arguments
	 *--------------------------------------------*/
    $args = array(
    'labels' => $labels,
    'supports' => $supports,
    'hierarchical' => false,
    'description' => 'A singular item or art work example in you portfolio post type',
    'taxonomies' => array( 'category', 'post_tag',  ),
    'public' => true,
    'publicly_queryable' => true,
    'exclude_from_search' => false,
    'show_ui' => true,
    'menu_position' => 4,
    //'menu_icon' =>get_stylesheet_directory_uri()  . '/images/icon_wp_nav.png',
    'menu_icon' =>'dashicons-portfolio',
    //'has_archive' => true,
    'has_archive' => 'portfolio-items',
    'query_var' => true,
    'can_export' => true,
    'rewrite' => true,
    'capability_type' => 'post',
	// rewrite:gets rid of the _ in the slug which google won't read as a space. Bad for seo
	'rewrite' => array('slug' => 'portfolio-item'),
    );

	/*--------------------------------------------*
	* REGISTER CUSTOM FIELD GROUPS
	*--------------------------------------------*/

	if(function_exists("register_field_group")) {
	register_field_group(array (
		'id' => 'acf_optimal-project-details',
		'title' => 'PROJECT DETAILS :<i> are optional</i>',
		'fields' => array (

            //Thumbnail:Image
  			array (
				'key' => 'field_532cda305049d',
				'label' => 'thumb-nail-image',
				'name' => 'thumb-nail-image',
				'type' => 'image',
				'instructions' => 'Add a full sized image for lightbox',
				'required' => 1,
				'save_format' => 'url',
				'preview_size' => 'thumbnail',
				'prepend' => '<a href=',
				'maxlength' => '',
				'library' => 'all',
			),

			//Client Name:Text
			array (
				'key' => 'field_532bc31d1ac83',
				'label' => 'Client Name:',
				'name' => 'client_name',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),

			// Development Roles:Check Box
			array (
				'key' => 'field_532bc3931ac84',
				'label' => 'Development Roles:',
				'name' => 'development_role',
				'type' => 'checkbox',
				'instructions' => 'Pick a role',
				'required' => 1,
				'choices' => array (
					'Group Project' => 'Group Project',
					'Developer' => 'Developer',
					'Designer' => 'Designer',
					'Project Manager' => 'Project Manager',
					'Production' => 'Production',
					'Lead Designer and Developer' => 'Lead Designer and Developer',
					'' => '',
				),
				'default_value' => '',
				'layout' => 'horizontal',
			),

			//Site Url:Text
			array (
				'key' => 'field_532bd7f41ac87',
				'label' => 'Url: ',
				'name' => 'site_url',
				'type' => 'text',
				'instructions' => 'Your live project web address',
				'default_value' => '',
				'prepend' => '',
				'placeholder' => 'www.yourproject.com',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),

			//Gallery Field:ACF and ACF-Gallery or ACF-Pro are required for this field to work
			array (
				'key' => 'field_5334f29cb8a81',
				'label' => 'Work Flow Examples',
				'name' => 'work_flow_examples',
				'type' => 'gallery',
				'instructions' => 'Include work flow in order: logo design, information architecture, wire-frames, visual designs, final template.',
				'preview_size' => 'thumbnail',
				'library' => 'all',
			),

		),

			'location' => array (
				array (
					array (
						'param' => 'post_type',
						'operator' => '==',
						'value' => 'portfolio_item',
						'order_no' => 0,
						'group_no' => 0,
					),
				),
			),

			'options' => array (
				'position' => 'normal',
				'layout' => 'default',
				'hide_on_screen' => array (
					0 => 'custom_fields',
				),
			),
			'menu_order' => 0,
		));
	}// close fields


    register_post_type( 'portfolio_item', $args );
    }//close function

/*--------------------------------------------*
* Close Custom post type
*--------------------------------------------*/


/*--------------------------------------------*
* TROUBLE SHOOTING ERRORS:
 * using search bar categories or words leaves the top menu in place and visible
 * selecting categories in side bar removes top menu links
 * adding nav_menu_item to the below function leaves the menu in place
 * but place the menu item post ids in the side bar as errors ?
 *
 * It was working fine in plugin test site?
*--------------------------------------------*/

/*--------------------------------------------*
* just 3 diff way to add custom post type taxonomy to categories ,tags and widgets
 * not working it resets the running query post and adds the taxonomy but it
 * wont work with out adding the nav_menu_items and if you do that
 *  it breaks the nav any time you use a category link
*--------------------------------------------*/

add_filter('pre_get_posts', 'query_post_type');
function query_post_type($query) {
	if(is_category() || is_tag()) {
		$post_type = get_query_var('post_type');
		if($post_type)
			$post_type = $post_type;
		else
			$post_type = array('post','<strong>portfolio_item</strong><strong>'); // replace cpt to your custom post type
		$query->set('post_type',$post_type);
		return $query;
	}
}

function add_custom_types_to_tax( $query ) {
	if( is_category() || is_tag() && empty( $query->query_vars['suppress_filters'] ) ) {

// Get all your post types
		//$post_types = get_post_types();
		$post_types = array( 'post', 'portfolio_item' );

		$query->set( 'post_type', $post_types );
		return $query;
	}
}

add_filter( 'pre_get_posts', 'add_custom_types_to_tax' );

function post_type_tags_fix($request) {
    if ( isset($request['tag']) && !isset($request['post_type']) )
        $request['post_type'] = 'any';
    return $request;
}
add_filter('request', 'post_type_tags_fix');




/*--------------------------------------------*
 * Custom Instructions for Portfolio post
 *--------------------------------------------*/

function portfolio_text_after_title( $post_type ) {
    $screen = get_current_screen();
    $edit_post_type = $screen->post_type;
    if ( $edit_post_type != 'portfolio_item' )
        return;
    ?>
    <div class="after-title-help postbox">
        <h3>Use this screen to add new items to the Portfolio or edit existing ones.</h3>
        <div class="inside">
            <p>You must add a <b>Featured Image and Categories</b> for it to work!<br><b>PROJECT DETAILS:</b> <i>are optional.</i></p>
            <p>Crop images to fit. <b>Featured Image Size:</b> 300 x 350 px. <b>Examples:</b> max width 600 px.</p>
        </div><!-- .inside -->
    </div><!-- .postbox -->
<?php }
add_action( 'edit_form_after_title', 'portfolio_text_after_title' );

/*--------------------------------------------*
 * Custom Admin Menu changes
 *--------------------------------------------*/

// Rename Posts to Articles in Menu
function change_post_menu_label() {
    global $menu;
    global $submenu;
    $menu[5][0] = 'Blog Articles';
    $submenu['edit.php'][5][0] = 'Blog Articles';
    $submenu['edit.php'][10][0] = 'Add New ';
}
add_action( 'admin_menu', 'change_post_menu_label' );

// Rename Pages  to Web Pages in Menu
function change_page_menu_label() {
global $menu;
global $submenu;
$menu[20][0] = 'Web Pages';
echo '';
}
add_action( 'admin_menu', 'change_page_menu_label' );


// Re-Order the menu display
function change_menu_order( $menu_order ) {
    return array(
        'index.php',//Home in the dash
        'edit.php',//blog post
        'edit.php?post_type=portfolio_item',//new post type for portfolio
        'edit.php?post_type=page',//pages
        'upload.php',// media
    );
}
add_filter( 'custom_menu_order', '__return_true' );
add_filter( 'menu_order', 'change_menu_order' );




?>



