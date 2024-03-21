<?php include 'inc/header/employer-header.php';

require 'inc/config/mailer-config.php';

//Decline Application
if (isset($_POST['Decline'])) {
    $applicationId = $_POST['applicationId'];
    $email = $_POST['applicantEmail'];
    $sql = "UPDATE applications SET status =? WHERE id=?";
    $stmt = $pdo->prepare($sql);
    if ($stmt) {
        $stmt->execute(['1', $applicationId]);

        $subject = 'Application Declined';
        $message = "<div style='width:80%;border:1px solid black; margin:auto;padding:10px;'>Your application for the role of a $jobTitle with $name has been declined. We wish you best of luck '</div>";
        sendMail($email, $subject, $message);
    } else {
        echo "Error: Unable to Prepare Statement";
    }
}

//Accept Application
if (isset($_POST['Accept'])) {
    $applicationId = $_POST['applicationId'];
    $sql = "UPDATE applications SET status =? WHERE id= ?";
    $stmt = $pdo->prepare($sql);
    if ($stmt) {
        $stmt->execute(['2', $applicationId]);

        sendMail($email, $subject, $response);
        if (!$mail->send()) {
            $unsent = 1;
        } else {
            $subject = 'Application Approved';
            $message = "<div style='width:80%;border:1px solid black; margin:auto;padding:10px;'>Your application for the role of a $jobTitle with $name has been approved. We wish you best of luck '</div>";
            sendMail($email, $subject, $message);

            $sent = 1;
        }
    } else {
        echo "Error: Unable to Prepare Statement";
    }
}

//Hire Applicant
if (isset($_POST['Hire'])) {
    $applicationId = $_POST['applicationId'];
    $sql = "UPDATE applications SET status =? WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    if ($stmt) {
        $stmt->execute(['3', $applicationId]);

        sendMail($email, $subject, $response);
        if (!$mail->send()) {
            $unsent = 1;
        } else {
            $subject = 'You have been Hired!';
            $message = "<div style='width:80%;border:1px solid black; margin:auto;padding:10px;'>You have been hired based on your application for the role of a $jobTitle with $name. Congratulations! We wish you best of luck. '</div>";
            sendMail($email, $subject, $message);
            $sent = 1;
        }
    } else {
        echo "Error: Unable to Prepare Statement";
    }
}

//view job applications
if (isset($_GET['employerId'])) {
    $employerId = $_GET['employerId'];

    if (isset($_GET['jobId'])) {
        $jobId = $_GET['jobId'];
    }

    //check if this user posted this job
    if ($employerId == $userId) {
        $sql = "SELECT * FROM applications WHERE jobId = ? AND employerId = ?";
        $stmt = $pdo->prepare($sql);
        if ($stmt) {
            $stmt->execute([$jobId, $employerId]);
            $jobApplications = $stmt->fetchAll();
        } else {
            echo "Error:Unable to Prepare Statement";
        }
    } else {
        // return to manage jobs page
        // ("Location: employer-manage-jobs.php");
    };
}

//sql to fetch count of applicants for jobs posted by this employee
$sql = "SELECT * FROM applications WHERE employerId = ?";
$stmt = $pdo->prepare($sql);

if ($stmt) {
    $stmt->execute([$userId]);
    $applicantCount = $stmt->rowCount();
    $applicationDetail = $stmt->fetchAll();
} else {
    echo "Error: Unable to prepare statement.";
}
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
        <h1>Manage Applicants</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="employer-index.php">Home</a></li>
                <li class="breadcrumb-item active">Manage Applicants</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->


    <div class="row mt-5">
        <div class="col-lg-12">
            <div class="billing-form-item">
                <div class="billing-title-wrap">
                    <h3 class="widget-title pb-0"><?= $applicantCount ?> Candidates</h3>
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
                                        //sql to get applicant details
                                        $sql = "SELECT * FROM applicants WHERE id= ?";
                                        $stmt = $pdo->prepare($sql);
                                        if ($stmt) {
                                            $stmt->execute([$applicationInfo->applicantId]);
                                            $details = $stmt->fetch();
                                        } else {
                                            echo "Error: Unable to Prepare Statement";
                                        }
                                        ?>

                                        <a href="view_applicant_profile.php?applicantId=<?= $applicationInfo->applicantId ?>" class="d-block">
                                            <img src="<?= $details->image ?>" onerror="this.src='assets/img/profile-img.jpg'" alt="">
                                        </a>
                                    </div>
                                    <div class="manage-candidate-content">
                                        <h2 class="widget-title pb-2"><a href="view_applicant_profile.php?applicantId=<?= $applicationInfo->applicantId ?>" class="color-text-2"><?= $details->name ?></a></h2>
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
                                                    <span class="pill bg-primary font-size-14 rounded-pill text-white p-2">Accepted</span>

                                                <?php } else { ?>
                                                    <span class="pill bg-success font-size-14 rounded-pill text-white p-2">Hired</span>

                                                <?php }
                                                ?> </span>

                                        </div>
                                        </p>
                                    </div><!-- end manage-candidate-content -->
                                </div>
                                <div class="bread-action">

                                    <ul class="info-list">

                                        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
                                            <input type="hidden" name="applicationId" value="<?= $applicationInfo->id ?>">
                                            <input type="hidden" name="applicantEmail" value="<?= $details->email ?>">
                                            <input type="hidden" name="applicantEmail" value="<?= $application->jobTitle ?>">
                                            <input type="hidden" name="applicantEmail" value="<?= $details->email ?>">

                                            <li class="d-inline-block mb-0"> <button class="outline-0 border-0 btn-light" style="border-radius:50%;"><a href="employer-manage-applicants.php?applicationStatus=1"><i class="la la-cloud-download" data-toggle="tooltip" data-placement="top" title="Download CV"></i></a></button> </li>

                                            <li class="d-inline-block mb-0"><button class="outline-0 border-0 btn-light" name="Decline" style="border-radius:50%;"><i class="la la-remove" data-toggle="tooltip" data-placement="top" title="Decline"></i></button></li>

                                            <li class="d-inline-block mb-0"><button class="outline-0 border-0 btn-light" name="Accept" style="border-radius:50%;"><i class="la la-check" data-toggle="tooltip" data-placement="top" title="Accept"></i></button></li>

                                            <li class="d-inline-block mb-0"><button class="outline-0 border-0 btn-light" style="border-radius:50%;" data-toggle="tooltip" data-placement="top" title="Send Email"><a href="mailto:<?= $details->email ?>"><i class="la la-envelope-o"></i></a></button></li>

                                            <li class="d-inline-block mb-0"><button class="outline-0 border-0 btn-light" name="Hire" style="border-radius:50%;"><i class="la la-briefcase" data-toggle="tooltip" data-placement="top" title="Hire"></i></button></li>
                                        </form>

                                    </ul>
                                </div>
                            </div><!-- end manage-candidate-wrap -->
                            <div class="section-block"></div>
                        <?php  }
                    } else { ?>
                        <div class="alert alert-danger text-center alert-dismissible fade show w-80 align-self-center" role="alert">
                            There are no applicants yet!
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