<?php get_header(); ?>
    <main class="page--base">
        <?php
        if (have_posts()) :

            while ( have_posts() ) : the_post();
                ?>
                <?php if( $hero = get_field('hero') ): ?>
                    <div class="hero" style="background: url(<?php echo $hero['url']; ?>)">
                        <div class="hero__text">
                            <div class="hero__text__title">
                                <?php the_title() ?>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
                <div class="breadcrumbs">
                    <div class="container">
                        <ul>
                            <li><a href="<?php bloginfo('url')?>">Domů</a></li>
                            <li class="active"><?php the_title() ?></li>
                        </ul>
                    </div>
                </div>
                <div class="container page-base">
                    <div class="row">
                        <div class="col-xs-12 col-md-12 col-lg-8 offset-lg-2">
                            <article>
                                <?php the_content(); ?>
                            </article>
                        </div>
                    </div>
                </div>

            <?php endwhile;
        endif; ?>
    </main>
<?php get_footer(); ?>