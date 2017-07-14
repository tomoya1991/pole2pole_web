<?php get_header(); ?>
<div id="single" class="contents">
<?php if (have_posts()) : while (have_posts()) : the_post(); $id=get_the_ID(); ?>

<!--ワーク  catecory-3-->
<?php if(in_category('3')): ?>

	<!--タイトルと日付-->
	<div id="work_info">
		<h4>
		<p class="title"><?php the_title(); if(get_post_meta($id, 'title_en', true) != '') echo '<br>'.get_post_meta($id, 'title_en', true); ?></p>
	  <p class="year"><?php the_time('Y/n/j'); ?></p>
		</h4>
	</div>

<div id="single_all">
<?php $slug = get_page_uri(get_the_ID()); ?>

<!--背景画像を取得-->
<?php $BgImg = get_field('back_img');
			if(!empty($BgImg)):
				if(strlen($BgImg)<5){
				$bg_url = $BgImg['url'];
			}else{
				$bg_url = $BgImg;
			}
?>
<!--背景画像を表示-->
<div id="bg_img"><p><img src='<?php echo $bg_url; ?>' alt='<?php the_title(); ?>' /></p></div>
<?php endif; ?>


<div class="work_video" >
<?php if(get_post_meta($id, 'video_url', true) != ''): ?>
		<?php	echo wp_oembed_get(get_post_meta($id, 'video_url', true)); ?>
		<?php else: ?>
		<?php the_post_thumbnail('medium'); ?>
<?php endif; ?>
</div>
<div id="images">
<?php the_content(); ?>
</div>
<div id="outline">
<p class="jap">
<?php echo nl2br(get_post_meta($id, 'work_text', true));?> <br>
</p>
<?php if(get_post_meta($id,'work_text_en', true) != ''): ?>
<p class="eng">
<?php echo get_post_meta($id, 'work_text_en', true); ?>
</p>
<?php endif; ?>
</div>
<br>

<!--エキシビジョン　category2-->
<?php elseif(in_category('2')): ?>
	<!--タイトルと日付-->
	<div id="work_info">
		<h4>
		<p class="title"><?php the_title(); ?><?php if(get_post_meta($id, 'ex_title_en', true) != '') echo '<br>'.get_post_meta($id, 'ex_title_en', true); ?></p>
	  <p class="year"><?php the_time('Y/n/j'); ?></p>
		</h4>
	</div>
	<!--背景画像を取得-->
	<?php $BgImg = get_field('back_img');
				if(!empty($BgImg)):
					if(strlen($BgImg)<5){
					$bg_url = $BgImg['url'];
				}else{
					$bg_url = $BgImg;
				}
	?>
	<!--背景画像を表示-->
	<div id="bg_img"><p><img src='<?php echo $bg_url; ?>' alt='<?php the_title(); ?>' /></p></div>
	<?php endif; ?>

	<div id="single_all">

		<div class="work_video">
		<?php if(get_post_meta($id, 'video_url', true) != ''): ?>
				<?php	echo wp_oembed_get(get_post_meta($id, 'video_url', true)); ?>
				<?php else: ?>
				<?php the_post_thumbnail('medium'); ?>
		<?php endif; ?>
		</div>


	<div id="images">
	<?php the_content(); ?>
	</div>
	<div id="outline">
<p class="jap">
<?php
	$title_ja = get_the_title();
	$title_en = get_post_meta($id, 'ex_title_en', true);
	$link = get_post_meta($id, 'ex_link', true);
	if(get_post_meta($id, 'ex_link', true) !='') {
		$title_ja = '<a href="'.$link.'">'.$title_ja.'</a>';
		$title_en = '<a href="'.$link.'">'.$title_en.'</a>';
	}
?>
「<?php echo $title_ja ?>」<br>
<?php echo nl2br(get_post_meta($id, 'ex_text', true));?> <br><br>
<?php if(get_post_meta($id, 'ex_text_en', true)): ?>
<?php echo nl2br(get_post_meta($id, 'ex_text_en', true));?> <br><br>
<?php endif; ?>
会場：<a href="<?php echo get_post_meta($id, 'ex_place_link', true); ?>" target="_blank"><?php echo get_post_meta($id, 'ex_place', true); ?></a>（<?php echo get_post_meta($id, 'ex_area', true); ?>）<br>
会期：<?php echo get_post_meta($id, 'ex_date', true); ?>
</p>
<?php if(get_post_meta($id, 'ex_title_en', true) != '' && get_post_meta($id, 'ex_place_en', true) != '' && get_post_meta($id, 'ex_area', true) != ''): ?>
<p class="eng">
Title: <?php echo $title_en; ?><br>
Venue: <a href="<?php echo get_post_meta($id, 'ex_place_link', true); ?>" target="_blank"><?php echo get_post_meta($id, 'ex_place_en', true); ?></a>（<?php echo get_post_meta($id, 'ex_area_en', true); ?>）<br>
<!-- Date: <?php echo get_post_meta($id, 'ex_date_en', true); ?> -->
<?php endif; ?>
</p>
</div>
</div>

<?php elseif(in_category(8)): //category 2 -> category 8 ?>
	<div class="works">
	<div id="news_info">
		<h4>
		<p class="title"><?php the_title(); ?>
		<p class="year"><?php the_time('Y/n/j'); ?></p>
		</h4>
	</div>
<div id="images">
<?php the_content(); ?>
</div>

<div id="outline">
<p class="jap">
<?php echo nl2br(get_field('news_text'));?> <br>
</p>
</div>
</div>
<? endif; ?>
<?php endwhile; else: ?>
<?php endif; ?>
<?php wp_reset_postdata()?>

<?php if($slug != ''): ?>
<?php $tag_cat = array( 'cat' => '-10', 'tag' => $slug ); ?>
<?php $the_query = new WP_Query($tag_cat); if($the_query->have_posts()): ?>
<div id="single_archive">
	<h2>Related Stuff</h2>
	<?php
		while ($the_query->have_posts()){
			$the_query->the_post();
			$id = get_the_ID();
			$img_str = get_the_content();
  		 $img_path = explode('"', $img_str);
			 $img_ = '';
			 for($i = 0, $size = count($img_path); $i < $size; ++$i){
				 $img_ = $img_path[$i];
  		 if (strstr($img_, 'http')){
				 break;
			 }
		 }
				 $post_category = get_the_category();
				 if(in_category(array(2,8))):
	?>
	<a href="<?php the_permalink(); ?>">
	<?php elseif(in_category('13')): ?>
	<a href="https://www.instagram.com/poletopole2017/">
	<?php endif; ?>
	<div class="work">
		<h3>
			<p>
			<?php
			 the_title();
			 ?>
			</p>
			<span class="year"><?php the_time('Y/n/j'); ?></span><br>
			<span class="tag"><?php echo $post_category[0]->cat_name;?></span>
		</h3>
	<?php
		 echo '<img src="'.$img_.'" alt="'.$img_.'" />';
		 echo "</div></a>";
		}
			wp_reset_postdata();
		?>

<?php endif; ?>
</div>
<?php endif; ?>

<?php get_footer(); ?>
