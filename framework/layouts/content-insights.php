<?php
/**
 * @package Etrigan
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('col-md-6 col-sm-6 grid grid_2_column insight'); ?>>
    <div class="grid col-md-12 col-sm-12">
        <figure class="effect-julia">
            <div>
                <?php if (has_post_thumbnail()) : ?>
                    <a href="<?php the_permalink() ?>" title="<?php the_title_attribute() ?>"><?php the_post_thumbnail('etrigan-sq-thumb'); ?></a>
                <?php else: ?>
                    <a href="<?php the_permalink() ?>" title="<?php the_title_attribute() ?>">
                        <img src="<?php echo get_template_directory_uri()."/assets/images/placeholder-sq.jpg"; ?>">
                    </a>
                <?php endif; ?>

            </div>
            <figcaption>
                <h2> <?php  echo the_title(); ?></h2>
                <div>
                    <?php $excerpt_val = get_the_excerpt();?>
                    <p><?php echo substr($excerpt_val, 0 , 25 );?></p>
                    <p><?php echo substr($excerpt_val, 26 , 30 );?></p>
                    <p><?php echo substr($excerpt_val, 31 , 38 );?></p>
                </div>
                <a href="<?php the_permalink();?>"></a>
            </figcaption>
        </figure>
    </div>

</article><!-- #post-## -->