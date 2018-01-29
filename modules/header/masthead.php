<header id="masthead" class="site-header" role="banner">


    <?php get_template_part('modules/navigation/menu', 'slick'); ?>
    <?php get_template_part('modules/navigation/menu', 'primary'); ?>


    <div class="container masthead-container">

        <div class="social-icons">
            <?php get_template_part('modules/social/social', 'fa'); ?>
        </div>

        <?php if (class_exists('woocommerce')) : ?>
            <div id="top-cart">
                <div class="top-cart-icon">


                    <a class="cart-contents" href="<?php echo WC()->cart->get_cart_url(); ?>" title="<?php esc_html_e('View your shopping cart', 'etrigan'); ?>">
                        <div class="count"><?php echo sprintf(_n('%d item', '%d items', WC()->cart->cart_contents_count, 'etrigan'), WC()->cart->cart_contents_count);?></div>
                        <div class="total"> <?php echo WC()->cart->get_cart_total(); ?>
                        </div>
                    </a>

                    <i class="fa fa-shopping-cart"></i>
                </div>
            </div>
        <?php endif; ?>

        <div id="top-search">
            <?php get_template_part('searchform', 'top'); ?>
        </div>

    </div>



</header><!-- #masthead -->