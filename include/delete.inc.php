<?php 



require_once 'dbh.inc.php';

$sql = 'DELETE FROM patient_records WHERE record_id = ?';
$stmt = $pdo->prepare($sql);
$stmt->execute([$_GET["id"]]);
$file = $stmt->fetch();


unlink("../media/uploads/".$_GET['name']);

header("location: ../system-ocr.php");
