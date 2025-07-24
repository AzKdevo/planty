<?php
$mysqli = new mysqli('localhost', 'root', '', 'nom_de_ta_base');

if ($mysqli->connect_error) {
    die('Erreur de connexion (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
}
echo 'Connexion réussie à la base de données.';
?>
