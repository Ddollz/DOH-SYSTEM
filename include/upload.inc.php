<?php
if (isset($_FILES['file'])) {
  require_once 'dbh.inc.php';



  $allowed = array('png', 'jpg', 'pdf');

  $total = count($_FILES['file']['name']);
  $user_id = $_POST['user_id'];
  // Loop through each file
  for ($i = 0; $i < $total; $i++) {

    //Get the temp file path
    $tmpFilePath = $_FILES['file']['tmp_name'][$i];

    $file_name =  $_FILES['file']['name'][$i];
    $type = $_FILES['file']['type'][$i];
    $document = file_get_contents($tmpFilePath);

    $ext = pathinfo($file_name, PATHINFO_EXTENSION);
    if (!in_array($ext, $allowed)) {
      echo 'error';
      die();
    }
    //Make sure we have a file path
    if ($tmpFilePath != "") {
      //Setup our new file path
      if (!file_exists('../media/uploads/'.$user_id)) {
        mkdir('../media/uploads/'.$user_id, 0777, true);
      }
      $newFilePath = "../media/uploads/" . $user_id . "/" . $file_name;

      //Upload the file into the temp dir
      move_uploaded_file($tmpFilePath, $newFilePath);

      //Handle other code here

      #PRDO Query 
      // $sql = "INSERT into patient_records(file_name,file_type) VALUES(?,?)";
      // $stmt = $pdo->prepare($sql);
      // $stmt->execute([$file_name, $type]);

      #PRDO Query blob (Problem / Too big file size)
      $sql = "INSERT into patient_records(file_name,file_type,file_blob,user_id) VALUES(?,?,?,?)";
      $stmt = $pdo->prepare($sql);
      $stmt->execute([$file_name, $type, $document, $user_id]);
    }
  }
}
