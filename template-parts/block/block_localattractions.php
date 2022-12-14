<?php
/*
Block Name: Local Attractions Grid
Block Description: Local Attractions Grid
Post Types: post, page, custom-type
Block SVG: block_template.svg
Block Category: s9blocks
*/
$sectionclass = 'localattractionsgrid';
/* --------------------------------------------------------------------------- */
if( !empty( $block['data']['_is_preview'] ) ) {
		echo' <img src="'.get_stylesheet_directory_uri().'/template-parts/previews/block_template.png" alt="Title Field">';
		return;
} 
/* --------------------------------------------------------------------------- */
include('______partials_global.php');

/* --------------------------------------------------------------------------- */


$area_title = ! empty( get_field('area_title') ) ? '<h2>'.get_field('area_title').'</h2>' : '';
$area_content = ! empty( get_field('area_content') ) ? get_field('area_content') : '';

$select_number_to_show = ! empty( get_field('select_number_to_show') ) ? get_field('select_number_to_show') : 3;


	$args = array(  
		'post_type' => 'local_attraction',
		'post_status' => 'publish',
		'posts_per_page' => $select_number_to_show, 
		'orderby' => 'title', 
		'order' => 'ASC', 
	);

$loop = new WP_Query( $args ); 
	$gridoutput = '';
while ( $loop->have_posts() ) : $loop->the_post(); 
	
$post_id = get_the_ID();
	$thumbnail_url = get_the_post_thumbnail_url();
	$extract =  ! empty( get_field('attraction_introduction',$post_id) ) ? get_field('attraction_introduction',$post_id) : ''; 
	$gridoutput .= '<article>
				<div class="locationthumbnail" style="background-image:url('.$thumbnail_url.');"></div>
				<div class="locationtitle"><h3>'.get_the_title().'</h3></div>
				<div class="locationextract">'.$extract.'</div>
				<a href="/out-about/#'.strtolower(str_replace(" ","",get_the_title())).'">Read More</a>
			
	</article>';
	
endwhile;
wp_reset_postdata(); 


echo '<section '.$anchor.' class="'.$blockclass .'">
	<div class="wcp-columns">
	 	<div class="wcp-column full">'.$area_title.$area_content.'
		 
		 
		 <div class="attractionslink">
		 '.$gridoutput.'
		 </div>
		 
		 
		 
		 </div>
	</div>
</section>';
?>
