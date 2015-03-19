<?php include ("../admin/auth_db.php");

$id = $_POST["id"]; // Récupération de la dernière fiche de pré-intervention saisie

// Affichage de toutes les interventions
	$interv = "SELECT * FROM tinterventions WHERE id = '$id';" ;
	$Resultat = mysql_query ( $interv )  or  die ( mysql_error() ) ;

while ( ($ligne = mysql_fetch_array($Resultat)) )
	{ 
?>

<body onLoad="window.print()">

	<center><h1>Rapport d'intervention</h1>
	<b><?php echo $ligne['intervention']; ?></b>
	</center>
	<hr />
	
	<fieldset><legend><h2>Observations & informations annexes :</h2></legend>
		<?php echo nl2br($ligne['observations']); ?><br />
		<?php echo "<b><h2>Coût <u>MO Atelier</u></b> : ".$ligne['prix']." €</h2>"; ?>
		<h2><u>Coûts annexes</u> :<br /> <?php echo nl2br($ligne['coutAnnexe']); ?></h2>
		<b>Technicien</b> : <?php echo $ligne['technicien']; ?><br /><br />
	</fieldset>
<?php
	} // Fin boucle
?>
</body>

<h4><a href="../index.php?p=interv">Retour aux interventions</a></h4>
