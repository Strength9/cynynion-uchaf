<?php
/*
Block Name: Contact Form
Block Description: Contact Form Block
Post Types: post, page, custom-type
Block SVG: block_template.svg
Block Category: s9blocks
*/
$sectionclass = 'contactform';
/* --------------------------------------------------------------------------- */
if( !empty( $block['data']['_is_preview'] ) ) {
echo' <img src="'.get_stylesheet_directory_uri().'/template-parts/previews/block_template.png" alt="Title Field">'; return; } 
/* --------- */
include('______partials_global.php');

$bookeddates = ! empty( get_field('bookeddates','options') ) ? get_field('bookeddates','options') : '';
/* --------- */
$value = '';
foreach ($bookeddates as $datea) {
	$value .= '{
		from: "'.$datea.'",
		to: "'.$datea.'"
	},';
};

$email_addresscf = ! empty( get_field('email_address','options') ) ? '<li class="email">Email: <a href="mailto:'.get_field('email_address','options').'" title="email the team">'.get_field('email_address','options').'</a></li>' : '';
$telephone_numbercf = ! empty( get_field('telephone_number','options') ) ? '<li class="phone">Tel: <a href="tel:'.get_field('telephone_number','options').'" title="call the team">'.get_field('telephone_number','options').'</a></li>' : '';
$addresscf= ! empty( get_field('address_contactpage','options') ) ? '<address>'.get_field('address_contactpage','options').'</address>' : '';

$extra_information= ! empty( get_field('extra_information') ) ? get_field('extra_information') : '';


echo '<script type="text/javascript">
	window.wpforms_37 = window.wpforms_37 || {};
	window.wpforms_37.datepicker = {
		mode: "range",
		disable: ['.rtrim($value, ',').']
	};
</script>

<section '.$anchor.' class="'.$blockclass .'">
	<div class="wcp-columns">
		<div class="wcp-column infofields"><div class="holder">'.$extra_information.'</div></div>
		<div class="wcp-column addressfields">'.$addresscf.'<ul>'.$email_addresscf.$telephone_numbercf.'</ul></div>
		<div class="wcp-column formfields">'.do_shortcode('[wpforms id="37"]').'</div>
	</div>
</section>';
?>
