
<?php

include_once './manage_music_controller.php';

/**
* Check the data that was inserted into the form.
*/
$nameErr = $typeErr = "";
$name = $type = "";
$imageUrl = $musicUrl = "";
$allTrue = true;

if($_SERVER["REQUEST_METHOD"] == "POST") {
  if(!empty($_POST['id'])) {
    $id = clean_input($_POST['id']);
    deleteMusic($id);
  }
  else {
    if(empty($_POST['name'])) {
      $nameErr = "Name is required";
      $allTrue = false;
    } else {
     $name = clean_input($_POST['name']);
    }
    if(empty($_POST['type'])) {
      $typeErr = "Type required";
      $allTrue = false;
    } else {
      $type = clean_input($_POST['type']);
    }

    if($allTrue) {
      uploadImage();
      uploadMusic();

      $imageUrl = $_FILES["fileToUpload"]["name"];
      $musicUrl = $_FILES["musicToUpload"]["name"];

      addMusic($name, $type, $musicUrl, $imageUrl);
    }
  }
}

function uploadImage() {

  $target_dir = "../images/";
  $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
  $uploadOk = 1;
  $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
  // Check if image file is a actual image or fake image
  if(isset($_POST["submit"])) {
      $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
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
  if ($_FILES["fileToUpload"]["size"] > 500000) {
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
      if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
          echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
      } else {
          echo "Sorry, there was an error uploading your file.";
          return;
      }
  }
}

function uploadMusic() {

  $audio_dir = "../audio_files/";
  $audio_file = $audio_dir . basename($_FILES["musicToUpload"]["name"]);

  if (move_uploaded_file($_FILES["musicToUpload"]["tmp_name"], $audio_file)) {
      echo "The file ". basename( $_FILES["musicToUpload"]["name"]). " has been uploaded.";
  } else {
      echo "Sorry, there was an error uploading your file.";
  }
}

function clean_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);

  return $data;
}
