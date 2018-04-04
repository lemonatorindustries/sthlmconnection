<?php

/* JJE, 2018 04 04
** Ärendedetaljer
*/

date_default_timezone_set("Europe/Stockholm");

// Report all errors
error_reporting(E_ALL);

//Instansiera DB-fråge-klassen
require_once('class.dbQueries_sthlm.php');
$dbQueriesSthlm = new dbQueriesSthlm();

//Hämta vilket ärendenummer det gäller...
$ticket_info_id = $_GET['ticket_info_id'];

if(isset($_POST['btn_save']) && $_POST['btn_save'] == 'Spara' && isset($_POST['ticket_info_id']))
{
		$ticket_info = $_POST;
		$UpdateTicketInfo_result = $dbQueriesSthlm->UpdateTicketInfo($ticket_info);
		$UpdateTicketReporterLastUpdated_result = $dbQueriesSthlm->UpdateTicketReporterLastUpdated($ticket_info_id);
		//print_r($UpdateTicketInfo_result);
}


//Hämta från DB!
$GetTicketInfo_result = $dbQueriesSthlm->GetTicketInfo($ticket_info_id);

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Edit ticket</title>
</head>

<body>
<h1>Ticket details</h1>

<form action="" method="post">
  <fieldset>
    <legend>Ticket Event 1</legend>
    Ticket Id: <?php echo $GetTicketInfo_result[0]['ticket_info_id'] ?><br>    
    <input type="hidden" name="ticket_info_id" value="<?php echo $GetTicketInfo_result[0]['ticket_info_id'] ?>"><br>
    Ticket Description: <br>
    <textarea rows="5" cols="60" name="ticket_description"><?php echo $GetTicketInfo_result[0]['ticket_description'] ?></textarea><br>
    Ticket Status: <br>    
    <input type="text" size="10" name="ticket_status" value="<?php echo $GetTicketInfo_result[0]['ticket_status'] ?>"><br>   
    Ticket Assignee: <br>    
    <input type="text" size="10" name="ticket_assignee" value="<?php echo $GetTicketInfo_result[0]['ticket_assignee'] ?>"><br>
    Ticket Action: <br>    
    <input type="text" size="10" name="ticket_action" value="<?php echo $GetTicketInfo_result[0]['ticket_action'] ?>"><br>
    Ticket to be Escalated to assignee: <br>    
    <input type="text" size="10" name="ticket_need_escalation" value="<?php echo $GetTicketInfo_result[0]['ticket_need_escalation'] ?>"><br>
    
    <br><input type="submit" name="btn_save" id="btn_save" value="Spara" >
    <br><a href="edit_ticket_reporters_sthlm.php">Back to tickets overview</a>
  </fieldset>
  
    <fieldset>
    <legend>Ticket event 2</legend>
    Ticket Id: <?php echo $GetTicketInfo_result[0]['ticket_info_id'] ?><br>    
    <input type="hidden" name="ticket_info_id_1" value="<?php echo $GetTicketInfo_result[0]['ticket_info_id'] ?>"><br>
    Ticket Description: <br>
    <textarea rows="5" cols="60" name="ticket_description_1">Curabitur non nisl id nibh tincidunt cursus. Nunc mollis diam et lorem dapibus varius. Sed libero est, pretium sit amet porta ac, porta quis leo. </textarea><br>
    Ticket Status: <br>    
    <input type="text" size="10" name="ticket_status_1" value="assigned to XXX"><br>
    Ticket Assignee: <br>    
    <input type="text" size="10" name="ticket_assignee_1" value="Jens"><br>
    Ticket Action: <br>    
    <input type="text" size="10" name="ticket_action_1" value="Not solvable"><br>
    Ticket to be Escalated: <br>    
    <input type="text" size="10" name="ticket_need_escalation_1" value="<?php echo $GetTicketInfo_result[0]['ticket_need_escalation'] ?>"><br>
    
    <br><input type="submit" name="btn_save_1" id="btn_save" value="Spara" >
    <br><a href="edit_ticket_reporters_sthlm.php">Back to tickets overview</a>
  </fieldset>
</form> 


</body>
</html>