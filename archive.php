<!-- 記事一覧 -->
<?php get_header(); ?>
  <main>
    <h1 class="<?php echo get_the_category()[0]->category_nicename; ?>"><?php echo get_the_category()[0]->cat_name; ?></h1>
    <section class="pankuzu">
      <div class="container">
        <div class="breadcrumbs" typeof="BreadcrumbList" vocab="https://schema.org/">
          <?php if(function_exists('bcn_display'))
          {
            bcn_display();
          } ?>
        </div>
      </div>
    </section>
    <?php if ( have_posts() ) : ?>
    <section>
      <div class="container gutters">
        <div class="row">
          <?php if( $under_column === '2' ): ?>
            <div class="col span_9 column_main">
            </div>
            <div class="col span_3 column_sub">
              <?php get_sidebar(); ?>
            </div>
          <?php else: ?>
            <div class="col span_12 column_main">
              <?php while ( have_posts() ) : the_post(); ?>
                <section class="article">
                  <div class="container gutters">
                    <h2><?php the_title(); ?></h2>
                    <div class="row">
                      <div class="col span_12">
                        <p><?php the_excerpt(); ?></p>
                        <p class="more"><a href="<?php the_permalink(); ?>" class="add_arrow">詳細を見る</a></p>
                      </div>
                    </div>
                  </div>
                </section>
              <?php endwhile; ?>
            </div>
          <?php endif; ?>
        </div>
      </div>
    </section>
    <?php endif; ?>
  </main>
<?php get_footer(); ?>
