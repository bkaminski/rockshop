<nav class="navbar sticky-top navbar-expand-md navbar-dark bg-dark">
	<a class="navbar-brand" href="<?php echo get_home_url(); ?>">Home</a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>
	<div class="collapse navbar-collapse" id="navbarSupportedContent">
		<ul class="navbar-nav mr-auto">
			<li class="nav-item active">
				<a class="nav-link" href="<?php echo get_home_url(); ?>">Home <span class="sr-only">(current)</span></a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="#">Link</a>
			</li>
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					Dropdown
				</a>
				<div class="dropdown-menu" aria-labelledby="navbarDropdown">
					<a class="dropdown-item" href="#">Action</a>
					<a class="dropdown-item" href="#">Another action</a>
					<a class="dropdown-item" href="#">Something else here</a>
				</div>
			</li>
		</ul>
		<form class="form-inline my-2 my-lg-0">
			<input class="form-control" type="text" placeholder="Search this site" value="" name="s" id="s" maxlength="33" required="required" />
			<div class="input-group-append">
				<button class="btn btn-info my-sm-0" type="submit">
					<i class="fas fa-search fa-lg fa-fw"></i>
				</button>
			</div>
		</form>
	</div>
</nav>
