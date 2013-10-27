

<?php get_header(); ?> 
<div class="page clearfix">
	<div class="content">

		<?php /* If there are any posts: */
		if (have_posts()) : $bfa_ata['postcount'] = 0; /* Postcount needed for option "XX first posts full posts, rest excerpts" */ ?>


			<?php while (have_posts()) : the_post(); $bfa_ata['postcount']++; ?>
			
				<?php /* Post Container starts here */
				if ( function_exists('post_class') ) { ?>
				<div <?php if ( is_page() ) { post_class('post'); } else { post_class(); } ?> id="post-<?php the_ID(); ?>">
				<?php } else { ?>
				<div class="product <?php echo ( is_page() ? 'page ' : '' ) . 'post" id="post-'; the_ID(); ?>">
				<?php } ?>


					<div class="header">
						<h1><?php  tcp_the_title( ); ?></h1>
						<span class="excerpt">
                            <?php //the_excerpt(); ?>
                        </span>
						
						<span class="body-w">
                            <?php //the_content(); ?>
                        </span>
					</div>
					<hr>
					<div class="content">

						<div class="image">
							<?php
							if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
			                  the_post_thumbnail($post->ID,'medium');
			                } 
			                ?>
						</div>
						<div>
							<h3><strong>Discription:</strong></h3>
							<p><?php echo get_the_content(); ?></p>
							<p><?php //the_content(); 
							$tax = tcp_get_attributes_by_product($post->ID);
							//echo var_dump($tax[0]);
							//echo '<hr>'; 
							//var_dump(tcp_get_custom_taxonomies($tax));
							//echo '<hr>&&&&&&&&&&&&';
							
							?></p>

							<?php //if ( $post->see_thumbnail() ) : ?>
								<div class="tcp_cart_thumbnail">
								<!--  THIS CAN GET THE THUMNAIL OF A VARIATION OF A PRODUCT -->
								<?php $size = apply_filters( 'tcp_get_shopping_cart_image_size', array( 32, 32 ) );
								//echo tcp_get_the_thumbnail_image( 608 ,'medium'); ?>
								<!-- echo tcp_get_the_thumbnail( $my_postid, $order_detail->get_option_1_id(), $order_detail->get_option_2_id(), $size );  -->
								</div>
							<?php //endif; ?>
							<hr>
						</div>
						<div class="information">
								

							<div class="options">

								<?php //tcp_attribute_list( array( 'size', 'colur', 'tcp_product_tag' ) ); ?>

							</div>

							<div class="buy-area">
								<?php  

								tcp_the_buy_button(); 

								//cp_the_add_to_cart_button($post->ID);

								?>
							</div>	

							
							
						</div>
					</div>
				



				<?php //bfa_post_kicker('<div class="post-kicker">','</div>'); ?>
				<?php //bfa_post_headline('<div class="post-headline">','</div>'); ?>
				<?php //bfa_post_byline('<div class="post-byline">','</div>'); ?>
				<?php //bfa_post_bodycopy('<div class="post-bodycopy clearfix">','</div>'); ?>
				<?php //bfa_post_footer('<div class="post-footer">','</div>'); ?>
				</div><!-- / Post -->	
								
			<?php endwhile; ?>
		    
			
			<?php if ( is_active_sidebar( 'sidebar-related' ) ) : ?>
		        <div id="cross-content">
		          <?php dynamic_sidebar( 'sidebar-related' ); ?>

		        </div>
		    <?php endif; ?>

			

		<?php /* END of: If there are any posts */
		else : /* If there are no posts: */ ?>

		<?php // Deactivated since 3.6.5
		#include 'bfa://content_not_found'; 
		// Uses the following static code instead: ?>
		<h2><?php _e('Not Found','atahualpa'); ?></h2>
		<p><?php _e("Sorry, but you are looking for something that isn't here.","atahualpa"); ?></p>

		<?php endif; /* END of: If there are no posts */ ?>
	</div>	

	<div class="sidebar">
		<?php get_sidebar(); ?>
	</div>
</div>
<?php get_footer(); ?>