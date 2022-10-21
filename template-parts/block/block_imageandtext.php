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

$position = ! empty( get_field('position') ) ? get_field('position') : 'left'; 



if ( get_field('show_property_features') ): 
	$sub_field_1 = '';
	
	if ( get_field('show_only_front_features') ):   // just selected options
	
			if( have_rows('property_features','options') ):
				while( have_rows('property_features','options') ): the_row();
						if ( get_sub_field('show_on_front_page') ):
						$sub_field_1 .= '<li>'.get_sub_field('feature').'</li>';
						endif; 
				endwhile;
			endif; 
	else: // All Features
		if( have_rows('property_features','options') ):
			while( have_rows('property_features','options') ): the_row();
				
					$sub_field_1 .= '<li>'.get_sub_field('feature').'</li>';
			endwhile;
		endif; 
	endif;	
	
	$list = '<ul class="features">'.$sub_field_1.'</ul>';
else:
	$list='';
endif;



$contenttext = ! empty( get_field('contenttext') ) ? '<div class="wcp-column textside '.$position.'"><div class="content '.$position.'">'.get_field('contenttext').$list.'</div></div>' : '<div class="wcp-column textside"></div>';

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
	<div class="wcp-columns '.$position.'">
	 	'.$output.'
	</div>
</section>'; 
?>
