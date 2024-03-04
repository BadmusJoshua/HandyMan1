<?php
include 'inc/header/admin-header.php';
//delete job
if (isset($_POST['delete'])) {
    $id = $_POST['id'];
    $sql = "DELETE FROM jobs WHERE id = ?";
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
            <a class="nav-link collapsed" href="view-employers.php">
                <i class="bi bi-person"></i>
                <span>View employers</span>
            </a>
        </li><!-- End Profile Page Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="view-employers.php">
                <i class="bi bi-person"></i>
                <span>View Employers</span>
            </a>
        </li><!-- End Profile Page Nav -->

        <li class="nav-item">
            <a class="nav-link " href="view-jobs.php">
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
        <h1>Jobs</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="admin-index.php">Home</a></li>
                <li class="breadcrumb-item active">View Jobs</li>
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
                                <h5 class="card-title fw-semibold text-center">List of Jobs</h5>
                                <table class="table text-wrap mb-0 align-middle w-100">
                                    <thead class="text-dark fs-4">
                                        <tr>
                                            <th class="border-bottom-0">
                                                <h6 class="fw-semibold mb-0">Id</h6>
                                            </th>
                                            <th class="border-bottom-0">
                                                <h6 class="fw-semibold mb-0 text-center">Job Title</h6>
                                            </th>
                                            <th class="border-bottom-0">
                                                <h6 class="fw-semibold mb-0 text-center">Company</h6>
                                            </th>

                                            <th class="border-bottom-0">
                                                <h6 class="fw-semibold mb-0">Status</h6>
                                            </th>
                                            <th class="border-bottom-0">
                                                <h6 class="fw-semibold mb-0 text-center">Job Type</h6>
                                            </th>
                                            <th class="border-bottom-0">
                                                <h6 class="fw-semibold mb-0">Applications</h6>
                                            </th>
                                            <th class="border-bottom-0">
                                                <h6 class="fw-semibold mb-0">Actions</h6>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        //sql query to fetch all rows in the job table
                                        $sql = "SELECT * FROM jobs";
                                        $stmt = $pdo->prepare($sql);
                                        $stmt->execute();
                                        $jobs = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                        if ($jobs) {
                                            foreach ($jobs as $details) :
                                        ?>
                                                <tr>
                                                    <td class="border-bottom-0">
                                                        <h6 class="fw-semibold mb-0"><?= $details['id'] ?></h6>
                                                    </td>
                                                    <td class="border-bottom-0 text-center">
                                                        <h6 class="fw-semibold mb-1"><?= $details['jobTitle'] ?></h6>

                                                        <small><?= $details['jobDescription'] ?></small>

                                                    </td>
                                                    <td class="border-bottom-0 text-center">
                                                        <h6 class="fw-semibold mb-1"><?php
                                                                                        $employer_sql = "SELECT * FROM employers WHERE id= ?";
                                                                                        $employer_stmt = $pdo->prepare($employer_sql);
                                                                                        if ($employer_stmt) {
                                                                                            $employer_stmt->execute([$details['userId']]);
                                                                                            $employer_details = $employer_stmt->fetch();
                                                                                            echo $employer_details->name;
                                                                                        } else {
                                                                                            echo "Error: Unable to prepare statement";
                                                                                        }

                                                                                        ?>
                                                        </h6>

                                                        <small class="text-center"><?= $details['industry']; ?>
                                                        </small>

                                                    </td>
                                                    <td class="border-bottom-0">
                                                        <p class="mb-0 fw-normal"><?php if ($details['status'] === 1) { ?>
                                                        <h6 class="fw-semibold mb-1 text-success">Open</h6>
                                                    <?php  } else {
                                                                                        echo '<h6 class="fw-semibold mb-1 text-danger">Closed</h6>';
                                                                                    } ?></p>
                                                    </td>

                                                    <td class="border-bottom-0 text-center">
                                                        <h6> <?= $details['jobType'] ?></h6>
                                                        <small class="text-center"><?php echo '$' . $details['minOffer'] . ' -, $' . $details['maxOffer']; ?>
                                                        </small>
                                                    </td>
                                                    <td class="border-bottom-0 text-center">
                                                        <h6> <?php
                                                                //sql to get count of applications for each job opening
                                                                $sql = "SELECT * FROM applications WHERE jobId = ?";
                                                                $stmt = $pdo->prepare($sql);
                                                                if ($stmt) {
                                                                    $stmt->execute([$details['userId']]);
                                                                    $applications = $stmt->rowCount();
                                                                    echo $applications;
                                                                } else {
                                                                    echo "Error: Unable to prepare Statement";
                                                                }
                                                                $details['created_at'] ?></h6>
                                                    </td>
                                                    <td class="border-bottom-0">
                                                        <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
                                                            <input type="hidden" name="id" value="<?= $details['id'] ?>">
                                                            <button class="btn btn-sm btn-danger" name="delete">Delete</button>

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