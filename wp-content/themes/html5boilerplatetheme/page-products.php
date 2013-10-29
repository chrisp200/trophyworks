<?php

	/**
 * Template Name: Products Page Template
 * Description: Products Page
 **/

 get_header(); ?>
<div class='container'> 	
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			
		<div class="post" id="post-<?php the_ID(); ?>">

			<h1><?php the_title(); ?></h1>

			<?php //include (TEMPLATEPATH . '/inc/meta.php' ); ?>

			<div class="entry">

				<?php the_excerpt(); ?>

				<?php the_content(); ?>


			</div>

			<div class='online-products'>
				<ul class=" row-fluid">
					<!-- <li>
						<a href="/baseball">
							<div class="sport-icon"><img src="/wp-content/uploads/2013/09/t27_t-f-1446-g.png"/></div>
							<h3>Baseball</h3>
						</a>
					</li> -->
					<li class="well span3">
						<a href="/basketball">
							<div class="sport-icon"><img src="/wp-content/uploads/2013/09/t29_t_m-591-g.png"/></div>
							<h3>Basketball</h3>
						</a>
					</li>
					<li class="well  span3">
						<a href="/cheerleading">
							<div class="sport-icon"><img src="/wp-content/uploads/2013/09/t30_t-f-506-g.png"/></div>
							<h3>Cheerleading</h3>
						</a>
					</li>
					<!-- <li>
						<div class="sport-icon"><img src="/wp-content/uploads/2013/09/t30_t-f-506-g.png"/></div>
						<h3><a href="/hockey">Hockey</a></h3>
					</li> -->
					<li class="well span3">
						<a href="/football">
							<div class="sport-icon"><img src="/wp-content/uploads/2013/09/t18_t-79-g.png"/></div>
							<h3>Football</h3>
						</a>
					</li>
					<li class="well span3">
						<a href="/soccer">
							<div class="sport-icon"><img src="/wp-content/uploads/2013/09/t23_t-m-5017-g.png"/></div>
							<h3>Soccer</h3>
						</a>
					</li>
				</ul>
				<div class="clear"/>
			</div>

			<?php edit_post_link('Edit this entry.', '<p>', '</p>'); ?>

		</div>
		
		<?php // comments_template(); ?>

		<?php endwhile; endif; ?>

<?php// get_sidebar(); ?>
</div> <!-- /end of container -->
<?php get_footer(); ?>