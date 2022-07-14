<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $error = [];

    $title = $_POST['Title'];
    $email = $_POST['Email'];
    $fname = $_POST['Firstname'];
    $lname = $_POST['Lastname'];
    $practice = $_POST['Practice'];
    $rPractice = $_POST['rptPractice'];
    $pwd = $_POST['pwd'];
    $rpwd = $_POST['rptpwd'];
    $note = $_POST['note'];
    require_once '../dbh.inc.php';
    require_once 'function.inc.php';

    if (emptyInput($title, $email, $fname, $lname, $practice, $rPractice, $pwd, $rpwd) !== false) {
        $error['emptyInput'] = true;
    }
    else if (invalidEmail($email) !== false) {
        $error['invalidEmail'] = true;
    }
    else if (pwdMatch($pwd, $rpwd) !== false) {
        $error['pwdMatch'] = true;
    }

    else if (emailExists($pdo, $email) !== false) {
        $error['emailExists'] = true;
    }


    if (!empty($error)) {
        echo json_encode($error);
    } else {
        createUser($pdo, $title, $email, $fname, $lname, $practice, $rPractice, $pwd, $note);
        echo json_encode(['sucess' => "login na"]);
    }
} else {
    echo json_encode(['error' => 'There are some errors upon signup']);
}
