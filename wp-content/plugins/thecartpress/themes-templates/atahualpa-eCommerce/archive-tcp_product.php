<?php 
list($bfa_ata, $cols, $left_col, $left_col2, $right_col, $right_col2, $bfa_ata['h_blogtitle'], $bfa_ata['h_posttitle']) = bfa_get_options();
get_header(); 
extract($bfa_ata); 
?>

    <div class="archive status-publish hentry post tcp-products odd">

		<div class="post-headline">
				<h1 class="page-title">
                   <?php
                        printf( $wp_query->queried_object->labels->name );
                    ?> 
				</h1>
         </div>
         
        <div class="post-bodycopy clearfix">
				<?php
				/* Run the loop for the category page to output the products.
				 */
				get_template_part( 'loop', 'tcp-grid' );
				?>
  		</div>

   </div>
<?php get_footer(); ?>
