<?php
/*
Block Name: Hero Slider
Block Description: Top Page Hero
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


if( have_rows('hero_background_image') ): 
$list = '';
$i = 1;
while( have_rows('hero_background_image') ): the_row(); 
		

		$list .= '	<li></li>';
		$style .= ' .cb-slideshow li:nth-child('.$i.') {  background-image: url('.get_sub_field('slider_background').')  }';
		$i ++;


endwhile; 
 endif;

'';
$overlay_colour = ! empty( get_field('overlay_colour') ) ? ' style="background-color:'.get_field('overlay_colour').';"' : '';


echo '
<style>'.$style.'</style>

<section '.$anchor.' class="'.$blockclass .'">

<ul class="cb-slideshow">'.$list.'</ul>
<div class="overlay" '.$overlay_colour.'>
		 <img src="/wp-content/themes/cynynion-uchaf/assets/img/svg/cyn-white.svg" alt="Cynynion Uchaf - Tranquility & Serenity" />

</div>

</section>';
?>

