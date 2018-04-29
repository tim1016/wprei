<?php 
    get_header();
    pageBanner(
        array(
            'title' => '',
            'subtitle' => '',
            'photo' => ''
        )
    );

while(have_posts()){
    the_post(); 
    ?>



    <section class="section">
        
        <div class="row generic-text">
            <div class="metabox  metabox--with-home-link">
                <p>
                    <a href="<?php echo site_url('/blog');?>" class="metabox__blog-home-link"><i class="fa fa-home"></i> Blog Home</a> 
                    <span class="metabox__main">Posted by <?php echo the_author_posts_link( );?> on <?php the_time('n.j.y')?> in <?php echo get_the_category_list( ', ' )?></span>
                </p>
            </div>
            <?php  the_content( );?>
        </div>
    </section>

    <?php
}
?>

<?php get_footer();?>
