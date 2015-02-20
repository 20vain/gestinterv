<a href="#top" class="btn btn-info" style="position:fixed; margin:5px;"><span class="glyphicon glyphicon-plane"></span><br />Remonter</a>

<div class="container"> <?php include_once ("admin/recherche.php"); ?> </div>

<div class="container1">
<hr />
	<!-- AFFICHAGE TABLEAU LISTE DES DEMANDES D'INTERVENTIONS -->
	<?php include_once("demande/listing_demandes.php"); ?>
	<hr />
	
	<!-- AFFICHAGE TABLEAU LISTE DES INTERVENTIONS EN COURS -->
	<?php include_once("interventions/listing_interv_wip.php"); ?>
	<hr />
	
	<!-- AFFICHAGE TABLEAU LISTE DES INTERVENTIONS EN ATTENTE -->
	<?php include_once("interventions/listing_interv_wait.php"); ?>
	<hr />
	
	<!-- AFFICHAGE TABLEAU LISTE DES INTERVENTIONS TERMINEES -->
	<?php include_once("interventions/listing_interv_OK.php"); ?>
</div>

<br />