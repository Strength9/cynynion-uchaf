<?php
/*
Block Name: Booking Calendar
Block Description: Booking Calendar
Post Types: post, page, custom-type
Block SVG: block_template.svg
Block Category: s9blocks
*/
$sectionclass = 'calltoaction';
/* --------------------------------------------------------------------------- */
if( !empty( $block['data']['_is_preview'] ) ) {
		echo' <img src="'.get_stylesheet_directory_uri().'/template-parts/previews/block_template.png" alt="Title Field">';
		return;
} 
/* --------------------------------------------------------------------------- */
include('______partials_global.php');

/* ---------------------------------------------------------------------------


*/
$daysOfWeek = array('S','M','T','W','T','F','S');
$Calendardays = '<ul class="daysofweek">';
foreach($daysOfWeek as $day) {
	$Calendardays  .= "<li class='dayname'>$day</li>";
};
$Calendardays .= '</ul>';



$month =  1;
$yeartoshow = 2022;


while($month <= 2) {
	
	$firstDayOfMonth = mktime(0,0,0,$month,1,$yeartoshow);
	$numberDays = date('t',$firstDayOfMonth);
	$dateComponents = getdate($firstDayOfMonth);
	$GetdayOfWeek = $dateComponents['wday'];
	$dayDate = 1;
	
	$calendar .= '<div class="monthblock">
						<ul class="calendar_row"><li class="monthheader">'. $dateComponents['month'].' '.$yeartoshow.'</li></ul>'.$Calendardays.'
						<ul class="calendarrow">';
	// Add Fills in at the start
		if ($GetdayOfWeek > 0) { $fill = 1; while ($fill <= $GetdayOfWeek) { $calendar .= '<li>&nbsp;</li>'; $fill ++; }; };
	// Add first Week of days
		while ($fill < 8) {
			$calendar .= '<li>'.$dayDate.'</li>';
			$dayDate ++; $fill ++;
		};
	// Add in remainder of the days
		while ($dayDate <= $numberDays) {
			$calendar .= '</ul><ul class="calendarrow">';
			$fill = 1;
			while ($fill < 8 && $dayDate <= $numberDays) { $calendar .= '<li>'.$dayDate.'</li>'; $dayDate ++; $fill ++; };
		};
	// Fill out remainder of the days
		while ($fill <= 7) { $calendar .= '<li>&nbsp;</li>'; $fill ++; };
	$calendar .= '</ul></div>';
	
	$month ++;
};

echo '<section '.$anchor.' class="'.$blockclass .'">
	<div class="wcp-columns '.$background_colour.'"><br><br><br><br><br><br><br><br>
	 	<div class="wcp-column full">
		 Space, the final frontier. These are the voyages of the Starship Enterprise. Its five-year mission: to explore strange new worlds, to seek out new life and new civilizations, to boldly go where no man has gone before. Many say exploration is part of our destiny, but it’s actually our duty to future generations and their quest to ensure the survival of the human species.'.$calendar.'
		 </div>
	</div>
</section>';
?>
