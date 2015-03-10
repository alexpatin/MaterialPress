<?php get_header();?>

<div class="section no-pad-bot main" id="index-banner">
	<div class="container">
		<?php /* Start loop */ ?>
		<?php while (have_posts()) : the_post(); ?>

		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<div class="card">
				<a href="<?php the_permalink(); ?>"><div class="card-title black-text" style="margin-left: 30px;"><?php the_title(); ?></div></a>				
				<div class="card-content">
					<?php the_content(); ?>
				</div>
				<div class="card-action">
					<a href='<?php the_permalink(); ?>' class="btn waves-effect waves-light red lighten-1 white-text right">Open</a>
				</div>
			</div>
		</article>

		<?php endwhile; // End the loop ?>
	</div>
</div>
<?php get_footer();?>

