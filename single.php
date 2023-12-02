<!-- 記事詳細 -->
<?php get_header(); ?>
<main>
<section id="detail">
	<?php while ( have_posts() ) : the_post(); ?>

    <?php breadcrumb(); ?>
    <!-- <div class="bread container">
        <ul class="flex">
            <li><a href="/blog/" title="エンジニアの教科書">エンジニアの教科書</a></li>
            <li><span><?php the_title(); ?></span></li>
        </ul>
    </div> -->

    <div class="container flex">
        <section class="detail_content_sec">
            <div class="news_detail">
                <div class="detail_title">
                <span class="en"><?php the_time('Y.m.d'); ?></span>
                <h2><?php the_title(); ?></h2>
                </div>
                <div class="content">
                    <div class="post_img">
                        <figure>
                            <?php
                                $post_title = get_the_title();
                                the_post_thumbnail('full',
                                array(
                                'alt' => $post_title, // altにページタイトルを指定
                                'title' => $post_title // titleにページタイトルを指定
                                ));
                            ?>
                        </figure>
                    </div>
                    <?php the_content(); ?>
                    </div>
            </div>
        </section>
		
		<!-- 人気記事 -->
        <?php include('popular.php'); ?>
    </div>
<?php endwhile; ?>
</section>
	
<!-- 新着求人ガ -->
<?php include('kyujin.php'); ?>
</main>
<?php get_footer(); ?>

