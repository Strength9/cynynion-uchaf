<?php
/*
Block Name: Local Attractions Details
Block Description: Attractions Details
Post Types: post, page, custom-type
Block SVG: block_template.svg
Block Category: s9blocks
*/
$sectionclass = 'attractiondetails';
/* --------------------------------------------------------------------------- */
if( !empty( $block['data']['_is_preview'] ) ) {
echo' <img src="'.get_stylesheet_directory_uri().'/template-parts/previews/block_template.png" alt="Title Field">'; return; } 
/* --------- */
include('______partials_global.php');

$area_title = ! empty( get_field('area_title') ) ? '<h2>'.get_field('area_title').'</h2>' : '';
$area_content = ! empty( get_field('area_content') ) ? get_field('area_content') : '';

	$args = array(  
		'post_type' => 'local_attraction',
		'post_status' => 'publish',
		//'posts_per_page' => $select_number_to_show, 
		'orderby' => 'title', 
		'order' => 'ASC', 
	);

$loop = new WP_Query( $args ); 
	$gridoutput = '';
while ( $loop->have_posts() ) : $loop->the_post(); 
	
	$post_id = get_the_ID();
	$thumbnail_url = get_the_post_thumbnail_url();
	$map =! empty( get_field('google_maps_link',$post_id) ) ? get_field('google_maps_link',$post_id) : '';
	
	
	//google_maps_link
	
		$gridoutput .= '<article>
				<div class="thumbnail" style="background-image:url('.$thumbnail_url.');"><h3>'.get_the_title().'</h3></div>
				<div class="map">
				<iframe src="'.$map.'" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe></div>
				<div class="detail">'.get_the_content().'</div>
	</article><div class="spacer"></div>';
	
endwhile;
wp_reset_postdata(); 
/* --------- */

echo '<section '.$anchor.' class="'.$blockclass .'">
	<div class="wcp-columns">
		 <div class="wcp-column full">
		 Attractions
		 '.$area_title.$area_content.$gridoutput.'
		 </div>
	</div>
</section>';
?>
