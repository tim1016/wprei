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
                    <h1 class="display-1 display-1--sub moveinright"><?php the_field('page_banner_subtitle')?></h1>               
                </div>
            </div>
        </div>
    </section>


    <section class="section">
        <div class="row  generic-text">
            <div class="col-1-of-3">
            <?php the_post_thumbnail('professorPortrait'); ?>
            </div>

            <div class="col-2-of-3">
            <?php  the_content( );?>
            </div>
        </div>
        
        <div class="row generic-text">


            

            
            <?php
                $relatedPrograms = get_field('related_programs');
                if($relatedPrograms){
                    echo '<h2 class="headline-4">Related Programs</h2>';
                    echo '<ul class="link-list min-list">';
                    foreach($relatedPrograms as $program){ ?>
                        <li><a href="<?php echo get_the_permalink($program)?>"><?php echo get_the_title($program); ?></a></li>
                        <?php
                    }
                    echo '</ul>';
                }
            ?>
        </div>
    </section>

    <?php
}
?>

<?php get_footer();?>
