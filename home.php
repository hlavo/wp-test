<?php get_header(); ?>
<main class="page--news">
    <?php $page_id = isset( $_GET['page_id'] ) ? $_GET['page_id'] : null?>
    <?php if( $hero = get_field('hero', $page_id) ): ?>
        <div class="hero" style="background: url(<?php echo $hero['url']; ?>)">
            <div class="hero__text">
                <div class="hero__text__title">
                    Aktuality
                </div>
            </div>
        </div>
    <?php endif; ?>
    <div class="breadcrumbs">
        <div class="container">
            <ul>
                <li><a href="<?php bloginfo('url')?>">Domů</a></li>
                <li class="active">Aktuality</li>
            </ul>
        </div>
    </div>
    <div class="container page-base">
        <div class="row">
            <?php if ( have_posts() ) : ?>
                <?php while ( have_posts() ) : the_post(); ?>
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
        </div>
        <div class="d-flex justify-content-center">
            <?php bootstrap_pagination();?>
        </div>
    </div>
</main>
<?php get_footer(); ?>
