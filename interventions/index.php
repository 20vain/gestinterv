<div class="container">

<table class="table">
	<tr>
		<td style="vertical-align:middle;">
			<a href="#interv_wip">
				<button type="button" class="btn btn-info" data-toggle="collapse" data-target="#listing_interv_wip">
					<span class="glyphicon glyphicon-list"></span><br />Liste des<br />interventions en cours
				</button>
			</a> 
		</td>
		<td style="vertical-align:middle;">
			<a href="#interv_wait">
				<button type="button" class="btn btn-info" data-toggle="collapse" data-target="#listing_interv_wait">
					<span class="glyphicon glyphicon-list"></span><br />Liste des<br />interventions en attente
				</button>
			</a>
		</td>
		<td style="vertical-align:middle;">
			<a href="#interv_OK">
				<button type="button" class="btn btn-info" data-toggle="collapse" data-target="#listing_interv_OK">
					<span class="glyphicon glyphicon-list"></span><br />Liste des<br />interventions en terminées
				</button>
			</a>
		</td>
	</tr>
</table>

<?php include_once ("admin/recherche.php"); ?>

<br />

</div>

<div class="container1">
	<?php include_once("demande/listing_demandes.php"); ?>

<hr />
	
	<!-- AFFICHAGE TABLEAU LISTE DES INTERVENTIONS EN COURS -->
	<div id="interv_wip">
		<div id="listing_interv_wip" class="collapse">
			<?php include_once("interventions/listing_interv_wip.php"); ?>
		</div>
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