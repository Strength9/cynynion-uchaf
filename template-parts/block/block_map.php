<?php
/*
Block Name: Map Block
Block Description: Map Block with location
Post Types: post, page, custom-type
Block SVG: block_template.svg
Block Category: s9blocks
*/
$sectionclass = 'mapblock';
/* --------------------------------------------------------------------------- */
if( !empty( $block['data']['_is_preview'] ) ) {
		echo' <img src="'.get_stylesheet_directory_uri().'/template-parts/previews/block_template.png" alt="Title Field">';
		return;
} 
/* --------------------------------------------------------------------------- */
include('______partials_global.php');

/* --------------------------------------------------------------------------- 
background_colour
call_to_action_text

*/
echo '<iframe  '.$anchor.' class="'.$blockclass .'" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d19272.568866871552!2d-3.0942019521648754!3d52.8571210562599!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x48654d37d7e81d2f%3A0x3e79a824a8e75a7f!2sOswestry!5e0!3m2!1sen!2suk!4v1666427453761!5m2!1sen!2suk" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>';
?>
