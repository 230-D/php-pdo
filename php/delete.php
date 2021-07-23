<?php


include_once("config.php");


$id = $_GET['id'];

$sql = "DELETE from schueler where id = :id";

$query =$db ->prepare($sql);
$query ->execute(array(:id => $id));

// Umleiten
header("Location: index.php");
