﻿<?php // --- AJOUT d'un serveur ---
if ( !empty($_POST) && (isset($_POST["verif"])) && (($_POST["verif"])=="ajout-serveur") )
{
	$serveur = htmlentities($_POST["serveur"]);

	$add = mysql_query ( " INSERT INTO tserveurs VALUES ('','$serveur'); " ) or die ( mysql_error() ) ;
?>
	<div class="alert alert-success">
		L'ajout a bien été effectué !
	</div>
<?php
}


// --- SUPPRESSION D'UN SERVEUR
else if ( (!empty($_POST)) && (isset($_POST["delete"])) && ($_POST["delete"]=="15") )
{
	$id	= $_POST["id"];
	delete($id,"tserveurs");
?>
	<div class="alert alert-warning">La suppression a bien été effectuée !</div>
<?php
} // FIN FONCTION SUPPRESSION


// --- MODIFICATION
else if ( (!empty($_POST)) && (isset($_POST["modif"])) && ($_POST["modif"]=="15") )
{
	$id	= $_POST["id"];
	$nom_modif	= $_POST["nom_modif"];
?>
Modification du champ<br />
Ancienne valeur = [<b><?php echo $nom_modif; ?></b>]<br />
<form action="#" method="post"> <input type="hidden" name="id" value="<?php echo $id; ?>" /> <input type="hidden" name="update" value="15" />
	<input type="text" name="modif_name_ok" />
	<button class="btn btn-large btn-primary">Enregistrer<br />les modifications</button>
</form>
<?php 
}

// --- MODIFICATION DANS DB
else if ( (!empty($_POST)) && (isset($_POST["update"])) && ($_POST["update"]=="15") )
{
	$id	= $_POST["id"];
	$modif_name_ok	= $_POST["modif_name_ok"];
	$sql = mysql_query ( "UPDATE tserveurs SET nom='$modif_name_ok' WHERE id='$id';" ) or die ( mysql_error() ) ;
?>
	<div class="alert alert-info">
		La modification a bien été effectuée !
	</div>
<?php
} // FIN FONCTION

else { }
?>


<center><h2>Liste des<br />serveurs</h2></center>
<table class="table table-condensed table-striped table-hover">
<tr> <th style="text-align:center;">Nom</th> <th colspan="2" style="text-align:center;">Opération</th> </tr>
<?php 
	$sql = mysql_query ( " SELECT * FROM tserveurs ; " ) or die ( mysql_error() ) ;
	echo "<p align='right'>Total = <b>".mysql_num_rows($sql)."</b></p>";
	while ( $ligne = mysql_fetch_array($sql) )
	{
		echo "<tr>" ;
		echo "<td style='text-align:center; vertical-align:middle;'>" . $ligne['nom'] . "</td>" ; // Nom du logiciel
		echo "<td style='text-align:center; vertical-align:middle;'><form method='POST'> <input type='hidden' name='id' value='" . $ligne["id"] . "'> <input type='hidden' name='nom_modif' value='" . $ligne["nom"] . "'> <input type='hidden' name='modif' value='15' /> <button class='btn btn-primary'><span class='glyphicon glyphicon-pencil' aria-hidden='true'></span><br />Modifier</button> </form></td>";
		echo "<td style='text-align:center; vertical-align:middle;'><form action ='' method='POST'> <input type='hidden' name='id' value='".$ligne["id"]."' /> <input type='hidden' name='delete' value='15' /> <button class='btn btn-danger';><span class='glyphicon glyphicon-trash' aria-hidden='true'></span><br />Supprimer</button> </form></td>" ;
		echo "</tr>" ; 
	}
?>

</table>

<hr />

<!-- Formulaire de création de news -->
	<form method="POST" class="well">
	<center><h4>Ajouter un nouveau serveur</h4>
	<hr />
		<input type="hidden" name="verif" value="ajout-serveur">
		
		Nom du serveur : <input name="serveur" type="text" required /><br />
		<button class="btn btn-large btn-success">Ajouter<br /><span class="glyphicon glyphicon-tag"></span></button>
	</form>
</center>
