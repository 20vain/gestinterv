﻿<?php // --- AJOUT
if ( !empty($_POST) && (isset($_POST["verif"])) && (($_POST["verif"])=="ajout-typeinterv") )
{
	$typeinterv = $_POST["typeinterv"];
	$add = mysql_query ( " INSERT INTO ttypeinterv VALUES ('','$typeinterv'); " ) or die ( mysql_error() ) ;
?>
	<div class="alert alert-success">L'ajout a bien été effectué !</div>
<?php
}

// --- SUPPRESSION
else if ( (!empty($_POST)) && (isset($_POST["delete"])) && ($_POST["delete"]=="11") )
{
	$id	= $_POST["id"];
	delete($id,"ttypeinterv");
?>
	<div class="alert alert-warning">La suppression a bien été effectuée !</div>
<?php
} // FIN FONCTION SUPPRESSION


// --- MODIFICATION
else if ( (!empty($_POST)) && (isset($_POST["modif"])) && ($_POST["modif"]=="11") )
{
	$id	= $_POST["id"];
	$nom_modif	= $_POST["nom_modif"];
?>
Modification du champ<br />
Ancienne valeur = [<b><?php echo $nom_modif; ?></b>]<br />
<form action="#" method="post"> <input type="hidden" name="id" value="<?php echo $id; ?>" /> <input type="hidden" name="update" value="11" />
	<input type="text" name="modif_name_ok" />
	<button class="btn btn-large btn-primary">Enregistrer<br />les modifications</button>
</form>
<?php 
}

// --- MODIFICATION DANS DB
else if ( (!empty($_POST)) && (isset($_POST["update"])) && ($_POST["update"]=="11") )
{
	$id	= $_POST["id"];
	$modif_name_ok = $_POST["modif_name_ok"];
	$sql = mysql_query ( "UPDATE ttypeinterv SET nom='$modif_name_ok' WHERE id='$id';" ) or die ( mysql_error() ) ;
?>
	<div class="alert alert-info">
		La modification a bien été effectuée !
	</div>
<?php
} // FIN FONCTION


else { }
?>

<center><h2>Liste des<br />types d'intervention</h2></center>
<table class="table table-condensed table-striped table-hover">
<tr> <th style="text-align:center;">Nom</th> <th colspan="2" style="text-align:center;">Opération</th> </tr>
<?php 
	$sql = mysql_query ( " SELECT * FROM ttypeinterv ; " ) or die ( mysql_error() ) ;
	echo "<p align='right'>Total = <b>".mysql_num_rows($sql)."</b></p>";
	while ( $ligne = mysql_fetch_array($sql) )
	{
		echo "<tr>" ;
		echo "<td style='text-align:center; vertical-align:middle;'>" . $ligne['nom'] . "</td>" ;
		echo "<td style='text-align:center; vertical-align:middle;'><form method='POST'> <input type='hidden' name='id' value='" . $ligne["id"] . "'> <input type='hidden' name='nom_modif' value='" . $ligne["nom"] . "'> <input type='hidden' name='modif' value='11' /> <button class='btn btn-primary'><span class='glyphicon glyphicon-pencil' aria-hidden='true'></span><br />Modifier</button> </form></td>";
		echo "<td style='text-align:center; vertical-align:middle;'><form action ='' method='POST'> <input type='hidden' name='id' value='".$ligne["id"]."' /> <input type='hidden' name='delete' value='11' /> <button class='btn btn-danger';><span class='glyphicon glyphicon-trash' aria-hidden='true'></span><br />Supprimer</button> </form></td>" ;
		echo "</tr>" ;
	}
?>

</table>

<hr />

	<form method="POST" class="well">
	<center><h4>Ajouter un nouveau type d'intervention</h4>
	<hr />
		<input type="hidden" name="verif" value="ajout-typeinterv">
		
		Nom de l'intervention : <input name="typeinterv" type="text" required /><br />
		<button class="btn btn-large btn-success">Ajouter<br /><span class="glyphicon glyphicon-tag"></span></button>
	</center>
	</form>