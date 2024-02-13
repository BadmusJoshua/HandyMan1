<?php
require 'inc/config/database.php';
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    session_start();
    if (isset($_SESSION['id'])) {
        $userId = $_SESSION['id'];
    }

    $sql = "SELECT * FROM jobs WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$id]);
    $jobDetails = $stmt->fetch();
    $posterId = $jobDetails->userId;
    if ($userId != $posterId) {
        //redirect if user is not the owner of the job id
        header("Location: employer-post-new-job.php");
    } else {
        header("Location: edit-job.php?id=$id");
    }
}
