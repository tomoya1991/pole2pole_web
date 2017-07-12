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

	</div><!-- /content -->
	</div>
	<div id="designer">
		<h2>designer</h2>
		<ul>
			<div class="hitori">
				<li><a href=""></a>Yuuji HIROSE</li>
				<?php if (get_field('member_img_1')): ?>
				<li><img src='<?php echo the_field('member_img_1'); ?>' alt=' ' /></li>
				<?php endif; ?>
				<?php if (get_field('member_text_1')): ?>
				<p><?php echo nl2br(the_field('member_text_1')); ?></p>
				<?php endif; ?>
			</div>
			<div class="hitori">
				<li><a href=""></a>Yasunobu SHIMIZUDANI</li>
				<?php if (get_field('member_img_1')): ?>
				<li><img src='<?php echo the_field('member_img_2'); ?>' alt=' ' /></li>
				<?php endif; ?>
				<?php if (get_field('member_text_2')): ?>
				<p><?php echo nl2br(the_field('member_text_2')); ?></p>
				<?php endif; ?>
			</div>
			<div class="hitori">
				<li><a href=""></a>Masashi KONDO</li>
				<?php if (get_field('member_img_1')): ?>
				<li><img src='<?php echo the_field('member_img_3'); ?>' alt=' ' /></li>
				<?php endif; ?>
				<?php if (get_field('member_text_3')): ?>
				<p><?php echo nl2br(the_field('member_text_3')); ?></p>
				<?php endif; ?>
			</div>
		</ul>
		<?php endwhile; endif; ?>
	</div><!-- /designer-->
</div><!-- /about-->
<?php get_footer(); ?>
