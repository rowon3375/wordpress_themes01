<main>
  <div class="inner">

    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <p>news archive page</p>
        <?php the_content(); ?>
    <?php endwhile; endif; ?>
  </div>
</main>