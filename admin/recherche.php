<?php
	if ( (isset($_POST)) && (!empty($_POST)) )
	{
		if (isset($_POST["nom"])) 
		{ $nom=$_POST["nom"]; } else { $nom=""; }
		
		if (isset($_POST["telFixe"])) 
		{ $telFixe=$_POST["telFixe"]; } else { $telFixe=""; }
	
		if (isset($_POST["telPort"])) 
		{ $telPort=$_POST["telPort"]; } else { $telPort=""; }

		search_client ($nom,$telFixe,$telPort);
	}
?>

<center><h3> Rechercher un client</h3></center>

<form class="form-search" action="" method="POST">
	<input type="hidden" name="recherche" value="1" />
<table class="table well">	
	<tr>
		<td>
			<div class="input-group">
				<span class="input-group-addon glyphicon glyphicon-phone"></span>
				<input type="text" class="form-control" name="telPort" maxlength="10" placeholder="0634567890" />
			</div>
		</td>
		
		<td>
			<div class="input-group">
				<span class="input-group-addon glyphicon glyphicon-phone-alt"></span>
				<input type="text" class="form-control" name="telFixe" maxlength="10" placeholder="0234567890" />
			</div>
		</td>
		
		<td>
			<div class="input-group">
				<span class="input-group-addon glyphicon glyphicon-user"></span>
				<input type="text" class="form-control" name="nom" maxlength="50" placeholder="NOM client" />
			</div>
		</td>
	</tr>
	
	<tr>
		<td colspan="3" align="center">
			<button class="btn btn-primary btn-lg" type="submit"><span class="glyphicon glyphicon-search"></span><br />Lancer la recherche</button>
		</td>
	</tr>
</table>
</form>