<?php

	/**
 * Template Name: Home Page Template
 * Description: trophyworks Page
 **/

 get_header(); ?>

<?php get_header(); ?>
	</hr>
	<div class='container'> 
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			
		<div class="post" id="post-<?php the_ID(); ?>">


			<?php //include (TEMPLATEPATH . '/inc/meta.php' ); ?>

			<div class="entry">

				<?php the_excerpt(); ?>

				<?php the_content(); ?>

				<?php wp_link_pages(array('before' => 'Pages: ', 'next_or_number' => 'number')); ?>

			</div>

		</div>
		
		<?php // comments_template(); ?>

		<?php endwhile; endif; ?>

<?php// get_sidebar(); ?>
</div> 
<?php get_footer(); ?>