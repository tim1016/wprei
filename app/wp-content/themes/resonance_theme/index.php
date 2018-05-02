<?php get_header();
pageBanner(
    array(
        'title' => 'Welcome to our blog!',
        'subtitle' => 'Keep up with the latest news',
        'photo' => ''
    )
);

?>


<section class="section section--blogs">    
    <div class="row">
        <?php 
            while(have_posts()){
                the_post(); ?>
                <div class="post__item">
                    <h2 class="heading-3 primary post__item--title"><a href="<?php the_permalink(  );?>"><?php the_title( );?></a></h2>
                    <div class="metabox">
                        <p>Posted by <?php echo the_author_posts_link( );?> on <?php the_time('n.j.y')?> in <?php echo get_the_category_list( ', ' )?></p>
                    </div>
                    <div class="generic-text">
                        <?php the_excerpt();?>
                    </div>
                    <p><a class="btn-text" href="<?php the_permalink(  );?>"> Continue Reading &raquo; </a></p>
                </div>
                
                <?php

            }
            echo paginate_links(  );
        ?>
    </div>

    <div class="blog-gallery">
        
    </div>
</section>


<?php get_footer();?>