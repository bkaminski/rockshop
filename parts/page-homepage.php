<main class="container-fluid">
	<h1 class="text-center text-white mt-4 display-4">The Rockshop Presents:</h1>
	<div class="row">
		<div class="col-lg-12 pr-4">
			<?php query_posts('post_status=future&posts_per_page=1&order=ASC&cat=3'); while ( have_posts() ) : the_post(); ?>
			<div class="main-event mt-4">
				<h2 class="text-uppercase text-center text-white pb-4 pt-4 main-event-title display-5" style="background: #ff5a00;"><?php the_title("Next Event: ", ""); ?></h2>
				<div class="col-lg-12 main-event-date">
					<div class="text-center text-uppercase pt-1 pb-1">
						<?php echo the_date('M jS g:i a'); ?>
							
					</div>
				</div>
				<div class="row">
					<div class="col-lg-5 main-event-img">
						<?php the_post_thumbnail( 'full', array('class' => 'zoom') ); ?>
							
					</div>
					<div class="col-lg-7 main-event-desc">
						<div class="h2 mt-3 mb-4">
							 <?php the_title(); ?>
								
						</div>
						<?php the_excerpt(); ?>
							
					</div>
				</div>
			</div>
			<div class="main-event-footer"></div>
		</div>
		<?php endwhile; ?>
		<?php wp_reset_query(); ?>
	</div>
</main>
<section class="container">
	<h2 class="text-center text-white mt-4 mb-4">Coming Soon:</h2>
	<div class="row mb-5 text-center">
		<?php query_posts('post_status=future&offset=-1&order=ASC'); while ( have_posts() ) : the_post(); ?>
		<div class="col-md-2 event-date">
			<span class="month"><?php echo get_the_date('M'); ?></span>
			<br />
			<span class="day"><?php echo get_the_date('jS'); ?></span>
			<br />
			<span class="time"><small><?php echo get_the_date('g:i a'); ?></small></span>
		</div>
		<div class="col-md-4 event-img">
			<?php the_post_thumbnail( 'full', array('class' => 'zoom') ); ?>
				
		</div>
		<div class="col-md-6 event-info pb-3">
			<h3 class="text-uppercase"><?php the_title(); ?></h3>
			<?php the_excerpt(); ?>
		</div>	
		<div class="event-foot mb-5"></div>
	<?php endwhile; ?>
	<?php wp_reset_query(); ?>
	</div>
</section>
