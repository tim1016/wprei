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
                <h1 class="display-1 display-1--sub moveinright"> See what is going on in our world.
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
        <?php 
            while(have_posts()){
                the_post(); ?>

                    <div class="event-summary">
                            <a class="event-summary__date u-center-text" href="<?php the_permalink();?>">
                            <span class="event-summary__month">
                            <?php 
                                $eventDate = new DateTime(get_field('event_date'));
                                echo $eventDate->format('M');
                            ?>
                            </span>
                            <span class="event-summary__day"><?php 
                                $eventDate = new DateTime(get_field('event_date'));
                                echo $eventDate->format('d');
                            ?>
                            </span>  
                        </a>
                        <div class="event-summary__content">
                            <h5 class="event-summary__title headline headline--tiny"><a href="<?php the_permalink();?>"><?php the_title();?></a></h5>
                            <p><?php echo wp_trim_words( get_the_content(), 20 )?> <a href="<?php the_permalink();?>" class="nu gray">Learn more</a></p>
                        </div>
                    </div>                
                
                <?php

            }
            echo paginate_links(  );
        ?>
        <p>Looking for past events. <a href="<?php  echo site_url('/past-events')?>">Check out </a>our past events.</p>
    </div>
</section>


<?php get_footer();?>