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
                        <input type="date" class="form-control w-100 m-1" name="Bday" id="bday" placeholder="Birth Date" required>
                        <input type="number" min="0" class="form-control w-100 m-1" name="Age" id="Age" readonly placeholder="Age" required>
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

                        <div class="input-group m-1">
                            <!-- <select class="form-select" aria-label="Default select example" name="ethnicity">
                                <option selected>Civil Status</option>
                                <option value="0">Single</option>
                                <option value="1">Married</option>
                            </select> -->
                            <select class="form-select" aria-label="Default select example" name="ethnicity">
                                <option selected="selected">-- Ethnicity --</option>
                                <option value="AFGHAN">AFGHAN</option>
                                <option value="ALBANIAN">ALBANIAN</option>
                                <option value="ALGERIAN">ALGERIAN</option>
                                <option value="AMERICAN">AMERICAN</option>
                                <option value="ANDORRAN">ANDORRAN</option>
                                <option value="ANGOLAN">ANGOLAN</option>
                                <option value="ANTIGUANS">ANTIGUANS</option>
                                <option value="ARGENTINEAN">ARGENTINEAN</option>
                                <option value="ARMENIAN">ARMENIAN</option>
                                <option value="AUSTRALIAN">AUSTRALIAN</option>
                                <option value="AUSTRIAN">AUSTRIAN</option>
                                <option value="AZERBAIJANI">AZERBAIJANI</option>
                                <option value="BAHAMIAN">BAHAMIAN</option>
                                <option value="BAHRAINI">BAHRAINI</option>
                                <option value="BANGLADESHI">BANGLADESHI</option>
                                <option value="BARBADIAN">BARBADIAN</option>
                                <option value="BARBUDANS">BARBUDANS</option>
                                <option value="BATSWANA">BATSWANA</option>
                                <option value="BELARUSIAN">BELARUSIAN</option>
                                <option value="BELGIAN">BELGIAN</option>
                                <option value="BELIZEAN">BELIZEAN</option>
                                <option value="BENINESE">BENINESE</option>
                                <option value="BHUTANESE">BHUTANESE</option>
                                <option value="BOLIVIAN">BOLIVIAN</option>
                                <option value="BOSNIAN">BOSNIAN</option>
                                <option value="BRAZILIAN">BRAZILIAN</option>
                                <option value="BRITISH">BRITISH</option>
                                <option value="BRUNEIAN">BRUNEIAN</option>
                                <option value="BULGARIAN">BULGARIAN</option>
                                <option value="BURKINABE">BURKINABE</option>
                                <option value="BURMESE">BURMESE</option>
                                <option value="BURUNDIAN">BURUNDIAN</option>
                                <option value="CAMBODIAN">CAMBODIAN</option>
                                <option value="CAMEROONIAN">CAMEROONIAN</option>
                                <option value="CANADIAN">CANADIAN</option>
                                <option value="CAPE VERDEAN">CAPE VERDEAN</option>
                                <option value="CENTRAL AFRICAN">CENTRAL AFRICAN</option>
                                <option value="CHADIAN">CHADIAN</option>
                                <option value="CHILEAN">CHILEAN</option>
                                <option value="CHINESE">CHINESE</option>
                                <option value="COLOMBIAN">COLOMBIAN</option>
                                <option value="COMORAN">COMORAN</option>
                                <option value="CONGOLESE">CONGOLESE</option>
                                <option value="COSTA RICAN">COSTA RICAN</option>
                                <option value="CROATIAN">CROATIAN</option>
                                <option value="CUBAN">CUBAN</option>
                                <option value="CYPRIOT">CYPRIOT</option>
                                <option value="CZECH">CZECH</option>
                                <option value="DANISH">DANISH</option>
                                <option value="DJIBOUTI">DJIBOUTI</option>
                                <option value="DOMINICAN">DOMINICAN</option>
                                <option value="DUTCH">DUTCH</option>
                                <option value="EAST TIMORESE">EAST TIMORESE</option>
                                <option value="ECUADOREAN">ECUADOREAN</option>
                                <option value="EGYPTIAN">EGYPTIAN</option>
                                <option value="EMIRIAN">EMIRIAN</option>
                                <option value="EQUATORIAL GUINEAN">EQUATORIAL GUINEAN
                                </option>
                                <option value="ERITREAN">ERITREAN</option>
                                <option value="ESTONIAN">ESTONIAN</option>
                                <option value="ETHIOPIAN">ETHIOPIAN</option>
                                <option value="FIJIAN">FIJIAN</option>
                                <option value="FILIPINO">FILIPINO</option>
                                <option value="FINNISH">FINNISH</option>
                                <option value="FRENCH">FRENCH</option>
                                <option value="GABONESE">GABONESE</option>
                                <option value="GAMBIAN">GAMBIAN</option>
                                <option value="GEORGIAN">GEORGIAN</option>
                                <option value="GERMAN">GERMAN</option>
                                <option value="GHANAIAN">GHANAIAN</option>
                                <option value="GREEK">GREEK</option>
                                <option value="GRENADIAN">GRENADIAN</option>
                                <option value="GUATEMALAN">GUATEMALAN</option>
                                <option value="GUINEA-BISSAUAN">GUINEA-BISSAUAN</option>
                                <option value="GUINEAN">GUINEAN</option>
                                <option value="GUYANESE">GUYANESE</option>
                                <option value="HAITIAN">HAITIAN</option>
                                <option value="HERZEGOVINIAN">HERZEGOVINIAN</option>
                                <option value="HONDURAN">HONDURAN</option>
                                <option value="HUNGARIAN">HUNGARIAN</option>
                                <option value="ICELANDER">ICELANDER</option>
                                <option value="INDIAN">INDIAN</option>
                                <option value="INDONESIAN">INDONESIAN</option>
                                <option value="IRANIAN">IRANIAN</option>
                                <option value="IRAQI">IRAQI</option>
                                <option value="IRISH">IRISH</option>
                                <option value="ISRAESLI">ISRAELI</option>
                                <option value="ITALIAN">ITALIAN</option>
                                <option value="IVORIAN">IVORIAN</option>
                                <option value="JAMAICAN">JAMAICAN</option>
                                <option value="JAPANESE">JAPANESE</option>
                                <option value="JORDANIAN">JORDANIAN</option>
                                <option value="KAZAKHSTANI">KAZAKHSTANI</option>
                                <option value="KENYAN">KENYAN</option>
                                <option value="KITTIAN AND NEVISIAN">KITTIAN AND NEVISIAN
                                </option>
                                <option value="KUWAITI">KUWAITI</option>
                                <option value="KYRGYZ">KYRGYZ</option>
                                <option value="LAOTIAN">LAOTIAN</option>
                                <option value="LATVIAN">LATVIAN</option>
                                <option value="LEBANESE">LEBANESE</option>
                                <option value="LIBERIAN">LIBERIAN</option>
                                <option value="LIBYAN">LIBYAN</option>
                                <option value="LIECHTENSTEINER">LIECHTENSTEINER</option>
                                <option value="LITHUANIAN">LITHUANIAN</option>
                                <option value="LUXEMBOURGER">LUXEMBOURGER</option>
                                <option value="MACEDONIAN">MACEDONIAN</option>
                                <option value="MALAGASY">MALAGASY</option>
                                <option value="MALAWIAN">MALAWIAN</option>
                                <option value="MALAYSIAN">MALAYSIAN</option>
                                <option value="MALDIVAN">MALDIVAN</option>
                                <option value="MALIAN">MALIAN</option>
                                <option value="MALTESE">MALTESE</option>
                                <option value="MARSHALLESE">MARSHALLESE</option>
                                <option value="MAURITANIAN">MAURITANIAN</option>
                                <option value="MAURITIAN">MAURITIAN</option>
                                <option value="MEXICAN">MEXICAN</option>
                                <option value="MICRONESIAN">MICRONESIAN</option>
                                <option value="MOLDOVAN">MOLDOVAN</option>
                                <option value="MONACAN">MONACAN</option>
                                <option value="MONGOLIAN">MONGOLIAN</option>
                                <option value="MOROCCAN">MOROCCAN</option>
                                <option value="MOSOTHO">MOSOTHO</option>
                                <option value="MOTSWANA">MOTSWANA</option>
                                <option value="MOZAMBICAN">MOZAMBICAN</option>
                                <option value="NAMIBIAN">NAMIBIAN</option>
                                <option value="NAURUAN">NAURUAN</option>
                                <option value="NEPALESE">NEPALESE</option>
                                <option value="NEW ZEALANDER">NEW ZEALANDER</option>
                                <option value="NI-VANUATU">NI-VANUATU</option>
                                <option value="NICARAGUAN">NICARAGUAN</option>
                                <option value="NIGERIEN">NIGERIEN</option>
                                <option value="NORTH KOREAN">NORTH KOREAN</option>
                                <option value="NORTHERN IRISH">NORTHERN IRISH</option>
                                <option value="NORWEGIAN">NORWEGIAN</option>
                                <option value="OMANI">OMANI</option>
                                <option value="PAKISTANI">PAKISTANI</option>
                                <option value="PALAUAN">PALAUAN</option>
                                <option value="PANAMANIAN">PANAMANIAN</option>
                                <option value="PAPUA NEW GUINEAN">PAPUA NEW GUINEAN</option>
                                <option value="PARAGUAYAN">PARAGUAYAN</option>
                                <option value="PERUVIAN">PERUVIAN</option>
                                <option value="POLISH">POLISH</option>
                                <option value="PORTUGUESE">PORTUGUESE</option>
                                <option value="QATARI">QATARI</option>
                                <option value="ROMANIAN">ROMANIAN</option>
                                <option value="RUSSIAN">RUSSIAN</option>
                                <option value="RWANDAN">RWANDAN</option>
                                <option value="SAINT LUCIAN">SAINT LUCIAN</option>
                                <option value="SALVADORAN">SALVADORAN</option>
                                <option value="SAMOAN">SAMOAN</option>
                                <option value="SAN MARINESE">SAN MARINESE</option>
                                <option value="SAO TOMEAN">SAO TOMEAN</option>
                                <option value="SAUDI">SAUDI</option>
                                <option value="SCOTTISH">SCOTTISH</option>
                                <option value="SENEGALESE">SENEGALESE</option>
                                <option value="SERBIAN">SERBIAN</option>
                                <option value="SEYCHELLOIS">SEYCHELLOIS</option>
                                <option value="SIERRA LEONEAN">SIERRA LEONEAN</option>
                                <option value="SINGAPOREAN">SINGAPOREAN</option>
                                <option value="SLOVAKIAN">SLOVAKIAN</option>
                                <option value="SLOVENIAN">SLOVENIAN</option>
                                <option value="SOLOMON ISLANDER">SOLOMON ISLANDER</option>
                                <option value="SOMALI">SOMALI</option>
                                <option value="SOUTH AFRICAN">SOUTH AFRICAN</option>
                                <option value="SOUTH KOREAN">SOUTH KOREAN</option>
                                <option value="SPANISH">SPANISH</option>
                                <option value="SRI LANKAN">SRI LANKAN</option>
                                <option value="SUDANESE">SUDANESE</option>
                                <option value="SURINAMER">SURINAMER</option>
                                <option value="SWAZI">SWAZI</option>
                                <option value="SWEDISH">SWEDISH</option>
                                <option value="SWISS">SWISS</option>
                                <option value="SYRIAN">SYRIAN</option>
                                <option value="TAIWANESE">TAIWANESE</option>
                                <option value="TAJIK">TAJIK</option>
                                <option value="TANZANIAN">TANZANIAN</option>
                                <option value="THAI">THAI</option>
                                <option value="TOGOLESE">TOGOLESE</option>
                                <option value="TONGAN">TONGAN</option>
                                <option value="TRINIDADIAN OR TOBAGONIAN">TRINIDADIAN OR
                                    TOBAGONIAN</option>
                                <option value="TUNISIAN">TUNISIAN</option>
                                <option value="TURKISH">TURKISH</option>
                                <option value="TUVALUAN">TUVALUAN</option>
                                <option value="UGANDAN">UGANDAN</option>
                                <option value="UKRAINIAN">UKRAINIAN</option>
                                <option value="URUGUAYAN">URUGUAYAN</option>
                                <option value="UZBEKISTANI">Uzbekistani</option>
                                <option value="VENEZUELAN">VENEZUELAN</option>
                                <option value="VIETNAMESE">VIETNAMESE</option>
                                <option value="WELSH">WELSH</option>
                                <option value="YEMENITE">YEMENITE</option>
                                <option value="ZAMBIAN">ZAMBIAN</option>
                                <option value="ZIMBABWEAN">ZIMBABWEAN</option>
                            </select>
                        </div>
                        <!-- <input type="text" class="form-control w-100 m-1" name="ethnicity" placeholder="Ethnicity">
                        <input type="text" class="form-control w-100 m-1" name="civil_status" placeholder="Civil Status"> -->

                        <div class="input-group m-1">
                            <select class="form-select" aria-label="Default select example" name="civil_status">
                                <option selected>-- Civil Status --</option>
                                <option value="0">Single</option>
                                <option value="1">Married</option>
                            </select>

                        </div>
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