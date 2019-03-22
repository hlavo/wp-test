<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <link rel="stylesheet" type="text/css" href="<?= get_template_directory_uri() . '/www/assets/styles/global.css' ?>">
    <link href="https://fonts.googleapis.com/css?family=Merriweather|Raleway:300,400,600&amp;subset=latin-ext" rel="stylesheet">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <script>
        window.baseURL = "<?php bloginfo('url')  ?>"
    </script>
    <nav class="navbar--main navbar navbar-expand-md navbar-light bg-light" role="navigation">
        <div class="container">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-controls="bs-example-navbar-collapse-1" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a
                style='background: url("<?= get_template_directory_uri().'/www/assets/images/stedoceske silnice_logo.png' ?>")'
                class="navbar-brand d-block"
                href="<?php echo bloginfo('url')?>"
            >
            </a>
            <?php
            wp_nav_menu( array(
                'theme_location'    => 'primary',
                'depth'             => 2,
                'container'         => 'div',
                'container_class'   => 'collapse navbar-collapse',
                'container_id'      => 'bs-example-navbar-collapse-1',
                'menu_class'        => 'nav navbar-nav',
                'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
                'walker'            => new WP_Bootstrap_Navwalker(),
            ) );
            ?>
            <button
                type="button"
                data-toggle="modal"
                data-target="#searchModal"
                class="btn btn-default btn-search-modal"
            >
                <i class="fas fa-search"></i>
            </button>


            <div class="modal fade search__modal" id="searchModal" tabindex="-1" role="dialog" aria-labelledby="searchModalTitle" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="searchModalTitle">Vyhledávání</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="<?php echo home_url( '/' ); ?>" method="get" class="form-inline search__form">
                                <fieldset>
                                    <div class="input-group d-flex justify-content-center align-items-center">
                                        <input required type="text" name="s" id="search" placeholder="Hledat" value="<?php the_search_query(); ?>" class="form-control" />
                                    <span class="input-group-btn">
                                        <button type="submit" class="btn btn-outline-primary">Hledat</button>
                                    </span>
                                    </div>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>
