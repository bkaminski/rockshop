		<footer class="rockshop-footer pt-3">
			<div class="container">
				<div class="row">
					<div class="col-md-6">
						<?php dynamic_sidebar( 'rockshop-left-footer' ); ?>
					</div>
					<div class="col-md-6">
						<?php dynamic_sidebar( 'rockshop-right-footer' ); ?>
					</div>
				</div>
			</div>
		</footer>
		<div class="col-md-12">
			<div class="text-center copyright">
				<small>Copyright &copy; <?php echo date('Y'); ?> The Rockshop  |  <a style="color:#212529;" href="privacy-policy/">Privacy Policy</a></small>
			</div>
		</div>
	<?php wp_footer(); ?>
	</body>
</html>
