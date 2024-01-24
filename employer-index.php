<?php include 'inc/header/employer-header.php';

?>


<main id="main" class="main">

    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="employer-index.php">Home</a></li>
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
                            <i class="la la-cloud-upload"></i>
                        </div><!-- end icon-element-->
                        <div class="info-content">
                            <span class="info__count">11</span>
                            <h4 class="info__title font-size-16 mt-2">Total Job Posted</h4>
                        </div><!-- end info-content -->
                    </div>
                </div>
            </div><!-- end col-lg-3 -->
            <div class="col-lg-3 column-lg-half responsive-column">
                <div class="overview-item">
                    <div class="icon-box bg-2 mb-0 d-flex align-items-center">
                        <div class="icon-element flex-shrink-0">
                            <i class="la la-file-text-o"></i>
                        </div><!-- end icon-element-->
                        <div class="info-content">
                            <span class="info__count">121</span>
                            <h4 class="info__title font-size-16 mt-2">Application Submit</h4>
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
            <div class="row margin-top-30px">
                <div class="col-lg-6">
                    <div class="chart-box">
                        <div class="chart-headline margin-bottom-40px">
                            <h3 class="widget-title font-size-16 pb-0"><i class="font-size-20 la la-chart-line mr-1"></i>Static Analytics</h3>
                        </div>
                        <canvas id="doughnut-chart"></canvas>
                        <div class="chart-legend margin-top-40px">
                            <ul>
                                <li><span class="legend__item"></span>Applied Jobs</li>
                                <li><span class="legend__item legend__bg-1"></span>Posted Jobs</li>
                                <li><span class="legend__item legend__bg-2"></span>Active Bids</li>
                            </ul>
                        </div>
                    </div><!-- end chart-box -->
                </div><!-- end col-lg-6 -->
            </div><!-- end row -->
    </section>

</main><!-- End #main -->



<?php include 'inc/footer/footer.php'; ?>