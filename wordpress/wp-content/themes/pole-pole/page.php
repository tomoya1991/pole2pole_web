<?php get_header(); ?>
<div id=about>
	<div id="content">

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

	<div class="post" id="post-<?php the_ID(); ?>">
	<div class="entry">
	<h2>about</h2>
	<div id="about_txt">
		<img src="<?php bloginfo('template_url'); ?>/assets/img/top_log.png" width="400"  alt="ロゴ">
	<?php the_content(''); ?>
	</div>
	</div><!-- /post -->

	<?php endwhile; endif; ?>
	</div><!-- /content -->
	</div>
	<div id="designer">
		<h2>designer</h2>
		<ul>
			<li><a href=""></a>Yuuji HIROSE</li>
			<li><a href=""></a>Yasunobu SHIMIZUDANI</li>
			<li><a href=""></a>Masashi KONDO</li>
		</ul>
	</div><!-- /designer-->
</div><!-- /about-->
<?php get_footer(); ?>