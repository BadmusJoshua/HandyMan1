<?php
require_once 'inc/header/applicant-header.php';

$sql = "SELECT * FROM jobs WHERE status = '1' ";
$stmt = $pdo->prepare($sql);
$stmt->execute([]);
$jobCount = $stmt->rowCount();

//sql to check number of applications
$sql = "SELECT * FROM applications WHERE applicantId  = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$userId]);
$applicationCount = $stmt->rowCount();

//sql to delete note
if (isset($_POST['remove'])) {
  $note_id = $_POST['id'];
  $sql = "DELETE FROM notes WHERE id = ?";
  $stmt = $pdo->prepare($sql);
  if ($stmt) {
    $stmt->execute([$note_id]);
  } else {
    echo "Error: Unable to prepare statement.";
  }
}

?>

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
    </li><!-- End Meeting Page Nav -->

    <li class="nav-item">
      <a class="nav-link collapsed" href="jobs.php">
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
    </li><!-- End suggestionin Page Nav -->
  </ul>

</aside><!-- End Sidebar-->
<main id="main" class="main">

  <div class="pagetitle">
    <h1>Dashboard</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="applicant-index.php">Home</a></li>
        <li class="breadcrumb-item active">Dashboard</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section dashboard">
    <div class="row mt-5">
      <div class="col-lg-3 column-lg-half responsive-column">
        <div class="overview-item">
          <div class="icon-box bg-1 mb-0 d-flex align-items-center">
            <div class="icon-element flex-shrink-0">
              <i class="la la-briefcase"></i>
            </div><!-- end icon-element-->
            <div class="info-content">
              <span class="info__count"><?= $jobCount ?></span>
              <h4 class="info__title font-size-16 mt-2">Total Open Jobs</h4>
            </div><!-- end info-content -->
          </div>
        </div>
      </div><!-- end col-lg-3 -->
      <div class="col-lg-3 column-lg-half responsive-column">
        <div class="overview-item">
          <div class="icon-box bg-2 mb-0 d-flex align-items-center">
            <div class="icon-element flex-shrink-0">
              <i class="la la-comment"></i>
            </div><!-- end icon-element-->
            <div class="info-content">
              <span class="info__count"><?= $applicationCount ?></span>
              <h4 class="info__title font-size-16 mt-2">Applications submitted</h4>
            </div><!-- end info-content -->
          </div>
        </div>
      </div><!-- end col-lg-3 -->
      <div class="col-lg-3 column-lg-half responsive-column">
        <div class="overview-item">
          <div class="icon-box bg-3 mb-0 d-flex align-items-center">
            <div class="icon-element flex-shrink-0">
              <i class="la la-eye"></i>
            </div><!-- end icon-element-->
            <div class="info-content">
              <span class="info__count">504</span>
              <h4 class="info__title font-size-16 mt-2">This Month Views</h4>
            </div><!-- end info-content -->
          </div>
        </div>
      </div><!-- end col-lg-3 -->
      <div class="col-lg-3 column-lg-half responsive-column">
        <div class="overview-item">
          <div class="icon-box bg-4 mb-0 d-flex align-items-center">
            <div class="icon-element flex-shrink-0">
              <i class="la la-phone"></i>
            </div><!-- end icon-element-->
            <div class="info-content">
              <span class="info__count">10</span>
              <h4 class="info__title font-size-16 mt-2">Call for interview</h4>
            </div><!-- end info-content -->
          </div>
        </div>
      </div><!-- end col-lg-3 -->
    </div><!-- end row -->
    <div class="row mt-2">
      <div class="col-lg-7 column-lg-full">
        <div class="chart-box chart-item">
          <div class="chart-headline d-flex align-items-center justify-content-between mb-4">
            <h3 class="widget-title font-size-16 pb-0"><i class="font-size-20 la la-bar-chart mr-1"></i>Profile Views</h3>
            <div class="user-chosen-select-container">
              <select class="user-chosen-select">
                <option value="this-week">This Week</option>
                <option value="this-month">This Month</option>
                <option value="last-months">Last 6 Months</option>
                <option value="this-year">This Year</option>
              </select>
            </div><!-- end  -->
          </div>
          <canvas id="line-chart"></canvas>
          <div class="chart-legend mt-4">
            <ul>
              <li><span class="legend__item legend__one"></span>Green</li>
            </ul>
          </div>
        </div><!-- end chart-box -->
      </div><!-- end col-lg-7 -->
      <div class="col-lg-5 column-lg-full">
        <div class="dashboard-shared note-dashboard">
          <div class="mess-dropdown">
            <div class="mess__title">
              <img src="images/bg-title-1.jpg" alt="" class="img-fluid">
              <div class="mess__title-inner padding-top-30px pr-4 pl-4 pb-4">
                <h4 class="widget-title font-size-16 pb-0">
                  <i class="font-size-20 la la-file-text-o mr-1"></i> Notes
                </h4>
              </div>
            </div><!-- end mess__title -->
            <div class="timeline-body">
              <div class="mess__body">
                <?php
                $note_sql = "SELECT * FROM notes WHERE userId =? && category =? ";
                $note_stmt = $pdo->prepare($note_sql);
                $note_stmt->execute([$userId, $userCategory]);
                $notes = $note_stmt->fetchAll();
                if ($notes) {
                  foreach ($notes as $note) { ?>
                    <div class="mess__item">

                      <div class="note-badge-wrap d-flex align-items-center justify-content-between">
                        <?php if ($note->priority == "High") { ?>
                          <span class="badge badge-primary note-badge note-badge-bg-2 p-2">High Priority</span>

                        <?php } elseif ($note->priority == "Medium") { ?>
                          <span class="badge badge-warning text-white note-badge note-badge-bg-2 p-2">Medium Priority</span>
                        <?php } else { ?>
                          <span class="badge badge-success note-badge note-badge-bg-2 p-2">Low Priority</span>

                        <?php }
                        ?>
                        <ul class="info-list">
                          <li class="d-inline-block"><a href="notes.php?id=<?= $note->id ?>"><i class="la la-edit" data-toggle="tooltip" data-placement="top" title="Edit"></i></a></li>
                          <li class="d-inline-block">
                            <form method="post" action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>"> <button name="remove" class="border-0"><i class="la la-trash" data-toggle="tooltip" data-placement="top" title="Remove"></i></button>
                              <input type="hidden" name="id" value="<?= $note->id ?>">
                            </form>
                          </li>
                        </ul>
                      </div>
                      <div class="content mt-2">
                        <p class="line-height-24 font-size-13"><?= $note->message ?></p>
                      </div>
                      <span class="font-weight-bold font-size-11 "><?php
                                                                    $date = DateTime::createFromFormat('Y-m-d H:i:s', $note->created_at);
                                                                    echo $date->format('d M, Y H:i:s');
                                                                    ?></span>
                    </div><!-- end mess__item -->
                  <?php };
                } else { ?>
                  <div class="alert alert-danger text-center alert-dismissible fade show w-80 align-self-center" role="alert">
                    You don't have any note yet!

                  </div>
                <?php }
                ?>
              </div><!-- end mess__body -->
            </div>
            <div class="mess__item border-bottom-0 text-center">
              <button type="button" class="theme-btn border-0 w-100">Add Note</button>
            </div><!-- end mess__item -->
          </div><!-- end mess-dropdown -->
        </div><!-- end dashboard-shared -->
      </div><!-- end col-lg-5 -->
    </div><!-- end row -->
  </section>

</main><!-- End #main -->



<?php include 'inc/footer/footer.php'; ?>