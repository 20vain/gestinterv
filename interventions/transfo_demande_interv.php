<?php
$id = $_POST["idPreinterv"]; // Code PRE-INTERVENTION
$codeClient = $_POST["codeClient"];

// Affichage de la pré-intervention voulue
	$preInterv = "SELECT * FROM tpreinterv WHERE id='$id';" ;
	$Resultat = mysql_query ( $preInterv ) or die ( mysql_error() ) ;
	
// Affiche du nom à côté de la pré-intervention concernée
	$nom_client = mysql_query ( "SELECT tclients.* FROM tclients WHERE tclients.id = '$codeClient' ;" ) or die ( mysql_error() ) ;
	$ligne = mysql_fetch_array($nom_client);
	echo "<head> <title>[".$ligne['nom']."] - Intervention</title> </head>";
?>
<center>
<div class="container">

	<fieldset class="well"><h2>Client "<?php echo $ligne['nom'].' '.$ligne['prenom']; ?>"</h2>
	Téléphone <u>PORTABLE</u> = <b><?php echo $ligne['telPort']."</b> <br />Téléphone <u>FIXE</u> = <b>".$ligne['telFixe']; ?></b><br />
	<?php if ( !empty($ligne["mail"]) ) { echo "Adresse e-mail =  <em>".$ligne['mail']."</em><br />"; } ?>
	Adresse postale = <?php echo $ligne['adresse'];?>
	</fieldset>
	
<table class='table table-bordered table-condensed'><caption><h3>Rappel - Pré-intervention sélectionnée</h3></caption>
	<tr> <th> Date de<br>RESTITUTION </th> <th> MATERIEL </th> <th> INTERVENTION </th> <th>OBSERVATIONS</th> <th colspan="2">SAUVEGARDE DOCS CLIENTS</th> </tr>
	<?php
		while ($preInterv = mysql_fetch_array($Resultat))
		{ // Reprise de toutes les infos de la pré-intervention
			echo "<tr>" ;
			echo "<td align=center><b>" . $preInterv['dateRestitution'] . "</b></td>" ;
			echo "<td align=center>" . $preInterv['materiel'] . "</td>" ;
			echo "<td align=center>" . $preInterv['typeInterv'] . "</td>" ;
			echo "<td align=center>" . nl2br($preInterv['observations']) . "</td>" ;
			echo "<td align=center>" . $preInterv['dossierMesDocs'] . "</td>" ;
			echo "<td align=center>" . $preInterv['dossierClt'] . "</td>" ;
			echo "</tr>" ;

		$materiel = $preInterv['materiel']; // Variable reprenant le nom du matériel pour le switch
	?>	
</table>

</center>
</div>

<?php
		switch ($materiel) { // Selon le matériel qui a été sélectionné, la page ne sera pas la même.
			case 'PC FIXE':
			include ('interv_pc.php'); // Page complète (logiciels, virus, obs...)
			break;
			
			case 'TOUT EN UN':
			include ('interv_pc.php'); // Page complète (logiciels, virus, obs...)
			break;
			
			case 'PC PORTABLE':
			include ('interv_pc.php'); // Page complète (logiciels, virus, obs...)
			break;
			
			case 'NETBOOK':
			include ('interv_pc.php'); // Page complète (logiciels, virus, obs...)
			break;
			
			case 'PC HYBRIDE':
			include ('interv_pc.php'); // Page complète (logiciels, virus, obs...)
			break;

			case 'IMPRIMANTE':
			include ('peripheriques.php'); // Page personnalisée (Observations, technicien)
			break;

			case 'PERIPHERIQUE':
			include ('peripheriques.php'); // Page personnalisée (Observations, technicien)
			break;

			case 'TABLETTE TACTILE':
			include ('peripheriques.php'); // Page personnalisée (Observations, technicien)
			break;

			case 'AUTRES':
			include ('peripheriques.php'); // Page personnalisée (Observations, technicien)
			break;

		} // FIN - Reprise de toutes les infos de la pré-intervention
	}
?>

<br />