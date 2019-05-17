<?php
/*
Template Name: Archives
*/
get_header(); ?>
<div class="container interior-wrapper pt-3">
	<h1 class="mb-3">Past Rockshop Events</h1>
		<?php
			$args = array (
   				'cat' => '1',
   				'paged' => get_query_var('paged'), 
   				'order' => 'DESC', 
   				'paged' => $paged, 
   				'date_query' => array(
    	 			array(
       					'before' => array(
         					'year'  => date('Y'),
         					'month' => date('m'),
         					'day'   => date('d')
        				),
        				'inclusive' => true,
        			),
    	 		),
   			);
   			query_posts($args); ?>
   			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
   				
   					<ul>
   						<a href="<?php the_permalink(); ?>">
   							<li class="h5"><?php the_title(); ?> - <?php the_date(); ?></li>
   						</a>
   					</ul>
			
			<?php endwhile; else : ?>
				<p><?php esc_html_e( 'Sorry, no posts matched your criteria.' ); ?></p>
			<?php endif; ?>
      <div class="col-md-12 pt-3 pb-3">
        <?php echo rockshop_pagination(); ?>
      </div>
</div>
<?php get_footer(); ?>
