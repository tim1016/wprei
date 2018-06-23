<?php 
    if(!is_user_logged_in()){
        wp_redirect(esc_url( site_url( '/' ) ));
        exit;
    }



get_header();

while(have_posts()){
    the_post(); ?>

    <main>
    <?php 
        pageBanner(
            array(
                'title' => '',
                'subtitle' => '',
                'photo' => ''
            ));
    ?>
<!--
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

-->
        <section class="section">
            <div class="row generic-text">
                <ul class="min-list link-list" id="my-notes">
                    <?php 
                        $userNotes = new WP_Query( array(
                            'post_type' => 'note',
                            'posts_per_page' => -1,
                            'author' => get_current_user_id()
                        ));

                        while($userNotes->have_posts()){
                            $userNotes->the_post();
                            ?>
                            <li>
                                <input class="note-title-field" value="<?php echo esc_attr( get_the_title() )?>">
                                <span class="edit-note"><i class="fa fa-pencil" aria-hidden="true"> Edit</i></span>
                                <span class="delete-note"><i class="fa fa-trash-o" aria-hidden="true"> Delete</i></span>
                                <textarea class="note-body-field">
                                    <?php
                                       echo esc_attr(get_the_content());
                                    ?>
                                </textarea>
                            </li>
                            
                            <?php
                        }
                    ?>

                    
                </ul>

            </div>
        </section>
    </main>
    <?php

}   

?>

<?php get_footer();?>
