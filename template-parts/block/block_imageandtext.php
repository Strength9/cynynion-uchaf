<?php
/*
Block Name: Image and Text
Block Description: Call to Action
Post Types: post, page, custom-type
Block SVG: block_template.svg
Block Category: s9blocks
*/
$sectionclass = 'imageandtext';
/* --------------------------------------------------------------------------- */
if( !empty( $block['data']['_is_preview'] ) ) {
		echo' <img src="'.get_stylesheet_directory_uri().'/template-parts/previews/block_template.png" alt="Title Field">';
		return;
} 
/* --------------------------------------------------------------------------- */
include('______partials_global.php');

/* --------------------------------------------------------------------------- */

$position = ! empty( get_field('textposition') ) ? get_field('textposition') : 'left'; // left / right
$contenttext = ! empty( get_field('contenttext') ) ? get_field('contenttext') : '';

if( !empty($imagefield = get_field('imagefield')) ) {
	
	$imageurl=$imagealt=$imageclass = '';
	$imageurl = ! empty($imagefield['url'] ) ? $imagefield['url'] : get_field('default_holding_image','options');
	$imagealt = ! empty( $imagefield['alt'] ) ? ' alt="'.$imagefield['alt'].'"' : '';
	$imagedata .= '<img src="'.$imageurl.'" '.$imagealt.'?>';

} else  { 
	$imagedata .= '';

};


echo '<section '.$anchor.' class="'.$blockclass .'">
	<div class="wcp-columns">
	 	<div class="wcp-column">'.$contenttext.'</div>
		 <div class="wcp-column">'.$position.$imagedata .'</div>
	</div>
</section>';
?>
