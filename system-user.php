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

            <div class="top__item active" page="patients">
                Patients
            </div>
            <div class="top__item" page="clinicians">
                Clinicians
            </div>

            <div class="ms-auto d-flex justify-content-center align-items-center me-5" id="button-for-table">
                <button class="btn button-primary px-4 py-2" id="Add-Record">Add Record</button>
            </div>
        </div>
        <div class="middle__content">
            <div class="m__page" id="patients">

                <div class="table__container">
                    <table id="patientTable" class="display">
                        <thead>
                            <tr>
                                <th>
                                    Patient Name
                                </th>
                                <th>
                                    Email
                                </th>
                                <th>
                                    Address
                                </th>
                                <th>
                                    Birthdate
                                </th>

                                <th>
                                    age
                                </th>
                                <th>
                                    BMI
                                </th>
                                <th>
                                    ECG
                                </th>
                                <th>
                                    Blood Pressure
                                </th>
                                <th>
                                    Added By
                                </th>
                                
                                <th>
                                    Documents
                                </th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            $sql = 'SELECT * FROM patient_details ORDER BY added_date DESC';
                            $stmt = $pdo->prepare($sql);
                            $stmt->execute();
                            while ($patient = $stmt->fetch()) {
                            ?>
                                <tr id="<?php echo $patient['user_id'] ?>">
                                    <td>
                                        <?php echo $patient['firstname'] . " " . $patient['lastname'] ?>
                                    </td>

                                    <td>
                                        <?php echo $patient['email'] ?>
                                    </td>
                                    <td>
                                        <?php echo $patient['address'] ?>
                                    </td>
                                    <td>
                                        <?php echo $patient['birthdate'] ?>
                                    </td>
                                    <td>
                                        <?php echo $patient['age'] ?>
                                    </td>
                                    <td>
                                        <?php echo $patient['BMI'] ?>
                                    </td>
                                    <td>
                                        <?php echo $patient['ECG'] ?>
                                    </td>
                                    <td>
                                        <?php
                                        $sbp = $patient['SBP'];
                                        $dbp = $patient['DBP'];
                                        if ($sbp < 120 and $dbp < 120) {
                                            echo 'Normal';
                                        } else if (($sbp >= 120 and $sbp <= 129) and $dbp < 120) {
                                            echo 'Elevated';
                                        } else if (($sbp >= 130 and $sbp <= 139) or ($dbp >= 80 and $dbp <= 89)) {
                                            echo 'High Blood Pressure Stage 1';
                                        } else if ($sbp >= 140 or $dbp >= 90) {
                                            echo 'High Blood Pressure Stage 2';
                                        } else if ($sbp >= 180 or $dbp >= 120) {
                                            echo 'Hypertensive Crisis';
                                        }
                                        ?>
                                    </td>
                                    <td>
                                        <?php

                                        $sql = 'SELECT * FROM clinician_details WHERE user_id = ?';
                                        $stmt = $pdo->prepare($sql);
                                        $stmt->execute([$patient['added_by']]);
                                        $clinician = $stmt->fetch();
                                        echo $clinician['firstname']." ".$clinician['lastname'];
                                        ?>
                                    </td>
                                    <td>
                                        <a href="system-ocr.php?patient=<?php echo $patient['user_id']?>" class="btn button-primary">Upload Documents</a>
                                    </td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="m__page" id="clinicians">

                <div class="table__container">
                    <table id="clinicianTable" class="display">
                        <thead>
                            <tr>
                                <th>
                                    Title
                                </th>

                                <th>
                                    Name
                                </th>
                                <th>
                                    Email
                                </th>
                                <th>
                                    Practice
                                </th>
                                <th>
                                    Practice Address
                                </th>
                                <th>
                                    Date Join
                                </th>

                                <th>
                                    Role
                                </th>

                                <th>
                                    Status
                                </th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>

<?php
include 'include/user-include/modal.inc.php';
?>

<?php
include 'include/footer.inc.php';
?>
</body>
<script>
    $(document).ready(function() {
        patientTable = $('#patientTable').DataTable();
        clinicianTable = $('#clinicianTable').DataTable();
        loadClinicianTable();

        function loadClinicianTable() {
            $("#clinicianTable tbody").load("include/user-include/loadClinician.inc.php");
        }

        let pages = document.querySelectorAll(".m__page");
        let pageButton = document.querySelectorAll(".top__item");

        pageButton.forEach(function(element) {
            element.addEventListener('click', function handleClick(event) {
                if (!element.classList.contains("active")) {
                    let page__content = document.getElementById(element.getAttribute("page"));
                    content__fresh();
                    page__content.style.display = "block";
                    element.classList.add("active");
                }
            });
        });

        function content__fresh() {
            pages.forEach(function(element) {
                element.style.display = "none";
            });

            pageButton.forEach(function(element) {
                element.classList.remove("active");
            });
        }

        pages[1].style.display = "none";
        pageButton[1].classList.remove("active");


        $("#clinicianTable").on("click", 'td button', function() {
            let curID = $(this).attr("id");
            let status = $(this).attr("status");
            let role = $("#select" + curID).find(":selected").val();

            console.log(role);
            $.post('include/user-include/status-update.inc.php', {
                    id: curID,
                    status: status,
                    role: role
                },
                function(data, status) {
                    loadClinicianTable();

                });
        });

        $("#Add-Record").click(function() {
            console.log("hello");
            $("#exampleModal").modal('show');
        })

        function calculateBMI() {

            x = $('#weight').val();
            y = Math.pow($('#height').val() / 100, 2);
            if (x != 0 && y != 0) {
                result = x / y;
                $('#bmi').val(result.toFixed(2));
            }
        }

        $("#weight").on("input", function() {
            calculateBMI();
        });
        $("#height").on("input", function() {
            calculateBMI();
        });


        $("#patientForm").on('submit', function(e) {
            e.preventDefault();
            let Form = $("#requestForm");
            $.ajax({
                type: 'POST',
                url: 'include/user-include/addPatient.inc.php',
                data: $(this).serialize()
            }).then(function(res) {
                console.log(res);
                let data = JSON.parse(res);
                console.log(data);
                if (data.error) {
                    console.log(data.error);
                    return;
                }
                location.reload(true);

            })

        });

        // changeTopic($("tbody tr:first-child").attr("id"));

        $("#patientTable").on("click", 'tr', function() {
            let curID = $(this).attr("id");
            console.log(curID);
        });
    });
</script>


</html>