<?php get_header(); ?>
<main>
	<p>
	基本投稿	
	</p>
<!-- 基本投稿	 -->
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <div style="margin-top: 100px;">
		<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
	</div>
    <?php endwhile; endif; ?>
	
	<p>
		 cpt ui投稿	
	</p>
<!-- cpt ui投稿 -->
	<?php
	$args = array(
		'post_type' => 'news',
		'posts_per_page' => 3,
	);
	
	$my_posts = get_posts( $args );
?>
	
	<?php global $post; ?>
	
	<ul>
<?php foreach ( $my_posts as $post ) : setup_postdata( $post ); ?>
		<!-- loop start -->
		<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
		<!-- // loop end -->
<?php endforeach; ?>
	</ul>
<?php wp_reset_postdata(); ?>
	
		<p>
		 event cpt ui投稿	
	</p>
<!-- cpt ui投稿 -->
	<?php
	$args = array(
		'post_type' => 'event',
		'posts_per_page' => 3,
	);
	
	$my_posts = get_posts( $args );
?>
	
	<?php global $post; ?>
	
	<ul>
<?php foreach ( $my_posts as $post ) : setup_postdata( $post ); ?>
		<!-- loop start -->
		<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
		<!-- // loop end -->
<?php endforeach; ?>
	</ul>
<?php wp_reset_postdata(); ?>




<p>バナーテスト</p>


 <?php 
      $post_banner = get_option('post_banner');
      foreach ($post_banner as $key => $banner) {
        if ($banner['view'] != 1) {
        unset($post_banner[$key]);
        }
      }
      $post_banner = array_values($post_banner);

      if(!empty($post_banner)) :
        foreach ($post_banner as $banner) : 
          if($banner['banner_type'] === "company"): ?>
            <p class="bnr_text"><?php echo $banner['banner_text'] ?></p>
            
            <?php if(!empty($banner['code'])) {
              echo $banner['code']; } ?>
      <?php endif; endforeach; endif; ?>
	
</main>
<?php get_footer(); ?>

