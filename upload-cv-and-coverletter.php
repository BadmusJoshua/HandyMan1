<?php require 'inc/header/applicant-header.php'; ?>
<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item ">
            <a class="nav-link collapsed" href="index.php">
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
            <a class="nav-link collapsed" href="jobs.php">
                <i class="bi bi-briefcase-fill"></i>
                <span>Jobs</span>
            </a>
        </li><!-- End Jobs Page Nav -->

        <li class="nav-item">
            <div class="dropdown-center nav-link" style=" margin:0; padding:0; ">
                <button class="btn dropdown-toggle nav-link" type="button" data-bs-toggle="dropdown" aria-expanded="false" style="outline: none;
      box-shadow: none;" onfocus="this.blur()">
                    <i class="bi bi-patch-check"></i>&nbsp;Resumes
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item nav-link" href="upload-cv-and-resume.php">Upload CV and Cover letter</a></li>
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
        <h1>Upload CV and Coverletter</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item"><a href="index.php">Resumes</a></li>
                <li class="breadcrumb-item active">Upload CV and Coverletter</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">

        <div class="row mt-5">
            <div class="col-lg-12">
                <div class="user-form-action">
                    <div class="billing-form-item section-bg shadow-none">
                        <div class="billing-content">
                            <div class="cv-profile-action-wrap">
                                <h3 class="widget-title pb-0">Your CV</h3>
                                <div class="title-shape margin-top-10px"></div>
                                <div class="user-profile-action mt-4">
                                    <div class="file-upload-wrap file-upload-wrap-2">
                                        <input type="file" name="files[]" class="multi file-upload-input with-preview" multiple maxlength="1">
                                        <span class="file-upload-text"><i class="la la-photo mr-2"></i>Upload CV</span>
                                        <p>Max file size is 5MB, Suitable files are .doc, docx, rft, pdf & .pdf</p>
                                    </div>
                                </div><!-- end user-profile-action -->
                            </div><!-- end cv-profile-action-wrap -->
                        </div><!-- end billing-content -->
                    </div>
                </div><!-- end user-form-action -->
            </div><!-- end col-lg-12 -->
            <div class="col-lg-12">
                <div class="user-form-action">
                    <div class="billing-form-item">
                        <div class="billing-title-wrap">
                            <h3 class="widget-title pb-0">Your Cover Letter</h3>
                            <div class="title-shape margin-top-10px"></div>
                        </div><!-- billing-title-wrap -->
                        <div class="billing-content pb-3">
                            <div class="contact-form-action">
                                <form method="post">
                                    <div class="input-box">
                                        <label class="label-text">Bio</label>
                                        <div class="form-group">
                                            <textarea class="message-control form-control pt-3 pr-4 pb-3 pl-4">I spent several years working on sheep on Wall Street. I had moderate success investing in Yugos on Wall Street.</textarea>
                                        </div>
                                    </div>
                                </form>
                            </div><!-- end contact-form-action -->
                        </div><!-- end billing-content -->
                    </div>
                </div><!-- end user-form-action -->
            </div>
            <div class="col-lg-12">
                <div class="btn-box">
                    <button class="theme-btn border-0" type="button">Update</button>
                </div>
            </div>
        </div><!-- end row -->
    </section>
</main>
<?php include 'inc/footer/footer.php'; ?>