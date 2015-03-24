<?php // Récupération variables d'identification pour redirections
$idPreinterv = $_POST["idPreinterv"];
$codeClient = $_POST["codeClient"];
?>

	<a href="#top" class="btn btn-info" style="position:fixed; margin:5px;"><span class="glyphicon glyphicon-plane"></span><br />Remonter</a>

<div class="container">

	<form action="interventions/ajout_interv_pc.php" method="POST">
	
	<input type="hidden" name="idPreinterv" value="<?php echo $idPreinterv; ?>" /> <!-- Code pré-intervention -->
	<input type="hidden" name="codeClient" value="<?php echo $codeClient; ?>" /> <!-- Code Client -->

	<center><h1>Nouvelle intervention</h1></center>
		
		<fieldset>
			<center><b>Date de l'intervention</b> <input name="dateInterv" type="text" class="calendrier form-control" value="<?php echo date('d/m/Y'); ?>" style="width:100px;" /> (date du jour)</center>
		<hr />
			<h2>Partie 1 - Analyses antivirus / anti-spywares</h2>
		<br />
	
	<div class="well">
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
						<label><span class="input-group-addon"><input type="checkbox" name="scan-redemarrage" value="Scan Spybot au redémarrage effectué" /> Scan Spybot effectué<br />au redémarrage du PC</span></label>
					</div>
				</td>
				<td>
					<div class="input-group">
						<label><span class="input-group-addon"><input type="checkbox" name="ccleaner" value="CC effectué" /> <b>CCleaner</b></span></label>
					</div>
				</td>
			</tr>
		</table>
	</div>
	
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
							<b>Réinitialisation</b><br />navigateurs web
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
		<br />
		
		<div class="well">
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
							<?php
							// Requête d'affichage des SERVEURS
								$serveurs = mysql_query ( "SELECT * FROM tserveurs ;" ) or die ( mysql_error() ) ;
							// Boucle d'affichage
								while ( $serveurs_liste = mysql_fetch_array($serveurs) )
								{ ?>
								<option name="<?php echo $serveurs_liste["nom"]; ?>"><?php echo $serveurs_liste["nom"]; ?></option>
							<?php } // FIN BOUCLE ?>
						</select>
					</td>
					<td style='text-align:center; vertical-align:middle;'><b>Poids total de la sauvegarde (en Go) :</b><br />
						<input type="text" name="poidsSauvegarde" class="form-control" /> 
					</td>
				</tr>
				<?php
				} ?>
			</table>
		</div>
			
		</fieldset>
		
		
		<hr />
		
		<fieldset>
			<h2>Partie 3 - Installation / Mise à jour logiciels</h2>
				<br />
		<div class="well">
			<b>Suppresion</b> de l'ancien antivirus
				<select name="suppression-ancien-antivirus" style="width:175px;" class="form-control">
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
					<option name="Windows Defender">Windows Defender</option>
					<option name="Autre">Autre</option>
				</select>
		<br />
			<h3>Liste des logiciels à installer / mettre à jour</h3>

			<table>
					<?php
				// Requête d'affichage des LOGICIELS
					$logiciels = mysql_query ( "SELECT * FROM tlogiciels ;" ) or die ( mysql_error() ) ;
				// Boucle d'affichage
					while ( $logiciel_affichage = mysql_fetch_array($logiciels) )
					{ ?>
				<tr>
					<td>
						<label><b><?php echo $logiciel_affichage["nom"]; ?></b></label>
					</td>
					<td>
						<label>
							<span class="input-group-addon">
								<input type="checkbox" name="logiciels[]" value="Installation <?php echo $logiciel_affichage["nom"]; ?>" /> Installation
							</span>
						</label>
					</td>
					<td>
						<label>
							<span class="input-group-addon">
								<input type="checkbox" name="logiciels[]" value="MàJ <?php echo $logiciel_affichage["nom"]; ?>" /> Mise à Jour
							</span>
						</label>
					</td>
				</tr>
					<?php } // FIN BOUCLE ?>
			</table>			

		</div>
		
		<h3>Sous-partie Windows</h3>
		
		<table class="table">
			<tr>
				<td style="text-align:center; vertical-align:middle;">
					<div class="input-group">
						<label>
							<span class="input-group-addon">
								<input type='checkbox' name='maj[]' value='Mises à jour système' />
							</span>
							Installation des <b>mises à jour</b> du système
						</label>
					</div>
				</td>
				
				<td style="text-align:center; vertical-align:middle;">
					<div class="input-group">
						<label>
							<span class="input-group-addon">
								<input type='checkbox' name='maj[]' value='Service Pack Windows installé(s)' />
							</span>
							<b>Service Pack</b> Windows installé(s)
						</label>
					</div>
				</td>
				
				<td style="text-align:center; vertical-align:middle;">
					<div class="input-group">
						<label>
							<span class="input-group-addon">
								<input type='checkbox' name='maj[]' value='Activation Windows' />
							</span>
							<b>Activation</b> Windows
						</label>
					</div>
				</td>
			</tr>
		</table>

		</fieldset>

		<hr />

		<fieldset><h2>Partie 4 - Observations & informations complémentaires</h2>
			<br />
		
		<div class="well">
			<table class="table table-condensed">
				<tr>
					<td rowspan="2">
						<div class="input-group">
							<label>
							Informations complémentaires relatives à la fiabilité de l'ordinateur :
								<span class="input-group-addon">
									<textarea name="fiabilite" class="form-control" style="width:500px; height:200px;"></textarea>
								</span>
							</label>
						</div>
					</td>
					
					<td style="text-align:center; vertical-align:middle;">
						<div class="input-group">
							<label>
								<span class="input-group-addon">
									<input type="checkbox" name="virus[]" value="Fiabilité PC douteuse" />
								</span>
								<b>Fiabilité PC douteuse</b>
							</label>
						</div>
					</td>
					<td style="text-align:center; vertical-align:middle;">
						<div class="input-group">
							<label>
								<span class="input-group-addon">
									<input type="checkbox" name="virus[]" value="Fichiers croisés au démarrage - Fiabilité HDD à voir" />
								</span>
								<b>Fichiers croisés</b> au démarrage - Fiabilité HDD à voir.
							</label>
						</div>
					</td>
					
				</tr>
			</table>
		</div>

			<b>Session utilisateur</b> <input type="text" name="session" class="form-control" style="width:250px;" value="<?php echo $preInterv['session'] ;?>" />
			<b>Mot de passe PC</b> <input type="text" name="password" class="form-control" style="width:250px;" value="<?php echo $preInterv['password'] ;?>" />
			
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
			
			<h3>Mémoire</h3>
			
			<table class="table table-condensed well">
				<tr>
					<td style="text-align:center; vertical-align:middle;">
						<div class="input-group">
							<label>
								<span class="input-group-addon">
									<input type="checkbox" name="ram[]" value="Ajout RAM nécessaire">
								</span>
								<b>Ajout de mémoire vive (RAM) nécessaire</b>
							</label>
						</div>
					</td>
					
					<td style="text-align:center; vertical-align:middle;">
						<div class="input-group">
						&nbsp;
						</div>
					</td>
				</tr>
				<tr>
					<td style="text-align:center; vertical-align:middle;">
						<div class="input-group">
							<b>Qté de mémoire vive à ajouter</b><br />
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
						</div>
					</td>
					<td style="text-align:center; vertical-align:middle;">
						<b>Type de RAM</b>
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
					</td>
					<td style="text-align:center; vertical-align:middle;">
						<div class="input-group">
							<label>
								<b>Prix de la RAM</b>
								<span class="input-group-addon">
									<input type="text" name="ram[]" style="width:60px;" /> €
								</span>
							</label>
						</div>
					</td>
				</tr>
				
				<tr>
					<td style="text-align:center; vertical-align:middle;">
						<label><input type="checkbox" name="ram[]" value="RAM déjà installée dans le PC - Voir accord client"> <b>RAM <u>déjà installée</u> et <u>fonctionnelle</u> dans le PC.</b></label>
					</td>
				</tr>
			</table>
			
			<hr />

		<h2>Partie 5 - Coûts de l'intervention</h2>

	<div class="well">
				<table class="table table-condensed">
					<tr>
						<td style="text-align:center; vertical-align:middle;">
							<label>
								<input name="cout-interv" type="checkbox" value="39" /> Mini-Nettoyage
								<div class="input-group">
									<input class="form-control" type="text" value="39,00" /><span class="input-group-addon">€</span>
								</div>
							</label>
						</td>
						<td style="text-align:center; vertical-align:middle;">
							<label>
								<input name="cout-interv" type="checkbox" value="59" /> Nettoyage
								<div class="input-group">
									<input class="form-control" type="text" value="59,00" /><span class="input-group-addon">€</span>
								</div>
							</label>
						</td>
						<td style="text-align:center; vertical-align:middle;">
							<label>
								<input name="cout-interv" type="checkbox" value="79" /> Formatage
								<div class="input-group">
									<input class="form-control" type="text" value="79,00" /><span class="input-group-addon">€</span>
								</div>
							</label>
						</td>
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
			
			<br />
			
			<table class="table table-condensed">
					<tr>
						<td style="text-align:center; vertical-align:middle;">
							<div class="input-group">
								<label>
									<span class="input-group-addon"><input type="checkbox" name="orange" value="1" /></span>
									Donner brochure <b>Windows orange</b>
								</label>
							</div>
						</td>
						
						<td style="text-align:center; vertical-align:middle;">
							<div class="input-group">
								<label>
									<span class="input-group-addon"><input type="checkbox" name="win7" value="1" /></span>
									Donner brochure <b>Windows 7</b>
								</label>
							</div>
						</td>
						
						<td style="text-align:center; vertical-align:middle;">
							<div class="input-group">
								<label>
									<span class="input-group-addon"><input type="checkbox" name="win8" value="1" /></span>
									Donner brochure <b>Windows 8</b>
								</label>
							</div>
						</td>			
					</tr>
				</table>
			
			</br>
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