<?php
/*
Block Name: Block Gallery
Block Description: Block Gallery
Post Types: post, page, custom-type
Block SVG: block_template.svg
Block Category: s9blocks
*/
$sectionclass = 'gallery';
/* --------------------------------------------------------------------------- */
if( !empty( $block['data']['_is_preview'] ) ) {
echo' <img src="'.get_stylesheet_directory_uri().'/template-parts/previews/block_template.png" alt="Title Field">'; return; } 
/* --------- */
include('______partials_global.php');
/* --------- */



$title_field = ! empty( get_field('title_field') ) ? '<h1>'.get_field('title_field').'</h1>' : '';
$introduction_block = ! empty( get_field('introduction_block') ) ? get_field('introduction_block') : '';

$galleryloop = '';
 $loadup = '';
if( have_rows('gallery') ):
 while( have_rows('gallery') ): the_row();
		$galleryloop .= '<li><a class="thumbnail gallery" href="'.get_sub_field('gallery_image').'" style="background-image:url('.get_sub_field('gallery_image').'"></a></li>'; 
 endwhile;
 $loadup ='<link type="text/css" rel="stylesheet" href="/wp-content/themes/cynynion-uchaf/assets/lightbox/featherlight.css" /><link type="text/css" rel="stylesheet" href="/wp-content/themes/cynynion-uchaf/assets/lightbox/featherlight.gallery.css" /><script src="/wp-content/themes/cynynion-uchaf/assets/lightbox/featherlight.js" type="text/javascript" charset="utf-8"></script><script src="/wp-content/themes/cynynion-uchaf/assets/lightbox/featherlight.gallery.js" type="text/javascript" charset="utf-8"></script>';
 $galleryloop = '<ul class="galleryimages">'.$galleryloop.'</ul>';
endif;



echo  $loadup.'<section '.$anchor.' class="'.$blockclass .'">
	<div class="wcp-columns">
		 <div class="wcp-column full">
		 '.$title_field.$introduction_block.$galleryloop.'
		 
		 
		 </div>
	</div>
</section>

		<script>
	jQuery(document).ready(function(){
		jQuery(".gallery").featherlightGallery({
			gallery: {
				fadeIn: 300,
				fadeOut: 300
			},
			openSpeed:    300,
			closeSpeed:   300
		});
	});
</script>


';
?>
