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
                <div class="create-note">
                    <h2 class="heading-3">Create New Note</h2>
                    <input class="new-note-title" placeholder="Title">
                    <textarea class="new-note-body" placeholder="Your note here" name="" id="" cols="30" rows="10"></textarea>
                    <span class="submit-note">Create Note</span>
                    <span class="note-limit-message">You have reached your limit. Delete a note to make room for a new one.</span>
                </div>
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
                            <li data-id="<?php the_ID();?>">
                                <input readonly class="note-title-field" value="<?php echo str_replace('Private: ', '' , esc_attr( get_the_title() ))?>"> 
                                <span class="edit-note"><i class="fa fa-pencil" aria-hidden="true"> Edit</i></span>
                                <span class="delete-note"><i class="fa fa-trash-o" aria-hidden="true"> Delete</i></span>
                                <textarea readonly class="note-body-field">
                                    <?php
                                       echo esc_textarea(get_the_content());
                                    ?>
                                </textarea>
                                <span class="update-note button button--primary"><i class="fa fa-arrow-right" aria-hidden="true"> Save</i></span>
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
