<main class="container-fluid">
	<h1 class="text-center text-white mt-4">The Rockshop Presents:</h1>
	<div class="row">
		<div class="col-md-6 pr-4">
			<?php $my_query = new WP_Query( 'cat=4&posts_per_page=1' ); while ( $my_query->have_posts() ) : $my_query->the_post(); $do_not_duplicate[] = $post->ID; ?>
			<div class="main-event-left mt-4">
				<h2 class="text-uppercase text-center text-white pb-1" style="background: #666;"><?php the_title(); ?></h2>
				<div class="col-lg-12 main-event-date">
					<div class="text-center"><?php echo get_post_meta($post->ID, 'event_date', true); ?></div>
				</div>
				<div class="row">
					<div class="col-lg-5 main-event-img">
						<?php the_post_thumbnail( 'full' ); ?>
					</div>
					<div class="col-lg-7 main-event-desc">
						<?php the_excerpt(); ?>
					</div>
				</div>
			</div>
			<div class="main-event-foot-left"></div>
		</div>
		<?php endwhile; ?>
		<div class="col-md-6 pl-4">
			<?php $my_query = new WP_Query( 'cat=5&posts_per_page=1' ); while ( $my_query->have_posts() ) : $my_query->the_post(); $do_not_duplicate[] = $post->ID; ?>
			<div class="main-event-right mt-4">
				<h2 class="text-uppercase text-center text-white pb-1" style="background: #666;"><?php the_title(); ?></h2>
				<div class="col-lg-12 main-event-date">
					<div class="text-center"><?php echo get_post_meta($post->ID, 'event_date', true); ?></div>
				</div>
				<div class="row">
					<div class="col-lg-5 main-event-img">
						<?php the_post_thumbnail( 'full' ); ?>
					</div>
					<div class="col-lg-7 main-event-desc">
						<?php the_excerpt(); ?>
					</div>
				</div>
			</div>
			<div class="main-event-foot-right"></div>
		</div>
		<?php endwhile; ?>
	</div>
</main>
<section class="container">
	<h2 class="text-center text-white mt-4 mb-4">Coming Soon:</h2>
	<div class="row mb-5 text-center">
		<?php $my_query = new WP_Query( 'cat=3&posts_per_page=10' ); while ( $my_query->have_posts() ) : $my_query->the_post(); $do_not_duplicate[] = $post->ID; ?>
		<div class="col-md-2 event-date">
			<span class="month">Sept</span>
			<br />
			<span class="day">13th</span>
			<br />
			<span class="time"><small>7:00pm</small></span>
		</div>
		<div class="col-md-4 event-img">
			<?php the_post_thumbnail( 'full' ); ?>
		</div>
		<div class="col-md-6 event-info pb-3">
			<h3 class="text-uppercase"><?php the_title(); ?></h3>
			<?php the_excerpt(); ?>
		</div>	
		<div class="event-foot mb-5"></div>
	<?php endwhile; ?>
	</div>
</section>
