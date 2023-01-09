<?php
/*
Block Name: Hero Video
Block Description: Top Page Hero Video
Post Types: post, page, custom-type
Block SVG: block_template.svg
Block Category: s9blocks
*/

/* --------------------------------------------------------------------------- */
if( !empty( $block['data']['_is_preview'] ) ) {
		echo' <img src="'.get_stylesheet_directory_uri().'/template-parts/previews/block_template.png" alt="Title Field">';
		return;
} 
/* --------------------------------------------------------------------------- */


$sectionclass = ! empty( get_field('hero_size') ) ? 'pagehero '.get_field('hero_size') : 'pagehero '.'homepage';



include('______partials_global.php');



$hero_background_image = ! empty( get_field('hero_background_image') ) ? ' style="background-image:url('.get_field('hero_background_image').');"' : '';
$overlay_colour = ! empty( get_field('overlay_colour') ) ? ' style="background-color:'.get_field('overlay_colour').';"' : '';

/* 
hero_size
innerpage
homepage
--------------------------------------------------------------------------- 
background_colour
call_to_action_text

*/
echo '<section '.$anchor.' class="'.$blockclass .'"'.$hero_background_image.'>

<div class="overlay" '.$overlay_colour.'>
		 <img src="/wp-content/themes/cynynion-uchaf/assets/img/svg/cyn-white.svg" alt="Cynynion Uchaf - Tranquility & Serenity" />

</div>

</section>';
?>

