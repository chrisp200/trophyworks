<?php 
list($bfa_ata, $cols, $left_col, $left_col2, $right_col, $right_col2, $bfa_ata['h_blogtitle'], $bfa_ata['h_posttitle']) = bfa_get_options();
get_header(); 
extract($bfa_ata); 
?>

<?php /* If there are any posts: */
if (have_posts()) : $bfa_ata['postcount'] = 0; /* Postcount needed for option "XX first posts full posts, rest excerpts" */ ?>


	<?php while (have_posts()) : the_post(); $bfa_ata['postcount']++; ?>
	
		<?php /* Post Container starts here */
		if ( function_exists('post_class') ) { ?>
		<div <?php if ( is_page() ) { post_class('post'); } else { post_class(); } ?> id="post-<?php the_ID(); ?>">
		<?php } else { ?>
		<div class="<?php echo ( is_page() ? 'page ' : '' ) . 'post" id="post-'; the_ID(); ?>">
		<?php } ?>
		<?php bfa_post_kicker('<div class="post-kicker">','</div>'); ?>
		<?php bfa_post_headline('<div class="post-headline">','</div>'); ?>
		<?php bfa_post_byline('<div class="post-byline">','</div>'); ?>
		<?php bfa_post_bodycopy('<div class="post-bodycopy clearfix">','</div>'); ?>
		<?php bfa_post_footer('<div class="post-footer">','</div>'); ?>
		</div><!-- / Post -->	
						
	<?php endwhile; ?>
    
	<?php edit_post_link( __( 'Edit', 'twentyeleven' ), '<span class="edit-link">', '</span>' ); ?>

	<?php if ( is_active_sidebar( 'sidebar-related' ) ) : ?>
        <div id="cross-content">
          <?php dynamic_sidebar( 'sidebar-related' ); ?>
        </div>
    <?php endif; ?>

	<?php bfa_get_comments(); // Load Comments template (on single post pages, and static pages, if set on options page): ?>

<?php /* END of: If there are any posts */
else : /* If there are no posts: */ ?>

<?php // Deactivated since 3.6.5
#include 'bfa://content_not_found'; 
// Uses the following static code instead: ?>
<h2><?php _e('Not Found','atahualpa'); ?></h2>
<p><?php _e("Sorry, but you are looking for something that isn't here.","atahualpa"); ?></p>

<?php endif; /* END of: If there are no posts */ ?>

<?php get_footer(); ?>