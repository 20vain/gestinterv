<?php
// Récupération du code Client (grace à la redirection)
	$codeClient = $_POST["codeClient"];

// Affichage du client à modifier à partir de son code client
	$req = mysql_query ( "SELECT * FROM tclients WHERE id='$codeClient';" ) or die ( mysql_error() ) ;
	$ligne = mysql_fetch_array($req) ;

	
	// --- MISE A JOUR FICHE CLIENT
if ( (isset($_POST["modifFicheClient"])) && ($_POST["modifFicheClient"]=="1") )
{
	$nom		= addslashes($_POST["nom"]);
	$prenom		= addslashes($_POST["prenom"]);
	$telFixe	= addslashes($_POST["telFixe"]);
	$telPort	= addslashes($_POST["telPort"]);
	$adresse 	= addslashes($_POST["adresse"]);
	$mail		= addslashes($_POST["mail"]);
	$magasin 	= addslashes($_POST["magasin"]);

	if (isset($_POST["pro"])) { $pro = "1"; } else { $pro = "0"; }

	$sql = mysql_query ( "UPDATE tclients SET nom='$nom', prenom='$prenom', telFixe='$telFixe', telPort='$telPort', adresse='$adresse', magasin='$magasin', mail='$mail', pro='$pro' WHERE id='$codeClient';" ) or die( mysql_error() ) ;
	$req = mysql_query ( "SELECT * FROM tclients WHERE id='$codeClient';" ) or die ( mysql_error() ) ;
	$ligne = mysql_fetch_array($req) ;
}
// FIN FONCTION MISE A JOUR FICHE CLIENT
?>

<form action="#" method="post">
<center><table class="table-condensed">
	<tr>
		<td>
			<center><h2>Fiche client n°<?php echo $ligne["id"]; ?><br />
			<b>[<?php echo $ligne["nom"].' '.$ligne["prenom"];?>]</b></h2></center>
		</td>
	</tr>
</table></center>
	
<table class="table table-striped">
	<tr>
		<td colspan="2"> <b>NOM / Prénom</b>
			<div class="input-group">
				<span class="input-group-addon glyphicon glyphicon-user"></span>
				<input type="text" class="form-control" name="nom" maxlength="50" value="<?php echo $ligne["nom"];?>" />
				<input type="text" class="form-control" name="prenom" maxlength="50" value="<?php echo $ligne["prenom"];?>" />
			</div>
		</td>
		<td> <b>N° DE TÉLÉPHONES</b>
			<div class="input-group">
				<span class="input-group-addon glyphicon glyphicon-phone"></span>
				<input type="text" class="form-control" name="telPort" maxlength="10" value="<?php echo $ligne["telPort"];?>" />
				<span class="input-group-addon glyphicon glyphicon-phone-alt"></span>
				<input type="text" class="form-control" name="telFixe" maxlength="10" value="<?php echo $ligne["telFixe"];?>" />
			</div>
		</td>
	</tr>
	
	<tr>
		<td colspan="3"> <b>ADRESSES POSTALE & E-MAIL</b>
			<div class="input-group">
				<span class="input-group-addon glyphicon glyphicon-envelope"></span>
				<input type="text" class="form-control" name="adresse" maxlength="10" value="<?php echo $ligne["adresse"];?>" />
				<span class="input-group-addon glyphicon glyphicon-send"></span>
				<input type="text" class="form-control" name="mail" maxlength="50" value="<?php echo $ligne["mail"];?>" />
			</div>
		</td>
		<td>&nbsp;</td>
	</tr>
	
	<tr>
		<td colspan="2"> <b>Magasin</b>
			<div class="input-group">
				<span class="input-group-addon glyphicon glyphicon-briefcase"></span>
				<select name="magasin" class="form-control">
					<option value="<?php echo $ligne["magasin"];?>"><?php echo $ligne["magasin"];?></option>				
					<option value="NULL">&nbsp;</option>				
					<option value="Avranches">Avranches</option>				
					<option value="Saint-James">Saint-James</option>
				</select>
			</div>
		</td>
		<td>
			Le client est-il un professionnel ? Si oui, la case ci-dessous est cochée :<br />
			<div class="input-group">
				<span class="input-group-addon">
					<?php
					if ($ligne["pro"] == "1")
					{ echo '<input type="checkbox" class="form-control" name="pro" value="1" checked />'; }
					else { echo '<input type="checkbox" class="form-control" name="pro" value="1" />'; } ?>
				</span>
				<input type="text" class="form-control" placeholder="Client professionnel" disabled />
			</div>
		</td>
	</tr>
</table>

<center>
<table>
	<tr>
		<td>
			<input type="hidden" name="modifFicheClient" value="1" /> <input type='hidden' name='codeClient' value="<?php echo $codeClient; ?>" />
			<center><button class="btn btn-success btn-lg"><span class="glyphicon glyphicon-user"></span><br />
			Envoyer les modifications</button></center>
		</td>
</form>
		<td>&nbsp;</td>
		<td>
			<center><form action="index.php?p=ficheclient" method="post"> <input type='hidden' name='codeClient' value="<?php echo $codeClient; ?>" /> <button class="btn btn-default btn-lg"><span class="glyphicon glyphicon-repeat"></span><br />Retour</button></form></center>
		</td>
	</tr>	
</table>
</center>
<br />