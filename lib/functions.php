<?php

function get_connection() {
    $config = require 'lib/config.php';

    $pdo = new PDO(
        $config['database_dsn'],
        $config['database_user'],
        $config['database_pass']
    );

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $pdo;
}

function get_guitars($limit = null) {
	$pdo = get_connection();

  $query = 'SELECT * FROM guitars';
  if ($limit) {
  	$query .= ' LIMIT :resultLimit';
  }
  $stmt = $pdo->prepare($query);
  $stmt->bindParam('resultLimit', $limit, PDO::PARAM_INT);
  $stmt->execute();
  $guitars = $stmt->fetchAll();

  return $guitars;
}

function get_guitar($id)
{
    $pdo = get_connection();
    $query = 'SELECT * FROM guitars WHERE id = :idVal';
    $stmt = $pdo->prepare($query);
    $stmt->bindParam('idVal', $id);
    $stmt->execute();

    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function save_guitars($guitarsToSave) {
	$json = json_encode($guitarsToSave, JSON_PRETTY_PRINT);
	file_put_content('data/guitars.json', $json);
}