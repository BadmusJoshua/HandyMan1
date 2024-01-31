<?php include 'inc/header/employer-header.php';

//sql to fetch total number of applications
$sql = "SELECT * FROM applications WHERE employerId  = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$userId]);
$row = $stmt->fetchAll();

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
    $jobId = $_POST['id'];
    $sql = "DELETE FROM jobs WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$jobId]);
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
                                    <span class="font-weight-medium color-text-2 mr-1">8</span>
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
                                                <tr>
                                                    <td>
                                                        <div class="manage-candidate-wrap">
                                                            <h2 class="widget-title pb-1"><a href="job-details.html" class="color-text-2"><?= $details->jobTitle ?></a></h2>
                                                            <p>
                                                                <span><i class="la la-clock-o font-size-16"></i><?php
                                                                                                                function convert_date($fetched_date)
                                                                                                                {
                                                                                                                    $date = DateTime::createFromFormat('Y-m-d H:i:s', $fetched_date);
                                                                                                                    echo "Last Updated" . ' ' . $date->format('M d, Y');
                                                                                                                };
                                                                                                                if ($details->updated_at) {
                                                                                                                    convert_date($details->updated_at);
                                                                                                                } else {
                                                                                                                    convert_date($details->created_at);
                                                                                                                }
                                                                                                                ?></span>
                                                            </p>
                                                        </div><!-- end manage-candidate-wrap -->
                                                    </td>
                                                    <td> <?php
                                                            $sqli = "SELECT * FROM applications WHERE jobId = ?";
                                                            $stmti = $pdo->prepare($sqli);
                                                            $stmti->execute([$details->id]);
                                                            $jobApplicationCount = $stmt->rowCount();
                                                            echo $jobApplicationCount; ?> Application(s)</td>
                                                    <td><?php $date = DateTime::createFromFormat('Y-m-d H:i:s', ($details->created_at));
                                                        echo $date->format('d F Y'); ?></td>
                                                    <td><?php $date = DateTime::createFromFormat('Y-m-d', ($details->deadlineDate));
                                                        echo $date->format('d F Y'); ?></td>
                                                    <td><span class="badge badge-success p-1"><?php if (date('Y-m-d', strtotime($details->deadlineDate)) > date('Y-m-d')) {
                                                                                                    echo "Open";
                                                                                                } else {
                                                                                                    echo "Closed";
                                                                                                } ?></span></td>
                                                    <td class="text-center">
                                                        <div class="manage-candidate-wrap">
                                                            <div class="bread-action pt-0">
                                                                <ul class="info-list">
                                                                    <form action="post" method="htmlspecialchars($_SERVER['PHP_SELF'])">
                                                                        <input type="hidden" name="id" value=<?= $details->id ?>>
                                                                        <li class="d-inline-block"><button class="btn btn-sm" name="edit"><i class="la la-edit" data-toggle="tooltip" data-placement="top" title="Edit"></i></button></li>
                                                                        <li class="d-inline-block"><button class="btn btn-sm" name="delete"><i class="la la-trash" data-toggle="tooltip" data-placement="top" title="Remove"></i></button></li>
                                                                    </form>

                                                                </ul>
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
        <div class="row">
            <div class="col-lg-12">
                <div class="page-navigation-wrap mt-4">
                    <div class="page-navigation mx-auto">
                        <a href="#" class="page-go page-prev">
                            <i class="la la-arrow-left"></i>
                        </a>
                        <ul class="page-navigation-nav">
                            <li><a href="#" class="page-go-link">1</a></li>
                            <li class="active"><a href="#" class="page-go-link">2</a></li>
                            <li><a href="#" class="page-go-link">3</a></li>
                            <li><a href="#" class="page-go-link">4</a></li>
                            <li><a href="#" class="page-go-link">5</a></li>
                        </ul>
                        <a href="#" class="page-go page-next">
                            <i class="la la-arrow-right"></i>
                        </a>
                    </div>
                </div><!-- end page-navigation-wrap -->
            </div><!-- end col-lg-12 -->
        </div><!-- end row -->
    </section>
</main>
<?php include 'inc/footer/footer.php'; ?>