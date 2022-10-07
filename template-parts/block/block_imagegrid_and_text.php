<?php
/*
Block Name: Image Grid and Text Block
Block Description: Image Grid and Text Block
Post Types: post, page, custom-type
Block SVG: block_template.svg
Block Category: s9blocks
*/
$sectionclass = 'cblock';
/* --------------------------------------------------------------------------- */
if( !empty( $block['data']['_is_preview'] ) ) {
		echo' <img src="'.get_stylesheet_directory_uri().'/template-parts/previews/block_template.png" alt="Title Field">';
		return;
} 
/* --------------------------------------------------------------------------- */
include('______partials_global.php');




$section_title = ! empty( get_field('section_title') ) ? '<h1>'.get_field('section_title').'</h1>' : '';

if( get_field('image_grid') ):
	$imagedata ='';
	while( the_repeater_field('image_grid') ):
		
	
		
		if( !empty($imagefield = get_sub_field('image_square')) ) {
			
			$imageurl=$imagealt=$imageclass = '';
			$imageurl = ! empty($imagefield['url'] ) ? $imagefield['url'] : get_field('default_holding_image','options');
			$imagealt = ! empty( $imagefield['alt'] ) ? ' alt="'.$imagefield['alt'].'"' : '';
			$imagedata .= '<img src="'.$imageurl.'" '.$imagealt.'?>';
		
		} else  { 
			$imagedata .= '';
		
		};
		
	endwhile; 
endif;

/* --------------------------------------------------------------------------- */
echo '<section '.$anchor.' class="'.$blockclass .'">
	<div class="wcp-columns">
	 	<div class="wcp-column"></div>
	 	<div class="wcp-column">'.$imagedata.'</div>
	</div>
</section>';
?>
