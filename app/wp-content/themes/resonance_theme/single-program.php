<?php 
    get_header();
    pageBanner(
        array(
            'title' => '',
            'subtitle' => '',
            'photo' => ''
        )
    );
?>


<?php 
while(have_posts()){
    the_post(); 
    ?>



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




                $relatedProfessors = new WP_Query(array(
                    'posts_per_page' => -1,
                    'post_type' => 'professor',
                    'orderby' => 'title',
                    'order' => 'ASC',
                    'meta_query' => array(
                        array(
                            'key'=> 'related_programs',
                            'compare'=> 'LIKE',
                            'value'=> '"' . get_the_ID() . '"'
                        )
                    )
                ));

                echo '<h2 class="headline-4 u-margin-top-big"> Professors </h2>';

                while($relatedProfessors->have_posts() ) {
                    $relatedProfessors->the_post(); ?>
                    <li><a href="<?php the_permalink();?>"><?php the_title();?></a></li>
                <?php
                }

                wp_reset_postdata();




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
                    $homepageEvents->the_post(); 
                    get_template_part('template_parts/content', 'event');
                }
            ?>

        </div>
    </section>

    <?php
}
?>

<?php get_footer();?>
