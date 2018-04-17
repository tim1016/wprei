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
                        <h1 class="display-1 display-1--sub moveinright">subtitle</h1>               
                    </div>
                </div>
            </div>
        </section>


        <section class="section">

            <div class="row generic-text">

                <div class="col-2-of-3">
                    <?php the_content();?>
                </div>
                
                <div class="col-1-of-3">
                    <div class="sidebar__left">
                        <div class="side-nav">
                            <ul>
                                <li><a href="aboutus.html">About Us</a></li>
                                <li><a href="privacypolicy.html">Privacy Policy</a></li>
                                <li><a href="opportunities.html">Opportunities</a></li>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>

        </section>
    </main>

    



    <?php

}   

?>

<?php get_footer();?>
