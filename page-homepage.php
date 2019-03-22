<?php get_header(); ?>
    <main class="page--home">
        <?php echo do_shortcode('[shortcode_banner]') ?>
        <div class="breadcrumbs">
            <div class="container">
                <ul>
                    <li><a href="<?php bloginfo('url')?>">Domů</a></li>
                </ul>
            </div>
        </div>
        <div class="container page-base">
            <section class="section-news mb-5">
                <h2 class="text-center h1 mb-5">Aktuality</h2>
                <div class="row">
                    <?php
                        $query = new WP_Query([
                            "post_type" => "post",
                            "post_status" => "publish",
                            "posts_per_page" => 3,
                        ])
                    ?>
                    <?php if ( $query->have_posts() ) : ?>
                        <?php while ( $query->have_posts() ) : $query->the_post(); ?>
                            <div class="col-lg-4 col-md-6 col-xs-12">
                                <article class="card">
                                    <a href="<?echo get_the_permalink() ?>" class="card__image" style="background: url(<? echo get_the_post_thumbnail_url(null, 'large') ?>)"></a>
                                    <div class="card__date my-2">
                                        <time class="text-primary" datetime="<? echo get_the_date('Y-m-d') ?>">
                                            <? echo get_the_date() ?>
                                        </time>
                                    </div>
                                    <h3 class="card__title mb-2">
                                        <a href="<?echo get_the_permalink() ?>">
                                            <? echo get_the_title() ?>
                                        </a>
                                    </h3>
                                    <div class="card__text">
                                        <? echo get_the_excerpt() ?>
                                    </div>
                                </article>
                            </div>
                        <?php endwhile; ?>
                    <?php endif; ?>
                    <?php wp_reset_postdata(); ?>
                </div>
                <div class="text-center">
                    <a href="<?php echo get_permalink( get_option( 'page_for_posts' ) ); ?>" class="btn btn-outline-black">
                        Další články
                    </a>
                </div>
            </section>

            <section class="w__widget w__widget__themas section-themas" data-init="Themas">
                <h2 class="text-center h1 mb-4">Témata</h2>
                <?php
                $terms = get_terms('type');
                ?>

                <ul class="pl-0 ml-0 text-center w__widget__themas__filter mb-4">
                    <li class="d-inline-block w__widget__themas__filter__item"><a class="text-primary" href="#">Vše</a> <span class="mx-2">/</span></li>
                    <?php foreach($terms as $key => $term):?>
                        <li class="d-inline-block w__widget__themas__filter__item" data-id="<?php echo $term->term_id ?>">
                            <a href="#"><?php echo $term->name?></a>
                            <?php if(count($terms) !== $key): ?> <span class="mx-2">/</span> <?php endif;?>
                        </li>
                    <?php endforeach;?>
                </ul>

                <?php wp_reset_postdata(); ?>

                <?php
                $query = new WP_Query([
                    "post_type" => "thema",
                    "post_status" => "publish",
                    "posts_per_page" => 3,
                ]);
                ?>
                <div class="row w__widget__themas__result">
                    <?php if ( $query->have_posts() ) : ?>
                        <?php while ( $query->have_posts() ) : $query->the_post(); ?>
                            <div class="col-lg-4 col-md-6 col-xs-12">
                                <article class="card">
                                    <a href="<?echo get_the_permalink() ?>" class="card__image" style="background: url(<? echo get_the_post_thumbnail_url(null, 'large') ?>)"></a>
                                    <div class="card__date my-2">
                                        <time class="text-primary" datetime="<? echo get_the_date('Y-m-d') ?>">
                                            <? echo get_the_date() ?>
                                        </time>
                                    </div>
                                    <h3 class="card__title mb-2">
                                        <a href="<?echo get_the_permalink() ?>">
                                            <? echo get_the_title() ?>
                                        </a>
                                    </h3>
                                    <div class="card__text">
                                        <? echo get_the_excerpt() ?>
                                    </div>
                                </article>
                            </div>
                        <?php endwhile; ?>
                    <?php endif; ?>
                    <?php wp_reset_postdata(); ?>
                </div>
                <div class="text-center">
                    <a href="#" class="btn btn-outline-black w__widget__themas__btn <?php if($query->max_num_pages == 1) { echo 'd-none'; } ?>">
                        Další témata
                    </a>
                </div>
            </section>
        </div>
    </main>
<?php get_footer(); ?>