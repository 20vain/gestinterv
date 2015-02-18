<?php
include_once ("admin/auth_db.php");
include_once ("admin/functions.php");

// Si l'url ".../index.php?page=" est vide, alors on redirige sur la bonne url.
if (empty(htmlentities($_GET["p"]))) { header("Location: index.php?p=index"); }


// --- AJOUT D'UNE NEWS
if ( (!empty($_POST)) && (isset($_POST["ajout"])) && ($_POST["ajout"]=="1") )
{
	$news 		= htmlentities($_POST["news"]); // Récupération de la news + Sécurité caractères spéciaux
	$dateNews 	= htmlentities($_POST["dateNews"]); // Récupération de la date
	$auteur 	= htmlentities($_POST["auteur"]); // Récupération auteur de la news + Sécurité caractères spéciaux

	$add 		= mysql_query ( "INSERT INTO tnews VALUES ('','$news','$dateNews','$auteur');" ) or die ( mysql_error() ) ; // Insertion des données dans la BDD - Si pb, affichage d'une erreur
?>
	<div class="alert alert-success">
		Le message a bien été <strong>publié</strong> !
	</div>
<?php
}
// FIN PROCEDURE AJOUT NEWS


// --- SUPPRESSION D'UNE NEWS
else if ( (!empty($_POST)) && (isset($_POST["delete"])) && ($_POST["delete"]=="1") )
{
	$id	= htmlentities($_POST["id"]);
	delete($id,"tnews");
?>
	<div class="alert alert-warning">
		Le message n° <?php echo $id; ?> vient d'être <strong>supprimé</strong> !
	</div>
<?php
} // FIN FONCTION SUPPRESSION

else { } // Si il n'y a pas de suppression, on ne fait rien
?>

<!DOCTYPE html>
<html lang="fr">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

	<title>Gestinterv</title>

<!-- CSS -->
	<link href="css/style.css" rel="stylesheet"> <!-- Fichier STYLE alternatif pour calendrier JS & autres -->
	<link href="bootstrap/css/bootstrap.css" rel="stylesheet"> <!-- BOOTSTRAP 3.3.1 -->

<!-- JS -->
	<script type="text/javascript" src="js/calendar.js"></script> <!-- Script JS Calendrier -->
	<script src="js/jquery.min.js" type="text/javascript"></script> <!-- jQuery 2.1.3 -->
	<script src="bootstrap/js/bootstrap.js"></script> <!-- BOOTSTRAP JS 3.3.1 -->

	<script> 
	$(document).ready(function(){
		$("#flip").click(function(){
			$("#panel").slideToggle("slow");
		});
	});
	</script>
	
</head>

<body id="top">

<div class="container">

<?php // TITRES sur la page d'accueil
switch (htmlentities(htmlentities($_GET['p']))) {
	case 'accueil':
		echo "<div class='page-header well'> <h1>Accueil - Gestion des interventions</h1> </div>";
	break;
	
	// CLIENTS
	case 'clients':
		echo "<div class='page-header well'> <h1>Gestion de la clientèle</h1> </div>";
	break;
	
	case 'listing_clients':
		echo "<div class='page-header well'> <h1>Liste des clients</h1> </div>";
	break;
	
	case 'ficheclient':
		echo "<div class='page-header well'> <h1>Fiche client - Affichage et opérations</h1> </div>";
	break;
	
	case 'add_client':
		echo "<div class='page-header well'> <h1>Ajout d'une nouvelle fiche client</h1> </div>";
	break;
	
	case 'recherche':
		echo "<div class='page-header well'> <h1>Recherche d'un client<h1> </div>";
	break;
	
	case 'modifclient':
		echo "<div class='page-header well'> <h1>Modification d'une fiche client<h1> </div>";
	break;
	
	
	
	// INTERVENTION
	case 'demande':
		echo "<div class='page-header well'> <h1>Ajouter une demande d'intervention<h1> </div>";
	break;
	
	case 'ajoutdemande':
		echo "<div class='page-header well'> <h1>Ajouter une demande d'intervention<h1> </div>";
	break;
	
	case 'interv':
		echo "<div class='page-header well'> <h1>Affichage des différents tableaux d'interventions<h1> </div>";
	break;
	
	case 'transfo-demande':
		echo "<div class='page-header well'> <h1>Transformation d'une demande en intervention<h1> </div>";
	break;
	
	case 'modifinterv':
		echo "<div class='page-header well'> <h1>Modification d'une intervention<h1> </div>";
	break;
	
	
	// ADMINISTRATION	
	case 'administration':
		echo "<div class='page-header well'> <h1>Administration générale du système</h1> </div>";
	break;
	
	default:
		echo "<div class='page-header well'> <h1>Accueil - Gestion des interventions</h1> </div>";
	break;
	
	}
?>

<nav class="navbar navbar-default" role="navigation">
	<div class="container">
		<?php 
		if (htmlentities($_GET["p"]) == "index") { 
			echo '<a href="index.php?p=index" class="btn btn-default btn-lg active"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> <b>Accueil</b></a>';
		}
			else {
				echo '<a href="index.php?p=index" class="btn btn-default"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> <b>Accueil</b></a>';
			} 
		
		if ( (htmlentities($_GET["p"]) == "clients") OR (htmlentities($_GET["p"]) == "listing_clients") OR (htmlentities($_GET["p"]) == "add_client") OR (htmlentities($_GET["p"]) == "ficheclient") OR (htmlentities($_GET["p"]) == "modifclient") ) {
			echo '<a href="index.php?p=clients" class="btn btn-default btn-lg active"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> <b>Gestion clientèle</b></a>';
		} 
			else { 
				echo '<a href="index.php?p=clients" class="btn btn-default"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> <b>Gestion clientèle</b></a>';
			}
		
		if ( (htmlentities($_GET["p"]) == "demande") OR (htmlentities($_GET["p"]) == "ajoutdemande") ) {
			echo '<a href="index.php?p=demande" class="btn btn-default btn-lg active"><span class="glyphicon glyphicon-tag" aria-hidden="true"></span> <b>Ajouter une demande</b></a>';
		}
			else {
				echo '<a href="index.php?p=demande" class="btn btn-default"><span class="glyphicon glyphicon-tag" aria-hidden="true"></span> <b>Ajouter une demande</b></a>';
			}
		
		if (htmlentities($_GET["p"]) == "interv") {
			echo '<a href="index.php?p=interv" class="btn btn-default btn-lg active"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> <b>Liste des interventions</b></a>';
		}
			else {
				echo '<a href="index.php?p=interv" class="btn btn-default"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> <b>Liste des interventions</b></a>';
			}
		
		if (htmlentities($_GET["p"]) == "administration") {
			echo '<a href="index.php?p=administration" class="btn btn-default btn-lg active"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span> <b>Administration</b></a>';
		} 
			else {
				echo '<a href="index.php?p=administration" class="btn btn-default"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span> <b>Administration</b></a>';
			}
		if (htmlentities($_GET["p"]) == "transfo-demande") {
			echo '<a href="#" class="btn btn-default btn-lg active"><span class="glyphicon glyphicon-wrench" aria-hidden="true"></span> <b>Transformation demande<br />en intervention</b></a>';
		}
	
		if (htmlentities($_GET["p"]) == "modifinterv") {
			echo '<a href="#" class="btn btn-default btn-lg active"><span class="glyphicon glyphicon-wrench" aria-hidden="true"></span> <b>Modification<br />d\'une demande</b></a>';
		}

		?>
	</div>
</nav>

</div>
	
<?php // CONTENU
	switch (htmlentities($_GET['p'])) {
		case 'accueil':
			include_once('index.php');
		break;
		
		
		// CLIENTS
		case 'clients':
			include_once('clients/index.php');
		break;
		
		case 'listing_clients':
			include_once('clients/listing.php');
		break;
		
		case 'ficheclient':
			include_once('clients/ficheclient.php');
		break;
		
		case 'add_client':
			include_once('clients/ajout_client.php');
		break;
		
		case 'recherche':
			include_once('admin/recherche.php');
		break;
		
		case 'modifclient':
			include_once('clients/modifclient.php');
		break;
		
		
		// INTERVENTIONS
		case 'demande':
			include_once('demande/formulaire_interv.php');
		break;
		
		case 'ajoutdemande':
			include_once('demande/ajout_interv_fiche.php');
		break;
		
		case 'interv':
			include_once('interventions/index.php');
		break;
		
		case 'transfo-demande':
			include_once('interventions/transfo_demande_interv.php');
		break;
		
		case 'modifinterv':
			include_once('interventions/index_modif.php');
		break;
		
		
		// ADMINISTRATION PORTAIL
		case 'administration':
			include_once('admin/index.php');
		break;

			
		default:
			include_once('index.php');
		break;
		}
?>

<?php
if (htmlentities($_GET["p"]) == "index")
	{ ?>
<div class="container">

	<legend>Informations & messages - Nous sommes aujourd'hui le <b><?php echo date("d/m/y"); ?></b></legend>
	<br /><br />
	<fieldset>
		<table class="table table-striped table-condensed">
		<?php
		$sql = mysql_query ("SELECT * FROM tnews ORDER BY id DESC;"); // Connexion à la BDD
	 
		while ($row = mysql_fetch_array($sql)) {// Tant qu'il y a des news dans la table tnews, on affiche un tableau
		echo '<tr>' ; // Une ligne par news
			echo '<td style="text-align:center; vertical-align:middle;"><i>' . $row["dateNews"]	. '</i></td>' ; // Date de la news
			echo '<td style="text-align:center; vertical-align:middle;"><b>' . $row["auteur"] . '</b></td>' ; // Auteur (technicien) de la news
			echo '<td style="text-align:justify; vertical-align:middle;" width="75%" class="well">' . $row['news'] . '</td>' ; // Message / news, avec support des retours à la ligne & retours chariots
			echo "<td style='text-align:center; vertical-align:middle;'><form method='POST'> <input type='hidden' name='id' value='" . $row["id"] . "' /> <input type='hidden' name='delete' value='1' /> <button class='btn btn-danger';><span class='glyphicon glyphicon-trash' aria-hidden='true'></span><br />Supprimer</button> </form></td>" ; // Bouton de suppression de la news (fait appel à la page delnews.php)
			echo '</tr>' ;
		}
		?>
		</table>
	</fieldset>

	<hr />

	<center><div id="flip"><button class="btn btn-lg btn-success"><span class="glyphicon glyphicon-pencil"></span><br />Ecrire un message</button></div><br />
	<em>Cliquez sur le bouton pour afficher ou cacher le formulaire.</em>
	</center>
	<br />
	
	<div id="panel">
		<center>
		<form class="well" method="POST" style="width:450px;"> <input type="hidden" name="ajout" value="1" />
		<h3>Ajouter un message</h3>			
			<b>Date</b><br />
			<input name="dateNews" type="text" class="form-control calendrier" value="<?php echo date("d/m/Y"); ?>" required /><br /> <!-- Champ de saisie OBLIGATOIRE - DATE -->

			<b>Message</b><br />
			<textarea name="news" class="form-control" style="height:200px;" required ></textarea><br /> <!-- Champ de saisie OBLIGATOIRE - NEWS -->

			<b>Auteur</b><br />
			<select name="auteur" class="form-control" > <!-- Liste déroulante - Affichage de tous les techniciens -->
			<?php
				$sql2 = mysql_query ( "SELECT * FROM ttechniciens;" ) or die ( mysql_error() ) ; // Affichage de tous les techniciens présents dans la BDD - Si pb, affichage d'une erreur
										
				while ( $ligne2 = mysql_fetch_array($sql2) ) // Boucle de recherche / affichage
				{ echo '<option value="'.$ligne2["nom"].'">'.$ligne2["nom"].'</option>'; } // Création d'une ligne à chaque technicien trouvé "dans la boucle"
			?>
			</select> <!-- Fin de la liste déroulante -->
		<br />
			<button class="btn btn-large btn-success"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span><br />Publier</button>
		</form>
		</center>
	</div>

	<p align="right"><a href="#top" class="btn btn-info"><span class="glyphicon glyphicon-plane"></span> Remonter <span class="glyphicon glyphicon-plane"></span></a></p>
	
	<hr />
	<?php } ?>
</div> <!-- FIN DE MISE EN PAGE -->

<div class="well"> <!-- Pied de page -->
	<p>&copy; 2012-2015 - Julien HOMMET (<a href="mailto:hommet.julien@gmail.com">Envoyer un mail</a>)<br />
	<em>MIS Avranches & Saint-James</em></p>
	
	<p align="center">GestInterv <b>v5.1</b>
	<br />
		<br />Powered by : <a href="http://getbootstrap.com/" target="_blank"><img src="img/bootstrap_logo.png" style="width:48px; height:48px;"> Twitter BootStrap 3.3.1</a> <img src="img/html5_logo.png" style="width:48px; height:48px;"> HTML 5</a> <img src="img/css3_logo.png" style="width:48px; height:48px;"> CSS 3</a> <a href="http://php.net/" target="_blank"><img src="img/php_logo.png" style="width:48px; height:48px;"> PHP 5.6.4 </a> <a href="http://www.mysql.com/" target="_blank"><img src="img/mysql_logo.png" style="width:48px; height:48px;"> MySQL 5.6.16</a> <a href="http://jquery.com/" target="_blank"><img src="img/jquery_logo.png" style="width:48px; height:48px;"> jQuery 2.1.3</a><br />
	</p>
</div>

</body>

</html>