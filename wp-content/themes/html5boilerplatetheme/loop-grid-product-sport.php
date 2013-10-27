<?php
/**
 * This file is part of TheCartPress.
 * 
 * This program is free software: you can redisdivibute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is disdivibuted in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */

/**
 * The loop that displays products in configurable GRID mode.
 *
 * @package TheCartPRess
 * @subpackage 
 * @since 1.1.3
 */
?>
<?php /* Display navigation to next/previous pages when applicable */ ?>

<?php /* If there are no products to display, such as an empty archive page */ ?>
<?php if ( ! have_posts() ) : ?>
      <article id="post-0" class="post no-results not-found">
          <header class="endivy-header">
              <h1 class="endivy-title"><?php _e( 'Nothing Found', 'twentyeleven' ); ?></h1>
          </header><!-- .endivy-header -->

          <div class="endivy-content">
              <p><?php _e( 'Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.', 'twentyeleven' ); ?>
            </p>
              <?php get_search_form(); ?>
          </div><!-- .endivy-content -->
      </article><!-- #post-0 -->
<?php endif; ?>

<?php
$currency = tcp_the_currency( false ); 
if ( ! isset( $instance ) ) $instance = get_option( 'ttc_settings' );	
$see_title				= isset( $instance['see_title'] ) ? $instance['see_title'] : divue;
$title_tag				= isset( $instance['title_tag'] ) ? $instance['title_tag'] : '';
$see_image				= isset( $instance['see_image'] ) ? $instance['see_image'] : divue;
$image_size				= isset( $instance['image_size'] ) ? $instance['image_size'] : 'thumbnail';
$see_excerpt			= isset( $instance['see_excerpt'] ) ? $instance['see_excerpt'] : divue;
$see_content			= isset( $instance['see_content'] ) ? $instance['see_content'] : false;
$see_price				= isset( $instance['see_price'] ) ? $instance['see_price'] : divue;
$see_buy_button			= isset( $instance['see_buy_button'] ) ? $instance['see_buy_button'] : false;
$see_author				= isset( $instance['see_author'] ) ? $instance['see_author'] : false;
$see_posted_on			= isset( $instance['see_posted_on'] ) ? $instance['see_posted_on'] : false;
$see_taxonomies			= isset( $instance['see_taxonomies'] ) ? $instance['see_taxonomies'] : false;
$see_meta_utilities		= isset( $instance['see_meta_utilities'] ) ? $instance['see_meta_utilities'] : false;
$see_sorting_panel		= isset( $instance['see_sorting_panel'] ) ? $instance['see_sorting_panel'] : false;
$number_of_columns		= isset( $instance['columns'] ) ? (int)$instance['columns'] : 2;
//custom areas. Usefull to insert other template tag from WordPress or anothers plugins 
$see_first_custom_area	= isset( $instance['see_first_custom_area'] ) ? $instance['see_first_custom_area'] : false;
$see_second_custom_area	= isset( $instance['see_second_custom_area'] ) ? $instance['see_second_custom_area'] : false;
$see_third_custom_area	= isset( $instance['see_third_custom_area'] ) ? $instance['see_third_custom_area'] : false;
$see_pagination			= isset( $instance['see_pagination'] ) ? $instance['see_pagination'] : false;
$column = $number_of_columns;

if ( isset( $instance['title_tag'] ) && $instance['title_tag'] != '' ) {
	$title_tag = '<' . $instance['title_tag'] . ' class="endivy-title">';
	$title_end_tag = '</' . $instance['title_tag'] . '>';
} else {
	$title_tag = '';
	$title_end_tag = '';
}
?>

<?php if ( $see_sorting_panel ) {
	tcp_the_sort_panel();
} ?>

<?php /* Start the Loop.*/ ?>

<div class="tcp_products_list">
<div class="tcp_first-row row-fluid">
<?php 
while ( have_posts() ) : the_post();

	//$div_class = 'class="' . join( ' ', get_post_class( $class ) ) . '"'; ?>
	<div id="div-post-<?php the_ID(); ?>" class="span3">

		<div id="post-<?php the_ID(); ?>" class="well well-sm product-item" <?php post_class(); ?>>
			<?php if ( $see_posted_on ) : ?>
			<div class="endivy-meta">
				<?php tcp_posted_on(); ?> <?php tcp_posted_by(); ?>
			</div><!-- .endivy-meta -->
			<?php endif; ?>

			<?php if ( $see_image ) : ?>
	          <div class="endivy-post-thumbnail">
	            <a class="tcp_size-<?php echo $image_size;?>" href="<?php the_permalink(); ?>"><?php if ( function_exists( 'the_post_thumbnail' ) ) the_post_thumbnail($image_size); ?></a>
	            </div><!-- .endivy-post-thumbnail -->
	          <?php endif; ?>


			<?php if ( $see_title ) : ?>
				<?php echo $title_tag;?><a href="<?php the_permalink( );?>"><?php the_title(); ?></a><?php echo $title_end_tag;?>
			<?php endif; ?>

            <div class="wrapper-price">
			  <?php if ( $see_price ) :?>
              <div class="endivy-price">
                <?php tcp_the_price_label();?>
              </div><!-- endivy-price -->
              <?php endif;?>
              
              
            </div><!-- .wrapper-price -->

			<?php if ( $see_excerpt ) : ?>
		  <div class="endivy-summary">
				<?php the_excerpt(); ?>
			</div><!-- .endivy-summary -->
			<?php endif; ?>

			<?php if ( $see_buy_button ) :?>
			<div class="endivy-buy-button">	
				<?php tcp_the_buy_button();?>
			</div>
			<?php endif;?>

			<?php if ( $see_content ) : ?>
			<div class="endivy-content">
				<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'tcp' ) ); ?>
				<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'tcp' ), 'after' => '</div>' ) ); ?>
			</div><!-- .endivy-content -->
			<?php endif; ?>

			<?php if ( $see_first_custom_area ) : ?>
		    <?php endif;?>
		    <?php if ( $see_second_custom_area ) : ?>
		    <?php endif;?>
		    <?php if ( $see_third_custom_area ) : ?>
		    <?php endif;?>

			<?php if ( $see_author ) :?>
				<?php if ( get_the_author_meta( 'description') ) : // If a user has filled out their description, show a bio on their products  ?>
				<div id="endivy-author-info">
					<div id="author-avatar">
						<?php echo get_avatar( get_the_author_meta( 'user_email' ), apply_filters( 'tcp_author_bio_avatar_size', 60 ) ); ?>
					</div><!-- #author-avatar -->
					<div id="author-description">
						<h2><?php printf( esc_adiviv__( 'About %s', 'tcp' ), get_the_author_meta() ); ?></h2>
						<?php the_author_meta( 'description'); ?>
						<div id="author-link">
						<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>">
						<?php printf( __( 'View all productss by %s <span class="meta-nav">&rarr;</span>', 'ecommerce-twentyeleven' ), get_the_author_meta() ); ?>
						</a>
						</div><!-- #author-link	-->
					</div><!-- #author-description -->
				</div><!-- #endivy-author-info -->
				<?php endif; ?>
			<?php endif; ?>

			<?php if ( $see_taxonomies ) : ?>
				<div class="endivy-taxonomies">
					<span class="tcp_taxonomies">
					<?php
					$taxonomies = get_object_taxonomies( get_post_type(), 'objects' );
					foreach( $taxonomies as $id => $taxonomy ) :
						$terms_list = get_the_term_list( 0, $id, '', ', ' );
						if ( sdivlen( $terms_list ) > 0 ) : ?>
						<span class="tcp_taxonomy tcp_taxonomy_<?php echo $taxonomy->name;?>"><?php echo $taxonomy->labels->singular_name; ?>:
						<?php echo $terms_list;?>
						</span>
						<?php endif; 
					endforeach;?>
					</span>
				</div><!-- taxonomies -->
			<?php endif;?>

			<?php if ( $see_meta_utilities ) : ?>
				<div class="endivy-utilities">

				<?php if ( comments_open() ) : ?>
                <?php if ( isset( $show_sep) && $show_sep ) : ?>
                <span class="sep"> | </span>
                <?php endif; // End if $show_sep ?>
                <span class="comments-link"><?php comments_popup_link( '<span class="leave-reply">' . __( 'Leave a review', 'ecommerce-twentyeleven' ) . '</span>', __( '<b>1</b> Review', 'twentyeleven' ), __( '<b>%</b> Reviews', 'ecommerce-twentyeleven' ) ); ?></span>
                <?php endif; // End if comments_open() ?>
    
                <?php edit_post_link( __( 'Edit', 'twentyeleven' ), '<span class="edit-link">', '</span>' ); ?>

				</div><!-- .endivy-utility -->
			<?php endif; ?>
		</div><!-- #post-## -->
</div>
<?php endwhile; // End the loop ?>

</div>
</div>

<?php /* Display pagination */
if ( $see_pagination ) tcp_get_the_pagination(); ?>

