<?php
// Identifiants BDD
	$adresseSQL = '127.0.0.1';
	$pseudoSQL = 'root';
	$mdpSQL = '';
	$bddSQL = 'misinterv';

// Connexion
	$db = mysql_connect ( $adresseSQL , $pseudoSQL , $mdpSQL ) ;
  
// Ouverture BDD
	mysql_select_db ( $bddSQL ) ;
?>
