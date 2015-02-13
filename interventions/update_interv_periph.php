<?php
include('../admin/auth_db.php');


// Récupération des données
$codeIntervention = htmlentities($_POST["id"]);
$codeClient = htmlentities($_POST["codeClient"]);
$dateInterv = htmlentities($_POST["dateInterv"]);


$strLogiciels = " ";
$strMaj = " ";
$strVirus = " ";
$strReinstall = " ";
$strRam = " ";
$strSauvegarde = " ";
$poidsSauvegarde = " ";
$fiabilite = " ";
$antivirus = " ";
$malwares = " ";
$spywares = " ";


$intervention = htmlentities($_POST["intervention"]);
$materiel = htmlentities($_POST["materiel"]);

$observation = htmlentities($_POST["observation"]);

$technicien = htmlentities($_POST["technicien"]);

if (isset($_POST["cout-interv"])) 
	{ $prix = htmlentities($_POST["cout-interv"]); } 
else if ( (isset($_POST["mo-atelier"])) && ($_POST["mo-atelier"] == "1") ) 
	{ $prix = htmlentities($_POST["cout-mo"]); $mo_atelier = "1"; }
else { $prix = ""; }

if (isset($_POST["coutcomp1"]))
	{$coutcomp1 = htmlentities($_POST["prix-coutcomp1"]);
	$namecoutcomp1 = htmlentities($_POST["name-coutcomp1"]);}

	if (isset($_POST["coutcomp2"]))
	{$coutcomp2 = htmlentities($_POST["prix-coutcomp2"]);
	$namecoutcomp2 = htmlentities($_POST["name-coutcomp2"]);}
	
	if (isset($_POST["coutcomp3"]))
	{$coutcomp3 = htmlentities($_POST["prix-coutcomp3"]);
	$namecoutcomp3 = htmlentities($_POST["name-coutcomp3"]);}

	if ( (isset($coutcomp1)) && (empty($coutcomp2)) && (empty($coutcomp3)) )
	{$cout_complementaire = $coutcomp1." € --> ".$namecoutcomp1;}
	else if ( (isset($coutcomp1)) && (isset($coutcomp2)) && (empty($coutcomp3)) )
	{$cout_complementaire = $coutcomp1+$coutcomp2." € --> ".$namecoutcomp1." + ".$namecoutcomp2;}
	else if ( (isset($coutcomp1)) && (isset($coutcomp2)) && (isset($coutcomp3)) )
	{$cout_complementaire = $coutcomp1+$coutcomp2+$coutcomp3." € --> ".$namecoutcomp1." + ".$namecoutcomp2." + ".$namecoutcomp3;}
	else {$cout_complementaire = "";}

$statut = " ";
$password = " ";

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
</div>

</body>
</html>