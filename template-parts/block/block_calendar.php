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
/* --------------------------------------------------------------------------- */
include('______partials_global.php');

/* ---------------------------------------------------------------------------


*/


$bookeddates = ! empty( get_field('bookeddates','options') ) ? get_field('bookeddates','options') : '';
/* --------- */

$value = '';
foreach ($bookeddates as $datea) {
	$value .= $datea.',';
};
$disabled = rtrim($value, ',');



function checkthisdate($dayDate,$month,$yeartoshow,$disabled) {
	
	if ($dayDate <= 9) {
		$dayDate = '0'.$dayDate;
	};
	
	$chkdate=$yeartoshow.'-'.$month.'-'.$dayDate;
	


$pos = strpos($disabled, $chkdate);

	if ($pos !== false) {
		 $i = "disabled";
	} else {
		$startDate = strtotime(date('Y-m-d', strtotime($chkdate) ) );
		$currentDate = strtotime(date('Y-m-d'));
		
		if($startDate < $currentDate) {
			$i = "disabled";
		} else {
			$i = '';
		}

	};	
	return '<li class="'.$i.'">'.$dayDate.'</li>';
};

$daysOfWeek = array('S','M','T','W','T','F','S');
$Calendardays = '<ul class="daysofweek">';
foreach($daysOfWeek as $day) {
	$Calendardays  .= "<li class='dayname'>$day</li>";
};
$Calendardays .= '</ul>';


//'2023-01-05





$counter = 1;
$month =  6;
$yeartoshow = 2022;

WHile ($counter <= 12 ) {
	while (($month <= 12 ) && ($counter <= 12 )) {

			$firstDayOfMonth = mktime(0,0,0,$month,1,$yeartoshow);
			$numberDays = date('t',$firstDayOfMonth);
			$dateComponents = getdate($firstDayOfMonth);
			$GetdayOfWeek = $dateComponents['wday'];
			$dayDate = 1;
			
			$nmMth = date('m', strtotime( $dateComponents['month']));
		
			$calendar .= '<div class="monthblock">
								<ul class="monthname"><li class="monthheader">'. $dateComponents['month'].' '.$yeartoshow.'</li></ul>'.$Calendardays.'
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
			echo $counter;
			$month ++;
			$counter ++;
	};
	
	if ($month > 12 ) {
		$month = 1;
		$yeartoshow = $yeartoshow+1;
	}
	

};

echo '<section '.$anchor.' class="'.$blockclass .'">
	<div class="wcp-columns '.$background_colour.'"><br><br><br><br><br><br><br><br>
	 	<div class="wcp-column full">
		 Space, the final frontier. These are the voyages of the Starship Enterprise. Its five-year mission: to explore strange new worlds, to seek out new life and new civilizations, to boldly go where no man has gone before. Many say exploration is part of our destiny, but it’s actually our duty to future generations and their quest to ensure the survival of the human species.
			 Previous Year
			 Nexy year
			 <div class="calendar">'.$calendar.'</div>
		 </div>
	</div>
</section>';
?>
