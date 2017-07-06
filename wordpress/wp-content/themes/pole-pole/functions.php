<?php
	// function change_posts_per_page(){
	// 	if( is_admin() || ! $query->is_main_query() ){
	// 		return;
	// 	}
	// 	if ( $query->is_single() ) {
	// 		return;
	// 	}
	// }
	// add_action( 'pre_get_posts', 'change_posts_per_page' );
	function catch_that_image() {
    global $post, $posts;
    $first_img = '';
    ob_start();
    ob_end_clean();
    $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
    $first_img = $matches [1] [0];

if(empty($first_img)){ //Defines a default image
        $first_img = bloginfo('template_url')."/assets/img/header_log.jpg";
    }
    return $first_img;
}
	add_theme_support('post-thumbnails');
?>
