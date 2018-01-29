<?php if(get_theme_mod('etrigan_fumega_enable')):?>
    <div id="featured-umega" class="featured-section-area container">
        <div class="col-md-12 col-sm-12 showcase-cnt">
            <div class="col-md-3 col-sm-3 showcase-static">
                <div class="showcase-static-inner">
                    <div class="showcase-title">
                        <?php if(get_theme_mod('etrigan_fumega_showcase_title')):
                            echo esc_html(get_theme_mod('etrigan_fumega_showcase_title'));?>
                        <?php endif;?>
                    </div>
                    <div class="showcase-desc">
                        <?php if(get_theme_mod('etrigan_fumega_showcase_desc')):
                            echo esc_html(get_theme_mod('etrigan_fumega_showcase_desc'));?>
                        <?php endif;?>
                    </div>
                </div>
            </div>
            <div class="col-md-9 col-sm-9 showcase-posts">

            <?php /* Start the Loop */ $count=0; ?>
            <?php
            $args = array( 'posts_per_page' => 3, 'category' => esc_html(get_theme_mod('etrigan_fumega_cat')) );
            $lastposts = get_posts( $args );
            foreach ( $lastposts as $post ) :
                setup_postdata( $post ); ?>

                <div class="grid col-md-4 col-sm-4">
                    <figure class="effect-phoebe">
                        <div>
                            <?php if (has_post_thumbnail()) : ?>
                                <a href="<?php the_permalink() ?>" title="<?php the_title_attribute() ?>"><?php the_post_thumbnail('etrigan-sq-thumb',array(  'alt' => trim(strip_tags( $post->post_title )))); ?></a>
                            <?php else : ?>
                                <a href="<?php the_permalink() ?>" title="<?php the_title_attribute() ?>"><img alt="<?php the_title() ?>" src="<?php echo get_template_directory_uri()."/assets/images/placeholder-sq.jpg"; ?>"></a>
                            <?php endif; ?>
                        </div>
                        <figcaption>
                            <h3> <?php  echo the_title(); ?></h3>
                            <a href="<?php the_permalink();?>"></a>
                        </figcaption>
                    </figure>
                </div>
                <?php $count++;
                if ($count == 4) break;
            endforeach; ?>
            <?php wp_reset_postdata(); ?>
            </div>
        </div>

    </div>
<?php endif;?>