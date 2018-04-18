<?php get_header();?>

<section class="banner">
    <div class="banner--interior ">                    
        <div class="row">
            <div class="banner__box">
                <h1 class="display-1 display-1--main moveinleft">
                    <?php 
                    /*
                        if(is_category()){
                            echo "Posts in ";
                            single_cat_title();
                            echo "category";

                        }elseif(is_author( )){
                            echo "Posts by ";
                            the_author();
                        }else{
                            echo "Welcome to our blog!";
                        }
                    */
                    the_archive_title();    
                    ?>
                </h1>
                <h1 class="display-1 display-1--sub moveinright">
                    <?php 
                        the_archive_description();
                    ?>
                </h1>               
            </div>
        </div>
    </div>
</section>


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
</section>


<?php get_footer();?>