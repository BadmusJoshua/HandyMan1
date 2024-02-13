<?php
require_once 'inc/header/employer-header.php';

//fetching other user details
$twitter = $detail->twitter;
$facebook = $detail->facebook;
$instagram = $detail->instagram;
$phone = $detail->phone;
$email = $detail->email;
$about = $detail->about;
$headquarter = $detail->headquarter;
$website = $detail->website;
$employee = $detail->employee_size;
$state = $detail->state;
$country = $detail->country;
$address = $detail->address;

$user = $passwordErr = $password_change = $userUpdate = $imageErr = '';
$profileImage = $detail->image;
if (isset($_POST['updateProfile'])) {
    $image = $_FILES['profileImage'];
    $imageName = $image[$userId . '-' . $userCategory . '-' . 'name'];
    $imageTemp = $image['tmp_name'];
    $imageDir = 'assets/uploads/companyLogo/' . $imageName;
    $imageSplit = explode('.', $imageName);
    $imageExt = strtolower(end($imageSplit));
    $acceptedExt = array('jpeg', 'jpg', 'png');
    if (in_array($imageExt, $acceptedExt)) {
        move_uploaded_file($imageTemp, $imageDir);
    } else {
        $imageErr = "invalid file type";
    }
    $name = filter_input(INPUT_POST, 'company_name', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $about = filter_input(INPUT_POST, 'about', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $company = filter_input(INPUT_POST, 'company', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $job = filter_input(INPUT_POST, 'job_category', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $country = filter_input(INPUT_POST, 'country', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $headquarter = filter_input(INPUT_POST, 'headquarter', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $phone = filter_input(INPUT_POST, 'company_phone', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $email = filter_input(INPUT_POST, 'company_email', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $twitter = filter_input(INPUT_POST, 'company_twitter', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $facebook = filter_input(INPUT_POST, 'company_facebook', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $instagram = filter_input(INPUT_POST, 'company_instagram', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    $sql = "select * FROM employers WHERE email = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$email]);
    $userCount = $stmt->rowCount();
    if ($userCount > 1) {
        $user = 1;
    } else {
        $sql = "UPDATE employers SET about=?,image = ?, job_category=?,country=?,address=?,phone=?,email=?,twitter=?,facebook=?,instagram=? WHERE id = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$about, $imageName, $company, $job, $country, $address, $phone, $email, $twitter, $facebook, $instagram, $userId]);
        $userUpdate = 1;
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
            <a class="nav-link collapsed " href="employer-index.php">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li><!-- End Dashboard Nav -->

        <li class="nav-item">
            <a class="nav-link" href="employer-profile.php">
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
                <li class="breadcrumb-item"><a href="employer-index.php">Home</a></li>
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
                        <h2><?= $name ?></h2>
                        <h3><?= $job ?></h3>
                        <div class="social-links mt-2">
                            <a href="" class="twitter"><i class="bi bi-twitter"></i><?= $twitter ?></a>
                            <a href="" class="facebook"><i class="bi bi-facebook"><?= $facebook ?></i></a>
                            <a href="" class="instagram"><i class="bi bi-instagram"></i><?= $instagram ?></a>
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
                                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-settings">Reviews</button>
                            </li>

                            <li class="nav-item">
                                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Change Password</button>
                            </li>

                        </ul>
                        <div class="tab-content pt-2">

                            <div class="tab-pane fade show active profile-overview" id="profile-overview">

                                <h5 class="card-title">Profile Details</h5>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label ">Company Name</div>
                                    <div class="col-lg-9 col-md-8"><?= $name; ?></div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">About</div>
                                    <div class="col-lg-9 col-md-8">
                                        <p class="small fst-italic"><?= $about ?></p>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Headquarters</div>
                                    <div class="col-lg-9 col-md-8"><?php if ((!empty($state)) && (!empty($country))) {
                                                                        echo "$state . ',' . $country ";
                                                                    } ?></div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Industry</div>
                                    <div class="col-lg-9 col-md-8"><?= $job ?></div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Employee Size</div>
                                    <div class="col-lg-9 col-md-8"><?= $employee ?>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Posted Jobs</div>
                                    <div class="col-lg-9 col-md-8"></div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Phone</div>
                                    <div class="col-lg-9 col-md-8"><?= $phone ?></div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Email</div>
                                    <div class="col-lg-9 col-md-8"><?= $email ?></div>
                                </div>


                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Website</div>
                                    <div class="col-lg-9 col-md-8"><?= $website ?></div>
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
                                        <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Company Name</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="name" type="text" class="form-control" id="name" value="<?= $name ?>">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="about" class="col-md-4 col-lg-3 col-form-label">About</label>
                                        <div class="col-md-8 col-lg-9">
                                            <textarea name="about" class="form-control" id="about" style="height: 100px"><?= $about ?></textarea>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="about" class="col-md-4 col-lg-3 col-form-label">Headquarter</label>
                                        <div class="col-md-8 col-lg-9">
                                            <textarea name="headquarter" class="form-control" id="about" style="height: 100px"><?= $headquarter ?></textarea>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="Job" class="col-md-4 col-lg-3 col-form-label">Industry</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="job" type="text" class="form-control" id="Job" value="<?= $job ?>">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="Job" class="col-md-4 col-lg-3 col-form-label">Employee Size</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="employee-size" type="number" class="form-control" id="Job" value="<?= $employee ?>">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="Phone" class="col-md-4 col-lg-3 col-form-label">Phone</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="phone" type="text" class="form-control" id="Phone" value="<?= $phone ?>">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="Email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="email" type="email" class="form-control" id="Email" value="<?= $email ?>">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="Twitter" class="col-md-4 col-lg-3 col-form-label">Website</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="website" type="url" class="form-control" id="Twitter" value="<?= $website ?>" placeholder="Enter your company's website link">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="Twitter" class="col-md-4 col-lg-3 col-form-label">Twitter Profile</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="twitter" type="url" class="form-control" id="Twitter" value="<?= $twitter ?>" placeholder="Enter your twitter profile link">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="Facebook" class="col-md-4 col-lg-3 col-form-label">Facebook Profile</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="facebook" type="url" class="form-control" id="Facebook" placeholder="Enter your facebook profile link" value="<?= $facebook ?>">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="Instagram" class="col-md-4 col-lg-3 col-form-label">Instagram Profile</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="instagram" type="url" class="form-control" id="Instagram" placeholder="Enter your instagram profile link" value="<?= $instagram ?>">
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