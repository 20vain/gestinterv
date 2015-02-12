<?php
include('../admin/auth_db.php');

// Récupération des cases cochées - LOGICIELS
if ( isset($_POST['logiciels']) && (!empty($_POST['logiciels'])) ) // Si les POST_Logiciels existent & ne sont pas vides
{
	foreach ($_POST['logiciels'] as $logiciels) // Pour tous les POST_Logiciel devenu ici la variable "$logiciels"
		{ $tabLogiciels[] = $logiciels; } // Remplissage d'un tableau contenant les POST_logiciels

			// Tableau comprenant toutes les cases cochées - Regroupement en une seule ligne
			$strLogiciels = addslashes( (implode(", ", $tabLogiciels)) );
}
else 
{ $strLogiciels = " "; } // Aucun statut de coché

// Récupération des cases cochées - MAJ


if ( isset($_POST['maj']) && (!empty($_POST['maj'])) ) // Si les POST_Logiciels existent & ne sont pas vides
{
	foreach ($_POST['maj'] as $maj) // Pour tous les POST_Logiciel devenu ici la variable "$logiciels"
		{ $tabMaj[] = $maj; }// Remplissage d'un tableau contenant les POST_logiciels

			// Tableau comprenant toutes les cases cochées - Regroupement en une seule ligne
			$strMaj = addslashes( (implode(", ", $tabMaj)) );
}
else 
{ $strMaj = " "; } // Aucun statut de coché


// Récupération des cases cochées - VIRUS
if ( isset($_POST['virus']) && (!empty($_POST['virus'])) ) // Si les POST_Logiciels existent & ne sont pas vides
{

	foreach ($_POST['virus'] as $virus) // Pour tous les POST_Logiciel devenu ici la variable "$logiciels"
		{ $tabVirus[] = $virus; }// Remplissage d'un tableau contenant les POST_logiciels

			// Tableau comprenant toutes les cases cochées - Regroupement en une seule ligne
			$strVirus = addslashes( (implode(", ", $tabVirus)) );
}
else 
{ $strVirus = " "; } // Aucun statut de coché


// Récupération des cases cochées - PERIPHERIQUES A REINSTALLER
if ( isset($_POST['sauvegarde']) && (!empty($_POST['sauvegarde'])) ) // Si les POST_Logiciels existent & ne sont pas vides
{
	foreach ($_POST['sauvegarde'] as $sauvegarde) // Pour tous les POST_Logiciel devenu ici la variable "$logiciels"
		{ $tabSauvegarde[] = $sauvegarde; }// Remplissage d'un tableau contenant les POST_logiciels

			// Tableau comprenant toutes les cases cochées - Regroupement en une seule ligne
			$strSauvegarde = addslashes( (implode(", ", $tabSauvegarde)) );
			}
else 
{ $strSauvegarde = " "; } // Aucun statut de coché

// Récupération des cases cochées - RAM
if ( isset($_POST['ram']) && (!empty($_POST['ram'])) ) // Si les POST_Logiciels existent & ne sont pas vides
{
	foreach ($_POST['ram'] as $ram) // Pour tous les POST_Logiciel devenu ici la variable "$logiciels"
		{ $tabRam[] = $ram; }// Remplissage d'un tableau contenant les POST_logiciels

			// Tableau comprenant toutes les cases cochées - Regroupement en une seule ligne
			$strRam = addslashes( (implode(", ", $tabRam)) );
			}
else 
{ $strRam = " "; } // Aucun statut de coché

// Récupération des données
$codeIntervention = $_POST["idIntervention"];
$codeClient = $_POST["codeClient"];
$dateInterv = $_POST["dateInterv"];

$antivirusexterne = $_POST["antivirus-externe"];
	$antivirusinterne = $_POST["antivirus-interne"];
$antivirus = "$antivirusexterne+$antivirusinterne";

if ( isset($_POST["cookies"]) ) 
{ $cookies = $_POST["cookies"]; $antivirus = "$antivirus+$cookies"; } // Si la case cookies a été cochée, une indication sera mise dans la colonne antivirus

if ( isset($_POST["adwcleaner"]) ) 
{ 
	$adwcleaner = $_POST["adwcleaner"]; 
	$antivirus = "$antivirus+$adwcleaner"; 
} // Si la case adwcleaner a été cochée, une indication sera mise dans la colonne antivirus

if ( isset($_POST["ccleaner"]) ) 
{ 
	$ccleaner = $_POST["ccleaner"];
	$antivirus = "$antivirus+$ccleaner"; 
} // Si la case ccleaner a été cochée, une indication sera mise dans la colonne antivirus


if ( isset($_POST["malwaresbytes-mode"]) ) { $malwaresbytes_mode = $_POST["malwaresbytes-mode"]; } // Si le mode malwaresbytes a été choisi, alors on le récupère.

$malwaresexterne = $_POST["malwares-externe"];
	$malwaresinterne = $_POST["malwares-interne"];
$malwares = "$malwaresexterne+$malwaresinterne";

		
$spywares = $_POST["spywares"]; // Récupération du nombre de spywares
if ( isset($_POST["scan-redemarrage"]) ) // Si la case "Scan au redémarrage" a été cochée, alors on récupère le choix
{ $scan_redemarrage = $_POST["scan-redemarrage"]; $spywares = "$spywares+$scan_redemarrage"; } // et on ajoute l'information au nombre total de spywares détectés

$intervention = $_POST["intervention"];
$materiel = $_POST["materiel"];
$fiabilite = addslashes($_POST['fiabilite']);

$observation = addslashes($_POST["observation"]);

	if ( isset($_POST["serveur"]) ) // Si une information complémentaire quant aux nettoyages a été saisie, alors on la saisie dans la case observations
	{ 
		$nom_serveur = $_POST["serveur"];
		$sauvegarde = "Les fichiers sont sauvegardés sur le serveur ".$nom_serveur;
		$observation = "$observation | $sauvegarde";
		$observation = addslashes($observation);
	}
	
	if ( isset($_POST["poidsSauvegarde"]) )
	{ $poidsSauvegarde = $_POST["poidsSauvegarde"]; }
	
	if ( isset($_POST["suppression-ancien-antivirus"]) ) // Si une information complémentaire quant aux nettoyages a été saisie, alors on la saisie dans la case observations
	{ 
		if ( ($_POST["suppression-ancien-antivirus"]) != "Non nécessaire" )
		{
			$nom_ancien_antivirus = $_POST["suppression-ancien-antivirus"];
			$ancien_antivirus = "| L\'ancien antivirus ".$nom_ancien_antivirus." a été supprimé et remplacé par MSE.";
			$observation = "$observation | $ancien_antivirus";
			$observation = addslashes($observation);
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

	if ( (isset($coutcomp1)) && (empty($coutcomp2)) && (empty($coutcomp3)) )
	{$cout_complementaire = $coutcomp1." € --> ".$namecoutcomp1;}
	else if ( (isset($coutcomp1)) && (isset($coutcomp2)) && (empty($coutcomp3)) )
	{$cout_complementaire = $coutcomp1+$coutcomp2." € --> ".$namecoutcomp1." + ".$namecoutcomp2;}
	else if ( (isset($coutcomp1)) && (isset($coutcomp2)) && (isset($coutcomp3)) )
	{$cout_complementaire = $coutcomp1+$coutcomp2+$coutcomp3." € --> ".$namecoutcomp1." + ".$namecoutcomp2." + ".$namecoutcomp3;}
	else {$cout_complementaire = "";}

$statut = $_POST["statut"];
$password = $_POST["password"];

$update = "UPDATE tinterventions SET dateInterv='$dateInterv', antivirus='$antivirus', malwares='$malwares', spybot='$spywares', logiciels='$strLogiciels', maj='$strMaj', virus='$strVirus', sauvegarde='$strSauvegarde', poidsSauvegarde='$poidsSauvegarde', ram='$strRam', intervention='$intervention', materiel='$materiel', observations='$observation', technicien='$technicien', prix='$prix', coutAnnexe='$cout_complementaire', statut='$statut', password='$password', fiabilite='$fiabilite' WHERE id='$codeIntervention' ;";
$sql = mysql_query ( $update ) or die ( mysql_error() ) ;

// MàJ magasin (emplacement du PC)
$magasin = $_POST["magasin"];
$update1 = "UPDATE tclients SET magasin='$magasin' WHERE id='$codeClient' ;";
$sql1 = mysql_query ( $update1 ) or die ( mysql_error() ) ;

// Affichage du nom du client
$sql2 = mysql_query ( "SELECT tclients.nom,tclients.prenom FROM tclients WHERE id='$codeClient' ;" ) or die ( mysql_error() ) ;
$ligne1 = mysql_fetch_array ($sql2);

?>

<!DOCTYPE html>
<html>

<head>
	<link href="../css/style.css" rel="stylesheet" type="text/css" />
	<!-- Loading Bootstrap -->
    <link href="../bootstrap/css/bootstrap.css" rel="stylesheet">
	
</head>

<body align="center">

<div class="alert alert-success">
<center>
	<h2>Modifications de la fiche d'intervention n° <?php echo $codeIntervention; ?> du client <u><?php echo $ligne1["nom"]; ?></u> - REUSSITE ! -</h2> <!-- TITRE -->

	<form action ="../index.php?p=modifinterv" method="POST">
		<input type="hidden" name="id" value="<?php echo $codeIntervention; ?>"> <input type="hidden" name="codeClient" value="<?php echo $codeClient; ?>">
		<?php if ( isset($mo_atelier) && $mo_atelier == "1" ) { echo "<input type='hidden' name='mo-atelier' value='1' />"; } ?>
		L'intervention a bien été a bien été modifiée !<br />
		Cliquez sur le <b>bouton ci-dessous pour être rediriger vers la fiche d'intervention en cours.</b><br /><br />
		<center><button class="btn btn-large btn-warning"><span class="glyphicon glyphicon-wrench"></span><br />
		Redirection vers la fiche d'intervention en cours<br />
		client <b><?php echo $ligne1["nom"]." ".$ligne1["prenom"]; ?></b></button></center>
	</form>

	<hr />

	<form action ="print_interv_pc.php" method="POST">
		<input type="hidden" name="id" value="<?php echo $codeIntervention; ?>">
		Pour imprimer la fiche d'intervention,<br />
		Cliquez sur le <b>bouton ci-dessous.</b><br /><br />
		<center><button class="btn btn-large btn-success"><span class="glyphicon glyphicon-print"></span><br />Lancer l'impression</button></center>
	</form>

	<hr />

	<form action ="../index.php?p=interv" method="post">
		Cliquez sur le bouton ci-dessous pour être <b>rediriger vers le récapitulatif des fiches d'intervention.</b><br /><br />
		<center><button class="btn btn-large btn-primary"><span class="glyphicon glyphicon-list-alt"></span><br />Redirection vers<br />synthèse des fiches d'intervention</button></center>
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