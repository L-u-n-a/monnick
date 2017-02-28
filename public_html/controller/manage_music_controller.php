<?php

include_once 'PDO.php';

function addMusic($name, $type, $embed_link) {
  $query = "INSERT INTO music(name, type, embed_link) VALUES (:name, :type, :embed_link);";
  $statement = connect()->prepare($query);

  try {
      $statement->execute(['name' => $name, 'type' => $type, 'embed_link' => $embed_link]);
      header("Location: ../manage_music.php");
  }
  catch(Exception $e) {
      echo "manage_music_controller.php error in ---> addMusic(). Error message + " . $e->getMessage();
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


function getAllTracks() {
  $query = "SELECT * FROM music WHERE type = 'track';";
  $statement = connect()->prepare($query);

  try {
    $statement->execute();
    $tracks = $statement->fetchAll(PDO::FETCH_CLASS);

    return $tracks;
  }
  catch(Exception $e) {
    echo "manage_music_controller.php error in ---> getAllTracks(). Error message + " . $e->getMessage();
  }
}


function getAllSets() {
  $query = "SELECT * FROM music WHERE type = 'set';";
  $statement = connect()->prepare($query);

  try {
    $statement->execute();
    $sets = $statement->fetchAll(PDO::FETCH_CLASS);

    return $sets;
  }
  catch(Exception $e) {
    echo "manage_music_controller.php error in ---> getAllSets(). Error message + " . $e->getMessage();
  }
}

?>
