<?php
// SUPPRESSION LIGNE TABLEAU RECHERCHE
if ( (!empty($_POST)) && (isset($_POST["delete"])) && ($_POST["delete"]=="2") )
{
	$id = $_POST["id"];
	
	delete($id,"tclients");
?>
	<div class="alert alert-warning">
		La fiche client n° <?php echo $id; ?> vient d'être <strong>supprimée</strong> !
	</div>
<?php
}
 // FIN FONCTION SUPPRESSION


 
// --- SUPPRESSION D'UNE LIGNE D'UN TABLEAU
function delete ($id,$table) {
	$sql = mysql_query ( "DELETE FROM ".$table." WHERE id=".$id.";" ) or die ( mysql_error() ) ; // Exécution de la requête - Si pb, affichage erreur.	
}


// --- FONCTION RECHERCHE
function search_client ($nom,$telFixe,$telPort) {
	
	if ( (!empty($_POST)) && (isset($_POST["recherche"])) && ($_POST["recherche"]=="1") )
	{
		$sql_client = mysql_query("SELECT * FROM tclients WHERE nom LIKE '%$nom%' AND telFixe LIKE '%$telFixe%' AND telPort LIKE '%$telPort%' ;") or  die ( mysql_error() ) ;
		
		if (mysql_num_rows($sql_client) >= 1 ) 
		{
			echo '<div class="container">';
			echo "<h3>Résultat de la recherche :</h3>";
			echo "<h4>Nombre de résultat = <b>".mysql_num_rows($sql_client)."</b></h4>";
			
			while ( $ligne = mysql_fetch_array($sql_client) )
			{ // Tableau HTML pour affichage résultat
	?>
				<table class='table'>
				<?php if ( $ligne['magasin'] == "Saint-James" ) { echo '<tr> <td colspan="6" style="background-color:#FF9900";><center><h3><b>['.$ligne['nom'].' '.$ligne['prenom'].']</b></h3></center></td> </tr>'; }
						else { echo '<tr> <td colspan="6"><center><h3><b>['.$ligne['nom'].' '.$ligne['prenom'].']</b></h3></center></td> </tr>'; } ?>
					<tr> <th>N° de TÉLÉPHONE</th> <th>ADRESSES<br />(POSTALE & E-MAIL)</th> <th>MAGASIN</th> <th colspan="3"></th> </tr>
					<tr>
						<td style='text-align:left; vertical-align:middle;'><em>Portable</em> = <b><?php echo $ligne['telPort']; ?></b><br /><em>Tél. Fixe</em> = <b><?php echo $ligne['telFixe']; ?></b></td>
						<td style='text-align:center; vertical-align:middle;'><em>Adresse postale</em> = <?php echo $ligne['adresse']; ?><br /><em>Adresse e-mail</em> = <?php echo $ligne['mail']; ?></td>
			
						<?php if ( $ligne['magasin'] == "Saint-James" ) { echo "<td style='background-color:#FF9900; text-align:center; vertical-align:middle;'>" . $ligne['magasin']. "</td>" ; }
								else { echo "<td style='text-align:center; vertical-align:middle;'>" . $ligne['magasin'] . "</td>" ; } ?>

						<td style='text-align:center; vertical-align:middle;'> <form action="index.php?p=ajoutdemande" method='POST'> <input type='hidden' name='codeClient' value="<?php echo $ligne["id"]; ?>" /> <input type='hidden' name='ficheClient' value='1' /> <center><button class='btn btn-success'><span class='glyphicon glyphicon-pencil' aria-hidden='true'></span><br />Ajouter une demande<br />d'intervention</button></center> </form></td>
						<td style='text-align:center; vertical-align:middle;'> <form action="index.php?p=ficheclient" method='POST'> <input type='hidden' name='codeClient' value="<?php echo $ligne["id"]; ?>" /> <center><button class='btn btn-info'><span class='glyphicon glyphicon-user' aria-hidden='true'></span><br />Fiche client<br /><b><?php echo $ligne['nom']; ?></b></button></center> </form> </td>
						<td style='text-align:center; vertical-align:middle;'> <form method='post' action='#'> <input type='hidden' name='id' value='<?php echo $ligne["id"]; ?>'> <input type='hidden' name='delete' value='2' /> <button class='btn btn-danger'><span class='glyphicon glyphicon-trash' aria-hidden='true'></span><br /> Suppression <br />fiche client</button> </form></td>
					</tr>
				</table>
				<hr style="height:5px; background-color:#ccc" />
	<?php
			}
			echo '</div>';
		}
	
		else { echo "Client <b>[".$nom."]</b> inconnu - Merci de créer sa fiche client grâce au bouton ci-dessous: <br />
		<a href='index.php?p=add_client' class='btn btn-success btn-lg'>Créer une nouvelle<br/>fiche client</a>	"; }
	}
}

?>