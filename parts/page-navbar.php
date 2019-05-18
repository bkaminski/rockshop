<nav class="navbar sticky-top navbar-expand-md navbar-dark bg-dark">
	<a class="navbar-brand" href="<?php echo get_home_url(); ?>">
		<img src="<?php echo get_template_directory_uri(); ?>/assets/img/favicon.png" class="img-fluid"> The Rockshop
	</a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>
	<div class="collapse navbar-collapse" id="navbarSupportedContent">
		<?php
			wp_nav_menu( array(
				'theme_location'    => 'primary',
				'depth'             => 2,
				'container'         => '',
				'container_class'   => '',
				'container_id'      => '',
				'menu_class'        => 'nav navbar-nav mr-auto',
				'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
				'walker'            => new WP_Bootstrap_Navwalker(),
			));
		?>
		<form class="form-inline my-2 my-lg-0" method="get" id="searchform" action="<?php echo home_url() ; ?>/" required>
			<input class="form-control" type="text" placeholder="Search this site" value="" name="s" id="s" maxlength="33" required="required" />
			<div class="input-group-append">
				<button class="btn btn-info my-sm-0" type="submit">
					<i class="fas fa-search fa-lg fa-fw"></i>
				</button>
			</div>
		</form>
	</div>
</nav>
