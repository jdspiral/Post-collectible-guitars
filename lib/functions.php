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

function save_guitar($guitarToSave)
{
  $pdo = get_connection();

  $sql = "INSERT INTO guitars (name, make, age, strings, description) VALUES (:name,:make,:age,:strings,:description)";

  $stmt = $pdo->prepare($sql);

  $stmt->bindParam(':name', $guitarToSave['name'], PDO::PARAM_STR);
  $stmt->bindParam(':make', $guitarToSave['make'], PDO::PARAM_STR);
  $stmt->bindParam(':age', $guitarToSave['age'], PDO::PARAM_INT);
  $stmt->bindParam(':strings', $guitarToSave['strings'], PDO::PARAM_INT);
  $stmt->bindParam(':description', $guitarToSave['description'], PDO::PARAM_STR);
  $stmt->execute();

}

function edit_guitar($guitarToEdit)
{
  $pdo = get_connection();

  $sql = "UPDATE guitars SET name = :name, make = :make, age = :age, strings = :strings, description = :description WHERE id = :id";
  $stmt = $pdo->prepare($sql);
  $stmt->bindParam(':id', $guitarToEdit['id'], PDO::PARAM_INT);
  $stmt->bindParam(':name', $guitarToEdit['name'], PDO::PARAM_STR);
  $stmt->bindParam(':make', $guitarToEdit['make'], PDO::PARAM_STR);
  $stmt->bindParam(':age', $guitarToEdit['age'], PDO::PARAM_INT);
  $stmt->bindParam(':strings', $guitarToEdit['strings'], PDO::PARAM_INT);
  $stmt->bindParam(':description', $guitarToEdit['description'], PDO::PARAM_STR);

  $pdo->exec($sql);

}

}