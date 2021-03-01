<?php
// I know there are probably better ways to do this, but this accomplishes what I needed it to do.

// Fetch vars. In this case, they're being pulled via the URL.
$event = array(
	'id' => date("YmdHis"),
	'title' => $_REQUEST['summary'],
	'description' => $_REQUEST['description'],
	'datestart' => $_REQUEST['date_start'],
	'dateend' => $_REQUEST['date_end'],
	'address' => '+'.$_REQUEST['location']
);

// Convert times to iCalendar format. They require a block for yyyymmdd and then another block
// for the time, which is in hhiiss. Both of those blocks are separated by a "T". The Z is
// declared at the end for UTC time, but shouldn't be included in the date conversion.

// iCal date format: yyyymmddThhiissZ
// PHP equiv format: Ymd\This

function dateToCal($time) {
	return date('Ymd\This', $time) . 'Z';
}

// Build the ics file
$ical = 'BEGIN:VCALENDAR
VERSION:2.0
PRODID:-//hacksw/handcal//NONSGML v1.0//EN
CALSCALE:GREGORIAN
BEGIN:VEVENT
DTEND:' . dateToCal($event['dateend']) . '
UID:' . md5($event['title']) . '
DTSTAMP:' . time() . '
LOCATION:' . addslashes($event['location']) . '
DESCRIPTION:' . addslashes($event['description']) . '
URL;VALUE=URI: 
SUMMARY:' . addslashes($event['title']) . '
DTSTART:' . dateToCal($event['datestart']) . '
END:VEVENT
END:VCALENDAR';

//set correct content-type-header
if($event['id']){
	header('Content-type: text/calendar; charset=utf-8');
	header('Content-Disposition: attachment; filename=mohawk-event.ics');
	echo $ical;
} else {
	// If $id isn't set, then kick the user back to home. Do not pass go,
        // and do not collect $200. Currently it's _very_ slow.
	header('Location: /');
}
?>
<?php
/*if( isset($_REQUEST) && is_array($_REQUEST) ){
  include 'lib/ics.php';

  header('Content-Type: text/calendar; charset=utf-8');
  header('Content-Disposition: attachment; filename=roth-architecture.ics');

  $ics = new ICS(array(
    'location' => '+'.$_REQUEST['location'],
    'description' => $_REQUEST['description'],
    'dtstart' => $_REQUEST['date_start'],
    //'dtend' => $_REQUEST['date_end'],
    'summary' => $_REQUEST['summary'],
    //'url' => $_REQUEST['url']
  ));

  echo $ics->to_string();
} else {
  header('Location: ./');
  exit();
}*/
?>
