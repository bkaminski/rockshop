<?php get_header(); ?>
<div class="container interior-wrapper pt-3 pb-3">
	<div class="alert alert-success mt-3">
		<h4 class="text-uppercase text-center">
			<?php printf( __( 'Content Tagged With: %s', 'the_rockshop' ), '<span>' . get_search_query() . '</span>' ); ?>
			<em>&ldquo;<?php single_tag_title(); ?>&rdquo;</em>
		</h4>
	</div>
	<div class="row mt-5">
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<div class="col-md-12 mb-4">
			<main>
				<h1>
					<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
						<?php the_title(); ?>
						
					</a>
				</h1>
					<?php the_excerpt(); ?>
				
				<hr class="shadow news-pg-hr" />
			</main>
		</div>
		<?php endwhile; else : ?>
			<p><?php esc_html_e( 'Sorry, no posts matched your criteria.' ); ?></p>
		<?php endif; ?>
		<div class="col">
			<?php //echo rockshop_pagination(); ?>
		</div>
	</div>
</div>
<?php get_footer(); ?>
