<?php

include_once 'PDO.php';

function addMusic($name, $type, $musicUrl, $imageUrl) {
  $query = "INSERT INTO music(name, type, musicUrl, imageUrl) VALUES (:name, :type, :musicUrl, :imageUrl);";
  $statement = connect()->prepare($query);

  try {
      $statement->execute(['name' => $name, 'type' => $type, 'musicUrl' => $musicUrl, 'imageUrl' => $imageUrl]);
      header("Location: ../manage_music.php");
  }
  catch(Exception $e) {
      echo "manage_music_controller.php error in ---> addMusic(). Error message + " . $e->getMessage();
  }
}

function deleteMusic($id) {
  $sql = "DELETE FROM music WHERE id =  :id";

  try {
    $statement = connect()->prepare($sql);
    $statement->bindParam(':id', $id, PDO::PARAM_INT);
    $statement->execute();
  }
  catch(Exception $e) {
      echo "manage_music_controller.php error in ---> deleteMusic(). Error message + " . $e->getMessage();
  }
}

function getMusicType($type) {
  $query = "SELECT * FROM music WHERE type = :type;";

  try {
    $statement = connect()->prepare($query);
    $statement->bindParam(':type', $type, PDO::PARAM_STR);
    $statement->execute();
    $music = $statement->fetchAll(PDO::FETCH_CLASS);

    return $music;
  }
  catch(Exception $e) {
    echo "manage_music_controller.php error in ---> getMusicType(). Error message + " . $e->getMessage();
  }
}


function getAllMusic() {
  $query = "SELECT * FROM music;";
  $statement = connect()->prepare($query);

  try {
    $statement->execute();
    $music = $statement->fetchAll(PDO::FETCH_CLASS);

    return $music;
  }
  catch(Exception $e) {
    echo "manage_music_controller.php error in ---> getAllMusic(). Error message + " . $e->getMessage();
  }
}

?>
