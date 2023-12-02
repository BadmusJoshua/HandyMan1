<?php
include 'inc/config/database.php';
$user = $username = $unhashed_password = $passwordErr = "";

if (isset($_POST['submit'])) {

    $name = filter_input(INPUT_POST, 'company_name', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $email = filter_input(INPUT_POST, 'company_email', FILTER_SANITIZE_EMAIL);
    $phone = filter_input(INPUT_POST, 'company_phone', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $unhashed_password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $hashed_password = password_hash($unhashed_password, PASSWORD_DEFAULT);

    function validatePassword($unhashed_password)
    {
        // Check if password length is between 8 to 15 characters
        $passwordLength = strlen($unhashed_password);
        if ($passwordLength < 8 || $passwordLength > 15) {
            return false;
        }

        // Check if the password contains at least one number or symbol
        if (!preg_match('/[0-9!@#$%^&*()]/', $unhashed_password)) {
            return false;
        }

        return true;
    }

    // Example usage:
    if (validatePassword($unhashed_password)) {

        $sql = "select * FROM employers WHERE email = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$email]);
        $userCount = $stmt->rowCount();
        if ($userCount > 0) {
            $user = 1;
        } else {
            $sql = "select * FROM employers WHERE name = ?";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$name]);
            $nameCheck = $stmt->rowCount();
            if ($nameCheck > 0) {
                $user = 1;
            } else {
                $sql = "insert into employers (name, email, job_category, phone, password) values (?,?,?,?,?)";
                $stmt = $pdo->prepare($sql);
                $stmt->execute([$name, $email, $phone, $hashed_password]);

                $sql = "SELECT * FROM employers WHERE name = ?";
                $stmt = $pdo->prepare($sql);
                $stmt->execute([$name]);
                $detail = $stmt->fetch();
                $userId = $detail->id;
                session_start();
                $_SESSION['id'] = $userId;
                header("Location:employer-index.php");
            }
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

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Noto+Sans+JP:100,300,400,500,700,900&amp;display=swap" rel="stylesheet" />

    <!-- Template CSS Files -->
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/line-awesome.css" />
    <link rel="stylesheet" href="css/owl.carousel.min.css" />
    <link rel="stylesheet" href="css/owl.theme.default.min.css" />
    <link rel="stylesheet" href="css/magnific-popup.css" />
    <link rel="stylesheet" href="css/daterangepicker.css" />
    <link rel="stylesheet" href="css/jquery-ui.css" />
    <link rel="stylesheet" href="css/chosen.min.css" />
    <link rel="stylesheet" href="css/style.css" />

    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">
    <title> JobCrest || The best job openings</title>

    <!-- Vendor JS Files -->
    <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/chart.js/chart.umd.js"></script>
    <script src="assets/vendor/echarts/echarts.min.js"></script>
    <script src="assets/vendor/quill/quill.min.js"></script>
    <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
    <script src="assets/vendor/tinymce/tinymce.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>

    <!-- Template JS Files -->
    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/jquery-ui.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/isotope-3.0.6.min.js"></script>
    <script src="js/chosen.min.js"></script>
    <script src="js/moment.min.js"></script>
    <script src="js/daterangepicker.js"></script>
    <script src="js/purecounter.js"></script>
    <script src="js/progresscircle.js"></script>
    <script src="js/main.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>
    <script>
        $(document).ready(function() {
            $('#toggle-password').on('click', function() {
                console.log("click");
                const passwordField = $('#password');
                const icon = $('#toggle-icon');

                // Toggle password visibility
                if (passwordField.attr('type') === 'password') {
                    passwordField.attr('type', 'text');
                    icon.removeClass('bi-eye-slash').addClass('bi-eye');
                } else {
                    passwordField.attr('type', 'password');
                    icon.removeClass('bi-eye').addClass('bi-eye-slash');
                }
            });
        });
    </script>
</head>


<body>

    <main>
        <div class="container">

            <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-5 col-md-6 d-flex flex-column align-items-center justify-content-center">

                            <div class="d-flex justify-content-center py-2">
                                <a href="index.html" class="logo d-flex align-items-center w-auto">
                                    <img src="assets/img/logo.png" alt="">
                                    <span class="d-none d-lg-block">JobCrest</span>
                                </a>
                            </div><!-- End Logo -->

                            <div class="card mb-3">

                                <div class="card-body">

                                    <div class="pt-4 pb-2">
                                        <h5 class="card-title text-center pb-0 fs-4">Create an Employer's Account</h5>
                                        <p class="text-center small">Enter your company's information to create account</p>
                                    </div>

                                    <form class="row g-3 needs-validation" action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post" novalidate>
                                        <?php

                                        if ($user) {
                                            echo '<div class="alert alert-danger text-center alert-dismissible fade show" role="alert">
                          Account already exists!
                          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>';
                                        }
                                        if ($passwordErr) {
                                            echo '<div class="alert alert-danger text-center alert-dismissible fade show" role="alert">
                          Password must contain 8-15 characters and one number or symbol.
                          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>';
                                        }

                                        ?>

                                        <div class="col-12">
                                            <label for="yourName" class="form-label">Company Name</label>
                                            <div class="input-group has-validation">
                                                <span class="input-group-text" id="basic-addon1"><i class="bi bi-file-person"></i></span>
                                                <input type="text" name="company_name" class="form-control" id="yourName" required>
                                                <div class="invalid-feedback">Please, enter your company's name!</div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <label for="jobCategory" class="form-label">Job Category</label>
                                            <select class="form-select form-control" name="job_categories">
                                                <option value=""></option>
                                                <option value="Healthcare">Healthcare</option>
                                                <option value="Education">Education</option>
                                                <option value="Information Technology">Information Technology</option>
                                                <option value="Business Management">Business Management</option>
                                                <option value="Sales and Marketing">Sales and Marketing</option>
                                                <option value="Finance">Finance</option>
                                                <option value="Engineering">Engineering</option>
                                                <option value="Customer Service">Customer Service</option>
                                                <option value="Human Resources">Human Resources</option>
                                                <option value="Construction and Skilled Trades">Construction and Skilled Trades</option>
                                                <option value="Hospitality and Tourism">Hospitality and Tourism</option>
                                                <option value="Retail">Retail</option>
                                                <option value="Manufacture and Production">Manufacture and Production</option>
                                                <option value="Legal">Legal</option>
                                                <option value="Media and Communication">Media and Communication</option>
                                                <option value="Science and Research">Science and Research</option>
                                                <option value="Art and Design">Art and Design</option>
                                                <option value="Agriculture and Farming">Agriculture and Farming</option>
                                                <option value="Government and Public Administration">Government and Public Administration</option>
                                                <option value="Transportation and Logistics">Transportation and Logistics</option>
                                                <option value="Real Estate">Real Estate</option>
                                                <option value="NonProfit and Social Services">NonProfit and Social Services</option>
                                                <option value="Insurance">Insurance</option>
                                                <option value="Fitness and Wellness">Fitness and Wellness</option>
                                                <option value="Energy">Energy</option>
                                                <option value="Consulting">Consulting</option>
                                                <option value="Security and Law Enforcement">Security and Law Enforcement</option>
                                                <option value="Writing and Editing">Writing and Editing</option>
                                                <option value="Performing Arts">Performing Arts</option>
                                                <option value="Sports">Sports</option>
                                                <option value="Telecommunications">Telecommunications</option>
                                                <option value="Personal Care and Beauty Services">Personal Care and Beauty Services</option>
                                                <option value="Digital Marketing">Digital Marketing</option>
                                            </select>
                                        </div>

                                        <div class="col-12">
                                            <label for="yourEmail" class="form-label">Company Email</label>
                                            <div class="input-group has-validation">
                                                <span class="input-group-text" id="basic-addon1"><i class="bi bi-envelope-at"></i></span>
                                                <input type="email" name="company_email" class="form-control" id="yourEmail" required>
                                                <div class="invalid-feedback">Please enter a valid Email address!</div>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <label for="yourPhoneNumber" class="form-label">Phone Number</label>
                                            <div class="input-group has-validation">
                                                <span class="input-group-text" id="basic-addon1"><i class="bi bi-telephone"></i></span>
                                                <input type="tel" name="company_phone" class="form-control" id="yourphoneNumber" required>
                                                <div class="invalid-feedback">Please enter your phone number.</div>
                                            </div>
                                        </div>

                                        <div class="col-12 input-box mb-3">
                                            <label class="label-text">Password</label>
                                            <div class="input-group">
                                                <span class="input-group-text" id="basic-addon1"><i class="bi bi-lock"></i></span>
                                                <input class="form-control" aria-describedby="toggle-password" type="password" name="unhashed_password" id="password" placeholder="password" value="<?= $unhashed_password ?>">
                                                <span class="input-group-text" id="toggle-password basic-addon1">
                                                    <i class="bi bi-eye-slash" id="toggle-icon"></i>
                                                </span>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <button class="btn btn-primary w-100" name="submit" type="submit">Create Account</button>
                                        </div>
                                        <div class="col-12 d-flex justify-content-center">
                                            <p class="small mb-0">Already have an account? <a href="login.php">Log in</a></p>
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



</body>

</html>