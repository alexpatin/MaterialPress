<?php get_header();?>

<div class="section no-pad-bot main" id="index-banner">
	<div class="container">
		<?php /* Start loop */ ?>
		<?php while (have_posts()) : the_post(); ?>

		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<div class="card">
				<div class="card-content">
					<a href="<?php the_permalink(); ?>"><span class="card-title black-text"><?php the_title(); ?></span></a>				
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

