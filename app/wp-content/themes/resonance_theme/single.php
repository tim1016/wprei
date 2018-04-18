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
            <div class="metabox">
                <p>Posted by <?php echo the_author_posts_link( );?> on <?php the_time('n.j.y')?> in <?php echo get_the_category_list( ', ' )?></p>
            </div>
            <?php the_content( );?>
        </div>
    </section>

    <?php
}
?>

<?php get_footer();?>
