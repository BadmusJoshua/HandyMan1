<?php include 'inc/header/employer-header.php';

//sql to fetch total number of applications
$sql = "SELECT * FROM applications WHERE employerId  = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$userId]);
$applicationCount = $stmt->rowCount();

//sql to fetch job count
$sql = "SELECT * FROM jobs WHERE userId = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$userId]);
$jobCount = $stmt->rowCount();
//fetching job details
$jobDetails = $stmt->fetchAll();

//sql to fetch amount of active jobs
$sql = "SELECT * FROM jobs WHERE userId = ? && status = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$userId, '1']);
$activeJobCount = $stmt->rowCount();

if (isset($_POST['delete'])) {
    $jobId = $_POST['jid'];
    $sql = "DELETE FROM jobs WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$jobId]);
}

?>
<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link collapsed" href="index.php">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li><!-- End Dashboard Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="employer-profile.php">
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
            <a class="nav-link" href="employer-manage-jobs.php">
                <i class="bi bi-briefcase-fill"></i>
                <span>Manage Jobs</span>
            </a>
        </li><!-- End Manage Jobs Page Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="meetings.php">
                <i class="ri-building-4-line"></i>
                <span>Meetings</span>
            </a>
        </li><!-- End Meeting Page Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="employer-manage-applicants.php">
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
        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="employer-index.php">Home</a></li>
                <li class="breadcrumb-item active">Manage Jobs</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row mt-5">
            <div class="col-lg-12">
                <div class="billing-form-item">

                    <div class="billing-content pb-0">
                        <div class="manage-job-wrap">
                            <div class="manage-job-header mt-3 mb-5">
                                <div class="manage-job-count">
                                    <span class="font-weight-medium color-text-2 mr-1"><?= $jobCount ?></span>
                                    <span class="font-weight-medium">job(s) Posted</span>
                                </div>
                                <div class="manage-job-count">
                                    <span class="font-weight-medium color-text-2 mr-1"><?= $applicationCount ?></span>
                                    <span class="font-weight-medium">Application(s)</span>
                                </div>
                                <div class="manage-job-count">
                                    <span class="font-weight-medium color-text-2 mr-1"><?= $activeJobCount ?></span>
                                    <span class="font-weight-medium">Active Job(s)</span>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Title</th>
                                            <th>Application</th>
                                            <th>Create date</th>
                                            <th>Expire date</th>
                                            <th>Status</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if ($jobDetails) {
                                            foreach ($jobDetails as $details) : ?>
                                                <!-- Modal -->
                                                <div class="modal fade" id="staticBackdrop<?= $details->id ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h1 class="modal-title fs-5 text-center" id="staticBackdropLabel">Edit Job Detail</h1>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" enctype="multipart/form-data">
                                                                    <div class="row">
                                                                        <div class="col-lg-6 column-lg-full">
                                                                            <div class="input-box">
                                                                                <label class="label-text">Job Title</label>
                                                                                <div class="form-group">
                                                                                    <span class="la la-briefcase form-icon"></span>
                                                                                    <input class="form-control" type="text" name="jobTitle" placeholder="Enter job title">
                                                                                </div>
                                                                            </div>
                                                                        </div><!-- end col-lg-6 -->
                                                                        <div class="col-lg-6 column-lg-full">
                                                                            <div class="input-box">
                                                                                <label class="label-text">Job Description</label>
                                                                                <div class="form-group mb-0">
                                                                                    <textarea class="message-control form-control user-text-editor" name="jobDescription" id="jobDescription" cols="30" rows="5"></textarea>
                                                                                </div>
                                                                            </div>
                                                                        </div><!-- end col-lg-12 -->
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-lg-4 column-lg-full">
                                                                            <div class="input-box">
                                                                                <label class="label-text">Job Type</label>
                                                                                <div class="form-group user-chosen-select-container">
                                                                                    <select class="user-chosen-select" name="jobType" required>
                                                                                        <option value="">Select Job Type</option>
                                                                                        <option value="Full Time">Full Time</option>
                                                                                        <option value="Part Time">Part Time</option>
                                                                                        <option value="Contract">Contract</option>
                                                                                        <option value="Internship">Internship</option>
                                                                                        <option value="Freelance">Freelance</option>
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                        </div><!-- end col-lg-4 -->

                                                                        <div class="col-lg-4 column-lg-full">
                                                                            <div class="input-box">
                                                                                <label class="label-text">Experience</label>
                                                                                <div class="form-group user-chosen-select-container">
                                                                                    <select class="user-chosen-select" name="experience" required>
                                                                                        <option value="">Choose Experience</option>
                                                                                        <option value="No Experience">No Experience</option>
                                                                                        <option value="Less than 1 Year">Less than 1 Year</option>
                                                                                        <option value="1 to 2 Year(s)">1 to 2 Year(s)</option>
                                                                                        <option value="2 to 4 Year(s)">2 to 4 Year(s)</option>
                                                                                        <option value="3 to 5 Year(s)">3 to 5 Year(s)</option>
                                                                                        <option value="2 Years">2 Years</option>
                                                                                        <option value="3 Years">3 Years</option>
                                                                                        <option value="4 Years">4 Years</option>
                                                                                        <option value="Over 5 Years">Over 5 Years</option>
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-2 column-lg-full">
                                                                            <div class="input-box">
                                                                                <label class="label-text">No. Of Vacancy</label>
                                                                                <div class="form-group user-chosen-select-container">
                                                                                    <select class="user-chosen-select" name="vacancy" required>
                                                                                        <option>1</option>
                                                                                        <option>2</option>
                                                                                        <option>3</option>
                                                                                        <option>4</option>
                                                                                        <option>5</option>
                                                                                        <option>6</option>
                                                                                        <option>7</option>
                                                                                        <option>8</option>
                                                                                        <option>9</option>
                                                                                        <option>10</option>
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                        </div><!-- end col-lg-4 -->
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-lg-4 column-lg-full">
                                                                            <div class="input-box">
                                                                                <label class="label-text">Career Level</label>
                                                                                <div class="form-group user-chosen-select-container">
                                                                                    <select class="user-chosen-select" name="careerLevel" required>
                                                                                        <option value="">Choose One</option>
                                                                                        <option value="Student">Student</option>
                                                                                        <option value="Junior">Junior</option>
                                                                                        <option value="Intermediate">Intermediate</option>
                                                                                        <option value="Senior">Senior</option>
                                                                                        <option value="Manager">Manager</option>
                                                                                        <option value="Executive">Executive</option>
                                                                                    </select>
                                                                                </div><!-- end form-group -->
                                                                            </div>
                                                                        </div><!-- end col-lg-4 -->

                                                                        <div class="col-lg-4 column-lg-full">
                                                                            <div class="input-box">
                                                                                <label class="label-text">Qualification</label>
                                                                                <div class="form-group user-chosen-select-container">
                                                                                    <select class="user-chosen-select" name="qualification" required>
                                                                                        <option value="">Choose Qualification</option>
                                                                                        <option value="None Required">None Required</option>
                                                                                        <option value="SSCE">SSCE</option>
                                                                                        <option value="OND">OND</option>
                                                                                        <option value="HND">HND</option>
                                                                                        <option value="Diploma">Diploma</option>
                                                                                        <option value="Graduate">Graduate</option>
                                                                                        <option value="Associate Degree">Associate Degree</option>
                                                                                        <option value="Bachelor's Degree">Bachelor's Degree</option>
                                                                                        <option value="Master's Degree">Master's Degree</option>
                                                                                        <option value="Doctorate Degree">Doctorate Degree</option>
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                        </div><!-- end col-lg-4 -->
                                                                        <div class="col-lg-4 column-lg-full">
                                                                            <div class="input-box">
                                                                                <label class="label-text">Gender</label>
                                                                                <div class="form-group user-chosen-select-container">
                                                                                    <select class="user-chosen-select" name="gender" required>
                                                                                        <option value="">Choose Gender</option>
                                                                                        <option value="Male or Female">Male or Female</option>
                                                                                        <option value="Male">Male</option>
                                                                                        <option value="Female">Female</option>
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                        </div><!-- end col-lg-4 -->
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-lg-6 column-lg-full">
                                                                            <div class="input-box">
                                                                                <label class="label-text">Offered Salary</label>
                                                                                <div class="d-flex flex-row gap-2">
                                                                                    <div class="form-group">
                                                                                        <span class="la la-dollar-sign form-icon"></span>
                                                                                        <input class="form-control" type="number" placeholder="Min" name="minOffer" required>
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <span class="la la-dollar-sign form-icon"></span>
                                                                                        <input class="form-control" type="number" placeholder="Max" name="maxOffer" required>
                                                                                    </div>
                                                                                </div><!-- end row -->
                                                                            </div>
                                                                        </div><!-- end col-lg-4 -->
                                                                        <div class="col-lg-6 column-lg-full">
                                                                            <div class="input-box">
                                                                                <label class="label-text">Skill Requirements</label>
                                                                                <div class="form-group mb-0">
                                                                                    <textarea class="message-control form-control user-text-editor" name="skill" id="skill" cols="30" rows="5" placeholder="list skills separated with a comma" required></textarea>
                                                                                </div>
                                                                            </div>
                                                                        </div><!-- end col-lg-4 -->
                                                                    </div>
                                                                    <div class="row">

                                                                        <div class="col-lg-4 column-lg-full">
                                                                            <div class="input-box">
                                                                                <label class="label-text">Application Deadline Date</label>
                                                                                <div class="form-group">
                                                                                    <span class="la la-calendar form-icon"></span>
                                                                                    <input type="date" name="deadlineDate" id="" class="date-range form-control" placeholder="YYYY-MM-DD">
                                                                                </div>
                                                                            </div>
                                                                        </div><!-- end col-lg-4 -->

                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-12 justify-content-center align-items-center d-flex">
                                                                            <div class="btn-box mt-4">
                                                                                <button class="theme-btn border-0 align-self-center" type="submit" name="postJob"><i class="la la-plus"></i> Update Job Opening</button>
                                                                            </div><!-- end btn-box -->
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <tr>
                                                    <td>
                                                        <div class="manage-candidate-wrap">
                                                            <h2 class="widget-title pb-1"><a href="job-details.html" class="color-text-2"><?= $details->jobTitle ?></a></h2>
                                                            <p>
                                                                <span><i class="la la-clock-o font-size-16"></i><?php

                                                                                                                if ($details->updated_at) {
                                                                                                                    $date = DateTime::createFromFormat('Y-m-d H:i:s', $details->updated_at);
                                                                                                                    echo "Last Updated" . ' ' . $date->format('M d, Y');
                                                                                                                } else {
                                                                                                                    $date = DateTime::createFromFormat('Y-m-d H:i:s', $details->created_at);
                                                                                                                    echo "Last Updated" . ' ' . $date->format('M d, Y');
                                                                                                                }
                                                                                                                ?></span>
                                                            </p>
                                                        </div><!-- end manage-candidate-wrap -->
                                                    </td>
                                                    <td> <?php
                                                            $sqli = "SELECT * FROM applications WHERE jobId = ?";
                                                            $stmti = $pdo->prepare($sqli);
                                                            $stmti->execute([$details->id]);
                                                            $jobApplicationCount = $stmti->rowCount();
                                                            echo $jobApplicationCount; ?> Application(s)</td>
                                                    <td><?php $date = DateTime::createFromFormat('Y-m-d H:i:s', ($details->created_at));
                                                        echo $date->format('d F Y'); ?></td>
                                                    <td><?php $date = DateTime::createFromFormat('Y-m-d', ($details->deadlineDate));
                                                        echo $date->format('d F Y'); ?></td>
                                                    <td><?php if (date('Y-m-d', strtotime($details->deadlineDate)) > date('Y-m-d')) {
                                                            $sqlj = "UPDATE jobs SET status = ? WHERE id =?";
                                                            $stmtj = $pdo->prepare($sqlj);
                                                            $stmtj->execute(['1', $details->id]);
                                                            echo '<span class="badge badge-success p-1">Open</span>';
                                                        } else {
                                                            $sqlj = "UPDATE jobs SET status = ? WHERE id =?";
                                                            $stmtj = $pdo->prepare($sqlj);
                                                            $stmtj->execute(['0', $details->id]);
                                                            echo '<span class="badge badge-danger p-1">Closed</span>';
                                                        } ?></td>
                                                    <td class="text-center">
                                                        <div class="manage-candidate-wrap">
                                                            <div class="bread-action pt-0">
                                                                <ul class="info-list d-flex flex-center-start">
                                                                    <li class="d-inline-block"><a href="middleware.php?id=<?= $details->id; ?>"><i class="la la-edit" data-toggle="tooltip" data-placement="top" title="Edit" data-bs-toggle="" data-bs-target=""></i></a></li>
                                                                    <form action="post" method="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" class="p-0 m-0">
                                                                        <input type="hidden" name="jid" value=<?= $details->id ?>>
                                                                        <li class=" d-inline-block"><button class="btn btn-sm" name="delete"><i class="la la-trash" data-toggle="tooltip" data-placement="top" title="Remove"></i></button></li>
                                                                    </form>
                                                                </ul>

                                                            </div>
                                                            </li>

                                                        </div>
                            </div>
                            </td>
                            </tr>
                    <?php endforeach;
                                        } else {
                                            echo '<div class="alert alert-danger text-center" role="alert">
                    You haven\t posted any job yet
                  </div>';
                                        }
                    ?>

                    </tbody>
                    </table>
                        </div>
                    </div>
                </div><!-- end billing-content -->
            </div><!-- end billing-form-item -->
        </div><!-- end col-lg-12 -->
        </div><!-- end row -->

    </section>
</main>
<?php include 'inc/footer/footer.php'; ?>