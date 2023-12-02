<!-- 404エラー -->
<?php get_header(); ?>
<main>
<section id="topNews other">
    <div class="sp-only1 container">
        <img src="<?= wp_upload_dir()['baseurl'] ?>/common/header_bnr_sp.jpg" alt="福岡エンジニア求人ガイド" class="sp-bnr">
    </div>
</section>

<section id="newsList" class="error">
    <div class="other_title container">
        <div class="other_content">
            <span class="en">404 error</span>
            <p>エラー</p>
        </div>
    </div>
    <div class="container flex">
        <div class="error_text">
            <p class="error_meg">お探しのページが見つかりません。</p>
            <p>URLが間違っているか、ページが削除された可能性があります。<br class="pc-only2">恐れいりますが、トップページから改めてお探しください。</p>

            <a href="/blog/" title="一覧へ戻る">一覧へ戻る</a>
        </div>
		
		<!-- 人気記事 -->
        <?php include('popular.php'); ?>
    </div>
</section>
<!-- 新着求人ガ -->
<?php include('kyujin.php'); ?>
</main>
<?php get_footer(); ?>
