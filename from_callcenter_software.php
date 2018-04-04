<?php

/* JJE 2018 04 04
** Simulerar att Call center mjukvaran automatiskt skapar ett nytt ärendenummer vid inringing.
** TEST skapar ärendenummer 777778 : http://79.99.3.15/tmp/sthlmconnection/from_callcenter_software.php?777778
** Suportpersonalen fyller sen i manuellt, namn, tel, mail påärendehuvudet och fyller i detaljer om ärendet under "Edit ticket"
*/



date_default_timezone_set("Europe/Stockholm");

// Report all errors
error_reporting(E_ALL);

//Instansiera DB-fråge-klassen
require_once('class.dbQueries_sthlm.php');
$dbQueriesSthlm = new dbQueriesSthlm();

// Calldata from Callcenter Software by GET over SSL 
// i.e phonenumber
$callData['phonenumber'] = $_SERVER['QUERY_STRING'];

// INSERT and create new Ticket
$CreateTicket_result = $dbQueriesSthlm->CreateTicket($callData);
echo "Ticked created: { " . $CreateTicket_result . " } with number: " . $callData['phonenumber'] ;
echo "<br><br>Thank you!";

?>