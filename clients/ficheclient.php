<?php
// SUPPRESSION DEMANDE
	if ( (!empty($_POST)) && (isset($_POST["delete"])) && ($_POST["delete"]=="3") )
	{
		$id = $_POST["id"];	
		delete($id,"tpreinterv");
	}
?>

<?php
	// Récupération du code Client (grace à la redirection)
	$codeClient = $_POST["codeClient"];

	// Affichage du client à modifier à partir de son code client
	$req = mysql_query ( "SELECT * FROM tclients WHERE id='$codeClient';" ) or die ( mysql_error() ) ;
	$ligne = mysql_fetch_array($req) ;
	
	// Affichage des interventions effectuées du client
	$req1 = mysql_query ( "SELECT * FROM tinterventions WHERE codeClient='$codeClient';" ) or die ( mysql_error() ) ;
	$req2 = mysql_query ( "SELECT * FROM tpreinterv WHERE codeClient='$codeClient';" ) or die ( mysql_error() ) ;

?>

<div class="container">

<center><table class="table-condensed">
	<tr>
		<td>
			<center><h2>Fiche client n°<?php echo $ligne["id"]; ?><br />
			<b>[<?php echo $ligne["nom"].' '.$ligne["prenom"];?>]</b></h2></center>
		</td>
		<td>&nbsp;</td>
		<td>
			<form action="index.php?p=modifclient" method='POST'> <input type='hidden' name='codeClient' value="<?php echo $ligne["id"]; ?>" /> <center><button class='btn btn-warning'><span class='glyphicon glyphicon-pencil' aria-hidden='true'></span><br />Modifier <br />fiche client</button></center> </form>
		</td>
	</tr>
</table></center>

<table class="table table-striped">
	<tr>
		<td colspan="2"> <b>NOM / Prénom</b>
			<div class="input-group">
				<span class="input-group-addon glyphicon glyphicon-user"></span>
				<input type="text" class="form-control" name="prenom" maxlength="50" placeholder="<?php echo $ligne["nom"].' '.$ligne["prenom"];?>" disabled />
			</div>
		</td>
		<td> <b>N° DE TÉLÉPHONES</b>
			<div class="input-group">
				<span class="input-group-addon glyphicon glyphicon-phone"></span>
				<input type="text" class="form-control" name="telPort" maxlength="10" placeholder="<?php echo $ligne["telPort"];?>" disabled />
				<span class="input-group-addon glyphicon glyphicon-phone-alt"></span>
				<input type="text" class="form-control" name="telFixe" maxlength="10" placeholder="<?php echo $ligne["telFixe"];?>" disabled />
			</div>
		</td>
	</tr>
	
	<tr>
		<td colspan="3"> <b>ADRESSES POSTALE & E-MAIL</b>
			<div class="input-group">
				<span class="input-group-addon glyphicon glyphicon-envelope"></span>
				<input type="text" class="form-control" name="adresse" maxlength="10" placeholder="<?php echo $ligne["adresse"];?>" disabled />
				<span class="input-group-addon glyphicon glyphicon-send"></span>
				<input type="text" class="form-control" name="mail" maxlength="50" placeholder="<?php echo $ligne["mail"];?>" disabled />
			</div>
		</td>
		<td>&nbsp;</td>
	</tr>
	
	<tr>
		<td colspan="2"> <b>Magasin</b>
			<div class="input-group">
				<span class="input-group-addon glyphicon glyphicon-briefcase"></span>
				<input type="text" class="form-control" placeholder="<?php echo $ligne["magasin"];?>" disabled />
			</div>
		</td>
		<td>
			Le client est-il un professionnel ? Si oui, la case ci-dessous est cochée :<br />
			<div class="input-group">
				<span class="input-group-addon">
					<?php
					if ($ligne["pro"] == "1")
					{ echo '<input type="checkbox" class="form-control" name="pro" value="1" checked disabled />'; }
					else { echo '<input type="checkbox" class="form-control" name="pro" value="1" disabled />'; } ?>
				</span>
				<input type="text" class="form-control" placeholder="Client professionnel" disabled />
			</div>
		</td>
	</tr>
</table>

<hr />

<table class="table"><legend><h3>Récapitulatif des <u>demandes en cours</u></h3></legend>
<tr> <th> DATE de RESTITUTION </th> <th>MATERIEL</th> <th>Type d'INTERVENTION</th> <th>OBSERVATIONS</th> <th colspan="2">SAUVEGARDE</th> <th colspan="3">OPÉRATIONS</th> </tr>
<?php
	while (  ($ligne2 = mysql_fetch_array($req2) ) )
	{
		echo "<tr>" ;
		echo "<td style='text-align:center; vertical-align:middle;'><b>" . $ligne2['dateRestitution'] . "</b></td>" ;	
		
		// Type de matériel -- COLORISATION
		if ( $ligne2['materiel'] == "PC FIXE" ) { echo "<td style='background-color:#FFFF71; text-align:center; vertical-align:middle;'><b>" . $ligne2['materiel'] . "</b></td>" ; }
		else if ( $ligne2['materiel'] == "PC PORTABLE" ) { echo "<td style='background-color:#FFCCCC; text-align:center; vertical-align:middle;'><b>" . $ligne2['materiel'] . "</b></td>" ; }
		else { echo "<td style='text-align:center; vertical-align:middle;'><b>" . $ligne2['materiel'] . "</b></td>" ; }
		
		// Type d'intervention -- COLORISATION
		if ( $ligne2['typeInterv'] == "NETTOYAGE" ) { echo "<td style='background-color:#5797DB; text-align:center; vertical-align:middle;'><b>" . $ligne2['typeInterv'] . "</b></td>" ; }
		else if ( $ligne2['typeInterv'] == "FORMATAGE" ) { echo "<td style='background-color:#333333; color:#FFFFFF; text-align:center; vertical-align:middle;'><b>" . $ligne2['typeInterv'] . "</b></td>" ; }
		else if ( ( $ligne2['typeInterv'] == "AUTRES / DIVERS" ) OR ( $ligne2['typeInterv'] == "MO ATELIER" ) ) { echo "<td style='background-color:#87D86E; text-align:center; vertical-align:middle;'><b>" . $ligne2['typeInterv'] . "</b></td>" ; }
		else { echo "<td style='text-align:center; vertical-align:middle;'><b>" . $ligne2['typeInterv'] . "</b></td>" ; }
		
		echo "<td style='text-align:justify; vertical-align:middle;'>" . nl2br($ligne2['observations']) . "</td>" ;
		
		// Sauvegarde des docs -- COLORISATION
		if ( $ligne2['dossierMesDocs'] == "Sauvegarde du dossier Mes Documents et Bureau" ) { echo "<td style='background-color:#E03C3C; text-align:center; vertical-align:middle;'><b>" . $ligne2['dossierMesDocs'] . "</b></td>" ; }
		else { echo "<td style='text-align:center; vertical-align:middle;'>" . $ligne2['dossierMesDocs'] . "</td>" ; }
		if ( $ligne2['dossierClt'] != "" ) { echo "<td style='background-color:#E03C3C; text-align:center; vertical-align:middle;'>" . $ligne2['dossierClt'] . "</td>" ; }
		else { echo "<td style='text-align:center; vertical-align:middle;'>" . $ligne2['dossierClt'] . "</td>" ; }
	
		echo "<td style='text-align:center; vertical-align:middle;'><form action='index.php?p=interv-preinterv' method='POST'> <input type='hidden' name='id' value='".$ligne2["id"]."' /> <input type='hidden' name='codeClient' value='" . $codeClient . "'> <button class='btn btn-success'>Effectuer l'intervention</button> </form></td>
		<td style='text-align:center; vertical-align:middle;'><form action='preintervention/print_preinterv.php' method='POST'> <input type='hidden' name='id' value='" . $ligne2["id"] . "'> <input type='hidden' name='codeClient' value='" . $codeClient . "'> <button class='btn btn-info'>Imprimer</button> </form></td>
		<td style='text-align:center; vertical-align:middle;'> <form action='#' method='POST'> <input type='hidden' name='id' value='".$ligne2["id"]."' /> <input type='hidden' name='codeClient' value='".$codeClient."' /> <input type='hidden' name='delete' value='3' /> <button class='btn btn-danger';>Supprimer</button> </form></td>";
		echo "</tr>" ;
	}
?>
</table>

<form action="index.php?p=ajoutdemande" method='POST'> <input type='hidden' name='codeClient' value="<?php echo $ligne["id"]; ?>" /> <input type='hidden' name='ficheClient' value='1' /> <center><button class='btn btn-success'><span class='glyphicon glyphicon-pencil' aria-hidden='true'></span><br />Ajouter une demande<br />d'intervention</button></center> </form>

<hr />

<table class="table"><legend><h3>Récapitulatif des interventions <u>déjà effectuées</u></h3></legend>
<tr> <th>Date de la DEMANDE</th> <th> Matériel </th> <th>Type d'intervention</th> <th>OBSERVATIONS</th> <th>PRIX</th> <th>TECHNICIEN</th> <th colspan="3">ADMINISTRATION</th> </tr>
<?php
	while (  ($ligne1 = mysql_fetch_array($req1) ) )
	{
		$materiel = $ligne1['materiel'];
		
	// Afficher une ligne du tableau HTML pour chaque enregistrement de la table 
		echo "<tr>" ;
		
		echo "<td style='text-align:center;'><b>" . $ligne1['dateInterv'] 	. "</b></td>" ;
		
		// Type de matériel -- COLORISATION
		if ( $ligne1['materiel'] == "PC FIXE" ) { echo "<td style='background-color:#FFFF71; text-align:center; vertical-align:middle;'><b>" . $ligne1['materiel'] . "</b></td>" ; }
		else if ( $ligne1['materiel'] == "PC PORTABLE" ) { echo "<td style='background-color:#FFCCCC; text-align:center; vertical-align:middle;'><b>" . $ligne1['materiel'] . "</b></td>" ; }
		else { echo "<td style='text-align:center; vertical-align:middle;'><b>" . $ligne1['materiel'] . "</b></td>" ; }
		
		// Type d'intervention -- COLORISATION
		if ( $ligne1['intervention'] == "NETTOYAGE" ) { echo "<td style='background-color:#5797DB; text-align:center; vertical-align:middle;'><b>" . $ligne1['intervention'] . "</b></td>" ; }
		else if ( $ligne1['intervention'] == "FORMATAGE" ) { echo "<td style='background-color:#333333; color:#FFFFFF; text-align:center; vertical-align:middle;'><b>" . $ligne1['intervention'] . "</b></td>" ; }
		else if ( ( $ligne1['intervention'] == "AUTRES / DIVERS" ) OR ( $ligne1['intervention'] == "MO ATELIER" ) ) { echo "<td style='background-color:#87D86E; text-align:center; vertical-align:middle;'><b>" . $ligne1['intervention'] . "</b></td>" ; }
		else { echo "<td style='text-align:center; vertical-align:middle;'><b>" . $ligne1['intervention'] . "</b></td>" ; }
		
		echo "<td style='text-align:justify;'>" . $ligne1['observations'] . "</td>" ;

		echo "<td style='text-align:center;'>" . $ligne1['prix'] . " €</td>" ;
		echo "<td style='text-align:center;'>" . $ligne1['technicien'] . "</td>" ;
		echo "<td style='text-align:center;'> <form action='index.php?p=modifinterv' method='post'> <input type='hidden' name='id' value='" . $ligne1["id"] . "'> <input type='hidden' name='codeClient' value='" . $ligne["id"] . "'> <button class='btn btn-primary'><i class='icon-pencil icon-white'></i> Modification intervention</button> </form></td>";

		switch ($materiel) { // Selon le matériel qui a été sélectionné, la page ne sera pas la même.
			case 'PC FIXE':
			echo "<td> <form action='intervention/imprimer-intervention-pc.php' method='POST'> <input type='hidden' name='id' value='" . $ligne1["id"] . "'> <input type='hidden' name='codeClient' value='" . $ligne["id"] . "'> <button class='btn btn-info'><i class='icon-print icon-white'></i> Affichage & Impression</button> </form></td>";
			break;

			case 'PC PORTABLE':
			echo "<td> <form action='intervention/imprimer-intervention-pc.php' method='POST'> <input type='hidden' name='id' value='" . $ligne1["id"] . "'> <input type='hidden' name='codeClient' value='" . $ligne["id"] . "'> <button class='btn btn-info'><i class='icon-print icon-white'></i> Affichage & Impression</button> </form></td>";
			break;

			case 'IMPRIMANTE':
			echo "<td> <form action='intervention/imprimer-intervention-peripheriques.php' method='POST'> <input type='hidden' name='id' value='" . $ligne1["id"] . "'> <input type='hidden' name='codeClient' value='" . $ligne["id"] . "'> <button class='btn btn-info'><i class='icon-print icon-white'></i> Affichage & Impression</button> </form></td>";
			break;
			
			case 'TABLETTE TACTILE':
			echo "<td> <form action='intervention/imprimer-intervention-peripheriques.php' method='POST'> <input type='hidden' name='id' value='" . $ligne1["id"] . "'> <input type='hidden' name='codeClient' value='" . $ligne["id"] . "'> <button class='btn btn-info'><i class='icon-print icon-white'></i> Affichage & Impression</button> </form></td>";
			break;

			case 'PERIPHERIQUE':
			echo "<td> <form action='intervention/imprimer-intervention-peripheriques.php' method='POST'> <input type='hidden' name='id' value='" . $ligne1["id"] . "'> <input type='hidden' name='codeClient' value='" . $ligne["id"] . "'> <button class='btn btn-info'><i class='icon-print icon-white'></i> Affichage & Impression</button> </form></td>";
			break;

			case 'AUTRES':
			echo "<td> <form action='intervention/imprimer-intervention-peripheriques.php' method='POST'> <input type='hidden' name='id' value='" . $ligne1["id"] . "'> <input type='hidden' name='codeClient' value='" . $ligne["id"] . "'> <button class='btn btn-info'><i class='icon-print icon-white'></i> Affichage & Impression</button> </form></td>";
			break;
		 }
		echo "</tr>" ;
  	} 
?>
</table>

<center><a href="index.php?p=clients" class="btn btn-default btn-lg"><span class="glyphicon glyphicon-repeat"></span><br />Retour</a></center>

</div>

<br />