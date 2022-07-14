<?php
session_start();

if ($_SESSION['userid']) {
    header('location: system-discussion.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/registry/style.css">
    <link href='assets/boxicon/boxicons.min.css' rel='stylesheet'>
    <script src="assets/js/jquery-3.6.0.min.js"></script>
</head>

<body>
    <header class="primary__header">
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid ">
                <div class="navbar-brand d-flex justify-content-between">
                    <div class="logo__header">
                        <img src="assets/img/logo/DOH Logo.png" alt="">
                        <div class="logo__text">
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
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav flex-row justify-content-evenly">
                        <li class="nav-item">
                            <a class="nav-link" href="#about">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#clinicians">Clinicians</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#research">Research</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#request">Request Access</a>
                        </li>
                    </ul>
                </div>
                <div class="menu-btn navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <div class="menu-btn_burger">
                    </div>
                </div>
            </div>
        </nav>
    </header>
    <main style="display: unset; flex-direction: unset;">
        <section class="login secbg-primary d-flex justify-content-center align-items-center">
            <div class="login__content">
                <?php if (!isset($_SESSION['userid'])) { ?>
                    <form action="" id="loginForm">
                        <div class="d-flex flex-column mb-4">
                            <label for="email">Email <span>*</span></label>
                            <input type="email" class="form-control" name="email" id="email">
                        </div>
                        <div class="d-flex flex-column mb-4">
                            <label for="password">Password <span>*</span></label>
                            <input type="password" class="form-control" name="loginpwd" id="password">
                        </div>
                        <div class="d-flex align-items-center justify-content-between mb-4">
                            <a href="">Forgot Password?</a>
                            <button class="btn button-primary" type="submit" name="submit">Log in</button>
                        </div>
                        <div class="w-100 text-center">
                            <a href="#request">Need an Account? <span>Register Now!</span></a>
                        </div>
                        <hr>
                        <a href="">Click here to enter patient questionnaires</a>
                    </form>
                <?php } else { ?>
                    <a href="include/user-include/logout.inc.php">Log out</a>
                <?php } ?>
            </div>
        </section>
        <section class="secbg-secondary" id="about">
            <div class="content">
                <div class="text-center">
                    <h1>ABOUT US</h1>
                </div>
                <div class="split">
                    <div class="temp__image">Change to img</div>
                    <div class="text mt-3">
                        Ab doloribus voluptate eos quia molestias sit consequuntur consequatur non voluptatum galisum in nemo quas sed ratione numquam ab voluptatum omnis. Qui earum numquam est quis nisi cum galisum veritatis in iusto accusamus qui aperiam assumenda et similique praesentium! Et praesentium quos sit ratione odio non voluptatem sint vel iure eaque qui consequatur enim aut voluptatem natus hic enim veritatis?
                    </div>
                </div>
            </div>
        </section>
        <section class="approach secbg-primary">
            <div class="content">

                <div class="text-center">
                    <h1>APPROACH</h1>
                </div>
                <div class="split split-reverse">
                    <div class="text mt-3">
                        Ab doloribus voluptate eos quia molestias sit consequuntur consequatur non voluptatum galisum in nemo quas sed ratione numquam ab voluptatum omnis. Qui earum numquam est quis nisi cum galisum veritatis in iusto accusamus qui aperiam assumenda et similique praesentium! Et praesentium quos sit ratione odio non voluptatem sint vel iure eaque qui consequatur enim aut voluptatem natus hic enim veritatis?
                    </div>
                    <div class="temp__image">Change to img</div>
                </div>
            </div>
        </section>
        <section class="features secbg-secondary">
            <div class="content">

                <div class="text-center">
                    <h1>FEATURES</h1>
                </div>
                <div class="row d-flex align-items-center justify-content-center">
                    <div class="col-sm-12 col-lg-3">
                        <div class="icon text-center">
                            <i class='bx bxl-facebook-circle'></i>
                        </div>
                        <div class="feature__text">Lorem ipsum dolor sit amet. Ut temporibus autem hic amet nesciunt ut iure voluptas eum facilis libero non rerum ipsa vel deserunt consequatur illo tempora.</div>
                    </div>
                    <div class="col-sm-12 col-lg-3">
                        <div class="icon text-center">
                            <i class='bx bxl-facebook-circle'></i>
                        </div>
                        <div class="feature__text">Lorem ipsum dolor sit amet. Ut temporibus autem hic amet nesciunt ut iure voluptas eum facilis libero non rerum ipsa vel deserunt consequatur illo tempora.</div>
                    </div>
                    <div class="col-sm-12 col-lg-3">
                        <div class="icon text-center">
                            <i class='bx bxl-facebook-circle'></i>
                        </div>
                        <div class="feature__text">Lorem ipsum dolor sit amet. Ut temporibus autem hic amet nesciunt ut iure voluptas eum facilis libero non rerum ipsa vel deserunt consequatur illo tempora.</div>
                    </div>
                </div>
            </div>
        </section>
        <section class="request secbg-primary mb-5" id="request">
            <div class="content">

                <div class="text-center">
                    <h1>REQUEST ACCESS</h1>
                    <p>To access the DOH Registries, simply complete and submit the form below. We'll then get in contact with you to help you get started with using the system.</p>
                </div>
                <form action="" id="requestForm">
                    <div class="d-flex jc-content-between">
                        <input type="text" class="form-control w-100 m-1" name="Title" placeholder="Title">
                        <input type="email" class="form-control w-100 m-1" name="Email" placeholder="Email">
                    </div>
                    <div class="d-flex jc-content-between">
                        <input type="text" class="form-control w-100 m-1" name="Firstname" placeholder="Firstname">
                        <input type="text" class="form-control w-100 m-1" name="Lastname" placeholder="Lastname">
                    </div>

                    <div class="d-flex flex-column ">
                        <div class="d-flex jc-content-between">
                            <input type="text" class="form-control w-100 m-1" name="Practice" placeholder="Practice">
                            <input type="text" class="form-control w-100 m-1" name="rptPractice" placeholder="Practice Address">
                        </div>

                        <div class="d-flex jc-content-between">
                            <input type="password" class="form-control w-100 m-1" name="pwd" placeholder="Password">
                            <input type="password" class="form-control w-100 m-1" name="rptpwd" placeholder="Confirm Password">
                        </div>
                    </div>
                    <div class="d-flex flex-column m-1">
                        <label for="note">Note</label>
                        <textarea name="note" id="note" cols="30" rows="10"></textarea>
                    </div>
                    <button class="btn button-primary float-end" type="submit" name="submit">Request Acces</button>
                </form>

            </div>
        </section>
    </main>

    <?php
    include 'include/footer.inc.php';
    ?>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

<script>
    $(document).ready(function() {
        const menuBtn = document.querySelector('.menu-btn');
        let menuOpen = false;

        menuBtn.addEventListener('click', () => {
            if (!menuOpen) {
                menuBtn.classList.add("open");
                menuOpen = true;
            } else {
                menuBtn.classList.remove("open");
                menuOpen = false;
            }
        });
        let height = $(".primary__header");
        height.css("position", "fixed");

        $("#loginForm").on('submit', function(e) {
            e.preventDefault();
            let Form = $("#loginForm");
            $.ajax({
                type: 'POST',
                url: 'include/user-include/login.inc.php',
                data: $(this).serialize()
            }).then(function(res) {
                console.log(res);
                let data = JSON.parse(res);
                console.log(data);
                if (data.error) {
                    console.log(data.error);
                    return;
                }
                location.href = "system-discussion.php";
                // location.reload(true);

            })

        });

        $("#requestForm").on('submit', function(e) {
            e.preventDefault();
            let Form = $("#requestForm");
            $.ajax({
                type: 'POST',
                url: 'include/user-include/requestAccess.inc.php',
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
    });
</script>

</html>