<?php

include 'inc/header/header.php';
$user = $passwordErr = $password_change = $userUpdate = $imageErr = '';
$profileImage = $detail->image;
if (isset($_POST['updateProfile'])) {
  $image = $_FILES['profileImage'];
  $imageName = $image['name'];
  $imageTemp = $image['tmp_name'];
  $imageDir = 'assets/images/' . $imageName;
  $imageSplit = explode('.', $imageName);
  $imageExt = strtolower(end($imageSplit));
  $acceptedExt = array('jpeg', 'jpg', 'png');
  if (in_array($imageExt, $acceptedExt)) {
    move_uploaded_file($imageTemp, $imageDir);
    $name = filter_input(INPUT_POST, 'fullName', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $about = filter_input(INPUT_POST, 'about', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $company = filter_input(INPUT_POST, 'company', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $job = filter_input(INPUT_POST, 'jobs', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $country = filter_input(INPUT_POST, 'country', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $address = filter_input(INPUT_POST, 'address', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $phone = filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $twitter = filter_input(INPUT_POST, 'twitter', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $facebook = filter_input(INPUT_POST, 'facebook', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $instagram = filter_input(INPUT_POST, 'instagram', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    $sql = "select * FROM technicians WHERE email = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$email]);
    $userCount = $stmt->rowCount();
    if ($userCount > 1) {
      $user = 1;
    } else {
      $sql = "UPDATE technicians SET about=?,image = ?, company=?,job=?,country=?,address=?,phoneNumber=?,email=?,twitter=?,facebook=?,instagram=? WHERE id = ?";
      $stmt = $pdo->prepare($sql);
      $stmt->execute([$about, $imageName, $company, $job, $country, $address, $phone, $email, $twitter, $facebook, $instagram, $userId]);
      $userUpdate = 1;
    }
  } else {
    $imageErr = "invalid file type";
  }
}
//Update Password
if (isset($_POST['changePassword'])) {
  $sql = "SELECT * FROM technicians WHERE id = ?";
  $stmt = $pdo->prepare($sql);
  $stmt->execute([$userId]);
  $detail = $stmt->fetch();
  $current_hashed_password = $detail->password;
  echo $current_hashed_password;
  $input_old_password = $_POST['password'];
  $input_new_password = $_POST['newpassword'];
  $confirm_password = $_POST['renewpassword'];
  $confirmPassword = password_verify($input_old_password, $current_hashed_password);
  if ($confirmPassword) {
    if ($confirm_password != $input_new_password) {
      $passwordErr = "your password does not match";
    } else {
      $hashed_password = password_hash($input_new_password, PASSWORD_DEFAULT);
      $sql = "UPDATE technicians SET password = ? WHERE id = ?";
      $stmt = $pdo->prepare($sql);
      $stmt->execute([$hashed_password, $userId]);
      $password_change = 1;
    }
  } else {
    $passwordErr = "incorrect password";
  }
}



?>
<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

  <ul class="sidebar-nav" id="sidebar-nav">

    <li class="nav-item">
      <?php
      if ($technician == 1) { ?>
        <a class="nav-link collapsed " href="technician_index.php">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      <?php } else { ?>
        <a class="nav-link collapsed " href="index.php">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      <?php }
      ?>
    </li><!-- End Dashboard Nav -->

    <li class="nav-item">
      <a class="nav-link" href="profile.php">
        <i class="bi bi-person"></i>
        <span>Profile</span>
      </a>
    </li><!-- End Profile Page Nav -->

    <li class="nav-item">
      <a class="nav-link collapsed" href="meetings.php">
        <i class="ri-building-4-line"></i>
        <span>Meetings</span>
      </a>
    </li><!-- End Meetings Page Nav -->

    <li class="nav-item">
      <a class="nav-link collapsed" href="jobs.php">
        <i class="bi bi-briefcase-fill"></i>
        <span>Jobs</span>
      </a>
    </li><!-- End Jobs Page Nav -->


    <li class="nav-item">
      <a class="nav-link collapsed" href="contact.php">
        <i class="bi bi-envelope"></i>
        <span>Help Desk</span>
      </a>
    </li><!-- End Help Desk Page Nav -->

    <li class="nav-item">
      <a class="nav-link collapsed" href="faq.php">
        <i class="bi bi-question-circle"></i>
        <span>F.A.Q</span>
      </a>
    </li><!-- End F.A.Q Page Nav -->

    <li class="nav-item">
      <a class="nav-link collapsed" href="logout.php">
        <i class="bi bi-box-arrow-in-right"></i>
        <span>Sign Out</span>
      </a>
    </li><!-- End Sign Out Page Nav -->



  </ul>

</aside><!-- End Sidebar-->
<main id="main" class="main">

  <div class="pagetitle">
    <h1>Profile</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
        <li class="breadcrumb-item active">Profile</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section profile">
    <?php
    if ($password_change) {
      echo '<div class="alert alert-success text-center alert-dismissible fade show" role="alert">
                          Password changed successfully
                          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                          
                        </div>  ';
    }
    if ($userUpdate) {
      echo '<div class="alert alert-success text-center alert-dismissible fade show" role="alert">
                          Your information has been updated
                          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>';
    }
    ?>
    <div class="row">
      <div class="col-xl-4">

        <div class="card">
          <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
            <img src="assets/<?= "images/$profileImage" ?>" onerror="this.src='assets/img/profile-img.jpg'" alt="Profile" class="" style="height:130px; width:130px;border-radius:50%;">
            <h2><?php echo $detail->name ?></h2>
            <h3><?php echo $detail->job ?></h3>
            <div class="social-links mt-2">
              <a href="<?php echo $detail->twitter ?>" class="twitter"><i class="bi bi-twitter"></i></a>
              <a href="<?php echo $detail->facebook ?>" class="facebook"><i class="bi bi-facebook"></i></a>
              <a href="<?php echo $detail->instagram ?>" class="instagram"><i class="bi bi-instagram"></i></a>
            </div>
          </div>
        </div>

      </div>

      <div class="col-xl-8">

        <div class="card">
          <div class="card-body pt-3">
            <!-- Bordered Tabs -->
            <ul class="nav nav-tabs nav-tabs-bordered">

              <li class="nav-item">
                <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Overview</button>
              </li>

              <li class="nav-item">
                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit Profile</button>
              </li>

              <li class="nav-item">
                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-settings">Create CV</button>
              </li>

              <li class="nav-item">
                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Change Password</button>
              </li>

            </ul>
            <div class="tab-content pt-2">

              <div class="tab-pane fade show active profile-overview" id="profile-overview">
                <h5 class="card-title">About</h5>
                <p class="small fst-italic"><?php echo $detail->about ?></p>

                <h5 class="card-title">Profile Details</h5>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label ">Full Name</div>
                  <div class="col-lg-9 col-md-8"><?php echo $name ?></div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Job</div>
                  <div class="col-lg-9 col-md-8"><?php echo $detail->job ?></div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Skills</div>
                  <div class="col-lg-9 col-md-8"></div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Experience</div>
                  <div class="col-lg-9 col-md-8">
                  </div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Phone</div>
                  <div class="col-lg-9 col-md-8"><?php echo $detail->phoneNumber ?></div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Email</div>
                  <div class="col-lg-9 col-md-8"><?php echo $detail->email ?></div>
                </div>
                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Country</div>
                  <div class="col-lg-9 col-md-8"><?php echo $detail->country ?></div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Address</div>
                  <div class="col-lg-9 col-md-8"><?php echo $detail->address ?></div>
                </div>



              </div>

              <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                <!-- Profile Edit Form -->
                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post" enctype="multipart/form-data">
                  <?php
                  if ($user) {
                    echo '<div class="alert alert-danger text-center alert-dismissible fade show" role="alert">
                          Account already exists!
                          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>';
                  }
                  ?>
                  <div class="row mb-3">
                    <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile Image</label>
                    <div class="col-md-8 col-lg-9">
                      <img src="assets/images/<?php echo $profileImage ?>" onerror="this.src='assets/img/profile-img.jpg'" alt="Profile Photo" class="rounded-circle" style="height:130px; width:130px;border-radius:50%;">
                      <div class="pt-2">
                        <input type="file" name="profileImage" class="form-control" id="">
                      </div>
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Full Name</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="fullName" type="text" class="form-control" id="fullName" value="<?php echo $detail->name ?>">
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="about" class="col-md-4 col-lg-3 col-form-label">About</label>
                    <div class="col-md-8 col-lg-9">
                      <textarea name="about" class="form-control" id="about" style="height: 100px"><?php echo $detail->about ?></textarea>
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="Skills" class="col-md-4 col-lg-3 col-form-label">Skills</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="skills" type="text" class="form-control" id="company" value="" placeholder="List your skills seperating them with a comma">
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="experience" class="col-md-4 col-lg-3 col-form-label">Experience</label>
                    <div class="col-md-8 col-lg-9">
                      <select name="" id="">
                        <option value="less than 1 year">Less than 1 year</option>
                        <option value="1 year">1 year</option>
                        <option value="2 years">2 years</option>
                        <option value="3 years">3 years</option>
                        <option value="3 years">4 years</option>
                        <option value="3 years">5 years</option>
                        <option value="3 years">3 years</option>
                      </select>
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="Job" class="col-md-4 col-lg-3 col-form-label">Job</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="job" type="text" class="form-control" id="Job" value="<?php echo $detail->job ?>">
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="Address" class="col-md-4 col-lg-3 col-form-label">Address</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="address" type="text" class="form-control" id="Address" value="<?php echo $detail->address ?>">
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="Phone" class="col-md-4 col-lg-3 col-form-label">Phone</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="phone" type="text" class="form-control" id="Phone" value="<?php echo $detail->phoneNumber ?>">
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="Email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="email" type="email" class="form-control" id="Email" value="<?php echo $detail->email ?>">
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="Twitter" class="col-md-4 col-lg-3 col-form-label">Twitter Profile</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="twitter" type="url" class="form-control" id="Twitter" value="<?php echo $detail->twitter ?>" placeholder="Enter your twitter profile link">
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="Facebook" class="col-md-4 col-lg-3 col-form-label">Facebook Profile</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="facebook" type="url" class="form-control" id="Facebook" placeholder="Enter your facebook profile link" value="<?php echo $detail->facebook ?>">
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="Instagram" class="col-md-4 col-lg-3 col-form-label">Instagram Profile</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="instagram" type="url" class="form-control" id="Instagram" placeholder="Enter your instagram profile link" value="<?php echo $detail->instagram ?>">
                    </div>
                  </div>

                  <div class="text-center">
                    <button type="submit" class="btn btn-primary" name="updateProfile">Save Changes</button>
                  </div>
                </form><!-- End Profile Edit Form -->

              </div>

              <div class="tab-pane fade pt-3" id="profile-settings">

              </div>

              <div class="tab-pane fade pt-3" id="profile-change-password">
                <!-- Change Password Form -->
                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
                  <div class="row mb-3">
                    <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Current Password</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="password" type="password" class="form-control" id="currentPassword">
                    </div>
                    <div class="error"><?php echo $passwordErr ?></div>
                  </div>

                  <div class="row mb-3">
                    <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">New Password</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="newpassword" type="password" class="form-control" id="newPassword">
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Re-enter New Password</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="renewpassword" type="password" class="form-control" id="renewPassword">
                    </div>
                  </div>

                  <div class="text-center">
                    <button type="submit" class="btn btn-primary " name="changePassword">Change Password</button>
                  </div>
                </form><!-- End Change Password Form -->

              </div>

            </div><!-- End Bordered Tabs -->

          </div>
        </div>

      </div>
    </div>
  </section>

</main><!-- End #main -->

<?php require 'inc/footer/footer.php'; ?>