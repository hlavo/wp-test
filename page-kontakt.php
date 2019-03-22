<?php get_header(); ?>
    <main class="page--contact">
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

                <div class="container">

                    <section class="contact-item-wrapper">
                        <div class="row">
                            <div class="col-xs-12 col-md-4">
                                <div class="d-flex align-items-center justify-content-md-center mb-3 mb-md-0 contact-item">
                                    <i class="text-white fas fa-phone contact-item__icon text-center d-block"></i>
                                    <div class="ml-4">
                                        <h5 class="contact-item__title mb-0">Telefón</h5>
                                        <span class="contact-item__text"><?php echo get_field('phone')?></span>
                                    </div>
                                </div>
                            </div>


                            <div class="col-xs-12 col-md-4">
                                <div class="d-flex align-items-center justify-content-md-center mb-3 mb-md-0 contact-item">
                                    <i class="text-white  far fa-envelope contact-item__icon text-center d-block"></i>
                                    <div class="ml-4">
                                        <h5 class="contact-item__title mb-0">E-mail</h5>
                                        <span class="contact-item__text"><?php echo get_field('e-mail')?></span>
                                    </div>
                                </div>
                            </div>


                            <div class="col-xs-12 col-md-4">
                                <div class="d-flex align-items-center justify-content-md-center mb-3 mb-md-0 contact-item">
                                    <i class="text-white fas fa-map-marker-alt contact-item__icon text-center d-block"></i>
                                    <div class="ml-4">
                                        <h5 class="contact-item__title mb-0">Adresa</h5>
                                        <span class="contact-item__text"><?php echo get_field('street')?></span>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </section>
                    <hr class="my-0">

                    <div class="col-xs-12 col-md-12 col-lg-8 offset-lg-2">
                        <section class="contact-content">
                            <?php the_content(); ?>
                        </section>

                        <section class="contact-form">
                            <form class="form w__widget w__widget__contact" data-init="Contact" action="" method="post">
                                <fieldset>
                                    <div class="row">
                                        <div class="col-md-6 multi-horizontal mb-4" >
                                            <input type="text" required class="form-control input" name="name" placeholder="Jméno" required>
                                        </div>
                                        <div class="col-md-6 multi-horizontal mb-4">
                                            <input type="text" required class="form-control input" name="phone" placeholder="Telefón" required>
                                        </div>
                                        <div class="col-md-12 mb-4" data-for="email">
                                            <input type="email" required class="form-control input" name="email" placeholder="Email" required>
                                        </div>
                                        <div class="col-md-12 mb-4" data-for="message">
                                            <textarea rows="4" required class="form-control input" name="message" placeholder="Správa"></textarea>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-center">
                                        <button href="" type="submit" class="btn btn-outline-primary btn-form display-4">ODESLAT</button>
                                    </div>
                                </fieldset>
                            </form>
                        </section>
                    </div>

                </div>

                <?php
                    $latitude = get_field('latitude');
                    $longitude = get_field('longitude');

                  if($latitude && $longitude):
                ?>
                  <section class="contact-map">
                    <iframe
                        src="https://maps.google.com/maps?q=<?php echo $latitude ?>,<?php echo $longitude ?>&hl=es;z=14&amp;output=embed"
                        height="450"
                        frameborder="0"
                        style="border:0; width: 100%;"
                        allowfullscreen
                    >
                    </iframe>

                  </section>
                <?php endif; ?>

            <?php endwhile;
        endif; ?>
    </main>
<?php get_footer(); ?>