<?php
session_start();
require_once '../dbh.inc.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // echo json_encode(['error' => $_POST]);
    $email = $_POST['email'];
    $fname = $_POST['Firstname'];
    $lname = $_POST['Lastname'];
    $address = $_POST['address'];
    $bday = $_POST['Bday'];
    $age = $_POST['Age'];
    $gender = $_POST['Gender'];
    $smoke = $_POST['Smoker'];
    $eth = $_POST['ethnicity'];
    $cstat = $_POST['civil_status'];
    $weight = $_POST['weight'];
    $height = $_POST['height'];
    $ecg = $_POST['ecg'];
    $bmi = $_POST['bmi'];
    $sbp = $_POST['SBP'];
    $dbp = $_POST['DBP'];
    $sym_exp = $_POST['sym_exp'];
    $pst = $_POST['post-procedure'];
    $date = date('Y-m-d H:i:s');
    $addedby = $_SESSION['userid'];
    
    $sql = "INSERT into patient_details(firstname,lastname,gender,birthdate,age,email,smoker,ethnicity,civil_status,address,height,weight,ECG,SBP,DBP,BMI,sym_exp,post_procedure,added_date,added_by) 
    VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
    $stmt = $pdo->prepare($sql);
    if ($stmt->execute([$fname,$lname,$gender,$bday,$age,$email,$smoke,$eth,$cstat,$address,$height,$weight,$ecg,$sbp,$dbp,$bmi,$sym_exp,$pst,$date,$addedby])) {
        echo json_encode(['sucess' => 'Boom!']);
    } else {
        echo json_encode(['error' => $stmt->error]);
    }

} else {
    echo json_encode(['error' => 'There is no existing topic']);
}
