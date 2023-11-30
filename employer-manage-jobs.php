<?php include 'inc/header/employer-header.php'; ?>
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
                                    <span class="font-weight-medium color-text-2 mr-1">12</span>
                                    <span class="font-weight-medium">job(s) Posted</span>
                                </div>
                                <div class="manage-job-count">
                                    <span class="font-weight-medium color-text-2 mr-1">8</span>
                                    <span class="font-weight-medium">Application(s)</span>
                                </div>
                                <div class="manage-job-count">
                                    <span class="font-weight-medium color-text-2 mr-1">6</span>
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
                                        <tr>
                                            <td>
                                                <div class="manage-candidate-wrap">
                                                    <h2 class="widget-title pb-1"><a href="job-details.html" class="color-text-2">Land Development Marketer</a></h2>
                                                    <p>
                                                        <span><i class="la la-clock-o font-size-16"></i> Last Update: Jan 21, 2020 </span>
                                                    </p>
                                                </div><!-- end manage-candidate-wrap -->
                                            </td>
                                            <td>2 Application(s)</td>
                                            <td>10 April, 2019</td>
                                            <td>10 May, 2019</td>
                                            <td><span class="badge badge-success p-1">Active</span></td>
                                            <td class="text-center">
                                                <div class="manage-candidate-wrap">
                                                    <div class="bread-action pt-0">
                                                        <ul class="info-list">
                                                            <li class="d-inline-block"><a href="#"><i class="la la-eye" data-toggle="tooltip" data-placement="top" title="Active"></i></a></li>
                                                            <li class="d-inline-block"><a href="#"><i class="la la-edit" data-toggle="tooltip" data-placement="top" title="Edit"></i></a></li>
                                                            <li class="d-inline-block"><a href="#"><i class="la la-trash" data-toggle="tooltip" data-placement="top" title="Remove"></i></a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="manage-candidate-wrap">
                                                    <h2 class="widget-title pb-1"><a href="job-details.html" class="color-text-2">Regional Sales Manager South</a></h2>
                                                    <p>
                                                        <span><i class="la la-clock-o font-size-16"></i> Last Update: Jan 21, 2020 </span>
                                                    </p>
                                                </div><!-- end manage-candidate-wrap -->
                                            </td>
                                            <td>0 Application(s)</td>
                                            <td>10 April, 2019</td>
                                            <td>10 May, 2019</td>
                                            <td><span class="badge badge-info p-1">Awaiting Activation</span></td>
                                            <td class="text-center">
                                                <div class="manage-candidate-wrap">
                                                    <div class="bread-action pt-0">
                                                        <ul class="info-list">
                                                            <li class="d-inline-block"><a href="#"><i class="la la-eye-slash" data-toggle="tooltip" data-placement="top" title="Awaiting"></i></a></li>
                                                            <li class="d-inline-block"><a href="#"><i class="la la-edit" data-toggle="tooltip" data-placement="top" title="Edit"></i></a></li>
                                                            <li class="d-inline-block"><a href="#"><i class="la la-trash" data-toggle="tooltip" data-placement="top" title="Remove"></i></a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="manage-candidate-wrap">
                                                    <h2 class="widget-title pb-1"><a href="job-details.html" class="color-text-2">Restaurant Team Member - Crew</a></h2>
                                                    <p>
                                                        <span><i class="la la-clock-o font-size-16"></i> Last Update: Jan 21, 2020 </span>
                                                    </p>
                                                </div><!-- end manage-candidate-wrap -->
                                            </td>
                                            <td>1 Application(s)</td>
                                            <td>10 April, 2019</td>
                                            <td>10 May, 2019</td>
                                            <td><span class="badge badge-success p-1">Active</span></td>
                                            <td class="text-center">
                                                <div class="manage-candidate-wrap">
                                                    <div class="bread-action pt-0">
                                                        <ul class="info-list">
                                                            <li class="d-inline-block"><a href="#"><i class="la la-eye" data-toggle="tooltip" data-placement="top" title="Active"></i></a></li>
                                                            <li class="d-inline-block"><a href="#"><i class="la la-edit" data-toggle="tooltip" data-placement="top" title="Edit"></i></a></li>
                                                            <li class="d-inline-block"><a href="#"><i class="la la-trash" data-toggle="tooltip" data-placement="top" title="Remove"></i></a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="manage-candidate-wrap">
                                                    <h2 class="widget-title pb-1"><a href="job-details.html" class="color-text-2">Land Development Marketer</a></h2>
                                                    <p>
                                                        <span><i class="la la-clock-o font-size-16"></i> Last Update: Jan 21, 2020 </span>
                                                    </p>
                                                </div><!-- end manage-candidate-wrap -->
                                            </td>
                                            <td>1 Application(s)</td>
                                            <td>10 April, 2019</td>
                                            <td>10 May, 2019</td>
                                            <td><span class="badge badge-secondary p-1">Inactive</span></td>
                                            <td class="text-center">
                                                <div class="manage-candidate-wrap">
                                                    <div class="bread-action pt-0">
                                                        <ul class="info-list">
                                                            <li class="d-inline-block"><a href="#"><i class="la la-eye-slash" data-toggle="tooltip" data-placement="top" title="Inactive"></i></a></li>
                                                            <li class="d-inline-block"><a href="#"><i class="la la-edit" data-toggle="tooltip" data-placement="top" title="Edit"></i></a></li>
                                                            <li class="d-inline-block"><a href="#"><i class="la la-trash" data-toggle="tooltip" data-placement="top" title="Remove"></i></a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="manage-candidate-wrap">
                                                    <h2 class="widget-title pb-1"><a href="job-details.html" class="color-text-2">Node.js Developer</a></h2>
                                                    <p>
                                                        <span><i class="la la-clock-o font-size-16"></i> Last Update: Jan 21, 2020 </span>
                                                    </p>
                                                </div><!-- end manage-candidate-wrap -->
                                            </td>
                                            <td>1 Application(s)</td>
                                            <td>10 April, 2019</td>
                                            <td>10 May, 2019</td>
                                            <td><span class="badge badge-secondary p-1">Inactive</span></td>
                                            <td class="text-center">
                                                <div class="manage-candidate-wrap">
                                                    <div class="bread-action pt-0">
                                                        <ul class="info-list">
                                                            <li class="d-inline-block"><a href="#"><i class="la la-eye-slash" data-toggle="tooltip" data-placement="top" title="Inactive"></i></a></li>
                                                            <li class="d-inline-block"><a href="#"><i class="la la-edit" data-toggle="tooltip" data-placement="top" title="Edit"></i></a></li>
                                                            <li class="d-inline-block"><a href="#"><i class="la la-trash" data-toggle="tooltip" data-placement="top" title="Remove"></i></a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="manage-candidate-wrap">
                                                    <h2 class="widget-title pb-1"><a href="job-details.html" class="color-text-2">Graphic Design</a></h2>
                                                    <p>
                                                        <span><i class="la la-clock-o font-size-16"></i> Last Update: Jan 21, 2020 </span>
                                                    </p>
                                                </div><!-- end manage-candidate-wrap -->
                                            </td>
                                            <td>1 Application(s)</td>
                                            <td>10 April, 2019</td>
                                            <td>10 May, 2019</td>
                                            <td><span class="badge badge-success p-1">Active</span></td>
                                            <td class="text-center">
                                                <div class="manage-candidate-wrap">
                                                    <div class="bread-action pt-0">
                                                        <ul class="info-list">
                                                            <li class="d-inline-block"><a href="#"><i class="la la-eye" data-toggle="tooltip" data-placement="top" title="Active"></i></a></li>
                                                            <li class="d-inline-block"><a href="#"><i class="la la-edit" data-toggle="tooltip" data-placement="top" title="Edit"></i></a></li>
                                                            <li class="d-inline-block"><a href="#"><i class="la la-trash" data-toggle="tooltip" data-placement="top" title="Remove"></i></a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
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