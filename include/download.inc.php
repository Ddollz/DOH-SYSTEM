<?php

require_once 'dbh.inc.php';

$sql = 'SELECT * FROM patient_records WHERE record_id = ?';
$stmt = $pdo->prepare($sql);
$stmt->execute([$_GET["id"]]);
$file = $stmt->fetch();

if($stmt->rowCount() == 0){
    die("no file");
}

header("Content-type:". $file['file_type']);
echo $file['file_blob'];