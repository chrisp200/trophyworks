<?php get_header(); ?>

<section id="content">
	

	<?php     
    $args = array( 'post_type' => 'page', 'posts_per_page' => -1, 'orderby' => 'menu_order' );
    $loop = new WP_Query( $args );
    while ( $loop->have_posts() ) : $loop->the_post();
    ?>
    <?php $slug = basename(get_permalink());
     add_post_type_support( 'page', 'page-attributes' );
    ?>
    <?php if ($slug != "catalogue" 
    			&& $slug != "products" 
    			&& $slug != "checkout"
    			&& $slug != "shopping-cart"
    			&& $slug != "my-account"
    			&& $slug != "hockey"
    			&& $slug != "soccer"
    			&& $slug != "football"
    			&& $slug != "basketball"
    			&& $slug != "baseball"
    			&& $slug != "cheerleading"
    		): ?>

	    <article  class="post <?php echo( $slug ); ?>" id="<?php echo( $slug ); ?>">

	        <div class="page">

	            <div class="image">
	                <a href="<?php the_permalink(); ?>">
	                    <?php
	                        if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
	                          //the_post_thumbnail($post->ID,'medium');
	                        } 
	                    ?>
	                </a>
	            </div>
	            <div class="f-left">
		            <div class="title">
		            	<h1>
		                    <?php the_title(); ?>
		                </h1>
		            </div>
		            <div class="excerpt">
		            
		                <?php the_excerpt(); ?>
		                
		            </div>
		        </div>
		        <div class="f-left">
		        	<?php if ($slug == "clients" 
					): ?>
		            <div class="body-content two-col">
		            <?php else:?>
		            <div class="body-content">
		        	<?php endif?>
		            	<p>
		                    <?php the_content(); ?>
		                </p>
		            </div>
	            </div>

	        </div>
	        <div style="clear:both"></div>
	    </article>
	    <div class="goto-top"> Goto Top</div>
	    <div style="clear:both"></div>
	    <hr/>

	<?php endif; ?>

    <?php endwhile;  ?> 



    <div style="clear:both;"></div>
</section>

<?php /* get_sidebar()6; */?>

<?php get_footer(); ?>
<!--
<div class="container">
		<div class="sixteen columns">
			<h1 class="remove-bottom" style="margin-top: 40px">Skeleton</h1>
			<h5>Version 1.1</h5>
			<hr />
		</div>
		<div class="one-third column">
			<h3>About Skeleton?</h3>
			<p>Skeleton is a small collection of well-organized CSS &amp; JS files that can help you rapidly develop sites that look beautiful at any size, be it a 17" laptop screen or an iPhone. It's based on a responsive grid, but also provides very basic CSS for typography, buttons, tabs, forms and media queries. Go ahead, resize this super basic page to see the grid in action.</p>
		</div>
		<div class="one-third column">
			<h3>Three Core Principles</h3>
			<p>Skeleton is built on three core principles:</p>
			<ul class="square">
				<li><strong>A Responsive Grid Down To Mobile</strong>: Elegant scaling from a browser to tablets to mobile.</li>
				<li><strong>Fast to Start</strong>: It's a tool for rapid development with best practices</li>
				<li><strong>Style Agnostic</strong>: It provides the most basic, beautiful styles, but is meant to be overwritten.</li>
			</ul>
		</div>
		<div class="one-third column">
			<h3>Docs &amp; Support</h3>
			<p>The easiest way to really get started with Skeleton is to check out the full docs and info at <a href="http://www.getskeleton.com">www.getskeleton.com.</a>. Skeleton is also open-source and has a <a href="https://github.com/dhgamache/skeleton">project on git</a>, so check that out if you want to report bugs or create a pull request. If you have any questions, thoughts, concerns or feedback, please don't hesitate to email me at <a href="mailto:hi@getskeleton.com">hi@getskeleton.com</a>.</p>
		</div>

	</div><!-- container -->