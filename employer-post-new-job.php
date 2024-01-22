<?php
include 'inc/header/employer-header.php';
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
            <a class="nav-link" href="employer-post-new-job.php">
                <i class="bi bi-briefcase-fill"></i>
                <span>Post Job</span>
            </a>
        </li><!-- End Jobs Page Nav -->

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
        <h1>Post New Job</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="employer-index.php">Home</a></li>
                <li class="breadcrumb-item active">Post New Job</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row mt-5">
            <div class="col-lg-12">
                <div class="billing-form-item">
                    <div class="billing-title-wrap">
                        <h3 class="widget-title pb-0">General Information</h3>
                        <div class="title-shape margin-top-10px"></div>
                    </div><!-- billing-title-wrap -->
                    <div class="billing-content">
                        <div class="contact-form-action">
                            <form method="post">
                                <div class="row">
                                    <div class="col-lg-4 column-lg-full">
                                        <div class="input-box company-logo-wrap">
                                            <label class="label-text">Company Logo</label>
                                            <div class="form-group">
                                                <div class="file-upload-wrap file-upload-wrap-2">
                                                    <input type="file" name="files[]" class="multi file-upload-input with-preview w-100" multiple maxlength="1">
                                                    <span class="file-upload-text"><i class="la la-photo mr-2"></i>Upload a Photo</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- end col-lg-4 -->
                                    <div class="col-lg-4 column-lg-full">
                                        <div class="input-box">
                                            <label class="label-text">Job Title</label>
                                            <div class="form-group">
                                                <span class="la la-briefcase form-icon"></span>
                                                <input class="form-control" type="text" name="text" placeholder="Enter job title">
                                            </div>
                                        </div>
                                    </div><!-- end col-lg-4 -->
                                    <div class="col-lg-4 column-lg-full">
                                        <div class="input-box">
                                            <label class="label-text">Username</label>
                                            <div class="form-group">
                                                <span class="la la-pencil-square-o form-icon"></span>
                                                <input class="form-control" type="text" name="text" placeholder="Username">
                                            </div>
                                        </div>
                                    </div><!-- end col-lg-4 -->
                                    <div class="col-lg-4 column-lg-full">
                                        <div class="input-box">
                                            <label class="label-text">Job Type</label>
                                            <div class="form-group user-chosen-select-container">
                                                <select class="user-chosen-select">
                                                    <option value>Select Job Type</option>
                                                    <option value="1">Full Time</option>
                                                    <option value="2">Part Time</option>
                                                    <option value="3">Temporary</option>
                                                    <option value="4">Internship</option>
                                                    <option value="5">Permanent</option>
                                                    <option value="6">Freelance</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div><!-- end col-lg-4 -->
                                    <div class="col-lg-4 column-lg-full">
                                        <div class="input-box">
                                            <label class="label-text">Career Level</label>
                                            <div class="form-group user-chosen-select-container">
                                                <select class="user-chosen-select">
                                                    <option value>Choose One</option>
                                                    <option value="1">Manager</option>
                                                    <option value="2">Officer</option>
                                                    <option value="3">Mobile Designer</option>
                                                    <option value="4">Web Designer</option>
                                                    <option value="5">Product Designer</option>
                                                    <option value="6">Creative Director</option>
                                                    <option value="7">Art Director</option>
                                                    <option value="8">Interaction Designer</option>
                                                    <option value="9">Motion Designer</option>
                                                    <option value="10">Illustrator</option>
                                                    <option value="11">Animator</option>
                                                    <option value="12">Student</option>
                                                    <option value="13">Executive</option>
                                                    <option value="14">Brand Designer</option>
                                                    <option value="15">Mobile Developer</option>
                                                    <option value="16">Front-end Developer</option>
                                                    <option value="17">Content Writer</option>
                                                    <option value="18">Other</option>
                                                </select>
                                            </div><!-- end form-group -->
                                        </div>
                                    </div><!-- end col-lg-4 -->
                                    <div class="col-lg-4 column-lg-full">
                                        <div class="input-box">
                                            <label class="label-text">category</label>
                                            <div class="form-group user-chosen-select-container">
                                                <select class="user-chosen-select">
                                                    <option value>Select a category</option>
                                                    <option value="1">All Category</option>
                                                    <option value="2">Accounting / Finance</option>
                                                    <option value="3">Education</option>
                                                    <option value="4">Design & Creative</option>
                                                    <option value="5">Health Care</option>
                                                    <option value="6">Engineer & Architects</option>
                                                    <option value="7">Marketing & Sales</option>
                                                    <option value="8">Garments / Textile</option>
                                                    <option value="9">Customer Support</option>
                                                    <option value="10">Digital Media</option>
                                                    <option value="11">Telecommunication</option>
                                                </select>
                                            </div><!-- end form-group -->
                                        </div>
                                    </div><!-- end col-lg-4 -->
                                    <div class="col-lg-4 column-lg-full">
                                        <div class="input-box">
                                            <label class="label-text">Offered Salary</label>
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <span class="la la-dollar-sign form-icon"></span>
                                                        <input class="form-control" type="number" placeholder="Min">
                                                    </div>
                                                </div><!-- end col-lg-6 -->
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <span class="la la-dollar-sign form-icon"></span>
                                                        <input class="form-control" type="number" placeholder="Max">
                                                    </div>
                                                </div><!-- end col-lg-6 -->
                                            </div><!-- end row -->
                                        </div>
                                    </div><!-- end col-lg-4 -->
                                    <div class="col-lg-4 column-lg-full">
                                        <div class="input-box">
                                            <label class="label-text">Experience</label>
                                            <div class="form-group user-chosen-select-container">
                                                <select class="user-chosen-select">
                                                    <option value>Choose Experience</option>
                                                    <option value="1">No Experience</option>
                                                    <option value="2">Less than 1 Year</option>
                                                    <option value="3">1 to 2 Year(s)</option>
                                                    <option value="4">2 to 4 Year(s)</option>
                                                    <option value="5">3 to 5 Year(s)</option>
                                                    <option value="3">2 Years</option>
                                                    <option value="4">3 Years</option>
                                                    <option value="5">4 Years</option>
                                                    <option value="6">Over 5 Years</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div><!-- end col-lg-4 -->
                                    <div class="col-lg-4 column-lg-full">
                                        <div class="input-box">
                                            <label class="label-text">Qualification</label>
                                            <div class="form-group user-chosen-select-container">
                                                <select class="user-chosen-select">
                                                    <option value>Choose Qualification</option>
                                                    <option value="1">No Experience</option>
                                                    <option value="2">Matriculation</option>
                                                    <option value="3">Intermediate</option>
                                                    <option value="4">Diploma</option>
                                                    <option value="5">Graduate</option>
                                                    <option value="6">Certificate</option>
                                                    <option value="7">Associate Degree</option>
                                                    <option value="8">Bachelor's Degree</option>
                                                    <option value="9">Master's Degree</option>
                                                    <option value="10">Doctorate Degree</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div><!-- end col-lg-4 -->
                                    <div class="col-lg-4 column-lg-full">
                                        <div class="input-box">
                                            <label class="label-text">Gender</label>
                                            <div class="form-group user-chosen-select-container">
                                                <select class="user-chosen-select" required>
                                                    <option value>Choose Gender</option>
                                                    <option value="1">Male or Female</option>
                                                    <option value="2">Male</option>
                                                    <option value="3">Female</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div><!-- end col-lg-4 -->
                                    <div class="col-lg-4 column-lg-full">
                                        <div class="input-box">
                                            <label class="label-text">Industry</label>
                                            <div class="form-group user-chosen-select-container">
                                                <select class="user-chosen-select" required>
                                                    <option value>Select industry</option>
                                                    <option value="Healthcare" <?php if ($job_category === 'Healthcare') echo 'selected'; ?>>Healthcare</option>
                                                    <option value="Education" <?php if ($job_category === 'Education') echo 'selected'; ?>>Education</option>
                                                    <option value="Information Technology" <?php if ($job_category === 'Information Technology') echo 'selected'; ?>>Information Technology</option>
                                                    <option value="Business Management" <?php if ($job_category === 'Business Management') echo 'selected'; ?>>Business Management</option>
                                                    <option value="Sales and Marketing" <?php if ($job_category === 'Sales and Marketing') echo 'selected'; ?>>Sales and Marketing</option>
                                                    <option value="Banking and Finance" <?php if ($job_category === 'Banking and Finance') echo 'selected'; ?>>Banking and Finance</option>
                                                    <option value="Engineering" <?php if ($job_category === 'Engineering') echo 'selected'; ?>>Engineering</option>
                                                    <option value="Customer Service" <?php if ($job_category === 'Customer Service') echo 'selected'; ?>>Customer Service</option>
                                                    <option value="Human Resources" <?php if ($job_category === 'Human Resources') echo 'selected'; ?>>Human Resources</option>
                                                    <option value="Construction and Skilled Trades" <?php if ($job_category === 'Construction and Skilled Trades') echo 'selected'; ?>>Construction and Skilled Trades</option>
                                                    <option value="Hospitality and Tourism" <?php if ($job_category === 'Hospitality and Tourism') echo 'selected'; ?>>Hospitality and Tourism</option>
                                                    <option value="Retail" <?php if ($job_category === 'Retail') echo 'selected'; ?>>Retail</option>
                                                    <option value="Manufacture and Production" <?php if ($job_category === 'Manufacture and Production') echo 'selected'; ?>>Manufacture and Production</option>
                                                    <option value="Legal" <?php if ($job_category === 'Legal') echo 'selected'; ?>>Legal</option>
                                                    <option value="Media and Communication" <?php if ($job_category === 'Media and Communication') echo 'selected'; ?>>Media and Communication</option>
                                                    <option value="Science and Research" <?php if ($job_category === 'Science and Research') echo 'selected'; ?>>Science and Research</option>
                                                    <option value="Art and Design" <?php if ($job_category === 'Art and Design') echo 'selected'; ?>>Art and Design</option>
                                                    <option value="Agriculture and Farming" <?php if ($job_category === 'Agriculture and Farming') echo 'selected'; ?>>Agriculture and Farming</option>
                                                    <option value="Government and Public Administration" <?php if ($job_category === 'Government and Public Administration') echo 'selected'; ?>>Government and Public Administration</option>
                                                    <option value="Transportation and Logistics" <?php if ($job_category === 'Transportation and Logistics') echo 'selected'; ?>>Transportation and Logistics</option>
                                                    <option value="Real Estate" <?php if ($job_category === 'Real Estate') echo 'selected'; ?>>Real Estate</option>
                                                    <option value="NonProfit and Social Services" <?php if ($job_category === 'NonProfit and Social Services') echo 'selected'; ?>>NonProfit and Social Services</option>
                                                    <option value="Insurance" <?php if ($job_category === 'Insurance') echo 'selected'; ?>>Insurance</option>
                                                    <option value="Fitness and Wellness" <?php if ($job_category === 'Fitness and Wellness') echo 'selected'; ?>>Fitness and Wellness</option>
                                                    <option value="Energy" <?php if ($job_category === 'Energy') echo 'selected'; ?>>Energy</option>
                                                    <option value="Consulting" <?php if ($job_category === 'Consulting') echo 'selected'; ?>>Consulting</option>
                                                    <option value="Security and Law Enforcement" <?php if ($job_category === 'Security and Law Enforcement') echo 'selected'; ?>>Security and Law Enforcement</option>
                                                    <option value="Writing and Editing" <?php if ($job_category === 'Writing and Editing') echo 'selected'; ?>>Writing and Editing</option>
                                                    <option value="Performing Arts" <?php if ($job_category === 'Performing Arts') echo 'selected'; ?>>Performing Arts</option>
                                                    <option value="Sports" <?php if ($job_category === 'Sports') echo 'selected'; ?>>Sports</option>
                                                    <option value="Telecommunications" <?php if ($job_category === 'Telecommunications') echo 'selected'; ?>>Telecommunications</option>
                                                    <option value="Personal Care and Beauty Services" <?php if ($job_category === 'Personal Care and Beauty Services') echo 'selected'; ?>>Personal Care and Beauty Services</option>
                                                    <option value="Digital Marketing" <?php if ($job_category === 'Digital Marketing') echo 'selected'; ?>>Digital Marketing</option>
                                                    <option value="Journalism" <?php if ($job_category === 'Journalism') echo 'selected'; ?>>Journalism</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div><!-- end col-lg-4 -->
                                    <div class="col-lg-4 column-lg-full">
                                        <div class="input-box">
                                            <label class="label-text d-flex align-items-center ">Job Tags<span class="text-muted ml-1">(optional)</span>
                                                <i class="la la-question tip ml-1" data-toggle="tooltip" data-placement="top" title="Comma separate tags, such as required skills or technologies, for this job. Maximum of 5 keywords"></i>
                                            </label>
                                            <div class="form-group user-chosen-select-container">
                                                <select class="user-chosen-select" multiple>
                                                    <option>UI & UX Design</option>
                                                    <option>iOS</option>
                                                    <option>Android</option>
                                                    <option>PHP</option>
                                                    <option>Development</option>
                                                    <option>Laravel</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div><!-- end col-lg-4 -->
                                    <div class="col-lg-4 column-lg-full">
                                        <div class="input-box">
                                            <label class="label-text">Skill Requirements</label>
                                            <div class="form-group user-chosen-select-container">
                                                <select class="user-chosen-select" multiple>
                                                    <option>HTML5</option>
                                                    <option>CSS3</option>
                                                    <option>PHP</option>
                                                    <option>Javascript</option>
                                                    <option>Laravel</option>
                                                    <option>Photoshop</option>
                                                    <option>WordPress</option>
                                                    <option>Vuejs</option>
                                                    <option>React</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div><!-- end col-lg-4 -->
                                    <div class="col-lg-4 column-lg-full">
                                        <div class="input-box">
                                            <label class="label-text">No. Of Vacancy</label>
                                            <div class="form-group user-chosen-select-container">
                                                <select class="user-chosen-select" multiple>
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
                                    <div class="col-lg-4 column-lg-full">
                                        <div class="input-box">
                                            <label class="label-text">Application Deadline Date</label>
                                            <div class="form-group">
                                                <span class="la la-calendar form-icon"></span>
                                                <input class="date-range form-control" type="text" name="daterange" value="2/25/2020">
                                            </div>
                                        </div>
                                    </div><!-- end col-lg-4 -->
                                    <div class="col-lg-12">
                                        <div class="input-box">
                                            <label class="label-text">Job Description</label>
                                            <div class="form-group mb-0">
                                                <textarea class="message-control form-control user-text-editor" name="message"></textarea>
                                            </div>
                                        </div>
                                    </div><!-- end col-lg-12 -->
                                </div><!-- end row -->
                                <div class="row">
                                    <div class="col-12 justify-content-center align-items-center d-flex">
                                        <div class="btn-box mt-4 ">
                                            <button type="submit" class="theme-btn border-0 align-self-center "><i class="la la-plus"></i> Post Job Opening</button>
                                        </div><!-- end btn-box -->
                                    </div>
                                </div>
                            </form>
                        </div><!-- end contact-form-action -->
                    </div><!-- end billing-content -->
                </div><!-- end billing-form-item -->

            </div><!-- end col-lg-12 -->
        </div><!-- end row -->
        </div><!-- end container-fluid -->
        </div>
    </section><!-- end dashboard-area -->
</main>

<?php include 'inc/footer/footer.php'; ?>