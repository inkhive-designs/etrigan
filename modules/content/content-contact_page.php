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

    <div class="entry-content">
        <?php
        /* translators: %s: Name of current post */
        the_content( sprintf(
            __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'etrigan' ),
            the_title( '<span class="screen-reader-text">"', '"</span>', false )
        ) );
        ?>
    </div><!-- .entry-content -->
    <div class="col-md-12 col-sm-12 contact-info">


        <div class="col-md-6 col-sm-6 cnt-left">
            <div class="loc-logo col-md-2 col-sm-2">
                <i class="fa fa-globe"  style="font-size:60px;"></i>
            </div>
            <div class="contact-info-inner col-md-10 col-sm-10">
                <div class="site_title">
                    <h3><?php echo bloginfo('name') ?></h3>
                </div>
                <div class="site_address">
                    <p>
                        <?php echo get_theme_mod('etrigan_contactus_address_set'); ?>
                    </p>
                </div>
            </div>
        </div>
        <!-- <div class="col-md-1 col-sm-1 cnt-center"></div>-->


        <div class="col-md-6 cnt-right">
            <div class="loc-logo col-md-2 col-sm-2">
                <i class="fa fa-envelope-o " style="font-size:60px;"></i>
            </div>
            <div class="contact-info-inner col-md-10 col-sm-10">
                <div class="site_contact_title">
                    <h3>Connect With Us</h3>
                </div>
                <div class="site_email">
                        <span>
                            <?php if(get_theme_mod('etrigan_contactus_email_set1')):
                                echo get_theme_mod('etrigan_contactus_email_set1');
                            endif;
                            ?>
                        </span><div class="clearfix"></div>
                    <span>
                            <?php if(get_theme_mod('etrigan_contactus_email_set2')):
                                echo get_theme_mod('etrigan_contactus_email_set2');
                            endif;
                            ?>
                        </span><div class="clearfix"></div>
                    <span>
                            <?php if(get_theme_mod('etrigan_contactus_phone_set1')):
                                echo get_theme_mod('etrigan_contactus_phone_set1');
                            endif;
                            ?>
                        </span><div class="clearfix"></div>
                    <span>
                            <?php if(get_theme_mod('etrigan_contactus_phone_set2')):
                                echo get_theme_mod('etrigan_contactus_phone_set2');
                            endif;
                            ?>
                </div>
            </div>

        </div>
    </div>
    <div class="col-md-12 col-sm-12 contact-map">
        <div class="address_map">
            <a href="<?php echo get_theme_mod('etrigan_contactus_map_url_set');?>" target="_blank">
                <img src="<?php echo get_theme_mod('etrigan_contactus_map_img_set');?>"></a>


        </div>
    </div>
    <div class="col-md-12 contact-form">

        <div class="contact-frm col-md-6">
            <div class="form-title"><?php echo get_theme_mod('etrigan_contactform_title_set')?></div>
            <?php echo do_shortcode(get_theme_mod('etrigan_contactform_shortcode_set'));?>
        </div>
        <div class="col-md-6 contact-msg">
            <h2>Get In Touch</h2>
            <p><?php echo get_theme_mod('etrigan_contactform_message_set') ?></p>
        </div>
        <img class="call-img" src="<?php
        if(get_theme_mod('etrigan_contactus_form_img_set')):
            echo get_theme_mod('etrigan_contactus_form_img_set');
        else:
            echo get_template_directory_uri().'/assets/images/call.png';
        endif;
        ?>">
    </div>


    <footer class="entry-footer">
        <?php etrigan_entry_footer(); ?>
    </footer><!-- .entry-footer -->
</article><!-- #post-## -->