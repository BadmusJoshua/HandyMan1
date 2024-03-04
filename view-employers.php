<?php
include 'inc/header/admin-header.php';
//disable applicant
if (isset($_POST['disable'])) {
    $id = $_POST['id'];
    $sql = "UPDATE employers SET disabled = '1' WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$id]);
}
//enable applicant
if (isset($_POST['enable'])) {
    $id = $_POST['id'];
    $sql = "UPDATE employers SET disabled = '0' WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$id]);
}
?>
<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link collapsed" href="admin-index.php">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li><!-- End Dashboard Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="view-applicants.php">
                <i class="bi bi-person"></i>
                <span>View Applicants</span>
            </a>
        </li><!-- End Profile Page Nav -->

        <li class="nav-item">
            <a class="nav-link " href="view-employers.php">
                <i class="bi bi-person"></i>
                <span>View Employers</span>
            </a>
        </li><!-- End Profile Page Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="view-jobs.php">
                <i class="bi bi-briefcase-fill"></i>
                <span>View Jobs</span>
            </a>
        </li><!-- End Jobs Page Nav -->


        <li class="nav-item">
            <a class="nav-link collapsed" href="logout.php">
                <i class="bi bi-box-arrow-in-right"></i>
                <span>Sign Out</span>
            </a>
        </li><!-- End suggestionin Page Nav -->
    </ul>

</aside><!-- End Sidebar-->
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Employers</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="admin-index.php">Home</a></li>
                <li class="breadcrumb-item active">View Employers</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <section class="section dashboard">
        <div class="row mt-2">
            <div class="col-lg-12 d-flex align-items-stretch">
                <div class="card w-100">
                    <div class="card-body w-100">
                        <div class="d-sm-flex d-block align-items-center justify-content-between mb-9 w-100">
                            <div class="table-responsive w-100">
                                <h5 class="card-title fw-semibold text-center">List of Employers</h5>
                                <table class="table text-wrap mb-0 align-middle w-100">
                                    <thead class="text-dark fs-4">
                                        <tr>
                                            <th class="border-bottom-0">
                                                <h6 class="fw-semibold mb-0">Id</h6>
                                            </th>
                                            <th class="border-bottom-0">
                                                <h6 class="fw-semibold mb-0 text-center">Name</h6>
                                            </th>
                                            <th class="border-bottom-0">
                                                <h6 class="fw-semibold mb-0 text-center">Industry</h6>
                                            </th>

                                            <th class="border-bottom-0">
                                                <h6 class="fw-semibold mb-0">Status</h6>
                                            </th>
                                            <th class="border-bottom-0">
                                                <h6 class="fw-semibold mb-0">Jobs</h6>
                                            </th>
                                            <th class="border-bottom-0">
                                                <h6 class="fw-semibold mb-0">Updated at</h6>
                                            </th>
                                            <th class="border-bottom-0">
                                                <h6 class="fw-semibold mb-0">Actions</h6>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        //sql query to fetch all rows in the client table
                                        $sql = "SELECT * FROM employers";
                                        $stmt = $pdo->prepare($sql);
                                        $stmt->execute();
                                        $employers = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                        if ($employers) {
                                            foreach ($employers as $details) :
                                        ?>
                                                <tr>
                                                    <td class="border-bottom-0">
                                                        <h6 class="fw-semibold mb-0"><?= $details['id'] ?></h6>
                                                    </td>
                                                    <td class="border-bottom-0 text-center">
                                                        <h6 class="fw-semibold mb-1"><?= $details['name'] ?></h6>
                                                        <span>
                                                            <small><?= $details['email'] ?></small>
                                                        </span>
                                                    </td>
                                                    <td class="border-bottom-0 text-center">
                                                        <h6 class="fw-semibold mb-1"><?= $details['job_category'] ?></h6>
                                                        <span>
                                                            <small class="text-center"><?php $details['rating'];
                                                                                        $rate = $details['rating'];
                                                                                        echo $rate;
                                                                                        if ($rate == 0) {
                                                                                            echo "No reviews yet";
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
                                                                                        ?>
                                                                ?></small>
                                                        </span>
                                                    </td>
                                                    <td class="border-bottom-0">
                                                        <p class="mb-0 fw-normal"><?php if ($details['disabled'] === 1) { ?>
                                                        <h6 class="fw-semibold mb-1 text-danger">Disabled</h6>
                                                    <?php  } else {
                                                                                        echo '<h6 class="fw-semibold mb-1 text-success">Active</h6>';
                                                                                    } ?></p>
                                                    </td>

                                                    <td class="border-bottom-0 text-center">
                                                        <h6> <?php
                                                                //sql to get number of jobs posted by this employer
                                                                $job_sql = "SELECT * FROM jobs WHERE userId = ?";
                                                                $job_stmt = $pdo->prepare($job_sql);
                                                                if ($job_stmt) {
                                                                    $job_stmt->execute([$details['id']]);
                                                                    $job_count = $job_stmt->rowCount();
                                                                    echo $job_count;
                                                                } else {
                                                                    echo "Error: Unable to prepare Statement";
                                                                }
                                                                ?></h6>
                                                    </td>
                                                    <td class="border-bottom-0 text-center">
                                                        <h6> <?= $details['updated'] ?></h6>
                                                    </td>
                                                    <td class="border-bottom-0">
                                                        <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
                                                            <input type="hidden" name="id" value="<?= $details['id'] ?>">

                                                            <?php if ($details['disabled'] === 1) { ?>
                                                                <button class="btn btn-sm btn-primary" name="enable">Enable</button>
                                                            <?php  } else { ?>
                                                                <button class="btn btn-sm btn-danger" name="disable">Disable</button>
                                                            <?php } ?>
                                                        </form>
                                                    </td>
                                                </tr>
                                        <?php endforeach;
                                        } else {
                                            echo '<div class="alert alert-danger text-center" role="alert">
                    Oops! No employers yet!
                  </div>';
                                        }
                                        ?>

                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- end row -->

    </section>
</main><!-- End #main -->

<?php include 'inc/footer/footer.php'; ?>