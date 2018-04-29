<?php get_header();
pageBanner(
    array(
        'title' => 'All Events',
        'subtitle' => 'See what is going on in our world',
        'photo' => ''
    )
);
?>



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