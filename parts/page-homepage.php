<main class="container-fluid">
	<h1 class="text-center text-white mt-4">The Rockshop Presents:</h1>
	<!-- featured event loop here == 2 most recent events upcoming -->
	<div class="row">
		<div class="col-lg-6 pr-4">
			<div class="main-event-left mt-4">
				<h2 class="text-uppercase text-center text-white pb-1" style="background: #666;">Stee Bevins Plays With Horns</h2>
				<div class="col-lg-12 main-event-date">
					<p class="text-center">TONIGHT {{date}}</p>
				</div>
				<div class="row">
					<div class="col-lg-5 main-event-img">
						<p>Image Here</p>
					</div>
					<div class="col-lg-7 main-event-desc">
						<p>Event excerpt here</p>
					</div>
				</div>
			</div>
			<div class="main-event-foot-left"></div>
		</div>
		<div class="col-lg-6 pl-4">
			<div class="main-event-right mt-4">
				<h2 class="text-uppercase text-center text-white pb-1" style="background: #666;">Victor Cruzo and John Nuzzo</h2>
				<div class="col-lg-12 main-event-date">
					<p class="text-center">TOMORROW NIGHT {{date}}</p>
				</div>
				<div class="row">
					<div class="col-lg-5 main-event-img">
						<p>Image Here</p>
					</div>
					<div class="col-lg-7 main-event-desc">
						<p>Event excerpt here</p>
					</div>
				</div>
			</div>
			<div class="main-event-foot-right"></div>
		</div>
	</div>
	<!-- end featured event loop -->
</main>
<section class="container">
	<h2 class="text-center text-white mt-4 mb-4">Coming Soon:</h2>
	<!-- event loop here all other events minus 2 for above -->
	<div class="row mb-5 text-center">
		<div class="col-md-2 event-date">
			<span class="month">Sept</span>
			<br />
			<span class="day">13th</span>
			<br />
			<span class="time"><small>7:00pm</small></span>
		</div>
		<div class="col-md-4 event-img">
			<img class="img-fluid" src="<?php echo get_template_directory_uri();?>/assets/img/example-show01.jpg" alt="Stuff about Stuff" />
		</div>
		<div class="col-md-6 event-info pb-3">
			<h3 class="text-uppercase">Baheed and the Benghazi's</h3>
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce eget mollis odio. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nullam ac magna laoreet, pharetra felis id, aliquam turpis. Proin urna neque, ultricies ut posuere hendrerit, mollis non tortor.</p>
			<button class="btn btn-info btn-block">More Info</button>
		</div>
		<div class="event-foot"></div>
	</div>
	<!-- end event loop -->
</section>
