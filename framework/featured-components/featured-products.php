<?php if ( get_theme_mod('etrigan_box_enable') && is_front_page() ) : ?>
<div id="featured-products" class="container">
	<div class="col-md-4 col-sm-4">
    <?php if ( get_theme_mod('etrigan_slider_title')) : ?>
	<div class="section-title title-font">
		<?php echo esc_html( get_theme_mod('etrigan_slider_title',__('Featured Products','etrigan')) ); ?>
	</div>
        <?php endif; ?>
	    <div class="fp-container">
	        <div class="swiper-wrapper">
	            <?php
				        $args = array( 
			        	'post_type' => 'product',
			        	'posts_per_page' => esc_html(get_theme_mod('etrigan_slider_count',10)),
			        	'tax_query' => array(
								         array(
								            'taxonomy'      => 'product_cat',
								            'terms'         => esc_html( get_theme_mod('etrigan_slider_cat',0) ),
								            'operator'      => 'IN' // Possible values are 'IN', 'NOT IN', 'AND'.
									         )
						    )
				        );
				        $loop = new WP_Query( $args );
				        while ( $loop->have_posts() ) : 
				        
				        	$loop->the_post(); 
				        	global $product; 
				        	
				        	if ( has_post_thumbnail() ) :
				        		$image_data = wp_get_attachment_image_src( get_post_thumbnail_id( $loop->post->ID), 'shop_catalog' ); 
								$image_url = $image_data[0];

                            else:
                                $image_url = get_template_directory_uri()."/assets/images/placeholder-sq.jpg";
							endif;		
				        	
				        ?>
						
							<div class="swiper-slide">
								<a href="<?php echo get_permalink( $loop->post->ID ) ?>" title="<?php echo esc_attr($loop->post->post_title ? $loop->post->post_title : $loop->post->ID); ?>">
									<img alt ="<?php the_title() ?>" src="<?php echo $image_url; ?>">
									<div class="product-details">
										<h3><?php the_title(); ?></h3>
										<span class="price"><?php echo $product->get_price_html(); ?></span>
									</div>
								</a>
								</div>
													
						 <?php endwhile; ?>
						 <?php wp_reset_query(); ?>	
		            
		        </div>
	        <!-- Add Pagination -->
	        
	        <div class="swiper-button-next sbnc swiper-button-white"></div>
        <div class="swiper-button-prev sbpc swiper-button-white"></div>
	    </div>
	</div> 
	<!--col-md-4-ends-->
	
	<div class="col-md-8 col-sm-8">
    <?php if ( get_theme_mod('etrigan_box_title')) : ?>
	<div class="section-title title-font">
		<?php echo esc_html( get_theme_mod('etrigan_box_title',__('Trending','etrigan')) ) ?>
	</div>
        <?php endif; ?>
	    <div class="featured-grid-container">
	        <div class="fg-wrapper">
	            <?php
				        $args = array( 
			        	'post_type' => 'product',
			        	'posts_per_page' => 8, 
			        	'tax_query' => array(
								         array(
								            'taxonomy'      => 'product_cat',
								            'terms'         => esc_html( get_theme_mod('etrigan_box_cat',0) ),
								            'operator'      => 'IN' // Possible values are 'IN', 'NOT IN', 'AND'.
								         )
									)
						);
				        $loop = new WP_Query( $args );
				        while ( $loop->have_posts() ) : 
				        
				        	$loop->the_post(); 
				        	global $product; 
				        	
				        	if ( has_post_thumbnail() ) :
				        		$image_data = wp_get_attachment_image_src( get_post_thumbnail_id( $loop->post->ID), 'shop_catalog' ); 
								$image_url = $image_data[0];
                            else:
                                $image_url = get_template_directory_uri()."/assets/images/placeholder-sq.jpg";
							endif;		
				        	
				        ?>
						<div class="fg-item-container col-md-3 col-sm-3 col-xs-6">
							<div class="fg-item">
								<a href="<?php echo get_permalink( $loop->post->ID ) ?>" title="<?php echo esc_attr($loop->post->post_title ? $loop->post->post_title : $loop->post->ID); ?>">
									<img alt="<?php the_title() ?>" src="<?php echo $image_url; ?>">
									<div class="product-details">
										<h3><?php the_title(); ?></h3>
										<span class="price"><?php echo $product->get_price_html(); ?></span>
									</div>
								</a>
								</div>
						</div>					
						 <?php endwhile; ?>
						 <?php wp_reset_query(); ?>	
						
		        </div>	        
	    </div>
	</div>     
</div>
<?php endif; ?>