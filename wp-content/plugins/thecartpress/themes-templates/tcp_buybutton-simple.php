<?php

/**
 * This file is part of TheCartPress.
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */

global $thecartpress;
$disable_shopping_cart	= $thecartpress->get_setting( 'disable_shopping_cart' );
$after_add_to_cart		= $thecartpress->get_setting( 'after_add_to_cart', '' );
if ( $after_add_to_cart == 'ssc' ) $action = get_permalink( tcp_get_current_id( get_option( 'tcp_shopping_cart_page_id', '' ), 'page' ) );
elseif ( $after_add_to_cart == 'sco' ) $action = get_permalink( tcp_get_current_id( get_option( 'tcp_checkout_page_id', '' ), 'page' ) );
else $action = '';

/**** Start editing to customise your buy buttons! */ ?>
<div class="tcp_buy_button_area tcp_buy_button_simple tcp_buy_button_<?php echo get_post_type(); ?> tcp-cf <?php echo implode( ' ' , apply_filters( 'tcp_buy_button_get_product_classes', array(), $post_id ) ); ?>">
<form method="post" id="tcp_frm_<?php echo $post_id; ?>" action="<?php echo $action; ?>">
<?php do_action( 'tcp_buy_button_top', $post_id ); ?>
<div class="tcp_buy_button tcp_buy_button_simple">

	<?php if ( function_exists( 'tcp_has_dynamic_options' ) && tcp_has_dynamic_options( $post_id ) ) : ?>
		<div class="tcp-buy-dynamic-options">
			<?php tcp_the_buy_button_dynamic_options( $post_id ); ?>


			

			<?php 
				$first_url = '';
				$opps = tcp_get_attributes_by_product($post_id);
				foreach ($opps as $opp):
			?>

			

			<!-- Modal -->
			<div id="myModal-<?php echo $opp->name ?>" class="modal hide fade column-grid" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			  <div class="modal-header">
			    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			    <h3 id="myModalLabel"><?php echo $opp->name ?></h3>
			  </div>
			  <div class="modal-body">
			    <p></p>
			    <ul class="thumbnails">
				  <?php 
				  	$terms = get_terms($opp->name);
				  	$first_url = wp_get_attachment_url(tcp_get_taxonomy_image_id($terms[0]->term_id,true) );
			  		foreach ($terms as $term ) : ?>

			  			<?php 

			  				$img_url = wp_get_attachment_url(tcp_get_taxonomy_image_id($term->term_id,true) );

			  				// echo $term->name;
			  			?>

			  			<li class="span3">
						    <div class="thumbnail" id='<?php echo $term->slug ?>'>
						      <img class="lazy" src="<?php echo get_template_directory_uri(); ?>/images/ajax-loader.gif" data-original="<?php echo $img_url; ?>" width="150" height="150" alt="">
						      <!-- <h3>C1</h3> -->
						      <small><?php echo $term->name;?></small>
						    </div>
						</li>

					<?php endforeach; ?>
				</ul>
			  </div>
			  <div class="modal-footer">
			    <!-- <b></b>utton class="btn" data-dismiss="modal" aria-hidden="true">Close</button> -->
			    <!-- <button class="btn btn-primary">Save changes</button> -->

			  </div>
			</div>
			<?php if ($first_url) : ?>
			<div class="<?php echo $opp->name ?>-container">
				<div class="selected">
					<a href="#myModal-<?php echo $opp->name ?>" role="button" data-toggle="modal">
						<div class="thumbnail">
					      <img class="img-polaroid" src="<?php echo $first_url ?>" width="150" height="150" alt="">
					      <!-- <h3>C1</h3> -->
					      <!-- <small><?php //echo 'c' . ($i + 1);?></small> -->
					    </div>
					</a>
				</div>
				<a href="#myModal-<?php echo $opp->name ?>" role="button" class="btn" data-toggle="modal">View More <?php echo $opp->name ?></a>
			</div>
			 
			<script>
				$('#myModal-<?php echo $opp->name ?> img.lazy').lazyload({ threshold : 5 ,effect:'fadeIn', container: $("#myModal-<?php echo $opp->name ?>  .modal-body")});
				$('#myModal-<?php echo $opp->name ?> .thumbnail').first().css('background-color', 'rgb(221, 243, 253)').addClass('active');
				$('select#tcp_dynamic_option_<?php echo $opp->name ?>_<?php echo $post_id?>').closest('label').hide();
				$('#myModal-<?php echo $opp->name ?> .thumbnail').on('click touchstart',function(e){
					$('#myModal-<?php echo $opp->name ?> .thumbnail').removeClass('active').css('background-color', 'rgb(255, 255, 255)');
					$(this).addClass('active').css('background-color', 'rgb(221, 243, 253)');
					$('.<?php echo $opp->name ?>-container .thumbnail img').attr('src',$(this).find('img').attr('src'));
					console.log('changeing - ' + $('.<?php echo $opp->name ?>-container .thumbnail img').attr('src'));
					console.log('changeing to - ' + $(this).find('img').attr('src'));
					$('#myModal-<?php echo $opp->name ?>').modal('hide');

					$('select#tcp_dynamic_option_<?php echo $opp->name ?>_<?php echo $post_id?>').val($(this).attr('id'));
					$('select#tcp_dynamic_option_<?php echo $opp->name ?>_<?php echo $post_id?>').trigger('change');
				})
				$('#myModal-<?php echo $opp->name ?>').on('shown', function() {
			        $("#myModal-<?php echo $opp->name ?>  .modal-body").scroll();
			    })
			</script>
			<?php endif; ?>
			<?php endforeach; ?>


			<?php
			//this method is in tcp_dynamic_options_templates php in the plugin
			// function tcp_get_terms_iddds( $taxonomy ) {
			// 	$slugs = array();
			// 	$terms = get_terms( $taxonomy, array( 'hide_empty' => 0 ) );
			// 	foreach ( $terms as $term ) {
			// 		$slugs[] = $term->term_id;
			// 	}
			// 	return $slugs;
			// }

			// $test = tcp_get_attributes_by_product($post_id);
			// $t1 = $test[0];
			// print_r($t1->name);
			// echo '<hr>';
			// // print_r($test);

			// $taxonomies=get_the_terms($post_id,'top'); 
			// // print_r($taxonomies);
			// foreach ($test as $taxonomy ) {
			//   // echo '<p>'. $taxonomy->name . '</p>';
			//   // echo '<br/>';
			//   // print_r(tcp_get_terms_ids($taxonomy->name));
			  
			//   // $terms = tcp_get_terms_ids($taxonomy->name);

			//   // foreach ($terms as $term ) {
			//   // 	# code...
			//   // //	echo wp_get_attachment_url(tcp_get_taxonomy_image_id($term,true) );
			//   // }
			  
			//   //echo '<hr>';

			  
			// }


			?>

		</div>
	<?php endif; ?>
	<?php if ( ! tcp_hide_buy_button( $post_id ) && ! $disable_shopping_cart ) : ?>
		<div class="tcp-add-to-cart">
			<?php tcp_the_add_to_cart_unit_field( $post_id, tcp_get_the_initial_units( $post_id ) ); ?>
			<?php tcp_the_add_to_cart_button( $post_id ); ?>
			<div class="tcp-add-to-wishlist">
				<?php tcp_the_add_wishlist_button( $post_id ) ; ?>
			</div>
			<?php tcp_the_add_to_cart_items_in_the_cart( $post_id ); ?>
		</div>
	<?php endif; ?>
	<?php if ( function_exists( 'tcp_the_tier_price' ) ) tcp_the_tier_price( $post_id ); ?>
	<div class="tcp_unit_price" id="tcp_unit_price_<?php echo $post_id; ?>">
		<?php  echo tcp_get_the_price_label( $post_id ); ?>
	</div>
</div>
<?php do_action( 'tcp_buy_button_bottom', $post_id ); ?>
</form>
</div>
