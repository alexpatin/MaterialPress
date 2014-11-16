<?php get_header();?>

<div class="section no-pad-bot" id="index-banner">
  <div class="container">
    <div class="row">
      <div class="col s12 m8 offset-m2"
        <?php /* Start loop */ ?>
        <?php while (have_posts()) : the_post(); ?>

        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
          <header>
            <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
          </header>
          <div class="entry-content">
            <?php the_content(); ?>
          </div>
          <footer>
            <?php $tag = get_the_tags(); if (!$tag) { } else { ?><p><?php the_tags(); ?></p><?php } ?>
          </footer>
          <hr />
        </article>

      <?php endwhile; // End the loop ?>
      </div>
    </div>
</div>
<?php get_footer();?>

