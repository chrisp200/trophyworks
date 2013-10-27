<?php 
list($bfa_ata, $cols, $left_col, $left_col2, $right_col, $right_col2, $bfa_ata['h_blogtitle'], $bfa_ata['h_posttitle']) = bfa_get_options();
get_header(); 
extract($bfa_ata); 
?>


    <div class="archive taxonomy status-publish hentry post tcp-products odd">

		<div class="post-headline">
				<h1 class="page-title"><?php single_cat_title( '' ); ?></h1>
         
				<?php
					$category_description = category_description();
					if ( ! empty( $category_description ) )
						echo '<div class="archive-meta">' . $category_description . '</div>'; ?>
		</div> 

        <div class="post-bodycopy clearfix">

				<?php /* Run the loop for the taxonomy page to output the products.
				 */
				get_template_part( 'loop', 'tcp-grid' );
				?>

				<?php if ( is_active_sidebar( 'sidebar-related' ) ) : ?>
                    <div id="cross-content">
                      <?php dynamic_sidebar( 'sidebar-related' ); ?>
                    </div>
                <?php endif; ?>
        </div>
   </div>
     
 <?php get_footer(); ?>
