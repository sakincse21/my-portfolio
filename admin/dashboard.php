<?php
session_start();
require '../db.php';

if (!isset($_SESSION["admin"])) {
  header("Location: login.php");
  exit;
}

$messages = $conn->query("SELECT * FROM messages ORDER BY created_at DESC");
$projects = $conn->query("SELECT * FROM projects ORDER BY created_at DESC");
?>
<!DOCTYPE html>
<html>

<head>
  <title>Dashboard</title>
  <link rel="stylesheet" href="../style.css">
</head>

<body>
  <header class="admin-header">
      <nav>
        <div class="logo">
          <h2>Admin Dashboard</h2>
        </div>
        <div class="nav-right">
          <ul class="links-ul">
          <a href="../index.php" class="nav-btn">Go to Portfolio</a>
          <a href="change_password.php" class="nav-btn">Change Password</a>
          <a href="logout.php" class="logout-btn">Logout</a>
        </ul>
      </div>
    </nav>
  </header>

  <main class="admin-main">
    <!-- Projects Table Section -->
    <section class="admin-section">
      <div class="section-header">
        <h3>Projects</h3>
        <a href="add_project.php" class="nav-btn">Add New Project</a>
      </div>

      <?php if ($projects->num_rows > 0): ?>
        <table class="admin-table">
          <tr>
            <th>ID</th>
            <th>Thumbnail</th>
            <th>Title</th>
            <th>Technologies</th>
            <th>Live URL</th>
            <th>GitHub URL</th>
            <th>Created At</th>
            <th>Actions</th>
          </tr>
          <?php while ($row = $projects->fetch_assoc()): ?>
            <tr>
              <td><?= $row['id'] ?></td>
              <td>
                <?php if ($row['thumbnail']): ?>
                  <img src="../<?= $row['thumbnail'] ?>" style="width: 60px; height: 40px; object-fit: cover;">
                <?php else: ?>
                  No image
                <?php endif; ?>
              </td>
              <td style="width: 80px; height:auto;"><?= htmlspecialchars($row['title']) ?></td>
              <td><?= htmlspecialchars($row['technologies']) ?></td>
              <td>
                <?php if ($row['live_url']): ?>
                  <a href="<?= $row['live_url'] ?>" target="_blank">View</a>
                <?php else: ?>
                  -
                <?php endif; ?>
              </td>
              <td>
                <?php if ($row['github_url']): ?>
                  <a href="<?= $row['github_url'] ?>" target="_blank">GitHub</a>
                <?php else: ?>
                  -
                <?php endif; ?>
              </td>
              <td><?= $row['created_at'] ?></td>
              <td class="messageAction">
                <a href="edit_project.php?id=<?= $row['id'] ?>" class="edit">Edit</a>
                <a href="delete_project.php?id=<?= $row['id'] ?>" onclick="return confirm('Delete this project?')" class="delete">Delete</a>
              </td>
            </tr>
          <?php endwhile; ?>
        </table>
      <?php else: ?>
        <p style="text-align: center; padding: 20px; color: #666;">No projects found.</p>
      <?php endif; ?>
    </section>

    <!-- Messages Table Section -->
    <section class="admin-section">
      <h3>Messages</h3>
      <?php if ($messages->num_rows > 0): ?>
        <table class="admin-table">
          <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Message</th>
            <th>Created At</th>
            <th>Actions</th>
          </tr>
          <?php while ($row = $messages->fetch_assoc()): ?>
            <tr>
              <td><?= $row['id'] ?></td>
              <td><?= htmlspecialchars($row['name']) ?></td>
              <td><?= htmlspecialchars($row['email']) ?></td>
              <td><?= nl2br(htmlspecialchars($row['message'])) ?></td>
              <td><?= $row['created_at'] ?></td>
              <td class="messageAction">
                <a href="edit_message.php?id=<?= $row['id'] ?>" class="edit">Edit</a>
                <a href="delete_message.php?id=<?= $row['id'] ?>" onclick="return confirm('Delete this?')" class="delete">Delete</a>
              </td>
            </tr>
          <?php endwhile; ?>
        </table>
      <?php else: ?>
        <p style="text-align: center; padding: 20px; color: #666;">No messages found.</p>
      <?php endif; ?>
    </section>
  </main>
</body>

</html>