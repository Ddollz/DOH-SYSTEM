<script>
    pdfjsLib.GlobalWorkerOptions.workerSrc =
        'assets/vendor/pdfjs/build/pdf.worker.js';
    let tableForm = $("#tableForm");
    let procressTable = $('table#processTable').DataTable({
        dom: 'Bfr<"processTable"t>ip',
        scrollY: 500,
        buttons: [
            'copy', 'excel', 'pdf'
        ],
        "columnDefs": [{
            "width": "15%",
            "targets": 1
        }, {
            width: "5%",
            targets: 2,
            className: 'select-checkbox text-center',
            'checkboxes': {
                'selectRow': true
            }

        }, {
            "width": "5%",
            "targets": 3
        }, ],
        select: {
            style: 'multi',
        },
        buttons: [

            {
                extend: 'selectAll',
                attr: {
                    class: 'btn button-primary px-4 py-2',

                },
            },
            {
                extend: 'selectNone',
                attr: {
                    class: 'btn button-primary px-4 py-2',

                },
            },
            {
                extend: 'copy',
                attr: {
                    class: 'btn button-primary px-4 py-2',

                },
            },
            {
                extend: 'excel',
                attr: {
                    class: 'btn button-primary px-4 py-2',

                },
            },
            {
                extend: 'csv',
                attr: {
                    class: 'btn button-primary px-4 py-2',

                },
            },
            {
                extend: 'pdf',
                attr: {
                    class: 'btn button-primary px-4 py-2',

                },
            },

        ],

    });

    new $.fn.dataTable.Buttons(procressTable, {
        buttons: [{
            text: 'Confirm to Parser',
            attr: {
                id: 'parse-Files',
                class: 'btn button-primary px-4 py-2',

            },
            action: function() {
                var count = procressTable.rows({
                    selected: true
                }).data();
                for (let index = 0; index < count.length; index++) {
                    console.log(count[index]['DT_RowId']);
                    tableForm.append($('<input>').attr('type', 'hidden').attr('value', count[index]['DT_RowId']).attr('name', count[index]['DT_RowId']));
                    tableForm.submit();
                }

            }
        }]
    }).container().appendTo($('#button-for-table'));

    $('table#exportTable').DataTable({

        dom: 'frtip',
        scrollY: 500,
        scrollCollapse: true,
        paging: false,
        buttons: [
            'copy', 'excel', 'pdf'
        ],
        "columns": [
            null,
            {
                "width": "20%"
            },
        ]
    });


    //Front end variables
    let file__h1 = document.getElementById("file__text__h1");
    let pages = document.querySelectorAll(".m__page");
    let pageButton = document.querySelectorAll(".top__item");
    let progressBar = document.getElementById("upload_progressBar");



    //Canvas wrapper.
    //This contains all pdf
    let wrapper = document.getElementById("canvas-wrapper-parent");
    //This contains all pdf pages that will converted into canvas so it can be parse
    let wrapperChiled;

    //For progress bar of pdf that has multiple pages
    class contentFileReader {
        constructor(name, progress) {
            this.name = name;
            this.progress = progress;
        }
    }

    //Container for exporting Parsed Documents
    let exportAll = [];
    //Container for 
    class finalZipReader {
        constructor(name, blob) {
            this.name = name;
            this.blob = blob;
        }
    }

    //Initialization content
    content__fresh();
    <?php
    if (!empty($_GET) and empty($_GET['patient'])) {
        foreach ($_GET as $key => $value) {
            $sql = 'SELECT * FROM patient_records WHERE record_id = ?';
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$value]);
            $file = $stmt->fetch();
            if ($file['file_type'] == "application/pdf") {
    ?>
                wrapperChiled = document.createElement('div');
                wrapperChiled.setAttribute("id", "canvas-wrapper-chiled-" + "<?php echo $key; ?>");
                wrapper.appendChild(wrapperChiled);
                // Loading all PDF FILES 
                pdfjsLib.getDocument('<?php echo "media/uploads/" . $file['user_id'] . "/" . $file["file_name"]; ?>').promise.then(function(pdf) {
                    //create Object for PDF that Has Multiple Page
                    //This is only for Progress Bar
                    let tempArray = [];
                    let tempArrayZip = [];
                    if (pdf.numPages > 1) {
                        for (let num = 1; num <= pdf.numPages; num++) {
                            tempArray.push(new contentFileReader("<?php echo $key; ?>_" + num, 0));
                        }
                    }

                    // you can now use *pdf* here
                    for (let num = 1; num <= pdf.numPages; num++) {
                        pdf.getPage(num).then(function(page) {
                            let scale = 1.5;
                            let viewport = page.getViewport({
                                scale: scale,
                            });

                            let outputScale = window.devicePixelRatio || 1;

                            let canvas = document.createElement('canvas');
                            canvas.setAttribute("id", "CanvasDiv-" + "<?php echo $key; ?>-" + num);
                            let context = canvas.getContext('2d');

                            canvas.width = Math.floor(viewport.width * outputScale);
                            canvas.height = Math.floor(viewport.height * outputScale);
                            canvas.style.width = Math.floor(viewport.width) + "px";
                            canvas.style.height = Math.floor(viewport.height) + "px";

                            wrapperChiled = document.getElementById("canvas-wrapper-chiled-" + "<?php echo $key; ?>");
                            wrapperChiled.appendChild(canvas);

                            let transform = outputScale !== 1 ? [outputScale, 0, 0, outputScale, 0, 0] :
                                null;

                            let renderContext = {
                                canvasContext: context,
                                transform: transform,
                                viewport: viewport
                            };
                            //Step 1: store a refer to the renderer
                            var renderTask = page.render(renderContext);
                            renderTask.promise.then(function() {
                                if (pdf.numPages == num) {
                                    testing = document.getElementById("canvas-wrapper-chiled-" + "<?php echo $key; ?>");

                                    for (let index = 0; index < testing.children.length; index++) {
                                        const ttt = testing.children[index];
                                        const worker = Tesseract.createWorker({
                                            logger: function(m) {
                                                if (m.status == "recognizing text" && pdf.numPages > 1) {
                                                    let percentage = Math.trunc(m.progress * 100);
                                                    let filePercentage = document.getElementById("<?php echo "p" . $file["record_id"]; ?>")
                                                    numPageTest = index + 1;
                                                    tempArray[index].progress = percentage;
                                                    let resultProgress = 0;

                                                    for (let i = 0; i < tempArray.length; i++) {
                                                        resultProgress += tempArray[i].progress;
                                                    }
                                                    resultProgress /= pdf.numPages;
                                                    filePercentage.style.width = resultProgress + "%";
                                                    filePercentage.setAttribute("aria-valuenow", resultProgress);
                                                    filePercentage.innerHTML = Math.trunc(resultProgress) + "%";

                                                } else if (m.status == "recognizing text") {
                                                    let percentage = Math.trunc(m.progress * 100);
                                                    let filePercentage = document.getElementById("<?php echo "p" . $file["record_id"]; ?>")
                                                    filePercentage.style.width = percentage + "%";
                                                    filePercentage.setAttribute("aria-valuenow", percentage);
                                                    filePercentage.innerHTML = percentage + "%";
                                                }
                                            }
                                        });

                                        (async () => {
                                            await worker.load();
                                            await worker.loadLanguage('eng');
                                            await worker.initialize('eng');
                                            await worker.setParameters({
                                                tessedit_create_box: '1',
                                                tessedit_create_unlv: '1',
                                                tessedit_create_osd: '1',
                                            });

                                            // This is just Result For future development front end design
                                            const {
                                                data: {
                                                    text,
                                                    hocr,
                                                    tsv,
                                                    box,
                                                    unlv
                                                }
                                            } = await worker.recognize(ttt.toDataURL());
                                            //Get Pdf file of result then add link to the table Cell
                                            const {
                                                data
                                            } = await worker.getPDF('Tesseract OCR Result');
                                            const file_link = document.getElementById('file_link_<?php echo $key ?>');
                                            //Convert data (Array) to a blob type of pdf file.
                                            const blob = new Blob([new Uint8Array(data)], {
                                                type: 'application/pdf'
                                            });

                                            if (pdf.numPages > 1) {
                                                tempArrayZip.push(blob);
                                                if (tempArrayZip.length == num) {
                                                    let zip = new JSZip();

                                                    for (let index = 0; index < tempArrayZip.length; index++) {
                                                        zip.file("<?php echo explode(".", $file["file_name"])[0] ?>-page-" + index + ".pdf", tempArrayZip[index]);

                                                    }
                                                    zip.generateAsync({
                                                            type: "base64"
                                                        })
                                                        .then(function(content) {
                                                            // see FileSaver.js
                                                            exportAll.push(new finalZipReader("<?php echo explode(".", $file["file_name"])[0] ?>", content));
                                                            file_link.setAttribute('download', "<?php echo explode(".", $file["file_name"])[0] ?>.zip");
                                                            file_link.href = "data:application/zip;base64," + content;
                                                            file_link.style.color = "black";
                                                        });

                                                }

                                            } else {
                                                const filename = '<?php echo explode(".", $file["file_name"])[0] ?>';
                                                const url = URL.createObjectURL(blob);
                                                file_link.setAttribute('href', url);
                                                file_link.style.color = "black";
                                                exportAll.push(new finalZipReader("<?php echo explode(".", $file["file_name"])[0] ?>", blob));

                                            }

                                        })();
                                    }



                                }
                            });
                        });

                    }
                });
            <?php }
            if ($file['file_type'] == "image/png" || $file['file_type'] == "image/jpeg") { ?>

                const worker<?php echo $key ?> = Tesseract.createWorker({
                    logger: function(m) {
                        if (m.status == "recognizing text") {
                            let percentage = Math.trunc(m.progress * 100);
                            let filePercentage = document.getElementById("<?php echo "p" . $file["record_id"]; ?>")
                            filePercentage.style.width = percentage + "%";
                            filePercentage.setAttribute("aria-valuenow", percentage);
                            filePercentage.innerHTML = percentage + "%";

                        }
                    }
                });

                (async () => {
                    await worker<?php echo $key ?>.load();
                    await worker<?php echo $key ?>.loadLanguage('eng');
                    await worker<?php echo $key ?>.initialize('eng');
                    await worker<?php echo $key ?>.setParameters({
                        tessedit_create_box: '1',
                        tessedit_create_unlv: '1',
                        tessedit_create_osd: '1',
                    });

                    // This is just Result For future development front end design
                    const {
                        data: {
                            text,
                            hocr,
                            tsv,
                            box,
                            unlv
                        }
                    } = await worker<?php echo $key ?>.recognize('<?php echo "media/uploads/" . $file['user_id'] . "/" . $file["file_name"]; ?>');


                    //Get Pdf file of result then add link to the table Cell
                    const {
                        data
                    } = await worker<?php echo $key ?>.getPDF('Tesseract OCR Result');
                    const file_link = document.getElementById('file_link_<?php echo $key ?>');
                    //Convert data (Array) to a blob type of pdf file.
                    const blob = new Blob([new Uint8Array(data)], {
                        type: 'application/pdf'
                    });
                    exportAll.push(new finalZipReader("<?php echo explode(".", $file["file_name"])[0] ?>", blob));

                    const filename = '<?php echo explode(".", $file["file_name"])[0] ?>';
                    const url = URL.createObjectURL(blob);
                    file_link.setAttribute('href', url);
                    file_link.style.color = "black";

                    await worker<?php echo $key ?>.terminate();
                })();

        <?php
            }
        }
        ?>
        pages[2].style.display = "block";
        pageButton[2].classList.add("active");

        $("#parse-Files").hide();
        $("#download-Files").show();
        $("#uploadfor").hide();
    <?php

    } else if (!empty($_GET['patient'])) {
    ?>

        pages[0].style.display = "block";
        pageButton[0].classList.add("active");
        $("#parse-Files").hide();
        $("#download-Files").hide();
        $("#uploadfor").show();

    <?php
    } else { ?>

        pages[1].style.display = "block";
        pageButton[1].classList.add("active");
        $("#parse-Files").show();
        $("#download-Files").hide();
        $("#uploadfor").hide();

    <?php
    }
    ?>

    pageButton.forEach(function(element) {
        element.addEventListener('click', function handleClick(event) {
            if (!element.classList.contains("active") && typeof $(element).attr('page') !== 'undefined') {
                let page__content = document.getElementById(element.getAttribute("page"));
                content__fresh();
                page__content.style.display = "block";
                element.classList.add("active");
            } else if (typeof $(element).attr('page') === 'undefined') {
                alert("Please select a patient in user page before uploading file");
            }
            if (element.getAttribute('page') == "export") {

                $("#parse-Files").hide();
                $("#download").show();
                $("#uploadfor").hide();
                // do something, it exists 
            } else if (element.getAttribute('page') == "import") {

                $("#parse-Files").hide();
                $("#download").hide();
                $("#uploadfor").show();
                // do something, it exists 
            } else {

                $("#parse-Files").show();
                $("#download-Files").hide();
                $("#uploadfor").hide();

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

    const form = document.getElementById("formUpload_id");

    function getAllfiles() {
        let files = document.getElementById("groupFile").files;
        if (files[0]) {
            let totalTexts = document.querySelectorAll(".totalFiles");
            totalTexts.forEach(element => {
                element.innerHTML = files.length;
            });
            file__h1.innerHTML = '<span class="totalFiles">' + files.length + '</span> Files(s) Imported, keep it coming!'
            loadUploadfile(files);
        }
    }

    function formatAMPM(date) {
        var hours = date.getHours();
        var minutes = date.getMinutes();
        var ampm = hours >= 12 ? 'pm' : 'am';
        hours = hours % 12;
        hours = hours ? hours : 12; // the hour '0' should be '12'
        minutes = minutes < 10 ? '0' + minutes : minutes;
        var strTime = hours + ':' + minutes + ' ' + ampm;
        return strTime;
    }

    function loadUploadfile(files) {
        let groupInput = document.getElementById("groupFile");
        groupInput.style.display = "none";
        let xhr = new XMLHttpRequest();
        xhr.open("POST", "include/upload.inc.php");
        xhr.upload.addEventListener("progress", ({
            loaded,
            total
        }) => {
            let fileLoaded = Math.floor((loaded / total) * 100);
            let fileTotal = Math.floor(total / 1000);
            const fileListLength = files.length;

            let progressHTML = `
                        <div class="progress">
                            <div class="progress-bar" role="progressbar" style="width: ${fileLoaded}%" aria-valuenow="${fileLoaded}" aria-valuemin="0" aria-valuemax="100">${fileLoaded}%</div>
                        </div>
                        `;
            progressBar.innerHTML = progressHTML;

            if (fileLoaded == 100) {
                setTimeout(() => {
                    location.reload();
                }, "1000")
            }
        });
        let data = new FormData(form);
        xhr.send(data);
    }
    $("#download-Files").click(function() {
        console.log(exportAll);
        var finalZip = new JSZip();

        for (let index = 0; index < exportAll.length; index++) {

            if (exportAll[index].blob instanceof Blob) {
                finalZip.file(exportAll[index].name + "-" + index + ".pdf", exportAll[index].blob, {
                    base64: true
                });
            } else {
                const blob = new Blob([new Uint8Array(exportAll[index].blob)], {
                    type: 'application/zip'
                });
                finalZip.file(exportAll[index].name + "-" + index + ".zip", exportAll[index].blob, {
                    base64: true
                });
            }
        }


        finalZip.generateAsync({
                type: "blob"
            })
            .then(function(content) {
                // see FileSaver.js
                saveAs(content, "results");
            });
    })
</script>