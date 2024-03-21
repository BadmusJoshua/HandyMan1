<?php
require_once 'inc/header/admin-header.php';

$sql = "SELECT * FROM jobs";
$stmt = $pdo->prepare($sql);
$stmt->execute([]);
$jobCount = $stmt->rowCount();

//sql to check number of applications
$sql = "SELECT * FROM applications";
$stmt = $pdo->prepare($sql);
$stmt->execute([]);
$applicationCount = $stmt->rowCount();

//sql to check number of employers
$sql = "SELECT * FROM employers";
$stmt = $pdo->prepare($sql);
$stmt->execute([]);
$employerCount = $stmt->rowCount();

//sql to check number of applicants
$sql = "SELECT * FROM applicants";
$stmt = $pdo->prepare($sql);
$stmt->execute([]);
$applicantCount = $stmt->rowCount();

//sql to delete note
if (isset($_POST['remove'])) {
    $note_id = $_POST['id'];
    $sql = "DELETE FROM notes WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    if ($stmt) {
        $stmt->execute([$note_id]);
    } else {
        echo "Error: Unable to prepare statement.";
    }
}

?>

<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link " href="admin-index.php">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li><!-- End Dashboard Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="view-applicants.php">
                <i class="bi bi-person"></i>
                <span>View Applicants</span>
            </a>
        </li><!-- End Profile Page Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="view-employers.php">
                <i class="bi bi-person"></i>
                <span>View Employers</span>
            </a>
        </li><!-- End Profile Page Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="view-jobs.php">
                <i class="bi bi-briefcase-fill"></i>
                <span>View Jobs</span>
            </a>
        </li><!-- End Jobs Page Nav -->


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
        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="admin-index.php">Home</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row mt-2">
            <div class="col-lg-3 column-lg-half responsive-column">
                <div class="overview-item">
                    <div class="icon-box bg-1 mb-0 d-flex align-items-center">
                        <div class="icon-element flex-shrink-0">
                            <i class="la la-briefcase"></i>
                        </div><!-- end icon-element-->
                        <div class="info-content">
                            <span class="info__count"><?= $jobCount ?></span>
                            <h4 class="info__title font-size-16 mt-2">Total Jobs</h4>
                        </div><!-- end info-content -->
                    </div>
                </div>
            </div><!-- end col-lg-3 -->
            <div class="col-lg-3 column-lg-half responsive-column">
                <div class="overview-item">
                    <div class="icon-box bg-2 mb-0 d-flex align-items-center">
                        <div class="icon-element flex-shrink-0">
                            <i class="la la-comment"></i>
                        </div><!-- end icon-element-->
                        <div class="info-content">
                            <span class="info__count"><?= $applicationCount ?></span>
                            <h4 class="info__title font-size-16 mt-2">Applications </h4>
                        </div><!-- end info-content -->
                    </div>
                </div>
            </div><!-- end col-lg-3 -->
            <div class="col-lg-3 column-lg-half responsive-column">
                <div class="overview-item">
                    <div class="icon-box bg-3 mb-0 d-flex align-items-center">
                        <div class="icon-element flex-shrink-0">
                            <i class="la la-eye"></i>
                        </div><!-- end icon-element-->
                        <div class="info-content">
                            <span class="info__count"><?= $employerCount ?></span>
                            <h4 class="info__title font-size-16 mt-2">Employers</h4>
                        </div><!-- end info-content -->
                    </div>
                </div>
            </div><!-- end col-lg-3 -->
            <div class="col-lg-3 column-lg-half responsive-column">
                <div class="overview-item">
                    <div class="icon-box bg-4 mb-0 d-flex align-items-center">
                        <div class="icon-element flex-shrink-0">
                            <i class="la la-phone"></i>
                        </div><!-- end icon-element-->
                        <div class="info-content">
                            <span class="info__count"><?= $applicantCount ?></span>
                            <h4 class="info__title font-size-16 mt-2">Applicants</h4>
                        </div><!-- end info-content -->
                    </div>
                </div>
            </div><!-- end col-lg-3 -->
        </div><!-- end row -->
        <div class="row mt-2">
            <div class="col-lg-7 column-lg-full">
                <div class="chart-box chart-item">
                    <div class="chart-headline d-flex align-items-center justify-content-between mb-4">
                        <h3 class="widget-title font-size-16 pb-0"><i class="font-size-20 la la-bar-chart mr-1"></i>Recent Applications</h3>
                    </div>

                    <div class="card w-100">
                        <div class="card-body w-100">
                            <div class="d-sm-flex d-block align-items-center justify-content-between mb-9 w-100">
                                <div class="table-responsive w-100">
                                    <table class="table text-wrap mb-0 align-middle w-100">
                                        <thead class="text-dark fs-4">
                                            <tr>
                                                <th class="border-bottom-0">
                                                    <h6 class="fw-semibold mb-0">Id</h6>
                                                </th>
                                                <th class="border-bottom-0">
                                                    <h6 class="fw-semibold mb-0 text-center">Applicant Name</h6>
                                                </th>
                                                <th class="border-bottom-0">
                                                    <h6 class="fw-semibold mb-0 text-center">Job Title</h6>
                                                </th>

                                                <th class="border-bottom-0">
                                                    <h6 class="fw-semibold mb-0">Employer</h6>
                                                </th>
                                                <th class="border-bottom-0">
                                                    <h6 class="fw-semibold mb-0">Location</h6>
                                                </th>
                                                <th class="border-bottom-0">
                                                    <h6 class="fw-semibold mb-0">Job Type</h6>
                                                </th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            //sql query to fetch recent applications
                                            $sql = "SELECT * FROM applications";
                                            $stmt = $pdo->prepare($sql);
                                            $stmt->execute();
                                            $applications = $stmt->fetchAll(PDO::FETCH_ASSOC); ?>

                                            <tr>
                                                <?php if ($applications) {
                                                    foreach ($applications as $details) :
                                                ?>

                                                        <td class="border-bottom-0">
                                                            <h6 class="fw-semibold mb-0"><?= $details['id'] ?></h6>
                                                        </td>
                                                        <td class="border-bottom-0 text-center">
                                                            <h6 class="fw-semibold mb-1 text-center"><?php
                                                                                                        //sql to get applicant details
                                                                                                        $applicant_sql = "SELECT * FROM applicants WHERE id = ?";
                                                                                                        $applicant_stmt = $pdo->prepare($applicant_sql);
                                                                                                        if ($applicant_stmt) {
                                                                                                            $applicant_stmt->execute([$details['applicantId']]);
                                                                                                            $applicant_details = $applicant_stmt->fetch();
                                                                                                            $applicant_name = $applicant_details['name'];
                                                                                                            $applicant_email = $applicant_details['email'];
                                                                                                        } else {
                                                                                                            echo "Error: Unable to Prepare Statement";
                                                                                                        };
                                                                                                        echo $applicant_name;
                                                                                                        ?> </h6>
                                                            <span>
                                                                <small><?= $applicant_email ?></small>
                                                            </span>
                                                        </td>
                                                        <td class="border-bottom-0 text-center">
                                                            <h6 class="fw-semibold mb-1"><?php
                                                                                            //sql to get employer details
                                                                                            $employer_sql = "SELECT * FROM employers WHERE id = ?";
                                                                                            $employer_stmt = $pdo->prepare($sql);
                                                                                            if ($employer_stmt) {
                                                                                                $employer_stmt->execute([$details['employerId']]);
                                                                                                $employer_info = $employer_stmt->fetch();
                                                                                                $employer_name = $employer_info['name'];
                                                                                                $employer_rate = $employer_info['rate'];
                                                                                            } else {
                                                                                                echo "Error: Unable to prepare Statement";
                                                                                            }
                                                                                            echo $employer_name;
                                                                                            ?></h6>
                                                            <span>
                                                                <small class="text-center"><?php

                                                                                            echo $employer_rate;
                                                                                            if ($employer_rate == 0) {
                                                                                                echo "No reviews yet";
                                                                                            } elseif ($employer_rate == 1) {
                                                                                                echo '
                                                        <i class="bi bi-star-fill"></i>
                                                        <i class="bi bi-star"></i>
                                                        <i class="bi bi-star"></i>
                                                        <i class="bi bi-star"></i>
                                                        <i class="bi bi-star"></i>
                                                    ';
                                                                                            } elseif ($employer_rate >= 1.5 && $employer_rate  < 2) {
                                                                                                echo
                                                                                                '
                                                        <i class="bi bi-star-fill"></i>
                                                        <i class="bi bi-star-half"></i>
                                                        <i class="bi bi-star"></i>
                                                        <i class="bi bi-star"></i>
                                                        <i class="bi bi-star"></i>
                                                    ';
                                                                                            } elseif ($employer_rate == 2) {
                                                                                                echo '
                                                    <i class="bi bi-star-fill"></i>
                                                    <i class="bi bi-star-fill"></i>
                                                    <i class="bi bi-star"></i>
                                                    <i class="bi bi-star"></i>
                                                    <i class="bi bi-star"></i>
                                                    ';
                                                                                            } elseif ($employer_rate >= 2.5 && $employer_rate < 3) {
                                                                                                echo
                                                                                                '
                                                    <i class="bi bi-star-fill"></i>
                                                    <i class="bi bi-star-fill"></i>
                                                    <i class="bi bi-star-half"></i>
                                                    <i class="bi bi-star"></i>
                                                    <i class="bi bi-star"></i>
                                                    ';
                                                                                            } elseif ($employer_rate == 3) {
                                                                                                echo '
                                                    <i class="bi bi-star-fill"></i>
                                                    <i class="bi bi-star-fill"></i>
                                                    <i class="bi bi-star-fill"></i>
                                                    <i class="bi bi-star"></i>
                                                    <i class="bi bi-star"></i>
                                                    ';
                                                                                            } elseif ($employer_rate >= 3.5 && $employer_rate < 4) {
                                                                                                echo
                                                                                                '
                                                    <i class="bi bi-star-fill"></i>
                                                    <i class="bi bi-star-fill"></i>
                                                    <i class="bi bi-star-fill"></i>
                                                    <i class="bi bi-star-half"></i>
                                                    <i class="bi bi-star"></i>
                                                    ';
                                                                                            } elseif ($employer_rate == 4) {
                                                                                                echo '  
                                                    <i class="bi bi-star-fill"></i>
                                                    <i class="bi bi-star-fill"></i>
                                                    <i class="bi bi-star-fill"></i>
                                                    <i class="bi bi-star-fill"></i> 
                                                    <i class="bi bi-star"></i>
                                                    ';
                                                                                            } elseif ($employer_rate >= 4.5 && $employer_rate < 5) {
                                                                                                echo '
                                                    <i class="bi bi-star-fill"></i>
                                                    <i class="bi bi-star-fill"></i>
                                                    <i class="bi bi-star-fill"></i>
                                                    <i class="bi bi-star-fill"></i>
                                                    <i class="bi bi-star-half"></i>
                                                    ';
                                                                                            } else {
                                                                                                echo '  
                                                    <i class="bi bi-star-fill"></i>
                                                    <i class="bi bi-star-fill"></i>
                                                    <i class="bi bi-star-fill"></i>
                                                    <i class="bi bi-star-fill"></i>
                                                    <i class="bi bi-star-fill"></i>';
                                                                                            }
                                                                                            ?>
                                                                    ?></small>
                                                            </span>
                                                        </td>
                                                        <td class="border-bottom-0">
                                                            <?php
                                                            //sql to fetch job details
                                                            $job_sql = "SELECT * FROM jobs WHERE id = ?";
                                                            $job_sql = $pdo->prepare($job_sql);
                                                            if ($job_sql) {
                                                                $job_sql->execute([$details['jobId']]);
                                                                $job_details = $job_sql->fetch();
                                                                $job_title = $job_details['jobTitle'];
                                                                $job_type = $job_details['jobType'];
                                                                $careerLevel = $job_details['careerLevel'];
                                                            } else {
                                                                echo "Error: Unable to prepare Statement";
                                                            }
                                                            ?>
                                                            <h6><?= $job_tile ?></h6>
                                                        </td>

                                                        <td class="border-bottom-0 text-center">
                                                            <h6> <?php
                                                                    if (($employer_info['country']) && ($employer_info['state'])) {
                                                                        echo $employer_info['state'] . ' , ' . $employer_info['country'];
                                                                    } else {
                                                                        echo "Error: Unable to prepare Statement";
                                                                    }
                                                                    ?></h6>
                                                        </td>
                                                        <td class="border-bottom-0 text-center">
                                                            <h6> <?= $job_type; ?></h6>
                                                            <small><?= $careerLevel ?></small>
                                                        </td>
                                                <?php endforeach;
                                                } else {
                                                    echo '<div class="alert alert-danger text-center" role="alert">
                    Oops! No applications yet!
                  </div>';
                                                }
                                                ?>
                                            </tr>


                                        </tbody>
                                    </table>

                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- end chart-box -->
            </div><!-- end col-lg-7 -->
            <div class="col-lg-5 column-lg-full">
                <div class="dashboard-shared note-dashboard">
                    <div class="mess-dropdown">
                        <div class="mess__title">
                            <img src="images/bg-title-1.jpg" alt="" class="img-fluid">
                            <div class="mess__title-inner padding-top-30px pr-4 pl-4 pb-4">
                                <h4 class="widget-title font-size-16 pb-0">
                                    <i class="font-size-20 la la-file-text-o mr-1"></i> Notes
                                </h4>
                            </div>
                        </div><!-- end mess__title -->
                        <div class="timeline-body">
                            <div class="mess__body">
                                <?php
                                $note_sql = "SELECT * FROM notes WHERE userId =? && category =? ";
                                $note_stmt = $pdo->prepare($note_sql);
                                $note_stmt->execute([$userId, $userCategory]);
                                $notes = $note_stmt->fetchAll();
                                if ($notes) {
                                    foreach ($notes as $note) { ?>
                                        <div class="mess__item">

                                            <div class="note-badge-wrap d-flex align-items-center justify-content-between">
                                                <?php if ($note->priority == "High") { ?>
                                                    <span class="badge badge-primary note-badge note-badge-bg-2 p-2">High Priority</span>

                                                <?php } elseif ($note->priority == "Medium") { ?>
                                                    <span class="badge badge-warning text-white note-badge note-badge-bg-2 p-2">Medium Priority</span>
                                                <?php } else { ?>
                                                    <span class="badge badge-success note-badge note-badge-bg-2 p-2">Low Priority</span>

                                                <?php }
                                                ?>
                                                <ul class="info-list">
                                                    <li class="d-inline-block"><a href="admin-notes.php?id=<?= $note->id ?>"><i class="la la-edit" data-toggle="tooltip" data-placement="top" title="Edit"></i></a></li>
                                                    <li class="d-inline-block">
                                                        <form method="post" action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>"> <button name="remove" class="border-0"><i class="la la-trash" data-toggle="tooltip" data-placement="top" title="Remove"></i></button>
                                                            <input type="hidden" name="id" value="<?= $note->id ?>">
                                                        </form>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="content mt-2">
                                                <p class="line-height-24 font-size-13"><?= $note->message ?></p>
                                            </div>
                                            <span class="font-weight-bold font-size-11 "><?php
                                                                                            $date = DateTime::createFromFormat('Y-m-d H:i:s', $note->created_at);
                                                                                            echo $date->format('d M, Y H:i:s');
                                                                                            ?></span>
                                        </div><!-- end mess__item -->
                                    <?php };
                                } else { ?>
                                    <div class="alert alert-danger text-center alert-dismissible fade show w-80 align-self-center" role="alert">
                                        You don't have any note yet!

                                    </div>
                                <?php }
                                ?>
                            </div><!-- end mess__body -->
                        </div>
                        <div class="mess__item border-bottom-0 text-center">
                            <a href="admin-notes.php" class="theme-btn border-0 w-100" style="text-decoration:none;">Add Note</a>

                        </div><!-- end mess__item -->
                    </div><!-- end mess-dropdown -->
                </div><!-- end dashboard-shared -->
            </div><!-- end col-lg-5 -->
        </div><!-- end row -->
    </section>

</main><!-- End #main -->



<?php include 'inc/footer/footer.php'; ?>