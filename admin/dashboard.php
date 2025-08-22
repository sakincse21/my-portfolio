<?php
session_start();
require '../db.php';

if (!isset($_SESSION["admin"])) {
  header("Location: login.php");
  exit;
}

$result = $conn->query("SELECT * FROM messages ORDER BY created_at DESC");
?>
<!DOCTYPE html>
<html>

<head>
  <title>Dashboard</title>
  <link rel="stylesheet" href="../style.css">
</head>

<body>
  <header class="admin-header">
    <h2>Admin Dashboard</h2>
    <nav class='admin-nav'>
      <a href="../index.php" class="nav-btn">Go to Portfolio</a>
      <a href="change_password.php" class="nav-btn">Change Password</a>
      <a href="logout.php" class="logout-btn">Logout</a>
    </nav>
</header>



  <main class="admin-main">
    <h3>Messages</h3>
    <table class="admin-table">
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Message</th>
        <th>Created At</th>
        <th>Actions</th>
      </tr>
      <?php while ($row = $result->fetch_assoc()): ?>
        <tr>
          <td><?= $row['id'] ?></td>
          <td><?= htmlspecialchars($row['name']) ?></td>
          <td><?= htmlspecialchars($row['email']) ?></td>
          <td><?= nl2br(htmlspecialchars($row['message'])) ?></td>
          <td><?= $row['created_at'] ?></td>
          <td class="messageAction">
            <a href="update.php?id=<?= $row['id'] ?>" class="edit">Edit</a>
            <a href="delete.php?id=<?= $row['id'] ?>" onclick="return confirm('Delete this?')" class="delete">Delete</a>
          </td>
        </tr>
      <?php endwhile; ?>
    </table>
  </main>
</body>

</html>