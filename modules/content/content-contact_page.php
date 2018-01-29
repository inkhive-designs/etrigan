<?php
/**
 * @package etrigan
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header">
        <?php the_title( sprintf( '<h1 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>

        <?php if ( 'post' == get_post_type() ) : ?>
            <div class="entry-meta">
                <?php etrigan_posted_on(); ?>
            </div><!-- .entry-meta -->
        <?php endif; ?>
    </header><!-- .entry-header -->

    <div class="col-md-12 col-sm-12 col-xs-12 contact-info">
        <div class="col-md-6 col-sm-6 col-xs-12 cnt-left">
            <div class="loc-logo col-md-2 col-sm-2 col-xs-2">
                <i class="fa fa-globe"  style="font-size:60px;"></i>
            </div>
            <div class="contact-info-inner col-md-10 col-sm-10 col-xs-10">
                <div class="site_title">
                    <h3><?php echo bloginfo('name') ?></h3>
                </div>
                <div class="site_address">
                    <p>
                        <?php echo esc_html(get_theme_mod('etrigan_contactus_address_set')); ?>
                    </p>
                </div>
            </div>
        </div>
        <!-- <div class="col-md-1 col-sm-1 cnt-center"></div>-->


        <div class="col-md-6 col-sm-6 col-xs-12 cnt-right">
            <div class="loc-logo col-md-2 col-sm-2 col-xs-2">
                <i class="fa fa-envelope-o " style="font-size:60px;"></i>
            </div>
            <div class="contact-info-inner col-md-10 col-sm-10 col-xs-10">
                <div class="site_contact_title">
                    <h3>Connect With Us</h3>
                </div>
                <?php if(get_theme_mod('etrigan_conn_with_us_set','default')): ?>
                <div class="site_email">
                    <?php echo esc_html(get_theme_mod('etrigan_conn_with_us_set')) ?>
                </div>
                <?php endif; ?>
            </div>

        </div>
    </div>
    <div class="col-md-12 col-sm-12 contact-map">
        <div class="address_map">
            <a href="<?php echo esc_url(get_theme_mod('etrigan_contactus_map_url_set'));?>" target="_blank">
                <img src="<?php echo esc_html(get_theme_mod('etrigan_contactus_map_img_set'));?>"></a>


        </div>
    </div>
    <div class="col-md-12 col-sm-12 contact-form">
    <?php if(get_theme_mod('etrigan_contactform_title_set')): ?>
        <div class="contact-frm col-md-6 col-sm-12 col-xs-12">
            <div class="form-title"><?php echo esc_html(get_theme_mod('etrigan_contactform_title_set'))?></div>
            <?php echo do_shortcode(esc_html(get_theme_mod('etrigan_contactform_shortcode_set')));?>
        </div>
        <?php endif;?>
        <?php if(!get_theme_mod('etrigan_contactus_content_disable_set')): ?>
        <div class="col-md-6 col-sm-12 col-xs-12 contact-msg">
                <?php
                /* translators: %s: Name of current post */
                the_content( sprintf(
                    __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'etrigan' ),
                    the_title( '<span class="screen-reader-text">"', '"</span>', false )
                ) );
                ?>
        </div>
        <?php endif;?>
        <div class="col-md-6 col-sm-12 col-xs-12 call-img-outer">
        <img class="call-img" src="<?php
        if(get_theme_mod('etrigan_contactus_form_img_set')):
            echo esc_html(get_theme_mod('etrigan_contactus_form_img_set'));
        else:
            echo get_template_directory_uri().'/assets/images/call.png';
        endif;
        ?>">
        </div>
    </div>


    <footer class="entry-footer">
        <?php etrigan_entry_footer(); ?>
    </footer><!-- .entry-footer -->
</article><!-- #post-## -->
