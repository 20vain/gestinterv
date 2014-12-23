<head> 
	<!--<meta http-equiv ="refresh" content="120;URL=index.php?p=interv">--> <!-- Rafraichissement automatique de la page toutes les deux minutes -->
</head>

<?php	
// --- SUPPRESSION DEMANDE
if ( (!empty($_POST)) && (isset($_POST["delete"])) && ($_POST["delete"]=="21") )
{
	$id	= $_POST["idInterv"];	
	delete($id,"tinterventions");
?>
	<div class="alert alert-warning">
		L'intervention n° <?php echo $id; ?> vient d'être <strong>supprimée</strong> !
	</div>
<?php
} // FIN FONCTION SUPPRESSION ?>

<div class="container">
<?php include_once ("admin/recherche.php"); ?>
</div>


<div class="container1">

<table class='table table-bordered table-hover table-condensed'><legend><h3>Récapitulatif des <u><b>INTERVENTIONS EN COURS</b></u></b></h3></legend>
	<?php
		// Affichage de toutes les interventions EN COURS
	$interv_en_cours = "SELECT * FROM tinterventions WHERE statut='En cours' OR statut='À faire URGENT' OR statut='À faire' ORDER BY id DESC;" ;
	$query2 = mysql_query ( $interv_en_cours ) or die ( mysql_error() ) ;
	$totalQuery2 = mysql_num_rows($query2);

	echo "<tr><td colspan='11' style='text-align:center; vertical-align:middle';><h4>Nombre total d'interventions en cours = ".$totalQuery2."</h4></td></tr>";
	echo "<tr> <th style='text-align:center; vertical-align:middle;'> DATE </th> <th style='text-align:center; vertical-align:middle;'> CLIENT </th> <th style='text-align:center; vertical-align:middle;'>MATERIEL</th> <th style='text-align:center; vertical-align:middle;'> INTERVENTION </th> <th style='text-align:center; vertical-align:middle;'> MAGASIN </th> <th style='text-align:center; vertical-align:middle;'>OBSERVATIONS</th> <th style='text-align:center; vertical-align:middle;'> COÛT </th> <th style='text-align:center; vertical-align:middle;'> TECHNICIEN </th> <th colspan='3'  style='text-align:center; vertical-align:middle;'><center>ADMINISTRATION</center></th> </tr>";

		while (  ($ligne0 = mysql_fetch_array($query2)) )
		{
			$codeClient = $ligne0['codeClient'];
			
			// Affiche du nom à côté de la pré-intervention concernée
				$infos_client = "SELECT tclients.nom, tclients.prenom, tclients.magasin, tclients.rdv FROM tclients,tinterventions WHERE tclients.id=tinterventions.codeClient AND tinterventions.codeClient = '$codeClient' ;" ;
				$Resultat1 = mysql_query ( $infos_client ) or die ( mysql_error() ) ;
				$clt = mysql_fetch_array($Resultat1);
			
			// RDV - Date de restitution
			if ( $clt['rdv'] == "1" ) { echo "<td style='background-color:#9b59b6; text-align:center; color:white; vertical-align:middle;'><b>". $ligne0['dateInterv'] ."</b></td>" ; }
			else echo "<td style='text-align:center; vertical-align:middle;'><b>" . $ligne0['dateInterv'] . "</b></td>" ;
			
			// Emplacement du PC / client (Avranches ou Saint-James) -- COLORISATION
			if ( $clt['magasin'] == "Avranches" ) { echo "<td style='text-align:center; vertical-align:middle;'><b>" . $clt['nom'] ."<br />". $clt['prenom'] . "</b></td>" ; }
			else if ( $clt['magasin'] == "Saint-James" ) { echo "<td  style='background-color:#FF9900; text-align:center; vertical-align:middle;'><b>" . $clt['nom'] . "</b></td>" ; }
			else { echo "<td style='text-align:center; vertical-align:middle;'><b>" . $clt['nom'] . "</b></td>" ; }
			
			// Type de matériel -- COLORISATION
			if ( $ligne0['materiel'] == "PC FIXE" ) { echo "<td  style='background-color:#FFFF71; text-align:center; vertical-align:middle;'><b>" . $ligne0['materiel'] . "</b></td>" ; }
			else if ( $ligne0['materiel'] == "PC PORTABLE" ) { echo "<td  style='background-color:#FFCCCC; text-align:center; vertical-align:middle;'><b>" . $ligne0['materiel'] . "</b></td>" ; }
			else if ( $ligne0['materiel'] == "NETBOOK" ) { echo "<td  style='background-color:#FFCCCC; text-align:center; vertical-align:middle;'><b>" . $ligne0['materiel'] . "</b></td>" ; }
			else if ( $ligne0['materiel'] == "TOUT EN UN" ) { echo "<td  style='background-color:#FFFF71; text-align:center; vertical-align:middle;'><b>" . $ligne0['materiel'] . "</b></td>" ; }
			else if ( $ligne0['materiel'] == "PC HYBRIDE" ) { echo "<td  style='background-color:#FFCCCC; text-align:center; vertical-align:middle;'><b>" . $ligne0['materiel'] . "</b></td>" ; }
			else { echo "<td style='text-align:center; vertical-align:middle;'><b>" . $ligne0['materiel'] . "</b></td>" ; }
	
			// Type d'intervention -- COLORISATION
			if ( $ligne0['intervention'] == "NETTOYAGE" ) { echo "<td  style='background-color:#5797DB; text-align:center; vertical-align:middle;'><b>" . $ligne0['intervention'] . "</b></td>" ; }
			else if ( $ligne0['intervention'] == "FORMATAGE" ) { echo "<td  style='background-color:#333333; color:#FFFFFF; text-align:center; vertical-align:middle;'><b>" . $ligne0['intervention'] . "</b></td>" ; }
			else if ( ( $ligne0['intervention'] == "AUTRES / DIVERS" ) OR ( $ligne0['intervention'] == "MO ATELIER" ) ) { echo "<td  style='background-color:#87D86E; text-align:center; vertical-align:middle;'><b>" . $ligne0['intervention'] . "</b></td>" ; }
			else { echo "<td style='text-align:center; vertical-align:middle;'><b>" . $ligne0['intervention'] . "</b></td>" ; }
			
			if ( $clt['magasin'] == "Avranches" ) { echo "<td style='background-color:#FFFFFF; text-align:center; vertical-align:middle;'><b>" . $clt['magasin'] . "</b></td>" ; }
			else if ( $clt['magasin'] == "Saint-James" ) { echo "<td  style='background-color:#FF9900; text-align:center; vertical-align:middle;'><b>" . $clt['magasin'] . "</b></td>" ; }
			else { echo "<td style='background-color:#FFFFFF; text-align:center; vertical-align:middle;'><b>" . $clt['magasin'] . "</b></td>" ; }
			
			echo "<td style='text-align:justify; vertical-align:middle;'>" . nl2br($ligne0['observations']) . "</td>" ;
			echo "<td style='text-align:center; vertical-align:middle;'>" . $ligne0['prix'] . " €</td>" ;
			echo "<td style='text-align:center; vertical-align:middle;'>" . $ligne0['technicien'] . "</td>" ;
			echo "<td style='text-align:center; vertical-align:middle;'> <form action='index.php?p=modifinterv' method='post'> <input type='hidden' name='id' value='" . $ligne0["id"] . "'> <input type='hidden' name='codeClient' value='" . $ligne0["codeClient"] . "'> <button class='btn btn-primary'><i class='icon-pencil icon-white'></i> Modification intervention</button> </form></td>";
			
			$materiel = $ligne0['materiel']	;
			switch ($materiel) { // Selon le matériel qui a été sélectionné, la page ne sera pas la même.
				case 'PC FIXE':
					echo "<td style='text-align:center; vertical-align:middle;'> <form action='interventions/print_interv_pc.php' method='POST'> <input type='hidden' name='id' value='" . $ligne0['id'] . "'> <button class='btn btn-info'><span class='glyphicon glyphicon-print' aria-hidden='true'></span><br />Imprimer</button> </form></td>";
				break;
				
				case 'KIT EVO':
					echo "<td style='text-align:center; vertical-align:middle;'> <form action='interventions/print_interv_pc.php' method='POST'> <input type='hidden' name='id' value='" . $ligne0['id'] . "'> <button class='btn btn-info'><span class='glyphicon glyphicon-print' aria-hidden='true'></span><br />Imprimer</button> </form></td>";
				break;
				
				case 'PC PORTABLE':
					echo "<td style='text-align:center; vertical-align:middle;'> <form action='interventions/print_interv_pc.php' method='POST'> <input type='hidden' name='id' value='" . $ligne0['id'] . "'> <button class='btn btn-info'><span class='glyphicon glyphicon-print' aria-hidden='true'></span><br />Imprimer</button> </form></td>";
				break;
				
				case 'NETBOOK':
					echo "<td style='text-align:center; vertical-align:middle;'> <form action='interventions/print_interv_pc.php' method='POST'> <input type='hidden' name='id' value='" . $ligne0['id'] . "'> <button class='btn btn-info'><span class='glyphicon glyphicon-print' aria-hidden='true'></span><br />Imprimer</button> </form></td>";
				break;
				
				case 'TOUT EN UN':
					echo "<td style='text-align:center; vertical-align:middle;'> <form action='interventions/print_interv_pc.php' method='POST'> <input type='hidden' name='id' value='" . $ligne0['id'] . "'> <button class='btn btn-info'><span class='glyphicon glyphicon-print' aria-hidden='true'></span><br />Imprimer</button> </form></td>";
				break;
				
				case 'PC HYBRIDE':
					echo "<td style='text-align:center; vertical-align:middle;'> <form action='interventions/print_interv_pc.php' method='POST'> <input type='hidden' name='id' value='" . $ligne0['id'] . "'> <button class='btn btn-info'><span class='glyphicon glyphicon-print' aria-hidden='true'></span><br />Imprimer</button> </form></td>";
				break;
				
				case 'IMPRIMANTE':
					echo "<td style='text-align:center; vertical-align:middle;'> <form action='interventions/print_interv_periph.php' method='POST'> <input type='hidden' name='id' value='" . $ligne0['id'] . "'> <button class='btn btn-info'><span class='glyphicon glyphicon-print' aria-hidden='true'></span><br />Imprimer</button> </form></td>";
				break;
				
				case 'TABLETTE TACTILE':
					echo "<td style='text-align:center; vertical-align:middle;'> <form action='interventions/print_interv_periph.php' method='POST'> <input type='hidden' name='id' value='" . $ligne0['id'] . "'> <button class='btn btn-info'><span class='glyphicon glyphicon-print' aria-hidden='true'></span><br />Imprimer</button> </form></td>";
				break;
				
				case 'PERIPHERIQUE':
					echo "<td style='text-align:center; vertical-align:middle;'> <form action='interventions/print_interv_periph.php' method='POST'> <input type='hidden' name='id' value='" . $ligne0['id'] . "'> <button class='btn btn-info'><span class='glyphicon glyphicon-print' aria-hidden='true'></span><br />Imprimer</button> </form></td>";
				break;
				
				case 'AUTRES / DIVERS':
					echo "<td style='text-align:center; vertical-align:middle;'> <form action='interventions/print_interv_periph.php' method='POST'> <input type='hidden' name='id' value='" . $ligne0['id'] . "'> <button class='btn btn-info'><span class='glyphicon glyphicon-print' aria-hidden='true'></span><br />Imprimer</button> </form></td>";
				break;
				
				case 'SAV':
					echo "<td style='text-align:center; vertical-align:middle;'> <form action='interventions/print_interv_periph.php' method='POST'> <input type='hidden' name='id' value='" . $ligne0['id'] . "'> <button class='btn btn-info'><span class='glyphicon glyphicon-print' aria-hidden='true'></span><br />Imprimer</button> </form></td>";
				break;
				
				case 'ASSURANCE':
					echo "<td style='text-align:center; vertical-align:middle;'> <form action='interventions/print_interv_periph.php' method='POST'> <input type='hidden' name='id' value='" . $ligne0['id'] . "'> <button class='btn btn-info'><i class='icon-print icon-white'></i> Affichage / Impression</button> </form></td>";
				break;
			}
			echo "<td style='text-align:center; vertical-align:middle;'><form method='post' action='#'> <input type='hidden' name='idInterv' value='".$ligne0["id"]."'> <input type='hidden' name='delete' value='21' /> <button class='btn btn-danger'><span class='glyphicon glyphicon-trash' aria-hidden='true'></span><br /> Suppression <br />de l'intervention</button> </form></td>";
			echo "</tr>" ;
		}
	?>
		</table>

</div>

<br />