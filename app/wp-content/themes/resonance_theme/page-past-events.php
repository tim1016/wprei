<?php get_header();?>

<section class="banner">
    <div class="banner--interior ">                    
        <div class="row">
            <div class="banner__box">
                <h1 class="display-1 display-1--main moveinleft">Past Events</h1>
                <h1 class="display-1 display-1--sub moveinright"> A recap of our past events
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
        $today = date('Ymd');
        $pastEvents = new WP_Query(array(
            'paged' => get_query_var('paged', 1),
            'posts_per_page' => 1,
            'post_type' => 'event',
            'meta_key' => 'event_date',
            'orderby' => 'meta_value_num',
            'order' => 'ASC',
            'meta_query' => array(
                array(
                    'key' => 'event_date',
                    'compare' => '<',
                    'value' => $today,
                    'type' => 'numeric'
                )
            )
        ));

        while($pastEvents->have_posts() ) {
            $pastEvents->the_post(); ?>
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
                    <p>
                        <?php
                            if(has_excerpt()){
                                echo get_the_excerpt(); //the_excerpt may add extra <p> </p> tag in the markup
                            }else{
                                echo wp_trim_words( get_the_content(),20);
                            }
                        ?> 
                        <a href="<?php the_permalink();?>" class="nu gray">Learn more</a>
                    </p>
                </div>
            </div>
        <?php
        }
        echo paginate_links(array(
            'total' => $pastEvents->max_num_pages
        ));
    ?>
    </div>
</section>


<?php get_footer();?>