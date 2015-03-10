	<footer class="page-footer red lighten-2">
		<div class="container">
			<div class="row">
				<div class="col l4 s12">
					<?php if ( is_active_sidebar( 'footer-widgetize-1' ) ) : ?>
						<?php dynamic_sidebar( 'footer-widgetize-1' ); ?>
					<?php endif; ?>
				</div>
				<div class="col l4 s12">
					<?php if ( is_active_sidebar( 'footer-widgetize-2' ) ) : ?>
						<?php dynamic_sidebar( 'footer-widgetize-2' ); ?>
					<?php endif; ?>
				</div>
				<div class="col l4 s12">
					<?php if ( is_active_sidebar( 'footer-widgetize-3' ) ) : ?>
						<?php dynamic_sidebar( 'footer-widgetize-3' ); ?>
					<?php endif; ?>
				</div>
			</div>
		</div>
		<div class="footer-copyright red lighten-1">
			<div class="container">
				<span class="white-text">© <?php echo date('Y'); ?> Copyright <?php echo get_bloginfo( name ); ?></span>
			<a class="white-text right truncate" href="#">Back to Top</a>
			</div>
		</div>
	</footer>

	<?php wp_footer();?>
	
</body>
</html>