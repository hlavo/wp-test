<?php

// Banner [shortcode_banner]
add_shortcode('shortcode_banner', 'shortcode_banner');

function shortcode_banner ()
{
    global $post;
    $banners = new WP_Query([
        "post_type" => "banner",
        "post_status" => "publish",
    ]);

    $html = '<div class="w__widget w__widget__banner" data-init="Banner">';
    $html.=     '<div class="swiper-pagination"></div>';
    $html.=     '<div class="swiper-container">';
    $html.=         '<div class="swiper-wrapper">';
                    while ($banners->have_posts()) {
                        $banners->the_post();
                        $url = get_the_post_thumbnail_url(get_the_ID(),'large');
    $html.=             '<div class="swiper-slide">';
    $html.=                 '<div style="background: url('.$url.')" class="w__widget__banner__item hero">';
    $html.=                     '<div class="w__widget__banner__item__text hero__text">';
    $html.=                         '<h1 class="w__widget__banner__item__text__title hero__text__title text-center mb-1">'.get_the_title().'</h1>';
    $html.=                         '<div class="w__widget__banner__item__text__content hero__text__content text-center">'.get_the_content().'</div>';
    $html.=                     '</div>';
    $html.=                 '</div>';
    $html.=             '</div>';
                    }
    $html.=         '</div>';
    $html.=     '</div>';
    $html.= '</div>';
    wp_reset_query();

    return $html;
}
