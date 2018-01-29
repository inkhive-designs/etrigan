<?php
/**
 * @package Etrigan
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('col-md-6 col-sm-6 col-xs-12 grid grid_2_column insight'); ?>>
    <div class="grid col-md-12 col-sm-12 col-xs-12">
        <figure class="effect-julia">
            <div>
                <?php if (has_post_thumbnail()) : ?>
                    <a href="<?php the_permalink() ?>" title="<?php the_title_attribute() ?>"><?php the_post_thumbnail('etrigan-sq-thumb',array(  'alt' => trim(strip_tags( $post->post_title )))); ?></a>
                <?php else: ?>
                    <a href="<?php the_permalink() ?>" title="<?php the_title_attribute() ?>">
                        <img alt = "<?php the_title() ?>" src="<?php echo get_template_directory_uri()."/assets/images/placeholder-sq.jpg"; ?>">
                    </a>
                <?php endif; ?>

            </div>
            <figcaption>
                <?php  $ttl= get_the_title();
                                $range_ttl= strlen($ttl);
                                if($range_ttl > 16):?>
                                    <h2 style="font-size: 18px;">
                                        <?php echo the_title();?>
                                    </h2>
                                    <?php else:?>
                                    <h2>
                                        <?php echo the_title();?>
                                    </h2>
               <?php endif;  ?>

                <div>
                    <?php $excerpt_val = get_the_excerpt();
                    $ex = explode(" ",$excerpt_val); ?>
                    <p><?php  for ($i =  0; $i < 3; $i++) echo $ex[$i]." "; ?></p><div class="clearfix"></div>
                    <p><?php  for ($i =  3; $i < 7; $i++) echo $ex[$i]." "; ?></p><div class="clearfix"></div>
                    <p><?php  for ($i =  7; $i < 11; $i++): echo $ex[$i]." "; endfor; echo "..." ?></p>

                </div>
                <a href="<?php the_permalink();?>"></a>
            </figcaption>
        </figure>
    </div>

</article><!-- #post-## -->