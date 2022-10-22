<?php
/*
Block Name: Long Text
Block Description: Long Text
Post Types: post, page, custom-type
Block SVG: block_template.svg
Block Category: s9blocks
*/
$sectionclass = 'longtext';
/* --------------------------------------------------------------------------- */
if( !empty( $block['data']['_is_preview'] ) ) {
echo' <img src="'.get_stylesheet_directory_uri().'/template-parts/previews/block_template.png" alt="Title Field">'; return; } 
/* --------- */
include('______partials_global.php');

/* --------- */

$longtext = ! empty( get_field('longtext') ) ? get_field('longtext') : '';

echo '<section '.$anchor.' class="'.$blockclass .'">
	<div class="wcp-columns">
		 <div class="wcp-column full">'.$longtext.'</div>
	</div>
</section>';


?>

