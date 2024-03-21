<?php include 'inc/header/applicant-header.php';






//sql to fetch count of applications for jobs by this applicant
$sql = "SELECT * FROM applications WHERE applicantId = ?";
$stmt = $pdo->prepare($sql);

if ($stmt) {
    $stmt->execute([$userId]);
    $applicationCount = $stmt->rowCount();
    $applicationDetail = $stmt->fetchAll();
} else {
    echo "Error: Unable to prepare statement.";
}
?>
<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link collapsed" href="applicant-index.php">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li><!-- End Dashboard Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="applicant-profile.php">
                <i class="bi bi-person"></i>
                <span>Profile</span>
            </a>
        </li><!-- End Profile Page Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="jobs.php">
                <i class="bi bi-briefcase-fill"></i>
                <span>Jobs</span>
            </a>
        </li><!-- End Jobs Page Nav -->

        <li class="nav-item">
            <a class="nav-link" href="applicant-applications.php">
                <i class="bi bi-briefcase-fill"></i>
                <span>Applications</span>
            </a>
        </li><!-- End Applications Page Nav -->

        <li class="nav-item">
            <div class="dropdown-center nav-link collapsed" style=" margin:0; padding:0; ">
                <button class="btn dropdown-toggle nav-link collapsed" type="button" data-bs-toggle="dropdown" aria-expanded="false" style="outline: none;
      box-shadow: none;" onfocus="this.blur()">
                    <i class="bi bi-patch-check"></i>&nbsp;Resumes
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item nav-link collapsed" href="upload-cv-and-coverletter.php">Upload CV and Cover letter</a></li>
                    <li><a class="dropdown-item nav-link collapsed" href="create-resume.php">Create Resume</a></li>
                </ul>
            </div>

        </li><!-- End Resumes Page Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="faq.php">
                <i class="bi bi-question-circle"></i>
                <span>F.A.Q</span>
            </a>
        </li><!-- End F.A.Q Page Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="contact.php">
                <i class="bi bi-envelope"></i>
                <span>Help Desk</span>
            </a>
        </li><!-- End Contact Page Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="logout.php">
                <i class="bi bi-box-arrow-in-right"></i>
                <span>Sign Out</span>
            </a>
        </li><!-- End suggestionin Page Nav -->
    </ul>

</aside><!-- End Sidebar-->

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Applications</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="employer-index.php">Home</a></li>
                <li class="breadcrumb-item active">Applications</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->


    <div class="row mt-5">
        <div class="col-lg-12">
            <div class="billing-form-item">
                <div class="billing-title-wrap">
                    <h3 class="widget-title pb-0"><?= $applicationCount ?> Application(s)</h3>
                    <div class="title-shape margin-top-10px"></div>
                </div><!-- billing-title-wrap -->
                <div class="billing-content pb-0">
                    <?php
                    if ($applicationDetail) {
                        foreach ($applicationDetail as $applicationInfo) {

                    ?>

                            <div class="manage-candidate-wrap d-flex align-items-center justify-content-between pb-4">
                                <div class="bread-details d-flex">
                                    <div class="bread-img flex-shrink-0">

                                        <?php
                                        //sql to get employer details
                                        $sql = "SELECT * FROM employers WHERE id= ?";
                                        $stmt = $pdo->prepare($sql);
                                        if ($stmt) {
                                            $stmt->execute([$applicationInfo->employerId]);
                                            $details = $stmt->fetch();
                                        } else {
                                            echo "Error: Unable to Prepare Statement";
                                        }
                                        ?>

                                        <a href="view_employer_profile.php?employerId=<?= $applicationInfo->employerId ?> " class="d-block">
                                            <?php
                                            //sql to get job details
                                            $sql = "SELECT * FROM jobs WHERE id= ?";
                                            $stmt = $pdo->prepare($sql);
                                            if ($stmt) {
                                                $stmt->execute([$applicationInfo->jobId]);
                                                $info = $stmt->fetch();
                                            } else {
                                                echo "Error: Unable to Prepare Statement";
                                            }
                                            ?>
                                            <img src="<?= $info->logo ?>" onerror="this.src='assets/img/icon/job-list1.png'" alt="">
                                        </a>
                                    </div>
                                    <div class="manage-candidate-content">
                                        <h2 class="widget-title pb-2"><a href="view_employer_profile.php?employerId=<?= $applicationInfo->employerId ?> " class="color-text-2"><?= $details->name ?></a></h2>
                                        <p class="font-size-15">
                                            <span class="mr-2"><i class="la la-envelope-o mr-1"></i><a href="mailto:<?= $details->email ?>" class="color-text-3"><?= $details->email ?></a></span>
                                            <span class="mr-2"><i class="la la-phone mr-1"></i><?= $details->phone ?></span>
                                        </p>
                                        <p class="mt-1 font-size-15">
                                            <span class="mr-2"><i class="la la-map mr-1"></i><?= $details->address ?></span>
                                        <div class="w-100 d-flex justify-content-between ">
                                            <span class="font-size-15">Applied for: <?= $applicationInfo->jobTitle ?> </span>
                                            <span class="font-size-14">Status: <?php
                                                                                if ($applicationInfo->status == 0) { ?>
                                                    <span class="pill bg-info font-size-14 rounded-pill text-white p-2">Pending</span>

                                                <?php } elseif ($applicationInfo->status == 1) { ?>
                                                    <span class="pill bg-danger font-size-14 rounded-pill text-white p-2">Declined</span>

                                                <?php } elseif ($applicationInfo->status == 2) { ?>
                                                    <span class="pill bg-secondary font-size-14 rounded-pill text-white p-2">Accepted</span>

                                                <?php } else { ?>
                                                    <span class="pill bg-success font-size-14 rounded-pill text-white p-2">Hired</span>

                                                <?php }
                                                ?> </span>

                                        </div>
                                        </p>
                                    </div><!-- end manage-candidate-content -->
                                </div>

                            </div><!-- end manage-application-wrap -->
                            <div class="section-block"></div>
                        <?php  }
                    } else { ?>
                        <div class="alert alert-danger text-center alert-dismissible fade show w-80 align-self-center" role="alert">
                            No applications yet!
                        </div>
                    <?php  }
                    ?>

                </div><!-- end billing-content -->
            </div><!-- end billing-form-item -->
        </div><!-- end col-lg-12 -->
    </div><!-- end row -->

    <div class="row">
</main>
<?php include 'inc/footer/footer.php'; ?>