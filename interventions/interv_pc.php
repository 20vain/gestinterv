<div class="container">

	<form action="intervention/ajout-intervention-pc.php" method="POST">
	
	<input type="hidden" name="idPreinterv" value="<?php echo $id; ?>" /> <!-- Code pré-intervention -->
	<input type="hidden" name="codeClient" value="<?php echo $ligne['codeClient']; ?>" /> <!-- Code Client -->

	<center><h1>Nouvelle intervention</h1></center>
		
		<fieldset>
			<center><b>Date de l'intervention</b> : <input name="dateInterv" type="text" class="calendrier form-control" value="<?php echo date('d/m/Y'); ?>" style="width:100px;" /> (date du jour)</center>
		<hr />
			<h2>Partie 1 - Analyses antivirus / anti-spywares</h2>
		<hr />
		
		<table class="table table-bordered table-condensed">
			<tr> <!-- Ligne en-têtes de colonnes -->
				<td style="text-align:center; vertical-align:middle;">
				</td>
				<td style="text-align:center; vertical-align:middle;">
					Analyses<br /><b>externes</b>
				</td>
				<td style="text-align:center; vertical-align:middle;">
					Analyses<br /><b>internes</b>
				</td>
				<td style="text-align:center; vertical-align:middle;">
					Informations complémentaires
				</td>
				<td style="text-align:center; vertical-align:middle;">
					Logiciels de nettoyage utilisés
				</td>
			</tr>
			
			<tr> <!-- Ligne virus -->
				<td style="text-align:center; vertical-align:middle;">
					<b>Virus</b>
				</td>
				<td style="text-align:center; vertical-align:middle;">
					<input name="antivirus-externe" type="text" class="form-control" />
				</td>
				<td style="text-align:center; vertical-align:middle;">
					<input name="antivirus-interne" type="text" class="form-control" />
				</td>
				<td>
					<div class="input-group">
						<label><span class="input-group-addon"><input type="checkbox" name="cookies" value="Cookies traçeurs uniquement" /> Cookies traçeurs uniquement</span></label>
					</div>
				</td>
				<td>
					<div class="input-group">
						<label><span class="input-group-addon"><input type="checkbox" name="adwcleaner" value="ADWC effectué" /> <b>ADW Cleaner</b></span></label>
					</div>
				</td>
			</tr>
			
			<tr> <!-- Ligne Malwares -->
				<td style="text-align:center; vertical-align:middle;">
					<b>Malwares</b>
				</td>
				<td style="text-align:center; vertical-align:middle;">
					<input name="malwares-externe" type="text" class="form-control" />
				</td>
				<td style="text-align:center; vertical-align:middle;">
					<input name="malwares-interne" type="text" class="form-control" />
				</td>
				<td>&nbsp;</td>
				<td>
					<div class="input-group">
						<label><span class="input-group-addon"><input type="checkbox" name="roguekiller" value="RK effectué" /> <b>RogueKiller</b></span></label>
					</div>
				</td>
			</tr>
			
			<tr> <!-- Ligne Spywares -->
				<td style="text-align:center; vertical-align:middle;">
					<b>Spywares</b>
				</td>
				<td style="text-align:center; vertical-align:middle;">
					&nbsp;
				</td>
				<td style="text-align:center; vertical-align:middle;">
					<input name="spywares" type="text" class="form-control" />
				</td>
				<td>
					<div class="input-group">
						<label><span class="input-group-addon"><input type="checkbox" name="scan-redemarrage" value="Scan Spybot au redémarrage effectué" /> Scan Spybot au redémarrage</span></label>
					</div>
				</td>
				<td>
					<div class="input-group">
						<label><span class="input-group-addon"><input type="checkbox" name="ccleaner" value="CC effectué" /> <b>CCleaner</b></span></label>
					</div>
				</td>
			</tr>
		</table>
		
		<br />
		
		<table class="table table-condensed">
			<tr>
				<td style="text-align:center; vertical-align:middle;">
					<div class="input-group">
						<label>
							<span class="input-group-addon"><input type="checkbox" name="virus[]" value="Optimisation du démarrage" />
							</span>
							<b>Optimisation</b> du démarrage
						</label>
					</div>
				</td>
				
				<td style="text-align:center; vertical-align:middle;">
					<div class="input-group">
						<label>
							<span class="input-group-addon">
								<input type="checkbox" name="virus[]" value="Réinitialisation des navigateurs web" />
							</span>
							<b>Réinitialisation</b><br />navigateurs web.
						</label>
					</div>
				</td>
				
				<td style="text-align:center; vertical-align:middle;">
					<div class="input-group">
						<label>
							<span class="input-group-addon">
								<input type="checkbox" name="virus[]" value="PC infecté par des virus & spywares" />
							</span>
							<b>PC infecté</b><br />par des virus & spywares
						</label>
					</div>
				</td>
				
				<td style="text-align:center; vertical-align:middle;">
					<div class="input-group">
						<label>
							<span class="input-group-addon">
								<input type="checkbox" name="virus[]" value="PC TRES infecté par de nombreux virus & spywares" />
							</span>
							<u><b>PC TRES infecté</b><br />par de nombreux virus & spywares</u>
						</label>
					</div>
				</td>
			
				<td style="text-align:center; vertical-align:middle;" >
					<div class="input-group">
						<label>
							<span class="input-group-addon">
								<input type="checkbox" name="virus[]" value="Présence de Toolbars" />
							</span>
							Présence de<br /><b>Toolbars</b>
						</label>
					</div>
				</td>
			</tr>
		</table>

		</fieldset>

		<hr />

		<fieldset>
		<h2>Partie 2 - Documents client</h2>
		<hr />
			<table class="table table-bordered">
				<tr>
					<td style='text-align:center; vertical-align:middle;'>
						<b>Sauvegarde des dossiers "Mes documents" + Bureau</b><br />
						<em><input type="text" name="sauvegarde[]" class="form-control" value="<?php echo $preInterv['dossierMesDocs']; ?>" /></em>
					</td>
					
					<td style='text-align:center; vertical-align:middle;'>
						<b>Dossiers annexes</b><br />
						<em><input type="text" name="sauvegarde[]" class="form-control" value="<?php echo $preInterv['dossierClt']; ?>" /></em>
					</td>
				</tr>
				
				<?php if ( ($preInterv['dossierMesDocs'] != "Aucun document à sauvegarder - ACCORD CLIENT.") || ($preInterv['dossierClt'] != "Aucun document à sauvegarder - ACCORD CLIENT.") ) 
				{ // Si il y a des dossiers à sauvegarder, on affiche une liste pour savoir sur quel serveur les fichiers sont sauvegardés ?>
				<tr>
					<td style='text-align:center; vertical-align:middle;'> <b>Serveur sur lequel les documents sont sauvgardés :</b><br />
						<select name="sauvegarde[]" class="form-control">
							<option></option>
							<optgroup label="Serveurs AVRANCHES - ATELIER 1"></optgroup>
								<option name="Fichiers sauvegardés sur Atelier 1.1 AVR - User MIS1">Atelier 1.1 AVR - User MIS1</option>
								<option name="Fichiers sauvegardés sur Atelier 1.1 AVR - User MIS2">Atelier 1.1 AVR - User MIS2</option>
								<option>&nbsp;</option>
								<option name="Fichiers sauvegardés sur Atelier 1.2 AVR - User MIS1">Atelier 1.2 AVR - User MIS1</option>
								<option name="Fichiers sauvegardés sur Atelier 1.2 AVR - User MIS2">Atelier 1.2 AVR - User MIS2</option>
							<option></option>
							<optgroup label="Serveurs AVRANCHES - ATELIER 2"></optgroup>
								<option name="Fichiers sauvegardés sur Atelier 2.1 AVR - User MIS1">Atelier 2.1 AVR - User MIS1</option>
								<option name="Fichiers sauvegardés sur Atelier 2.1 AVR - User MIS2">Atelier 2.1 AVR - User MIS2</option>
								<option name="Fichiers sauvegardés sur Atelier 2.2 AVR">Atelier 2.2 AVR</option>
								<option name="Fichiers sauvegardés sur Atelier 2.3 AVR">Atelier 2.3 AVR</option>
								<option name="Fichiers sauvegardés sur Atelier 2.4 AVR - User MIS1">Atelier 2.4 AVR - User MIS1</option>			
								<option name="Fichiers sauvegardés sur Atelier 2.4 AVR - User MIS2">Atelier 2.4 AVR - User MIS2</option>
							<option></option>					
							<optgroup label="Serveurs SAINT-JAMES"></optgroup>
								<option name="Fichiers sauvegardés sur Atelier 1 STJ">Atelier 1 STJ</option>	
								<option name="Fichiers sauvegardés sur Atelier 2 STJ">Atelier 2 STJ</option>
						</select>
					</td>
					
					<td style='text-align:center; vertical-align:middle;'><b>Poids total de la sauvegarde (en Go) :</b><br />
						<input type="text" name="poidsSauvegarde" class="form-control" /> 
					</td>
				</tr>
				<?php
				} ?>
			</table>
		</fieldset>
		
		<hr />
		
		<fieldset>
			<h2>Partie 3 - Installation / Mise à jour logiciels</h2>
				<hr />
			<b>Suppresion</b> de l'ancien antivirus ->
				<select name="suppression-ancien-antivirus" style="width:175px;">
					<option name="Non nécessaire">Non nécessaire</option>
					<option name="Antivir">Antivir</option>
					<option name="Avast">Avast</option>
					<option name="AVG">AVG</option>
					<option name="Bitdefender">Bitdefender</option>
					<option name="Comodo">Comodo</option>
					<option name="G-Data">G-Data</option>
					<option name="Kaspersky">Kaspersky</option>
					<option name="McAfee">McAfee</option>
					<option name="Norton">Norton</option>
					<option name="MSE">MSE</option>
					<option name="Orange Antivirus">Orange Antivirus</option>
					<option name="Panda">Panda</option>
					<option name="Trend">Trend</option>
					<option name="Autre">Autre</option>
				</select>
	<br />
			<h4>Liste des logiciels à installer / mettre à jour</h4>
				<?php
				// Requête d'affichage des LOGICIELS
					$logiciels = mysql_query ( "SELECT * FROM tlogiciels ;" ) or die ( mysql_error() ) ;
				// Boucle d'affichage
					while ( $logiciel_affichage = mysql_fetch_array($logiciels) )
					{ ?>
				
						<div class="input-group">
							<label>
								<span class="input-group-addon">
									<b><?php echo $logiciel_affichage["nom"]; ?></b>
								</span>
							</label>
							
							<label>
								<span class="input-group-addon">
									<input type="checkbox" name="logiciels[]" value="Installation <?php echo $logiciel_affichage["nom"]; ?>" /> Installation
								</span>
							</label>
							
							<label>
								<span class="input-group-addon">
									<input type="checkbox" name="logiciels[]" value="MàJ <?php echo $logiciel_affichage["nom"]; ?>" /> MàJ 
								</span>
							</label>
						</div>
					<?php } // FIN BOUCLE ?>

			<h4>Sous-partie Windows</h4>
			<input type='checkbox' name='maj[]' value='Mises à jour système' /> Installation des <b>mises à jour</b> du système
			<input type='checkbox' name='maj[]' value='Service Pack Windows installé(s)' /> <b>Service Pack</b> Windows installé(s)		
			<input type='checkbox' name='maj[]' value='Activation Windows' /> <b>Activation</b> Windows

		</fieldset>

		<hr />

		<fieldset><h2>Partie 4 - Observations & informations complémentaires</h2>
		<hr />
		
			
				<b>Mot de passe PC</b> : <input type="text" name="password" />

				<input type="checkbox" name="virus[]" value="Fichiers croisés au démarrage - Fiabilité HDD à voir" /> -> <b>Fichiers croisés</b> au démarrage - Fiabilité HDD à voir.

				<input type="checkbox" name="virus[]" value="Fiabilité PC douteuse" /> -> <b>Fiabilité PC douteuse</b> --- Informations complémentaires : <input type="text" name="fiabilite" width="75px;" /> 

		<hr />
		
		<h3><b>Mémoire</b></h3>

				<input type="checkbox" name="ram[]" value="Ajout RAM nécessaire"> <b>Ajout de mémoire vive (RAM) nécessaire</b>

			<br />
			<b>Qté de mémoire vive à ajouter</b> :
			<select name="ram[]" style="width:100px;">
				<option value=""></option>
				<option value="512 Mo">512 Mo</option>
				<option value="1 Go">1 Go</option>
				<option value="2 Go">2 Go</option>
				<option value="3 Go">3 Go</option>
				<option value="4 Go">4 Go</option>
				<option value="6 Go">6 Go</option>
				<option value="8 Go">8 Go</option>
			</select>
		---  
		<b>Type de RAM</b> :
			<select name="ram[]" style="width:150px;">
				<option value=""></option>
				<option value="DDR">DDR</option>
				<option value="DDR2">DDR 2</option>
				<option value="DDR3">DDR 3</option>
				<option value="DDR4">DDR 4</option>
				<option value="---">-----</option>
				<option value="SO-DIMM DDR">SO-DIMM DDR</option>
				<option value="SO-DIMM DDR2">SO-DIMM DDR 2</option>
				<option value="SO-DIMM DDR3">SO-DIMM DDR 3</option>
				<option value="SO-DIMM DDR4">SO-DIMM DDR 4</option>
			</select>
		<br />
		<b>Prix RAM</b> : <input type="text" name="ram[]" style="width:60px;" /> €

			
		<center><label><input type="checkbox" name="ram[]" value="RAM déjà installée dans le PC - Voir accord client"> <b>RAM <u>déjà installée</u> et <u>fonctionnelle</u> dans le PC.</b></center>
		
		<hr /><br />

			Type d'<b>intervention</b> :
			<select name="intervention" style="width:235px;">
			<option selected value="<?php echo $preInterv['typeInterv']; ?>">[ Présélection ] - <?php echo $preInterv['typeInterv']; ?></option>
			<?php
			// Requête d'affichage des TYPE D'INTERVENTIONS
				$type_interv = mysql_query ( "SELECT * FROM ttypeinterv ;" ) or die ( mysql_error() ) ;
			// Boucle d'affichage
				while ( $interv = mysql_fetch_array($type_interv) )
				{ echo "<option value='" . $interv['interv'] . "'>" . $interv['interv'] . "</option>"; }
			?>
			</select>
			
		<b>Matériel</b> :
			<select name="materiel">
				<option selected value="<?php echo $preInterv['materiel']; ?>">[ Présélection ] - <?php echo $preInterv['materiel']; ?></option>
				<?php
				$req3 = mysql_query ( "SELECT * FROM ttypemateriel ;" )  or  die ( mysql_error() ) ; // Requête d'affichage des TYPE D'INTERVENTIONS
				while ( $ligne33 = mysql_fetch_array($req3) ) // Boucle d'affichage
				{ echo "<option value='" . $ligne33['materiel'] . "'>" . $ligne33['materiel'] . "</option>"; }
				?>
			</select>
			
		<b>Observations</b> : <textarea name="observation" type="text" style="width:650px; height:250px;"></textarea>
		<br />
		<b>Technicien en charge du PC</b> :<br />
			<select name="technicien" required>
			<option name="NULL" selected></option>
			<?php
			// Requête d'affichage des TYPE D'INTERVENTIONS
				$req2 = mysql_query ( "SELECT * FROM ttechniciens ;" ) or die ( mysql_error() ) ;
			
			// Boucle d'affichage
				while ( $ligne22 = mysql_fetch_array($req2) )
				{ echo "<option value='" . $ligne22['nom'] . "'>" . $ligne22['nom'] . "</option>"; } ?>
			</select>


		<hr />			
				
	<h3><b>Coûts de l'intervention</b></h3>

	<table>
	<td style="text-align:center; vertical-align:middle;">

					<input name="cout-interv" type="checkbox" value="39" />Mini-Nettoyage

							<input class="input-small" type="text" style="text-align:right; width:50px;" value="39,00" />€ 

					<input name="cout-interv" type="checkbox" value="59" />Nettoyage

							<input class="input-small" type="text" style="text-align:right; width:50px;" value="59,00" />€ 

					<input name="cout-interv" type="checkbox" value="79" />Formatage

							<input class="input-small" type="text" style="text-align:right; width:50px;" value="79,00" />€ 

					<input name="mo-atelier" type="checkbox" value="1" />MO Atelier
						
						
							<input class="input-small" type="text" style="text-align:right; width:50px;" name="cout-mo" />€ 

	</td>

	<td style="width:50px;"></td>

	<td style="text-align:center; vertical-align:middle;">			
				
					 
					<input name="coutcomp1" type="checkbox" value="1" />Coût complémentaire n°1

							<input class="input-small" type="text" style="text-align:right; width:50px;" name="prix-coutcomp1" />€ --- <input type="text" size="45" name="name-coutcomp1" />

					<input name="coutcomp2" type="checkbox" value="1" />Coût complémentaire n°2

							<input class="input-small" type="text" style="text-align:right; width:50px;" name="prix-coutcomp2" />€ --- <input type="text" size="45" name="name-coutcomp2" />

					<input name="coutcomp3" type="checkbox" value="1" />Coût complémentaire n°3

							<input class="input-small" type="text" style="text-align:right; width:50px;" name="prix-coutcomp3" />€ --- <input type="text" size="45" name="name-coutcomp3" />

					<input name="coutcomp4" type="checkbox" value="1" />Coût complémentaire n°4
						
						
							<input class="input-small" type="text" style="text-align:right; width:50px;" name="prix-coutcomp4" />€ --- <input type="text" size="45" name="name-coutcomp4" />

	</td>
	</table>
			
		</fieldset>
		
		<br />

					<input type="checkbox" name="winxp" value="1" />Donner brochure <b>Windows XP</b>
				
					<input type="checkbox" name="win7" value="1" />Donner brochure <b>Windows 7</b>
				
					<input type="checkbox" name="win8" value="1" />Donner brochure <b>Windows 8</b>

				<center>État de l'intervention :<br />
				<select name="statut" style="width:250px;" required>
					<option name=""></option>
					<option name="En cours">En cours</option>
					<option name="Terminé - OK">Terminé - OK</option>
					<option name="En attente">En attente</option>
				</select></center>

		<hr />
			<center>Magasin :<br />
				<select name="magasin" style="width:250px;">
						<option value="<?php echo $ligne['magasin'] ; ?>">[ACTUELLEMENT] : <?php echo $ligne['magasin'] ; ?></option>				
						<option value="Avranches">Avranches</option>				
						<option value="Saint-James">Saint-James</option>
				</select></center>

		<hr />
		
		<center><button class="btn btn-large btn-success">Enregistrer l'intervention <i class="icon-ok-sign"></i></button></center>
		<br />

	</form>

</div>