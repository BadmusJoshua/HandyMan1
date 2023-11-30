<?php include 'inc/header/employer-header.php'; ?>
<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link " href="employer-index.php">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li><!-- End Dashboard Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="profile.php">
                <i class="bi bi-person"></i>
                <span>Profile</span>
            </a>
        </li><!-- End Profile Page Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="meetings.php">
                <i class="ri-building-4-line"></i>
                <span>Meetings</span>
            </a>
        </li><!-- End Meeting Page Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="employer-manage-jobs.php">
                <i class="bi bi-briefcase-fill"></i>
                <span>Manage Jobs</span>
            </a>
        </li><!-- End Jobs Page Nav -->

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
        </li><!-- End suggestion in Page Nav -->
    </ul>

</aside><!-- End Sidebar-->

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Dashboard</h1>
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
                        <h3 class="widget-title pb-0">23 Candidates</h3>
                        <div class="title-shape margin-top-10px"></div>
                    </div><!-- billing-title-wrap -->
                    <div class="billing-content pb-0">
                        <div class="manage-candidate-wrap d-flex align-items-center justify-content-between pb-4">
                            <div class="bread-details d-flex">
                                <div class="bread-img flex-shrink-0">
                                    <a href="candidate-details.html" class="d-block">
                                        <img src="images/small-team1.jpg" alt="">
                                    </a>
                                </div>
                                <div class="manage-candidate-content">
                                    <h2 class="widget-title pb-2"><a href="candidate-details.html" class="color-text-2">David Johnston</a></h2>
                                    <p class="font-size-15">
                                        <span class="mr-2"><i class="la la-envelope-o mr-1"></i><a href="mailto:david@example.com" class="color-text-3">david@example.com</a></span>
                                        <span class="mr-2"><i class="la la-phone mr-1"></i>+61 23 8093 3400</span>
                                    </p>
                                    <p class="mt-1 font-size-15">
                                        <span class="mr-2"><i class="la la-map mr-1"></i>New York, United State</span>
                                        <span class="rating-rating">
                                            <span class="rating-count">4.5</span>
                                            <span class="la la-star"></span>
                                            <span class="la la-star"></span>
                                            <span class="la la-star"></span>
                                            <span class="la la-star"></span>
                                            <span class="la la-star-half-alt"></span>
                                        </span>
                                    </p>
                                </div><!-- end manage-candidate-content -->
                            </div>
                            <div class="bread-action">
                                <ul class="info-list">
                                    <li class="d-inline-block mb-0"><a href="#"><i class="la la-cloud-download" data-toggle="tooltip" data-placement="top" title="Download CV"></i></a></li>
                                    <li class="d-inline-block mb-0"><a href="#"><i class="la la-envelope-o" data-toggle="tooltip" data-placement="top" title="Send Message"></i></a></li>
                                    <li class="d-inline-block mb-0"><a href="#"><i class="la la-trash" data-toggle="tooltip" data-placement="top" title="Remove"></i></a></li>
                                </ul>
                            </div>
                        </div><!-- end manage-candidate-wrap -->
                        <div class="section-block"></div>
                        <div class="manage-candidate-wrap d-flex align-items-center justify-content-between pb-4 pt-4">
                            <div class="bread-details d-flex">
                                <div class="bread-img flex-shrink-0">
                                    <a href="candidate-details.html" class="d-block">
                                        <img src="images/small-team2.jpg" alt="">
                                    </a>
                                </div>
                                <div class="manage-candidate-content">
                                    <h2 class="widget-title pb-2"><a href="candidate-details.html" class="color-text-2">David Ortega</a></h2>
                                    <p class="font-size-15">
                                        <span class="mr-2"><i class="la la-envelope-o mr-1"></i><a href="mailto:davidortega@example.com" class="color-text-3">davidortega@example.com</a></span>
                                        <span class="mr-2"><i class="la la-phone mr-1"></i>+61 23 8093 3400</span>
                                    </p>
                                    <p class="mt-1 font-size-15">
                                        <span class="mr-2"><i class="la la-map mr-1"></i>New York, United State</span>
                                        <span class="rating-rating">
                                            <span class="rating-count">4.5</span>
                                            <span class="la la-star"></span>
                                            <span class="la la-star"></span>
                                            <span class="la la-star"></span>
                                            <span class="la la-star"></span>
                                            <span class="la la-star-half-alt"></span>
                                        </span>
                                    </p>
                                </div><!-- end manage-candidate-content -->
                            </div>
                            <div class="bread-action">
                                <ul class="info-list">
                                    <li class="d-inline-block mb-0"><a href="#"><i class="la la-cloud-download" data-toggle="tooltip" data-placement="top" title="Download CV"></i></a></li>
                                    <li class="d-inline-block mb-0"><a href="#"><i class="la la-envelope-o" data-toggle="tooltip" data-placement="top" title="Send Message"></i></a></li>
                                    <li class="d-inline-block mb-0"><a href="#"><i class="la la-trash" data-toggle="tooltip" data-placement="top" title="Remove"></i></a></li>
                                </ul>
                            </div>
                        </div><!-- end manage-candidate-wrap -->
                        <div class="section-block"></div>
                        <div class="manage-candidate-wrap d-flex align-items-center justify-content-between pb-4 pt-4">
                            <div class="bread-details d-flex">
                                <div class="bread-img flex-shrink-0">
                                    <a href="candidate-details.html" class="d-block">
                                        <img src="images/small-team3.jpg" alt="">
                                    </a>
                                </div>
                                <div class="manage-candidate-content">
                                    <h2 class="widget-title pb-2"><a href="candidate-details.html" class="color-text-2">Johnathan Doe</a></h2>
                                    <p class="font-size-15">
                                        <span class="mr-2"><i class="la la-envelope-o mr-1"></i><a href="mailto:johnathan@example.com" class="color-text-3">johnathan@example.com</a></span>
                                        <span class="mr-2"><i class="la la-phone mr-1"></i>+61 23 8093 3400</span>
                                    </p>
                                    <p class="mt-1 font-size-15">
                                        <span class="mr-2"><i class="la la-map mr-1"></i>New York, United State</span>
                                        <span class="rating-rating">
                                            <span class="rating-count">4.5</span>
                                            <span class="la la-star"></span>
                                            <span class="la la-star"></span>
                                            <span class="la la-star"></span>
                                            <span class="la la-star"></span>
                                            <span class="la la-star-half-alt"></span>
                                        </span>
                                    </p>
                                </div><!-- end manage-candidate-content -->
                            </div>
                            <div class="bread-action">
                                <ul class="info-list">
                                    <li class="d-inline-block mb-0"><a href="#"><i class="la la-cloud-download" data-toggle="tooltip" data-placement="top" title="Download CV"></i></a></li>
                                    <li class="d-inline-block mb-0"><a href="#"><i class="la la-envelope-o" data-toggle="tooltip" data-placement="top" title="Send Message"></i></a></li>
                                    <li class="d-inline-block mb-0"><a href="#"><i class="la la-trash" data-toggle="tooltip" data-placement="top" title="Remove"></i></a></li>
                                </ul>
                            </div>
                        </div><!-- end manage-candidate-wrap -->
                        <div class="section-block"></div>
                        <div class="manage-candidate-wrap d-flex align-items-center justify-content-between pb-4 pt-4">
                            <div class="bread-details d-flex">
                                <div class="bread-img flex-shrink-0">
                                    <a href="candidate-details.html" class="d-block">
                                        <img src="images/small-team4.jpg" alt="">
                                    </a>
                                </div>
                                <div class="manage-candidate-content">
                                    <h2 class="widget-title pb-2"><a href="candidate-details.html" class="color-text-2">Albert Dua</a></h2>
                                    <p class="font-size-15">
                                        <span class="mr-2"><i class="la la-envelope-o mr-1"></i><a href="mailto:albert@example.com" class="color-text-3">albert@example.com</a></span>
                                        <span class="mr-2"><i class="la la-phone mr-1"></i>+61 23 8093 3400</span>
                                    </p>
                                    <p class="mt-1 font-size-15">
                                        <span class="mr-2"><i class="la la-map mr-1"></i>New York, United State</span>
                                        <span class="rating-rating">
                                            <span class="rating-count">4.5</span>
                                            <span class="la la-star"></span>
                                            <span class="la la-star"></span>
                                            <span class="la la-star"></span>
                                            <span class="la la-star"></span>
                                            <span class="la la-star-half-alt"></span>
                                        </span>
                                    </p>
                                </div><!-- end manage-candidate-content -->
                            </div>
                            <div class="bread-action">
                                <ul class="info-list">
                                    <li class="d-inline-block mb-0"><a href="#"><i class="la la-cloud-download" data-toggle="tooltip" data-placement="top" title="Download CV"></i></a></li>
                                    <li class="d-inline-block mb-0"><a href="#"><i class="la la-envelope-o" data-toggle="tooltip" data-placement="top" title="Send Message"></i></a></li>
                                    <li class="d-inline-block mb-0"><a href="#"><i class="la la-trash" data-toggle="tooltip" data-placement="top" title="Remove"></i></a></li>
                                </ul>
                            </div>
                        </div><!-- end manage-candidate-wrap -->
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