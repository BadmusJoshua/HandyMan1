<?php

include 'inc/header/header.php';
//fetching top rated technicians
$sql = "SELECT * FROM users WHERE is_technician = 1 ORDER BY rating DESC LIMIT 4 ";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$top_technicians = $stmt->fetchAll();


//getting sales count
$sql = "SELECT * FROM jobs WHERE seller_id = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$userId]);
$salesCount = $stmt->rowCount();

// getting percentage increase of sales
$prevSalesCount = $salesCount - 1;
if ($salesCount != 0) {
  $salesIncrease = (($salesCount - $prevSalesCount) / $salesCount) * 100;
} else {
  $salesIncrease = 0;
}
// echo ;
// echo ;

// getting total revenue
$sqli = "SELECT sum(price) FROM jobs WHERE seller_id =? AND completed =?";
$stmt = $pdo->prepare($sqli);
$stmt->execute([$userId, 4]);
$totalSales = $stmt->fetch(PDO::FETCH_NUM);
$balance = $totalSales[0];
//complete id
$num = 4;
//getting prev revenue sum
$sqlx = "SELECT sum(price) AS TOTAL_PRICE FROM jobs WHERE seller_id=? AND completed=? AND id != (SELECT MAX(id) FROM jobs WHERE seller_id=? AND completed=?)";
$stmt = $pdo->prepare($sqlx);
$stmt->bindParam(1, $userId, PDO::PARAM_INT);
$stmt->bindParam(2, $num, PDO::PARAM_INT);
$stmt->bindParam(3, $userId, PDO::PARAM_INT);
$stmt->bindParam(4, $num, PDO::PARAM_INT);
$stmt->execute();
$totalPrevRevenue = $stmt->fetch(PDO::FETCH_NUM);
$prevbalance = $totalPrevRevenue[0];
//getting percentage increase in revenue
if ($balance != 0) {
  $revenueIncrease = (($balance - $prevbalance) / $balance) * 100;
} else {
  $revenueIncrease = 0;
  $balance = 0;
}


//getting customer count
$sqly = "SELECT DISTINCT customer FROM jobs WHERE seller_id = ?";
$stmt = $pdo->prepare($sqly);
$stmt->execute([$userId]);
$totalCustomers = $stmt->rowCount();

//getting percentage increase of customers
$prevCustomers = $totalCustomers - 1;
if ($totalCustomers != 0) {
  $customerIncrease = (($totalCustomers - $prevCustomers) / $totalCustomers) * 100;
} else {
  $customerIncrease = 0;
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
      <a class="nav-link collapsed" href="jobs.php">
        <i class="bi bi-briefcase-fill"></i>
        <span>Jobs</span>
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
    </li><!-- End suggestionin Page Nav -->
  </ul>

</aside><!-- End Sidebar-->

<main id="main" class="main">

  <div class="pagetitle">
    <h1>Dashboard</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
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
              <span class="info__count">5</span>
              <h4 class="info__title font-size-16 mt-2">Total Job Applied</h4>
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
              <span class="info__count">20</span>
              <h4 class="info__title font-size-16 mt-2">Reviews</h4>
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
                <div class="mess__item">
                  <div class="note-badge-wrap d-flex align-items-center justify-content-between">
                    <span class="badge badge-primary note-badge note-badge-bg-2 p-2">High Priority</span>
                    <ul class="info-list">
                      <li class="d-inline-block"><a href="#"><i class="la la-edit" data-toggle="tooltip" data-placement="top" title="Edit"></i></a></li>
                      <li class="d-inline-block"><a href="#"><i class="la la-trash" data-toggle="tooltip" data-placement="top" title="Remove"></i></a></li>
                    </ul>
                  </div>
                  <div class="content mt-2">
                    <p class="line-height-24 font-size-13">Medecins du Monde Jane Addams reduce child
                      mortality challenges Ford Foundation.Diversification shifting
                      landscape advocate pathway to a better life rights international</p>
                  </div>
                </div><!-- end mess__item -->
                <div class="mess__item">
                  <div class="note-badge-wrap d-flex align-items-center justify-content-between">
                    <span class="badge badge-success note-badge note-badge-bg-2 p-2">Low Priority</span>
                    <ul class="info-list">
                      <li class="d-inline-block"><a href="#"><i class="la la-edit" data-toggle="tooltip" data-placement="top" title="Edit"></i></a></li>
                      <li class="d-inline-block"><a href="#"><i class="la la-trash" data-toggle="tooltip" data-placement="top" title="Remove"></i></a></li>
                    </ul>
                  </div>
                  <div class="content mt-2">
                    <p class="line-height-24 font-size-13">Medecins du Monde Jane Addams reduce child
                      mortality challenges Ford Foundation.Diversification shifting
                      landscape advocate pathway to a better life rights international</p>
                  </div>
                </div><!-- end mess__item -->
                <div class="mess__item">
                  <div class="note-badge-wrap d-flex align-items-center justify-content-between">
                    <span class="badge badge-warning text-white note-badge note-badge-bg-2 p-2">Medium Priority</span>
                    <ul class="info-list">
                      <li class="d-inline-block"><a href="#"><i class="la la-edit" data-toggle="tooltip" data-placement="top" title="Edit"></i></a></li>
                      <li class="d-inline-block"><a href="#"><i class="la la-trash" data-toggle="tooltip" data-placement="top" title="Remove"></i></a></li>
                    </ul>
                  </div>
                  <div class="content mt-2">
                    <p class="line-height-24 font-size-13">Medecins du Monde Jane Addams reduce child
                      mortality challenges Ford Foundation.Diversification shifting
                      landscape advocate pathway to a better life rights international</p>
                  </div>
                </div><!-- end mess__item -->
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