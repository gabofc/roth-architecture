<?php
if( isset($_REQUEST) && is_array($_REQUEST) ){
  

  include 'ics.php';

  header('Content-Type: text/calendar; charset=utf-8');
  header('Content-Disposition: attachment; filename=invite.ics');

  $ics = new ICS(array(
    'location' => $_REQUEST['location'],
    'description' => $_REQUEST['description'],
    'dtstart' => $_REQUEST['dtstart'] . ' ' . $_REQUEST['tstart'],
    'summary' => $_REQUEST['summary']
  ));

echo $ics->to_string();


} else {
  header('Location: /');
  exit();
}
?>
