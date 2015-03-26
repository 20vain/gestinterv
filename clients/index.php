<center>
	<h1>Gestion des clients</h1>
	<hr />
	
	<div class="container">
		<table class="table">
			<tr>
					<td width="250px;">&nbsp;</td>
				<td style="vertical-align:middle;" align="left">
					<a href="index.php?p=listing_clients" class="btn btn-primary btn-lg"><span class="glyphicon glyphicon-list"></span><br />Liste des clients</a>
				</td>
				<td style="vertical-align:middle;" align="right">
					<a href="index.php?p=add_client" class="btn btn-success btn-lg"><span class="glyphicon glyphicon-list-alt"></span><br />Créer une nouvelle<br/>fiche client</a>
				</td>
					<td width="250px;">&nbsp;</td>
			</tr>
		</table>

		<hr />
		<?php include_once ("admin/recherche.php"); ?>
		<hr />
	</div>
</center>