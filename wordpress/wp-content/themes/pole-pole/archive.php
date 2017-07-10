<?php get_header(); ?>

<?php if (have_posts()) : ?>

<div id="works">

<?php if(is_category(array(3,2,10))): ?>
<h2>category</h2>
<div id="cat">
	<ul>
		<li><a href="<?php echo get_home_url(); ?>/?cat=3">all</a>  </li>
		<li><a href="<?php echo get_home_url(); ?>/?cat=10">design work</a> </li> 
		<li><a href="<?php echo get_home_url(); ?>/?cat=2">exhibitions</a></li>
	</ul>
</div>
<h2>works</h2>

<?php
	while (have_posts()):
		the_post();
		$id = get_the_ID();
?>
<a href="<?php the_permalink(); ?>" class="work_wrapper">
<div class="work">
<img src="<?php echo catch_that_image(); ?>" alt="<?php the_title(); ?>" />
<h3>
	<p>
	<?php the_title(); ?><?php if(get_post_meta($id, 'title_en', true) != '') echo '｜'.get_post_meta($id, 'title_en', true); ?>
	</p>
	<span class="year"><?php the_time('Y/n/j'); ?></span><br>
	<span class="tag"><?php echo $tag_name;?></span>
</h3>
</div>
<?php endwhile?>

<?php elseif(is_category(array(8))): ?>
<?php
?>
<h2>news</h2>
<?php
	$n = 0;
	$last_y = '2001';
	$divEn = '<div class="eng">';
	$divJa = '<div class="jap">';
	while (have_posts()){
		the_post();
		$id=get_the_ID();
		$y = get_the_time('Y');
		if($y != $last_y){
			if($n != 0){
				$divEn .= '</ul>';
				$divJa .= '</ul>';
			}
			$divEn .= '<h3>'.$y.'</h3><ul>';
			$divJa .= '<h3>'.$y.'</h3><ul>';
		}
		$ex_link = ' href="'.get_post_meta($id, 'ex_link', true).'" target="_blank"';
		if(get_post_meta($id, 'ex_is_page', true)) $ex_link = ' class="self" href="'.get_the_permalink().'"';
		$divEn .= '<li><a'.$ex_link.'>'.get_post_meta($id, 'ex_title_en', true).'</a> @<a href="'.get_post_meta($id, 'ex_place_link', true).'" target="_blank">'.get_post_meta($id, 'ex_place_en', true).'</a>（'.get_post_meta($id, 'ex_area_en', true).'）</li>';
		$divJa .= '<li><a'.$ex_link.'>'.get_the_title().'</a> @<a href="'.get_post_meta($id, 'ex_place_link', true).'" target="_blank">'.get_post_meta($id, 'ex_place', true).'</a>（'.get_post_meta($id, 'ex_area', true).'）</li>';
		$last_y = $y;
		$n++;
	}
	$divEn .= '</ul></div>';
	$divJa .= '</ul></div>';
	echo $divJa.$divEn;
?>
<?php endif; //is_category() ?>

<?php else : //if(have_posts()) ?>
<h2 class="center">Not Found</h2>
<p class="center">Sorry, but you are looking for something that isn't here.</p>
<?php include (TEMPLATEPATH . "/searchform.php"); ?>
</div><!-- #archive -->
<?php endif; //if(have_posts()) ?>


<?php get_footer(); ?>
