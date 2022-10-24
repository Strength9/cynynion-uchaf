<?php
/*
Block Name: Booking Calendar
Block Description: Booking Calendar
Post Types: post, page, custom-type
Block SVG: block_template.svg
Block Category: s9blocks
*/
$sectionclass = 'bookingcalendar';
/* --------------------------------------------------------------------------- */
if( !empty( $block['data']['_is_preview'] ) ) {
		echo' <img src="'.get_stylesheet_directory_uri().'/template-parts/previews/block_template.png" alt="Title Field">';
		return;
} 
include('______partials_global.php');

$bookeddates = ! empty( get_field('bookeddates','options') ) ? get_field('bookeddates','options') : '';
$value = '';
foreach ($bookeddates as $datea) {
	$value .= $datea.',';
};
$disabled = rtrim($value, ','); 
/* --------- */


$calendar_intro_title = ! empty( get_field('calendar_intro_title') ) ? '<h1>'.get_field('calendar_intro_title').'</h1>' : '';
$calendar_introduction = ! empty( get_field('calendar_introduction') ) ? get_field('calendar_introduction') : '';
$calendar_title = ! empty( get_field('calendar_title') ) ? '<h2>'.get_field('calendar_title').'</h2>' : 'Our Calendar';

 $instructions = ! empty( get_field('instructions') ) ? get_field('instructions') : '';
$noofmonthstoshow = ! empty( get_field('number_of_months_to_show') ) ? get_field('number_of_months_to_show') : 4;








$nm = sanitize_text_field( get_query_var( 'nm' ) );
$ny = sanitize_text_field( get_query_var( 'ny' ) );
if ($nm > 0) {$month = $nm;} else { $month =  date('n');}
if ($ny > 0) {$yeartoshow = $ny;} else { $yeartoshow =  date('Y');}

$counter = 1;


$nextdate = new DateTime($yeartoshow.'-'.$month.'-01');
$nextdate->modify("+$noofmonthstoshow month"); 
$previousdate = new DateTime($yeartoshow.'-'.$month.'-01');
$previousdate->modify("-$noofmonthstoshow month"); 


$cutofdate = new DateTime(date('Y-m-d'));
$cutofdate->modify("-1 month"); 


if($previousdate->format('Y-m-d') < $cutofdate->format('Y-m-d')) {
	$previouslink = '';
} else {
	$previouslink =  '<a href="'.getslug().'?nm='.$previousdate->format('n').'&ny='.$previousdate->format('Y').'#availability"><i class="fa-light fa-chevrons-left"></i> Previous</a>';	
};


$nextlink = '<a href="'.getslug().'?nm='.$nextdate->format('n').'&ny='.$nextdate->format('Y').'#availability">Next <i class="fa-light fa-chevrons-right"></i></a>';


WHile ($counter <= $noofmonthstoshow ) {
	while (($month <= 12 ) && ($counter <= $noofmonthstoshow )) {

			$firstDayOfMonth = mktime(0,0,0,$month,1,$yeartoshow);
			$numberDays = date('t',$firstDayOfMonth);
			$dateComponents = getdate($firstDayOfMonth);
			$GetdayOfWeek = $dateComponents['wday'];
			$dayDate = 1;
			
			$nmMth = date('m', strtotime( $dateComponents['month']));
		
			$calendar .= '<div class="monthblock">
								<ul class="monthname"><li class="monthheader">'. $dateComponents['month'].' '.$yeartoshow.'</li></ul>'.daysoftheweek().'
								<ul class="calendar_row">';
			// Add Fills in at the start
			$fill = 1;
				if ($GetdayOfWeek > 0) { $fill = 1; while ($fill <= $GetdayOfWeek) { $calendar .= '<li class="fill">&nbsp;</li>'; $fill ++; }; };
			// Add first Week of days
				while ($fill < 8) {
					$calendar .= checkthisdate($dayDate,$nmMth,$yeartoshow,$disabled);
					$dayDate ++; $fill ++;
				};
			// Add in remainder of the days
				while ($dayDate <= $numberDays) {
					$calendar .= '</ul><ul class="calendar_row">';
					$fill = 1;
					while ($fill < 8 && $dayDate <= $numberDays) { $calendar .= checkthisdate($dayDate,$nmMth,$yeartoshow,$disabled); $dayDate ++; $fill ++; };
				};
			// Fill out remainder of the days
				while ($fill <= 7) { $calendar .= '<li class="fill">&nbsp;</li>'; $fill ++; };
			$calendar .= '</ul></div>';
			$month ++;
			$counter ++;
	};
	
	if ($month > 12 ) {
		$month = 1;
		$yeartoshow = $yeartoshow+1;
	}
	

};


echo '<section id="availability" class="'.$blockclass .'">
	<div class="bookingdata">'.$calendar_intro_title.$calendar_introduction.'

	 	<div class="titleblock">'.$calendar_title.'</div>
		 <div class="navigation">
			   <div class="previous">
					 '.$previouslink.'
				  </div>
				  <div class="next">
					 '.$nextlink.'
				  </div>
		  </div>
		<div class="calendar">'.$calendar.'</div>
		<div class="navigation">
			   <div class="previous">
				  '.$previouslink.'
			   </div>
			   <div class="next">
				  '.$nextlink.'
			   </div>
		  </div>
		  <div class="instructions">'.$instructions.'</div>
	</div>
</section>';
?>
