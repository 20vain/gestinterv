<?php // Récupération variables d'identification pour redirections
$idPreinterv = $_POST["idPreinterv"];
$codeClient = $_POST["codeClient"];
?>

	<a href="#top" class="btn btn-info" style="position:fixed; margin:5px;"><span class="glyphicon glyphicon-plane"></span><br />Remonter</a>

<div class="container">

	<form action="interventions/ajout_interv_periph.php" method="POST">
	
	<input type="hidden" name="idPreinterv" value="<?php echo $idPreinterv; ?>" /> <!-- Code pré-intervention -->
	<input type="hidden" name="codeClient" value="<?php echo $codeClient; ?>" /> <!-- Code Client -->

	<center><h1>Nouvelle intervention</h1></center>
		
		<fieldset>
			<center><b>Date de l'intervention</b> <input name="dateInterv" type="text" class="calendrier form-control" value="<?php echo date('d/m/Y'); ?>" style="width:100px;" /> (date du jour)</center>

		<hr />

		<fieldset><h2>Partie 1 - Observations & informations complémentaires</h2>
			<br />
			
			<table class="table table-condensed">
				<tr>
					<td>
						Type d'<b>intervention</b> : <span class="label label-danger">Champ obligatoire</span>
						<select name="intervention" class="form-control" required>
							<option selected value="<?php echo $preInterv['typeInterv']; ?>">[ Présélection ] - <?php echo $preInterv['typeInterv']; ?></option>
							<?php $type_interv = mysql_query ( "SELECT * FROM ttypeinterv ;" ) or die ( mysql_error() ) ;

								while ( $interv = mysql_fetch_array($type_interv) )
								{ echo "<option value='" . $interv['nom'] . "'>" . $interv['nom'] . "</option>"; }
							?>
						</select>
					</td>
					<td>&nbsp;</td>
					<td>
						<b>Matériel</b> : <span class="label label-danger">Champ obligatoire</span>
						<select name="materiel" class="form-control" required>
							<option selected value="<?php echo $preInterv['materiel']; ?>">[ Présélection ] - <?php echo $preInterv['materiel']; ?></option>
							<?php $req3 = mysql_query ( "SELECT * FROM ttypemateriel ;" )  or  die ( mysql_error() ) ;
							
							while ( $ligne33 = mysql_fetch_array($req3) ) // Boucle d'affichage
							{ echo "<option value='" . $ligne33['nom'] . "'>" . $ligne33['nom'] . "</option>"; }
							?>
						</select>
					</td>
				</tr>
			</table>
			
			<br />
			<b>Observations</b> : <textarea name="observation" type="text" class="form-control" style="height:250px;"></textarea>
			<br />
			
			<b>Technicien en charge du PC</b> : <span class="label label-danger">Champ obligatoire</span><br />
			<select name="technicien" required class="form-control" style="width:300px;">
				<option name="NULL" selected></option>
				<?php $req2 = mysql_query ( "SELECT * FROM ttechniciens ;" ) or die ( mysql_error() ) ;

				while ( $ligne22 = mysql_fetch_array($req2) )
				{ echo "<option value='" . $ligne22['nom'] . "'>" . $ligne22['nom'] . "</option>"; } ?>
			</select>
			
			<hr />

		<h2>Partie 2 - Coûts de l'intervention</h2>

	<div class="well">
				<table class="table table-condensed">
					<tr>
						<td style="text-align:center; vertical-align:middle;">
							<label>
								<input name="mo-atelier" type="checkbox" value="1" /> MO Atelier
								<div class="input-group">
									<input class="form-control" type="text" name="cout-mo" /><span class="input-group-addon">€</span> 
								</div>
							</label>
						</td>				
					</tr>
				</table>
				
				<table class="table table-condensed">
					<tr>				
						<td>
							<label><input name="coutcomp1" type="checkbox" value="1" /> Coût complémentaire n°1</label>
							<input type="text" name="name-coutcomp1" class="form-control" />
						</td>
						<td>
							<label><br />
								<div class="input-group">
									<input class="form-control" type="text" name="prix-coutcomp1" style="width:100px;"/><span class="input-group-addon">€</span>
								</div>
							</label>
						</td>
					</tr>
					
					<tr>
						<td>
							<label><input name="coutcomp2" type="checkbox" value="1" /> Coût complémentaire n°2</label>
							<input type="text" name="name-coutcomp2" class="form-control" />
						</td>
						<td>
							<label><br />
								<div class="input-group">
									<input class="form-control" type="text" name="prix-coutcomp2" style="width:100px;"/><span class="input-group-addon">€</span>
								</div>
							</label>
						</td>
					</tr>

					<tr>
						<td>
							<label><input name="coutcomp3" type="checkbox" value="1" /> Coût complémentaire n°3</label>
							<input type="text" name="name-coutcomp3" class="form-control" />
						</td>
						<td>
							<label><br />
								<div class="input-group">
									<input class="form-control" type="text" name="prix-coutcomp3" style="width:100px;"/><span class="input-group-addon">€</span>
								</div>
							</label>
						</td>
					</tr>
					
					<tr>
						<td>
							<label><input name="coutcomp4" type="checkbox" value="1" /> Coût complémentaire n°4</label>
							<input type="text" name="name-coutcomp4" class="form-control" />
						</td>
						<td>
							<label><br />
								<div class="input-group">
									<input class="form-control" type="text" name="prix-coutcomp4" style="width:100px;"/><span class="input-group-addon">€</span>
								</div>
							</label>
						</td>
					</tr>
				</table>

			</fieldset>

	</div>
		
	<center>
		
		État de l'intervention : <span class="label label-danger">Champ obligatoire</span><br />
			<select name="statut" style="width:250px;" required class="form-control">
				<option name="En cours" selected>En cours</option>
				<option name="Terminé - OK">Terminé - OK</option>
				<option name="En attente">En attente</option>
			</select>
		

		<br />
		
		Magasin : <span class="label label-danger">Champ obligatoire</span><br />
			<select name="magasin" style="width:250px;" required class="form-control">
					<option value="<?php echo $ligne['magasin'] ; ?>">[ACTUELLEMENT] : <?php echo $ligne['magasin'] ; ?></option>				
					<option value="Avranches">Avranches</option>				
					<option value="Saint-James">Saint-James</option>
			</select>

		<hr />
		
	<button class="btn btn-lg btn-success">Enregistrer l'intervention <span class="glyphicon glyphicon-ok"></span></button>
	
	</center>

	</form>

</div>