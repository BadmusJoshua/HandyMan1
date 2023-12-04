<?php
include 'inc/config/database.php';
$passwordErr = $userNotFound = "";

//checking if cookie exists
if (isset($_COOKIE['remember_me'])) {
  list($userId, $userCategory, $token) = explode(':', $_COOKIE['remember_me']);

  $sql = "SELECT * FROM remember_me_tokens WHERE id = ?, category = ? AND token = ?";
  $stmt = $pdo->prepare($sql);
  $stmt->execute([$userId, $userCategory, $token]);
  $row = $stmt->fetch();
  $expire_date = strtotime($row->expires_at);

  //checking validity of token and if user is an applicant
  if ($row && (time() < $expire_date) && ($userCategory === 1)) {
    session_start();
    $_SESSION['id'] = $userId;
    header("Location: index.php");
    //checking validity of token and if user is an employer
  } elseif ($row && (time() < $expire_date) && ($userCategory === 2)) {
    session_start();
    $_SESSION['id'] = $userId;
    header("Location: employer-index.php");
  } else {
    echo "your token has expired, you need to sign in again";
  }
}

if (isset($_POST['login'])) {
  $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
  $input_password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
  //checks if the username belongs to an applicant
  $sql = "select * FROM applicants WHERE email = ?";
  $stmt = $pdo->prepare($sql);
  $stmt->execute([$email]);
  $is_applicant = $stmt->rowCount();
  // if username belongs to a technician
  if ($is_applicant > 0) {
    $detail = $stmt->fetch();
    $hashed_password = $detail->password;
    $userId = $detail->id;
    $userCategory = $detail->category;
    //confirming password
    $confirm_password = password_verify($input_password, $hashed_password);
    //if password match
    if ($confirm_password) {
      //saving the id in a session
      session_start();
      $_SESSION['id'] = $userId;

      //if user choses to be remembered
      if (isset($_POST['remember'])) {
        $token = bin2hex(random_bytes(16)); // Generate a random 16-byte token
        $userId = $_SESSION['id']; // Get the user's ID from the database

        // Store the token and expiration time in a database table
        $sql = "INSERT INTO remember_me_tokens (id, token, expires_at, category) VALUES (?, ?,?,?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$userId, $token, date('Y-m-d H:i:s', strtotime("+30 days")), $userCategory]);

        //setting cookie on the user browser
        $cookieValue = $userId . ':' . $userCategory  . ':' . $token;
        //set cookie
        setcookie('remember_me', $cookieValue, time() + 86400 * 30);
      }
      // redirects to applicant dashboard
      header("Location: applicant-index.php");
    } else {
      $passwordErr = 1;
    }
    // 
  } else {
    $sql = "select * FROM employers WHERE email = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$email]);
    $is_employer = $stmt->rowCount();
    // if username belongs to an
    if ($is_employer > 0) {
      $detail = $stmt->fetch();
      $hashed_password = $detail->password;
      $userId = $detail->id;
      $userCategory = $detail->category;
      //confirming password
      $confirm_password = password_verify($input_password, $hashed_password);

      //if password match
      if ($confirm_password) {

        //saving the id in a session
        session_start();
        $_SESSION['id'] = $userId;

        //if user choses to be remembered
        if (isset($_POST['remember'])) {
          $token = bin2hex(random_bytes(16)); // Generate a random 16-byte token
          $userId = $_SESSION['id']; // Get the user's ID from the database

          // Store the token and expiration time in a database table
          $sql = "INSERT INTO remember_me_tokens (id, token, expires_at, category) VALUES (?, ?,?, ?)";
          $stmt = $pdo->prepare($sql);
          $stmt->execute([$userId, $token, date('Y-m-d H:i:s', strtotime("+30 days")), $userCategory]);
          //setting cookie on the user browser
          $cookieValue = $userId . ':' . $userCategory . ':' . $userCategory . ':' . $token;
          //set cookie
          setcookie('remember_me', $cookieValue, time() + 86400 * 30);
        }
        // redirects to employer dashboard
        header("Location: employer-index.php");
      } else {
        $passwordErr = 1;
      }
    } else {
      $userNotFound = 1;
    }
  }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Jobcrest || The best job openings</title>
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
            <div class="col-lg-10 col-md-6 d-flex flex-column align-items-center justify-content-center">

              <div class="d-flex justify-content-center py-4">
                <a href="index.html" class="logo d-flex align-items-center w-auto">
                  <img src="assets/img/logo.png" alt="">
                  <span class=" d-lg-block">Jobcrest</span>
                </a>
              </div>

              <div class="card mb-3">

                <div class="card-body">

                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Login to Your Account</h5>
                    <p class="text-center small">Enter your email & password to login</p>
                  </div>

                  <form class="row g-3 needs-validation" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" novalidate>
                    <?php
                    if ($userNotFound) {
                      echo '<div class="alert alert-danger text-center alert-dismissible fade show" role="alert">
                          Account doesn/t exist!
                          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>';
                    }
                    if ($passwordErr == 1) {
                      echo ' <div class="invalid-feedback">Incorrect Password</div>';
                    }

                    ?>
                    <div class="col-12">
                      <label for="yourUsername" class="form-label">Email</label>
                      <div class="input-group has-validation">
                        <span class="input-group-text" id="basic-addon1"><i class="bi bi-envelope-at"></i></span>
                        <input type="text" name="email" class="form-control" id="yourEmail" required>
                        <div class="invalid-feedback">Please enter your email.</div>
                      </div>
                    </div>

                    <div class="col-12">
                      <label for="yourPassword" class="form-label">Password</label>
                      <div class="input-group has-validation">
                        <span class="input-group-text" id="basic-addon1"><i class="bi bi-lock"></i></span>
                        <input type="password" name="password" class="form-control" id="yourPassword" required>
                        <div class="invalid-feedback">Please enter your password!</div>
                      </div>


                      <div class="col-12">
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" name="remember" value="true" id="rememberMe">
                          <label class="form-check-label" for="rememberMe">Remember me</label>
                        </div>
                        <div class="align-content-right ">
                          <a href="forgot_password.php" class="text-decoration-none">Forgot Password?</a>
                        </div>
                      </div>
                      <div class="col-12">
                        <button class="btn btn-primary w-100" name="login" type="submit">Login</button>
                      </div>
                      <div class="col-12">
                        <p class="small mb-0 text-center">Don't have account? <a href="register.php">Create an applicant account</a>&nbsp;
                          <a href="employer-signup.php">Create an employer's account</a>
                        </p>
                      </div>
                  </form>

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