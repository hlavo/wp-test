<?php


// Themas filter
add_action("wp_ajax_themas_filter", "themas_filter");
add_action('wp_ajax_nopriv_themas_filter', 'themas_filter');

function themas_filter(){
    $term_id = isset($_REQUEST['term_id']) ? esc_attr($_REQUEST['term_id']) : false;
    $paged = isset($_REQUEST['paged']) ? esc_attr($_REQUEST['paged']) : 1;

    $the_query = new WP_Query( array(
        'post_type' => 'thema',
        'posts_per_page' => 3,
        'post_status' => 'publish',
        'paged' => $paged,
        'tax_query' => $term_id ? array(
            array (
                'taxonomy' => 'type',
                'field' => 'term_id',
                'terms' => $term_id,
            )
        ) : [],
    ));

    $data = array_map(function($v) {
        $v->thumbnail = get_the_post_thumbnail_url($v->ID, 'large');
        $v->post_date = date('j. n. Y', strtotime($v->post_date));
        $v->post_excerpt = empty($v->post_excerpt) ? wp_trim_words($v->post_content, 15): $v->post_excerpt;
        return $v;
    },$the_query->posts);

    echo json_encode(
        [
            'data' => $data,
            'max' => $the_query->max_num_pages,
        ]
    );
    die;
}


// Contact Form
add_action("wp_ajax_contact_form", "contact_form");
add_action('wp_ajax_nopriv_contact_form', 'contact_form');

function contact_form(){
    $name = isset($_REQUEST['name']) ? esc_attr($_REQUEST['name']) : false;
    $phone = isset($_REQUEST['phone']) ? esc_attr($_REQUEST['phone']) : false;
    $email = isset($_REQUEST['email']) ? esc_attr($_REQUEST['email']) : false;
    $message = isset($_REQUEST['message']) ? esc_attr($_REQUEST['message']) : false;

    $msg = "";
    if($name) {
        $msg = "Jméno: ".$name."<br>";
    }

    if($phone) {
        $msg = "Telefon: ".$phone."<br>";
    }

    if($email) {
        $msg = "E-mail: ".$email."<br>";
    }

    if($message) {
        $msg = "Zpráva: ".$message."<br>";
    }

    $mail = get_option( 'contact' );
    $status = wp_mail($mail,"Dotaz z webu - ".get_bloginfo('name'),$msg);

    echo json_encode(
        [
            'status' => $status,
        ]
    );

    die;
}