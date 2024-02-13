<?php
include 'inc/header/employer-header.php';
$updated = $status = '';
if (isset($_POST['updateJob'])) {

    // Retrieve form data
    $jobTitle = isset($_POST['jobTitle']) ? filter_input(INPUT_POST, 'jobTitle', FILTER_SANITIZE_FULL_SPECIAL_CHARS) : '';
    $jobType = isset($_POST['jobType']) ? filter_input(INPUT_POST, 'jobType', FILTER_SANITIZE_FULL_SPECIAL_CHARS) : '';
    $careerLevel = isset($_POST['careerLevel']) ? filter_input(INPUT_POST, 'careerLevel', FILTER_SANITIZE_FULL_SPECIAL_CHARS) : '';
    $minOffer = isset($_POST['minOffer']) ? filter_input(INPUT_POST, 'minOffer', FILTER_SANITIZE_FULL_SPECIAL_CHARS) : '';
    $maxOffer = isset($_POST['maxOffer']) ? filter_input(INPUT_POST, 'maxOffer', FILTER_SANITIZE_FULL_SPECIAL_CHARS) : '';
    $deadlineDate = isset($_POST['deadlineDate']) ? filter_input(INPUT_POST, 'deadlineDate', FILTER_SANITIZE_FULL_SPECIAL_CHARS) : '';
    if (date('Y-m-d', strtotime($deadlineDate)) > date('Y-m-d')) {
        $status === '1';
    } else {
        $status === '2';
    }
    $jobDescription = isset($_POST['jobDescription']) ? filter_input(INPUT_POST, 'jobDescription', FILTER_SANITIZE_FULL_SPECIAL_CHARS) : '';
    $industry = isset($_POST['industry']) ? filter_input(INPUT_POST, 'industry', FILTER_SANITIZE_FULL_SPECIAL_CHARS) : '';
    $gender = isset($_POST['gender']) ? filter_input(INPUT_POST, 'gender', FILTER_SANITIZE_FULL_SPECIAL_CHARS) : '';
    $qualification = isset($_POST['qualification']) ? filter_input(INPUT_POST, 'qualification', FILTER_SANITIZE_FULL_SPECIAL_CHARS) : '';
    $skill = isset($_POST['skill']) ? filter_input(INPUT_POST, 'skill', FILTER_SANITIZE_FULL_SPECIAL_CHARS) : '';
    $experience = isset($_POST['experience']) ? filter_input(INPUT_POST, 'experience', FILTER_SANITIZE_FULL_SPECIAL_CHARS) : '';
    $vacancy = isset($_POST['vacancy']) ? filter_input(INPUT_POST, 'vacancy', FILTER_SANITIZE_NUMBER_INT) : '';
    $id = isset($_POST['id']) ? filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT) : '';

    // File upload handling
    if (!empty($_FILES['logo']['tmp_name'])) {
        //delete former logo

        //handle new logo
        $fileExt = strtolower(pathinfo($_FILES['logo']['name'], PATHINFO_EXTENSION));
        $fileName = uniqid('company_logo') . '.' . $fileExt;
        $uploadDirectory = 'uploads/companyLogos';

        if (!file_exists($uploadDirectory)) {
            mkdir($uploadDirectory, 0777, true);
        }

        $uploadFile = $uploadDirectory . '/' . $fileName;
        $acceptedExt = array('jpeg', 'jpg', 'png');

        if (in_array($fileExt, $acceptedExt)) {
            move_uploaded_file($_FILES['logo']['tmp_name'], $uploadFile);
            $logo = $uploadFile;
        } else {
            $fileErr = 1;
        }
    } else {
        $logo = '';
    }

    // Prepare and execute SQL query
    $sqla = "UPDATE jobs SET skill=?, qualification=?, gender=?, industry=?, jobDescription=?, deadlineDate=?, maxOffer=?, minOffer=?, careerLevel=?, jobType=?, jobTitle=?, logo=?, experience=?, vacancy=?, status =? WHERE id = ?";
    $stmta = $pdo->prepare($sqla);
    $stmta->execute([$skill, $qualification, $gender, $industry, $jobDescription, $deadlineDate, $maxOffer, $minOffer, $careerLevel, $jobType, $jobTitle, $logo, $experience, $vacancy, $status, $id]);
    $updated = '1';
}
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM jobs WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$id]);
    $jobDetails = $stmt->fetch();
    $jobType = $jobDetails->jobType;
    $jobTitle = $jobDetails->jobTitle;
    $minOffer = $jobDetails->minOffer;
    $maxOffer = $jobDetails->maxOffer;
    $deadlineDate = $jobDetails->deadlineDate;
    $careerLevel = $jobDetails->careerLevel;
    $industry = $jobDetails->industry;
    $gender = $jobDetails->gender;
    $qualification = $jobDetails->qualification;
    $skill = $jobDetails->skill;
    $jobDescription = $jobDetails->jobDescription;
    $vacancy = $jobDetails->vacancy;
    $experience = $jobDetails->experience;
    $status = $jobDetails->status;
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
            <a class="nav-link collapsed" href="employer-profile.php">
                <i class="bi bi-person"></i>
                <span>Profile</span>
            </a>
        </li><!-- End Profile Page Nav -->

        <li class="nav-item">
            <a class="nav-link" href="employer-post-new-job.php">
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
        <h1>Edit Job Details</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="employer-index.php">Home</a></li>
                <li class="breadcrumb-item active">Edit Job Details</li>
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
                            <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" enctype="multipart/form-data">
                                <?php
                                if ($updated) {
                                    echo '<div class="alert alert-success text-center alert-dismissible fade show" role="alert">
                          Job details updated successfully!
                          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>';
                                    header("Location:employer-manage-jobs.php");
                                }
                                ?>
                                <div class="row">
                                    <div class="col-lg-6 column-lg-full">
                                        <div class="input-box company-logo-wrap">
                                            <label class="label-text">Company Logo</label>
                                            <div class="form-group">
                                                <div class="file-upload-wrap file-upload-wrap-2">
                                                    <input type="file" name="logo" class="multi file-upload-input with-preview w-100" multiple maxlength="1">
                                                    <span class="file-upload-text"><i class="la la-photo mr-2"></i>Upload a Photo</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- end col-lg-4 -->
                                    <div class="col-lg-6 column-lg-full">
                                        <div class="input-box">
                                            <label class="label-text">Job Title</label>
                                            <div class="form-group">
                                                <span class="la la-briefcase form-icon"></span>
                                                <input class="form-control" type="text" name="jobTitle" placeholder="Enter job title" value="<?= $jobTitle ?>">
                                            </div>
                                        </div>
                                    </div><!-- end col-lg-4 -->
                                </div>
                                <div class="row">
                                    <div class="col-lg-4 column-lg-full">
                                        <div class="input-box">
                                            <label class="label-text">Job Type</label>
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
                                    </div><!-- end col-lg-4 -->
                                    <div class="col-lg-4 column-lg-full">

                                        <div class="input-box">
                                            <label class="label-text">Industry</label>
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
                                    </div><!-- end col-lg-4 -->
                                    <div class="col-lg-4 column-lg-full">
                                        <div class="input-box">
                                            <label class="label-text">Experience</label>
                                            <div class="form-group user-chosen-select-container">
                                                <select class="user-chosen-select" name="experience" required>
                                                    <option value="">Choose Experience</option>
                                                    <option <?php if ($experience === "No Experience") echo 'selected'; ?> value="No Experience">No Experience</option>
                                                    <option <?php if ($experience === "Less than 1 Year") echo 'selected'; ?> value="Less than 1 Year">Less than 1 Year</option>
                                                    <option <?php if ($experience === "1 to 2 Year(s)") echo 'selected'; ?> value="1 to 2 Year(s)">1 to 2 Year(s)</option>
                                                    <option <?php if ($experience === "2 to 4 Year(s)") echo 'selected'; ?> value="2 to 4 Year(s)">2 to 4 Year(s)</option>
                                                    <option <?php if ($experience === "3 to 5 Year(s)") echo 'selected'; ?> value="3 to 5 Year(s)">3 to 5 Year(s)</option>
                                                    <option <?php if ($experience === "2 Years") echo 'selected'; ?> value="2 Years">2 Years</option>
                                                    <option <?php if ($experience === "3 Years") echo 'selected'; ?> value="3 Years">3 Years</option>
                                                    <option <?php if ($experience === "4 Years") echo 'selected'; ?> value="4 Years">4 Years</option>
                                                    <option <?php if ($experience === "Over 5 Years") echo 'selected'; ?> value="Over 5 Years">Over 5 Years</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4 column-lg-full">
                                        <div class="input-box">
                                            <label class="label-text">Career Level</label>
                                            <div class="form-group user-chosen-select-container">
                                                <select class="user-chosen-select" name="careerLevel" required>
                                                    <option value="">Choose One</option>
                                                    <option <?php if ($careerLevel === "Student")
                                                                echo 'selected'; ?> value="Student">Student</option>
                                                    <option <?php if ($careerLevel === "Junior")
                                                                echo 'selected'; ?> value="Junior">Junior</option>
                                                    <option <?php if ($careerLevel === "Intermediate")
                                                                echo 'selected'; ?> value="Intermediate">Intermediate</option>
                                                    <option <?php if ($careerLevel === "Senior")
                                                                echo 'selected'; ?> value="Senior">Senior</option>
                                                    <option <?php if ($careerLevel === "Manager")
                                                                echo 'selected'; ?> value="Manager">Manager</option>
                                                    <option <?php if ($careerLevel === "Executive")
                                                                echo 'selected'; ?> value="Executive">Executive</option>
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
                                                    <option <?php if ($qualification === "None Required")
                                                                echo 'selected'; ?> value="None Required">None Required</option>
                                                    <option <?php if ($qualification === "SSCE")
                                                                echo 'selected'; ?> value="SSCE">SSCE</option>
                                                    <option <?php if ($qualification === "OND")
                                                                echo 'selected'; ?> value="OND">OND</option>
                                                    <option <?php if ($qualification === "HND")
                                                                echo 'selected'; ?> value="HND">HND</option>
                                                    <option <?php if ($qualification === "Diploma")
                                                                echo 'selected'; ?> value="Diploma">Diploma</option>
                                                    <option <?php if ($qualification === "Graduate")
                                                                echo 'selected'; ?> value="Graduate">Graduate</option>
                                                    <option <?php if ($qualification === "Associate Degree")
                                                                echo 'selected'; ?> value="Associate Degree">Associate Degree</option>
                                                    <option <?php if ($qualification === "Bachelor's Degree")
                                                                echo 'selected'; ?> value="Bachelor's Degree">Bachelor's Degree</option>
                                                    <option <?php if ($qualification === "Master's Degree")
                                                                echo 'selected'; ?> value="Master's Degree">Master's Degree</option>
                                                    <option <?php if ($qualification === "Doctorate Degree")
                                                                echo 'selected'; ?> value="Doctorate Degree">Doctorate Degree</option>
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
                                                    <option <?php if ($gender === "Male or Female") echo 'selected'; ?> value="Male or Female">Male or Female</option>
                                                    <option <?php if ($gender === "Male") echo 'selected'; ?> value="Male">Male</option>
                                                    <option <?php if ($gender === "Female") echo 'selected'; ?> value="Female">Female</option>
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
                                                    <input class="form-control" type="number" placeholder="Min" name="minOffer" value="<?= $minOffer ?>" required>
                                                </div>
                                                <div class="form-group">
                                                    <span class="la la-dollar-sign form-icon"></span>
                                                    <input class="form-control" type="number" placeholder="Max" name="maxOffer" value="<?= $maxOffer ?>" required>
                                                </div>
                                            </div><!-- end row -->
                                        </div>
                                    </div><!-- end col-lg-4 -->
                                    <div class="col-lg-6 column-lg-full">
                                        <div class="input-box">
                                            <label class="label-text">Skill Requirements</label>
                                            <div class="form-group mb-0">
                                                <textarea class="message-control form-control user-text-editor" name="skill" id="skill" cols="30" rows="5" placeholder="list skills separated with a comma" required><?= $skill ?></textarea>
                                            </div>
                                        </div>
                                    </div><!-- end col-lg-4 -->

                                    <div class=" row">
                                        <div class="col-lg-2 column-lg-full">
                                            <div class="input-box">
                                                <label class="label-text">No. Of Vacancy</label>
                                                <div class="form-group user-chosen-select-container">
                                                    <select class="user-chosen-select" name="vacancy" required>
                                                        <option <?php if ($vacancy == '')
                                                                    echo 'selected'; ?> value=''>Choose an option</option>
                                                        <option <?php if ($vacancy == '1')
                                                                    echo 'selected'; ?> value='1'>1</option>
                                                        <option <?php if ($vacancy == '2')
                                                                    echo 'selected'; ?> value='2'>2</option>
                                                        <option <?php if ($vacancy == '3')
                                                                    echo 'selected'; ?> value='3'>3</option>
                                                        <option <?php if ($vacancy == '4')
                                                                    echo 'selected'; ?> value='4'>4</option>
                                                        <option <?php if ($vacancy == '5')
                                                                    echo 'selected'; ?> value='5'>5</option>
                                                        <option <?php if ($vacancy == '6')
                                                                    echo 'selected'; ?> value='6'>6</option>
                                                        <option <?php if ($vacancy == '7')
                                                                    echo 'selected'; ?> value='7'>7</option>
                                                        <option <?php if ($vacancy == '8')
                                                                    echo 'selected'; ?> value='8'>8</option>
                                                        <option <?php if ($vacancy == '9')
                                                                    echo 'selected'; ?> value='9'>9</option>
                                                        <option <?php if ($vacancy == '10')
                                                                    echo 'selected'; ?> value='10'>10</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div><!-- end col-lg-4 -->
                                        <div class="col-lg-4 column-lg-full">
                                            <div class="input-box">
                                                <label class="label-text">Application Deadline Date</label>
                                                <div class="form-group">
                                                    <span class="la la-calendar form-icon"></span>
                                                    <input type="date" name="deadlineDate" id="" class="date-range form-control" placeholder="YYYY-MM-DD" value="<?= $deadlineDate ?>">
                                                </div>
                                            </div>
                                        </div><!-- end col-lg-4 -->
                                        <div class="col-lg-6 column-lg-full">
                                            <div class="input-box">
                                                <label class="label-text">Job Description</label>
                                                <div class="form-group mb-0">
                                                    <textarea class="message-control form-control user-text-editor" name="jobDescription" id="jobDescription" cols="30" rows="5" required><?= $jobDescription ?></textarea>
                                                </div>
                                            </div>
                                        </div><!-- end col-lg-12 -->
                                    </div>
                                    <div class="col-lg-6 column-lg-full">
                                        <div class="input-box">
                                            <label class="label-text">Job Description</label>
                                            <div class="form-group mb-0">
                                                <input type="hidden" name="id" value=<?= $id ?>>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">

                                        <div class="col-12 justify-content-center align-items-center d-flex">
                                            <div class="btn-box mt-4">
                                                <button class="theme-btn border-0 align-self-center" name="updateJob"><i class="la la-plus"></i> Update Job Opening</button>
                                            </div><!-- end btn-box -->
                                        </div>
                                    </div>
                            </form>
                        </div><!-- end contact-form-action -->
                    </div><!-- end billing-content -->
                </div><!-- end billing-form-item -->

            </div><!-- end col-lg-12 -->
        </div><!-- end row -->
    </section><!-- end dashboard-area -->
</main>

<?php include 'inc/footer/footer.php'; ?>