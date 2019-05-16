<?php get_header(); ?>
<div class="container interior-wrapper">
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

	<h1 class="pb-4"><?php the_title(); ?></h1>
	<h3 class="text-center"><?php the_date(); ?></h3>
	<figure>
		<?php the_post_thumbnail( 'full', array( 'class' => 'mx-auto d-block img-fluid shadow' ) ); ?>
	
	</figure>
	<main>
		<?php the_content(); ?>

	</main>
	<aside class="pt-2 pb-3">
		<?php the_tags(); ?>

	</aside>
	<?php endwhile; else : ?>
		<p><?php esc_html_e( 'Sorry, no posts matched your criteria.' ); ?></p>
	<?php endif; ?>
</div>
<?php get_footer(); ?>
