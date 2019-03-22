    <footer class="e__footer">
        <div class="container">
            <div class="e__footer__top">
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-4">
                        <div class="d-flex align-items-center flex-wrap">
                            <div class="e__footer__logo logo">LOGO</div>
                            <p class="">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Atque, velit.</p>
                            <ul class="e__footer__social d-flex ml-0 pl-0 justify-content-end">
                                <li class="e__footer__social__item e__footer__social__item--fb"><a class="d-block" href="<? echo get_option('fb') ?>" target="_blank"><i class="fab fa-facebook-f text-white"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-4">
                        <h2 class="e__footer__header">NEJNOVĚJŠÍ PŘÍSPĚVKY</h2>
                        <ul class="ml-0 pl-0">
                            <?php
                                global $post;
                                $args = array( 'posts_per_page' => 3, 'post_status' => 'publish');
                                $posts = get_posts( $args );
                                foreach ( $posts as $post ) :
                                    setup_postdata( $post );
                            ?>
                                <li class="mb-2"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
                            <?php endforeach;
                            wp_reset_postdata();
                            ?>
                        </ul>
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-4">
                        <h2 class="e__footer__header">MENU</h2>
                        <div class="e__footer__menu">
                            <?php wp_nav_menu( array(
                                'theme_location'    => 'footer',
                            )); ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="e__footer__bottom">
                <div class="text-center font-italic">
                    Copyright <?php echo date("Y") ?>.
                    <a href="https://www.ewingpr.cz/cs">Vyrobeno v EwingPR</a>
                </div>
            </div>
        </div>
    </footer>

    <script src="<?= get_template_directory_uri() . '/www/assets/scripts/commons.js' ?>"></script>
    <script src="<?= get_template_directory_uri() . '/www/assets/scripts/app.js' ?>"></script>
    <?php wp_footer(); ?>
    </body>
</html>
