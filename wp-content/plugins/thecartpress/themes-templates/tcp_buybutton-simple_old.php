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
			<h3><strong>Options:</strong></h3>



			<!-- Button to trigger modal -->
			<div class="tops-container">
				<div class="selected">
					<a href="#myModal-Tops" role="button" data-toggle="modal">
						<div class="thumbnail">
					      <img class="img-polaroid" src="<?php echo get_template_directory_uri(); ?>/images/thumbnails/t<?php echo ($i + 1); ?>.png" width="150" height="150" alt="">
					      <!-- <h3>C1</h3> -->
					      <!-- <small><?php //echo 'c' . ($i + 1);?></small> -->
					    </div>
					</a>
				</div>
				<a href="#myModal-Tops" role="button" class="btn" data-toggle="modal">View More Tops</a>
			</div>
			<div class="columns-container">
				<div class="selected">
					<a href="#myModal" role="button" data-toggle="modal">
						<div class="thumbnail">
					      <img class="img-polaroid" src="<?php echo get_template_directory_uri(); ?>/images/thumbnails/c<?php echo ($i + 1); ?>.jpg" width="150" height="150" alt="">
					      <!-- <h3>C1</h3> -->
					      <!-- <small><?php //echo 'c' . ($i + 1);?></small> -->
					    </div>
					</a>
				</div>
				<a href="#myModal" role="button" class="btn" data-toggle="modal">View More Columns</a>
			</div>
			


			<?php tcp_the_buy_button_dynamic_options( $post_id ); ?>



			<!--  -->

		
			<div class=""></div>
		 
			<!-- Modal -->
			<div id="myModal" class="modal hide fade column-grid" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			  <div class="modal-header">
			    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			    <h3 id="myModalLabel">Columns</h3>
			  </div>
			  <div class="modal-body">
			    <p></p>
			    <ul class="thumbnails">
				  <?php for( $i = 0; $i <= 48; $i++): ?>
				  <li class="span1">
				    <div class="thumbnail">
				      <img class="lazy" src="<?php echo get_template_directory_uri(); ?>/images/ajax-loader.gif" data-original="<?php echo get_template_directory_uri(); ?>/images/thumbnails/c<?php echo ($i + 1); ?>.jpg" width="150" height="150" alt="">
				      <!-- <h3>C1</h3> -->
				      <small><?php echo 'c' . ($i + 1);?></small>
				    </div>

					<?php endfor; ?>
				</ul>
			  </div>
			  <div class="modal-footer">
			    <!-- <b></b>utton class="btn" data-dismiss="modal" aria-hidden="true">Close</button> -->
			    <!-- <button class="btn btn-primary">Save changes</button> -->

			  </div>
			</div>
			 
			<!-- Modal -->
			<div id="myModal-Tops" class="modal hide fade tops-grid" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			  <div class="modal-header">
			    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			    <h3 id="myModalLabel">Tops</h3>
			  </div>
			  <div class="modal-body">
			    <p></p>
			    <ul class="thumbnails">
				  <?php for( $i = 0; $i <= 29; $i++): ?>
				  <li class="span2">
				    <div class="thumbnail">
				      <img class="lazy" src="<?php echo get_template_directory_uri(); ?>/images/ajax-loader.gif" data-original="<?php echo get_template_directory_uri(); ?>/images/thumbnails/t<?php echo ($i + 1); ?>.png" width="150" height="150" alt="">
				      <!-- <h3>C1</h3> -->
				      <small><?php echo 't' . ($i + 1);?></small>
				    </div>

					<?php endfor; ?>
				</ul>
			  </div>
			  <div class="modal-footer">
			    <!-- <b></b>utton class="btn" data-dismiss="modal" aria-hidden="true">Close</button> -->
			    <!-- <button class="btn btn-primary">Save changes</button> -->

			  </div>
			</div>



		<!--  -->



			<!-- <hr> -->

			<?php 

			$options = tcp_get_dynamic_options($post->ID);

			//echo var_dump($options[2]);

			//echo tcp_get_attribute_set(1);

			//echo var_dump($options[0]->label);

			// echo '****************';

			// echo $options[0];




			?>

			<!-- <hr> -->

			<?php 
				$taxonomies=get_taxonomies('','names'); 
				foreach ($taxonomies as $taxonomy ) {
				  //echo '<p>'. $taxonomy. '</p>';

				  //echo var_dump(tcp_get_custom_taxonomies($taxonomy));

				 // echo '<ul class="styles">';
					//echo get_the_term_list( $post->ID, $taxonomy, '<li>', ',</li><li>', '</li>' );
					//echo '</ul>';
				}
			?>
			<!-- <hr> -->
			<?php
			$posttags = get_the_tags();
			if ($posttags) {
			  foreach($posttags as $tag) {
			    //echo $tag->name . ' '; 
			  }
			}
			?>
		</div>
		
	<?php endif; ?>

	<?php if ( function_exists( 'tcp_the_buy_button_options' ) && tcp_has_options( $post_id ) ) : ?>  

		<div class="tcp-buy-options">

			<?php echo tcp_the_buy_button_options( $post_id ); 

			?>

		</div>



	<?php else : ?>

		<div class="tcp_unit_price" id="tcp_unit_price_<?php echo $post_id; ?>">

			<?php echo tcp_get_the_price_label( $post_id ); ?>

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

	<?php if ( function_exists( 'tcp_the_tier_price' ) ) tcp_the_tier_price(); ?>

</div>
<?php do_action( 'tcp_buy_button_bottom', $post_id ); ?>

</form>
</div>
