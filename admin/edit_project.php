<?php
session_start();
require '../db.php';

if (!isset($_SESSION["admin"])) {
    header("Location: login.php");
    exit;
}

$id = $_GET['id'];
$project = $conn->query("SELECT * FROM projects WHERE id = $id")->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $technologies = $_POST['technologies'];
    $live_url = $_POST['live_url'];
    $github_url = $_POST['github_url'];
    $thumbnail = $project['thumbnail']; // Keep existing thumbnail by default

    // Handle new file upload
    if (isset($_FILES['thumbnail']) && $_FILES['thumbnail']['error'] == 0) {
        $target_dir = "../assets/projects/";
        $file_extension = pathinfo($_FILES['thumbnail']['name'], PATHINFO_EXTENSION);
        $new_thumbnail = 'project_' . time() . '.' . $file_extension;
        $target_file = $target_dir . $new_thumbnail;

        if (move_uploaded_file($_FILES['thumbnail']['tmp_name'], $target_file)) {
            // Delete old thumbnail if it exists
            if ($thumbnail && file_exists('../' . $thumbnail)) {
                unlink('../' . $thumbnail);
            }
            $thumbnail = 'assets/projects/' . $new_thumbnail;
        }
    }

    $stmt = $conn->prepare("UPDATE projects SET title=?, description=?, technologies=?, thumbnail=?, live_url=?, github_url=? WHERE id=?");
    $stmt->bind_param("ssssssi", $title, $description, $technologies, $thumbnail, $live_url, $github_url, $id);

    if ($stmt->execute()) {
        header("Location: dashboard.php");
        exit;
    } else {
        $error = "Error updating project.";
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Edit Project</title>
    <link rel="stylesheet" href="../style.css">
</head>

<body>
    <header class="admin-header">
        <nav>
            <div class="logo">
                <h2>Edit Project</h2>
            </div>
            <div class="nav-right">
                <a href="dashboard.php" class="nav-btn">Back to Dashboard</a>
                <a href="logout.php" class="logout-btn">Logout</a>
            </div>
        </nav>
    </header>

    <main class="admin-main">
        <?php if (isset($error)): ?>
            <p class="error"><?= $error ?></p>
        <?php endif; ?>

        <form method="POST" enctype="multipart/form-data" class="project-form">
            <div>
                <label>Title:</label>
                <input type="text" name="title" value="<?= htmlspecialchars($project['title']) ?>" required>
            </div>

            <div>
                <label>Description:</label>
                <textarea name="description" rows="4" required><?= htmlspecialchars($project['description']) ?></textarea>
            </div>

            <div>
                <label>Technologies:</label>
                <input type="text" name="technologies" value="<?= htmlspecialchars($project['technologies']) ?>" required>
            </div>

            <div>
                <label>Current Thumbnail:</label>
                <?php if ($project['thumbnail']): ?>
                    <img src="../<?= $project['thumbnail'] ?>" style="max-width: 200px; display: block; margin: 10px 0;">
                <?php endif; ?>
                <input type="file" name="thumbnail" accept="image/*">
                <small>Leave empty to keep current thumbnail</small>
            </div>

            <div>
                <label>Live URL:</label>
                <input type="url" name="live_url" value="<?= htmlspecialchars($project['live_url']) ?>">
            </div>

            <div>
                <label>GitHub URL:</label>
                <input type="url" name="github_url" value="<?= htmlspecialchars($project['github_url']) ?>">
            </div>

            <button type="submit" class="nav-btn">Update Project</button>
        </form>
    </main>
</body>

</html>