<?php

session_start();
if (!isset($_SESSION['userid'])) {
    header('location: system.php');
}
include 'include/header.inc.php';
require_once 'include/dbh.inc.php';
?>
<main>
    <?php
    include 'include/sidebar.inc.php';
    ?>
    <div class="c-content">
        <div class="top__content d-flex">
            <div class="top__item active" <?php if (!empty($_GET['patient'])) {
                                                echo 'page="import"';
                                            }
                                            ?>>
                Upload
            </div>
            <div class="top__item" page="process">
                Documents
            </div>
            <div class="top__item" page="export">
                Export
            </div>

            <div class="ms-auto d-flex justify-content-center align-items-center me-5" id="button-for-table">
                <button class="btn button-primary px-4 py-2" id="download-Files">Download ZIP</button>
                <div id="uploadfor">Upload file for<b>
                        <?php

                        $sql = 'SELECT * FROM patient_details WHERE user_id  = ?';
                        $stmt = $pdo->prepare($sql);
                        $stmt->execute([$_GET['patient']]);
                        $current = $stmt->fetch();
                        echo $current['firstname'] . " " . $current['lastname'];
                        ?>
                    </b>
                </div>
            </div>
        </div>
        <div class="middle__content">
            <div class="m__page" id="import">
                <form action="#" id="formUpload_id" enctype="multipart/form-data">
                    <div class="file__input">
                        <input type="file" name="file[]" id="groupFile" onchange="getAllfiles()" multiple>
                        <div class="file__placeholder">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cloud-plus-fill" viewBox="0 0 16 16">
                                <path d="M8 2a5.53 5.53 0 0 0-3.594 1.342c-.766.66-1.321 1.52-1.464 2.383C1.266 6.095 0 7.555 0 9.318 0 11.366 1.708 13 3.781 13h8.906C14.502 13 16 11.57 16 9.773c0-1.636-1.242-2.969-2.834-3.194C12.923 3.999 10.69 2 8 2zm.5 4v1.5H10a.5.5 0 0 1 0 1H8.5V10a.5.5 0 0 1-1 0V8.5H6a.5.5 0 0 1 0-1h1.5V6a.5.5 0 0 1 1 0z" />
                            </svg>
                            <div class="file__text">
                                <h1 id="file__text__h1">
                                    Browse File To Upload!
                                </h1>
                                <p>Drag & Drop at least two sample files here or click to select them from your hard drive.
                                    Once you uploaded a couple of samples, confirm by clicking the button in the top right.
                                    You will be then be able to create your first parsing rules.</p>
                            </div>

                            <div id="upload_progressBar">
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="user_id" value="<?php echo $_GET['patient'] ?>">
                </form>
            </div>
            <div class="m__page" id="process">
                <div class="table__container" id="processTableCon">

                    <form action="" method="get" class="tableForm" id="tableForm">
                        <table id="processTable" class="display">
                            <thead>
                                <tr>

                                    <th>
                                        Files
                                    </th>
                                    <th>
                                        Patient
                                    </th>
                                    <th>
                                        OCR
                                    </th>
                                    <th>
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody id="table__area">
                                <?php
                                $sql = 'SELECT * FROM patient_records';
                                $stmt = $pdo->prepare($sql);
                                $stmt->execute();
                                while ($document = $stmt->fetch()) {
                                ?>
                                    <tr id="<?php echo $document['record_id']; ?>">
                                        <td>
                                            <div class="d-flex justify-content-between">
                                                <!-- With Blob Upload -->
                                                <!-- <div><a target="_blank" href="include/download.inc.php?id=<?php echo $document['record_id']; ?>"><?php echo $document['file_name']; ?></a></div> -->
                                                <!-- With Local Upload -->
                                                <div><a target="_blank" href="media/uploads/<?php echo $document['user_id']."/".$document['file_name']; ?>" download><?php echo $document['file_name']; ?></a></div>

                                                <div>10:39am</div>
                                            </div>
                                        </td>
                                        <td>

                                            <?php
                                            $user_id =  $document['user_id'];
                                            $tempsql = 'SELECT * FROM patient_details WHERE user_id = ?';
                                            $stmts = $pdo->prepare($tempsql);
                                            $stmts->execute([$user_id]);
                                            $clinician = $stmts->fetch();
                                            echo $clinician['firstname'] . " " . $clinician['lastname'];
                                            ?>

                                        </td>

                                        <td>

                                        </td>

                                        <td>
                                            <a href="include/delete.inc.php?id=<?php echo $document['record_id']; ?>&name=<?php echo $document['file_name']; ?>">
                                                <div class="m-2"><i class="bi bi-x-circle"></i></div>
                                            </a>

                                        </td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </form>
                </div>
            </div>
            <div class="m__page" id="export">

                <div class="table__container">

                    <table id="exportTable" class="display">
                        <thead>
                            <tr>
                                <th>
                                    Files
                                </th>

                                <th>
                                    Status
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                            if (!empty($_GET) and empty($_GET['patient'])) {
                                foreach ($_GET as $key => $value) {
                                    $sql = 'SELECT * FROM patient_records WHERE record_id = ?';
                                    $stmt = $pdo->prepare($sql);
                                    $stmt->execute([$value]);
                                    $file = $stmt->fetch();
                            ?>
                                    <tr>
                                        <td>
                                            <div class="d-flex justify-content-between">
                                                <!-- With Blob Upload -->
                                                <!-- <div><a target="_blank" href="include/download.inc.php?id=<?php echo $file['record_id']; ?>"><?php echo $file['file_name']; ?></a></div> -->
                                                <!-- With Local Upload -->
                                                <div><a style="color:gray;" target="_blank" id="file_link_<?php echo $key; ?>"><?php echo $file['file_name']; ?></a>

                                                </div>

                                                <div>10:39am</div>
                                            </div>
                                        </td>
                                        <td>

                                            <div class="progress">
                                                <div class="progress-bar" id="p<?php echo $file['record_id']; ?>" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </td>

                                    </tr>
                            <?php
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>

    <!-- This is only to convert PDF FILES INTO IMAGE -->
    <div id="canvas-wrapper-parent" hidden>

    </div>
    <!-- This is only to convert PDF FILES INTO IMAGE -->



</main>


<?php
include 'include/footer.inc.php';
?>

<?php
include 'include/OCR-Include/OCR-Script.inc.php';
?>

</body>


</html>