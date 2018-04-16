<?php
/*
    function university_main_styles(){
        wp_enqueue_style('university_main_styles', get_stylesheet_uri());
    }

    add_action( 'wp_enqueue_scripts',  'university_main_styles' );
*/

    function university_files() {   
        //wp_enqueue_script('main-university-js', get_theme_file_uri('/js/scripts-bundled.js'), NULL, microtime(), true);
      
        wp_enqueue_style('custom-google-fonts', '//fonts.googleapis.com/css?family=Lato:100,300,400,700,900'); 
      
        wp_enqueue_style('font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
      
        wp_enqueue_style('university_main_styles', get_stylesheet_uri());
     }
     
     add_action('wp_enqueue_scripts', 'university_files');

?>