<?php // --- SUPPRESSION D'UN CLIENT
if ( (!empty($_POST)) && (isset($_POST["delete"])) && ($_POST["delete"]=="3") )
{
	$id = $_POST["id"];
	delete($id,"tclients");
?>
	<div class="alert alert-warning">La fiche client n° <?php echo $id; ?> vient d'être <strong>supprimée</strong> !</div>
<?php
} // FIN FONCTION SUPPRESSION
?>

<a href="#top" class="btn btn-info" style="position:fixed; margin:5px;"><span class="glyphicon glyphicon-plane"></span><br />Remonter</a>

<div class="container">
	<?php include_once ("admin/recherche.php"); ?>

<hr />

<center>
	<table>
		<tr>
			<td><form action="index.php?p=listing_clients" method="POST"><input type="hidden" name="liste" value="1" /><input type="hidden" name="lettre" value="A" /><button class="btn btn-default">A</button></form></td>
			<td><form action="index.php?p=listing_clients" method="POST"><input type="hidden" name="liste" value="1" /><input type="hidden" name="lettre" value="B" /><button class="btn btn-default">B</button></form></td>
			<td><form action="index.php?p=listing_clients" method="POST"><input type="hidden" name="liste" value="1" /><input type="hidden" name="lettre" value="C" /><button class="btn btn-default">C</button></form></td>
			<td><form action="index.php?p=listing_clients" method="POST"><input type="hidden" name="liste" value="1" /><input type="hidden" name="lettre" value="D" /><button class="btn btn-default">D</button></form></td>
			<td><form action="index.php?p=listing_clients" method="POST"><input type="hidden" name="liste" value="1" /><input type="hidden" name="lettre" value="E" /><button class="btn btn-default">E</button></form></td>
			<td><form action="index.php?p=listing_clients" method="POST"><input type="hidden" name="liste" value="1" /><input type="hidden" name="lettre" value="F" /><button class="btn btn-default">F</button></form></td>
			<td><form action="index.php?p=listing_clients" method="POST"><input type="hidden" name="liste" value="1" /><input type="hidden" name="lettre" value="G" /><button class="btn btn-default">G</button></form></td>
			<td><form action="index.php?p=listing_clients" method="POST"><input type="hidden" name="liste" value="1" /><input type="hidden" name="lettre" value="H" /><button class="btn btn-default">H</button></form></td>
			<td><form action="index.php?p=listing_clients" method="POST"><input type="hidden" name="liste" value="1" /><input type="hidden" name="lettre" value="I" /><button class="btn btn-default">I</button></form></td>
			<td><form action="index.php?p=listing_clients" method="POST"><input type="hidden" name="liste" value="1" /><input type="hidden" name="lettre" value="J" /><button class="btn btn-default">J</button></form></td>
			<td><form action="index.php?p=listing_clients" method="POST"><input type="hidden" name="liste" value="1" /><input type="hidden" name="lettre" value="K" /><button class="btn btn-default">K</button></form></td>
			<td><form action="index.php?p=listing_clients" method="POST"><input type="hidden" name="liste" value="1" /><input type="hidden" name="lettre" value="L" /><button class="btn btn-default">L</button></form></td>
			<td><form action="index.php?p=listing_clients" method="POST"><input type="hidden" name="liste" value="1" /><input type="hidden" name="lettre" value="M" /><button class="btn btn-default">M</button></form></td>
			<td><form action="index.php?p=listing_clients" method="POST"><input type="hidden" name="liste" value="1" /><input type="hidden" name="lettre" value="N" /><button class="btn btn-default">N</button></form></td>
			<td><form action="index.php?p=listing_clients" method="POST"><input type="hidden" name="liste" value="1" /><input type="hidden" name="lettre" value="O" /><button class="btn btn-default">O</button></form></td>
			<td><form action="index.php?p=listing_clients" method="POST"><input type="hidden" name="liste" value="1" /><input type="hidden" name="lettre" value="P" /><button class="btn btn-default">P</button></form></td>
			<td><form action="index.php?p=listing_clients" method="POST"><input type="hidden" name="liste" value="1" /><input type="hidden" name="lettre" value="Q" /><button class="btn btn-default">Q</button></form></td>
			<td><form action="index.php?p=listing_clients" method="POST"><input type="hidden" name="liste" value="1" /><input type="hidden" name="lettre" value="R" /><button class="btn btn-default">R</button></form></td>
			<td><form action="index.php?p=listing_clients" method="POST"><input type="hidden" name="liste" value="1" /><input type="hidden" name="lettre" value="S" /><button class="btn btn-default">S</button></form></td>
			<td><form action="index.php?p=listing_clients" method="POST"><input type="hidden" name="liste" value="1" /><input type="hidden" name="lettre" value="T" /><button class="btn btn-default">T</button></form></td>
			<td><form action="index.php?p=listing_clients" method="POST"><input type="hidden" name="liste" value="1" /><input type="hidden" name="lettre" value="U" /><button class="btn btn-default">U</button></form></td>
			<td><form action="index.php?p=listing_clients" method="POST"><input type="hidden" name="liste" value="1" /><input type="hidden" name="lettre" value="V" /><button class="btn btn-default">V</button></form></td>
			<td><form action="index.php?p=listing_clients" method="POST"><input type="hidden" name="liste" value="1" /><input type="hidden" name="lettre" value="W" /><button class="btn btn-default">W</button></form></td>
			<td><form action="index.php?p=listing_clients" method="POST"><input type="hidden" name="liste" value="1" /><input type="hidden" name="lettre" value="X" /><button class="btn btn-default">X</button></form></td>
			<td><form action="index.php?p=listing_clients" method="POST"><input type="hidden" name="liste" value="1" /><input type="hidden" name="lettre" value="Y" /><button class="btn btn-default">Y</button></form></td>
			<td><form action="index.php?p=listing_clients" method="POST"><input type="hidden" name="liste" value="1" /><input type="hidden" name="lettre" value="Z" /><button class="btn btn-default">Z</button></form></td>
		</tr>
	</table>
</center>
	
<hr />
<?php // Affichage liste client selon lettre
if ( (!empty($_POST)) && (isset($_POST["liste"])) && ($_POST["liste"]=="1") )
{
	$lettre=$_POST["lettre"];
	listing_clients($lettre);
}
?>

</div>

<center><a href="index.php?p=clients" class="btn btn-default btn-lg"><span class="glyphicon glyphicon-repeat"></span><br />Retour</a></center>
<br />