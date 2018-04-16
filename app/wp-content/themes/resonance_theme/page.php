<?php get_header();?>


<h1><?php bloginfo('name');?> </h1>
<p><?php bloginfo('description')?></p>

<?php 
while(have_posts()){
    the_post(); 
    ?>
    <h2>This is  powered by page.php</h2>
    <h2> <?php the_title();?> </h2>
    <p><?php the_content();?></p>
    <hr>
    <?php

}

?>

<?php get_footer();?>
