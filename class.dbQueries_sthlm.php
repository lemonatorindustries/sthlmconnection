<?php

/* JJE, 2018 04 04
** Databasfrågor som instanserbar klass.
*/



date_default_timezone_set("Europe/Stockholm");
//error_reporting(E_ERROR | E_WARNING | E_PARSE);

require_once('dbConnector_sthlm.php');

class dbQueriesSthlm
{
	//Hämta alla ärendenummer som ej har ärendestatus "closed"
	function GetTicketReporters()
	{
		# Öppna _sys DB connection!
		$DBH = db_connect_sthlm();
		
		$sql= "SELECT * FROM ticket_reporters WHERE NOT ticket_status = 'closed' ORDER BY ticket_created_datetime DESC";
		
		$STH = $DBH->prepare($sql);
		$STH->execute();
		$result = $STH->fetchAll(PDO::FETCH_ASSOC);
				
		return $result;	
	}

	//Skapar ett ordernummer
	function CreateTicket($callData)
	{
		$datetime		= date("Y-m-d H:i:s");
		$ticket_reporter_phone = $callData['phonenumber'];
		$ticket_info_id = rand(100000,999999);
		
		# Öppna DB connection!
		$DBH = db_connect_sthlm();
		
		
	# 1. Create row in ticket_reporters with random ticket number
		$sql_1 = "INSERT INTO ticket_reporters 
				(ticket_reporter_phone, ticket_created_datetime, ticket_info_id)
				VALUES
				(:ticket_reporter_phone, :datetime, :ticket_info_id)";
		
		#prepare
		$STH_1 = $DBH->prepare($sql_1);	
		
		# Bind
		$STH_1->bindParam(':ticket_reporter_phone', $ticket_reporter_phone);
		$STH_1->bindParam(':datetime', $datetime);
		$STH_1->bindParam(':ticket_info_id', $ticket_info_id);

		# Execute
		$STH_1->execute();
		
	# 2.
		//Insert "ticket_info_id" to "ticket_info_table" to connect the ticket in the two tables.
		$sql_2 = "INSERT INTO ticket_info 
				(ticket_info_id)
				VALUES
				(:ticket_info_id)";
		
		$STH_2 = $DBH->prepare($sql_2);	
		
		# Bind
		$STH_2->bindParam(':ticket_info_id', $ticket_info_id);
		
		# Execute	
		$STH_2->execute();
			
		return $STH_2->rowCount();	
	}
	
	//Uppdatera ett ärende
	function UpdateTicket($ticket_data)
	{
		$DBH = db_connect_sthlm();	
				
		$sql = "UPDATE ticket_reporters SET 
			ticket_reporter_name=:ticket_reporter_name, 
			ticket_reporter_phone=:ticket_reporter_phone, 
			ticket_reporter_email=:ticket_reporter_email,
			ticket_last_updated_datetime=:ticket_last_updated_datetime,
			ticket_status=:ticket_status
			WHERE ticket_info_id=:ticket_info_id";
		
		$STH = $DBH->prepare($sql);	
			
		# Bind
		$STH->bindParam(':ticket_reporter_name', $ticket_data['ticket_reporter_name']);
		$STH->bindParam(':ticket_reporter_phone', $ticket_data['ticket_reporter_phone']);
		$STH->bindParam(':ticket_reporter_email', $ticket_data['ticket_reporter_email']);
		$STH->bindParam(':ticket_last_updated_datetime', date("Y-m-d H:i:s"));
		$STH->bindParam(':ticket_info_id', $ticket_data['ticket_info_id']);
		$STH->bindParam(':ticket_status', $ticket_data['ticket_status']);

		#Execute!		
		$STH->execute();
		return $STH->rowCount();
	}
	
	//Hämta ärendeinformation
	function GetTicketInfo($ticket_info_id)
	{
		$DBH = db_connect_sthlm();
		
		$sql= "SELECT * FROM ticket_info where ticket_info_id = $ticket_info_id";
		
		$STH = $DBH->prepare($sql);
		$STH->execute();
		$result = $STH->fetchAll(PDO::FETCH_ASSOC);
				
		return $result;	
	}


	//Uppdatera ärendedetaljer för ett ärende
	function UpdateTicketInfo($ticket_info)
	{
		$DBH = db_connect_sthlm();	
				
		$sql = "UPDATE ticket_info SET 
			ticket_description=:ticket_description, 
			ticket_status=:ticket_status, 
			ticket_assignee=:ticket_assignee,
			ticket_action=:ticket_action,
			ticket_need_escalation=:ticket_need_escalation
			WHERE ticket_info_id=:ticket_info_id";
		
		$STH = $DBH->prepare($sql);	
			
		# Bind
		$STH->bindParam(':ticket_description', $ticket_info['ticket_description']);
		$STH->bindParam(':ticket_status', $ticket_info['ticket_status']);
		$STH->bindParam(':ticket_assignee', $ticket_info['ticket_assignee']);
		$STH->bindParam(':ticket_action', $ticket_info['ticket_action']);
		$STH->bindParam(':ticket_need_escalation', $ticket_info['ticket_need_escalation']);
		$STH->bindParam(':ticket_info_id', $ticket_info['ticket_info_id']);
		
		#Execute!		
		$STH->execute();
		return $STH->rowCount();
	}
	
	//Uppdatera ett ärendehuvudets senast uppdaterad, om ärendedetaljer har uppdaterats
	function UpdateTicketReporterLastUpdated($ticket_info_id)
	{
		$datetime		= date("Y-m-d H:i:s");
		
		$DBH = db_connect_sthlm();	
				
		$sql = "UPDATE ticket_reporters SET 
			ticket_last_updated_datetime=:ticket_last_updated_datetime
			WHERE ticket_info_id=:ticket_info_id";
		
		$STH = $DBH->prepare($sql);	
			
		# Bind
		$STH->bindParam(':ticket_last_updated_datetime', $datetime);
		$STH->bindParam(':ticket_info_id', $ticket_info_id);
		
		#Execute!		
		$STH->execute();
		return $STH->rowCount();
	}
}
?>
