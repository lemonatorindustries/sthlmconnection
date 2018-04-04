<?php

/* JJE, 2018 04 04
** Ärendeöversikt!
*/

date_default_timezone_set("Europe/Stockholm");

// Report all errors
error_reporting(E_ALL);

//Instansiera DB-fråge-klassen
require_once('class.dbQueries_sthlm.php');
$dbQueriesSthlm = new dbQueriesSthlm();

## UPDATE Ticket Reporters

//DUMMYDATA. Skall bytas ut mot funktioner för formulärdata!
/*
$ticket_data['ticket_reporter_name'] = "Anna i Skogen";
$ticket_data['ticket_reporter_phone'] = "34167";
$ticket_data['ticket_reporter_email'] = "jens@lemonator.se";
$ticket_data['ticket_info_id'] = "3";
$ticket_data['ticket_status'] = "in_progress";
*/





$UpdateTicket_result = $dbQueriesSthlm->UpdateTicket($ticket_data);

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Tickets overview</title>
</head>

<body>
<form action="" method="post">
<h1>Open Tickets</h1>
<?php 

	$GetTicketReporters_result = $dbQueriesSthlm->GetTicketReporters();
	foreach ($GetTicketReporters_result as $ticketReporter) : 
?>
  <fieldset>
    <legend>Ticket ID: <?= $ticketReporter['ticket_info_id'] ?>:</legend>
        <tr>
        	<input type="hidden" name="ticket_info_id" value="<?= $ticketReporter['ticket_info_id'] ?>">
            <input type="hidden" name="ticket_created_datetime" value="<?= $ticketReporter['ticket_created_datetime'] ?>">
            <input type="hidden" name="ticket_last_updated_datetime" value="<?= $ticketReporter['ticket_last_updated_datetime'] ?>">
            
            
        	Phone: <input type="text" name="ticket_reporter_phone" value="<?= $ticketReporter['ticket_reporter_phone'] ?>">
            <br>
            Reporter Name: <input type="text" name="ticket_reporter_name" value="<?= $ticketReporter['ticket_reporter_name'] ?>">
            <br>
            Reporter Email: <input type="text" name="ticket_reporter_email" value="<?= $ticketReporter['ticket_reporter_email'] ?>">

            <br>
            Ticket status: <input type="text" name="ticket_status" value="<?= $ticketReporter['ticket_status'] ?>">
            <br>
            Created: <?= $ticketReporter['ticket_created_datetime'] ?>    
            <br>
            Last updated: <?= $ticketReporter['ticket_last_updated_datetime'] ?>         
            <br>
            <br>
            <!--input type="submit" name="btn_save" id="btn_save" value="Spara" -->
        	<a href="edit_ticket_info_sthlm.php?ticket_info_id=<?= $ticketReporter['ticket_info_id'] ?>">Edit ticket details</a>
        </tr>
  </fieldset>
<?php endforeach ?>
</form>


</body>
</html>