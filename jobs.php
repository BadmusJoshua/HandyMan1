<?php

include 'inc/header/applicant-header.php';

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
                <div class="row d-flex flex-column">
                    <!-- Left content -->
                    <div class="d-flex flex-row  ">
                        <div class="small-section-tittle2 text-center">
                            <h4>Filter Jobs</h4>
                        </div>
                        <!-- Job Category Listing start -->
                        <div class="job-category-listing mb-50 d-flex flex-row justify-content-evenly">
                            <!-- single three -->
                            <div class="input-box">
                                <div class="form-group user-chosen-select-container">
                                    <select class="user-chosen-select" name="gender" required>
                                        <option value="">Choose Gender</option>
                                        <option value="Male or Female">Male or Female</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>
                                </div>
                            </div>
                            <!-- single one -->
                            <div class="input-box">
                                <div class="form-group user-chosen-select-container">
                                    <select class="user-chosen-select" name="jobType" required>
                                        <option value="">Select Job Type</option>
                                        <option <?php if ($jobType === "Full Time")
                                                    echo 'selected'; ?> value="Full Time">Full Time</option>
                                        <option <?php if ($jobType === "Part Time")
                                                    echo 'selected'; ?> value="Part Time">Part Time</option>
                                        <option <?php if ($jobType === "Freelance")
                                                    echo 'selected'; ?> value="Remote">Remote</option>
                                        <option <?php if ($jobType === "Contract")
                                                    echo 'selected'; ?> value="Contract">Contract</option>
                                        <option <?php if ($jobType === "Internship")
                                                    echo 'selected'; ?> value="Internship">Internship</option>
                                        <option <?php if ($jobType === "Freelance")
                                                    echo 'selected'; ?> value="Freelance">Freelance</option>
                                    </select>
                                </div>
                            </div>
                            <!-- single two -->
                            <div class="input-box">
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
                            <!-- single three -->
                            <div class="input-box">
                                <div class="form-group user-chosen-select-container">
                                    <select class="user-chosen-select" name="industry" required>
                                        <option value="">Select industry</option>
                                        <option value="Healthcare" <?php if ($industry === 'Healthcare') echo ' selected'; ?>>Healthcare</option>
                                        <option value="Education" <?php if ($industry === 'Education') echo ' selected'; ?>>Education</option>
                                        <option value="Information Technology" <?php if ($industry === 'Information Technology') echo ' selected'; ?>>Information Technology</option>
                                        <option value="Business Management" <?php if ($industry === 'Business Management') echo ' selected'; ?>>Business Management</option>
                                        <option value="Sales and Marketing" <?php if ($industry === 'Sales and Marketing') echo ' selected'; ?>>Sales and Marketing</option>
                                        <option value="Banking and Finance" <?php if ($industry === 'Banking and Finance') echo ' selected'; ?>>Banking and Finance</option>
                                        <option value="Engineering" <?php if ($industry === 'Engineering') echo ' selected'; ?>>Engineering</option>
                                        <option value="Customer Service" <?php if ($industry === 'Customer Service') echo ' selected'; ?>>Customer Service</option>
                                        <option value="Human Resources" <?php if ($industry === 'Human Resources') echo ' selected'; ?>>Human Resources</option>
                                        <option value="Construction and Skilled Trades" <?php if ($industry === 'Construction and Skilled Trades') echo ' selected'; ?>>Construction and Skilled Trades</option>
                                        <option value="Hospitality and Tourism" <?php if ($industry === 'Hospitality and Tourism') echo ' selected'; ?>>Hospitality and Tourism</option>
                                        <option value="Retail" <?php if ($industry === 'Retail') echo ' selected'; ?>>Retail</option>
                                        <option value="Manufacture and Production" <?php if ($industry === 'Manufacture and Production') echo ' selected'; ?>>Manufacture and Production</option>
                                        <option value="Legal" <?php if ($industry === 'Legal') echo ' selected'; ?>>Legal</option>
                                        <option value="Media and Communication" <?php if ($industry === 'Media and Communication') echo ' selected'; ?>>Media and Communication</option>
                                        <option value="Science and Research" <?php if ($industry === 'Science and Research') echo ' selected'; ?>>Science and Research</option>
                                        <option value="Art and Design" <?php if ($industry === 'Art and Design') echo ' selected'; ?>>Art and Design</option>
                                        <option value="Agriculture and Farming" <?php if ($industry === 'Agriculture and Farming') echo ' selected'; ?>>Agriculture and Farming</option>
                                        <option value="Government and Public Administration" <?php if ($industry === 'Government and Public Administration') echo ' selected'; ?>>Government and Public Administration</option>
                                        <option value="Transportation and Logistics" <?php if ($industry === 'Transportation and Logistics') echo ' selected'; ?>>Transportation and Logistics</option>
                                        <option value="Real Estate" <?php if ($industry === 'Real Estate') echo ' selected'; ?>>Real Estate</option>
                                        <option value="NonProfit and Social Services" <?php if ($industry === 'NonProfit and Social Services') echo ' selected'; ?>>NonProfit and Social Services</option>
                                        <option value="Insurance" <?php if ($industry === 'Insurance') echo ' selected'; ?>>Insurance</option>
                                        <option value="Fitness and Wellness" <?php if ($industry === 'Fitness and Wellness') echo ' selected'; ?>>Fitness and Wellness</option>
                                        <option value="Energy" <?php if ($industry === 'Energy') echo ' selected'; ?>>Energy</option>
                                        <option value="Consulting" <?php if ($industry === 'Consulting') echo ' selected'; ?>>Consulting</option>
                                        <option value="Security and Law Enforcement" <?php if ($industry === 'Security and Law Enforcement') echo ' selected'; ?>>Security and Law Enforcement</option>
                                        <option value="Writing and Editing" <?php if ($industry === 'Writing and Editing') echo ' selected'; ?>>Writing and Editing</option>
                                        <option value="Performing Arts" <?php if ($industry === 'Performing Arts') echo ' selected'; ?>>Performing Arts</option>
                                        <option value="Sports" <?php if ($industry === 'Sports') echo ' selected'; ?>>Sports</option>
                                        <option value="Telecommunications" <?php if ($industry === 'Telecommunications') echo ' selected'; ?>>Telecommunications</option>
                                        <option value="Personal Care and Beauty Services" <?php if ($industry === 'Personal Care and Beauty Services') echo ' selected'; ?>>Personal Care and Beauty Services</option>
                                        <option value="Digital Marketing" <?php if ($industry === 'Digital Marketing') echo ' selected'; ?>>Digital Marketing</option>
                                        <option value="Journalism" <?php if ($industry === 'Journalism') echo ' selected'; ?>>Journalism</option>
                                    </select>
                                </div>
                            </div>
                            <!-- single three -->
                            <div class="input-box">
                                <div class="form-group user-chosen-select-container">
                                    <select class="user-chosen-select" name="careerLevel" required>
                                        <option value="">Career Level</option>
                                        <option value="Student">Student</option>
                                        <option value="Junior">Junior</option>
                                        <option value="Intermediate">Intermediate</option>
                                        <option value="Senior">Senior</option>
                                        <option value="Manager">Manager</option>
                                        <option value="Executive">Executive</option>
                                    </select>
                                </div><!-- end form-group -->
                            </div>

                            <!-- single three -->
                            <div class="input-box">
                                <div class="form-group user-chosen-select-container">
                                    <select class="user-chosen-select" name="qualification" required>
                                        <option value="">Qualification</option>
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
                            <div class="single-listing">
                                <!-- Range Slider Start -->
                                <aside class="left_widgets p_filter_widgets price_rangs_aside sidebar_box_shadow">

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
                                        <div class="count-job mb-35 text-center">
                                            <span><?= $jobCount ?> Jobs found</span>

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