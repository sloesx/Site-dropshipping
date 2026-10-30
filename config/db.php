<?php
$host = 'localhost';
$dbname = 'ecom';
$username = 'root';
$password = '';
try {
$pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $e) {
die('Erreur de connexion SQL : ' . $e->getMessage());
}