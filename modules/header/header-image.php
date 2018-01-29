<div id="header-image">
    <?php if(is_page() && has_post_thumbnail()): ?>
        <div id="featured-image">
            <?php the_post_thumbnail('cover'); ?>
        </div>
    <?php else:?>
        <img src="<?php header_image(); ?>">
    <?php endif;?>
    <div class="site-branding-container">
        <div class="site-branding container">
            <?php if ( function_exists( 'the_custom_logo' ) ) : ?>
                <div class="site-logo">
                    <?php the_custom_logo();?>
                </div>
            <?php endif; ?>
            <div id="text-title-desc">
                <h1 class="site-title title-font"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                <h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
            </div>
        </div>
    </div>

</div>