<?php
session_start();
require_once '../dbh.inc.php';
if (isset($_POST['topicID'])) {
    $topic_id = $_POST['topicID'];
    $user_id = $_SESSION['userid'];
    $user_name = $_SESSION['fname']." ".$_SESSION['lname'];
    $reply_content = $_POST['replydelta'];
    $date = date('Y-m-d H:i:s');
    
    $sql = "INSERT into discussion_comments(comment,date_upload,discussion_id,user_id) VALUES(?,?,?,?)";
    $stmt = $pdo->prepare($sql);
    if ($stmt->execute([$reply_content, $date, $topic_id  ,$user_id])) {
        echo json_encode(['sucess' => 'Boom!']);
    } else {
        echo json_encode(['error' => $stmt->error]);
    }

} else {
    echo json_encode(['error' => 'There is no existing topic']);
}
