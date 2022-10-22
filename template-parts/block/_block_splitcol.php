<?php
/*
Block Name: Split Columns
Block Description: Block Description
Post Types: post, page, custom-type
Block SVG: block_template.svg
Block Category: s9blocks
*/
$sectionclass = 'splitcol';


/* --------------------------------------------------------------------------- */
if( !empty( $block['data']['_is_preview'] ) ) {
echo' <img src="'.get_stylesheet_directory_uri().'/template-parts/previews/block_template.png" alt="Title Field">'; return; } 
/* --------- */
include('______partials_global.php');

$section_title = ! empty( get_field('header_text') ) ? '<h1>'.get_field('header_text').'</h1>' : '';
$strap_line = ! empty( get_field('sub_area') ) ? get_field('sub_area') : '';
$area1= ! empty( get_field('area_1') ) ? get_field('area_1') : '';
$area2= ! empty( get_field('area_2') ) ? get_field('area_2') : '';
$area3= ! empty( get_field('area_3') ) ? get_field('area_3') : '';
/* --------- */

echo '<section '.$anchor.' class="'.$blockclass .'">
	<div class="splitcolgrid">
		 <div class="introduction">'.$section_title.$strap_line.'</div>
		 <div class="area1">'.$area1.'</div>
		 <div class="area2">'.$area2.'</div>
		 <div class="area3">'.$area3.'</div>
		
	</div>
</section>';
?>
