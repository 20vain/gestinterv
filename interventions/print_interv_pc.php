<?php include ("../admin/auth_db.php");

$id = htmlentities($_POST["id"]); // Récupération de la dernière fiche de pré-intervention saisie

// Affichage de toutes les interventions
	$interv = "SELECT * FROM tinterventions WHERE id = '$id';" ;
	$Resultat = mysql_query ( $interv )  or  die ( mysql_error() ) ;

while ( ($ligne = mysql_fetch_array($Resultat)) )
	{ 
?>

<body onLoad="window.print()">

	<center><h1>Rapport d'intervention</h1>
	<b><?php echo htmlentities($ligne['intervention']); ?></b>
	</center>
	<hr />
	
	<fieldset><legend><h2>Résultat des analyses</h2></legend>
		<b>Virus</b> = <?php echo htmlentities($ligne['antivirus']); ?> <br />
		<b>Malwares</b> = <?php echo htmlentities($ligne['malwares']); ?> <br />
		<b>Spywares</b> = <?php echo htmlentities($ligne['spybot']); ?>
	</fieldset>
	
	<br />
	
	<fieldset><legend><h2>Installation / Mise à jour logiciels</h2></legend>
		<b>Logiciels</b> : <?php echo htmlentities($ligne['logiciels']); ?><br />
		<b>Système</b> : <?php echo htmlentities($ligne['maj']); ?>
	</fieldset>
	
	<br />
	
	<fieldset><legend><h2>Observations & informations annexes :</h2></legend>
		<?php echo htmlentities($ligne['virus']); ?><br />
		<?php echo htmlentities($ligne['ram']); ?><br />
		<?php echo nl2br(htmlentities($ligne['observations'])); ?><br />
		<?php if ($ligne['prix'] == "59") { echo "<h2>Coût du <u>nettoyage</u> : ".htmlentities($ligne['prix'])." €</h2>"; }
		else if ($ligne['prix'] == "79") { echo "<h2>Coût du <u>formatage</u> : ".htmlentities($ligne['prix'])." €</h2>"; } 
		else { echo "<b><h2>Coût <u>MO Atelier</u></b> : ".htmlentities($ligne['prix'])." €</h2>"; } ?>
		<h2><u>Coûts annexes</u> :<br /> <?php echo nl2br(htmlentities($ligne['coutAnnexe'])); ?></h2>
		<b>Technicien</b> : <?php echo htmlentities($ligne['technicien']); ?><br /><br />
		<?php
		if ( (isset($_POST["orange"]) ) )
<<<<<<< HEAD
		{ $winxp = htmlentities($_POST["orange"]);
=======
		{ $winxp = $_POST["orange"];
>>>>>>> origin/master
		echo "Donner brochure <b>Orange</b><br />" ; }

		if ( (isset($_POST["win7"]) ) )
		{ $win7 = htmlentities($_POST["win7"]); 
		echo "Donner brochure <b>Windows 7</b><br />" ; }

		if ( (isset($_POST["win8"]) ) )
		{ $win8 = htmlentities($_POST["win8"]); 
		echo "Donner brochure <b>Windows 8</b><br />" ; }
		?>
	</fieldset>
<?php
	} // Fin boucle
?>
</body>

<h4><a href="../index.php?p=interv">Retour aux interventions</a></h4>
