<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="assets/vendor/bootstrap-5.2.0-beta1-dist/css/bootstrap.min.css">
    <link href='assets/boxicon/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link rel="stylesheet" type="text/css" href="assets/vendor/DataTables/datatables.min.css" />
    <link rel="stylesheet" href="assets/css/registry/style.css">


    <script src="assets/js/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" src="assets/js/vpb_uploader.js"></script>
    <script src='https://unpkg.com/tesseract.js@v2.1.0/dist/tesseract.min.js'></script>

    <script src="assets/vendor/pdfjs/build/pdf.js"></script>
    <script type="text/javascript" src="assets/vendor/DataTables/datatables.min.js"></script>
    <script src="assets/vendor/bootstrap-5.2.0-beta1-dist/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/filesaver/FileSaver.js"></script>
    <script src="assets/vendor/zipjs/jszip.min.js"></script>
    <script src="assets/vendor/smoothscroll/dist/smooth-scrollbar.js"></script>
    <?php
    if (basename($_SERVER['PHP_SELF'], ".php") == "system-discussion") {
    ?>
        <!-- Core build with no theme, formatting, non-essential modules -->
        <link href="//cdn.quilljs.com/1.2.3/quill.core.css" rel="stylesheet">

        <!-- Theme included stylesheets -->
        <link href="//cdn.quilljs.com/1.2.3/quill.snow.css" rel="stylesheet">
        <link href="//cdn.quilljs.com/1.2.3/quill.bubble.css" rel="stylesheet">

        <script src="//cdn.quilljs.com/1.2.3/quill.core.js"></script>



        <!-- Main Quill library -->
        <script src="//cdn.quilljs.com/1.2.3/quill.min.js"></script>
    <?php
    }
    ?>
</head>

<body>
    <header class="primary__header">
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid ">
                <div class="navbar-brand d-flex ">
                    <div class="logo__header">
                        <img src="assets/img/logo/DOH Logo.png" alt="">
                        <div class="logo__text me-5">
                            <h3>DOH Registry</h3>
                            <p>Eye Center</p>
                        </div>
                    </div>
                    <div class="logo__header">
                        <img src="assets/img/logo/D of health.png" alt="">
                        <div class="logo__text" style="margin-left: 10px;">
                            <h3>Department <br>
                                Of Health</h3>
                        </div>
                    </div>
                </div>
                <div class="" id="navbarSupportedContent">
                    <div class="profile d-flex justify-content-end align-items-center me-5">
                        <div class="logo__profile_img me-3">
                            <img src="assets/img/logo/profile.png" class="img-fluid" alt="">
                        </div>
                        <div class="logo__profile_text d-flex flex-column">
                            <div class="name"><?php echo $_SESSION["title"] . "." . $_SESSION["fname"] . " " . $_SESSION["lname"] ?>
                                
                            </div>
                            <a href="include/user-include/logout.inc.php" class="login__details">
                                Log out
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </nav>
    </header>