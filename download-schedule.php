<?php
/*if( isset($_REQUEST) && is_array($_REQUEST) ){
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

  function dateToCal($time) {
    return date('Ymd\THis', strtotime($time)) . 'Z';
  }

  // Build the ics file
  $ical = 'BEGIN:VCALENDAR
  VERSION:2.0
  PRODID:-//hacksw/handcal//NONSGML v1.0//EN
  CALSCALE:GREGORIAN
  BEGIN:VEVENT
  DTEND:' . dateToCal( $start_date.' '.$end_time ) . '
  UID:' . md5( time() ) . '
  DTSTAMP:' . time() . '
  LOCATION:' . addslashes('+'.$_REQUEST['location']) . '
  DESCRIPTION:' . addslashes($_REQUEST['description']) . '
  URL;VALUE=URI:
  SUMMARY:' . addslashes($_REQUEST['summary']) . '
  DTSTART:' . dateToCal( $start_date.' '.$start_time ) . '
  END:VEVENT
  END:VCALENDAR';
//var_dump($ical); exit();
  header('Content-type: text/calendar; charset=utf-8');
	header('Content-Disposition: attachment; filename=azulik-event.ics');
	echo $ical;
  exit();
} else {
  header('Location: /');
  exit();
}*/
?>

<?php
if( isset($_REQUEST) && is_array($_REQUEST) ){
  include 'lib/ics.php';
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
    return date('Ymd\THis', strtotime($time)) . 'Z';
  }

  header('Content-Type: text/calendar; charset=utf-8');
  header('Content-Disposition: attachment; filename=roth-architecture.ics');

  $ics = new ICS(array(
    'location' => '+'.$_REQUEST['location'],
    'description' => strip_tags($_REQUEST['description']),
    'dtstart' => dateToCal( $start_date.' '.$start_time ),
    'dtend' => dateToCal( $start_date.' '.$end_time ),
    'summary' => strip_tags($_REQUEST['summary']),
    //'url' => $_REQUEST['url']
  ));
  echo $ics->to_string();
} else {
  header('Location: ./');
  exit();
}
?>
