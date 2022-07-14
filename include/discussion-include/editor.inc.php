<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    session_start();
    require_once '../dbh.inc.php';
    $date = date('Y-m-d H:i:s');
    #PRDO Query blob (Problem / Too big file size)
    if ($_POST['editID'] === 'none') {
        $sql = "INSERT into discussion_records(discussion_content,user_id,discussion_title,discussion_subtitle,date_upload) VALUES(?,?,?,?,?)";
        $stmt = $pdo->prepare($sql);
        if ($stmt->execute([$_POST['delta'], $_SESSION['userid'], $_POST['Title'], $_POST['Subtitle'], $date])) {
            echo json_encode(['sucess' => 'Boom!']);
        } else {
            echo json_encode(['sucess' => $stmt->error]);
        }
    } else {
        $sql = 'UPDATE discussion_records SET discussion_content = ?, discussion_title = ?, discussion_subtitle = ? WHERE discussion_id = ?';
        $stmt = $pdo->prepare($sql);
        if ($stmt->execute([$_POST['delta'], $_POST['Title'], $_POST['Subtitle'], $_POST['editID']])) {
            echo json_encode(['sucess' => 'Boom!']);
        } else {
            echo json_encode(['sucess' => $stmt->error]);
        }
    }
} else {
    echo json_encode(['error' => $_POST['editId']]);
}
