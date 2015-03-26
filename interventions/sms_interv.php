<?php include('../admin/auth_db.php');

// Fiche client
$codeClient = $_POST["codeClient"];
$nom_client = mysql_query ( "SELECT * FROM tclients WHERE id = '$codeClient' ;" ) or die ( mysql_error() ) ;
	$ligne = mysql_fetch_array($nom_client);
	
$codeIntervention = $_POST["codeIntervention"];
$intervention = mysql_query ( "SELECT * FROM tinterventions WHERE id = '$codeIntervention' ;" ) or die ( mysql_error() ) ;
	$ligne1 = mysql_fetch_array($intervention);
?>

Client à contacter : <?php echo $ligne["nom"]; ?> <?php echo $ligne["prenom"]; ?> <br />
Numéro de téléphone PORTABLE = <?php echo $ligne["telPort"]; ?><hr />
Bonjour Mr/Mme <?php echo $ligne["nom"]; ?>, votre <?php echo $ligne1["materiel"]; ?> a été dépanné et est prêt. Vous pouvez dès à présent le récupérer au magasin MIS <?php echo $ligne["magasin"]; ?>. Merci d'avance.

<div class="alert alert-success">
	<form action ="../index.php?p=interv" method="post">
		Cliquez sur le bouton ci-dessous pour être <b>rediriger vers le récapitulatif des fiches d'intervention.</b><br /><br />
		<center><button class="btn btn-large btn-primary"><span class="glyphicon glyphicon-list-alt"></span><br />Redirection vers<br />synthèse des fiches d'intervention</button></center>
	</form>
</div>