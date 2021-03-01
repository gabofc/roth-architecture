<?php
function format_date( $date ){
  $formated_date = explode("/", $date);
  return $formated_date[2].$formated_date[0].$formated_date[1];
}
function format_time( $time ){
  $formated_time = explode(":", $time);
  return $formated_time[0].$formated_time[1].'00';
}
$start_date = format_date($_REQUEST['dtstart']);
$start_time = format_time($_REQUEST['tstart']);
$end_time = format_time(date( "H:i", strtotime($start_time)+(60*30) ));

function dateToCal($time) {
  return date('Ymd\THis', strtotime($time));
}

// Build the ics file
$ical = 'BEGIN:VCALENDAR
VERSION:2.0
PRODID:-//azulik/handcal//NONSGML v1.0//EN
CALSCALE:GREGORIAN
X-WR-TIMEZONE: ' . $_GET['timezone'] . '
BEGIN:VEVENT
DTEND:' . dateToCal( $start_date.' '.$end_time ) . '
UID:' . md5(date("YmdHis")) . '
DTSTAMP:' . time() . '
LOCATION:' . addslashes('+'.$_GET['location']) . '
DESCRIPTION:' . addslashes($_GET['description']) . '
URL;VALUE=URI:
SUMMARY:' . strip_tags($_REQUEST['summary']) . '
DTSTART:' . dateToCal( $start_date.' '.$start_time ) . '
END:VEVENT
END:VCALENDAR';

  header('Content-Type: text/calendar; charset=utf-8');
	header('Content-Disposition: attachment; filename=azulik-event.ics');
	echo $ical;
exit();
?>
