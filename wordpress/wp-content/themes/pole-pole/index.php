<?php get_header(); ?>
<div id="top_log">
<img src="<?php bloginfo('template_url'); ?>/assets/img/top_log.png" width="940" height="50" alt="ロゴ">
</div>
<?php $the_query = new WP_Query('cat=2'); if($the_query->have_posts()): ?>
	<?php
	while ($the_query->have_posts()){
		$the_query->the_post();
		$id = get_the_ID();
		if(get_post_meta($id, 'ex_close_date', true) != '' && date_i18n('Y-m-d H:i:s') < get_post_meta($id, 'ex_close_date', true)){
			if(get_post_meta($id, 'ex_link', true) != ''){
			$newsJa .= '<li><a href="'.get_post_meta($id, 'ex_link', true).'" target="_blank">'.get_the_title().'</a>  at  <a href="'.get_post_meta($id, 'ex_place_link', true).'" target="_blank">'.get_post_meta($id, 'ex_place', true).'</a> '.get_post_meta($id, 'ex_area', true).'／'.get_post_meta($id, 'ex_date', true).'</li>';
			}else{
			$newsJa .= '<li><a href="'.get_the_permalink().'" target="_blank">'.get_the_title().'</a>  at  <a href="'.get_post_meta($id, 'ex_place_link', true).'" target="_blank">'.get_post_meta($id, 'ex_place', true).'</a> '.get_post_meta($id, 'ex_area', true).'／'.get_post_meta($id, 'ex_date', true).'</li>';
			}
		}
	}
	$upcom = '<div id="upcom"><h2>upcomming</h2>'.$newsJa.'</div>';
	echo $upcom;
	wp_reset_postdata(); ?>
	<?php endif; ?>
<?php if(have_posts()): ?>
<div id="works">
<h2>news</h2>
<?php query_posts('posts_per_page=3'); ?>
<?php while (have_posts()) : the_post(); if(in_category(array(8,13))): $id=get_the_ID();?>
	<?php $posttags = get_the_tags();
	if ($posttags) {
	foreach($posttags as $tag) {
		$tag_name .= '<p>'.$tag->name.'</p>';
		}
	}
	?>
<?php if(in_category(13)): ?>
<a href="https://www.instagram.com/poletopole2017/" class="work_wrapper">
<?php elseif(in_category(8)): ?>
	<a href="<?php the_permalink(); ?>" class="work_wrapper">
<?php endif; ?>
<div class="work">
<h3>
	<p>
<?php if(in_category(13)): ?>
from instagram
<?php elseif(in_category(8)): ?>
<?php the_title(); ?>
<?php endif; ?>
	</p>
	<span class="year"><?php the_time('Y/n/j'); ?></span><br>
	<span class="tag"><?php echo $tag_name;?></span>
</h3>
<?php if(in_category(13)): ?>
<img src="<?php echo catch_that_image(); ?>" alt="<?php the_title(); ?>" />
<?php elseif(in_category(8)): ?>
<img src="<?php echo catch_that_image(); ?>" alt="" />
<?php endif; ?>
</div>
</a>
<?php $tag_name = '';?>
<?php endif;?>
<?php endwhile; ?>
<?php wp_reset_postdata(); ?>
<?php $the_query = new WP_Query('cat=3'); if($the_query->have_posts()): ?>
<h2>works</h2>
<?php while ($the_query->have_posts()): $the_query->the_post(); ?>
<?php $id = get_the_ID(); ?>
<?php if(get_post_meta($id,show_to_top,true)): ?>
	<a href="<?php the_permalink(); ?>" class="work_wrapper">
		<div class="work">
			<h3>
				<p>
				<?php the_title(); ?><?php if(get_post_meta($id, 'title_en', true) != '') echo '<br>'.get_post_meta($id, 'title_en', true); ?>
				</p>
				<span class="year"><?php the_time('Y/n/j'); ?></span><br>
				<span class="tag"><?php echo $tag_name;?></span>
			</h3>
			<img src="<?php echo catch_that_image(); ?>" alt="<?php the_title(); ?>" />
		</div>
	</a>
<?php endif; ?>
<?php endwhile; ?>
<?php endif; ?>
<?php else : ?>
<h2 class="center">Not Found</h2>
<p class="center">Sorry, but you are looking for something that isn't here.</p>
<?php endif; ?>

<?php get_footer(); ?>
