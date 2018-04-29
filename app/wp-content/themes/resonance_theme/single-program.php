<?php get_header();?>


<?php 
while(have_posts()){
    the_post(); 
    ?>
    <section class="banner">
        <div class="banner--interior ">                    
            <div class="row">
                <div class="banner__box">
                    <h1 class="display-1 display-1--main moveinleft"><?php the_title();?></h1>
                    <h1 class="display-1 display-1--sub moveinright">subtitle</h1>               
                </div>
            </div>
        </div>
    </section>


    <section class="section">
        
        <div class="row generic-text">
            <div class="metabox  metabox--with-home-link">
                <p>
                    <a href="<?php echo get_post_type_archive_link('program');?>" class="metabox__blog-home-link"><i class="fa fa-home"></i> All Progams</a> 
                    <span class="metabox__main"><?php the_title();?></span>
                </p>
            </div>
            <?php  the_content( );?>



            <?php 
                $today = date('Ymd');
                $homepageEvents = new WP_Query(array(
                    'posts_per_page' => -1,
                    'post_type' => 'event',
                    'meta_key' => 'event_date',
                    'orderby' => 'meta_value_num',
                    'order' => 'ASC',
                    'meta_query' => array(
                        array(
                            'key' => 'event_date',
                            'compare' => '>=',
                            'value' => $today,
                            'type' => 'numeric'
                        ),
                        array(
                            'key'=> 'related_programs',
                            'compare'=> 'LIKE',
                            'value'=> '"' . get_the_ID() . '"'
                        )
                    )
                ));

                echo '<h2 class="headline-4 u-margin-top-big"> Upcoming ' .  get_the_title() .' events </h2>';

                while($homepageEvents->have_posts() ) {
                    $homepageEvents->the_post(); ?>
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
            ?>

        </div>
    </section>

    <?php
}
?>

<?php get_footer();?>
