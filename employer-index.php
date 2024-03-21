<?php include 'inc/header/employer-header.php';
//sql to check number of jobs posted
$sql = "SELECT * FROM jobs WHERE userId = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$userId]);
$jobCount = $stmt->rowCount();

//sql to check number of applications
$sql = "SELECT * FROM applications WHERE employerId  = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$userId]);
$applicationCount = $stmt->rowCount();

//sql to check number of calls for interview
$sql = "SELECT * FROM applications WHERE employerId  = ? and status = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$userId, '2']);
$interviewCount = $stmt->rowCount();

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
            <a class="nav-link " href="index.php">
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
            <a class="nav-link collapsed" href="employer-manage-jobs.php">
                <i class="bi bi-briefcase-fill"></i>
                <span>Manage Jobs</span>
            </a>
        </li><!-- End Manage Jobs Page Nav -->



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
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row mt-5 d-flex flex-grow ">
            <div class="col-lg-3 column-lg-half responsive-column">
                <div class="overview-item">
                    <div class="icon-box bg-1 mb-0 d-flex align-items-center">
                        <div class="icon-element flex-shrink-0">
                            <i class="la la-cloud-upload"></i>
                        </div><!-- end icon-element-->
                        <div class="info-content">
                            <span class="info__count"><?= $jobCount ?></span>
                            <h4 class="info__title font-size-16 mt-2">Total Job Posted</h4>
                        </div><!-- end info-content -->
                    </div>
                </div>
            </div><!-- end col-lg-3 -->
            <div class="col-lg-3 column-lg-half responsive-column">
                <div class="overview-item">
                    <div class="icon-box bg-2 mb-0 d-flex align-items-center">
                        <div class="icon-element flex-shrink-0">
                            <i class="la la-file-text-o"></i>
                        </div><!-- end icon-element-->
                        <div class="info-content">
                            <span class="info__count"><?= $applicationCount ?></span>
                            <h4 class="info__title font-size-16 mt-2 ">Applications</h4>
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
                            <span class="info__count">504</span>
                            <h4 class="info__title font-size-16 mt-2">This Month Views</h4>
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
                            <span class="info__count"><?= $interviewCount ?></span>
                            <h4 class="info__title font-size-16 mt-2">Call for interview</h4>
                        </div><!-- end info-content -->
                    </div>
                </div>
            </div><!-- end col-lg-3 -->
        </div><!-- end row -->
        <div class="row mt-2">
            <div class="col-lg-7 column-lg-full">
                <div class="chart-box chart-item">
                    <div class="chart-headline d-flex flex-column align-items-center justify-content-between mb-4">
                        <h3 class="widget-title font-size-16 pb-0"><i class="font-size-20 la la-bar-chart mr-1"></i>Applications</h3>
                        <?php
                        //sql to get applications for jobs by this employer
                        $sql = "SELECT * FROM applications WHERE employerId = ? and status = ?";
                        $stmt = $pdo->prepare($sql);
                        if ($stmt) {
                            $stmt->execute([$userId, '0']);
                            $applications = $stmt->fetchAll();
                        } else {
                            echo "Error: Unable to Prepare Statement";
                        } ?>
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
                                                        <h6 class="fw-semibold mb-0 text-center">Name</h6>
                                                    </th>
                                                    <th class="border-bottom-0">
                                                        <h6 class="fw-semibold mb-0 text-center">Job Title</h6>
                                                    </th>
                                                    <th class="border-bottom-0">
                                                        <h6 class="fw-semibold mb-0 text-center">Job Type</h6>
                                                    </th>
                                                    <th class="border-bottom-0">
                                                        <h6 class="fw-semibold mb-0">Applications</h6>
                                                    </th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php


                                                if ($applications) {
                                                    foreach ($applications as $details) :
                                                ?>
                                                        <tr>
                                                            <td class="border-bottom-0">
                                                                <h6 class="fw-semibold mb-0"><?= $details['id'] ?></h6>
                                                            </td>
                                                            <td class="border-bottom-0 text-center">
                                                                <h6 class="fw-semibold mb-1"><?= $details['jobTitle'] ?></h6>

                                                                <small><?= $details['jobDescription'] ?></small>

                                                            </td>
                                                            <td class="border-bottom-0 text-center">
                                                                <h6 class="fw-semibold mb-1"><?php
                                                                                                $employer_sql = "SELECT * FROM employers WHERE id= ?";
                                                                                                $employer_stmt = $pdo->prepare($employer_sql);
                                                                                                if ($employer_stmt) {
                                                                                                    $employer_stmt->execute([$details['userId']]);
                                                                                                    $employer_details = $employer_stmt->fetch();
                                                                                                    echo $employer_details->name;
                                                                                                } else {
                                                                                                    echo "Error: Unable to prepare statement";
                                                                                                }

                                                                                                ?>
                                                                </h6>

                                                                <small class="text-center"><?= $details['industry']; ?>
                                                                </small>

                                                            </td>
                                                            <td class="border-bottom-0">
                                                                <p class="mb-0 fw-normal"><?php if ($details['status'] === 1) { ?>
                                                                <h6 class="fw-semibold mb-1 text-success">Open</h6>
                                                            <?php  } else {
                                                                                                echo '<h6 class="fw-semibold mb-1 text-danger">Closed</h6>';
                                                                                            } ?></p>
                                                            </td>

                                                            <td class="border-bottom-0 text-center">
                                                                <h6> <?= $details['jobType'] ?></h6>
                                                                <small class="text-center"><?php echo '$' . $details['minOffer'] . ' -, $' . $details['maxOffer']; ?>
                                                                </small>
                                                            </td>
                                                            <td class="border-bottom-0 text-center">
                                                                <h6> <?php
                                                                        //sql to get count of applications for each job opening
                                                                        $sql = "SELECT * FROM applications WHERE jobId = ?";
                                                                        $stmt = $pdo->prepare($sql);
                                                                        if ($stmt) {
                                                                            $stmt->execute([$details['userId']]);
                                                                            $applications = $stmt->rowCount();
                                                                            echo $applications;
                                                                        } else {
                                                                            echo "Error: Unable to prepare Statement";
                                                                        }
                                                                        $details['created_at'] ?></h6>
                                                            </td>
                                                            <td class="border-bottom-0">
                                                                <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
                                                                    <input type="hidden" name="id" value="<?= $details['id'] ?>">
                                                                    <button class="btn btn-sm btn-primary" name="apply">Apply</button>

                                                                </form>
                                                            </td>
                                                        </tr>
                                                <?php endforeach;
                                                } else {
                                                    echo '<div class="alert alert-danger text-center" role="alert">
                    No Applications Yet !
                  </div>';
                                                }
                                                ?>

                                            </tbody>
                                        </table>

                                    </div>
                                </div>
                            </div>
                        </div>
                        ?>

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
                                                    <li class="d-inline-block"><a href="employer-notes.php?id=<?= $note->id ?>"><i class="la la-edit" data-toggle="tooltip" data-placement="top" title="Edit"></i></a></li>
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
                                <div class="mess__item border-bottom-0 text-center">
                                    <a href="employer-notes.php" class="theme-btn border-0 w-100" style="text-decoration:none;">Add Note</a>
                                </div><!-- end mess__item -->
                            </div><!-- end mess-dropdown -->
                        </div><!-- end dashboard-shared -->
                    </div><!-- end col-lg-5 -->

    </section>

</main><!-- End #main -->



<?php include 'inc/footer/footer.php'; ?>