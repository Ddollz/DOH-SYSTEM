<?php
require_once '../dbh.inc.php';

$sql = 'SELECT * FROM roles';
$stmt = $pdo->prepare($sql);
$stmt->execute();
$role = $stmt->fetchAll();

$sql = 'SELECT * FROM clinician_details ORDER BY date_join DESC';
$stmt = $pdo->prepare($sql);
$stmt->execute();
while ($users = $stmt->fetch()) {
?>
    <tr>
        <td>
            <?php echo $users['user_title'] ?>
        </td>

        <td>
            <?php echo $users['user_email'] ?>
        </td>
        <td>
            <?php echo $users['firstname'] . " " . $users['lastname'] ?>
        </td>
        <td>
            <?php echo $users['practice'] ?>
        </td>
        <td>
            <?php echo $users['practice_address'] ?>
        </td>
        <td>
            <?php echo $users['date_join'] ?>
        </td>
        <td>
            <select class="form-select w-50" aria-label="Default select example" id = "select<?php echo $users['user_id']?>">
                <?php
                foreach ($role as $row) {
                ?>
                    <option <?php if ($row['role_id'] == $users['role_id']) {
                                echo 'selected ';
                            } ?>value="<?php echo $row['role_id'] ?>"><?php echo $row['perm_code'] ?></option>
                <?php
                }
                ?>
            </select>
        </td>
        <td>
            <?php if ($users['user_status'] == 'disabled') {
            ?>
                <button type="button" id="<?php echo $users['user_id'] ?>" status="0" class="btn button-outline-primary w-100 p-1"><?php echo ucfirst($users['user_status']) ?></button>
            <?php
            } else if ($users['user_status'] == 'active') {
            ?>
                <button type="button" id="<?php echo $users['user_id'] ?>" status="1" class="btn button-primary w-100 p-1"><?php echo ucfirst($users['user_status']) ?></button>

            <?php
            }
            ?>
        </td>
    </tr>
<?php
}
?>