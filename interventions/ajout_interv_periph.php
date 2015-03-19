<?php include_once ("../admin/auth_db.php");

// Récupération des données
$codePreInterv = $_POST["idPreinterv"];
$codeClient = $_POST["codeClient"];
$dateInterv = $_POST["dateInterv"];

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

$intervention = $_POST["intervention"];
$materiel = $_POST["materiel"];

$observation = $_POST["observation"];

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

$session = " ";
$password = " ";

$add_interv = "INSERT INTO tinterventions VALUES ('','$codeClient','$codePreInterv','$dateInterv','$antivirus','$malwares','$spywares','$strLogiciels','$strMaj','$strVirus','$strSauvegarde','$poidsSauvegarde','$strRam','$intervention','$materiel','$fiabilite','$observation','$technicien','$prix','$cout_complementaire','$statut','$session','$password');";

$req = mysql_query ( $add_interv ) or die ( mysql_error() ) ;
	// FIN - AJOUT D'UNE INTERVENTION
	
$codeIntervention = mysql_insert_id(); // Reprise du code de l'intervention pour la redirection


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
	<h2>Création de la fiche d'intervention n° <?php echo $codeIntervention; ?> - REUSSITE ! -</h2> <!-- TITRE -->

	<hr />

	<center>
		<form action ="../index.php?p=modifinterv" method="POST">
			<input type="hidden" name="id" value="<?php echo $codeIntervention; ?>" /> <input type="hidden" name="codeClient" value="<?php echo $codeClient; ?>" /> 
			<?php if ( isset($mo_atelier) && $mo_atelier == "1" ) { echo "<input type='hidden' name='mo-atelier' value='1' />"; } ?>
			<?php if ( isset($winxp) ) {echo "<input type='hidden' name='winxp' value='1' />"; } ?>
			<?php if ( isset($win7) ) {echo "<input type='hidden' name='win7' value='1' />"; } ?>
			<?php if ( isset($win8) ) {echo "<input type='hidden' name='win8' value='1' />"; } ?>
			L'intervention a bien été a bien été ajoutée !<br />
			Cliquez sur le <b>bouton ci-dessous pour être rediriger vers la fiche d'intervention en cours.</b><br /><br />
			<button class="btn btn-lg btn-warning">Redirection vers la fiche d'intervention<br /><span class="glyphicon glyphicon-wrench"></span></button>
		</form>
	</center>

	<hr />

	<center>
	<h4>Impression de la fiche</h4><br />
		<form action="print_interv_pc.php" method="POST"> <input type="hidden" name="id" value="<?php echo $codeIntervention; ?>">
			<?php if ( isset($winxp) ) {echo "<input type='hidden' name='winxp' value='1' />"; } ?>
			<?php if ( isset($win7) ) {echo "<input type='hidden' name='win7' value='1' />"; } ?>
			<?php if ( isset($win8) ) {echo "<input type='hidden' name='win8' value='1' />"; } ?>
		L'intervention a bien été a bien été créée !<br />
		La fiche de pré-intervention a été <b>supprimée</b> !<br /><br />
		<button class="btn btn-lg btn-success">Imprimer la fiche<br /><span class="glyphicon glyphicon-print"></span></button>
		</form>
	</center>
	
	<hr />

	<center>
		<form action ="../index.php?p=interv" method="POST">
			Cliquez sur le bouton ci-dessous pour être rediriger vers le récapitulatif des fiches d'intervention.<br /><br />
			<button class="btn btn-lg btn-primary">Redirection vers<br />récapitulatif des fiches d'intervention<br /><span class="glyphicon glyphicon-list-alt"></span></button>
		</form>
	</center>
</div>

</body>
</html>
