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
                    <a href="<?php echo get_post_type_archive_link('event');?>" class="metabox__blog-home-link"><i class="fa fa-home"></i> Event Home</a> 
                    <span class="metabox__main"><?php the_title();?></span>
                </p>
            </div>
            <?php  the_content( );?>
        </div>
    </section>

    <?php
}
?>

<?php get_footer();?>
