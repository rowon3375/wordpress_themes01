<!-- カテゴリー一覧 -->
<?php get_header(); 
$postno = 1;
?>

<main>
<section id="newsList" class="category">
    <div class="bread container">
        <ul class="flex">
            <?php $category = get_queried_object(); ?>
            <li><a href="/blog/" title="エンジニアの教科書">エンジニアの教科書</a></li>
            <li><span><?php single_cat_title(); ?></span></li>
        </ul>
    </div>
    <div class="other_title container">
        <div class="other_content">
            <span class="en">category</span>
            <p>カテゴリー</p>
        </div>
        <h2><?php single_cat_title(); ?></h2>
    </div>
    <div class="sp-only1 container">
        <img src="<?= wp_upload_dir()['baseurl'] ?>/common/header_bnr_sp.jpg" alt="福岡エンジニア求人ガイド" class="sp-bnr">
    </div>
    <div class="container flex">
        <div class="news_list flex">
        <?php if (have_posts()) : ?>
		<?php if (have_posts()) : 
            while (have_posts()) : the_post(); ?>
            <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="one_news">
                <figure>
                    <!-- アイキャッチがない場合ロゴイメージに対処 -->
                    <?php if(has_post_thumbnail()) : ?>
                    <?php the_post_thumbnail(); ?>
                    <?php else : ?>
                    <img src="wp-content/uploads/2023/04/エンジニアの教科書.png" alt="<?php the_title(); ?>">
                    <?php endif;  ?>
                </figure>
                <div class="text">
                    <span class="en"><?php the_time('Y.m.d'); ?></span>
                    <h2><?php the_title(); ?></h2>
                    <p><?php echo mb_substr(get_the_excerpt(), 0, 55); ?>&nbsp;...</p>
                </div>
            </a>
			    <?php $postno = $postno + 1; ?>
			    <?php endwhile; ?>
            <?php endif; ?>
			<?php else: ?>
            <div class="no_search">
				<p>該当する記事は見つかりませんでした。</p>
			</div>
            <?php endif; ?>
        </div>
		
		<!-- 人気記事 -->
        <?php include('popular.php'); ?>
    </div>
    <!-- pager -->
	<div class="pager container">
		<?php
			$args = array(
				'mid_size' => 1,
				'prev_text' => '',
				'next_text' => '',
				'screen_reader_text' => ' ',
			);
		$paginationhtml = get_the_posts_pagination($args);
		echo preg_replace('/\<h2 class=\"screen-reader-text\"\>(.*?)\<\/h2\>/ui', '', $paginationhtml);
		?>
	</div>
</section>
<!-- 新着求人ガ -->
<?php include('kyujin.php'); ?>
</main>
<?php get_footer(); ?>
