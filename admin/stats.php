<?php
// Nombre de clients
	$sql1 = mysql_query ( "SELECT COUNT(*) AS CLIENTS FROM tclients ;" ) or die ( mysql_error() ) ;
	$r1 = mysql_fetch_array($sql1); // NB CLIENTS

// Nombre de demandes d'intervention
	$sql2 = mysql_query ( "SELECT COUNT(*) AS NB_DEMANDE_INTERV FROM tpreinterv ;" ) or die ( mysql_error() ) ;
	$r2 = mysql_fetch_array($sql2); // NB DEMANDES INTERVENTION
	
// Nombre de demandes d'intervention
	$sql3 = mysql_query ( "SELECT COUNT(*) AS NB_INTERV FROM tinterventions ;" ) or die ( mysql_error() ) ;
	$r3 = mysql_fetch_array($sql3); // NB DEMANDES INTERVENTION
	
// Nombre d'interventions effectuées par Gilles
	$sql4 = mysql_query ( "SELECT COUNT(*) AS NB_INTERV_GILLES FROM tinterventions WHERE technicien LIKE '%Gilles%' ;" ) or die ( mysql_error() ) ;
	$r4 = mysql_fetch_array($sql4); // NB DEMANDES INTERVENTION
?>

<center><h1>Statistiques</h1></center>
Nombre total de clients : <b><?php echo $r1["CLIENTS"]; ?></b> <br />
Nombre total de demandes : <b><?php echo $r2["NB_DEMANDE_INTERV"]; ?></b> <br />
Nombre total d'interventions : <b><?php echo $r3["NB_INTERV"]; ?></b> <br />
<br />

<h3>Nombre d'interventions selon les techniciens</h3>
<?php
	// Bouche pour récupérer les noms de tous les techniciens et les stocker dans un tableau
	$sql_tech = mysql_query ( "SELECT nom FROM ttechniciens ;" ) or die ( mysql_error() ) ;
	$rows = array();
	while($row = mysql_fetch_array($sql_tech)) { $rows[] = $row; }
    foreach($rows as $row){
		$nom_tech = $row['nom'];
		$sql_count_tech = mysql_query ( "SELECT COUNT(*) AS NOMBRE_INTERV FROM tinterventions WHERE technicien LIKE '%$nom_tech%' ;" ) or die ( mysql_error() ) ;
		while($row2 = mysql_fetch_array($sql_count_tech))
		{
			echo $nom_tech." = <b>".$row2['NOMBRE_INTERV']."</b><br />";
		}
	}
	unset($rows,$row);
?>
<br />

<h3>Nombre d'interventions selon le type d'intervention</h3>
<?php
	// Bouche pour récupérer les noms de tous les techniciens et les stocker dans un tableau
	$sql_typeinterv = mysql_query ( "SELECT nom FROM ttypeinterv ;" ) or die ( mysql_error() ) ;
	$rows = array();
	while($row = mysql_fetch_array($sql_typeinterv)) { $rows[] = $row; }
    foreach($rows as $row){
		$nom_typeinterv = $row['nom'];
		$sql_count_typeinterv = mysql_query ( "SELECT COUNT(*) AS NB_TYPE_INTERV FROM tinterventions WHERE intervention LIKE '%$nom_typeinterv%' ;" ) or die ( mysql_error() ) ;
		while($row = mysql_fetch_array($sql_count_typeinterv))
		{
			echo $nom_typeinterv." = <b>".$row['NB_TYPE_INTERV']."</b><br />";
		}
	}
?>
<br />

<h3>Nombre de type de matériel</h3>
<?php
	// Bouche pour récupérer les noms de tous les techniciens et les stocker dans un tableau
	$sql_typemateriel = mysql_query ( "SELECT nom FROM ttypemateriel ;" ) or die ( mysql_error() ) ;
	$rows = array();
	while($row = mysql_fetch_array($sql_typemateriel)) { $rows[] = $row; }
    foreach($rows as $row){
		$nom_typemateriel = $row['nom'];
		$sql_count_typemateriel = mysql_query ( "SELECT COUNT(*) AS NB_TYPE_MATERIEL FROM tinterventions WHERE materiel	LIKE '%$nom_typemateriel%' ;" ) or die ( mysql_error() ) ;
		while($row = mysql_fetch_array($sql_count_typemateriel))
		{
			echo $nom_typemateriel." = <b>".$row['NB_TYPE_MATERIEL']."</b><br />";
		}
	}
?>
<br /> <br />