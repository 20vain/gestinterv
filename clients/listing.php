<?php // --- SUPPRESSION D'UN CLIENT
if ( (!empty($_POST)) && (isset($_POST["delete"])) && ($_POST["delete"]=="3") )
{
	$id = $_POST["id"];
	delete($id,"tclients");
?>
	<div class="alert alert-warning">
		La fiche client n° <?php echo $id; ?> vient d'être <strong>supprimée</strong> !
	</div>
<?php
} // FIN FONCTION SUPPRESSION

include_once ("admin/recherche.php");
?>

<hr />

<?php
$tab = mysql_query ( "SELECT * FROM tclients ORDER BY nom" ) or die ( mysql_error() ) ;

while ( $ligne = mysql_fetch_array($tab) )
{ ?>

<table class='table'>
	<?php if ( $ligne['magasin'] == "Saint-James" ) { echo '<tr> <td colspan="6" style="background-color:#FF9900";><center><h3><b>['.$ligne['nom'].' '.$ligne['prenom'].']</b></h3></center></td> </tr>'; }
			else { echo '<tr> <td colspan="6"><center><h3><b>['.$ligne['nom'].' '.$ligne['prenom'].']</b></h3></center></td> </tr>'; } ?>
	<tr> <th>N° de TÉLÉPHONE</th> <th>ADRESSES<br />(POSTALE & E-MAIL)</th> <th>MAGASIN</th> <th colspan="3"></th> </tr>
	<tr>
		<td style='text-align:left; vertical-align:middle;'><em>Portable</em> = <b><?php echo $ligne['telPort']; ?></b><br /><em>Tél. Fixe</em> = <b><?php echo $ligne['telFixe']; ?></b></td>
		<td style='text-align:left; vertical-align:middle;'><em>Adresse postale</em> = <?php echo $ligne['adresse']; ?><br /><em>Adresse e-mail</em> = <?php echo $ligne['mail']; ?></td>

		<?php if ( $ligne['magasin'] == "Saint-James" ) { echo "<td style='background-color:#FF9900; text-align:center; vertical-align:middle;'>" . $ligne['magasin']. "</td>" ; }
				else { echo "<td style='text-align:center; vertical-align:middle;'>" . $ligne['magasin'] . "</td>" ; } ?>
	
		<td style='text-align:center; vertical-align:middle;'> <form action="index.php?p=ajoutdemande" method='POST'> <input type='hidden' name='codeClient' value="<?php echo $ligne["id"]; ?>" /> <input type='hidden' name='ficheClient' value='1' /> <center><button class='btn btn-success'><span class='glyphicon glyphicon-pencil' aria-hidden='true'></span><br />Ajouter une demande<br />d'intervention</button></center> </form></td>
		<td style='text-align:center; vertical-align:middle;'> <form action="index.php?p=ficheclient" method='POST'> <input type='hidden' name='codeClient' value="<?php echo $ligne["id"]; ?>" /> <center><button class='btn btn-info'><span class='glyphicon glyphicon-user' aria-hidden='true'></span><br />Fiche client<br /><b><?php echo $ligne['nom']; ?></b></button></center> </form> </td>
		<td style='text-align:center; vertical-align:middle;'> <form method='post' action='#'> <input type='hidden' name='id' value='<?php echo $ligne["id"]; ?>'> <input type='hidden' name='delete' value='3' /> <button class='btn btn-danger'><span class='glyphicon glyphicon-trash' aria-hidden='true'></span><br /> Suppression <br />fiche client</button> </form></td>
	</tr>
</table>
<?php 
}
?>

<center><a href="index.php?p=clients" class="btn btn-default btn-lg"><span class="glyphicon glyphicon-repeat"></span><br />Retour</a></center>
<br />