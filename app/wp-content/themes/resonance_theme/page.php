<?php get_header();?>



<?php 
while(have_posts()){
    the_post(); ?>

    <main>
        <section class="banner">
            <div class="banner--interior ">                    
                <div class="row">
                    <div class="banner__box">
                        <h1 class="display-1 display-1--main moveinleft"><?php the_title();?></h1>
                        <h1 class="display-1 display-1--sub moveinright">Dont forget to replace me later</h1>               
                    </div>
                </div>
            </div>
        </section>


        <section class="section">
            <div class="row generic-text">
                <?php 
                    the_content();
                ?>

            </div>

        </section>
    </main>
    



    <?php

}   

?>

<?php get_footer();?>
