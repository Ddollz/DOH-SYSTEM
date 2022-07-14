<?php
function emptyInput($title, $email, $fname, $lname, $practice, $rPractice, $pwd, $rpwd)
{
    $result = false;
    if (
        empty($title) or empty($email) or empty($fname) or empty($lname) or
        empty($practice) or empty($rPractice) or empty($pwd) or empty($rpwd)
    ) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}
function invalidEmail($email)
{
    $result = true;

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function pwdMatch($password, $rPassword)
{

    $result = null;
    if ($password !== $rPassword) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}
function emailExists($pdo, $email)
{
    $sql = 'SELECT * FROM clinician_details WHERE user_email = ?';
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$email]);

    if ($stmt->rowCount() == 0) {
        return false;
    } else {
        return true;
    }

    return;
}

function createUser($pdo, $title, $email, $fname, $lname, $practice, $rPractice, $password, $note)
{
    $date = date('Y-m-d H:i:s');
    #PRDO Query blob (Problem / Too big file size)
    $sql = "INSERT into clinician_details(role_id,user_title,user_email,firstname,lastname,practice,practice_address,password,note,date_join) VALUES(?,?,?,?,?,?,?,?,?,?)";
    $stmt = $pdo->prepare($sql);
    $hashPwd = password_hash($password, PASSWORD_DEFAULT);
    $stmt->execute([1, $title, $email, $fname, $lname, $practice, $rPractice, $hashPwd,$note, $date]);
    
}



function checkPassword($pdo, $email, $pwd)
{
    $sql = 'SELECT * FROM clinician_details WHERE user_email = ?';
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$email]);
    $userdetails = $stmt->fetch();
    $pwdhased = $userdetails['password'];
    $checkPwd = password_verify($pwd,$pwdhased);
    $result = null;
    if ($checkPwd === true) {
        $result = $userdetails;
    } else {
        $result = false;
    }
    return $result;
}