<?php
session_start();
require '../db.php';

if (!isset($_SESSION["admin"])) {
    header("Location: login.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $technologies = $_POST['technologies'];
    $live_url = $_POST['live_url'];
    $github_url = $_POST['github_url'];
    
    $thumbnail = '';
    if (isset($_FILES['thumbnail']) && $_FILES['thumbnail']['error'] == 0) {
        $target_dir = "../assets/projects/";
        if (!file_exists($target_dir)) {
            mkdir($target_dir, 0777, true);
        }
        
        $file_extension = pathinfo($_FILES['thumbnail']['name'], PATHINFO_EXTENSION);
        $thumbnail = 'project_' . time() . '.' . $file_extension;
        $target_file = $target_dir . $thumbnail;
        
        if (move_uploaded_file($_FILES['thumbnail']['tmp_name'], $target_file)) {
            $thumbnail = 'assets/projects/' . $thumbnail;
            
        } else {
            $error = "Sorry, there was an error uploading your file.";
        }
    }
    
    if (!isset($error)) {
        $stmt = $conn->prepare("INSERT INTO projects (title, description, technologies, thumbnail, live_url, github_url) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssss", $title, $description, $technologies, $thumbnail, $live_url, $github_url);
        
        if ($stmt->execute()) {
            header("Location: dashboard.php");
            exit;
        } else {
            $error = "Error adding project.";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Project</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <header class="admin-header">
        <nav>
            <div class="logo">
                <h2>Add New Project</h2>
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
                <input type="text" name="title" required>
            </div>
            
            <div>
                <label>Description:</label>
                <textarea name="description" rows="4" required></textarea>
            </div>
            
            <div>
                <label>Technologies (comma separated):</label>
                <input type="text" name="technologies" placeholder="React, Node.js, MongoDB" required>
            </div>
            
            <div>
                <label>Thumbnail Image:</label>
                <input type="file" name="thumbnail" accept="image/*" required>
            </div>
            
            <div>
                <label>Live URL:</label>
                <input type="url" name="live_url" placeholder="https://example.com">
            </div>
            
            <div>
                <label>GitHub URL:</label>
                <input type="url" name="github_url" placeholder="https://github.com/username/repo">
            </div>
            
            <button type="submit" class="nav-btn">Add Project</button>
        </form>
    </main>
</body>
</html>