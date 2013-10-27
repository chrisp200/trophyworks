<?php
	/**
 * Template Name: Store Front Template
 * Description: Home Page
 **/	

get_header(); ?>
<div class="page clearfix">
    <section class="content">
        
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        
              
        <div class="page-body" id="post-<?php the_ID(); ?>">
        
            <?php //include (TEMPLATEPATH . '/inc/meta.php' ); ?>
        
            <div class="entry">

                <h1>Store</h1>
        
                <?php the_content(); ?>

                <!-- [tcp_list id="all_products"] -->
        
                <?php wp_link_pages(array('before' => 'Pages: ', 'next_or_number' => 'number')); ?>
        
            </div>
        
            <?php edit_post_link('Edit this entry.', '<p>', '</p>'); ?>
            
        </div>
        <hr>
        <?php // comments_template(); ?>
        
        <?php endwhile; endif; ?>
        
        <div class="store-front">
            <!-- posts/products -->
            
            <?php     
            $args = array( 'post_type' => 'tcp_product', 'posts_per_page' => -1, 'orderby' => 'title', 'order' => 'ASC' );
            $loop = new WP_Query( $args );
            while ( $loop->have_posts() ) : $loop->the_post();
            ?>
            
            <article  class="post product tcp_product">

                <div class="content">

                    <div class="image">
                        <a href="<?php the_permalink(); ?>">
                            <?php
                                if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
                                  the_post_thumbnail($post->ID,'medium');
                                } 
                            ?>
                        </a>
                    </div>

                    <div class="information">

                        <div class="header">
                            <h1>
                                <a href="<?php the_permalink(); ?>">
                                    <?php  tcp_the_title( ); ?>
                                </a>
                            </h1>
                            <span class="excerpt">
                                <?php tcp_the_excerpt(); ?>
                            </span>
                            
                        </div>
                        <div>
                            <h3><strong><?php echo tcp_get_the_price_label( $post_id ); ?></strong></h3>
                            <div ><a class='btn' href="<?php the_permalink(); ?>">View product</a></div>
                        </div>  
                    </div>

                </div>
                <div style="clear:both"></div>
            </article>
            <?php endwhile; ?> 

    	</div><!-- /end of store front -->

    </section>

    <div class="sidebar">
        <?php get_sidebar(); ?>
    </div>
</div>
<?php get_footer(); ?>