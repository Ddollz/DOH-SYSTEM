<?php

require_once '../dbh.inc.php';
if (isset($_POST['id'])) {
    $userid = $_POST['id'];
    $role = $_POST['role'];
    if ($_POST['status'] == 0) {
        $status = 'active';


    } else if ($_POST['status'] == 1) {
        $status = 'disabled';
    }
    $sql = 'UPDATE clinician_details SET user_status = ?, role_id = ? WHERE user_id = ?';
    // $sql = 'SELECT * FROM clinician_details WHERE user_id = ?';
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$status,$role, $userid]);
} else {
    echo json_encode(['error' => 'There is no existing topic']);
}
