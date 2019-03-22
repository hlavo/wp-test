<?php get_header(); ?>
    <main class="page--single">
        <?php
        if (have_posts()) :

            while ( have_posts() ) : the_post();
        ?>
                <?php $post_type = get_post_type() ?>
                <?php if( $hero = get_field('hero') ): ?>
                    <div class="hero" style="background: url(<?php echo $hero['url']; ?>)">
                        <div class="hero__text">
                            <div class="hero__text__title">
                                <? echo $post_type === 'thema' ? 'Témata': 'Aktuality' ?>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
                <div class="breadcrumbs">
                    <div class="container">
                        <ul>
                            <li><a href="<?php bloginfo('url')?>">Domů</a></li>
                            <?php
                            $type = $post_type === 'thema' ? 'type' : 'category';
                            $term = get_the_terms(get_the_ID(), $type);
                            $term = !empty($term) ? $term[0] : false;
                            ?>
                            <?php if($term): ?>
                                <li><a href="<?php get_term_link($term->term_id) ?>"><?php echo $term->name ?></a></li>
                            <?php endif;?>
                            <li class="active"><?php the_title() ?></li>
                        </ul>
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 col-md-12 col-lg-8 offset-lg-2">

                            <header>

                                <div class="thumbnail" style="background: url(<?php echo get_the_post_thumbnail_url(null, 'large'); ?>)"></div>

                                <p class="date-author"><?php the_date(); ?> / <?php the_author(); ?></p>

                                <h1 id="post-<?php the_ID(); ?>">
                                    <a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>">
                                        <?php the_title(); ?>
                                    </a>
                                </h1>
                            </header>

                            <main>
                                <?php the_content(); ?>
                            </main>

                            <footer>
                                <?php $tags = get_the_tags(); ?>
                                <?php if ($tags): ?>
                                    <div class="d-flex my-4 align-items-center">
                                        <strong class="pr-2 text-black">Tagy:</strong>
                                        <?php foreach($tags as $tag):?>
                                            <a href="<?php echo get_tag_link($tag->term_id) ?>" class="badge badge-dark mr-2"><? echo $tag->name ?></a>
                                        <?php endforeach; ?>
                                    </div>
                                <?php endif; ?>
                            </footer>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-md-12 col-lg-8 offset-lg-2">

                            <?php if ($tags): ?>
                                <?
                                $first_tag = $tags[0]->term_id;
                                $args = array(
                                    'tag__in' => array($first_tag),
                                    'post__not_in' => array(get_the_ID()),
                                    'posts_per_page'=>3
                                );
                                $tags_query = new WP_Query($args);
                                if( $tags_query->have_posts() ): ?>
                                    <h3>
                                        Související příspěvky
                                    </h3>
                                    <hr>
                                    <div class="row">
                                        <?php while ($tags_query->have_posts()) : $tags_query->the_post(); ?>
                                            <div class="col-xs-12 col-md-6 col-lg-4">
                                                <div class="card-related">
                                                    <a href="<?php permalink_link() ?>" class="card-related__image d-block" style="background: url(<?php echo get_the_post_thumbnail_url(null, 'large'); ?>)"></a>
                                                    <a href="<?php permalink_link() ?>" class="card-related__title d-block text-center"><?php the_title(); ?></a>
                                                </div>
                                            </div>
                                        <?php endwhile; ?>
                                    </div>
                                <?php endif ?>
                                <?php wp_reset_query(); ?>
                            <?php endif ?>
                        </div>
                    </div>
                </div>

            <?php endwhile;
        endif; ?>
    </main>
<?php get_footer(); ?>