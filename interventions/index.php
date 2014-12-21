<div class="container">

<table class="table">
	<tr>
		<td style="vertical-align:middle;">
			<button type="button" class="btn btn-info" data-toggle="collapse" data-target="#listing_demandes">
				<span class="glyphicon glyphicon-list"></span><br />Liste des<br />demandes d'intevention
			</button>
		</td>
		<td style="vertical-align:middle;">
			<button type="button" class="btn btn-info" data-toggle="collapse" data-target="#listing_interv_wip">
				<span class="glyphicon glyphicon-list"></span><br />Liste des<br />interventions en cours
			</button>
		</td>
		<td style="vertical-align:middle;">
			<button type="button" class="btn btn-info" data-toggle="collapse" data-target="#listing_interv_wait">
				<span class="glyphicon glyphicon-list"></span><br />Liste des<br />interventions en attente
			</button>
		</td>
		<td style="vertical-align:middle;">
			<button type="button" class="btn btn-info" data-toggle="collapse" data-target="#listing_interv_OK">
				<span class="glyphicon glyphicon-list"></span><br />Liste des<br />interventions en terminées
			</button>
		</td>
	</tr>
</table>

<?php include_once ("admin/recherche.php"); ?>

<br />

</div>

<div class="container1">	
	<!-- AFFICHAGE TABLEAU LISTE DES DEMANDES -->
	<div id="listing_demandes" class="collapse">
	<?php include_once("demande/listing_demandes.php"); ?>
	</div>
	
	<!-- AFFICHAGE TABLEAU LISTE DES INTERVENTIONS EN COURS -->
	<div id="listing_interv_wip" class="collapse">
	<?php include_once("interventions/listing_interv_wip.php"); ?>
	</div>
	
	<!-- AFFICHAGE TABLEAU LISTE DES INTERVENTIONS EN ATTENTE -->
	<div id="listing_interv_wait" class="collapse">
	<?php include_once("interventions/listing_interv_wait.php"); ?>
	</div>
	
	<!-- AFFICHAGE TABLEAU LISTE DES INTERVENTIONS TERMINEES -->
	<div id="listing_interv_OK" class="collapse">
	<?php include_once("interventions/listing_interv_OK.php"); ?>
	</div>
</div>

<br />