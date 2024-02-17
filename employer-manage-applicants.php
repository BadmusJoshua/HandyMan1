<?php include 'inc/header/employer-header.php';


//sql to fetch count of applicants for jobs posted by this employee
$sql = "SELECT * FROM applications WHERE employerId = ?";
$stmt = $pdo->prepare($sql);

if ($stmt) {
    $stmt->execute([$userId]);
    $applicantCount = $stmt->rowCount();
    $applicantDetail = $stmt->fetchAll();
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

    <section class="section dashboard">

        <div class="row mt-5">
            <div class="col-lg-12">
                <div class="billing-form-item">
                    <div class="billing-title-wrap">
                        <h3 class="widget-title pb-0"><?= $applicantCount ?> Candidates</h3>
                        <div class="title-shape margin-top-10px"></div>
                    </div><!-- billing-title-wrap -->
                    <div class="billing-content pb-0">
                        <?php
                        if ($applicantDetail) {
                            foreach ($applicantDetail as $applicantInfo) {

                        ?>

                                <div class="manage-candidate-wrap d-flex align-items-center justify-content-between pb-4">
                                    <div class="bread-details d-flex">
                                        <div class="bread-img flex-shrink-0">
                                            <a href="candidate-details.html" class="d-block">
                                                <img src="<?= $image ?>" onerror="this.src='assets/img/profile-img.jpg'" alt="">
                                            </a>
                                        </div>
                                        <div class="manage-candidate-content">
                                            <h2 class="widget-title pb-2"><a href="candidate-details.html" class="color-text-2"><?= $applicantInfo->applicantName ?></a></h2>
                                            <p class="font-size-15">
                                                <span class="mr-2"><i class="la la-envelope-o mr-1"></i><a href="mailto:<?= $applicantInfo->applicantEmail ?>" class="color-text-3"><?= $applicantInfo->applicantEmail ?></a></span>
                                                <span class="mr-2"><i class="la la-phone mr-1"></i><?= $applicantInfo->applicantPhone ?></span>
                                            </p>
                                            <p class="mt-1 font-size-15">
                                                <span class="mr-2"><i class="la la-map mr-1"></i><?= $applicantInfo->address ?></span>
                                                <!-- <span class="rating-rating">
                                                    <span class="rating-count">4.5</span>
                                                    <span class="la la-star"></span>
                                                    <span class="la la-star"></span>
                                                    <span class="la la-star"></span>
                                                    <span class="la la-star"></span>
                                                    <span class="la la-star-half-alt"></span>
                                                </span> -->
                                            <div>
                                                <span class="mr-2">Applied for <?= $applicantInfo->jobTitle ?> </span>

                                            </div>
                                            </p>
                                        </div><!-- end manage-candidate-content -->
                                    </div>
                                    <div class="bread-action">
                                        <ul class="info-list">
                                            <li class="d-inline-block mb-0"><a href="#"><i class="la la-cloud-download" data-toggle="tooltip" data-placement="top" title="Download CV"></i></a></li>
                                            <!-- <li class="d-inline-block mb-0"><a href="#"><i class="la la-envelope-o" data-toggle="tooltip" data-placement="top" title="Send Message"></i></a></li> -->
                                            <li class="d-inline-block mb-0"><a href="#"><i class="la la-trash" data-toggle="tooltip" data-placement="top" title="Remove"></i></a></li>
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
        <div class="row">
    </section>
</main>
<?php include 'inc/footer/footer.php'; ?>