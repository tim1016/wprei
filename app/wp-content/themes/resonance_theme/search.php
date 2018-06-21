<?php get_header();
pageBanner(
    array(
        'title' => 'Search Results for  &ldquo;' . esc_html(get_search_query()) . '&rdquo;',
        'subtitle' => 'You searched for &ldquo;'. esc_html(get_search_query()) . '&rdquo;',
        'photo' => ''
    )
);

?>


<section class="section section--padding section--blogs">    
    <div class="row">
        <?php 
            while(have_posts()){
                the_post(); 
                get_template_part('template-parts/gallery', get_post_type());  
            }
            echo paginate_links(  ); 
        ?>
    </div>

    <div class="blog-gallery">
        
    </div>
</section>


<?php get_footer();?>