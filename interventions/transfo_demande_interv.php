<?php
$id = htmlentities($_POST["idPreinterv"]); // Code PRE-INTERVENTION
$codeClient = htmlentities($_POST["codeClient"]);

// Affichage de la pré-intervention voulue
	$preInterv = "SELECT * FROM tpreinterv WHERE id='$id';" ;
	$Resultat = mysql_query ( $preInterv ) or die ( mysql_error() ) ;
	
// Affiche du nom à côté de la pré-intervention concernée
	$nom_client = mysql_query ( "SELECT * FROM tclients WHERE id = '$codeClient' ;" ) or die ( mysql_error() ) ;
	$ligne = mysql_fetch_array($nom_client);
?>

<hr />

	<a href="#top" class="btn btn-info" style="position:fixed; margin:5px;"><span class="glyphicon glyphicon-plane"></span><br />Remonter</a>

<center>
	<div class="container">

		<fieldset class="well"><h2>Client [<u><?php echo $ligne['nom'].' '.$ligne['prenom']; ?></u>]</h2>
			<table class="table table-condensed" style="width:500px;">
				<tr>
					<td>Téléphone <u>PORTABLE</u></td>
					<td><b><?php echo $ligne['telPort']; ?></b></td>
				</tr>
				<tr>
					<td>Téléphone <u>FIXE</u></td>
					<td><?php echo $ligne['telFixe']; ?></td>
				</tr>
				<tr>
					<td><u>MAGASIN</u></td>
					<?php
					if ( $ligne['magasin'] == "Saint-James" ) { echo "<td style='background-color:#FF9900'><b>" . htmlentities($ligne['magasin']) . "</b></td>" ; }
					else if ( $ligne['magasin'] == "Avranches" ) { echo "<td><b>" . htmlentities($ligne['magasin']) . "</b></td>" ; }
					?>	
				</tr>
				<tr>
					<td>Adresse postale</td>
					<td><?php echo htmlentities($ligne['adresse']);?></td>
				</tr>
				<?php if ( !empty($ligne["mail"]) ) { ?>
				<tr>
					<td>Adresse e-mail</td>
					<td><em><?php echo htmlentities($ligne['mail']); ?></em></td>
				</tr>
				<?php } // FIN DE CONDITION POUR L'AFFICHAGE DE L'ADRESSE EMAIL ?>
			</table>
		</fieldset>
		
		<table class='table table-bordered'><caption><h3>Rappel - Pré-intervention sélectionnée</h3></caption>
			<tr> <th style='text-align:center; vertical-align:middle;'> Date de<br>RESTITUTION</th> <th style='text-align:center; vertical-align:middle;'> MATERIEL </th> <th style='text-align:center; vertical-align:middle;'> INTERVENTION </th> <th colspan="3" style='text-align:center; vertical-align:middle;'>OBSERVATIONS ET INFORMATIONS COMPLÉMENTAIRES</th> </tr>
			<?php
				while ($preInterv = mysql_fetch_array($Resultat))
				{
					echo "<tr>" ;
					echo "<td style='text-align:center; vertical-align:middle;'><b>" . htmlentities($preInterv['dateRestitution']) . "</b></td>" ;
					echo "<td style='text-align:center; vertical-align:middle;'>" . htmlentities($preInterv['materiel']) . "</td>" ;
					echo "<td style='text-align:center; vertical-align:middle;'><b>" . htmlentities($preInterv['typeInterv']) . "</b></td>" ;
					echo "<td>" . nl2br(htmlentities($preInterv['observations'])) . "</td>" ;
					echo "<td style='text-align:center; vertical-align:middle;'>" . htmlentities($preInterv['dossierMesDocs']) . "</td>" ;
					echo "<td style='text-align:center; vertical-align:middle;'>" . htmlentities($preInterv['dossierClt']) . "</td>" ;
					echo "</tr>" ;

				$materiel = $preInterv['materiel']; // Variable reprenant le nom du matériel pour le switch
			?>	
		</table>

	</div>
</center>

<hr />

<?php
	switch ($materiel) {
	case 'PC FIXE':
		include_once ('interv_pc.php');
	break;
			
	case 'TOUT EN UN':
		include_once ('interv_pc.php');
	break;
				
	case 'PC PORTABLE':
		include_once ('interv_pc.php');
	break;
				
	case 'NETBOOK':
		include_once ('interv_pc.php');
	break;
			
	case 'PC HYBRIDE':
		include_once ('interv_pc.php');
	break;
					
	case 'IMPRIMANTE':
		include_once ('interv_periph.php');
	break;
					
	case 'PERIPHERIQUE':
		include_once ('interv_periph.php');
	break;
					
	case 'TABLETTE TACTILE':
		include_once ('interv_periph.php');
	break;
		
	case 'AUTRE':
		include_once ('interv_periph.php');
	break;
	}
				}
?>

<br />