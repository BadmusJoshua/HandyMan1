<?php
include 'inc/header/applicant-header.php';
$review_submit = $ratingSum = $rate = '';

//get employer id
if (isset($_GET['employerId'])) {
    $employerId = $_SESSION['employerId'] = $_GET['employerId'];


    //fetch sum of ratings
    $sql = "SELECT SUM(rating) AS TOTAL_RATING FROM reviews WHERE employer_id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$employerId]);
    // $totalRating = $stmt->fetch();
    $totalRating = $stmt->fetch(PDO::FETCH_NUM);
    $ratingSum = $totalRating[0];
    echo $ratingSum;

    //fetch count of ratings
    $sql = "SELECT * FROM reviews WHERE employer_id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$employerId]);
    $totalCount = $stmt->rowCount();
    if ($totalCount == 0) {
        $rates = 0;
    } else {
        //fetch average rate
        $rates = ($ratingSum / $totalCount);
    }
    $sql = "UPDATE employers SET rating = ? WHERE id=?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$rates, $employerId]);

    //check if employer id is valid
    $sql = "SELECT * FROM employers WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    if ($stmt) {
        $stmt->execute([$employerId]);
        $employer_count = $stmt->rowCount();
        if ($employer_count == 1) {
            $employer_details = $stmt->fetch();
        } else {
            //redirect to jobs page
            header("Location: applicant-applications.php");
        }
    } else {
        echo "Error: Unable to prepare statement.";
    }
} elseif (isset($_SESSION['employerId'])) {
    $employerId = $_SESSION['employerId'];
    //check if employer id is valid
    $sql = "SELECT * FROM employers WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    if ($stmt) {
        $stmt->execute([$employerId]);
        $employer_count = $stmt->rowCount();
        if ($employer_count == 1) {
            $employer_details = $stmt->fetch();

            //fetch sum of ratings
            $sql = "SELECT SUM(rating) AS TOTAL_RATING FROM reviews WHERE employer_id = ?";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$employerId]);
            // $totalRating = $stmt->fetch();
            $totalRating = $stmt->fetch(PDO::FETCH_NUM);
            $ratingSum = $totalRating[0];
            echo $ratingSum;

            //fetch count of ratings
            $sql = "SELECT * FROM reviews WHERE employer_id = ?";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$employerId]);
            $totalCount = $stmt->rowCount();
            if ($totalCount == 0) {
                $rates = 0;
            } else {
                //fetch average rate
                $rates = ($ratingSum / $totalCount);
            }
            $sql = "UPDATE employers SET rating = ? WHERE id=?";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$rates, $employerId]);
        } else {
            //redirect to jobs page
            header("Location: applicant-applications.php");
        }
    } else {
        echo "Error: Unable to prepare statement.";
    }
} else {
    header("Location: applicant-applications.php");
}


if (isset($_POST['comment'])) {
    $message = filter_input(INPUT_POST, 'message', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $rating = ($_POST['rating']);
    $id = ($_POST['employerId']);

    $sql = "INSERT INTO reviews (message,rating,applicant_id,applicant_name,applicant_image,employer_id) VALUES (?,?,?,?,?,?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$message, $rating, $userId, $name, $image, $id]);
    $review_submit = 1;

    //fetch sum of ratings
    $sql = "SELECT SUM(rating) AS TOTAL_RATING FROM reviews WHERE employer_id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$employer_id]);
    // $totalRating = $stmt->fetch();
    $totalRating = $stmt->fetch(PDO::FETCH_NUM);
    $ratingSum = $totalRating[0];
    echo $ratingSum;

    //fetch count of ratings
    $sql = "SELECT * FROM reviews WHERE employer_id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$employerId]);
    $totalCount = $stmt->rowCount();
    if ($totalCount == 0) {
        $rates = 0;
    } else {
        //fetch average rate
        $rates = ($ratingSum / $totalCount);
    }
    $sql = "UPDATE employers SET rating = ? WHERE id=?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$rate, $employerId]);
}

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
            <a class="nav-link" href="jobs.php">
                <i class="bi bi-briefcase-fill"></i>
                <span>Jobs</span>
            </a>
        </li><!-- End Jobs Page Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="applicant-applications.php">
                <i class="bi bi-briefcase-fill"></i>
                <span>Applications</span>
            </a>
        </li><!-- End Applications Page Nav -->

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
        <h1>Employer Profile</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="applicant-index.php">Home</a></li>
                <li class="breadcrumb-item active">Employer Profile</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section profile">
        <?php
        if ($review_submit) { ?>
            <div class="col-12 alert alert-success text-center alert-dismissible fade show" role="alert">
                Your review has been submitted
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

            </div>
        <?php }
        ?>
        <div class="row">
            <div class="col-xl-4">
                <div class="card">
                    <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
                        <img src="assets/<?= "$employer_details->image" ?>" onerror="this.src='assets/img/profile-img.jpg'" alt="Profile" class="" style="height:130px; width:180px;border-radius:50%;">
                        <h2 class="text-center"><?php echo $employer_details->name ?></h2>
                        <h3><?php echo $employer_details->job_category ?></h3>
                        <div class="social-links mt-2">
                            <a href="<?php echo $employer_details->twitter ?>" class="twitter"><i class="bi bi-twitter"></i></a>
                            <a href="<?php echo $employer_details->facebook ?>" class="facebook"><i class="bi bi-facebook"></i></a>
                            <a href="<?php echo $employer_details->instagram ?>" class="instagram"><i class="bi bi-instagram"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-8">

                <div class="card">
                    <div class="card-body pt-3">
                        <!-- Bordered Tabs -->
                        <ul class="nav nav-tabs nav-tabs-bordered">

                            <li class="nav-item">
                                <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Overview</button>
                            </li>

                            <li class="nav-item">
                                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#reviews">Reviews</button>
                            </li>

                            <li class="nav-item">
                                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#leave_review">Leave Review</button>
                            </li>

                        </ul>
                        <div class="tab-content pt-2">

                            <div class="tab-pane fade show active profile-overview" id="profile-overview">

                                <h5 class="card-title">Employer Details</h5>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Company Name</div>
                                    <div class="col-lg-9 col-md-8"><?php echo $employer_details->name ?></div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">About</div>
                                    <div class="col-lg-9 col-md-8">
                                        <p class="small fst-italic"><?php echo $employer_details->about ?></p>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Headquarters</div>
                                    <div class="col-lg-9 col-md-8"><?php if ((!empty($employer_details->state)) && (!empty($employer_details->country))) {
                                                                        echo "$employer_details->state, $employer_details->country ";
                                                                    } ?></div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Address</div>
                                    <div class="col-lg-9 col-md-8"><?= $employer_details->address ?></div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Industry</div>
                                    <div class="col-lg-9 col-md-8"><?= $employer_details->job_category ?></div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Employee Size</div>
                                    <div class="col-lg-9 col-md-8"><?= $employer_details->employee_size ?>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Posted Jobs</div>
                                    <div class="col-lg-9 col-md-8">
                                        <?php
                                        //sql to get number of posted jobs
                                        $sql = "SELECT * FROM jobs WHERE userId = ?";
                                        $stmt = $pdo->prepare($sql);
                                        if ($stmt) {
                                            $stmt->execute([$employer_details->id]);
                                            $job_count = $stmt->rowCount();
                                            echo $job_count;
                                        } else {
                                            echo "Error: Unable to Prepare Statement";
                                        }
                                        ?>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Phone</div>
                                    <div class="col-lg-9 col-md-8"><?= $employer_details->phone ?></div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Email</div>
                                    <div class="col-lg-9 col-md-8"><?= $employer_details->email ?></div>
                                </div>


                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Website</div>
                                    <div class="col-lg-9 col-md-8"><?= $employer_details->website ?></div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Rating</div>
                                    <div class="col-lg-9 col-md-8"><?php $employer_details->rating;
                                                                    $rate = $employer_details->rating;
                                                                    echo $rate;
                                                                    if ($rate == 0) {
                                                                        echo ' No reviews yet';
                                                                    } elseif ($rate == 1) {
                                                                        echo '
                                                        <i class="bi bi-star-fill"></i>
                                                        <i class="bi bi-star"></i>
                                                        <i class="bi bi-star"></i>
                                                        <i class="bi bi-star"></i>
                                                        <i class="bi bi-star"></i>
                                                    ';
                                                                    } elseif ($rate >= 1.5 && $rate  < 2) {
                                                                        echo
                                                                        '
                                                        <i class="bi bi-star-fill"></i>
                                                        <i class="bi bi-star-half"></i>
                                                        <i class="bi bi-star"></i>
                                                        <i class="bi bi-star"></i>
                                                        <i class="bi bi-star"></i>
                                                    ';
                                                                    } elseif ($rate == 2) {
                                                                        echo '
                                                    <i class="bi bi-star-fill"></i>
                                                    <i class="bi bi-star-fill"></i>
                                                    <i class="bi bi-star"></i>
                                                    <i class="bi bi-star"></i>
                                                    <i class="bi bi-star"></i>
                                                    ';
                                                                    } elseif ($rate >= 2.5 && $rate < 3) {
                                                                        echo
                                                                        '
                                                    <i class="bi bi-star-fill"></i>
                                                    <i class="bi bi-star-fill"></i>
                                                    <i class="bi bi-star-half"></i>
                                                    <i class="bi bi-star"></i>
                                                    <i class="bi bi-star"></i>
                                                    ';
                                                                    } elseif ($rate == 3) {
                                                                        echo '
                                                    <i class="bi bi-star-fill"></i>
                                                    <i class="bi bi-star-fill"></i>
                                                    <i class="bi bi-star-fill"></i>
                                                    <i class="bi bi-star"></i>
                                                    <i class="bi bi-star"></i>
                                                    ';
                                                                    } elseif ($rate >= 3.5 && $rate < 4) {
                                                                        echo
                                                                        '
                                                    <i class="bi bi-star-fill"></i>
                                                    <i class="bi bi-star-fill"></i>
                                                    <i class="bi bi-star-fill"></i>
                                                    <i class="bi bi-star-half"></i>
                                                    <i class="bi bi-star"></i>
                                                    ';
                                                                    } elseif ($rate == 4) {
                                                                        echo '  
                                                    <i class="bi bi-star-fill"></i>
                                                    <i class="bi bi-star-fill"></i>
                                                    <i class="bi bi-star-fill"></i>
                                                    <i class="bi bi-star-fill"></i> 
                                                    <i class="bi bi-star"></i>
                                                    ';
                                                                    } elseif ($rate >= 4.5 && $rate < 5) {
                                                                        echo '
                                                    <i class="bi bi-star-fill"></i>
                                                    <i class="bi bi-star-fill"></i>
                                                    <i class="bi bi-star-fill"></i>
                                                    <i class="bi bi-star-fill"></i>
                                                    <i class="bi bi-star-half"></i>
                                                    ';
                                                                    } else {
                                                                        echo '  
                                                    <i class="bi bi-star-fill"></i>
                                                    <i class="bi bi-star-fill"></i>
                                                    <i class="bi bi-star-fill"></i>
                                                    <i class="bi bi-star-fill"></i>
                                                    <i class="bi bi-star-fill"></i>';
                                                                    }
                                                                    ?></div>
                                </div>

                            </div>



                            <div class="tab-pane fade pt-3" id="reviews">

                                <?php
                                $sql = "SELECT * FROM reviews WHERE employer_id=? ORDER BY rating DESC";
                                $stmt = $pdo->prepare($sql);
                                $stmt->execute([$employerId]);
                                $review_count = $stmt->rowCount();
                                if ($review_count == 0) { ?>
                                    <div class="text-center m-auto">No Reviews yet!</div>
                                <?php } else {
                                    $review = $stmt->fetchAll(); ?>
                                    <div>
                                        <?php foreach ($review as $comment) : ?>
                                            <div class="row border p-2">
                                                <div class="col-2 justify-content-center ">
                                                    <img src="<?= $comment->applicant_image ?>" alt="" style="height:70px;width:70px;" onerror="this.src='assets/img/profile-img.jpg'" class="rounded-circle">
                                                </div>
                                                <div class="col-10 justify-content-between">
                                                    <h5><?= $comment->applicant_name ?></h5>
                                                    <small><?= $comment->created ?></small>
                                                </div>
                                                <div class="col-12"><?= $comment->message ?></div>
                                                <div class="col-12 text-center">
                                                    <?php
                                                    $rate = $comment->rating;

                                                    if ($rate == 1) {
                                                        echo '
                                                        <i class="bi bi-star-fill"></i>
                                                        <i class="bi bi-star"></i>
                                                        <i class="bi bi-star"></i>
                                                        <i class="bi bi-star"></i>
                                                        <i class="bi bi-star"></i>
                                                    ';
                                                    } elseif ($rate == 2) {
                                                        echo '
                                                    <i class="bi bi-star-fill"></i>
                                                    <i class="bi bi-star-fill"></i>
                                                    <i class="bi bi-star"></i>
                                                    <i class="bi bi-star"></i>
                                                    <i class="bi bi-star"></i>
                                                    ';
                                                    } elseif ($rate == 3) {
                                                        echo '
                                                    <i class="bi bi-star-fill"></i>
                                                    <i class="bi bi-star-fill"></i>
                                                    <i class="bi bi-star-fill"></i>
                                                    <i class="bi bi-star"></i>
                                                    <i class="bi bi-star"></i>
                                                    ';
                                                    } elseif ($rate == 4) {
                                                        echo '  
                                                    <i class="bi bi-star-fill"></i>
                                                    <i class="bi bi-star-fill"></i>
                                                    <i class="bi bi-star-fill"></i>
                                                    <i class="bi bi-star-fill"></i> 
                                                    <i class="bi bi-star"></i>
                                                    ';
                                                    } else {
                                                        echo '  
                                                    <i class="bi bi-star-fill"></i>
                                                    <i class="bi bi-star-fill"></i>
                                                    <i class="bi bi-star-fill"></i>
                                                    <i class="bi bi-star-fill"></i>
                                                    <i class="bi bi-star-fill"></i>';
                                                    } ?>
                                                </div>

                                            </div>
                                        <?php endforeach ?>
                                    </div>

                                <?php } ?>



                            </div>
                            <div class="tab-pane fade pt-3" id="leave_review">
                                <!-- Review Form -->
                                <?php
                                if ($detail->name == $employer_details->name) { ?>
                                    <div class="text-center m-auto">You can't leave a review for yourself </div>

                                <?php } else { ?>
                                    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">

                                        <div class="row mb-3 justify-content-center gap-2">
                                            <div class="col-12">
                                                <label for="" class="form-label">Comment: </label>
                                                <textarea name="message" id="" class="form-control" cols="30" rows="5" placeholder="You can leave comments and reviews on services"></textarea>
                                            </div>
                                            <div class="col-6">
                                                <label for="" class="form-label">Rating: </label>
                                                <select name="rating" id="" class="form-control">
                                                    <option value=""> Choose Rating</option>
                                                    <option value="1">Terrible 😠</option>
                                                    <option value="2">Bad 😫</option>
                                                    <option value="3">Fair 😐</option>
                                                    <option value="4">Very Good 🙂</option>
                                                    <option value="5">Excellent 😁</option>
                                                </select>
                                            </div>
                                            <input type="hidden" name="employerId" value="<?= $employerId ?>">

                                        </div>

                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary" name="comment">Leave Comment</button>
                                        </div>
                                    </form><!-- End review Form -->
                                <?php }

                                ?>

                            </div>
                        </div><!-- End Bordered Tabs -->

                    </div>
                </div>

            </div>
        </div>


        </div>
    </section>

</main><!-- End #main -->

<?php require 'inc/footer/footer.php'; ?>