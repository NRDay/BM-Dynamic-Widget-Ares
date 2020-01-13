<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       bang-media.com
 * @since      1.0.0
 *
 * @package    Bm_Dynamic_Widget_Areas
 * @subpackage Bm_Dynamic_Widget_Areas/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Bm_Dynamic_Widget_Areas
 * @subpackage Bm_Dynamic_Widget_Areas/admin
 * @author     Mr Neil R Day <neil@bang-media.com>
 */
class Bm_Dynamic_Widget_Areas_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The options name to be used in this plugin
	 *
	 * @since  	1.0.0
	 * @access 	private
	 * @var  	string 		$option_name 	Option name of this plugin
	 */
	private $option_name = 'bm_dynamic_widget_areas';

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Bm_Dynamic_Widget_Areas_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Bm_Dynamic_Widget_Areas_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		//wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/bm-dynamic-widget-areas-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Bm_Dynamic_Widget_Areas_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Bm_Dynamic_Widget_Areas_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/bm-dynamic-widget-areas-admin.js', array( 'jquery' ), $this->version, false );

	}

	/**
	 * Add an options page under the Settings submenu
	 *
	 * @since  1.0.0
	 */
	public function add_options_page() {
	
		$this->plugin_screen_hook_suffix = add_options_page(
			__( 'Dynamic Widget Areas Settings', 'bm-dynamic-widget-areas' ),
			__( 'Dynamic Widget Areas', 'bm-dynamic-widget-areas' ),
			'manage_options',
			$this->plugin_name,
			array( $this, 'display_options_page' )
		);
	
	}

	/**
	 * Render the options page for plugin
	 *
	 * @since  1.0.0
	 */
	public function display_options_page() {
		include_once 'partials/bm-dynamic-widget-areas-admin-display.php';
	}

	/**
	 * Register all related settings of this plugin
	 *
	 * @since  1.0.0
	 */
	public function register_setting() {

		add_settings_section(
			$this->option_name,
			__( '', 'bm-dynamic-widget-areas' ),
			array( $this, $this->option_name . '_items_form_cb' ),
			$this->plugin_name
		);

		register_setting( $this->plugin_name, $this->option_name );

	}

	/**
	 * Render the text for the general section
	 *
	 * @since  1.0.0
	 */
	public function bm_dynamic_widget_areas_items_form_cb() {
		echo '<p>' . __( 'Add or delete your custom sidebars below.', 'bm-dynamic-widget-areas' ) . '</p>';

		$widget_areas = get_option( $this->option_name );

		if (!empty($widget_areas) && is_array($widget_areas) ) { ?>
			
			<div id="bm-dwa-areas-wrap">
				<fieldset id="bm-dwa-areas"> 

				<?php 

					$area_count = 0;
					foreach ($widget_areas as $area) {
						
						include 'partials/bm-dynamic-widget-areas-field.php';

						$area_count++;
					}

				?>

				</fieldset>
				
				<?php echo '<p><button id="bm-dwa-add" class="button">' . __( 'Add Widget Area', 'bm-dynamic-widget-areas' ) . '</button></p>';?>

			</div>

			<?php 

		} else { ?>
			
			<div id="bm-dwa-areas-wrap">

				<fieldset id="bm-dwa-areas"> 

				</fieldset>
				
				<?php echo '<p><button id="bm-dwa-add" class="button">' . __( 'Add Widget Area', 'bm-dynamic-widget-areas' ) . '</button></p>';?>

			</div>

			<?php 

		}
	}

	/**
	 * Register the saved widget areas
	 *
	 * @since  1.0.0
	 */
	public function bm_dynamic_widget_areas_register_areas() {

		$sidebars = get_option('bm_dynamic_widget_areas'); // get all the sidebars names

	  	if ( ! empty($sidebars) ) {
	    	// add a sidebar for every sidebar name
	    	foreach ( $sidebars as $sidebar ) {
        		register_sidebar(array(
		          	'name' => $sidebar['name'],
		          	'id' => $sidebar['id'],
                	'before_widget' => '<div><section id="%1$s" class="uk-card uk-card-default widget uk-box-shadow-large %2$s">',
                	'after_widget'  => '</div></section></div>',
                	'before_title'  => '<div class="uk-card-header uk-padding-small uk-background-secondary uk-light"><h4 class="widget-title">',
                	'after_title'   => '</h4></div><div class="uk-card-body uk-background-default uk-padding-small uk-text-break widget-inner">',
        		));
	    	}
	  	}		
		
	}

}
