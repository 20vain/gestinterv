<?php include('../admin/auth_db.php');

// Fiche client
<<<<<<< HEAD
$codeClient = htmlentities($_POST["codeClient"]);
=======
$codeClient = $_POST["codeClient"];
>>>>>>> origin/master
$nom_client = mysql_query ( "SELECT * FROM tclients WHERE id = '$codeClient' ;" ) or die ( mysql_error() ) ;
	$ligne = mysql_fetch_array($nom_client);
	
$codeIntervention = $_POST["codeIntervention"];
$intervention = mysql_query ( "SELECT * FROM tinterventions WHERE id = '$codeIntervention' ;" ) or die ( mysql_error() ) ;
	$ligne1 = mysql_fetch_array($intervention);
?>

<<<<<<< HEAD
Client à contacter : <?php echo htmlentities($ligne["nom"]); ?> <?php echo htmlentities($ligne["prenom"]); ?> <br />
Numéro de téléphone PORTABLE = <?php echo htmlentities($ligne["telPort"]); ?><hr />
Bonjour Mr/Mme <?php echo htmlentities($ligne["nom"]); ?>, votre <?php echo htmlentities($ligne1["materiel"]); ?> a été dépanné et est prêt. Vous pouvez dès à présent le récupérer au magasin MIS <?php echo htmlentities($ligne["magasin"]); ?>. Merci d'avance.
=======
Client à contacter : <?php echo $ligne["nom"]; ?> <?php echo $ligne["prenom"]; ?> <br />
Numéro de téléphone PORTABLE = <?php echo $ligne["telPort"]; ?><hr />
Bonjour Mr/Mme <?php echo $ligne["nom"]; ?>, votre <?php echo $ligne1["materiel"]; ?> a été dépanné et est prêt. Vous pouvez dès à présent le récupérer au magasin MIS <?php echo $ligne["magasin"]; ?>. Merci d'avance.
>>>>>>> origin/master
