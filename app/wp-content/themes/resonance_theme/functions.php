<?php






    function rei_theme_stylesheets() {
        wp_register_script( 'rei-jquery', get_template_directory_uri() .'/js/jquery.min.js', NULL, 1.0, true);
        wp_register_script( 'rei-app', get_template_directory_uri() .'/js/app1.js', NULL, 1.0, true);
        wp_register_script( 'rei-parallax', get_template_directory_uri() .'/js/parallax.js', NULL, 1.0, true);
        wp_register_script( 'rei-includeHTML', get_template_directory_uri() .'/js/includeHTML.js', NULL, 1.0, true);
        wp_enqueue_script( 'rei-jquery' );
        wp_enqueue_script( 'rei-app' );
        wp_enqueue_script( 'rei-parallax' );
        wp_enqueue_script( 'rei-includeHTML' );



        wp_register_style( 'rei-themesytle',  get_stylesheet_directory_uri() .'/css/style.css', array(), null, 'all' );
        wp_register_style( 'rei-themedetail', get_stylesheet_uri(), '', null, 'all' );

        echo get_template_directory_uri() . '/css/style.css';

        wp_enqueue_style(  'rei-themesytle' );
        wp_enqueue_style( 'rei-themedetail' );
        wp_enqueue_style('custom-google-fonts', '//fonts.googleapis.com/css?family=Lato:100,300,400,700,900'); 
        wp_enqueue_style('font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
    }
    add_action( 'wp_enqueue_scripts', 'rei_theme_stylesheets' );

    /*
    function university_files(){
        wp_enqueue_script( 'rei-jquery' );
        wp_enqueue_script( 'rei-app' );
        wp_enqueue_script( 'rei-parallax' );
        wp_enqueue_script( 'rei-includeHTML' );

        wp_enqueue_style('custom-google-fonts', '//fonts.googleapis.com/css?family=Lato:100,300,400,700,900'); 
        wp_enqueue_style('font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
        wp_enqueue_style( 'university-styles',  get_template_directory_uri() .'/css/style.css', NULL, microtime(), 'all' );
        // wp_enqueue_style('main-stylesheet', get_stylesheet_uri());
        //wp_enqueue_style( , src, deps, media )
    }
//     add_action('wp_print_styles', 'university_files');
        add_action('wp_enqueue_scripts', 'university_files');
*/



    function university_features(){
        add_theme_support( 'title-tag' );
    }
    add_action( 'after_setup_theme', 'university_features');





    


?>