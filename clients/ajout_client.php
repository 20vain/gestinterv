<?php
//Création de la fiche client si les "_POST" ne sont pas vides
if ( count($_POST) != 0 )
{
	$nom		= $_POST["nom"];
	$prenom		= $_POST["prenom"];
	$telFixe	= $_POST["telFixe"];
	$telPort	= $_POST["telPort"];
	$adresse	= $_POST["adresse"];
	$mail		= $_POST["mail"];
	$magasin	= $_POST["magasin"];
	
	if (isset($_POST["rdv"])) { $rdv = 1; }
	else { $rdv = 0; }
	
	if (isset($_POST["pro"])) { $pro = 1; }
	else { $pro = 0; }

// Ajout dans la base de données
	$AjoutBDD = mysql_query ( "INSERT INTO tclients VALUES ('','$nom','$prenom','$telFixe','$telPort','$adresse','$mail','$magasin','$rdv','$pro');" )  or  die ( mysql_error() ) ;
			
// Reprise du code client pour la redirection
	$lastadd_client = mysql_insert_id();
?>
<h2>Création d'une personne - REUSSITE ! -</h2> <!-- TITRE -->
<form action="index.php?p=ficheclient" method="post">
	<input type="hidden" name="codeClient" value="<?php echo $lastadd_client; ?>">
	<div class="alert alert-success">
		<p>Le client <b><?php echo $nom; ?></b> a bien été créé !<br />
		Cliquez sur le bouton ci-dessous pour être rediriger vers sa fiche client.<br /><br />
		<button class="btn btn-default btn-lg"><span class="glyphicon glyphicon-user"></span><br />
		Redirection vers la fiche client <?php echo $nom; ?></button>
		</p>
	</div>
</form>
<?php
} // FIN DE L'AJOUT
?>

<hr />

<div class="container">

<fieldset class="well">

<form action="#" method="POST">
<table class="table">
	<tr>
		<td>
			<b>NOM</b> <span class="label label-danger">Champ obligatoire</span>
			<div class="input-group">
				<span class="input-group-addon glyphicon glyphicon-user"></span>
				<input type="text" class="form-control" name="nom" maxlength="50" placeholder="NOM client" required />
			</div>		
		</td>
		<td>&nbsp;</td>
		<td>
			<b>PRENOM</b>
			<div class="input-group">
				<span class="input-group-addon glyphicon glyphicon-user"></span>
				<input type="text" class="form-control" name="prenom" maxlength="50" placeholder="PRENOM client" />
			</div>
		</td>
	</tr>
	
	<tr>
		<td>
			<b>TÉLÉPHONE PORTABLE</b> <span class="label label-danger">Champ obligatoire</span>
			<div class="input-group">
				<span class="input-group-addon glyphicon glyphicon-phone"></span>
				<input type="text" class="form-control" name="telPort" maxlength="10" placeholder="0634567890" required />
			</div>
		</td>
		<td>&nbsp;</td>
		<td>
			<b>TÉLÉPHONE FIXE</b>
			<div class="input-group">
				<span class="input-group-addon glyphicon glyphicon-phone-alt"></span>
				<input type="text" class="form-control" name="telFixe" maxlength="10" placeholder="0234567890" />
			</div>
		</td>
	</tr>
	
	<tr>
		<td>
			<b>ADRESSE POSTALE</b> <span class="label label-danger">Champ obligatoire</span>
			<div class="input-group">
				<span class="input-group-addon glyphicon glyphicon-envelope"></span>
				<input type="text" class="form-control" name="adresse" maxlength="100" placeholder="Adresse postale" required />
			</div>		
		</td>
		<td>&nbsp;</td>
		<td>
			<b>ADRESSE E-MAIL</b>
			<div class="input-group">
				<span class="input-group-addon glyphicon glyphicon-send"></span>
				<input type="text" class="form-control" name="mail" maxlength="100" placeholder="Adresse e-mail" />
			</div>
		</td>
	</tr>
	
	<tr>
		<td>
			<b>Magasin</b> <span class="label label-danger">Champ obligatoire</span>
			<select name="magasin" class="form-control" required>
				<option value=""></option>
				<option value="Avranches">Avranches</option>				
				<option value="Saint-James">Saint-James</option>
			</select>
		</td>
		<td>&nbsp;</td>
		<td>
			Si le client est un professionnel, veuillez cocher la case :<br />
			<div class="input-group">
				<span class="input-group-addon">
					<input type="checkbox" class="form-control" name="pro" value="1" />
				</span>
				<input type="text" class="form-control" placeholder="Client professionnel" disabled />
			</div>
		</td>
	</tr>
</table>

<center><button class="btn btn-success btn-lg"><span class="glyphicon glyphicon-user"></span><br />
Envoyer les modifications</button></center>

</form>

</fieldset>

<center><a href="index.php?p=clients" class="btn btn-default btn-lg"><span class="glyphicon glyphicon-repeat"></span><br />Retour</a></center>
<br />

</div>