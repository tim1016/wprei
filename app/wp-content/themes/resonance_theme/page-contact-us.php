<?php
 
  //response generation function
    $response = "";


  //response messages
    $not_human       = "Human verification incorrect.";
    $missing_content = "Please supply all information.";
    $email_invalid   = "Email Address Invalid.";
    $message_unsent  = "Message was not sent. Try Again.";
    $message_sent    = "Thanks! Your message has been sent.";
    
    //user posted variables
    $name = $_POST['message_name'];
    $email = $_POST['message_email'];
    $message = $_POST['message_text'];
    $human = $_POST['message_human'];
    
    //php mailer variables
    $to = get_option('admin_email');
    $subject = "Someone sent a message from ".get_bloginfo('name');
    $headers = 'From: '. $email . "\r\n" .
    'Reply-To: ' . $email . "\r\n";


 
  //function to generate response
    function my_contact_form_generate_response($type, $message){
        global $response;
        if($type == "success"){ 
            $response = "<div class='success'>{$message}</div>";
        }else {
            $response = "<div class='error'>{$message}</div>";
        }
    }
?>

<?php get_header();?>



<?php 
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
-->
        </section>


        <section class="section">

            <div class="row generic-text">

                <div class="col-2-of-3">
                    <?php the_content();?>

                    <div id="respond">
                        <?php echo $response; ?>
                        <form action="<?php the_permalink(); ?>" method="post">
                            <p><label for="name">Name: <span>*</span> <br><input type="text" name="message_name" placeholder="Name" value="<?php echo esc_attr($_POST['message_name']); ?>"></label></p>
                            <p><label for="message_email">Email: <span>*</span> <br><input type="text" name="message_email" placeholder="Email" value="<?php echo esc_attr($_POST['message_email']); ?>"></label></p>
                            <p><label for="message_text">Message: <span>*</span> <br><textarea type="text" placeholder="Message" name="message_text"><?php echo esc_textarea($_POST['message_text']); ?></textarea></label></p>
                            <p><label for="message_human">Human Verification: <span>*</span> <br><input type="text" style="width: 60px;" name="message_human"> + 3 = 5</label></p>
                            <input type="hidden" name="submitted" value="1">
                            <p><input type="submit"></p>
                        </form>
                    </div>


                    <div class="respond">
                    <?php get_template_part( 'template-parts/form-fco')?>
                    </div>

                    <div class="validatejs">
                        <div class="container">
                            <h2>Registration</h2>
                            <form action="" name="registration">
                                <label for="firstname">First Name</label>
                                <input type="text" name="firstname" id="firstname" placeholder="John">

                                <label for="lastname">Last Name</label>
                                <input type="text" name="lastname" id="lastname" placeholder="Doe">

                                <label for="email">Email</label>
                                <input type="email" name="email" id="email" placeholder="john@doe.com">

                                <label for="password">Password</label>
                                <input type="password" name="password" id="password" placeholder="&#9679;&#9679;&#9679;&#9679;&#9679;">

                                <button type="submit">Register</button>
                            </form>

                            <div class="article-reference">
                                This example is part of the article
                                <a href="https://www.sitepoint.com/basic-jquery-form-validation-tutorial/" target="_blank">Basic jQuery Form Validation Example</a> on <a href="http://sitepoint.com/" target="_blank">SitePoint</a> by
                                <a href="https://github.com/julmot" target="_blank">Julian Motz</a>.
                            </div>
                        </div>



                    </div>
                </div>

                <?php 
                    $currentPageID = get_the_id();
                    $theChildren = get_pages( array('child_of' => $currentPageID) );
                    $theParent = wp_get_post_parent_id( $currentPageID );

                    if($theParent or $theChildren){ ?>
                        <div class="col-1-of-3">
                            <div class="sidebar__left">
                                <?php 
                                    
                                    if($theParent){
                                        $findChildrenOf = $theParent;
                                    }
                                    else{
                                        $findChildrenOf = $currentPageID;
                                    }
                                    if($theParent){
                                        ?>
                                        <div class="side-nav">
                                            <ul>
                                                <li><a href="<?php echo get_permalink( $theParent );?>"> <i class="fa fa-home" aria-hidden="true"></i> <?php echo get_the_title( $theParent );?> </a></li>
                                                <?php wp_list_pages( array( 'title_li' => NULL, 'child_of' => $findChildrenOf, 'sort_column' => 'menu_order') ); ?>
                                            </ul>
                                        </div>
                                        <?php
                                    }
                                ?>
                            </div>
                        </div>
                <?php }?>

            </div>

        </section>
    </main>

    



    <?php

}   

?>

<?php get_footer();?>
