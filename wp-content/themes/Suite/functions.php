<?php
/**
 * Functions file
 *
 * For some the main file in a theme. Here we display meta informaion and the
 * header information like menus .
 *
 * Sets up the theme and provides some helper functions. Some helper functions
 * are used in the theme as custom template tags. Others are attached to action and
 * filter hooks in WordPress to change core functionality.
 * 
 */
require get_template_directory() . '/classes/Suite_Main.php';

require get_template_directory() . '/classes/class-tgm-plugin-activation.php';

if( ! class_exists( 'Suite' ) ){
    class Suite{

        public function __construct(){
            /**
              *Run after instalation setup.
            **/     
            $this->theme_setup();

            /**
              *Register actions using add_actions() custom function.
            **/     
            $this->add_actions();

            /**
              *Register filters using add_filters() custom function.
            **/     
            $this->add_filters();

            /**
              *Register theme option custom function.
            **/     
            $this->add_theme_options();

            /**
              *Register plugin  custom function.
            **/     
            $this->add_plugin_options();
        }
        public function theme_setup(){
            /**
              *Add after_setup_theme() for specific functions.
            **/     
            add_action('after_setup_theme', array($this, 'theme_setup_core') );
        }
        public function theme_setup_core(){
            /**
              *Support post-thubnails as well!
            **/
            add_theme_support( 'post-thumbnails' );
            set_post_thumbnail_size( 'large', 1920, 400, true ); // The slider max (and all other big images.)
            set_post_thumbnail_size( 'medium', 760, 350, true ); // Default medium size
            set_post_thumbnail_size( 'small', 100, 100, true );  // Small size

            /**
              *Register the menus.
            **/
            register_nav_menus( 
                array( 
                    'primary'    => __( 'Primary Menu', 'suite' ), 
                    'secondary'    => __( 'Secondary Menu', 'suite' )
                )
            );
           
        }
        public function add_actions(){
            /**
              *Register all scripts and style
            **/     
            add_action( 'wp_enqueue_scripts', array($this, 'load_scripts_and_styles') );

            /**
              *Register our Widgets
            **/
            add_action( 'widgets_init', array( $this, 'widgets_init' ) );

            /**
              *Register custom fonts used in the theme
            **/        
            add_action('wp_print_styles', array( $this, 'load_fonts' ));

            /**
              *Register favicon in the theme
            **/        
            add_action('wp_head', array( $this, 'add_my_favicon' ));
            add_action('admin_head', array( $this, 'add_my_favicon' ));


        }
        public function load_scripts_and_styles(){
            /**
              *Enqueue style.css
            **/             
            wp_enqueue_style( 'style_suite', get_template_directory_uri() . '/css/style.css' );

            /**
              *Enqueue easySlider.js
            **/
            wp_enqueue_script( 'easySlider_suite', get_template_directory_uri() . '/js/easySlider1.7.js', array ( 'jquery' ), 1.7, '');
            /**
              *Enqueue suite.js
            **/
            wp_enqueue_script( 'suite_js', get_template_directory_uri() . '/js/suite.js', array ( 'jquery' ), '', '');
        }
        public function widgets_init(){
            /**
              *Registration for the widgets.
            **/
            register_sidebar( array(
                'name'          => __( 'Home Page Widget Area', 'suite' ),
                'id'            => 'sidebar-1',
                'description'   => __( 'Appears on home page', 'suite' ),
                'before_widget' => '<aside id="%1$s" class="widget %2$s">',
                'after_widget'  => '</aside>',
                'before_title'  => '<h3 class="widget-title">',
                'after_title'   => '</h3>',
            ) );

        }
        public function load_fonts(){
            /**
              *Enqueue googleFonts
            **/

            /*wp_register_style('googleFonts', 'http://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700');
            wp_enqueue_style( 'googleFonts');*/

        }
        public function add_my_favicon(){
            /**
              *Adding fabicon
            **/
            $favicon_path = get_template_directory_uri() . '/images/favicon.ico';
            //$favicon_path = home_url() . '/wp-content/uploads/2017/07/favicon.ico';
            echo '<link rel="shortcut icon" href="' . $favicon_path . '" type="image/x-icon" />';
        }
        public function add_filters(){
            /**
              *Menu item filter for class add
            **/
            add_filter( 'wp_nav_menu_objects', array( $this, 'add_last_class_to_last_menu' ) );
            
            /**
              *CF7 Text Field validation filter for class
            **/
            add_filter( 'wpcf7_validate_text*', array( $this, 'custom_name_confirmation_validation_filter'), 20, 2 );
            /**
              *CF7 Email Field validation filter for class
            **/
            add_filter( 'wpcf7_validate_email*', array( $this, 'custom_email_confirmation_validation'), 20, 2 );           
        }
        public function add_last_class_to_last_menu($items){
            /**
              *Add a class to last top-level menu item
            **/
            $items[count($items)]->classes[] = 'last';
            return $items;
        }
        public function add_theme_options(){
             /**
                *These files build out the theme specific options and associated functions. 
              **/
            if ( get_stylesheet_directory() == get_template_directory() ) {
                define('OF_FILEPATH', get_template_directory());
                define('OF_DIRECTORY', get_template_directory_uri());
            } else {
                define('OF_FILEPATH', get_stylesheet_directory());
                define('OF_DIRECTORY', get_template_directory_uri());
            }
            require_once (OF_FILEPATH . '/admin/admin-functions.php'); 
            require_once (OF_FILEPATH . '/admin/admin-interface.php');  
            require_once (OF_FILEPATH . '/admin/theme-options.php');
            require_once (OF_FILEPATH . '/admin/theme-functions.php');
        }
        public function add_plugin_options(){
            /**
              *Add tgmpa_register() for specific functions.
            **/     
            add_action('tgmpa_register', array($this, 'theme_register_required_plugins') );        

        }
        public function theme_register_required_plugins(){
           /**
              *Included Plugins functions.
            **/ 
           require get_template_directory() . '/classes/function-plugins.php';
        }
        public function custom_name_confirmation_validation_filter($result, $tag){
            /**
              *CF7 Text Field validation.
            **/

            $tag = new WPCF7_FormTag( $tag );
     
            if ( 'fname' == $tag->name ) {
                $your_email = isset( $_POST['fname'] ) ? trim( $_POST['fname'] ) : '';
            $regex = '/^[a-zA-Z ]{2,150}$/'; 
            if (!preg_match($regex, $your_email)) {
                    $result->invalidate( $tag, "Please input alphabet characters only" );
                }
            }
            elseif ( 'subject' == $tag->name ) {
                $your_email = isset( $_POST['Object'] ) ? trim( $_POST['Object'] ) : '';
            $regex = '/^[a-zA-Z ]{2,150}$/'; 
            if (!preg_match($regex, $your_email)) {
                    $result->invalidate( $tag, "Please input alphabet characters only" );
                }
            }          
            return $result;
        }
        public function custom_email_confirmation_validation($result, $tag){
            /**
              *CF7 Email Field validation.
            **/
            $tag = new WPCF7_FormTag( $tag ); 
            if ( 'email' == $tag->name ) {
                $your_email = isset( $_POST['email'] ) ? trim( $_POST['email'] ) : '';
            $regex = '/^[A-Za-z0-9](([_\.\-]?[a-zA-Z0-9]+)*)@([A-Za-z0-9]+)(([\.\-]?[a-zA-Z0-9]+)*)\.([A-Za-z]{2,})$/'; 
            if (!preg_match($regex, $your_email)) {
                    $result->invalidate( $tag, "Invalid email type" );
                }
            }
            return $result;
        }
    	
    }
    $Suite = new Suite;
}