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
                the_post(); 
                get_template_part('template-parts/content', 'event');             
            }
            echo paginate_links(  );
        ?>
        <p>Looking for past events. <a href="<?php  echo site_url('/past-events')?>">Check out </a>our past events.</p>
    </div>
</section>


<?php get_footer();?>