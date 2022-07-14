<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    session_start();
    require_once '../dbh.inc.php';
    $date = date('Y-m-d H:i:s');
    #PRDO Query blob (Problem / Too big file size)
    $sql = "INSERT into discussion_records(discussion_content,user_id,discussion_title,discussion_subtitle,date_upload) VALUES(?,?,?,?,?)";
    $stmt = $pdo->prepare($sql);
    if ($stmt->execute([$_POST['delta'],$_SESSION['userid'], $_POST['Title'], $_POST['Subtitle'], $date])) {
        echo json_encode(['sucess' => 'Boom!']);
    } else {
        echo json_encode(['sucess' => $stmt->error]);
    }
} else {
    echo json_encode(['error' => 'There are some errors upon posting']);
}
