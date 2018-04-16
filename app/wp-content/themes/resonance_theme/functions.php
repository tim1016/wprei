<?php

    function university_main_styles(){
        wp_enqueue_style('university_main_styles', get_stylesheet_uri());
    }

    add_action( 'wp_enqueue_scripts',  'university_main_styles' )

?>