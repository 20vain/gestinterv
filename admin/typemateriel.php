<?php // --- AJOUT D'UN MATERIEL ---
if ( !empty($_POST) && (isset($_POST["verif"])) && (($_POST["verif"])=="ajout-materiel") )
{
	$materiel = addslashes($_POST["materiel"]);

	$add = mysql_query ( " INSERT INTO ttypemateriel VALUES ('','$materiel'); " ) or die ( mysql_error() ) ;
?>
	<div class="alert alert-success">
		L'ajout a bien été effectué !
	</div>
<?php
}

// --- SUPPRESSION
else if ( (!empty($_POST)) && (isset($_POST["delete"])) && ($_POST["delete"]=="13") )
{
	$id	= $_POST["id"];	
	delete($id,"ttypemateriel");
?>
	<div class="alert alert-warning">
		La suppression a bien été effectuée !
		<button type="button" class="close" data-dismiss="alert">
			<span aria-hidden="true">&times;</span>
			<span class="sr-only">Fermer</span>
		</button>
	</div>
<?php
} // FIN FONCTION SUPPRESSION


// --- MODIFICATION
else if ( (!empty($_POST)) && (isset($_POST["modif"])) && ($_POST["modif"]=="13") )
{
	$id	= $_POST["id"];
	$nom_modif	= $_POST["nom_modif"];
?>
Modification du champ<br />
Ancienne valeur = [<b><?php echo $nom_modif; ?></b>]<br />
<form action="#" method="post"> <input type="hidden" name="id" value="<?php echo $id; ?>" /> <input type="hidden" name="update" value="13" />
	<input type="text" name="modif_name_ok" />
	<button class="btn btn-large btn-primary">Enregistrer<br />les modifications</button>
</form>
<?php 
}

// --- MODIFICATION DANS DB
else if ( (!empty($_POST)) && (isset($_POST["update"])) && ($_POST["update"]=="13") )
{
	$id	= $_POST["id"];
	$modif_name_ok	= $_POST["modif_name_ok"];
	$sql = mysql_query ( "UPDATE ttypemateriel SET nom='$modif_name_ok' WHERE id='$id';" ) or die ( mysql_error() ) ;
?>
	<div class="alert alert-info">
		La modification a bien été effectuée !
	</div>
<?php
} // FIN FONCTION

else { }
?>

<center><h2>Liste des<br />matériels</h2></center>
<table class="table table-condensed table-striped">
<tr> <th style="text-align:center;">Nom</th> <th colspan="2" style="text-align:center;">Opération</th> </tr>
<?php 
	$sql = mysql_query ( " SELECT * FROM ttypemateriel ; " ) or die ( mysql_error() ) ;
	echo "<p align='right'>Total = <b>".mysql_num_rows($sql)."</b></p>";
	while ( $ligne = mysql_fetch_array($sql) )
	{
		echo "<tr>" ;
		echo "<td style='text-align:center; vertical-align:middle;'>" . $ligne['nom'] . "</td>" ; // Nom du logiciel
		echo "<td style='text-align:center; vertical-align:middle;'><form method='POST'> <input type='hidden' name='id' value='" . $ligne["id"] . "'> <input type='hidden' name='nom_modif' value='" . $ligne["nom"] . "'> <input type='hidden' name='modif' value='13' /> <button class='btn btn-primary'><span class='glyphicon glyphicon-pencil' aria-hidden='true'></span><br />Modifier</button> </form></td>";
		echo "<td style='text-align:center; vertical-align:middle;'><form action ='' method='POST'> <input type='hidden' name='id' value='".$ligne["id"]."' /> <input type='hidden' name='delete' value='13' /> <button class='btn btn-danger';><span class='glyphicon glyphicon-trash' aria-hidden='true'></span><br />Supprimer</button> </form></td>" ;
		echo "</tr>" ;
	}
?>

</table>

<hr />

<!-- Formulaire de création de news -->
<center><h2>Ajouter un nouveau materiel</h2>
	<form method="POST" class="well">
		<input type="hidden" name="verif" value="ajout-materiel">
		
		Nom du materiel : <input name="materiel" type="text" required /><br />
		<button class="btn btn-large btn-primary">Ajouter</button>
	</form>
</center>