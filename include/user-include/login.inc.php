<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $pwd = $_POST['loginpwd'];
    $error = [];

    require_once '../dbh.inc.php';
    require_once 'function.inc.php';

    if (emailExists($pdo, $email) !== true) {
        $error['emailnotExists'] = true;
    }
    if (checkPassword($pdo, $email, $pwd) !== false) {
        $userDetail = checkPassword($pdo, $email, $pwd);
        if ($userDetail['user_status'] == 'disabled') {
            $error['accountIsnotActivated'] = true;
        } else {
            session_start();
            $_SESSION["userid"] = $userDetail['user_id'];
            $_SESSION["email"] = $userDetail['user_email'];
            $_SESSION["title"] = $userDetail['user_title'];
            $_SESSION["fname"] = $userDetail['firstname'];
            $_SESSION["lname"] = $userDetail['lastname'];
        }
    } else {
        $error['passwordDidnotMatch'] = true;
    }


    if (!empty($error)) {
        echo json_encode($error);
    } else {
        echo json_encode(['sucess' => "login na"]);
    }
}
