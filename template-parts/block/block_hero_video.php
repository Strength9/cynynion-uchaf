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


$sectionclass = 'pagehero_video';



include('______partials_global.php');



$hero_background_image = ! empty( get_field('hero_background_image') ) ? ' poster="'.get_field('hero_background_image').'"' : '';
$overlay_colour = ! empty( get_field('overlay_colour') ) ? ' style="background-color:'.get_field('overlay_colour').';"' : '';


echo '<section '.$anchor.' class="'.$blockclass .'">

<video id="background-video" autoplay loop muted '.$hero_background_image.'>
<source src="/wp-content/uploads/video/Wales-1.mp4" type="video/mp4">
</video>
<div class="overlay" '.$overlay_colour.'>
	<img src="/wp-content/themes/cynynion-uchaf/assets/img/svg/cyn-white.svg" alt="Cynynion Uchaf - Tranquility & Serenity" />
</div>
<div class="volumecontrol">
<svg id="volumeon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><!--! Font Awesome Pro 6.2.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M333.2 34.84c-4.201-1.895-8.727-2.841-13.16-2.841c-7.697 0-15.29 2.784-21.27 8.1L163.8 160H80c-26.51 0-48 21.49-48 47.1v95.1c0 26.51 21.49 47.1 48 47.1h83.84l134.9 119.9C304.7 477.2 312.3 480 320 480c4.438 0 8.959-.9312 13.16-2.837C344.7 472 352 460.6 352 448V64C352 51.41 344.7 39.1 333.2 34.84zM319.1 447.1L175.1 319.1H80c-8.822 0-16-7.16-16-15.96v-96c0-8.801 7.178-15.96 16-15.96h95.1l143.1-127.1c.0078-.0078-.0039 .0039 0 0L319.1 447.1zM491.4 98.7c-7.344-4.922-17.28-2.953-22.2 4.391s-2.953 17.28 4.391 22.2C517.7 154.8 544 203.7 544 256s-26.33 101.2-70.44 130.7c-7.344 4.922-9.312 14.86-4.391 22.2C472.3 413.5 477.3 416 482.5 416c3.062 0 6.156-.875 8.891-2.703C544.4 377.8 576 319 576 256S544.4 134.2 491.4 98.7zM438.4 178.7c-7.328-4.922-17.28-2.953-22.2 4.391s-2.953 17.28 4.391 22.2C437.8 216.8 448 235.7 448 256s-10.23 39.23-27.38 50.7c-7.344 4.922-9.312 14.86-4.391 22.2C419.3 333.5 424.4 336 429.5 336c3.062 0 6.156-.875 8.891-2.703C464.5 315.9 480 286.1 480 256S464.5 196.1 438.4 178.7z"/></svg>

<svg id="volumeoff" class="hide" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><!--! Font Awesome Pro 6.2.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M502.6 256l52.69-52.69c6.25-6.25 6.25-16.38 0-22.62s-16.38-6.25-22.62 0L480 233.4l-52.69-52.69c-6.25-6.25-16.38-6.25-22.62 0s-6.25 16.38 0 22.62L457.4 256l-52.69 52.69c-6.25 6.25-6.25 16.38 0 22.62c6.246 6.246 16.37 6.254 22.62 0L480 278.6l52.69 52.69c6.246 6.246 16.37 6.254 22.62 0c6.25-6.25 6.25-16.38 0-22.62L502.6 256zM288 31.1c-7.697 0-15.29 2.784-21.27 8.1L131.8 160H48c-26.51 0-48 21.49-48 47.1v95.1c0 26.51 21.49 47.1 48 47.1h83.84l134.9 119.9c5.984 5.312 13.58 8.094 21.26 8.094c21.04 0 31.1-17.87 31.1-31.1V64C319.1 50.14 309.1 31.1 288 31.1zM287.1 447.1L143.1 319.1H48c-8.822 0-16-7.16-16-15.96v-96c0-8.801 7.178-15.96 16-15.96h95.1l143.1-127.1c.0078-.0078-.0039 .0039 0 0L287.1 447.1z"/></svg>

</div>
</section>
<script>
$(document).ready(function(){
  jQuery("video").prop("muted", true);

  jQuery(".volumecontrol svg").click( function (){
	  console.log("volume Clicked");
	  jQuery("#background-video").prop("muted", !jQuery("#background-video").prop("muted"));
	  jQuery("#volumeoff, #volumeon").toggleClass( "hide" );
	  
  });


  
});
</script>


';
?>

