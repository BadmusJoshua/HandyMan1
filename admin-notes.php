<?php

include 'inc/header/admin-header.php';

// Initialize variables
$message = $priority = $note_update = $note_create = $edit_note = $note = '';

if (isset($_GET['id'])) {
    $noteId = $_GET['id'];
    //sql to verify note id
    $sql = "SELECT * FROM notes WHERE id = ? AND category = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$noteId, '3']);
    $note = $stmt->fetch();
    $edit_note = '1';
}

if (isset($_POST['addNote'])) {
    // Retrieve form data
    $message = isset($_POST['message']) ? htmlspecialchars($_POST['message']) : '';
    $priority = isset($_POST['priority']) ? $_POST['priority'] : '';
    $userId = isset($_POST['id']) ? $_POST['id'] : '';

    // Prepare and execute SQL query
    $sql = "INSERT INTO notes (message, priority, category, userId) VALUES (?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);

    if ($stmt) {
        $stmt->execute([$message, $priority, '3', $userId]);
        $note_create = 1;
    } else {
        echo "Error: Unable to prepare statement.";
    }
}

if (isset($_POST['updateNote'])) {
    // Retrieve form data
    $message = isset($_POST['message']) ? htmlspecialchars($_POST['message']) : '';
    $priority = isset($_POST['priority']) ? $_POST['priority'] : '';
    $noteId = isset($_POST['id']) ? $_POST['id'] : '';

    // Prepare and execute SQL query
    $sql = "UPDATE notes SET message=?, priority=? WHERE id=?";
    $stmt = $pdo->prepare($sql);

    if ($stmt) {
        $stmt->execute([$message, $priority, $noteId]);
        $note_update = 1;
    } else {
        echo "Error: Unable to prepare statement.";
    }
}
?>

<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link " href="admin-index.php">
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
            <a class="nav-link collapsed" href="view-employers.php">
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
        <?php if ($edit_note) { ?>
            <h1>Edit Note</h1>
        <?php } else { ?>
            <h1>Add Note</h1>
        <?php } ?>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="employer-index.php">Home</a></li>

                <?php if ($edit_note) { ?>
                    <li class="breadcrumb-item active">Edit Note</li>

                <?php } else { ?>
                    <li class="breadcrumb-item active">Add Note</li>

                <?php } ?>


            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row mt-5">
            <div class="col-lg-12">
                <div class="billing-form-item">
                    <div class="billing-title-wrap">
                        <h3 class="widget-title pb-0">Note Details</h3>
                        <div class="title-shape margin-top-10px"></div>
                    </div><!-- billing-title-wrap -->
                    <div class="billing-content">
                        <div class="contact-form-action">

                            <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                                <?php
                                if ($note_create) {
                                    echo '<div class="alert alert-success text-center alert-dismissible fade show" role="alert">
                          Note added successfully!
                          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                          
                        </div>  ';
                                }
                                if ($note_update) {
                                    echo '<div class="alert alert-success text-center alert-dismissible fade show" role="alert">
                          Note updated successfully!
                          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                          
                        </div>  ';
                                }
                                ?>
                                <div class="row">
                                    <div class="col-lg-9 column-lg-full">
                                        <div class="input-box">
                                            <label class="label-text">Message</label>
                                            <div class="form-group">
                                                <span class="la la-pen form-icon"></span>
                                                <textarea class="message-control form-control user-text-editor" name="message" id="message" cols="30" rows="5" placeholder="Enter note's message " required><?php
                                                                                                                                                                                                            if (isset($note->message)) {
                                                                                                                                                                                                                echo $note->message;
                                                                                                                                                                                                            };
                                                                                                                                                                                                            ?></textarea>

                                            </div>
                                        </div>
                                    </div><!-- end col-lg-4 -->

                                    <div class="col-lg-3 column-lg-full">
                                        <div class="input-box">
                                            <label class="label-text">Priority</label>
                                            <div class="form-group user-chosen-select-container">
                                                <select class="user-chosen-select" name="priority" required>
                                                    <option value="">Select Note Priority</option>
                                                    <option <?php if ((isset($priority) && $priority === 'High') || (isset($note->priority) && $note->priority === 'High'))
                                                                echo 'selected'; ?> value="High">High</option>
                                                    <option <?php if ((isset($priority) && $priority === 'Medium') || (isset($note->priority) && $note->priority === 'Medium'))
                                                                echo 'selected'; ?> value="Medium">Medium</option>
                                                    <option <?php if ((isset($priority) && $priority === 'Low') || (isset($note->priority) && $note->priority === 'Low'))
                                                                echo 'selected'; ?> value="Low">Low</option>

                                                </select>
                                            </div>
                                        </div>
                                    </div><!-- end col-lg-4 -->
                                    <?php if ($edit_note) { ?>
                                        <input type="hidden" name="id" id="id" value="<?= $noteId ?>">

                                    <?php } else { ?>
                                        <input type="hidden" name="id" id="id" value="<?= $userId ?>">
                                    <?php } ?>

                                </div>
                                <div class="row">
                                    <div class="col-12 justify-content-center align-items-center d-flex">
                                        <div class="btn-box mt-4">
                                            <?php if ($edit_note) { ?>
                                                <button class="theme-btn border-0 align-self-center" type="submit" name="updateNote"><i class="la la-plus"></i> Update Note</button>
                                            <?php  } else { ?>
                                                <button class="theme-btn border-0 align-self-center" type="submit" name="addNote"><i class="la la-plus"></i> Add Note</button>
                                            <?php } ?>

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