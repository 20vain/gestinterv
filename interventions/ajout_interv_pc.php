<?php include_once ("../admin/auth_db.php");

// Récupération des données
$codePreInterv = $_POST["idPreinterv"];
$codeClient = $_POST["codeClient"];
$dateInterv = $_POST["dateInterv"];

$antivirusexterne = $_POST["antivirus-externe"];
	$antivirusinterne = $_POST["antivirus-interne"];
$antivirus = "$antivirusexterne+$antivirusinterne";
		
if ( isset($_POST["adwcleaner"]) ) 
{ $adwcleaner = $_POST["adwcleaner"]; $antivirus = "$antivirus+$adwcleaner"; } // Si la case adwcleaner a été cochée, une indication sera mise dans la colonne antivirus

if ( isset($_POST["ccleaner"]) ) 
{ $roguekiller = $_POST["ccleaner"]; $antivirus = "$antivirus+$roguekiller"; } // Si la case ccleaner a été cochée, une indication sera mise dans la colonne antivirus

if ( isset($_POST["roguekiller"]) ) 
{ $ccleaner = $_POST["roguekiller"]; $antivirus = "$antivirus+$ccleaner"; } // Si la case ccleaner a été cochée, une indication sera mise dans la colonne antivirus

$malwaresexterne = $_POST["malwares-externe"];
	$malwaresinterne = $_POST["malwares-interne"];
$malwares = "$malwaresexterne+$malwaresinterne";

$spywares = $_POST["spywares"]; // Récupération du nombre de spywares
if ( isset($_POST["scan-redemarrage"]) ) // Si la case "Scan au redémarrage" a été cochée, alors on récupère le choix
{ $scan_redemarrage = $_POST["scan-redemarrage"]; $spywares = "$spywares+$scan_redemarrage"; } // et on ajoute l'information au nombre total de spywares détectés


// Récupération des cases cochées - LOGICIELS
if ( isset($_POST['logiciels']) && !empty($_POST['logiciels']) ) // Si les POST_Logiciels existent & ne sont pas vides
{
	foreach ($_POST['logiciels'] as $logiciels) // Pour tous les POST_Logiciel devenu ici la variable "$logiciels"
		{ $tabLogiciels[] = $logiciels; } // Remplissage d'un tableau contenant les POST_logiciels

			// Tableau comprenant toutes les cases cochées - Regroupement en une seule ligne
			$strLogiciels =  (implode(", ", $tabLogiciels));
}
else 
{ $strLogiciels = " "; } // Aucun statut de coché

// Récupération des cases cochées - MAJ


// Récupération des cases cochées - VIRUS
if ( isset($_POST['virus']) && (!empty($_POST['virus'])) ) // Si les POST_Logiciels existent & ne sont pas vides
{

	foreach ($_POST['virus'] as $virus) // Pour tous les POST_Logiciel devenu ici la variable "$logiciels"
		{ $tabVirus[] = $virus; }// Remplissage d'un tableau contenant les POST_logiciels

			// Tableau comprenant toutes les cases cochées - Regroupement en une seule ligne
			$strVirus =  (implode(", ", $tabVirus));
}
else 
{ $strVirus = " "; } // Aucun statut de coché


if ( isset($_POST['maj']) && !empty($_POST['maj']) ) // Si les POST_Logiciels existent & ne sont pas vides
{
	foreach ($_POST['maj'] as $maj) // Pour tous les POST_Logiciel devenu ici la variable "$logiciels"
		{ $tabMaj[] = $maj; }// Remplissage d'un tableau contenant les POST_logiciels

			// Tableau comprenant toutes les cases cochées - Regroupement en une seule ligne
			$strMaj =  (implode(", ", $tabMaj));
}
else 
{ $strMaj = " "; } // Aucun statut de coché


// Récupération des cases cochées - SAUVEGARDES
if ( isset($_POST['sauvegarde']) && !empty($_POST['sauvegarde']) ) // Si les POST_Logiciels existent & ne sont pas vides
{
	foreach ($_POST['sauvegarde'] as $sauvegarde) // Pour tous les POST_Logiciel devenu ici la variable "$logiciels"
		{ $tabSauvegarde[] = $sauvegarde; }// Remplissage d'un tableau contenant les POST_logiciels

			// Tableau comprenant toutes les cases cochées - Regroupement en une seule ligne
			$strSauvegarde =  (implode(", ", $tabSauvegarde));
			}
else 
{ $strSauvegarde = " "; } // Aucun statut de coché

// Récupération des cases cochées - RAM
if (isset($_POST['ram']) && !empty($_POST['ram'])) // Si les POST_Logiciels existent & ne sont pas vides
{
	foreach ($_POST['ram'] as $ram) // Pour tous les POST_Logiciel devenu ici la variable "$logiciels"
		{ $tabRam[] = $ram; }// Remplissage d'un tableau contenant les POST_logiciels

			// Tableau comprenant toutes les cases cochées - Regroupement en une seule ligne
			$strRam =  (implode(", ", $tabRam));
			}
else 
{ $strRam = " "; } // Aucun statut de coché


$intervention = $_POST["intervention"];
$materiel = $_POST["materiel"];
$fiabilite = $_POST['fiabilite'];

$observation = $_POST["observation"];

	if ( isset($_POST["serveur"]) ) // Si une information complémentaire quant aux nettoyages a été saisie, alors on la saisie dans la case observations
	{
		$nom_serveur = $_POST["serveur"];
		$sauvegarde = "Les fichiers sont sauvegardés sur le serveur ".$nom_serveur;
		$observation = "$observation | $sauvegarde";
	}
	
	if ( isset($_POST["poidsSauvegarde"]) )
	{ $poidsSauvegarde = $_POST["poidsSauvegarde"]; }
	
	if ( isset($_POST["suppression-ancien-antivirus"]) ) // Si une information complémentaire quant aux nettoyages a été saisie, alors on la saisie dans la case observations
	{ 
		if ( ($_POST["suppression-ancien-antivirus"]) != "Non nécessaire" )
		{
			$nom_ancien_antivirus = $_POST["suppression-ancien-antivirus"];
			$ancien_antivirus = "| L\'antivirus ".$nom_ancien_antivirus." précédemment installé sur le PC a été supprimé et remplacé par MSE (Antivirus Microsoft gratuit).";
			$observation = "$observation | $ancien_antivirus";
		}
	}

$technicien = $_POST["technicien"];

if (isset($_POST["cout-interv"])) 
	{ $prix = $_POST["cout-interv"]; } 
else if ( (isset($_POST["mo-atelier"])) && ($_POST["mo-atelier"] == "1") ) 
	{ $prix = $_POST["cout-mo"]; $mo_atelier = "1"; }
else { $prix = ""; }


	if (isset($_POST["coutcomp1"]))
	{$coutcomp1 = $_POST["prix-coutcomp1"];
	$namecoutcomp1 = $_POST["name-coutcomp1"];}

	if (isset($_POST["coutcomp2"]))
	{$coutcomp2 = $_POST["prix-coutcomp2"];
	$namecoutcomp2 = $_POST["name-coutcomp2"];}
	
	if (isset($_POST["coutcomp3"]))
	{$coutcomp3 = $_POST["prix-coutcomp3"];
	$namecoutcomp3 = $_POST["name-coutcomp3"];}
	
	if (isset($_POST["coutcomp4"]))
	{$coutcomp4 = $_POST["prix-coutcomp4"];
	$namecoutcomp4 = $_POST["name-coutcomp4"];}

	if ( (isset($coutcomp1)) && (empty($coutcomp2)) && (empty($coutcomp3)) && (empty($coutcomp4)) )
	{$cout_complementaire = $coutcomp1." € --> ".$namecoutcomp1;}
	else if ( (isset($coutcomp1)) && (isset($coutcomp2)) && (empty($coutcomp3)) && (empty($coutcomp4)) )
	{$cout_complementaire = $coutcomp1+$coutcomp2." € --> ".$namecoutcomp1." + ".$namecoutcomp2;}
	else if ( (isset($coutcomp1)) && (isset($coutcomp2)) && (isset($coutcomp3)) && (empty($coutcomp4)) )
	{$cout_complementaire = $coutcomp1+$coutcomp2+$coutcomp3." € --> ".$namecoutcomp1." + ".$namecoutcomp2." + ".$namecoutcomp3;}
	else if ( (isset($coutcomp1)) && (isset($coutcomp2)) && (isset($coutcomp3)) && (isset($coutcomp4)) )
	{$cout_complementaire = $coutcomp1+$coutcomp2+$coutcomp3+$coutcomp4." € --> ".$namecoutcomp1." + ".$namecoutcomp2." + ".$namecoutcomp3." + ".$namecoutcomp4;}
	else {$cout_complementaire = "";}
	
$statut = $_POST["statut"];

$session = $_POST["session"];
$password = $_POST["password"];

$add_interv = "INSERT INTO tinterventions VALUES ('','$codeClient','$codePreInterv','$dateInterv','$antivirus','$malwares','$spywares','$strLogiciels','$strMaj','$strVirus','$strSauvegarde','$poidsSauvegarde','$strRam','$intervention','$materiel','$fiabilite','$observation','$technicien','$prix','$cout_complementaire','$statut','$session','$password');";

$req = mysql_query ( $add_interv ) or die ( mysql_error() ) ;
	// FIN - AJOUT D'UNE INTERVENTION
	
$codeIntervention = mysql_insert_id(); // Reprise du code de l'intervention pour la redirection

if ( (isset($_POST["orange"]) ) )
{ $orange = $_POST["orange"]; }

if ( (isset($_POST["win7"]) ) )
{ $win7 = $_POST["win7"]; }

if ( (isset($_POST["win8"]) ) )
{ $win8 = $_POST["win8"]; }

// SUPPRESSION DE LA FICHE DE PRE-INTERVENTION CONCERNEE
$del = "DELETE FROM tpreinterv WHERE id='$codePreInterv';";
$req = mysql_query ( $del ) or die ( mysql_error() ) ;

// MàJ magasin (emplacement du PC)
$magasin = $_POST["magasin"];
$update1 = "UPDATE tclients SET magasin='$magasin' WHERE id='$codeClient' ;";
$sql1 = mysql_query ( $update1 ) or die ( mysql_error() ) ;
?>
<!DOCTYPE html>
<html>

<head>
	<!-- Loading Bootstrap -->
    <link href="../bootstrap/css/bootstrap.css" rel="stylesheet">	
</head>

<body>

<div class="alert alert-success">
	<h2>Création de la fiche d'intervention n° <?php echo $codeIntervention; ?> réussie !</h2> <!-- TITRE -->

	<hr />

	<center>
		<form action ="../index.php?p=modifinterv" method="POST">
			<input type="hidden" name="id" value="<?php echo $codeIntervention; ?>" /> <input type="hidden" name="codeClient" value="<?php echo $codeClient; ?>" /> 
			<?php if ( isset($mo_atelier) && $mo_atelier == "1" ) { echo "<input type='hidden' name='mo-atelier' value='1' />"; } ?>
			<?php if ( isset($orange) ) {echo "<input type='hidden' name='orange' value='1' />"; } ?>
			<?php if ( isset($win7) ) {echo "<input type='hidden' name='win7' value='1' />"; } ?>
			<?php if ( isset($win8) ) {echo "<input type='hidden' name='win8' value='1' />"; } ?>
			L'intervention a bien été a bien été ajoutée !<br />
			Cliquez sur le <b>bouton ci-dessous pour être rediriger vers la fiche d'intervention en cours.</b><br /><br />
			<button class="btn btn-lg btn-warning">Redirection vers la fiche d'intervention<br /><span class="glyphicon glyphicon-wrench"></span></button>
		</form>

	<hr />

	<h4>Impression de la fiche</h4><br />
		<form action="print_interv_pc.php" method="POST"> <input type="hidden" name="id" value="<?php echo $codeIntervention; ?>">
			<?php if ( isset($orange) ) {echo "<input type='hidden' name='orange' value='1' />"; } ?>
			<?php if ( isset($win7) ) {echo "<input type='hidden' name='win7' value='1' />"; } ?>
			<?php if ( isset($win8) ) {echo "<input type='hidden' name='win8' value='1' />"; } ?>
		L'intervention a bien été a bien été créée !<br />
		La fiche de pré-intervention a été <b>supprimée</b> !<br /><br />
		<button class="btn btn-lg btn-success">Imprimer la fiche<br /><span class="glyphicon glyphicon-print"></span></button>
		</form>
	
	<hr />

		<form action ="../index.php?p=interv" method="POST">
			Cliquez sur le bouton ci-dessous pour être rediriger vers le récapitulatif des fiches d'intervention.<br /><br />
			<button class="btn btn-lg btn-primary">Redirection vers<br />récapitulatif des fiches d'intervention<br /><span class="glyphicon glyphicon-list-alt"></span></button>
		</form>
	
	<hr />
	
		<?php if ($statut == "Terminé - OK")
	{ ?>
		<form action ="sms_interv.php" method="POST">
			<input type="hidden" name="codeClient" value="<?php echo $codeClient; ?>">
			<input type="hidden" name="codeIntervention" value="<?php echo $codeIntervention; ?>">
			Pour envoyer un SMS au client,<br />
			Cliquez sur le <b>bouton ci-dessous.</b><br /><br />
			<center><button class="btn btn-large btn-success"><span class="glyphicon glyphicon-print"></span><br />Envoyer un SMS</button></center>
		</form>
	<?php // Fin condition pour SMS
	} ?>
		
	</center>
</div>

</body>
</html>
