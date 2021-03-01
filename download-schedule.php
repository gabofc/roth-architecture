<?php
if( isset($_REQUEST) && is_array($_REQUEST) ){
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
}
?>
