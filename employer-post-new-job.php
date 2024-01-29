<?php
include 'inc/header/employer-header.php';
if (isset($_POST['postJob'])) {
    !empty($_POST['jobTitle']) ? $jobTitle = filter_input(INPUT_POST, 'jobTitle', FILTER_SANITIZE_FULL_SPECIAL_CHARS) : '';

    !empty($_POST['jobType']) ? $jobType = filter_input(INPUT_POST, 'jobType', FILTER_SANITIZE_FULL_SPECIAL_CHARS) : '';

    !empty($_POST['careerLevel']) ? $careerLevel = filter_input(INPUT_POST, 'careerLevel', FILTER_SANITIZE_FULL_SPECIAL_CHARS) : '';

    !empty($_POST['minOffer']) ? $minOffer = filter_input(INPUT_POST, 'minOffer', FILTER_SANITIZE_FULL_SPECIAL_CHARS) : '';

    !empty($_POST['maxOffer']) ? $maxOffer = filter_input(INPUT_POST, 'maxOffer', FILTER_SANITIZE_FULL_SPECIAL_CHARS) : '';

    !empty($_POST['deadlineDate']) ? $deadlineDate = filter_input(INPUT_POST, 'deadlineDate', FILTER_SANITIZE_FULL_SPECIAL_CHARS) : '';

    !empty($_POST['jobDescription']) ? $jobDescription = filter_input(INPUT_POST, 'jobDescription', FILTER_SANITIZE_FULL_SPECIAL_CHARS) : '';

    !empty($_POST['industry']) ? $industry = filter_input(INPUT_POST, 'industry', FILTER_SANITIZE_FULL_SPECIAL_CHARS) : '';

    !empty($_POST['gender']) ? $gender = filter_input(INPUT_POST, 'gender', FILTER_SANITIZE_FULL_SPECIAL_CHARS) : '';

    !empty($_POST['qualification']) ? $qualification = filter_input(INPUT_POST, 'qualification', FILTER_SANITIZE_FULL_SPECIAL_CHARS) : '';

    !empty($_POST['skill']) ? $skill = filter_input(INPUT_POST, 'skill', FILTER_SANITIZE_FULL_SPECIAL_CHARS) : '';

    if (!empty($_FILES['logo']['tmp_name'])) {
        // Extract file extension
        $fileExt = strtolower(pathinfo($_FILES['logo']['name'], PATHINFO_EXTENSION));

        // Generate a unique filename
        $fileName = uniqid('company_logo') . '.' . $fileExt;

        // Specify the upload directory
        $uploadDirectory = 'uploads/companyLogos';

        // Ensure upload directory exists, create it if not
        if (!file_exists($uploadDirectory)) {
            mkdir($uploadDirectory, 0777, true);
        }

        // Construct the full path to the uploaded file
        $uploadFile = $uploadDirectory . '/' . $fileName;

        // Define accepted file types
        $acceptedExt = array('jpeg', 'jpg', 'png');

        // Check if the file type is accepted
        if (in_array($fileExt, $acceptedExt)) {
            // Move the uploaded file to the upload directory
            move_uploaded_file($_FILES['logo']['tmp_name'], $uploadFile);
            // Store the path to the uploaded file
            $logo = $uploadFile;
        } else {
            // Set error flag for unaccepted file type
            $fileErr = 1;
        }
    } else {
        // Set $logo to an empty string if no file was uploaded
        $logo = '';
    }

    $sql = "INSERT INTO jobs (skill, qualification,gender,industry,jobDescription,deadlineDate,maxOffer,minOffer,careerLevel, jobType, jobTitle, userId, logo) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$skill, $qualification, $gender, $industry, $jobDescription, $deadlineDate, $maxOffer, $minOffer, $careerLevel, $jobType, $jobTitle, $userId, $logo]);
}
?>

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
                            <form method="post" action="<?php htmlspecialchars($_SERVER['PHP_SELF']); ?>" multipart/form-data : "enctype">
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
                                                <input class="form-control" type="text" name="jobTitle" placeholder="Enter job title">
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
                                                    <option value>Select Job Type</option>
                                                    <option value="Full Time">Full Time</option>
                                                    <option value="Part Time">Part Time</option>
                                                    <option value="Contract">Contract</option>
                                                    <option value="Internship">Internship</option>
                                                    <option value="Freelance">Freelance</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div><!-- end col-lg-4 -->
                                    <div class="col-lg-4 column-lg-full">
                                        <div class="input-box">
                                            <label class="label-text">Career Level</label>
                                            <div class="form-group user-chosen-select-container">
                                                <select class="user-chosen-select" name="careerLevel" required>
                                                    <option value>Choose One</option>
                                                    <option value="Student">Student</option>
                                                    <option value="Junior">Junior</option>
                                                    <option value="Intermediate">Intermediate</option>
                                                    <option value="Senior">Senior</option>
                                                    <option value="Manager">Manager</option>
                                                    <option value="Executive">Executive</option>

                                            </div><!-- end form-group -->
                                        </div>
                                    </div><!-- end col-lg-4 -->
                                </div>
                                <div class="row">
                                    <div class="col-lg-4 column-lg-full">
                                        <div class="input-box">
                                            <label class="label-text">Experience</label>
                                            <div class="form-group user-chosen-select-container">
                                                <select class="user-chosen-select" name="experience" required>
                                                    <option value>Choose Experience</option>
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
                                    </div>end col-lg-4
                                    <div class="col-lg-4 column-lg-full">
                                        <div class="input-box">
                                            <label class="label-text">Qualification</label>
                                            <div class="form-group user-chosen-select-container">
                                                <select class="user-chosen-select" name="qualification" required>
                                                    <option value>Choose Qualification</option>
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
                                    </div><!-- end col-lg-4 -->
                                    <div class="col-lg-4 column-lg-full">
                                        <div class="input-box">
                                            <label class="label-text">Gender</label>
                                            <div class="form-group user-chosen-select-container">
                                                <select class="user-chosen-select" name="gender" required>
                                                    <option value>Choose Gender</option>
                                                    <option value="Male or Female">Male or Female</option>
                                                    <option value="Male">Male</option>
                                                    <option value="Female">Female</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div><!-- end col-lg-4 -->
                                </div>
                                <div class="row">
                                    <div class="col-lg-4 column-lg-full">
                                        <div class="input-box">
                                            <label class="label-text">Offered Salary</label>
                                            <div class="d-flex flex-row gap-2">

                                                <div class="form-group">
                                                    <span class="la la-dollar-sign form-icon"></span>
                                                    <input class="form-control" type="number" placeholder="Min" name="minOffer" required>
                                                </div>

                                                <div class="form-group">
                                                    <span class="la la-dollar-sign form-icon"></span>
                                                    <input class="form-control" type="number" placeholder="Max" name="maxOffer" required>
                                                </div>

                                            </div><!-- end row -->
                                        </div>
                                    </div><!-- end col-lg-4 -->
                                    <div class="col-lg-4 column-lg-full">
                                        <div class="input-box">
                                            <label class="label-text">Industry</label>
                                            <div class="form-group user-chosen-select-container">
                                                <select class="user-chosen-select" name="industry" required>
                                                    <option value>Select industry</option>
                                                    <option value="Healthcare" <?php if ($industry === 'Healthcare') echo 'selected'; ?>>Healthcare</option>
                                                    <option value="Education" <?php if ($industry === 'Education') echo 'selected'; ?>>Education</option>
                                                    <option value="Information Technology" <?php if ($industry === 'Information Technology') echo 'selected'; ?>>Information Technology</option>
                                                    <option value="Business Management" <?php if ($industry === 'Business Management') echo 'selected'; ?>>Business Management</option>
                                                    <option value="Sales and Marketing" <?php if ($industry === 'Sales and Marketing') echo 'selected'; ?>>Sales and Marketing</option>
                                                    <option value="Banking and Finance" <?php if ($industry === 'Banking and Finance') echo 'selected'; ?>>Banking and Finance</option>
                                                    <option value="Engineering" <?php if ($industry === 'Engineering') echo 'selected'; ?>>Engineering</option>
                                                    <option value="Customer Service" <?php if ($industry === 'Customer Service') echo 'selected'; ?>>Customer Service</option>
                                                    <option value="Human Resources" <?php if ($industry === 'Human Resources') echo 'selected'; ?>>Human Resources</option>
                                                    <option value="Construction and Skilled Trades" <?php if ($industry === 'Construction and Skilled Trades') echo 'selected'; ?>>Construction and Skilled Trades</option>
                                                    <option value="Hospitality and Tourism" <?php if ($industry === 'Hospitality and Tourism') echo 'selected'; ?>>Hospitality and Tourism</option>
                                                    <option value="Retail" <?php if ($industry === 'Retail') echo 'selected'; ?>>Retail</option>
                                                    <option value="Manufacture and Production" <?php if ($industry === 'Manufacture and Production') echo 'selected'; ?>>Manufacture and Production</option>
                                                    <option value="Legal" <?php if ($industry === 'Legal') echo 'selected'; ?>>Legal</option>
                                                    <option value="Media and Communication" <?php if ($industry === 'Media and Communication') echo 'selected'; ?>>Media and Communication</option>
                                                    <option value="Science and Research" <?php if ($industry === 'Science and Research') echo 'selected'; ?>>Science and Research</option>
                                                    <option value="Art and Design" <?php if ($industry === 'Art and Design') echo 'selected'; ?>>Art and Design</option>
                                                    <option value="Agriculture and Farming" <?php if ($industry === 'Agriculture and Farming') echo 'selected'; ?>>Agriculture and Farming</option>
                                                    <option value="Government and Public Administration" <?php if ($industry === 'Government and Public Administration') echo 'selected'; ?>>Government and Public Administration</option>
                                                    <option value="Transportation and Logistics" <?php if ($industry === 'Transportation and Logistics') echo 'selected'; ?>>Transportation and Logistics</option>
                                                    <option value="Real Estate" <?php if ($industry === 'Real Estate') echo 'selected'; ?>>Real Estate</option>
                                                    <option value="NonProfit and Social Services" <?php if ($industry === 'NonProfit and Social Services') echo 'selected'; ?>>NonProfit and Social Services</option>
                                                    <option value="Insurance" <?php if ($industry === 'Insurance') echo 'selected'; ?>>Insurance</option>
                                                    <option value="Fitness and Wellness" <?php if ($industry === 'Fitness and Wellness') echo 'selected'; ?>>Fitness and Wellness</option>
                                                    <option value="Energy" <?php if ($industry === 'Energy') echo 'selected'; ?>>Energy</option>
                                                    <option value="Consulting" <?php if ($industry === 'Consulting') echo 'selected'; ?>>Consulting</option>
                                                    <option value="Security and Law Enforcement" <?php if ($industry === 'Security and Law Enforcement') echo 'selected'; ?>>Security and Law Enforcement</option>
                                                    <option value="Writing and Editing" <?php if ($industry === 'Writing and Editing') echo 'selected'; ?>>Writing and Editing</option>
                                                    <option value="Performing Arts" <?php if ($industry === 'Performing Arts') echo 'selected'; ?>>Performing Arts</option>
                                                    <option value="Sports" <?php if ($industry === 'Sports') echo 'selected'; ?>>Sports</option>
                                                    <option value="Telecommunications" <?php if ($industry === 'Telecommunications') echo 'selected'; ?>>Telecommunications</option>
                                                    <option value="Personal Care and Beauty Services" <?php if ($industry === 'Personal Care and Beauty Services') echo 'selected'; ?>>Personal Care and Beauty Services</option>
                                                    <option value="Digital Marketing" <?php if ($industry === 'Digital Marketing') echo 'selected'; ?>>Digital Marketing</option>
                                                    <option value="Journalism" <?php if ($industry === 'Journalism') echo 'selected'; ?>>Journalism</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div><!-- end col-lg-4 -->

                                    <div class="col-lg-4 column-lg-full">
                                        <div class="input-box">
                                            <label class="label-text">Skill Requirements</label>
                                            <div class="form-group mb-0">
                                                <textarea class="message-control form-control user-text-editor" name="skill" id="" cols="30" rows="5" placeholder="list skills separated with a comma" required></textarea>
                                            </div>
                                        </div>
                                    </div><!-- end col-lg-4 -->
                                </div>
                                <div class="row">
                                    <div class="col-lg-2 column-lg-full">
                                        <div class="input-box">
                                            <label class="label-text">No. Of Vacancy</label>
                                            <div class="form-group user-chosen-select-container">
                                                <select class="user-chosen-select" required>
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
                                                <input class="date-range form-control" type="text" name="deadlineDate" value="2/25/2020">
                                            </div>
                                        </div>
                                    </div><!-- end col-lg-4 -->
                                    <div class="col-lg-6 column-lg-full">
                                        <div class="input-box">
                                            <label class="label-text">Job Description</label>
                                            <div class="form-group mb-0">
                                                <textarea class="message-control form-control user-text-editor" name="jobDescription"></textarea>
                                            </div>
                                        </div>
                                    </div><!-- end col-lg-12 -->
                                </div>

                                <div class="row">
                                    <div class="col-12 justify-content-center align-items-center d-flex">
                                        <div class="btn-box mt-4 ">
                                            <button class="theme-btn border-0 align-self-center " name="postJob"><i class="la la-plus"></i> Post Job Opening</button>
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