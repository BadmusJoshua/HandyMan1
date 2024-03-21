<?php
include 'inc/header/employer-header.php';

//get applicant id
if (isset($_GET['applicantId'])) {
    $applicantId = $_GET['applicantId'];

    //check if applicant id is valid
    $sql = "SELECT * FROM applicants WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    if ($stmt) {
        $stmt->execute([$applicantId]);
        $applicant_count = $stmt->rowCount();
        if ($applicant_count == 1) {
            $applicant_details = $stmt->fetch();
        } else {
            //redirect to manage-applicants page
            header("Location: employer_manage_applicants.php");
        }
    } else {
        echo "Error: Unable to prepare statement.";
    }
} else
    //redirect to manage-applicants page
    header("Location: employer_manage_applicants.php");

?>
<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link collapsed" href="employer-index.php">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li><!-- End Dashboard Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="employer-applicant-profile.php">
                <i class="bi bi-person"></i>
                <span>Profile</span>
            </a>
        </li><!-- End Profile Page Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="employer-post-new-job.php">
                <i class="bi bi-journal-plus"></i>
                <span>Post New Job</span>
            </a>
        </li><!-- End Post New Job Page Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="employer-manage-jobs.php">
                <i class="bi bi-briefcase-fill"></i>
                <span>Manage Jobs</span>
            </a>
        </li><!-- End Manage Jobs Page Nav -->

        <li class="nav-item">
            <a class="nav-link " href="employer-manage-applicants.php">
                <i class="bi bi-envelope"></i>
                <span>Manage Applicants</span>
            </a>
        </li><!-- End Contact Page Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="logout.php">
                <i class="bi bi-box-arrow-in-right"></i>
                <span>Sign Out</span>
            </a>
        </li><!-- End suggestion in Page Nav -->

    </ul>

</aside><!-- End Sidebar-->
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Applicant Profile</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="employer-index.php">Home</a></li>
                <li class="breadcrumb-item active">Applicant Profile</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section profile">

        <div class="row">
            <div class="col-xl-4">
                <div class="card">
                    <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
                        <img src="<?= "$applicant_details->image" ?>" onerror="this.src='assets/img/profile-img.jpg'" alt="Profile" class="" style="height:130px; width:180px;border-radius:50%;">
                        <h2 class="text-center"><?php echo $applicant_details->name ?></h2>
                        <h3><?php echo $applicant_details->job ?></h3>
                        <div class="social-links mt-2">
                            <a href="<?php echo $applicant_details->twitter ?>" class="twitter"><i class="bi bi-twitter"></i></a>
                            <a href="<?php echo $applicant_details->facebook ?>" class="facebook"><i class="bi bi-facebook"></i></a>
                            <a href="<?php echo $applicant_details->instagram ?>" class="instagram"><i class="bi bi-instagram"></i></a>
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

                        </ul>
                        <div class="tab-content pt-2">

                            <div class="tab-pane fade show active profile-overview" id="profile-overview">

                                <h5 class="card-title">Applicant Details</h5>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Company Name</div>
                                    <div class="col-lg-9 col-md-8"><?php echo $applicant_details->name ?></div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Experience</div>
                                    <div class="col-lg-9 col-md-8"><?= $applicant_details->experience ?></div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Skill</div>
                                    <div class="col-lg-9 col-md-8"><?= $applicant_details->skill ?></div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Location</div>
                                    <div class="col-lg-9 col-md-8"><?php if ((!empty($applicant_details->state)) && (!empty($applicant_details->country))) {
                                                                        echo "$applicant_details->state, $applicant_details->country ";
                                                                    } ?></div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Address</div>
                                    <div class="col-lg-9 col-md-8"><?= $applicant_details->address ?></div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Job Applications</div>
                                    <div class="col-lg-9 col-md-8">
                                        <?php
                                        //sql to get number of jobs applied for
                                        $sql = "SELECT * FROM applications WHERE applicantId = ?";
                                        $stmt = $pdo->prepare($sql);
                                        if ($stmt) {
                                            $stmt->execute([$applicant_details->id]);
                                            $job_count = $stmt->rowCount();
                                            echo $job_count;
                                        } else {
                                            echo "Error: Unable to Prepare Statement";
                                        }
                                        ?>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Phone</div>
                                    <div class="col-lg-9 col-md-8"><?= $applicant_details->phone ?></div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Email</div>
                                    <div class="col-lg-9 col-md-8"><?= $applicant_details->email ?></div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Website</div>
                                    <div class="col-lg-9 col-md-8"><?= $applicant_details->website ?></div>
                                </div>

                            </div>

                        </div><!-- End Bordered Tabs -->

                    </div>
                </div>

            </div>
        </div>


        </div>
    </section>

</main><!-- End #main -->

<?php require 'inc/footer/footer.php'; ?>