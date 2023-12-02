<?php get_header(); ?>
<main>
	<div id="mv">
		<?php 
		$top_banner = get_option('top_banner');
		foreach ($top_banner as $key => $banner) {
			if ($banner['view'] != 1) {
			unset($top_banner[$key]);
			}
		}
		$top_banner = array_values($top_banner);

		if( !empty($top_banner) ) : ?>
		<ul class="mv_slider">
			<?php foreach($top_banner as $key => $banner) : ?>
			<li>
				<img src="<?php echo $banner['slider'] ?>" alt="<?php echo $banner['slider_src'] ?>">
			</li>
			<?php endforeach; ?>
		</ul>
		<?php endif; ?>

		<div class="mv_copy">
			<h2>WebSucceed</h2>

			<p>ウェブサクシードテーマです。</p>
		</div>
	</div>

	<!-- お問い合わせ -->
	<?php include('footer_contact.php'); ?>

	<!-- 事務所案内 -->
	<?php include('company_area.php'); ?>
</main>
<?php get_footer(); ?>

