<?php
require_once '../dbh.inc.php';
$sql = 'SELECT * FROM discussion_records ORDER BY date_upload DESC';
$stmt = $pdo->prepare($sql);
$stmt->execute();
$max = 10;
while ($topic = $stmt->fetch()) {
?>
    <tr id="<?php echo $topic['discussion_id'] ?>">
        <td>
            <a href="">
                <i class="bi bi-folder2-open"></i>
            </a>
        </td>

        <td>
            <div class="d-flex justify-content-between flex-column">
                <div><?php echo $topic['discussion_title'] . ' ' . date('Y', strtotime($topic['date_upload'])); ?></div>
                <div>Started by Unknown &#8226; 0 Replies &#8226; Last Reply</div>
                <!-- <div>Started by Sahir &#8226; 16 Replies &#8226; Last Reply 2 hours ago by Edmardo</div> -->
            </div>
        </td>
    </tr>
<?php
    $max--;
}
?>