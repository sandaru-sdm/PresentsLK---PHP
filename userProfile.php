<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PresentsLK | My Account</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style.css" />
    <link rel="icon" href="Resources/Icon.png" />
    <link rel="stylesheet" href="bootstrap.css" />
    <!-- CSS -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css" />
    <!-- Default theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css" />
    <!-- Semantic UI theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.min.css" />
    <!-- Bootstrap theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css" />

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="dist/css/adminlte.min.css">

    <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- summernote -->
    <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">

    <link rel="stylesheet" href="plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">

    <link rel="stylesheet" href="dist/css/adminlte.min.css">

</head>

<body>

    <div class="container-fluid">
        <div class="row">

            <?php
            require "header.php";
            if (isset($_SESSION["u"])) {

            ?>


                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1>Profile</h1>
                            </div>
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active">User Profile</li>
                                </ol>
                            </div>
                        </div>
                    </div><!-- /.container-fluid -->
                </section>

                <!-- Main content -->
                <section class="content mb-5">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-3">

                                <?php



                                $id = $_SESSION["u"]["id"];

                                $resultset = Database::search("SELECT * FROM `users` 
                            LEFT JOIN `profile_image` ON `users`.`id` = `profile_image`.`users_id` 
                            LEFT JOIN `user_has_address` ON `users`.`id`=`user_has_address`.`users_id` 
                            LEFT JOIN `city` ON `user_has_address`.`city_id` = `city`.`id` 
                            LEFT JOIN `district` ON `city`.`district_id`=`district`.`id` 
                            LEFT JOIN `province` ON `district`.`province_id`=`province`.`id` 
                            LEFT JOIN `gender` ON `users`.`gender_id` = `gender`.`id` 
                            WHERE `users`.`id` = '" . $id . "'");

                                $n = $resultset->num_rows;

                                $d = $resultset->fetch_assoc();

                                ?>
                                <!-- Profile Image -->
                                <div class="card card-primary card-outline">
                                    <div class="card-body box-profile">
                                        <div class="text-center">

                                            <?php

                                            if (isset($d["path"])) {

                                            ?>

                                                <img class="profile-user-img img-fluid img-circle" src="<?php echo $d["path"]; ?>" id="preview" />

                                            <?php

                                            } else {

                                            ?>
                                                <img class="profile-user-img img-fluid img-circle" src="Resources/user.svg" id="preview" />

                                            <?php
                                            }

                                            ?>

                                        </div>

                                        <h3 class="profile-username text-center">
                                            <?php echo $d["fname"] . " " . $d["lname"]; ?></h3>

                                        <p class="text-muted text-center"><?php echo $d["email"]; ?></p>



                                        <!-- <a href="#" class="btn btn-primary btn-block"><b>Update Profile Picture</b></a> -->
                                        <input class="d-none" type="file" accept="img/*" id="profile" onchange="preview(event);" />
                                        <label class="btn btn-primary btn-block" for="profile">Update Profile
                                            Image</label>
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                                <!-- /.card -->
                            </div>
                            <!-- /.col -->


                            <div class="col-md-9">

                                <div class="row">

                                    <div class="container-fluid d-flex col-10 justify-content-center align-items-center">
                                        <div class="row">

                                            <div class="text-center mb-5 bg-primary">
                                                <h4 class="fw-bold mt-1">Details</h4>
                                            </div>

                                            <div class="col-md-6">
                                                <label class="form-label">First Name</label>
                                                <input type="text" id="fname" class="form-control" value="<?php echo $d["fname"]; ?>" />
                                            </div>

                                            <div class="col-md-6">
                                                <label class="form-label">Last Name</label>
                                                <input type="text" id="lname" class="form-control" value="<?php echo $d["lname"]; ?>" />
                                            </div>

                                            <div class="col-md-6 mt-3">
                                                <label class="form-label">Mobile</label>
                                                <input type="text" id="mobile" class="form-control" value="<?php echo $d["mobile"]; ?>" />
                                            </div>

                                            <div class="col-md-6 mt-3">
                                                <label class="form-label">Email</label>
                                                <input type="text" class="form-control" value="<?php echo $d["email"]; ?>" disabled />
                                            </div>

                                            <div class="col-md-6 mt-3">
                                                <label class="form-label">Gender</label>
                                                <input type="text" class="form-control" value="<?php echo $d["gender_name"]; ?>" readonly />
                                            </div>

                                            <div class="col-md-6 mt-3">
                                                <label class="form-label">Registered Date</label>
                                                <input type="text" class="form-control" value="<?php echo $d["joined_date"]; ?>" readonly />
                                                <!--readonly or disabled-->
                                            </div>

                                            <?php

                                            if (!empty($d["line1"])) {

                                            ?>

                                                <div class="col-md-12 mt-3">
                                                    <label class="form-label">Address Line 01</label>
                                                    <input id="line1" type="text" class="form-control" value="<?php echo $d["line1"]; ?>" placeholder="Address Line 1" />
                                                </div>

                                            <?php

                                            } else {

                                            ?>

                                                <div class="col-md-12 mt-3">
                                                    <label class="form-label">Address Line 01</label>
                                                    <input id="line1" type="text" class="form-control" value="" placeholder="Address Line 1" />
                                                </div>

                                            <?php

                                            }

                                            ?>

                                            <?php

                                            if (!empty($d["line2"])) {

                                            ?>

                                                <div class="col-md-12 mt-3">
                                                    <label class="form-label">Address Line 02</label>
                                                    <input id="line2" type="text" class="form-control" value="<?php echo $d["line2"]; ?>" placeholder="Address Line 2" />
                                                </div>

                                            <?php

                                            } else {

                                            ?>

                                                <div class="col-md-12 mt-3">
                                                    <label class="form-label">Address Line 02</label>
                                                    <input id="line2" type="text" class="form-control" value="" placeholder="Address Line 2" />
                                                </div>

                                            <?php

                                            }

                                            ?>

                                            <div class="form-group col-6 mt-3">
                                                <label>Province</label>
                                                <?php
                                                $province_rs = Database::search("SELECT * FROM `province`");
                                                $province_num = $province_rs->num_rows;
                                                ?>
                                                <select class="form-control select2bs4" style="width: 100%;" id="province" 
                                                name="province" onchange="getDistrict(value);">
                                                    <option selected value="0">Select Province</option>
                                                    <?php //echo $provine_list; 
                                                    ?>
                                                    <?php
                                                    for ($x = 0; $x < $province_num; $x++) {
                                                        $province_data = $province_rs->fetch_assoc();
                                                    ?>
                                                        <option value="<?php echo $province_data["id"]; ?>" 
                                                        <?php if ($province_data["id"] == $d["province_id"]) { ?> selected <?php } ?>>
                                                            <?php echo $province_data["name"]; ?> </option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>

                                            <?php

                                            if (isset($d["district_id"])) {

                                                $district_rs = Database::search("SELECT * FROM `district` WHERE `id` = '".$d["district_id"]."'");
                                                $district_data = $district_rs -> fetch_assoc();

                                            ?>

                                                <div class="col-md-6 mt-3">
                                                    <label class="form-label">District</label>
                                                    <select class="form-control select2bs4" id="district" name="district" onchange="getCity(value);">
                                                        <option disabled value="0">Select District</option>

                                                        <option value="<?php echo $d["district_id"]; ?>"><?php echo $district_data["name"]; ?></option>

                                                    </select>
                                                </div>

                                            <?php

                                            } else {

                                            ?>

                                                <div class="col-md-6 mt-3">
                                                    <label class="form-label">District</label>
                                                    <select class="form-control select2bs4" id="district" name="district" onchange="getCity(value);">
                                                        <option disabled value="0">Select District</option>


                                                    </select>
                                                </div>

                                                <?php
                                            }
                                            if (isset($d["city_id"])) {

                                                $city_rs = Database::search("SELECT * FROM `city` WHERE `id` = '".$d["city_id"]."'");

                                                $city_data = $city_rs->fetch_assoc();

                                                ?>

                                                    <div class="col-md-6 mt-3">
                                                        <label class="form-label">City</label>
                                                        <select class="form-control select2bs4" id="city" name="city">
                                                            <option disabled value="0">Select District</option>

                                                            <option value="<?php echo $d["city_id"]; ?>"><?php echo $city_data["name"]; ?></option>

                                                        </select>
                                                    </div>

                                                <?php
                                            } else {

                                                ?>

                                                <div class="col-md-6 mt-3">
                                                    <label class="form-label">City</label>
                                                    <select class="form-control select2bs4" id="city" name="city">
                                                        <option disabled value="0">Select City</option>
                                                    </select>
                                                </div>

                                            <?php

                                            }

                                            if (isset($d["postal_code"])) {
                                            ?>
                                                <div class="col-md-6 mt-3">
                                                    <label class="form-label">Postal Code</label>
                                                    <input id="postal_code" type="text" class="form-control" value="<?php echo $d["postal_code"]; ?>" />
                                                </div>
                                            <?php
                                            } else {
                                            ?>
                                                <div class="col-md-6 mt-3">
                                                    <label class="form-label">Postal Code</label>
                                                    <input id="postal_code" type="text" class="form-control" value="" />
                                                </div>
                                            <?php
                                            }
                                            ?>



                                            <div class="col-md-12  d-grid mt-5">
                                                <button class="btn btn-primary" onclick="updateProfile();">Update My
                                                    Prfile</button>
                                            </div>

                                        </div>
                                    </div>

                                </div>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                    </div><!-- /.container-fluid -->
                </section>
                <!-- /.content -->


                <?php require "footer.php"; ?>

        </div>
    </div>

    <script>
        $(function() {
            //Initialize Select2 Elements
            $('.select2').select2()

            //Initialize Select2 Elements
            $('.select2bs4').select2({
                theme: 'bootstrap4'
            })

        })
        // BS-Stepper Init
    </script>

    <script src="js/userProfile.js"></script>
    <script src="js/alertify.js"></script>
    <script src="js/alertify.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <!-- <script src="js/bootstrap.bundle.js"></script> -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="dist/js/adminlte.min.js"></script>
    <script src="dist/js/demo.js"></script>

    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- ChartJS -->
    <script src="plugins/chart.js/Chart.min.js"></script>
    <!-- Sparkline -->
    <script src="plugins/sparklines/sparkline.js"></script>
    <!-- JQVMap -->
    <script src="plugins/jqvmap/jquery.vmap.min.js"></script>
    <script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="plugins/jquery-knob/jquery.knob.min.js"></script>
    <!-- daterangepicker -->
    <script src="plugins/moment/moment.min.js"></script>
    <script src="plugins/daterangepicker/daterangepicker.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <!-- Summernote -->
    <script src="plugins/summernote/summernote-bs4.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>


    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Select2 -->
    <script src="plugins/select2/js/select2.full.min.js"></script>
    <!-- InputMask -->
    <script src="plugins/moment/moment.min.js"></script>
    <script src="plugins/inputmask/jquery.inputmask.min.js"></script>
</body>

</html>

<?php
            } else {
                // $_SESSION['userProfileError'] = "Please Login First.";
?>

    <script>
        alert("Please Login First");
        // alertify.set('notifier', 'position', 'top-right');
        // alertify.error("Please Login First.");
        window.location = "index.php";
    </script>

<?php
            }
?>