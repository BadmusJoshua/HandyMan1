<?php
require 'inc/config/database.php';
$name = $email = $password = $user = $nameErr = $emailErr = $phoneErr = $passwordErr = "";

if (isset($_POST['submit'])) {

    if (!empty($_POST['username'])) {
        $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    }
    if (!empty($_POST['email'])) {
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    }

    if (!empty($_POST['password'])) {
        $unhashed_password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        function validatePassword($assumed_password)
        {
            // Check if password length is between 8 to 15 characters
            $passwordLength = strlen($assumed_password);
            if ($passwordLength < 8) {
                return false;
            } else
                // Check for at least one number, one alphabet character or symbol
                if (!preg_match('/^(?=.*[0-9])(?=.*[a-zA-Z!@#$%^&*()\-_=+{};:,<.>])[a-zA-Z0-9!@#$%^&*()\-_=+{};:,<.>]+$/', $assumed_password)) {
                    return false;
                } else {
                    return true;
                }
        }


        // Example usage:
        if (validatePassword($unhashed_password)) {
            $hashed_password = password_hash($unhashed_password, PASSWORD_DEFAULT);
            $sqli = "SELECT * FROM admins WHERE email = ?";
            $stmt = $pdo->prepare($sqli);
            $stmt->execute([$email]);
            //check if email is available
            $userCount = $stmt->rowCount();
            if ($userCount > 0) {

                $user = 1;
            } else {

                $sql = "INSERT INTO admins (username, email, password) values (?,?,?)";
                $stmt = $pdo->prepare($sql);
                $stmt->execute([$username, $email, $hashed_password]);
                $sql = "SELECT * FROM admins WHERE email = ?";
                $stmt = $pdo->prepare($sql);
                $stmt->execute([$email]);
                $detail = $stmt->fetch();
                $userId = $detail->id;
                session_start();
                $_SESSION['id'] = $userId;
                header("Location:admin-index.php");
            }
        } else {
            $passwordErr = 1;
        }
    } else {
        $passwordErr = 1;
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>JobCrest</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">

</head>

<body>

    <main>
        <div class="container">

            <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-5 col-md-6 d-flex flex-column align-items-center justify-content-center">

                            <div class="d-flex justify-content-center py-4">
                                <a href="index.php" class="logo d-flex align-items-center w-auto">
                                    <img src="assets/img/logo.png" alt="">
                                    <span class="d-none d-lg-block">JobCrest</span>
                                </a>
                            </div><!-- End Logo -->

                            <div class="card mb-3">

                                <div class="card-body">

                                    <div class="pt-4 pb-2">
                                        <h5 class="card-title text-center pb-0 fs-4">Become an admin</h5>
                                        <p class="text-center small">Enter your information to create account</p>
                                    </div>

                                    <form class="row g-3 needs-validation" action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post" novalidate>
                                        <?php

                                        if ($user) {
                                            echo '<div class="alert alert-danger text-center alert-dismissible fade show" role="alert">
                          Account already exists!
                          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>';
                                        }
                                        ?>

                                        <div class="col-12">
                                            <label for="yourName" class="form-label">Your Username</label>
                                            <div class="input-group">
                                                <span class="input-group-text" id="basic-addon1"><i class="bi bi-file-person"></i></span>
                                                <input type="text" name="username" class="form-control" id="yourName" value="<?= $username ?>" required>
                                                <div class="invalid-feedback">Please, enter your username!</div>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <label for="yourEmail" class="form-label">Your Email</label>
                                            <div class="input-group">
                                                <span class="input-group-text" id="basic-addon1"><i class="bi bi-envelope-at"></i></span>
                                                <input type="email" name="email" class="form-control" id="yourEmail" value="<?= $email ?>" required>
                                                <div class="invalid-feedback">Please enter a valid Email address!</div>
                                            </div>
                                        </div>

                                        <!-- <div class="col-12">
                                            <label for="yourPhoneNumber" class="form-label">Phone Number</label>
                                            <div class="input-group has-validation">
                                                <span class="input-group-text" id="basic-addon1"><i class="bi bi-telephone"></i></span>
                                                <input type="tel" name="phone" class="form-control" id="yourphoneNumber" value="<?= $phone ?>" required>
                                                <div class="invalid-feedback">Please enter your phone number.</div>
                                            </div>
                                        </div> -->

                                        <div class="col-12">
                                            <label for="yourPassword" class="form-label">Password</label>
                                            <div class="input-group">
                                                <span class="input-group-text" id="basic-addon1"><i class="bi bi-lock"></i></span>
                                                <input type="password" name="password" class="form-control" id="yourPassword" value="<?= $password ?>" required>
                                                <div class="invalid-feedback">Please enter your password!</div>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <button class="btn btn-primary w-100" name="submit" type="submit">Create Account</button>
                                        </div>
                                        <div class="col-12">
                                            <p class="small mb-0 text-center">Already have an account? <a href="admin-login.php">Log in</a></p>

                                        </div>
                                    </form>
                                    <!--  -->
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </section>

        </div>
    </main><!-- End #main -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/chart.js/chart.umd.js"></script>
    <script src="assets/vendor/echarts/echarts.min.js"></script>
    <script src="assets/vendor/quill/quill.min.js"></script>
    <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
    <script src="assets/vendor/tinymce/tinymce.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>

</body>

</html>