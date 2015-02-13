<head> 
	<!--<meta http-equiv ="refresh" content="120;URL=index.php?p=interv">--> <!-- Rafraichissement automatique de la page toutes les deux minutes -->
</head>

<?php	
// --- SUPPRESSION DEMANDE
if ( (!empty($_POST)) && (isset($_POST["delete"])) && ($_POST["delete"]=="20") )
{
	$id	= htmlentities($_POST["idPreinterv"]);	
	delete($id,"tpreinterv");
?>
	<div class="alert alert-warning">
		La demande d'intervention n° <?php echo $id; ?> vient d'être <strong>supprimée</strong> !
	</div>
<?php
} // FIN FONCTION SUPPRESSION ?>

<div class="container">
<?php include_once ("admin/recherche.php"); ?>
</div>


<div class="container1">

<table class='table table-bordered table-hover table-condensed'><legend><h3>Récapitulatif des <u><b>DEMANDES EN COURS</b></u></b></h3></legend>
	<?php
		// Affichage de toutes les pré-interventions
	$preInterv = "SELECT * FROM  tpreinterv ORDER BY tpreinterv.dateRestitution ASC" ;
	$query1 = mysql_query ( $preInterv ) or die ( mysql_error() ) ;
	$totalQuery1 = mysql_num_rows($query1);
	
	echo "<tr><td colspan='9' style='text-align:center; vertical-align:middle';><h4>Nombre total de demandes = ".$totalQuery1."</h4></td></tr>";
	echo "<tr> <th style='text-align:center; vertical-align:middle;'> DATE </th> <th style='text-align:center; vertical-align:middle;'> CLIENT </th> <th style='text-align:center; vertical-align:middle;'>MATERIEL</th> <th style='text-align:center; vertical-align:middle;'> INTERVENTION </th> <th style='text-align:center; vertical-align:middle;'>OBSERVATIONS</th> <th style='text-align:center; vertical-align:middle;'>SAUVEGARDE<br />DOCUMENTS CLIENTS</th> <th colspan='3'  style='text-align:center; vertical-align:middle;'><center>ADMINISTRATION</center></th> </tr>";
		
		while ( ($preInterv = mysql_fetch_array($query1)) )
		{
			$codeClient = htmlentities($preInterv['codeClient']);
			
			// Affiche du nom à côté de la pré-intervention concernée
				$nom_client = "SELECT tclients.nom, tclients.prenom, tclients.magasin, tclients.rdv, tclients.pro FROM tclients,tpreinterv WHERE tclients.id=tpreinterv.codeClient AND tpreinterv.codeClient = '$codeClient' ;" ;
				$Resultat3 = mysql_query ( $nom_client ) or die ( mysql_error() ) ;
				$clt = mysql_fetch_array($Resultat3);
				
			echo "<tr>" ;

			// RDV - Date de restitution
			if ( $clt['rdv'] == "1" ) { echo "<td style='background-color:#9b59b6; text-align:center; color:white; vertical-align:middle;'><b>". $preInterv['dateRestitution'] ."</b></td>" ; }
			else echo "<td style='text-align:center; vertical-align:middle;'><b>" . $preInterv['dateRestitution'] . "</b></td>" ;
			
			// Emplacement du PC / client (Avranches ou Saint-James) -- COLORISATION
			if ( $clt['magasin'] == "Avranches" ) { echo "<td style='text-align:center; vertical-align:middle;'><b>" . $clt['nom'] ."<br />". $clt['prenom'] . "</b></td>" ; }
			else if ( $clt['magasin'] == "Saint-James" ) { echo "<td style='background-color:#FF9900; text-align:center; vertical-align:middle;'><b>" . $clt['nom'] ."<br />". $clt['prenom'] . "</b></td>" ; }
			else { echo "<td style='text-align:center; vertical-align:middle;'><b>" . $clt['nom'] ."<br />". $clt['prenom'] . "</b></td>" ; }

			
			// Type de matériel -- COLORISATION
			if ( htmlentities($preInterv['materiel']) == "PC FIXE" ) { echo "<td style='background-color:#FFFF71; text-align:center; vertical-align:middle;'><b>" . htmlentities($preInterv['materiel']) . "</b></td>" ; }
			else if ( htmlentities($preInterv['materiel']) == "PC PORTABLE" ) { echo "<td style='background-color:#FFCCCC; text-align:center; vertical-align:middle;'><b>" . htmlentities($preInterv['materiel']) . "</b></td>" ; }
			else if ( htmlentities($preInterv['materiel']) == "NETBOOK" ) { echo "<td style='background-color:#FFCCCC; text-align:center; vertical-align:middle;'><b>" . htmlentities($preInterv['materiel']) . "</b></td>" ; }
			else if ( htmlentities($preInterv['materiel']) == "TOUT EN UN" ) { echo "<td  style='background-color:#FFFF71; text-align:center; vertical-align:middle;'><b>" . htmlentities($preInterv['materiel']) . "</b></td>" ; }
			else if ( htmlentities($preInterv['materiel']) == "PC HYBRIDE" ) { echo "<td  style='background-color:#FFCCCC; text-align:center; vertical-align:middle;'><b>" . htmlentities($preInterv['materiel']) . "</b></td>" ; }
			else { echo "<td style='text-align:center; vertical-align:middle;'><b>" . htmlentities($preInterv['materiel']) . "</b></td>" ; }
			
			// Type d'intervention -- COLORISATION
			if ( htmlentities($preInterv['typeInterv']) == "NETTOYAGE" ) { echo "<td style='background-color:#5797DB; text-align:center; vertical-align:middle;'><b>" . htmlentities($preInterv['typeInterv']) . "</b></td>" ; }
			else if ( htmlentities($preInterv['typeInterv']) == "FORMATAGE" ) { echo "<td style='background-color:#333333; color:#FFFFFF; text-align:center; vertical-align:middle;'><b>" . htmlentities($preInterv['typeInterv']) . "</b></td>" ; }
			else if ( ( htmlentities($preInterv['typeInterv']) == "AUTRES / DIVERS" ) OR ( htmlentities($preInterv['typeInterv']) == "MO ATELIER" ) ) { echo "<td style='background-color:#87D86E; text-align:center; vertical-align:middle;'><b>" . htmlentities($preInterv['typeInterv']) . "</b></td>" ; }
			else { echo "<td style='text-align:center; vertical-align:middle;'><b>" . htmlentities($preInterv['typeInterv']) . "</b></td>" ; }
			
			echo "<td style='text-align:justify; vertical-align:middle;'>" . nl2br(htmlentities($preInterv['observations'])) . "</td>" ;
			
			// Sauvegarde des docs -- COLORISATION
			if ( $preInterv['dossierMesDocs'] == "Sauvegarde du dossier Mes Documents et Bureau" ) { echo "<td style='background-color:#E03C3C; text-align:center; vertical-align:middle;'><b>Sauvegarder à effectuer</b></td>" ; }
			else { echo "<td style='text-align:center; vertical-align:middle;'>Aucune sauvegarde à effectuer</td>" ; }
			
			echo "<td style='text-align:center; vertical-align:middle;'><form action='index.php?p=transfo-demande' method='POST'> <input type='hidden' name='idPreinterv' value='".htmlentities($preInterv["id"])."' /> <input type='hidden' name='codeClient' value='" . htmlentities($preInterv["codeClient"]) . "'> <button class='btn btn-success'><span class='glyphicon glyphicon-wrench' aria-hidden='true'></span><br />Effectuer l'intervention</button> </form></td>
			<td style='text-align:center; vertical-align:middle;'><form action='demande/print_demande.php' method='POST'> <input type='hidden' name='idPreinterv' value='" . htmlentities($preInterv["id"]) . "'> <input type='hidden' name='codeClient' value='" . htmlentities($codeClient) . "'> <input type='hidden' name='print_demande' value='1'> <button class='btn btn-info'><span class='glyphicon glyphicon-print' aria-hidden='true'></span><br />Imprimer</button> </form></td>
			<td style='text-align:center; vertical-align:middle;'><form method='post' action='#'> <input type='hidden' name='idPreinterv' value='".htmlentities($preInterv["id"])."'> <input type='hidden' name='delete' value='20' /> <button class='btn btn-danger'><span class='glyphicon glyphicon-trash' aria-hidden='true'></span><br /> Suppression <br />de la demande</button> </form></td>";
			echo "</tr>" ;
		} 
	?>
</table>

</div>

<br />