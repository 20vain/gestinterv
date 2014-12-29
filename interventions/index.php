<div class="container">
	<a href="#demandes">
		<button type="button" class="btn btn-primary" data-toggle="collapse" data-target="#listing_demandes">
			<span class="glyphicon glyphicon-list"></span><br />Liste des<br /><b>demandes d'interventions</b>
		</button>
	</a>

	<a href="#interv_wip">
		<button type="button" class="btn btn-default" data-toggle="collapse" data-target="#listing_interv_wip">
			<span class="glyphicon glyphicon-list"></span><br />Liste des<br />interventions <b>en cours</b>
		</button>
	</a> 

	<a href="#interv_wait">
		<button type="button" class="btn btn-warning" data-toggle="collapse" data-target="#listing_interv_wait">
			<span class="glyphicon glyphicon-list"></span><br />Liste des<br />interventions <b>en attente</b>
		</button>
	</a>

	<a href="#interv_OK">
		<button type="button" class="btn btn-success" data-toggle="collapse" data-target="#listing_interv_OK">
			<span class="glyphicon glyphicon-list"></span><br />Liste des<br />interventions <b>terminées</b>
		</button>
	</a>
</div>

<div class="container">
<?php include_once ("admin/recherche.php"); ?>
</div>

<div class="container1">
<hr />

<!-- Par défaut, les tableaux "demandes" et "interventions en cours" sont déjà affichés
	
	<!-- AFFICHAGE TABLEAU LISTE DES DEMANDES D'INTERVENTIONS -->
	<div id="demandes">
			<?php include_once("demande/listing_demandes.php"); ?>
			<p align="right"><a href="#top" class="btn btn-info"><span class="glyphicon glyphicon-plane"></span> Remonter <span class="glyphicon glyphicon-plane"></span></a></p>
	</div>
	
	<!-- AFFICHAGE TABLEAU LISTE DES INTERVENTIONS EN COURS -->
	<div id="interv_wip">
		<?php include_once("interventions/listing_interv_wip.php"); ?>
	</div>
	
	<!-- AFFICHAGE TABLEAU LISTE DES INTERVENTIONS EN ATTENTE -->
	<div id="interv_wait">
		<div id="listing_interv_wait" class="collapse">
			<?php include_once("interventions/listing_interv_wait.php"); ?>
		</div>
	</div>
	
	<!-- AFFICHAGE TABLEAU LISTE DES INTERVENTIONS TERMINEES -->
	<div id="interv_OK">
		<div id="listing_interv_OK" class="collapse">
			<?php include_once("interventions/listing_interv_OK.php"); ?>
		</div>
	</div>
	
<br />

	<p align="right"><a href="#top" class="btn btn-info"><span class="glyphicon glyphicon-plane"></span> Remonter <span class="glyphicon glyphicon-plane"></span></a></p>
</div>

<br />