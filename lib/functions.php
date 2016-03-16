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

function checkImage($image = array())
{
  //if they DID upload a file...
  $target_dir = "images/";
  $target_file = $target_dir . basename($image["name"]);
  $uploadOk = 1;
  $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
  // Check if image file is a actual image or fake image
  if(isset($_POST["submit"])) {
    $check = getimagesize($image["tmp_name"]);
    if($check !== false) {
      echo "File is an image - " . $check["mime"] . ".";
      $uploadOk = 1;
    } else {
      echo "File is not an image.";
      $uploadOk = 0;
    }
  }

  // Check if file already exists
  if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
  }
  // Check file size
  if ($image["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
  }
  // Allow certain file formats
  if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
  && $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
  }
  // Check if $uploadOk is set to 0 by an error
  if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
  // if everything is ok, try to upload file
  } else {
    if (move_uploaded_file($image["tmp_name"], $target_file)) {
      echo "The file ". basename( $image["name"]). " has been uploaded.";
    } else {
      echo "Sorry, there was an error uploading your file.";
    }
  }
}

// function login($user_name, $password)
// {
//   $pdo = get_connection();


// }

