<?php include('../admin/auth_db.php');

// Fiche client
$codeClient = htmlentities($_POST["codeClient"]);
$nom_client = mysql_query ( "SELECT * FROM tclients WHERE id = '$codeClient' ;" ) or die ( mysql_error() ) ;
	$ligne = mysql_fetch_array($nom_client);
	
$codeIntervention = $_POST["codeIntervention"];
$intervention = mysql_query ( "SELECT * FROM tinterventions WHERE id = '$codeIntervention' ;" ) or die ( mysql_error() ) ;
	$ligne1 = mysql_fetch_array($intervention);
?>

Client à contacter : <?php echo htmlentities($ligne["nom"]); ?> <?php echo htmlentities($ligne["prenom"]); ?> <br />
Numéro de téléphone PORTABLE = <?php echo htmlentities($ligne["telPort"]); ?><hr />
Bonjour Mr/Mme <?php echo htmlentities($ligne["nom"]); ?>, votre <?php echo htmlentities($ligne1["materiel"]); ?> a été dépanné et est prêt. Vous pouvez dès à présent le récupérer au magasin MIS <?php echo htmlentities($ligne["magasin"]); ?>. Merci d'avance.