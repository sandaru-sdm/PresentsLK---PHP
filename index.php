<?php

if (isset($_SESSION['userProfileError'])) {
    echo "<script>alertify.set('notifier', 'position', 'top-right');alertify.error('" . $_SESSION['userProfileError'] . "');</script>";
    unset($_SESSION['userProfileError']);
}

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PresentsLK | Log-In</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css">

    <!-- CSS -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css" />
    <!-- Default theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css" />
    <!-- Semantic UI theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.min.css" />
    <!-- Bootstrap theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css" />

    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="icon" href="Resources/Icon.png" />

    <!-- include the style -->
    <link rel="stylesheet" href="alertify.min.css" />
    <!-- include a theme -->
    <link rel="stylesheet" href="default.min.css" />

</head>

<body class="main-body">

    <div class="container-fluid vh-100 d-flex justify-content-center">
        <div class="row align-content-center">
            <!-- header -->
            <div class="col-12">
                <div class="row">
                    <div class="col-12 logo m-0"></div>
                    <div class="col-12">
                        <p class="text-center tittle01">PresentsLK</p>
                    </div>
                </div>
            </div>
            <!-- header -->

            <!-- content1 -->
            <div
                class="mb-4 col-8 pb-3 border-3 border-dark d-flex justify-content-center align-content-center container-fluid">

                <!--  -->

                <!-- signup/Signin -->
                <div class="col-12 p-3">
                    <div class="row d-flex justify-content-center align-content-center container-fluid">

                        <!-- signin -->
                        <div class="col-12">
                            <div class="row">

                                <div class="col-12 d-none card" id="signInBox">
                                    <div class="card-body">
                                        <div class="row g-2">

                                            <div class="col-12">
                                                <p class="tittle02">Sign In to your account</p>
                                                <span class="text-danger" id="msg2"></span>
                                            </div>

                                            <?php
                                $email = "";
                                $password = "";

                                if (isset($_COOKIE["email"])) {
                                    $email = $_COOKIE["email"];
                                }

                                if (isset($_COOKIE["password"])) {
                                    $password = $_COOKIE["password"];
                                }
                                ?>


                                            <div class="col-12">
                                                <lable class="form-label fw-bold fs-5">Email</lable>
                                                <input type="text" class="form-control" id="email2"
                                                    value="<?php echo $email ?>" />
                                            </div>

                                            <div class="col-12">
                                                <lable class="form-label fw-bold fs-5">Password</lable>
                                                <input type="password" class="form-control" id="password2"
                                                    value="<?php echo $password ?>" />
                                            </div>

                                            <div class="col-6">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="1"
                                                        id="rememberme">
                                                    <label class="form-check-label fs-5">Remember Me</label>
                                                </div>
                                            </div>

                                            <div class="col-6">
                                                <a href="#" class="link-danger fw-bold"
                                                    onclick="forgotPassword();">Forgot
                                                    Password? </a>
                                            </div>

                                            <div class="col-12 col-lg-6 d-grid">
                                                <button class="btn btn-primary" onclick="signin();">Sign In</button>
                                            </div>

                                            <div class="col-12 col-lg-6 d-grid">
                                                <button class="btn btn-success" onclick="changeView();">Create Account</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <!-- signin -->

                        <!-- signup -->

                        <div class="col-12 card" id="signUpBox">
                            <div class="card-body">
                                <div class="row g-2">

                                    <div class="col-12 text-center">
                                        <p class="tittle02 ">Create New Account</p>
                                        <span class="text-danger" id="msg"></span>
                                    </div>

                                    <div class="col-6">
                                        <lable class="form-label fw-bold fs-5">First Name</lable>
                                        <input type="text" class="form-control" id="fname" />
                                    </div>

                                    <div class="col-6">
                                        <lable class="form-label fw-bold fs-5">Last Name</lable>
                                        <input type="text" class="form-control" id="lname" />
                                    </div>

                                    <div class="col-12">
                                        <lable class="form-label fw-bold fs-5">Email</lable>
                                        <input type="text" class="form-control" id="email" />
                                    </div>

                                    <div class="col-12">
                                        <lable class="form-label fw-bold fs-5">Password</lable>
                                        <input type="password" class="form-control" id="password" />
                                    </div>

                                    <div class="col-6">
                                        <lable class="form-label fw-bold fs-5">Mobile</lable>
                                        <input type="text" class="form-control" id="mobile" />
                                    </div>
                                    <div class="col-6">
                                        <lable class="form-label fw-bold fs-5">Gender</lable>
                                        <select class="form-select" id="gender">

                                            <?php

                                        require "connection.php";

                                        $resultset = Database::search("SELECT * FROM `gender`");
                                        $n = $resultset->num_rows;

                                        for ($x = 0; $x < $n; $x++) {
                                            $f = $resultset->fetch_assoc();

                                        ?>

                                            <option value="<?php echo $f["id"]; ?>"><?php echo $f["gender_name"]; ?>
                                            </option>

                                            <?php
                                        }

                                        ?>

                                        </select>
                                    </div>

                                    <div class="col-12 col-lg-6 d-grid">
                                        <button class="btn btn-primary" onclick="signUp();">Sign Up</button>
                                    </div>

                                    <div class="col-12 col-lg-6 d-grid">
                                        <button class="btn btn-dark" onclick="changeView();">Sign-In</button>
                                    </div>
                                </div>
                            </div>
                            <!-- signup -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- signup/Signin -->



    <!-- content1 -->

    <!-- model -->
    <div class="modal" tabindex="-1" id="forgotPasswordModel">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row g-3">
                        <div class="col-col-6">
                            <label class="form-label">New Password</label>
                            <div class="input-group mb-3">
                                <input type="password" class="form-control" id="np">
                                <button class="btn btn-secondary" type="button" id="npb" onclick="showPassword1();"><i
                                        class="bi bi-eye-slash-fill"></i></button>
                            </div>
                        </div>
                        <div class="col-col-6">
                            <label class="form-label">Re-type Password</label>
                            <div class="input-group mb-3">
                                <input type="password" class="form-control" id="rnp">
                                <button class="btn btn-secondary" type="button" id="rnpb" onclick="showPassword2();"><i
                                        class="bi bi-eye-slash-fill"></i></button>
                            </div>
                        </div>
                        <div class="col-col-6">
                            <label class="form-label">Verification Code</label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" id="vc">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="resetPassword();">Save
                        changes</button>
                </div>
            </div>
        </div>
    </div>
    <!-- model -->

    <!-- footer -->
    <div class="col-12 fixed-bottom d-none d-lg-block">
        <p class="text-center">&copy; 2022 PresentsLK | All Right Reserved.</p>
    </div>
    <!-- footer -->
    </div>
    </div>


    <script src="js/index.js"></script>

    <script src="js/alertify.js"></script>
    <script src="js/alertify.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
</body>

</html>