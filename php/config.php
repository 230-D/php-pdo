<?php


// Variablen fuer PDO Instanz

$dbHost = 'localhost';
$dbName = 'schule';
$dbUser = 'root';
$dbPasswd = '';


try {
    new PDO("mysql:host={$dbHost}; dbName={$dbName}", $dbUser, $dbPasswd);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Wenn nicht möglich
} catch (PDOException $error) {
    echo $error-> getMessage();
}