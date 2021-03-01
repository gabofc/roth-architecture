<?php
if( isset($_REQUEST) && is_array($_REQUEST) ){
  function format_date( $date ){
    $formated_date = explode("/", $date);
    return $formated_date[2].$formated_date[1].$formated_date[0];
  }
  function format_time( $time ){
    $formated_time = explode(":", $time);
    return $formated_time[0].$formated_time[1].'00';
  }
  $start_date = format_date($_REQUEST['dtstart']);
  $start_time = format_time($_REQUEST['tstart']);
  $end_time = format_time(date( "H:i", strtotime($start_time)+(60*30) ));
  var_dump($_REQUEST);
  echo $start_date." ** ".$start_time." ** ".$end_time;
  // I know there are probably better ways to do this, but this accomplishes what I needed it to do.

  // Convert times to iCalendar format. They require a block for yyyymmdd and then another block
  // for the time, which is in hhiiss. Both of those blocks are separated by a "T". The Z is
  // declared at the end for UTC time, but shouldn't be included in the date conversion.

  // iCal date format: yyyymmddThhiissZ
  // PHP equiv format: Ymd\This

  function dateToCal($time) {
    var_dump($time);
    return date('Ymd\THis', $time) . 'Z';
  }

  // Build the ics file
  $ical = 'BEGIN:VCALENDAR
  VERSION:2.0
  PRODID:-//azulik/handcal//NONSGML v1.0//EN
  CALSCALE:GREGORIAN
  BEGIN:VEVENT
  DTEND:' . dateToCal($start_date.'\T'.$end_time) . '
  UID:' . md5($_REQUEST['summary']) . '
  DTSTAMP:' . time() . '
  LOCATION:' . addslashes('+'.$_REQUEST['location']) . '
  DESCRIPTION:' . addslashes($_REQUEST['description']) . '
  URL;VALUE=URI:
  SUMMARY:' . addslashes($_REQUEST['summary']) . '
  DTSTART:' . dateToCal($start_date.'\T'.$start_time) . '
  END:VEVENT
  END:VCALENDAR';
  var_dump($ical);exit();
  header('Content-type: text/calendar; charset=utf-8');
	header('Content-Disposition: attachment; filename=mohawk-event.ics');
	echo $ical;
} else {
  header('Location: /');
  exit();
}
?>
