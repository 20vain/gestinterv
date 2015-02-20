<?php include_once ("../admin/auth_db.php");

// CONDITION = Création d'une demande et d'une nouvelle fiche client - FULL NEW
if ( (isset($_POST["ajout"])) && ($_POST["ajout"]=="1") && (count($_POST) != 0) )
{
	$nom		= htmlentities($_POST["nom"]);
	$prenom		= htmlentities($_POST["prenom"]);
	$telFixe	= htmlentities($_POST["telFixe"]);
	$telPort	= htmlentities($_POST["telPort"]);
	$adresse 	= htmlentities($_POST["adresse"]);
	$mail		= htmlentities($_POST["mail"]);
	$magasin 	= htmlentities($_POST["magasin"]);
	
	if (isset($_POST["rdv"])) { $rdv = "1"; } else { $rdv = "0"; }
	if (isset($_POST["pro"])) { $pro = "1"; } else { $pro = "0"; }

	$ajout_nouveau_client = mysql_query( "INSERT INTO tclients VALUES ('','$nom','$prenom','$telFixe','$telPort','$adresse','$mail','$magasin','$rdv','$pro');" ) or die ( mysql_error() ) ;
	$lastadd_client = mysql_insert_id(); // Récupération du dernier ID ajouté dans la base de données - table "TCLIENTS"
	$id_client	= $lastadd_client; // Stockage de l'ID dans une variable
			
// PRE-INTERVENTION
	$dateDepot = htmlentities($_POST["dateDepot"]);
	$dateRestitution = htmlentities($_POST["dateRestitution"]);
	$materiel = htmlentities($_POST["materiel"]);
	$session_user = htmlentities($_POST["session_user"]);
	$password = htmlentities($_POST["password"]);
	$typeInterv = htmlentities($_POST["typeInterv"]);
	$observations = htmlentities($_POST["observations"]);
	$technicien = htmlentities($_POST["technicien"]);
	
	if ( isset($_POST["accessoires"]) ) { $accessoires = $_POST["accessoires"]; $observations = "$observations+$accessoires"; } // Si des accessoires ont été mit (pour les pc portables et autres), une indication sera mise dans la colonne observations
	
	if ( !empty($_POST['dossierMesDocs']) )
	{ $dossierMesDocs = "Sauvegarde du dossier Mes Documents et Bureau"; }
	else { $dossierMesDocs = "Aucune sauvegarde à effectuer - Accord client OK."; }
	
	if ( !empty($_POST['dossiersClt']) )
	{ $dossiersClt = htmlentities($_POST['dossiersClt']); }
	else { $dossiersClt = ""; }
	
	if ( (empty($_POST['dossierMesDocs'])) && (empty($_POST['dossiersClt'])) )
	{ $dossierMesDocs = "Aucune sauvegarde à effectuer - Accord client OK."; $dossiersClt = ""; }
	
	if ( (isset($_POST["boiteMails"])) && ($_POST["boiteMails"] == "1") ) { $boiteMails = "Sauvegarde mails + AdressBook"; }
	
	$ajout2	= mysql_query ( "INSERT INTO tpreinterv VALUES ('','$id_client','$dateDepot','$dateRestitution','$materiel','$typeInterv','$observations','$session_user','$password','$dossierMesDocs','$dossiersClt','$technicien');" ) or die ( mysql_error() ) ;
	$lastadd_preinterv = mysql_insert_id(); // Reprise du code de l'intervention pour la redirection
	
	$interv = "SELECT * FROM tpreinterv WHERE id = '$lastadd_preinterv';" ;
	$resultat = mysql_query ( $interv ) or die ( mysql_error() ) ;

	$client = "SELECT * FROM tclients WHERE id = '$id_client';" ;
	$resultat1 = mysql_query ( $client ) or die ( mysql_error() ) ;
}



// AJOUT + IMPRESSION DE LA DEMANDE SI REDIRECTION DEPUIS FICHE CLIENT
else if ( (isset($_POST["client-connu"])) && ($_POST["client-connu"]=="1") && (count($_POST) != 0) )
{
	$codeClient = htmlentities($_POST["idClient"]);
	
	$nom		= htmlentities($_POST["nom"]);
	$prenom		= htmlentities($_POST["prenom"]);
	$telFixe	= htmlentities($_POST["telFixe"]);
	$telPort	= htmlentities($_POST["telPort"]);
	$adresse 	= htmlentities($_POST["adresse"]);
	$mail		= htmlentities($_POST["mail"]);
	$magasin 	= htmlentities($_POST["magasin"]);
	
	if (isset($_POST["rdv"])) { $rdv = "1"; } else { $rdv = "0"; }
	if (isset($_POST["pro"])) { $pro = "1"; } else { $pro = "0"; }

	$maj_client = "UPDATE tclients SET nom='$nom', prenom='$prenom', telFixe='$telFixe', telPort='$telPort', adresse='$adresse', magasin='$magasin', pro='$pro' WHERE id='$codeClient';" ;
	$sql = mysql_query ( $maj_client ) or die( mysql_error() ) ;
	
	// PRE-INTERVENTION
	$dateDepot = htmlentities($_POST["dateDepot"]);
	$dateRestitution = htmlentities($_POST["dateRestitution"]);
	$materiel = htmlentities($_POST["materiel"]);
	$session_user = htmlentities($_POST["session_user"]);
	$password = htmlentities($_POST["password"]);
	$typeInterv = htmlentities($_POST["typeInterv"]);
	$observations = htmlentities($_POST["observations"]);
	$technicien = htmlentities($_POST["technicien"]);
	
	if ( isset($_POST["accessoires"]) ) { $accessoires = $_POST["accessoires"]; $observations = "$observations+$accessoires"; } // Si des accessoires ont été mit (pour les pc portables et autres), une indication sera mise dans la colonne observations
	
	if ( !empty($_POST['dossierMesDocs']) )
	{ $dossierMesDocs = "Sauvegarde du dossier Mes Documents et Bureau"; }
	else { $dossierMesDocs = "Aucune sauvegarde à effectuer - Accord client OK."; }
	
	if ( !empty($_POST['dossiersClt']) )
	{ $dossiersClt = htmlentities($_POST['dossiersClt']); }
	else { $dossiersClt = ""; }
	
	if ( (empty($_POST['dossierMesDocs'])) && (empty($_POST['dossiersClt'])) )
	{ $dossierMesDocs = "Aucune sauvegarde à effectuer - Accord client OK."; $dossiersClt = ""; }
	
	if ( (isset($_POST["boiteMails"])) && ($_POST["boiteMails"] == "1") ) { $boiteMails = "Sauvegarde mails + AdressBook"; }
	
	$ajout = mysql_query ( "INSERT INTO tpreinterv VALUES ('','$codeClient','$dateDepot','$dateRestitution','$materiel','$typeInterv','$observations','$session_user','$password','$dossierMesDocs','$dossiersClt','$technicien');" ) or die ( mysql_error() ) ;
	$lastadd_preinterv = mysql_insert_id(); // Reprise du code de l'intervention pour la redirection

	$interv = "SELECT * FROM tpreinterv WHERE id = '$lastadd_preinterv';" ;
	$resultat = mysql_query ( $interv ) or die ( mysql_error() ) ;

	$client = "SELECT * FROM tclients WHERE id = '$codeClient';" ;
	$resultat1 = mysql_query ( $client ) or die ( mysql_error() ) ;
}


// -- CONDITION : impression de la demande à partir du tableau d'affichage des demandes
else if ( (isset($_POST["print_demande"])) && ($_POST["print_demande"]=="1") && (count($_POST) != 0) )
{
	$codeClient = htmlentities($_POST["codeClient"]);

	$client = "SELECT * FROM tclients WHERE id = '$codeClient';" ;
	$resultat1 = mysql_query ( $client ) or die ( mysql_error() ) ;
	
	if (isset($_POST["rdv"])) { $rdv = "1"; } else { $rdv = "0"; }
	if (isset($_POST["pro"])) { $pro = "1"; } else { $pro = "0"; }

	$idInterv = htmlentities($_POST["idPreinterv"]);

	$interv = "SELECT * FROM tpreinterv WHERE id = '$idInterv';" ;
	$resultat = mysql_query ( $interv ) or die ( mysql_error() ) ;
}
?>

<body onLoad="window.print()">
	<center><h1>Demande d'intervention</h1></center>

	<?php
		// Tant qu'il y a des interventions & des clients à côté... :
		while ( ($ligne = mysql_fetch_array($resultat)) && ($ligne1 = mysql_fetch_array($resultat1)) )
		{ ?>
			<table border="0" rules="all">
				<tr>
					<td>
						Client : <b><font size='6'><?php echo $ligne1['nom'] . " " . $ligne1['prenom'];?></font></b>&nbsp;
					</td>
					<td>
						<?php if ( !empty($ligne1['telPort']) ) { echo "Téléphone PORTABLE : <b>" . $ligne1['telPort'] . "</b><br />"; }
						if ( !empty($ligne1['telFixe']) ) { echo "Téléphone FIXE : <b>" . $ligne1['telFixe'] . "</b>" ; }?>
					</td>
					<td>
						<?php
						if ( $ligne1['rdv']=="1" ) { echo "<fieldset style='background-color:#ebebeb;'><b>RENDEZ-VOUS</b></fieldset>"; }
						if ( $ligne1['pro']=="1" ) { echo "<fieldset style='background-color:#ebebeb;'><b>CLIENT PROFESSIONNEL</b></fieldset>"; }
						?>
					</td>
				</tr>
				
				<tr>
					<td>
						<?php if ( !empty($ligne1['telPort']) ) { echo "Adresse : <b>" . $ligne1['adresse'] . "</b><br />"; }
						if ( !empty($ligne1['telFixe']) ) { echo "E-Mail : ". $ligne1['mail']; }?>
					</td>
					<td>
						Magasin : <b><?php echo $ligne1['magasin'];?></b>
					</td>
				</tr>

				<tr>
					<td>
						Dépôt du matériel le : <?php echo $ligne['dateDepot'];?><br />
					</td>
					<td>
						Date de restitution : <font size='6'><b><?php echo $ligne['dateRestitution'];?></b></font>
					</td>
				</tr>

				<tr>
					<td colspan="2">
						Type de matériel : <b><font size='5'><?php echo $ligne['materiel']; ?></font/></b>
						<br />
						Type d'intervention à effectuer : <b><font size='5'><?php echo $ligne['typeInterv']; ?></font/></b>
					</td>					
				</tr>
			</table>

		<hr />

			<table border="0" rules="all">
				<tr>
					<td>
						<fieldset> <legend><b>Observations complémentaires</b></legend>
							<?php echo nl2br($ligne['observations']); ?>
						</fieldset>
					</td>
					<td>
						<?php
							if (!empty($session_user)) { echo "Session utilisateur : <b>" . $session_user . "</b> <br />" ; }
							if (!empty($ligne['password'])) { echo "Mot de passe : <b>" . $ligne['password'] . "</b> <br />" ; }
							if ( ($ligne['dossierMesDocs'] == "Sauvegarde du dossier Mes Documents et Bureau") ) { echo "<b>" . $ligne['dossierMesDocs'] . "</b> <br />"; }
							if (!empty($ligne['dossierClt'])) { echo "Dossiers spécifiques à sauvergarder : <b>" . $ligne['dossierClt'] . "</b> <br />" ; }
							if (!empty($boiteMails)) { echo $boiteMails."<br />"; }
						?>
					</td>
				</tr>
			</table>
		Techicien ayant pris la demande : <b><?php echo $ligne['technicien']; ?>
<?php
		} // FIN BOUCLE AFFICHAGE
		?>
<hr />

<table border="0" rules="all">
	<tr> <th></th> <td>Analyse <b>externe</b></th> <td>Analyse <b>interne</b></th> <th align="center" colspan="2">Informations complémentaires</th></tr>
	<tr>
		<td>Virus</td> <td><input type="text" style="width:65px; height:35px;" /></td> <td></td> <td><input type="checkbox" />ADWC &nbsp; <input type="checkbox" />RK &nbsp; <input type="checkbox" />CC</td>
	</tr>
	<tr>
		<td>Malwares</td> <td></td> <td></td> <td><input type="checkbox" /> Optimisation démarrage <br /> <input type="checkbox" /> RàZ navigateurs &nbsp; <input type="checkbox" />Suppression proxy</td>
	</tr>
	<tr>
		<td>Spywares</td> <td></td> <td><input type="text" style="width:65px; height:35px;" /></td> <td><input type="checkbox" /> Scan redémarrage effectué</td>
	</tr>
	<tr> <td colspan="4">
	<input type="checkbox" />Suppression de l'antivirus client =<br /><br />
		<input type="checkbox" />Install Antivirus <input type="checkbox" /> MàJ Antivirus  <input type="checkbox" />Install Spybot <input type="checkbox" /> MàJ Spybot</td>
	</tr>
</table>

<h3>Complément d'information</h3>
	<?php if (isset($_POST["print_demande"])) { echo '<center><a href="../index.php?p=interv">Retour accueil</a></center>'; }
	else echo '<center><a href="../index.php?p=demande">Retour accueil</a></center>'; ?>
</body>
