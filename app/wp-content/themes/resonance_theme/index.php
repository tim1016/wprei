<?php get_header();
pageBanner(
    array(
        'title' => 'Welcome to our blog!',
        'subtitle' => 'Keep up with the latest news',
        'photo' => ''
    )
);

?>


<section class="section section--padding section--blogs">    
    <div class="row">
        <?php 
            while(have_posts()){
                the_post(); 
                $url = wp_get_attachment_url( get_post_thumbnail_id(get_the_ID(), $size='Small') );
                //echo $url;
                ?>
                <div class="col-1-of-3">
                    <div class="card u-margin-bottom-medium  generic-text generic-text--justified-content light-shadow ">
                        <div class="card-side">
                            <div class="card__picture" style="background-image: url(<?php the_post_thumbnail_url('large'); ?>);">
                                <div class="post-title ">
                                <span class="post-title__text rounded boxed"><?php echo get_the_title();?></span>
                                </div>
                            </div>
                        </div>

                        <div class="post-category">
                            <?php echo get_the_category_list( )?> 
                        </div>
                        <span class="author"></span>
                        <span class="post-author">By <?php echo the_author_posts_link( );?> on <?php the_time('n.j.y')?></span>
                        <div class="post-excerpt">
                            <p><?php echo get_the_excerpt();?></p>
                        </div>

                        <div class="read-more">
                            <a class="btn-read-more" href="<?php the_permalink()?>"> Read More &rarr;</a>
                        </div>
                    </div>



                </div>  


                <?php

            }
  //          echo paginate_links(  );
        ?>
    </div>

    <div class="blog-gallery">
        
    </div>
</section>


<?php get_footer();?>