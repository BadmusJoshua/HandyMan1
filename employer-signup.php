<?php
include 'inc/config/database.php';
$user = $name = $email = $phone = $unhashed_password = $passwordErr = $jobErr = $nameErr = $phoneErr = $nameExist = $emailErr = $job_category =  "";



if (isset($_POST['submit'])) {

    //checking if name isn't empty

    $name = filter_input(INPUT_POST, 'company_name', FILTER_SANITIZE_FULL_SPECIAL_CHARS);


    $email = filter_input(INPUT_POST, 'company_email', FILTER_SANITIZE_EMAIL);

    //checking if job category isn't empty

    $job_category = $_POST['job_category'];
    // Process $job_category here
    echo "Selected job category: " . $job_category;


    //checking if phone isn't empty

    $phone = filter_input(INPUT_POST, 'company_phone', FILTER_SANITIZE_FULL_SPECIAL_CHARS);


    if (!empty($_POST['unhashed_password'])) {
        $unhashed_password = filter_input(INPUT_POST, 'unhashed_password', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        function validatePassword($assumed_password)
        {
            // Check if password length is between 8 to 15 characters
            $passwordLength = strlen($assumed_password);
            if ($passwordLength < 8) {
                return false;
            } else {
                // Check for at least one number, one alphabet character or symbol
                if (!preg_match('/^(?=.*[0-9])(?=.*[a-zA-Z!@#$%^&*()\-_=+{};:,<.>])[a-zA-Z0-9!@#$%^&*()\-_=+{};:,<.>]+$/', $assumed_password)) {
                    return false;
                } else {
                    return true;
                }
            }
        }


        // Example usage:
        if (validatePassword($unhashed_password)) {
            $hashed_password = password_hash($unhashed_password, PASSWORD_DEFAULT);

            $sql = "select * FROM employers WHERE email = ?";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$email]);
            //check if email is available
            $userCount = $stmt->rowCount();
            if ($userCount > 0) {
                $user = 1;
            } else {
                $sql = "select * FROM employers WHERE name = ?";
                $stmt = $pdo->prepare($sql);
                $stmt->execute([$name]);
                //check if the name is available
                $nameCheck = $stmt->rowCount();
                if ($nameCheck > 0) {
                    echo $nameCheck;
                    $nameExist = 1;
                } else {
                    $sql = "insert into employers (name, email, job_category, phone, password) values (?,?,?,?,?)";
                    $stmt = $pdo->prepare($sql);
                    $stmt->execute([$name, $email, $job_category, $phone, $hashed_password]);
                    $sql = "SELECT * FROM employers WHERE name = ?";
                    $stmt = $pdo->prepare($sql);
                    $stmt->execute([$name]);
                    $detail = $stmt->fetch();
                    $userId = $detail->id;
                    session_start();
                    $_SESSION['id'] = $userId;
                    $_SESSION['category'] = $userCategory;

                    header("Location:employer-index.php");
                }
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
    <title> JobCrest</title>


</head>


<body>

    <main>
        <div class="container">

            <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-5 col-md-6 d-flex flex-column align-items-center justify-content-center">

                            <div class="d-flex justify-content-center py-2">
                                <a href="index.php" class="logo d-flex align-items-center w-auto">
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

                                        if ($nameExist) {
                                            echo '<div class="alert alert-danger text-center alert-dismissible fade show" role="alert">
                          A company already exists with that name
                          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>';
                                        }
                                        if ($nameErr) {
                                            echo '<div class="alert alert-danger text-center alert-dismissible fade show" role="alert">
                          Your company must have a name!
                          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>';
                                        }
                                        if ($user) {
                                            echo '<div class="alert alert-danger text-center alert-dismissible fade show" role="alert">
                          Account already exists!
                          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>';
                                        }
                                        if ($jobErr) {
                                            echo '<div class="alert alert-danger text-center alert-dismissible fade show" role="alert">
                          Job category field can\'t be blank
                          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>';
                                        }
                                        if ($phoneErr) {
                                            echo '<div class="alert alert-danger text-center alert-dismissible fade show" role="alert">
                          Phone field can\'t be blank
                          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>';
                                        }
                                        if ($emailErr) {
                                            echo '<div class="alert alert-danger text-center alert-dismissible fade show" role="alert">
                          Email field can\'t be blank
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
                                            <div class="input-group">
                                                <span class="input-group-text" id="basic-addon1"><i class="bi bi-file-person"></i></span>
                                                <input type="text" name="company_name" class="form-control" id="yourName" required value="<?= $name ?>">
                                                <div class="invalid-feedback">Please, enter your name!</div>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <label for="jobCategory" class="form-label">Job Category</label>
                                            <div class="input-group">
                                                <select name="job_category" class="form-select form-control" required>
                                                    <option value=""></option>
                                                    <option value="Healthcare" <?php if ($job_category === 'Healthcare') echo 'selected'; ?>>Healthcare</option>
                                                    <option value="Education" <?php if ($job_category === 'Education') echo 'selected'; ?>>Education</option>
                                                    <option value="Information Technology" <?php if ($job_category === 'Information Technology') echo 'selected'; ?>>Information Technology</option>
                                                    <option value="Business Management" <?php if ($job_category === 'Business Management') echo 'selected'; ?>>Business Management</option>
                                                    <option value="Sales and Marketing" <?php if ($job_category === 'Sales and Marketing') echo 'selected'; ?>>Sales and Marketing</option>
                                                    <option value="Banking and Finance" <?php if ($job_category === 'Banking and Finance') echo 'selected'; ?>>Banking and Finance</option>
                                                    <option value="Engineering" <?php if ($job_category === 'Engineering') echo 'selected'; ?>>Engineering</option>
                                                    <option value="Customer Service" <?php if ($job_category === 'Customer Service') echo 'selected'; ?>>Customer Service</option>
                                                    <option value="Human Resources" <?php if ($job_category === 'Human Resources') echo 'selected'; ?>>Human Resources</option>
                                                    <option value="Construction and Skilled Trades" <?php if ($job_category === 'Construction and Skilled Trades') echo 'selected'; ?>>Construction and Skilled Trades</option>
                                                    <option value="Hospitality and Tourism" <?php if ($job_category === 'Hospitality and Tourism') echo 'selected'; ?>>Hospitality and Tourism</option>
                                                    <option value="Retail" <?php if ($job_category === 'Retail') echo 'selected'; ?>>Retail</option>
                                                    <option value="Manufacture and Production" <?php if ($job_category === 'Manufacture and Production') echo 'selected'; ?>>Manufacture and Production</option>
                                                    <option value="Legal" <?php if ($job_category === 'Legal') echo 'selected'; ?>>Legal</option>
                                                    <option value="Media and Communication" <?php if ($job_category === 'Media and Communication') echo 'selected'; ?>>Media and Communication</option>
                                                    <option value="Science and Research" <?php if ($job_category === 'Science and Research') echo 'selected'; ?>>Science and Research</option>
                                                    <option value="Art and Design" <?php if ($job_category === 'Art and Design') echo 'selected'; ?>>Art and Design</option>
                                                    <option value="Agriculture and Farming" <?php if ($job_category === 'Agriculture and Farming') echo 'selected'; ?>>Agriculture and Farming</option>
                                                    <option value="Government and Public Administration" <?php if ($job_category === 'Government and Public Administration') echo 'selected'; ?>>Government and Public Administration</option>
                                                    <option value="Transportation and Logistics" <?php if ($job_category === 'Transportation and Logistics') echo 'selected'; ?>>Transportation and Logistics</option>
                                                    <option value="Real Estate" <?php if ($job_category === 'Real Estate') echo 'selected'; ?>>Real Estate</option>
                                                    <option value="NonProfit and Social Services" <?php if ($job_category === 'NonProfit and Social Services') echo 'selected'; ?>>NonProfit and Social Services</option>
                                                    <option value="Insurance" <?php if ($job_category === 'Insurance') echo 'selected'; ?>>Insurance</option>
                                                    <option value="Fitness and Wellness" <?php if ($job_category === 'Fitness and Wellness') echo 'selected'; ?>>Fitness and Wellness</option>
                                                    <option value="Energy" <?php if ($job_category === 'Energy') echo 'selected'; ?>>Energy</option>
                                                    <option value="Consulting" <?php if ($job_category === 'Consulting') echo 'selected'; ?>>Consulting</option>
                                                    <option value="Security and Law Enforcement" <?php if ($job_category === 'Security and Law Enforcement') echo 'selected'; ?>>Security and Law Enforcement</option>
                                                    <option value="Writing and Editing" <?php if ($job_category === 'Writing and Editing') echo 'selected'; ?>>Writing and Editing</option>
                                                    <option value="Performing Arts" <?php if ($job_category === 'Performing Arts') echo 'selected'; ?>>Performing Arts</option>
                                                    <option value="Sports" <?php if ($job_category === 'Sports') echo 'selected'; ?>>Sports</option>
                                                    <option value="Telecommunications" <?php if ($job_category === 'Telecommunications') echo 'selected'; ?>>Telecommunications</option>
                                                    <option value="Personal Care and Beauty Services" <?php if ($job_category === 'Personal Care and Beauty Services') echo 'selected'; ?>>Personal Care and Beauty Services</option>
                                                    <option value="Digital Marketing" <?php if ($job_category === 'Digital Marketing') echo 'selected'; ?>>Digital Marketing</option>
                                                    <option value="Journalism" <?php if ($job_category === 'Journalism') echo 'selected'; ?>>Journalism</option>
                                                </select>
                                                <div class="invalid-feedback">Please, pick a job category!</div>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <label for="yourEmail" class="form-label">Company Email</label>
                                            <div class="input-group ">
                                                <span class="input-group-text" id="basic-addon1"><i class="bi bi-envelope-at"></i></span>
                                                <input type="email" name="company_email" class="form-control" id="yourEmail" value="<?= $email ?>" required>
                                                <div class="invalid-feedback">Please, enter your email!</div>

                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <label for="yourPhoneNumber" class="form-label">Phone Number</label>
                                            <div class="input-group ">
                                                <span class="input-group-text" id="basic-addon1"><i class="bi bi-telephone"></i></span>
                                                <input type="tel" name="company_phone" class="form-control" id="yourphoneNumber" value="<?= $phone ?>" required>
                                                <div class="invalid-feedback">Please, enter your phone number!</div>

                                            </div>
                                        </div>

                                        <div class="col-12 input-box mb-3">
                                            <label class="label-text">Password</label>
                                            <div class="input-group">
                                                <span class="input-group-text" id="basic-addon1"><i class="bi bi-lock"></i></span>
                                                <input class="form-control" type="password" aria-describedby="toggle-password " name="unhashed_password" placeholder="password" value="<?= $unhashed_password ?>" required>
                                                <span class=" input-group-text" id="toggle-password basic-addon1">
                                                    <i class="bi bi-eye-slash" id="toggle-icon"></i>
                                                </span>
                                                <div class="invalid-feedback">Please, enter your password!</div>

                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <button class="btn btn-primary w-100" name="submit" type="submit">Create Account</button>
                                        </div>
                                        <div class="col-12 ">
                                            <p class="small mb-0 text-center">Already have an account? <a href="login.php">Log in</a></p>
                                            <p class="small mb-0 text-center">Not an employer? <a href="register.php">SignUp as an applicant</a></p>
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

</body>

</html>