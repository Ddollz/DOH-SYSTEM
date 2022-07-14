<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <form id="patientForm">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Patient</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="d-flex">
                        <input type="email" class="form-control w-100 m-1" name="email" id="email" aria-describedby="emailHelp" placeholder="Email address" required>
                    </div>
                    <div class="d-flex">
                        <input type="text" class="form-control w-100 m-1" name="Firstname" placeholder="Firstname" required>
                        <input type="text" class="form-control w-100 m-1" name="Lastname" placeholder="Lastname" required>
                    </div>

                    <div class="d-flex">
                        <input type="text" class="form-control w-100 m-1" name="address" id="address" placeholder="Physical address" required>
                    </div>

                    <div class="d-flex">
                        <input type="date" class="form-control w-100 m-1" name="Bday" placeholder="Birth Date" required>
                        <input type="number" min="0" class="form-control w-100 m-1" name="Age" placeholder="Age" required>
                    </div>

                    <div class="d-flex">
                        <div class="input-group m-1">
                            <select class="form-select" aria-label="Default select example" name="Gender">
                                <option selected>Select Gender</option>
                                <option value="1">Male</option>
                                <option value="0">Female</option>
                            </select>

                        </div>
                        <div class="input-group m-1">
                            <select class="form-select" aria-label="Default select example" name="Smoker">
                                <option value="1" selected>Smoker</option>
                                <option value="0">No</option>
                            </select>
                        </div>
                    </div>
                    <div class="d-flex">
                        <input type="text" class="form-control w-100 m-1" name="ethnicity" placeholder="Ethnicity">
                        <input type="text" class="form-control w-100 m-1" name="civil_status" placeholder="Civil Status">
                    </div>

                    <div class="d-flex">
                        <div class="input-group m-1">
                            <span class="input-group-text" id="weight-addon1">kg</span>
                            <input type="number" class="form-control" min="0" placeholder="Weight (kg)" id="weight" name="weight" aria-describedby="weight-addon1">
                        </div>

                        <div class="input-group m-1">
                            <span class="input-group-text" id="height-addon1">cm</span>
                            <input type="number" class="form-control" min="0" placeholder="Height (cm)" id="height" name="height" aria-describedby="height-addon1">
                        </div>
                    </div>

                    <div class="d-flex">

                        <div class="input-group m-1">
                            <input type="number" class="form-control" min="0" placeholder="ECG" name="ecg" aria-describedby="BPM-addon1">
                            <span class="input-group-text" id="BPM-addon1">BPM</span>
                        </div>
                        <div class="input-group m-1">
                            <input type="number" class="form-control" id="bmi" name="bmi" placeholder="BMI" readonly>
                        </div>
                    </div>

                    <div class="d-flex">
                        <input type="number" class="form-control w-100 m-1" min="0" name="SBP" placeholder="Systolic Blood Pressure">
                        <input type="number" class="form-control w-100 m-1" min="0" name="DBP" placeholder="Diastolic Blood Pressure">
                    </div>

                    <div class="d-flex flex-column m-1">
                        <label for="sym_exp">Symptoms Experience</label>
                        <textarea name="sym_exp" id="sym_exp" cols="30" rows="5"></textarea>
                    </div>

                    <div class="d-flex flex-column m-1">
                        <label for="post-procedure">Post-Procedure</label>
                        <textarea name="post-procedure" id="post-procedure" cols="30" rows="5"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" name="submit" class="btn button-primary">Save</button>

                </div>
            </form>
        </div>
    </div>
</div>