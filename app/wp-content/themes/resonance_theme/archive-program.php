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
                <h1 class="display-1 display-1--sub moveinright"> There is something for everyone. Have a look around.
                <!--
                    <?php 
                        the_archive_description();
                    ?>
                    -->
                </h1>               
            </div>
        </div>
    </div>
</section>


<section class="section section--blogs">    
    <div class="row">
        <ul class="link-list min-list">
        <?php 
            while(have_posts()){
                the_post(); ?>

                <li><a href="<?php the_permalink();?>"><?php the_title();?></a></li>
        
            <?php } ?>
        </ul>
            
        <?php echo paginate_links(  ); ?>
    </div>
</section>


<?php get_footer();?>