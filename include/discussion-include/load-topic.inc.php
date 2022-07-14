<?php

require_once '../dbh.inc.php';
if (isset($_POST['id'])) {
    $commentList = array();
    $topic_id = $_POST['id'];
    $sql = 'SELECT * FROM discussion_records WHERE discussion_id  = ?';
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$_POST['id']]);
    $topic = $stmt->fetch();

    if ($stmt->rowCount() == 0) {
        echo json_encode(['error' => 'There is no existing topic']);
    }
    

    $sql = 'SELECT * FROM clinician_details WHERE user_id  = ?';
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$topic['user_id']]);
    $author = $stmt->fetch();


    $sql = 'SELECT * FROM discussion_comments WHERE discussion_id  = ?';
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$_POST['id']]);
    $comments = $stmt->fetchAll();

    foreach($comments as $comment){
        $tempArray = array();
        $sql = 'SELECT * FROM clinician_details WHERE user_id  = ?';
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$comment['user_id']]);
        $userRep = $stmt->fetch();
        $commentList[$comment['reply_id']] = array(
            'comment' => $comment,
            'user_title' =>  $userRep['user_title'],
            'user_name' =>  $userRep['firstname']." ".$userRep['lastname']
        );
    }

    echo json_encode([
        'topic' => $topic,
        'comments' => $commentList,
        'author' => $author
    ]);
} else {
    echo json_encode(['error' => 'There is no existing topic']);
}
