<?php
// Nombre de clients
	$sql1 = mysql_query ( "SELECT COUNT(*) AS CLIENTS FROM tclients ;" ) or die ( mysql_error() ) ;
	$r1 = mysql_fetch_array($sql1); // NB CLIENTS

// Nombre de demandes d'intervention
	$sql2 = mysql_query ( "SELECT COUNT(*) AS NB_DEMANDE_INTERV FROM tpreinterv ;" ) or die ( mysql_error() ) ;
	$r2 = mysql_fetch_array($sql2); // NB DEMANDES INTERVENTION
	
// Nombre de demandes d'intervention
	$sql3 = mysql_query ( "SELECT COUNT(*) AS NB_INTERV FROM tinterventions ;" ) or die ( mysql_error() ) ;
	$r3 = mysql_fetch_array($sql3); // NB DEMANDES INTERVENTION

?>

<h1>Statistiques</h1>
Nombre total de clients : <b><?php echo $r1["CLIENTS"]; ?></b> <br />
Nombre total de demandes : <b><?php echo $r2["NB_DEMANDE_INTERV"]; ?></b> <br />
Nombre total d'interventions : <b><?php echo $r3["NB_INTERV"]; ?></b> <br />

<br /> <br />