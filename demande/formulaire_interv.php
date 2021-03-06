	<a href="#top" class="btn btn-info" style="position:fixed; margin:5px;"><span class="glyphicon glyphicon-plane"></span><br />Remonter</a>

<div class="container">

<?php include_once ("admin/recherche.php"); ?>
<hr />
<h1>Ajout d'une demande d'intervention</h1>
<hr />

<center><h2>Création de la fiche client</h2></center>

<hr />

<fieldset class="well">
	<form action="demande/print_demande.php" method="POST">
<table class="table">
	<tr>
		<td>
			<b>NOM</b> <span class="label label-danger">Champ obligatoire</span>
			<div class="input-group">
				<span class="input-group-addon glyphicon glyphicon-user"></span>
				<input type="text" class="form-control" name="nom" maxlength="50" required />
			</div>		
		</td>
		<td>&nbsp;</td>
		<td>
			<b>PRENOM</b>
			<div class="input-group">
				<span class="input-group-addon glyphicon glyphicon-user"></span>
				<input type="text" class="form-control" name="prenom" maxlength="50" />
			</div>
		</td>
	</tr>
	
	<tr>
		<td>
			<b>TÉL. PORTABLE</b> <span class="label label-danger">Champ obligatoire</span>
			<div class="input-group">
				<span class="input-group-addon glyphicon glyphicon-phone"></span>
				<input type="text" class="form-control" name="telPort" maxlength="20" required />
			</div>
		</td>
		<td>&nbsp;</td>
		<td>
			<b>TÉL. FIXE</b>
			<div class="input-group">
				<span class="input-group-addon glyphicon glyphicon-phone-alt"></span>
				<input type="text" class="form-control" name="telFixe" maxlength="20" />
			</div>
		</td>
	</tr>
	
	<tr>
		<td>
			<b>ADRESSE POSTALE</b> <span class="label label-danger">Champ obligatoire</span>
			<div class="input-group">
				<span class="input-group-addon glyphicon glyphicon-envelope"></span>
				<input type="text" class="form-control" name="adresse" maxlength="150" required />
			</div>		
		</td>
		<td>&nbsp;</td>
		<td>
			<b>ADRESSE E-MAIL</b>
			<div class="input-group">
				<span class="input-group-addon glyphicon glyphicon-send"></span>
				<input type="text" class="form-control" name="mail" maxlength="150" />
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
</fieldset>

<hr />

<center><h2>Intervention à effectuer</h2></center>

<fieldset class="well">
<table class="table">
	<tr>
		<td>
			Date de <b>DÉPÔT</b> matériel <span class="label label-danger">Champ obligatoire</span>
			<div class="input-group">
				<span class="input-group-addon glyphicon glyphicon-calendar"></span>
				<input type="text" class="form-control calendrier" name="dateDepot" value="<?php echo date('d/m/Y'); ?>" style="width:200px;" required />
			</div>		
		</td>
		<td>&nbsp;</td>
		<td>
			Date de <b>RESTITUTION</b> matériel <span class="label label-danger">Champ obligatoire</span>
			<div class="input-group">
				<span class="input-group-addon glyphicon glyphicon-calendar"></span>
				<input type="text" class="form-control calendrier" name="dateRestitution" style="width:200px;" required />
			</div>
		</td>
	</tr>
	
	<tr>
		<td colspan="3" align="center">
			<label class="form-control"><input type="checkbox" name="rdv" value="1" /> <b>Rendez-vous pris avec le client</b></label>
		</td>
	</tr>
	
	<tr>
		<td>
			<b>MATÉRIEL</b> <span class="label label-danger">Champ obligatoire</span>
			<select name="materiel" class="form-control" required >
				<option value=""></option>
				<?php
					$sql = mysql_query( "SELECT * FROM ttypemateriel ;" ) or die ( mysql_error() ) ; // Requête d'affichage des TYPE D'INTERVENTIONS
					while ( $ligne = mysql_fetch_array($sql) ) // Boucle d'affichage
					{ echo "<option value='" . $ligne['nom'] . "'>" . $ligne['nom'] . "</option>"; }
				?>
			</select>
		</td>
		<td>&nbsp;</td>
		<td>
			<b>Le matériel est-il incomplet ?</b>
			<select name="accessoires" class="form-control">
				<option value=""></option>
				<option value="Pas de sacoche">Pas de sacoche</option>
				<option value="Pas de transfo">Pas de transfo</option>
				<option value="Pas de batterie">Pas de batterie</option>
				<option value="Pas de batterie ni transfo">Pas de batterie ni transfo</option>
				<option value="Pas de sacoche ni transfo">Pas de sacoche ni de transfo</option>
				<option value="Pas de sacoche ni batterie">Pas de sacoche ni de batterie</option>
				<option value="Pas de sacoche ni batterie ni transfo">Pas de sacoche ni de batterie ni de transfo</option>
			</select>
		</td>
	</tr>
	
	<tr>
		<td colspan="3">
			<b>Système d'exploitation du PC</b> <span class="label label-danger">Champ obligatoire</span>
			<select name="os" required class="form-control">
				<option value="" selected></option>
				<option value="Windows XP">Windows XP</option>
				<option value="Windows Vista">Windows Vista</option>
				<option value="Windows 7">Windows 7</option>
				<option value="Windows 8">Windows 8</option>
				<option value="Windows 10">Windows 10</option>
				<option value="Windows Server 2003">Windows Server 2003</option>
				<option value="Windows Server 2008">Windows Server 2008</option>
				<option value="Windows Server 2012">Windows Server 2012</option>
				<option value="">---</option>
				<option value="Linux">Linux</option>
				<option value="Ordissimo">Ordissimo</option>
			</select>
		</td>
	</tr>
	
	<tr>
		<td>
			<b>Session utilisateur</b> à utiliser : 
			<div class="input-group">
				<span class="input-group-addon glyphicon glyphicon-user"></span>
				<input type="text" name="session_user" class="form-control" />
			</div>
		</td>
		<td>&nbsp;</td>
		<td>
			<b>Mot de passe</b> de session : 
			<div class="input-group">
				<span class="input-group-addon glyphicon glyphicon-qrcode"></span>
				<input type="text" name="password" class="form-control" />
			</div>
		</td>
	</tr>
	
	<tr>
		<td colspan="3">
			<b>Type d'intervention</b> <span class="label label-danger">Champ obligatoire</span>
			<select name="typeInterv" required class="form-control">
				<option value=""></option>
				<?php
					$type_interv = mysql_query ( "SELECT * FROM ttypeinterv ;" ) or die ( mysql_error() ) ;
					
					while ( $interv = mysql_fetch_array($type_interv) )
					{ echo "<option value='" . $interv['nom'] . "'>" . $interv['nom'] . "</option>"; }
				?>
			</select>
		</td>
	</tr>
	
	<tr>
		<td colspan="3">
			<b>Observations</b> :<br />
			<textarea name="observations" class="form-control" placeholder="Saisie d'observations complémentaires. La touche 'entrée' permet de faire un retour à la ligne." style="height:200px;"></textarea>
		</td>
	</tr>
	
	<tr>
		<td style="vertical-align:middle; text-align:center;">
			<b>Technicien</b> ayant pris la demande d'intervention <span class="label label-danger">Champ obligatoire</span>
			<select name="technicien" required class="form-control" style="width:250px;">
				<option value="" selected></option>
				<option value="ISABELLE">ISABELLE</option>
				<option value="NICOLAS">NICOLAS</option>
				<option value=""></option>
				<?php
					$technicien = mysql_query ( "SELECT * FROM ttechniciens ;" ) or die ( mysql_error() ) ;
					
					while ( $option = mysql_fetch_array($technicien) )
					{ echo "<option value='" . $option['nom'] . "'>" . $option['nom'] . "</option>"; }
				?>
			</select>
		</td>
	</tr>
	
</table>
</fieldset>

<center><h2>Fichiers à sauvegarder</h2></center>

<fieldset class="well">
<table class="table">
	<tr>
		<td>
			<label class="form-control"><input type="checkbox" name="dossierMesDocs" value="1" /> Dossiers "Mes documents" & Bureau</label>
		</td>
		<td>&nbsp;</td>
		<td>
			<label class="form-control"><input type="checkbox" name="boiteMails" value="1" /> Boîte mails & carnet d'adresses</label>
		</td>
	</tr>
	
	<tr>
		<td colspan="3">
			<b>Dossier(s) spécifique(s) à sauvegarder</b> : <input type="text" name="dossiersClt" class="form-control" placeholder="Séparer les dossiers par une virgule ou un '+'." />
		</td>
	</tr>
	
</table>
</fieldset>

	<input type="hidden" name="ajout" value="1" />

<center><button class="btn btn-lg btn-success"><span class="glyphicon glyphicon-edit"></span> Ajouter la demande<br />& <br />IMPRIMER la fiche <span class="glyphicon glyphicon-print"></span></button></center>

	</form>

<br />

</div>