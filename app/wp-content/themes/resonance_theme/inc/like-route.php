<?php
add_action('rest_api_init', 'reiLikeRoutes');

function reiLikeRoutes(){
    register_rest_route('rei/v1','manageLike',array(
        'methods' => 'POST',
        'callback'=> 'createLike'
    ));

    register_rest_route('rei/v1','manageLike',array(
        'methods' => 'DELETE',
        'callback'=> 'deleteLike'
    ));
}


function createLike($data){
    $professor = sanitize_text_field( $data['professorID'] );
    wp_insert_post(array(
        'post_type' => 'like',
        'post_status' => 'publish',
        'post_title' => 'PHP post4',
        'meta_input' => array(
            'liked_professor_id' => $professor
        )
    ));
}

function deleteLike(){
    return 'Thanks for trying to delete a like';
}