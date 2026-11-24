<?php
try {
  $db = new PDO(
    'mysql:host=localhost;dbname=netfloux;charset=utf8mb4',
    username: 'root',
    password: '',
    options: [
      PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
      PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]
  );
} catch (PDOException $e) {
  die('Erreur de connexion à la base de données : ' . $e->getMessage());
}
