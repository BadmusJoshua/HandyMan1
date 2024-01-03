<?php

include 'inc/header/applicant-header.php';
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
                    <!-- Left content -->
                    <div class="col-xl-3 col-lg-3 col-md-4">
                        <!-- Job Category Listing start -->
                        <div class="job-category-listing mb-50">
                            <!-- single one -->
                            <div class="single-listing">
                                <div class="small-section-tittle2">
                                    <h4>Job Category</h4>
                                </div>
                                <!-- Select job items start -->
                                <div class="select-job-items2 input-group">
                                    <select name="select">
                                        <option class="form-control" value="">All Category</option>
                                        <option value="">Category 1</option>
                                        <option value="">Category 2</option>
                                        <option value="">Category 3</option>
                                        <option value="">Category 4</option>
                                    </select>
                                </div>
                                <!--  Select job items End-->
                                <!-- select-Categories start -->
                                <div class="select-Categories pt-2 pb-2">
                                    <div class="small-section-tittle2">
                                        <h4>Job Type</h4>
                                    </div>
                                    <label class="container">Full Time
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                    </label>
                                    <label class="container">Part Time
                                        <input type="checkbox" checked="checked active">
                                        <span class="checkmark"></span>
                                    </label>
                                    <label class="container">Remote
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                    </label>
                                    <label class="container">Freelance
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <!-- select-Categories End -->
                            </div>
                            <!-- single two -->
                            <div class="single-listing">
                                <!-- select-Categories start -->
                                <div class="select-Categories pt-80 pb-50">
                                    <div class="small-section-tittle2">
                                        <h4>Experience</h4>
                                    </div>
                                    <label class="container">1-2 Years
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                    </label>
                                    <label class="container">2-3 Years
                                        <input type="checkbox" checked="checked active">
                                        <span class="checkmark"></span>
                                    </label>
                                    <label class="container">3-6 Years
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                    </label>
                                    <label class="container">6-more..
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <!-- select-Categories End -->
                            </div>
                            <!-- single three -->
                            <div class="single-listing">
                                <!-- select-Categories start -->
                                <div class="select-Categories pb-50">
                                    <div class="small-section-tittle2">
                                        <h4>Posted Within</h4>
                                    </div>
                                    <label class="container">Any
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                    </label>
                                    <label class="container">Today
                                        <input type="checkbox" checked="checked active">
                                        <span class="checkmark"></span>
                                    </label>
                                    <label class="container">Last 2 days
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                    </label>
                                    <label class="container">Last 3 days
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                    </label>
                                    <label class="container">Last 5 days
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                    </label>
                                    <label class="container">Last 10 days
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <!-- select-Categories End -->
                            </div>
                            <div class="single-listing">
                                <!-- Range Slider Start -->
                                <aside class="left_widgets p_filter_widgets price_rangs_aside sidebar_box_shadow">
                                    <div class="small-section-tittle2">
                                        <h4>Filter Jobs</h4>
                                    </div>
                                    <div class="widgets_inner">
                                        <div class="range_item">
                                            <!-- <div id="slider-range"></div> -->
                                            <input type="text" class="js-range-slider" value="" />
                                            <div class="d-flex align-items-center">
                                                <div class="price_text">
                                                    <p>Price :</p>
                                                </div>
                                                <div class="price_value d-flex justify-content-center">
                                                    <input type="text" class="js-input-from" id="amount" readonly />
                                                    <span>to</span>
                                                    <input type="text" class="js-input-to" id="amount" readonly />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </aside>
                                <!-- Range Slider End -->
                            </div>
                        </div>
                        <!-- Job Category Listing End -->
                    </div>
                    <!-- Right content -->
                    <div class="col-xl-9 col-lg-9 col-md-8">
                        <!-- Featured_job_start -->
                        <section class="featured-job-area">
                            <div class="container">
                                <!-- Count of Job list Start -->
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="count-job mb-35">
                                            <span>39, 782 Jobs found</span>

                                        </div>
                                    </div>
                                </div>
                                <!-- Count of Job list End -->
                                <!-- single-job-content -->
                                <div class="row">
                                    <div class="single-job-items mb-5 col-md-6 col-sm-4">
                                        <div class="job-items">
                                            <div class="company-img">
                                                <a href="#"><img src="assets/img/icon/job-list1.png" alt=""></a>
                                            </div>
                                            <div class="job-tittle job-tittle2">
                                                <a href="#">
                                                    <h4>Digital Marketer</h4>
                                                </a>
                                                <ul>
                                                    <li>Creative Agency</li>
                                                    <li><i class="fas fa-map-marker-alt"></i>Athens, Greece</li>
                                                    <li>$3500 - $4000</li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="items-link items-link2 f-right">
                                            <a href="job_details.html">Full Time</a>
                                            <span>7 hours ago</span>
                                        </div>
                                    </div>
                                    <!-- single-job-content -->
                                    <div class="single-job-items mb-5 col-md-6 col-sm-4">
                                        <div class="job-items">
                                            <div class="company-img">
                                                <a href="#"><img src="assets/img/icon/job-list2.png" alt=""></a>
                                            </div>
                                            <div class="job-tittle job-tittle2">
                                                <a href="#">
                                                    <h4>Graphics Designer</h4>
                                                </a>
                                                <ul>
                                                    <li>Fashion Agency</li>
                                                    <li><i class="fas fa-map-marker-alt"></i>Lagos, Nigeria</li>
                                                    <li>$1500 - $2000</li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="items-link items-link2 f-right">
                                            <a href="job_details.html">Full Time</a>
                                            <span>7 hours ago</span>
                                        </div>
                                    </div>
                                    <!-- single-job-content -->
                                    <div class="single-job-items mb-5 col-md-6 col-sm-4">
                                        <div class="job-items">
                                            <div class="company-img">
                                                <a href="#"><img src="assets/img/icon/job-list3.png" alt=""></a>
                                            </div>
                                            <div class="job-tittle job-tittle2">
                                                <a href="#">
                                                    <h4>Software Developer</h4>
                                                </a>
                                                <ul>
                                                    <li>IT Firm</li>
                                                    <li><i class="fas fa-map-marker-alt"></i>Athens, Greece</li>
                                                    <li>$2500 - $3000</li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="items-link items-link2 f-right">
                                            <a href="job_details.html">Full Time</a>
                                            <span>7 hours ago</span>
                                        </div>
                                    </div>
                                    <!-- single-job-content -->
                                    <div class="single-job-items mb-5 col-md-6 col-sm-4">
                                        <div class="job-items">
                                            <div class="company-img">
                                                <a href="#"><img src="assets/img/icon/job-list4.png" alt=""></a>
                                            </div>
                                            <div class="job-tittle job-tittle2">
                                                <a href="#">
                                                    <h4>Lecturer</h4>
                                                </a>
                                                <ul>
                                                    <li>Education</li>
                                                    <li><i class="fas fa-map-marker-alt"></i>Athens, Greece</li>
                                                    <li>$300 - $500</li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="items-link items-link2 f-right">
                                            <a href="job_details.html">Full Time</a>
                                            <span>7 hours ago</span>
                                        </div>
                                    </div>
                                    <!-- single-job-content -->
                                    <div class="single-job-items mb-5 col-md-6 col-sm-4">
                                        <div class="job-items">
                                            <div class="company-img">
                                                <a href="#"><img src="assets/img/icon/job-list1.png" alt=""></a>
                                            </div>
                                            <div class="job-tittle job-tittle2">
                                                <a href="#">
                                                    <h4>Digital Marketer</h4>
                                                </a>
                                                <ul>
                                                    <li>Creative Agency</li>
                                                    <li><i class="fas fa-map-marker-alt"></i>Athens, Greece</li>
                                                    <li>$3500 - $4000</li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="items-link items-link2 f-right">
                                            <a href="job_details.html">Full Time</a>
                                            <span>7 hours ago</span>
                                        </div>
                                    </div>
                                    <!-- single-job-content -->
                                    <div class="single-job-items mb-5 col-md-6 col-sm-4">
                                        <div class="job-items">
                                            <div class="company-img">
                                                <a href="#"><img src="assets/img/icon/job-list3.png" alt=""></a>
                                            </div>
                                            <div class="job-tittle job-tittle2">
                                                <a href="#">
                                                    <h4>Digital Marketer</h4>
                                                </a>
                                                <ul>
                                                    <li>Creative Agency</li>
                                                    <li><i class="fas fa-map-marker-alt"></i>Athens, Greece</li>
                                                    <li>$3500 - $4000</li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="items-link items-link2 f-right">
                                            <a href="job_details.html">Full Time</a>
                                            <span>7 hours ago</span>
                                        </div>
                                    </div>
                                    <!-- single-job-content -->
                                    <div class="single-job-items mb-5 col-md-6 col-sm-4">
                                        <div class="job-items">
                                            <div class="company-img">
                                                <a href="#"><img src="assets/img/icon/job-list4.png" alt=""></a>
                                            </div>
                                            <div class="job-tittle job-tittle2">
                                                <a href="#">
                                                    <h4>Digital Marketer</h4>
                                                </a>
                                                <ul>
                                                    <li>Creative Agency</li>
                                                    <li><i class="fas fa-map-marker-alt"></i>Athens, Greece</li>
                                                    <li>$3500 - $4000</li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="items-link items-link2 f-right">
                                            <a href="job_details.html">Full Time</a>
                                            <span>7 hours ago</span>
                                        </div>
                                    </div>
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