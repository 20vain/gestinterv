<?php
// ID Intervention
$id = $_POST["id"];
$codeClient = $_POST["codeClient"];
	
// Affichage du client à modifier à partir de son code client
$interv = mysql_query ( "SELECT * FROM tinterventions WHERE id='$id';" ) or die ( mysql_error() );
$ligne = mysql_fetch_array($interv);
$materiel = $ligne["materiel"];

// Affiche du nom dans l'onglet de la fiche
	$nom_client = mysql_query ( "SELECT * FROM tclients WHERE id = '$codeClient' ;" ) or die ( mysql_error() ) ;
	$ligne1 = mysql_fetch_array($nom_client);

switch ($materiel) { // Selon le matériel qui a été sélectionné, la page ne sera pas la même.
	case "PC FIXE":
		include ("modif_pc.php"); // Page complète (logiciels, virus, obs...)
	break;

	case "TOUT EN UN":
		include ("modif_pc.php"); // Page complète (logiciels, virus, obs...)
	break;
	
	case "PC PORTABLE":
		include ("modif_pc.php"); // Page complète (logiciels, virus, obs...)
	break;
	
	case "NETBOOK":
		include ("modif_pc.php"); // Page complète (logiciels, virus, obs...)
	break;

	case "PC HYBRIDE":
		include ("modif_pc.php"); // Page complète (logiciels, virus, obs...)
	break;
	
	case "IMPRIMANTE":
		include ("modif_periph.php"); // Page personnalisée (Observations, technicien)
	break;

	case "PERIPHERIQUE":
		include ("modif_periph.php"); // Page personnalisée (Observations, technicien)
	break;

	case "TABLETTE TACTILE":
		include ("modif_periph.php"); // Page personnalisée (Observations, technicien)
	break;

	case "AUTRES":
		include ("modif_periph.php"); // Page personnalisée (Observations, technicien)
	break;
}
?>