<?php get_header(); ?>
	<div class="container interior-wrapper pt-3 pb-3">
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<h1><?php the_title(); ?></h1>
			<figure>
				<?php the_post_thumbnail( 'full', array( 'class' => 'mx-auto d-block img-fluid shadow' ) ); ?>
	
			</figure>
			<?php the_content(); ?>
			
		<?php endwhile; else : ?>
			<p><?php esc_html_e( 'Sorry, no posts matched your criteria.' ); ?></p>
		<?php endif; ?>
	</div>
<?php get_footer(); ?>
