<?php

include 'inc/header/applicant-header.php';

$jobType = $gender = $experience = $industry = $careerLevel = $qualification = $queryJobs = $output = $applied = "";


function timeAgo($date)
{
    $dateTime = new DateTime($date);
    $currentDate = new DateTime();

    $interval = $dateTime->diff($currentDate);

    $output = "";

    if ($interval->y) {
        $output .= $interval->y . " years ";
    }
    if ($interval->m) {
        $output .= $interval->m . " months ";
    }
    if ($interval->d) {
        $output .= $interval->d . " days ";
    }
    if ($interval->h) {
        $output .= $interval->h . " hours ";
    }
    if ($interval->i) {
        $output .= $interval->i . " minutes ";
    }
    if ($interval->s) {
        $output .= $interval->s . " seconds ";
    }

    $output .= "ago";

    return $output;
}

//process application
if (isset($_POST['apply'])) {
    echo "applied";

    // $applicantId = $_POST['applicantId'];
    $applicantId = filter_input(INPUT_POST, 'applicantId', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $employerId = filter_input(INPUT_POST, 'employerId', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $jobId = filter_input(INPUT_POST, 'jobId', FILTER_SANITIZE_FULL_SPECIAL_CHARS);



    echo $applicantId . '-' . $employerId . '-' . $jobId;

    // $sql = "INSERT INTO applications (applicantId, employerId, jobId ) VALUES (?,?,?) ";
    // $stmt = $pdo->prepare($sql);
    // if ($stmt) {
    //     $stmt->execute([$applicantId, $employerId, $jobId]);
    //     $applied = 1;
    // } else {
    //     echo "Error: Unable to prepare statement.";
    // }

}

//SQL to filter jobs
if (isset($_GET['jobTitle'])) {
    $jobTitle = $_GET['jobTitle'];

    $sql = "SELECT * FROM jobs WHERE jobTitle LIKE '%$jobTitle%' ";
    $stmt = $pdo->prepare($sql);
    if ($stmt) {
        $stmt->execute([]);
        $jobCount = $stmt->rowCount();
        $queryJobs = $stmt->fetchAll();
    } else {
        echo "Error: Unable to prepare statement.";
    }
} elseif (isset($_GET['qualification'])) {
    $qualification = $_GET['qualification'];

    $sql = "SELECT * FROM jobs WHERE qualification LIKE '%$qualification%' ";
    $stmt = $pdo->prepare($sql);
    if ($stmt) {
        $stmt->execute([]);
        $jobCount = $stmt->rowCount();
        $queryJobs = $stmt->fetchAll();
    } else {
        echo "Error: Unable to prepare statement.";
    };
} elseif (isset($_GET['skills'])) {
    $skill = $_GET['skills'];

    $sql = "SELECT * FROM jobs WHERE skill LIKE '%$skills%' ";
    $stmt = $pdo->prepare($sql);
    if ($stmt) {
        $stmt->execute([]);
        $jobCount = $stmt->rowCount();
        $queryJobs = $stmt->fetchAll();
    } else {
        echo "Error: Unable to prepare statement.";
    };
} elseif (isset($_GET['skills'])) {
    $skill = $_GET['skills'];

    $sql = "SELECT * FROM jobs WHERE skill LIKE '%$skills%' ";
    $stmt = $pdo->prepare($sql);
    if ($stmt) {
        $stmt->execute([]);
        $jobCount = $stmt->rowCount();
        $queryJobs = $stmt->fetchAll();
    } else {
        echo "Error: Unable to prepare statement.";
    };
} elseif (isset($_GET['experience'])) {
    $experience = $_GET['experience'];

    $sql = "SELECT * FROM jobs WHERE experience LIKE '%$experience%' ";
    $stmt = $pdo->prepare($sql);
    if ($stmt) {
        $stmt->execute([]);
        $jobCount = $stmt->rowCount();
        $queryJobs = $stmt->fetchAll();
    } else {
        echo "Error: Unable to prepare statement.";
    };
} elseif (isset($_GET['jobType'])) {
    $jobType = $_GET['jobType'];

    $sql = "SELECT * FROM jobs WHERE jobType LIKE '%$jobType%' ";
    $stmt = $pdo->prepare($sql);
    if ($stmt) {
        $stmt->execute([]);
        $jobCount = $stmt->rowCount();
        $queryJobs = $stmt->fetchAll();
    } else {
        echo "Error: Unable to prepare statement.";
    };
} elseif (isset($_GET['careerLevel'])) {
    $careerLevel = $_GET['careerLevel'];

    $sql = "SELECT * FROM jobs WHERE careerLevel LIKE '%$careerLevel%' ";
    $stmt = $pdo->prepare($sql);
    if ($stmt) {
        $stmt->execute([]);
        $jobCount = $stmt->rowCount();
        $queryJobs = $stmt->fetchAll();
    } else {
        echo "Error: Unable to prepare statement.";
    };
} elseif (isset($_GET['industry'])) {
    $industry = $_GET['industry'];

    $sql = "SELECT * FROM jobs WHERE industry LIKE '%$industry%' ";
    $stmt = $pdo->prepare($sql);
    if ($stmt) {
        $stmt->execute([]);
        $jobCount = $stmt->rowCount();
        $queryJobs = $stmt->fetchAll();
    } else {
        echo "Error: Unable to prepare statement.";
    };
} elseif (isset($_GET['state'])) {
    $state = $_GET['state'];

    $sql = "SELECT * FROM jobs WHERE state LIKE '%$state%' ";
    $stmt = $pdo->prepare($sql);
    if ($stmt) {
        $stmt->execute([]);
        $jobCount = $stmt->rowCount();
        $queryJobs = $stmt->fetchAll();
    } else {
        echo "Error: Unable to prepare statement.";
    };
} elseif (isset($_GET['country'])) {
    $country = $_GET['country'];

    $sql = "SELECT * FROM jobs WHERE country LIKE '%$country%' ";
    $stmt = $pdo->prepare($sql);
    if ($stmt) {
        $stmt->execute([]);
        $jobCount = $stmt->rowCount();
        $queryJobs = $stmt->fetchAll();
    } else {
        echo "Error: Unable to prepare statement.";
    };
} elseif (isset($_GET['minOffer'])) {
    $minOffer = $_GET['minOffer'];

    $sql = "SELECT * FROM jobs WHERE minOffer LIKE '%$minOffer%' ";
    $stmt = $pdo->prepare($sql);
    if ($stmt) {
        $stmt->execute([]);
        $jobCount = $stmt->rowCount();
        $queryJobs = $stmt->fetchAll();
    } else {
        echo "Error: Unable to prepare statement.";
    };
} elseif (isset($_GET['maxOffer'])) {
    $maxOffer = $_GET['maxOffer'];

    $sql = "SELECT * FROM jobs WHERE maxOffer LIKE '%$maxOffer%' ";
    $stmt = $pdo->prepare($sql);
    if ($stmt) {
        $stmt->execute([]);
        $jobCount = $stmt->rowCount();
        $queryJobs = $stmt->fetchAll();
    } else {
        echo "Error: Unable to prepare statement.";
    };
} elseif (isset($_GET['status'])) {
    $status = $_GET['status'];

    $sql = "SELECT * FROM jobs WHERE status LIKE '%$status%' ";
    $stmt = $pdo->prepare($sql);
    if ($stmt) {
        $stmt->execute([]);
        $jobCount = $stmt->rowCount();
        $queryJobs = $stmt->fetchAll();
    } else {
        echo "Error: Unable to prepare statement.";
    };
} else {
    //SQL to get job count
    $sql = "SELECT * FROM jobs ORDER BY created_at ASC";
    $stmt = $pdo->prepare($sql);
    if ($stmt) {
        $stmt->execute([]);
    } else {
        echo "Error: Unable to prepare statement.";
    }
    $jobCount = $stmt->rowCount();
    $jobs = $stmt->fetchAll();
}
?>
<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">

            <a class="nav-link collapsed " href="applicant-index.php">
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
            <a class="nav-link collapsed" href="meetings.php">
                <i class="ri-building-4-line"></i>
                <span>Meetings</span>
            </a>
        </li><!-- End Meetings Page Nav -->

        <li class="nav-item">
            <a class="nav-link" href="jobs.php">
                <i class="bi bi-briefcase-fill"></i>
                <span>Jobs</span>
            </a>
        </li><!-- End Jobs Page Nav -->

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
        <h1>Jobs</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item active">Jobs</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section profile">
        <!-- Job List Area Start -->
        <div class="job-listing-area">
            <div class="container">
                <div class="row">

                    <!-- Right content -->
                    <div class="col-xl-9 col-lg-9 col-md-8">
                        <!-- Featured_job_start -->
                        <section class="featured-job-area">
                            <div class="container">
                                <!-- Count of Job list Start -->
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="count-job mb-35 text-center">
                                            <?php if ($jobCount) { ?>
                                                <span><?= $jobCount . " Jobs found" ?> </span>



                                            <?php }
                                            if ($applied) {
                                                echo '<div class="alert alert-success text-center alert-dismissible fade show" role="alert">
                          Application successful!
                          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>';
                                            }
                                            ?>

                                        </div>
                                    </div>
                                </div>
                                <!-- Count of Job list End -->
                                <!-- single-job-content -->
                                <div class="row">
                                    <?php if ($queryJobs) {
                                        foreach ($queryJobs as $job) { ?>
                                            <div class="single-job-items mb-4 col-lg-4 col-md-3 col-sm-1">
                                                <div class="job-items">
                                                    <div class="company-img">
                                                        <a href="#"><img src="assets/img/icon/job-list1.png" alt=""></a>
                                                    </div>
                                                    <div class="job-tittle job-tittle2">
                                                        <a href="jobs.php?jobTitle=<?= $job->jobTitle ?>">
                                                            <h5 class=" text-wrap w-50"><?= $job->jobTitle ?></h5>
                                                        </a>
                                                        <div class="dropdown-center">
                                                            <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                                See More
                                                            </button>
                                                            <ul class="dropdown-menu">
                                                                <li>
                                                                    <h6 class="dropdown-item text-justify "><b>Job Description:</b> <?= $job->jobDescription ?> </h6>
                                                                </li>
                                                                <li>
                                                                    <a href="jobs.php?qualification=<?= $job->qualification ?>">
                                                                        <h6 class="dropdown-item text-justify "> <b>Qualifications:</b> <?= $job->qualification ?></h6>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a href="jobs.php?skills=<?= $job->skill ?>">
                                                                        <h6 class="dropdown-item text-justify "> <b>Skill Requirements:</b> <?= $job->skill ?>
                                                                        </h6>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a href="jobs.php?experience=<?= $job->experience ?>">
                                                                        <h6 class="dropdown-item text-justify "> <b>Experience:</b> <?= $job->experience ?>
                                                                        </h6>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a href="jobs.php?jobType=<?= $job->jobType ?>">
                                                                        <h6 class="dropdown-item text-justify "> <b>Job Type :</b> <?= $job->jobType ?>
                                                                        </h6>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a href="jobs.php?careerLevel=<?= $job->careerLevel ?>">
                                                                        <h6 class="dropdown-item text-justify "> <b>Job Level :</b> <?= $job->careerLevel ?>
                                                                        </h6>
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </div>

                                                        <ul>

                                                            <?php

                                                            //sql to fetch employer details
                                                            $employer_sql = "SELECT * FROM  employers WHERE id = ?";
                                                            $employer_stmt = $pdo->prepare($employer_sql);
                                                            if ($employer_stmt) {
                                                                $employer_stmt->execute([$job->userId]);
                                                                $employer_details = $employer_stmt->fetch();
                                                            } else {
                                                                echo "Error: Unable to prepare statement.";
                                                            }
                                                            ?>

                                                            <li><a href="view_employer_profile.php?id=<?= $job->userId ?>"><?= $employer_details->name ?></a></li>

                                                            <li><a href="jobs.php?industry=<?= $job->industry ?>"><?= $job->industry ?></a></li>

                                                            <li><i class="fas fa-map-marker-alt"></i><a href="jobs.php?state=<?= $employer_details->state ?>"><?= $employer_details->state ?></a>, <a href="jobs.php?country=<?= $employer_details->country ?>"><?= $employer_details->country ?></a></li>

                                                            <li><a href="jobs.php?minOffer=<?= $job->minOffer ?>">$<?= $job->minOffer ?></a> - <a href="jobs.php?maxOffer=<?= $job->maxOffer ?>">$<?= $job->maxOffer ?></a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="items-link items-link2 f-right">
                                                    <?php
                                                    // sql to get current application count for this job
                                                    $count_sql = "SELECT * FROM applications WHERE employerId = ?";
                                                    $stmt = $pdo->prepare($sql);
                                                    if ($stmt) {
                                                        $stmt->execute([$job->userId]);
                                                        $count = $stmt->rowCount();
                                                    }
                                                    if ($job->status == '1') { ?>
                                                        <a href="jobs.php?status=<?= $job->status ?>"><span class="badge bg-primary rounded-3 fw-semibold">Open</span></a>

                                                        <form action="post" method="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>">
                                                            <!-- <input type="hidden" name="applicantId" value="<?= $userId ?>">
                                                            <input type="hidden" name="jobId" value="<?= $job->id ?>">
                                                            <input type="hidden" name="employerId" value="<?= $job->userId ?>"> -->
                                                            <button class="badge bg-primary rounded-3 p-2 border-0 " name="apply">Apply To</button>
                                                        </form>

                                                    <?php } else { ?>
                                                        <span class="badge bg-secondary rounded-3 fw-semibold">Closed</span>
                                                    <?php } ?>
                                                    <div class="d-flex justify-content-between">

                                                        <div class="align-right"> <?= $count ?> applications </div>
                                                    </div>

                                                    <span class="w-50 font-size-11">
                                                        <?php
                                                        $output = timeAgo($job->created_at);
                                                        echo $output;
                                                        ?>
                                                    </span>
                                                </div>
                                                <div>


                                                </div>
                                            </div>
                                        <?php  }
                                    } elseif ($job) {
                                        foreach ($jobs as $job) { ?>
                                            <div class="single-job-items mb-4 col-md-6 col-sm-1">
                                                <div class="job-items">
                                                    <div class="company-img">
                                                        <a href="#"><img src="assets/img/icon/job-list1.png" alt=""></a>
                                                    </div>
                                                    <div class="job-tittle job-tittle2">
                                                        <a href="jobs.php?jobTitle=<?= $job->jobTitle ?>">
                                                            <h5 class=" text-wrap w-50"><?= $job->jobTitle ?></h5>
                                                        </a>
                                                        <div class="dropdown-center">
                                                            <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                                See More
                                                            </button>
                                                            <ul class="dropdown-menu">
                                                                <li>
                                                                    <h6 class="dropdown-item text-justify "><b>Job Description:</b> <?= $job->jobDescription ?> </h6>
                                                                </li>
                                                                <li>
                                                                    <a href="jobs.php?qualification=<?= $job->qualification ?>">
                                                                        <h6 class="dropdown-item text-justify "> <b>Qualifications:</b> <?= $job->qualification ?></h6>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a href="jobs.php?skills=<?= $job->skill ?>">
                                                                        <h6 class="dropdown-item text-justify "> <b>Skill Requirements:</b> <?= $job->skill ?>
                                                                        </h6>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a href="jobs.php?experience=<?= $job->experience ?>">
                                                                        <h6 class="dropdown-item text-justify "> <b>Experience:</b> <?= $job->experience ?>
                                                                        </h6>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a href="jobs.php?jobType=<?= $job->jobType ?>">
                                                                        <h6 class="dropdown-item text-justify "> <b>Job Type :</b> <?= $job->jobType ?>
                                                                        </h6>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a href="jobs.php?careerLevel=<?= $job->careerLevel ?>">
                                                                        <h6 class="dropdown-item text-justify "> <b>Job Level :</b> <?= $job->careerLevel ?>
                                                                        </h6>
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </div>

                                                        <ul>
                                                            <?php
                                                            //sql to fetch employer details
                                                            $employer_sql = "SELECT * FROM  employers WHERE id = ?";
                                                            $employer_stmt = $pdo->prepare($employer_sql);
                                                            if ($employer_stmt) {
                                                                $employer_stmt->execute([$job->userId]);
                                                                $employer_details = $employer_stmt->fetch();
                                                            } else {
                                                                echo "Error: Unable to prepare statement.";
                                                            }
                                                            ?>

                                                            <li><a href="view_employer_profile.php?id=<?= $job->userId ?>"><?= $employer_details->name ?></a></li>
                                                            <li><a href="jobs.php?industry=<?= $job->industry ?>"><?= $job->industry ?></a></li>
                                                            <li><i class="fas fa-map-marker-alt"></i><a href="jobs.php?state=<?= $employer_details->state ?>"><?= $employer_details->state ?></a>, <a href="jobs.php?country=<?= $employer_details->country ?>"><?= $employer_details->country ?></a></li>
                                                            <li><a href="jobs.php?minOffer=<?= $job->minOffer ?>">$<?= $job->minOffer ?></a> - <a href="jobs.php?maxOffer=<?= $job->maxOffer ?>">$<?= $job->maxOffer ?></a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="items-link items-link2 f-right">
                                                    <?php
                                                    if ($job->status == '1') { ?>
                                                        <div class="d-flex justify-content-between w-50"> <a href="jobs.php?status=<?= $job->status ?>"><span class="badge bg-primary rounded-3 fw-semibold">Open</span></a>

                                                            <form class="row g-3 needs-validation" action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post" novalidate>
                                                                <input type="hidden" name="applicantId" value="<?= $userId ?>">
                                                                <input type="hidden" name="jobId" value="<?= $job->id ?>">
                                                                <input type="hidden" name="employerId" value="<?= $job->userId ?>">
                                                                <button class="btn btn-primary rounded-3 p-2 border-0 " type="submit" name="apply">Apply</button>
                                                            </form>


                                                            <!-- sql to fetch count of applications for each job opening -->
                                                            <?php
                                                            $job_sql = "SELECT * FROM applications WHERE jobId  = ?";
                                                            $job_stmt = $pdo->prepare($job_sql);
                                                            if ($job_stmt) {
                                                                $job_stmt->execute([$job->id]);
                                                                $count = $job_stmt->rowCount();
                                                            } else {
                                                                echo "Error: unable to prepare stmt";
                                                            }
                                                            ?>

                                                        </div>

                                                    <?php } else { ?>
                                                        <span class="badge bg-secondary rounded-3 fw-semibold">Closed</span>
                                                    <?php } ?>
                                                    <div class="align-right"> <?= $count ?> applications </div>


                                                    <span class="w-50 font-size-11">
                                                        <?php
                                                        $output = timeAgo($job->created_at);
                                                        echo $output;
                                                        ?>
                                                    </span>
                                                </div>

                                            </div>
                                    <?php }
                                    } ?>
                                    <?php if ($jobCount == 0) { ?>
                                        <div class="alert alert-danger text-center alert-dismissible fade show" role="alert">
                                            No Job Postings now, try later!
                                        </div>
                                    <?php } ?>

                                </div>

                            </div>
                        </section>
                        <!-- Featured_job_end -->
                    </div>
                </div>
            </div>
        </div>
        <!-- Job List Area End -->
    </section>

</main><!-- End #main -->

<?php require 'inc/footer/footer.php'; ?>