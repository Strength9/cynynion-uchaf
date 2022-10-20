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

$position = ! empty( get_field('position') ) ? get_field('position') : 'left'; // left / right
$contenttext = ! empty( get_field('contenttext') ) ? '<div class="wcp-column textside '.$position.'"><div class="content">'.get_field('contenttext').'</div></div>' : '<div class="wcp-column textside"></div>';

if( !empty($imagefield = get_field('imagefield')) ) {
	
	$imageurl=$imagealt=$imageclass = '';
	$imageurl = ! empty($imagefield['url'] ) ? $imagefield['url'] : get_field('default_holding_image','options');
	$imagedata .= '<div class="wcp-column imageside" style="background-image:url('.$imageurl.');">'.$position.'</div>' ;

} else  { 
	$imagedata .= '<div class="wcp-column imageside"></div>';

};

if ($position === 'left') {
	$output = $contenttext.$imagedata ;
} else {
	$output = $imagedata.$contenttext ;
}


echo '<section '.$anchor.' class="'.$blockclass .'">
	<div class="wcp-columns">
	 	'.$output.'
	</div>
</section>';
?>
