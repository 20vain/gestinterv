<?php
$PARAM_host='localhost';
$PARAM_db='misinterv'; 
$PARAM_user='root'; 
$PARAM_mdp=''; 

try
{ $connexion = new PDO('mysql:host='.$PARAM_host.';dbname='.$PARAM_db, $PARAM_user, $PARAM_mdp); }
catch(Exception $e)
{
    echo 'Erreur : '.$e->getMessage().'<br />';
    echo 'N° : '.$e->getCode();
}

?>
