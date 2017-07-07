<?php get_header(); ?>
<div id="single" class="contents">
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<!--workカテゴリー(id=3)を表示させる記述-->
<?php if(in_category('3')): $id=get_the_ID(); ?>

<h2><?php the_title(); ?>
<?php if(get_post_meta($id, 'title_en', true) != '') echo '｜'.get_post_meta($id, 'title_en', true); ?></h2>
<div id="video">
<?php
	if(get_post_meta($id, 'video_url', true) != ''){
		echo wp_oembed_get(get_post_meta($id, 'video_url', true));
	} else {
		the_post_thumbnail('medium');
	}
?>
</div>
<div id="outline">
<p class="jap">
<?php echo get_post_meta($id, 'work_text', true); ?>
</p>
<p class="eng">
<?php echo get_post_meta($id, 'work_text_en', true); ?>
</p>
</div>
<br>

<div id="images">
<?php the_content(); ?>
</div>

<!--category2-->
<?php elseif(in_category('2')): ?>
<h2><span class="jap"><?php the_title(); ?></span><span class="eng"><?php echo get_post_meta($id, 'ex_title_en', true); ?></span></h2>
<div id="outline">
	<div id="images">
	<?php the_content(); ?>
	</div>
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
<?php echo nl2br(get_post_meta($id, 'ex_text', true));?> <br>
会場：<a href="<?php echo get_post_meta($id, 'ex_place_link', true); ?>" target="_blank"><?php echo get_post_meta($id, 'ex_place', true); ?></a>（<?php echo get_post_meta($id, 'ex_area', true); ?>）<br>
会期：<?php echo get_post_meta($id, 'ex_date', true); ?>
</p>
<p class="eng">
Title: <?php echo $title_en; ?><br>
Venue: <a href="<?php echo get_post_meta($id, 'ex_place_link', true); ?>" target="_blank"><?php echo get_post_meta($id, 'ex_place_en', true); ?></a>（<?php echo get_post_meta($id, 'ex_area_en', true); ?>）<br>
Date: <?php echo get_post_meta($id, 'ex_date_en', true); ?>
</p>
</div>
<?php elseif(in_category(8)): //category 2 ?>
<p class="jap">
<?php the_title();?>
</p>
<div id="images">
<?php the_content(); ?>
</div>

<? endif; ?>
</div><!-- #single -->
<?php endwhile; else: ?>
<?php endif; ?>
<?php wp_reset_postdata()?>
<?php $the_query = new WP_Query('tag='.get_the_title()); if($the_query->have_posts()): ?>
<div id="single_archive">
<h3>Related Stuff</h3>
<?php
	$newsJa = '<ul class="jap">';
	while ($the_query->have_posts()){
		$the_query->the_post();
		$id = get_the_ID();

		$args = array(
	 'post_type'   => 'attachment',
	 'numberposts' => 1,
	 'post_status' => null,
	 'post_parent' => $id
 );
 $attachments = get_posts( $args );
 if ( $attachments ) {
	 foreach ( $attachments as $attachment ) {
		 echo wp_get_attachment_image( $attachment->ID, 'midium' );
		 echo '<p>';
		 echo '</p>';
	 }
 }
}
	wp_reset_postdata();
	$newsJa .= '</ul>';

?>
</div>
<?php endif;?>

<?php get_footer(); ?>
