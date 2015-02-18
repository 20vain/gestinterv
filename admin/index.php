<head>
	<script> <!-- Affichage du panneau selon le bouton cliqué -->
	$(document).ready(function(){
		$("#flip1").click(function(){
			$("#panel1").slideToggle("slow");
		});
	});
	
	$(document).ready(function(){
		$("#flip2").click(function(){
			$("#panel2").slideToggle("slow");
		});
	});
	
	$(document).ready(function(){
		$("#flip3").click(function(){
			$("#panel3").slideToggle("slow");
		});
	});
	
	$(document).ready(function(){
		$("#flip4").click(function(){
			$("#panel4").slideToggle("slow");
		});
	});
	</script>

</head>

<center><h2>Gestion du système GESTINTERV</h2></center>

<div class="container">

<div id="flip1"><button class="btn btn-large">Liste des MATERIELS</button></div><br />
<div id="flip2"><button class="btn btn-large">Liste des TYPES D'INTERVENTION</button></div><br />
<div id="flip3"><button class="btn btn-large">Liste des TECHNICIENS</button></div><br />
<div id="flip4"><button class="btn btn-large">Liste des LOGICIELS</button></div>


<div id="panel1">
	<?php include ("typemateriel.php"); ?>
</div>

<div id="panel2">
	<?php include ("typeinterv.php"); ?>
</div>

<div id="panel3">
	<?php include ("techniciens.php"); ?>
</div>

<div id="panel4">
	<?php include ("logiciels.php"); ?>
</div>


<hr />
<?php include ("stats.php"); ?>

<hr />
	<p align="right"><a href="#top" class="btn btn-info"><span class="glyphicon glyphicon-plane"></span> Remonter <span class="glyphicon glyphicon-plane"></span></a></p>

</div>