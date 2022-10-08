<?php
/*
Block Name: Call to Action
Block Description: Call to Action
Post Types: post, page, custom-type
Block SVG: block_template.svg
Block Category: s9blocks
*/
$sectionclass = 'calltoaction';
/* --------------------------------------------------------------------------- */
if( !empty( $block['data']['_is_preview'] ) ) {
		echo' <img src="'.get_stylesheet_directory_uri().'/template-parts/previews/block_template.png" alt="Title Field">';
		return;
} 
/* --------------------------------------------------------------------------- */
include('______partials_global.php');

/* --------------------------------------------------------------------------- */
$background_colour = ! empty( get_field('background_colour') ) ? get_field('background_colour') : 'blue'; // blue / black
$call_to_action_text = ! empty( get_field('call_to_action_text') ) ? get_field('call_to_action_text') : '';


echo '<section '.$anchor.' class="'.$blockclass .'">
	<div class="wcp-columns '.$background_colour.'">
	 	<div class="wcp-column full">'.$call_to_action_text.'</div>
	</div>
</section>';
?>
