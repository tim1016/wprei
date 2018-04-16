<?php


    wp_register_script( 'rei-jquery', get_template_directory_uri() .'/js/jquery.min.js', NULL, 1.0, true);
    wp_register_script( 'rei-app', get_template_directory_uri() .'/js/app1.js', NULL, 1.0, true);
    wp_register_script( 'rei-parallax', get_template_directory_uri() .'/js/parallax.js', NULL, 1.0, true);
    wp_register_script( 'rei-includeHTML', get_template_directory_uri() .'/js/includeHTML.js', NULL, 1.0, true);

    function university_main_styles(){
        wp_enqueue_script( 'rei-jquery' );
        wp_enqueue_script( 'rei-app' );
        wp_enqueue_script( 'rei-parallax' );
        wp_enqueue_script( 'rei-includeHTML' );

        wp_enqueue_style('custom-google-fonts', '//fonts.googleapis.com/css?family=Lato:100,300,400,700,900'); 
        wp_enqueue_style('font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
        //wp_enqueue_style('university_main_styles', get_stylesheet_uri());
        wp_enqueue_style( 'main-stylesheet',  get_template_directory_uri() .'/css/style.css', array(), null, 'all' );
    }

    add_action('wp_enqueue_scripts',  'university_main_styles' );





    
/*
    function university_files() {   
        //wp_enqueue_script('main-university-js', get_theme_file_uri('/js/scripts-bundled.js'), NULL, microtime(), true);
      
        wp_enqueue_style('custom-google-fonts', '//fonts.googleapis.com/css?family=Lato:100,300,400,700,900'); 
      
        wp_enqueue_style('font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
      
        wp_enqueue_style('university_main_styles', get_stylesheet_uri());
     }
     
     add_action('wp_enqueue_scripts', 'university_files');
*/
?>