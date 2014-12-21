<?php
// Identifiants BDD
	$adresseSQL = '127.0.0.1';
	$pseudoSQL = 'root';
	$mdpSQL = '';
	$bddSQL = 'gestinterv';

// Connexion
	$db = mysql_connect ( $adresseSQL , $pseudoSQL , $mdpSQL ) ;
  
// Ouverture BDD
	mysql_select_db ( $bddSQL ) ;
?>
