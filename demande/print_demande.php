<?php include_once ("../admin/auth_db.php");

if ( (isset($_POST["ajout"])) && ($_POST["ajout"]=="1") && (count($_POST) != 0) )
{
	$nom		= addslashes($_POST["nom"]);
	$prenom		= addslashes($_POST["prenom"]);
	$telFixe	= addslashes($_POST["telFixe"]);
	$telPort	= addslashes($_POST["telPort"]);
	$adresse 	= addslashes($_POST["adresse"]);
	$mail		= addslashes($_POST["mail"]);
	$magasin 	= addslashes($_POST["magasin"]);
	
	if (isset($_POST["rdv"])) { $rdv = "1"; } else { $rdv = "0"; }
	if (isset($_POST["pro"])) { $pro = "1"; } else { $pro = "0"; }

	$ajout_nouveau_client = mysql_query( "INSERT INTO tclients VALUES ('','$nom','$prenom','$telFixe','$telPort','$adresse','$mail','$magasin','$rdv','$pro');" ) or die ( mysql_error() ) ;
	$lastadd_client = mysql_insert_id();
	$id_client	= $lastadd_client;
			
// PRE-INTERVENTION
	$dateDepot = $_POST["dateDepot"];
	$dateRestitution = $_POST["dateRestitution"];
	$materiel = addslashes($_POST["materiel"]);
	$session_user = addslashes($_POST["session_user"]);
	$password = addslashes($_POST["password"]);
	$typeInterv = addslashes($_POST["typeInterv"]);
	$observations = addslashes($_POST["observations"]);
	
	if ( isset($_POST["accessoires"]) ) { $accessoires = $_POST["accessoires"]; $observations = "$observations+$accessoires"; } // Si des accessoires ont été mit (pour les pc portables et autres), une indication sera mise dans la colonne observations
	
	if ( !empty($_POST['dossierMesDocs']) )
	{ $dossierMesDocs = "Sauvegarde du dossier Mes Documents et Bureau"; }
	else { $dossierMesDocs = "Aucune sauvegarde à effectuer - Accord client OK."; }
	
	if ( !empty($_POST['dossiersClt']) )
	{ $dossiersClt = addslashes($_POST['dossiersClt']); }
	else { $dossiersClt = ""; }
	
	if ( (empty($_POST['dossierMesDocs'])) && (empty($_POST['dossiersClt'])) )
	{ $dossierMesDocs = "Aucune sauvegarde à effectuer - Accord client OK."; $dossiersClt = ""; }
	
	if ( (isset($_POST["boiteMails"])) && ($_POST["boiteMails"] == "1") ) { $boiteMails = "Sauvegarde mails + AdressBook"; }
	
	$ajout2	= mysql_query ( "INSERT INTO tpreinterv VALUES ('','$id_client','$dateDepot','$dateRestitution','$materiel','$typeInterv','$observations','$password','$dossierMesDocs','$dossiersClt');" ) or die ( mysql_error() ) ;
	$lastadd_preinterv = mysql_insert_id(); // Reprise du code de l'intervention pour la redirection
	
	$interv = "SELECT * FROM tpreinterv WHERE id = '$lastadd_preinterv';" ;
	$resultat = mysql_query ( $interv ) or die ( mysql_error() ) ;

	$client = "SELECT * FROM tclients WHERE id = '$id_client';" ;
	$resultat1 = mysql_query ( $client ) or die ( mysql_error() ) ;
}



// AJOUT + IMPRESSION DE LA DEMANDE SI REDIRECTION DEPUIS FICHE CLIENT
else if ( (isset($_POST["client-connu"])) && ($_POST["client-connu"]=="1") && (count($_POST) != 0) )
{
	$codeClient = $_POST["idClient"];
	
	$nom		= addslashes($_POST["nom"]);
	$prenom		= addslashes($_POST["prenom"]);
	$telFixe	= addslashes($_POST["telFixe"]);
	$telPort	= addslashes($_POST["telPort"]);
	$adresse 	= addslashes($_POST["adresse"]);
	$mail		= addslashes($_POST["mail"]);
	$magasin 	= addslashes($_POST["magasin"]);
	
	if (isset($_POST["rdv"])) { $rdv = "1"; } else { $rdv = "0"; }
	if (isset($_POST["pro"])) { $pro = "1"; } else { $pro = "0"; }

	$maj_client = "UPDATE tclients SET nom='$nom', prenom='$prenom', telFixe='$telFixe', telPort='$telPort', adresse='$adresse', magasin='$magasin', pro='$pro' WHERE id='$codeClient';" ;
	$sql = mysql_query ( $maj_client ) or die( mysql_error() ) ;
	
	// PRE-INTERVENTION
	$dateDepot = $_POST["dateDepot"];
	$dateRestitution = $_POST["dateRestitution"];
	$materiel = addslashes($_POST["materiel"]);
	$session_user = addslashes($_POST["session_user"]);
	$password = addslashes($_POST["password"]);
	$typeInterv = addslashes($_POST["typeInterv"]);
	$observations = addslashes($_POST["observations"]);
	
	if ( isset($_POST["accessoires"]) ) { $accessoires = $_POST["accessoires"]; $observations = "$observations+$accessoires"; } // Si des accessoires ont été mit (pour les pc portables et autres), une indication sera mise dans la colonne observations
	
	if ( !empty($_POST['dossierMesDocs']) )
	{ $dossierMesDocs = "Sauvegarde du dossier Mes Documents et Bureau"; }
	else { $dossierMesDocs = "Aucune sauvegarde à effectuer - Accord client OK."; }
	
	if ( !empty($_POST['dossiersClt']) )
	{ $dossiersClt = addslashes($_POST['dossiersClt']); }
	else { $dossiersClt = ""; }
	
	if ( (empty($_POST['dossierMesDocs'])) && (empty($_POST['dossiersClt'])) )
	{ $dossierMesDocs = "Aucune sauvegarde à effectuer - Accord client OK."; $dossiersClt = ""; }
	
	if ( (isset($_POST["boiteMails"])) && ($_POST["boiteMails"] == "1") ) { $boiteMails = "Sauvegarde mails + AdressBook"; }
	
	$ajout = mysql_query ( "INSERT INTO tpreinterv VALUES ('','$codeClient','$dateDepot','$dateRestitution','$materiel','$typeInterv','$observations','$password','$dossierMesDocs','$dossiersClt');" ) or die ( mysql_error() ) ;
	$lastadd_preinterv = mysql_insert_id(); // Reprise du code de l'intervention pour la redirection

	$interv = "SELECT * FROM tpreinterv WHERE id = '$lastadd_preinterv';" ;
	$resultat = mysql_query ( $interv ) or die ( mysql_error() ) ;

	$client = "SELECT * FROM tclients WHERE id = '$codeClient';" ;
	$resultat1 = mysql_query ( $client ) or die ( mysql_error() ) ;
}
?>

<head> 
	<title>Impression d'une demande d'intervention - MIS Informatique</title>
</head>

<body>
<!--<body onLoad="window.print()">-->
	<center>
		<h1>Demande d'intervention</h1>
	</center>
<table>
<td style="width:25%">
<?php
	// Tant qu'il y a des interventions & des clients à côté... :
	while ( ($ligne = mysql_fetch_array($resultat)) && ($ligne1 = mysql_fetch_array($resultat1)) )
	{
		if ( $ligne1['rdv']=="1" ) { echo "<fieldset style='background-color:#ebebeb;'><u><b>RENDEZ-VOUS</b></u></fieldset>"; }
		if ( $ligne1['pro']=="1" ) { echo "<fieldset style='background-color:#ebebeb;'><u><b>CLIENT PROFESSIONNEL</b></u></fieldset>"; }
?>
</td>
<td>
<?php
		echo "<u>Client</u> : <b><font size='6'>" . $ligne1['nom'] . " " . $ligne1['prenom'] . "</font></b>" ; if ( $ligne1['magasin']=="Saint-James" ) { echo " ---> <u><b><font size='5'>PC STJ</font></b></u><br />"; } else { echo "<br />" ; }
		if ( !empty($ligne1['telPort']) ) { echo "<u>Téléphone PORTABLE</u> : <b>" . $ligne1['telPort'] . "</b><br />"; }
		if ( !empty($ligne1['telFixe']) ) { echo "- <u>Téléphone FIXE</u> : <b>" . $ligne1['telFixe'] . "</b><br />" ; }
		if ( !empty($ligne1['adresse']) ) { echo "<u>Adresse</u> : <b>" . $ligne1['adresse'] . "</b><br />"; }
		if ( !empty($ligne1['mail']) ) { echo "- <u>E-Mail</u> : ". $ligne1['mail']; }
?>
</td>
</table>
<hr />
<?php
		echo "Dépôt du matériel le : " . $ligne['dateDepot'] . " ----> Date de restitution prévue pour le : <font size='6'><b>" . $ligne['dateRestitution'] . "</b></font> <br />";
		echo "Type de matériel : <b><font size='5'>" . $ligne['materiel'] . "</font/></b>" ;				
		echo " ----> Type d'intervention à effectuer : <b><font size='5'>" . $ligne['typeInterv'] . "</font></b><br />" ;
		echo "<br />";
		echo "<fieldset> <legend><b>Intervention à effectuer</b> :</legend>" . nl2br($ligne['observations']) . "</fieldset> <br />" ;
		if (!empty($session_user)) { echo "Session utilisateur : <b>" . $session_user . "</b> <br />" ; }
		if (!empty($ligne['password'])) { echo "Mot de passe : <b>" . $ligne['password'] . "</b> <br />" ; }
		if ( ($ligne['dossierMesDocs'] == "Sauvegarde du dossier Mes Documents et Bureau") ) { echo "Sauvegarde des fichiers clients : <b>" . $ligne['dossierMesDocs'] . "</b> <br />"; }
		if (!empty($ligne['dossierClt'])) { echo "Dossiers spécifiques à sauvergarder : <b>" . $ligne['dossierClt'] . "</b> <br />" ; }
		if (!empty($boiteMails)) { echo $boiteMails."<br />"; } 
  	}
?>
<hr />


<table border="0" rules="all">
<tr> <th>&nbsp;</th> <td>Analyse externe</th> <td>Analyse interne</th> <th align="center" colspan="2">Informations complémentaires</th> </tr>
<tr>
	<td>Virus</td> <td><input type="text" style="width:65px; height:35px;" /></td> <td><input type="text" style="width:65px; height:35px;" /></td> <td><input type="checkbox" />ADWC &nbsp; <input type="checkbox" />RK &nbsp; <input type="checkbox" />CC</td>
</tr>
<tr>
	<td>Malwares</td> <td><input type="text" style="width:65px; height:35px;" /></td> <td><input type="text" style="width:65px; height:35px;" /></td> <td><input type="checkbox" /> Optimisation démarrage <br /> <input type="checkbox" /> Réinitialisation navigateurs &nbsp; <input type="checkbox" />Suppression proxy</td>
</tr>
<tr>
	<td>Spywares</td> <td></td> <td><input type="text" style="width:65px; height:35px;" /></td> <td><input type="checkbox" /> Scan redémarrage effectué</td>
</tr>
<tr> <td></td> <td></td> <td></td>
	<td><input type="checkbox" />Suppression antivirus --><br />
	<input type="checkbox" />Install+MàJ MSE/Antivir &nbsp; <input type="checkbox" />Install+MàJ Spybot</td>
</tr>

</table>
<br />
<h2>Observations diverses / Travail à effectuer :</h2>
	<center><a href="../index.php?p=demande">Retour accueil</a></center>
</body>

