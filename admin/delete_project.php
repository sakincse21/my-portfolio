<?php
session_start();
require '../db.php';

if (!isset($_SESSION["admin"])) {
    header("Location: login.php");
    exit;
}

$id = $_GET['id'];

$project = $conn->query("SELECT thumbnail FROM projects WHERE id = $id")->fetch_assoc();

if ($conn->query("DELETE FROM projects WHERE id = $id")) {
    if ($project['thumbnail'] && file_exists('../' . $project['thumbnail'])) {
        unlink('../' . $project['thumbnail']);
    }
}

header("Location: dashboard.php");
exit;
?>