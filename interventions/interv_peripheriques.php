<!-- TABLETTE - IMPRIMANTES - PERIPHERIQUES - AUTRES -->

<form action="intervention/ajout-intervention-peripheriques.php" method="POST">
<!-- Variables "cachées" - lien entre les tables / informations -->
<input type="hidden" name="codePreInterv" value="<?php echo $id; ?>"> <!-- Code pré-intervention -->
<input type="hidden" name="codeClient" value="<?php echo $ligne['codeClient']; ?>"> <!-- Code Client -->

<h1>Observations & rapport d'intervention</h1>

<fieldset class="well">
	<center><div class="ligne"><b>Date de l'intervention</b> : <input name="dateInterv" type="text" style="width:75px;" class="calendrier" value="<?php echo date('d/m/Y'); ?>" /> (date du jour)</div></center>
	<br />
	
	<fieldset>
	<div class="ligne"><b>Type d'intervention</b> :
		<select name="intervention" style="width:250px;">
		<option selected value="<?php echo $preInterv['typeInterv']; ?>">[ Présélection ] - <?php echo $preInterv['typeInterv']; ?></option>
		<?php
		// Requête d'affichage des TYPE D'INTERVENTIONS
			$type_interv = mysql_query ( "SELECT * FROM ttypeinterv ;" )  or  die ( mysql_error() ) ;
		// Boucle d'affichage
			while ( $interv = mysql_fetch_array($type_interv) )
			{ echo "<option value='" . $interv['interv'] . "'>" . $interv['interv'] . "</option>"; }
		?>
		</select>
	</div>
		
	<div class="ligne"><b>Matériel</b> :
		<select name="materiel" style="width:325px;">
		<option selected value="<?php echo $preInterv['materiel']; ?>">[ Présélection ] - <?php echo $preInterv['materiel']; ?></option>
			<?php
			$req3 = mysql_query ( "SELECT * FROM ttypemateriel ;" )  or  die ( mysql_error() ) ; // Requête d'affichage des TYPE D'INTERVENTIONS
			while ( $ligne33 = mysql_fetch_array($req3) ) // Boucle d'affichage
			{ echo "<option value='" . $ligne33['materiel'] . "'>" . $ligne33['materiel'] . "</option>"; }
			?>
		</select>
	</div>
		
	<div class="ligne"><b>Observations</b> : <textarea name="observation" type="text" style="width:750px;" rows="8" ></textarea> </div>

	<div class="ligne"><b>Suivi par</b> :
		<select name="technicien" style="width:350px;">
		<option name="NICOLAS" selected>NICOLAS</option>
		<?php
		// Requête d'affichage des TYPE D'INTERVENTIONS
			$req2 = mysql_query ( "SELECT * FROM ttechniciens ;" )  or  die (mysql_error() ) ;
		
		// Boucle d'affichage
			while ( $ligne22 = mysql_fetch_array($req2) )
			{ echo "<option value='" . $ligne22['nom'] . "'>" . $ligne22['nom'] . "</option>"; } ?>
		</select>
	</div>
		
		<br /><br />
		
		<fieldset> <legend><b>Coûts de l'intervention</b></legend>
			<div class="ligne"> <u>Coût</u> : <input name="cout-interv" type="text" style="width:100px;" /> €</div>
			
			<div class="ligne">
				<div class="input-prepend"> 
				<span class="add-on"><label class='checkbox'><input name="coutcomp1" type="checkbox" value="1" />Coût complémentaire n°1</label></span>
					
					<div class="input-append">
						<input class="input-small" type="text" style="text-align:right; width:50px;" name="prix-coutcomp1" />
						<span class="add-on">€</span> --- <input type="text" size="45" name="name-coutcomp1" />
					</div>
					
				</div>
			</div>

			<div class="ligne">
				<div class="input-prepend"> 
				<span class="add-on"><label class='checkbox'><input name="coutcomp2" type="checkbox" value="1" />Coût complémentaire n°2</label></span>
					
					<div class="input-append">
						<input class="input-small" type="text" style="text-align:right; width:50px;" name="prix-coutcomp2" />
						<span class="add-on">€</span> --- <input type="text" size="45" name="name-coutcomp2" />
					</div>
				</div>
			</div>
			
			<div class="ligne">
				<div class="input-prepend"> 
				<span class="add-on"><label class='checkbox'><input name="coutcomp3" type="checkbox" value="1" />Coût complémentaire n°3</label></span>
					
					<div class="input-append">
						<input class="input-small" type="text" style="text-align:right; width:50px;" name="prix-coutcomp3" />
						<span class="add-on">€</span> --- <input type="text" size="45" name="name-coutcomp3" />
					</div>
				</div>
			</div>
			
		</fieldset>
		
	</fieldset>
	
	<br />
	
	<fieldset style="background-color:#dfdfdf">
		<div class="ligne">
			<center><b>État de l'intervention</b> :
				<select name="statut" style="width:250px;">
					<option name="À faire URGENT">À faire URGENT</option>
					<option name="À faire">À faire</option>
					<option name="En cours" selected>En cours</option>
					<option name="Terminé - OK">Terminé - OK</option>
					<option name="En attente">En attente</option>
				</select>
			</center>
		</div>
	<hr />
		<div class="ligne">
		<center><b>Magasin</b> :
			<select name="magasin" style="width:275px;">
				<option value="<?php echo $ligne['magasin'] ; ?>">[ACTUELLEMENT] : <?php echo $ligne['magasin'] ; ?></option>				
				<option value="Avranches">Avranches</option>				
				<option value="Saint-James">Saint-James</option>
			</select>
		</center>
		</div>
	</fieldset>

	<br />
	
	<center><button class="btn btn-large btn-primary">Ajouter & Imprimer la fiche</button></center>
	
</fieldset>
</form>
